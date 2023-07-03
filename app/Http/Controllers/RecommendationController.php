<?php

namespace App\Http\Controllers;
use App\Models\Rating;
use App\Models\Movie;

class RecommendationController extends Controller
{
    public function index()
    {
        //  Data collection and preprocessing
        $ratings = Rating::all();

        $user_ids = $ratings->pluck('user_id')->unique()->toArray();
        $movie_ids = $ratings->pluck('movie_id')->unique()->toArray();

        $ratings_matrix = [];
        foreach ($ratings as $rating) {
            $user_id = $rating->user_id;
            $movie_id = $rating->movie_id;
            $rating_value = $rating->rating;
            $ratings_matrix[$user_id][$movie_id] = $rating_value;
        }

        // Step 2: Matrix factorization
        $factors = 10;
        $maxIterations = 10;
        $regularization = 0.01;
        $learningRate = 0.01;

        $userFactors = [];
        $itemFactors = [];

        // Initialize factors with random values
        foreach ($user_ids as $user_id) {
            for ($i = 0; $i < $factors; $i++) {
                $userFactors[$user_id][$i] = mt_rand() / mt_getrandmax();
            }
        }

        foreach ($movie_ids as $movie_id) {
            for ($i = 0; $i < $factors; $i++) {
                $itemFactors[$movie_id][$i] = mt_rand() / mt_getrandmax();
            }
        }

        for ($iteration = 0; $iteration < $maxIterations; $iteration++) {
            foreach ($ratings_matrix as $user_id => $movie_ratings) {
                foreach ($movie_ratings as $movie_id => $rating) {
                    $prediction = 0;
                    foreach ($userFactors[$user_id] as $i => $userFactor) {
                        $prediction += $userFactor * $itemFactors[$movie_id][$i];
                    }

                    $error = $rating - $prediction;

                    foreach ($userFactors[$user_id] as $i => $userFactor) {
                        $userFactors[$user_id][$i] += $learningRate * ($error * $itemFactors[$movie_id][$i] - $regularization * $userFactor);
                        $itemFactors[$movie_id][$i] += $learningRate * ($error * $userFactor - $regularization * $itemFactors[$movie_id][$i]);
                    }
                }
            }
        }

        // Step 3: Recommendation generation
        $user_id = auth()->user()->id;

        $user_ratings = $ratings_matrix[$user_id] ?? [];

        // Get genres of movies rated by the user
        $rated_movie_ids = array_keys($user_ratings);
        $rated_movies = Movie::whereIn('id', $rated_movie_ids)->get();
        $rated_genres = [];
        foreach ($rated_movies as $movie) {
            $genres = explode('|', $movie->genre); // Assuming genres are comma-separated
            foreach ($genres as $genre) {
                $genre = trim($genre);
                if (!in_array($genre, $rated_genres)) {
                    $rated_genres[] = $genre;
                }
            }
        }

        $recommended_movies = [];
        foreach ($rated_genres as $genre) {
            // Get top-rated movies of the specified genre
            $genre_movies = $this->getTopMoviesByGenre($genre, $movie_ids, $ratings_matrix, $userFactors, $itemFactors, $user_ratings);

            // Merge the recommended movies for each genre
            foreach ($genre_movies as $movie_id => $rating) {
                if (!isset($recommended_movies[$movie_id])) {
                    $recommended_movies[$movie_id] = $rating;
                }
            }
        }

        arsort($recommended_movies, SORT_NUMERIC); // Sort recommended movies by their numeric values in descending order

        // Select top 10 movies
        $top_movies = array_slice($recommended_movies, 0, 10, true);

        // Get movies and their average ratings
        $movies = Movie::whereIn('id', array_keys($top_movies))->get();
        $movie_ratings = array_intersect_key($recommended_movies, $top_movies);

        // Step 4: Display recommendations to the user
        return view('recommendations.index', compact('movies', 'movie_ratings'));
    }

    private function getTopMoviesByGenre($genre, $movie_ids, $ratings_matrix, $userFactors, $itemFactors, $user_ratings)
    {
        $movie_ratings = [];

        foreach ($movie_ids as $movie_id) {
            if (isset($user_ratings[$movie_id])) {
                // Skip movies that the user has already rated
                continue;
            }

            // Calculate average rating for movie among other users
            $movie_sum = 0;
            $num_ratings = 0;

            foreach ($userFactors as $other_user_id => $other_user_factors) {
                if ($other_user_id == auth()->user()->id) {
                    continue;
                }

                $other_ratings = $ratings_matrix[$other_user_id] ?? [];

                if (isset($other_ratings[$movie_id])) {
                    $movie_sum += $other_ratings[$movie_id];
                    $num_ratings++;
                }
            }

            if ($num_ratings > 0) {
                $average_rating = $movie_sum / $num_ratings;
                $movie_ratings[$movie_id] = $average_rating;
            }
        }

        arsort($movie_ratings, SORT_NUMERIC); // Sort movie ratings by their numeric values in descending order

        // Filter top movies by the specified genre
        $genre_movies = [];
        foreach ($movie_ratings as $movie_id => $rating) {
            $movie = Movie::find($movie_id);
            if (strpos($movie->genre, $genre) !== false) {
                $genre_movies[$movie_id] = $rating;
            }
        }

        return $genre_movies;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;


class MoviesController extends Controller
{
    public function index()
    {
        $movies = Movie::all();

        return view('movies.index', compact('movies'));
    }

    public function rate(Movie $movie)
    {
        $user_id = Auth::id();
        $previous_rating = $movie->ratings()->where('user_id', $user_id)->first();

        // Display a form to rate the movie
        return view('movies.rate', compact('movie', 'previous_rating'));
    }


    public function submitRating(Request $request, $id)
    {
        
        $movie = Movie::findOrFail($id);
        $user_id = Auth::id();
        $rating_value = strval($request->input('rating'));

        $movie->ratings()->updateOrCreate(
            ['user_id' => $user_id],
            ['rating' => $rating_value]
        );

        return redirect()->back()->with('success', 'Rating submitted successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $movies = Movie::where('title', 'like', '%' . $query . '%')
            ->get();

        return view('movies.index', ['movies' => $movies]);
    }


}


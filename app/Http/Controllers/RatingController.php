<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller

{
    public function rate_create()
    {
        return view('admin.rating');
    }

    //index
    public function rate_index()
    {
        $data=Rating::all();
        return view('admin.ratingIndex',compact('data'));

    }

    // delete rating
    public function delete_rate($id)
    {
        $data=Rating::find($id);
         $data->delete();
         return redirect()->route('rateindex')->with('ratedelete','Rate deleted Succesfully');
    }
    

    // generate the data into matrix form
    public function convertToMatrix()
{
    // Fetch the user_id, movie_id, and rating data from your database
    $data = DB::table('ratings')->select('user_id', 'movie_id', 'rating')->get();

    // Create an empty 2D array to hold the matrix
    $matrix = [];

    // Loop through the fetched data and insert the rating value into the matrix
    foreach ($data as $row) {
        $user_id = $row->user_id;
        $movie_id = $row->movie_id;
        $rating = $row->rating;

        if (!isset($matrix[$user_id])) {
            $matrix[$user_id] = [];
        }
             // Check if rating is null and set it to 0 if so
             $matrix[$user_id][$movie_id] = $rating === null ? 0 : $rating;
         

        $matrix[$user_id][$movie_id] = $rating;

        
    }

    // Pass the matrix to a view
    return view('admin.matrix', ['matrix' => $matrix]);
}


}

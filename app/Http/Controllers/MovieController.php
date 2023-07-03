<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function movie_create()
    {
        return view('admin.movie');
    }

    // add movie
    public function add_movie(Request $request)
    {
            $data= new movie;
            $data->title=$request->title;
            $data->genre=$request->genre;

            $data->save();

            // return Redirect->back();
            return redirect()->route('create')->with('message','Movie added Succesfully');
    }
    //index
    public function movie_index()
    {
        $data=Movie::all();
        return view('admin.movieIndex',compact('data'));
    }

    // edit movie
    public function update_movie($id)
    {
        $movie = Movie::find($id);
        
        return view('admin.movieedit', compact('movie'));
    }
    

    // delete movie
    public function delete_movie($id)
    {
        $data=Movie::find($id);
         $data->delete();
         return redirect()->route('index')->with('delete','Movie deleted Succesfully');
    }
 
    public function about(){
        return view('movies.about');
    }





}

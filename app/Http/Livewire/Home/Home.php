<?php

namespace App\Http\Livewire\Home;
use App\Models\Movie;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {

        $movies = Movie::orderBy('created_at', 'desc')->take(20)->get();

        return view('movies.home', ['movies' => $movies]);
    }
}

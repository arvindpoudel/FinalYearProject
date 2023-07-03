<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserMoviesController;
use App\Http\livewire\RatingMatrixForm;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('user.index');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
route::get('/redirect',[HomeController::class,'redirect'])->name('redirect');
route::get('/movie_create',[MovieController::class,'movie_create'])->name('create');
//add movie
route::post('/add_movie',[MovieController::class,'add_movie']);

// index movie
route::get('/movie_index',[MovieController::class,'movie_index'])->name('index');
//to delete movie
route::get('/delete_movie/{id}',[MovieController::class,'delete_movie'])->name('delete');

//to edit movie
route::get('/update_movie/{id}',[MovieController::class,'update_movie'])->name('update');
route::post('/add_movie/{id}',[MovieController::class,'add_movie'])->name('add_movies');


//Rating
route::get('/rate_create',[RatingController::class,'rate_create'])->name('ratecreate');

// rating index
route::get('/rate_index',[RatingController::class,'rate_index'])->name('rateindex');

// delete rating
route::get('/delete_rating/{id}',[RatingController::class,'delete_rate'])->name('ratedelete');

// generate into matrix form
route::get('/convertToMatrix',[RatingController::class,'convertToMatrix'])->name('matrix');




// to add rating
route::post('/add_rating',[RatingController::class,'add_rating']);


// Frontend
// fetch the data
route::get('/user_rate',[RatingController::class,'user_rate'])->name('userrate');
Route::get('/movies', [\App\Http\Controllers\MoviesController::class, 'index'])->name('movies.index');
Route::get('/movies/{movie}/rate', [\App\Http\Controllers\MoviesController::class, 'rate'])->name('movies.rate');
Route::post('/movies/{movie}/rate', [\App\Http\Controllers\MoviesController::class, 'submitRating'])->name('movies.submitRating');
Route::get('/recommendations', [App\Http\Controllers\RecommendationController::class, 'index'])->name('recommendations.index')->middleware('auth');;
Route::get('/movies/search', [\App\Http\Controllers\MoviesController::class, 'search'])->name('movies.search');
Route::get('/movies/about', [\App\Http\Controllers\MovieController::class, 'about'])->name('movies.about');



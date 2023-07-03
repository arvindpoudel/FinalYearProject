<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;


class Rating extends Model
{
    use HasFactory;
    protected $table = 'ratings';
    protected $fillable = ['user_id', 'movie_id','rating','title'];
    public function movies()

    {
        return $this->belongsTo(Movie::class,'movie_id','id');
    }
}




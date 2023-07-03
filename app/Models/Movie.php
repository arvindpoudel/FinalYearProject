<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';
    protected $fillable = ['title', 'genre','average_rating'];
    public function ratings()
    {
        return $this->hasMany(Rating::class);
        // return $this->belongsTo(Rating::class);
    }
}

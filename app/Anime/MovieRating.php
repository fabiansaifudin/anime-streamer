<?php

namespace App\Anime;

use Illuminate\Database\Eloquent\Model;

class MovieRating extends Model
{
    protected $table = "movie_star";

    public function movie()
    {
        return $this->belongsTo('App\Anime\Movie');
    }
}

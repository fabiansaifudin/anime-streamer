<?php

namespace App\Anime;

use Illuminate\Database\Eloquent\Model;

class MovieCover extends Model
{
    protected $table = "cover_movie";

    public function movie()
    {
        return $this->belongsTo('App\Anime\Movie');
    }
}

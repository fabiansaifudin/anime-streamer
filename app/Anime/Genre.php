<?php

namespace App\Anime;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genre';

    public function anime()
    {
        return $this->belongsToMany('App\Anime\Anime');
    }

    public function movie()
    {
        return $this->belongsToMany('App\Anime\Movie');
    }
}

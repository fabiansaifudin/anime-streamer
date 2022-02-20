<?php

namespace App\Anime;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'anime_star';

    public function anime()
    {
        return $this->belongsTo('App\Anime\Anime');
    }
}

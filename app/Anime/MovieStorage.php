<?php

namespace App\Anime;

use Illuminate\Database\Eloquent\Model;

class MovieStorage extends Model
{
    protected $table = "storages";

    public function movie()
    {
        return $this->belongsTo('App\Anime\Movie');
    }
}

<?php

namespace App\Anime;

use Illuminate\Database\Eloquent\Model;

class Storages extends Model
{
    protected $table = "storages";

    public function movie()
    {
        return $this->belongsToMany('App\Anime\Movie');
    }
}

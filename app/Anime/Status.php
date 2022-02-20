<?php

namespace App\Anime;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    public function anime()
    {
        return $this->belongsToMany('App\Anime\Anime');
    }

    public function movie()
    {
        return $this->belongsToMany('App\Anime\Movie');
    }
}

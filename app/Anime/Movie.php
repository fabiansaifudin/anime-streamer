<?php

namespace App\Anime;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = "movie";

    public function genre()
    {
    	return $this->belongsToMany('App\Anime\Genre');
    }

    public function rating()
    {
        return $this->hasOne('App\Anime\MovieRating');
    }

    public function status()
    {
        return $this->belongsToMany('App\Anime\Status');
    }

    public function storage()
    {
        return $this->belongsToMany('App\Anime\Storages');
    }

    public function cover()
    {
        return $this->hasOne('App\Anime\MovieCover');
    }
}

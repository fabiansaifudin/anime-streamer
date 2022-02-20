<?php

namespace App\Anime;

use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    protected $table = "anime";

    public function genre()
    {
    	return $this->belongsToMany('App\Anime\Genre');
    }

    public function rating()
    {
        return $this->hasOne('App\Anime\Rating');
    }

    public function status()
    {
        return $this->belongsToMany('App\Anime\Status');
    }

    public function storage()
    {
        return $this->belongsToMany('App\Anime\Storage');
    }

    public function cover()
    {
        return $this->hasOne('App\Anime\Cover');
    }
}

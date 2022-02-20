<?php

namespace App\Anime;

use Illuminate\Database\Eloquent\Model;

class Cover extends Model
{
    protected $table = "anime_cover";

    public function anime()
    {
        return $this->belongsTo('App\Anime\Anime');
    }

}

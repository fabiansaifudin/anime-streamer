<?php

namespace App\Anime;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    protected $table = "storage";

    public function anime()
    {
        return $this->belongsToMany('App\Anime\Anime');
    }
}

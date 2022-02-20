<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function tags(){
    	return $this->hasMany('App\Tag');
    }
    public function user(){
    	return $this->hasOne('App\User');
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Anime\Movie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function getMovie()
    {
        $movie = Movie::get();
        $array = array();
        foreach ($movie as $value) {
            $array[] = $value;
            $value->genre;
            $value->status;
            $value->rating;
            $value->cover;
            $value->storage;
        }
        return $array;
    }
}

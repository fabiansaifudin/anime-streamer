<?php

namespace App\Http\Controllers\Api;

use App\Anime\Anime;
use App\Anime\Genre;
use App\Anime\Rating;
use App\Anime\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function getAnime()
    {
        $anime = Anime::get();
        $array = array();
        foreach ($anime as $value) {
            $array[] = $value;
            $value->genre;
            $value->status;
            $value->rating;
            $value->cover;
            $value->storage;
        }
        return $array;
    }

    public function postAnime(Request $request)
    {
        return $request;
    }

    public function getStatus()
    {
        $status = Status::get();
        return $status;
    }

    public function postStatus(Request $request)
    {
        return $request;
    }

    public function getGenre()
    {
        $genre = Genre::get();
        return $genre;
    }

    public function postGenre(Request $request)
    {
        return $request;
    }

    public function getRating()
    {
        $rating = Rating::get();
        return $rating;
    }

    public function postRating(Request $request)
    {
        return $request;
    }

}

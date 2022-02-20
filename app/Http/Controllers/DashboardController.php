<?php

namespace App\Http\Controllers;

use App\Anime\Anime;
use App\Anime\Movie;
use App\Anime\Storage;
use App\Anime\Storages;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $anime = Anime::all();
        $movie = Movie::all();
        $stora = Storage::all();
        $storag = Storages::all();
        return view('movie.index', ["anime"=>$anime,"movie"=>$movie,"store_anime"=>$stora,"store_movie"=>$storag]);
    }
}

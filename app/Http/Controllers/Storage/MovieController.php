<?php

namespace App\Http\Controllers\Storage;

use App\Anime\Movie;
use App\Anime\MovieCover;
use App\Anime\Storages;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $movie = Movie::all();
        $store = Storages::all();
        $cover = MovieCover::all();
        return view('movie.movie.storage', ["movie"=>$movie, "storage"=>$store, "cover"=>$cover]);
    }

    public function findMovieStore($id)
    {
        $mov = Movie::find($id);
        $mov->cover;
        $mov->storage;
        return response()->json($mov);
    }

    public function uploadCover(Request $request)
    {
        $cover = new MovieCover;
        $cover->movie_id = $request->cover_post_id;
        $cover->cover = $request->cover;
        $cover->save();
        return redirect('/store/movie')->with('success','Data berhasil disimpan');
    }

    public function saveToStore(Request $request)
    {
        $storage = new Storages;
        $storage->location = $request->video;
        $storage->save();
        DB::table('movie_storages')->insert([
            'movie_id' => $request->post_id,
            'storages_id' => $request->id
        ]);
        return redirect('/store/movie')->with('success','Data berhasil disimpan');
    }
}

<?php

namespace App\Http\Controllers\Movie;

use App\Anime\Movie;
use App\Anime\Anime;
use App\Anime\MovieCover;
use App\Anime\MovieRating;
use App\Anime\Rating;
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
        $movie = Movie::get();
        return view('movie.movie.list_data', ['movie' => $movie]);
    }

    public function savemovie(Request $request)
    {
        $movie = new Movie;
        $movie->id = $request->post_id;
        $movie->judul_movie = $request->judul_movie;
        $movie->deskripsi = $request->deskripsi;
        $movie->durasi = $request->durasi;
        $movie->save();
        // DB::table('movie_star')->insert([
        //     'movie_id' => $request->post_id,
        //     'rating' => 0
        // ]);
        DB::table('movie_status')->insert([
            'movie_id' => $request->post_id,
            'status_id' => 0
        ]);
        $star = new MovieRating;
        $star->movie_id = $request->post_id;
        $star->rating = 0;
        return redirect('/movie/data')->with('success','Data berhasil disimpan');
    }

    public function findMovie($id)
    {
        $find = Movie::find($id);
        return response()->json($find);
    }

    public function updateMovie(Request $request)
    {
        $update = Movie::find($request->id);
        $update->judul_movie = $request->judul_movie;
        $update->deskripsi = $request->deskripsi;
        $update->durasi = $request->durasi;
        $update->save();
        return response()->json($update);
    }

    public function deleteMovie($id)
    {
        $mov = Movie::where('id',$id);
        $rati = MovieRating::where('id',$id);
        $cov = MovieCover::where('movie_id', $id);
        $movgen = DB::table('genre_movie')->where('movie_id', '=', $id);
        $anisto = DB::table('movie_storages')->where('movie_id', '=', $id);
        $movsta = DB::table('movie_status')->where('movie_id', '=', $id);
        if (empty($rati) || empty($movgen)) {
            $mov->delete();
            $movsta->delete();
        } else {
            $mov->delete();
            $rati->delete();
            $movgen->delete();
            $movsta->delete();
            $cov->delete();
            $anisto->delete();
        }
        return redirect('/movie/data')->with("success", "Data berhasil dihapus");
    }
}

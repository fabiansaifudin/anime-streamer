<?php

namespace App\Http\Controllers\Movie;

use App\Anime\Movie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $movie = Movie::paginate(10);
        return view('movie.movie.genre', ["movie"=>$movie]);
    }

    public function findGenre($id) {
        // $anige = DB::table('anime_genre')->where('anime_id', '=', $id)->get();
        $ani = Movie::find($id);
        $ani->genre;
        return response()->json($ani);
    }

    public function whereGenre($id)
    {
        $anige = DB::table('genre_movie')->where('movie_id', '=', $id)->get();
        return response()->json($anige);
    }

    public function saveGenre(Request $request)
    {
        for ($i = 0;$i < count($request->genre);$i++) {
            DB::table('genre_movie')->insert([
                "movie_id" => $request->post_id,
                "genre_id" => $request->genre[$i]
            ]);
        }
        return redirect('/movie/genre')->with('success','Data berhasil disimpan');
        // return response()->json($request);
    }

    public function deleteGenre($id)
    {
        $delete = DB::table('genre_movie')->where('id', '=', $id)->delete();
        return redirect('/movie/genre')->with("success", "Data berhasil dihapus");
    }
}

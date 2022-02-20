<?php

namespace App\Http\Controllers\Anime;

use App\Anime\Anime;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $anime = Anime::all();
        return view('movie.anime.genre', ['anime' => $anime]);
    }

    public function findGenre($id) {
        // $anige = DB::table('anime_genre')->where('anime_id', '=', $id)->get();
        $ani = Anime::find($id);
        $ani->genre;
        return response()->json($ani);
    }

    public function whereGenre($id)
    {
        $anige = DB::table('anime_genre')->where('anime_id', '=', $id)->get();
        return response()->json($anige);
    }

    public function saveGenre(Request $request)
    {
        for ($i=0; $i < count($request->genre); $i++) {
            DB::table('anime_genre')->insert([
                "anime_id" => $request->post_id,
                "genre_id" => $request->genre[$i]
            ]);
        }
        // DB::table('anime_genre')->insert([
        //     "anime_id" => $request->post_id,
        //     "genre_id" => $request->genre
        // ]);
        return redirect('/anime/genre')->with('success','Data berhasil disimpan');
        // return response()->json($request);
    }

    public function deleteGenre($id)
    {
        $delete = DB::table('anime_genre')->where('id', '=', $id)->delete();
        return redirect('/anime/genre')->with("success", "Data berhasil dihapus");
    }
}

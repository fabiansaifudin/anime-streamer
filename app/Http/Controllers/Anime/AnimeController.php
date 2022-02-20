<?php

namespace App\Http\Controllers\Anime;

use App\Anime\Anime;
use App\Anime\Cover;
use App\Anime\Rating;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnimeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $anime = Anime::all();
        return view('movie.anime.list_data', compact('anime'));
    }

    public function findAnime($id)
    {
        $find = Anime::find($id);
        return response()->json($find);
    }

    public function saveanime(Request $request)
    {
        $data = new Anime;
        $data->id = $request->post_id;
        $data->judul_anime = $request->judul_anime;
        $data->deskripsi = $request->deskripsi;
        $data->durasi = $request->durasi;
        $data->save();
        $rating = new Rating;
        $rating->rating = 0;
        $rating->anime_id = $request->post_id;
        $rating->save();
        // DB::table('anime_rating')->insert([
        //     'anime_id' => $request->post_id,
        //     'rating_id' => 0
        // ]);
        DB::table('anime_status')->insert([
            'anime_id' => $request->post_id,
            'status_id' => 0
        ]);
        // $genre = $request->genre;
        // for ($i=0; $i < count($genre); $i++) {
        //     DB::table('anime_genre')->insert([
        //         'anime_id' => $request->id,
        //         'genre_id' => $genre[$i]
        //     ]);
        // }

        $rating = new Rating;
        $rating->id = $request->id;
        $rating->rating = $request->rating_anime;
        $rating->save();
        return redirect('/anime/data')->with('success','Data berhasil disimpan');
    }

    public function changeanime(Request $request)
    {
        $update = Anime::find($request->id);
        $update->judul_anime = $request->judul_anime;
        $update->deskripsi = $request->deskripsi;
        $update->durasi = $request->durasi;
        $update->save();
        return response()->json($update);
        // return $request->all();
    }

    public function deleteAnime($id)
    {
        $ani = Anime::where('id',$id);
        $rati = Rating::where('anime_id',$id);
        $cov = Cover::where('anime_id', $id);
        $anigen = DB::table('anime_genre')->where('anime_id', '=', $id);
        $anisto = DB::table('anime_storage')->where('anime_id', '=', $id);
        $anista = DB::table('anime_status')->where('anime_id', '=', $id);
        if (empty($rati) || empty($anigen) || empty($cov) || empty($anisto)) {
            $ani->delete();
            $anista->delete();
        } else {
            $ani->delete();
            $rati->delete();
            $anigen->delete();
            $anista->delete();
            $cov->delete();
            $anisto->delete();
        }
        // Anime::where('id',$id)->delete();
        // Rating::where('id',$id)->delete();
        // DB::table('anime_genre')->where('anime_id', '=', $id)->delete();
        // DB::table('anime_rating')->where('anime_id', '=', $id)->delete();
        // DB::table('anime_status')->where('anime_id', '=', $id)->delete();
        return redirect('/anime/data')->with("success", "Data berhasil dihapus");
    }
}

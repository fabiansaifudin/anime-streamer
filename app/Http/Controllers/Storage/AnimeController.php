<?php

namespace App\Http\Controllers\Storage;

use App\Anime\Anime;
use App\Anime\Cover;
use App\Anime\Storage;
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
        $store = Storage::all();
        $cover = Cover::all();
        return view('movie.anime.storage', ["anime"=>$anime, "storage"=>$store, "cover"=>$cover]);
    }

    public function findAnimeStore($id)
    {
        $ani = Anime::find($id);
        $ani->cover;
        $ani->storage;
        return response()->json($ani);
    }

    public function uploadCover(Request $request)
    {
        $cover = new Cover;
        $cover->anime_id = $request->cover_post_id;
        $cover->cover = $request->cover;
        $cover->save();
        return redirect('/store/anime')->with('success','Data berhasil disimpan');
    }

    public function saveToStore(Request $request)
    {
        $storage = new Storage;
        $storage->episode = $request->epsod;
        $storage->location = $request->video;
        $storage->save();
        DB::table('anime_storage')->insert([
            'anime_id' => $request->post_id,
            'storage_id' => $request->id
        ]);
        return redirect('/store/anime')->with('success','Data berhasil disimpan');
    }
}

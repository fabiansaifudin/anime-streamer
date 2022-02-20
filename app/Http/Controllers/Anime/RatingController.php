<?php

namespace App\Http\Controllers\Anime;

use App\Anime\Anime;
use App\Anime\Rating;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $anime = Anime::paginate(10);
        return view('movie.anime.rating', ['anime' => $anime]);
    }

    public function getRating($id)
    {
        $rats = Anime::find($id);
        $rats->rating;
        return response()->json($rats);
    }

    public function saveRating(Request $request)
    {
        // $rat = new Rating;
        // $rat->anime_id = $request->id;
        // $rat->rating = $request->rating_anime;
        // DB::table('anime_rating')->where('anime_id', '=', $request->id)->update([
        //     'anime_id' => $request->id,
        //     'rating_id' => $request->id
        // ]);
        // $rat->save();
        $update = Rating::where('anime_id', $request->id)->update([
            'rating'=>$request->rating_anime
        ]);
        return redirect('/anime/rating')->with('success', 'Data berhasil disimpan');
        // return response()->json($request);
    }
}

<?php

namespace App\Http\Controllers\Movie;

use App\Anime\Movie;
use App\Anime\MovieRating;
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
        $movie = Movie::paginate(10);
        return view('movie.movie.rating', ['movie' => $movie]);
    }

    public function getRating($id)
    {
        $rats = Movie::find($id);
        $rats->rating;
        return response()->json($rats);
    }

    public function saveRating(Request $request)
    {
        $update = MovieRating::where('movie_id', $request->id)->update([
            'rating'=>$request->rating_movie
        ]);
        return redirect('/movie/rating')->with('success', 'Data berhasil disimpan');
    }
}

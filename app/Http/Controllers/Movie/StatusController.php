<?php

namespace App\Http\Controllers\Movie;

use App\Anime\Movie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $movie = Movie::paginate(10);
        return view('movie.movie.status', ['movie' => $movie]);
    }

    public function getStatus($id)
    {
        $sta = Movie::find($id);
        $sta->status;
        return response()->json($sta);
    }

    public function saveStatus(Request $request)
    {
        DB::table('movie_status')->where('movie_id', '=', $request->id)->update([
            'movie_id' => $request->id,
            'status_id' => $request->status
        ]);
        return redirect('/movie/status')->with('success', 'Data berhasil disimpan');
    }
}

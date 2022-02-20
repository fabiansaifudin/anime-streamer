<?php

namespace App\Http\Controllers\Anime;

use App\Anime\Anime;
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
        $anime = Anime::paginate(10);
        return view('movie.anime.status', ['anime' => $anime]);
    }

    public function getStatus($id)
    {
        $sta = Anime::find($id);
        $sta->status;
        return response()->json($sta);
    }

    public function saveStatus(Request $request)
    {
        DB::table('anime_status')->where('anime_id', '=', $request->id)->update([
            'anime_id' => $request->id,
            'status_id' => $request->status
        ]);
        return redirect('/anime/status')->with('success', 'Data berhasil disimpan');
    }
}

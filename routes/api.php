<?php

use App\Anggota;
use App\Anime\Anime;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return json_encode(['message'=>'Maaf kamu tidak dapat mengakses API ini']);
});

Route::prefix('anime')->group(function () {
    Route::get('/', 'Api\AnimeController@getAnime');
    // Route::post('save', 'Api\AnimeController@postAnime');
    // Route::put('update', 'Api\AnimeController@putAnime');
    // Route::delete('delete', 'Api\AnimeController@deleteAnime');
});
Route::get('movie', 'Api\MovieController@getMovie');

// Route::put('data_anime/change', 'Anime\AnimeController@changeanime');

// Route::prefix('status')->group(function () {
//     Route::get('/', 'Api\AnimeController@getStatus');
// });

// Route::prefix('genre')->group(function () {
//     Route::get('/', 'Api\AnimeController@getGenre');
// });

// Route::prefix('rating')->group(function () {
//     Route::get('/', 'Api\AnimeController@getRating');
// });

Route::post('users', function (Request $request) {
    return Hash::make($request->password);
});

// Route::get('anime', function () {
//     $anime = Anime::get();
//     foreach ($anime as $anim) {
//         $genre = $anim->genre;
//         $status = $anim->status;
//         $stream = $anim;
//     }
//     return $stream;
// });

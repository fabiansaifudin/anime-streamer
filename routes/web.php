<?php

use App\Anggota;
use App\Anime\Anime;
use App\Anime\Genre;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('movie.index');
// });
Route::redirect('/', 'dashboard')->name('beranda');
Route::get('dashboard', 'DashboardController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/home/create', 'HomeController@home')->name('home_home');
// Route::post('/home/create', 'HomeController@input')->name('home_input');

// Sidebar Anime
Route::prefix('anime')->group(function () {
    Route::get('/', function () {
        return redirect('/anime/data')->with('message', 'Maaf!! url kami alihkan');
    });
    // Data Anime
    Route::prefix('data')->group(function () {
        Route::get('/', 'Anime\AnimeController@index')->name('anime');
        Route::post('save', 'Anime\AnimeController@saveanime')->name('save');
        Route::get('get/id={id}', 'Anime\AnimeController@findAnime')->name('editAnime');
        Route::put('change', 'Anime\AnimeController@changeanime')->name('change');
        Route::delete('delete/id={id}', 'Anime\AnimeController@deleteAnime')->name('deleteAnime');
    });

    // Genre Anime
    Route::prefix('genre')->group(function () {
        Route::get('/', 'Anime\GenreController@index')->name('genreAnime');
        Route::get('get/id={id}', 'Anime\GenreController@findGenre')->name('findGenre');
        Route::get('where/id={id}', 'Anime\GenreController@whereGenre')->name('whereAnimeGenre');
        Route::post('save', 'Anime\GenreController@saveGenre')->name('saveGenre');
        Route::delete('delete/id={id}', 'Anime\GenreController@deleteGenre')->name('deleteGenre');
    });

    Route::prefix('status')->group(function () {
        Route::get('/', 'Anime\StatusController@index')->name('animeStatus');
        Route::get('get/id={id}', 'Anime\StatusController@getStatus')->name('findStatus');
        Route::post('save', 'Anime\StatusController@saveStatus')->name('saveStatus');
    });

    Route::prefix('rating')->group(function () {
        Route::get('/', 'Anime\RatingController@index')->name('ratingAnime');
        Route::get('get/id={id}', 'Anime\RatingController@getRating')->name('findRating');
        Route::post('save', 'Anime\RatingController@saveRating')->name('saveRating');
    });
});

// Movie Data
Route::prefix('movie')->group(function () {
    Route::get('/', function () {
        return redirect('/movie/data')->with('message', 'Maaf!! url kami alihkan');
    });
    Route::prefix('data')->group(function () {
        Route::get('/', 'Movie\MovieController@index')->name('movie');
        Route::post('save', 'Movie\MovieController@savemovie')->name('saveMovie');
        Route::get('get/id={id}', 'Movie\MovieController@findMovie')->name('editMovie');
        Route::put('change', 'Movie\MovieController@updateMovie')->name('movieChange');
        Route::delete('delete/id={id}', 'Movie\MovieController@deleteMovie')->name('deleteMovie');
    });

    Route::prefix('genre')->group(function () {
        Route::get('/', 'Movie\GenreController@index')->name('movieGenre');
        Route::get('get/id={id}', 'Movie\GenreController@findGenre')->name('findMovieGenre');
        Route::get('where/id={id}', 'Movie\GenreController@whereGenre')->name('whereMovieGenre');
        Route::post('save', 'Movie\GenreController@saveGenre')->name('saveMovieGenre');
        Route::delete('delete/id={id}', 'Movie\GenreController@deleteGenre')->name('deleteMovieGenre');
    });

    Route::prefix('status')->group(function () {
        Route::get('/', 'Movie\StatusController@index')->name('movieStatus');
        Route::get('get/id={id}', 'Movie\StatusController@getStatus')->name('findMovieStatus');
        Route::post('save', 'Movie\StatusController@saveStatus')->name('saveMovieStatus');
    });

    Route::prefix('rating')->group(function () {
        Route::get('/', 'Movie\RatingController@index')->name('movieRating');
        Route::get('get/id={id}', 'Movie\RatingController@getRating')->name('findMovieRating');
        Route::post('save', 'Movie\RatingController@saveRating')->name('saveMovieRating');
    });
});

// Anime Storage
Route::prefix('store')->group(function () {
    Route::get('/', function () {
        return redirect('/storage/anime')->with('message', 'Maaf!! url kami alihkan');
    });
    Route::post('upload', 'Storage\UploadController@upload')->name('upload');
    Route::prefix('anime')->group(function () {
        Route::get('/', 'Storage\AnimeController@index')->name('stanime');
        Route::get('get/id={id}', 'Storage\AnimeController@findAnimeStore')->name('findanisto');
        Route::post('upload-cover', 'Storage\AnimeController@uploadCover')->name('coverUpload');
        Route::post('upload-anime', 'Storage\AnimeController@saveToStore')->name('animeUpload');
    });
    Route::prefix('movie')->group(function () {
        Route::get('/', 'Storage\MovieController@index')->name('stmovie');
        Route::get('get/id={id}', 'Storage\MovieController@findMovieStore')->name('findmovsto');
        Route::post('upload-cover', 'Storage\MovieController@uploadCover')->name('coverUploadMovie');
        Route::post('upload-movie', 'Storage\MovieController@saveToStore')->name('movieUpload');
    });
});

// Profile Admin
Route::get('profile', function () {
    return "Hello";
})->name('profil');
Route::get('setelan', function () {
    return "Hello";
})->name('settings');

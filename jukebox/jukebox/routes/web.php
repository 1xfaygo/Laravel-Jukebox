<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;


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

Route::get('/', function () {
    return view('welcome');
});







Route::get('artists', function(){
    return view('Artists');
});
// artist routes:
Route::resource('artists', ArtistController::class);



Route::get('albums', function(){
    return view('albums');
});







Route::get('songs', function(){
    return view('songs');
});
// Songs Routes
Route::resource('songs', SongController::class);









Route::get('genres',function(){
    return view('genres');
});
// Genre Routes
Route::resource('genres', GenreController::class)->only(['index', 'show']);








// Playlist Routes
Route::resource('playlist', PlaylistController::class);

// album routes:
Route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');




<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Authcontroller;
use App\Http\Controllers\API\AlbumController;
use App\Http\Controllers\API\SongController;
use App\Http\Controllers\API\ArtistController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register',[Authcontroller::class,'register']);
Route::get('register',[Authcontroller::class,'register']);
Route::post('login',[Authcontroller::class,'login']);
Route::get('login',[Authcontroller::class,'login']);
Route::resource('albums', AlbumController::class);
Route::resource('artists', ArtistController::class);
Route::resource('songs', SongController::class);


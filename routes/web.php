<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::controller(\App\Http\Controllers\FilmController::class)->group(function () {
//    Route::get('/', 'index')->name('film.index');
//    Route::get('film/{id}', 'show')->name('film.show');
//});
//Route::controller(\App\Http\Controllers\GenreController::class)->group(function () {
//    Route::get('/', 'index')->name('genre.index');
//    Route::get('genre/{id}', 'show')->name('genre.show');
//});
Route::resource('/genres',\App\Http\Controllers\GenreController::class);
Route::resource('/films',\App\Http\Controllers\FilmController::class);

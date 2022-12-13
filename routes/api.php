<?php

use App\Http\Controllers\Book_GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookGenreJunctionController;
use App\Http\Controllers\GenreController;
use App\Http\Resources\BookGenreJunctionCollection;
use Illuminate\Http\Request;
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

Route::middleware('api')->group(function () {
    Route::resource('books', BookController::class);
});

Route::middleware('api')->group(function () {
    Route::resource('genres', GenreController::class);
});

Route::middleware('api')->group(function () {
    Route::resource('book_genres', BookGenreJunctionController::class);
});

Route::post('/book/create', 'BookController@store');
Route::post('/book/edit/{id}', 'BookController@update');

Route::post('/book-genre/create', 'BookGenreJunctionController@store');

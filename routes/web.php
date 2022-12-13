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

// Route::get('/', function () {
//     return view('post');
// });

Route::get('/{any}', function () {
    return view('post');
})->where('any', '.*');

Route::post('/book/create', 'BookController@store');
Route::post('/book/edit/{id}', 'BookController@update');

Route::post('/book-genre/create', 'BookGenreJunctionController@store');

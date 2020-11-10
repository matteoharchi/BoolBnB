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
//     return view('home');
// });

Route::get('/search', function () {
    return view('search');
});

Auth::routes();

Route::prefix('user')->namespace('User')->middleware('auth')->group(function () {
    Route::resource('houses', 'HouseController');
    });

Route::get('/', 'HouseController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('houses/show/{slug}', 'HouseController@show')->name('houses.show');
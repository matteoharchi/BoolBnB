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

Route::get('/search', 'HouseController@search');

Auth::routes();
//rotte case di user
Route::prefix('user')->namespace('User')->middleware('auth')->group(function () {
    Route::resource('settings/houses', 'HouseController');
    Route::get('/settings', 'HouseController@index');
    // Route::post('/settings/updateinfo', 'UserController@update')->name('user.update');
    Route::get('/settings/houses/show/{slug}', 'HouseController@show');
    //rotte sponsor
    Route::resource('settings/houses/sponsor', 'SponsorController');
    //rotte pagamenti
    Route::get('settings/houses/sponsor/create/{id}', 'SponsorController@getPay')->name('sponsor.create');
    Route::post('checkout', 'SponsorController@postPay')->name('checkout');
    //rotte statistiche
    Route::post('counter', 'HouseController@postView')->name('view.store');
    Route::get('settings/houses/{id}/stats', 'HouseController@viewsStats')->name('stats.views');
});

//rotte messaggi
Route::resource('houses/messages', 'MessageController');

//rotte case guest
Route::get('/', 'HouseController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('houses/show/{slug}', 'HouseController@show')->name('houses.show');
Route::post('counter', 'HouseController@postView')->name('view.store');

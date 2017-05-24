<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::resource('rooms', 'RoomsController');
Route::resource('songs', 'SongsController');

Route::get('/', ['as' => 'index', 'uses' => 'DJ\DjController@index']);

Route::group([], function(){
    Route::get('master/{id}', ['uses' => 'TV\TvController@master']);
    Route::get('slave/{id}', ['uses' => 'TV\TvController@slave']);
});

Route::group(['prefix' => 'dj'], function(){
    Route::get('/', ['uses' => 'DJ\DjController@index']);
    Route::get('/room/{id}', ['uses' => 'DJ\DjController@room', 'as' => 'dj.room']);
});

Route::get('/test', function(){
    return view('test');
});

Route::get('/test2', function(){
    return view('test2');
});


Route::get('/check/{code}', ['as' => 'check.code', 'uses' => 'SongsController@check']);
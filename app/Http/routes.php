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

Route::get('/', 'SongsController@index');
Route::post('/song/vote', 'SongsController@vote')->middleware('auth');

Route::post('/auth/login', 'Auth\AuthController@ajaxLogin');
Route::get('/auth/otl/{token}', 'Auth\PasswordController@getReset');
Route::post('/auth/otl', 'Auth\PasswordController@postReset');
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/prayertree/{prayertree_id}', 'HomeController@prayertree');

Route::get('/prayertrees', 'prayerTreeController@index');

Route::get('/contacts', 'contactController@index');
Route::post('/contacts', 'contactController@store');
Route::get('/contacts/{id}', 'contactController@show');
Route::patch('/contacts/{id}', 'contactController@update');

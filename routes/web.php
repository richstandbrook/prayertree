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
Route::get('/prayertrees/create', 'prayerTreeController@create');
Route::get('/prayertrees/{prayertree_id}', 'prayerTreeController@show');
Route::get('/prayertrees/{prayertree_id}/contacts', 'contactController@index');
Route::get('/prayertrees/{prayertree_id}/requests', 'prayerRequestController@index');
Route::post('/prayertrees', 'prayerTreeController@store');

Route::get('/prayertrees/{prayertree_id}/requests/create', 'prayerRequestController@create');
Route::post('/prayertrees/{prayertree_id}/requests', 'prayerRequestController@store');
Route::put('/prayertrees/{prayertree_id}/requests', 'prayerRequestController@store');

Route::put('/prayerrequests/{prayerrequest_id}', 'prayerRequestController@update');

Route::get('/contacts', 'contactController@index');
Route::post('/contacts', 'contactController@store');
Route::get('/contacts/{id}', 'contactController@show');
Route::patch('/contacts/{id}', 'contactController@update');

<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/', 'Hello@show');

Route::get('/layout', function () {
    return view('layout');
});

//Route::get('/CardBoard/', 'CrouseController@show');
//Route::get('/CardBoard/index/', 'CrouseController@index');
Route::resource('CardBoard','CrouseController');

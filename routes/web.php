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
})->middleware('serviceNull');;

Route::get('/loginRedes/{proveedor?}', 'NetworkAccountsController@login');
Route::get('/callback/{proveedor?}', 'NetworkAccountsController@callback');

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('serviceNull');

Route::get('/register', 'NetworkAccountsController@login');

Route::post('/register/createUser', 'NetworkAccountsController@createUser');

Route::get('profile', 'Profile\ProfileController@showProfile');

//Route Admin Panel
Route::get('/admin', 'AdminController@index');

Route::get('/service', 'ServiceController@index');

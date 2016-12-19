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

Route::get('/loginRedes/{proveedor?}', 'NetworkAccountsController@login');
Route::get('/callback/{proveedor?}', 'NetworkAccountsController@callback');

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('serviceNull');

Route::get('/register', 'NetworkAccountsController@login');

Route::post('/register/createUser', 'NetworkAccountsController@createUser');


// Route Profile
Route::get('profile', 'Profile\ProfileController@showProfile');
Route::get('profile/edit', 'Profile\ProfileController@ShowEditProfile');
//Route::put('profile/edit','Profile\ProfileController@editProfile');
Route::post('profile/update', ['as' => 'profile/update', 'uses'=>'Profile\ProfileController@editProfile']);

//Route Admin Panel

Route::resource('admin','AdminController');
Route::get('homeAdmin', 'AdminController@homeAdmin');
Route::post('persona/show', ['as' => 'admin/show', 'uses'=>'AdminController@show']);

Route::get('/service', 'ServiceController@index')->middleware('auth');

Route::post('/service/save', 'ServiceController@create')->middleware('auth');

Route::get('/service/edit/{serviceid}', 'ServiceController@edit')->middleware('auth');

Route::get('/service', 'ServiceController@index');



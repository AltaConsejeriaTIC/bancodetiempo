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

Route::get('admin','AdminController@AdminLogin');
Route::get('homeAdmin', 'AdminController@homeAdmin');
Route::get('homeAdminUser', 'AdminController@homeAdminUser');

Route::resource('adminUser', 'AdminController');
Route::post('adminUser/show', ['as' => 'adminUser/show', 'uses'=>'AdminController@show']);
Route::put('adminUser/update', ['as' => 'adminUser/update', 'uses'=>'AdminController@update']);

Route::resource('homeAdminCategory', 'CategoryController');
Route::post('homeAdminCategory/show', ['as' => 'homeAdminCategory/show', 'uses'=>'CategoryController@show']);
Route::put('homeAdminCategory/update', ['as' => 'homeAdminCategory/update', 'uses'=>'CategoryController@update']);

//Mod Service

Route::get('/service', 'ServiceController@index')->middleware('auth');

Route::post('/service/save', 'ServiceController@create')->middleware('auth');

Route::put('/service/save', 'ServiceController@update')->middleware('auth');

Route::get('/service/{serviceid}', 'ServiceController@showService')->middleware('auth');


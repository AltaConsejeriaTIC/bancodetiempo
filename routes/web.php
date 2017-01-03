<?php

use App\Http\Controllers\Profile\ProfileController;

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

Route::get('/', 'HomeController@indexNotRegister');

Route::get('/loginRedes/{proveedor?}', 'NetworkAccountsController@login');
Route::get('/callback/{proveedor?}', 'NetworkAccountsController@callback');

Auth::routes();
Route::get('/register', 'NetworkAccountsController@showFrom');
Route::post('/register/createUser', 'NetworkAccountsController@createUser');

//Route Access Admin Panel
Route::get('admin','AdminController@AdminLogin')->middleware('guest');;


Route::put('profile/update', 'Profile\ProfileController@editProfile');
Route::put('profile/updatePhoto', 'Profile\ProfileController@editProfile');
Route::get("/profile/interest", 'Profile\ProfileController@showFromInterest');
Route::post("/profile/interest", 'Profile\ProfileController@saveInterest');

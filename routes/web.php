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
Route::get('/guest', 'GuestHomeController@index');
Route::get('/terms', 'TermsController@index');
Route::get('/test', 'TestController@index');

Route::get('/loginRedes/{proveedor?}', 'NetworkAccountsController@login');
Route::get('/callback/{proveedor?}', 'NetworkAccountsController@callback');

Auth::routes();


//Route Access Admin Panel
Route::get('admin','AdminController@AdminLogin')->middleware('guest');


Route::get('/register', 'NetworkAccountsController@showFrom')->middleware('register');
Route::post('/register/createUser', 'NetworkAccountsController@createUser');

Route::put('profile/update', 'Profile\ProfileController@editProfile');
Route::put('profile/updatePhoto', 'Profile\ProfileController@editProfile');
Route::get("/interest", 'Profile\ProfileController@showFromInterest')->middleware('register');
Route::post("/interest", 'Profile\ProfileController@saveInterest');


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
Route::get('/index', 'HomeController@indexNotRegister');
Route::get('/home', 'HomeController@index')->middleware('passRegister');
Route::get('/content/{name}', 'ContentController@index');

//Social Loging

Route::get('/loginRedes/{proveedor?}', 'NetworkAccountsController@login');
Route::get('/callback/{proveedor?}', 'NetworkAccountsController@callback');

Auth::routes();

//Route Access Admin Panel
Route::get('admin','AdminController@AdminLogin')->middleware('guest');

//Register process

Route::get('/register', 'NetworkAccountsController@showFrom')->middleware('register', 'passRegister');
Route::post('/register/createUser', 'NetworkAccountsController@createUser');

Route::put('profile/update', 'Profile\ProfileController@editProfile');
Route::put('profile/updatePhoto', 'Profile\ProfileController@editProfile');
Route::get("/interest", 'Profile\ProfileController@showFromInterest')->middleware('register', 'passRegister');
Route::post("/interest", 'Profile\ProfileController@saveInterest');

//Guest views
Route::get('/serviceGuest/{serviceid}', 'ServiceController@showServiceGuest');

Route::get('/service/{serviceid}', 'ServiceController@showService');

Route::get('/service/category/{idCategory}', 'ServiceController@findCategories');

Route::get('/getTags', 'ServiceController@getTags');

Route::get('/filter', 'HomeController@filter');
Route::get('/person', 'PersonController@index');
Route::get('/campaign', 'CampaignController@filter');
Route::post('/subscribe', 'HomeController@subscribe');

Route::get('/how', function(){
    return view("how");
});

Route::get('/validateLogout', 'NetworkAccountsController@validateLogout');

Route::get('/tags','TagsController@jsonTags');
Route::get('/categories','CategoryController@jsonCategories');
Route::get('/setRanking', function(){
    $users = App\Models\Service::all();
    foreach($users as $user){
        App\Models\Service::setRanking($user->id);
    }
});

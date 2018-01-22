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
Route::get('/home', 'HomeController@index')->middleware('userPending', 'notAdmin');
Route::get('/content/{name}', 'ContentController@index');

//Social Loging

Route::get('/loginRedes/{proveedor}', 'LoginController@login');
Route::get('/callback/{proveedor}', 'LoginController@callback');
Route::get('/validateLogout', 'LoginController@validateLogout');

Auth::routes();

//Route Access Admin Panel
Route::get('admin','AdminController@AdminLogin')->middleware('guest');

//Guest views
Route::get('/service/{serviceid}', 'ServiceController@showService')->middleware('userPending', 'notAdmin');

Route::get('/service/category/{idCategory}', 'ServiceController@findCategories');

Route::get('/getTags', 'ServiceController@getTags');

Route::get('/filterTag', 'HomeController@filterTag');
Route::get('/filter', 'HomeController@filter');
Route::get('/person', 'PersonController@index');
Route::get('/campaign', 'CampaignController@filter');
Route::get('/services', 'ServiceController@filter');
Route::get('/query-services', 'ServiceController@query');
Route::post('/subscribe', 'HomeController@subscribe');

Route::get('/how', function(){
    return view("how");
})->middleware('notAdmin');

Route::get('/tags','TagsController@jsonTags');
Route::get('/categories','CategoryController@jsonCategories');
Route::get('/setRanking', function(){
    $users = App\Models\Service::all();
    foreach($users as $user){
        App\Models\Service::setRanking($user->id);
    }
});

Route::resource('/listService', 'ServiceController@getListService');
Route::resource('/listServiceFeatured', 'ServiceController@getListServiceFeatured');
Route::resource('/listServiceVirtual', 'ServiceController@getListServiceVirtual');
Route::resource('/listServiceFaceToFace', 'ServiceController@getListServiceFaceToFace');
Route::resource('/listServiceWords', 'ServiceController@getListServiceWords');

Route::get('campaign/{campaignId}', 'CampaignController@show')->middleware('userPending', 'notAdmin');
Route::get('campaigns/list', 'CampaignController@showListAllCampaigns');

Route::get('/getImg', 'ImageController@getImage')->name("getImage");

Route::get('/finalizeRegister', 'RegisterController@finalizeRegister');
Route::put('profile/completeRegister', 'UsersController@completeRegister');



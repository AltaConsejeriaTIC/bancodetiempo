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

Route::group(array('middleware' => ['web'], 'domain' => env('APP_SUBDOMAIN', "colegios").".".env('APP_DOMAIN', "camblachea.co")), function() {
    
    
    Route::get('/', function() {
        return view("colegios/inicio");
    })->middleware('loginColegios');
    
    Route::get("/registro-admin", "Colegios\RegisterController@registroFormAdmin");
    Route::post("/registro-admin", "Colegios\RegisterController@registroAdmin");
    Route::get("/inicio", function(){
       return "inicio"; 
    })->middleware('redirectUser');
    
    Route::get("/panel", "Colegios\AdminController@index");
    
});

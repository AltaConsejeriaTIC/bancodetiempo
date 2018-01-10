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

Route::group(array('domain' => 'colegios.'.env('APP_DOMAIN')), function() {
    
    
    Route::get('/', function() {
        return view("colegios/inicio");
    });
    
    
    
});

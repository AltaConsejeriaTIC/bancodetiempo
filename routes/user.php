<?php

Route::get('/home', 'HomeController@index');

// Route Profile
Route::get('profile', 'Profile\ProfileController@showProfile');
Route::get('profile/edit', 'Profile\ProfileController@ShowEditProfile');

//Route::put('profile/edit','Profile\ProfileController@editProfile');
Route::post('profile/update', ['as' => 'profile/update', 'uses'=>'Profile\ProfileController@editProfile']);
Route::get("/profile/interest", 'Profile\ProfileController@showFromInterest');
Route::post("/profile/interest", 'Profile\ProfileController@saveInterest');


//Mod Service

Route::get('/service', 'ServiceController@index');
Route::post('/service/save', 'ServiceController@create');
Route::put('/service/save', 'ServiceController@update');
Route::get('/service/{serviceid}', 'ServiceController@showService');
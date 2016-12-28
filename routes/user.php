<?php

Route::get('/home', 'HomeController@index');

// Route Profile
Route::get('profile', 'Profile\ProfileController@showProfile');
Route::get('profile/edit', 'Profile\ProfileController@ShowEditProfile');

//Route::put('profile/edit','Profile\ProfileController@editProfile');
Route::post('profile/update', ['as' => 'profile/update', 'uses'=>'Profile\ProfileController@editProfile']);

//Mod Service

Route::get('/service/{serviceid}', 'ServiceController@showService');
Route::put('/service/save/{id}', 'ServiceController@update');

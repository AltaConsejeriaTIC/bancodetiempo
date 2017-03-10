<?php

//Routes Admin Panel
Route::get('homeAdmin', 'AdminController@homeAdmin');
Route::get('homeAdminUser', 'AdminController@homeAdminUser');

Route::resource('adminUser', 'AdminController');
Route::post('adminUser/show', ['as' => 'adminUser/show', 'uses'=>'AdminController@show']);
Route::put('adminUser/update', ['as' => 'adminUser/update', 'uses'=>'AdminController@update']);

Route::get('homeAdminServices', 'AdminController@homeAdminServices');
Route::post('homeAdminServices/show', ['as' => 'homeAdminServices/show', 'uses'=>'AdminController@showServices']);
Route::put('homeAdminServices/update', ['as' => 'homeAdminServices/update', 'uses'=>'AdminController@updateServices']);

Route::resource('homeAdminCategory', 'CategoryController');
Route::post('homeAdminCategory/show', ['as' => 'homeAdminCategory/show', 'uses'=>'CategoryController@show']);
Route::put('homeAdminCategory/update', ['as' => 'homeAdminCategory/update', 'uses'=>'CategoryController@update']);

Route::get('changePassword', 'AdminController@changePassword');
Route::post('changePassword', ['as' => 'changePassword', 'uses'=>'AdminController@changePasswordAdmin']);

Route::resource('homeAdminContents', 'AdminContentController');
Route::put('homeAdminContents/update', ['as' => 'homeAdminContents/update', 'uses'=>'AdminContentController@update']);
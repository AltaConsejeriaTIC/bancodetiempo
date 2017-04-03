<?php

//Routes Admin Panel
Route::get('homeAdmin', 'AdminController@homeAdmin');
Route::get('homeAdminUser', 'AdminController@homeAdminUser');

Route::resource('adminUser', 'AdminController');
Route::post('adminUser/show', ['as' => 'adminUser/show', 'uses'=>'AdminController@show']);
Route::put('adminUser/update', ['as' => 'adminUser/update', 'uses'=>'AdminController@update']);

Route::get('homeAdminServices', 'AdminController@homeAdminServices');
Route::get('homeAdminServices/reported', 'AdminController@showServicesReported');
Route::post('homeAdminServices', ['as' => 'homeAdminServices', 'uses'=>'AdminController@homeAdminServices']);
Route::post('homeAdminServices/reported', ['as' => 'homeAdminServices/reported', 'uses'=>'AdminController@showServicesReported']);
Route::put('homeAdminServices/update', ['as' => 'homeAdminServices/update', 'uses'=>'AdminController@updateServiceState']);

Route::resource('homeAdminCategory', 'CategoryController');
Route::post('homeAdminCategory/show', ['as' => 'homeAdminCategory/show', 'uses'=>'CategoryController@show']);
Route::put('homeAdminCategory/update', ['as' => 'homeAdminCategory/update', 'uses'=>'CategoryController@update']);
Route::post('homeAdminCategory/delete', ['as' => 'homeAdminCategory/delete', 'uses'=>'CategoryController@delete']);

Route::get('changePassword', 'AdminController@changePassword');
Route::post('changePassword', ['as' => 'changePassword', 'uses'=>'AdminController@changePasswordAdmin']);

Route::resource('homeAdminContents', 'AdminController');
Route::put('AdminController/updateContent', ['as' => 'homeAdminContents/update', 'uses'=>'AdminController@updateContent']);

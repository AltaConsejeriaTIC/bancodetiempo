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

Route::get('adminGroups', 'AdminController@adminGroups');
Route::post('adminGroups', ['as' => 'adminGroups', 'uses'=>'AdminController@adminGroups']);
Route::put('adminGroups/update', ['as' => 'adminGroups/update', 'uses'=>'AdminController@updateGroupState']);

Route::get('adminCampaigns', 'AdminController@adminCampaigns');
Route::post('adminCampaigns', ['as' => 'adminCampaigns', 'uses'=>'AdminController@adminCampaigns']);
Route::put('adminCampaigns/update', ['as' => 'adminCampaigns/update', 'uses'=>'AdminController@adminCampaignsState']);

Route::resource('homeAdminCategory', 'CategoryController');
Route::post('homeAdminCategory/show', ['as' => 'homeAdminCategory/show', 'uses'=>'CategoryController@show']);
Route::put('homeAdminCategory/update', ['as' => 'homeAdminCategory/update', 'uses'=>'CategoryController@update']);
Route::post('homeAdminCategory/delete', ['as' => 'homeAdminCategory/delete', 'uses'=>'CategoryController@delete']);

Route::get('changePassword', 'AdminController@changePassword');
Route::post('changePassword', ['as' => 'changePassword', 'uses'=>'AdminController@changePasswordAdmin']);

Route::resource('homeAdminContents', 'AdminController');
Route::put('AdminController/updateContent', ['as' => 'homeAdminContents/update', 'uses'=>'AdminController@updateContent']);


Route::get('historyDonations', 'AdminController@historyDonations');
Route::post('historyDonations', 'AdminController@historyDonations');

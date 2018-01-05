<?php

//Routes Admin Panel
Route::get('homeAdmin', 'AdminController@homeAdmin');

Route::resource('homeAdminUser', 'Admin\UserController@showList');

Route::resource('adminUser', 'AdminController');
Route::put('adminUser/update', ['as' => 'adminUser/update', 'uses'=>'AdminController@update']);

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

Route::get('listServiceAdmin', 'ServiceAdminController@listServiceAdmin');
Route::post('admin/service/save', 'ServiceAdminController@create');
Route::put('admin/service/update', 'ServiceAdminController@update');

Route::resource('listDeals', 'Admin\DealsController@showList');

Route::resource('adminCampaigns', 'Admin\CampaignsController@showList');
Route::post('adminCampaigns/update', 'Admin\CampaignsController@updateCampaignState');
Route::resource('/adminCampaigns/participant/{campaign_id}/download', 'Admin\CampaignsController@downloadParticipant');


Route::resource('/admin/reports', 'Admin\ReportsController@index');
Route::post('/admin/createReport', 'Admin\ReportsController@create');
Route::resource('/admin/getReport', 'Admin\ReportsController@getReport');
Route::post('/admin/saveReport/{report_id}', 'Admin\ReportsController@saveReport');
Route::post('/admin/reports/delete', 'Admin\ReportsController@deleteReport');
Route::get('/admin/report/{report_id}', 'Admin\ReportsController@showReport');
Route::resource('/admin/downloadReport', 'Admin\ReportsController@downloadReport');


Route::get("/admin/dynamicContent", 'Admin\DynamicContentController@showList');
Route::get("/admin/dynamicContent/{content_id}", 'Admin\DynamicContentController@editContent');
Route::post("/admin/dynamicContent/edit", 'Admin\DynamicContentController@saveContent');

Route::get("/admin/suggestedSites", 'Admin\SuggestedSitiesController@index');
Route::post("/admin/suggestedSites/newCategory", 'Admin\SuggestedSitiesController@createCategory');
Route::post("/admin/suggestedSites/editCategory", 'Admin\SuggestedSitiesController@editCategory');
Route::post("/admin/suggestedSites/deleteCategory", 'Admin\SuggestedSitiesController@deleteCategory');

Route::post("/admin/suggestedSites/newSite", 'Admin\SuggestedSitiesController@createSite');
Route::post("/admin/suggestedSites/editSite", 'Admin\SuggestedSitiesController@editSite');
Route::post("/admin/suggestedSites/deleteSite", 'Admin\SuggestedSitiesController@deleteSite');


Route::get("getDetailUsers", 'Admin\UserController@getDetail');


/** Services **/

Route::get('homeAdminServices', 'Admin\ServicesController@homeAdminServices');
Route::get('homeAdminServices/reported', 'Admin\ServicesController@showServicesReported');
Route::post('homeAdminServices', ['as' => 'homeAdminServices', 'uses'=>'Admin\ServicesController@homeAdminServices']);
Route::post('homeAdminServices/reported', ['as' => 'homeAdminServices/reported', 'uses'=>'Admin\ServicesController@showServicesReported']);
Route::put('homeAdminServices/update', ['as' => 'homeAdminServices/update', 'uses'=>'Admin\ServicesController@updateServiceState']);

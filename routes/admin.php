<?php


//Routes Admin Panel
Route::get('home', 'Admin\HomeController@index');


//reportes
Route::get('list/users', 'Admin\UserController@showList');
    Route::get("getDetailUsers", 'Admin\UserController@getDetail');
    Route::post("updateUser", 'Admin\UserController@updateUser');
Route::get('historyDonations', 'AdminController@historyDonations');
    Route::post('historyDonations', 'AdminController@historyDonations');
Route::get('services', 'Admin\ServicesController@index');
    Route::get("getDetailService", "Admin\ServicesController@getDetail");
    Route::post("changeState", "Admin\ServicesController@changeState");

//contenidos
Route::get('content', 'Admin\ContentController@index');
    Route::put('AdminController/updateContent', ['as' => 'homeAdminContents/update', 'uses'=>'Admin\ContentController@updateContent']);
Route::get('list/categories', 'Admin\CategoriesController@index');
    Route::post("/category/changeField", 'Admin\CategoriesController@changeField');


//profile
Route::get('changePassword', 'Admin\ProfileController@changePassword');
Route::post('changePassword', 'Admin\ProfileController@changePasswordAdmin')->name("changePassword");





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





/** Services **/


Route::get('homeAdminServices/reported', 'Admin\ServicesController@showServicesReported');
Route::post('homeAdminServices', ['as' => 'homeAdminServices', 'uses'=>'Admin\ServicesController@homeAdminServices']);
Route::post('homeAdminServices/reported', ['as' => 'homeAdminServices/reported', 'uses'=>'Admin\ServicesController@showServicesReported']);
Route::put('homeAdminServices/update', ['as' => 'homeAdminServices/update', 'uses'=>'Admin\ServicesController@updateServiceState']);

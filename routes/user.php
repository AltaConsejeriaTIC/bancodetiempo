<?php


// Route Profile
Route::get('profile', 'Profile\ProfileController@showProfile');
Route::post('profile/update', ['as' => 'profile/update', 'uses' => 'Profile\ProfileController@editProfile']);

//Mod Service

Route::get('/serviceDelete/{serviceid}', 'ServiceController@deleteService');
Route::put('/service/save/{id}', 'ServiceController@update');

// Route Deactivate Account
Route::post('deactivateAccount', ['as' => 'deactivateAccount', 'uses' => 'Profile\ProfileController@deactivateAccount']);
//

Route::get('/defaultsend/{serviceid?}', 'EmailController@defaultSend');

Route::get('/inbox', 'ConversationController@index');

Route::get('/conversation/{conversation_id}', 'ConversationController@showConversation')->middleware('conversation');

Route::get('/messages/{conversation_id}', 'ConversationController@messagesConversation');


Route::post('/newMessage', 'ConversationController@saveMessage');
Route::post('/deal', 'ConversationController@deal');
Route::put('/deal', 'ConversationController@dealUpdate');

Route::post('/addObservation', 'DealsController@saveObservation');

Route::post('/report/create/{serviceid?}', 'ReportsController@create');

Route::get('/find/users', 'UsersController@findUsers');

Route::post('createGroup', 'GroupsController@create');
Route::put('editGroup', 'GroupsController@update');
Route::put('deleteGroup', 'GroupsController@delete');
Route::get('group/{groupId}', 'GroupsController@show');

Route::post('createCampaign', 'CampaignController@create');
Route::post('updateCampaign', 'CampaignController@update');
Route::put('deleteCampaign/{campaignId}', 'CampaignController@delete');

Route::get('campaign/{campaignId}', 'CampaignController@show');

Route::post('donation', 'DonationsController@transfer');

Route::post('inscriptionParticipant', 'CampaignController@inscriptionParticipant');
Route::post('preinscriptionParticipant', 'CampaignController@preinscriptionParticipant');

Route::post('serviceAdmin/{serviceId}', 'ServiceAdminController@index');

Route::post('payParticipant', 'CampaignController@pay');


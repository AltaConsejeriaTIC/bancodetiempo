<?php
// Route Profile
Route::get('profile', 'Profile\ProfileController@showProfile');
Route::post('profile/update', ['as' => 'profile/update', 'uses' => 'Profile\ProfileController@editProfile']);
Route::put('profile/update', 'Profile\ProfileController@editProfile');
Route::put('profile/updatePhoto', 'Profile\ProfileController@editProfile');
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
Route::get('/getDeals', 'ConversationController@getDealConversation');


Route::post('/newMessage', 'ConversationController@saveMessage');
Route::post('/deal', 'DealsController@createDeal');

Route::post('/addObservation', 'DealsController@saveObservation');

Route::post('/report/create/{serviceid?}', 'ReportsController@create');
Route::post('/campaign-report/create/{campaignid?}', 'CampaignController@report');

Route::get('/find/users', 'UsersController@findUsers');

Route::post('createCampaign', 'CampaignController@create');
Route::post('updateCampaign', 'CampaignController@update');
Route::put('deleteCampaign/{campaignId}', 'CampaignController@delete');

Route::post('donation', 'DonationsController@transfer');

Route::post('inscriptionParticipant', 'CampaignController@inscriptionParticipant');
Route::post('preinscriptionParticipant', 'CampaignController@preinscriptionParticipant');
Route::post('cancelPreinscriptionParticipant', 'CampaignController@cancelPreinscriptionParticipant');

Route::post('serviceAdmin/{serviceId}', 'ServiceAdminController@index');

Route::post('payParticipant', 'CampaignController@pay');

Route::get('user/{user_id}', 'Profile\ProfileController@showProfileUser');

Route::get('/hiddenMessagesCompleteProfile', function(){
    session(['hiddenMessagesCompleteProfile' => true]);
});

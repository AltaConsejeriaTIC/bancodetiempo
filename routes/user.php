<?php



// Route Profile
Route::get('profile', 'Profile\ProfileController@showProfile');
Route::get('profile/edit', 'Profile\ProfileController@ShowEditProfile');

//Route::put('profile/edit','Profile\ProfileController@editProfile');
Route::post('profile/update', ['as' => 'profile/update', 'uses'=>'Profile\ProfileController@editProfile']);

//Mod Service

Route::get('/serviceDelete/{serviceid}', 'ServiceController@deleteService');
Route::put('/service/save/{id}', 'ServiceController@update');

// Route Deactivate Account
Route::post('deactivateAccount', ['as' => 'deactivateAccount', 'uses'=>'Profile\ProfileController@deactivateAccount']);
//

Route::get('/defaultsend/{serviceid?}','EmailController@defaultSend');

Route::get('/inbox','ConversationController@index');

Route::get('/conversation/{conversation_id}','ConversationController@showConversation');

Route::get('/messages/{conversation_id}','ConversationController@messagesConversation');

Route::post('/newMessage','ConversationController@saveMessage');


<?php

Route::get('/service', 'ServiceController@index')->middleware('register', 'passRegister');
Route::post('/service/save', 'ServiceController@create');

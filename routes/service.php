<?php

Route::get('/service', 'ServiceController@index');
Route::post('/service/save', 'ServiceController@create');
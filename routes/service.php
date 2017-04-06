<?php

Route::get('/tags','TagsController@jsonTags');
Route::get('/categories','CategoryController@jsonCategories');
Route::get('/service', 'ServiceController@index')->middleware('register', 'passRegister');
Route::post('/service/save', 'ServiceController@create');

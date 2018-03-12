<?php

use App\Http\Controllers\Profile\ProfileController;

Route::get('/getCampaign/{id}', 'webService\CampaignController@getCampaign');
Route::get('/categories','webService\CategoriesController@allCategories');
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class Category extends Model
{
	protected  $fillable = ['category']; 
		
	public function categoriesService(){
		
		return $this->hasMany(CategoriesService::class);
		
	}
	
}

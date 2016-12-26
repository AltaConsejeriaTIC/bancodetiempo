<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriesService extends Model
{
	protected  $fillable = ['category_id', 'service_id'];
	
	public function service(){
		
		return $this->belongsTo(Service::class);	
		
	}
	
	public function category(){
		
		return  $this->belongsTo(Category::class);
	}
	
}

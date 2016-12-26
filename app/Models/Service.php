<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Service extends Model
{
	protected  $fillable = ['name', 'description', 'value', 'virtually', 'presently', 'image', 'user_id', 'category_id', 'state_id'];
	
	
	public function user(){
		
		return $this->belongsTo(User::class);
		
	}
	
	public function categories(){
		
		return $this->hasMany(CategoriesService::class);
		
	}
	
	public function setImageAttribute($value){
		
		if(!empty($value) && $value !=  ''){
			
			$this->attributes['image'] = $value;
			
		}
		
	}
	
}

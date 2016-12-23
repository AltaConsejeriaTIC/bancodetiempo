<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Service extends Model
{
	protected  $fillable = ['name', 'description', 'value', 'virtually', 'image', 'user_id', 'category_id', 'state_id'];
	
	
	public function user(){
		
		return $this->belongsTo(User::class);
		
	}
	
	public function category(){
		
		return $this->belongsTo("App\Models\Category");
		
	}
}

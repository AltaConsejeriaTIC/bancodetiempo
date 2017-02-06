<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class Category extends Model
{
	protected  $fillable = ['category']; 
	
	public function services(){
		
		return $this->hasMany(Service::class);
		
	}
	
}

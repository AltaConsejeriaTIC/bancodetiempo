<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class Category extends Model
{
	protected $table = 'categories';
	
	public function services(){
		
		return $this->hasMany('App\Models\Service');
		
	}
}

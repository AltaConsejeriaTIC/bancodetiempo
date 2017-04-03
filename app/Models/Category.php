<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\InterestUser;

class Category extends Model
{
	protected  $fillable = ['category']; 
	
	public function services(){
		
		return $this->hasMany(Service::class);
		
	}

    public function interestUsers(){

		return $this->hasMany(InterestUser::class);

	}
	
}

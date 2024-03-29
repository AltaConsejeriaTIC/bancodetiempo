<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Deal;

class Conversations extends Model
{
	protected  $fillable = ['applicant_id', 'service_id', 'message'];
	
	public function applicant(){
	
		return $this->belongsTo(User::class);
	
	}

	public function deals(){
	
		return $this->hasMany(Deal::class);
	
	}
	
	public function service(){
	
		return $this->belongsTo(Service::class);
	
	}
}

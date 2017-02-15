<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversations extends Model
{
	protected  $fillable = ['user1', 'user2', 'service_id'];
	
	public function user1(){
	
		return $this->belongsTo(User::class);
	
	}
	
	public function user2(){
	
		return $this->belongsTo(User::class);
	
	}
	
	public function service(){
	
		return $this->belongsTo(Service::class);
	
	}
}

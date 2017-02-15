<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversations extends Model
{
	protected  $fillable = ['user1', 'user2', 'service_id'];
	
	public function applicant(){
	
		return $this->belongsTo(User::class);
	
	}
	
	public function service(){
	
		return $this->belongsTo(Service::class);
	
	}
	
	public function messages(){
		return $this->hasMany(Message::class);
	}
}

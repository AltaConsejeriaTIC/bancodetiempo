<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Message extends Model
{
	protected  $fillable = ['conversation_id','sender', 'addressee', 'message', 'state'];
	
	public function sender(){
	
		return $this->belongsTo(User::class);
	
	}
	
	public function addressee(){
	
		return $this->belongsTo(User::class);
	
	}
	
}

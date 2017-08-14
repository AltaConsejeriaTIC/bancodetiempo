<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class NetworkAccounts extends Model{
	protected  $fillable = ['user_id', 'provider_id', 'provider'];
	public function user(){
		return $this->belongsTo(User::class);
	}
	public function getUser(){
		return $this->account;
	}
}

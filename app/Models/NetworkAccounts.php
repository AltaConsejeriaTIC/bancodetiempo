<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class NetworkAccounts extends Model
{
	protected  $fillable = ['user_id', 'provider_id', 'provider'];
	private $account;
	
	public function start($providerData){
		 		
		$this->account = User::whereEmail($providerData['email'])->first();
		
	}
	
	public function user(){
		return $this->belongsTo(User::class);
	}
	
	public function getUser(){
		 
		return $this->account;
		 
	}
	
	public function existsUser(){
		 
		if ($this->account) {
			return true;
		} else {
			return  false;
	
		}
		 
	}
}

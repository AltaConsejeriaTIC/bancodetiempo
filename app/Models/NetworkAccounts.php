<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NetworkAccounts extends Model
{
	protected  $fillable = ['user_id', 'proveedor_id', 'proveedor'];
	private $account;
	
	public function start($providerData){
		 
		$this->account = NetworkAccounts::whereProvider('facebook')
		->whereProviderId($providerData["id"])
		->first();
		 
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

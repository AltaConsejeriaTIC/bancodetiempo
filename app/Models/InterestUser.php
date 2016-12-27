<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class InterestUser extends Model
{
	protected  $fillable = ['user_id', 'category_id'];
	
	public function user(){
		
		return $this->belongsTo(User::class);
		
	}
	
}

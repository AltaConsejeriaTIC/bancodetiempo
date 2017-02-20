<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use User;
use App\Models\AttainmentUsers;

class State extends Model
{
  protected  $fillable = ['state'];   

 	public function users()
 	{
 		return $this->hasMany(User::class);
 	}

 	public function attainmentUsers()
	{		
		return $this->hasMany(AttainmentUsers::class);		
	}
}

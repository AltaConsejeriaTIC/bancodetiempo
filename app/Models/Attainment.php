<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AttainmentUsers;

class Attainment extends Model
{
  protected  $fillable = ['attainment']; 
	
	public function attainmentUsers()
	{		
		return $this->hasMany(AttainmentUsers::class);		
	}
}

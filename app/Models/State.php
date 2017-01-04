<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use User;

class State extends Model
{
  protected  $fillable = ['state'];   

 	public function users()
 	{
 		return $this->hasMany(User::class);
 	}
}

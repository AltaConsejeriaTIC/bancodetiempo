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

    static function statesForUsers(){

        return State::whereIn('id', [1,2,3,4]);

    }

    static function statesForDeals(){

        return State::whereIn('id', [4, 7, 8, 10, 11, 12]);

    }

    static function statesForgroups(){

        return State::whereIn('id', [1,2,3]);

    }
}

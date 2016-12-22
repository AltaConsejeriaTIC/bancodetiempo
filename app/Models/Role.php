<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
    protected  $fillable = ['role'];   
    
    public function users()
    {    	
    	return $this->hasMany(User::class);    	
    }
}

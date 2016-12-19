<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Roles extends Model
{
    protected  $fillable = ['category'];   
    
    public function users(){
    	
    	return $this->hasMany(User::class);
    	
    }
}

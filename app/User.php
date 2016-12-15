<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Service;
use App\Models\Roles;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name',  'email', 'password', 'avatar', 'state', 'gender', 'birthDate', 'aboutMe', 'address', 'website', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function services(){

    	return $this->hasMany(Service::class);
   	
    }
    
    public function roles(){
    	
    	return $this->belongsTo(Roles::class);
    	
    }


}

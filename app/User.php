<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Service;
use App\Models\State;
use App\Models\Role;
use App\Models\InterestUser;
use App\Models\Message;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name',  'email','email2', 'password', 'avatar', 'state_id', 'gender', 'birthDate', 'aboutMe', 'role_id','privacy_policy'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function services()
    {
       	return $this->hasMany(Service::class);
    }
    
    public function messages()
    {
    	return $this->hasMany(Message::class);
    }

    public function role()
    {
    	return $this->belongsTo(Role::class);
    }

    public function interests(){

    	return $this->hasMany(InterestUser::class);

    }

    public function state()
    {
      return $this->belongsTo(State::class);
    }
}

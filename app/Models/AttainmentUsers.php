<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\State;
use App\Models\Attainment;
use User;

class AttainmentUsers extends Model
{
	
    protected  $fillable = ['attainment_id', 'user_id', 'state_id'];

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function attainment(){
        return $this->belongsTo(Attainment::class);
    }

}

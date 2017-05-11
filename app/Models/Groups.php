<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Groups extends Model
{
    protected  $fillable = ['name', 'image', 'description', 'creator_id', 'admin_id', 'state_id', 'facebook', 'twitter', 'linkedin', 'instagram'];

    public function creator(){

		return $this->belongsTo(User::class);

	}

    public function state(){

		return $this->belongsTo(State::class);

	}

    public function admin(){

		return $this->belongsTo(User::class);

	}

    public function collaborators(){
        return $this->hasMany(Group_collaborators::class);
    }

    public function setImageAttribute($value){

        if (!empty($value) && $value != '') {

            $this->attributes['image'] = $value;

        }
    }

    static function groupsUser($userId){

        return Groups::where('admin_id', $userId)->where("state_id", 1)->get();

    }

    public function campaigns(){
        return $this->hasMany(Campaigns::class);
    }

}

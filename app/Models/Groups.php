<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Groups extends Model
{
    protected  $fillable = ['name', 'image', 'description', 'creator_id', 'admin_id', 'state_id'];

    public function creator(){

		return $this->belongsTo(User::class);

	}

    public function admin(){

		return $this->belongsTo(User::class);

	}

    static function groupsUser($userId){

        return Groups::where('admin_id', $userId)->get();

    }

}

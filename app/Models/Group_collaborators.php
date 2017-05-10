<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Groups;


class Group_collaborators extends Model
{
    protected  $fillable = ['groups_id', 'user_id'];

    public function user(){

		return $this->belongsTo(User::class);

	}

    public function group(){

		return $this->belongsTo(Groups::class);

	}

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Groups extends Model
{
    protected  $fillable = ['name', 'image', 'description', 'creator_id', 'admin_id'];

    public function creator(){

		return $this->belongsTo(User::class);

	}

    public function admin(){

		return $this->belongsTo(User::class);

	}

}

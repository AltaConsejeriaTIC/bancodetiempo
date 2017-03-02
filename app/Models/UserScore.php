<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\User;

class UserScore extends Model
{
    protected  $fillable = ['user_evaluator_id', 'user_id', 'score', 'observation'];

    public function user_evaluator(){

        return $this->belongsTo(User::class);

    }

    public function user(){

        return $this->belongsTo(User::class);

    }
}

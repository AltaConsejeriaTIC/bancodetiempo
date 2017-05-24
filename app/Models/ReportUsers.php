<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportUsers extends Model
{
    public function interests(){

    	return $this->hasMany(ReportInterest::class, 'user_id');

    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DealsObservations extends Model
{
    protected  $fillable = ['user_id', 'deals_id', 'score', 'observation'];

    public function deals(){
	
		return $this->belongsTo(Deal::class);
	
	}
}

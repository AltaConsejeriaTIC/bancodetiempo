<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class Deal extends Model
{
  protected  $fillable = ['user_id', 'service_id','date','time','location','value','description','state_id','observation'];


  	public function conversation(){

		return $this->belongsTo(Conversations::class);

	}

	public function observations(){

		return $this->hasMany(DealsObservations::class);

  }

  public function service()
  {
		return $this->belongsTo(Service::class);
	}

}

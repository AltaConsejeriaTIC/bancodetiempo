<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\DealState;
use App\Models\Conversations;
use App\User;

class Deal extends Model
{
  protected  $fillable = ['user_id', 'service_id','date','time','location','value','description', 'conversations_id', 'response_applicant', 'response_offerer', 'applicant_badObservations_id', 'offerer_badObservations_id', 'applicant_observation', 'offerer_observation', 'coordinates', 'state_id', 'creator_id'];


    public function conversations(){

        return $this->belongsTo(Conversations::class);

    }

    public function observations(){

        return $this->hasMany(DealsObservations::class);

    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }
    
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    public function dealStates()
    {
        return $this->hasMany(DealState::class);
    }


}

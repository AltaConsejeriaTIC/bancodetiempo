<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BadObservations;
use App\Models\Service;

class ServiceScore extends Model
{
    protected  $fillable = ['service_id', 'user_id', 'score', 'observation', 'badObservations_id'];

    public function BadObservation()
    {
        return $this->belongsTo(BadObservations::class);
    }

    public function Service()
    {
        return $this->belongsTo(Service::class);
    }
}

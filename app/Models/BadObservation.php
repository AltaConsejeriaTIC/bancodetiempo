<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\serviceScore;

class BadObservation extends Model
{
    protected  $fillable = ['observation', 'state_id'];

    public function serviceScore()
    {
        return $this->hasMany(serviceScore::class);
    }
}

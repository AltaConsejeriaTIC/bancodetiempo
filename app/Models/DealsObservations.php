<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DealsObservations extends Model
{
    protected  $fillable = ['user_id', 'deals_id', 'observation'];
}

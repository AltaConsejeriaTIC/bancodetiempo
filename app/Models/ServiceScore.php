<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceScore extends Model
{
    protected  $fillable = ['service_id', 'user_id', 'score', 'observation'];
}

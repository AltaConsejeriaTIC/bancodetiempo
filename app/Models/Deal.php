<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
  protected  $fillable = ['user_id', 'service_id','date','time','location','value','description','state_id','observation'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DealState extends Model
{
  protected  $fillable = ['deal_id', 'state_id'];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

}

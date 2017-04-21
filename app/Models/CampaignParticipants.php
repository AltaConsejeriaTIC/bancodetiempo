<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\User;

class CampaignParticipants extends Model
{
    protected  $fillable = ['campaigns_id', 'participant_id'];

    public function groups()
    {
        return $this->belongsTo(Groups::class);
    }

    public function participant()
    {
        return $this->belongsTo(User::class);
    }
}

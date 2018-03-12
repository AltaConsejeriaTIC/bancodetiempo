<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Campaigns;

class CampaignParticipants extends Model
{
    protected  $fillable = ['campaigns_id', 'participant_id', 'confirmed', 'presence'];

    public function groups()
    {
        return $this->belongsTo(Groups::class);
    }

    public function participant()
    {
        return $this->belongsTo(User::class);
    }
    public function campaign()
    {
        return $this->belongsTo(Campaigns::class, "campaigns_id", "id");
    }
}

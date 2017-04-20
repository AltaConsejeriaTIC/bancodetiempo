<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Groups;
use App\Models\States;
use App\Models\CampaignParticipants;

class Campaigns extends Model
{
    protected  $fillable = ['name', 'description', 'image', 'groups_id', 'category_id', 'credits',  'hours', 'date', 'date_donations', 'state_id'];

    public function groups()
    {
        return $this->belongsTo(Groups::class);
    }

    public function states()
    {
        return $this->belongsTo(States::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function participants(){
        return $this->hasMany(CampaignParticipants::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Groups;
use App\Models\State;
use App\Models\CampaignParticipants;

class Campaigns extends Model
{
    protected $fillable = ['name', 'description', 'image', 'groups_id', 'category_id', 'credits', 'hours', 'date', 'date_donations', 'state_id', 'allows_registration'];

    public function groups()
    {
        return $this->belongsTo(Groups::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function participants()
    {
        return $this->hasMany(CampaignParticipants::class);
    }

    public function setImageAttribute($value)
    {

        if (!empty($value) && $value != '') {

            $this->attributes['image'] = $value;

        }
    }

    static function getCampaignsActive(){
        return Campaigns::select("campaigns.*")->where('campaigns.state_id', 1)->join("groups", "groups.id", "campaigns.groups_id")->where("groups.state_id", 1);
    }

}

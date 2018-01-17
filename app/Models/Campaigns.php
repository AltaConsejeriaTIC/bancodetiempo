<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\Groups;
use App\Models\State;
use App\Models\CampaignParticipants;
use App\Models\CampaignColegio;
use App\User;
use Illuminate\Support\Facades\Auth;

class Campaigns extends Model
{
    protected $fillable = ['name', 'description', 'image', 'groups_id', 'category_id', 'credits', 'hours', 'date', 'date_donations', 'state_id', 'allows_registration', 'user_id'];

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function participants()
    {
        return $this->hasMany(CampaignParticipants::class);
    }

    public function setImageAttribute($value){

        if (!empty($value) && $value != '') {

            $this->attributes['image'] = $value;

        }
    }
    
    public function campaignEnableInSchool(){
        return CampaignColegio::where("campaign_id", $this->id)->where("colegio_id", Auth::user()->colegio()->id)->get()->count() > 0;
    }

    static function campaignsUser($user_id){
        return Campaigns::select("campaigns.*")->where("user_id", $user_id);
    }

    static function getCampaignsActive(){
        return Campaigns::select("campaigns.*")->where('campaigns.state_id', 1)->where('campaigns.date', '>=', DB::raw('curdate()'));
    }

}

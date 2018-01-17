<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Colegio;
use App\Models\Campaigns;
class CampaignColegio extends Model
{
    protected $fillable = ["campaign_id", "colegio_id"];
    
    public function colegio(){
        return $this->belongsTo(Colegio::class);
    }
    public function campaign(){
        return $this->belongsTo(Campaigns::class);
    }
    
}
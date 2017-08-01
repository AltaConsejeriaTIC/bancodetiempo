<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignReport extends Model
{
    protected $fillable = ['campaign_id', 'user_id', 'type_report_id', 'observation'];
}

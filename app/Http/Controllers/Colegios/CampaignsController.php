<?php

namespace App\Http\Controllers\Colegios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Campaigns;
use App\Models\TypeReport;
class CampaignsController extends Controller
{
    public function showCampaign(Request $request, $campaignId){
        $campaign = Campaigns::findOrFail($campaignId);
        if($campaign->state_id == 3){
            return redirect("/");
        }
        $listTypes = TypeReport::pluck('type', 'id');
        return view("colegios.campaign.detail", compact("campaign", "listTypes"));
    }
}

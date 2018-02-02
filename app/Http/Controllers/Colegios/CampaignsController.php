<?php

namespace App\Http\Controllers\Colegios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Campaigns;
use App\Models\TypeReport;
use App\Models\CampaignColegio;
use Illuminate\Support\Facades\Auth;
class CampaignsController extends Controller
{
    public function __construct(){
        $this->middleware(function ($request, $next) {
            if(Auth::check()){
                return $next($request);
            }else{
                return redirect("/");
            }
        });
    }
    
    public function showCampaign(Request $request, $campaignId){
        $campaign = Campaigns::findOrFail($campaignId);
        if($campaign->state_id == 3){
            return redirect("/");
        }
        if(Auth::user()->role_id == 2 && CampaignColegio::where("colegio_id", Auth::user()->colegio()->id)->where("campaign_id", $campaignId)->get()->count() == 0){
            return redirect("/");
        }
        $listTypes = TypeReport::pluck('type', 'id');
        return view("colegios.campaign.detail", compact("campaign", "listTypes"));
    }
}

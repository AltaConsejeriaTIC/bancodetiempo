<?php

namespace App\Http\Controllers\webService;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Campaigns;
class CampaignController extends Controller
{
    public function getCampaign(Request $request, $id){
        $campaign = Campaigns::find($id);
        if(is_null($campaign)){
            return response()->json([
                "state" => "error"
            ]);
        }
        return response()->json($campaign->toArray());
    }
}

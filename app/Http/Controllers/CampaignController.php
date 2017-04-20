<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Groups;
use App\Models\Campaigns;
use App\Helpers;

class CampaignController extends Controller
{
    public function create(Request $request){

        $cover = Helpers::uploadImage($request->file('imageCampaign'), 'campaign'.date("Ymd").rand(000,999), 'resources/user/user_'. Auth::User()->id . '/campaigns/');
        $today = new \DateTime(date("Y-m-d"));
        $userDate = new \DateTime($request->input('dateCampaign'));
        $interval = $today->diff($userDate);
        $dayInterval = (int) ceil($interval->days/2);
        $date_finish_donations =  date('Y-m-d', strtotime ("+$dayInterval day" , strtotime (date("Y-m-d")))) . " " . $request->input('timeCampaign');

        if($cover){
            $group = Campaigns::create([
                'name' => $request->input('nameCampaign'),
                'description' => $request->input('descriptionCampaign'),
                'image' => $cover,
                'groups_id' => $request->input('group_id'),
                'hours' => $request->input('quotasCampaign'),
                'credits' => 0,
                'category_id' => $request->input('categoryCampaign'),
                'date_donations' => $date_finish_donations,
                'date' => $request->input('dateCampaign')." ".$request->input('timeCampaign'),
                'state_id' => 1
            ]);
        }

        return redirect()->back();

    }

     public function show($campaignId){

        $campaign = Campaigns::findOrFail($campaignId);

        return view('campaigns/campaign', compact('campaign'));
    }

}

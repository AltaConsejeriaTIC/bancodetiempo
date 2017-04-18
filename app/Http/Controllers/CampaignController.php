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

        if($cover){
            $group = Campaigns::create([
                'name' => $request->input('nameCampaign'),
                'description' => $request->input('descriptionCampaign'),
                'image' => $cover,
                'groups_id' => $request->input('group_id'),
                'quotas' => $request->input('quotasCampaign'),
                'category_id' => $request->input('categoryCampaign'),
                'date' => $request->input('dateCampaign'),
                'time' => $request->input('timeCampaign'),
                'state_id' => 1
            ]);
        }

        return redirect()->back();

    }
}

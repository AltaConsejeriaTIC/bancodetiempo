<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Campaigns;
use App\Models\HistoryDonations;

class DonationsController extends Controller
{
    public function transfer(Request $request){

        $user = User::find(Auth::id());

        $campaign = Campaigns::find($request->input('group_id'));

        $credits = $request->input('credits');

        $user->update([
            'credits' => $user->credits-$credits
        ]);

        $campaign->update([
            'credits' => $campaign->credits+$credits
        ]);

        $this->saveHistory($user->id, $campaign->id, $credits);

        return redirect()->back();

    }

    private function saveHistory($donor, $campaign, $credits){

        HistoryDonations::create([
            "donor_id" => $donor,
            "campaign_id" => $campaign,
            "credits" => $credits
        ]);

    }
}

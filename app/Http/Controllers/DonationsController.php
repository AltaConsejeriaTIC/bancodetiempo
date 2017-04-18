<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Campaigns;

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

        return redirect()->back();

    }
}

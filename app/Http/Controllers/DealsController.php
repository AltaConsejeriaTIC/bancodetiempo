<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Deal;
use App\Models\UserScore;
use App\Models\ServiceScore;

class DealsController extends Controller
{
    public function saveObservation(Request $request){

        if($request->input("scoreFrom") == "offerer"){
            UserScore::create([
               "user_evaluator_id" => Auth::User()->id,
                "user_id" => $request->input("applicant_id"),
                "score" => $request->input("score"),
                "observation" => $request->input("observation")
            ]);

            Deal::find($request->input("deal_id"))->update([
               "response_offerer" => $request->input("response")
            ]);

        }elseif($request->input("scoreFrom") == "applicant"){

            UserScore::create([
               "user_evaluator_id" => Auth::User()->id,
                "user_id" => $request->input("offerer_id"),
                "score" => $request->input("score"),
                "observation" => $request->input("observation")
            ]);

            ServiceScore::create([
                "service_id" => $request->input("service_id"),
                "user_id" => Auth::User()->id,
                "score" => $request->input("score"),
                "observation" => $request->input("observation")
            ]);

            Deal::find($request->input("deal_id"))->update([
               "response_applicant" => $request->input("response")
            ]);


        }

        $this->exchange($request->input("deal_id"));

        return redirect()->back()->with('response', true);

    }

    public function exchange($deal){

        $_deal = Deal::find($deal);

        if($_deal->response_applicant == 1 && $_deal->response_offerer == 1){

            $applicant = User::find($_deal->user_id);

            $offerer = User::find($_deal->service->user_id);

            $applicant->update([
                "credits" => $applicant->credits-$_deal->value
            ]);

            $offerer->update([
                "credits" => $offerer->credits+$_deal->value
            ]);

        }

    }

}

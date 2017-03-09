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

        $badObservation = is_null($request->input("badObservation")) ? 1 : (int) $request->input("badObservation");

        $score = is_null($request->input("score")) ? 0 : $request->input("score");

        if($request->input("scoreFrom") == "offerer"){
            UserScore::create([
               "user_evaluator_id" => Auth::User()->id,
                "user_id" => $request->input("applicant_id"),
                "score" => $score,
                "observation" => $request->input("observation")
            ]);

            Deal::find($request->input("deal_id"))->update([
                "response_offerer" => $request->input("response"),
                "offerer_badObservations_id" => $badObservation
            ]);

        }elseif($request->input("scoreFrom") == "applicant"){



            if($request->input("response") == 1){

                UserScore::create([
                   "user_evaluator_id" => Auth::User()->id,
                    "user_id" => $request->input("offerer_id"),
                    "score" => $score,
                    "observation" => $request->input("observation")
                ]);

            }

            ServiceScore::create([
                "service_id" => $request->input("service_id"),
                "user_id" => Auth::User()->id,
                "score" => $score,
                "observation" => $request->input("observation"),
                "badObservations_id" => $badObservation
            ]);

            Deal::find($request->input("deal_id"))->update([
                "response_applicant" => $request->input("response"),
                "applicant_badObservations_id" => $badObservation
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

        if($_deal->response_applicant == 0 && $_deal->response_offerer == 0){


        }

    }

}

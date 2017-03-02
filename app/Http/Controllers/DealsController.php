<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DealsObservations;
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

            return redirect()->back()->with('response', true);
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

            return redirect()->back()->with('response', true);
        }



    }
}

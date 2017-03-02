<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DealsObservations;

class DealsController extends Controller
{
    public function saveObservation(Request $request){


    	$observation = DealsObservations::create([
    		"user_id" => Auth::User()->id,
    		"deals_id" => $request->input("deal_id"),
    		"score" =>  $request->input("score"),
    		"observation" => $request->input("observation")
    	]);


        return redirect()->back()->with('response', true);

    }
}

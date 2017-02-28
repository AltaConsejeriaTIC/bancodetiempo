<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DealsObservations;

class DealsController extends Controller
{
    public function saveObservation(Request $request){

    	DealsObservations::create([
    		"user_id" => Auth::User()->id,
    		"service_id" => $request->input("service_id"),
    		"observation" => $request->input("observation")
    	]);

    }
}

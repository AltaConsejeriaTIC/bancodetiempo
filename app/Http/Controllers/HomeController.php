<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$interestsUser = $this->getInterestsUser();
    	
    	$allServices = Service::where("user_id" , "!=", Auth::user()->id)->where('state_id' , 1)->get();
    	
    	$recommendedServices = $allServices->whereIn("category_id", $interestsUser);
    	
        return view('home', compact('allServices', 'recommendedServices'));
    }
    
    public function getInterestsUser(){
    	
    	$interests = array();
    	
    	foreach (User::find(Auth::user()->id)->interests->toArray() as $interest){
    		
    		array_push($interests, $interest['category_id']);   
    		
    	}
    	
    	return $interests;
    	
    }

}

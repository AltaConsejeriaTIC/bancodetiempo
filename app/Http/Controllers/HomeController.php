<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$interestsUser = $this->getInterestsUser();
    	
    	$categories = Category::select('categories.id','categories.category')->join('services','categories.id','=','services.category_id')->where('services.state_id', 1)->groupBy('categories.id','categories.category')->get();
    	
    	$allServices = Service::where("user_id" , "!=", Auth::user()->id)->where('state_id' , 1)->get()->where('user.state_id', 1);
    	
    	$recommendedServices = $allServices->whereIn("category_id", $interestsUser);
    	
        return view('home', compact('allServices', 'recommendedServices', 'categories'));
    }
    
    public function indexNotRegister(){
    	
    	if(Auth::user()){
    		return redirect('/home');
    	}else{
    		
    		$lastServices = Service::where('state_id' , 1)->orderBy('id', 'desc')->limit(6)->get()->where('user.state_id', 1);
    		    		
    		return view('welcome', compact('lastServices'));
    	}
    	
    }
    
    public function getInterestsUser(){
    	
    	$interests = array();
    	
    	foreach (User::find(Auth::user()->id)->interests->toArray() as $interest){
    		
    		array_push($interests, $interest['category_id']);   
    		
    	}
    	
    	return $interests;
    	
    }

}

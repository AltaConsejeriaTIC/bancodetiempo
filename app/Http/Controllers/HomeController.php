<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use App\User;
use JavaScript;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;

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
        $tags = Tag::select('tags.*','tags_services.service_id')->join('tags_services','tags.id','=','tags_services.tag_id')->join('services','tags_services.service_id','=','services.id')->where('state_id' , 1)->get();

    	$interestsUser = $this->getInterestsUser();
    	
    	$categories = Category::select('categories.id','categories.category')->join('services','categories.id','=','services.category_id')->where('services.state_id', 1)->groupBy('categories.id','categories.category')->get();
    	
    	$allServices = Service::where("user_id" , "!=", Auth::user()->id)->where('state_id' , 1)->get()->where('user.state_id', 1);
    	
    	$recommendedServices = $allServices->whereIn("category_id", $interestsUser);

        $categoriesAll = Category::all();

        JavaScript::put([                    
                    'categoriesJs' => $categories,                    
                ]); 
    	
        return view('home', compact('allServices', 'recommendedServices', 'categories','tags'));
    }
    
    public function indexNotRegister(){
    	
    	if(Auth::user()){
    		return redirect('/home');
    	}else{
    		
            $tags = Tag::select('tags.*','tags_services.service_id')
                ->join('tags_services','tags.id','=','tags_services.tag_id')
                ->join('services','tags_services.service_id','=','services.id')                
                ->where('state_id' , 1)
                ->get();

    		$lastServices = Service::where('state_id' , 1)->orderBy('id', 'desc')->limit(6)->get()->where('user.state_id', 1);
    		    		
    		return view('welcome', compact('lastServices','tags'));
    	}
    	
    }
    
    public function getInterestsUser(){
    	
    	$interests = array();
    	
    	foreach (User::find(Auth::user()->id)->interests->toArray() as $interest){
    		
    		array_push($interests, $interest['category_id']);   
    		
    	}
    	
    	return $interests;
    	
    }
    
    public function filter(Request $request)
    {
    	$tags = Tag::select('tags.*','tags_services.service_id')->join('tags_services','tags.id','=','tags_services.tag_id')->join('services','tags_services.service_id','=','services.id')->where('state_id' , 1)->get();
    	    	
    	$listTags = [];
    	
    	$listWords = [];
    	
    	Session::put('filters.text', $request->input('filter'));
    	
    	$filters = explode(" ", $request->input('filter'));
    	
    	
    	foreach ($filters as $filter){
    		if(preg_match('/^#/', $filter)){
    			$listTags[] = str_replace("#", "", $filter);
    		}else{
    			$listWords[] = $filter;
    		}
    	}
    	    	
    	$interestsUser = $this->getInterestsUser();
    	 
    	$categories = Category::select('categories.id','categories.category')->join('services','categories.id','=','services.category_id')->where('services.state_id', 1)->groupBy('categories.id','categories.category')->get();
    	 
    	$idTags = Tag::select("id")->whereIn('tag', $listTags)->get();
    		
    	Session::put('filters.tags', $idTags);
    	
    	$allServices = Service::select("services.*")->distinct('services.id')->join('tags_services', 'services.id', 'tags_services.service_id')->where("user_id" , "!=", Auth::user()->id)->where('state_id' , 1)->whereIn('tags_services.tag_id', $idTags)->get();
    	    			
    	$recommendedServices = $allServices->whereIn("category_id", $interestsUser);
    
    	$categoriesAll = Category::all();
    
    	JavaScript::put([
    			'categoriesJs' => $categories,
    	]);
    	 
    	return view('home', compact('allServices', 'recommendedServices', 'categories','tags'));
    }

}

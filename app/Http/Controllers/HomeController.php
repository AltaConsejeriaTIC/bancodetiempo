<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\InterestUser;
use Illuminate\Support\Facades\Auth;
use App\User;
use JavaScript;
use App\Models\Category;
use App\Models\Tag;
use App\Models\subscribers;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($this->IncompleteRegister()){
            return $this->IncompleteRegister();
        }

        $interestsUser = '';
        $recommendedServices = '';

        $categories = Category::select('categories.id','categories.category')->join('services','categories.id','=','services.category_id')->where('services.state_id', 1)->groupBy('categories.id','categories.category')->get();
                
        $allServices = Service::select('services.*')
                                ->join('users','users.id','=','services.user_id')
                                ->where('services.state_id' , 1)
                                ->where('users.state_id', 1)
                                ->orderBy("created_at","desc")
                                ->paginate(12);

        if(!is_null(Auth::User())){
            $interestsUser = $this->getInterestsUser();
            $recommendedServices = $allServices->whereIn("category_id", $interestsUser);
        }

        $categoriesAll = Category::all();

        JavaScript::put([                    
                    'categoriesJs' => $categories,                    
                ]); 

        return view('home', compact('allServices', 'recommendedServices', 'categories'))->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    public function indexNotRegister(){
    	
    	if(Auth::user()){
    		return redirect('/home');
    	}else{

    		$lastServices = Service::where('services.state_id','=', 1)
                            ->orderBy('services.id', 'desc')
                            ->limit(6)
                            ->get()
                            ->where('state_id','=', 1);
    		    		
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
    
    public function filter(Request $request)
    {   	
    	
    	
    	Session::put('filters.text', $request->input('filter'));  	
    	 
    	$categories = Category::select('categories.id','categories.category')
    								->join('services','categories.id','=','services.category_id')
    								->where('services.state_id', 1)
    								->groupBy('categories.id','categories.category')->get();
    	
    								
    	$allServices = Service::select("services.*")
    								->distinct('services.id')
    								->join('tags_services', 'services.id', 'tags_services.service_id')
    								->where('state_id' , 1)
                                    ->orderBy('services.created_at', 'desc');

    	 
    	if($request->input('filter') != ""){
			$filters = explode(" ", $request->input('filter'));
		}else{
			$filters = "";
		}
    	
    	if($filters != ''){
    		$idTags = Tag::select("id")->whereIn('tag', $filters)->get();
    		$allServices->whereIn('tags_services.tag_id', $idTags);
    		Session::flash('filters.tags', $idTags);
    	}else{
    		Session::pull('filters.tags');
    	}
    	
    	$allServices = $allServices->paginate(12);
    	
    	$recommendedServices = '';
    	
    	if(!is_null(Auth::User())){

    		$interestsUser = $this->getInterestsUser();
    		 
    		$recommendedServices = $allServices->whereIn("category_id", $interestsUser);
    		
    	}
    	
    	$categoriesAll = Category::all();
    
    	JavaScript::put([
    			'categoriesJs' => $categories,
    	]);
    	 
    	return view('home', compact('allServices', 'recommendedServices', 'categories'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function IncompleteRegister(){
        if(!is_null(Auth::user())){
            if (Auth::user()->privacy_policy == 1) {
                if(InterestUser::whereUserId(Auth::user()->id)->count()>=3) {
                    if (Service::whereUserId(Auth::user()->id)->first()) {                        
                        return false;
                    }                    
                    return redirect('/service');
                }                
                return redirect('/interest');
            }            
            return redirect('/register'); 
        }
        

    }

    public function subscribe(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
        ]);
        if(is_null(subscribers::where("email", $request->input('email'))->get()->last())){
            subscribers::create([
                "email" => $request->input('email')
            ]);
        }

        return redirect()->back()->with('response', true);

    }


}

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
    public function index(Request $request){

        $this->IncompleteRegister();
        $categories = Category::select('categories.id','categories.category')->join('services','categories.id','=','services.category_id')
                                ->where('services.state_id', 1)
                                ->groupBy('categories.id','categories.category')
                                ->get();
        $allServices = Service::select('services.*')
                                ->join('users','users.id','=','services.user_id')
                                ->where('services.state_id' , 1)
                                ->where('users.state_id', 1)
                                ->orderBy("created_at","desc")
                                ->paginate(12);
        $recommendedServices = $this->recommendedServices();
        JavaScript::put([
            'categoriesJs' => $categories,
        ]);

        return view('home', compact('allServices', 'recommendedServices', 'categories'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function recommendedServices(){
        if(!is_null(Auth::User())){
            $allServices = Service::select('services.*')
                                ->join('users','users.id','=','services.user_id')
                                ->where('services.state_id' , 1)
                                ->where('users.state_id', 1)
                                ->orderBy("created_at","desc");
            $interestsUser = $this->getInterestsUser();
            return $allServices->whereIn("category_id", $interestsUser);
        }else{
            return null;
        }
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
    
    public function filter(Request $request){

        Session::put('filters.text', $request->input('filter'));

    	$allServices = ServiceController::getServiceActive();

        //$this->filterText($allServices, $request->input('filter'));

        $this->filterTags($allServices, $request->input('filter'));

    	$allServices = $allServices->paginate(12);
    	
    	$recommendedServices = $this->recommendedServices();

    	JavaScript::put([
    			'categoriesJs' => CategoryController::getCategoriesActive(),
    	]);

        $categories = CategoryController::getCategoriesActive();
    	 
    	return view('home', compact('allServices', 'recommendedServices', 'categories'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function filterTags($allServices, $filter){

        if($filter != ""){
			$filters = explode(" ", $filter);
            $idTags = Tag::select("id")->whereIn('tag', $filters)->get();
            $allServices->join('tags_services', 'services.id', 'tags_services.service_id');
    		return $allServices->WhereIn('tags_services.tag_id', $idTags);
    		Session::flash('filters.tags', $idTags);
		}else{
			Session::pull('filters.tags');
            return $allServices;
		}

    }

    public function filterText($allServices, $filter){

        if($filter != ""){
    		return $allServices->where('services.name', 'LIKE', "%$filter%");

		}else{
            return $allServices;
		}

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

<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Illuminate\Support\Facades\Input;
use App\Models\Category;
use App\Models\InterestUser;
use App\Models\AttainmentUsers;
use App\Models\Attainment;
use App\Models\Tag;
use App\Models\Service;
use App\Models\Groups;
use JavaScript;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
   public function showProfile()
    {
       $categories = Category::all();
      $user = User::find(auth::user()->id);
      $tagsJson = json_encode(Tag::all('tag'));
      $services = Service::where("user_id" , "=", Auth::user()->id)
	      						->where('state_id' , 1)
	      						->orderBy("created_at","desc")
	      						->get()
	      						->where('user.state_id', 1);

      $tags = Tag::select('tags.*','tags_services.service_id')
      						->join('tags_services','tags.id','=','tags_services.tag_id')
      						->join('services','tags_services.service_id','=','services.id')
      						->where("user_id" , "=", Auth::user()->id)
      						->where('state_id' , 1)
      						->get();
      
      JavaScript::put([
				'userJs'=> $user,
				'birthDateJs' => is_null($user->birthDate) ? "0000-00-00" :  $user->birthDate,
				'categoriesJs' => $categories,
				'servicesJs' => $services,
				'tagsJs' => $tags,
                'tags' => $tagsJson,
			]);				

       $myGroups = Groups::groupsUser(Auth::user()->id);
       return view('profile/profile', compact('user','categories','services', 'myGroups'));
        
    }
   public function showEditProfile()
    {
			$user = User::find(Auth::User()->id);
      return view('profile/edit', compact('user'));

    }
//====================== Photo User ==================================


public function  editProfilePicture(Request $request){

  $file = $request->file('avatar');
		
		if(!$file){
			return false;
		}

		$imageName = 'img' . Auth::User()->id . '.' . $file->getClientOriginalExtension();
		$pathImage = 'resources/user/user_'. Auth::User()->id;
		$file->move(base_path() . '/public/' . $pathImage, $imageName);

		User::find(Auth::User()->id)->update([
			'avatar' => $pathImage .'/'. $imageName
		]);

		return $pathImage .'/'. $imageName;

}

//=====================================================================

	public function editProfile(Request $request){

	 	$this->validate($request, [
	 			'firstName' => 'required|min:3|alpha_spaces',
	 			'lastName' => 'required|min:3|alpha_spaces',
	 			'gender' => 'required',
	 			'aboutMe' => 'required|min:50|max:250',
	      'terms' => 'required',
	 			'image' => 'image|max:2000',
	 			'avatar' => 'max:2000|image',
	 			'email2' => 'required|email'
	 	]);
	 		 	
	 	$picture=$this->editProfilePicture($request);
	 	$user = Auth::user();
	 	
	 	if($picture !==false){
	    $user->avatar = $picture;
	  }
		
		$user->first_name = $request->input('firstName');
		$user->last_name = $request->input('lastName');
		$user->birthDate = $request->input('birthDate');
		$user->aboutMe = $request->input("aboutMe");
        $user->privacy_policy = $request->input('terms');
        $user->gender = $request->input('gender');
        $user->email2 = $request->input('email2');
  	
	  
        if(!empty($user->interests->all())){
			$user->save();
			return Redirect::to("profile");
		}else{

			$step = Attainment::where('id','=',1)->first();
			$stepRegister = Auth::user()->attainmentUsers->count(); 
			$attainments = AttainmentUsers::where('user_id',$user->id)->where('attainment_id',$step->id)->first();			
			if($attainments != null)
				$attainments = AttainmentUsers::find($attainments->id);
			
			if($stepRegister == 0)
				$attainments = new AttainmentUsers;
			
			if(is_null($attainments->state_id))
			{				
				$attainments->user_id = $user->id;
				$attainments->attainment_id = $step->id;
				$attainments->state_id = 1;
				$attainments->save();
				$user->credits = $step->value;
				$user->save();

				return Redirect::to("/interest")->with('coin',$step->value);	
			}
			else
			{
				$user->save();
				return Redirect::to("/interest");	
			}
			
		}
  	

	}
	
	public function showFromInterest(){

		$categories = Category::all('id', 'category');
		
		$step = Attainment::where('id','=',2)->first();
		$stepRegister = Auth::user()->attainmentUsers->count();
		$attainments = AttainmentUsers::where('user_id',Auth::user()->id)->where('attainment_id',$step->id)->first();					
				
		if($attainments != null)		
			$attainments = AttainmentUsers::find($attainments->id);			
		

		if($stepRegister == 1)
		{
			$attainments = new AttainmentUsers;
			$attainments->state_id = 2;
		}
				
		$attainments->user_id = Auth::user()->id;
		$attainments->attainment_id = $step->id;
		$attainments->save();

		JavaScript::put([
			'interestJs' => Auth::user()->interests,				
		]);
		
		return view('/interest', compact('categories','pass2','pass1','pass3'));

	}

	public function saveInterest(Request $request){

		$interestAct = InterestUser::where('user_id', Auth::User()->id);
		$interestAct->delete();
		$user = Auth::user();

		$step = Attainment::where('id','=',2)->first();		
		$attainments = AttainmentUsers::where('user_id',$user->id)->where('attainment_id',$step->id)->first();					
				
		if($attainments != null)
			$attainments = AttainmentUsers::find($attainments->id);

		
		foreach($request->get('interets') as $interets){
			
			InterestUser::create([
					'user_id' => Auth::User()->id,
					'category_id' => $interets
			]);
		}	
			
		if($attainments->state_id == 2)
		{
			$attainments->state_id = 1;
			$attainments->save();
			$user->credits = $user->credits + $step->value; 
			$user->save();
			return redirect("/service")->with('coin',$step->value);
		}
		else
		{			
			return redirect("/service");			
		}		

	}

//====================== Deactivate Account User ======================================

	public function deactivateAccount()
	{
		//Deactivate User
		$user = User::find(Auth::User()->id);
		$user->state_id = 2;

		//Deactivate Services
		$idservice = Service::select('id')->whereUserId(Auth::User()->id)->get();
		
		foreach ($idservice as $id) 
		{		
			$service = Service::find($id->id);
			$service->state_id = 2;
			$service->save();
		}

		$user->save();
		Auth::logout();

		return redirect("/");
	}

//====================== End Deactivate Account User ==================================

}

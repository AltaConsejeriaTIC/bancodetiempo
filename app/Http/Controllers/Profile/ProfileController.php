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
use App\Models\Service;
use JavaScript;

class ProfileController extends Controller
{
   public function showProfile()
    {
    		$categories = Category::all();
        $user = User::find(auth::user()->id);

        JavaScript::put([
					'userJs'=> $user,
					'dayJs' => date("d",strtotime($user->birthDate)),
					'mounthJs' => date("m",strtotime($user->birthDate)),
					'yearJs' => date("Y",strtotime($user->birthDate)),

				]);

        return view('profile/profile', compact('user','categories'));
        
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
     			'avatar' => $pathImage . $imageName
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
          		'terms' => 'required'
	   	]);

	   	$birthdate = $request->input('year')."-".$request->input('mounth')."-".$request->input('day');
	   	
	 	$user = Auth::user ();
    $user->avatar = $this->editProfilePicture($request);
		$user->first_name = $request->input('firstName');
		$user->last_name = $request->input('lastName');
		$user->birthDate = $birthdate;
		$user->aboutMe = $request->input("aboutMe");
	  $user->privacy_policy = $request->input('terms');
	  $user->gender = $request->input('gender');
	  $user->save();

		if(!empty($user->interests->all())){

			return Redirect::to("profile");

		}else{

			return Redirect::to("/profile/interest");

		}

	}

	public function showFromInterest(){

		$categories = Category::all('id', 'category');

		return view('profile/interest', compact('categories'));

	}

	public function saveInterest(Request $request){

		foreach($request->get('interets') as $interets){

			InterestUser::create([
					'user_id' => Auth::User()->id,
					'category_id' => $interets
			]);

		}

		return redirect("/service");


	}

//====================== Deactivate Account User ======================================

	public function deactivateAccount()
	{
		//Deactivate User
		$user = User::find(Auth::User()->id);
		$user->state_id = 2;

		//Deactivate Services
		$idservice = Service::select('id')->whereUserId(Auth::User()->id)->first();
		$service = Service::find($idservice->id);
		$service->state_id = 2;

		$user->save();
		$service->save();
		Auth::logout();

		return "true";
	}

//====================== End Deactivate Account User ==================================

}

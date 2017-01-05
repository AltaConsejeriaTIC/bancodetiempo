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


class ProfileController extends Controller
{
   public function showProfile()
    {
        $user = User::find(auth::user()->id);
        return view('profile/profile', compact('user'));


    }
   public function showEditProfile()
    {
		$user = User::find(Auth::User()->id);
        return view('profile/edit', compact('user'));

    }
//====================== Photo User ==================================


public function  updatePhoto(Request $request){

        $file = $request->file('image');
     		if(!$file){
     			return false;
     		}
     		$imageName = 'img' . Auth::User()->id . '-' . $file->getClientOriginalExtension();

     		$pathImage = 'resources/user/user_'. Auth::User()->id;

     		$file->move(base_path() . '/public/' . $pathImage, $imageName);

     		User::find(Auth::User()->id)->update([
     			'avatar' => $pathImage . $imageName
     		]);

     		return $pathImage . $imageName;

     }

//=====================================================================

   public function editProfile(Request $request){

	   	$this->validate($request, [
	   			'firstName' => 'required|min:3|alpha_spaces',
	   			'lastName' => 'required|min:3|alpha_spaces',
	   			'birthdate' => 'required|date',
	   			'aboutMe' => 'required|min:50|max:250',
          'privacy_policy' => 'required'
	   	]);

	 	$user = Auth::user ();
		$user->first_name = $request->input('firstName');
		$user->last_name = $request->input('lastName');
		$user->birthDate = date("Y-m-d", strtotime($request->input('birthdate')));
		$user->aboutMe = $request->input("aboutMe");
    $user->privacy_policy = $request->input('privacy_policy');
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

//====================== Deactive Account User ======================================

	public function deactiveAccount()
	{
		
	}	

//====================== End Deactive Account User ==================================	
	
}

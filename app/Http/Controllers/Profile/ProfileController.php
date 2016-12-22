<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Illuminate\Support\Facades\Input;


class ProfileController extends Controller
{
   public function showProfile()
    {
        $user = Auth::user();
        return view('profile/profile', compact('user'));
        

    }
   public function showEditProfile()
    {
		$user = User::find(Auth::User()->id);
        return view('profile/edit', compact('user'));
        
    }

   public function editProfile(Request $request){
    
	 	$user = Auth::user ();
		$user->first_name = $request->input('firstName');
		$user->last_name = $request->input('lastName');
		$user->gender = $request->input('gender');
		$user->birthDate = date("Y-m-d", strtotime($request->input('birthdate')));
		$user->aboutMe = $request->input("aboutMe");
		$user->address = $request->input('address');
		$user->website = $request->input('website');
		$user->save();
		
		return Redirect::to("profile");		
		
	}
	
	public function showFromInterest(){
				
		
		return view('profile/interest');
		
	}

}
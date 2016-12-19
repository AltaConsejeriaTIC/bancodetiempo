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
		$user = Auth::user();
        return view('profile/edit', compact('user'));
        
    }

   public function editProfile(Request $request){
    
	 	$user = Auth::user ();
		$user->first_name = $request->input('firstName');
		$user->last_name = $request->input('lastName');
		$user->gender = $request->input('gender');
		$user->birthDate = $request->input('birthday');
		$user->aboutMe = $request->input("aboutMe");
		$user->address = $request->input('address');
		$user->website = $request->input('website');
		$user->save();
		
		return Redirect::to("profile");		
		
	}


}
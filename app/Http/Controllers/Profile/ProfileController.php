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
use App\Models\Campaigns;
use JavaScript;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AttainmentsController;

class ProfileController extends Controller
{
   public function showProfile(){
        $user = User::find(auth::user()->id);
        $services = Service::where("user_id" , Auth::id())->where('state_id' , 1)->orderBy("created_at","desc")->get();
        $campaigns = Campaigns::campaignsUser(Auth::user()->id)->get();
        return view('profile/profile', compact('services', 'campaigns'));
    }

    public function showProfileUser($user_id){
        $user = User::find($user_id);
        $services = Service::where("user_id" , $user->id)->where('state_id' , 1)->orderBy("created_at","desc")->get();

        return view('profile/profilePublic', compact('user', 'services', 'myGroups'));
    }

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

	public function editProfile(Request $request){
	 	$this->validateProfile($request);
	 	$picture=$this->editProfilePicture($request);
        $oldAboutMe = Auth::user()->aboutMe;
	 	if($picture !==false){
	       Auth::user()->avatar = $picture;
        }
		Auth::user()->first_name = $request->input('firstName');
		Auth::user()->last_name = $request->input('lastName');
		Auth::user()->birthDate = $request->input('birthDate');
		Auth::user()->aboutMe = $request->input("aboutMe");
        Auth::user()->gender = $request->input('gender');
        Auth::user()->email2 = $request->input('email2');
        Auth::user()->save();
        if($oldAboutMe == '' && Auth::user()->aboutMe != ''){
            AttainmentsController::saveAttainment(2);
        }
        return redirect()->back();
	}

    public function editEmail2(Request $request){
         $this->validate($request, [
	 			'email' => 'required|email'
         ]);
        Auth::user()->email2 = $request->input('email');
        Auth::user()->state_id = 1;
        Auth::user()->save();
        AttainmentsController::saveAttainment(1);
        return redirect("/home");
    }

    private function validateProfile($request){
        $this->validate($request, [
	 			'firstName' => 'required|min:3|alpha_spaces',
	 			'lastName' => 'required|min:3|alpha_spaces',
	 			'gender' => 'required',
	 			'aboutMe' => 'required|min:50|max:250',
	 			'image' => 'image|max:2000',
	 			'avatar' => 'max:2000|image',
	 			'email2' => 'required|email'
	 	]);
    }
	
	public function showFromInterest(){

		$categories = Category::all('id', 'category');

		JavaScript::put([
			'interestJs' => Auth::user()->interests,				
		]);
		
		return view('/interest', compact('categories'));

	}

	public function saveInterest(Request $request){

		$interestAct = InterestUser::where('user_id', Auth::User()->id);
		$interestAct->delete();
		foreach($request->get('interets') as $interets){
			InterestUser::create([
					'user_id' => Auth::User()->id,
					'category_id' => $interets
			]);
		}	
			
		AttainmentsController::saveAttainment(2);

        return redirect("/service");

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

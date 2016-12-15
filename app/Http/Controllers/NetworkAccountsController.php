<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Socialite;

use Illuminate\Support\Facades\Redirect;
use App\Models\NetworkAccounts;

use App\User;
use Illuminate\Support\Facades\Input;

class NetworkAccountsController extends Controller
{
	public function login($provider = ''){
	
		if(!$provider || $provider == ''){
			
			return Redirect::route("login");
			
		}
	
		$function = "redirect".ucwords($provider);
	
		return $this->$function();
	
	}
	
	public function createUser(Request $request){
		
			
		$account = new NetworkAccounts([
				'provider_id' => $request->input('provider_id'),
				'provider' => $request->input('provider')
		]);
		
		$user = User::whereEmail($request->input('email'))->first();
		
		if (!$user) {
			
			$user = User::create([
					'email' => $request->input('email'),
					'first_name' => $request->input('firstName'),
					'last_name' => $request->input('lastName'),
					'avatar' => $request->input('avatar'),
					'state' => true,
					'gender' => $request->input('gender'),
					'birthDate' => $request->input('birthday'),
					'aboutMe' => $request->input("aboutMe"),
					'address' => $request->input('address'),
					'website' => $request->input('website'),
					'role_id' => 2
			]);
		}
		
		$account->user()->associate($user);
		$account->save();
		
		auth()->login($user);
		
		return Redirect::to("service");
		
		
	}
	
	public function callback($provider = ""){
	
		if(!$provider || $provider == '' || Input::get("error")){
			return Redirect::route("login", array('message' => "Error en la autenticación"));
		}
	
		$function = "getProviderData".ucwords($provider);
	
		$providerData = $this->$function();
			
		$networkAccounts = new NetworkAccounts();
	
		$networkAccounts->start($providerData);
	
		if($networkAccounts->existsUser()){
				
			auth()->login($networkAccounts->getUser());
	
			return Redirect::to("home");
				
		}else{
				
			return view("auth/register", compact('providerData'));
	
		}
	
	}
	
	private function redirectFacebook(){
	
		return Socialite::driver('facebook')->fields([
				'first_name', 'last_name', 'email', 'gender', 'birthday'
		])->scopes([
				'email', 'user_birthday'
		])->redirect();
	
	}
	
	private function redirectGoogle(){
	
		return Socialite::driver('google')->redirect();
	
	}
	
	private function redirectLinkedin(){
	
		return Socialite::driver('linkedin')->fields([
				'first_name', 'last_name', 'email', 'gender', 'birthday'
		])->redirect();
	
	}
	
	private function getProviderDataFacebook(){
			
		$providerData = Socialite::driver("facebook")->fields([
				'first_name', 'last_name', 'email', 'gender', 'birthday'
		])->user();
		
		$newProviderData = [
				"first_name" => isset($providerData->getRaw()["first_name"]) ? $providerData->getRaw()["first_name"] : "",
				"last_name" =>  isset($providerData->getRaw()["last_name"]) ? $providerData->getRaw()["last_name"] : "",
				"email" =>  $providerData->getEmail(),
				"birthday" =>  isset($providerData->getRaw()["birthday"]) ? $providerData->getRaw()["birthday"] : "",
				"gender" =>  isset($providerData->getRaw()["gender"]) ? $providerData->getRaw()["gender"] : "",
				"id" =>  $providerData->getId(),
				"provider" => "facebook",
				"avatar" => $providerData->getAvatar()
	
		];
	
		return $newProviderData;
	
	}
	
	private function getProviderDataGoogle(){
	
		$providerData = Socialite::driver("google")->user();
	
		$newProviderData = [
				"first_name" => isset($providerData->getRaw()["name"]["givenName"]) ? $providerData->getRaw()["name"]["givenName"] : "",
				"last_name" =>  isset($providerData->getRaw()["name"]["familyName"]) ? $providerData->getRaw()["name"]["familyName"] : "",
				"email" =>  $providerData->getEmail(),
				"birthday" =>  "",
				"gender" =>  isset($providerData->getRaw()["gender"]) ? $providerData->getRaw()["gender"] : "",
				"id" =>  $providerData->getId(),
				"provider" => "google",
				"avatar" => $providerData->getAvatar()
	
		];
	
		return $newProviderData;
	
	}
	
	private function getProviderDataLinkedin(){
	
		$providerData = Socialite::driver("linkedin")->user();
	
		$newProviderData = [
				"first_name" => isset($providerData->getRaw()["firstName"]) ? $providerData->getRaw()["firstName"] : "",
				"last_name" =>  isset($providerData->getRaw()["lastName"]) ? $providerData->getRaw()["lastName"] : "",
				"email" =>  $providerData->getEmail(),
				"birthday" =>  isset($providerData->getRaw()["birthday"]) ? $providerData->getRaw()["birthday"] : "",
				"gender" =>  isset($providerData->getRaw()["gender"]) ? $providerData->getRaw()["gender"] : "",
				"id" =>  $providerData->getId(),
				"provider" => "linkedin",
				"avatar" => $providerData->getAvatar()
	
		];
			
		return $newProviderData;
	
	}
}

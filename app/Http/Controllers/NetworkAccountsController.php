<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Socialite;

use Illuminate\Support\Facades\Redirect;
use App\Models\NetworkAccounts;

class NetworkAccountsController extends Controller
{
	public function login($provider = ''){
	
		if(!$provider || $provider == ''){
			return Redirect::route("login", array('message' => "Error en la autenticación"));
		}
	
		$function = "redirect".ucwords($provider);
	
		return $this->$function();
	
	}
	
	public function callback($provider = ""){
	
		if(!$provider || $provider == ''){
			return Redirect::route("login", array('message' => "Error en la autenticación"));
		}
	
		$function = "getProviderData".ucwords($provider);
	
		$providerData = $this->$function();
			
		$networkAccounts = new NetworkAccounts();
	
		$networkAccounts->start($providerData);
	
		if($networkAccounts->existsUser()){
				
			auth()->login($networkAccounts->getUser());
	
			return Redirect::route("home");
				
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
				"first_name" => $providerData->getRaw()["first_name"],
				"last_name" =>  $providerData->getRaw()["last_name"],
				"email" =>  $providerData->getEmail(),
				"birthday" =>  $providerData->getRaw()["birthday"],
				"gender" =>  $providerData->getRaw()["gender"],
				"id" =>  $providerData->getId(),
				"avatar" => $providerData->getAvatar()
	
		];
	
		return $newProviderData;
	
	}
	
	private function getProviderDataGoogle(){
	
		$providerData = Socialite::driver("google")->user();
	
		$newProviderData = [
				"first_name" => $providerData->getRaw()["name"]["givenName"],
				"last_name" =>  $providerData->getRaw()["name"]["familyName"],
				"email" =>  $providerData->getEmail(),
				"birthday" =>  "",
				"gender" =>  $providerData->getRaw()["gender"],
				"id" =>  $providerData->getId(),
				"avatar" => $providerData->getAvatar()
	
		];
	
		return $newProviderData;
	
	}
	
	private function getProviderDataLinkedin(){
	
		$providerData = Socialite::driver("linkedin")->user();
	
		$newProviderData = [
				"first_name" => $providerData->getRaw()["firstName"],
				"last_name" =>  $providerData->getRaw()["lastName"],
				"email" =>  $providerData->getEmail(),
				"birthday" =>  "",
				"gender" =>  "",
				"id" =>  $providerData->getId(),
				"avatar" => $providerData->getAvatar()
	
		];
			
		return $newProviderData;
	
	}
}

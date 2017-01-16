<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Socialite;

use Illuminate\Support\Facades\Redirect;
use App\Models\NetworkAccounts;

use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use JavaScript;

class NetworkAccountsController extends Controller
{
	public function login($provider = ''){

		if(!$provider || $provider == ''){

			return Redirect::route("login");

		}

		$function = "redirect".ucwords($provider);

		return $this->$function();

	}

	public function showFrom(){

		$user = User::findOrFail(Auth::user()->id);

		JavaScript::put([
			'userJs'=> $user,
			'dayJs' => date("d",strtotime($user->birthDate)),
			'mounthJs' => date("m",strtotime($user->birthDate)),
			'yearJs' => date("Y",strtotime($user->birthDate)),

		]);

		return view('auth/register', compact('user'));

	}

	public function createUser($providerData){


		$account = new NetworkAccounts([
				'provider_id' => $providerData['id'],
				'provider' => $providerData['provider']
		]);

		$user = User::whereEmail($providerData['email'])->first();

		if (!$user) {

			$user = User::create([
					'email' => $providerData['email'],
					'first_name' => $providerData['first_name'],
					'last_name' => $providerData['last_name'],
					'avatar' => $providerData['avatar'],
					'state_id' => 1,
					'gender' => $providerData['gender'],
					'birthDate' => date("Y-m-d", strtotime($providerData['birthdate'])),
					'role_id' => 2
			]);
		}

		$account->user()->associate($user);
		$account->save();

		auth()->login($user);

		return true;

	}

	public function callback($provider){

		if(!$provider || $provider == '' || Input::get("error")){
			return Redirect::route("login", array('message' => "Error en la autenticaci&ntilde;n"));
		}

		$function = "getProviderData".ucwords($provider);

		$providerData = $this->$function();

		$networkAccounts = new NetworkAccounts();

		$networkAccounts->start($providerData);

		if($networkAccounts->existsUser())
		{

			auth()->login($networkAccounts->getUser());
			
			if(auth()->user()->privacy_policy == 0)
				return redirect('register');
			else
				return Redirect::to("home");

		}else{

			if($this->createUser($providerData)){

				return redirect('register');

			}

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
				"birthdate" =>  isset($providerData->getRaw()["birthday"]) ? $providerData->getRaw()["birthday"] : "",
				"gender" =>  isset($providerData->getRaw()["gender"]) ? $providerData->getRaw()["gender"] : "",
				"id" =>  $providerData->getId(),
				"provider" => "facebook",
				"avatar" => $providerData->avatar_original

		];

		return $newProviderData;

	}

	private function getProviderDataGoogle(){

		$providerData = Socialite::driver("google")->user();

		$newProviderData = [
				"first_name" => isset($providerData->getRaw()["name"]["givenName"]) ? $providerData->getRaw()["name"]["givenName"] : "",
				"last_name" =>  isset($providerData->getRaw()["name"]["familyName"]) ? $providerData->getRaw()["name"]["familyName"] : "",
				"email" =>  $providerData->getEmail(),
				"birthdate" =>  "",
				"gender" =>  isset($providerData->getRaw()["gender"]) ? $providerData->getRaw()["gender"] : "",
				"id" =>  $providerData->getId(),
				"provider" => "google",
				"avatar" => $providerData->avatar_original

		];

		return $newProviderData;

	}

	private function getProviderDataLinkedin(){

		$providerData = Socialite::driver("linkedin")->user();

		$newProviderData = [
				"first_name" => isset($providerData->getRaw()["firstName"]) ? $providerData->getRaw()["firstName"] : "",
				"last_name" =>  isset($providerData->getRaw()["lastName"]) ? $providerData->getRaw()["lastName"] : "",
				"email" =>  $providerData->getEmail(),
				"birthdate" =>  isset($providerData->getRaw()["birthday"]) ? $providerData->getRaw()["birthday"] : "",
				"gender" =>  isset($providerData->getRaw()["gender"]) ? $providerData->getRaw()["gender"] : "",
				"id" =>  $providerData->getId(),
				"provider" => "linkedin",
				"avatar" => $providerData->avatar_original

		];

		return $newProviderData;

	}
}

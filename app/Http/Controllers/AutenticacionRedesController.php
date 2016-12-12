<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravel\Socialite\Contracts\User as ProviderUser;

use App\CuentasRedes as redes;

use Socialite;
use Illuminate\Support\Facades\Redirect;

class AutenticacionRedesController extends Controller
{
	
	/**
     * ccdaza
     * create 12/12/16
     * modification 12/12/16
	 * @param string $proveedor
	 * @return void
	 */
	public function login($proveedor = '')
	{
		switch ($proveedor){

			case "facebook":
			
				return Socialite::driver('facebook')->redirect();
				
			break;
			
			case "google":
					
				return Socialite::driver('google')->redirect();
			
			break;
			
			case "linkedin":
					
				return Socialite::driver('linkedin')->redirect();
					
			break;
			
		}
		
	}
	
	/**
     * ccdaza
     * create 12/12/16
     * modification 12/12/16
	 * @param string $provider
	 */
	public function callback($provider = "")
	{
				
		switch ($provider){
			
			case  "facebook":
				
				$providerData = Socialite::driver('facebook')->user();
				
			break;
			
			case  "google":
			
				$providerData = Socialite::driver('google')->user();
				
			break;
			
			case  "linkedin":
					
				$providerData = Socialite::driver('linkedin')->user();
			
			break;
				
			
		}
		
		$redes = new redes();
		
		$redes->iniciar($providerData);
		
		
		if($redes->existsUser()){
			
			auth()->login($redes->getUser());  
						
			return Redirect::route("home");
			
		}else{
			
			return Redirect::route("register", array('nombre' => $providerData->getName(), 'email' => $providerData->getEmail(), 'avatar' => $providerData->getAvatar()));
				
			
		}
		
		
		
	}
}

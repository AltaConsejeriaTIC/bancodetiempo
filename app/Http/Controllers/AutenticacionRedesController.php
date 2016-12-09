<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CuentasRedesServicio;

use Socialite;
use Illuminate\Support\Facades\Redirect;

class AutenticacionRedesController extends Controller
{
	public function login($proveedor = '')
	{
		switch ($proveedor){

			case "facebook":
			
				return Socialite::driver('facebook')->redirect();
				
			break;
		}
		
	}
	
	public function callback(CuentasRedesServicio $servicio)
	{
		
		$datos_proveedor = Socialite::driver('facebook')->user();
		
		$usuario = $servicio->crearObtenerUsuario($datos_proveedor);
		
		if ($usuario !== false){
			
			auth()->login($usuario);
			
			return redirect()->to('/home');
			
		}else{
			
			return Redirect::route("register", array('nombre' => $datos_proveedor->getName(), 'email' => $datos_proveedor->getEmail(), 'avatar' => $datos_proveedor->getAvatar()));
			
		}
		
	}
}

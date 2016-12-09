<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CuentasRedesServicio;

use Socialite;

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
		$usuario = $servicio->crearObtenerUsuario(Socialite::driver('facebook')->user());
		
		auth()->login($usuario);
		
		return redirect()->to('/home');
	}
}

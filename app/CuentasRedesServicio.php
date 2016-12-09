<?php
namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;

class CuentasRedesServicio
{
	public function crearObtenerUsuario(ProviderUser $proeveedorUsuario)
	{
		//validacion si existe la cuenta
		$cuenta = CuentasRedes::whereProveedor('facebook')
		->whereProveedorId($proeveedorUsuario->getId())
		->first();

		if ($cuenta) {
			//si existe la cuenta retorno datos de usuario
			return $cuenta->user;
		} else {

			return false;
			
			/*$cuenta = new CuentasRedes([
					'proveedor_id' => $proeveedorUsuario->getId(),
					'proveedor' => 'facebook'
			]);

			$usuario = User::whereEmail($proeveedorUsuario->getEmail())->first();

			if (!$usuario) {

				$user = User::create([
						'email' => $proeveedorUsuario->getEmail(),
						'name' => $proeveedorUsuario->getName(),
						'avatar' => $proeveedorUsuario->getAvatar(),
				]);
			}

			$cuenta->user()->associate($usuario);
			$cuenta->save();

			return $usuario;*/

		}

	}
}
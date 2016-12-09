<?php
namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;

class CuentasRedesServicio
{
	public function crearObtenerUsuario(ProviderUser $proeveedorUsuario)
	{
		$cuenta = CuentasRedes::whereProveedor('facebook')
		->whereProveedorId($proeveedorUsuario->getId())
		->first();

		if ($cuenta) {
			return $cuenta->user;
		} else {

			$cuenta = new CuentasRedes([
					'proveedor_id' => $proeveedorUsuario->getId(),
					'proveedor' => 'facebook'
			]);

			$usuario = User::whereEmail($proeveedorUsuario->getEmail())->first();

			if (!$usuario) {

				$user = User::create([
						'email' => $proeveedorUsuario->getEmail(),
						'name' => $proeveedorUsuario->getName(),
				]);
			}

			$cuenta->user()->associate($usuario);
			$cuenta->save();

			return $usuario;

		}

	}
}
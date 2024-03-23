<?php

namespace App\Models\User;

use App\Models\Model;
use Leaf\Helpers\Password;
use App\Services\proxy_bd;

class Auth_Manager extends Model
{
	//--------------------------------Login---------------------
	public function verifyLogin($email, $password): int
	{
		$bd = new proxy_bd();
		$user = $bd->queryLogin($email);

		if (!$user) {
			return 1;
		}
		if (Password::verify($password, $user['Password'])) {
			if ($user['Rol'] == "Admin") {
				return 3;
			}
			return 0;
		}
		return 2;
	}

	public function login($email)
	{
		$bd = new proxy_bd();
		$user = $bd->queryLogin($email);

		$this->loadSession($user["ID_User"],$user["Email"],$user["Rol"]);

	}

	public function loginAdmin($email, $code) : int
	{
		$bd = new proxy_bd();
		$user = $bd->queryLogin($email);

		$codeSecurity = $bd ->queryCodeSecurity($user["ID_User"]);

		if(Password::verify($code, $codeSecurity["PassSeguridad"]))
		{
			$this->loadSession($user["ID_User"],$user["Email"],$user["Rol"]);
			return 0;
		}
		return 1;

	}

	public function loadSession($id_user,$email,$rol)
	{
		session()->start();
		session()->set('ID_User', $id_user);
		session()->set('Email', $email);
		session()->set('Rol', $rol);
	}

	public function logout(): void
	{
		session_start();
		session()->clear();
	}
	//--------------------------------Register------------------

	public function registerPatient(
		$email,
		$password,
		$nombre,
		$apellidoPaterno,
		$apellidoMaterno,
		$rol,
		$foto,
		$direccion,
		$telefono,
		$fecha_Nac,
		$genero,
		$estado_civil,
		$NSS,
		$numero_Emergencia
	): bool {
		$patient = new Patient();
		$patient->setEmail($email);
		$patient->setPassword($password);
		$patient->setNombre($nombre);
		$patient->setApellido_p($apellidoPaterno);
		$patient->setApellido_m($apellidoMaterno);
		$patient->setRol($rol);
		$patient->setFoto($foto);
		$patient->setDireccion($direccion);
		$patient->setTelefono($telefono);
		$patient->setFecha_Nacimiento($fecha_Nac);
		$patient->setFecha_alta(date('Y-m-d'));
		$patient->setHora_alta(date('H:i:s'));
		$patient->setGenero($genero);
		$patient->setEstado_Civil($estado_civil);
		$patient->setNSS($NSS);
		$patient->setNumero_Emergencia($numero_Emergencia);

		$bd = new proxy_bd();
		return $bd->registerPatient($patient);
	}

	public function registerMedic(
		$email,
		$password,
		$nombre,
		$apellidoPaterno,
		$apellidoMaterno,
		$rol,
		$ifFoto,
		$direccion,
		$telefono,
		$fecha_Nac,
		$genero,
		$subrol,
		$nivelEstudio,
		$experienciaMedica,
		$area_Trabajo
	): bool {
		$medic = new Medic();
		$medic->setEmail($email);
		$medic->setPassword($password);
		$medic->setNombre($nombre);
		$medic->setApellido_p($apellidoPaterno);
		$medic->setApellido_m($apellidoMaterno);
		$medic->setRol($rol);
		$medic->setFecha_alta(date('Y-m-d'));
		$medic->setHora_alta(date('H:i:s'));
		$medic->setFoto($ifFoto);
		$medic->setDireccion($direccion);
		$medic->setTelefono($telefono);
		$medic->setFecha_Nacimiento($fecha_Nac);
		$medic->setGenero($genero);
		$medic->setSubrol($subrol);
		$medic->setNivel_Estudio($nivelEstudio);
		$medic->setExperiencia_Medic($experienciaMedica);
		$medic->setArea_Trabajo($area_Trabajo);

		$bd = new proxy_bd();
		return $bd->registerMedic($medic);
	}

	public function registerAdmin(
		$email,
		$password,
		$nombre,
		$apellidoPaterno,
		$apellidoMaterno,
		$rol,
		$ifFoto,
		$direccion,
		$telefono,
		$fecha_Nac,
		$genero,
		$subrol
	): array {
		$admin = new Admin();
		$admin->setEmail($email);
		$admin->setPassword($password);
		$admin->setNombre($nombre);
		$admin->setApellido_p($apellidoPaterno);
		$admin->setApellido_m($apellidoMaterno);
		$admin->setRol($rol);
		$admin->setFecha_alta(date('Y-m-d'));
		$admin->setHora_alta(date('H:i:s'));
		$admin->setFoto($ifFoto);
		$admin->setDireccion($direccion);
		$admin->setTelefono($telefono);
		$admin->setFecha_Nacimiento($fecha_Nac);
		$admin->setGenero($genero);
		$admin->setSubrol($subrol);

		$hasPass = $admin->generatePassSecurity();

		$bd = new proxy_bd();
		$respuesta = $bd->registerAdmin($admin);
		return [
			"respuesta" => $respuesta,
			"code" => $hasPass
		];
	}
}
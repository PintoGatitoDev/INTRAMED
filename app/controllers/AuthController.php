<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\User\Auth_Manager;

class AuthController extends Controller
{
	/* -------------------------- Views ---------------------------*/
	public function login_view()
	{
		session()->start();
		if (session()->get("ID_User")) {
			return app()->push("/");
		}
		$error = app()->request->get('error');
		if ($error) {
			return render("/Users/login", [
				"error" => $error,
			]);
		}
		return render("/Users/login");
	}
	public function register_view()
	{
		session()->start();
		return render('/Users/rolRegister');
	}
	public function register_Patient_View()
	{
		session()->start();
		return render('/Users/registerPatient');
	}
	public function register_Medic_View()
	{
		session()->start();
		if (app()->request->get('error')) {
			$error = app()->request->get('error');
			return render("/Users/registerMedic", [
				"error" => $error,
			]);
		}
		return render('/Users/registerMedic');
	}
	public function register_Admin_View()
	{
		session()->start();
		if (app()->request->get('error')) {
			$error = app()->request->get('error');
			return render("/Users/registerAdmin", [
				"error" => $error,
			]);
		}
		return render('/Users/registerAdmin');
	}

	public function codeSecurity_view()
	{
		session()->start();
		$code = app()->request()->get("code");
		return render('/Users/codeSecurity',[
			'code'=> $code,
		]);
	}

	public function codeLogin_view()
	{
		session()->start();
		$email = app()->request()->get('email');
		if (app()->request->get('error')) {
			$error = app()->request->get('error');
			return render('/Users/codeLogin',[
				'email'=> $email,
				"error" => $error
			]);
		}
		return render('/Users/codeLogin',[
			'email'=> $email,
		]);
	}

	/* ------------------------ Logic ---------------------------*/

	/* Login */
	public function login()
	{
		$email = app()->request->get('email');
		$password = app()->request->get('password');
		$g_autenticacion = new Auth_Manager();
		$resultLogin = $g_autenticacion->verifyLogin($email, $password);
		if ($resultLogin != 0) {
			if($resultLogin == 3)
			{
				return app()->push("/auth/codeLogin",[
					"email" => $email,
				]);
			}
			return app()->push('/auth/login',[
				"error" => $resultLogin
			]);
		}
		$g_autenticacion->login($email);
		return app()->push('/');
	}

	public function loginAdmin()
	{
		$email = app()->request()->get('email');
		$code = app()->request()->get('code');

		$g_autenticacion = new Auth_Manager();
		$resultLogin = $g_autenticacion->loginAdmin($email, $code);

		if($resultLogin != 0)
		{
			return app()->push('/auth/codeLogin',[
				"error" => $resultLogin,
				"email" => $email,
			]);
		}
		return app()->push('/');
	}

	/* logout */
	public function logout()
	{
		$g_Autenticacion = new Auth_Manager();
		$g_Autenticacion->logout();
		return redirect('/');
	}

	/* Selecion del rol para registrarse*/
	public function RegisterData()
	{
		$rol = app()->request->get('rol');
		$direccion = "/auth/register" . $rol;
		return app()->push($direccion);
	}

	/* Registro de paciente */
	public function registerPatient()
	{
		$email = app()->request->get('Email');
		$password = app()->request->get('Password');
		$nombre = app()->request->get('Nombre');
		$apellidoPaterno = app()->request->get('ApellidoPaterno');
		$apellidoMaterno = app()->request->get('ApellidoMaterno');
		$rol = app()->request->get('rol');
		$foto = app()->request->files('Foto');
		$direccion = app()->request->get('Direccion');
		$telefono = app()->request->get('Telefono');
		$fecha_Nac = app()->request->get('Fecha_Nac');
		$genero = app()->request->get('genero');
		$estado_civil = app()->request->get('estado-civil');
		$NSS = app()->request->get('NSS');
		$numero_Emergencia = app()->request->get('Num_Emergencia');

		$ifFoto = "public/assets/img/patients/" . date("Y-m-d-H-i-s") . "_" . $nombre . $apellidoPaterno . $apellidoMaterno . ".png";

		$g_Autenticacion = new Auth_Manager();

		$rRegistro = $g_Autenticacion->registerPatient(
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
			$estado_civil,
			$NSS,
			$numero_Emergencia
		);

		if ($rRegistro == 0) {
			move_uploaded_file($foto['tmp_name'], $ifFoto);
			return app()->push("/auth/login");
		}
		return app()->push("/auth/registerPatient?error=1");
	}

	public function registerMedic()
	{
		$email = app()->request->get('Email');
		$password = app()->request->get('Password');
		$nombre = app()->request->get('Nombre');
		$apellidoPaterno = app()->request->get('ApellidoPaterno');
		$apellidoMaterno = app()->request->get('ApellidoMaterno');
		$rol = app()->request->get('rol');
		$foto = app()->request->files('Foto');
		$direccion = app()->request->get('Direccion');
		$telefono = app()->request->get('Telefono');
		$fecha_Nac = app()->request->get('Fecha_Nac');
		$genero = app()->request->get('genero');
		$subrol = app()->request->get('Subrol');
		$nivel_Estudio = app()->request->get('Nivel_Estudio');
		$experiencia_Medic = app()->request->get('Experiencia_Medica');
		$area_Trabajo = app()->request->get('area_trabajo');

		$ifFoto = "public/assets/img/medics/" . date("Y-m-d-H-i-s") . "_" . $nombre . $apellidoPaterno . $apellidoMaterno . ".png";

		$g_Autenticacion = new Auth_Manager();
		if (
			$g_Autenticacion->registerMedic(
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
				$nivel_Estudio,
				$experiencia_Medic,
				$area_Trabajo
			) == 0
		) {
			move_uploaded_file($foto['tmp_name'], $ifFoto);
			return app()->push("/auth/login");
		}
		return app()->push("/auth/registerMedic?error=1");
	}

	public function registerAdmin()
	{
		$email = app()->request->get('Email');
		$password = app()->request->get('Password');
		$nombre = app()->request->get('Nombre');
		$apellidoPaterno = app()->request->get('ApellidoPaterno');
		$apellidoMaterno = app()->request->get('ApellidoMaterno');
		$rol = app()->request->get('rol');
		$foto = app()->request->files('Foto');
		$direccion = app()->request->get('Direccion');
		$telefono = app()->request->get('Telefono');
		$fecha_Nac = app()->request->get('Fecha_Nac');
		$genero = app()->request->get('genero');
		$subrol = app()->request->get('Subrol');

		$ifFoto = "public/assets/img/admins/" . date("Y-m-d-H-i-s") . "_" . $nombre . $apellidoPaterno . $apellidoMaterno . ".png";

		$g_Autenticacion = new Auth_Manager();

		$result = $g_Autenticacion->registerAdmin(
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
		);
		if ($result["respuesta"] == 0) {
			move_uploaded_file($foto['tmp_name'], $ifFoto);
			return app()->push("/auth/codeSecurity", ["code" => $result["code"]]);
		}

		return app()->push("/auth/registerAdmin?error=1");
	}

	

}
<?php

namespace App\Controllers;

use PhpParser\Node\Stmt\Return_;
use App\Models\User\Auth_Manager;

class AutenticacionController extends Controller
{
    /* Views */
    public function login_view()
    {
        render("Users/login");
    }

    public function register_view()
    {
        session_start();
        render('Users/selectRol');
    }

    public function register_Admin_View()
    {
        session_start();
        render('Users/registerAdmin');
    }

    public function register_Medic_View()
    {
        session_start();
        render('Users/registerMedic');
    }
    public function register_Patient_View()
    {
        session_start();
        render('Users/registerPatient');
    }

    /* Inicio de sesion */
    public function login()
    {
        if ($this->request->getMethod() === 'POST') {
            $email = app()->request->get('email');
            $password = app()->request->get('password');
            $g_autenticacion = new Auth_Manager();
            $resultLogin = $g_autenticacion->loginUser($email, $password);
            if (!$resultLogin) {
                return redirect('login?error=1');
            }
            return redirect('home');
        }
    }

    /* Registro */
    public function RegisterData()
    {
        $rol = app()->request->get('rol');
        if ($rol == "") {
            $error = "Rol no valido o no seleccionado";
            return redirect("registerRol");
        }

        $direccion = "register" . $rol;
        return redirect($direccion);
    }

    public function registerAdminBD()
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

        $ifFoto = "public/assets/img/Admins/" . $foto['name'];

        $g_Autenticacion = new Auth_Manager();
        if (
            $g_Autenticacion->registerAdmin(
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
            )
        ) {
            move_uploaded_file($foto['tmp_name'], $ifFoto);
            return redirect("home");
        }
    }

    public function registerMedicBD()
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

        $ifFoto = "public/assets/img/Medics/" . $foto['name'];

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
            )
        ){
            move_uploaded_file($foto['tmp_name'], $ifFoto);
            return redirect("home");
        }

    }

    public function registerPatientBD()
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

        $ifFoto = "public/assets/img/Patents/" . $foto['name'];



        $g_Autenticacion = new Auth_Manager();
        if (
            $g_Autenticacion->registerPatient(
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
            )
        ) {
            move_uploaded_file($foto['tmp_name'], $ifFoto);
            return redirect("home");
        }
    }

    /* Cerrar Sesion */
    public function logout()
    {
        $g_Autenticacion = new Auth_Manager();
        $g_Autenticacion->logout();
        redirect('login');
    }
}
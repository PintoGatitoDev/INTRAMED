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
        render('Users/selectRol');
    }

    public function register_Admin_View()
    {
        render('Users/registerAdmin');
    }

    public function register_Medic_View()
    {
        render('Users/registerMedic');
    }
    public function register_Patient_View()
    {
        render('Users/registerPatient');
    }

    /* Inicio de sesion */
    public function login()
    {
        if ($this->request->getMethod() === 'POST') {
            $email = app()->request->get('email');
            $password = app()->request->get('password');
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
        if ($this->request->getMethod() === 'POST') {
            $email = app()->request->get('Email');
            $password = app()->request->get('Password');
            $nombre = app()->request->get('Nombre');
            $apellidoPaterno = app()->request->get('ApellidoPaterno');
            $apellidoMaterno = app()->request->get('ApellidoMaterno');
            $direccion = app()->request->get('Direccion');
            $telefono = app()->request->get('Telefono');
            $rol = app()->request->get('rol');
            $subrol = app()->request->get('Subrol');

            $g_Autenticacion = new Auth_Manager();
            $g_Autenticacion->registerAdmin($email, $password, $nombre, $apellidoPaterno, $apellidoMaterno, $direccion, $telefono, $rol, $subrol);
        }
    }

    public function registerMedicBD()
    {
        if ($this->request->getMethod() === 'POST') {
            $email = app()->request->get('Email');
            $password = app()->request->get('Password');
            $nombre = app()->request->get('Nombre');
            $apellidoPaterno = app()->request->get('ApellidoPaterno');
            $apellidoMaterno = app()->request->get('ApellidoMaterno');
            $direccion = app()->request->get('Direccion');
            $telefono = app()->request->get('Telefono');
            $rol = app()->request->get('rol');
            $subrol = app()->request->get('Subrol');
            $nivelEstudio = app()->request()->get('Nivel_Estudio');
            $experienciaMedica = app()->request()->get('Experiencia_Medica');

            $g_Autenticacion = new Auth_Manager();
            $g_Autenticacion->registerMedic($email, $password, $nombre, $apellidoPaterno, $apellidoMaterno, $direccion, $telefono, $rol, $subrol,$nivelEstudio,$experienciaMedica);
        }
    }

    public function registerPatientBD()
    {
        if ($this->request->getMethod() === 'POST') {
            $email = app()->request->get('Email');
            $password = app()->request->get('Password');
            $nombre = app()->request->get('Nombre');
            $apellidoPaterno = app()->request->get('ApellidoPaterno');
            $apellidoMaterno = app()->request->get('ApellidoMaterno');
            $direccion = app()->request->get('Direccion');
            $telefono = app()->request->get('Telefono');
            $rol = app()->request->get('rol');
            $subrol = app()->request->get('Subrol');
            $estado_civil = app()->request()->get('estado-civil');
            $genero = app()->request()->get('genero');

            $g_Autenticacion = new Auth_Manager();
            $g_Autenticacion->registerPatient($email, $password, $nombre, $apellidoPaterno, $apellidoMaterno, 
            $direccion, $telefono, $rol, $subrol,$estado_civil,$genero);
        }
    }


    
}

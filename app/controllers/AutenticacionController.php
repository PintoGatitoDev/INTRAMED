<?php

namespace App\Controllers;

use PhpParser\Node\Stmt\Return_;
use Leaf\Helpers\Password;
use App\Models\User\Auth_Manager;

class AutenticacionController extends Controller
{
    /* Views */
    public function login_view()
    {
        if(app()->request->get('error'))
        {
            $error = app()->request->get('error');
            return render("/Users/login",[
                "error" =>$error
            ]);
        }
        render("/Users/login");
    }

    public function register_view()
    {
        session_start();
        render('/Users/selectRol');
    }

    public function register_Admin_View()
    {
        session_start();
        if(app()->request->get('error'))
        {
            $error = app()->request->get('error');
            return render("/Users/registerAdmin",[
                "error" => $error
            ]);
        }
        render('/Users/registerAdmin');
    }

    public function register_Medic_View()
    {
        session_start();
        if(app()->request->get('error'))
        {
            $error = app()->request->get('error');
            return render("/Users/registerMedic",[
                "error" => $error
            ]);
        }
        render('/Users/registerMedic');
    }
    public function register_Patient_View()
    {
        session_start();
        if(app()->request->get('error'))
        {
            $error = app()->request->get('error');
            return render("/Users/registerPatient",[
                "error" => $error
            ]);
        }
        render('/Users/registerPatient');
    }

    /* Inicio de sesion */
    public function login()
    {
            $email = app()->request->get('email');
            $password = app()->request->get('password');
            $g_autenticacion = new Auth_Manager();
            $resultLogin = $g_autenticacion->loginUser($email, $password);
            if ($resultLogin != 0) {
                return redirect('/login?error=' . $resultLogin);
            }
            return redirect('/home');
    }

    /* Registro */
    public function RegisterData()
    {
        $rol = app()->request->get('rol');
        if ($rol == "") {
            $error = "Rol no valido o no seleccionado";
            return redirect("/registerRol");
        }

        $direccion = "/register" . $rol;
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

        $ifFoto = "public/assets/img/Admins/" . date("Y-m-d-H-i-s") . "_". $nombre . $apellidoPaterno . $apellidoMaterno . ".png";

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
            ) == 0
        ) {
            move_uploaded_file($foto['tmp_name'] , $ifFoto);
            redirect("/login");
        }

        redirect("/registerAdmin?error=1");
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

        $ifFoto = "public/assets/img/Medics/" . date("Y-m-d-H-i-s") . "_". $nombre . $apellidoPaterno . $apellidoMaterno . ".png";

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
        ){
            move_uploaded_file($foto['tmp_name'], $ifFoto);
            return redirect("/login");
        }
        redirect("/registerMedic?error=1");
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

        $ifFoto = "public/assets/img/Patents/" . date("Y-m-d-H-i-s") . "_". $nombre . $apellidoPaterno . $apellidoMaterno . ".png";



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
            ) == 0
        ) {
            move_uploaded_file($foto['tmp_name'], $ifFoto);
            return redirect("/login");
        }
        redirect("/registerPatient?error=1");
    }

    /* Cerrar Sesion */
    public function logout()
    {
        $g_Autenticacion = new Auth_Manager();
        $g_Autenticacion->logout();
        redirect('/login');
    }
}
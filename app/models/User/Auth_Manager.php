<?php

namespace App\Models\User;

use App\Models\Model;
use App\Models\User\Admin;
use App\Models\User\Medic;
use App\Models\User\Patient;
use App\Services\proxy_bd;
use Leaf\Helpers\Password;
use Leaf\Auth;


class Auth_Manager extends Model
{
    public function registerAdmin($email, $password, $nombre, $apellidoPaterno,
    $apellidoMaterno, $rol, $ifFoto, $direccion, $telefono, $fecha_Nac,$genero, $subrol) : bool
    {
        $admin = new Admin();
        $admin->setEmail($email);
        $admin->setPassword(Password::hash($password, Password::BCRYPT));
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

        $admin->generatePassSecurity();

        $bd = new proxy_bd();
        return $bd->registerAdmin($admin);
    }

    public function registerMedic($email, $password, $nombre, $apellidoPaterno, $apellidoMaterno,
    $rol, $ifFoto, $direccion, $telefono, $fecha_Nac, $genero, $subrol, $nivelEstudio, $experienciaMedica, 
    $area_Trabajo) : bool
    {
        $medic = new Medic();
        $medic->setEmail($email);
        $medic->setPassword(Password::hash($password, Password::BCRYPT));
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

        $bd->registerMedic($medic);
        return true;
    }

    public function registerPatient($email, $password, $nombre, $apellidoPaterno, $apellidoMaterno, 
    $rol, $foto, $direccion, $telefono, $fecha_Nac, $genero, $estado_civil,$NSS, $numero_Emergencia): bool
    {
        $patient = new Patient();
        $patient->setEmail($email);
        $patient->setPassword(Password::hash($password, Password::BCRYPT));
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
        $bd->registerPatient($patient);
        return true;
    }

    public function loginUser($email,$password) : bool
    {
        $bd = new proxy_bd();

        $user = $bd->queryOneUser($email);
        if(!$user)
        {
            return false;
        }
        if (Password::verify($password, $user['Password'])) {
            session_start();
            $_SESSION['ID_User'] = $user['ID_Usuario'];
            $_SESSION['Email'] = $user['Email'];
            $_SESSION['Rol'] = $user['Rol'];
            return true;
        }
        return false;
    }

    public function logout() : void
    {
        session_start();
        session_destroy();
        session_unset();
    }
}
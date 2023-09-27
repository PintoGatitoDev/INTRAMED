<?php

namespace App\Controllers;


use App\Models\User\User_Manager;
use PhpParser\Node\Stmt\Return_;
class UserController extends Controller
{
    /* Views */
    public function profile()
    {
        session_start();
        if (!isset($_SESSION["Email"])) {
            return redirect("home");
        }

        $u_Manager = new User_Manager();
        $rol = $_SESSION["Rol"];
        $id_user = $_SESSION["ID_User"];
        $email = $_SESSION["Email"];
        if ($rol == "Patient") {
            $patient = $u_Manager->queryPatient($id_user);
            return render("Users/profile", [
                "email" => $patient->getEmail(),
                "nombre" => $patient->getNombre(),
                "apellido_p" => $patient->getApellido_p(),
                "apellido_m" => $patient->getApellido_m(),
                "rol" => $patient->getRol(),
                "fecha_alta" => $patient->getFecha_alta(),
                "hora_alta" => $patient->getHora_alta(),
                "foto" => $patient->getFoto(),
                "direccion" => $patient->getDireccion(),
                "telefono" => $patient->getTelefono(),
                "fecha_nac" => $patient->getFecha_Nacimiento(),
                "genero" => $patient->getGenero(),
                "estado_civil" => $patient->getEstado_Civil(),
                "NSS" => $patient->getNSS(),
                "numero_Emergencia" => $patient->getNumero_Emergencia()
            ]);
        }
        elseif($rol == "Medic")
        {
            $medic = $u_Manager->queryMedic($id_user);
            return render("Users/profile", [
                "email" => $medic->getEmail(),
                "nombre" => $medic->getNombre(),
                "apellido_p" => $medic->getApellido_p(),
                "apellido_m" => $medic->getApellido_m(),
                "rol" => $medic->getRol(),
                "fecha_alta" => $medic->getFecha_alta(),
                "hora_alta" => $medic->getHora_alta(),
                "foto" => $medic->getFoto(),
                "direccion" => $medic->getDireccion(),
                "telefono" => $medic->getTelefono(),
                "fecha_nac" => $medic->getFecha_Nacimiento(),
                "genero" => $medic->getGenero(),
                "subrol" => $medic->getSubrol(),
                "nivel_Estudio" => $medic->getNivel_Estudio(),
                "experiencia" => $medic->getExperiencia_Medic(),
                "area_Trabajo" => $medic->getArea_Trabajo()
            ]);
        }
        else
        {
            $admin = $u_Manager->queryAdmin($id_user);
            return render("Users/profile", [
                "email" => $admin->getEmail(),
                "nombre" => $admin->getNombre(),
                "apellido_p" => $admin->getApellido_p(),
                "apellido_m" => $admin->getApellido_m(),
                "rol" => $admin->getRol(),
                "fecha_alta" => $admin->getFecha_alta(),
                "hora_alta" => $admin->getHora_alta(),
                "foto" => $admin->getFoto(),
                "direccion" => $admin->getDireccion(),
                "telefono" => $admin->getTelefono(),
                "fecha_nac" => $admin->getFecha_Nacimiento(),
                "genero" => $admin->getGenero(),
                "subrol" => $admin->getSubrol(),
                "pass_Security" => $admin->getPassSecurity()
            ]);
        }
    }

    public function editInfPago($id)
    {
        echo $id;
    }

    public function newInfPago_view()
    {
        return render('Users/InfPago/NewInfPago');
    }

    public function addMethodBD()
    {
        $numero_tarjeta = app()->request->get('email');
        $forma_cuenta = app()->request->get('forma_cuenta');
        $nombre_titular = app()->request->get('nombre_titular');
        $vencimiento = app()->request->get('vencimiento');
        $saldo = app()->request->get('saldo');

        
    }

}
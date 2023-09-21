<?php

namespace App\Controllers;


use App\Models\User\User_Manager;

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
                "genero" => $patient->getGenero()
            ]);
        }
    }

}
<?php

namespace App\Controllers;

use App\Models\User\User_Manager;



class UserController extends Controller
{

    /*----------------------------------------------Profile--------------------------------------------*/
    public function profile()
    {
        session()->start();
        if (!session()->get("Email")) {
            return app()->push("/");
        }

        $u_Manager = new User_Manager();
        $rol = session()->get("Rol");
        $id_user = session()->get("ID_User");

        if ($rol == "Patient") {
            $patient = $u_Manager->queryPatient($id_user);
            return render("Users/profile", [
                "id_user" => $patient->getId_user(),
                "id_paciente" => $patient->getId_patient(),
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
                "numero_Emergencia" => $patient->getNumero_Emergencia(),
                "Pagos" => $patient->getInfPago(),
                "datos_Medicos" => $patient->getDatosM()
            ]);
        } elseif ($rol == "Medic") {
        } else {
        }
    }

    /*-----------------------------------------------Inf Pago---------------------------------------------------------*/

    public function newInfPago_View($id)
    {
        session_start();
        return render('/Users/InfPago/NewInfPago', [
            "id_paciente" => $id
        ]);
    }

    public function addInfPago()
    {
        $numero_tarjeta = app()->request->get('email');
        $numero_tarjeta = app()->request->get('numero_tarjeta');
        $forma_cuenta = app()->request->get('forma_cuenta');
        $nombre_titular = app()->request->get('nombre_titular');
        $vencimiento = app()->request->get('vencimiento');
        $saldo = app()->request->get('saldo');
        $id_paciente = app()->request->get('id_paciente');

        $u_manager = new User_Manager();
        $u_manager->addMethodPago(
            $id_paciente,
            $numero_tarjeta,
            $forma_cuenta,
            $nombre_titular,
            $vencimiento,
            $saldo
        );
        return app()->push("/user/profile");
    }

    public function DelInfPago($id)
    {
        $u_manager = new User_Manager();
        $u_manager->delMethodPago($id);
        return app()->push("/User/profile");
    }
}
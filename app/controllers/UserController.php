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
            $medic = $u_Manager->queryMedic($id_user);
            return render("Users/profile", [
                "id_user" => $medic->getId_user(),
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
        } else {
            $admin = $u_Manager->queryAdmin($id_user);
            return render("Users/profile", [
                "id_user" => $admin->getId_user(),
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

    /*-----------------------------------------------Inf Personal---------------------------------------------------------*/
    public function editInfPersonal($id)
    {
        
        $nombre = app()->request->get('Nombre');
        $apellidoPaterno = app()->request->get('ApellidoPaterno');
        $apellidoMaterno = app()->request->get('ApellidoMaterno');
        $fecha_Nac = app()->request->get('Fecha_Nac');
        $rol = app()->request->get('Rol');

        $u_manager = new User_Manager();
        if ($rol == "Patient") {
            $estado_civil = app()->request->get('estado-civil');
            $u_manager->updateDatPersonalPaciente($id, $nombre, $apellidoPaterno, $apellidoMaterno, $fecha_Nac, $estado_civil);
        }
        elseif ($rol == "Medic")
        {
            $subrol = app()->request->get('Subrol');
            $area_trabajo = app()->request->get('area_trabajo');
            $u_manager->updateDatPersonalMedico($id, $nombre, $apellidoPaterno, $apellidoMaterno, $fecha_Nac,$subrol, $area_trabajo);
        }
        else
        {
            $subrol = app()->request->get('Subrol');
            $u_manager->updateDatPersonalAdmin($id, $nombre, $apellidoPaterno, $apellidoMaterno, $fecha_Nac, $subrol);
        }
        return redirect("/user/profile");
    }

    public  function editContacto($id)
    {
        $Telefono = app()->request->get('Telefono');
        $Direccion = app()->request->get('Direccion');
        $rol = app()->request->get('Rol');
        $u_manager = new User_Manager();
        if($rol == "Patient")
        {
            $numero_Emergencia = app()->request->get('numero_Emergencia');
            $u_manager->updateDatContactoPatient($id,$Telefono,$Direccion,$numero_Emergencia);
        }
        else
        {
            $u_manager->updateDatContactoUser($id,$Telefono,$Direccion);
        }
        return redirect("/user/profile");
    }

    /*-----------------------------------------------Inf Medic--------------------------------------------------------*/
    public function newInfMedic_view($id)
    {
        session_start();
        return render("/Users/DataMedic/NewInfMedic", [
            "id_paciente" => $id
        ]);
    }

    public function infMedicView($id,$id_info)
    {
        session_start();
        $u_Manager = new User_Manager();
        $infoMedic = $u_Manager->queryInfMedic($id_info);
        return render("/Users/DataMedic/DataMedic",[
            "InfMedic" => $infoMedic
        ]);
    }

    public function addInfMedic($id)
    {
        $id_paciente = $id;
        $peso = app()->request->get('peso');
        $altura = app()->request->get('altura');
        $grupo_sanguineo = app()->request->get('grupo_sanguineo');
        $presion_corporal = app()->request->get('presion_corporal');
        $nivel_glucosa = app()->request->get('nivel_glucosa');
        $incapacidades = app()->request->get('incapacidades');
        $notas = app()->request->get('notas');

        $u_Manager = new User_Manager();

        $u_Manager->addInfMedic($id_paciente,$peso,$altura,$grupo_sanguineo,$presion_corporal,$nivel_glucosa,$incapacidades,$notas);

        return redirect("/user/profile");
    }

    public function DelInfMedic($id_user,$id_info)
    {
        $u_manager = new User_Manager();

        $u_manager->delInfMedic($id_info);

        return redirect ("/user/profile");
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

    public function DelInfPago($id_paciente,$id)
    {
        $u_manager = new User_Manager();
        $u_manager->delMethodPago($id);
        return app()->push("/user/profile");
    }

    
}
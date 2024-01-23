<?php

namespace App\Models\User;

use App\Models\Model;
use App\Models\User\Admin;
use App\Models\User\Medic;
use App\Models\User\Patient;
use App\Services\proxy_bd;
use App\Models\User\Pago\InfPago;
use App\Models\User\DatosMedicos\DatosMedicos;


class User_Manager extends Model
{
    public function queryPatient(int $id_user) : Patient
    {
        $bd = new proxy_bd();
        $user = $bd->queryPatient($id_user);
        $pago = $bd->queryMethodPago($user->getId_patient());
        $infMedic = $bd->queryID_Dato($user->getId_patient());
        $user->setInfPago($pago);
        $user->setDatosM($infMedic);
        return $user;
    }

    public function queryID_Patient(int $id_user) : Patient
    {
        $bd = new proxy_bd();
        $patient = new Patient();

        $patient->setId_patient($bd->queryID_Patient($id_user));
        return $patient;
    }

    public function queryID_Medic(int $id_user) : Medic
    {
        $bd = new proxy_bd();
        $medic = new Medic();

        $medic->setId_Medic($bd->queryID_Medic($id_user));
        return $medic;
    }

    public function queryMedic(int $id_user) : Medic
    {
        $bd = new proxy_bd();
        $user = $bd->queryMedic($id_user);
        return $user;
    }

    public function queryAdmin(int $id_user) : Admin
    {
        $bd = new proxy_bd();
        $user = $bd->queryAdmin($id_user);
        return $user;
    }

    public function queryInfMedic($id_dato)
    {
        $bd = new proxy_bd();
        $infMedic = $bd->queryInfMedic($id_dato);
        return $infMedic;
    }

    public function addMethodPago(int $id_paciente,int $numero_tarjeta,
    string $forma_cuenta, string $nombre_titular,
    string $vencimiento,int $saldo) : bool
    {
        $infPago = new InfPago();
        $infPago->setID_Paciente($id_paciente);
        $infPago->setNumero_Cuenta($numero_tarjeta);
        $infPago->setForma_Cuenta($forma_cuenta);
        $infPago->setNombre_Titular($nombre_titular);
        $infPago->setVencimiento_Cuenta($vencimiento);
        $infPago->setSaldo($saldo);

        $bd = new proxy_bd();
        
        return $bd->addMethond($infPago);
    }

    public function addInfMedic($id_paciente,$peso,$altura,$grupo_sanguineo,$presion_corporal,
    $nivel_glucosa,$incapacidades,$notas)
    {
        $infMedic = new DatosMedicos();
        $infMedic->setPeso($peso);
        $infMedic->setAltura($altura);
        $infMedic->setGrupo_Sanguineo($grupo_sanguineo);
        $infMedic->setPresion_Arterial($presion_corporal);
        $infMedic->setNivel_Glucosa($nivel_glucosa);
        $infMedic->setIncapacidades($incapacidades);
        $infMedic->setNota($notas);
        $infMedic->setFecha_Historial(date('Y-m-d'));

        $bd = new proxy_bd();
        $bd->addInfoMedic($infMedic,$id_paciente);
    }

    public function updateDatPersonalPaciente($id, $nombre, $apellidoPaterno, $apellidoMaterno, 
    $fecha_Nac, $estado_civil)
    {
        $patient = new Patient();
        $patient->setId_user($id);
        $patient->setNombre($nombre);
        $patient->setApellido_p($apellidoPaterno);
        $patient->setApellido_m($apellidoMaterno);
        $patient->setFecha_Nacimiento($fecha_Nac);
        $patient->setEstado_Civil($estado_civil);

        $bd = new proxy_bd();
        $bd->updatePatientPersonal($patient);
    }

    public function updateDatPersonalMedico($id, $nombre, $apellidoPaterno, $apellidoMaterno, 
    $fecha_Nac,$subrol, $area_Trabajo)
    {
        $medic = new Medic();
        $medic->setId_user($id);
        $medic->setNombre($nombre);
        $medic->setApellido_p($apellidoPaterno);
        $medic->setApellido_m($apellidoMaterno);
        $medic->setFecha_Nacimiento($fecha_Nac);
        $medic->setSubrol($subrol);
        $medic->setArea_Trabajo($area_Trabajo);

        $bd = new proxy_bd();
        echo $bd->updateMedicPersonal($medic);
        
    }

    public function updateDatPersonalAdmin($id, $nombre, $apellidoPaterno, $apellidoMaterno, 
    $fecha_Nac, $subrol)
    {
        $admin = new Admin();
        $admin->setId_user($id);
        $admin->setNombre($nombre);
        $admin->setApellido_p($apellidoPaterno);
        $admin->setApellido_m($apellidoMaterno);
        $admin->setFecha_Nacimiento($fecha_Nac);
        $admin->setSubrol($subrol);

        $bd = new proxy_bd();
        echo $bd->updateAminPersonal($admin);
    }

    public function updateDatContactoUser($id,$Telefono,$direccion)
    {
        $bd = new proxy_bd();

        return $bd->updateUserContacto($id,$direccion,$Telefono);
    }

    public function updateDatContactoPatient($id,$Telefono,$direccion,$numero_Emergencia)
    {
        $bd = new proxy_bd();

        $bd->updateUserContacto($id,$direccion,$Telefono);
        $bd->updatePatientContacto($id,$numero_Emergencia);
    }

    //delete
    public function delMethodPago(int $id_infpago)
    {
        $bd = new proxy_bd();
        return $bd->deleteMethodPago($id_infpago);
    }

    public function delInfMedic(int $id_infMedic)
    {
        $bd = new proxy_bd();
        return $bd->deleteInfMedic($id_infMedic);
    }
}
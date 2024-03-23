<?php

namespace App\Models\User;

use App\Models\Model;
use App\Services\proxy_bd;
use App\Models\User\InfPago\InfPago;

class User_Manager extends Model
{
    /* ------------------------------------------------- User ------------------------------------------------------------- */
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

     /* ------------------------------------------------- Data Medics ------------------------------------------------------------- */


      /* ------------------------------------------------- Inf Pago ------------------------------------------------------------- */

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

}
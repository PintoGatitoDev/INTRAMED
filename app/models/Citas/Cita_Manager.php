<?php

namespace App\Models\Citas;

use App\Models\Model;
use App\Models\User\Medic;
use App\Models\User\User_Manager;
use App\Services\proxy_bd;
use App\Models\User\Patient;

/**
 * Base Model
 * ---
 * The base model provides a space to set atrributes
 * that are common to all models
 */
class Cita_Manager extends Model
{
    public function obtenerCitasDia($fecha)
    {
        $bd = new proxy_bd();

        $arrayCitasReservadas = $bd->queryCitasReservadas($fecha);

        return $arrayCitasReservadas;
    }

    public function reservarNuevaCita($id_paciente,$id_servicio,$fecha,$hora)
    {
        $cita = new Cita();
        $cita->setId_Paciente($id_paciente);
        $cita->setId_Servicio($id_servicio);
        $cita->setFecha($fecha);
        $cita->setHora($hora);
        $cita->setEstado("Reservada");

        $bd = new proxy_bd();
        $arrayID_Medicos = $bd->queryID_Medicos();
        $cita->setId_Medico($arrayID_Medicos[rand(0,count($arrayID_Medicos)-1)]);

        $disponibilidad = $bd->queryDisponibilidadCita($cita->getFecha(),$cita->getHora());
        if($disponibilidad)
        {
            return $bd->newCita($cita);
        }
        return false;
    }

    public function misCitas(int $id_user) : array
    {
        $bd = new proxy_bd();

        $id_paciente = $bd->queryID_Patient($id_user);
        $u_Manager = new User_Manager();
        $paciente = $u_Manager->queryID_Patient($id_user);
        return $bd->queryMisCitas($paciente);
    }

    public function Cita(int $id_cita)
    {
        $cita = new Cita();
        $cita->setId_Cita($id_cita);

        $bd = new proxy_bd();
        return $bd->queryCita($cita);
    }

    public function CitasPacientes(int $id_user)
    {
        $bd = new proxy_bd();
        $u_Manager = new User_Manager();
        $medic = $u_Manager->queryID_Medic($id_user);
        return $bd->queryCitaPacientes($medic);
    }

    public function Citas()
    {
        $bd = new proxy_bd();
        return $bd->queryCitas();
    }

    public function finalizarCita(int $id_cita)
    {
        $cita = new Cita();
        $cita->setId_Cita($id_cita);
        $cita->setEstado("Finalizado");

        $bd = new proxy_bd();
        return $bd->updateEstadoCita($cita);
    }


    public function agendarNuevaCita($id_paciente,$id_servicio,$id_cita,$fecha,$hora,$id_medico)
    {
        $citaActualizar = new Cita();

        $citaActualizar->setId_Cita($id_cita);
        $citaActualizar->setEstado("Realizada");

        $cita = new Cita();
        $cita->setId_Paciente($id_paciente);
        $cita->setId_Servicio($id_servicio);
        $cita->setId_Medico($id_medico);
        $cita->setFecha($fecha);
        $cita->setHora($hora);
        $cita->setEstado("Reservada");

        $bd = new proxy_bd();

        $disponibilidad = $bd->queryDisponibilidadCita($cita->getFecha(),$cita->getHora());
        if(!$disponibilidad)
        {
            return false;
        }
        $bd->newCita($cita);
        $bd->updateEstadoCita($citaActualizar);
        return true;
    }
}

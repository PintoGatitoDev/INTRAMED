<?php

namespace App\Models\Citas;

use App\Models\Model;
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

    public function reservarNuevaCita($id_paciente,$id_medico,$id_servicio,$fecha,$hora)
    {
        $cita = new Cita();
        $cita->setId_Paciente($id_paciente);
        $cita->setId_Medico($id_medico);
        $cita->setId_Servicio($id_servicio);
        $cita->setFecha($fecha);
        $cita->setHora($hora);

        $bd = new proxy_bd();
        return $bd->newCita($cita);
    }

    public function misCitas(int $id_user) : array
    {

        $bd = new proxy_bd();

        $paciente = $bd->queryPatient($id_user);
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
        $medic = $bd->queryMedic($id_user);
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
}

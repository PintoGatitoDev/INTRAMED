<?php

namespace App\Models\Pago;

use App\Models\Model;
use App\Models\Cita\Cita;
use App\Models\Pago\Pago;
use App\Models\User\User_Manager;
use App\Services\proxy_bd;
use App\Models\Cita\Cita_Manager;
use App\Models\Servicio\Servicio_Manager;

/**
 * Base Model
 * ---
 * The base model provides a space to set atrributes
 * that are common to all models
 */
class Pago_Manager extends Model
{
    public function generarFormatoPago(int $id_cita): array
    {
        $fechaE = date("Y-m-d");
        $horaE = date("H:i");
        $fechaL = date("Y-m-d", strtotime($fechaE . " + 10 days"));
        $cita_m = new Cita_Manager();
        $cita = $cita_m->Cita($id_cita);
        $servicio_m = new Servicio_Manager();
        $servicio = $servicio_m->queryServicio($cita["ID_Servicio"]);

        $arrayFormato = [
            "cita" => $cita,
            "servicio" => $servicio,
            "fechaE" => $fechaE,
            "HoraE" => $horaE,
            "fechaL" => $fechaL,
        ];

        return $arrayFormato;

    }

    public function guardarFormatoPago(int $id_cita,int $id_paciente, string $fechaE, string $horaE, string $fechaL, string $monto, string $cargos)
    {
        $pago = new Pago();
        $pago->setID_Cita($id_cita);
        $pago->setID_Paciente( $id_paciente );
        $pago->setFecha_Emitida($fechaE);
        $pago->setHora_Emitida($horaE);
        $pago->setFecha_Limite($fechaL);
        $pago->setMonto($monto);
        $pago->setCargos($cargos);

        $proxy_bd = new Proxy_bd();

        $proxy_bd->newFormatoPago($pago);
    }


    public function pagosRealizadosAdmin(): array
    {
        $proxy_bd = new Proxy_bd();
        return $proxy_bd->queryPagosRealizadosAdmin();
    }

    public function deudasPacientesAdmin(): array
    {
        $proxy_bd = new Proxy_bd();
        return $proxy_bd->queryDeudasPacienteAdmin();
    }

    public function Obtenerpago($id_pago){
        $proxy_bd = new Proxy_bd();
        $pago = $proxy_bd->queryPago($id_pago);

        $cita = new Cita();
        $cita->setID_Cita($pago->getID_Cita());
        $datosCita = $proxy_bd->queryCita($cita);

        return [
            "pago" => $pago,
            "datosCita" => $datosCita
        ];
    }

    public function pagosRealizadosP(int $id_user): array
    {
        $proxy_bd = new Proxy_bd();
        $id_paciente = $proxy_bd->queryID_Patient($id_user);
        return $proxy_bd->queryPagosRealizadosP($id_paciente);
    }

    public function pagosDeudadasP($id_user): array
    {
        $proxy_bd = new Proxy_bd();
        $id_paciente = $proxy_bd->queryID_Patient($id_user);
        return $proxy_bd->queryDeudas($id_paciente);
    }

    public function realizarPago($id_pago, $id_paciente, $id_metodo) : bool
    {
        $user_m =  new User_Manager();
        $metodo = $user_m->obtenerDatosMetodo($id_metodo);

        $datosPago = $this->Obtenerpago($id_pago);
        $pago = $datosPago["pago"];
        if($metodo->getSaldo() < $pago->getMonto())
        {
            return false;
        }
        
        echo $metodo->getSaldo() . "<br>";

        $metodo->quitarSaldo($pago->getMonto());

        echo $metodo->getSaldo();
        $proxy_bd = new Proxy_bd(); 
        $proxy_bd->updateSaldoMetodo($id_metodo,$metodo->getSaldo());
        $proxy_bd->updatePagarPago($id_pago);
        return true;
    }
}
<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Cita\Cita_Manager;
use App\Models\Pago\Pago_Manager;
use App\Models\User\User_Manager;

class PagoController extends Controller
{
    /*-----------------------------------------------------------Views---------------------------------------- */
    public function formPago_view($id_cita)
    {
        session()->start();
        if (!session()->get("ID_User")) {
            return app()->push("/");
        }
        $pago_m = new Pago_Manager();
        $datos = $pago_m->generarFormatoPago($id_cita);

        $cita = $datos["cita"];
        $servicio = $datos["servicio"];
        $fechaE = $datos["fechaE"];
        $horaE = $datos["HoraE"];
        $fechaL = $datos["fechaL"];

        return render("Pago/formato",[
            "cita" => $cita,
            "servicio" => $servicio,
            "fechaE" => $fechaE,
            "horaE" => $horaE,
            "fechaL" => $fechaL
        ]);
        
    }

    public function pagosRealizadosAdmin_view()
    {
        session()->start();
        if (!session()->get("ID_User")) {
            return app()->push("/");
        }

        $pago_m = new Pago_Manager();
        $arrayPagos = $pago_m->pagosRealizadosAdmin();
        return render("Pago/pagosRealizados",[
            "pagos" => $arrayPagos
        ]);
    }

    public function deudasPacientesAdmin_view()
    {
        session()->start();
        if (!session()->get("ID_User")) {
            return app()->push("/");
        }

        $pago_m = new Pago_Manager();
        $arrayPagos = $pago_m->deudasPacientesAdmin();
        return render("Pago/deudasPacientes",[
            "pagos" => $arrayPagos
        ]);
    }

    public function pago_view($id_pago)
    {
        session()->start();
        if (!session()->get("ID_User")) {
            return app()->push("/");
        }

        $pago_m = new Pago_Manager();
        $datos = $pago_m->Obtenerpago($id_pago);
        return render("Pago/pago",[
            "pago" => $datos["pago"],
            "datosCita" => $datos["datosCita"],
        ]);
    }

    public function pagosRPaciente_view()
    {
        session()->start();
        if (!session()->get("ID_User")) {
            return app()->push("/");
        }

        $id_user = session()->get("ID_User");

        $pago_m = new Pago_Manager();
        $pagosR = $pago_m->pagosRealizadosP($id_user);

        return render("Pago/pagosRPaciente",[
            "pagos" => $pagosR
        ]);
    }

    public function pagosDPaciente_view()
    {
        session()->start();
        if (!session()->get("ID_User")) {
            return app()->push("/");
        }

        $id_user = session()->get("ID_User");

        $pago_m = new Pago_Manager();
        $pagosD = $pago_m->pagosDeudadasP($id_user);

        return render("Pago/pagosDPaciente",[
            "pagos" => $pagosD
        ]);
    }

    public function seleccionarMetodo_view($id_pago,$id_paciente)
    {
        session()->start();
        if (!session()->get("ID_User")) {
            return app()->push("/");
        }

        $user_m = new User_Manager();
        $metodosP = $user_m->obtenerMethodPago($id_paciente);

        if(app()->request()->get("error"))
        {
            $error = app()->request()->get("error");
            return render("/Pago/selectMetodo",[
                "metodosP" => $metodosP,
                "id_pago" => $id_pago,
                "id_paciente" => $id_paciente,
                "error" => $error
            ]);
        }

        return render("/Pago/selectMetodo",[
            "metodosP" => $metodosP,
            "id_pago" => $id_pago,
            "id_paciente" => $id_paciente
        ]);
    }

    


    /*----------------------------------------------------------Logic---------------------------------------------------*/
    public function guardarFormato()
    {
        session()->start();
        $id_cita = app()->request()->get("ID_Cita");
        $fechaE = app()->request()->get("Fecha_Emitida");
        $horaE = app()->request()->get("Hora_Emitida");
        $fechaL = app()->request()->get("Fecha_Limite");
        $monto = app()->request()->get("Monto");
        $cargos = app()->request()->get("Cargos");
        $id_paciente = app()->request()->get("ID_Paciente");

        $pago_m = new Pago_Manager();
        $pago_m->guardarFormatoPago($id_cita,$id_paciente,$fechaE,$horaE,$fechaL,$monto,$cargos);

        $cita_m = new Cita_Manager();
        $cita_m->finalizarCita($id_cita);
        return app()->push("/");
    }

    public function realizarPago($id_pago,$id_paciente,$id_metodo)
    {
        session()->start();
        if (!session()->get("ID_User")) {
            return app()->push("/");
        }

        $pagoM = new Pago_Manager();
        $result = $pagoM->realizarPago($id_pago, $id_paciente, $id_metodo);

        if(!$result)
        {
            return app()->push("/pagos/pagar/" . $id_pago . "/paciente/" . $id_paciente, [
                "error" => 1
            ]);
        }

        return app()->push("/pagos/pagoRealizado/" . $id_pago);
    }
}
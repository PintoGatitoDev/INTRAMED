<?php
namespace App\Controllers;

use App\Models\Citas\Cita_Manager;
use App\Models\Servicio\Servicio_Manager;
use App\Models\User\Patient;
use App\Models\User\User_Manager;
use Leaf\Http\Response;

/**
 * This is the base controller for your Leaf MVC Project.
 * You can initialize packages or define methods here to use
 * them across all your other controllers which extend this one.
 */
class CitaController extends Controller {
	public function reservar_view() {
		session()->start();

		if (!session()->get("ID_User")) {
			return redirect("/");
		}
		$serv_Manager = new Servicio_Manager();
		$servicios = $serv_Manager->queryServicios();

		$u_Manager = new User_Manager();
		$paciente = $u_Manager->queryID_Patient(session()->get("ID_User"));

		if (app()->request->get('error')) {
			$error = app()->request->get('error');
			return render("Cita/ReservarCita", [
				"error" => $error,
				"paciente" => $paciente,
				"servicios" => $servicios,
				"ruta" => "/citas/reservar",
			]);
		}

		return render("Cita/ReservarCita", [
			"paciente" => $paciente,
			"servicios" => $servicios,
			"ruta" => "/citas/reservar",
		]);
	}

	public function reservar() {
		$id_paciente = app()->request->get("id_paciente");
		$id_servicio = app()->request->get("servicio");
		$fecha = app()->request->get("fecha");
		$hora = app()->request->get("horario");

		$C_manager = new Cita_Manager();
		$result = $C_manager->reservarNuevaCita($id_paciente, $id_servicio, $fecha, $hora);
		if (!$result) {
			return redirect('/citas/reservar?error=' . 0);
		}
		return redirect("/citas/misCitas");
	}

	public function agendarNueva_view($id_cita, $id_paciente) {
		session()->start();

		if (!session()->get("ID_User") && session()->get("Rol") == "Patient") {
			return redirect("/");
		}
		$serv_Manager = new Servicio_Manager();
		$servicios = $serv_Manager->queryServicios();

		$paciente = new Patient();
		$paciente->setId_patient($id_paciente);

		$uManager = new User_Manager();
		$medic = $uManager->queryMedic(session()->get("ID_User"));

		return render("Cita/ReservarCita", [
			"paciente" => $paciente,
			"servicios" => $servicios,
			"ruta" => "/citas/agendarNueva",
			"medic" => $medic,
			"id_cita" => $id_cita,
		]);
	}

	public function MisCitas() {
		session()->start();
		$id_user = session()->get("ID_User");;

		$C_manager = new Cita_Manager();

		$misCitas = $C_manager->misCitas($id_user);

		return render("Cita/MisCitas", [
			"Citas" => $misCitas,
		]);
	}

	public function Cita_View($id_cita) {
		session()->start();

		if(!isset($id_cita))
		{
			return redirect("/");
		}
		$C_manager = new Cita_Manager();

		$datosCita = $C_manager->Cita($id_cita);

		return render("Cita/Cita", [
			"Datos_Cita" => $datosCita,
		]);
	}

	public function CitasPacientes() {
		session()->start();

		$id_user = session()->get("ID_User");
		$C_manager = new Cita_Manager();
		$citas = $C_manager->CitasPacientes($id_user);

		return render("Cita/CitasPacientes", [
			"Citas" => $citas,
		]);
	}

	public function InformeCitas() {
		session_start();

		$C_manager = new Cita_Manager();
		$citas = $C_manager->Citas();

		return render("Cita/InformeCitas", [
			"Citas" => $citas,
		]);
	}

	public function Finalizar() {
		$id_cita = app()->request->get('id');

		$C_manager = new Cita_Manager();
		$C_manager->finalizarCita($id_cita);

		return redirect("/citas/{$id_cita}");
	}

	public function CitasPorDia() {
		$fecha = app()->request->get("fecha");

		$C_Manager = new Cita_Manager();
		$horario = $C_Manager->obtenerCitasDia($fecha);
		response()->json($horario);
	}
	
	public function agendarNueva()
	{
		$id_paciente = app()->request->get("id_paciente");
		$id_servicio = app()->request->get("servicio");
		$id_cita = app()->request->get("id_cita");
		$fecha = app()->request->get("fecha");
		$hora = app()->request->get("horario");
		$id_medico = app()->request->get("id_medico");

		$C_manager = new Cita_Manager();
		$reservada = $C_manager->agendarNuevaCita($id_paciente,$id_servicio,$id_cita,$fecha,$hora,$id_medico);
		if (!$reservada) {
			return redirect('/citas/reservar?error=' . 0);
		}
		return redirect("/citas/cPacientes");
	}
}

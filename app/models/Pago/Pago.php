<?php

namespace App\Models\Pago;
use App\Models\Model;

class Pago extends Model
{
    protected int $ID_Pago;
	protected int $ID_Cita;
	protected int $ID_Paciente;
    protected string $Fecha_Emitida;
    protected string $Hora_Emitida;
    protected string $Fecha_Limite;
	protected $Fecha_Pagada;
	protected string $monto;
	protected string $Cargos;
    protected string $Estado;

	public function getID_Pago() : int {
		return $this->ID_Pago;
	}

	public function setID_Pago(int $value) {
		$this->ID_Pago = $value;
	}

	public function getID_Cita() : int {
		return $this->ID_Cita;
	}

	public function setID_Cita(int $value) {
		$this->ID_Cita = $value;
	}

	public function getID_Paciente() : int {
		return $this->ID_Paciente;
	}

	public function setID_Paciente(int $value) {
		$this->ID_Paciente = $value;
	}

	public function getFecha_Emitida() : string {
		return $this->Fecha_Emitida;
	}

	public function setFecha_Emitida(string $value) {
		$this->Fecha_Emitida = $value;
	}

	public function getHora_Emitida() : string {
		return $this->Hora_Emitida;
	}

	public function setHora_Emitida(string $value) {
		$this->Hora_Emitida = $value;
	}

	public function getFecha_Limite() : string {
		return $this->Fecha_Limite;
	}

	public function setFecha_Limite(string $value) {
		$this->Fecha_Limite = $value;
	}

	public function getFecha_Pagada() {
		return $this->Fecha_Pagada;
	}

	public function setFecha_Pagada($value) {
		$this->Fecha_Pagada = $value;
	}

	public function getMonto() : string {
		return $this->monto;
	}

	public function setMonto(string $value) {
		$this->monto = $value;
	}

	public function getCargos() : string {
		return $this->Cargos;
	}

	public function setCargos(string $value) {
		$this->Cargos = $value;
	}

	public function getEstado() : string {
		return $this->Estado;
	}

	public function setEstado(string $value) {
		$this->Estado = $value;
	}
}
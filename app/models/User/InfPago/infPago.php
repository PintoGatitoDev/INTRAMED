<?php

namespace App\Models\User\InfPago;

use App\Models\Model;

class InfPago extends Model 
{
    protected int $ID_InfoPago;
    protected int $ID_Paciente;
    protected string $Numero_Cuenta;
    protected string $Forma_Cuenta;
    protected string $Nombre_Titular;
    protected string $Vencimiento_Cuenta;
    protected float $Saldo;

	public function __constructor(int $ID_InfoPago, int $ID_Paciente, string $Numero_Cuenta, string $Forma_Cuenta, string $Nombre_Titular, string $Vencimiento_Cuenta, float $Saldo) {

		$this->ID_InfoPago = $ID_InfoPago;
		$this->ID_Paciente = $ID_Paciente;
		$this->Numero_Cuenta = $Numero_Cuenta;
		$this->Forma_Cuenta = $Forma_Cuenta;
		$this->Nombre_Titular = $Nombre_Titular;
		$this->Vencimiento_Cuenta = $Vencimiento_Cuenta;
		$this->Saldo = $Saldo;
	}

	public function getID_InfoPago() : int {
		return $this->ID_InfoPago;
	}

	public function setID_InfoPago(int $value) {
		$this->ID_InfoPago = $value;
	}

	public function getID_Paciente() : int {
		return $this->ID_Paciente;
	}

	public function setID_Paciente(int $value) {
		$this->ID_Paciente = $value;
	}

	public function getNumero_Cuenta() : string {
		return $this->Numero_Cuenta;
	}

	public function setNumero_Cuenta(string $value) {
		$this->Numero_Cuenta = $value;
	}

	public function getForma_Cuenta() : string {
		return $this->Forma_Cuenta;
	}

	public function setForma_Cuenta(string $value) {
		$this->Forma_Cuenta = $value;
	}

	public function getNombre_Titular() : string {
		return $this->Nombre_Titular;
	}

	public function setNombre_Titular(string $value) {
		$this->Nombre_Titular = $value;
	}

	public function getVencimiento_Cuenta() : string {
		return $this->Vencimiento_Cuenta;
	}

	public function setVencimiento_Cuenta(string $value) {
		$this->Vencimiento_Cuenta = $value;
	}

	public function getSaldo() : float {
		return $this->Saldo;
	}

	public function setSaldo(float $value) {
		$this->Saldo = $value;
	}
}
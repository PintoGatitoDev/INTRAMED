<?php

namespace App\Models\User;

use App\Models\User\User;

class Patient extends User
{
    protected int $id_patient;
    protected string $Estado_Civil;
    protected string $NSS;
	protected int $numero_Emergencia;
	protected $DatosM;
	protected $InfPago;

	public function getId_patient() : int {
		return $this->id_patient;
	}

	public function setId_patient(int $value) {
		$this->id_patient = $value;
	}

	public function getEstado_Civil() : string {
		return $this->Estado_Civil;
	}

	public function setEstado_Civil(string $value) {
		$this->Estado_Civil = $value;
	}

	public function getNSS() : string {
		return $this->NSS;
	}

	public function setNSS(string $value) {
		$this->NSS = $value;
	}

	public function getNumero_Emergencia() : int {
		return $this->numero_Emergencia;
	}

	public function setNumero_Emergencia(int $value) {
		$this->numero_Emergencia = $value;
	}

	public function getDatosM() {
		return $this->DatosM;
	}

	public function setDatosM($value) {
		$this->DatosM = $value;
	}

	public function getInfPago() {
		return $this->InfPago;
	}

	public function setInfPago($value) {
		$this->InfPago = $value;
	}
}
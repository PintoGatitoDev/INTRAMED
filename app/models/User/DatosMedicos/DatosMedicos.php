<?php

namespace App\Models\User\DatosMedicos;

use App\Models\Model;
use App\Models\User\DatosMedicos\Enfermedad;

class DatosMedicos extends Model 
{
    protected int $ID_Dato;
    protected int $ID_Paciente;
    protected float $Peso;
    protected float $Altura;
    protected string $Grupo_Sanguineo;
	protected float $Presion_Arterial;
    protected float $Nivel_Glucosa;
    protected string $Incapacidades;
    protected string $Nota;
    protected string $Fecha_Historial;
    protected  $Enfermedades ;

	public function __constructor(int $ID_Dato, int $ID_Paciente, float $Peso, float $Altura, string $Grupo_Sanguineo, float $Presion_Arterial, float $Nivel_Glucosa, string $Incapacidades, string $Nota, string $Fecha_Historial, $Enfermedades ) {

		$this->ID_Dato = $ID_Dato;
		$this->ID_Paciente = $ID_Paciente;
		$this->Peso = $Peso;
		$this->Altura = $Altura;
		$this->Grupo_Sanguineo = $Grupo_Sanguineo;
		$this->Presion_Arterial = $Presion_Arterial;
		$this->Nivel_Glucosa = $Nivel_Glucosa;
		$this->Incapacidades = $Incapacidades;
		$this->Nota = $Nota;
		$this->Fecha_Historial = $Fecha_Historial;
		$this->Enfermedades  = $Enfermedades ;
	}

	public function getID_Dato() : int {
		return $this->ID_Dato;
	}

	public function setID_Dato(int $value) {
		$this->ID_Dato = $value;
	}

	public function getID_Paciente() : int {
		return $this->ID_Paciente;
	}

	public function setID_Paciente(int $value) {
		$this->ID_Paciente = $value;
	}

	public function getPeso() : float {
		return $this->Peso;
	}

	public function setPeso(float $value) {
		$this->Peso = $value;
	}

	public function getAltura() : float {
		return $this->Altura;
	}

	public function setAltura(float $value) {
		$this->Altura = $value;
	}

	public function getGrupo_Sanguineo() : string {
		return $this->Grupo_Sanguineo;
	}

	public function setGrupo_Sanguineo(string $value) {
		$this->Grupo_Sanguineo = $value;
	}

	public function getPresion_Arterial() : float {
		return $this->Presion_Arterial;
	}

	public function setPresion_Arterial(float $value) {
		$this->Presion_Arterial = $value;
	}

	public function getNivel_Glucosa() : float {
		return $this->Nivel_Glucosa;
	}

	public function setNivel_Glucosa(float $value) {
		$this->Nivel_Glucosa = $value;
	}

	public function getIncapacidades() : string {
		return $this->Incapacidades;
	}

	public function setIncapacidades(string $value) {
		$this->Incapacidades = $value;
	}

	public function getNota() : string {
		return $this->Nota;
	}

	public function setNota(string $value) {
		$this->Nota = $value;
	}

	public function getFecha_Historial() : string {
		return $this->Fecha_Historial;
	}

	public function setFecha_Historial(string $value) {
		$this->Fecha_Historial = $value;
	}

	public function getEnfermedades () {
		return $this->Enfermedades ;
	}

	public function setEnfermedades ($value) {
		$this->Enfermedades  = $value;
	}
}
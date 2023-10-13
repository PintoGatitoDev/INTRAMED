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

	

	

	/**
	 * @return int
	 */
	public function getID_Dato(): int {
		return $this->ID_Dato;
	}
	
	/**
	 * @param int $ID_Dato 
	 * @return self
	 */
	public function setID_Dato(int $ID_Dato): self {
		$this->ID_Dato = $ID_Dato;
		return $this;
	}
	
	/**
	 * @return int
	 */
	public function getID_Paciente(): int {
		return $this->ID_Paciente;
	}
	
	/**
	 * @param int $ID_Paciente 
	 * @return self
	 */
	public function setID_Paciente(int $ID_Paciente): self {
		$this->ID_Paciente = $ID_Paciente;
		return $this;
	}
	
	/**
	 * @return float
	 */
	public function getPeso(): float {
		return $this->Peso;
	}
	
	/**
	 * @param float $Peso 
	 * @return self
	 */
	public function setPeso(float $Peso): self {
		$this->Peso = $Peso;
		return $this;
	}
	
	/**
	 * @return float
	 */
	public function getAltura(): float {
		return $this->Altura;
	}
	
	/**
	 * @param float $Altura 
	 * @return self
	 */
	public function setAltura(float $Altura): self {
		$this->Altura = $Altura;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getGrupo_Sanguineo(): string {
		return $this->Grupo_Sanguineo;
	}
	
	/**
	 * @param string $Grupo_Sanguineo 
	 * @return self
	 */
	public function setGrupo_Sanguineo(string $Grupo_Sanguineo): self {
		$this->Grupo_Sanguineo = $Grupo_Sanguineo;
		return $this;
	}
	
	/**
	 * @return float
	 */
	public function getPresion_Arterial(): float {
		return $this->Presion_Arterial;
	}
	
	/**
	 * @param float $Presion_Arterial 
	 * @return self
	 */
	public function setPresion_Arterial(float $Presion_Arterial): self {
		$this->Presion_Arterial = $Presion_Arterial;
		return $this;
	}
	
	/**
	 * @return float
	 */
	public function getNivel_Glucosa(): float {
		return $this->Nivel_Glucosa;
	}
	
	/**
	 * @param float $Nivel_Glucosa 
	 * @return self
	 */
	public function setNivel_Glucosa(float $Nivel_Glucosa): self {
		$this->Nivel_Glucosa = $Nivel_Glucosa;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getIncapacidades(): string {
		return $this->Incapacidades;
	}
	
	/**
	 * @param string $Incapacidades 
	 * @return self
	 */
	public function setIncapacidades(string $Incapacidades): self {
		$this->Incapacidades = $Incapacidades;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getNota(): string {
		return $this->Nota;
	}
	
	/**
	 * @param string $Nota 
	 * @return self
	 */
	public function setNota(string $Nota): self {
		$this->Nota = $Nota;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getFecha_Historial(): string {
		return $this->Fecha_Historial;
	}
	
	/**
	 * @param string $Fecha_Historial 
	 * @return self
	 */
	public function setFecha_Historial(string $Fecha_Historial): self {
		$this->Fecha_Historial = $Fecha_Historial;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getEnfermedades() {
		return $this->Enfermedades;
	}
	
	/**
	 * @param mixed $Enfermedades 
	 * @return self
	 */
	public function setEnfermedades($Enfermedades): self {
		$this->Enfermedades = $Enfermedades;
		return $this;
	}
}

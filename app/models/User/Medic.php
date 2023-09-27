<?php

namespace App\Models\User;

use App\Models\User\Employee;

class Medic extends Employee
{
    protected int $id_Medic;
    protected string $nivel_Estudio;
    protected string $experiencia_Medic;
	protected string $area_Trabajo;

	

	/**
	 * @return int
	 */
	public function getId_Medic(): int {
		return $this->id_Medic;
	}
	
	/**
	 * @param int $id_Medic 
	 * @return self
	 */
	public function setId_Medic(int $id_Medic): self {
		$this->id_Medic = $id_Medic;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getNivel_Estudio(): string {
		return $this->nivel_Estudio;
	}
	
	/**
	 * @param string $nivel_Estudio 
	 * @return self
	 */
	public function setNivel_Estudio(string $nivel_Estudio): self {
		$this->nivel_Estudio = $nivel_Estudio;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getExperiencia_Medic(): string {
		return $this->experiencia_Medic;
	}
	
	/**
	 * @param string $experiencia_Medic 
	 * @return self
	 */
	public function setExperiencia_Medic(string $experiencia_Medic): self {
		$this->experiencia_Medic = $experiencia_Medic;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getArea_Trabajo(): string {
		return $this->area_Trabajo;
	}
	
	/**
	 * @param string $area_Trabajo 
	 * @return self
	 */
	public function setArea_Trabajo(string $area_Trabajo): self {
		$this->area_Trabajo = $area_Trabajo;
		return $this;
	}
}
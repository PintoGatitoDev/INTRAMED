<?php

namespace App\Models\User;

use App\Models\User\Employee;

class Medic extends Employee
{
    protected int $id_Medic;
    protected string $nivel_Estudio;
    protected string $experiencia_Medic;
	protected string $area_Trabajo;

	public function getId_Medic() : int {
		return $this->id_Medic;
	}

	public function setId_Medic(int $value) {
		$this->id_Medic = $value;
	}

	public function getNivel_Estudio() : string {
		return $this->nivel_Estudio;
	}

	public function setNivel_Estudio(string $value) {
		$this->nivel_Estudio = $value;
	}

	public function getExperiencia_Medic() : string {
		return $this->experiencia_Medic;
	}

	public function setExperiencia_Medic(string $value) {
		$this->experiencia_Medic = $value;
	}

	public function getArea_Trabajo() : string {
		return $this->area_Trabajo;
	}

	public function setArea_Trabajo(string $value) {
		$this->area_Trabajo = $value;
	}
}
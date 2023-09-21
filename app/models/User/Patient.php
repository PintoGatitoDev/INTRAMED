<?php

namespace App\Models\User;

use App\Models\User\User;

class Patient extends User
{
    protected int $id_patient;
    protected string $Estado_Civil;
    protected string $Genero;

	
	
	/**
	 * @return string
	 */
	public function getEstado_Civil(): string {
		return $this->Estado_Civil;
	}
	
	/**
	 * @param string $Estado_Civil 
	 * @return self
	 */
	public function setEstado_Civil(string $Estado_Civil): self {
		$this->Estado_Civil = $Estado_Civil;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getGenero(): string {
		return $this->Genero;
	}
	
	/**
	 * @param string $Genero 
	 * @return self
	 */
	public function setGenero(string $Genero): self {
		$this->Genero = $Genero;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getId_patient(): int {
		return $this->id_patient;
	}
	
	/**
	 * @param int $id_patient 
	 * @return self
	 */
	public function setId_patient(int $id_patient): self {
		$this->id_patient = $id_patient;
		return $this;
	}
}
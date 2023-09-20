<?php

namespace App\Models\User;

use App\Models\User\User;

class Patient extends User
{
    protected int $ID_Usuario;
    protected string $Estado_Civil;
    protected string $Genero;

	/**
	 * @return int
	 */
	public function getID_Usuario(): int {
		return $this->ID_Usuario;
	}
	
	/**
	 * @param int $ID_Usuario 
	 * @return self
	 */
	public function setID_Usuario(int $ID_Usuario): self {
		$this->ID_Usuario = $ID_Usuario;
		return $this;
	}
	
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
}
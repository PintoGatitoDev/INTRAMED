<?php

namespace App\Models\User;

use App\Models\User\User;

class Patient extends User
{
    protected int $id_patient;
    protected string $Estado_Civil;
    protected string $NSS;
	protected int $numero_Emergencia;


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
	public function getNSS(): string {
		return $this->NSS;
	}
	
	/**
	 * @param string $NSS 
	 * @return self
	 */
	public function setNSS(string $NSS): self {
		$this->NSS = $NSS;
		return $this;
	}
	
	/**
	 * @return int
	 */
	public function getNumero_Emergencia(): int {
		return $this->numero_Emergencia;
	}
	
	/**
	 * @param int $numero_Emergencia 
	 * @return self
	 */
	public function setNumero_Emergencia(int $numero_Emergencia): self {
		$this->numero_Emergencia = $numero_Emergencia;
		return $this;
	}
}
<?php

namespace App\Models\Servicio;
use App\Models\Model;

/**
 * Base Model
 * ---
 * The base model provides a space to set atrributes
 * that are common to all models
 */
class Servicio extends Model
{
    protected int $ID_Servicio;
    protected string $Nombre;
    protected string $Descripcion;
    protected string $Costo;

	/**
	 * @return int
	 */
	public function getID_Servicio(): int {
		return $this->ID_Servicio;
	}
	
	/**
	 * @param int $ID_Servicio 
	 * @return self
	 */
	public function setID_Servicio(int $ID_Servicio): self {
		$this->ID_Servicio = $ID_Servicio;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getNombre(): string {
		return $this->Nombre;
	}
	
	/**
	 * @param string $Nombre 
	 * @return self
	 */
	public function setNombre(string $Nombre): self {
		$this->Nombre = $Nombre;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getDescripcion(): string {
		return $this->Descripcion;
	}
	
	/**
	 * @param string $Descripcion 
	 * @return self
	 */
	public function setDescripcion(string $Descripcion): self {
		$this->Descripcion = $Descripcion;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getCosto(): string {
		return $this->Costo;
	}
	
	/**
	 * @param string $Costo 
	 * @return self
	 */
	public function setCosto(string $Costo): self {
		$this->Costo = $Costo;
		return $this;
	}
}

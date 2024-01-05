<?php

namespace App\Models\Citas;
use App\Models\Model;

/**
 * Base Model
 * ---
 * The base model provides a space to set atrributes
 * that are common to all models
 */
class Citas_Manager extends Model
{
    protected int $id_Horario;
    protected int $id_medico;
    protected string $fecha;
    protected string $hora_inicio;
    protected string $hora_fin;
    

	/**
	 * @return int
	 */
	public function getId_Horario(): int {
		return $this->id_Horario;
	}
	
	/**
	 * @param int $id_Horario 
	 * @return self
	 */
	public function setId_Horario(int $id_Horario): self {
		$this->id_Horario = $id_Horario;
		return $this;
	}
	
	/**
	 * @return int
	 */
	public function getId_medico(): int {
		return $this->id_medico;
	}
	
	/**
	 * @param int $id_medico 
	 * @return self
	 */
	public function setId_medico(int $id_medico): self {
		$this->id_medico = $id_medico;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getFecha(): string {
		return $this->fecha;
	}
	
	/**
	 * @param string $fecha 
	 * @return self
	 */
	public function setFecha(string $fecha): self {
		$this->fecha = $fecha;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getHora_inicio(): string {
		return $this->hora_inicio;
	}
	
	/**
	 * @param string $hora_inicio 
	 * @return self
	 */
	public function setHora_inicio(string $hora_inicio): self {
		$this->hora_inicio = $hora_inicio;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getHora_fin(): string {
		return $this->hora_fin;
	}
	
	/**
	 * @param string $hora_fin 
	 * @return self
	 */
	public function setHora_fin(string $hora_fin): self {
		$this->hora_fin = $hora_fin;
		return $this;
	}
}

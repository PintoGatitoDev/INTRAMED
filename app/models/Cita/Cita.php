<?php

namespace App\Models\Cita;
use App\Models\Model;

/**
 * Base Model
 * ---
 * The base model provides a space to set atrributes
 * that are common to all models
 */
class Cita extends Model {
	protected int $id_Servicio;
	protected int $id_Cita;
	protected int $id_Paciente;
	protected int $id_Medico;
	protected string $fecha;
	protected string $hora;
	protected string $motivo;
	protected string $estado;

	/**
	 * @return int
	 */
	public function getId_Servicio(): int {
		return $this->id_Servicio;
	}

	/**
	 * @param int $id_Servicio
	 * @return self
	 */
	public function setId_Servicio(int $id_Servicio): self {
		$this->id_Servicio = $id_Servicio;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getId_Cita(): int {
		return $this->id_Cita;
	}

	/**
	 * @param int $id_Cita
	 * @return self
	 */
	public function setId_Cita(int $id_Cita): self {
		$this->id_Cita = $id_Cita;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getId_Paciente(): int {
		return $this->id_Paciente;
	}

	/**
	 * @param int $id_Paciente
	 * @return self
	 */
	public function setId_Paciente(int $id_Paciente): self {
		$this->id_Paciente = $id_Paciente;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getId_Medico(): int {
		return $this->id_Medico;
	}

	/**
	 * @param int $id_Medico
	 * @return self
	 */
	public function setId_Medico(int $id_Medico): self {
		$this->id_Medico = $id_Medico;
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
	public function getHora(): string {
		return $this->hora;
	}

	/**
	 * @param string $hora
	 * @return self
	 */
	public function setHora(string $hora): self {
		$this->hora = $hora;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMotivo(): string {
		return $this->motivo;
	}

	/**
	 * @param string $motivo
	 * @return self
	 */
	public function setMotivo(string $motivo): self {
		$this->motivo = $motivo;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getEstado(): string {
		return $this->estado;
	}

	/**
	 * @param string $estado
	 * @return self
	 */
	public function setEstado(string $estado): self {
		$this->estado = $estado;
		return $this;
	}
}

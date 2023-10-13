<?php

namespace App\Models\User\Pago;

use App\Models\Model;

class InfPago extends Model 
{
    protected int $ID_InfoPago;
    protected int $ID_Paciente;
    protected string $Numero_Cuenta;
    protected string $Forma_Cuenta;
    protected string $Nombre_Titular;
    protected string $Vencimiento_Cuenta;
    protected float $Saldo;

	

	/**
	 * @return int
	 */
	public function getID_InfoPago(): int {
		return $this->ID_InfoPago;
	}
	
	/**
	 * @param int $ID_InfoPago 
	 * @return self
	 */
	public function setID_InfoPago(int $ID_InfoPago): self {
		$this->ID_InfoPago = $ID_InfoPago;
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
	 * @return string
	 */
	public function getNumero_Cuenta(): string {
		return $this->Numero_Cuenta;
	}
	
	/**
	 * @param string $Numero_Cuenta 
	 * @return self
	 */
	public function setNumero_Cuenta(string $Numero_Cuenta): self {
		$this->Numero_Cuenta = $Numero_Cuenta;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getForma_Cuenta(): string {
		return $this->Forma_Cuenta;
	}
	
	/**
	 * @param string $Forma_Cuenta 
	 * @return self
	 */
	public function setForma_Cuenta(string $Forma_Cuenta): self {
		$this->Forma_Cuenta = $Forma_Cuenta;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getNombre_Titular(): string {
		return $this->Nombre_Titular;
	}
	
	/**
	 * @param string $Nombre_Titular 
	 * @return self
	 */
	public function setNombre_Titular(string $Nombre_Titular): self {
		$this->Nombre_Titular = $Nombre_Titular;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getVencimiento_Cuenta(): string {
		return $this->Vencimiento_Cuenta;
	}
	
	/**
	 * @param string $Vencimiento_Cuenta 
	 * @return self
	 */
	public function setVencimiento_Cuenta(string $Vencimiento_Cuenta): self {
		$this->Vencimiento_Cuenta = $Vencimiento_Cuenta;
		return $this;
	}
	
	/**
	 * @return float
	 */
	public function getSaldo(): float {
		return $this->Saldo;
	}
	
	/**
	 * @param float $Saldo 
	 * @return self
	 */
	public function setSaldo(float $Saldo): self {
		$this->Saldo = $Saldo;
		return $this;
	}
}

<?php

namespace App\Models\User;

use App\Models\Model;

class User extends Model
{
    protected int $id_user;
    protected string $email;
    protected string $password;
    protected string $nombre;
    protected string $apellido_p;
    protected string $apellido_m;
    protected string $rol;
    protected string $fecha_alta;
    protected string $hora_alta;
    protected string $foto;
    protected string $direccion;
    protected string $telefono;
	protected string $fecha_Nacimiento;
	protected string $genero;

	/**
	 * @return int
	 */
	public function getId_user(): int {
		return $this->id_user;
	}
	
	/**
	 * @param int $id_user 
	 * @return self
	 */
	public function setId_user(int $id_user): self {
		$this->id_user = $id_user;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getEmail(): string {
		return $this->email;
	}
	
	/**
	 * @param string $email 
	 * @return self
	 */
	public function setEmail(string $email): self {
		$this->email = $email;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getPassword(): string {
		return $this->password;
	}
	
	/**
	 * @param string $password 
	 * @return self
	 */
	public function setPassword(string $password): self {
		$this->password = $password;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getNombre(): string {
		return $this->nombre;
	}
	
	/**
	 * @param string $nombre 
	 * @return self
	 */
	public function setNombre(string $nombre): self {
		$this->nombre = $nombre;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getApellido_p(): string {
		return $this->apellido_p;
	}
	
	/**
	 * @param string $apellido_p 
	 * @return self
	 */
	public function setApellido_p(string $apellido_p): self {
		$this->apellido_p = $apellido_p;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getApellido_m(): string {
		return $this->apellido_m;
	}
	
	/**
	 * @param string $apellido_m 
	 * @return self
	 */
	public function setApellido_m(string $apellido_m): self {
		$this->apellido_m = $apellido_m;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getRol(): string {
		return $this->rol;
	}
	
	/**
	 * @param string $rol 
	 * @return self
	 */
	public function setRol(string $rol): self {
		$this->rol = $rol;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getFecha_alta(): string {
		return $this->fecha_alta;
	}
	
	/**
	 * @param string $fecha_alta 
	 * @return self
	 */
	public function setFecha_alta(string $fecha_alta): self {
		$this->fecha_alta = $fecha_alta;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getHora_alta(): string {
		return $this->hora_alta;
	}
	
	/**
	 * @param string $hora_alta 
	 * @return self
	 */
	public function setHora_alta(string $hora_alta): self {
		$this->hora_alta = $hora_alta;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getFoto(): string {
		return $this->foto;
	}
	
	/**
	 * @param string $foto 
	 * @return self
	 */
	public function setFoto(string $foto): self {
		$this->foto = $foto;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getDireccion(): string {
		return $this->direccion;
	}
	
	/**
	 * @param string $direccion 
	 * @return self
	 */
	public function setDireccion(string $direccion): self {
		$this->direccion = $direccion;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getTelefono(): string {
		return $this->telefono;
	}
	
	/**
	 * @param string $telefono 
	 * @return self
	 */
	public function setTelefono(string $telefono): self {
		$this->telefono = $telefono;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getFecha_Nacimiento(): string {
		return $this->fecha_Nacimiento;
	}
	
	/**
	 * @param string $fecha_Nacimiento 
	 * @return self
	 */
	public function setFecha_Nacimiento(string $fecha_Nacimiento): self {
		$this->fecha_Nacimiento = $fecha_Nacimiento;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getGenero(): string {
		return $this->genero;
	}
	
	/**
	 * @param string $genero 
	 * @return self
	 */
	public function setGenero(string $genero): self {
		$this->genero = $genero;
		return $this;
	}
}
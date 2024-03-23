<?php

namespace App\Models\User;

use App\Models\Model;
use Leaf\Helpers\Password;

class User extends Model {
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

	public function getId_user() : int {
		return $this->id_user;
	}

	public function setId_user(int $value) {
		$this->id_user = $value;
	}

	public function getEmail() : string {
		return $this->email;
	}

	public function setEmail(string $value) {
		$this->email = $value;
	}

	public function getPassword() : string {
		return $this->password;
	}

	public function setPassword(string $value) {
		$this->password = Password::hash($value, Password::BCRYPT);
	}

	public function getNombre() : string {
		return $this->nombre;
	}

	public function setNombre(string $value) {
		$this->nombre = $value;
	}

	public function getApellido_p() : string {
		return $this->apellido_p;
	}

	public function setApellido_p(string $value) {
		$this->apellido_p = $value;
	}

	public function getApellido_m() : string {
		return $this->apellido_m;
	}

	public function setApellido_m(string $value) {
		$this->apellido_m = $value;
	}

	public function getRol() : string {
		return $this->rol;
	}

	public function setRol(string $value) {
		$this->rol = $value;
	}

	public function getFecha_alta() : string {
		return $this->fecha_alta;
	}

	public function setFecha_alta(string $value) {
		$this->fecha_alta = $value;
	}

	public function getHora_alta() : string {
		return $this->hora_alta;
	}

	public function setHora_alta(string $value) {
		$this->hora_alta = $value;
	}

	public function getFoto() : string {
		return $this->foto;
	}

	public function setFoto(string $value) {
		$this->foto = $value;
	}

	public function getDireccion() : string {
		return $this->direccion;
	}

	public function setDireccion(string $value) {
		$this->direccion = $value;
	}

	public function getTelefono() : string {
		return $this->telefono;
	}

	public function setTelefono(string $value) {
		$this->telefono = $value;
	}

	public function getFecha_Nacimiento() : string {
		return $this->fecha_Nacimiento;
	}

	public function setFecha_Nacimiento(string $value) {
		$this->fecha_Nacimiento = $value;
	}

	public function getGenero() : string {
		return $this->genero;
	}

	public function setGenero(string $value) {
		$this->genero = $value;
	}
}
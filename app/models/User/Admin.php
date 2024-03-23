<?php

namespace App\Models\User;

use Leaf\Helpers\Password;
use App\Models\User\Employee;

class Admin extends Employee
{
    protected int $id_Admin;
    protected string $PassSecurity;
    public function generatePassSecurity() : string
    {
        $longitud = 8;
        $caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789#$&=";

        $PassSecurity = "";
        for ($i = 0; $i < $longitud; $i++) {
            $PassSecurity .= $caracteres[rand(0, strlen($caracteres) - 1)];
        }

		$this->PassSecurity = Password::hash($PassSecurity, Password::BCRYPT);

		return $PassSecurity;
    }

	public function getId_Admin() : int {
		return $this->id_Admin;
	}

	public function setId_Admin(int $value) {
		$this->id_Admin = $value;
	}

	public function getPassSecurity() : string {
		return $this->PassSecurity;
	}
}
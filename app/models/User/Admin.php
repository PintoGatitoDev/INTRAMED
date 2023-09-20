<?php

namespace App\Models\User;

use App\Models\User\Employee;

class Admin extends Employee
{
    protected int $id_Admin;
    protected string $subrol;
    protected string $PassSecurity;

    /**
     * @return int
     */
    public function getId_Admin(): int
    {
        return $this->id_Admin;
    }

    /**
     * @param int $id_Admin 
     * @return self
     */
    public function setId_Admin(int $id_Admin): self
    {
        $this->id_Admin = $id_Admin;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubrol(): string
    {
        return $this->subrol;
    }

    /**
     * @param string $subrol 
     * @return self
     */
    public function setSubrol(string $subrol): self
    {
        $this->subrol = $subrol;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassSecurity(): string
    {
        return $this->PassSecurity;
    }

    /**
     * @param string $PassSecurity 
     * @return self
     */
    public function setPassSecurity(string $PassSecurity): self
    {
        $this->PassSecurity = $PassSecurity;
        return $this;
    }

    public function generatePassSecurity()
    {
        $longitud = 8;
        $caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-+=";

        $this->PassSecurity = "";
        for ($i = 0; $i < $longitud; $i++) {
            $this->PassSecurity .= $caracteres[rand(0, strlen($caracteres) - 1)];
        }
    }
}
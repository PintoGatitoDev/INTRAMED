<?php

namespace App\Services;
use App\Models\User\Admin;
use App\Models\User\Medic;
use App\Models\User\Patient;

class proxy_bd
{
    private $bd;

    public function __construct()
    {
        $this->bd = mysqli_connect("localhost", "root", "", "INTRAMED");
    }

    private function registerUsuario(string $email, string $password,
    string $nombre,string $apellido_p,string $apellido_m,$rol,
    string $fecha_alta,string $hora_alta,string $foto,string $direccion,
    string $telefono) : bool
    {
        $insert = "INSERT INTO User (Email,Password,Nombre,Apellido_P,Apellido_M,Rol,
        Fecha_Alta,Hora_Alta,Foto,Direccion,Telefono)
        VALUES('$email','$password','$nombre','$apellido_p',
        '$apellido_m','$rol','$fecha_alta','$hora_alta','$foto','$direccion',$telefono);";

        return $this->bd->query($insert);
    }

    public function registerAdmin(Admin $Admin) : bool
    {
        $result = $this->registerUsuario($Admin->getEmail(),$Admin->getPassword(),
        $Admin->getNombre(),$Admin->getApellido_p(),$Admin->getApellido_m(),$Admin->getRol(),
        $Admin->getFecha_alta(),$Admin->getHora_alta(),$Admin->getFoto(),$Admin->getDireccion(),
        $Admin->getTelefono());

        if($result)
        {
            $user = $this->queryOneUser($Admin->getEmail());
            
            $insert = "INSERT INTO Administrador (ID_Usuario,Subrol,PassSeguridad)
            VALUES (" . $user['ID_USUARIO'] . ",'" . $Admin->getSubrol() . "','" . $Admin->getPassSecurity() . "')";
            $iadmin =  $this->bd->query($insert);
            if(!$iadmin)
            {
                $this->deleteUser($user['ID_Usuario']);
            }
        }
        return false;
    }

    public function registerMedic(Medic $medic) : bool
    {
        $result = $this->registerUsuario($medic->getEmail(),$medic->getPassword(),
        $medic->getNombre(),$medic->getApellido_p(),$medic->getApellido_m(),$medic->getRol(),
        $medic->getFecha_alta(),$medic->getHora_alta(),$medic->getFoto(),$medic->getDireccion(),
        $medic->getTelefono());

        if($result)
        {
            $user = $this->queryOneUser($medic->getEmail());
            $insert = "INSERT INTO Medico (ID_Usuario,Subrol,Nivel_Estudio,Experiencia_Medica)
            VALUES (" . $user['ID_Usuario'] . ",'" . $medic->getSubrol() . "','" . $medic->getNivel_Estudio() . "','" . $medic->getExperiencia_Medic() . "')";
            $imedic =  $this->bd->query($insert);
            if(!$imedic)
            {
                $this->deleteUser($user['ID_Usuario']);
            }
        }
        return false;
    }

    public function registerPatient(Patient $patient) : bool
    {
        $result = $this->registerUsuario($patient->getEmail(),$patient->getPassword(),
        $patient->getNombre(),$patient->getApellido_p(),$patient->getApellido_m(),$patient->getRol(),
        $patient->getFecha_alta(),$patient->getHora_alta(),$patient->getFoto(),$patient->getDireccion(),
        $patient->getTelefono());

        if($result)
        {
            $user = $this->queryOneUser($patient->getEmail());
            $insert = "INSERT INTO Paciente (ID_Usuario,Estado_Civil,Genero)
            VALUES (" . $user['ID_Usuario'] . ",'" . $patient->getEstado_Civil() . "','" . $patient->getGenero() . "')";
            $ipatient =  $this->bd->query($insert);
            if(!$ipatient)
            {
                $this->deleteUser($user['ID_Usuario']);
            }
            return true;
        }
        return false;
    }

    public function queryUsers()
    {

    }

    public function queryOneUser(string $email)
    {
        $query = "SELECT * FROM user WHERE Email='" . $email . "'";
        $result = $this->bd->query($query);
        $user = mysqli_fetch_assoc($result);
        return $user;
    }

    public function deleteUser(int $id_user) : bool
    {
        $delete = "DELETE FROM user WHERE ID_Usuario = $id_user";
        return $this->bd->query($delete);
    }
    
}
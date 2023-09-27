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

    private function registerUsuario(
        string $email,
        string $password,
        string $nombre,
        string $apellido_p,
        string $apellido_m,
        string $rol,
        string $fecha_alta,
        string $hora_alta,
        string $foto,
        string $direccion,
        string $telefono,
        string $fecha_nacimiento,
        string $genero
    ): bool {
        $insert = "INSERT INTO User (Email,Password,Nombre,Apellido_P,Apellido_M,Rol,
        Fecha_Alta,Hora_Alta,Foto,Direccion,Telefono,Fecha_Nac,Genero)
        VALUES('$email','$password','$nombre','$apellido_p',
        '$apellido_m','$rol','$fecha_alta','$hora_alta','$foto','$direccion',$telefono,'$fecha_nacimiento','$genero');";

        return $this->bd->query($insert);
    }

    public function registerAdmin(Admin $Admin): bool
    {
        $result = $this->registerUsuario(
            $Admin->getEmail(),
            $Admin->getPassword(),
            $Admin->getNombre(),
            $Admin->getApellido_p(),
            $Admin->getApellido_m(),
            $Admin->getRol(),
            $Admin->getFecha_alta(),
            $Admin->getHora_alta(),
            $Admin->getFoto(),
            $Admin->getDireccion(),
            $Admin->getTelefono(),
            $Admin->getFecha_Nacimiento(),
            $Admin->getGenero()
        );

        if ($result) {
            $user = $this->queryOneUser($Admin->getEmail());

            $insert = "INSERT INTO Administrador (ID_Usuario,Subrol,PassSeguridad)
            VALUES (" . $user['ID_Usuario'] . ",'" . $Admin->getSubrol() . "','" . $Admin->getPassSecurity() . "')";
            $iadmin = $this->bd->query($insert);
            if (!$iadmin) {
                $this->deleteUser($user['ID_Usuario']);
            }
            return true;
        }
        return false;
    }

    public function registerMedic(Medic $medic): bool
    {
        $result = $this->registerUsuario(
            $medic->getEmail(),
            $medic->getPassword(),
            $medic->getNombre(),
            $medic->getApellido_p(),
            $medic->getApellido_m(),
            $medic->getRol(),
            $medic->getFecha_alta(),
            $medic->getHora_alta(),
            $medic->getFoto(),
            $medic->getDireccion(),
            $medic->getTelefono(),
            $medic->getFecha_Nacimiento(),
            $medic->getGenero()
        );

        if ($result) {
            $user = $this->queryOneUser($medic->getEmail());
            $insert = "INSERT INTO Medico (ID_Usuario,Subrol,Nivel_Estudio,Experiencia_Medica,Area_Trabajo)
            VALUES (" . $user['ID_Usuario'] . ",'" . $medic->getSubrol() . "','" . $medic->getNivel_Estudio() .
            "','" . $medic->getExperiencia_Medic() . "','". $medic->getArea_Trabajo() . "')";
            $imedic = $this->bd->query($insert);
            if (!$imedic) {
                $this->deleteUser($user['ID_Usuario']);
            }
            return true;
        }
        return false;
    }

    public function registerPatient(Patient $patient): bool
    {
        $result = $this->registerUsuario(
            $patient->getEmail(),
            $patient->getPassword(),
            $patient->getNombre(),
            $patient->getApellido_p(),
            $patient->getApellido_m(),
            $patient->getRol(),
            $patient->getFecha_alta(),
            $patient->getHora_alta(),
            $patient->getFoto(),
            $patient->getDireccion(),
            $patient->getTelefono(),
            $patient->getFecha_Nacimiento(),
            $patient->getGenero()
        );

        if ($result) {
            $user = $this->queryOneUser($patient->getEmail());
            $insert = "INSERT INTO Paciente (ID_Usuario,Estado_Civil,NSS,Numero_Emergencia)
            VALUES (" . $user['ID_Usuario'] . ",'" . $patient->getEstado_Civil() . "','" . 
            $patient->getNSS() . "','" . $patient->getNumero_Emergencia() . "')";
            $ipatient = $this->bd->query($insert);
            if (!$ipatient) {
                $this->deleteUser($user['ID_Usuario']);
            }
            return true;
        }
        return false;
    }

    public function queryPatient(int $id_user): Patient
    {
        $query = "SELECT
        Paciente.ID_Paciente,
        Paciente.Estado_Civil,
        Paciente.NSS,
        Paciente.Numero_Emergencia,
        User.ID_Usuario,
        User.Email,
        User.Password,
        User.Nombre,
        User.Apellido_P,
        User.Apellido_M,
        User.Rol,
        User.Fecha_Alta,
        User.Hora_Alta,
        User.Foto,
        User.Direccion,
        User.Telefono,
        User.Fecha_Nac,
        User.Genero
      FROM
        User
      INNER JOIN Paciente ON User.ID_Usuario = Paciente.ID_Usuario
      WHERE
        User.ID_Usuario = " . $id_user . ";";

        $result = $this->bd->query($query);
        $array = mysqli_fetch_assoc($result);
        $patient = new Patient();
        $patient->setId_patient($array["ID_Paciente"]);
        $patient->setId_user($array["ID_Usuario"]);
        $patient->setEmail($array["Email"]);
        $patient->setNombre($array["Nombre"]);
        $patient->setApellido_p($array["Apellido_P"]);
        $patient->setApellido_m($array["Apellido_M"]);
        $patient->setRol($array["Rol"]);
        $patient->setFecha_alta($array["Fecha_Alta"]);
        $patient->setHora_alta($array["Hora_Alta"]);
        $patient->setFoto($array["Foto"]);
        $patient->setDireccion($array["Direccion"]);
        $patient->setTelefono($array["Telefono"]);
        $patient->setFecha_Nacimiento($array["Fecha_Nac"]);
        $patient->setGenero($array["Genero"]);
        $patient->setEstado_Civil($array["Estado_Civil"]);
        $patient->setNSS($array["NSS"]);
        $patient->setNumero_Emergencia($array["Numero_Emergencia"]);

        return $patient;
    }

    public function queryMedic(int $id_user): Medic
    {
        $query = "SELECT
        Medico.ID_Medico,
        Medico.Subrol,
        Medico.Nivel_Estudio,
        Medico.Experiencia_Medica,
        Medico.Area_Trabajo,
        User.ID_Usuario,
        User.Email,
        User.Password,
        User.Nombre,
        User.Apellido_P,
        User.Apellido_M,
        User.Rol,
        User.Fecha_Alta,
        User.Hora_Alta,
        User.Foto,
        User.Direccion,
        User.Telefono,
        User.Fecha_Nac,
        User.Genero
      FROM
        User
      INNER JOIN Medico ON User.ID_Usuario = Medico.ID_Usuario
      WHERE
        User.ID_Usuario = " . $id_user . ";";

        $result = $this->bd->query($query);
        $array = mysqli_fetch_assoc($result);
        $medic = new Medic();
        $medic->setId_Medic($array["ID_Medico"]);
        $medic->setId_user($array["ID_Usuario"]);
        $medic->setEmail($array["Email"]);
        $medic->setNombre($array["Nombre"]);
        $medic->setApellido_p($array["Apellido_P"]);
        $medic->setApellido_m($array["Apellido_M"]);
        $medic->setRol($array["Rol"]);
        $medic->setFecha_alta($array["Fecha_Alta"]);
        $medic->setHora_alta($array["Hora_Alta"]);
        $medic->setFoto($array["Foto"]);
        $medic->setDireccion($array["Direccion"]);
        $medic->setTelefono($array["Telefono"]);
        $medic->setFecha_Nacimiento($array["Fecha_Nac"]);
        $medic->setGenero($array["Genero"]);
        $medic->setSubrol($array["Subrol"]);
        $medic->setNivel_Estudio($array["Nivel_Estudio"]);
        $medic->setExperiencia_Medic($array["Experiencia_Medica"]);
        $medic->setArea_Trabajo($array["Area_Trabajo"]);
        

        return $medic;
    }

    public function queryAdmin(int $id_user): Admin
    {
        $query = "SELECT
        User.ID_Usuario,
        User.Email,
        User.Password,
        User.Nombre,
        User.Apellido_P,
        User.Apellido_M,
        User.Rol,
        User.Fecha_Alta,
        User.Hora_Alta,
        User.Foto,
        User.Direccion,
        User.Telefono,
        User.Fecha_Nac,
        User.Genero,
        Administrador.ID_Administrador,
        Administrador.Subrol,
        Administrador.PassSeguridad
      FROM
        User
      INNER JOIN Administrador ON User.ID_Usuario = Administrador.ID_Usuario
      WHERE
        User.ID_Usuario = " . $id_user . ";";

        $result = $this->bd->query($query);
        $array = mysqli_fetch_assoc($result);
        $admin = new Admin();
        $admin->setId_Admin($array["ID_Administrador"]);
        $admin->setId_user($array["ID_Usuario"]);
        $admin->setEmail($array["Email"]);
        $admin->setNombre($array["Nombre"]);
        $admin->setApellido_p($array["Apellido_P"]);
        $admin->setApellido_m($array["Apellido_M"]);
        $admin->setRol($array["Rol"]);
        $admin->setFecha_alta($array["Fecha_Alta"]);
        $admin->setHora_alta($array["Hora_Alta"]);
        $admin->setFoto($array["Foto"]);
        $admin->setDireccion($array["Direccion"]);
        $admin->setTelefono($array["Telefono"]);
        $admin->setFecha_Nacimiento($array["Fecha_Nac"]);
        $admin->setGenero($array["Genero"]);
        $admin->setSubrol($array["Subrol"]);
        $admin->setPassSecurity($array["PassSeguridad"]);

        return $admin;
    }

    public function queryOneUser(string $email)
    {
        $query = "SELECT * FROM user WHERE Email='" . $email . "'";
        $result = $this->bd->query($query);
        $user = mysqli_fetch_assoc($result);
        return $user;
    }

    public function deleteUser(int $id_user): bool
    {
        $delete = "DELETE FROM user WHERE ID_Usuario = $id_user";
        return $this->bd->query($delete);
    }

}
<?php

namespace App\Services;

use App\Models\User\Admin;
use App\Models\User\Medic;
use App\Models\User\Patient;
use App\Models\User\Pago\InfPago;
use App\Models\User\DatosMedicos\DatosMedicos;

class proxy_bd
{
    private $bd;

    public function __construct()
    {
        $this->bd = mysqli_connect("localhost", "root", "", "INTRAMED");
    }

    /* INSERTS */
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

        $user = $this->queryOneUser($email);
        if(isset($user["Email"]))
        {
            return 1;
        }
        $insert = "INSERT INTO User (Email,Password,Nombre,Apellido_P,Apellido_M,Rol,
        Fecha_Alta,Hora_Alta,Foto,Direccion,Telefono,Fecha_Nac,Genero)
        VALUES('$email','$password','$nombre','$apellido_p',
        '$apellido_m','$rol','$fecha_alta','$hora_alta','$foto','$direccion',$telefono,'$fecha_nacimiento','$genero');";
        $this->bd->query($insert);
        return 0;
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

        if ($result == 0) {
            $user = $this->queryOneUser($Admin->getEmail());

            $insert = "INSERT INTO Administrador (ID_Usuario,Subrol,PassSeguridad)
            VALUES (" . $user['ID_Usuario'] . ",'" . $Admin->getSubrol() . "','" . $Admin->getPassSecurity() . "')";
            $this->bd->query($insert);
            return 0;
        }
        return $result;
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

        if ($result == 0) {
            $user = $this->queryOneUser($medic->getEmail());
            $insert = "INSERT INTO Medico (ID_Usuario,Subrol,Nivel_Estudio,Experiencia_Medica,Area_Trabajo)
            VALUES (" . $user['ID_Usuario'] . ",'" . $medic->getSubrol() . "','" . $medic->getNivel_Estudio() .
                "','" . $medic->getExperiencia_Medic() . "','" . $medic->getArea_Trabajo() . "')";
            $this->bd->query($insert);
            return 0;
        }
        return $result;
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

        if ($result == 0) {
            $user = $this->queryOneUser($patient->getEmail());
            $insert = "INSERT INTO Paciente (ID_Usuario,Estado_Civil,NSS,Numero_Emergencia)
            VALUES (" . $user['ID_Usuario'] . ",'" . $patient->getEstado_Civil() . "','" .
                $patient->getNSS() . "','" . $patient->getNumero_Emergencia() . "')";
            $this->bd->query($insert);
            return 0;
        }
        return $result;
    }

    public function addMethond(InfPago $pago): bool
    {
        $insert = "INSERT INTO info_pago  (ID_Paciente,Numero_Cuenta,Forma_Cuenta,
        Nombre_Titular,Vencimiento_Cuenta,Saldo) VALUES (" . $pago->getID_Paciente() . ",'" .
            $pago->getNumero_Cuenta() . "','" . $pago->getForma_Cuenta() . "','" .
            $pago->getNombre_Titular() . "','" . $pago->getVencimiento_Cuenta() . "'," . $pago->getSaldo() . ");";
        if ($this->bd->query($insert)) {
            return true;
        }
        return false;
    }

    public function addInfoMedic(DatosMedicos $infMedic, int $ID_Paciente)
    {
        $insert = "INSERT INTO Datos_Medicos (ID_Paciente,Peso,Altura,Grupo_Sanguineo,Presion_Arterial,Nivel_Glucosa,Incapacidades, Nota, Fecha_Historial)
        VALUES ($ID_Paciente," . $infMedic->getPeso() . "," . $infMedic->getAltura() . ",'" . $infMedic->getGrupo_Sanguineo() . "'," . $infMedic->getPresion_Arterial() . "," .
            $infMedic->getNivel_Glucosa() . ",'" . $infMedic->getIncapacidades() . "',' " . $infMedic->getNota() . "','" . $infMedic->getFecha_Historial() . "')";
        return $this->bd->query($insert);
    }

    /* SELECTS */

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

    public function queryMethodPago(int $id_paciente): array
    {
        $query = "SELECT * FROM info_pago WHERE ID_Paciente =" . $id_paciente;
        $result = $this->bd->query($query);
        $j = 0;
        $infpagos = array();
        while ($arrayinfpago = mysqli_fetch_assoc($result)) {
            $pago = new InfPago();
            $pago->setID_InfoPago($arrayinfpago["ID_InfoPago"]);
            $pago->setID_Paciente($arrayinfpago["ID_Paciente"]);
            $pago->setNumero_Cuenta($arrayinfpago["Numero_Cuenta"]);
            $pago->setForma_Cuenta($arrayinfpago["Forma_Cuenta"]);
            $pago->setNombre_Titular($arrayinfpago["Nombre_Titular"]);
            $pago->setVencimiento_Cuenta($arrayinfpago["Vencimiento_Cuenta"]);
            $pago->setSaldo($arrayinfpago["Saldo"]);
            $infpagos[$j] = $pago;
            $j++;
        }
        return $infpagos;
    }

    public function queryID_Dato($id_paciente): array
    {
        $query = "SELECT ID_Dato,Fecha_Historial FROM Datos_Medicos WHERE ID_Paciente = " . $id_paciente;

        $result = $this->bd->query($query);
        $j = 0;
        $infMedics = array();
        while ($arrayInfMedic = mysqli_fetch_assoc($result)) {
            $infMedic = new DatosMedicos();
            $infMedic->setID_Dato($arrayInfMedic['ID_Dato']);
            $infMedic->setFecha_Historial($arrayInfMedic['Fecha_Historial']);
            $infMedics[$j] = $infMedic;
            $j++;
        }
        return $infMedics;
    }

    public function queryInfMedic($id_infMedic): DatosMedicos
    {
        $query = "SELECT * FROM Datos_Medicos WHERE ID_Dato = " . $id_infMedic;

        $result = $this->bd->query($query);

        $arrayInfMedic = mysqli_fetch_assoc($result);
            $infMedic = new DatosMedicos();
            $infMedic->setID_Dato($arrayInfMedic['ID_Dato']);
            $infMedic->setID_Paciente($arrayInfMedic["ID_Paciente"]);
            $infMedic->setPeso($arrayInfMedic["Peso"]);
            $infMedic->setAltura($arrayInfMedic["Altura"]);
            $infMedic->setGrupo_Sanguineo($arrayInfMedic["Grupo_Sanguineo"]);
            $infMedic->setPresion_Arterial($arrayInfMedic["Presion_Arterial"]);
            $infMedic->setNivel_Glucosa($arrayInfMedic["Nivel_Glucosa"]);
            $infMedic->setIncapacidades($arrayInfMedic["Incapacidades"]);
            $infMedic->setNota($arrayInfMedic["Nota"]);
            $infMedic->setFecha_Historial($arrayInfMedic['Fecha_Historial']);

        return $infMedic;
    }

    //Update
    public function updateUserPersonal($id_user,$nombre, $apellido_P, $apellido_M, $fecha_Nac)
    {
        $update = "UPDATE User
        SET Nombre = '" . $nombre . "', Apellido_P = '" . $apellido_P . "',
        Apellido_M = '" . $apellido_M . "', Fecha_Nac = '" . $fecha_Nac . "'
        WHERE ID_Usuario = " . $id_user;
        return $this->bd->query($update);
    }

    public function updatePatientPersonal(Patient $patient)
    {
        $this->updateUserPersonal($patient->getId_user(),$patient->getNombre(),$patient->getApellido_p(),
        $patient->getApellido_m(),$patient->getFecha_Nacimiento());

        $update = "UPDATE Paciente
        SET Estado_Civil = '" . $patient->getEstado_Civil() . "'
        WHERE ID_Usuario = " . $patient->getId_user();
        return $this->bd->query($update);
    }

    public function updateMedicPersonal(Medic $medic)
    {
        $this->updateUserPersonal($medic->getId_user(),$medic->getNombre(),$medic->getApellido_p(),
        $medic->getApellido_m(),$medic->getFecha_Nacimiento());

        $update = "UPDATE Medico
        SET Subrol = '" . $medic->getSubrol() . "',
        Area_Trabajo = '" . $medic->getArea_Trabajo() . "'
        WHERE ID_Usuario = " . $medic->getId_user();
        return $this->bd->query($update);
    }

    public function updateAminPersonal(Admin $admin)
    {
        $this->updateUserPersonal($admin->getId_user(),$admin->getNombre(),$admin->getApellido_p(),
        $admin->getApellido_m(),$admin->getFecha_Nacimiento());

        $update = "UPDATE Administrador
        SET Subrol = '" . $admin->getSubrol() . "'
        WHERE ID_Usuario = " . $admin->getId_user();
        return $this->bd->query($update);
    }

    public function updateUserContacto($id,$direccion, $telefono)
    {
        $update = "UPDATE User
        SET Telefono = $telefono,
          Direccion = '$direccion'
        WHERE ID_Usuario = $id";
        return $this->bd->query($update);
    }

    public function updatePatientContacto($id, $num_Emergencia)
    {
        $update = "UPDATE Paciente
        SET Numero_Emergencia = $num_Emergencia
        WHERE ID_Usuario = $id";
        return $this->bd->query($update);
    }

    //Delete

    public function deleteUser(int $id_user): bool
    {
        $delete = "DELETE FROM user WHERE ID_Usuario = $id_user";
        return $this->bd->query($delete);
    }

    public function deleteMethodPago(int $id_infpago): bool
    {
        $delete = "DELETE FROM info_pago WHERE ID_InfoPago = " . $id_infpago;
        return $this->bd->query($delete);
    }

    public function deleteInfMedic(int $id_infMedic): bool
    {
        $delete = "DELETE FROM Datos_Medicos WHERE ID_Dato = " . $id_infMedic;
        return $this->bd->query($delete);
    }

}
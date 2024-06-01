<?php

namespace App\Services;

use App\Models\Cita\Cita;
use App\Models\Pago\Pago;
use App\Models\User\Admin;
use App\Models\User\Medic;
use App\Models\User\Patient;
use App\Models\Servicio\Servicio;
use App\Models\User\InfPago\InfPago;
use App\Models\User\DatosMedicos\DatosMedicos;


class proxy_bd
{
	private $bd;

	public function __construct()
	{
		$this->bd = mysqli_connect("localhost", "root", "", "INTRAMED");
	}

	/*------------------------------------------------------Login--------------------------------------------*/
	public function queryLogin(string $email): ?array
	{
		$query = "SELECT ID_User,Email,Password,Rol FROM user WHERE Email='" . $email . "'";
		$result = $this->bd->query($query);
		$user = mysqli_fetch_assoc($result);
		return $user;
	}

	public function queryCodeSecurity($id_user)
	{
		$query = "SELECT PassSeguridad FROM administrador WHERE ID_User='" . $id_user . "'";
		$result = $this->bd->query($query);
		$code = mysqli_fetch_assoc($result);
		return $code;
	}

	/*-----------------------------------------------------Register------------------------------------------*/
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
		if (isset ($user["Email"])) {
			return 1;
		}
		$insert = "INSERT INTO User (Email,Password,Nombre,Apellido_P,Apellido_M,Rol,
        Fecha_Alta,Hora_Alta,Foto,Direccion,Telefono,Fecha_Nac,Genero)
        VALUES('$email','$password','$nombre','$apellido_p',
        '$apellido_m','$rol','$fecha_alta','$hora_alta','$foto','$direccion',$telefono,'$fecha_nacimiento','$genero');";
		$this->bd->query($insert);
		return 0;
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
			$insert = "INSERT INTO Paciente (ID_User,Estado_Civil,NSS,Numero_Emergencia)
            VALUES (" . $user['ID_User'] . ",'" . $patient->getEstado_Civil() . "','" .
				$patient->getNSS() . "','" . $patient->getNumero_Emergencia() . "')";
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
			$insert = "INSERT INTO Medico (ID_User,Subrol,Nivel_Estudio,Experiencia_Medica,Area_Trabajo)
            VALUES (" . $user['ID_User'] . ",'" . $medic->getSubrol() . "','" . $medic->getNivel_Estudio() .
				"','" . $medic->getExperiencia_Medic() . "','" . $medic->getArea_Trabajo() . "')";
			$this->bd->query($insert);
			return 0;
		}
		return $result;
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

			$insert = "INSERT INTO Administrador (ID_User,Subrol,PassSeguridad)
            VALUES (" . $user['ID_User'] . ",'" . $Admin->getSubrol() . "','" . $Admin->getPassSecurity() . "')";
			$this->bd->query($insert);
			return 0;
		}
		return $result;
	}

	/*-----------------------------------------------------User-------------------------------------------------*/

	public function queryOneUser(string $email): ?array
	{
		$query = "SELECT * FROM user WHERE Email='" . $email . "'";
		$result = $this->bd->query($query);
		$user = mysqli_fetch_assoc($result);
		return $user;
	}

	public function queryPatient(int $id_user): Patient
	{
		$query = "SELECT
        Paciente.ID_Paciente,
        Paciente.Estado_Civil,
        Paciente.NSS,
        Paciente.Numero_Emergencia,
        User.ID_User,
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
      INNER JOIN Paciente ON User.ID_User = Paciente.ID_User
      WHERE
        User.ID_User = " . $id_user . ";";

		$result = $this->bd->query($query);
		$array = mysqli_fetch_assoc($result);
		$patient = new Patient();
		$patient->setId_patient($array["ID_Paciente"]);
		$patient->setId_user($array["ID_User"]);
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
        User.ID_User,
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
      INNER JOIN Medico ON User.ID_User = Medico.ID_User
      WHERE
        User.ID_User = " . $id_user;

		$result = $this->bd->query($query);
		$array = mysqli_fetch_assoc($result);
		$medic = new Medic();
		$medic->setId_Medic($array["ID_Medico"]);
		$medic->setId_user($array["ID_User"]);
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
        User.ID_User,
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
      INNER JOIN Administrador ON User.ID_User = Administrador.ID_User
      WHERE
        User.ID_User = " . $id_user . ";";

		$result = $this->bd->query($query);
		$array = mysqli_fetch_assoc($result);
		$admin = new Admin();
		$admin->setId_Admin($array["ID_Administrador"]);
		$admin->setId_user($array["ID_User"]);
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

	public function queryID_Medicos()
	{
		$query = 'SELECT ID_Medico FROM medico';
		$result = $this->bd->query($query);

		$arrayID = [];
		$j = 0;
		while ($resultCitas = mysqli_fetch_assoc($result)) {
			$arrayID[$j] = $resultCitas['ID_Medico'];
			$j++;
		}
		return $arrayID;
	}

	public function queryID_Patient(int $id_user)
	{
		$query = 'SELECT ID_Paciente FROM paciente WHERE ID_User = ' . $id_user;
		$result = $this->bd->query($query);

		$id_paciente = mysqli_fetch_assoc($result);
		return $id_paciente["ID_Paciente"];
	}

	public function queryID_Medic($id_user)
	{
		$query = 'SELECT ID_Medico FROM medico WHERE ID_User = ' . $id_user;
		$result = $this->bd->query($query);

		$id_medico = mysqli_fetch_assoc($result);
		return $id_medico["ID_Medico"];
	}

	/*----------------------------------------------Inf Personal -------------------------------------------------*/
	public function updateUserPersonal($id_user, $nombre, $apellido_P, $apellido_M, $fecha_Nac) {
		$update = "UPDATE User
        SET Nombre = '" . $nombre . "', Apellido_P = '" . $apellido_P . "',
        Apellido_M = '" . $apellido_M . "', Fecha_Nac = '" . $fecha_Nac . "'
        WHERE ID_User = " . $id_user;
		return $this->bd->query($update);
	}

	public function updatePatientPersonal(Patient $patient) {
		$this->updateUserPersonal($patient->getId_user(), $patient->getNombre(), $patient->getApellido_p(),
			$patient->getApellido_m(), $patient->getFecha_Nacimiento());

		$update = "UPDATE Paciente
        SET Estado_Civil = '" . $patient->getEstado_Civil() . "'
        WHERE ID_User = " . $patient->getId_user();
		return $this->bd->query($update);
	}

	public function updateMedicPersonal(Medic $medic) {
		$this->updateUserPersonal($medic->getId_user(), $medic->getNombre(), $medic->getApellido_p(),
			$medic->getApellido_m(), $medic->getFecha_Nacimiento());

		$update = "UPDATE Medico
        SET Subrol = '" . $medic->getSubrol() . "',
        Area_Trabajo = '" . $medic->getArea_Trabajo() . "'
        WHERE ID_User = " . $medic->getId_user();
		return $this->bd->query($update);
	}

	public function updateAminPersonal(Admin $admin) {
		$this->updateUserPersonal($admin->getId_user(), $admin->getNombre(), $admin->getApellido_p(),
			$admin->getApellido_m(), $admin->getFecha_Nacimiento());

		$update = "UPDATE Administrador
        SET Subrol = '" . $admin->getSubrol() . "'
        WHERE ID_User = " . $admin->getId_user();
		return $this->bd->query($update);
	}

	public function updateUserContacto($id, $direccion, $telefono) {
		$update = "UPDATE User
        SET Telefono = $telefono,
          Direccion = '$direccion'
        WHERE ID_User = $id";
		return $this->bd->query($update);
	}

	public function updatePatientContacto($id, $num_Emergencia) {
		$update = "UPDATE Paciente
        SET Numero_Emergencia = $num_Emergencia
        WHERE ID_User = $id";
		return $this->bd->query($update);
	}

	/*----------------------------------------------Datos Medicos ----------------------------------------------*/
	public function addInfoMedic(DatosMedicos $infMedic, int $ID_Paciente) {
		$insert = "INSERT INTO Datos_Medicos (ID_Paciente,Peso,Altura,Grupo_Sanguineo,Presion_Arterial,Nivel_Glucosa,Incapacidades, Nota, Fecha_Historial)
        VALUES ($ID_Paciente," . $infMedic->getPeso() . "," . $infMedic->getAltura() . ",'" . $infMedic->getGrupo_Sanguineo() . "'," . $infMedic->getPresion_Arterial() . "," .
		$infMedic->getNivel_Glucosa() . ",'" . $infMedic->getIncapacidades() . "',' " . $infMedic->getNota() . "','" . $infMedic->getFecha_Historial() . "')";
		return $this->bd->query($insert);
	}

	public function queryInfMedic($id_infMedic): DatosMedicos {
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

	public function deleteInfMedic(int $id_infMedic): bool {
		$delete = "DELETE FROM Datos_Medicos WHERE ID_Dato = " . $id_infMedic;
		return $this->bd->query($delete);
	}



	/*---------------------------------------------- Inf pago-----------------------------------------------------*/
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

	public function queryDatosMetodo(int $id_metodo) : InfPago
	{
		$query = "SELECT * FROM info_pago WHERE ID_InfoPago = " . $id_metodo;
		$result = $this->bd->query($query);
		$arrayDatos =  mysqli_fetch_array($result);
		$inf = new InfPago();
		$inf->setID_InfoPago($arrayDatos["ID_InfoPago"]);
		$inf->setID_Paciente($arrayDatos["ID_Paciente"]);
		$inf->setNumero_Cuenta($arrayDatos["Numero_Cuenta"]);
		$inf->setForma_Cuenta($arrayDatos["Forma_Cuenta"]);
		$inf->setNombre_Titular($arrayDatos["Nombre_Titular"]);
		$inf->setVencimiento_Cuenta($arrayDatos["Vencimiento_Cuenta"]);
		$inf->setSaldo($arrayDatos["Saldo"]);
		return $inf;
	}

	public function updateSaldoMetodo(int $id_metodo,int $saldoNuevo) : bool
	{
		$update = "UPDATE info_pago SET Saldo = $saldoNuevo WHERE ID_InfoPago = $id_metodo";
		return $this->bd->query($update);
	}

	public function deleteMethodPago(int $id_infpago): bool {
		$delete = "DELETE FROM info_pago WHERE ID_InfoPago = " . $id_infpago;
		return $this->bd->query($delete);
	}


	/*---------------------------------------------------- Cita --------------------------------------------------*/

	public function newCita(Cita $cita)
	{
		$insert = "INSERT INTO Cita (ID_Servicio,ID_Paciente,ID_Medico,Fecha,Hora,Estado)
        VALUES (" . $cita->getId_Servicio() . "," . $cita->getId_Paciente() . "," . $cita->getId_Medico() . ",'" .
			$cita->getFecha() . "','" . $cita->getHora() . "','" . $cita->getEstado() . "')";
		return $this->bd->query($insert);
	}

	public function queryCitasReservadas($fecha): array
	{
		$query = "SELECT Hora FROM cita WHERE Fecha = '" . $fecha . "'";
		$result = $this->bd->query($query);
		$arrayCitasReservadas = [];
		$j = 0;
		while ($resultCitas = mysqli_fetch_assoc($result)) {
			$arrayCitasReservadas[$j] = $resultCitas;
			$j++;
		}

		return $arrayCitasReservadas;
	}

	public function queryMisCitas(Patient $paciente): array
	{
		$query = "SELECT * FROM cita WHERE ID_Paciente = " . $paciente->getId_patient();

		$result = $this->bd->query($query);
		$arrayMisCitas = array();
		$j = 0;
		while ($resultCitas = mysqli_fetch_assoc($result)) {
			$cita = new Cita();
			$cita->setId_Cita($resultCitas['ID_Cita']);
			$cita->setId_Paciente($resultCitas['ID_Paciente']);
			$cita->setId_Medico($resultCitas['ID_Medico']);
			$cita->setEstado($resultCitas['Estado']);
			$cita->setFecha($resultCitas['Fecha']);
			$cita->setHora($resultCitas['Hora']);
			$arrayMisCitas[$j] = $cita;
			$j++;
		}
		return $arrayMisCitas;
	}

	public function queryCita(Cita $cita)
	{
		$query = "SELECT Cita.*, CONCAT(User.Nombre, ' ', User.Apellido_P, ' ', User.Apellido_M) AS Nombre_Medico ,Paciente.ID_User AS IDUsuario,
				servicio.Nombre AS Servicio, User.email as Correo_Medico
        FROM Cita
        INNER JOIN Medico
        ON Cita.ID_Medico = Medico.ID_Medico
        INNER JOIN user
        ON Medico.ID_User = user.ID_User
        INNER JOIN paciente
        ON paciente.ID_Paciente = Cita.ID_Paciente
        INNER JOIN Servicio
        ON Servicio.ID_Servicio = Cita.ID_Servicio
        WHERE Cita.ID_Cita = " . $cita->getId_Cita();
		$result = $this->bd->query($query);
		$citaw = mysqli_fetch_assoc($result);

		$query = "SELECT CONCAT(Nombre, ' ', Apellido_P, ' ', Apellido_M) as Nombre_Paciente, email as Correo_Paciente
		FROM user WHERE ID_User = " . $citaw['IDUsuario'];
		$result = $this->bd->query($query);
		$patient = mysqli_fetch_assoc($result);

		$cita = array_merge($citaw, $patient);

		return $cita;
	}

	public function queryCitaPacientes(Medic $medico): array
	{
		$query = "SELECT * FROM Cita WHERE ID_Medico = " . $medico->getId_Medic();
		$result = $this->bd->query($query);

		$arrayCitasPacientes = array();
		$j = 0;
		while ($resultCitas = mysqli_fetch_assoc($result)) {
			$cita = new Cita();
			$cita->setId_Cita($resultCitas['ID_Cita']);
			$cita->setId_Paciente($resultCitas['ID_Paciente']);
			$cita->setId_Medico($resultCitas['ID_Medico']);
			$cita->setEstado($resultCitas['Estado']);
			$cita->setFecha($resultCitas['Fecha']);
			$cita->setHora($resultCitas['Hora']);
			$arrayCitasPacientes[$j] = $cita;
			$j++;
		}
		return $arrayCitasPacientes;
	}

	public function queryCitas(): array
	{
		$query = "SELECT * FROM cita ORDER BY Fecha";
		$result = $this->bd->query($query);

		$arrayCitas = array();
		$j = 0;
		while ($resultCitas = mysqli_fetch_assoc($result)) {
			$cita = new Cita();
			$cita->setId_Cita($resultCitas['ID_Cita']);
			$cita->setId_Paciente($resultCitas['ID_Paciente']);
			$cita->setId_Medico($resultCitas['ID_Medico']);
			$cita->setFecha($resultCitas['Fecha']);
			$cita->setHora($resultCitas['Hora']);
			$arrayCitas[$j] = $cita;
			$j++;
		}
		return $arrayCitas;
	}

	public function queryDisponibilidadCita($fecha, $hora): bool
	{
		$query = "SELECT ID_Cita FROM cita WHERE Fecha = '$fecha' AND Hora = '$hora'";
		$result = $this->bd->query($query);
		$resultDisponibilidad = mysqli_fetch_assoc($result);
		if ($resultDisponibilidad == NULL) {
			return true;
		}
		return false;
	}

	public function updateEstadoCita(Cita $cita): bool
	{
		$update = "UPDATE Cita
        SET Estado = '" . $cita->getEstado() . "'" .
			"WHERE ID_Cita = " . $cita->getId_Cita();

		return $this->bd->query($update);
	}


	/*-------------------------------------------------------- Servicios --------------------------------------*/
	public function queryServicios(): array
	{
		$query = 'SELECT * FROM servicio';

		$result = $this->bd->query($query);
		$j = 0;
		$arrayServicios = array();
		while ($resultServicios = mysqli_fetch_assoc($result)) {
			$servicio = new Servicio();
			$servicio->setID_Servicio($resultServicios['ID_Servicio']);
			$servicio->setNombre($resultServicios['Nombre']);
			$servicio->setDescripcion($resultServicios["Descripcion"]);
			$servicio->setCosto($resultServicios["Costo"]);
			$arrayServicios[$j] = $servicio;
			$j++;
		}
		return $arrayServicios;
	}

	public function queryServicio(int $id_Servicio): Servicio
	{
		$query = 'SELECT * FROM servicio WHERE ID_Servicio=' . $id_Servicio;

		$result = $this->bd->query($query);
		$resultServicios = mysqli_fetch_array($result);

		$servicio = new Servicio();
		$servicio->setID_Servicio($resultServicios['ID_Servicio']);
		$servicio->setNombre($resultServicios['Nombre']);
		$servicio->setDescripcion($resultServicios['Descripcion']);
		$servicio->setCosto($resultServicios['Costo']);

		return $servicio;
	}



	/*-------------------------------------------------------- Pagos -------------------------------------------*/
	public function newFormatoPago(Pago $pago)
	{
		$query = "INSERT INTO pago (ID_Cita,ID_Paciente,Fecha_Emitida,Hora_Emitida,Fecha_Limite,Monto,Cargos,Estado)
		Values (" . $pago->getID_Cita() . "," . $pago->getID_Paciente() . ",'" . $pago->getFecha_Emitida() . "','" . 
		$pago->getHora_Emitida() . "','" . $pago->getFecha_Limite() . "'," . $pago->getMonto() . ",'" . $pago->getCargos() . "','Por Pagar')";
		$this->bd->query($query);
	}

	public function queryPagosRealizadosAdmin()
	{
		$query = "SELECT * FROM pago WHERE Estado = 'Pagado'";
		$result = $this->bd->query($query);
		$j = 0;
		$arrayPagos = array();
		while ($pagoarray = mysqli_fetch_assoc($result)) {
			$pago = new Pago();
			$pago->setID_Pago($pagoarray["ID_Pago"]);
			$pago->setID_Cita($pagoarray["ID_Cita"]);
			$pago->setFecha_Emitida($pagoarray["Fecha_Emitida"]);
			$pago->setHora_Emitida($pagoarray["Hora_Emitida"]);
			$pago->setFecha_Limite($pagoarray["Fecha_Limite"]);
			$pago->setMonto($pagoarray["Monto"]);
			$pago->setCargos($pagoarray["Cargos"]);
			$pago->setEstado($pagoarray["Estado"]);
			$arrayPagos[$j] = $pago;
			$j++;
		}
		return $arrayPagos;
	}
	public function queryDeudasPacienteAdmin()
	{
		$query = "SELECT * FROM pago WHERE Estado = 'Por Pagar'";
		$result = $this->bd->query($query);
		$j = 0;
		$arrayDeudasPaciente = array();
		while ($pagoarray = mysqli_fetch_assoc($result)) {
			$pago = new Pago();
			$pago->setID_Pago($pagoarray["ID_Pago"]);
			$pago->setID_Cita($pagoarray["ID_Cita"]);
			$pago->setFecha_Emitida($pagoarray["Fecha_Emitida"]);
			$pago->setHora_Emitida($pagoarray["Hora_Emitida"]);
			$pago->setFecha_Limite($pagoarray["Fecha_Limite"]);
			$pago->setFecha_Pagada($pagoarray["Fecha_Pagada"]);
			$pago->setMonto($pagoarray["Monto"]);
			$pago->setCargos($pagoarray["Cargos"]);
			$pago->setEstado($pagoarray["Estado"]);
			$arrayDeudasPaciente[$j] = $pago;
			$j++;
		}
		return $arrayDeudasPaciente;
	}

	public function queryPago(int $id_pago): Pago
	{
		$query = "SELECT * FROM pago WHERE ID_Pago = " . $id_pago;
		$result = $this->bd->query($query);
		$arrayPago = mysqli_fetch_array($result);
		$pago = new Pago();
		$pago->setID_Pago($arrayPago["ID_Pago"]);
		$pago->setID_Cita($arrayPago["ID_Cita"]);
		$pago->setFecha_Emitida($arrayPago["Fecha_Emitida"]);
		$pago->setHora_Emitida($arrayPago["Hora_Emitida"]);
		$pago->setFecha_Limite($arrayPago["Fecha_Limite"]);
		$pago->setFecha_Pagada($arrayPago["Fecha_Pagada"]);
		$pago->setMonto($arrayPago["Monto"]);
		$pago->setCargos($arrayPago["Cargos"]);
		$pago->setEstado($arrayPago["Estado"]);

		return $pago;
	}

	public function queryDeudas(int $id_paciente) : array
	{
		$query = "SELECT * FROM pago WHERE ID_Paciente = " . $id_paciente . " AND Estado = 'Por Pagar'";
		$result = $this->bd->query($query);
		$j = 0;
		$arrayDeudasPaciente = array();
		while ($pagoarray = mysqli_fetch_assoc($result)) {
			$pago = new Pago();
			$pago->setID_Pago($pagoarray["ID_Pago"]);
			$pago->setID_Cita($pagoarray["ID_Cita"]);
			$pago->setID_Paciente($pagoarray["ID_Paciente"]);
			$pago->setFecha_Emitida($pagoarray["Fecha_Emitida"]);
			$pago->setHora_Emitida($pagoarray["Hora_Emitida"]);
			$pago->setFecha_Limite($pagoarray["Fecha_Limite"]);
			$pago->setFecha_Pagada($pagoarray["Fecha_Pagada"]);
			$pago->setMonto($pagoarray["Monto"]);
			$pago->setCargos($pagoarray["Cargos"]);
			$pago->setEstado($pagoarray["Estado"]);
			$arrayDeudasPaciente[$j] = $pago;
			$j++;
		}
		return $arrayDeudasPaciente;
	}

	public function queryPagosRealizadosP(int $id_paciente) : array
	{
		$query = "SELECT * FROM pago WHERE  ID_Paciente = " . $id_paciente . " AND Estado = 'Pagado'";
		$result = $this->bd->query($query);
		$j = 0;
		$arrayPagosR = array();
		while ($pagoarray = mysqli_fetch_assoc($result)) {
			$pago = new Pago();
			$pago->setID_Pago($pagoarray["ID_Pago"]);
			$pago->setID_Cita($pagoarray["ID_Cita"]);
			$pago->setID_Paciente($pagoarray["ID_Paciente"]);
			$pago->setFecha_Emitida($pagoarray["Fecha_Emitida"]);
			$pago->setHora_Emitida($pagoarray["Hora_Emitida"]);
			$pago->setFecha_Limite($pagoarray["Fecha_Limite"]);
			$pago->setFecha_Pagada($pagoarray["Fecha_Pagada"]);
			$pago->setMonto($pagoarray["Monto"]);
			$pago->setCargos($pagoarray["Cargos"]);
			$pago->setEstado($pagoarray["Estado"]);
			$arrayPagosR[$j] = $pago;
			$j++;
		}
		return $arrayPagosR;
	}

	public function updatePagarPago(int $id_pago) : void
	{
		$update = "UPDATE pago
		SET Estado ='Pagado', Fecha_Pagada = '" . date("Y-m-d") . "'
		WHERE ID_Pago = " . $id_pago;
		$this->bd->query($update);
	}
}
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 01-06-2024 a las 17:33:24
-- Versión del servidor: 11.3.2-MariaDB
-- Versión de PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `intramed`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `ID_Administrador` int(11) NOT NULL AUTO_INCREMENT,
  `ID_User` int(11) DEFAULT NULL,
  `Subrol` varchar(50) DEFAULT NULL,
  `PassSeguridad` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_Administrador`),
  KEY `ID_User` (`ID_User`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`ID_Administrador`, `ID_User`, `Subrol`, `PassSeguridad`) VALUES
(1, 1, 'General', '$2y$10$seit8IPM.edtZuCOWXJgkuxy/ahoRvbOeVTrWQT1uSpZ141m0VtOW'),
(2, 4, 'General', '$2y$10$BLfsEhzbbbTyVMaFWx9pIuL3Y9lLRy7v.O32agdlbg2cIASyJSnry');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

DROP TABLE IF EXISTS `cita`;
CREATE TABLE IF NOT EXISTS `cita` (
  `ID_Cita` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Servicio` int(11) DEFAULT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `ID_Medico` int(11) DEFAULT NULL,
  `Fecha` text DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  `Estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_Cita`),
  KEY `ID_Servicio` (`ID_Servicio`),
  KEY `ID_Paciente` (`ID_Paciente`),
  KEY `ID_Medico` (`ID_Medico`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`ID_Cita`, `ID_Servicio`, `ID_Paciente`, `ID_Medico`, `Fecha`, `Hora`, `Estado`) VALUES
(1, 1, 1, 1, '2024-04-31', '13:00:00', 'Reservada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_medicos`
--

DROP TABLE IF EXISTS `datos_medicos`;
CREATE TABLE IF NOT EXISTS `datos_medicos` (
  `ID_Dato` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Paciente` int(11) DEFAULT NULL,
  `Peso` decimal(5,2) DEFAULT NULL,
  `Altura` decimal(5,2) DEFAULT NULL,
  `Grupo_Sanguineo` varchar(5) DEFAULT NULL,
  `Presion_Arterial` varchar(20) DEFAULT NULL,
  `Nivel_Glucosa` decimal(5,2) DEFAULT NULL,
  `Incapacidades` text DEFAULT NULL,
  `Nota` text DEFAULT NULL,
  `Fecha_Historial` date DEFAULT NULL,
  PRIMARY KEY (`ID_Dato`),
  KEY `ID_Paciente` (`ID_Paciente`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_pago`
--

DROP TABLE IF EXISTS `info_pago`;
CREATE TABLE IF NOT EXISTS `info_pago` (
  `ID_InfoPago` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Paciente` int(11) DEFAULT NULL,
  `Numero_Cuenta` varchar(20) DEFAULT NULL,
  `Forma_Cuenta` varchar(50) DEFAULT NULL,
  `Nombre_Titular` varchar(255) DEFAULT NULL,
  `Vencimiento_Cuenta` date DEFAULT NULL,
  `Saldo` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`ID_InfoPago`),
  KEY `ID_Paciente` (`ID_Paciente`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `info_pago`
--

INSERT INTO `info_pago` (`ID_InfoPago`, `ID_Paciente`, `Numero_Cuenta`, `Forma_Cuenta`, `Nombre_Titular`, `Vencimiento_Cuenta`, `Saldo`) VALUES
(2, 1, '435345345345453', 'tarjeta_de_debito', 'Carlos Reyes', '2031-03-18', 434.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

DROP TABLE IF EXISTS `medico`;
CREATE TABLE IF NOT EXISTS `medico` (
  `ID_Medico` int(11) NOT NULL AUTO_INCREMENT,
  `ID_User` int(11) DEFAULT NULL,
  `Subrol` varchar(50) DEFAULT NULL,
  `Nivel_Estudio` varchar(255) DEFAULT NULL,
  `Experiencia_Medica` text DEFAULT NULL,
  `Area_Trabajo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_Medico`),
  KEY `ID_User` (`ID_User`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`ID_Medico`, `ID_User`, `Subrol`, `Nivel_Estudio`, `Experiencia_Medica`, `Area_Trabajo`) VALUES
(1, 2, 'Urgencias', '2', '6', 'laboratorio_patologico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

DROP TABLE IF EXISTS `paciente`;
CREATE TABLE IF NOT EXISTS `paciente` (
  `ID_Paciente` int(11) NOT NULL AUTO_INCREMENT,
  `ID_User` int(11) DEFAULT NULL,
  `Estado_Civil` varchar(50) DEFAULT NULL,
  `NSS` varchar(20) DEFAULT NULL,
  `Numero_Emergencia` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_Paciente`),
  KEY `ID_User` (`ID_User`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`ID_Paciente`, `ID_User`, `Estado_Civil`, `NSS`, `Numero_Emergencia`) VALUES
(1, 3, 'viudo', '4544345', '55732324324');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

DROP TABLE IF EXISTS `pago`;
CREATE TABLE IF NOT EXISTS `pago` (
  `ID_Pago` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Cita` int(11) DEFAULT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `Fecha_Emitida` date DEFAULT NULL,
  `Hora_Emitida` time DEFAULT NULL,
  `Fecha_Limite` date DEFAULT NULL,
  `Fecha_Pagada` date DEFAULT NULL,
  `Estado` varchar(50) DEFAULT NULL,
  `Cargos` decimal(10,2) DEFAULT NULL,
  `Monto` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`ID_Pago`),
  KEY `ID_Cita` (`ID_Cita`),
  KEY `ID_Paciente` (`ID_Paciente`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

DROP TABLE IF EXISTS `servicio`;
CREATE TABLE IF NOT EXISTS `servicio` (
  `ID_Servicio` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `Descripcion` text DEFAULT NULL,
  `Costo` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID_Servicio`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`ID_Servicio`, `Nombre`, `Descripcion`, `Costo`) VALUES
(1, 'Consulta Médica', 'Una consulta medica para ver que tiene el paciente y mandarlo a un sector', 100.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID_User` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Apellido_P` varchar(255) NOT NULL,
  `Apellido_M` varchar(255) DEFAULT NULL,
  `Rol` varchar(50) NOT NULL,
  `Fecha_Alta` date DEFAULT NULL,
  `Hora_Alta` time DEFAULT NULL,
  `Foto` blob DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Fecha_Nac` date DEFAULT NULL,
  `Genero` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID_User`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`ID_User`, `Email`, `Password`, `Nombre`, `Apellido_P`, `Apellido_M`, `Rol`, `Fecha_Alta`, `Hora_Alta`, `Foto`, `Direccion`, `Telefono`, `Fecha_Nac`, `Genero`) VALUES
(4, 'admin@admin', '$2y$10$sXz.NIMdObyCUhTVXARjcO/OdSwkfAge.PlUPhotG0JVXwa804Nci', 'Carlos', 'Reyes', 'SÃ¡nchez', 'Admin', '2024-05-30', '22:49:53', 0x7075626c69632f6173736574732f696d672f61646d696e732f323032342d30352d33302d32322d34392d35335f4361726c6f73526579657353c3a16e6368657a2e706e67, 'Calle 2 lote 32 mz 6', '5573612558', '2002-03-09', 'masculino'),
(2, 'medic@medic.com', '$2y$10$6a8656WFKjXnq30PeH2RHudoOcODmQlL1AQyy5Jt7To1zm4IfqEve', 'Pedro', 'Hernandez', 'Torres', 'Medic', '2024-05-30', '22:24:34', 0x7075626c69632f6173736574732f696d672f6d65646963732f323032342d30352d33302d32322d32342d33345f506564726f4865726e616e64657a546f727265732e706e67, 'calle 1, lote 2, mz 2', '3245675432', '2002-05-15', 'femenino'),
(3, 'paciente@paciente.com', '$2y$10$rxKU.xdSABdxYs13RI1/Hutsylm2SocCZHXNhssRJE6Qxi3NMiXa2', 'Andrea', 'Fernandez', 'SÃ¡nchez', 'Patient', '2024-05-30', '22:25:33', 0x7075626c69632f6173736574732f696d672f70617469656e74732f323032342d30352d33302d32322d32352d33325f4a6f736566696e614665726e616e64657a53c3a16e6368657a2e706e67, 'calle 3 lote 2 mz 8', '45546677', '2002-08-13', 'femenino');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 19-12-2023 a las 23:51:43
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

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
  `ID_Administrador` int NOT NULL,
  `ID_User` int NOT NULL,
  `Subrol` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `PassSeguridad` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID_Administrador`),
  KEY `_idx` (`ID_User`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

DROP TABLE IF EXISTS `cita`;
CREATE TABLE IF NOT EXISTS `cita` (
  `ID_Cita` int NOT NULL AUTO_INCREMENT,
  `ID_Servicio` int NOT NULL,
  `ID_Paciente` int NOT NULL,
  `ID_Medico` int NOT NULL,
  `Fecha` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Hora` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID_Cita`),
  KEY `Cita_Servicio_idx` (`ID_Servicio`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`ID_Cita`, `ID_Servicio`, `ID_Paciente`, `ID_Medico`, `Fecha`, `Hora`) VALUES
(1, 1, 1, 1, '2023-11-26', '08:00'),
(2, 1, 1, 1, '2023-12-19', '09:30'),
(3, 1, 1, 1, '', '08:00'),
(4, 1, 1, 1, '', '08:00'),
(5, 1, 1, 1, '', '08:00'),
(6, 1, 1, 1, '', '08:00'),
(7, 1, 1, 1, '', '08:00'),
(8, 1, 1, 1, '', '08:00'),
(9, 1, 1, 1, '', '08:00'),
(10, 1, 1, 1, '', '08:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_medicos`
--

DROP TABLE IF EXISTS `datos_medicos`;
CREATE TABLE IF NOT EXISTS `datos_medicos` (
  `ID_Dato` int NOT NULL,
  `ID_Paciente` int NOT NULL,
  `Peso` varchar(45) NOT NULL,
  `Altura` varchar(45) NOT NULL,
  `Grupo_Sanguineo` varchar(45) NOT NULL,
  `Presión_Arterial` varchar(45) NOT NULL,
  `Nivel_Glucosa` varchar(45) NOT NULL,
  `Incapacidades` varchar(45) NOT NULL,
  `Nota` varchar(45) NOT NULL,
  `Fecha_Historial` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_Dato`),
  KEY `Datos_Paciente_idx` (`ID_Paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_pago`
--

DROP TABLE IF EXISTS `info_pago`;
CREATE TABLE IF NOT EXISTS `info_pago` (
  `ID_InfoPago` int NOT NULL,
  `ID_Paciente` int NOT NULL,
  `Numero_Cuenta` varchar(100) NOT NULL,
  `Forma_Cuenta` varchar(100) NOT NULL,
  `Nombre_Titular` varchar(100) NOT NULL,
  `Vencimiento_Cuenta` varchar(45) NOT NULL,
  `Saldo` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_InfoPago`),
  KEY `InfoP_Paciente_idx` (`ID_Paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

DROP TABLE IF EXISTS `medico`;
CREATE TABLE IF NOT EXISTS `medico` (
  `ID_Medico` int NOT NULL,
  `ID_User` int NOT NULL,
  `Subrol` varchar(45) NOT NULL,
  `Nivel_Estudio` varchar(45) NOT NULL,
  `Experiencia_Medica` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_Medico`),
  KEY `Medico_User_idx` (`ID_User`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

DROP TABLE IF EXISTS `paciente`;
CREATE TABLE IF NOT EXISTS `paciente` (
  `ID_Paciente` int NOT NULL,
  `ID_User` int NOT NULL,
  `Estado_Civil` varchar(50) NOT NULL,
  `NSS` varchar(45) NOT NULL,
  `Numero_Emergencia` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_Paciente`),
  KEY `Paciente_User_idx` (`ID_User`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`ID_Paciente`, `ID_User`, `Estado_Civil`, `NSS`, `Numero_Emergencia`) VALUES
(0, 4, 'casado', '435435435345', '3254435435');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

DROP TABLE IF EXISTS `servicio`;
CREATE TABLE IF NOT EXISTS `servicio` (
  `ID_Servicio` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Costo` double NOT NULL,
  PRIMARY KEY (`ID_Servicio`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`ID_Servicio`, `Nombre`, `Descripcion`, `Costo`) VALUES
(1, 'Consultas médicas', 'Atención médica por parte de un médico especialista en una determinada área.', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID_User` int NOT NULL AUTO_INCREMENT,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido_P` varchar(45) NOT NULL,
  `Apellido_M` varchar(45) NOT NULL,
  `Rol` varchar(45) NOT NULL,
  `Fecha_Alta` varchar(45) NOT NULL,
  `Hora_Alta` varchar(45) NOT NULL,
  `Foto` varchar(200) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `Telefono` varchar(45) NOT NULL,
  `Fecha_Nac` varchar(45) NOT NULL,
  `Genero` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_User`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`ID_User`, `Email`, `Password`, `Nombre`, `Apellido_P`, `Apellido_M`, `Rol`, `Fecha_Alta`, `Hora_Alta`, `Foto`, `Direccion`, `Telefono`, `Fecha_Nac`, `Genero`) VALUES
(4, 'paciente@paciente.com', '$2y$10$lN3X9cO7iccIjIzygxsTt.t5MVZROYTGNte/15wnkm.tFdNigFEze', 'Jose Antonio', 'Perez', 'Mendez', 'Patient', '2023-11-08', '19:25:15', 'public/assets/img/Patents/2023-11-08-19-25-15_Jose AntonioPerezMendez.png', 'calle #4, lote 34, Mz. 8 Alvaro Obregon', '5435435435', '2002-01-08', 'masculino');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `ID_User` FOREIGN KEY (`ID_User`) REFERENCES `user` (`ID_User`);

--
-- Filtros para la tabla `datos_medicos`
--
ALTER TABLE `datos_medicos`
  ADD CONSTRAINT `Datos_Paciente` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `info_pago`
--
ALTER TABLE `info_pago`
  ADD CONSTRAINT `InfoP_Paciente` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`);

--
-- Filtros para la tabla `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `Medico_User` FOREIGN KEY (`ID_User`) REFERENCES `user` (`ID_User`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `Paciente_User` FOREIGN KEY (`ID_User`) REFERENCES `user` (`ID_User`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 13-10-2023 a las 14:07:45
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.2.0

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
  `ID_Administrador` int NOT NULL AUTO_INCREMENT,
  `ID_Usuario` int NOT NULL,
  `Subrol` varchar(255) NOT NULL,
  `PassSeguridad` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Administrador`),
  KEY `Usuario_Administrador` (`ID_Usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`ID_Administrador`, `ID_Usuario`, `Subrol`, `PassSeguridad`) VALUES
(7, 10, 'Operaciones', 'XEkg#mbx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alergias`
--

DROP TABLE IF EXISTS `alergias`;
CREATE TABLE IF NOT EXISTS `alergias` (
  `ID_Alergias` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `ID_Paciente` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Alergias`),
  KEY `Paciente_Alergias` (`ID_Paciente`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_enfermedad`
--

DROP TABLE IF EXISTS `datos_enfermedad`;
CREATE TABLE IF NOT EXISTS `datos_enfermedad` (
  `ID_Dato` int NOT NULL,
  `ID_Enfermedad` int NOT NULL,
  `Estado` varchar(255) NOT NULL,
  `Signos` varchar(255) NOT NULL,
  KEY `Dato_Enfermedad` (`ID_Dato`),
  KEY `Enfermedad_Dato` (`ID_Enfermedad`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_medicos`
--

DROP TABLE IF EXISTS `datos_medicos`;
CREATE TABLE IF NOT EXISTS `datos_medicos` (
  `ID_Dato` int NOT NULL AUTO_INCREMENT,
  `ID_Paciente` int NOT NULL,
  `Peso` varchar(255) NOT NULL,
  `Altura` varchar(255) NOT NULL,
  `Grupo_Sanguineo` varchar(255) NOT NULL,
  `Presion_Arterial` varchar(255) NOT NULL,
  `Nivel_Glucosa` varchar(255) NOT NULL,
  `Incapacidades` varchar(255) DEFAULT NULL,
  `Nota` varchar(255) DEFAULT NULL,
  `Fecha_Historial` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Dato`),
  KEY `Paciente_Datos` (`ID_Paciente`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `datos_medicos`
--

INSERT INTO `datos_medicos` (`ID_Dato`, `ID_Paciente`, `Peso`, `Altura`, `Grupo_Sanguineo`, `Presion_Arterial`, `Nivel_Glucosa`, `Incapacidades`, `Nota`, `Fecha_Historial`) VALUES
(3, 1, '324324', '32432432', 'B-', '324234', '324323', 'Movilidad reducida', ' 324234324324324', '2023-10-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedad`
--

DROP TABLE IF EXISTS `enfermedad`;
CREATE TABLE IF NOT EXISTS `enfermedad` (
  `ID_Enfermedad` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Codigo_Enfermedad` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_Enfermedad`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_pago`
--

DROP TABLE IF EXISTS `info_pago`;
CREATE TABLE IF NOT EXISTS `info_pago` (
  `ID_InfoPago` int NOT NULL AUTO_INCREMENT,
  `ID_Paciente` int NOT NULL,
  `Numero_Cuenta` varchar(255) NOT NULL,
  `Forma_Cuenta` varchar(255) NOT NULL,
  `Nombre_Titular` varchar(255) NOT NULL,
  `Vencimiento_Cuenta` varchar(2555) NOT NULL,
  `Saldo` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_InfoPago`),
  KEY `Paciente_Pago` (`ID_Paciente`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `info_pago`
--

INSERT INTO `info_pago` (`ID_InfoPago`, `ID_Paciente`, `Numero_Cuenta`, `Forma_Cuenta`, `Nombre_Titular`, `Vencimiento_Cuenta`, `Saldo`) VALUES
(3, 1, '324324324324324', 'tarjeta_de_credito', '324324324', '2023-10-17', '324324324');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

DROP TABLE IF EXISTS `medico`;
CREATE TABLE IF NOT EXISTS `medico` (
  `ID_Medico` int NOT NULL AUTO_INCREMENT,
  `ID_Usuario` int NOT NULL,
  `Subrol` varchar(255) NOT NULL,
  `Nivel_Estudio` varchar(255) NOT NULL,
  `Experiencia_Medica` varchar(255) NOT NULL,
  `Area_Trabajo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_Medico`),
  KEY `Usuario_Medico` (`ID_Usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`ID_Medico`, `ID_Usuario`, `Subrol`, `Nivel_Estudio`, `Experiencia_Medica`, `Area_Trabajo`) VALUES
(2, 8, 'Consulta', 'Secundaria', '32', 'sala_de_emergencias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos_pacientes`
--

DROP TABLE IF EXISTS `medicos_pacientes`;
CREATE TABLE IF NOT EXISTS `medicos_pacientes` (
  `ID_Medico` int NOT NULL,
  `ID_Paciente` int NOT NULL,
  `Fecha_Inicio` varchar(255) NOT NULL,
  `Fecha_Fin` varchar(255) NOT NULL,
  `Estado` varchar(255) NOT NULL,
  KEY `Paciente_Medico` (`ID_Paciente`),
  KEY `Medico_Paciente` (`ID_Medico`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

DROP TABLE IF EXISTS `paciente`;
CREATE TABLE IF NOT EXISTS `paciente` (
  `ID_Paciente` int NOT NULL AUTO_INCREMENT,
  `ID_Usuario` int NOT NULL,
  `Estado_Civil` varchar(255) NOT NULL,
  `NSS` varchar(255) NOT NULL,
  `Numero_Emergencia` int NOT NULL,
  PRIMARY KEY (`ID_Paciente`),
  KEY `Usuario_Paciente` (`ID_Usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`ID_Paciente`, `ID_Usuario`, `Estado_Civil`, `NSS`, `Numero_Emergencia`) VALUES
(1, 9, 'soltero', '34324', 5446);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID_Usuario` int NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Apellido_P` varchar(255) NOT NULL,
  `Apellido_M` varchar(255) NOT NULL,
  `Rol` varchar(255) NOT NULL,
  `Fecha_Alta` varchar(255) NOT NULL,
  `Hora_Alta` varchar(255) NOT NULL,
  `Foto` varchar(255) DEFAULT NULL,
  `Direccion` varchar(255) NOT NULL,
  `Telefono` int NOT NULL,
  `Fecha_Nac` varchar(255) NOT NULL,
  `Genero` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`ID_Usuario`, `Email`, `Password`, `Nombre`, `Apellido_P`, `Apellido_M`, `Rol`, `Fecha_Alta`, `Hora_Alta`, `Foto`, `Direccion`, `Telefono`, `Fecha_Nac`, `Genero`) VALUES
(10, 'admin@admin.com', '$2y$10$Y9350kb.ttWIQBKZtS5poeTKbHyCRSJZF7Vk95OLKpvdpDEvLsqYm', 'ivan', 'santa ana', 'rodriguez', 'Admin', '2023-10-10', '16:22:10', 'public/assets/img/Admins/2023-10-10-16-22-10_ivansanta anarodriguez.png', 'calle 1, lote 2, mz 2', 55324324, '2023-10-11', 'femenino'),
(8, 'medic@medic.com', '$2y$10$2fxZvLvLL8QRAlM2xuOj8.fAKSxlidCy3xQL.dx9nxnU4595kUVtG', 'pepe', 'torres', 'juarez', 'Medic', '2023-10-09', '17:34:46', 'public/assets/img/Medics/2023-10-09-17-34-46_pepetorresjuarez.png', 'calle 1, lote 2, mz 2', 345, '1121-02-12', 'femenino'),
(9, 'paciente@paciente.com', '$2y$10$0qT.ZGEXW17szql4IqqSEelEG5FfqSoQNKxuubp412xIpMNCpcQra', 'carlos', 'perez', 'hernandez', 'Patient', '2023-10-09', '19:50:52', 'public/assets/img/Patents/2023-10-09-19-50-52_antonioperezhernandez.png', 'calle 1, lote 2, mz 2', 5435435, '2023-10-04', 'masculino');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

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

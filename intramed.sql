-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-02-2024 a las 20:09:58
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

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

CREATE TABLE `administrador` (
  `ID_Administrador` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `Subrol` varchar(45) NOT NULL,
  `PassSeguridad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `ID_Cita` int(11) NOT NULL,
  `ID_Servicio` int(11) NOT NULL,
  `ID_Paciente` int(11) NOT NULL,
  `ID_Medico` int(11) NOT NULL,
  `Fecha` varchar(40) NOT NULL,
  `Hora` varchar(45) NOT NULL,
  `Estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`ID_Cita`, `ID_Servicio`, `ID_Paciente`, `ID_Medico`, `Fecha`, `Hora`, `Estado`) VALUES
(6, 1, 1, 1, '2024-00-17', '08:00', 'Realizada'),
(7, 1, 1, 1, '2024-00-18', '15:00', 'Finalizado'),
(8, 1, 1, 1, '2024-00-25', '08:00', 'Finalizado'),
(9, 1, 1, 1, '2024-00-18', '08:00', 'Reservada'),
(10, 1, 1, 1, '2024-00-19', '08:00', 'Reservada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_medicos`
--

CREATE TABLE `datos_medicos` (
  `ID_Dato` int(11) NOT NULL,
  `ID_Paciente` int(11) NOT NULL,
  `Peso` varchar(45) NOT NULL,
  `Altura` varchar(45) NOT NULL,
  `Grupo_Sanguineo` varchar(45) NOT NULL,
  `Presión_Arterial` varchar(45) NOT NULL,
  `Nivel_Glucosa` varchar(45) NOT NULL,
  `Incapacidades` varchar(100) NOT NULL,
  `Nota` varchar(255) NOT NULL,
  `Fecha_Historial` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_pago`
--

CREATE TABLE `info_pago` (
  `ID_InfoPago` int(11) NOT NULL,
  `ID_Paciente` int(11) NOT NULL,
  `Numero_Cuenta` varchar(100) NOT NULL,
  `Forma_Cuenta` varchar(100) NOT NULL,
  `Nombre_Titular` varchar(100) DEFAULT NULL,
  `Vencimiento_Cuenta` varchar(45) NOT NULL,
  `Saldo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `ID_Medico` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `Subrol` varchar(100) NOT NULL,
  `Nivel_Estudio` varchar(100) NOT NULL,
  `Experiencia_Medica` varchar(100) NOT NULL,
  `Area_Trabajo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`ID_Medico`, `ID_User`, `Subrol`, `Nivel_Estudio`, `Experiencia_Medica`, `Area_Trabajo`) VALUES
(1, 2, 'Investigador', '546456', '34545', 'consultorio_2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `ID_Paciente` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `Estado_Civil` varchar(50) NOT NULL,
  `NSS` varchar(45) NOT NULL,
  `Numero_Emergencia` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`ID_Paciente`, `ID_User`, `Estado_Civil`, `NSS`, `Numero_Emergencia`) VALUES
(1, 1, 'divorciado', '456546576', '657657657');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `ID_Servicio` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Costo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`ID_Servicio`, `Nombre`, `Descripcion`, `Costo`) VALUES
(1, 'Consulta Medica', 'Consulta Medica', '150');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `ID_User` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido_P` varchar(100) NOT NULL,
  `Apellido_M` varchar(100) NOT NULL,
  `Rol` varchar(100) NOT NULL,
  `Fecha_Alta` varchar(100) NOT NULL,
  `Hora_Alta` varchar(100) NOT NULL,
  `Foto` varchar(255) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Telefono` varchar(12) NOT NULL,
  `Fecha_Nac` varchar(100) NOT NULL,
  `Genero` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`ID_User`, `Email`, `Password`, `Nombre`, `Apellido_P`, `Apellido_M`, `Rol`, `Fecha_Alta`, `Hora_Alta`, `Foto`, `Direccion`, `Telefono`, `Fecha_Nac`, `Genero`) VALUES
(1, 'paciente@paciente.com', '$2y$10$ecOPsmxrCa4.v7qN3zA2F.N6ZIut2muXr7Q2xXpYt00rstO25Wz.e', 'paciente', 'paciente', 'paciente', 'Patient', '2024-01-14', '17:11:32', 'public/assets/img/Patents/2024-01-14-17-11-31_pacientepacientepaciente.png', 'paciente', '45546676', '2024-01-02', 'masculino'),
(2, 'medic@medic.com', '$2y$10$JLXo6tbWA7ohuUh100Hmju4qsTBLNUNYfzmaIhIWFR18lWWDOTiaS', 'medic', 'medic', 'medic', 'Medic', '2024-01-14', '17:15:25', 'public/assets/img/Medics/2024-01-14-17-15-25_medicmedicmedic.png', 'medic', '553434324343', '2024-01-12', 'masculino');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`ID_Administrador`),
  ADD KEY `administrador_user_FK` (`ID_User`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`ID_Cita`),
  ADD KEY `cita_paciente_FK` (`ID_Paciente`),
  ADD KEY `cita_medico_FK` (`ID_Medico`),
  ADD KEY `cita_servicio_FK` (`ID_Servicio`);

--
-- Indices de la tabla `datos_medicos`
--
ALTER TABLE `datos_medicos`
  ADD PRIMARY KEY (`ID_Dato`),
  ADD KEY `datos_medicos_paciente_FK` (`ID_Paciente`);

--
-- Indices de la tabla `info_pago`
--
ALTER TABLE `info_pago`
  ADD PRIMARY KEY (`ID_InfoPago`),
  ADD KEY `info_pago_paciente_FK` (`ID_Paciente`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`ID_Medico`),
  ADD KEY `medico_user_FK` (`ID_User`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`ID_Paciente`),
  ADD KEY `paciente_user_FK` (`ID_User`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`ID_Servicio`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_User`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `ID_Administrador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `ID_Cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `datos_medicos`
--
ALTER TABLE `datos_medicos`
  MODIFY `ID_Dato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `info_pago`
--
ALTER TABLE `info_pago`
  MODIFY `ID_InfoPago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `ID_Medico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `ID_Paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `ID_Servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_user_FK` FOREIGN KEY (`ID_User`) REFERENCES `user` (`ID_User`);

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_medico_FK` FOREIGN KEY (`ID_Medico`) REFERENCES `medico` (`ID_Medico`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cita_paciente_FK` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cita_servicio_FK` FOREIGN KEY (`ID_Servicio`) REFERENCES `servicio` (`ID_Servicio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos_medicos`
--
ALTER TABLE `datos_medicos`
  ADD CONSTRAINT `datos_medicos_paciente_FK` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`);

--
-- Filtros para la tabla `info_pago`
--
ALTER TABLE `info_pago`
  ADD CONSTRAINT `info_pago_paciente_FK` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`);

--
-- Filtros para la tabla `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `medico_user_FK` FOREIGN KEY (`ID_User`) REFERENCES `user` (`ID_User`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_user_FK` FOREIGN KEY (`ID_User`) REFERENCES `user` (`ID_User`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

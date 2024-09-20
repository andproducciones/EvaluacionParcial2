-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 19-09-2024 a las 02:05:13
-- Versión del servidor: 9.0.1
-- Versión de PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinica_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

DROP TABLE IF EXISTS `consultas`;
CREATE TABLE IF NOT EXISTS `consultas` (
  `consulta_id` int NOT NULL AUTO_INCREMENT,
  `paciente_id` int DEFAULT NULL,
  `medico_id` int DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `motivo_consulta` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`consulta_id`),
  KEY `paciente_id` (`paciente_id`),
  KEY `medico_id` (`medico_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

DROP TABLE IF EXISTS `medicos`;
CREATE TABLE IF NOT EXISTS `medicos` (
  `medico_id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `especialidad` varchar(100) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`medico_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
CREATE TABLE IF NOT EXISTS `pacientes` (
  `paciente_id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`paciente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `consultas_ibfk_1` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`paciente_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `consultas_ibfk_2` FOREIGN KEY (`medico_id`) REFERENCES `medicos` (`medico_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

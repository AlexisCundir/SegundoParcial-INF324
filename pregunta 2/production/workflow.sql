-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2023 a las 06:57:13
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `workflow`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujo`
--

CREATE TABLE `flujo` (
  `flujo` varchar(2) DEFAULT NULL,
  `proceso` varchar(3) DEFAULT NULL,
  `procesosiguiente` varchar(3) DEFAULT NULL,
  `tipo` varchar(1) DEFAULT NULL,
  `rol` varchar(10) DEFAULT NULL,
  `pantalla` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `flujo`
--

INSERT INTO `flujo` (`flujo`, `proceso`, `procesosiguiente`, `tipo`, `rol`, `pantalla`) VALUES
('F1', 'P1', 'P2', 'I', 'estudiante', 'requisitos'),
('F1', 'P2', 'P3', 'P', 'estudiante', 'pagocpt'),
('F1', 'P3', 'P4', 'P', 'estudiante', 'formulario'),
('F1', 'P4', NULL, 'C', 'kardex', 'verifica'),
('F1', 'P5', 'P7', 'P', 'kardex', 'correcto'),
('F1', 'P6', 'P8', 'P', 'kardex', 'incorrecto'),
('F1', 'P8', 'P9', 'P', 'kardex', 'matinscritas'),
('F1', 'P7', 'P9', 'P', 'estudiante', 'matinscritas'),
('F1', 'P9', 'FIN', 'F', 'estudiante', 'finaliza'),
('F2', 'P1', 'P2', 'I', 'estudiante', 'requisitos'),
('F2', 'P2', 'P3', 'P', 'estudiante', 'pagocpt'),
('F2', 'P3', 'P4', 'P', 'estudiante', 'formulario'),
('F2', 'P4', NULL, 'C', 'kardex', 'verifica'),
('F2', 'P6', 'P8', 'P', 'kardex', 'devolver'),
('F2', 'P8', 'P9', 'P', 'estudiante', 'matinscritas'),
('F2', 'P9', 'FIN', 'F', 'estudiante', 'finaliza'),
('F3', 'P1', 'P2', 'I', 'estudiante', 'requisitos'),
('F3', 'P2', 'P3', 'P', 'estudiante', 'pagocpt'),
('F3', 'P3', 'P4', 'P', 'estudiante', 'formulario'),
('F4', 'P1', 'P2', 'I', 'estudiante', 'requisitos'),
('F4', 'P2', 'P3', 'P', 'estudiante', 'pagocpt'),
('F4', 'P3', 'P4', 'P', 'estudiante', 'formulario'),
('F5', 'P1', 'P2', 'I', 'estudiante', 'requisitos'),
('F5', 'P2', 'P3', 'P', 'estudiante', 'pagocpt'),
('F5', 'P3', 'P4', 'P', 'estudiante', 'formulario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujopregunta`
--

CREATE TABLE `flujopregunta` (
  `flujo` varchar(2) DEFAULT NULL,
  `proceso` varchar(3) DEFAULT NULL,
  `si` varchar(3) DEFAULT NULL,
  `no` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `flujopregunta`
--

INSERT INTO `flujopregunta` (`flujo`, `proceso`, `si`, `no`) VALUES
('F1', 'P4', 'P5', 'P6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `secuencia` int(11) DEFAULT NULL,
  `usuario` varchar(10) DEFAULT NULL,
  `fechahorainicio` datetime DEFAULT NULL,
  `fechahorafin` datetime DEFAULT NULL,
  `flujo` varchar(2) DEFAULT NULL,
  `proceso` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

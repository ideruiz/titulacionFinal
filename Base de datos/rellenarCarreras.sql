-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-10-2013 a las 21:06:29
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `stitulacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE IF NOT EXISTS `carrera` (
  `id_carrera` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_carrera` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `i_area` int(1) NOT NULL,
  `i_subArea` varchar(2) CHARACTER SET utf8 NOT NULL,
  `i_nivel` int(1) NOT NULL,
  `consecutivo` varchar(2) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_carrera`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id_carrera`, `nombre_carrera`, `i_area`, `i_subArea`, `i_nivel`, `consecutivo`) VALUES
(1, 'Administración de Negocios', 6, '21', 3, '10'),
(2, 'Administración Turística', 6, '15', 3, '02'),
(3, 'Comunicación', 6, '01', 3, '02'),
(4, 'Dirección y Administración de Empresas', 6, '07', 3, '09'),
(5, 'Finanzas y Contaduría Pública', 6, '01', 3, '99'),
(6, 'Gastronomía', 6, '15', 3, '18'),
(7, 'Ingeniería en Tecnologías de Información y Telecomunicaciones', 5, '20', 3, '28'),
(8, 'Ingeniería Industrial para la Dirección', 5, '09', 3, '36'),
(9, 'Mercadotecnia', 6, '22', 3, '06'),
(10, 'Negocios Internacionales', 6, '21', 3, '76'),
(11, 'Ingeniería en Sistemas y Tecnologías de la Información', 5, '16', 3, '42'),
(12, 'Ciencias de la Familia', 2, '45', 3, '87'),
(13, 'Derecho', 6, '12', 3, '01');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

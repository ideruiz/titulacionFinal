-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-10-2013 a las 16:45:30
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
-- Estructura de tabla para la tabla `preparatoria`
--

CREATE TABLE IF NOT EXISTS `preparatoria` (
  `id_preparatoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_preparatoria` varchar(110) DEFAULT NULL,
  `entidad_preparatoria` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_preparatoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `preparatoria`
--

INSERT INTO `preparatoria` (`id_preparatoria`, `nombre_preparatoria`, `entidad_preparatoria`) VALUES
(1, 'Bachillerato del Liceo Federico Froebel de Oaxaca', 'Oaxaca'), 
(2, 'Centro de Bachillerato Tecnológico Industrial y de Servicios 123', 'Oaxaca'), 
(3, 'Centro de Bachillerato Tecnológico Industrial y de Servicios 183', 'Oaxaca'), 
(4, 'Centro de Bachillerato Tecnológico Industrial y de Servicios 2', 'Oaxaca'),
(6, 'Centro de Bachillerato Tecnológico Industrial y de Servicios 248', 'Oaxaca'),
(7, 'Centro de Bachillerato Tecnológico Industrial y de Servicios 26', 'Oaxaca'),
(8, 'Centro de Bachillerato Tecnológico Industrial y de Servicios 78', 'Oaxaca'), 
(9, 'Centro de Bachillerato Tecnológico Industrial y de Servicios 91', 'Oaxaca'), 
(10, 'Centro Eduación Cruz Azul Campus Lagunas Oax.', 'Oaxaca'),
(11, 'Centro Educacional Donaji S.C.', 'Oaxaca'),
(12, 'Colegio de Bachilleres del Estado de Oaxaca Plantel 01 "Pueblo Nuevo"', 'Oaxaca'),
(13, 'Colegio de Bachilleres del Estado de Oaxaca Plantel 02 "Espinal"', 'Oaxaca'),
(14, 'Colegio de Bachilleres del Estado de Oaxaca Plantel 03 "Pinotepa Nacional"', 'Oaxaca'), 
(15, 'Colegio de Bachilleres del Estado de Oaxaca Plantel 04 "El Tule"', 'Oaxaca'),
(16, 'Colegio de Bachilleres del Estado de Oaxaca Plantel 15 "Union Hidalgo"', 'Oaxaca'), 
(17, 'Colegio de Bachilleres del Estado de Oaxaca Plantel 27 "Miahuatlan"', 'Oaxaca'), 
(18, 'Colegio de Bachilleres del Estado de Oaxaca Plantel 30 "Güila"', 'Oaxaca'), 
(19, 'Colegio de Bachilleres del Estado de Oaxaca Plantel 32 "Cuilapam"', 'Oaxaca'),
(20, 'Colegio de Bachilleres del Estado de Oaxaca Plantel 39 "Nazareno"', 'Oaxaca'), 
(21, 'Colegio de Estudios Científicos y Tecnológicos del Estado de Baja California "Compuertas"', ''),
(22, 'Colegio de Estudios Científicos y Tecnológicos No. 1 Oaxaca', 'Oaxaca'),
(23, 'Colegio Froebel ', 'Oaxaca'),
(24, 'Colegio Guadalupe de Ocotlán, A.C.', 'Oaxaca'),
(25, 'Colegio Motolinia', 'Oaxaca'),
(26, 'Colegio Nacional de Educación Profesional Técnica Plantel Oaxaca', 'Oaxaca'), 
(27, 'Escuela Lic. Cesar Linton Rodríguez', 'Oaxaca'),
(28, 'Escuela Preparatoria "General Lazáro Cárdenas del Río"', 'Oaxaca'), 
(29, 'Escuela Preparatoria "Simón Bolívar"', 'Oaxaca'),
(30, 'Escuela Preparatoria Calmecac', 'Oaxaca'),
(31, 'Escuela Preparatoria General Antonio de León', 'Oaxaca'),
(32, 'Escuela Preparatoria Maria Teresa Rivera', 'Oaxaca'),
(33, 'Fundación Cultural Benito Juárez, S.C.', 'Oaxaca'),
(34, 'Instituto "Luis Sarmiento", S.C.', 'Oaxaca'),
(35, 'Instituto Ateneo de la Juventud', 'Oaxaca'),
(36, 'Instituto Blaise Pascale', 'Oaxaca'),
(37, 'Instituto Carlos Gracida, A.C.', 'Oaxaca'), 
(38, 'Instituto De Estudios de Bachillerato del Estado de Oaxaca plantel 34 "San Bartolome Loxicha"', 'Oaxaca'),
(39, 'Instituto Eulogio Gillow', 'Oaxaca'),
(40, 'Instituto Fray Bartolomé de las Casas', 'Oaxaca'),
(41, 'Instituto Pedagógico Margarita Aguilar Diaz', 'Oaxaca'), 
(42, 'Instituto San Felipe Bachillerato', 'Oaxaca'),
(43, 'Sistema Educativo Nacional', 'Oaxaca'),
(44, 'Telebachillerato del Estado de Oaxaca Plantel 14 "Progreso"', 'Oaxaca'),
(45, 'Telebachillerato del Estado de Oaxaca, Plantel 14 " Progreso"', 'Oaxaca'), 
(46, 'Universidad Autónoma "Benito Juárez" de Oaxaca Preparatoria Num 6', 'Oaxaca'), 
(47, 'Universidad Autónoma "Benito Juárez" de Oaxaca Preparatoria Número  Siete', 'Oaxaca'), 
(48, 'Universidad Autónoma "Benito Juárez" de Oaxaca Preparatoria Número  Uno', 'Oaxaca'),
(49, 'Universidad Autónoma "Benito Juárez" de Oaxaca, Facultad de Contaduría y Administración', 'Oaxaca'), 
(50, 'Universidad Autónoma de Nuevo León, Escuela Preparatoria Número Quince', 'Oaxaca'),
(51, 'Universidad Regional del Sureste', 'Oaxaca'); 


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

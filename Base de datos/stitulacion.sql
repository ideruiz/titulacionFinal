-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-10-2013 a las 18:18:03
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `programa` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `id_alumno` int(11) NOT NULL DEFAULT '0',
  `nombre_alumno` varchar(60) DEFAULT NULL,
  `clase_alumno` int(11) DEFAULT NULL,
  `creditos_carrera` int(10) unsigned DEFAULT NULL,
  `creditos_inscritos` int(11) DEFAULT NULL,
  `creditos_ganados` int(11) DEFAULT NULL,
  `porcentaje_avance` int(11) DEFAULT NULL,
  `creditos_avance` int(11) DEFAULT NULL,
  `fk_carrera` int(11) DEFAULT NULL,
  `estado_candidato` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_alumno`),
  KEY `fk_carrera_idx` (`fk_carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE IF NOT EXISTS `carrera` (
  `id_carrera` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_carrera` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `i_area` int(1) NOT NULL,
  `i_subArea` varchar(2) NOT NULL,
  `i_nivel` int(1) NOT NULL,
  `consecutivo` varchar(2) NOT NULL,
  PRIMARY KEY (`id_carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `constantes`
--

CREATE TABLE IF NOT EXISTS `constantes` (
  `id_constantes` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rector` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `admin_escolar` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `institucion` varchar(19) COLLATE utf8_spanish_ci NOT NULL,
  `entidad_institucion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ex_profesional` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `exp_titulo` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `exp_certificado` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `i_estado_institucion` int(2) NOT NULL,
  `consecutivo_institucion` int(4) NOT NULL,
  `codigo_LicMaster` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_constantes`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `constantes`
--

INSERT INTO `constantes` (`id_constantes`, `nombre_rector`, `admin_escolar`, `institucion`, `entidad_institucion`, `ex_profesional`, `exp_titulo`, `exp_certificado`, `i_estado_institucion`, `consecutivo_institucion`, `codigo_LicMaster`) VALUES
(1, 'Dr. Rodrigo del Val Martín', 'M.A. Arinelly Rojas Alcántara', 'Universidad Anáhuac', 'Oaxaca', 'Exención', 'Cuilapam de Guerrero, Oaxaca a 01 de Enero de 2012', 'Cuilapam de Guerrero, Oaxaca a 01 de Enero de 2012', 20, 162, 'C1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `clave` varchar(2) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `numero` int(2) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `clave`, `estado`, `numero`) VALUES
(1, 'AS', 'AGUASCALIENTES', 1),
(2, 'BC', 'BAJA CALIFORNIA', 2),
(3, 'BS', 'BAJA CALIFORNIA SUR', 3),
(4, 'CC', 'CAMPECHE', 4),
(5, 'CS', 'CHIAPAS', 7),
(6, 'CH', 'CHIHUAHUA', 8),
(7, 'CL', 'COAHUILA', 5),
(8, 'CM', 'COLIMA', 6),
(9, 'DF', 'DISTRITO FEDERAL', 9),
(10, 'DG', 'DURANGO', 10),
(11, 'GT', 'GUANAJUATO', 11),
(12, 'GR', 'GUERRERO', 12),
(13, 'HG', 'HIDALGO', 13),
(14, 'JC', 'JALISCO', 14),
(15, 'MC', 'MEXICO', 15),
(16, 'MN', 'MICHOACÁN', 16),
(17, 'MS', 'MORELOS', 17),
(18, 'NT', 'NAYARIT', 18),
(19, 'NL', 'NUEVO LEÓN', 19),
(20, 'OC', 'OAXACA', 20),
(21, 'PL', 'PUEBLA', 21),
(22, 'QT', 'QUERÉTARO', 22),
(23, 'QR', 'QUINTANA ROO', 23),
(24, 'SP', 'SAN LUIS POTOSÍ', 24),
(25, 'SL', 'SINALOA', 25),
(26, 'SR', 'SONORA', 26),
(27, 'TC', 'TABASCO', 27),
(28, 'TS', 'TAMAULIPAS', 28),
(29, 'TL', 'TLAXCALA', 29),
(30, 'VZ', 'VERACRUZ', 30),
(31, 'YN', 'YUCATÁN', 31),
(32, 'ZS', 'ZACATECAS', 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preparatoria`
--

CREATE TABLE IF NOT EXISTS `preparatoria` (
  `id_preparatoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_preparatoria` varchar(110) DEFAULT NULL,
  `entidad_preparatoria` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_preparatoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesionista`
--

CREATE TABLE IF NOT EXISTS `profesionista` (
  `fk_alumno` int(11) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `entidad_nacimiento` varchar(2) NOT NULL,
  `fecha_nacimiento` varchar(8) NOT NULL,
  `pais_radica` varchar(3) NOT NULL,
  `e_profesional` varchar(8) NOT NULL,
  `extra_1` int(10) NOT NULL,
  `extra_2` int(10) NOT NULL,
  PRIMARY KEY (`fk_alumno`),
  KEY `fk_alumno` (`fk_alumno`),
  KEY `fk_alumno_2` (`fk_alumno`),
  KEY `fk_alumno_3` (`fk_alumno`),
  KEY `fk_alumno_4` (`fk_alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='3' AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Asistente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulacion`
--

CREATE TABLE IF NOT EXISTS `titulacion` (
  `id_titulacion` int(11) NOT NULL AUTO_INCREMENT,
  `fk_alumno` int(11) NOT NULL,
  `tipo_titulacion` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `a_paterno` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `a_materno` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_rector` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `exp_titulo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `libro` int(11) NOT NULL,
  `foja` int(11) NOT NULL,
  `curp` varchar(18) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_bachillerato` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `periodo_bachillerato` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `entidad_bachillerato` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `institucion` varchar(19) COLLATE utf8_spanish_ci NOT NULL,
  `carrera` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `periodo_carrera` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `entidad_institucion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `examen_profesional` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `certificacion` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `administracion_escolar` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_titulacion`),
  KEY `fk_alumno` (`fk_alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usurio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fk_rol` int(11) DEFAULT NULL,
  `password` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_usurio`),
  KEY `fk_rol_idx` (`fk_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usurio`, `nombre_usuario`, `fk_rol`, `password`) VALUES
(1, 'saul', 1, '7250b50b1abfcdf560f1d679368bd9bb');
(2, 'ide', 1, '2e6f957e42998c1309eb6fa8dd0d0c05');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `validaciones`
--

CREATE TABLE IF NOT EXISTS `validaciones` (
  `id_validaciones` int(11) NOT NULL AUTO_INCREMENT,
  `fk_alumno` int(11) DEFAULT NULL,
  `estado_validacion` int(11) DEFAULT '0',
  `fk_usuario` int(11) DEFAULT NULL,
  `idiomas` int(11) DEFAULT '0',
  `pago_titulacion` int(11) DEFAULT '0',
  `servicio_social` int(11) DEFAULT '0',
  `documento_firmas` int(11) DEFAULT '0',
  `copiado` int(11) NOT NULL,
  PRIMARY KEY (`id_validaciones`),
  KEY `fk_alumno_idx` (`fk_alumno`),
  KEY `fk_usuario_idx` (`fk_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=252 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `fk_carrera` FOREIGN KEY (`fk_carrera`) REFERENCES `carrera` (`id_carrera`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_rol` FOREIGN KEY (`fk_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `validaciones`
--
ALTER TABLE `validaciones`
  ADD CONSTRAINT `validaciones_ibfk_1` FOREIGN KEY (`fk_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `validaciones_ibfk_2` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_usurio`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

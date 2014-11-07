-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-11-2014 a las 23:52:25
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `JAG`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
`cod_alu` int(10) unsigned NOT NULL,
  `ced` varchar(8) NOT NULL,
  `ced_esc` varchar(10) NOT NULL,
  `nac` int(2) NOT NULL,
  `pnom` varchar(40) NOT NULL,
  `snom` varchar(40) DEFAULT NULL,
  `papelli` varchar(40) NOT NULL,
  `sapelli` varchar(40) DEFAULT NULL,
  `tlf` varchar(11) NOT NULL,
  `tlfo` varchar(11) DEFAULT NULL,
  `cod_sex` tinyint(1) unsigned NOT NULL,
  `lug_nac` varchar(50) NOT NULL,
  `fec_nac` date NOT NULL,
  `cod_est` int(2) unsigned NOT NULL,
  `cod_mun` int(5) unsigned NOT NULL,
  `cod_parro` int(5) unsigned NOT NULL,
  `dir` varchar(20) NOT NULL,
  `acta_num_part_nac` int(10) unsigned NOT NULL,
  `acta_folio_num_part_nac` int(10) unsigned NOT NULL,
  `plantel_proce` int(50) NOT NULL,
  `repit` enum('s','n') NOT NULL,
  `alt` tinyint(3) unsigned NOT NULL,
  `peso` smallint(3) unsigned NOT NULL,
  `cam` tinyint(1) unsigned NOT NULL,
  `pant` tinyint(1) unsigned NOT NULL,
  `zap` tinyint(2) unsigned NOT NULL,
  `cod_repre` int(10) unsigned NOT NULL,
  `cod_cur` tinyint(3) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_pa_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_pa_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`cod_alu`, `ced`, `ced_esc`, `nac`, `pnom`, `snom`, `papelli`, `sapelli`, `tlf`, `tlfo`, `cod_sex`, `lug_nac`, `fec_nac`, `cod_est`, `cod_mun`, `cod_parro`, `dir`, `acta_num_part_nac`, `acta_folio_num_part_nac`, `plantel_proce`, `repit`, `alt`, `peso`, `cam`, `pant`, `zap`, `cod_repre`, `cod_cur`, `status`, `cod_pa_reg`, `fec_reg`, `cod_pa_mod`, `fec_mod`) VALUES
(2, '19852866', '1985286677', 1, 'JUan', 'Andres', 'Leotur', 'GIl', '02124761155', '04129174387', 1, 'CAracas', '2014-10-01', 1, 1, 1, 'LA Vega', 2323, 3030, 122, 's', 23, 32, 23, 23, 23, 4, 2, 1, 2, '2014-10-26 22:23:16', 2, '2014-10-26 22:23:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE IF NOT EXISTS `cargo` (
`cod_car` tinyint(2) unsigned NOT NULL,
  `des_car` varchar(20) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `cod_pa_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_pa_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`cod_car`, `des_car`, `status`, `cod_pa_reg`, `fec_reg`, `cod_pa_mod`, `fec_mod`) VALUES
(1, 'Director (a)', 1, 1, '2014-10-20 18:02:46', 1, '2014-10-20 18:02:46'),
(2, 'Sub-Director(a)', 1, 1, '2014-10-20 18:02:46', 1, '2014-10-20 18:02:46'),
(3, 'Secretaria 1', 1, 1, '2014-10-20 18:02:46', 1, '2014-10-20 18:02:46'),
(4, 'Secretaria 2', 1, 1, '2014-10-20 18:02:46', 1, '2014-10-20 18:02:46'),
(5, 'Profesor (a)', 1, 1, '2014-10-20 18:02:46', 1, '2014-10-20 18:02:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
`cod_cur` tinyint(3) unsigned NOT NULL,
  `cod_gra` tinyint(3) unsigned NOT NULL,
  `cod_sec` tinyint(3) unsigned NOT NULL,
  `des_cur` varchar(50) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_pa_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_pa_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`cod_cur`, `cod_gra`, `cod_sec`, `des_cur`, `status`, `cod_pa_reg`, `fec_reg`, `cod_pa_mod`, `fec_mod`) VALUES
(1, 1, 1, 'Primer Grado Seccion:"A"', 1, 1, '2014-10-09 16:53:30', 1, '2014-10-09 16:53:30'),
(2, 1, 2, 'Primer Grado Seccion:"B"', 1, 1, '2014-10-09 16:53:30', 1, '2014-10-09 16:53:30'),
(3, 1, 3, 'Primer Grado Seccion:"C"', 1, 1, '2014-10-09 16:53:30', 1, '2014-10-09 16:53:30'),
(4, 1, 4, 'Primer Grado Seccion:"D"', 1, 1, '2014-10-09 16:53:30', 1, '2014-10-09 16:53:30'),
(5, 1, 5, 'Primer Grado Seccion:"E"', 1, 1, '2014-10-09 16:53:30', 1, '2014-10-09 16:53:30'),
(6, 2, 1, 'Segundo Grado Seccion:"A"', 1, 1, '2014-10-09 16:59:16', 1, '2014-10-09 16:59:16'),
(7, 2, 2, 'Segundo Grado Seccion:"B"', 1, 1, '2014-10-09 16:59:16', 1, '2014-10-09 16:59:16'),
(8, 2, 3, 'Segundo Grado Seccion:"C"', 1, 1, '2014-10-09 16:59:16', 1, '2014-10-09 16:59:16'),
(9, 2, 4, 'Segundo Grado Seccion:"D"', 1, 1, '2014-10-09 16:59:16', 1, '2014-10-09 16:59:16'),
(10, 2, 5, 'Segundo Grado Seccion:"E"', 1, 1, '2014-10-09 16:59:16', 1, '2014-10-09 16:59:16'),
(11, 3, 1, 'Tercer Grado Seccion:"A"', 1, 1, '2014-10-09 17:11:46', 1, '2014-10-09 17:11:46'),
(12, 3, 2, 'Tercer Grado Seccion:"B"', 1, 1, '2014-10-09 17:11:46', 1, '2014-10-09 17:11:46'),
(13, 3, 3, 'Tercer Grado Seccion:"C"', 1, 1, '2014-10-09 17:11:46', 1, '2014-10-09 17:11:46'),
(14, 3, 4, 'Tercer Grado Seccion:"D"', 1, 1, '2014-10-09 17:11:46', 1, '2014-10-09 17:11:46'),
(15, 3, 5, 'Tercer Grado Seccion:"E"', 1, 1, '2014-10-09 17:11:46', 1, '2014-10-09 17:11:46'),
(16, 4, 1, 'Cuarto Grado Seccion:"A"', 1, 1, '2014-10-09 17:19:25', 1, '2014-10-09 17:19:25'),
(17, 4, 2, 'Cuarto Grado Seccion:"B"', 1, 1, '2014-10-09 17:19:25', 1, '2014-10-09 17:19:25'),
(18, 4, 3, 'Cuarto Grado Seccion:"C"', 1, 1, '2014-10-09 17:19:25', 1, '2014-10-09 17:19:25'),
(19, 4, 4, 'Cuarto Grado Seccion:"D"', 1, 1, '2014-10-09 17:19:25', 1, '2014-10-09 17:19:25'),
(20, 4, 5, 'Cuarto Grado Seccion:"E"', 1, 1, '2014-10-09 17:19:25', 1, '2014-10-09 17:19:25'),
(21, 5, 1, 'Quinto Grado Seccion:"A"', 1, 1, '2014-10-09 17:20:50', 1, '2014-10-09 17:20:50'),
(22, 5, 2, 'Quinto Grado Seccion:"B"', 1, 1, '2014-10-09 17:20:50', 1, '2014-10-09 17:20:50'),
(23, 5, 3, 'Quinto Grado Seccion:"C"', 1, 1, '2014-10-09 17:20:50', 1, '2014-10-09 17:20:50'),
(24, 5, 4, 'Quinto Grado Seccion:"D"', 1, 1, '2014-10-09 17:20:50', 1, '2014-10-09 17:20:50'),
(25, 5, 5, 'Quinto Grado Seccion:"E"', 1, 1, '2014-10-09 17:20:50', 1, '2014-10-09 17:20:50'),
(26, 6, 1, 'Sexto Grado Seccion:"A"', 1, 1, '2014-10-09 17:22:29', 1, '2014-10-09 17:22:29'),
(27, 6, 2, 'Sexto Grado Seccion:"B"', 1, 1, '2014-10-09 17:22:29', 1, '2014-10-09 17:22:29'),
(28, 6, 3, 'Sexto Grado Seccion:"C"', 1, 1, '2014-10-09 17:22:29', 1, '2014-10-09 17:22:29'),
(29, 6, 4, 'Sexto Grado Seccion:"D"', 1, 1, '2014-10-09 17:22:29', 1, '2014-10-09 17:22:29'),
(30, 6, 5, 'Sexto Grado Seccion:"E"', 1, 1, '2014-10-09 17:22:29', 1, '2014-10-09 17:22:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
`cod_est` int(2) unsigned NOT NULL,
  `des_est` varchar(100) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_pa_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_pa_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`cod_est`, `des_est`, `status`, `cod_pa_reg`, `fec_reg`, `cod_pa_mod`, `fec_mod`) VALUES
(1, 'Distrito Capital', 1, 1, '2014-08-27 17:47:02', 1, '2014-08-27 17:47:02'),
(2, 'Anzoátegui', 1, 1, '2014-08-27 17:47:02', 1, '2014-08-27 17:47:02'),
(3, 'Amazonas', 1, 1, '2014-08-27 17:47:02', 1, '2014-08-27 17:47:02'),
(4, 'Apure', 1, 1, '2014-08-27 17:47:02', 1, '2014-08-27 17:47:02'),
(5, 'Aragua', 1, 1, '2014-08-27 17:47:02', 1, '2014-08-27 17:47:02'),
(6, 'Barinas', 1, 1, '2014-08-27 17:47:02', 1, '2014-08-27 17:47:02'),
(7, 'Bolívar', 1, 1, '2014-08-27 17:47:02', 1, '2014-08-27 17:47:02'),
(8, 'Carabobo', 1, 1, '2014-08-27 17:47:02', 1, '2014-08-27 17:47:02'),
(9, 'Cojedes', 1, 1, '2014-08-27 17:47:02', 1, '2014-08-27 17:47:02'),
(10, 'Delta Amacuro', 1, 1, '2014-08-27 17:47:02', 1, '2014-08-27 17:47:02'),
(11, 'Falcón', 1, 1, '2014-08-27 17:47:02', 1, '2014-08-27 17:47:02'),
(12, 'Guárico', 1, 1, '2014-08-27 17:47:02', 1, '2014-08-27 17:47:02'),
(13, 'Lara', 1, 1, '2014-08-27 17:47:02', 1, '2014-08-27 17:47:02'),
(14, 'Mérida', 1, 1, '2014-08-27 17:47:02', 1, '2014-08-27 17:47:02'),
(15, 'Miranda', 1, 1, '2014-08-27 17:47:02', 1, '2014-08-27 17:47:02'),
(16, 'Monagas', 1, 1, '2014-08-27 17:47:02', 1, '2014-08-27 17:47:02'),
(17, 'Nueva Esparta', 1, 1, '2014-08-27 17:47:02', 1, '2014-08-27 17:47:02'),
(18, 'Portuguesa', 1, 1, '2014-08-27 17:47:02', 1, '2014-08-27 17:47:02'),
(19, 'Sucre', 1, 1, '2014-08-27 17:47:02', 1, '2014-08-27 17:47:02'),
(20, 'Táchira', 1, 1, '2014-08-27 17:47:02', 1, '2014-08-27 17:47:02'),
(21, 'Trujillo', 1, 1, '2014-08-27 17:47:02', 1, '2014-08-27 17:47:02'),
(22, 'Yaracuy', 1, 1, '2014-08-27 17:47:02', 1, '2014-08-27 17:47:02'),
(23, 'Vargas', 1, 1, '2014-08-27 17:47:02', 1, '2014-08-27 17:47:02'),
(24, 'Zulia', 1, 1, '2014-08-27 17:47:02', 1, '2014-08-27 17:47:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE IF NOT EXISTS `grados` (
`cod_gra` tinyint(3) unsigned NOT NULL,
  `des_gra` varchar(15) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_pa_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_pa_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`cod_gra`, `des_gra`, `status`, `cod_pa_reg`, `fec_reg`, `cod_pa_mod`, `fec_mod`) VALUES
(1, '1ro', 1, 1, '2014-10-09 14:51:20', 1, '2014-10-09 14:51:20'),
(2, '2do', 1, 1, '2014-10-09 14:51:20', 1, '2014-10-09 14:51:20'),
(3, '3ro', 1, 1, '2014-10-09 14:57:06', 1, '2014-10-09 14:57:06'),
(4, '4t', 1, 1, '2014-10-09 14:57:06', 1, '2014-10-09 14:57:06'),
(5, '5to', 1, 1, '2014-10-09 14:57:06', 1, '2014-10-09 14:57:06'),
(6, '6to', 1, 1, '2014-10-09 14:57:06', 1, '2014-10-09 14:57:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE IF NOT EXISTS `municipio` (
`cod_mun` int(5) unsigned NOT NULL,
  `cod_est` int(2) unsigned NOT NULL,
  `des_mun` varchar(100) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_pa_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_pa_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`cod_mun`, `cod_est`, `des_mun`, `status`, `cod_pa_reg`, `fec_reg`, `cod_pa_mod`, `fec_mod`) VALUES
(1, 1, 'Libertador', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(2, 15, 'Baruta', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(3, 15, 'Chacao', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(4, 15, 'Sucre', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(5, 15, 'El Hatillo', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(6, 15, 'Acevedo', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(7, 15, 'Andres Bello', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(8, 15, 'Brion', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(9, 15, 'Buroz', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(10, 15, 'Carrizal', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(11, 15, 'Cristobal Rojas', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(12, 15, 'Guacaipuro', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(13, 15, 'Independencia', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(14, 15, 'Lander', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(15, 15, 'Los Salias', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(16, 15, 'Paez', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(17, 15, 'Paz Castillo', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(18, 15, 'Pedro Gual', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(19, 15, 'Plaza', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(20, 15, 'Simon Bolivar', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(21, 15, 'Urdaneta', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(22, 15, 'Zamora', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(23, 23, 'Vargas', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(24, 12, 'Camaguan', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(25, 12, 'Chaguaramas', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(26, 12, 'El Socorro', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(27, 12, 'Francisco de Miranda', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(28, 12, 'Jose Felix Ribas', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(29, 12, 'Jose Tadeo Monagas', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(30, 12, 'Juan German Roscio', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(31, 12, 'Julian Mellado', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(32, 12, 'Las Mercedes del Llano', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(33, 12, 'Leonardo Infante', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(34, 12, 'Ortiz', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(35, 12, 'Pedro Zaraza', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(36, 12, 'San Geronimo de Guayabal', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(37, 12, 'San Jose de Guaribe', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(38, 12, 'Santa Maria de Ipire', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(39, 5, 'Bolivar', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(41, 5, 'Camatagua', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(42, 5, 'Francisco Linares', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(43, 5, 'Giradot', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(44, 5, 'Jose Angel Lamas', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(45, 5, 'Jose Felix Ribas', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(46, 5, 'Jose Revenga', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(47, 5, 'Libertador', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(48, 5, 'Mario Iragorry', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(49, 5, 'Ocumare de la costa', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(50, 5, 'San Casimiro', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(51, 5, 'San Sebastian', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(52, 5, 'Santiago Mariño', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(53, 5, 'Santos Michelena', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(54, 5, 'Sucre', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(55, 5, 'Tovar', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(56, 5, 'Urdaneta', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(57, 5, 'Zamora', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(58, 8, 'Bejuma', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(59, 8, 'Carlos Arevalo', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(60, 8, 'Diego Ibarra', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(61, 8, 'Guacara', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(62, 8, 'Juan Jose Mora', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(63, 8, 'Libertador', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(64, 8, 'Los Guayos', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(65, 8, 'Miranda', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(66, 8, 'Montalban', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(67, 8, 'Naguanagua', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(68, 8, 'Puerto Cabello', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(69, 8, 'San Diego', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(70, 8, 'San Joaquin', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(71, 8, 'Valencia', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_educativo`
--

CREATE TABLE IF NOT EXISTS `nivel_educativo` (
`cod_ne` tinyint(3) unsigned NOT NULL,
  `des_ne` varchar(20) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_pa_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_pa_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `nivel_educativo`
--

INSERT INTO `nivel_educativo` (`cod_ne`, `des_ne`, `status`, `cod_pa_reg`, `fec_reg`, `cod_pa_mod`, `fec_mod`) VALUES
(1, 'PASANTE', 1, 1, '2014-09-17 22:33:56', 1, '2014-09-17 22:33:56'),
(2, 'TSU', 1, 1, '2014-09-17 22:34:10', 1, '2014-09-17 22:34:10'),
(3, 'UNIVERSITARIO', 1, 1, '2014-09-17 22:35:35', 1, '2014-09-17 22:35:35'),
(4, 'LICENCIADO', 1, 1, '2014-09-17 22:39:58', 1, '2014-09-17 22:39:58'),
(5, 'DOCTORADO', 1, 1, '2014-09-17 22:40:12', 1, '2014-09-17 22:40:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padres_representante`
--

CREATE TABLE IF NOT EXISTS `padres_representante` (
`cod_repre` int(10) unsigned NOT NULL,
  `ced_repre` varchar(8) NOT NULL,
  `nac` int(2) NOT NULL,
  `pnom` varchar(20) NOT NULL,
  `snom` varchar(20) DEFAULT NULL,
  `papelli` varchar(40) NOT NULL,
  `sapelli` varchar(20) DEFAULT NULL,
  `cod_sex` tinyint(1) unsigned NOT NULL,
  `fec_nac` date NOT NULL,
  `lug_nac` varchar(20) DEFAULT NULL,
  `tlf` varchar(11) DEFAULT NULL,
  `tlfo` varchar(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `paren` tinyint(2) unsigned NOT NULL,
  `vi_alu` enum('s','n') NOT NULL,
  `cod_est` int(10) unsigned NOT NULL,
  `cod_mun` int(10) unsigned NOT NULL,
  `cod_parro` int(10) unsigned NOT NULL,
  `dir` varchar(100) NOT NULL,
  `cod_ne` tinyint(3) unsigned NOT NULL,
  `prof` varchar(40) DEFAULT NULL,
  `lug_tra` varchar(50) DEFAULT NULL,
  `dir_tra` varchar(150) DEFAULT NULL,
  `tlf_tra` varchar(11) DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_pa_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_pa_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `padres_representante`
--

INSERT INTO `padres_representante` (`cod_repre`, `ced_repre`, `nac`, `pnom`, `snom`, `papelli`, `sapelli`, `cod_sex`, `fec_nac`, `lug_nac`, `tlf`, `tlfo`, `email`, `paren`, `vi_alu`, `cod_est`, `cod_mun`, `cod_parro`, `dir`, `cod_ne`, `prof`, `lug_tra`, `dir_tra`, `tlf_tra`, `status`, `cod_pa_reg`, `fec_reg`, `cod_pa_mod`, `fec_mod`) VALUES
(4, '19639604', 1, 'Pable', 'SEgundo', 'PErez', 'Orellana', 1, '2014-10-01', 'caracas', '1234123', '123123123', 'leoturorellana@hotmail.c17639604om', 1, 's', 1, 1, 26, 'LA vega', 1, 'Jose', 'Caracas', 'El Paraiso', '12341234', 1, 1, '2014-10-26 22:19:49', 1, '2014-10-26 22:19:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parentesco`
--

CREATE TABLE IF NOT EXISTS `parentesco` (
  `cod_par` tinyint(2) unsigned NOT NULL,
  `des_par` varchar(10) NOT NULL,
  `cod_pa_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_pa_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parentesco`
--

INSERT INTO `parentesco` (`cod_par`, `des_par`, `cod_pa_reg`, `fec_reg`, `cod_pa_mod`, `fec_mod`) VALUES
(1, 'MAdre', 1, '2014-10-26 22:16:01', 1, '2014-10-26 22:16:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parroquia`
--

CREATE TABLE IF NOT EXISTS `parroquia` (
`cod_parro` int(5) unsigned NOT NULL,
  `cod_mun` int(5) unsigned NOT NULL,
  `des_parro` varchar(100) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_pa_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_pa_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=216 ;

--
-- Volcado de datos para la tabla `parroquia`
--

INSERT INTO `parroquia` (`cod_parro`, `cod_mun`, `des_parro`, `status`, `cod_pa_reg`, `fec_reg`, `cod_pa_mod`, `fec_mod`) VALUES
(1, 1, 'Altagracia', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(2, 1, 'Antímano', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(3, 1, 'Caricuao', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(4, 1, 'Catedral', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(5, 1, 'Coche', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(6, 1, 'El Junquito', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(7, 1, 'El paraíso', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(8, 1, 'El Recreo', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(9, 1, 'El Valle', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(10, 1, 'La Candelaria', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(11, 1, 'La Pastora', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(12, 1, 'La Vega', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(13, 1, 'Macarao', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(14, 1, 'San Agustín', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(15, 1, 'San Bernardino', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(16, 1, 'San José', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(17, 1, 'San Juan', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(18, 1, 'Santa Rosalia', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(19, 1, 'Santa Teresa', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(20, 1, 'Sucre', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(21, 1, '23 de enero', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(22, 1, 'San Pedro', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(23, 2, 'El Cafetal', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(24, 2, 'Las minas de Baruta', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(25, 2, 'Nuestra Señora del Rosario', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(26, 3, 'Chacao', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(27, 4, 'Petare', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(28, 4, 'Leoncio Martinez', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(29, 4, 'La Dolorita', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(30, 4, 'Caucaguita', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(31, 4, 'Filas de Mariche', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(32, 6, 'Araguita', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(33, 6, 'Arevalo Gonzalez', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(34, 6, 'Capaya', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(35, 6, 'Caucagua', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(36, 6, 'El Cafe', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(37, 6, 'Marizapa', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(38, 6, 'Panaquire', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(39, 6, 'Ribas', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(40, 7, 'Cumbo', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(41, 7, 'San Jose Barlovento', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(42, 8, 'Curiepe', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(43, 8, 'Higuerote', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(44, 8, 'Tacarigua', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(45, 9, 'Mamporal', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(46, 10, 'Carrizal', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(47, 11, 'Charallave', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(48, 11, 'Las Brisas', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(49, 12, 'Altagracia de la M', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(50, 12, 'Cecilio Acosta', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(51, 12, 'El Jarillo', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(52, 12, 'Los Teques', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(53, 12, 'Paracotos', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(54, 12, 'San Pedro', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(55, 12, 'Tacata', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(56, 13, 'El Cartanal', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(57, 13, 'Sta Teresa del Tuy', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(58, 14, 'La Democracia', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(59, 14, 'Ocumare del Tuy', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(60, 14, 'Santa Barbara', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(61, 15, 'San Antonio de los altos', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(62, 16, 'El Guapo', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(63, 16, 'Paparo', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(64, 16, 'Tacarigua de la laguna', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(65, 16, 'Rio Chico', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(66, 16, 'San Fernardo del Guapo', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(67, 17, 'Santa Lucia', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(68, 18, 'Cupira', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(69, 18, 'Machurucuto', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(70, 19, 'Guarenas', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(71, 20, 'San Francisco de Yare', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(72, 20, 'San Antonio de Yare', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(73, 21, 'Cua', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(74, 21, 'Nueva Cua', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(75, 22, 'Bolivar', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(76, 22, 'Guatire', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(77, 23, 'Caraballeda', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(78, 23, 'Carayaca', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(79, 23, 'Carlos Soublette', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(80, 23, 'Caruao', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(81, 23, 'Catia la mar', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(82, 23, 'El Junko', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(83, 23, 'La Guaira', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(84, 23, 'Macuto', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(85, 23, 'Maiquetia', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(86, 23, 'Naiguata', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(87, 23, 'Urimare', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(88, 24, 'Camaguan', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(89, 24, 'Puerto Miranda', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(90, 24, 'Uverito', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(91, 25, 'Chaguaramas', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(92, 26, 'El Socorro', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(93, 27, 'Calabozo', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(94, 27, 'El Calvario', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(95, 27, 'El rastro', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(96, 27, 'Guardatinajas', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(97, 28, 'San Rafael de Laya', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(98, 28, 'Tucupido', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(99, 29, 'Altagracia de Orituco', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(100, 29, 'Lezama', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(101, 29, 'Libertad de Orituco', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(102, 29, 'Paso real de Macaira', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(103, 29, 'San Fco de Macaira', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(104, 29, 'San Rafael de Orituco', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(105, 29, 'Soublette', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(106, 30, 'Cantagallo', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(107, 30, 'Parapara', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(108, 30, 'San Juan de los Morros', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(109, 31, 'El Sombrero', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(110, 31, 'Sosa', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(111, 32, 'Cabruta', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(112, 32, 'Las Mercedes', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(113, 32, 'Santa Rita de Manapire', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(114, 33, 'Espino', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(115, 33, 'Valle de la Pascua', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(116, 34, 'Ortiz', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(117, 34, 'Sn Fco de Tiznados', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(118, 34, 'San Jose de Tiznados', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(119, 34, 'Sn Lorenzo de tiznados', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(120, 35, 'San Jose de Unare', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(121, 35, 'Zaraza', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(122, 36, 'Cazorla', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(123, 36, 'Guayabal', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(124, 37, 'San Jose de Guaribe', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(125, 38, 'Altamira', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(126, 38, 'Santa Maria de Ipire', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(127, 39, 'San Mateo', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(128, 41, 'Carmen de Cura', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(129, 41, 'Camatagua', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(130, 42, 'Santa Rita', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(131, 42, 'Francisco de Miranda', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(132, 42, 'Mons Feliciano', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(133, 43, 'Andres Eloy Blanco', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(134, 43, 'Choroni', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(135, 43, 'Joaquin Crespo', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(136, 43, 'Jose Casanova Godoy', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(137, 43, 'Las Delicias', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(138, 43, 'Los Tacariguas', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(139, 43, 'Madre Ma de San Jose', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(140, 43, 'Pedro Jose Ovalies', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(141, 44, 'Santa Cruz', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(142, 45, 'Castor Nieves Rios', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(143, 45, 'La Victoria', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(144, 45, 'Las Guacamayas', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(145, 45, 'Pao de Zarate', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(146, 45, 'Zuata', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(147, 46, 'El Consejo', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(148, 47, 'Palo Negro', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(149, 47, 'Martin de Porres', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(150, 48, 'Ca de Azucar', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(151, 48, 'El Limon', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(152, 49, 'Ocumare de la costa', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(153, 50, 'San Casimiro', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(154, 50, 'Guiripa', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(155, 50, 'Ollas de Caramacate', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(156, 50, 'Valle Morin', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(157, 51, 'San Sebastian', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(158, 52, 'Alfredo Pacheco', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(159, 52, 'Arevalo Aponte', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(160, 52, 'Chuao', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(161, 52, 'Turumero', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(162, 52, 'Saman de Guere', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(163, 53, 'Las Tejerias', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(164, 53, 'Tiara', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(165, 54, 'Bella Vista', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(166, 54, 'Cagua', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(167, 55, 'Colonia Tovar', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(168, 56, 'Barbacoas', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(169, 56, 'Las Peñitas', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(170, 56, 'San Francisco de Cara', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(171, 56, 'Taguay', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(172, 57, 'Augusto Mijares', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(173, 57, 'Villa de cura', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(174, 57, 'Magdaleno', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(175, 57, 'Sam Francisco de Asis', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(176, 57, 'Valles de Tucutunemo', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(177, 58, 'Bejuma', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(178, 58, 'Canoabo', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(179, 58, 'Simon Bolivar', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(180, 59, 'Belen', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(181, 59, 'Guigue', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(182, 59, 'Tacarigua', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(183, 60, 'Agua Caliente', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(184, 60, 'Mariara', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(185, 61, 'Ciudad Alianza', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(186, 61, 'Guacara', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(187, 61, 'Yagua', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(188, 62, 'Moron', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(189, 62, 'Urama', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(190, 63, 'Independencia', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(191, 63, 'Tocuyito', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(192, 64, 'Los Guayos', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(193, 65, 'Miranda', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(194, 66, 'Montalban', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(195, 67, 'Naguanagua', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(196, 68, 'Bartolome Salom', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(197, 68, 'Borburata', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(198, 68, 'Democracia', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(199, 68, 'Fraternidad', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(200, 68, 'Goaigoaza', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(201, 68, 'Juan Jose Flores', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(202, 68, 'Patanemo', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(203, 68, 'Union', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(204, 69, 'San Diego', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(205, 70, 'San Joaquin', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(206, 71, 'Candelaria', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(207, 71, 'Catedral', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(208, 71, 'El Socorro', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(209, 71, 'Miguel Peña', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(210, 71, 'Negro Primero', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(211, 71, 'Rafael Urdaneta', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(212, 71, 'San Bias', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(213, 71, 'San Jose', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(214, 71, 'Santa Rosa', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(215, 5, 'El Hatillo', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_autorizado`
--

CREATE TABLE IF NOT EXISTS `personal_autorizado` (
`cod_pa` int(10) unsigned NOT NULL,
  `nac` varchar(8) NOT NULL,
  `ced` varchar(8) NOT NULL,
  `pnom` varchar(20) NOT NULL,
  `snom` varchar(20) NOT NULL,
  `papelli` varchar(20) NOT NULL,
  `sapelli` varchar(20) NOT NULL,
  `cod_sex` tinyint(1) unsigned NOT NULL,
  `fec_nac` date DEFAULT NULL,
  `lug_nac` varchar(20) NOT NULL,
  `cel` varchar(11) NOT NULL,
  `tlf` varchar(11) NOT NULL,
  `cod_car` tinyint(2) unsigned NOT NULL,
  `email` varchar(50) NOT NULL,
  `cod_est` int(2) unsigned NOT NULL,
  `cod_mun` int(5) unsigned NOT NULL,
  `cod_parro` int(5) unsigned NOT NULL,
  `dir` varchar(50) NOT NULL,
  `cod_ne` tinyint(3) unsigned NOT NULL,
  `alias` varchar(15) NOT NULL,
  `pasw` varchar(10) NOT NULL,
  `cod_tpa` int(2) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_pa_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_pa_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `personal_autorizado`
--

INSERT INTO `personal_autorizado` (`cod_pa`, `nac`, `ced`, `pnom`, `snom`, `papelli`, `sapelli`, `cod_sex`, `fec_nac`, `lug_nac`, `cel`, `tlf`, `cod_car`, `email`, `cod_est`, `cod_mun`, `cod_parro`, `dir`, `cod_ne`, `alias`, `pasw`, `cod_tpa`, `status`, `cod_pa_reg`, `fec_reg`, `cod_pa_mod`, `fec_mod`) VALUES
(1, '20629459', 'Venezola', 'Erick', 'Rafael', 'Zerpa', 'Boada', 1, '1991-08-20', '1', '04123797349', '02124437156', 1, 'zerpa_boada@hotmail.com', 1, 1, 12, 'La Vega Calle Zulia Sector Ali Primera Casa NÂ°1', 5, 'admin', 'admin', 1, 1, 0, '2014-10-20 19:01:29', 0, '2014-10-20 19:01:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE IF NOT EXISTS `profesor` (
`cod_prof` mediumint(3) NOT NULL,
  `ced_prof` int(8) NOT NULL,
  `nac` varchar(15) NOT NULL,
  `pnom` varchar(15) NOT NULL,
  `snom` varchar(20) DEFAULT NULL,
  `papelli` varchar(30) NOT NULL,
  `sapelli` varchar(30) DEFAULT NULL,
  `cod_sex` tinyint(1) unsigned NOT NULL,
  `fec_nac` date NOT NULL,
  `lug_nac` int(1) unsigned NOT NULL,
  `cel` int(11) NOT NULL,
  `tlf` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cod_est` int(2) unsigned NOT NULL,
  `cod_mun` int(5) unsigned NOT NULL,
  `cod_parro` int(5) unsigned NOT NULL,
  `dir` varchar(100) NOT NULL,
  `cod_ne` tinyint(3) unsigned NOT NULL,
  `tit` varchar(80) NOT NULL,
  `uni` varchar(80) NOT NULL,
  `cod_cur` tinyint(3) unsigned NOT NULL,
  `cod_sta` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_pa_reg` int(11) DEFAULT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_pa_mod` int(11) DEFAULT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE IF NOT EXISTS `seccion` (
`cod_sec` tinyint(3) unsigned NOT NULL,
  `des_sec` varchar(15) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_pa_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_pa_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`cod_sec`, `des_sec`, `status`, `cod_pa_reg`, `fec_reg`, `cod_pa_mod`, `fec_mod`) VALUES
(1, '"A"', 1, 1, '2014-10-09 14:58:23', 1, '2014-10-09 14:58:23'),
(2, '"B"', 1, 1, '2014-10-09 14:58:23', 1, '2014-10-09 14:58:23'),
(3, '"C"', 1, 1, '2014-10-09 14:58:23', 1, '2014-10-09 14:58:23'),
(4, '"D"', 1, 1, '2014-10-09 14:58:23', 1, '2014-10-09 14:58:23'),
(5, '"E"', 1, 1, '2014-10-09 14:58:23', 1, '2014-10-09 14:58:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE IF NOT EXISTS `sexo` (
  `cod_sex` tinyint(1) unsigned NOT NULL,
  `des_sex` varchar(10) NOT NULL,
  `cod_pa_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_pa_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`cod_sex`, `des_sex`, `cod_pa_reg`, `fec_reg`, `cod_pa_mod`, `fec_mod`) VALUES
(1, 'Masculino', 1, '2014-09-17 15:48:02', 1, '2014-09-17 15:48:02'),
(2, 'Femenino', 1, '2014-09-17 15:48:02', 1, '2014-09-17 15:48:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `cod_sta` tinyint(1) unsigned NOT NULL,
  `des_sta` varchar(10) NOT NULL,
  `cod_pa_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_pa_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`cod_sta`, `des_sta`, `cod_pa_reg`, `fec_reg`, `cod_pa_mod`, `fec_mod`) VALUES
(1, 'Activo', 1, '2014-10-01 20:06:39', 1, '2014-10-01 20:06:39'),
(2, 'Inactivo', 1, '2014-10-01 20:06:39', 1, '2014-10-01 20:06:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pa`
--

CREATE TABLE IF NOT EXISTS `tipo_pa` (
`cod_tpa` int(2) NOT NULL,
  `des_pa` varchar(20) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `cod_pa_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_pa_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tipo_pa`
--

INSERT INTO `tipo_pa` (`cod_tpa`, `des_pa`, `pass`, `cod_pa_reg`, `fec_reg`, `cod_pa_mod`, `fec_mod`) VALUES
(1, 'Admin', '', 1, '2014-10-20 17:53:56', 1, '2014-10-20 17:53:56'),
(3, 'Administrador', 'e10adc3949ba59abbe56e057f20f883e', 0, '2014-10-25 17:37:28', 0, '2014-10-25 17:37:28');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
 ADD PRIMARY KEY (`cod_alu`,`ced`), ADD KEY `cod_repre` (`cod_repre`), ADD KEY `cod_sex` (`cod_sex`), ADD KEY `cod_est` (`cod_est`), ADD KEY `cod_mun` (`cod_mun`), ADD KEY `cod_parro` (`cod_parro`), ADD KEY `cod_cur` (`cod_cur`), ADD KEY `status` (`status`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
 ADD PRIMARY KEY (`cod_car`), ADD KEY `status` (`status`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
 ADD PRIMARY KEY (`cod_cur`), ADD KEY `cod_sec` (`cod_sec`), ADD KEY `cod_gra` (`cod_gra`), ADD KEY `status` (`status`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
 ADD PRIMARY KEY (`cod_est`), ADD KEY `status` (`status`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
 ADD PRIMARY KEY (`cod_gra`), ADD KEY `status` (`status`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
 ADD PRIMARY KEY (`cod_mun`), ADD KEY `cod_edo` (`cod_est`), ADD KEY `status` (`status`);

--
-- Indices de la tabla `nivel_educativo`
--
ALTER TABLE `nivel_educativo`
 ADD PRIMARY KEY (`cod_ne`), ADD KEY `status` (`status`);

--
-- Indices de la tabla `padres_representante`
--
ALTER TABLE `padres_representante`
 ADD PRIMARY KEY (`cod_repre`), ADD UNIQUE KEY `ced_repre` (`ced_repre`), ADD KEY `paren` (`paren`), ADD KEY `cod_est` (`cod_est`), ADD KEY `cod_parro` (`cod_parro`), ADD KEY `cod_mun` (`cod_mun`), ADD KEY `cod_ne` (`cod_ne`), ADD KEY `status` (`status`), ADD KEY `cod_sex` (`cod_sex`);

--
-- Indices de la tabla `parentesco`
--
ALTER TABLE `parentesco`
 ADD PRIMARY KEY (`cod_par`);

--
-- Indices de la tabla `parroquia`
--
ALTER TABLE `parroquia`
 ADD PRIMARY KEY (`cod_parro`), ADD KEY `cod_mun` (`cod_mun`), ADD KEY `status` (`status`);

--
-- Indices de la tabla `personal_autorizado`
--
ALTER TABLE `personal_autorizado`
 ADD PRIMARY KEY (`cod_pa`,`ced`), ADD UNIQUE KEY `alias` (`alias`), ADD UNIQUE KEY `pasw` (`pasw`), ADD KEY `cod_sex` (`cod_sex`), ADD KEY `cod_car` (`cod_car`), ADD KEY `cod_est` (`cod_est`), ADD KEY `cod_mun` (`cod_mun`), ADD KEY `cod_parro` (`cod_parro`), ADD KEY `cod_ne` (`cod_ne`), ADD KEY `cod_tpa` (`cod_tpa`), ADD KEY `status` (`status`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
 ADD PRIMARY KEY (`cod_prof`,`ced_prof`), ADD UNIQUE KEY `ced_prof` (`ced_prof`), ADD KEY `cod_sta` (`cod_sta`), ADD KEY `cod_sex` (`cod_sex`), ADD KEY `lug_nac` (`lug_nac`), ADD KEY `cod_est` (`cod_est`), ADD KEY `cod_mun` (`cod_mun`), ADD KEY `cod_parro` (`cod_parro`), ADD KEY `cod_cur` (`cod_cur`), ADD KEY `cod_ne` (`cod_ne`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
 ADD PRIMARY KEY (`cod_sec`), ADD KEY `status` (`status`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
 ADD PRIMARY KEY (`cod_sex`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
 ADD PRIMARY KEY (`cod_sta`);

--
-- Indices de la tabla `tipo_pa`
--
ALTER TABLE `tipo_pa`
 ADD PRIMARY KEY (`cod_tpa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
MODIFY `cod_alu` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
MODIFY `cod_car` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
MODIFY `cod_cur` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
MODIFY `cod_est` int(2) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
MODIFY `cod_gra` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
MODIFY `cod_mun` int(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT de la tabla `nivel_educativo`
--
ALTER TABLE `nivel_educativo`
MODIFY `cod_ne` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `padres_representante`
--
ALTER TABLE `padres_representante`
MODIFY `cod_repre` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `parroquia`
--
ALTER TABLE `parroquia`
MODIFY `cod_parro` int(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=216;
--
-- AUTO_INCREMENT de la tabla `personal_autorizado`
--
ALTER TABLE `personal_autorizado`
MODIFY `cod_pa` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
MODIFY `cod_prof` mediumint(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
MODIFY `cod_sec` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tipo_pa`
--
ALTER TABLE `tipo_pa`
MODIFY `cod_tpa` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`cod_repre`) REFERENCES `padres_representante` (`cod_repre`) ON UPDATE CASCADE,
ADD CONSTRAINT `alumno_ibfk_2` FOREIGN KEY (`cod_sex`) REFERENCES `sexo` (`cod_sex`) ON UPDATE CASCADE,
ADD CONSTRAINT `alumno_ibfk_3` FOREIGN KEY (`cod_est`) REFERENCES `estado` (`cod_est`) ON UPDATE CASCADE,
ADD CONSTRAINT `alumno_ibfk_4` FOREIGN KEY (`cod_mun`) REFERENCES `municipio` (`cod_mun`) ON UPDATE CASCADE,
ADD CONSTRAINT `alumno_ibfk_5` FOREIGN KEY (`cod_parro`) REFERENCES `parroquia` (`cod_parro`) ON UPDATE CASCADE,
ADD CONSTRAINT `alumno_ibfk_6` FOREIGN KEY (`cod_cur`) REFERENCES `cursos` (`cod_cur`) ON UPDATE CASCADE,
ADD CONSTRAINT `alumno_ibfk_7` FOREIGN KEY (`status`) REFERENCES `status` (`cod_sta`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cargo`
--
ALTER TABLE `cargo`
ADD CONSTRAINT `cargo_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status` (`cod_sta`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`cod_gra`) REFERENCES `grados` (`cod_gra`) ON UPDATE CASCADE,
ADD CONSTRAINT `cursos_ibfk_2` FOREIGN KEY (`cod_sec`) REFERENCES `seccion` (`cod_sec`) ON UPDATE CASCADE,
ADD CONSTRAINT `cursos_ibfk_3` FOREIGN KEY (`status`) REFERENCES `status` (`cod_sta`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `estado`
--
ALTER TABLE `estado`
ADD CONSTRAINT `estado_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status` (`cod_sta`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `grados`
--
ALTER TABLE `grados`
ADD CONSTRAINT `grados_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status` (`cod_sta`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`cod_est`) REFERENCES `estado` (`cod_est`) ON UPDATE CASCADE,
ADD CONSTRAINT `municipio_ibfk_2` FOREIGN KEY (`status`) REFERENCES `status` (`cod_sta`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `nivel_educativo`
--
ALTER TABLE `nivel_educativo`
ADD CONSTRAINT `nivel_educativo_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status` (`cod_sta`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `padres_representante`
--
ALTER TABLE `padres_representante`
ADD CONSTRAINT `padres_representante_ibfk_1` FOREIGN KEY (`paren`) REFERENCES `parentesco` (`cod_par`) ON UPDATE CASCADE,
ADD CONSTRAINT `padres_representante_ibfk_2` FOREIGN KEY (`cod_est`) REFERENCES `estado` (`cod_est`) ON UPDATE CASCADE,
ADD CONSTRAINT `padres_representante_ibfk_3` FOREIGN KEY (`cod_mun`) REFERENCES `municipio` (`cod_mun`) ON UPDATE CASCADE,
ADD CONSTRAINT `padres_representante_ibfk_4` FOREIGN KEY (`cod_parro`) REFERENCES `parroquia` (`cod_parro`) ON UPDATE CASCADE,
ADD CONSTRAINT `padres_representante_ibfk_5` FOREIGN KEY (`cod_ne`) REFERENCES `nivel_educativo` (`cod_ne`) ON UPDATE CASCADE,
ADD CONSTRAINT `padres_representante_ibfk_6` FOREIGN KEY (`status`) REFERENCES `status` (`cod_sta`) ON UPDATE CASCADE,
ADD CONSTRAINT `padres_representante_ibfk_7` FOREIGN KEY (`cod_sex`) REFERENCES `sexo` (`cod_sex`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `parroquia`
--
ALTER TABLE `parroquia`
ADD CONSTRAINT `parroquia_ibfk_1` FOREIGN KEY (`cod_mun`) REFERENCES `municipio` (`cod_mun`) ON UPDATE CASCADE,
ADD CONSTRAINT `parroquia_ibfk_2` FOREIGN KEY (`status`) REFERENCES `status` (`cod_sta`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `personal_autorizado`
--
ALTER TABLE `personal_autorizado`
ADD CONSTRAINT `personal_autorizado_ibfk_10` FOREIGN KEY (`cod_car`) REFERENCES `cargo` (`cod_car`) ON UPDATE CASCADE,
ADD CONSTRAINT `personal_autorizado_ibfk_2` FOREIGN KEY (`status`) REFERENCES `status` (`cod_sta`) ON UPDATE CASCADE,
ADD CONSTRAINT `personal_autorizado_ibfk_3` FOREIGN KEY (`cod_sex`) REFERENCES `sexo` (`cod_sex`) ON UPDATE CASCADE,
ADD CONSTRAINT `personal_autorizado_ibfk_5` FOREIGN KEY (`cod_est`) REFERENCES `estado` (`cod_est`) ON UPDATE CASCADE,
ADD CONSTRAINT `personal_autorizado_ibfk_6` FOREIGN KEY (`cod_mun`) REFERENCES `municipio` (`cod_mun`) ON UPDATE CASCADE,
ADD CONSTRAINT `personal_autorizado_ibfk_7` FOREIGN KEY (`cod_parro`) REFERENCES `parroquia` (`cod_parro`) ON UPDATE CASCADE,
ADD CONSTRAINT `personal_autorizado_ibfk_8` FOREIGN KEY (`cod_ne`) REFERENCES `nivel_educativo` (`cod_ne`) ON UPDATE CASCADE,
ADD CONSTRAINT `personal_autorizado_ibfk_9` FOREIGN KEY (`cod_tpa`) REFERENCES `tipo_pa` (`cod_tpa`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `profesor`
--
ALTER TABLE `profesor`
ADD CONSTRAINT `profesor_ibfk_1` FOREIGN KEY (`cod_sex`) REFERENCES `sexo` (`cod_sex`) ON UPDATE CASCADE,
ADD CONSTRAINT `profesor_ibfk_2` FOREIGN KEY (`lug_nac`) REFERENCES `estado` (`cod_est`) ON UPDATE CASCADE,
ADD CONSTRAINT `profesor_ibfk_3` FOREIGN KEY (`cod_est`) REFERENCES `estado` (`cod_est`) ON UPDATE CASCADE,
ADD CONSTRAINT `profesor_ibfk_4` FOREIGN KEY (`cod_mun`) REFERENCES `municipio` (`cod_mun`) ON UPDATE CASCADE,
ADD CONSTRAINT `profesor_ibfk_5` FOREIGN KEY (`cod_parro`) REFERENCES `parroquia` (`cod_parro`) ON UPDATE CASCADE,
ADD CONSTRAINT `profesor_ibfk_6` FOREIGN KEY (`cod_ne`) REFERENCES `nivel_educativo` (`cod_ne`) ON UPDATE CASCADE,
ADD CONSTRAINT `profesor_ibfk_7` FOREIGN KEY (`cod_cur`) REFERENCES `cursos` (`cod_cur`) ON UPDATE CASCADE,
ADD CONSTRAINT `status` FOREIGN KEY (`cod_sta`) REFERENCES `status` (`cod_sta`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `seccion`
--
ALTER TABLE `seccion`
ADD CONSTRAINT `seccion_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status` (`cod_sta`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

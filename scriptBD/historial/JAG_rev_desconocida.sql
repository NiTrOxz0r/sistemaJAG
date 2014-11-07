-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 14, 2014 at 05:01 pm
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `JAG`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `apellidos` varchar(40) NOT NULL,
  `nombres` varchar(40) NOT NULL,
  `cod_representante` int(10) unsigned NOT NULL,
  `telefono` varchar(11) DEFAULT 'SinRegistro',
  `telefono_otro` varchar(11) DEFAULT 'SinRegistro',
  `lugar_nac` varchar(50) DEFAULT 'Sin Registro',
  `fec_nac` date DEFAULT NULL,
  `sexo` tinyint(1) unsigned NOT NULL,
  `acta_num_part_nac` int(10) unsigned zerofill NOT NULL,
  `acta_folio_num_part_nac` int(10) unsigned zerofill NOT NULL,
  `cedula` varchar(8) DEFAULT NULL,
  `cedula_escolar` varchar(10) DEFAULT NULL,
  `cod_direccion` int(10) unsigned DEFAULT NULL,
  `plantel_procedencia` varchar(50) DEFAULT NULL,
  `repitiente` enum('s','n') NOT NULL,
  `cod_curso` tinyint(3) unsigned DEFAULT NULL,
  `altura` tinyint(3) unsigned zerofill DEFAULT NULL,
  `peso` smallint(3) unsigned DEFAULT NULL,
  `camisa` tinyint(1) unsigned DEFAULT NULL,
  `pantalon` tinyint(1) unsigned DEFAULT NULL,
  `zapato` tinyint(2) unsigned zerofill DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `acta_num_part_nac` (`acta_num_part_nac`),
  UNIQUE KEY `acta_folio_num_part_nac` (`acta_folio_num_part_nac`),
  UNIQUE KEY `cedula` (`cedula`),
  UNIQUE KEY `cedula_escolar` (`cedula_escolar`),
  KEY `sexo` (`sexo`),
  KEY `camisa` (`camisa`),
  KEY `pantalon` (`pantalon`),
  KEY `cod_curso` (`cod_curso`),
  KEY `cod_representante` (`cod_representante`),
  KEY `cod_direccion` (`cod_direccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `asume`
--

CREATE TABLE IF NOT EXISTS `asume` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_profesor` int(10) unsigned NOT NULL,
  `cod_curso` tinyint(3) unsigned NOT NULL,
  `comentarios` varchar(200) DEFAULT 'Sin Comentarios',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  KEY `cod_profesor` (`cod_profesor`),
  KEY `cod_curso` (`cod_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `codigo` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `grado` tinyint(2) NOT NULL,
  `seccion` tinyint(2) NOT NULL,
  `cod_prof` int(10) unsigned DEFAULT NULL,
  `turno` enum('m','t') NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  KEY `cod_prof` (`cod_prof`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `direccion_alumno`
--

CREATE TABLE IF NOT EXISTS `direccion_alumno` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_parroquia` smallint(5) unsigned DEFAULT NULL,
  `direccion_exacta` varchar(150) DEFAULT 'Sin Registro, favor Actualizar',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  KEY `cod_parroquia` (`cod_parroquia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `direccion_p_a`
--

CREATE TABLE IF NOT EXISTS `direccion_p_a` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_parroquia` smallint(5) unsigned DEFAULT NULL,
  `direccion_exacta` varchar(150) DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `direccion_exacta` (`direccion_exacta`),
  KEY `cod_parroquia` (`cod_parroquia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `direccion_p_a`
--

INSERT INTO `direccion_p_a` (`codigo`, `cod_parroquia`, `direccion_exacta`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(26, 220, 'asdadddddddd', 1, 1, '2014-10-12 19:54:48', 1, '2014-10-12 19:54:48'),
(27, 98, 'asdasd 999999', 1, 1, '2014-10-13 14:31:40', 1, '2014-10-13 14:31:40'),
(29, 151, '1f1f1f1f1f', 1, 1, '2014-10-13 16:25:49', 1, '2014-10-13 16:25:49'),
(30, 223, 'av tal edf tal apto tal', 1, 1, '2014-10-14 14:35:35', 1, '2014-10-14 14:35:35');

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `codigo` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`codigo`, `descripcion`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(1, 'Distrito Capital', 1, 1, '2014-08-27 13:17:02', 1, '2014-08-27 13:17:02'),
(2, 'Anzoátegui', 1, 1, '2014-08-27 13:17:02', 1, '2014-08-27 13:17:02'),
(3, 'Amazonas', 1, 1, '2014-08-27 13:17:02', 1, '2014-08-27 13:17:02'),
(4, 'Apure', 1, 1, '2014-08-27 13:17:02', 1, '2014-08-27 13:17:02'),
(5, 'Aragua', 1, 1, '2014-08-27 13:17:02', 1, '2014-08-27 13:17:02'),
(6, 'Barinas', 1, 1, '2014-08-27 13:17:02', 1, '2014-08-27 13:17:02'),
(7, 'Bolívar', 1, 1, '2014-08-27 13:17:02', 1, '2014-08-27 13:17:02'),
(8, 'Carabobo', 1, 1, '2014-08-27 13:17:02', 1, '2014-08-27 13:17:02'),
(9, 'Cojedes', 1, 1, '2014-08-27 13:17:02', 1, '2014-08-27 13:17:02'),
(10, 'Delta Amacuro', 1, 1, '2014-08-27 13:17:02', 1, '2014-08-27 13:17:02'),
(11, 'Falcón', 1, 1, '2014-08-27 13:17:02', 1, '2014-08-27 13:17:02'),
(12, 'Guárico', 1, 1, '2014-08-27 13:17:02', 1, '2014-08-27 13:17:02'),
(13, 'Lara', 1, 1, '2014-08-27 13:17:02', 1, '2014-08-27 13:17:02'),
(14, 'Mérida', 1, 1, '2014-08-27 13:17:02', 1, '2014-08-27 13:17:02'),
(15, 'Miranda', 1, 1, '2014-08-27 13:17:02', 1, '2014-08-27 13:17:02'),
(16, 'Monagas', 1, 1, '2014-08-27 13:17:02', 1, '2014-08-27 13:17:02'),
(17, 'Nueva Esparta', 1, 1, '2014-08-27 13:17:02', 1, '2014-08-27 13:17:02'),
(18, 'Portuguesa', 1, 1, '2014-08-27 13:17:02', 1, '2014-08-27 13:17:02'),
(19, 'Sucre', 1, 1, '2014-08-27 13:17:02', 1, '2014-08-27 13:17:02'),
(20, 'Táchira', 1, 1, '2014-08-27 13:17:02', 1, '2014-08-27 13:17:02'),
(21, 'Trujillo', 1, 1, '2014-08-27 13:17:02', 1, '2014-08-27 13:17:02'),
(22, 'Yaracuy', 1, 1, '2014-08-27 13:17:02', 1, '2014-08-27 13:17:02'),
(23, 'Vargas', 1, 1, '2014-08-27 13:17:02', 1, '2014-08-27 13:17:02'),
(24, 'Zulia', 1, 1, '2014-08-27 13:17:02', 1, '2014-08-27 13:17:02');

-- --------------------------------------------------------

--
-- Table structure for table `municipio`
--

CREATE TABLE IF NOT EXISTS `municipio` (
  `codigo` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cod_edo` tinyint(2) unsigned DEFAULT NULL,
  `descripcion` varchar(100) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  KEY `cod_edo` (`cod_edo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=90 ;

--
-- Dumping data for table `municipio`
--

INSERT INTO `municipio` (`codigo`, `cod_edo`, `descripcion`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(1, 1, 'Libertador', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(2, 1, 'Baruta', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(3, 1, 'Chacao', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(4, 1, 'Sucre', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(5, 1, 'El Hatillo', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
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
(52, 5, 'Santiago Marino', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
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
(71, 8, 'Valencia', 1, 1, '2014-08-27 13:17:14', 1, '2014-08-27 13:17:14'),
(72, 2, 'Anzoategui', 1, 1, '2014-10-10 16:30:17', 1, '2014-10-10 16:30:17'),
(73, 3, 'Amazonas', 1, 1, '2014-10-10 16:30:17', 1, '2014-10-10 16:30:17'),
(74, 4, 'Apure', 1, 1, '2014-10-10 16:30:17', 1, '2014-10-10 16:30:17'),
(75, 6, 'Barinas', 1, 1, '2014-10-10 16:30:17', 1, '2014-10-10 16:30:17'),
(76, 7, 'Bolivar', 1, 1, '2014-10-10 16:30:17', 1, '2014-10-10 16:30:17'),
(77, 9, 'Cojedes', 1, 1, '2014-10-10 16:30:17', 1, '2014-10-10 16:30:17'),
(78, 10, 'Delta Amacuro', 1, 1, '2014-10-10 16:30:17', 1, '2014-10-10 16:30:17'),
(79, 11, 'Falcon', 1, 1, '2014-10-10 16:30:17', 1, '2014-10-10 16:30:17'),
(80, 13, 'Lara', 1, 1, '2014-10-10 16:30:17', 1, '2014-10-10 16:30:17'),
(81, 14, 'Merida', 1, 1, '2014-10-10 16:30:17', 1, '2014-10-10 16:30:17'),
(82, 16, 'Monagas', 1, 1, '2014-10-10 16:30:17', 1, '2014-10-10 16:30:17'),
(83, 17, 'Nueva Esparta', 1, 1, '2014-10-10 16:30:17', 1, '2014-10-10 16:30:17'),
(84, 18, 'Portuguesa', 1, 1, '2014-10-10 16:30:17', 1, '2014-10-10 16:30:17'),
(85, 19, 'Sucre', 1, 1, '2014-10-10 16:30:17', 1, '2014-10-10 16:30:17'),
(86, 20, 'Tachira', 1, 1, '2014-10-10 16:30:17', 1, '2014-10-10 16:30:17'),
(87, 21, 'Trujillo', 1, 1, '2014-10-10 16:30:17', 1, '2014-10-10 16:30:17'),
(88, 22, 'Yaracuy', 1, 1, '2014-10-10 16:30:17', 1, '2014-10-10 16:30:17'),
(89, 24, 'Zulia', 1, 1, '2014-10-10 16:30:17', 1, '2014-10-10 16:30:17');

-- --------------------------------------------------------

--
-- Table structure for table `nivel_instruccion`
--

CREATE TABLE IF NOT EXISTS `nivel_instruccion` (
  `codigo` tinyint(1) unsigned NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nivel_instruccion`
--

INSERT INTO `nivel_instruccion` (`codigo`, `descripcion`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(0, 'N/S', 1, 1, '2014-08-27 13:57:25', 1, '2014-08-27 13:57:25'),
(1, 'Inicial', 1, 1, '2014-08-27 13:57:25', 1, '2014-08-27 13:57:25'),
(2, 'Primaria', 1, 1, '2014-08-27 13:57:25', 1, '2014-08-27 13:57:25'),
(3, 'Diversificada', 1, 1, '2014-08-27 13:57:25', 1, '2014-08-27 13:57:25'),
(4, 'Universitaria', 1, 1, '2014-08-27 13:57:25', 1, '2014-08-27 13:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `obtiene`
--

CREATE TABLE IF NOT EXISTS `obtiene` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_p_a` int(10) unsigned DEFAULT NULL,
  `cod_alu` int(10) unsigned DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  KEY `cod_alu` (`cod_alu`),
  KEY `cod_p_a` (`cod_p_a`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `parroquia`
--

CREATE TABLE IF NOT EXISTS `parroquia` (
  `codigo` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cod_mun` smallint(5) unsigned DEFAULT NULL,
  `descripcion` varchar(100) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  KEY `cod_mun` (`cod_mun`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=234 ;

--
-- Dumping data for table `parroquia`
--

INSERT INTO `parroquia` (`codigo`, `cod_mun`, `descripcion`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(1, 1, 'Altagracia', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(2, 1, 'Antimano', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(3, 1, 'Caricuao', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(4, 1, 'Catedral', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(5, 1, 'Coche', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(6, 1, 'El Junquito', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(7, 1, 'El Paraiso', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(8, 1, 'El Recreo', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(9, 1, 'El Valle', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(10, 1, 'La Candelaria', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(11, 1, 'La Pastora', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(12, 1, 'La Vega', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(13, 1, 'Macarao', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(14, 1, 'San Agustin', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(15, 1, 'San Bernardino', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(16, 1, 'San Jose', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(17, 1, 'San Juan', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(18, 1, 'Santa Rosalia', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(19, 1, 'Santa Teresa', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(20, 1, 'Sucre', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(21, 1, '23 de enero', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(22, 1, 'San Pedro', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(23, 2, 'El Cafetal', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(24, 2, 'Las minas de Baruta', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(25, 2, 'Nuestra Senora del Rosario', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
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
(169, 56, 'Las Penitas', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
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
(209, 71, 'Miguel Pena', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(210, 71, 'Negro Primero', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(211, 71, 'Rafael Urdaneta', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(212, 71, 'San Bias', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(213, 71, 'San Jose', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(214, 71, 'Santa Rosa', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(215, 5, 'El Hatillo', 1, 1, '2014-08-27 13:17:22', 1, '2014-08-27 13:17:22'),
(216, 72, 'Anzoategui', 1, 1, '2014-10-10 16:32:18', 1, '2014-10-10 16:32:18'),
(217, 73, 'Amazonas', 1, 1, '2014-10-10 16:32:18', 1, '2014-10-10 16:32:18'),
(218, 74, 'Apure', 1, 1, '2014-10-10 16:32:18', 1, '2014-10-10 16:32:18'),
(219, 75, 'Barinas', 1, 1, '2014-10-10 16:32:18', 1, '2014-10-10 16:32:18'),
(220, 76, 'Bolivar', 1, 1, '2014-10-10 16:32:18', 1, '2014-10-10 16:32:18'),
(221, 77, 'Cojedes', 1, 1, '2014-10-10 16:32:18', 1, '2014-10-10 16:32:18'),
(222, 78, 'Delta Amacuro', 1, 1, '2014-10-10 16:32:18', 1, '2014-10-10 16:32:18'),
(223, 79, 'Falcon', 1, 1, '2014-10-10 16:32:18', 1, '2014-10-10 16:32:18'),
(224, 80, 'Lara', 1, 1, '2014-10-10 16:32:18', 1, '2014-10-10 16:32:18'),
(225, 81, 'Merida', 1, 1, '2014-10-10 16:32:18', 1, '2014-10-10 16:32:18'),
(226, 82, 'Monagas', 1, 1, '2014-10-10 16:32:18', 1, '2014-10-10 16:32:18'),
(227, 83, 'Nueva Esparta', 1, 1, '2014-10-10 16:32:18', 1, '2014-10-10 16:32:18'),
(228, 84, 'Portuguesa', 1, 1, '2014-10-10 16:32:18', 1, '2014-10-10 16:32:18'),
(229, 85, 'Sucre', 1, 1, '2014-10-10 16:32:18', 1, '2014-10-10 16:32:18'),
(230, 86, 'Tachira', 1, 1, '2014-10-10 16:32:18', 1, '2014-10-10 16:32:18'),
(231, 87, 'Trujillo', 1, 1, '2014-10-10 16:32:18', 1, '2014-10-10 16:32:18'),
(232, 88, 'Yaracuy', 1, 1, '2014-10-10 16:32:18', 1, '2014-10-10 16:32:18'),
(233, 89, 'Zulia', 1, 1, '2014-10-10 16:32:18', 1, '2014-10-10 16:32:18');

-- --------------------------------------------------------

--
-- Table structure for table `personal_autorizado`
--

CREATE TABLE IF NOT EXISTS `personal_autorizado` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `apellidos` varchar(40) NOT NULL,
  `nombres` varchar(40) NOT NULL,
  `cedula` varchar(8) NOT NULL,
  `telefono` varchar(11) DEFAULT 'SinRegistro',
  `email` varchar(50) DEFAULT 'Sin Registro',
  `lugar_nac` varchar(50) DEFAULT 'Sin Registro',
  `fec_nac` date DEFAULT NULL,
  `relacion` tinyint(3) unsigned NOT NULL,
  `vive_con_alumno` enum('s','n') NOT NULL,
  `cod_direccion` int(10) unsigned DEFAULT NULL,
  `nivel_instruccion` tinyint(1) unsigned NOT NULL,
  `profesion` varchar(40) DEFAULT 'Sin Registro',
  `telefono_trabajo` varchar(11) DEFAULT 'SinRegistro',
  `direccion_trabajo` varchar(150) DEFAULT 'Sin registro',
  `lugar_trabajo` varchar(50) DEFAULT 'Sin registro',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `cedula` (`cedula`),
  KEY `relacion` (`relacion`),
  KEY `nivel_instruccion` (`nivel_instruccion`),
  KEY `cod_direccion` (`cod_direccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `personal_autorizado`
--

INSERT INTO `personal_autorizado` (`codigo`, `apellidos`, `nombres`, `cedula`, `telefono`, `email`, `lugar_nac`, `fec_nac`, `relacion`, `vive_con_alumno`, `cod_direccion`, `nivel_instruccion`, `profesion`, `telefono_trabajo`, `direccion_trabajo`, `lugar_trabajo`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(3, 'asdasdasd', 'asdasdasd', '77777777', '22222222222', 'aasdasd', 'asdasdasd', '2014-01-01', 1, 's', 26, 1, 'asdasd', '22222222222', 'asdasd', 'asdasdasd', 1, 1, '2014-10-12 19:54:48', 1, '2014-10-12 19:54:48'),
(4, 'chavez', 'hugo', '99999999', '99999999999', 'adasddasdasd', 'en la mierda', '0000-00-00', 3, 'n', 27, 3, 'joder', '88888888888', 'miraflores', 'chavismo', 1, 1, '2014-10-13 14:31:41', 1, '2014-10-13 14:31:41'),
(5, 'ocho', 'nombre', '88888888', '88888888888', 'gqgqgqgg', 'ochol', '0000-00-00', 5, 'n', 29, 2, 'asdasd', '11111111111', 'asdasd', '1asdasd', 1, 1, '2014-10-13 16:25:49', 1, '2014-10-13 16:25:49'),
(6, 'gustavo paz', 'alexis', '44444444', '78945645646', 'asdasdasd@asdad', 'caracas', '0000-00-00', 5, 'n', 30, 3, 'asdasd', '96666666666', 'asdasd', 'asdasd', 1, 1, '2014-10-14 14:35:35', 1, '2014-10-14 14:35:35');

-- --------------------------------------------------------

--
-- Table structure for table `personal_autorizado_historial`
--

CREATE TABLE IF NOT EXISTS `personal_autorizado_historial` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `apellidos` varchar(40) NOT NULL,
  `nombres` varchar(40) NOT NULL,
  `cedula` varchar(8) NOT NULL,
  `telefono` varchar(11) DEFAULT 'SinRegistro',
  `email` varchar(50) DEFAULT 'Sin Registro',
  `lugar_nac` varchar(50) DEFAULT 'Sin Registro',
  `fec_nac` date DEFAULT NULL,
  `relacion` tinyint(3) unsigned NOT NULL,
  `vive_con_alumno` enum('s','n') NOT NULL,
  `cod_direccion` int(10) unsigned DEFAULT NULL,
  `nivel_instruccion` tinyint(1) unsigned NOT NULL,
  `profesion` varchar(40) DEFAULT 'Sin Registro',
  `telefono_trabajo` varchar(11) DEFAULT 'SinRegistro',
  `direccion_trabajo` varchar(150) DEFAULT 'Sin registro',
  `lugar_trabajo` varchar(50) DEFAULT 'Sin registro',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `cedula` (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `profesor`
--

CREATE TABLE IF NOT EXISTS `profesor` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_usr` int(10) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  KEY `cod_usr` (`cod_usr`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `profesor`
--

INSERT INTO `profesor` (`codigo`, `cod_usr`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(1, 1, 1, 1, '2014-10-09 11:33:10', 1, '2014-10-09 11:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `relacion`
--

CREATE TABLE IF NOT EXISTS `relacion` (
  `codigo` tinyint(3) unsigned NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relacion`
--

INSERT INTO `relacion` (`codigo`, `descripcion`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(1, 'Madre', 1, 1, '2014-08-27 13:56:54', 1, '2014-08-27 13:56:54'),
(2, 'Padre', 1, 1, '2014-08-27 13:56:54', 1, '2014-08-27 13:56:54'),
(3, 'Tio(a)', 1, 1, '2014-08-27 13:56:54', 1, '2014-08-27 13:56:54'),
(4, 'Abuelo(a)', 1, 1, '2014-08-27 13:56:54', 1, '2014-08-27 13:56:54'),
(5, 'Hermano(a)', 1, 1, '2014-08-27 13:56:54', 1, '2014-08-27 13:56:54'),
(6, 'Primo(a)', 1, 1, '2014-08-27 13:56:54', 1, '2014-08-27 13:56:54'),
(7, 'Otro', 1, 1, '2014-08-27 13:56:54', 1, '2014-08-27 13:56:54');

-- --------------------------------------------------------

--
-- Table structure for table `sexo`
--

CREATE TABLE IF NOT EXISTS `sexo` (
  `codigo` tinyint(1) unsigned NOT NULL,
  `descripcion` varchar(10) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sexo`
--

INSERT INTO `sexo` (`codigo`, `descripcion`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(0, 'Masculino', 1, 1, '2014-08-27 13:18:26', 1, '2014-08-27 13:18:26'),
(1, 'Femenino', 1, 1, '2014-08-27 13:18:26', 1, '2014-08-27 13:18:26');

-- --------------------------------------------------------

--
-- Table structure for table `suplente`
--

CREATE TABLE IF NOT EXISTS `suplente` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_profesor` int(10) unsigned NOT NULL,
  `cod_suplente` int(10) unsigned NOT NULL,
  `comentarios` varchar(200) DEFAULT 'Sin Comentarios',
  `desde` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hasta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  KEY `cod_profesor` (`cod_profesor`),
  KEY `cod_suplente` (`cod_suplente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `talla`
--

CREATE TABLE IF NOT EXISTS `talla` (
  `codigo` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(3) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `talla`
--

INSERT INTO `talla` (`codigo`, `descripcion`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(1, 'XS', 1, 1, '2014-08-27 13:18:38', 1, '2014-08-27 13:18:38'),
(2, 'S', 1, 1, '2014-08-27 13:18:38', 1, '2014-08-27 13:18:38'),
(3, 'M', 1, 1, '2014-08-27 13:18:38', 1, '2014-08-27 13:18:38'),
(4, 'L', 1, 1, '2014-08-27 13:18:38', 1, '2014-08-27 13:18:38'),
(5, 'XL', 1, 1, '2014-08-27 13:18:38', 1, '2014-08-27 13:18:38'),
(6, 'XXL', 1, 1, '2014-08-27 13:18:38', 1, '2014-08-27 13:18:38');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `codigo` tinyint(1) unsigned NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`codigo`, `descripcion`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(0, 'Dectivado', 1, 1, '2014-08-27 13:40:17', 1, '2014-08-27 13:40:17'),
(1, 'Usuario', 1, 1, '2014-08-27 13:40:17', 1, '2014-08-27 13:40:17'),
(2, 'Usuario Privilegiado', 1, 1, '2014-08-27 13:40:17', 1, '2014-08-27 13:40:17'),
(3, 'Administrador', 1, 1, '2014-08-27 13:40:17', 1, '2014-08-27 13:40:17'),
(4, 'Super Usuario', 1, 1, '2014-08-27 13:40:17', 1, '2014-08-27 13:40:17'),
(255, 'slayerfat', 1, 1, '2014-08-27 13:40:17', 1, '2014-08-27 13:40:17');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `telefono` varchar(11) DEFAULT 'SinRegistro',
  `email` varchar(50) DEFAULT NULL,
  `seudonimo` varchar(20) NOT NULL,
  `clave` varchar(20) NOT NULL,
  `cod_tipo_usr` tinyint(1) unsigned DEFAULT '1',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `seudonimo` (`seudonimo`),
  UNIQUE KEY `email` (`email`),
  KEY `cod_tipo_usr` (`cod_tipo_usr`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`codigo`, `nombre`, `apellido`, `telefono`, `email`, `seudonimo`, `clave`, `cod_tipo_usr`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(1, 'Keanu', 'Reeves', 'SinRegistro', 'CANTV@ESUNA.MIERDA', 'neo', 'matrix', 4, 1, 1, '2014-08-27 13:41:23', 1, '2014-08-27 13:41:23');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`sexo`) REFERENCES `sexo` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_ibfk_2` FOREIGN KEY (`camisa`) REFERENCES `talla` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_ibfk_3` FOREIGN KEY (`pantalon`) REFERENCES `talla` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_ibfk_4` FOREIGN KEY (`cod_curso`) REFERENCES `curso` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_ibfk_5` FOREIGN KEY (`cod_representante`) REFERENCES `personal_autorizado` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_ibfk_6` FOREIGN KEY (`cod_direccion`) REFERENCES `direccion_alumno` (`codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `asume`
--
ALTER TABLE `asume`
  ADD CONSTRAINT `asume_ibfk_1` FOREIGN KEY (`cod_profesor`) REFERENCES `profesor` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `asume_ibfk_2` FOREIGN KEY (`cod_curso`) REFERENCES `curso` (`codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`cod_prof`) REFERENCES `profesor` (`codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `direccion_alumno`
--
ALTER TABLE `direccion_alumno`
  ADD CONSTRAINT `direccion_alumno_ibfk_1` FOREIGN KEY (`cod_parroquia`) REFERENCES `parroquia` (`codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `direccion_p_a`
--
ALTER TABLE `direccion_p_a`
  ADD CONSTRAINT `direccion_p_a_ibfk_1` FOREIGN KEY (`cod_parroquia`) REFERENCES `parroquia` (`codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`cod_edo`) REFERENCES `estado` (`codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `obtiene`
--
ALTER TABLE `obtiene`
  ADD CONSTRAINT `obtiene_ibfk_1` FOREIGN KEY (`cod_alu`) REFERENCES `alumno` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `obtiene_ibfk_2` FOREIGN KEY (`cod_p_a`) REFERENCES `personal_autorizado` (`codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `parroquia`
--
ALTER TABLE `parroquia`
  ADD CONSTRAINT `parroquia_ibfk_1` FOREIGN KEY (`cod_mun`) REFERENCES `municipio` (`codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `personal_autorizado`
--
ALTER TABLE `personal_autorizado`
  ADD CONSTRAINT `personal_autorizado_ibfk_1` FOREIGN KEY (`relacion`) REFERENCES `relacion` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_autorizado_ibfk_2` FOREIGN KEY (`nivel_instruccion`) REFERENCES `nivel_instruccion` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_autorizado_ibfk_3` FOREIGN KEY (`cod_direccion`) REFERENCES `direccion_p_a` (`codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `profesor_ibfk_1` FOREIGN KEY (`cod_usr`) REFERENCES `usuario` (`codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `suplente`
--
ALTER TABLE `suplente`
  ADD CONSTRAINT `suplente_ibfk_1` FOREIGN KEY (`cod_profesor`) REFERENCES `profesor` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `suplente_ibfk_2` FOREIGN KEY (`cod_suplente`) REFERENCES `profesor` (`codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`cod_tipo_usr`) REFERENCES `tipo_usuario` (`codigo`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

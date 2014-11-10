-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 02, 2014 at 03:15 am
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `JAG_modificado_noviembre`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrativo`
--

CREATE TABLE IF NOT EXISTS `administrativo` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_usr` int(10) unsigned NOT NULL,
  `cod_cargo` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `p_nombre` varchar(20) NOT NULL,
  `s_nombre` varchar(20) DEFAULT 'Sin Registro',
  `p_apellido` varchar(20) NOT NULL,
  `s_apellido` varchar(20) DEFAULT 'Sin Registro',
  `sexo` tinyint(1) unsigned NOT NULL,
  `fec_nac` date NOT NULL,
  `nacionalidad` enum('v','e') DEFAULT 'v',
  `cedula` varchar(8) DEFAULT 'sinDatos',
  `telefono` varchar(11) DEFAULT 'SinRegistro',
  `email` varchar(50) DEFAULT NULL,
  `cod_direccion` int(10) unsigned DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `email` (`email`),
  KEY `cod_usr` (`cod_usr`),
  KEY `cod_cargo` (`cod_cargo`),
  KEY `sexo` (`sexo`),
  KEY `cod_direccion` (`cod_direccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `p_apellido` varchar(40) NOT NULL,
  `s_apellido` varchar(40) DEFAULT 'Sin Registro',
  `p_nombre` varchar(40) NOT NULL,
  `s_nombre` varchar(40) DEFAULT 'Sin Registro',
  `cod_representante` int(10) unsigned NOT NULL,
  `cod_persona_retira` int(10) unsigned DEFAULT NULL,
  `telefono` varchar(11) DEFAULT 'SinRegistro',
  `telefono_otro` varchar(11) DEFAULT 'SinRegistro',
  `lugar_nac` varchar(50) DEFAULT 'Sin Registro',
  `fec_nac` date NOT NULL,
  `sexo` tinyint(1) unsigned NOT NULL,
  `acta_num_part_nac` int(10) unsigned zerofill NOT NULL,
  `acta_folio_num_part_nac` int(10) unsigned zerofill NOT NULL,
  `nacionalidad` enum('v','e') NOT NULL,
  `cedula` varchar(8) DEFAULT NULL,
  `cedula_escolar` varchar(10) DEFAULT NULL,
  `cod_direccion` int(10) unsigned DEFAULT NULL,
  `plantel_procedencia` varchar(50) DEFAULT NULL,
  `repitiente` enum('s','n') NOT NULL,
  `cod_curso` tinyint(3) unsigned NOT NULL,
  `altura` tinyint(3) unsigned zerofill DEFAULT NULL,
  `peso` smallint(3) unsigned DEFAULT NULL,
  `camisa` tinyint(1) unsigned DEFAULT NULL,
  `pantalon` tinyint(1) unsigned DEFAULT NULL,
  `zapato` tinyint(2) unsigned zerofill DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(10) unsigned NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(10) unsigned NOT NULL,
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
  KEY `cod_representante` (`cod_representante`,`cod_persona_retira`,`cod_direccion`,`cod_curso`,`camisa`,`pantalon`),
  KEY `cod_representante_2` (`cod_representante`),
  KEY `cod_persona_retira` (`cod_persona_retira`),
  KEY `cod_direccion` (`cod_direccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `asume`
--

CREATE TABLE IF NOT EXISTS `asume` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_docente` int(10) unsigned NOT NULL,
  `cod_curso` tinyint(3) unsigned NOT NULL,
  `comentarios` varchar(200) DEFAULT 'Sin Comentarios',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  KEY `cod_docente` (`cod_docente`),
  KEY `cod_curso` (`cod_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cargo`
--

CREATE TABLE IF NOT EXISTS `cargo` (
  `codigo` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=255 ;

--
-- Dumping data for table `cargo`
--

INSERT INTO `cargo` (`codigo`, `descripcion`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(1, 'Director(a)', 1, 1, '2014-11-02 01:04:05', 1, '2014-11-02 01:04:05'),
(2, 'Sub-Director(a)', 1, 1, '2014-11-02 01:04:05', 1, '2014-11-02 01:04:05'),
(3, 'Coordinador(a)', 1, 1, '2014-11-02 01:04:05', 1, '2014-11-02 01:04:05'),
(4, 'Asistente', 1, 1, '2014-11-02 01:04:05', 1, '2014-11-02 01:04:05'),
(5, 'Docente', 1, 1, '2014-11-02 01:04:05', 1, '2014-11-02 01:04:05'),
(6, 'Especialista', 1, 1, '2014-11-02 01:04:05', 1, '2014-11-02 01:04:05'),
(7, 'Auxiliar', 1, 1, '2014-11-02 01:04:05', 1, '2014-11-02 01:04:05'),
(255, 'Favor actualizar campo', 1, 1, '2014-11-02 01:04:05', 1, '2014-11-02 01:04:05');

-- --------------------------------------------------------

--
-- Table structure for table `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `codigo` tinyint(3) unsigned NOT NULL,
  `grado` tinyint(3) NOT NULL,
  `seccion` tinyint(3) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `curso`
--

INSERT INTO `curso` (`codigo`, `grado`, `seccion`, `descripcion`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(1, 1, 1, 'Primer Grado Seccion:"A"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(2, 1, 2, 'Primer Grado Seccion:"B"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(3, 1, 3, 'Primer Grado Seccion:"C"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(4, 1, 4, 'Primer Grado Seccion:"D"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(5, 1, 5, 'Primer Grado Seccion:"E"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(6, 2, 1, 'Segundo Grado Seccion:"A"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(7, 2, 2, 'Segundo Grado Seccion:"B"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(8, 2, 3, 'Segundo Grado Seccion:"C"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(9, 2, 4, 'Segundo Grado Seccion:"D"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(10, 2, 5, 'Segundo Grado Seccion:"E"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(11, 3, 1, 'Tercer Grado Seccion:"A"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(12, 3, 2, 'Tercer Grado Seccion:"B"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(13, 3, 3, 'Tercer Grado Seccion:"C"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(14, 3, 4, 'Tercer Grado Seccion:"D"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(15, 3, 5, 'Tercer Grado Seccion:"E"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(16, 4, 1, 'Cuarto Grado Seccion:"A"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(17, 4, 2, 'Cuarto Grado Seccion:"B"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(18, 4, 3, 'Cuarto Grado Seccion:"C"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(19, 4, 4, 'Cuarto Grado Seccion:"D"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(20, 4, 5, 'Cuarto Grado Seccion:"E"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(21, 5, 1, 'Quinto Grado Seccion:"A"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(22, 5, 2, 'Quinto Grado Seccion:"B"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(23, 5, 3, 'Quinto Grado Seccion:"C"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(24, 5, 4, 'Quinto Grado Seccion:"D"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(25, 5, 5, 'Quinto Grado Seccion:"E"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(26, 6, 1, 'Sexto Grado Seccion:"A"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(27, 6, 2, 'Sexto Grado Seccion:"B"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(28, 6, 3, 'Sexto Grado Seccion:"C"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(29, 6, 4, 'Sexto Grado Seccion:"D"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(30, 6, 5, 'Sexto Grado Seccion:"E"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(31, -1, 1, 'Prescolar nivel 1', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(32, -2, 1, 'Prescolar nivel 2', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59'),
(33, -3, 1, 'Prescolar nivel 3"', 1, 1, '2014-11-02 01:06:59', 1, '2014-11-02 01:06:59');

-- --------------------------------------------------------

--
-- Table structure for table `direccion_administrativo`
--

CREATE TABLE IF NOT EXISTS `direccion_administrativo` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_parroquia` smallint(5) unsigned DEFAULT NULL,
  `direccion_exacta` varchar(150) DEFAULT 'Sin Registro, favor Actualizar',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `direccion_exacta` (`direccion_exacta`),
  KEY `cod_parroquia` (`cod_parroquia`)
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
  UNIQUE KEY `direccion_exacta` (`direccion_exacta`),
  KEY `cod_parroquia` (`cod_parroquia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `direccion_directivo`
--

CREATE TABLE IF NOT EXISTS `direccion_directivo` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_parroquia` smallint(5) unsigned DEFAULT NULL,
  `direccion_exacta` varchar(150) DEFAULT 'Sin Registro, favor Actualizar',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `direccion_exacta` (`direccion_exacta`),
  KEY `cod_parroquia` (`cod_parroquia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `direccion_docente`
--

CREATE TABLE IF NOT EXISTS `direccion_docente` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_parroquia` smallint(5) unsigned DEFAULT NULL,
  `direccion_exacta` varchar(150) DEFAULT 'Sin Registro, favor Actualizar',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `direccion_exacta` (`direccion_exacta`),
  KEY `cod_parroquia` (`cod_parroquia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `direccion_p_a`
--

CREATE TABLE IF NOT EXISTS `direccion_p_a` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_parroquia` smallint(5) unsigned DEFAULT NULL,
  `direccion_exacta` varchar(150) DEFAULT 'Sin Registro, favor Actualizar',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `direccion_exacta` (`direccion_exacta`),
  KEY `cod_parroquia` (`cod_parroquia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `directivo`
--

CREATE TABLE IF NOT EXISTS `directivo` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_usr` int(10) unsigned NOT NULL,
  `cod_cargo` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `p_nombre` varchar(20) NOT NULL,
  `s_nombre` varchar(20) DEFAULT 'Sin Registro',
  `p_apellido` varchar(20) NOT NULL,
  `s_apellido` varchar(20) DEFAULT 'Sin Registro',
  `sexo` tinyint(1) unsigned NOT NULL,
  `fec_nac` date NOT NULL,
  `nacionalidad` enum('v','e') DEFAULT 'v',
  `cedula` varchar(8) DEFAULT 'sinDatos',
  `telefono` varchar(11) DEFAULT 'SinRegistro',
  `email` varchar(50) DEFAULT NULL,
  `cod_direccion` int(10) unsigned DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `email` (`email`),
  KEY `cod_usr` (`cod_usr`),
  KEY `cod_cargo` (`cod_cargo`),
  KEY `sexo` (`sexo`),
  KEY `cod_direccion` (`cod_direccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `docente`
--

CREATE TABLE IF NOT EXISTS `docente` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_usr` int(10) unsigned NOT NULL,
  `cod_cargo` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `p_nombre` varchar(20) NOT NULL,
  `s_nombre` varchar(20) DEFAULT 'Sin Registro',
  `p_apellido` varchar(20) NOT NULL,
  `s_apellido` varchar(20) DEFAULT 'Sin Registro',
  `sexo` tinyint(1) unsigned NOT NULL,
  `fec_nac` date NOT NULL,
  `nacionalidad` enum('v','e') DEFAULT 'v',
  `cedula` varchar(8) DEFAULT 'sinDatos',
  `telefono` varchar(11) DEFAULT 'SinRegistro',
  `email` varchar(50) DEFAULT NULL,
  `cod_direccion` int(10) unsigned DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `email` (`email`),
  KEY `cod_usr` (`cod_usr`),
  KEY `cod_cargo` (`cod_cargo`),
  KEY `sexo` (`sexo`),
  KEY `cod_direccion` (`cod_direccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(1, 'Distrito Capital', 1, 1, '2014-11-02 01:03:47', 1, '2014-11-02 01:03:47'),
(2, 'Anzoátegui', 1, 1, '2014-11-02 01:03:47', 1, '2014-11-02 01:03:47'),
(3, 'Amazonas', 1, 1, '2014-11-02 01:03:47', 1, '2014-11-02 01:03:47'),
(4, 'Apure', 1, 1, '2014-11-02 01:03:47', 1, '2014-11-02 01:03:47'),
(5, 'Aragua', 1, 1, '2014-11-02 01:03:47', 1, '2014-11-02 01:03:47'),
(6, 'Barinas', 1, 1, '2014-11-02 01:03:47', 1, '2014-11-02 01:03:47'),
(7, 'Bolívar', 1, 1, '2014-11-02 01:03:47', 1, '2014-11-02 01:03:47'),
(8, 'Carabobo', 1, 1, '2014-11-02 01:03:47', 1, '2014-11-02 01:03:47'),
(9, 'Cojedes', 1, 1, '2014-11-02 01:03:47', 1, '2014-11-02 01:03:47'),
(10, 'Delta Amacuro', 1, 1, '2014-11-02 01:03:47', 1, '2014-11-02 01:03:47'),
(11, 'Falcón', 1, 1, '2014-11-02 01:03:47', 1, '2014-11-02 01:03:47'),
(12, 'Guárico', 1, 1, '2014-11-02 01:03:47', 1, '2014-11-02 01:03:47'),
(13, 'Lara', 1, 1, '2014-11-02 01:03:47', 1, '2014-11-02 01:03:47'),
(14, 'Mérida', 1, 1, '2014-11-02 01:03:47', 1, '2014-11-02 01:03:47'),
(15, 'Miranda', 1, 1, '2014-11-02 01:03:47', 1, '2014-11-02 01:03:47'),
(16, 'Monagas', 1, 1, '2014-11-02 01:03:47', 1, '2014-11-02 01:03:47'),
(17, 'Nueva Esparta', 1, 1, '2014-11-02 01:03:47', 1, '2014-11-02 01:03:47'),
(18, 'Portuguesa', 1, 1, '2014-11-02 01:03:47', 1, '2014-11-02 01:03:47'),
(19, 'Sucre', 1, 1, '2014-11-02 01:03:47', 1, '2014-11-02 01:03:47'),
(20, 'Táchira', 1, 1, '2014-11-02 01:03:47', 1, '2014-11-02 01:03:47'),
(21, 'Trujillo', 1, 1, '2014-11-02 01:03:47', 1, '2014-11-02 01:03:47'),
(22, 'Yaracuy', 1, 1, '2014-11-02 01:03:47', 1, '2014-11-02 01:03:47'),
(23, 'Vargas', 1, 1, '2014-11-02 01:03:47', 1, '2014-11-02 01:03:47'),
(24, 'Zulia', 1, 1, '2014-11-02 01:03:47', 1, '2014-11-02 01:03:47');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=337 ;

--
-- Dumping data for table `municipio`
--

INSERT INTO `municipio` (`codigo`, `cod_edo`, `descripcion`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(1, 1, 'Libertador', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(2, 15, 'Baruta', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(3, 15, 'Chacao', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(4, 15, 'Sucre', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(5, 15, 'El Hatillo', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(6, 15, 'Acevedo', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(7, 15, 'Andres Bello', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(8, 15, 'Brion', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(9, 15, 'Buroz', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(10, 15, 'Carrizal', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(11, 15, 'Cristobal Rojas', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(12, 15, 'Guacaipuro', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(13, 15, 'Independencia', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(14, 15, 'Lander', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(15, 15, 'Los Salias', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(16, 15, 'Paez', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(17, 15, 'Paz Castillo', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(18, 15, 'Pedro Gual', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(19, 15, 'Plaza', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(20, 15, 'Simon Bolivar', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(21, 15, 'Urdaneta', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(22, 15, 'Zamora', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(23, 23, 'Vargas', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(24, 12, 'Camaguan', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(25, 12, 'Chaguaramas', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(26, 12, 'El Socorro', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(27, 12, 'Francisco de Miranda', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(28, 12, 'Jose Felix Ribas', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(29, 12, 'Jose Tadeo Monagas', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(30, 12, 'Juan German Roscio', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(31, 12, 'Julian Mellado', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(32, 12, 'Las Mercedes del Llano', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(33, 12, 'Leonardo Infante', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(34, 12, 'Ortiz', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(35, 12, 'Pedro Zaraza', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(36, 12, 'San Geronimo de Guayabal', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(37, 12, 'San Jose de Guaribe', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(38, 12, 'Santa Maria de Ipire', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(39, 5, 'Bolivar', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(41, 5, 'Camatagua', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(42, 5, 'Francisco Linares', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(43, 5, 'Giradot', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(44, 5, 'Jose Angel Lamas', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(45, 5, 'Jose Felix Ribas', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(46, 5, 'Jose Revenga', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(47, 5, 'Libertador', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(48, 5, 'Mario Iragorry', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(49, 5, 'Ocumare de la costa', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(50, 5, 'San Casimiro', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(51, 5, 'San Sebastian', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(52, 5, 'Santiago Mariño', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(53, 5, 'Santos Michelena', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(54, 5, 'Sucre', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(55, 5, 'Tovar', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(56, 5, 'Urdaneta', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(57, 5, 'Zamora', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(58, 8, 'Bejuma', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(59, 8, 'Carlos Arevalo', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(60, 8, 'Diego Ibarra', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(61, 8, 'Guacara', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(62, 8, 'Juan Jose Mora', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(63, 8, 'Libertador', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(64, 8, 'Los Guayos', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(65, 8, 'Miranda', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(66, 8, 'Montalban', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(67, 8, 'Naguanagua', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(68, 8, 'Puerto Cabello', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(69, 8, 'San Diego', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(70, 8, 'San Joaquin', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(71, 8, 'Valencia', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(72, 2, 'Anaco', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(73, 2, 'Aragua', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(74, 2, 'Bolivar', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(75, 2, 'Bruzual', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(76, 2, 'Cajigal', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(77, 2, 'Carvajal', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(78, 2, 'Diego Bautista Urbaneja', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(79, 2, 'Freites', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(80, 2, 'Guanipa', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(81, 2, 'Guanta', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(82, 2, 'Independencia', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(83, 2, 'Libertad', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(84, 2, 'Mcgregor', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(85, 2, 'Miranda', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(86, 2, 'Monagas', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(87, 2, 'Peñalver', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(88, 2, 'Piritu', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(89, 2, 'San Juan de Capistrano', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(90, 2, 'Santa Ana', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(91, 2, 'Simón Rodriguez', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(92, 2, 'Sotillo', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(93, 3, 'Alto Orinoco', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(94, 3, 'Atabapo', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(95, 3, 'Atures', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(96, 3, 'Autana', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(97, 3, 'Manapiare', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(98, 3, 'Maroa', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(99, 3, 'Rio Negro', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(100, 4, 'Achaguas', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(101, 4, 'Biruaca', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(102, 4, 'Muños', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(103, 4, 'Paez', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(104, 4, 'Pedro Camejo', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(105, 4, 'Romulo Gallegos', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(106, 4, 'San Fernando', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(107, 6, 'Alberto Arvelo Torrealba', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(108, 6, 'Andrés Eloy Blanco', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(109, 6, 'Antonio José de Sucre', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(110, 6, 'Arismendi', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(111, 6, 'Barinas', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(112, 6, 'Bolívar', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(113, 6, 'Cruz Paredes', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(114, 6, 'Ezequiel Zamora', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(115, 6, 'Obispos', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(116, 6, 'Pedraza', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(117, 6, 'Rojas', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(118, 6, 'Sosa', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(119, 7, 'Caroní', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(120, 7, 'Cedeño', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(121, 7, 'El Callao', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(122, 7, 'Gran Sabana', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(123, 7, 'Heres', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(124, 7, 'Piar', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(125, 7, 'Raul Leoni', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(126, 7, 'Roscio', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(127, 7, 'Sifontes', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(128, 7, 'Sucre', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(129, 7, 'Padre Pedro Chen', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(130, 9, 'Anzoategui', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(131, 9, 'Falcon', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(132, 9, 'Giraldot', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(133, 9, 'Lima Blanco', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(134, 9, 'Pao de San Juan Bautista', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(135, 9, 'Ricaurte', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(136, 9, 'Rómulo Gallegos', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(137, 9, 'San Carlos', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(138, 9, 'Tinaco', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(139, 10, 'Antonio Díaz', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(140, 10, 'Casacoima', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(141, 10, 'Pedernales', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(142, 10, 'Tucupita', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(143, 11, 'Acosta', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(144, 11, 'Bolívar', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(145, 11, 'Buchivacoa', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(146, 11, 'Cacique Manaure', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(147, 11, 'Carirubana', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(148, 11, 'Colina', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(149, 11, 'Dabajuro', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(150, 11, 'Democracia', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(151, 11, 'Falcón', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(152, 11, 'Federacion', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(153, 11, 'Jacura', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(154, 11, 'Los Taques', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(155, 11, 'Mauroa', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(156, 11, 'Miranda', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(157, 11, 'Monseñor Iturriza', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(158, 11, 'Palmasola', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(159, 11, 'Petit', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(160, 11, 'Piritu', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(161, 11, 'San Francisco', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(162, 11, 'Silva', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(163, 11, 'Sucre', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(164, 11, 'Tocopero', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(165, 11, 'Union', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(166, 11, 'Urumaco', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(167, 11, 'Zamora', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(168, 13, 'Andrés Eloy Blanco', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(169, 13, 'Crespo', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(170, 13, 'Iribarren', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(171, 13, 'Jiménez', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(172, 13, 'Morán', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(173, 13, 'Palavecino', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(174, 13, 'Simón Planas', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(175, 13, 'Torres', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(176, 13, 'Urdaneta', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(177, 14, 'Alberto Adriani', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(178, 14, 'Andrés Bello ', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(179, 14, 'Antonio Pinto Salinas ', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(180, 14, 'Acarigua', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(181, 14, 'Arzobispo Chacón', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(182, 14, 'Campo Elías', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(183, 14, 'Caracciolo Parra Olmedo ', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(184, 14, 'Cardenal Quintero', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(185, 14, 'Guaraque', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(186, 14, 'Julio César Salas ', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(187, 14, 'Justo Briceño', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(188, 14, 'Libertador', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(189, 14, 'Miranda', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(190, 14, 'Obispo Ramos de Lora ', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(191, 14, 'Padre Norega', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(192, 14, 'Pueblo Llano', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(193, 14, 'Rangel', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(194, 14, 'Rivas Dávila', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(195, 14, 'Santos Marquina', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(196, 14, 'Sucre', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(197, 14, 'Tovar', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(198, 14, 'Tulio Febres Cordero', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(199, 14, 'Zea', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(200, 16, 'Acosta', 1, 2, '2014-11-02 01:05:03', 2, '2014-11-02 01:05:03'),
(201, 16, 'Aguasay', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(202, 16, 'Bolívar', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(203, 16, 'Caripe', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(204, 16, 'Cedeño', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(205, 16, 'Ezequiel Zamora', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(206, 16, 'Libertador', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(207, 16, 'Maturín', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(208, 16, 'Piar', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(209, 16, 'Punceres', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(210, 16, 'Santa Bárbara', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(211, 16, 'Sotillo', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(212, 16, 'Uracoa', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(213, 17, 'Antolín del Campo', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(214, 17, 'Arismendi', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(215, 17, 'Díaz', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(216, 17, 'García', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(217, 17, 'Gómez', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(218, 17, 'Maneiro', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(219, 17, 'Marcano', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(220, 17, 'Mariño', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(221, 17, 'Península de Macanao', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(222, 17, 'Tubores', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(223, 17, 'Villalba', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(224, 18, 'Agua Blanca', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(225, 18, 'Araure', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(226, 18, 'Esteller', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(227, 18, 'Guanare', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(228, 18, 'Guanarito', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(229, 18, 'Monseñor José Vicenti de Unda', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(230, 18, 'Ospino', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(231, 18, 'Páez', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(232, 18, 'Papelón', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(233, 18, 'San Genaro de Boconoíto', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(234, 18, 'San Rafael de Onoto', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(235, 18, 'Santa Rosalía', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(236, 18, 'Sucre', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(237, 18, 'Turén', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(238, 19, 'Andrés Eloy Blanco19', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(239, 19, 'Andrés Mata', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(240, 19, 'Arismendi', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(241, 19, 'Benítez', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(242, 19, 'Beremúdez', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(243, 19, 'Bolívar', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(244, 19, 'Cagigal', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(245, 19, 'Cruz Salmerón Acosta', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(246, 19, 'Libertador', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(247, 19, 'Mariño', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(248, 19, 'Mejía', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(249, 19, 'Montes', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(250, 19, 'Ribero', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(251, 19, 'Sucre', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(252, 19, 'Valdez', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(253, 20, 'Andrés Bello', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(254, 20, 'Antonio Rómulo Costa', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(255, 20, 'Ayacucho', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(256, 20, 'Bolívar', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(257, 20, 'Cárdenas', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(258, 20, 'Córdova', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(259, 20, 'Fernández Feo', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(260, 20, 'Francisco de Miranda', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(261, 20, 'García de Hevia', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(262, 20, 'Guásimos', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(263, 20, 'Independencia', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(264, 20, 'Jáuregui', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(265, 20, 'José María Vargas', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(266, 20, 'Junín', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(267, 20, 'Libertad', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(268, 20, 'Libertador', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(269, 20, 'Lobatera', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(270, 20, 'Michelena', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(271, 20, 'Panamericano', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(272, 20, 'Pedro María Ureña', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(273, 20, 'Rafael Urdaneta', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(274, 20, 'Samuel Darío Maldonado', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(275, 20, 'San Cristóbal', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(276, 20, 'Seboruco', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(277, 20, 'Simón Rodríguez', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(278, 20, 'Sucre', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(279, 20, 'Torbes', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(280, 20, 'Uribante', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(281, 20, 'San Judas Tadeo', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(282, 21, 'Andrés Bello', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(283, 21, 'Boconó', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(284, 21, 'Bolívar', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(285, 21, 'Candelaria', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(286, 21, 'Carache', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(287, 21, 'Escuque', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(288, 21, 'José Felipe Márquez Cañizalez', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(289, 21, 'Juan Vicente Campos Elías', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(290, 21, 'La Ceiba', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(291, 21, 'Miranda', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(292, 21, 'Monte Carmelo', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(293, 21, 'Motatán', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(294, 21, 'Pampán', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(295, 21, 'Pampanito', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(296, 21, 'Rafael Rangel', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(297, 21, 'San Rafael de Carvajal', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(298, 21, 'Sucre', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(299, 21, 'Trujillo', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(300, 21, 'Urdaneta', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(301, 21, 'Valera', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(302, 22, 'Veroes', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(303, 22, 'Arístides Bastidas', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(304, 22, 'Bolívar', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(305, 22, 'Bruzal', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(306, 22, 'Cocorote', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(307, 22, 'Independencia', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(308, 22, 'José Antonio Páez', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(309, 22, 'La Trinidad', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(310, 22, 'Manuel Monge', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(311, 22, 'Nirgua', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(312, 22, 'Peña', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(313, 22, 'San Felipe', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(314, 22, 'Sucre', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(315, 22, 'Urachiche', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(316, 24, 'Almirante Padilla', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(317, 24, 'Baralt', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(318, 24, 'Cabimas', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(319, 24, 'Catatumbo', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(320, 24, 'Colón', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(321, 24, 'Francisco Javier Pulgar', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(322, 24, 'Jesús Enrique Losada', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(323, 24, 'La Cañada de Urdaneta', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(324, 24, 'Lagunillas', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(325, 24, 'Machiques de Perijá', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(326, 24, 'Mara', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(327, 24, 'Maracaibo', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(328, 24, 'Miranda', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(329, 24, 'Páez', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(330, 24, 'Rosario de Perijá', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(331, 24, 'San Francisco', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(332, 24, 'Santa Rita', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(333, 24, 'Simón Bolívar', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(334, 24, 'Sucre', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(335, 24, 'Valmore Rodríguez', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03'),
(336, 24, 'Jesús María Semprún', 1, 1, '2014-11-02 01:05:03', 1, '2014-11-02 01:05:03');

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
(0, 'N/S', 1, 1, '2014-11-02 01:07:36', 1, '2014-11-02 01:07:36'),
(1, 'Inicial', 1, 1, '2014-11-02 01:07:36', 1, '2014-11-02 01:07:36'),
(2, 'Primaria', 1, 1, '2014-11-02 01:07:36', 1, '2014-11-02 01:07:36'),
(3, 'Diversificada', 1, 1, '2014-11-02 01:07:36', 1, '2014-11-02 01:07:36'),
(4, 'Tecnico Medio', 1, 1, '2014-11-02 01:07:36', 1, '2014-11-02 01:07:36'),
(5, 'Tecnico Superior', 1, 1, '2014-11-02 01:07:36', 1, '2014-11-02 01:07:36'),
(6, 'Universitario', 1, 1, '2014-11-02 01:07:36', 1, '2014-11-02 01:07:36'),
(7, 'Post-grado', 1, 1, '2014-11-02 01:07:36', 1, '2014-11-02 01:07:36'),
(8, 'Doctorado', 1, 1, '2014-11-02 01:07:36', 1, '2014-11-02 01:07:36');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=925 ;

--
-- Dumping data for table `parroquia`
--

INSERT INTO `parroquia` (`codigo`, `cod_mun`, `descripcion`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(1, 1, 'Altagracia', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(2, 1, 'Antímano', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(3, 1, 'Caricuao', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(4, 1, 'Catedral', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(5, 1, 'Coche', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(6, 1, 'El Junquito', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(7, 1, 'El paraíso', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(8, 1, 'El Recreo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(9, 1, 'El Valle', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(10, 1, 'La Candelaria', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(11, 1, 'La Pastora', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(12, 1, 'La Vega', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(13, 1, 'Macarao', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(14, 1, 'San Agustín', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(15, 1, 'San Bernardino', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(16, 1, 'San José', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(17, 1, 'San Juan', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(18, 1, 'Santa Rosalia', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(19, 1, 'Santa Teresa', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(20, 1, 'Sucre', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(21, 1, '23 de enero', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(22, 1, 'San Pedro', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(23, 2, 'El Cafetal', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(24, 2, 'Las minas de Baruta', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(25, 2, 'Nuestra Señora del Rosario', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(26, 3, 'Chacao', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(27, 4, 'Petare', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(28, 4, 'Leoncio Martinez', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(29, 4, 'La Dolorita', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(30, 4, 'Caucaguita', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(31, 4, 'Filas de Mariche', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(32, 6, 'Araguita', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(33, 6, 'Arevalo Gonzalez', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(34, 6, 'Capaya', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(35, 6, 'Caucagua', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(36, 6, 'El Cafe', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(37, 6, 'Marizapa', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(38, 6, 'Panaquire', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(39, 6, 'Ribas', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(40, 7, 'Cumbo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(41, 7, 'San Jose Barlovento', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(42, 8, 'Curiepe', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(43, 8, 'Higuerote', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(44, 8, 'Tacarigua', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(45, 9, 'Mamporal', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(46, 10, 'Carrizal', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(47, 11, 'Charallave', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(48, 11, 'Las Brisas', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(49, 12, 'Altagracia de la M', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(50, 12, 'Cecilio Acosta', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(51, 12, 'El Jarillo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(52, 12, 'Los Teques', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(53, 12, 'Paracotos', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(54, 12, 'San Pedro', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(55, 12, 'Tacata', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(56, 13, 'El Cartanal', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(57, 13, 'Sta Teresa del Tuy', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(58, 14, 'La Democracia', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(59, 14, 'Ocumare del Tuy', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(60, 14, 'Santa Barbara', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(61, 15, 'San Antonio de los altos', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(62, 16, 'El Guapo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(63, 16, 'Paparo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(64, 16, 'Tacarigua de la laguna', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(65, 16, 'Rio Chico', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(66, 16, 'San Fernardo del Guapo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(67, 17, 'Santa Lucia', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(68, 18, 'Cupira', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(69, 18, 'Machurucuto', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(70, 19, 'Guarenas', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(71, 20, 'San Francisco de Yare', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(72, 20, 'San Antonio de Yare', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(73, 21, 'Cua', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(74, 21, 'Nueva Cua', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(75, 22, 'Bolivar', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(76, 22, 'Guatire', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(77, 23, 'Caraballeda', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(78, 23, 'Carayaca', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(79, 23, 'Carlos Soublette', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(80, 23, 'Caruao', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(81, 23, 'Catia la mar', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(82, 23, 'El Junko', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(83, 23, 'La Guaira', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(84, 23, 'Macuto', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(85, 23, 'Maiquetia', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(86, 23, 'Naiguata', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(87, 23, 'Urimare', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(88, 24, 'Camaguan', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(89, 24, 'Puerto Miranda', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(90, 24, 'Uverito', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(91, 25, 'Chaguaramas', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(92, 26, 'El Socorro', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(93, 27, 'Calabozo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(94, 27, 'El Calvario', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(95, 27, 'El rastro', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(96, 27, 'Guardatinajas', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(97, 28, 'San Rafael de Laya', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(98, 28, 'Tucupido', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(99, 29, 'Altagracia de Orituco', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(100, 29, 'Lezama', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(101, 29, 'Libertad de Orituco', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(102, 29, 'Paso real de Macaira', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(103, 29, 'San Fco de Macaira', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(104, 29, 'San Rafael de Orituco', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(105, 29, 'Soublette', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(106, 30, 'Cantagallo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(107, 30, 'Parapara', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(108, 30, 'San Juan de los Morros', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(109, 31, 'El Sombrero', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(110, 31, 'Sosa', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(111, 32, 'Cabruta', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(112, 32, 'Las Mercedes', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(113, 32, 'Santa Rita de Manapire', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(114, 33, 'Espino', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(115, 33, 'Valle de la Pascua', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(116, 34, 'Ortiz', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(117, 34, 'Sn Fco de Tiznados', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(118, 34, 'San Jose de Tiznados', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(119, 34, 'Sn Lorenzo de tiznados', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(120, 35, 'San Jose de Unare', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(121, 35, 'Zaraza', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(122, 36, 'Cazorla', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(123, 36, 'Guayabal', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(124, 37, 'San Jose de Guaribe', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(125, 38, 'Altamira', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(126, 38, 'Santa Maria de Ipire', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(127, 39, 'San Mateo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(128, 41, 'Carmen de Cura', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(129, 41, 'Camatagua', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(130, 42, 'Santa Rita', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(131, 42, 'Francisco de Miranda', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(132, 42, 'Mons Feliciano', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(133, 43, 'Andres Eloy Blanco', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(134, 43, 'Choroni', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(135, 43, 'Joaquin Crespo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(136, 43, 'Jose Casanova Godoy', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(137, 43, 'Las Delicias', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(138, 43, 'Los Tacariguas', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(139, 43, 'Madre Ma de San Jose', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(140, 43, 'Pedro Jose Ovalies', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(141, 44, 'Santa Cruz', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(142, 45, 'Castor Nieves Rios', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(143, 45, 'La Victoria', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(144, 45, 'Las Guacamayas', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(145, 45, 'Pao de Zarate', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(146, 45, 'Zuata', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(147, 46, 'El Consejo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(148, 47, 'Palo Negro', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(149, 47, 'Martin de Porres', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(150, 48, 'Ca de Azucar', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(151, 48, 'El Limon', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(152, 49, 'Ocumare de la costa', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(153, 50, 'San Casimiro', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(154, 50, 'Guiripa', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(155, 50, 'Ollas de Caramacate', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(156, 50, 'Valle Morin', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(157, 51, 'San Sebastian', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(158, 52, 'Alfredo Pacheco', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(159, 52, 'Arevalo Aponte', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(160, 52, 'Chuao', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(161, 52, 'Turumero', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(162, 52, 'Saman de Guere', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(163, 53, 'Las Tejerias', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(164, 53, 'Tiara', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(165, 54, 'Bella Vista', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(166, 54, 'Cagua', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(167, 55, 'Colonia Tovar', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(168, 56, 'Barbacoas', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(169, 56, 'Las Peñitas', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(170, 56, 'San Francisco de Cara', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(171, 56, 'Taguay', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(172, 57, 'Augusto Mijares', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(173, 57, 'Villa de cura', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(174, 57, 'Magdaleno', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(175, 57, 'Sam Francisco de Asis', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(176, 57, 'Valles de Tucutunemo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(177, 58, 'Bejuma', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(178, 58, 'Canoabo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(179, 58, 'Simon Bolivar', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(180, 59, 'Belen', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(181, 59, 'Guigue', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(182, 59, 'Tacarigua', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(183, 60, 'Agua Caliente', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(184, 60, 'Mariara', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(185, 61, 'Ciudad Alianza', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(186, 61, 'Guacara', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(187, 61, 'Yagua', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(188, 62, 'Moron', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(189, 62, 'Urama', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(190, 63, 'Independencia', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(191, 63, 'Tocuyito', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(192, 64, 'Los Guayos', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(193, 65, 'Miranda', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(194, 66, 'Montalban', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(195, 67, 'Naguanagua', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(196, 68, 'Bartolome Salom', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(197, 68, 'Borburata', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(198, 68, 'Democracia', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(199, 68, 'Fraternidad', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(200, 68, 'Goaigoaza', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(201, 68, 'Juan Jose Flores', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(202, 68, 'Patanemo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(203, 68, 'Union', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(204, 69, 'San Diego', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(205, 70, 'San Joaquin', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(206, 71, 'Candelaria', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(207, 71, 'Catedral', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(208, 71, 'El Socorro', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(209, 71, 'Miguel Peña', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(210, 71, 'Negro Primero', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(211, 71, 'Rafael Urdaneta', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(212, 71, 'San Bias', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(213, 71, 'San Jose', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(214, 71, 'Santa Rosa', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(215, 5, 'El Hatillo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(216, 93, 'Alto Orinoco La Esmeralda', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(217, 93, 'Huachamacare Acanaña', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(218, 93, 'Marawaka Toky Shamanaña', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(219, 93, 'Mavaka Mavaka', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(220, 93, 'Sierra Parima Parimabé', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(221, 94, 'Ucata Laja Lisa', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(222, 94, 'Yapacana Macuruco', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(223, 94, 'Caname Guarinuma', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(224, 95, 'Fernando Girón Tovar Puerto Ayacucho', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(225, 95, 'Luis Alberto Gómez Puerto Ayacucho', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(226, 95, 'Pahueña Limón de Parhueña', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(227, 95, 'Platanillal Platanillal', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(228, 96, 'Samariapo Samariapo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(229, 96, 'Sipapo Pendare', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(230, 96, 'Munduapo Munduapo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(231, 96, 'Guayapo San Pedro del Orinoco', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(232, 97, 'Alto Ventuari Cacurí', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(233, 97, 'Medio Ventuari Manami', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(234, 97, 'Ventuari Marueta', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(235, 98, 'Victorino', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(236, 98, 'Comunidad', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(237, 99, 'Casiquiare Curimacare', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(238, 99, 'Cucuy', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(239, 99, 'Casiquiare Curimacare', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(240, 99, 'Solano Solano', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(241, 72, 'Anaco', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(242, 72, 'San Joaquín', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(243, 73, 'Cachipo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(244, 73, 'Aragua de Barcelona', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(245, 78, 'Lechería', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(246, 78, 'El Morro', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(247, 87, 'Puerto Píritu', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(248, 87, 'San Miguel', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(249, 87, 'Sucre', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(250, 77, 'Valle de Guanape', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(251, 77, 'Santa Bárbara', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(252, 85, 'Atapirire', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(253, 85, 'Boca del Pao', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(254, 85, 'El Pao', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(255, 85, 'Pariaguán', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(256, 81, 'Guanta', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(257, 81, 'Chorrerón', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(258, 82, 'Mamo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(259, 82, 'Soledad', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(260, 86, 'Mapire', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(261, 86, 'Piar', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(262, 86, 'Santa Clara', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(263, 86, 'San Diego de Cabrutica', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(264, 86, 'Uverito', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(265, 86, 'Zuata', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(266, 92, 'Puerto La Cruz', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(267, 92, 'Pozuelos', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(268, 76, 'Onoto', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(269, 76, 'San Pablo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(270, 83, 'San Mateo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(271, 83, 'El Carito', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(272, 83, 'Santa Inés', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(273, 83, 'La Romereña', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(274, 75, 'Clarines', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(275, 75, 'Guanape', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(276, 75, 'Sabana de Uchire', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(277, 79, 'Cantaura', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(278, 79, 'Libertador', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(279, 79, 'Santa Rosa', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(280, 79, 'Urica', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(281, 88, 'Píritu', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(282, 88, 'San Francisco', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(283, 80, 'San José de Guanipa', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(284, 89, 'Boca de Uchire', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(285, 89, 'Boca de Chávez', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(286, 90, 'Pueblo Nuevo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(287, 90, 'Santa Ana', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(288, 74, 'Bergatín', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(289, 74, 'Caigua', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(290, 74, 'El Carmen', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(291, 74, 'El Pilar', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(292, 74, 'Naricual', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(293, 74, 'San Cristóbal', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(294, 91, 'Edmundo Barrios', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(295, 91, 'Miguel Otero Silva', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(296, 84, 'El Chaparro', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(297, 84, 'Tomás Alfaro', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(298, 84, 'Calatrava', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(299, 100, 'Achaguas', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(300, 100, 'Apurito', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(301, 100, 'El Yagual', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(302, 100, 'Guachara', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(303, 100, 'Mucuritas', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(304, 100, 'Queseras del medio', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(305, 101, 'Biruaca', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(306, 102, 'Bruzual', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(307, 102, 'Mantecal', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(308, 102, 'Quintero', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(309, 102, 'Rincón Hondo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(310, 102, 'San Vicente', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(311, 104, 'San Juan de Payara', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(312, 104, 'Codazzzi', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(313, 104, 'Cunaviche', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(314, 106, 'San Fernando', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(315, 106, 'El Recre0', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(316, 106, 'Peñalver', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(317, 106, 'San Rafael de Atamaica', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(318, 103, 'Guasdualito', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(319, 103, 'Aramendi', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(320, 103, 'El Amparo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(321, 103, 'San Camilo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(322, 103, 'Urdaneta', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(323, 105, 'Elorza', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(324, 105, 'La Trinidad', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(325, 107, 'Sabaneta', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(326, 107, 'Juan Antonio Rodríguez Domínguez', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(327, 108, 'El Cantón', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(328, 108, 'Santa Cruz de Guacas', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(329, 108, 'Puerto Vivas', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(330, 109, 'Ticoporo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(331, 109, 'Nicolás Pulido', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(332, 109, 'Andrés Bello', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(333, 110, 'Arismendi', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(334, 110, 'Guadarrama', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(335, 110, 'La Unión', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(336, 110, 'San Antonio', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(337, 111, 'Barinas', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(338, 111, 'Alberto Arvelo Larriva', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(339, 111, 'San Silvestre', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(340, 111, 'Santa Inés', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(341, 111, 'Santa Lucía', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(342, 111, 'Torunos', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(343, 111, 'El Carmen', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(344, 111, 'Rómulo Betancourt', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(345, 111, 'Corazón de Jesús', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(346, 111, 'Ramón Ignacio', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(347, 111, 'Alto Barinas', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(348, 111, 'Manuel Palacio Fajardo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(349, 111, 'Juan Antonio Rodríguez Domínguez', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(350, 111, 'Dominga Ortiz de Páez', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(351, 112, 'Barinitas', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(352, 112, 'Altamira de Cáceres', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(353, 112, 'Calderas', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(354, 113, 'Barracas', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(355, 113, 'El Socorro', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(356, 113, 'Mazparrito', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(357, 114, 'Santa Bárbara', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(358, 114, 'Pedro Briceño Méndez', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(359, 114, 'Ramón Ignacio Méndez', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(360, 114, 'José Ignacio del Pumar', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(361, 115, 'Obispos', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(362, 115, 'Los Guasimitos', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(363, 115, 'El Real', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(364, 115, 'La Luz', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(365, 116, 'Ciudad Bolívia', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(366, 116, 'José Ignacio Briceño', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(367, 116, 'José Félix Ribas', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(368, 116, 'Páez', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(369, 117, 'Libertad', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(370, 117, 'Dolores', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(371, 117, 'Santa Rosa', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(372, 117, 'Palacio Fajardo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(373, 117, 'Simón Rodríguez', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(374, 118, 'Ciudad de Nutrias', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(375, 118, 'El Regalo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(376, 118, 'Puerto Nutrias', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(377, 118, 'Santa Catalina', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(378, 118, 'Simón Bolívar', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(379, 119, 'Cachamay', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(380, 119, 'Chirica', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(381, 119, 'Dalla Costa', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(382, 119, 'Once de Abril', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(383, 119, 'Simón Bolívar', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(384, 119, 'Unare', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(385, 119, 'Universidad', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(386, 119, 'Vista al Sol', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(387, 119, 'Pozo Verde', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(388, 119, 'Yocoima', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(389, 119, '5 de Julio', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(390, 120, 'Cedeño', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(391, 120, 'Altagracia', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(392, 120, 'Ascensión Farreras', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(393, 120, 'Guaniamo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(394, 120, 'La Urbana', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(395, 120, 'Pijiguaos', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(396, 121, 'El Callao', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(397, 122, 'Gran Sabana', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(398, 122, 'Ikabarú', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(399, 123, 'Catedral', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(400, 123, 'Zea', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(401, 123, 'Orinoco', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(402, 123, 'José Antonio Páez', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(403, 123, 'Marhuanta', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(404, 123, 'Agua Salada', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(405, 123, 'Vista Hermosa', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(406, 123, 'La Sabanita', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(407, 123, 'Panapana', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(408, 129, 'Padre Pedro Chien', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(409, 129, 'Río Grande', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(410, 124, 'Andrés Eloy Blanco', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(411, 124, 'Pedro Cova', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(412, 125, 'Raúl Leoni', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(413, 125, 'Barceloneta', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(414, 125, 'Santa Bárbara', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(415, 125, 'San Francisco', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(416, 126, 'Roscio', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(417, 126, 'Salóm', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(418, 127, 'Sifontes', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(419, 127, 'Dalla Costa', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(420, 127, 'San Isidro ', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(421, 128, 'Sucre', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(422, 128, 'Aripao', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(423, 128, 'Guarataro', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(424, 128, 'Las Majadas', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(425, 128, 'Moitaco ', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(426, 130, 'Cojedes', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(427, 130, 'Juan de Mata Suárez', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(428, 134, 'El Pao', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(429, 131, 'Tinaquillo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(430, 132, 'El Baúl', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(431, 132, 'Sucre', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(432, 133, 'La Aguadita', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(433, 133, 'Macapo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(434, 135, 'El Amparo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(435, 135, 'Libertad de Cojedes', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(436, 136, 'Rómulo Gallegos', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(437, 137, 'San Carlos de Austria', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(438, 137, 'Juan Ángel Bravo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(439, 137, 'Manuel Manrique', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(440, 138, 'General en Jefe José Laurencio Silva', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(441, 139, 'Curiapo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(442, 139, 'Almirante Luis Brión', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(443, 139, 'Francisco Aniceto Lugo Boca de Cuyubini', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(444, 139, 'Manuel Renaud', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(445, 139, 'Padre Barral', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(446, 139, 'Santos de Abelgas', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(447, 140, 'Imataca Moruca', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(448, 140, 'Cinco de Julio Piacoa', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(449, 140, 'Juan Bautista Arismendi', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(450, 140, 'Manuel Piar Santa Catalina', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(451, 140, 'Rómulo Gallegos', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(452, 141, 'Pedernales', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(453, 141, 'Luis Beltrán Prieto Figueroa', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(454, 142, 'San José (Delta Amacuro) Hacienda del Medio', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(455, 142, 'José Vidal Marcano Caparal de Guara', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(456, 142, 'Juan Millán Urbanización Leonardo Ruíz Pineda', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(457, 142, 'Leonardo Ruíz Pineda Paloma', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(458, 142, 'Mariscal Antonio José de Sucre Urbanización Delfín Mendoza', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(459, 142, 'Monseñor Argimiro García San Rafael', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(460, 142, 'San Rafael', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(461, 142, 'Virgen del Valle', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(462, 143, 'Capadare', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(463, 143, 'La Pastora', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(464, 143, 'Libertador', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(465, 143, 'San Juan de los Cayos', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(466, 144, 'Aracua', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(467, 144, 'La Peña', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(468, 144, 'San Luis', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(469, 145, 'Bariro', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(470, 145, 'Borojó', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(471, 145, 'Capatárida', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(472, 145, 'Guajiro', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(473, 145, 'Seque', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(474, 145, 'Zazárida', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(475, 145, 'Valle de Eroa', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(476, 146, 'Cacique Manaure', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(477, 147, 'Norte', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(478, 147, 'Carirubana', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(479, 147, 'Santa Ana', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(480, 147, 'Urbana Punta Cardón', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(481, 148, 'La Vela de Coro', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(482, 148, 'Acurigua', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(483, 148, 'Guaibacoa', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(484, 148, 'Las Calderas', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(485, 148, 'Macoruca', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(486, 149, 'Dabajuro', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(487, 150, 'Agua Clara', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(488, 150, 'Avaria', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(489, 150, 'Pedregal', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(490, 150, 'Piedra Grande', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(491, 150, 'Purureche', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(492, 151, 'Adaure', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(493, 151, 'Adícora', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(494, 151, 'Baraived', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(495, 151, 'Buena Vista', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(496, 151, 'Jadacaquiva', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(497, 151, 'El Vínculo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(498, 151, 'El Hato', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(499, 151, 'Moruy', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(500, 151, 'Pueblo Nuevo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(501, 152, 'Agua Larga', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(502, 152, 'Churuguara', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(503, 152, 'El Paují', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(504, 152, 'Independencia', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(505, 152, 'Mapararí', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(506, 153, 'Jacura', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(507, 154, 'Los Taques', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(508, 155, 'Mene de Mauroa', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(509, 156, 'Guzmán Guillermo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(510, 156, 'Mitare ', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(511, 156, 'Río Seco', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(512, 156, 'Sabaneta', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(513, 156, 'Santa Ana', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(514, 157, 'Boca del Tocuyo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(515, 157, 'Chichiriviche', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(516, 158, 'Palmasola', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(517, 159, 'Cabure', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(518, 159, 'Curimagua', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(519, 160, 'San José de la Costa', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(520, 160, 'Píritu', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(521, 161, 'Capital San Francisco', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(522, 162, 'Tucacas', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(523, 162, 'Boca de Aroa', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(524, 163, 'Sucre', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(525, 164, 'Tocópero', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(526, 165, 'Santa Cruz de Bucaral', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(527, 166, 'Bruzual', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(528, 166, 'Urumaco', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(529, 167, 'Puerto Cumarebo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(530, 167, 'La Ciénaga', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(531, 167, 'La Soledad', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(532, 167, 'Pueblo Cumarebo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(533, 167, 'Zazárida', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(534, 168, 'Pio Tamayo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(535, 168, 'Quebrada Honda de Guache', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(536, 169, 'Freitez', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(537, 169, 'José María Blanco', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(538, 172, 'Anzoátegui', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(539, 172, 'Bolívar', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(540, 172, 'Guárico', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(541, 172, 'Hilario Luna y Luna', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(542, 173, 'Cabudare', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(543, 173, 'Agua Viva', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(544, 172, 'Morán', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(545, 174, 'Buría', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(546, 174, 'Sarare', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(547, 175, 'Altagracia', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(548, 175, 'Lara', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(549, 175, 'Chiquinquira', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(550, 176, 'Siquisique', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(551, 176, 'Moroturo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(552, 170, 'Barquisimeto', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(553, 171, 'Quibor', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(554, 177, 'Betancourt', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(555, 177, 'Páez', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(556, 177, 'Rómulo Gallegos', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(557, 177, 'Gabriel Picón Gonzále', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(558, 177, 'Héctor Amable Mora', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(559, 178, 'La Azulita', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(560, 179, 'Santa Cruz de Mora', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(561, 179, 'Mesa de Las Palmas', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(562, 180, 'Aricagua', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(563, 181, 'Capurí', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(564, 181, 'Chacantá', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(565, 181, 'Guaimaral', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(566, 181, 'Mucuchachí', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(567, 182, 'Fernández Peña (Ejido)', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(568, 182, 'Acequias', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(569, 182, 'Jají', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(570, 182, 'La Mesa', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(571, 182, 'San José del Sur', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(572, 183, 'Tucaní', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(573, 184, 'Santo Domingo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(574, 185, 'Guaraque', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(575, 186, 'Arapuey', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(576, 186, 'Palmira', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(577, 187, 'Torondoy', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(578, 188, 'Antonio Spinetti Dini', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(579, 188, 'Arias', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(580, 188, 'Caracciolo Parra Pérez', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(581, 188, 'Domingo Peña ', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(582, 188, 'El Llano', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(583, 188, 'Gonzalo Picón Febres', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(584, 188, 'Jacinto Plaza', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(585, 188, 'Juan Rodríguez Suárez', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(586, 188, 'Lasso de la Vega', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(587, 188, 'Mariano Picón Sala', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(588, 188, 'Milla', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(589, 188, 'Osuna Rodríguez', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(590, 188, 'Sagrario', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(591, 188, 'El Morro', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(592, 188, 'Los Nevados', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(593, 189, 'Andrés Eloy Blanco', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(594, 189, 'La Venta', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(595, 189, 'Piñango', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(596, 189, 'Timotes', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(597, 190, 'Eloy Paredes', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(598, 190, 'San Rafael de Alcázar', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(599, 191, 'Santa María de Caparo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(600, 192, 'Pueblo Llano', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(601, 193, 'Cacute', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(602, 193, 'Mucuchíes', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(603, 194, 'Gerónimo Maldonado', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(604, 194, 'Bailadores', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(605, 195, 'Tabay', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(606, 196, 'Chiguará', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(607, 196, 'Estánquez', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(608, 196, 'Lagunillas', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(609, 196, 'Pueblo Nuevo del Sur', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(610, 196, 'San Juan', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(611, 197, 'El Amparo', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(612, 197, 'El Llano', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(613, 197, 'San Francisco', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(614, 197, 'Tovar', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(615, 198, 'Independencia', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(616, 198, 'María de la Concepción Palacios Blanco', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(617, 198, 'Nueva Bolivia', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(618, 198, 'Santa Apolonia', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(619, 199, 'Caño El Tigre', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14'),
(620, 199, 'Zea', 1, 1, '2014-11-02 01:05:14', 1, '2014-11-02 01:05:14');
INSERT INTO `parroquia` (`codigo`, `cod_mun`, `descripcion`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(621, 200, 'San Antonio de Maturín', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(622, 200, 'San Francisco de Maturín', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(623, 201, 'Aguasay', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(624, 202, 'Caripito', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(625, 203, 'El Guácharo', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(626, 203, 'Caripe', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(627, 204, 'Capital Cedeño', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(628, 204, 'San Félix de Cantalicio', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(629, 205, 'El Tejero', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(630, 205, 'Punta de Mata', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(631, 206, 'Chaguaramas', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(632, 206, 'Temblador', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(633, 207, 'Alto de los Godos', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(634, 207, 'Boquerón', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(635, 207, 'Las Cocuizas', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(636, 207, 'La Cruz', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(637, 207, 'San Simón', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(638, 207, 'El Corozo', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(639, 207, 'El Furrial', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(640, 207, 'Jusepín', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(641, 207, 'La Pica', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(642, 207, 'San Vicente', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(643, 208, 'Aparicio', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(644, 208, 'Chaguamal', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(645, 208, 'El Pinto', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(646, 208, 'Guanaguana', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(647, 208, 'La Toscana', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(648, 209, 'Cachipo', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(649, 209, 'Quiriquire', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(650, 210, 'Santa Bárbara', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(651, 211, 'Barrancas', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(652, 212, 'Uracoa', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(653, 213, 'Antolín del Campo', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(654, 214, 'Arismendi', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(655, 215, 'San Juan Bautista', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(656, 215, 'Zabala', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(657, 216, 'García', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(658, 216, 'Francisco Fajardo', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(659, 217, 'Bolívar', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(660, 217, 'Guevara', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(661, 217, 'Cerro de Matasiete', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(662, 217, 'Santa Ana', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(663, 217, 'Sucre', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(664, 218, 'Aguirre', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(665, 218, 'Maneiro', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(666, 219, 'Adrián', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(667, 219, 'Juan Griego', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(668, 219, 'Yaguaraparo', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(669, 220, 'Porlamar', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(670, 221, 'San Francisco de Macanao', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(671, 221, 'Boca de Río', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(672, 222, 'Tubores', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(673, 223, 'Villalba', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(674, 224, 'Agua Blanca', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(675, 225, 'Araure', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(676, 226, 'Píritu', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(677, 226, 'Uveral', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(678, 227, 'Guanare', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(679, 228, 'Guanarito', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(680, 229, 'Peña Blanca', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(681, 230, 'Aparición', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(682, 230, 'Ospino', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(683, 231, 'Acarigua', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(684, 231, 'Payara', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(685, 232, 'Papelón', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(686, 233, 'Boconoíto', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(687, 234, 'San Rafael de Onoto', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(688, 234, 'Santa Fé', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(689, 235, 'Florida', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(690, 235, 'El Playón', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(691, 236, 'Biscucuy', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(692, 236, 'Concepción', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(693, 236, 'San José de Saguaz', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(694, 236, 'San Rafael de Palo Alzado', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(695, 236, 'Uvencio Antonio Velásquez', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(696, 236, 'Villa Rosa', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(697, 237, 'Canelones', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(698, 237, 'Santa Cruz', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(699, 237, 'San Isidro Labrador', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(700, 238, 'Mariño', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(701, 238, 'Rómulo Gallegos', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(702, 239, 'San José de Aerocuar', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(703, 239, 'Tavera Acosta', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(704, 240, 'Río Caribe', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(705, 240, 'Antonio José de Sucre', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(706, 240, 'El Morro de Puerto Santo', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(707, 240, 'Puerto Santo', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(708, 240, 'San Juan de las Galdonas', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(709, 241, 'El Pilar', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(710, 241, 'El Rincón', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(711, 241, 'General Francisco Antonio Váquez', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(712, 241, 'Guaraúnos', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(713, 241, 'Tunapuicito', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(714, 241, 'Unión', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(715, 242, 'Santa Catalina', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(716, 242, 'Santa Rosa', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(717, 242, 'Santa Teresa', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(718, 242, 'Bolívar', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(719, 242, 'Maracapana', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(720, 243, 'Bolívar', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(721, 244, 'El Paujil', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(722, 245, 'Cruz Salmerón Acosta', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(723, 245, 'Manicuare', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(724, 246, 'Tunapuy', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(725, 246, 'Campo Elías', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(726, 247, 'Irapa', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(727, 247, 'Campo Claro', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(728, 247, 'Maraval', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(729, 247, 'Soro', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(730, 248, 'Mejía', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(731, 249, 'Cumanacoa', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(732, 249, 'Aricagua', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(733, 249, 'San Fernando', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(734, 249, 'San Lorenzo', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(735, 250, 'Villa Frontado', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(736, 250, 'Catuaro', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(737, 250, 'Rendón', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(738, 250, 'San Cruz', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(739, 250, 'Santa María', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(740, 251, 'Altagracia', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(741, 251, 'Santa Inés', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(742, 251, 'Valentín Valiente', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(743, 251, 'Ayacucho', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(744, 251, 'San Juan', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(745, 251, 'Raúl Leoni', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(746, 251, 'Gran Mariscal', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(747, 252, 'Cristóbal Colón', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(748, 252, 'Bideau', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(749, 252, 'Punta de Piedras', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(750, 252, 'Güiria', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(751, 253, 'Andrés Bello', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(752, 254, 'Antonio Rómulo Costa', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(753, 255, 'Ayacucho', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(754, 255, 'San Pedro del Río', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(755, 256, 'Bolívar', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(756, 257, 'Cárdenas', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(757, 258, 'Córdoba', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(758, 259, 'Fernández Feo', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(759, 259, 'Alberto Adriani', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(760, 260, 'Francisco de Miranda', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(761, 261, 'García de Hevia', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(762, 261, 'Boca de Grita', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(763, 262, 'Guásimos', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(764, 263, 'Independencia', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(765, 262, 'Juan Germán Roscio', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(766, 264, 'Jáuregui', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(767, 265, 'José María Vargas', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(768, 266, 'Junín', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(769, 266, 'La Petrólea', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(770, 267, 'Libertad', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(771, 268, 'Capital Libertador', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(772, 269, 'Lobatera', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(773, 270, 'Michelena', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(774, 271, 'Panamericano', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(775, 272, 'Pedro María Ureña', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(776, 273, 'Delicias', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(777, 274, 'Samuel Darío Maldonado', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(778, 274, 'Boconó', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(779, 275, 'La Concordia', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(780, 275, 'San Juan Bautista', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(781, 275, 'Pedro María Morantes', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(782, 276, 'Seboruco', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(783, 277, 'Simón Rodríguez', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(784, 278, 'Sucre', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(785, 279, 'San José', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(786, 280, 'Uribante', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(787, 280, 'Juan Pablo Peñalosa', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(788, 280, 'Potosí', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(789, 281, 'San Judas Tadeo', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(800, 282, 'Araguaney', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(801, 282, 'El Jaguito', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(802, 283, 'Boconó', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(803, 284, 'Sabana Grande', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(804, 284, 'Cheregüé', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(805, 285, 'Arnoldo Gabaldón', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(806, 285, 'Bolivia', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(807, 285, 'Carrillo', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(808, 285, 'Manuel Salvador Ulloa', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(809, 286, 'Carache', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(810, 286, 'La Concepción', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(811, 286, 'Santa Cruz', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(812, 287, 'Escuque', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(813, 287, 'Santa Rita', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(814, 288, 'El Socorro', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(815, 288, 'Antonio José de Sucre', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(816, 289, 'Campo Elías', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(817, 289, 'Arnoldo Gabaldón', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(818, 290, 'Santa Apolonia', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(819, 290, 'La Ceiba', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(820, 291, 'Agua Santa', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(821, 291, 'Valerita', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(822, 292, 'Carmelo', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(823, 292, 'Santa María del Horcón', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(824, 293, 'Motatán', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(825, 293, 'Jalisco', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(826, 294, 'Pampán', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(827, 294, 'Santa Ana', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(828, 295, 'Pampanito', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(829, 295, 'Pampanito II', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(830, 296, 'Betijoque', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(831, 296, 'José Gregorio Hernández', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(832, 296, 'La Pueblita', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(833, 297, 'Carvajal', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(834, 297, 'Campo Alegre', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(835, 297, 'Antonio Nicolás Briceño', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(836, 298, 'Sabana de Mendoza', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(837, 298, 'Junín', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(838, 298, 'Valmore Rodríguez', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(839, 298, 'El Paraíso', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(840, 299, 'Andrés Linares', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(841, 299, 'Cristóbal Mendoza', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(842, 299, 'Carrillo', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(843, 300, 'Cabimbú', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(844, 300, 'Jajó', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(845, 300, 'La Mesa de Esnujaque', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(846, 300, 'Santiago', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(847, 300, 'La Quebrada', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(848, 301, 'Juan Ignacio Montilla', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(849, 301, 'La Beatriz', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(850, 301, 'La Puerta', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(851, 301, 'Mendoza del Valle de Momboy', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(852, 301, 'Mercedes Díaz', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(853, 301, 'San Luis', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(854, 302, 'El Guayabo', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(855, 302, 'Farriar', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(856, 303, 'Arístides Bastidas', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(857, 304, 'Bolívar', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(858, 305, 'Chivacoa', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(859, 305, 'Campo Elías', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(860, 306, 'Cocorote', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(861, 307, 'Independencia', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(862, 308, 'José Antonio Páez', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(863, 309, 'La Trinidad', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(864, 310, 'Manuel Monge', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(865, 311, 'Salóm', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(866, 311, 'Nirgua', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(867, 312, 'San Andrés', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(868, 312, 'Yaritagua', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(869, 313, 'San Felipe', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(870, 313, 'San Javier', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(871, 314, 'Sucre', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(872, 315, 'Urachiche', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(873, 316, 'Isla de Toas', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(874, 316, 'Monagas', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(875, 317, 'San Timoteo', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(876, 317, 'Libertador', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(877, 317, 'Pueblo Nuevo', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(878, 318, 'La Rosa', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(879, 318, 'Rómulo Betancourt', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(880, 318, 'San Benito', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(881, 318, 'Arístides Calvani', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(882, 319, 'Encontrados', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(883, 320, 'Moralito', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(884, 320, 'San Carlos del Zulia', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(885, 320, 'Santa Cruz del Zulia', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(886, 320, 'Santa Bárbara', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(887, 320, 'Urribarrí', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(888, 321, 'Carlos Quevedo', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(889, 321, 'Francisco Javier Pulgar', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(890, 322, 'La Concepción', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(891, 322, 'Mariano Parra León', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(892, 323, 'Concepción', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(893, 323, 'Chiquinquirá', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(894, 323, 'Potreritos', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(895, 324, 'Libertad', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(896, 324, 'Venezuela', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(897, 324, 'Campo Lara', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(898, 325, 'San José de Perijá', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(899, 326, 'mara', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(900, 327, 'Bolívar', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(901, 327, 'Coquivacoa', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(902, 327, 'Chiquinquirá', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(903, 327, 'Raúl Leoni', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(904, 327, 'Santa Lucía', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(905, 327, 'San Isidro', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(906, 328, 'Altagracia', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(907, 328, 'Faría', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(908, 328, 'San Antonio', 1, 328, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(909, 328, 'San José', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(910, 329, 'Guajira', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(911, 329, 'Elías Sánchez Rubio', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(912, 330, 'El Rosario', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(913, 331, 'San Francisco', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(914, 331, 'Los Cortijos', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(915, 332, 'Santa Rita', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(916, 332, 'Urribarrí', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(917, 333, 'Rafael', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(918, 333, 'Manuel Manrique', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(919, 334, 'Gibraltar', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(920, 334, 'Rómulo Gallegos', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(921, 335, 'Rafael Urdaneta ', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(922, 334, 'La Victoria', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(923, 335, 'Raúl Cuenca', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17'),
(924, 336, 'Jesús María Semprún', 1, 1, '2014-11-02 01:05:17', 1, '2014-11-02 01:05:17');

-- --------------------------------------------------------

--
-- Table structure for table `personal_autorizado`
--

CREATE TABLE IF NOT EXISTS `personal_autorizado` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `p_apellido` varchar(40) NOT NULL,
  `s_apellido` varchar(40) DEFAULT 'Sin Registro',
  `p_nombre` varchar(40) NOT NULL,
  `s_nombre` varchar(40) DEFAULT 'Sin Registro',
  `nacionalidad` enum('v','e') NOT NULL,
  `cedula` varchar(8) NOT NULL,
  `telefono` varchar(11) DEFAULT 'SinRegistro',
  `telefono_otro` varchar(11) DEFAULT 'SinRegistro',
  `email` varchar(50) DEFAULT 'Sin Registro',
  `lugar_nac` varchar(50) DEFAULT 'Sin Registro',
  `fec_nac` date DEFAULT NULL,
  `relacion` tinyint(3) unsigned NOT NULL,
  `vive_con_alumno` enum('s','n') NOT NULL,
  `cod_direccion` int(10) unsigned DEFAULT NULL,
  `nivel_instruccion` tinyint(1) unsigned NOT NULL,
  `profesion` tinyint(3) unsigned DEFAULT '255',
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
  KEY `profesion` (`profesion`),
  KEY `cod_direccion` (`cod_direccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `profesion`
--

CREATE TABLE IF NOT EXISTS `profesion` (
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
-- Dumping data for table `profesion`
--

INSERT INTO `profesion` (`codigo`, `descripcion`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(255, 'Otro', 1, 1, '2014-11-02 01:09:01', 1, '2014-11-02 01:09:01');

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
(1, 'Madre', 1, 1, '2014-11-02 01:07:17', 1, '2014-11-02 01:07:17'),
(2, 'Padre', 1, 1, '2014-11-02 01:07:17', 1, '2014-11-02 01:07:17'),
(3, 'Tio(a)', 1, 1, '2014-11-02 01:07:17', 1, '2014-11-02 01:07:17'),
(4, 'Abuelo(a)', 1, 1, '2014-11-02 01:07:17', 1, '2014-11-02 01:07:17'),
(5, 'Hermano(a)', 1, 1, '2014-11-02 01:07:17', 1, '2014-11-02 01:07:17'),
(6, 'Primo(a)', 1, 1, '2014-11-02 01:07:17', 1, '2014-11-02 01:07:17'),
(7, 'Otro', 1, 1, '2014-11-02 01:07:17', 1, '2014-11-02 01:07:17');

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
(0, 'Masculino', 1, 1, '2014-11-02 01:04:28', 1, '2014-11-02 01:04:28'),
(1, 'Femenino', 1, 1, '2014-11-02 01:04:28', 1, '2014-11-02 01:04:28');

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
(1, 'XS', 1, 1, '2014-11-02 01:06:41', 1, '2014-11-02 01:06:41'),
(2, 'S', 1, 1, '2014-11-02 01:06:41', 1, '2014-11-02 01:06:41'),
(3, 'M', 1, 1, '2014-11-02 01:06:41', 1, '2014-11-02 01:06:41'),
(4, 'L', 1, 1, '2014-11-02 01:06:41', 1, '2014-11-02 01:06:41'),
(5, 'XL', 1, 1, '2014-11-02 01:06:41', 1, '2014-11-02 01:06:41'),
(6, 'XXL', 1, 1, '2014-11-02 01:06:41', 1, '2014-11-02 01:06:41');

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
(0, 'Dectivado', 1, 1, '2014-11-02 01:03:14', 1, '2014-11-02 01:03:14'),
(1, 'Usuario', 1, 1, '2014-11-02 01:03:14', 1, '2014-11-02 01:03:14'),
(2, 'Usuario Privilegiado', 1, 1, '2014-11-02 01:03:14', 1, '2014-11-02 01:03:14'),
(3, 'Administrador', 1, 1, '2014-11-02 01:03:14', 1, '2014-11-02 01:03:14'),
(4, 'Super Usuario', 1, 1, '2014-11-02 01:03:14', 1, '2014-11-02 01:03:14'),
(255, 'slayerfat', 1, 1, '2014-11-02 01:03:14', 1, '2014-11-02 01:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  KEY `cod_tipo_usr` (`cod_tipo_usr`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`codigo`, `seudonimo`, `clave`, `cod_tipo_usr`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(1, 'neo', 'matrix', 4, 1, 1, '2014-11-02 01:03:30', 1, '2014-11-02 01:03:30');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrativo`
--
ALTER TABLE `administrativo`
  ADD CONSTRAINT `administrativo_ibfk_1` FOREIGN KEY (`cod_usr`) REFERENCES `usuario` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `administrativo_ibfk_2` FOREIGN KEY (`cod_cargo`) REFERENCES `cargo` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `administrativo_ibfk_3` FOREIGN KEY (`sexo`) REFERENCES `sexo` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `administrativo_ibfk_4` FOREIGN KEY (`cod_direccion`) REFERENCES `direccion_administrativo` (`codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_7` FOREIGN KEY (`cod_direccion`) REFERENCES `direccion_alumno` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`sexo`) REFERENCES `sexo` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_ibfk_2` FOREIGN KEY (`camisa`) REFERENCES `talla` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_ibfk_3` FOREIGN KEY (`pantalon`) REFERENCES `talla` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_ibfk_4` FOREIGN KEY (`cod_curso`) REFERENCES `curso` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_ibfk_5` FOREIGN KEY (`cod_representante`) REFERENCES `personal_autorizado` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_ibfk_6` FOREIGN KEY (`cod_persona_retira`) REFERENCES `personal_autorizado` (`codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `asume`
--
ALTER TABLE `asume`
  ADD CONSTRAINT `asume_ibfk_1` FOREIGN KEY (`cod_docente`) REFERENCES `docente` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `asume_ibfk_2` FOREIGN KEY (`cod_curso`) REFERENCES `curso` (`codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `direccion_administrativo`
--
ALTER TABLE `direccion_administrativo`
  ADD CONSTRAINT `direccion_administrativo_ibfk_1` FOREIGN KEY (`cod_parroquia`) REFERENCES `parroquia` (`codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `direccion_alumno`
--
ALTER TABLE `direccion_alumno`
  ADD CONSTRAINT `direccion_alumno_ibfk_1` FOREIGN KEY (`cod_parroquia`) REFERENCES `parroquia` (`codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `direccion_directivo`
--
ALTER TABLE `direccion_directivo`
  ADD CONSTRAINT `direccion_directivo_ibfk_1` FOREIGN KEY (`cod_parroquia`) REFERENCES `parroquia` (`codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `direccion_docente`
--
ALTER TABLE `direccion_docente`
  ADD CONSTRAINT `direccion_docente_ibfk_1` FOREIGN KEY (`cod_parroquia`) REFERENCES `parroquia` (`codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `direccion_p_a`
--
ALTER TABLE `direccion_p_a`
  ADD CONSTRAINT `direccion_p_a_ibfk_1` FOREIGN KEY (`cod_parroquia`) REFERENCES `parroquia` (`codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `directivo`
--
ALTER TABLE `directivo`
  ADD CONSTRAINT `directivo_ibfk_1` FOREIGN KEY (`cod_usr`) REFERENCES `usuario` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `directivo_ibfk_2` FOREIGN KEY (`cod_cargo`) REFERENCES `cargo` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `directivo_ibfk_3` FOREIGN KEY (`sexo`) REFERENCES `sexo` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `directivo_ibfk_4` FOREIGN KEY (`cod_direccion`) REFERENCES `direccion_directivo` (`codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `docente_ibfk_1` FOREIGN KEY (`cod_usr`) REFERENCES `usuario` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `docente_ibfk_2` FOREIGN KEY (`cod_cargo`) REFERENCES `cargo` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `docente_ibfk_3` FOREIGN KEY (`sexo`) REFERENCES `sexo` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `docente_ibfk_4` FOREIGN KEY (`cod_direccion`) REFERENCES `direccion_docente` (`codigo`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `personal_autorizado_ibfk_3` FOREIGN KEY (`profesion`) REFERENCES `profesion` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_autorizado_ibfk_4` FOREIGN KEY (`cod_direccion`) REFERENCES `direccion_p_a` (`codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `suplente`
--
ALTER TABLE `suplente`
  ADD CONSTRAINT `suplente_ibfk_1` FOREIGN KEY (`cod_profesor`) REFERENCES `docente` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `suplente_ibfk_2` FOREIGN KEY (`cod_suplente`) REFERENCES `docente` (`codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`cod_tipo_usr`) REFERENCES `tipo_usuario` (`codigo`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

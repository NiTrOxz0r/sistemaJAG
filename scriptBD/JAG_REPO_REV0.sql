-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 07, 2014 at 03:21 pm
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `JAG_REPO`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrativo`
--

CREATE TABLE IF NOT EXISTS `administrativo` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `p_nombre` varchar(20) NOT NULL,
  `s_nombre` varchar(20) DEFAULT 'Sin Registro',
  `p_apellido` varchar(20) NOT NULL,
  `s_apellido` varchar(20) DEFAULT 'Sin Registro',
  `nacionalidad` enum('v','e') NOT NULL DEFAULT 'v',
  `cedula` varchar(8) NOT NULL DEFAULT 'sinDatos',
  `celular` varchar(11) DEFAULT 'SinRegistro',
  `telefono` varchar(11) DEFAULT 'SinRegistro',
  `telefono_otro` varchar(11) DEFAULT 'SinRegistro',
  `nivel_instruccion` tinyint(1) unsigned NOT NULL,
  `titulo` varchar(80) DEFAULT 'Sin Registros',
  `fec_nac` date NOT NULL,
  `sexo` tinyint(1) unsigned NOT NULL,
  `email` varchar(50) DEFAULT 'Sin Registro',
  `cod_direccion` int(10) unsigned NOT NULL,
  `cod_usr` int(10) unsigned NOT NULL,
  `cod_cargo` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `email` (`email`),
  KEY `cod_usr` (`cod_usr`),
  KEY `nivel_instruccion` (`nivel_instruccion`),
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
  `nacionalidad` enum('v','e') NOT NULL,
  `cedula` varchar(8) DEFAULT NULL,
  `cedula_escolar` varchar(10) NOT NULL,
  `acta_num_part_nac` int(10) unsigned zerofill DEFAULT NULL,
  `acta_folio_num_part_nac` int(10) unsigned zerofill DEFAULT NULL,
  `telefono` varchar(11) DEFAULT 'SinRegistro',
  `telefono_otro` varchar(11) DEFAULT 'SinRegistro',
  `fec_nac` date NOT NULL,
  `lugar_nac` varchar(50) DEFAULT 'Sin Registro',
  `sexo` tinyint(1) unsigned NOT NULL,
  `cod_direccion` int(10) unsigned DEFAULT NULL,
  `plantel_procedencia` varchar(50) DEFAULT NULL,
  `repitiente` enum('s','n') NOT NULL,
  `cod_curso` tinyint(3) unsigned NOT NULL,
  `altura` tinyint(3) unsigned zerofill DEFAULT NULL,
  `peso` smallint(3) unsigned DEFAULT NULL,
  `camisa` tinyint(1) unsigned DEFAULT NULL,
  `pantalon` tinyint(1) unsigned DEFAULT NULL,
  `zapato` tinyint(2) unsigned zerofill DEFAULT NULL,
  `cod_representante` int(10) unsigned NOT NULL,
  `cod_persona_retira` int(10) unsigned DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(10) unsigned NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(10) unsigned NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `cedula_escolar` (`cedula_escolar`),
  UNIQUE KEY `cedula` (`cedula`),
  UNIQUE KEY `acta_num_part_nac` (`acta_num_part_nac`),
  UNIQUE KEY `acta_folio_num_part_nac` (`acta_folio_num_part_nac`),
  KEY `sexo` (`sexo`),
  KEY `camisa` (`camisa`),
  KEY `pantalon` (`pantalon`),
  KEY `cod_curso` (`cod_curso`),
  KEY `cod_representante` (`cod_representante`),
  KEY `cod_persona_retira` (`cod_persona_retira`),
  KEY `cod_direccion` (`cod_direccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `alumno`
--

INSERT INTO `alumno` (`codigo`, `p_apellido`, `s_apellido`, `p_nombre`, `s_nombre`, `nacionalidad`, `cedula`, `cedula_escolar`, `acta_num_part_nac`, `acta_folio_num_part_nac`, `telefono`, `telefono_otro`, `fec_nac`, `lugar_nac`, `sexo`, `cod_direccion`, `plantel_procedencia`, `repitiente`, `cod_curso`, `altura`, `peso`, `camisa`, `pantalon`, `zapato`, `cod_representante`, `cod_persona_retira`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(1, 'Orellana', 'Martinez', 'Pepita', 'Fanca', 'v', '12345678', '0012345678', 0123456789, 0987654321, 'SinRegistro', 'SinRegistro', '2014-11-05', 'Sin Registro', 1, 50, 'Escuela tal', 'n', 3, 075, 45, 3, 2, 24, 1, 3, 1, 1, '2014-11-07 14:05:25', 1, '2014-11-07 14:05:25'),
(2, 'Orellana', 'Martinez', 'Juan', 'Luis', 'v', '99955511', '0099955511', 0999999999, 0999999991, 'SinRegistro', 'SinRegistro', '2014-11-05', 'Sin Registro', 0, 50, 'Plantel tal', 'n', 1, 078, 65, 4, 4, 28, 1, 2, 1, 1, '2014-11-07 14:05:25', 1, '2014-11-07 14:05:25');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `asume`
--

INSERT INTO `asume` (`codigo`, `cod_docente`, `cod_curso`, `comentarios`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(1, 1, 1, 'DETALLESE QUE UN PROFESOR PUEDE ESTAR DANDO CLASE A VARIOS CURSOS', 1, 1, '2014-11-07 14:19:16', 1, '2014-11-07 14:19:16'),
(2, 1, 3, 'Sin Comentarios', 1, 1, '2014-11-07 14:19:26', 1, '2014-11-07 14:19:26');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cargo`
--

INSERT INTO `cargo` (`codigo`, `descripcion`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(1, 'Favor actualizar campo', 1, 1, '2014-11-07 13:55:21', 1, '2014-11-07 13:55:21'),
(2, 'Director(a)', 1, 1, '2014-11-07 13:55:21', 1, '2014-11-07 13:55:21'),
(3, 'Sub-Director(a)', 1, 1, '2014-11-07 13:55:21', 1, '2014-11-07 13:55:21'),
(4, 'Coordinador(a)', 1, 1, '2014-11-07 13:55:21', 1, '2014-11-07 13:55:21'),
(5, 'Asistente', 1, 1, '2014-11-07 13:55:21', 1, '2014-11-07 13:55:21'),
(6, 'Docente', 1, 1, '2014-11-07 13:55:21', 1, '2014-11-07 13:55:21'),
(7, 'Especialista', 1, 1, '2014-11-07 13:55:21', 1, '2014-11-07 13:55:21'),
(8, 'Auxiliar', 1, 1, '2014-11-07 13:55:21', 1, '2014-11-07 13:55:21');

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
(1, 1, 1, 'Primer Grado Seccion:"A"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(2, 1, 2, 'Primer Grado Seccion:"B"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(3, 1, 3, 'Primer Grado Seccion:"C"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(4, 1, 4, 'Primer Grado Seccion:"D"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(5, 1, 5, 'Primer Grado Seccion:"E"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(6, 2, 1, 'Segundo Grado Seccion:"A"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(7, 2, 2, 'Segundo Grado Seccion:"B"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(8, 2, 3, 'Segundo Grado Seccion:"C"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(9, 2, 4, 'Segundo Grado Seccion:"D"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(10, 2, 5, 'Segundo Grado Seccion:"E"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(11, 3, 1, 'Tercer Grado Seccion:"A"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(12, 3, 2, 'Tercer Grado Seccion:"B"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(13, 3, 3, 'Tercer Grado Seccion:"C"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(14, 3, 4, 'Tercer Grado Seccion:"D"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(15, 3, 5, 'Tercer Grado Seccion:"E"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(16, 4, 1, 'Cuarto Grado Seccion:"A"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(17, 4, 2, 'Cuarto Grado Seccion:"B"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(18, 4, 3, 'Cuarto Grado Seccion:"C"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(19, 4, 4, 'Cuarto Grado Seccion:"D"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(20, 4, 5, 'Cuarto Grado Seccion:"E"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(21, 5, 1, 'Quinto Grado Seccion:"A"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(22, 5, 2, 'Quinto Grado Seccion:"B"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(23, 5, 3, 'Quinto Grado Seccion:"C"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(24, 5, 4, 'Quinto Grado Seccion:"D"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(25, 5, 5, 'Quinto Grado Seccion:"E"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(26, 6, 1, 'Sexto Grado Seccion:"A"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(27, 6, 2, 'Sexto Grado Seccion:"B"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(28, 6, 3, 'Sexto Grado Seccion:"C"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(29, 6, 4, 'Sexto Grado Seccion:"D"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(30, 6, 5, 'Sexto Grado Seccion:"E"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(31, -1, 1, 'Prescolar nivel 1', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(32, -2, 1, 'Prescolar nivel 2', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(33, -3, 1, 'Prescolar nivel 3"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56');

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
  KEY `cod_parroquia` (`cod_parroquia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `direccion_alumno`
--

INSERT INTO `direccion_alumno` (`codigo`, `cod_parroquia`, `direccion_exacta`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(50, 1, 'la calle tal apartamento tal', 1, 1, '2014-11-07 13:57:34', 1, '2014-11-07 13:57:34');

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
  KEY `cod_parroquia` (`cod_parroquia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `direccion_docente`
--

INSERT INTO `direccion_docente` (`codigo`, `cod_parroquia`, `direccion_exacta`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(1, 8, 'Sin Registro, favor Actualizar', 1, 1, '2014-11-07 14:10:39', 1, '2014-11-07 14:10:39');

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
  KEY `cod_parroquia` (`cod_parroquia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `direccion_p_a`
--

INSERT INTO `direccion_p_a` (`codigo`, `cod_parroquia`, `direccion_exacta`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(1, 1, 'la calle tal apartamento tal', 1, 1, '2014-11-07 13:57:34', 1, '2014-11-07 13:57:34'),
(2, 1, 'la calle tal apartamento tal', 1, 1, '2014-11-07 13:57:34', 1, '2014-11-07 13:57:34'),
(3, 2, 'la calle tal apartamento tal', 1, 1, '2014-11-07 13:57:34', 1, '2014-11-07 13:57:34');

-- --------------------------------------------------------

--
-- Table structure for table `directivo`
--

CREATE TABLE IF NOT EXISTS `directivo` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `p_nombre` varchar(20) NOT NULL,
  `s_nombre` varchar(20) DEFAULT 'Sin Registro',
  `p_apellido` varchar(20) NOT NULL,
  `s_apellido` varchar(20) DEFAULT 'Sin Registro',
  `nacionalidad` enum('v','e') NOT NULL DEFAULT 'v',
  `cedula` varchar(8) NOT NULL DEFAULT 'sinDatos',
  `celular` varchar(11) DEFAULT 'SinRegistro',
  `telefono` varchar(11) DEFAULT 'SinRegistro',
  `telefono_otro` varchar(11) DEFAULT 'SinRegistro',
  `nivel_instruccion` tinyint(1) unsigned NOT NULL,
  `titulo` varchar(80) DEFAULT 'Sin Registros',
  `fec_nac` date NOT NULL,
  `sexo` tinyint(1) unsigned NOT NULL,
  `email` varchar(50) DEFAULT 'Sin Registro',
  `cod_direccion` int(10) unsigned NOT NULL,
  `cod_usr` int(10) unsigned NOT NULL,
  `cod_cargo` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `email` (`email`),
  KEY `cod_usr` (`cod_usr`),
  KEY `nivel_instruccion` (`nivel_instruccion`),
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
  `p_nombre` varchar(20) NOT NULL,
  `s_nombre` varchar(20) DEFAULT 'Sin Registro',
  `p_apellido` varchar(20) NOT NULL,
  `s_apellido` varchar(20) DEFAULT 'Sin Registro',
  `nacionalidad` enum('v','e') NOT NULL DEFAULT 'v',
  `cedula` varchar(8) NOT NULL DEFAULT 'sinDatos',
  `celular` varchar(11) DEFAULT 'SinRegistro',
  `telefono` varchar(11) DEFAULT 'SinRegistro',
  `telefono_otro` varchar(11) DEFAULT 'SinRegistro',
  `nivel_instruccion` tinyint(1) unsigned NOT NULL,
  `titulo` varchar(80) DEFAULT 'Sin Registros',
  `fec_nac` date NOT NULL,
  `sexo` tinyint(1) unsigned NOT NULL,
  `email` varchar(50) DEFAULT 'Sin Registro',
  `cod_direccion` int(10) unsigned NOT NULL,
  `cod_usr` int(10) unsigned NOT NULL,
  `cod_cargo` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `email` (`email`),
  KEY `cod_usr` (`cod_usr`),
  KEY `nivel_instruccion` (`nivel_instruccion`),
  KEY `cod_cargo` (`cod_cargo`),
  KEY `sexo` (`sexo`),
  KEY `cod_direccion` (`cod_direccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `docente`
--

INSERT INTO `docente` (`codigo`, `p_nombre`, `s_nombre`, `p_apellido`, `s_apellido`, `nacionalidad`, `cedula`, `celular`, `telefono`, `telefono_otro`, `nivel_instruccion`, `titulo`, `fec_nac`, `sexo`, `email`, `cod_direccion`, `cod_usr`, `cod_cargo`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(1, 'Carrie-Anne', 'Sin Registro', 'Moss', 'Sin Registro', 'e', 'sinDatos', '19191919191', 'SinRegistro', 'SinRegistro', 6, 'Sin Registros', '2014-11-02', 1, 'cantves@unareal.mierda', 1, 2, 6, 1, 1, '2014-11-07 14:14:41', 1, '2014-11-07 14:14:41');

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
(1, 'Distrito Capital', 1, 1, '2014-11-07 13:57:02', 1, '2014-11-07 13:57:02'),
(2, 'Anzoátegui', 1, 1, '2014-11-07 13:57:02', 1, '2014-11-07 13:57:02'),
(3, 'Amazonas', 1, 1, '2014-11-07 13:57:02', 1, '2014-11-07 13:57:02'),
(4, 'Apure', 1, 1, '2014-11-07 13:57:02', 1, '2014-11-07 13:57:02'),
(5, 'Aragua', 1, 1, '2014-11-07 13:57:02', 1, '2014-11-07 13:57:02'),
(6, 'Barinas', 1, 1, '2014-11-07 13:57:02', 1, '2014-11-07 13:57:02'),
(7, 'Bolívar', 1, 1, '2014-11-07 13:57:02', 1, '2014-11-07 13:57:02'),
(8, 'Carabobo', 1, 1, '2014-11-07 13:57:02', 1, '2014-11-07 13:57:02'),
(9, 'Cojedes', 1, 1, '2014-11-07 13:57:02', 1, '2014-11-07 13:57:02'),
(10, 'Delta Amacuro', 1, 1, '2014-11-07 13:57:02', 1, '2014-11-07 13:57:02'),
(11, 'Falcón', 1, 1, '2014-11-07 13:57:02', 1, '2014-11-07 13:57:02'),
(12, 'Guárico', 1, 1, '2014-11-07 13:57:02', 1, '2014-11-07 13:57:02'),
(13, 'Lara', 1, 1, '2014-11-07 13:57:02', 1, '2014-11-07 13:57:02'),
(14, 'Mérida', 1, 1, '2014-11-07 13:57:02', 1, '2014-11-07 13:57:02'),
(15, 'Miranda', 1, 1, '2014-11-07 13:57:02', 1, '2014-11-07 13:57:02'),
(16, 'Monagas', 1, 1, '2014-11-07 13:57:02', 1, '2014-11-07 13:57:02'),
(17, 'Nueva Esparta', 1, 1, '2014-11-07 13:57:02', 1, '2014-11-07 13:57:02'),
(18, 'Portuguesa', 1, 1, '2014-11-07 13:57:02', 1, '2014-11-07 13:57:02'),
(19, 'Sucre', 1, 1, '2014-11-07 13:57:02', 1, '2014-11-07 13:57:02'),
(20, 'Táchira', 1, 1, '2014-11-07 13:57:02', 1, '2014-11-07 13:57:02'),
(21, 'Trujillo', 1, 1, '2014-11-07 13:57:02', 1, '2014-11-07 13:57:02'),
(22, 'Yaracuy', 1, 1, '2014-11-07 13:57:02', 1, '2014-11-07 13:57:02'),
(23, 'Vargas', 1, 1, '2014-11-07 13:57:02', 1, '2014-11-07 13:57:02'),
(24, 'Zulia', 1, 1, '2014-11-07 13:57:02', 1, '2014-11-07 13:57:02');

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
(1, 1, 'Libertador', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(2, 15, 'Baruta', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(3, 15, 'Chacao', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(4, 15, 'Sucre', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(5, 15, 'El Hatillo', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(6, 15, 'Acevedo', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(7, 15, 'Andres Bello', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(8, 15, 'Brion', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(9, 15, 'Buroz', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(10, 15, 'Carrizal', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(11, 15, 'Cristobal Rojas', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(12, 15, 'Guacaipuro', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(13, 15, 'Independencia', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(14, 15, 'Lander', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(15, 15, 'Los Salias', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(16, 15, 'Paez', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(17, 15, 'Paz Castillo', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(18, 15, 'Pedro Gual', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(19, 15, 'Plaza', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(20, 15, 'Simon Bolivar', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(21, 15, 'Urdaneta', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(22, 15, 'Zamora', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(23, 23, 'Vargas', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(24, 12, 'Camaguan', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(25, 12, 'Chaguaramas', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(26, 12, 'El Socorro', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(27, 12, 'Francisco de Miranda', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(28, 12, 'Jose Felix Ribas', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(29, 12, 'Jose Tadeo Monagas', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(30, 12, 'Juan German Roscio', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(31, 12, 'Julian Mellado', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(32, 12, 'Las Mercedes del Llano', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(33, 12, 'Leonardo Infante', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(34, 12, 'Ortiz', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(35, 12, 'Pedro Zaraza', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(36, 12, 'San Geronimo de Guayabal', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(37, 12, 'San Jose de Guaribe', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(38, 12, 'Santa Maria de Ipire', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(39, 5, 'Bolivar', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(41, 5, 'Camatagua', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(42, 5, 'Francisco Linares', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(43, 5, 'Giradot', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(44, 5, 'Jose Angel Lamas', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(45, 5, 'Jose Felix Ribas', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(46, 5, 'Jose Revenga', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(47, 5, 'Libertador', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(48, 5, 'Mario Iragorry', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(49, 5, 'Ocumare de la costa', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(50, 5, 'San Casimiro', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(51, 5, 'San Sebastian', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(52, 5, 'Santiago Mariño', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(53, 5, 'Santos Michelena', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(54, 5, 'Sucre', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(55, 5, 'Tovar', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(56, 5, 'Urdaneta', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(57, 5, 'Zamora', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(58, 8, 'Bejuma', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(59, 8, 'Carlos Arevalo', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(60, 8, 'Diego Ibarra', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(61, 8, 'Guacara', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(62, 8, 'Juan Jose Mora', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(63, 8, 'Libertador', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(64, 8, 'Los Guayos', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(65, 8, 'Miranda', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(66, 8, 'Montalban', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(67, 8, 'Naguanagua', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(68, 8, 'Puerto Cabello', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(69, 8, 'San Diego', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(70, 8, 'San Joaquin', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(71, 8, 'Valencia', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(72, 2, 'Anaco', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(73, 2, 'Aragua', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(74, 2, 'Bolivar', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(75, 2, 'Bruzual', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(76, 2, 'Cajigal', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(77, 2, 'Carvajal', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(78, 2, 'Diego Bautista Urbaneja', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(79, 2, 'Freites', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(80, 2, 'Guanipa', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(81, 2, 'Guanta', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(82, 2, 'Independencia', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(83, 2, 'Libertad', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(84, 2, 'Mcgregor', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(85, 2, 'Miranda', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(86, 2, 'Monagas', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(87, 2, 'Peñalver', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(88, 2, 'Piritu', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(89, 2, 'San Juan de Capistrano', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(90, 2, 'Santa Ana', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(91, 2, 'Simón Rodriguez', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(92, 2, 'Sotillo', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(93, 3, 'Alto Orinoco', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(94, 3, 'Atabapo', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(95, 3, 'Atures', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(96, 3, 'Autana', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(97, 3, 'Manapiare', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(98, 3, 'Maroa', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(99, 3, 'Rio Negro', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(100, 4, 'Achaguas', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(101, 4, 'Biruaca', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(102, 4, 'Muños', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(103, 4, 'Paez', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(104, 4, 'Pedro Camejo', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(105, 4, 'Romulo Gallegos', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(106, 4, 'San Fernando', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(107, 6, 'Alberto Arvelo Torrealba', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(108, 6, 'Andrés Eloy Blanco', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(109, 6, 'Antonio José de Sucre', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(110, 6, 'Arismendi', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(111, 6, 'Barinas', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(112, 6, 'Bolívar', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(113, 6, 'Cruz Paredes', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(114, 6, 'Ezequiel Zamora', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(115, 6, 'Obispos', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(116, 6, 'Pedraza', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(117, 6, 'Rojas', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(118, 6, 'Sosa', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(119, 7, 'Caroní', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(120, 7, 'Cedeño', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(121, 7, 'El Callao', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(122, 7, 'Gran Sabana', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(123, 7, 'Heres', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(124, 7, 'Piar', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(125, 7, 'Raul Leoni', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(126, 7, 'Roscio', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(127, 7, 'Sifontes', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(128, 7, 'Sucre', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(129, 7, 'Padre Pedro Chen', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(130, 9, 'Anzoategui', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(131, 9, 'Falcon', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(132, 9, 'Giraldot', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(133, 9, 'Lima Blanco', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(134, 9, 'Pao de San Juan Bautista', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(135, 9, 'Ricaurte', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(136, 9, 'Rómulo Gallegos', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(137, 9, 'San Carlos', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(138, 9, 'Tinaco', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(139, 10, 'Antonio Díaz', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(140, 10, 'Casacoima', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(141, 10, 'Pedernales', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(142, 10, 'Tucupita', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(143, 11, 'Acosta', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(144, 11, 'Bolívar', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(145, 11, 'Buchivacoa', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(146, 11, 'Cacique Manaure', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(147, 11, 'Carirubana', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(148, 11, 'Colina', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(149, 11, 'Dabajuro', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(150, 11, 'Democracia', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(151, 11, 'Falcón', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(152, 11, 'Federacion', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(153, 11, 'Jacura', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(154, 11, 'Los Taques', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(155, 11, 'Mauroa', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(156, 11, 'Miranda', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(157, 11, 'Monseñor Iturriza', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(158, 11, 'Palmasola', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(159, 11, 'Petit', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(160, 11, 'Piritu', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(161, 11, 'San Francisco', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(162, 11, 'Silva', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(163, 11, 'Sucre', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(164, 11, 'Tocopero', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(165, 11, 'Union', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(166, 11, 'Urumaco', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(167, 11, 'Zamora', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(168, 13, 'Andrés Eloy Blanco', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(169, 13, 'Crespo', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(170, 13, 'Iribarren', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(171, 13, 'Jiménez', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(172, 13, 'Morán', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(173, 13, 'Palavecino', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(174, 13, 'Simón Planas', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(175, 13, 'Torres', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(176, 13, 'Urdaneta', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(177, 14, 'Alberto Adriani', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(178, 14, 'Andrés Bello ', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(179, 14, 'Antonio Pinto Salinas ', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(180, 14, 'Acarigua', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(181, 14, 'Arzobispo Chacón', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(182, 14, 'Campo Elías', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(183, 14, 'Caracciolo Parra Olmedo ', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(184, 14, 'Cardenal Quintero', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(185, 14, 'Guaraque', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(186, 14, 'Julio César Salas ', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(187, 14, 'Justo Briceño', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(188, 14, 'Libertador', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(189, 14, 'Miranda', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(190, 14, 'Obispo Ramos de Lora ', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(191, 14, 'Padre Norega', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(192, 14, 'Pueblo Llano', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(193, 14, 'Rangel', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(194, 14, 'Rivas Dávila', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(195, 14, 'Santos Marquina', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(196, 14, 'Sucre', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(197, 14, 'Tovar', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(198, 14, 'Tulio Febres Cordero', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(199, 14, 'Zea', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(200, 16, 'Acosta', 1, 2, '2014-11-07 13:57:11', 2, '2014-11-07 13:57:11'),
(201, 16, 'Aguasay', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(202, 16, 'Bolívar', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(203, 16, 'Caripe', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(204, 16, 'Cedeño', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(205, 16, 'Ezequiel Zamora', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(206, 16, 'Libertador', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(207, 16, 'Maturín', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(208, 16, 'Piar', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(209, 16, 'Punceres', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(210, 16, 'Santa Bárbara', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(211, 16, 'Sotillo', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(212, 16, 'Uracoa', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(213, 17, 'Antolín del Campo', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(214, 17, 'Arismendi', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(215, 17, 'Díaz', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(216, 17, 'García', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(217, 17, 'Gómez', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(218, 17, 'Maneiro', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(219, 17, 'Marcano', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(220, 17, 'Mariño', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(221, 17, 'Península de Macanao', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(222, 17, 'Tubores', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(223, 17, 'Villalba', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(224, 18, 'Agua Blanca', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(225, 18, 'Araure', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(226, 18, 'Esteller', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(227, 18, 'Guanare', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(228, 18, 'Guanarito', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(229, 18, 'Monseñor José Vicenti de Unda', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(230, 18, 'Ospino', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(231, 18, 'Páez', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(232, 18, 'Papelón', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(233, 18, 'San Genaro de Boconoíto', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(234, 18, 'San Rafael de Onoto', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(235, 18, 'Santa Rosalía', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(236, 18, 'Sucre', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(237, 18, 'Turén', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(238, 19, 'Andrés Eloy Blanco19', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(239, 19, 'Andrés Mata', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(240, 19, 'Arismendi', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(241, 19, 'Benítez', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(242, 19, 'Beremúdez', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(243, 19, 'Bolívar', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(244, 19, 'Cagigal', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(245, 19, 'Cruz Salmerón Acosta', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(246, 19, 'Libertador', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(247, 19, 'Mariño', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(248, 19, 'Mejía', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(249, 19, 'Montes', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(250, 19, 'Ribero', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(251, 19, 'Sucre', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(252, 19, 'Valdez', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(253, 20, 'Andrés Bello', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(254, 20, 'Antonio Rómulo Costa', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(255, 20, 'Ayacucho', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(256, 20, 'Bolívar', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(257, 20, 'Cárdenas', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(258, 20, 'Córdova', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(259, 20, 'Fernández Feo', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(260, 20, 'Francisco de Miranda', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(261, 20, 'García de Hevia', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(262, 20, 'Guásimos', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(263, 20, 'Independencia', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(264, 20, 'Jáuregui', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(265, 20, 'José María Vargas', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(266, 20, 'Junín', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(267, 20, 'Libertad', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(268, 20, 'Libertador', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(269, 20, 'Lobatera', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(270, 20, 'Michelena', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(271, 20, 'Panamericano', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(272, 20, 'Pedro María Ureña', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(273, 20, 'Rafael Urdaneta', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(274, 20, 'Samuel Darío Maldonado', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(275, 20, 'San Cristóbal', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(276, 20, 'Seboruco', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(277, 20, 'Simón Rodríguez', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(278, 20, 'Sucre', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(279, 20, 'Torbes', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(280, 20, 'Uribante', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(281, 20, 'San Judas Tadeo', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(282, 21, 'Andrés Bello', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(283, 21, 'Boconó', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(284, 21, 'Bolívar', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(285, 21, 'Candelaria', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(286, 21, 'Carache', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(287, 21, 'Escuque', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(288, 21, 'José Felipe Márquez Cañizalez', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(289, 21, 'Juan Vicente Campos Elías', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(290, 21, 'La Ceiba', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(291, 21, 'Miranda', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(292, 21, 'Monte Carmelo', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(293, 21, 'Motatán', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(294, 21, 'Pampán', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(295, 21, 'Pampanito', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(296, 21, 'Rafael Rangel', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(297, 21, 'San Rafael de Carvajal', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(298, 21, 'Sucre', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(299, 21, 'Trujillo', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(300, 21, 'Urdaneta', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(301, 21, 'Valera', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(302, 22, 'Veroes', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(303, 22, 'Arístides Bastidas', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(304, 22, 'Bolívar', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(305, 22, 'Bruzal', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(306, 22, 'Cocorote', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(307, 22, 'Independencia', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(308, 22, 'José Antonio Páez', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(309, 22, 'La Trinidad', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(310, 22, 'Manuel Monge', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(311, 22, 'Nirgua', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(312, 22, 'Peña', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(313, 22, 'San Felipe', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(314, 22, 'Sucre', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(315, 22, 'Urachiche', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(316, 24, 'Almirante Padilla', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(317, 24, 'Baralt', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(318, 24, 'Cabimas', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(319, 24, 'Catatumbo', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(320, 24, 'Colón', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(321, 24, 'Francisco Javier Pulgar', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(322, 24, 'Jesús Enrique Losada', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(323, 24, 'La Cañada de Urdaneta', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(324, 24, 'Lagunillas', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(325, 24, 'Machiques de Perijá', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(326, 24, 'Mara', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(327, 24, 'Maracaibo', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(328, 24, 'Miranda', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(329, 24, 'Páez', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(330, 24, 'Rosario de Perijá', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(331, 24, 'San Francisco', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(332, 24, 'Santa Rita', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(333, 24, 'Simón Bolívar', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(334, 24, 'Sucre', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(335, 24, 'Valmore Rodríguez', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11'),
(336, 24, 'Jesús María Semprún', 1, 1, '2014-11-07 13:57:11', 1, '2014-11-07 13:57:11');

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
(0, 'N/S', 1, 1, '2014-11-07 13:53:51', 1, '2014-11-07 13:53:51'),
(1, 'Inicial', 1, 1, '2014-11-07 13:53:51', 1, '2014-11-07 13:53:51'),
(2, 'Primaria', 1, 1, '2014-11-07 13:53:51', 1, '2014-11-07 13:53:51'),
(3, 'Diversificada', 1, 1, '2014-11-07 13:53:51', 1, '2014-11-07 13:53:51'),
(4, 'Tecnico Medio', 1, 1, '2014-11-07 13:53:51', 1, '2014-11-07 13:53:51'),
(5, 'Tecnico Superior', 1, 1, '2014-11-07 13:53:51', 1, '2014-11-07 13:53:51'),
(6, 'Universitario', 1, 1, '2014-11-07 13:53:51', 1, '2014-11-07 13:53:51'),
(7, 'Post-grado', 1, 1, '2014-11-07 13:53:51', 1, '2014-11-07 13:53:51'),
(8, 'Doctorado', 1, 1, '2014-11-07 13:53:51', 1, '2014-11-07 13:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `obtiene`
--

CREATE TABLE IF NOT EXISTS `obtiene` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_p_a` int(10) unsigned NOT NULL,
  `cod_alu` int(10) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  KEY `cod_alu` (`cod_alu`),
  KEY `cod_p_a` (`cod_p_a`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `obtiene`
--

INSERT INTO `obtiene` (`codigo`, `cod_p_a`, `cod_alu`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(1, 1, 1, 1, 1, '2014-11-07 14:05:49', 1, '2014-11-07 14:05:49'),
(2, 2, 1, 1, 1, '2014-11-07 14:05:49', 1, '2014-11-07 14:05:49'),
(3, 3, 1, 1, 1, '2014-11-07 14:05:49', 1, '2014-11-07 14:05:49'),
(4, 1, 2, 1, 1, '2014-11-07 14:05:49', 1, '2014-11-07 14:05:49'),
(5, 2, 2, 1, 1, '2014-11-07 14:05:49', 1, '2014-11-07 14:05:49'),
(6, 3, 2, 1, 1, '2014-11-07 14:05:49', 1, '2014-11-07 14:05:49');

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
(1, 1, 'Altagracia', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(2, 1, 'Antímano', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(3, 1, 'Caricuao', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(4, 1, 'Catedral', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(5, 1, 'Coche', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(6, 1, 'El Junquito', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(7, 1, 'El paraíso', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(8, 1, 'El Recreo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(9, 1, 'El Valle', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(10, 1, 'La Candelaria', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(11, 1, 'La Pastora', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(12, 1, 'La Vega', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(13, 1, 'Macarao', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(14, 1, 'San Agustín', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(15, 1, 'San Bernardino', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(16, 1, 'San José', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(17, 1, 'San Juan', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(18, 1, 'Santa Rosalia', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(19, 1, 'Santa Teresa', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(20, 1, 'Sucre', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(21, 1, '23 de enero', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(22, 1, 'San Pedro', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(23, 2, 'El Cafetal', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(24, 2, 'Las minas de Baruta', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(25, 2, 'Nuestra Señora del Rosario', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(26, 3, 'Chacao', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(27, 4, 'Petare', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(28, 4, 'Leoncio Martinez', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(29, 4, 'La Dolorita', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(30, 4, 'Caucaguita', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(31, 4, 'Filas de Mariche', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(32, 6, 'Araguita', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(33, 6, 'Arevalo Gonzalez', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(34, 6, 'Capaya', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(35, 6, 'Caucagua', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(36, 6, 'El Cafe', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(37, 6, 'Marizapa', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(38, 6, 'Panaquire', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(39, 6, 'Ribas', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(40, 7, 'Cumbo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(41, 7, 'San Jose Barlovento', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(42, 8, 'Curiepe', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(43, 8, 'Higuerote', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(44, 8, 'Tacarigua', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(45, 9, 'Mamporal', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(46, 10, 'Carrizal', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(47, 11, 'Charallave', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(48, 11, 'Las Brisas', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(49, 12, 'Altagracia de la M', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(50, 12, 'Cecilio Acosta', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(51, 12, 'El Jarillo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(52, 12, 'Los Teques', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(53, 12, 'Paracotos', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(54, 12, 'San Pedro', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(55, 12, 'Tacata', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(56, 13, 'El Cartanal', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(57, 13, 'Sta Teresa del Tuy', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(58, 14, 'La Democracia', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(59, 14, 'Ocumare del Tuy', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(60, 14, 'Santa Barbara', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(61, 15, 'San Antonio de los altos', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(62, 16, 'El Guapo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(63, 16, 'Paparo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(64, 16, 'Tacarigua de la laguna', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(65, 16, 'Rio Chico', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(66, 16, 'San Fernardo del Guapo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(67, 17, 'Santa Lucia', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(68, 18, 'Cupira', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(69, 18, 'Machurucuto', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(70, 19, 'Guarenas', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(71, 20, 'San Francisco de Yare', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(72, 20, 'San Antonio de Yare', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(73, 21, 'Cua', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(74, 21, 'Nueva Cua', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(75, 22, 'Bolivar', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(76, 22, 'Guatire', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(77, 23, 'Caraballeda', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(78, 23, 'Carayaca', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(79, 23, 'Carlos Soublette', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(80, 23, 'Caruao', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(81, 23, 'Catia la mar', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(82, 23, 'El Junko', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(83, 23, 'La Guaira', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(84, 23, 'Macuto', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(85, 23, 'Maiquetia', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(86, 23, 'Naiguata', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(87, 23, 'Urimare', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(88, 24, 'Camaguan', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(89, 24, 'Puerto Miranda', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(90, 24, 'Uverito', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(91, 25, 'Chaguaramas', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(92, 26, 'El Socorro', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(93, 27, 'Calabozo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(94, 27, 'El Calvario', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(95, 27, 'El rastro', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(96, 27, 'Guardatinajas', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(97, 28, 'San Rafael de Laya', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(98, 28, 'Tucupido', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(99, 29, 'Altagracia de Orituco', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(100, 29, 'Lezama', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(101, 29, 'Libertad de Orituco', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(102, 29, 'Paso real de Macaira', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(103, 29, 'San Fco de Macaira', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(104, 29, 'San Rafael de Orituco', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(105, 29, 'Soublette', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(106, 30, 'Cantagallo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(107, 30, 'Parapara', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(108, 30, 'San Juan de los Morros', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(109, 31, 'El Sombrero', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(110, 31, 'Sosa', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(111, 32, 'Cabruta', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(112, 32, 'Las Mercedes', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(113, 32, 'Santa Rita de Manapire', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(114, 33, 'Espino', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(115, 33, 'Valle de la Pascua', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(116, 34, 'Ortiz', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(117, 34, 'Sn Fco de Tiznados', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(118, 34, 'San Jose de Tiznados', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(119, 34, 'Sn Lorenzo de tiznados', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(120, 35, 'San Jose de Unare', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(121, 35, 'Zaraza', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(122, 36, 'Cazorla', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(123, 36, 'Guayabal', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(124, 37, 'San Jose de Guaribe', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(125, 38, 'Altamira', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(126, 38, 'Santa Maria de Ipire', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(127, 39, 'San Mateo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(128, 41, 'Carmen de Cura', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(129, 41, 'Camatagua', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(130, 42, 'Santa Rita', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(131, 42, 'Francisco de Miranda', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(132, 42, 'Mons Feliciano', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(133, 43, 'Andres Eloy Blanco', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(134, 43, 'Choroni', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(135, 43, 'Joaquin Crespo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(136, 43, 'Jose Casanova Godoy', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(137, 43, 'Las Delicias', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(138, 43, 'Los Tacariguas', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(139, 43, 'Madre Ma de San Jose', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(140, 43, 'Pedro Jose Ovalies', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(141, 44, 'Santa Cruz', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(142, 45, 'Castor Nieves Rios', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(143, 45, 'La Victoria', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(144, 45, 'Las Guacamayas', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(145, 45, 'Pao de Zarate', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(146, 45, 'Zuata', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(147, 46, 'El Consejo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(148, 47, 'Palo Negro', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(149, 47, 'Martin de Porres', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(150, 48, 'Ca de Azucar', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(151, 48, 'El Limon', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(152, 49, 'Ocumare de la costa', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(153, 50, 'San Casimiro', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(154, 50, 'Guiripa', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(155, 50, 'Ollas de Caramacate', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(156, 50, 'Valle Morin', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(157, 51, 'San Sebastian', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(158, 52, 'Alfredo Pacheco', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(159, 52, 'Arevalo Aponte', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(160, 52, 'Chuao', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(161, 52, 'Turumero', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(162, 52, 'Saman de Guere', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(163, 53, 'Las Tejerias', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(164, 53, 'Tiara', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(165, 54, 'Bella Vista', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(166, 54, 'Cagua', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(167, 55, 'Colonia Tovar', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(168, 56, 'Barbacoas', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(169, 56, 'Las Peñitas', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(170, 56, 'San Francisco de Cara', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(171, 56, 'Taguay', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(172, 57, 'Augusto Mijares', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(173, 57, 'Villa de cura', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(174, 57, 'Magdaleno', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(175, 57, 'Sam Francisco de Asis', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(176, 57, 'Valles de Tucutunemo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(177, 58, 'Bejuma', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(178, 58, 'Canoabo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(179, 58, 'Simon Bolivar', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(180, 59, 'Belen', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(181, 59, 'Guigue', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(182, 59, 'Tacarigua', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(183, 60, 'Agua Caliente', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(184, 60, 'Mariara', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(185, 61, 'Ciudad Alianza', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(186, 61, 'Guacara', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(187, 61, 'Yagua', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(188, 62, 'Moron', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(189, 62, 'Urama', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(190, 63, 'Independencia', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(191, 63, 'Tocuyito', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(192, 64, 'Los Guayos', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(193, 65, 'Miranda', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(194, 66, 'Montalban', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(195, 67, 'Naguanagua', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(196, 68, 'Bartolome Salom', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(197, 68, 'Borburata', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(198, 68, 'Democracia', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(199, 68, 'Fraternidad', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(200, 68, 'Goaigoaza', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(201, 68, 'Juan Jose Flores', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(202, 68, 'Patanemo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(203, 68, 'Union', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(204, 69, 'San Diego', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(205, 70, 'San Joaquin', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(206, 71, 'Candelaria', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(207, 71, 'Catedral', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(208, 71, 'El Socorro', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(209, 71, 'Miguel Peña', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(210, 71, 'Negro Primero', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(211, 71, 'Rafael Urdaneta', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(212, 71, 'San Bias', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(213, 71, 'San Jose', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(214, 71, 'Santa Rosa', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(215, 5, 'El Hatillo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(216, 93, 'Alto Orinoco La Esmeralda', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(217, 93, 'Huachamacare Acanaña', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(218, 93, 'Marawaka Toky Shamanaña', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(219, 93, 'Mavaka Mavaka', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(220, 93, 'Sierra Parima Parimabé', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(221, 94, 'Ucata Laja Lisa', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(222, 94, 'Yapacana Macuruco', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(223, 94, 'Caname Guarinuma', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(224, 95, 'Fernando Girón Tovar Puerto Ayacucho', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(225, 95, 'Luis Alberto Gómez Puerto Ayacucho', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(226, 95, 'Pahueña Limón de Parhueña', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(227, 95, 'Platanillal Platanillal', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(228, 96, 'Samariapo Samariapo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(229, 96, 'Sipapo Pendare', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(230, 96, 'Munduapo Munduapo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(231, 96, 'Guayapo San Pedro del Orinoco', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(232, 97, 'Alto Ventuari Cacurí', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(233, 97, 'Medio Ventuari Manami', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(234, 97, 'Ventuari Marueta', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(235, 98, 'Victorino', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(236, 98, 'Comunidad', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(237, 99, 'Casiquiare Curimacare', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(238, 99, 'Cucuy', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(239, 99, 'Casiquiare Curimacare', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(240, 99, 'Solano Solano', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(241, 72, 'Anaco', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(242, 72, 'San Joaquín', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(243, 73, 'Cachipo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(244, 73, 'Aragua de Barcelona', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(245, 78, 'Lechería', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(246, 78, 'El Morro', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(247, 87, 'Puerto Píritu', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(248, 87, 'San Miguel', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(249, 87, 'Sucre', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(250, 77, 'Valle de Guanape', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(251, 77, 'Santa Bárbara', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(252, 85, 'Atapirire', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(253, 85, 'Boca del Pao', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(254, 85, 'El Pao', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(255, 85, 'Pariaguán', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(256, 81, 'Guanta', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(257, 81, 'Chorrerón', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(258, 82, 'Mamo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(259, 82, 'Soledad', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(260, 86, 'Mapire', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(261, 86, 'Piar', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(262, 86, 'Santa Clara', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(263, 86, 'San Diego de Cabrutica', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(264, 86, 'Uverito', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(265, 86, 'Zuata', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(266, 92, 'Puerto La Cruz', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(267, 92, 'Pozuelos', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(268, 76, 'Onoto', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(269, 76, 'San Pablo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(270, 83, 'San Mateo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(271, 83, 'El Carito', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(272, 83, 'Santa Inés', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(273, 83, 'La Romereña', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(274, 75, 'Clarines', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(275, 75, 'Guanape', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(276, 75, 'Sabana de Uchire', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(277, 79, 'Cantaura', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(278, 79, 'Libertador', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(279, 79, 'Santa Rosa', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(280, 79, 'Urica', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(281, 88, 'Píritu', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(282, 88, 'San Francisco', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(283, 80, 'San José de Guanipa', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(284, 89, 'Boca de Uchire', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(285, 89, 'Boca de Chávez', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(286, 90, 'Pueblo Nuevo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(287, 90, 'Santa Ana', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(288, 74, 'Bergatín', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(289, 74, 'Caigua', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(290, 74, 'El Carmen', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(291, 74, 'El Pilar', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(292, 74, 'Naricual', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(293, 74, 'San Cristóbal', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(294, 91, 'Edmundo Barrios', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(295, 91, 'Miguel Otero Silva', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(296, 84, 'El Chaparro', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(297, 84, 'Tomás Alfaro', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(298, 84, 'Calatrava', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(299, 100, 'Achaguas', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(300, 100, 'Apurito', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(301, 100, 'El Yagual', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(302, 100, 'Guachara', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(303, 100, 'Mucuritas', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(304, 100, 'Queseras del medio', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(305, 101, 'Biruaca', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(306, 102, 'Bruzual', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(307, 102, 'Mantecal', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(308, 102, 'Quintero', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(309, 102, 'Rincón Hondo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(310, 102, 'San Vicente', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(311, 104, 'San Juan de Payara', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(312, 104, 'Codazzzi', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(313, 104, 'Cunaviche', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(314, 106, 'San Fernando', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(315, 106, 'El Recre0', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(316, 106, 'Peñalver', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(317, 106, 'San Rafael de Atamaica', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(318, 103, 'Guasdualito', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(319, 103, 'Aramendi', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(320, 103, 'El Amparo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(321, 103, 'San Camilo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(322, 103, 'Urdaneta', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(323, 105, 'Elorza', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(324, 105, 'La Trinidad', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(325, 107, 'Sabaneta', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(326, 107, 'Juan Antonio Rodríguez Domínguez', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(327, 108, 'El Cantón', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(328, 108, 'Santa Cruz de Guacas', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(329, 108, 'Puerto Vivas', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(330, 109, 'Ticoporo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(331, 109, 'Nicolás Pulido', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(332, 109, 'Andrés Bello', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(333, 110, 'Arismendi', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(334, 110, 'Guadarrama', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(335, 110, 'La Unión', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(336, 110, 'San Antonio', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(337, 111, 'Barinas', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(338, 111, 'Alberto Arvelo Larriva', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(339, 111, 'San Silvestre', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(340, 111, 'Santa Inés', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(341, 111, 'Santa Lucía', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(342, 111, 'Torunos', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(343, 111, 'El Carmen', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(344, 111, 'Rómulo Betancourt', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(345, 111, 'Corazón de Jesús', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(346, 111, 'Ramón Ignacio', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(347, 111, 'Alto Barinas', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(348, 111, 'Manuel Palacio Fajardo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(349, 111, 'Juan Antonio Rodríguez Domínguez', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(350, 111, 'Dominga Ortiz de Páez', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(351, 112, 'Barinitas', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(352, 112, 'Altamira de Cáceres', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(353, 112, 'Calderas', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(354, 113, 'Barracas', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(355, 113, 'El Socorro', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(356, 113, 'Mazparrito', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(357, 114, 'Santa Bárbara', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(358, 114, 'Pedro Briceño Méndez', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(359, 114, 'Ramón Ignacio Méndez', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(360, 114, 'José Ignacio del Pumar', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(361, 115, 'Obispos', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(362, 115, 'Los Guasimitos', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(363, 115, 'El Real', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(364, 115, 'La Luz', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(365, 116, 'Ciudad Bolívia', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(366, 116, 'José Ignacio Briceño', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(367, 116, 'José Félix Ribas', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(368, 116, 'Páez', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(369, 117, 'Libertad', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(370, 117, 'Dolores', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(371, 117, 'Santa Rosa', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(372, 117, 'Palacio Fajardo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(373, 117, 'Simón Rodríguez', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(374, 118, 'Ciudad de Nutrias', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(375, 118, 'El Regalo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(376, 118, 'Puerto Nutrias', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(377, 118, 'Santa Catalina', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(378, 118, 'Simón Bolívar', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(379, 119, 'Cachamay', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(380, 119, 'Chirica', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(381, 119, 'Dalla Costa', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(382, 119, 'Once de Abril', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(383, 119, 'Simón Bolívar', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(384, 119, 'Unare', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(385, 119, 'Universidad', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(386, 119, 'Vista al Sol', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(387, 119, 'Pozo Verde', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(388, 119, 'Yocoima', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(389, 119, '5 de Julio', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(390, 120, 'Cedeño', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(391, 120, 'Altagracia', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(392, 120, 'Ascensión Farreras', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(393, 120, 'Guaniamo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(394, 120, 'La Urbana', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(395, 120, 'Pijiguaos', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(396, 121, 'El Callao', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(397, 122, 'Gran Sabana', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(398, 122, 'Ikabarú', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(399, 123, 'Catedral', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(400, 123, 'Zea', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(401, 123, 'Orinoco', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(402, 123, 'José Antonio Páez', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(403, 123, 'Marhuanta', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(404, 123, 'Agua Salada', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(405, 123, 'Vista Hermosa', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(406, 123, 'La Sabanita', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(407, 123, 'Panapana', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(408, 129, 'Padre Pedro Chien', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(409, 129, 'Río Grande', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(410, 124, 'Andrés Eloy Blanco', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(411, 124, 'Pedro Cova', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(412, 125, 'Raúl Leoni', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(413, 125, 'Barceloneta', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(414, 125, 'Santa Bárbara', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(415, 125, 'San Francisco', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(416, 126, 'Roscio', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(417, 126, 'Salóm', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(418, 127, 'Sifontes', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(419, 127, 'Dalla Costa', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(420, 127, 'San Isidro ', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(421, 128, 'Sucre', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(422, 128, 'Aripao', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(423, 128, 'Guarataro', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(424, 128, 'Las Majadas', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(425, 128, 'Moitaco ', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(426, 130, 'Cojedes', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(427, 130, 'Juan de Mata Suárez', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(428, 134, 'El Pao', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(429, 131, 'Tinaquillo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(430, 132, 'El Baúl', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(431, 132, 'Sucre', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(432, 133, 'La Aguadita', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(433, 133, 'Macapo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(434, 135, 'El Amparo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(435, 135, 'Libertad de Cojedes', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(436, 136, 'Rómulo Gallegos', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(437, 137, 'San Carlos de Austria', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(438, 137, 'Juan Ángel Bravo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(439, 137, 'Manuel Manrique', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(440, 138, 'General en Jefe José Laurencio Silva', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(441, 139, 'Curiapo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(442, 139, 'Almirante Luis Brión', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(443, 139, 'Francisco Aniceto Lugo Boca de Cuyubini', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(444, 139, 'Manuel Renaud', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(445, 139, 'Padre Barral', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(446, 139, 'Santos de Abelgas', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(447, 140, 'Imataca Moruca', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(448, 140, 'Cinco de Julio Piacoa', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(449, 140, 'Juan Bautista Arismendi', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(450, 140, 'Manuel Piar Santa Catalina', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(451, 140, 'Rómulo Gallegos', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(452, 141, 'Pedernales', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(453, 141, 'Luis Beltrán Prieto Figueroa', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(454, 142, 'San José (Delta Amacuro) Hacienda del Medio', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(455, 142, 'José Vidal Marcano Caparal de Guara', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(456, 142, 'Juan Millán Urbanización Leonardo Ruíz Pineda', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(457, 142, 'Leonardo Ruíz Pineda Paloma', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(458, 142, 'Mariscal Antonio José de Sucre Urbanización Delfín Mendoza', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(459, 142, 'Monseñor Argimiro García San Rafael', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(460, 142, 'San Rafael', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(461, 142, 'Virgen del Valle', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(462, 143, 'Capadare', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(463, 143, 'La Pastora', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(464, 143, 'Libertador', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(465, 143, 'San Juan de los Cayos', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(466, 144, 'Aracua', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(467, 144, 'La Peña', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(468, 144, 'San Luis', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(469, 145, 'Bariro', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(470, 145, 'Borojó', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(471, 145, 'Capatárida', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(472, 145, 'Guajiro', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(473, 145, 'Seque', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(474, 145, 'Zazárida', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(475, 145, 'Valle de Eroa', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(476, 146, 'Cacique Manaure', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(477, 147, 'Norte', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(478, 147, 'Carirubana', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(479, 147, 'Santa Ana', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(480, 147, 'Urbana Punta Cardón', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(481, 148, 'La Vela de Coro', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(482, 148, 'Acurigua', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(483, 148, 'Guaibacoa', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(484, 148, 'Las Calderas', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(485, 148, 'Macoruca', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(486, 149, 'Dabajuro', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(487, 150, 'Agua Clara', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(488, 150, 'Avaria', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(489, 150, 'Pedregal', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(490, 150, 'Piedra Grande', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(491, 150, 'Purureche', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(492, 151, 'Adaure', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(493, 151, 'Adícora', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(494, 151, 'Baraived', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(495, 151, 'Buena Vista', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(496, 151, 'Jadacaquiva', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(497, 151, 'El Vínculo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(498, 151, 'El Hato', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(499, 151, 'Moruy', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(500, 151, 'Pueblo Nuevo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(501, 152, 'Agua Larga', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(502, 152, 'Churuguara', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(503, 152, 'El Paují', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(504, 152, 'Independencia', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(505, 152, 'Mapararí', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(506, 153, 'Jacura', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(507, 154, 'Los Taques', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(508, 155, 'Mene de Mauroa', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(509, 156, 'Guzmán Guillermo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(510, 156, 'Mitare ', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(511, 156, 'Río Seco', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(512, 156, 'Sabaneta', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(513, 156, 'Santa Ana', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(514, 157, 'Boca del Tocuyo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(515, 157, 'Chichiriviche', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(516, 158, 'Palmasola', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(517, 159, 'Cabure', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(518, 159, 'Curimagua', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(519, 160, 'San José de la Costa', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(520, 160, 'Píritu', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(521, 161, 'Capital San Francisco', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(522, 162, 'Tucacas', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(523, 162, 'Boca de Aroa', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(524, 163, 'Sucre', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(525, 164, 'Tocópero', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(526, 165, 'Santa Cruz de Bucaral', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(527, 166, 'Bruzual', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(528, 166, 'Urumaco', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(529, 167, 'Puerto Cumarebo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(530, 167, 'La Ciénaga', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(531, 167, 'La Soledad', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(532, 167, 'Pueblo Cumarebo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(533, 167, 'Zazárida', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(534, 168, 'Pio Tamayo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(535, 168, 'Quebrada Honda de Guache', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(536, 169, 'Freitez', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(537, 169, 'José María Blanco', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(538, 172, 'Anzoátegui', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(539, 172, 'Bolívar', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(540, 172, 'Guárico', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(541, 172, 'Hilario Luna y Luna', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(542, 173, 'Cabudare', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(543, 173, 'Agua Viva', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(544, 172, 'Morán', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(545, 174, 'Buría', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(546, 174, 'Sarare', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(547, 175, 'Altagracia', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(548, 175, 'Lara', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(549, 175, 'Chiquinquira', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(550, 176, 'Siquisique', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(551, 176, 'Moroturo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(552, 170, 'Barquisimeto', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(553, 171, 'Quibor', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(554, 177, 'Betancourt', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(555, 177, 'Páez', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(556, 177, 'Rómulo Gallegos', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(557, 177, 'Gabriel Picón Gonzále', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(558, 177, 'Héctor Amable Mora', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(559, 178, 'La Azulita', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(560, 179, 'Santa Cruz de Mora', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(561, 179, 'Mesa de Las Palmas', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(562, 180, 'Aricagua', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(563, 181, 'Capurí', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(564, 181, 'Chacantá', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(565, 181, 'Guaimaral', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(566, 181, 'Mucuchachí', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(567, 182, 'Fernández Peña (Ejido)', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(568, 182, 'Acequias', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(569, 182, 'Jají', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(570, 182, 'La Mesa', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(571, 182, 'San José del Sur', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(572, 183, 'Tucaní', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(573, 184, 'Santo Domingo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(574, 185, 'Guaraque', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(575, 186, 'Arapuey', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(576, 186, 'Palmira', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(577, 187, 'Torondoy', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(578, 188, 'Antonio Spinetti Dini', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(579, 188, 'Arias', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(580, 188, 'Caracciolo Parra Pérez', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(581, 188, 'Domingo Peña ', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(582, 188, 'El Llano', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(583, 188, 'Gonzalo Picón Febres', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(584, 188, 'Jacinto Plaza', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(585, 188, 'Juan Rodríguez Suárez', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(586, 188, 'Lasso de la Vega', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(587, 188, 'Mariano Picón Sala', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(588, 188, 'Milla', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(589, 188, 'Osuna Rodríguez', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(590, 188, 'Sagrario', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(591, 188, 'El Morro', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(592, 188, 'Los Nevados', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(593, 189, 'Andrés Eloy Blanco', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(594, 189, 'La Venta', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(595, 189, 'Piñango', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(596, 189, 'Timotes', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(597, 190, 'Eloy Paredes', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(598, 190, 'San Rafael de Alcázar', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(599, 191, 'Santa María de Caparo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(600, 192, 'Pueblo Llano', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(601, 193, 'Cacute', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(602, 193, 'Mucuchíes', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(603, 194, 'Gerónimo Maldonado', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(604, 194, 'Bailadores', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(605, 195, 'Tabay', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(606, 196, 'Chiguará', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(607, 196, 'Estánquez', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(608, 196, 'Lagunillas', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(609, 196, 'Pueblo Nuevo del Sur', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(610, 196, 'San Juan', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(611, 197, 'El Amparo', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(612, 197, 'El Llano', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(613, 197, 'San Francisco', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(614, 197, 'Tovar', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(615, 198, 'Independencia', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(616, 198, 'María de la Concepción Palacios Blanco', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(617, 198, 'Nueva Bolivia', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(618, 198, 'Santa Apolonia', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(619, 199, 'Caño El Tigre', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24'),
(620, 199, 'Zea', 1, 1, '2014-11-07 13:57:24', 1, '2014-11-07 13:57:24');
INSERT INTO `parroquia` (`codigo`, `cod_mun`, `descripcion`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(621, 200, 'San Antonio de Maturín', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(622, 200, 'San Francisco de Maturín', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(623, 201, 'Aguasay', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(624, 202, 'Caripito', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(625, 203, 'El Guácharo', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(626, 203, 'Caripe', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(627, 204, 'Capital Cedeño', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(628, 204, 'San Félix de Cantalicio', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(629, 205, 'El Tejero', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(630, 205, 'Punta de Mata', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(631, 206, 'Chaguaramas', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(632, 206, 'Temblador', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(633, 207, 'Alto de los Godos', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(634, 207, 'Boquerón', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(635, 207, 'Las Cocuizas', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(636, 207, 'La Cruz', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(637, 207, 'San Simón', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(638, 207, 'El Corozo', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(639, 207, 'El Furrial', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(640, 207, 'Jusepín', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(641, 207, 'La Pica', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(642, 207, 'San Vicente', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(643, 208, 'Aparicio', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(644, 208, 'Chaguamal', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(645, 208, 'El Pinto', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(646, 208, 'Guanaguana', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(647, 208, 'La Toscana', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(648, 209, 'Cachipo', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(649, 209, 'Quiriquire', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(650, 210, 'Santa Bárbara', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(651, 211, 'Barrancas', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(652, 212, 'Uracoa', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(653, 213, 'Antolín del Campo', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(654, 214, 'Arismendi', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(655, 215, 'San Juan Bautista', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(656, 215, 'Zabala', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(657, 216, 'García', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(658, 216, 'Francisco Fajardo', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(659, 217, 'Bolívar', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(660, 217, 'Guevara', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(661, 217, 'Cerro de Matasiete', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(662, 217, 'Santa Ana', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(663, 217, 'Sucre', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(664, 218, 'Aguirre', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(665, 218, 'Maneiro', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(666, 219, 'Adrián', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(667, 219, 'Juan Griego', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(668, 219, 'Yaguaraparo', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(669, 220, 'Porlamar', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(670, 221, 'San Francisco de Macanao', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(671, 221, 'Boca de Río', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(672, 222, 'Tubores', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(673, 223, 'Villalba', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(674, 224, 'Agua Blanca', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(675, 225, 'Araure', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(676, 226, 'Píritu', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(677, 226, 'Uveral', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(678, 227, 'Guanare', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(679, 228, 'Guanarito', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(680, 229, 'Peña Blanca', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(681, 230, 'Aparición', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(682, 230, 'Ospino', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(683, 231, 'Acarigua', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(684, 231, 'Payara', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(685, 232, 'Papelón', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(686, 233, 'Boconoíto', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(687, 234, 'San Rafael de Onoto', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(688, 234, 'Santa Fé', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(689, 235, 'Florida', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(690, 235, 'El Playón', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(691, 236, 'Biscucuy', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(692, 236, 'Concepción', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(693, 236, 'San José de Saguaz', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(694, 236, 'San Rafael de Palo Alzado', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(695, 236, 'Uvencio Antonio Velásquez', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(696, 236, 'Villa Rosa', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(697, 237, 'Canelones', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(698, 237, 'Santa Cruz', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(699, 237, 'San Isidro Labrador', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(700, 238, 'Mariño', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(701, 238, 'Rómulo Gallegos', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(702, 239, 'San José de Aerocuar', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(703, 239, 'Tavera Acosta', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(704, 240, 'Río Caribe', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(705, 240, 'Antonio José de Sucre', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(706, 240, 'El Morro de Puerto Santo', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(707, 240, 'Puerto Santo', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(708, 240, 'San Juan de las Galdonas', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(709, 241, 'El Pilar', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(710, 241, 'El Rincón', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(711, 241, 'General Francisco Antonio Váquez', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(712, 241, 'Guaraúnos', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(713, 241, 'Tunapuicito', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(714, 241, 'Unión', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(715, 242, 'Santa Catalina', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(716, 242, 'Santa Rosa', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(717, 242, 'Santa Teresa', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(718, 242, 'Bolívar', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(719, 242, 'Maracapana', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(720, 243, 'Bolívar', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(721, 244, 'El Paujil', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(722, 245, 'Cruz Salmerón Acosta', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(723, 245, 'Manicuare', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(724, 246, 'Tunapuy', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(725, 246, 'Campo Elías', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(726, 247, 'Irapa', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(727, 247, 'Campo Claro', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(728, 247, 'Maraval', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(729, 247, 'Soro', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(730, 248, 'Mejía', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(731, 249, 'Cumanacoa', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(732, 249, 'Aricagua', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(733, 249, 'San Fernando', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(734, 249, 'San Lorenzo', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(735, 250, 'Villa Frontado', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(736, 250, 'Catuaro', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(737, 250, 'Rendón', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(738, 250, 'San Cruz', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(739, 250, 'Santa María', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(740, 251, 'Altagracia', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(741, 251, 'Santa Inés', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(742, 251, 'Valentín Valiente', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(743, 251, 'Ayacucho', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(744, 251, 'San Juan', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(745, 251, 'Raúl Leoni', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(746, 251, 'Gran Mariscal', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(747, 252, 'Cristóbal Colón', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(748, 252, 'Bideau', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(749, 252, 'Punta de Piedras', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(750, 252, 'Güiria', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(751, 253, 'Andrés Bello', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(752, 254, 'Antonio Rómulo Costa', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(753, 255, 'Ayacucho', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(754, 255, 'San Pedro del Río', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(755, 256, 'Bolívar', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(756, 257, 'Cárdenas', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(757, 258, 'Córdoba', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(758, 259, 'Fernández Feo', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(759, 259, 'Alberto Adriani', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(760, 260, 'Francisco de Miranda', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(761, 261, 'García de Hevia', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(762, 261, 'Boca de Grita', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(763, 262, 'Guásimos', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(764, 263, 'Independencia', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(765, 262, 'Juan Germán Roscio', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(766, 264, 'Jáuregui', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(767, 265, 'José María Vargas', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(768, 266, 'Junín', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(769, 266, 'La Petrólea', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(770, 267, 'Libertad', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(771, 268, 'Capital Libertador', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(772, 269, 'Lobatera', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(773, 270, 'Michelena', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(774, 271, 'Panamericano', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(775, 272, 'Pedro María Ureña', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(776, 273, 'Delicias', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(777, 274, 'Samuel Darío Maldonado', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(778, 274, 'Boconó', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(779, 275, 'La Concordia', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(780, 275, 'San Juan Bautista', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(781, 275, 'Pedro María Morantes', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(782, 276, 'Seboruco', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(783, 277, 'Simón Rodríguez', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(784, 278, 'Sucre', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(785, 279, 'San José', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(786, 280, 'Uribante', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(787, 280, 'Juan Pablo Peñalosa', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(788, 280, 'Potosí', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(789, 281, 'San Judas Tadeo', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(800, 282, 'Araguaney', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(801, 282, 'El Jaguito', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(802, 283, 'Boconó', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(803, 284, 'Sabana Grande', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(804, 284, 'Cheregüé', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(805, 285, 'Arnoldo Gabaldón', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(806, 285, 'Bolivia', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(807, 285, 'Carrillo', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(808, 285, 'Manuel Salvador Ulloa', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(809, 286, 'Carache', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(810, 286, 'La Concepción', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(811, 286, 'Santa Cruz', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(812, 287, 'Escuque', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(813, 287, 'Santa Rita', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(814, 288, 'El Socorro', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(815, 288, 'Antonio José de Sucre', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(816, 289, 'Campo Elías', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(817, 289, 'Arnoldo Gabaldón', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(818, 290, 'Santa Apolonia', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(819, 290, 'La Ceiba', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(820, 291, 'Agua Santa', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(821, 291, 'Valerita', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(822, 292, 'Carmelo', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(823, 292, 'Santa María del Horcón', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(824, 293, 'Motatán', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(825, 293, 'Jalisco', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(826, 294, 'Pampán', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(827, 294, 'Santa Ana', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(828, 295, 'Pampanito', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(829, 295, 'Pampanito II', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(830, 296, 'Betijoque', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(831, 296, 'José Gregorio Hernández', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(832, 296, 'La Pueblita', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(833, 297, 'Carvajal', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(834, 297, 'Campo Alegre', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(835, 297, 'Antonio Nicolás Briceño', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(836, 298, 'Sabana de Mendoza', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(837, 298, 'Junín', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(838, 298, 'Valmore Rodríguez', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(839, 298, 'El Paraíso', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(840, 299, 'Andrés Linares', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(841, 299, 'Cristóbal Mendoza', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(842, 299, 'Carrillo', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(843, 300, 'Cabimbú', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(844, 300, 'Jajó', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(845, 300, 'La Mesa de Esnujaque', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(846, 300, 'Santiago', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(847, 300, 'La Quebrada', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(848, 301, 'Juan Ignacio Montilla', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(849, 301, 'La Beatriz', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(850, 301, 'La Puerta', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(851, 301, 'Mendoza del Valle de Momboy', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(852, 301, 'Mercedes Díaz', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(853, 301, 'San Luis', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(854, 302, 'El Guayabo', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(855, 302, 'Farriar', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(856, 303, 'Arístides Bastidas', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(857, 304, 'Bolívar', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(858, 305, 'Chivacoa', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(859, 305, 'Campo Elías', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(860, 306, 'Cocorote', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(861, 307, 'Independencia', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(862, 308, 'José Antonio Páez', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(863, 309, 'La Trinidad', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(864, 310, 'Manuel Monge', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(865, 311, 'Salóm', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(866, 311, 'Nirgua', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(867, 312, 'San Andrés', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(868, 312, 'Yaritagua', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(869, 313, 'San Felipe', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(870, 313, 'San Javier', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(871, 314, 'Sucre', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(872, 315, 'Urachiche', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(873, 316, 'Isla de Toas', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(874, 316, 'Monagas', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(875, 317, 'San Timoteo', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(876, 317, 'Libertador', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(877, 317, 'Pueblo Nuevo', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(878, 318, 'La Rosa', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(879, 318, 'Rómulo Betancourt', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(880, 318, 'San Benito', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(881, 318, 'Arístides Calvani', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(882, 319, 'Encontrados', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(883, 320, 'Moralito', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(884, 320, 'San Carlos del Zulia', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(885, 320, 'Santa Cruz del Zulia', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(886, 320, 'Santa Bárbara', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(887, 320, 'Urribarrí', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(888, 321, 'Carlos Quevedo', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(889, 321, 'Francisco Javier Pulgar', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(890, 322, 'La Concepción', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(891, 322, 'Mariano Parra León', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(892, 323, 'Concepción', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(893, 323, 'Chiquinquirá', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(894, 323, 'Potreritos', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(895, 324, 'Libertad', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(896, 324, 'Venezuela', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(897, 324, 'Campo Lara', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(898, 325, 'San José de Perijá', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(899, 326, 'mara', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(900, 327, 'Bolívar', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(901, 327, 'Coquivacoa', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(902, 327, 'Chiquinquirá', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(903, 327, 'Raúl Leoni', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(904, 327, 'Santa Lucía', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(905, 327, 'San Isidro', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(906, 328, 'Altagracia', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(907, 328, 'Faría', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(908, 328, 'San Antonio', 1, 328, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(909, 328, 'San José', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(910, 329, 'Guajira', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(911, 329, 'Elías Sánchez Rubio', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(912, 330, 'El Rosario', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(913, 331, 'San Francisco', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(914, 331, 'Los Cortijos', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(915, 332, 'Santa Rita', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(916, 332, 'Urribarrí', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(917, 333, 'Rafael', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(918, 333, 'Manuel Manrique', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(919, 334, 'Gibraltar', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(920, 334, 'Rómulo Gallegos', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(921, 335, 'Rafael Urdaneta ', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(922, 334, 'La Victoria', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(923, 335, 'Raúl Cuenca', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25'),
(924, 336, 'Jesús María Semprún', 1, 1, '2014-11-07 13:57:25', 1, '2014-11-07 13:57:25');

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
  `fec_nac` date DEFAULT NULL,
  `lugar_nac` varchar(50) DEFAULT 'Sin Registro',
  `sexo` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `email` varchar(50) DEFAULT 'Sin Registro',
  `cod_direccion` int(10) unsigned DEFAULT NULL,
  `relacion` tinyint(3) unsigned NOT NULL,
  `vive_con_alumno` enum('s','n') NOT NULL,
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
  KEY `sexo` (`sexo`),
  KEY `relacion` (`relacion`),
  KEY `nivel_instruccion` (`nivel_instruccion`),
  KEY `profesion` (`profesion`),
  KEY `cod_direccion` (`cod_direccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `personal_autorizado`
--

INSERT INTO `personal_autorizado` (`codigo`, `p_apellido`, `s_apellido`, `p_nombre`, `s_nombre`, `nacionalidad`, `cedula`, `telefono`, `telefono_otro`, `fec_nac`, `lugar_nac`, `sexo`, `email`, `cod_direccion`, `relacion`, `vive_con_alumno`, `nivel_instruccion`, `profesion`, `telefono_trabajo`, `direccion_trabajo`, `lugar_trabajo`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(1, 'Orellana', 'Martinez', 'Manuel', 'Carreño', 'v', '11998526', '04122561155', '02124761155', '2014-11-04', 'Caracas', 1, 'otromas@hotmail.com', 1, 1, 's', 1, 255, '02124411555', 'The White House', 'La Casa Blanca', 1, 1, '2014-11-07 14:05:16', 1, '2014-11-07 14:05:16'),
(2, 'Orellana', 'Perez', 'Maria', 'Gustava', 'v', '12345678', '04122561155', '02124761155', '2014-11-04', 'Caracas', 1, 'cantv@esuna.mierda', 2, 2, 's', 1, 255, '02124411555', 'The White House', 'La Casa Blanca', 1, 1, '2014-11-07 14:05:16', 1, '2014-11-07 14:05:16'),
(3, 'Bustamante', 'Perez', 'Luisa', 'Josefina', 'v', '87654321', '04122561155', '02124761155', '2014-11-04', 'Caracas', 1, 'cantv@esuna.mierda', 3, 3, 's', 1, 255, '02124411555', 'The White House', 'La Casa Blanca', 1, 1, '2014-11-07 14:05:16', 1, '2014-11-07 14:05:16');

-- --------------------------------------------------------

--
-- Table structure for table `personal_autorizado_historial`
--

CREATE TABLE IF NOT EXISTS `personal_autorizado_historial` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `p_apellido` varchar(40) NOT NULL,
  `s_apellido` varchar(40) DEFAULT 'Sin Registro',
  `p_nombre` varchar(40) NOT NULL,
  `s_nombre` varchar(40) DEFAULT 'Sin Registro',
  `nacionalidad` enum('v','e') NOT NULL,
  `cedula` varchar(8) NOT NULL,
  `telefono` varchar(11) DEFAULT 'SinRegistro',
  `telefono_otro` varchar(11) DEFAULT 'SinRegistro',
  `fec_nac` date DEFAULT NULL,
  `lugar_nac` varchar(50) DEFAULT 'Sin Registro',
  `sexo` tinyint(1) unsigned NOT NULL,
  `email` varchar(50) DEFAULT 'Sin Registro',
  `cod_direccion` int(10) unsigned DEFAULT NULL,
  `relacion` tinyint(3) unsigned NOT NULL,
  `vive_con_alumno` enum('s','n') NOT NULL,
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
  UNIQUE KEY `cedula` (`cedula`)
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
(255, 'Otro', 1, 1, '2014-11-07 14:01:09', 1, '2014-11-07 14:01:09');

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
(1, 'Madre', 1, 1, '2014-11-07 14:00:43', 1, '2014-11-07 14:00:43'),
(2, 'Padre', 1, 1, '2014-11-07 14:00:43', 1, '2014-11-07 14:00:43'),
(3, 'Tio(a)', 1, 1, '2014-11-07 14:00:43', 1, '2014-11-07 14:00:43'),
(4, 'Abuelo(a)', 1, 1, '2014-11-07 14:00:43', 1, '2014-11-07 14:00:43'),
(5, 'Hermano(a)', 1, 1, '2014-11-07 14:00:43', 1, '2014-11-07 14:00:43'),
(6, 'Primo(a)', 1, 1, '2014-11-07 14:00:43', 1, '2014-11-07 14:00:43'),
(7, 'Otro', 1, 1, '2014-11-07 14:00:43', 1, '2014-11-07 14:00:43');

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
(0, 'Masculino', 1, 1, '2014-11-07 13:55:40', 1, '2014-11-07 13:55:40'),
(1, 'Femenino', 1, 1, '2014-11-07 13:55:40', 1, '2014-11-07 13:55:40');

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
(1, 'XS', 1, 1, '2014-11-07 13:53:07', 1, '2014-11-07 13:53:07'),
(2, 'S', 1, 1, '2014-11-07 13:53:07', 1, '2014-11-07 13:53:07'),
(3, 'M', 1, 1, '2014-11-07 13:53:07', 1, '2014-11-07 13:53:07'),
(4, 'L', 1, 1, '2014-11-07 13:53:07', 1, '2014-11-07 13:53:07'),
(5, 'XL', 1, 1, '2014-11-07 13:53:07', 1, '2014-11-07 13:53:07'),
(6, 'XXL', 1, 1, '2014-11-07 13:53:07', 1, '2014-11-07 13:53:07');

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
(0, 'Dectivado', 1, 1, '2014-11-07 13:52:25', 1, '2014-11-07 13:52:25'),
(1, 'Usuario', 1, 1, '2014-11-07 13:52:25', 1, '2014-11-07 13:52:25'),
(2, 'Usuario Privilegiado', 1, 1, '2014-11-07 13:52:25', 1, '2014-11-07 13:52:25'),
(3, 'Administrador', 1, 1, '2014-11-07 13:52:25', 1, '2014-11-07 13:52:25'),
(4, 'Super Usuario', 1, 1, '2014-11-07 13:52:25', 1, '2014-11-07 13:52:25'),
(5, 'Por verificar', 1, 1, '2014-11-07 13:52:25', 1, '2014-11-07 13:52:25'),
(255, 'slayerfat', 1, 1, '2014-11-07 13:52:25', 1, '2014-11-07 13:52:25');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `seudonimo` varchar(20) NOT NULL,
  `clave` varchar(60) NOT NULL,
  `cod_tipo_usr` tinyint(1) unsigned DEFAULT '1',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `seudonimo` (`seudonimo`),
  KEY `cod_tipo_usr` (`cod_tipo_usr`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`codigo`, `seudonimo`, `clave`, `cod_tipo_usr`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(1, 'neo', 'matrix', 4, 1, 1, '2014-11-07 13:52:56', 1, '2014-11-07 13:52:56'),
(2, 'trinity', 'patadakunfu', 2, 1, 1, '2014-11-07 14:12:27', 1, '2014-11-07 14:12:27');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrativo`
--
ALTER TABLE `administrativo`
  ADD CONSTRAINT `administrativo_ibfk_1` FOREIGN KEY (`cod_usr`) REFERENCES `usuario` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `administrativo_ibfk_2` FOREIGN KEY (`nivel_instruccion`) REFERENCES `nivel_instruccion` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `administrativo_ibfk_3` FOREIGN KEY (`cod_cargo`) REFERENCES `cargo` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `administrativo_ibfk_4` FOREIGN KEY (`sexo`) REFERENCES `sexo` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `administrativo_ibfk_5` FOREIGN KEY (`cod_direccion`) REFERENCES `direccion_administrativo` (`codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`sexo`) REFERENCES `sexo` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_ibfk_2` FOREIGN KEY (`camisa`) REFERENCES `talla` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_ibfk_3` FOREIGN KEY (`pantalon`) REFERENCES `talla` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_ibfk_4` FOREIGN KEY (`cod_curso`) REFERENCES `curso` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_ibfk_5` FOREIGN KEY (`cod_representante`) REFERENCES `personal_autorizado` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_ibfk_6` FOREIGN KEY (`cod_persona_retira`) REFERENCES `personal_autorizado` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_ibfk_7` FOREIGN KEY (`cod_direccion`) REFERENCES `direccion_alumno` (`codigo`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `directivo_ibfk_2` FOREIGN KEY (`nivel_instruccion`) REFERENCES `nivel_instruccion` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `directivo_ibfk_3` FOREIGN KEY (`cod_cargo`) REFERENCES `cargo` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `directivo_ibfk_4` FOREIGN KEY (`sexo`) REFERENCES `sexo` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `directivo_ibfk_5` FOREIGN KEY (`cod_direccion`) REFERENCES `direccion_directivo` (`codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `docente_ibfk_1` FOREIGN KEY (`cod_usr`) REFERENCES `usuario` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `docente_ibfk_2` FOREIGN KEY (`nivel_instruccion`) REFERENCES `nivel_instruccion` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `docente_ibfk_3` FOREIGN KEY (`cod_cargo`) REFERENCES `cargo` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `docente_ibfk_4` FOREIGN KEY (`sexo`) REFERENCES `sexo` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `docente_ibfk_5` FOREIGN KEY (`cod_direccion`) REFERENCES `direccion_docente` (`codigo`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `personal_autorizado_ibfk_1` FOREIGN KEY (`sexo`) REFERENCES `sexo` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_autorizado_ibfk_2` FOREIGN KEY (`relacion`) REFERENCES `relacion` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_autorizado_ibfk_3` FOREIGN KEY (`nivel_instruccion`) REFERENCES `nivel_instruccion` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_autorizado_ibfk_4` FOREIGN KEY (`profesion`) REFERENCES `profesion` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_autorizado_ibfk_5` FOREIGN KEY (`cod_direccion`) REFERENCES `direccion_p_a` (`codigo`) ON UPDATE CASCADE;

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

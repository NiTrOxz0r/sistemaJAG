-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 07, 2014 at 03:24 pm
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

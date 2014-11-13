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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `directivo`
--
ALTER TABLE `directivo`
  ADD CONSTRAINT `directivo_ibfk_1` FOREIGN KEY (`cod_usr`) REFERENCES `usuario` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `directivo_ibfk_2` FOREIGN KEY (`nivel_instruccion`) REFERENCES `nivel_instruccion` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `directivo_ibfk_3` FOREIGN KEY (`cod_cargo`) REFERENCES `cargo` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `directivo_ibfk_4` FOREIGN KEY (`sexo`) REFERENCES `sexo` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `directivo_ibfk_5` FOREIGN KEY (`cod_direccion`) REFERENCES `direccion_directivo` (`codigo`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `personal_autorizado`
--
ALTER TABLE `personal_autorizado`
  ADD CONSTRAINT `personal_autorizado_ibfk_1` FOREIGN KEY (`sexo`) REFERENCES `sexo` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_autorizado_ibfk_2` FOREIGN KEY (`relacion`) REFERENCES `relacion` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_autorizado_ibfk_3` FOREIGN KEY (`nivel_instruccion`) REFERENCES `nivel_instruccion` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_autorizado_ibfk_4` FOREIGN KEY (`profesion`) REFERENCES `profesion` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_autorizado_ibfk_5` FOREIGN KEY (`cod_direccion`) REFERENCES `direccion_p_a` (`codigo`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

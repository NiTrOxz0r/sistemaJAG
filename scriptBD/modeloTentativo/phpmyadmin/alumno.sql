-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 07, 2014 at 03:23 pm
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
  ADD CONSTRAINT `alumno_ibfk_6` FOREIGN KEY (`cod_persona_retira`) REFERENCES `personal_autorizado` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_ibfk_7` FOREIGN KEY (`cod_direccion`) REFERENCES `direccion_alumno` (`codigo`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `direccion_alumno`
--
ALTER TABLE `direccion_alumno`
  ADD CONSTRAINT `direccion_alumno_ibfk_1` FOREIGN KEY (`cod_parroquia`) REFERENCES `parroquia` (`codigo`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

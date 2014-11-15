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
(33, -3, 1, 'Prescolar nivel 3"', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56'),
(34, 7, 1, 'Sin Curso Asociado', 1, 1, '2014-11-07 14:03:56', 1, '2014-11-07 14:03:56');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

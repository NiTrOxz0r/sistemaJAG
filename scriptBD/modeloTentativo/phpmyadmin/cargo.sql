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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

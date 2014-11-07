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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

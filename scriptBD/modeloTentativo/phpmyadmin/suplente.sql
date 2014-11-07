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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `suplente`
--
ALTER TABLE `suplente`
  ADD CONSTRAINT `suplente_ibfk_1` FOREIGN KEY (`cod_profesor`) REFERENCES `docente` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `suplente_ibfk_2` FOREIGN KEY (`cod_suplente`) REFERENCES `docente` (`codigo`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

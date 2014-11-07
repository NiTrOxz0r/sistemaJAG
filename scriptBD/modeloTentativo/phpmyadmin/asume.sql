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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asume`
--
ALTER TABLE `asume`
  ADD CONSTRAINT `asume_ibfk_1` FOREIGN KEY (`cod_docente`) REFERENCES `docente` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `asume_ibfk_2` FOREIGN KEY (`cod_curso`) REFERENCES `curso` (`codigo`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

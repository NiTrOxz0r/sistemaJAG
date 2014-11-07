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
-- Table structure for table `obtiene`
--

CREATE TABLE IF NOT EXISTS `obtiene` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_p_a` int(10) unsigned NOT NULL,
  `cod_alu` int(10) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cod_usr_reg` int(11) NOT NULL,
  `fec_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_usr_mod` int(11) NOT NULL,
  `fec_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  KEY `cod_alu` (`cod_alu`),
  KEY `cod_p_a` (`cod_p_a`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `obtiene`
--

INSERT INTO `obtiene` (`codigo`, `cod_p_a`, `cod_alu`, `status`, `cod_usr_reg`, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(1, 1, 1, 1, 1, '2014-11-07 14:05:49', 1, '2014-11-07 14:05:49'),
(2, 2, 1, 1, 1, '2014-11-07 14:05:49', 1, '2014-11-07 14:05:49'),
(3, 3, 1, 1, 1, '2014-11-07 14:05:49', 1, '2014-11-07 14:05:49'),
(4, 1, 2, 1, 1, '2014-11-07 14:05:49', 1, '2014-11-07 14:05:49'),
(5, 2, 2, 1, 1, '2014-11-07 14:05:49', 1, '2014-11-07 14:05:49'),
(6, 3, 2, 1, 1, '2014-11-07 14:05:49', 1, '2014-11-07 14:05:49');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `obtiene`
--
ALTER TABLE `obtiene`
  ADD CONSTRAINT `obtiene_ibfk_1` FOREIGN KEY (`cod_alu`) REFERENCES `alumno` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `obtiene_ibfk_2` FOREIGN KEY (`cod_p_a`) REFERENCES `personal_autorizado` (`codigo`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2010 at 09:43 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myeRecipes.cl`
--

-- --------------------------------------------------------

--
-- Table structure for table `ingredientes`
--

CREATE TABLE IF NOT EXISTS `ingredientes` (
  `Id_Receta` int(11) NOT NULL,
  `Id_Ingrediente` int(11) NOT NULL,
  PRIMARY KEY (`Id_Receta`,`Id_Ingrediente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredientes`
--


-- --------------------------------------------------------

--
-- Table structure for table `medidas`
--

CREATE TABLE IF NOT EXISTS `medidas` (
  `Id_Medida` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Medida` varchar(40) NOT NULL,
  `Abreviacion_Medida` varchar(10) NOT NULL,
  PRIMARY KEY (`Id_Medida`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `medidas`
--


-- --------------------------------------------------------

--
-- Table structure for table `ocaciones`
--

CREATE TABLE IF NOT EXISTS `ocaciones` (
  `Id_Ocacion` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Ocacion` varchar(40) NOT NULL,
  PRIMARY KEY (`Id_Ocacion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ocaciones`
--


-- --------------------------------------------------------

--
-- Table structure for table `receta`
--

CREATE TABLE IF NOT EXISTS `receta` (
  `Id_Receta` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Receta` varchar(40) NOT NULL,
  `Path_Imagen` text,
  `Comentario` text,
  `Fecha_Posteo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id_Receta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `receta`
--


-- --------------------------------------------------------

--
-- Table structure for table `receta_ocaciones`
--

CREATE TABLE IF NOT EXISTS `receta_ocaciones` (
  `Id_Receta` int(11) NOT NULL,
  `Id_Ocacion` int(11) NOT NULL,
  PRIMARY KEY (`Id_Receta`,`Id_Ocacion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receta_ocaciones`
--


-- --------------------------------------------------------

--
-- Table structure for table `tipo_ingrediente`
--

CREATE TABLE IF NOT EXISTS `tipo_ingrediente` (
  `Id_Tipo_Ingrediente` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Tipo_Ingrediente` varchar(40) NOT NULL,
  PRIMARY KEY (`Id_Tipo_Ingrediente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tipo_ingrediente`
--


-- --------------------------------------------------------

--
-- Table structure for table `tipo_ingrediente_medida`
--

CREATE TABLE IF NOT EXISTS `tipo_ingrediente_medida` (
  `ID_Tipo_Ingrediente` int(11) NOT NULL,
  `Id_Medida` int(11) NOT NULL,
  PRIMARY KEY (`ID_Tipo_Ingrediente`,`Id_Medida`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo_ingrediente_medida`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `Nombre` varchar(30) NOT NULL,
  `Numero_Usuario` int(11) NOT NULL,
  `Apellido_Paterno` varchar(30) NOT NULL,
  `Apellido_Materno` varchar(30) NOT NULL,
  `Correo_Electronico` varchar(50) NOT NULL,
  PRIMARY KEY (`Correo_Electronico`),
  UNIQUE KEY `Nombre` (`Nombre`,`Apellido_Paterno`,`Apellido_Materno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_receta`
--

CREATE TABLE IF NOT EXISTS `user_receta` (
  `Numero_Usuario` int(11) NOT NULL,
  `Id_Receta` int(11) NOT NULL,
  PRIMARY KEY (`Numero_Usuario`,`Id_Receta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_receta`
--


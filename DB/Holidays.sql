-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-12-2012 a las 13:30:26
-- Versión del servidor: 5.5.28
-- Versión de PHP: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `Holidays`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Clientes`
--

CREATE TABLE IF NOT EXISTS `Clientes` (
  `idClientes` int(11) NOT NULL AUTO_INCREMENT,
  `CliNombre` varchar(120) NOT NULL,
  `CliMail` varchar(150) NOT NULL,
  `CliHabilitado` int(11) DEFAULT '0' COMMENT '1 Habilitado\n0 DesHabilitado\n',
  `Usuarios_idUsuarios` int(11) NOT NULL,
  PRIMARY KEY (`idClientes`,`Usuarios_idUsuarios`),
  KEY `fk_Clientes_Usuarios1` (`Usuarios_idUsuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Lsitado de clientes que pertenecen a un usuario determinado' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Feriados`
--

CREATE TABLE IF NOT EXISTS `Feriados` (
  `idFeriados` int(11) NOT NULL AUTO_INCREMENT,
  `FeriadoFecha` date NOT NULL,
  `FeriadoDias` int(11) NOT NULL DEFAULT '1',
  `FerHabilitado` int(11) DEFAULT '0',
  `Usuarios_idUsuarios` int(11) NOT NULL,
  PRIMARY KEY (`idFeriados`,`Usuarios_idUsuarios`),
  KEY `fk_Feriados_Usuarios1` (`Usuarios_idUsuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Listado de Faeriados correspondientes a un usuario particula' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pais`
--

CREATE TABLE IF NOT EXISTS `Pais` (
  `idPais` int(11) NOT NULL AUTO_INCREMENT,
  `PaisNombre` varchar(120) NOT NULL,
  `PaisHabilitado` int(11) DEFAULT '0',
  PRIMARY KEY (`idPais`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Listado de paices del mundo' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Provincias`
--

CREATE TABLE IF NOT EXISTS `Provincias` (
  `idProvincias` int(11) NOT NULL AUTO_INCREMENT,
  `ProvNombre` varchar(120) NOT NULL,
  `ProvHabilitado` int(11) DEFAULT '0',
  `Pais_idPais` int(11) NOT NULL,
  PRIMARY KEY (`idProvincias`,`Pais_idPais`),
  KEY `fk_Provincias_Pais` (`Pais_idPais`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Provincias que pertenecen a un país determinado' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE IF NOT EXISTS `Usuarios` (
  `idUsuarios` int(11) NOT NULL AUTO_INCREMENT,
  `UsuNombre` varchar(120) NOT NULL,
  `UsuUsuario` varchar(30) NOT NULL,
  `UsuPass` varchar(30) NOT NULL,
  `UsuHabilitado` int(11) DEFAULT '0' COMMENT '1 Usu habilitado 0 Usu deshabilitado',
  `Provincias_idProvincias` int(11) NOT NULL,
  `Provincias_Pais_idPais` int(11) NOT NULL,
  PRIMARY KEY (`idUsuarios`),
  KEY `fk_Usuarios_Provincias1` (`Provincias_idProvincias`,`Provincias_Pais_idPais`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla que contiene los usuarios del sistema' AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Clientes`
--
ALTER TABLE `Clientes`
  ADD CONSTRAINT `fk_Clientes_Usuarios1` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `Usuarios` (`idUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Feriados`
--
ALTER TABLE `Feriados`
  ADD CONSTRAINT `fk_Feriados_Usuarios1` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `Usuarios` (`idUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Provincias`
--
ALTER TABLE `Provincias`
  ADD CONSTRAINT `fk_Provincias_Pais` FOREIGN KEY (`Pais_idPais`) REFERENCES `Pais` (`idPais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD CONSTRAINT `fk_Usuarios_Provincias1` FOREIGN KEY (`Provincias_idProvincias`, `Provincias_Pais_idPais`) REFERENCES `Provincias` (`idProvincias`, `Pais_idPais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-12-2015 a las 13:58:20
-- Versión del servidor: 5.5.44-0ubuntu0.14.04.1
-- Versión de PHP: 5.6.16-2+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `compu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE IF NOT EXISTS `configuracion` (
  `id_tipo` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_tipo` varchar(30) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id_tipo`, `nombre_tipo`) VALUES
(17, 'Paquete'),
(18, 'Cajas'),
(19, 'Rollo'),
(20, 'Plastico'),
(21, 'Caucho');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `tipo` varchar(40) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `obser` varchar(30) NOT NULL,
  `unidades` bigint(10) NOT NULL,
  `des` varchar(40) NOT NULL,
  `fecha` datetime NOT NULL,
  `serial` varchar(100) NOT NULL,
  `cliente` varchar(40) NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`tipo`, `descripcion`, `obser`, `unidades`, `des`, `fecha`, `serial`, `cliente`) VALUES
('Cajas', 'Pirreli', 'pistas', 21000, '', '2015-11-14 05:08:27', '5647a9f09ca3a', ''),
('Rollo', 'Papel', 'Toales', 90, '', '2015-11-14 00:00:00', '56477f928e7c6', ''),
('Caucho', 'Pireli', 'De Moto', 10, '', '2015-11-14 06:40:33', '5647bf7c8a92d', ''),
('Cajas', 'Billete', 'euros', 99, '', '2015-11-14 04:59:12', '5647a994e3434', ''),
('Cajas', 'Pantalones', 'Vagos', 99, '', '2015-11-14 04:52:08', '5647a72e5c6c4', ''),
('Cajas', 'Zapatos', 'gomas', 200, '', '2015-11-14 05:08:57', '5647aa5a40c2b', ''),
('17', 'Pjudos', 'Que Pajudos', 2, '', '2015-11-25 05:03:41', '5656294b51753', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE IF NOT EXISTS `reporte` (
  `mov_id` int(10) NOT NULL AUTO_INCREMENT,
  `tipo_m` varchar(20) NOT NULL,
  `compu_unidades` bigint(20) NOT NULL,
  `compu_fecha` date NOT NULL,
  `compu_cli` varchar(30) NOT NULL,
  `compu_observacion` varchar(30) NOT NULL,
  `compu_tipo` varchar(20) NOT NULL,
  `compu_des` varchar(30) NOT NULL,
  PRIMARY KEY (`mov_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=140 ;

--
-- Volcado de datos para la tabla `reporte`
--

INSERT INTO `reporte` (`mov_id`, `tipo_m`, `compu_unidades`, `compu_fecha`, `compu_cli`, `compu_observacion`, `compu_tipo`, `compu_des`) VALUES
(137, 'Salida', 1, '2015-03-01', 'Bruna', 'Mercado', 'Cajas', 'Pantalones'),
(138, 'Salida', 1, '2015-11-04', 'Fran', 'Tio', 'Cajas', 'Billete'),
(139, 'Salida', 1, '2015-11-14', '1', '1', 'Cajas', 'Billete'),
(134, 'Salida', 1, '2015-11-26', 'Adrian', 'Regala', 'Cajas', 'Zapatos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(2, 'admin', 'admin'),
(3, 'gnuxdar', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-03-2017 a las 02:38:08
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `hub`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `idNotification` int(10) NOT NULL AUTO_INCREMENT,
  `userEmitter` varchar(50) DEFAULT NULL,
  `userReceiver` varchar(50) DEFAULT NULL,
  `message` varchar(255) NOT NULL,
  `isRead` tinyint(1) NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`idNotification`),
  KEY `FKNotificati851215` (`userReceiver`),
  KEY `IDX_BF5476CA26520813` (`userEmitter`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `notification`
--

INSERT INTO `notification` (`idNotification`, `userEmitter`, `userReceiver`, `message`, `isRead`, `date`) VALUES
(15, 'lfarias', 'balmarales', 'hola barbara me gustaria trabajar contigo', 0, '2017-03-07'),
(16, 'lfarias', 'balmarales', 'hola', 1, '2017-03-07'),
(17, 'lfarias', 'balmarales', 'llamame', 0, '2017-03-09'),
(18, 'lfarias', 'balmarales', 'llamame', 0, '2017-03-09'),
(19, 'lfarias', 'balmarales', 'llamame', 0, '2017-03-09'),
(20, 'lfarias', 'balmarales', 'llamame', 0, '2017-03-09'),
(21, 'lfarias', 'balmarales', 'llamame', 0, '2017-03-09'),
(22, 'dmoreno', 'balmarales', 'Good profile', 0, '2017-03-08'),
(23, 'balmarales', 'lfarias', 'hi.', 0, '2017-03-17'),
(24, 'balmarales', 'balmarales', 'New message', 0, '2017-03-18');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `FKNotificati360234` FOREIGN KEY (`userEmitter`) REFERENCES `user` (`user`),
  ADD CONSTRAINT `FKNotificati851215` FOREIGN KEY (`userReceiver`) REFERENCES `user` (`user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

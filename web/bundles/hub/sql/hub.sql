-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-03-2017 a las 02:43:38
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
-- Estructura de tabla para la tabla `administration`
--

CREATE TABLE IF NOT EXISTS `administration` (
  `idAdministration` int(10) NOT NULL AUTO_INCREMENT,
  `trial` int(10) NOT NULL,
  `paymentPeriod` int(10) NOT NULL,
  `paymentBusiness` double NOT NULL,
  `paymentProfessional` double NOT NULL,
  PRIMARY KEY (`idAdministration`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `basicuser`
--

CREATE TABLE IF NOT EXISTS `basicuser` (
  `user` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  PRIMARY KEY (`user`),
  KEY `FKBasicUser688948` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `basicuser`
--

INSERT INTO `basicuser` (`user`, `firstName`, `lastName`, `age`, `sex`) VALUES
('dlnaranjo', 'David Daniel', 'La O Naranjo', 28, 0),
('ellanes', 'Eduardo', 'Llanes Linares', 23, 0),
('fbarroso', 'Felix Manuel', 'Barroso Perez', 45, 0),
('Fonseca', 'Raidel', 'Puebla', 27, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `business`
--

CREATE TABLE IF NOT EXISTS `business` (
  `user` varchar(50) NOT NULL,
  `idCategory` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone1` varchar(15) NOT NULL,
  `phone2` varchar(15) DEFAULT NULL,
  `phone3` varchar(15) DEFAULT NULL,
  `presentation` longtext NOT NULL,
  `trial` tinyint(1) NOT NULL,
  PRIMARY KEY (`user`),
  KEY `FKBusiness343247` (`user`),
  KEY `FKBusiness476311` (`idCategory`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `business`
--

INSERT INTO `business` (`user`, `idCategory`, `name`, `address`, `phone1`, `phone2`, `phone3`, `presentation`, `trial`) VALUES
('google', 5, 'Google', '-', '2345', '', '', 'The most powerfull search in the world', 1),
('molanco', 4, 'Molanco', 'calle 20', '55074796', '', '', 'dz<<z<cxz<c<z', 1),
('paper', 3, 'Paper Match', 'calle 10 No. 11', '234567', '', '', 'We make paper.', 1),
('px', 5, 'Proyect x', 'hhhh', '24', '', '', 'We do jksndmsd', 1),
('yahoo', 5, 'Yahoo', '-', '456', '', '', 'Email server.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `idCategory` int(10) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) NOT NULL,
  PRIMARY KEY (`idCategory`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`idCategory`, `categoryName`) VALUES
(3, 'Automotive'),
(4, 'Business Support & Supplies'),
(5, 'Computer & Electronics'),
(6, 'Construction & Contractor'),
(7, 'Education'),
(8, 'Entertainment'),
(9, 'Food & Dinning'),
(10, 'Health & Medicine'),
(11, 'Home & Garden'),
(12, 'Legal & Financial'),
(13, 'Manufaturing,Whole Sale, Distribution'),
(14, 'Merchants(Retail)'),
(15, 'Miscellaneous'),
(16, 'Personal Care & Services'),
(17, 'Real Estates'),
(18, 'Travel & Transport');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `idPhoto` int(10) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idPhoto`),
  KEY `FKPhoto898845` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productsandservices`
--

CREATE TABLE IF NOT EXISTS `productsandservices` (
  `idPproductsandservices` int(10) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `description` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idPproductsandservices`),
  KEY `FKProductsAn148047` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `productsandservices`
--

INSERT INTO `productsandservices` (`idPproductsandservices`, `user`, `name`, `price`, `description`, `photo`) VALUES
(1, 'google', 'zapatos', 25, 'negros', '58cb77dbb9380.png'),
(2, 'google', 'camisa', 13, 'blanca', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profession`
--

CREATE TABLE IF NOT EXISTS `profession` (
  `idProfession` int(10) NOT NULL AUTO_INCREMENT,
  `professionName` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`idProfession`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `profession`
--

INSERT INTO `profession` (`idProfession`, `professionName`, `description`) VALUES
(3, 'Informatico', 'Informatico'),
(4, 'Profesor', 'Profesor'),
(5, 'Medico', 'Medico'),
(6, 'Constructor', 'Constructor'),
(7, 'Carpintero', 'Carpintero'),
(8, 'Secretaria', 'Secretaria'),
(9, 'Pintor', 'Pintor'),
(10, 'Mecanico', 'Mecanico'),
(11, 'Chofer', 'Chofer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `professional`
--

CREATE TABLE IF NOT EXISTS `professional` (
  `user` varchar(50) NOT NULL,
  `idCategory` int(11) DEFAULT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `personalPhone` varchar(15) NOT NULL,
  `workPhone` varchar(15) DEFAULT NULL,
  `otherPhone` varchar(15) DEFAULT NULL,
  `presentation` longtext NOT NULL,
  `experience` int(2) NOT NULL,
  `curriculum` longtext,
  `trial` tinyint(1) NOT NULL,
  PRIMARY KEY (`user`),
  KEY `FKProfession243105` (`user`),
  KEY `FKProfession908926` (`idCategory`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `professional`
--

INSERT INTO `professional` (`user`, `idCategory`, `firstName`, `lastName`, `age`, `sex`, `personalPhone`, `workPhone`, `otherPhone`, `presentation`, `experience`, `curriculum`, `trial`) VALUES
('balmarales', 5, 'Barbara', 'Almarales Lara', 27, 0, '123456', '', '', 'i am an analistic.', 5, '58be978a71363', 1),
('dmoreno', 13, 'David', 'Moreno Guitierrez', 25, 0, '234567', '', '', 'I am good doing business.', 12, '58c30c006b9b7', 1),
('lfarias', 5, 'Leonardo Flavio', 'Fernández Arias', 27, 0, '54674749', '', '', 'I am a web programer.', 5, '58be96216f279', 1),
('mjay', 5, 'Mrtha', 'Maria', 30, 0, '55295250', '', '', 'I hope you like beats cause I am a animal.', 20, '58cec7823c9c9', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `professional_profession`
--

CREATE TABLE IF NOT EXISTS `professional_profession` (
  `user` varchar(50) NOT NULL,
  `idProfession` int(10) NOT NULL,
  PRIMARY KEY (`user`,`idProfession`),
  KEY `IDX_8DFE75D08D93D649` (`user`),
  KEY `IDX_8DFE75D038671383` (`idProfession`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `professional_profession`
--

INSERT INTO `professional_profession` (`user`, `idProfession`) VALUES
('balmarales', 3),
('dmoreno', 3),
('lfarias', 3),
('mjay', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `idSkills` int(10) NOT NULL AUTO_INCREMENT,
  `skill` varchar(255) NOT NULL,
  `user` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idSkills`),
  KEY `FKSkills100419` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `skills`
--

INSERT INTO `skills` (`idSkills`, `skill`, `user`) VALUES
(3, 'web', 'lfarias'),
(4, 'desktop', 'lfarias'),
(5, 'others', 'lfarias'),
(6, 'ingeniero en sofware', 'balmarales'),
(7, 'Web', 'dmoreno'),
(8, 'others', 'dmoreno'),
(9, 'Android', 'mjay'),
(10, 'Web develop', 'mjay'),
(11, 'Core programming', 'mjay');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `country` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) DEFAULT NULL,
  `language` varchar(50) NOT NULL,
  `registrationDate` date DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `lastAccess` date DEFAULT NULL,
  `perfilPhoto` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user`, `password`, `country`, `city`, `email`, `website`, `language`, `registrationDate`, `active`, `salt`, `lastAccess`, `perfilPhoto`, `role`) VALUES
('balmarales', 'balmarales{195c9dd2ffd14c1297b8b123ee023e58}', 'Cuba', 'habana', 'balmarales@gmail.com', '', 'Español', '2017-03-07', 1, '195c9dd2ffd14c1297b8b123ee023e58', NULL, '58be9750c8b12.jpeg', 'ROLE_PROFESSIONAL'),
('dlnaranjo', 'dlnaranjo{71787c9c70494d83d964f7137d4c57b7}', 'Cuba', 'Granma', 'dlnaranjo@nauta.cu', '11', 'English', '2017-03-07', 1, '71787c9c70494d83d964f7137d4c57b7', NULL, '58be94453d045.jpeg', 'ROLE_USER'),
('dmoreno', 'dmoreno{f49b6fa795f241e80d0634650c77f414}', 'Venezuela', 'kl;', 'dmoreno@gmail.com', '', 'Italiano', '2017-03-10', 1, 'f49b6fa795f241e80d0634650c77f414', NULL, '58c30bba296a3.jpeg', 'ROLE_PROFESSIONAL'),
('ellanes', 'ellanes{fd10d32c72cad95892fbeb936c912611}', 'Mexico', 'MEXICO DC', 'ellanes@gmail.com', '', 'Español', '2017-03-17', 1, 'fd10d32c72cad95892fbeb936c912611', NULL, '58cb2bbea07af.jpeg', 'ROLE_USER'),
('fbarroso', 'fbarroso{8b5c8f02de88a6288f34acece4eab9af}', 'Venezuela', 'Guantánamo', 'fbarroso@gmail.com', '', 'Deutcsh', '2017-03-10', 1, '8b5c8f02de88a6288f34acece4eab9af', NULL, '58c31bca1496b.jpeg', 'ROLE_USER'),
('Fonseca', 'rpuebla{d21969946f5f68b99f13674364c52736}', 'Cuba', 'Ciego de Avila', 'rpuebla@gmail.com', '', 'English', '2017-03-15', 1, 'd21969946f5f68b99f13674364c52736', NULL, '58c876a8121ec.jpeg', 'ROLE_USER'),
('google', 'google{53b939340ee9a60704838b7e280122c5}', 'EEUU', 'California', 'google@gmail.com', '', 'English', '2017-03-10', 1, '53b939340ee9a60704838b7e280122c5', NULL, '58c3242f3778a.jpg', 'ROLE_BUSINESS'),
('lfarias', 'lfarias{ee98371d158c1e85f31dcae8577fa55b}', 'Cuba', 'Granma', 'lfarias@nauta.cu', '', 'English', '2017-03-07', 1, 'ee98371d158c1e85f31dcae8577fa55b', NULL, '58be95efdd9dd.jpeg', 'ROLE_PROFESSIONAL'),
('mjay', 'elmaskentona{75c2d8c20231576c39d32ea48c3fb2ec}', 'Cuba', 'Bayamo', 'mjay@udg.co.cu', '', 'Español', '2017-03-19', 1, '75c2d8c20231576c39d32ea48c3fb2ec', NULL, '58cec70e967e3.jpeg', 'ROLE_PROFESSIONAL'),
('molanco', '123456780{ac2e8db2a19b4e1e78c583dec2e3ac8e}', 'Cuba', 'Bayamo', 'molanco@molanco.com', '', 'Español', '2017-03-19', 1, 'ac2e8db2a19b4e1e78c583dec2e3ac8e', NULL, '58ce4ad981eac.jpeg', 'ROLE_BUSINESS'),
('paper', 'paper', 'EEUU', 'Granma', 'paper@gmail.com', '', 'Français', '2017-03-10', 1, '217e111c390c0e97ed353b6491a5f835', NULL, '58c31ef1d3292.jpg', 'ROLE_BUSINESS'),
('px', 'px{16164566a54545fa769004ea4c3aedb1}', 'Venezuela', 'caracas', 'px@gmail.com', '', 'Deutcsh', '2017-03-18', 1, '16164566a54545fa769004ea4c3aedb1', NULL, '58cc77c06c6b7.jpeg', 'ROLE_BUSINESS'),
('yahoo', 'yahoo{e145812787122694fa6ffa4524b4174d}', 'Venezuela', 'quebec', 'yahoo@yahoo.com', '', 'English', '2017-03-17', 1, 'e145812787122694fa6ffa4524b4174d', NULL, '58cb523008aaa.png', 'ROLE_BUSINESS');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `basicuser`
--
ALTER TABLE `basicuser`
  ADD CONSTRAINT `FKBasicUser688948` FOREIGN KEY (`user`) REFERENCES `user` (`user`);

--
-- Filtros para la tabla `business`
--
ALTER TABLE `business`
  ADD CONSTRAINT `FKBusiness343247` FOREIGN KEY (`user`) REFERENCES `user` (`user`),
  ADD CONSTRAINT `FKBusiness476311` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`);

--
-- Filtros para la tabla `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `FKNotificati360234` FOREIGN KEY (`userEmitter`) REFERENCES `user` (`user`),
  ADD CONSTRAINT `FKNotificati851215` FOREIGN KEY (`userReceiver`) REFERENCES `user` (`user`);

--
-- Filtros para la tabla `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `FKPhoto898845` FOREIGN KEY (`user`) REFERENCES `business` (`user`);

--
-- Filtros para la tabla `productsandservices`
--
ALTER TABLE `productsandservices`
  ADD CONSTRAINT `FKProductsAn148047` FOREIGN KEY (`user`) REFERENCES `business` (`user`);

--
-- Filtros para la tabla `professional`
--
ALTER TABLE `professional`
  ADD CONSTRAINT `FKProfession243105` FOREIGN KEY (`user`) REFERENCES `user` (`user`),
  ADD CONSTRAINT `FKProfession908926` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`);

--
-- Filtros para la tabla `professional_profession`
--
ALTER TABLE `professional_profession`
  ADD CONSTRAINT `FKProfession377732` FOREIGN KEY (`idProfession`) REFERENCES `profession` (`idProfession`),
  ADD CONSTRAINT `FKProfession782242` FOREIGN KEY (`user`) REFERENCES `professional` (`user`);

--
-- Filtros para la tabla `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `FKSkills100419` FOREIGN KEY (`user`) REFERENCES `professional` (`user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

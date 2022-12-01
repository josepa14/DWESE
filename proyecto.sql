-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2022 a las 14:15:45
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bandas`
--

CREATE TABLE `bandas` (
  `idBandas` int(11) NOT NULL,
  `distancia` float DEFAULT NULL,
  `frencuencia` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concurso`
--

CREATE TABLE `concurso` (
  `idConcurso` int(11) NOT NULL,
  `name` varchar(10) DEFAULT NULL,
  `fecha_ini_inscrip` date DEFAULT NULL,
  `fecha_fin_inscrip` date DEFAULT NULL,
  `fecha_ini_con` date DEFAULT NULL,
  `fecha_fin_con` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `concurso`
--

INSERT INTO `concurso` (`idConcurso`, `name`, `fecha_ini_inscrip`, `fecha_fin_inscrip`, `fecha_ini_con`, `fecha_fin_con`) VALUES
(1, 'festical', '2022-12-02', '2022-12-03', '2022-12-04', '2022-12-05'),
(2, 'alojomora', '2022-12-07', '2022-12-08', '2022-12-09', '2022-12-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concurso_has_bandas`
--

CREATE TABLE `concurso_has_bandas` (
  `Concurso_idConcurso` int(11) NOT NULL,
  `Bandas_idBandas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concurso_has_modo`
--

CREATE TABLE `concurso_has_modo` (
  `Concurso_idConcurso` int(11) NOT NULL,
  `Modo_idModo` int(11) NOT NULL,
  `max_ssb` int(11) DEFAULT NULL,
  `max_cw` int(11) DEFAULT NULL,
  `max_digital` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diploma`
--

CREATE TABLE `diploma` (
  `idDiploma` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `minimo` int(11) DEFAULT NULL,
  `Concurso_idConcurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `idmensajes` int(11) NOT NULL,
  `fecha_hora` date DEFAULT NULL,
  `validado` tinyint(4) DEFAULT NULL,
  `Modo_idModo` int(11) NOT NULL,
  `Bandas_idBandas` int(11) NOT NULL,
  `Participacion_Concurso_idConcurso` int(11) NOT NULL,
  `Participacion_Participante_idParticipante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modo`
--

CREATE TABLE `modo` (
  `idModo` int(11) NOT NULL,
  `SSB` varchar(45) DEFAULT NULL,
  `CW` varchar(45) DEFAULT NULL,
  `DIGITAL` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participacion`
--

CREATE TABLE `participacion` (
  `Concurso_idConcurso` int(11) NOT NULL,
  `Participante_idParticipante` int(11) NOT NULL,
  `juez` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idParticipante` int(11) NOT NULL,
  `name` varchar(10) DEFAULT NULL,
  `login` varchar(15) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `localizacion` point DEFAULT NULL,
  `imagen` float DEFAULT NULL,
  `rol` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idParticipante`, `name`, `login`, `password`, `correo`, `localizacion`, `imagen`, `rol`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@admin.es', 0x00000000010100000000000000000000000000000000000000, NULL, 'admin'),
(2, 'user', 'user', 'user', 'user@user.es', NULL, NULL, 'user'),
(3, 'hjhkh', 'user3', 'user', 'jcasper2112@g.educaand.es', 0x, 0, 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bandas`
--
ALTER TABLE `bandas`
  ADD PRIMARY KEY (`idBandas`);

--
-- Indices de la tabla `concurso`
--
ALTER TABLE `concurso`
  ADD PRIMARY KEY (`idConcurso`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `concurso_has_bandas`
--
ALTER TABLE `concurso_has_bandas`
  ADD PRIMARY KEY (`Concurso_idConcurso`,`Bandas_idBandas`),
  ADD KEY `fk_Concurso_has_Bandas_Bandas1_idx` (`Bandas_idBandas`),
  ADD KEY `fk_Concurso_has_Bandas_Concurso1_idx` (`Concurso_idConcurso`);

--
-- Indices de la tabla `concurso_has_modo`
--
ALTER TABLE `concurso_has_modo`
  ADD PRIMARY KEY (`Concurso_idConcurso`,`Modo_idModo`),
  ADD KEY `fk_Concurso_has_Modo_Modo1_idx` (`Modo_idModo`),
  ADD KEY `fk_Concurso_has_Modo_Concurso1_idx` (`Concurso_idConcurso`);

--
-- Indices de la tabla `diploma`
--
ALTER TABLE `diploma`
  ADD PRIMARY KEY (`idDiploma`),
  ADD KEY `fk_Diploma_Concurso1_idx` (`Concurso_idConcurso`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`idmensajes`),
  ADD KEY `fk_mensajes_Modo1_idx` (`Modo_idModo`),
  ADD KEY `fk_mensajes_Bandas1_idx` (`Bandas_idBandas`),
  ADD KEY `fk_mensajes_Participacion1_idx` (`Participacion_Concurso_idConcurso`,`Participacion_Participante_idParticipante`);

--
-- Indices de la tabla `modo`
--
ALTER TABLE `modo`
  ADD PRIMARY KEY (`idModo`);

--
-- Indices de la tabla `participacion`
--
ALTER TABLE `participacion`
  ADD PRIMARY KEY (`Concurso_idConcurso`,`Participante_idParticipante`),
  ADD KEY `Participante_idParticipante` (`Participante_idParticipante`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idParticipante`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `concurso`
--
ALTER TABLE `concurso`
  MODIFY `idConcurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `idmensajes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modo`
--
ALTER TABLE `modo`
  MODIFY `idModo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idParticipante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `concurso_has_bandas`
--
ALTER TABLE `concurso_has_bandas`
  ADD CONSTRAINT `fk_Concurso_has_Bandas_Bandas1` FOREIGN KEY (`Bandas_idBandas`) REFERENCES `bandas` (`idBandas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Concurso_has_Bandas_Concurso1` FOREIGN KEY (`Concurso_idConcurso`) REFERENCES `concurso` (`idConcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `concurso_has_modo`
--
ALTER TABLE `concurso_has_modo`
  ADD CONSTRAINT `fk_Concurso_has_Modo_Concurso1` FOREIGN KEY (`Concurso_idConcurso`) REFERENCES `concurso` (`idConcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Concurso_has_Modo_Modo1` FOREIGN KEY (`Modo_idModo`) REFERENCES `modo` (`idModo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `diploma`
--
ALTER TABLE `diploma`
  ADD CONSTRAINT `fk_Diploma_Concurso1` FOREIGN KEY (`Concurso_idConcurso`) REFERENCES `concurso` (`idConcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `fk_mensajes_Bandas1` FOREIGN KEY (`Bandas_idBandas`) REFERENCES `bandas` (`idBandas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mensajes_Modo1` FOREIGN KEY (`Modo_idModo`) REFERENCES `modo` (`idModo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mensajes_Participacion1` FOREIGN KEY (`Participacion_Concurso_idConcurso`,`Participacion_Participante_idParticipante`) REFERENCES `participacion` (`Concurso_idConcurso`, `Participante_idParticipante`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `participacion`
--
ALTER TABLE `participacion`
  ADD CONSTRAINT `fk_Participacion_Concurso1` FOREIGN KEY (`Concurso_idConcurso`) REFERENCES `concurso` (`idConcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `participacion_ibfk_1` FOREIGN KEY (`Participante_idParticipante`) REFERENCES `usuario` (`idParticipante`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2022 a las 00:15:03
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tuprode`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id` int(5) NOT NULL,
  `equipo` varchar(14) DEFAULT NULL,
  `grupo` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `equipo`, `grupo`) VALUES
(1, 'Qatar', 'A'),
(2, 'Ecuador', 'A'),
(3, 'Senegal', 'A'),
(4, 'Países Bajos', 'A'),
(5, 'Inglaterra', 'B'),
(6, 'Irán', 'B'),
(7, 'Estados Unidos', 'B'),
(8, 'Gales', 'B'),
(9, 'Argentina', 'C'),
(10, 'Arabia Saudí', 'C'),
(11, 'México', 'C'),
(12, 'Polonia', 'C'),
(13, 'Francia', 'D'),
(14, 'Australia', 'D'),
(15, 'Dinamarca', 'D'),
(16, 'Túnez', 'D'),
(17, 'España', 'E'),
(18, 'Costa Rica', 'E'),
(19, 'Alemania', 'E'),
(20, 'Japón', 'E'),
(21, 'Bélgica', 'F'),
(22, 'Canadá', 'F'),
(23, 'Marruecos', 'F'),
(24, 'Croacia', 'F'),
(25, 'Brasil', 'G'),
(26, 'Serbia', 'G'),
(27, 'Suiza', 'G'),
(28, 'Camerún', 'G'),
(29, 'Portugal', 'H'),
(30, 'Ghana', 'H'),
(31, 'Uruguay', 'H'),
(32, 'Corea del Sur', 'H');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL,
  `grupo` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id`, `grupo`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E'),
(6, 'F'),
(7, 'G'),
(8, 'H');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadas`
--

CREATE TABLE `jugadas` (
  `id_jugada` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `partido` int(11) NOT NULL,
  `equipo_local` int(11) NOT NULL,
  `equipo_visitante` int(11) NOT NULL,
  `resultado_local` int(11) NOT NULL,
  `resultado_visitante` int(11) NOT NULL,
  `puntos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `id_partido` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` varchar(5) DEFAULT NULL,
  `lugar` varchar(21) DEFAULT NULL,
  `local` int(5) DEFAULT NULL,
  `visitante` int(5) DEFAULT NULL,
  `partido_jugado` int(11) NOT NULL,
  `res_local` int(11) NOT NULL,
  `res_visitante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`id_partido`, `fecha`, `hora`, `lugar`, `local`, `visitante`, `partido_jugado`, `res_local`, `res_visitante`) VALUES
(1, '2022-11-21', '10:00', 'Al Bayt', 1, 2, 0, 0, 0),
(2, '2022-11-21', '04:00', 'Al Thumama', 3, 4, 0, 0, 0),
(3, '2022-11-25', '07:00', 'Al Thumama', 1, 3, 0, 0, 0),
(4, '2022-11-25', '10:00', 'Khalifa International', 4, 2, 0, 0, 0),
(5, '2022-11-29', '09:00', 'Al Bayt', 4, 1, 0, 0, 0),
(6, '2022-11-29', '09:00', 'Khalifa International', 2, 3, 0, 0, 0),
(7, '2022-11-21', '07:00', 'Khalifa International', 5, 6, 0, 0, 0),
(8, '2022-11-21', '13:00', 'Ahmad Bin Ali', 7, 8, 0, 0, 0),
(9, '2022-11-25', '13:00', 'Al Bayt', 5, 7, 0, 0, 0),
(10, '2022-11-25', '04:00', 'Ahmad Bin Ali', 8, 6, 0, 0, 0),
(11, '2022-11-29', '13:00', 'Ahmad Bin Ali', 8, 5, 0, 0, 0),
(12, '2022-11-29', '13:00', 'Al Thumama', 6, 7, 0, 0, 0),
(13, '2022-11-22', '04:00', 'Lusail Iconic', 9, 10, 0, 0, 0),
(14, '2022-11-22', '10:00', 'Stadium 974', 11, 12, 0, 0, 0),
(15, '2022-11-26', '13:00', 'Lusail Iconic', 9, 11, 0, 0, 0),
(16, '2022-11-26', '07:00', 'Education City', 12, 10, 0, 0, 0),
(17, '2022-11-30', '13:00', 'Stadium 974', 12, 9, 0, 0, 0),
(18, '2022-11-30', '13:00', 'Lusail Iconic', 10, 11, 0, 0, 0),
(19, '2022-11-22', '13:00', 'Al Janoub', 13, 14, 0, 0, 0),
(20, '2022-11-22', '07:00', 'Education City', 15, 16, 0, 0, 0),
(21, '2022-11-26', '10:00', 'Stadium 974', 13, 15, 0, 0, 0),
(22, '2022-11-26', '00:00', 'Al Janoub', 16, 14, 0, 0, 0),
(23, '2022-11-30', '09:00', 'Education City', 16, 13, 0, 0, 0),
(24, '2022-11-30', '09:00', 'Al Janoub', 14, 15, 0, 0, 0),
(25, '2022-11-23', '10:00', 'Al Thumama', 17, 18, 0, 0, 0),
(26, '2022-11-23', '07:00', 'Khalifa International', 19, 20, 0, 0, 0),
(27, '2022-11-27', '13:00', 'Al Bayt', 17, 19, 0, 0, 0),
(28, '2022-11-27', '04:00', 'Ahmad Bin Ali', 20, 18, 0, 0, 0),
(29, '2022-12-01', '13:00', 'Khalifa International', 20, 17, 0, 0, 0),
(30, '2022-12-01', '13:00', 'Al Bayt', 18, 19, 0, 0, 0),
(31, '2022-11-23', '13:00', 'Ahmad Bin Ali', 21, 22, 0, 0, 0),
(32, '2022-11-23', '04:00', 'Al Bayt', 23, 24, 0, 0, 0),
(33, '2022-11-27', '07:00', 'Al Thumama', 21, 23, 0, 0, 0),
(34, '2022-11-27', '10:00', 'Khalifa International', 24, 22, 0, 0, 0),
(35, '2022-12-01', '09:00', 'Ahmad Bin Ali', 24, 21, 0, 0, 0),
(36, '2022-12-01', '09:00', 'Al Thumama', 22, 23, 0, 0, 0),
(37, '2022-11-24', '13:00', 'Lusail Iconic Stadium', 25, 26, 0, 0, 0),
(38, '2022-11-24', '04:00', 'Al Janoub', 27, 28, 0, 0, 0),
(39, '2022-11-28', '10:00', 'Stadium 974', 25, 27, 0, 0, 0),
(40, '2022-11-28', '04:00', 'Al Janoub', 28, 26, 0, 0, 0),
(41, '2022-12-02', '13:00', 'Lusail Iconic', 28, 25, 0, 0, 0),
(42, '2022-12-02', '13:00', 'Stadium 974', 26, 27, 0, 0, 0),
(43, '2022-11-24', '10:00', 'Stadium 974', 29, 30, 0, 0, 0),
(44, '2022-11-24', '07:00', 'Education City', 31, 32, 0, 0, 0),
(45, '2022-11-28', '13:00', 'Lusail Iconic', 29, 31, 0, 0, 0),
(46, '2022-11-28', '07:00', 'Education City', 32, 30, 0, 0, 0),
(47, '2022-12-02', '09:00', 'Education City', 32, 29, 0, 0, 0),
(48, '2022-12-02', '09:00', 'Al Janoub', 30, 31, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'Usuario'),
(3, 'yo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(4) NOT NULL,
  `usu_usuario` varchar(20) NOT NULL,
  `usu_clave` varchar(15) NOT NULL,
  `usu_nombre` varchar(30) NOT NULL,
  `usu_nivel` int(2) NOT NULL,
  `usu_fecha_alta` date NOT NULL,
  `tuqpoint` int(11) NOT NULL,
  `jugo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usu_usuario`, `usu_clave`, `usu_nombre`, `usu_nivel`, `usu_fecha_alta`, `tuqpoint`, `jugo`) VALUES
(1, 'tuqprode', 'tucu', 'Ruben correa', 3, '2022-10-28', 1000, 0);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_partidos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_partidos` (
`id_partido` int(11)
,`fecha` date
,`hora` varchar(5)
,`lugar` varchar(21)
,`local` int(5)
,`visitante` int(5)
,`localnombre` varchar(14)
,`visitantenombre` varchar(14)
,`grupo` varchar(5)
,`partido_jugado` int(11)
,`res_local` int(11)
,`res_visitante` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_puntos_jugadores`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_puntos_jugadores` (
`id_usuario` int(4)
,`usu_usuario` varchar(20)
,`puntos` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_partidos`
--
DROP TABLE IF EXISTS `vista_partidos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_partidos`  AS SELECT `partidos`.`id_partido` AS `id_partido`, `partidos`.`fecha` AS `fecha`, `partidos`.`hora` AS `hora`, `partidos`.`lugar` AS `lugar`, `partidos`.`local` AS `local`, `partidos`.`visitante` AS `visitante`, (select `equipos`.`equipo` from `equipos` where `partidos`.`local` = `equipos`.`id`) AS `localnombre`, (select `equipos`.`equipo` from `equipos` where `partidos`.`visitante` = `equipos`.`id`) AS `visitantenombre`, (select `equipos`.`grupo` from `equipos` where `partidos`.`local` = `equipos`.`id`) AS `grupo`, `partidos`.`partido_jugado` AS `partido_jugado`, `partidos`.`res_local` AS `res_local`, `partidos`.`res_visitante` AS `res_visitante` FROM `partidos``partidos`  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_puntos_jugadores`
--
DROP TABLE IF EXISTS `vista_puntos_jugadores`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_puntos_jugadores`  AS SELECT `usuarios`.`id_usuario` AS `id_usuario`, `usuarios`.`usu_usuario` AS `usu_usuario`, (select sum(`jugadas`.`puntos`) from `jugadas` group by `jugadas`.`usuario` having `usuarios`.`id_usuario` = `jugadas`.`usuario`) AS `puntos` FROM `usuarios``usuarios`  ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jugadas`
--
ALTER TABLE `jugadas`
  ADD PRIMARY KEY (`id_jugada`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`id_partido`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `jugadas`
--
ALTER TABLE `jugadas`
  MODIFY `id_jugada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

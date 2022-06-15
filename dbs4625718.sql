-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: db5005502059.hosting-data.io
-- Tiempo de generación: 10-11-2021 a las 12:35:47
-- Versión del servidor: 5.7.33-log
-- Versión de PHP: 7.0.33-0+deb9u12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbs4625718`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `LISTS`
--

CREATE TABLE `LISTS` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `username` varchar(100) NOT NULL,
  `listname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `LISTS`
--

INSERT INTO `LISTS` (`id`, `username`, `listname`) VALUES
(3, 'timmy', 'timmyList');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TASKS`
--

CREATE TABLE `TASKS` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `taskname` varchar(255) NOT NULL,
  `list` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `TASKS`
--

INSERT INTO `TASKS` (`id`, `taskname`, `list`) VALUES
(4, 'timmyTask', 'timmyList');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USERS`
--

CREATE TABLE `USERS` (
  `id` int(11) NOT NULL COMMENT 'primary key',
  `userame` varchar(50) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `teacherstatus` tinyint(1) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL COMMENT 'create time',
  `update_time` datetime DEFAULT NULL COMMENT 'update time'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `USERS`
--

INSERT INTO `USERS` (`id`, `userame`, `passwd`, `email`, `teacherstatus`, `create_time`, `update_time`) VALUES
(10, 'timmy', '$2y$10$tFzqn3mCyYgvJFZa5g1.tudw4zfRpnO/6czLslMgnFTKVhxe02URq', 'timmy@mail.com', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `LISTS`
--
ALTER TABLE `LISTS`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `listname` (`listname`),
  ADD KEY `username` (`username`);

--
-- Indices de la tabla `TASKS`
--
ALTER TABLE `TASKS`
  ADD PRIMARY KEY (`id`),
  ADD KEY `list` (`list`);

--
-- Indices de la tabla `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userame` (`userame`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `LISTS`
--
ALTER TABLE `LISTS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `TASKS`
--
ALTER TABLE `TASKS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `USERS`
--
ALTER TABLE `USERS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `TASKS`
--
ALTER TABLE `TASKS`
  ADD CONSTRAINT `FK_TASKLIST` FOREIGN KEY (`list`) REFERENCES `LISTS` (`listname`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

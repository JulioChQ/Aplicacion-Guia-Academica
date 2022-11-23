-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2022 a las 17:59:23
-- Versión del servidor: 8.0.26
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `guia_academica`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `cursos_por_usuario` (IN `_codigo` VARCHAR(20))  BEGIN
	SELECT asignatura.id_asignatura, asignatura.nombre, asignatura.horas_teoria + asignatura.horas_laboratorio/2 + asignatura.horas_practica/2 as creditos, asignatura.nro_ciclo  FROM (asignatura INNER JOIN curricula ON asignatura.id_curricula = curricula.id_curricula) INNER JOIN usuario ON usuario.id_curricula = curricula.id_curricula WHERE usuario.codigo = _codigo;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `id_asignatura` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `horas_teoria` tinyint NOT NULL DEFAULT '0',
  `horas_practica` tinyint NOT NULL DEFAULT '0',
  `horas_laboratorio` tinyint NOT NULL DEFAULT '0',
  `nro_ciclo` tinyint NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `id_curricula` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`id_asignatura`, `nombre`, `horas_teoria`, `horas_practica`, `horas_laboratorio`, `nro_ciclo`, `descripcion`, `id_curricula`) VALUES
(1, 'MATEMÁTICA', 2, 2, 0, 1, NULL, 1),
(2, 'COMUNICACIÓN Y REDACCIÓN', 2, 2, 0, 1, NULL, 1),
(3, 'METODOLOGÍA DEL TRABAJO UNIVERSITARIO', 0, 4, 0, 1, NULL, 1),
(4, 'FUNDAMENTOS DE PROGRAMACIÓN', 2, 0, 2, 1, NULL, 1),
(5, 'QUÍMICA', 2, 0, 2, 1, NULL, 1),
(6, 'MATEMÁTICA DISCRETA I', 3, 0, 2, 1, NULL, 1),
(7, 'PROGRAMACIÓN GRÁFICA', 2, 0, 4, 1, NULL, 1),
(8, 'ECOLOGÍA Y AMBIENTE', 2, 2, 0, 2, NULL, 1),
(9, 'REALIDAD NACIONAL E INTERNACIONAL', 0, 4, 0, 2, NULL, 1),
(10, 'FILOSOFÍA ÉTICA Y SOCIEDAD', 2, 2, 0, 2, NULL, 1),
(11, 'MATEMÁTICA I', 2, 2, 0, 2, NULL, 1),
(12, 'FÍSICA I', 2, 0, 2, 2, NULL, 1),
(13, 'MATEMÁTICA DISCRETA II', 3, 2, 0, 2, NULL, 1),
(14, 'PROGRAMACIÓN AVANZADA', 2, 2, 2, 2, NULL, 1),
(15, 'TEORÍA GENERAL DE SISTEMAS', 1, 2, 0, 3, NULL, 1),
(16, 'SISTEMAS ELÉCTRICOS Y ELECTRÓNICOS', 2, 4, 0, 3, NULL, 1),
(17, 'ESTRUCTURA DE DATOS', 2, 2, 2, 3, NULL, 1),
(18, 'ALGORITMOS Y PROGRAMACIÓN PARALELA', 2, 2, 2, 3, NULL, 1),
(19, 'MATEMÁTICA II', 3, 2, 0, 3, NULL, 1),
(20, 'ESTADÍSTICA Y PROBABILIDADES', 3, 0, 2, 3, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curricula`
--

CREATE TABLE `curricula` (
  `id_curricula` int NOT NULL,
  `regimen` char(2) NOT NULL,
  `anio` char(4) NOT NULL,
  `id_escuela` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `curricula`
--

INSERT INTO `curricula` (`id_curricula`, `regimen`, `anio`, `id_escuela`) VALUES
(1, 'F2', '2018', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuela`
--

CREATE TABLE `escuela` (
  `id_escuela` int NOT NULL,
  `abreviatura` char(5) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `id_facultad` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `escuela`
--

INSERT INTO `escuela` (`id_escuela`, `abreviatura`, `nombre`, `id_facultad`) VALUES
(1, 'ESIS', 'ESCUELA PROFESIONAL DE INGENIERÍA EN INFORMÁTICA Y SISTEMAS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `id_facultad` int NOT NULL,
  `abreviatura` char(5) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`id_facultad`, `abreviatura`, `nombre`) VALUES
(1, 'FAIN', 'FACULTAD DE INGENIERÍA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prerrequisito`
--

CREATE TABLE `prerrequisito` (
  `id_asignatura` int NOT NULL,
  `id_asignatura1` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `situacion_asignatura`
--

CREATE TABLE `situacion_asignatura` (
  `tipo` tinyint NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `id_usuario` int NOT NULL,
  `id_asignatura` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `situacion_asignatura`
--

INSERT INTO `situacion_asignatura` (`tipo`, `fecha_modificacion`, `id_usuario`, `id_asignatura`) VALUES
(1, '2022-11-23 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `contrasenia` varchar(45) DEFAULT NULL,
  `tipo_usuario` tinyint DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido1` varchar(45) DEFAULT NULL,
  `apellido2` varchar(45) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `ultima_sesion` datetime DEFAULT NULL,
  `estado_sesion` tinyint DEFAULT NULL,
  `ciclo` tinyint DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `email_institucional` varchar(60) DEFAULT NULL,
  `id_curricula` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `codigo`, `contrasenia`, `tipo_usuario`, `nombre`, `apellido1`, `apellido2`, `fecha_nacimiento`, `ultima_sesion`, `estado_sesion`, `ciclo`, `genero`, `celular`, `email_institucional`, `id_curricula`) VALUES
(1, '2018-119025', '1234', 1, 'Julio', 'Choquehuayta', 'Quenta', '2001-04-27', NULL, NULL, 8, 'M', NULL, NULL, 1),
(2, '2015-119026', '12345', 1, 'Carlos', 'Azañero', 'Otoya', NULL, NULL, NULL, 8, 'M', NULL, NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`id_asignatura`),
  ADD KEY `fk_asignatura_curricula1_idx` (`id_curricula`);

--
-- Indices de la tabla `curricula`
--
ALTER TABLE `curricula`
  ADD PRIMARY KEY (`id_curricula`),
  ADD KEY `fk_curricula_escuela1_idx` (`id_escuela`);

--
-- Indices de la tabla `escuela`
--
ALTER TABLE `escuela`
  ADD PRIMARY KEY (`id_escuela`),
  ADD KEY `fk_escuela_facultad1_idx` (`id_facultad`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`id_facultad`);

--
-- Indices de la tabla `prerrequisito`
--
ALTER TABLE `prerrequisito`
  ADD KEY `fk_prerrequisito_asignatura_idx` (`id_asignatura`),
  ADD KEY `fk_prerrequisito_asignatura2_idx` (`id_asignatura1`);

--
-- Indices de la tabla `situacion_asignatura`
--
ALTER TABLE `situacion_asignatura`
  ADD PRIMARY KEY (`id_usuario`,`id_asignatura`),
  ADD KEY `fk_situacion_asignatura_asignatura_idx` (`id_asignatura`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_usuario_curricula_idx` (`id_curricula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `id_asignatura` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `curricula`
--
ALTER TABLE `curricula`
  MODIFY `id_curricula` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `escuela`
--
ALTER TABLE `escuela`
  MODIFY `id_escuela` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `facultad`
--
ALTER TABLE `facultad`
  MODIFY `id_facultad` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD CONSTRAINT `fk_asignatura_curricula1` FOREIGN KEY (`id_curricula`) REFERENCES `curricula` (`id_curricula`);

--
-- Filtros para la tabla `curricula`
--
ALTER TABLE `curricula`
  ADD CONSTRAINT `fk_curricula_escuela1` FOREIGN KEY (`id_escuela`) REFERENCES `escuela` (`id_escuela`);

--
-- Filtros para la tabla `escuela`
--
ALTER TABLE `escuela`
  ADD CONSTRAINT `fk_escuela_facultad1` FOREIGN KEY (`id_facultad`) REFERENCES `facultad` (`id_facultad`);

--
-- Filtros para la tabla `prerrequisito`
--
ALTER TABLE `prerrequisito`
  ADD CONSTRAINT `fk_prerrequisito_asignatura` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id_asignatura`),
  ADD CONSTRAINT `fk_prerrequisito_asignatura2` FOREIGN KEY (`id_asignatura1`) REFERENCES `asignatura` (`id_asignatura`);

--
-- Filtros para la tabla `situacion_asignatura`
--
ALTER TABLE `situacion_asignatura`
  ADD CONSTRAINT `fk_situacion_asignatura_asignatura` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id_asignatura`),
  ADD CONSTRAINT `fk_situacion_asignatura_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_curricula` FOREIGN KEY (`id_curricula`) REFERENCES `curricula` (`id_curricula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

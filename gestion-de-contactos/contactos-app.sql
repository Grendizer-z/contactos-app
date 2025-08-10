-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-08-2025 a las 03:54:51
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `contactos-app`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `usuario_id`, `nombre`, `telefono`, `email`, `fecha_creacion`) VALUES
(70, 48, 'juan', '777', 'juan@example.com', '2025-08-10'),
(763, 97, 'pepe', '234234', 'pepe@example.com', '2025-08-10'),
(981, 48, 'Walter', '42342', 'walter@example.com', '2025-08-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `clave` varchar(100) DEFAULT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `clave`, `fecha_creacion`) VALUES
(28, 'Roberto', 'roberto@example.com', '$2y$10$U.Mvmfcv.hZhjE/R3jY9PuKHPyGNXQ8p8rFtaLIZEAR6HHDBNKYPK', '2025-08-10'),
(48, 'jorge', 'jorge@example.com', '$2y$10$jNajlnxXUJfeRv76nUnDXO4SCP/3088Oac1nF8mQGvcsAhTBKNfJO', '2025-08-09'),
(70, 'juan', 'juan@example.com', '$2y$10$Xdg8nbThd6RMH6RTQn.YxOiOA0goxTD5N5zN/PGd13k8wSHg7wBvu', '2025-08-09'),
(74, 'Bob', 'bob@example.com', '$2y$10$S0ns4mM879mTuG/vxbheZ.UVIZCZN/FEfqrDt1KGkDWK3OrintPlK', '2025-08-10'),
(87, 'Bob', 'bob@example.com', '$2y$10$BGIggfXp3SEQwx5pAiL11ujcYw/FE6nu0NSWB7pOp45.HP3koYnGe', '2025-08-10'),
(97, 'juan', 'juan@example.com', '$2y$10$J.f9Eu94zWUj54clPVqXFO6ZGOK4pkEau/nCzVyyhWPMmdHCBLZKy', '2025-08-09');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD CONSTRAINT `contactos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

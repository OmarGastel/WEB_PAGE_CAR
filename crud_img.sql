-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-01-2025 a las 00:50:53
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crud_img`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img`
--

CREATE TABLE `img` (
  `id_img` int NOT NULL,
  `foto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `img`
--

INSERT INTO `img` (`id_img`, `foto`, `description`, `price`) VALUES
(20, 'Archivo/20.png', 'TESLA 5.19 Model S, Model 3, Model X y Model Y, conocidos por su diseño elegante, rendimiento excepcional y tecnología de vanguardia. Además de automóviles, Tesla también desarrolla soluciones de energía sostenible, como paneles solares y sistemas de almacenamiento de energía. La misión de Tesla es acelerar la transición del mundo hacia la energía sostenible.', 46547.00),
(21, 'Archivo/21.png', 'TESLA 5.19 Model S, Model 3, Model X y Model Y, conocidos por su diseño elegante, rendimiento excepcional y tecnología de vanguardia. Además de automóviles, Tesla también desarrolla soluciones de energía sostenible, como paneles solares y sistemas de almacenamiento de energía. La misión de Tesla es acelerar la transición del mundo hacia la energía sostenible.', 87.00),
(23, 'Archivo/23.png', 'TESLA 5.19 Model S, Model 3, Model X y Model Y, conocidos por su diseño elegante, rendimiento excepcional y tecnología de vanguardia. Además de automóviles, Tesla también desarrolla soluciones de energía sostenible, como paneles solares y sistemas de almacenamiento de energía. La misión de Tesla es acelerar la transición del mundo hacia la energía sostenible.', 2345678.00),
(24, 'Archivo/24.png', 'TESLA 5.19 Model S, Model 3, Model X y Model Y, conocidos por su diseño elegante, rendimiento excepcional y tecnología de vanguardia. Además de automóviles, Tesla también desarrolla soluciones de energía sostenible, como paneles solares y sistemas de almacenamiento de energía. La misión de Tesla es acelerar la transición del mundo hacia la energía sostenible.', 666.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebas`
--

CREATE TABLE `pruebas` (
  `id` int NOT NULL,
  `auto_id` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `descripcion` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `pruebas`
--

INSERT INTO `pruebas` (`id`, `auto_id`, `nombre`, `apellido`, `telefono`, `descripcion`, `created_at`) VALUES
(1, 19, 'OMAR', 'Omar Gil', '6182436092', 'TESLA 5.19 Model S, Model 3, Model X y Model Y, conocidos por su diseño elegante, rendimiento excepcional y tecnología de vanguardia. Además de automóviles, Tesla también desarrolla soluciones de energía sostenible, como paneles solares y sistemas de almacenamiento de energía. La misión de Tesla es acelerar la transición del mundo hacia la energía sostenible.', '2025-01-13 04:03:36'),
(2, 19, 'roberto', 'ramirez', '22.5.8', 'TESLA 5.19 Model S, Model 3, Model X y Model Y, conocidos por su diseño elegante, rendimiento excepcional y tecnología de vanguardia. Además de automóviles, Tesla también desarrolla soluciones de energía sostenible, como paneles solares y sistemas de almacenamiento de energía. La misión de Tesla es acelerar la transición del mundo hacia la energía sostenible.', '2025-01-13 04:11:30'),
(3, 19, 'roberto', 'ramirez', '22.5.8', 'TESLA 5.19 Model S, Model 3, Model X y Model Y, conocidos por su diseño elegante, rendimiento excepcional y tecnología de vanguardia. Además de automóviles, Tesla también desarrolla soluciones de energía sostenible, como paneles solares y sistemas de almacenamiento de energía. La misión de Tesla es acelerar la transición del mundo hacia la energía sostenible.', '2025-01-13 04:12:07'),
(4, 19, 'roberto', 'ramirez', '22.5.8', 'TESLA 5.19 Model S, Model 3, Model X y Model Y, conocidos por su diseño elegante, rendimiento excepcional y tecnología de vanguardia. Además de automóviles, Tesla también desarrolla soluciones de energía sostenible, como paneles solares y sistemas de almacenamiento de energía. La misión de Tesla es acelerar la transición del mundo hacia la energía sostenible.', '2025-01-13 04:12:31'),
(5, 19, 'roberto', 'ramirez', '22.5.8', 'TESLA 5.19 Model S, Model 3, Model X y Model Y, conocidos por su diseño elegante, rendimiento excepcional y tecnología de vanguardia. Además de automóviles, Tesla también desarrolla soluciones de energía sostenible, como paneles solares y sistemas de almacenamiento de energía. La misión de Tesla es acelerar la transición del mundo hacia la energía sostenible.', '2025-01-13 04:15:19'),
(6, 19, 'roberto', 'ramirez', '22.5.8', 'TESLA 5.19 Model S, Model 3, Model X y Model Y, conocidos por su diseño elegante, rendimiento excepcional y tecnología de vanguardia. Además de automóviles, Tesla también desarrolla soluciones de energía sostenible, como paneles solares y sistemas de almacenamiento de energía. La misión de Tesla es acelerar la transición del mundo hacia la energía sostenible.', '2025-01-13 04:16:16'),
(7, 19, 'roberto', 'ramirez', '22.5.8', 'TESLA 5.19 Model S, Model 3, Model X y Model Y, conocidos por su diseño elegante, rendimiento excepcional y tecnología de vanguardia. Además de automóviles, Tesla también desarrolla soluciones de energía sostenible, como paneles solares y sistemas de almacenamiento de energía. La misión de Tesla es acelerar la transición del mundo hacia la energía sostenible.', '2025-01-13 04:17:44'),
(8, 20, 'ADRUAN', 'Omar Gil', '6182436092', 'TESLA 5.19 Model S, Model 3, Model X y Model Y, conocidos por su diseño elegante, rendimiento excepcional y tecnología de vanguardia. Además de automóviles, Tesla también desarrolla soluciones de energía sostenible, como paneles solares y sistemas de almacenamiento de energía. La misión de Tesla es acelerar la transición del mundo hacia la energía sostenible.', '2025-01-13 04:24:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebas_agendadas`
--

CREATE TABLE `pruebas_agendadas` (
  `id` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `auto_seleccionado` int NOT NULL,
  `fecha_prueba` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id_img`);

--
-- Indices de la tabla `pruebas`
--
ALTER TABLE `pruebas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pruebas_agendadas`
--
ALTER TABLE `pruebas_agendadas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auto_seleccionado` (`auto_seleccionado`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `img`
--
ALTER TABLE `img`
  MODIFY `id_img` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `pruebas`
--
ALTER TABLE `pruebas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pruebas_agendadas`
--
ALTER TABLE `pruebas_agendadas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pruebas_agendadas`
--
ALTER TABLE `pruebas_agendadas`
  ADD CONSTRAINT `pruebas_agendadas_ibfk_1` FOREIGN KEY (`auto_seleccionado`) REFERENCES `img` (`id_img`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

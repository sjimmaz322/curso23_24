-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 13-11-2023 a las 13:30:37
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_cv`
--
CREATE DATABASE IF NOT EXISTS `bd_cv` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_cv`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `sexo` enum('hombre','mujer') NOT NULL,
  `foto` varchar(30) NOT NULL DEFAULT 'no_imagen.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `clave`, `nombre`, `dni`, `sexo`, `foto`) VALUES
(1, 'Pache', '1234', 'Samuel Jiménez', '31014322-H', 'hombre', 'no_imagen.jpg'),
(2, 'Nacho', '12345', 'José Ignacio', '78945612-V', 'hombre', 'img_2.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

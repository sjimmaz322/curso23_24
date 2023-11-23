-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 23-11-2023 a las 14:41:20
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
-- Base de datos: `bd_videoclub`
--
CREATE DATABASE IF NOT EXISTS `bd_videoclub` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `bd_videoclub`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `idPelicula` int(11) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `director` varchar(20) NOT NULL,
  `sinopsis` text NOT NULL,
  `tematica` varchar(15) NOT NULL,
  `caratula` varchar(30) NOT NULL DEFAULT 'no_imagen.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`idPelicula`, `titulo`, `director`, `sinopsis`, `tematica`, `caratula`) VALUES
(1, 'Little Nicky', 'Steven Brill', 'Dos de los tres hijos del Diablo escapan del infierno para causar estragos en la Tierra. Satán envía a su tercer hijo, el amable Nicky, para traerlos de vuelta antes de que sea demasiado tarde.', 'Comedia', 'img_1.jpg'),
(2, 'Malditos Bastardos', 'Quentin Tarantino', 'En la Francia ocupada por los nazis durante la Segunda Guerra Mundial, un plan para asesinar a los líderes nazis por parte de un grupo de soldados judíos estadounidenses coincide con los planes vengativos de la dueña de un cine.', 'Drama Bélico', 'no_img.jpg'),
(3, 'Black Snake Moan', 'Craig Brewer', 'In a small Tennessee town, two unlikely souls are about to be lured together at the sticky crossroads between rage and love. Found lying on the side of the road, beaten and nearly dead, is Rae (Christina Ricci), a 22-year-old who has developed a reputation around town for having an insatiable \"itch\" for sex. Her rescuer is Lazarus (Samuel L. Jackson), an ex-blues guitarist who has grown used to life’s relentless strains of trouble and sorrow. ', 'Drama', 'img_3.png'),
(4, 'El Atlas de las Nubes', 'Hermanas Wachowski', 'An exploration of how the actions of individual lives impact one another in the past, present and future, as one soul is shaped from a killer into a hero, and an act of kindness ripples across centuries to inspire a revolution.', 'Sci-fi', 'img_4.png'),
(5, 'Shrek', 'Vicky Jenson', 'Hace mucho tiempo, en una lejanísima ciénaga, vivía un feroz ogro llamado Shrek. De repente, un día, su soledad se ve interrumpida por una invasión de sorprendentes personajes. Hay ratoncitos ciegos en su comida, un enorme y malísimo lobo en su cama, tres cerditos sin hogar y otros seres que han sido deportados de su tierra por el malvado Lord Farquaad. Para salvar su territorio, Shrek hace un pacto con Farquaad y emprende viaje para conseguir que la bella princesa Fiona acceda a ser la novia del Lord. En tan importante misión le acompaña un divertido burro, dispuesto a hacer cualquier cosa por Shrek: todo, menos guardar silencio.', 'Fantasia', 'img_5.png'),
(6, 'La cabaña del Bosque', 'Drew Goddard', 'Cinco estudiantes universitarios se preparan para pasar el fin de semana en una cabaña situada en un remoto bosque y sin medios de comunicación con el exterior. En el sótano encuentran una extraña colección de recuerdos; entre ellos, un diario que habla de la antigua familia que ocupó la casa. Mientras tanto, un par de técnicos en una planta industrial se están preparando para una operación desconocida. Están filmando a los jóvenes con cámaras ocultas y a través del diseño de la cabaña, el uso de sofisticados controles ambientales y la liberación de drogas en el aire, los técnicos manipulan el medio ambiente asemejándolo a un arquetipo de terror. ', 'Comedia', 'no_img.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`idPelicula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `idPelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

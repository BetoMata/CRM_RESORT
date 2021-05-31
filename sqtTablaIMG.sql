-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2021 a las 04:12:03
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vacaciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes_img`
--

CREATE TABLE `paquetes_img` (
  `id_paqueteIMG` smallint(5) NOT NULL,
  `clave` varchar(70) NOT NULL,
  `ruta` varchar(250) NOT NULL,
  `tipo` varchar(250) NOT NULL,
  `size` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paquetes_img`
--

INSERT INTO `paquetes_img` (`id_paqueteIMG`, `clave`, `ruta`, `tipo`, `size`) VALUES
(1, 'A2020CANCUN', 'paquete1.png', 'image/png', 336581),
(2, 'A2020LUGAR2', 'paquete2.png', 'image/png', 335986),
(3, 'A2020LUGAR3', 'paquete3.png', 'image/png', 322462),
(4, 'A2020LUGAR4', 'paquete4.png', 'image/png', 281516),
(5, 'A2020LUGAR4', 'paquete4.png', 'image/png', 281516),
(6, 'A2020LUGAR4', 'paquete4.png', 'image/png', 281516),
(7, 'A2020LUGAR5', 'paquete5.png', 'image/png', 241033),
(8, 'A2020LUGAR6', 'paquete6.png', 'image/png', 307932),
(9, 'A2020LUGAR7', 'paquete7.png', 'image/png', 333550),
(10, 'A2020LUGAr8', 'paquete2.png', 'image/png', 349073);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `paquetes_img`
--
ALTER TABLE `paquetes_img`
  ADD PRIMARY KEY (`id_paqueteIMG`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `paquetes_img`
--
ALTER TABLE `paquetes_img`
  MODIFY `id_paqueteIMG` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

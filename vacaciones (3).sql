-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2021 a las 20:21:57
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.3.26

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
-- Estructura de tabla para la tabla `cuentas_clientes`
--

CREATE TABLE `cuentas_clientes` (
  `id_cliente` int(4) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `apellido` varchar(70) NOT NULL,
  `numero` varchar(70) NOT NULL,
  `correo` varchar(70) NOT NULL,
  `username` varchar(70) NOT NULL,
  `contrasena` varchar(70) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuentas_clientes`
--

INSERT INTO `cuentas_clientes` (`id_cliente`, `nombre`, `apellido`, `numero`, `correo`, `username`, `contrasena`, `status`) VALUES
(12345, '', '', '', '', '', '', 0),
(0, 'lusi', 'pemd', '123 456 7897', 'ld@dfk', 'luiser', '123', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leads`
--

CREATE TABLE `leads` (
  `id_lead` int(4) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `apellido` varchar(70) NOT NULL,
  `correo` varchar(70) NOT NULL,
  `numero` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `leads`
--

INSERT INTO `leads` (`id_lead`, `nombre`, `apellido`, `correo`, `numero`) VALUES
(1, 'Diego', 'Contacto', 'diego@mail.com', 2147483647),
(2, 'isra', 'perez', 'isra@gamcil', 1234567890),
(3, '', 'Perez', 'r@com', 0),
(4, '', 'Perez', 'r@com', 0),
(5, '', 'Perez', 'r@com', 0),
(6, '', 'Perez', 'r@com', 0),
(7, 'Jose', 'Perez', 'r@com', 123),
(8, 'Jose', 'Perez', 'r@com', 123),
(9, 'Jose', 'Perez', 'r@com', 1234567890),
(10, '', '', '', 0),
(11, 'Luis', 'Medina', 'luis@email.com', 1234567894),
(12, '', '', '', 0),
(13, 'Juan', 'Perez23', 'juan@emialclom', 1234567897);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes`
--

CREATE TABLE `paquetes` (
  `id_paquete` smallint(5) NOT NULL,
  `clave` varchar(70) NOT NULL,
  `salida` varchar(250) NOT NULL,
  `destino` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `paquete` char(1) NOT NULL,
  `precio` int(9) NOT NULL,
  `personas` int(3) NOT NULL,
  `disponibilidad` int(3) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  `vencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paquetes`
--

INSERT INTO `paquetes` (`id_paquete`, `clave`, `salida`, `destino`, `descripcion`, `paquete`, `precio`, `personas`, `disponibilidad`, `status`, `tipo`, `vencimiento`) VALUES
(1, 'A2020CANCUN', 'CDMX', 'CANCUN', 'HOTEL+VUELO', 'A', 10900, 1, 1, 1, 1, '2021-06-05'),
(2, 'A2020LUGAR2', 'CDMX', 'CAMPECHE', 'HOTEL+VUELO', 'B', 10900, 20, 1, 1, 2, '2021-05-29'),
(3, 'A2020LUGAR3', 'TIJUANA', 'GUADALAJARA', 'HOTEL+VUELO', 'A', 50000, 3, 1, 1, 2, '2021-06-04'),
(4, 'A2020LUGAR4', 'TIJUANA', 'CDMX', 'HOTEL+VUELO', 'B', 5400, 1, 1, 1, 1, '2021-06-01'),
(5, 'A2020LUGAR4', 'TIJUANA', 'CDMX', 'HOTEL+VUELO', 'B', 5400, 1, 1, 0, 1, '2021-06-01'),
(6, 'A2020LUGAR4', 'TIJUANA', 'CDMX', 'HOTEL+VUELO', 'B', 5400, 1, 1, 0, 1, '2021-06-01'),
(7, 'A2020LUGAR5', 'GUERRERO', 'CDMX', 'HOTEL', 'A', 20000, 17, 17, 1, 1, '2021-07-15'),
(8, 'A2020LUGAR6', 'ACAPULCO', 'CDMX', 'HOTEL+VUELO', 'B', 20000, 1, 34, 1, 1, '2021-06-03'),
(9, 'A2020LUGAR7', 'TIJUANA', 'CANCUN', 'HOTEL', 'A', 20000, 3, 5, 1, 2, '2021-05-26'),
(10, 'A2020LUGAr8', 'TIJUANA', 'CAMBECHE', 'HOTEL+VUELO', 'A', 10900, 3, 5, 1, 1, '2021-05-31'),
(11, '123456', 'Guerrero', 'Ensenada', 'Hotel', 'A', 347847, 2, 1, 1, 2, '2021-05-28'),
(12, '123459', 'GuerreroBc', 'Ensenada', 'Hotel', 'A', 1, 1, 1, 1, 1, '1995-12-02');

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
(10, 'A2020LUGAr8', 'paquete2.png', 'image/png', 349073),
(11, '123459', 'logo.png', 'image/png', 120684);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `contrasena` varchar(70) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `apellido` varchar(70) NOT NULL,
  `numero` int(10) NOT NULL,
  `correo` varchar(70) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `username`, `contrasena`, `nombre`, `apellido`, `numero`, `correo`, `status`, `tipo`) VALUES
(0, 'crisreg', 'jfieoskel', 'Cristian', 'Registro', 2147483647, 'cris@mail.com', 1, 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id_lead`);

--
-- Indices de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD PRIMARY KEY (`id_paquete`);

--
-- Indices de la tabla `paquetes_img`
--
ALTER TABLE `paquetes_img`
  ADD PRIMARY KEY (`id_paqueteIMG`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `leads`
--
ALTER TABLE `leads`
  MODIFY `id_lead` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  MODIFY `id_paquete` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `paquetes_img`
--
ALTER TABLE `paquetes_img`
  MODIFY `id_paqueteIMG` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

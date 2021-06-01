-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2021 a las 11:04:16
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
-- Estructura de tabla para la tabla `cuentas_clientes`
--

CREATE TABLE `cuentas_clientes` (
  `id_cliente` int(4) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `apellido` varchar(70) NOT NULL,
  `edad` int(3) NOT NULL,
  `numero` int(10) NOT NULL,
  `correo` varchar(70) NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuentas_clientes`
--

INSERT INTO `cuentas_clientes` (`id_cliente`, `nombre`, `apellido`, `edad`, `numero`, `correo`, `username`, `password`) VALUES
(1, 'Adriana', 'Mata', 30, 2147483647, 'Adriana3@gmail.com', 'Adriana3', 'Mata'),
(2, 'Carlos', 'Mata', 40, 1865863771, 'Carlos4@gmail.com', 'Carlos4', 'Mata'),
(3, 'Daniel', 'Gonzalez', 30, 2147483647, 'Daniel3@gmail.com', 'Daniel3', 'Gonzalez'),
(4, 'Fernando', 'Gonzalez', 50, 2147483647, 'Fernando5@gmail.com', 'Fernando5', 'Gonzalez'),
(5, 'Roberto', 'Mata', 18, 2147483647, 'Roberto11@gmail.com', 'Roberto11', 'Mata'),
(6, 'Juan', 'Hernandez', 19, 2147483647, 'Juan19@gmail.com', 'Juan19', 'Hernandez'),
(7, 'Raul', 'Perez', 55, 2147483647, 'Raul5@gmail.com', 'Raul5', 'Perez'),
(8, 'Luis', 'Gonzalez', 21, 2147483647, 'Luis11@gmail.com', 'Luis11', 'Gonzalez'),
(9, 'Jose', 'Hernandez', 21, 1173880160, 'Jose11@gmail.com', 'Jose11', 'Hernandez'),
(10, 'Octavio', 'Montes', 26, 1470232345, 'Octavio2@gmail.com', 'Octavio2', 'Montes'),
(11, 'Pedro', 'Mata', 54, 2147483647, 'Pedro13@gmail.com', 'Pedro13', 'Mata'),
(12, 'Julia', 'Montes', 18, 2015411111, 'Julia18@gmail.com', 'Julia18', 'Montes'),
(13, 'Maria', 'Mata', 36, 2147483647, 'Maria6@gmail.com', 'Maria6', 'Mata'),
(14, 'Claudia', 'Montes', 46, 2147483647, 'Claudia16@gmail.com', 'Claudia16', 'Montes'),
(15, 'Ana', 'Mata', 42, 2147483647, 'Ana4@gmail.com', 'Ana4', 'Mata'),
(16, 'Jose Luis', 'Guapilla', 0, 123, 'luis_gu_11@hotmail.com', 'Lira12', '102301'),
(17, 'Jose Luis', 'Guapilla', 0, 123, 'luis_gu_11@hotmail.com', 'Lira12', '102301'),
(18, 'Jose Luis', 'Guapilla', 0, 123, 'luis_gu_11@hotmail.com', 'Lira12', 'ggggg'),
(19, 'jose luis', 'Guapilla', 0, 123, 'jlira12@alumnos.uaq.mx', 'jo80', '890'),
(20, 'jose luis', 'Guapilla', 28, 123, 'jlira12@alumnos.uaq.mx', 'jo80', '890');

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
(1, 'Jose', 'Gonzalez', 'Jose9@gmail.com', 2147483647),
(2, 'Octavio', 'Montes', 'Octavio16@gmail.com', 2147483647),
(3, 'Pedro', 'Hernandez', 'Pedro8@gmail.com', 2147483647),
(4, 'Julia', 'Perez', 'Julia12@gmail.com', 765337650),
(5, 'Maria', 'Hernandez', 'Maria9@gmail.com', 2147483647),
(6, 'Claudia', 'Gonzalez', 'Claudia12@gmail.com', 1184296886),
(7, 'Ana', 'Hernandez', 'Ana9@gmail.com', 2147483647),
(8, 'Jose Luis', 'Lira', 'jlira12@alumnos.uaq.mx', 2147483647),
(9, 'Jose Luis', 'Lira', 'jlira12@alumnos.uaq.mx', 2147483647),
(10, 'Jose Luis', 'Lira', 'jlira12@alumnos.uaq.mx', 2147483647),
(11, 'Jose Luis', 'Lira', 'jlira12@alumnos.uaq.mx', 2147483647),
(12, 'Jose Luis', 'Lira', 'jlira12@alumnos.uaq.mx', 2147483647),
(13, 'Jose Luis', 'Lira', 'jlira12@alumnos.uaq.mx', 2147483647),
(14, 'Jose Luis', 'Lira', 'jlira12@alumnos.uaq.mx', 2147483647),
(15, 'Jose Luis', 'Lira', 'jlira12@alumnos.uaq.mx', 2147483647),
(16, 'Jose Luis', 'Lira', 'jlira12@alumnos.uaq.mx', 2147483647),
(17, 'Jose Luis', 'Lira', 'jlira12@alumnos.uaq.mx', 2147483647),
(18, 'Jose Luis', 'Lira', 'jlira12@alumnos.uaq.mx', 2147483647),
(19, 'Jose Luis', 'Lira', 'jlira12@alumnos.uaq.mx', 2147483647),
(20, 'Jose Luis', 'Lira', 'jlira12@alumnos.uaq.mx', 2147483647),
(21, 'Jose Luis', 'Lira', 'jlira12@alumnos.uaq.mx', 2147483647),
(22, 'Jose Luis', 'Lira', 'jlira12@alumnos.uaq.mx', 2147483647),
(23, 'Jose Luis', 'Lira', 'jlira12@alumnos.uaq.mx', 2147483647),
(24, 'Jose Luis', 'Lira', 'jlira12@alumnos.uaq.mx', 2147483647),
(25, 'Jose Luis', 'Lira', 'jlira12@alumnos.uaq.mx', 2147483647),
(26, 'Jose Luis', 'Lira', 'jlira12@alumnos.uaq.mx', 2147483647),
(27, 'Jose Luis', 'Lira', 'jlira12@alumnos.uaq.mx', 2147483647),
(28, 'Jose Luis', 'Lira', 'jlira12@alumnos.uaq.mx', 2147483647),
(29, 'Jose Luis', 'Lira', 'jlira12@alumnos.uaq.mx', 2147483647),
(30, 'Jose Luis', 'Lira', 'jlira12@alumnos.uaq.mx', 2147483647),
(31, 'Jose Luis', 'Lira', 'jlira12@alumnos.uaq.mx', 2147483647),
(32, 'Jose Luis', 'Lira', 'jlira12@alumnos.uaq.mx', 2147483647),
(33, 'Jose Luis', 'Lira', 'jlira12@alumnos.uaq.mx', 2147483647),
(34, 'Jose Luis', 'Lira', 'jlira12@alumnos.uaq.mx', 2147483647),
(35, 'Jose Luis', 'Lira', 'jlira12@alumnos.uaq.mx', 2147483647);

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
  `dias` int(3) NOT NULL,
  `disponibilidad` int(3) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  `vencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paquetes`
--

INSERT INTO `paquetes` (`id_paquete`, `clave`, `salida`, `destino`, `descripcion`, `paquete`, `precio`, `dias`, `disponibilidad`, `status`, `tipo`, `vencimiento`) VALUES
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
(11, '2020A', 'TIJUANA', 'CANCUN', 'HOTEL+VUELO', 'B', 11032, 3, 3, 1, 1, '2021-07-01'),
(12, 'CANCUN2020A', 'CDMX', 'GUADALAJARA', 'HOTEL', 'B', 5400, 7, 5, 1, 2, '2021-06-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes_img`
--

CREATE TABLE `paquetes_img` (
  `id_paqueteIMG` smallint(5) NOT NULL,
  `clave` varchar(70) NOT NULL,
  `ruta` varchar(250) NOT NULL,
  `tipo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paquetes_img`
--

INSERT INTO `paquetes_img` (`id_paqueteIMG`, `clave`, `ruta`, `tipo`) VALUES
(1, 'A2020CANCUN', 'paquete1.png', 'image/png'),
(2, 'A2020LUGAR2', 'paquete2.png', 'image/png'),
(3, 'A2020LUGAR3', 'paquete3.png', 'image/png'),
(4, 'A2020LUGAR4', 'paquete4.png', 'image/png'),
(5, 'A2020LUGAR4', 'paquete4.png', 'image/png'),
(6, 'A2020LUGAR4', 'paquete4.png', 'image/png'),
(7, 'A2020LUGAR5', 'paquete5.png', 'image/png'),
(8, 'A2020LUGAR6', 'paquete6.png', 'image/png'),
(9, 'A2020LUGAR7', 'paquete7.png', 'image/png'),
(10, 'A2020LUGAr8', 'paquete2.png', 'image/png'),
(11, '2020A', 'paquete13.png', 'image/png'),
(12, 'CANCUN2020A', 'paquete17.png', 'image/png');

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
  `edad` int(3) NOT NULL,
  `numero` int(10) NOT NULL,
  `correo` varchar(70) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `username`, `contrasena`, `nombre`, `apellido`, `edad`, `numero`, `correo`, `status`, `tipo`) VALUES
(0, 'crisreg', 'jfieoskel', 'Cristian', 'Registro', 0, 2147483647, 'cris@mail.com', 1, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(4) NOT NULL,
  `id_paquete` smallint(5) NOT NULL,
  `clave` varchar(70) NOT NULL,
  `fecha_salida` date NOT NULL,
  `fecha_llegada` date NOT NULL,
  `fecha_compra` date NOT NULL,
  `nombre` varchar(270) NOT NULL,
  `correo` varchar(70) NOT NULL,
  `telefono` int(10) NOT NULL,
  `adultos` int(3) NOT NULL,
  `menores` int(3) NOT NULL,
  `edad_menores` varchar(70) NOT NULL,
  `precio` int(9) NOT NULL,
  `pago` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuentas_clientes`
--
ALTER TABLE `cuentas_clientes`
  ADD PRIMARY KEY (`id_cliente`);

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
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuentas_clientes`
--
ALTER TABLE `cuentas_clientes`
  MODIFY `id_cliente` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `leads`
--
ALTER TABLE `leads`
  MODIFY `id_lead` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  MODIFY `id_paquete` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `paquetes_img`
--
ALTER TABLE `paquetes_img`
  MODIFY `id_paqueteIMG` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2022 a las 06:06:09
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `dui` varchar(9) NOT NULL,
  `nit` varchar(14) NOT NULL,
  `pasaporte` int(20) NOT NULL,
  `fecha` date NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `direccion1` varchar(500) NOT NULL,
  `direccion2` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaModificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `dui`, `nit`, `pasaporte`, `fecha`, `sexo`, `estado`, `direccion1`, `direccion2`, `email`, `fechaCreacion`, `fechaModificacion`) VALUES
(1, 'Ernesto', 'Argueta', '555555555', '22222222222222', 4444441, '2022-06-13', 'Soltero', 'Soltero', 'col chintuch #1', 'Col Madre tierra', 'aa130332@gmail.com', '2022-06-13 20:21:28', '2022-06-14 00:49:45'),
(2, 'Ivan', 'Ayala', '111111111', '22222222222222', 555555, '2022-06-13', 'Hombre', 'Soltero', 'Col Ermita', 'Col Altavista', 'Ivan@hotmail.com', '2022-06-13 20:23:31', '2022-06-13 20:23:31'),
(9, 'Linda', 'Andrade', '895566331', '10119988891436', 0, '1994-11-04', 'Mujer', 'Soltero', 'Quezaltepeque ', '', 'Linda@gmail.com', '2022-06-14 03:20:57', '2022-06-14 03:20:57'),
(10, 'Gabriel', 'Perez', '789322748', '98985657741235', 2147483647, '1995-01-10', 'Hombre', 'Casado', 'Apopa', 'Santa Tecla', 'gabriel@hotmail', '2022-06-14 03:22:20', '2022-06-14 03:22:20'),
(11, 'Raul', 'Ventura', '786532154', '89786501238547', 2147483647, '1993-06-15', 'Hombre', 'Viudo', 'La libertad', '', 'Raul@yoopmail.com', '2022-06-14 03:23:50', '2022-06-14 03:23:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`) VALUES
(1, 'kevin', 'sistema');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

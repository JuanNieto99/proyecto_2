-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2020 a las 18:19:50
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `estado` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `id_categoria`, `descripcion`, `estado`) VALUES
(1, 'zapatos', 0, '', '1'),
(2, 'sillas', 0, '', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuraciones`
--

CREATE TABLE `configuraciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `valor` varchar(45) NOT NULL,
  `defecto` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `configuraciones`
--

INSERT INTO `configuraciones` (`id`, `nombre`, `valor`, `defecto`, `tipo`) VALUES
(0, 'vista_productos', '1', '1', 'confuraciones_admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `estado` enum('1','0') NOT NULL DEFAULT '1' COMMENT '1->visible,0->no visible'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `nombre`, `id_producto`, `estado`) VALUES
(3, 'd72e3bcd17c58f70b993c429e0e9e19b', 26, '1'),
(4, 'aff9699f6c7509a85b829af137997d2d', 26, '1'),
(5, 'e1aad51ab5e33df74ee251b292cdcdde', 29, '1'),
(6, '7fdc1a630c238af0815181f9faa190f5', 26, '1'),
(7, 'e05137cc25da699d689987a007abc1fb', 30, '1'),
(8, '98679fdb5f4ae8b7136a7d0b76bc5394', 30, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `stock` enum('1','0') NOT NULL COMMENT '1->con stock , 0->sin stock',
  `precio` decimal(10,2) NOT NULL,
  `palabra_clave` varchar(45) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `estado` enum('1','0') NOT NULL DEFAULT '1' COMMENT '1->no eliminado,0->eliminado',
  `visible` enum('1','0') NOT NULL DEFAULT '1' COMMENT '1->visible,0->no visible',
  `foto` varchar(100) NOT NULL,
  `link_mercado_libre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `cantidad`, `stock`, `precio`, `palabra_clave`, `id_categoria`, `descripcion`, `estado`, `visible`, `foto`, `link_mercado_libre`) VALUES
(1, 'producto 1', 1, '0', '500.00', 'palabra clave', 1, '', '1', '1', '', ''),
(15, 'producto2', 2, '1', '500.00', 'xd', 2, '	xs', '1', '1', '', ''),
(16, 'producto2', 2, '1', '500.00', 'xd', 2, '	xs', '1', '1', '', ''),
(17, 'asd', 32, '1', '123.00', '12', 2, '123', '1', '1', '', ''),
(18, 'asd', 12, '1', '123.00', '123', 2, '123', '1', '1', '', ''),
(19, 'asd', 123, '1', '123.00', '123', 2, '123', '1', '1', '', ''),
(20, 'qwe', 123, '1', '123.00', '123', 1, '123', '1', '1', '', ''),
(21, 'asd', 123, '1', '123.00', '123', 2, '123', '1', '1', '', ''),
(22, '45', 5, '1', '5.00', '4', 2, '5', '1', '1', '', ''),
(23, 'asd', 123, '1', '13.00', '123', 1, '13', '1', '1', '', ''),
(24, '132', 13, '1', '123.00', '123', 1, '123', '1', '1', '', ''),
(25, '123', 132, '1', '123.00', '132', 1, '123', '0', '1', '', ''),
(26, 'asd1', 1231, '0', '15.00', '1231', 2, '1321', '1', '1', '', '1'),
(27, '123', 13, '1', '123.00', '132', 1, '13', '1', '1', '', ''),
(28, 'asd', 123, '1', '123.00', '123', 1, '', '1', '1', '', ''),
(29, '22', 22, '1', '2.00', '2', 2, '22', '1', '1', '', ''),
(30, 'p1', 19, '1', '200.00', '123', 2, '12', '1', '0', '', 'link xd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `usuario`, `clave`, `direccion`) VALUES
(1, 'Juan ', 'Nieto', 'JG', 'MTIzNDU2', 'xd');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_lista_productos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_lista_productos` (
`id` int(11)
,`nombre` varchar(45)
,`cantidad` int(11)
,`stock` enum('1','0')
,`precio` decimal(10,2)
,`palabra_clave` varchar(45)
,`categoria` varchar(45)
,`id_categoria` int(11)
,`descripcion` varchar(100)
,`estado` enum('1','0')
,`visible` enum('1','0')
,`foto` bigint(11)
,`link_mercado_libre` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_lista_productos`
--
DROP TABLE IF EXISTS `vista_lista_productos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_lista_productos`  AS  select `p`.`id` AS `id`,`p`.`nombre` AS `nombre`,`p`.`cantidad` AS `cantidad`,`p`.`stock` AS `stock`,`p`.`precio` AS `precio`,`p`.`palabra_clave` AS `palabra_clave`,(select `categorias`.`nombre` from `categorias` where (`categorias`.`id` = `p`.`id_categoria`)) AS `categoria`,`p`.`id_categoria` AS `id_categoria`,`p`.`descripcion` AS `descripcion`,`p`.`estado` AS `estado`,`p`.`visible` AS `visible`,(select `imagenes`.`id_producto` from `imagenes` where (`imagenes`.`id_producto` = `p`.`id`) group by `imagenes`.`id_producto`) AS `foto`,`p`.`link_mercado_libre` AS `link_mercado_libre` from `productos` `p` group by `p`.`id` desc ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuraciones`
--
ALTER TABLE `configuraciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
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
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

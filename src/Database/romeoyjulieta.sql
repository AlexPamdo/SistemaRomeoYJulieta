-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2024 a las 20:02:46
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
-- Base de datos: `romeoyjulieta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `id_material` int(11) NOT NULL,
  `nombre_material` varchar(30) DEFAULT NULL,
  `tipo_material` int(11) DEFAULT NULL,
  `color_material` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `unidad_medida` varchar(11) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id_material`, `nombre_material`, `tipo_material`, `color_material`, `stock`, `unidad_medida`, `estado`) VALUES
(62, 'materia prima 5', 1, 17, 8, '', 1),
(63, 'materia prima 5', 1, 17, -3, '', 1),
(64, 'materia prima 5', 1, 17, -2, '', 1),
(65, 'materia prima 5', 1, 17, -1, '', 1),
(66, 'materia prima 5', 1, 17, 10, '', 1),
(67, 'materia prima 5', 1, 17, 11, '', 1),
(68, 'materia prima 5', 1, 17, 1, '', 1),
(69, 'Pire Paletas', 1, 3, 529, '', 0),
(70, 'materia prima 1', 1, 3, 23, 'Unidades', 1),
(71, 'Tela algodon', 1, 4, 1005, 'Metros', 1),
(72, 'materia prima 5', 1, 1, 1, 'Unidades', 0),
(73, 'Holaasd', 1, 2, 4, 'Metros', 1),
(74, 'materia prima 5', 1, 2, 1, 'Unidades', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_prenda`
--

CREATE TABLE `categorias_prenda` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias_prenda`
--

INSERT INTO `categorias_prenda` (`id_categoria`, `nombre`) VALUES
(1, 'Camisetas'),
(2, 'Pantalones'),
(3, 'Faldas'),
(4, 'Chaquetas'),
(5, 'Abrigos'),
(6, 'Vestidos'),
(7, 'Shorts'),
(8, 'Ropa interior'),
(9, 'Bañadores'),
(10, 'Accesorios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colecciones_prenda`
--

CREATE TABLE `colecciones_prenda` (
  `id_coleccion` int(11) NOT NULL,
  `coleccion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `colecciones_prenda`
--

INSERT INTO `colecciones_prenda` (`id_coleccion`, `coleccion`) VALUES
(1, 'lima limón'),
(2, 'Verano 2024'),
(3, 'Otoño 2024'),
(4, 'Invierno 2024'),
(5, 'Colección Nupcial'),
(6, 'Ropa Casual'),
(7, 'Deportes y Aventura'),
(8, 'Moda Sostenible'),
(9, 'Ropa de Trabajo'),
(10, 'Estilo Urbano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `id_color` int(11) NOT NULL,
  `color` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`id_color`, `color`) VALUES
(1, 'Rojo'),
(2, 'Azul'),
(3, 'Verde'),
(4, 'Negro'),
(5, 'Blanco'),
(6, 'Marrón'),
(7, 'Amarillo'),
(8, 'Naranja'),
(9, 'Rosa'),
(10, 'Gris'),
(11, 'Violeta'),
(12, 'Beige'),
(13, 'Turquesa'),
(14, 'Oro'),
(15, 'Plata'),
(16, 'Fucsia'),
(17, 'Celeste'),
(18, 'Lila'),
(19, 'Oliva'),
(20, 'Coral');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `confeccion`
--

CREATE TABLE `confeccion` (
  `id_confeccion` int(11) NOT NULL,
  `fecha_fabricacion` date DEFAULT NULL,
  `id_supervisor` int(11) DEFAULT NULL,
  `proceso` int(1) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `confeccion`
--

INSERT INTO `confeccion` (`id_confeccion`, `fecha_fabricacion`, `id_supervisor`, `proceso`, `estado`) VALUES
(39, '2024-11-09', 1, 0, 1),
(40, '2024-11-12', 1, 0, 1),
(41, '2024-11-12', 1, 0, 1),
(42, '2024-11-12', 1, 1, 0),
(43, '2024-11-12', 1, 1, 0),
(44, '2024-11-12', 1, 1, 0),
(45, '2024-11-12', 5, 1, 0),
(46, '2024-11-12', 5, 1, 0),
(47, '2024-11-12', 1, 1, 0),
(48, '2024-11-12', 1, 1, 0),
(49, '2024-11-13', 1, 1, 0),
(50, '2024-11-13', 1, 1, 0),
(51, '2024-11-13', 1, 0, 1),
(52, '2024-11-13', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_confeccion`
--

CREATE TABLE `orden_confeccion` (
  `id_orden_confeccion` int(11) NOT NULL,
  `id_confeccion` int(11) NOT NULL,
  `id_prenda` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_entrega`
--

CREATE TABLE `orden_entrega` (
  `id_orden_entrega` int(11) NOT NULL,
  `id_entrega` int(11) NOT NULL,
  `id_prenda` int(11) NOT NULL,
  `cantidad_prenda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `orden_entrega`
--

INSERT INTO `orden_entrega` (`id_orden_entrega`, `id_entrega`, `id_prenda`, `cantidad_prenda`) VALUES
(37, 42, 109, 3),
(39, 44, 105, 3),
(40, 44, 109, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_pedido`
--

CREATE TABLE `orden_pedido` (
  `id_orden_pedido` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_material` int(11) DEFAULT NULL,
  `cantidad_material` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `orden_pedido`
--

INSERT INTO `orden_pedido` (`id_orden_pedido`, `id_pedido`, `id_material`, `cantidad_material`) VALUES
(1, 26, 62, 3),
(2, 26, 64, 3),
(3, 27, 63, 3),
(4, 27, 66, 5),
(5, 27, 67, 6),
(6, 27, 68, 1),
(10, 31, 65, 1),
(11, 32, 63, 3),
(12, 32, 65, 1),
(13, 33, 63, 5),
(14, 33, 65, 3),
(15, 34, 62, 3),
(16, 35, 69, 500),
(20, 39, 69, 3),
(21, 40, 69, 3),
(22, 41, 69, 10),
(23, 42, 71, 1000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_prendas`
--

CREATE TABLE `pedidos_prendas` (
  `id_pedido_prenda` int(11) NOT NULL,
  `desc_pedido_prenda` varchar(30) NOT NULL,
  `fecha_pedido_prenda` date NOT NULL,
  `fecha_estimada` date NOT NULL,
  `proceso` int(1) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos_prendas`
--

INSERT INTO `pedidos_prendas` (`id_pedido_prenda`, `desc_pedido_prenda`, `fecha_pedido_prenda`, `fecha_estimada`, `proceso`, `estado`) VALUES
(42, 'llogomonssss', '2024-11-17', '2323-02-23', 0, 0),
(44, 'llogomonssss', '2024-11-17', '0323-02-23', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_proveedores`
--

CREATE TABLE `pedidos_proveedores` (
  `id_pedido` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `estado_pedido` int(1) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos_proveedores`
--

INSERT INTO `pedidos_proveedores` (`id_pedido`, `id_proveedor`, `fecha_pedido`, `estado_pedido`, `id_usuario`, `estado`) VALUES
(22, 26, '2024-11-06', 0, 1, 0),
(23, 26, '2024-11-06', 0, 1, 0),
(24, 26, '2024-11-06', 0, 1, 0),
(25, 26, '2024-11-06', 0, 1, 0),
(26, 27, '2024-11-06', 0, 1, 1),
(27, 26, '2024-11-06', 0, 1, 0),
(31, 27, '2024-11-06', 0, 1, 1),
(32, 27, '2024-11-06', 1, 1, 1),
(33, 26, '2024-11-06', 0, 1, 1),
(34, 26, '2024-11-07', 1, 1, 0),
(35, 26, '2024-11-08', 1, 1, 0),
(39, 26, '2024-11-13', 1, 1, 0),
(40, 26, '2024-11-13', 1, 1, 0),
(41, 26, '2024-11-13', 1, 1, 0),
(42, 36, '2024-11-17', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prendas`
--

CREATE TABLE `prendas` (
  `id_prenda` int(11) NOT NULL,
  `img_prenda` varchar(250) NOT NULL,
  `nombre_prenda` varchar(30) DEFAULT NULL,
  `genero` varchar(7) NOT NULL,
  `id_categoria` int(30) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `id_coleccion` int(30) NOT NULL,
  `id_talla` int(30) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prendas`
--

INSERT INTO `prendas` (`id_prenda`, `img_prenda`, `nombre_prenda`, `genero`, `id_categoria`, `stock`, `id_coleccion`, `id_talla`, `estado`) VALUES
(105, 'src/Assets/img/prendas/prendaDefault.png', 'Camisa Negra', 'Niño', 1, -6, 1, 2, 0),
(106, 'src/Assets/img/prendas/prendaDefault.png', 'Prueba 2', 'Niño', 4, 4, 3, 2, 1),
(109, 'src/Assets/img/prendas/prendaDefault.png', 'Camisa de pire paletas', 'Niño', 2, 22, 1, 1, 0),
(110, 'src/Assets/img/prendas/prendaDefault.png', 'Camisa Negra', 'Niño', 2, 4, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prenda_patron`
--

CREATE TABLE `prenda_patron` (
  `id_prenda_patron` int(30) NOT NULL,
  `id_prenda` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prenda_patron`
--

INSERT INTO `prenda_patron` (`id_prenda_patron`, `id_prenda`, `id_material`, `cantidad`) VALUES
(29, 109, 69, 15),
(30, 110, 69, 3),
(31, 110, 71, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `rif_proveedor` varchar(10) NOT NULL,
  `nombre_proveedor` varchar(30) NOT NULL,
  `telefono_proveedor` varchar(30) NOT NULL,
  `gmail_proveedor` varchar(30) NOT NULL,
  `notas_proveedor` varchar(255) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `rif_proveedor`, `nombre_proveedor`, `telefono_proveedor`, `gmail_proveedor`, `notas_proveedor`, `estado`) VALUES
(26, 'E-33435464', 'Telas Alex calidad de telas', '0450807444444', 'TelasAlex@gmail.com', '123456789d', 1),
(27, 'V305223212', 'sis', '15465465465456454654', 'asdsad@gmail.comn', 'dfs', 1),
(28, 'V-30522323', 'Telas Alex', '15465465465456454654', 'alexm@gmail.com', '123dasdsad', 1),
(29, 'v-32323232', 'alex', '323232323232', 'dsadsadsad@gmail.com', 'fddsadsadsad', 1),
(31, 'V-30532323', 'Telas Alex', '15465465465456454654', 'asdsdad@gmail.comn', 'sdadsadsadsa', 1),
(32, 'V-30522321', 'Telas Alexaaaaaaaaaaaaa', '0450807444444', 'edasdadsadsa@gmail.com', 'dsadsadsadsadsad', 1),
(34, 'v-33323232', 'alex', '323232323232', 'dsadsadsad@gmail.com', 'asdsadsadsad', 1),
(35, 'v-32333333', 'Ajax sirve', '3232323232323', 'dsadsadsad@gmail.com', 'sdsadsadsadsa', 1),
(36, 'v3d3233333', 'Ajax sirve', '3232323232323', 'dsadsadsad@gmail.com', 'dsadsadasdsadsadsadsad', 1),
(38, 'V-30523333', 'Telas Alex', '0450807444444', 'asdsadd@gmail.comn', 'sasdsadsadsad', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supervisores`
--

CREATE TABLE `supervisores` (
  `id_supervisor` int(11) NOT NULL,
  `cedula_supervisor` varchar(20) NOT NULL,
  `nombre_supervisor` varchar(30) DEFAULT NULL,
  `apellido_supervisor` varchar(30) DEFAULT NULL,
  `telefono_supervisor` varchar(11) DEFAULT NULL,
  `email_supervisor` varchar(30) DEFAULT NULL,
  `trabajando` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `supervisores`
--

INSERT INTO `supervisores` (`id_supervisor`, `cedula_supervisor`, `nombre_supervisor`, `apellido_supervisor`, `telefono_supervisor`, `email_supervisor`, `trabajando`, `estado`) VALUES
(1, 'v-30873556', 'Alexito', 'Pérez', '04125640755', 'Alex123@gmail.com', 0, 0),
(5, 'v-13344799', 'Luis', 'Ramírez', '3344556677', 'luis.ramirez@example.com', 0, 1),
(19, '308722742', 'Alex', 'asd', '04145080744', 'asdsad@asdas.com', 0, 1),
(20, '308745311', 'Raul', 'Perez', '0417356457', 'raul@gmail.com', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas`
--

CREATE TABLE `tallas` (
  `id_talla` int(11) NOT NULL,
  `edad` varchar(30) DEFAULT NULL,
  `cm` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tallas`
--

INSERT INTO `tallas` (`id_talla`, `edad`, `cm`) VALUES
(1, '0-3 meses', '50'),
(2, '3-6 meses', '60'),
(3, '6-12 meses', '70'),
(4, '1-2 años', '80'),
(5, '2-3 años', '90'),
(6, '3-4 años', '100'),
(7, '4-5 años', '110'),
(8, '5-6 años', '120'),
(9, '6-7 años', '130'),
(10, '7-8 años', '140');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_materiales`
--

CREATE TABLE `tipos_materiales` (
  `id_tipo_material` int(11) NOT NULL,
  `tipo_material` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_materiales`
--

INSERT INTO `tipos_materiales` (`id_tipo_material`, `tipo_material`) VALUES
(1, 'Tela'),
(2, 'Boton'),
(3, 'Hilo'),
(4, 'Cremallera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(30) DEFAULT NULL,
  `apellido_usuario` varchar(30) DEFAULT NULL,
  `gmail_usuario` varchar(30) DEFAULT NULL,
  `contrasena_usuario` varchar(30) DEFAULT NULL,
  `rol` int(11) NOT NULL,
  `img_usuario` varchar(300) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `apellido_usuario`, `gmail_usuario`, `contrasena_usuario`, `rol`, `img_usuario`, `estado`) VALUES
(1, 'Alexis', 'Perezaa', 'alexmegasuper5@gmail.com', '123456789', 1, '', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id_material`),
  ADD KEY `id_color` (`color_material`),
  ADD KEY `id_tipo_material` (`tipo_material`);

--
-- Indices de la tabla `categorias_prenda`
--
ALTER TABLE `categorias_prenda`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `colecciones_prenda`
--
ALTER TABLE `colecciones_prenda`
  ADD PRIMARY KEY (`id_coleccion`);

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`id_color`);

--
-- Indices de la tabla `confeccion`
--
ALTER TABLE `confeccion`
  ADD PRIMARY KEY (`id_confeccion`),
  ADD KEY `unq_confeccion_id_empleado` (`id_supervisor`);

--
-- Indices de la tabla `orden_confeccion`
--
ALTER TABLE `orden_confeccion`
  ADD PRIMARY KEY (`id_orden_confeccion`),
  ADD KEY `id_confeccion` (`id_confeccion`,`id_prenda`),
  ADD KEY `id_prenda` (`id_prenda`);

--
-- Indices de la tabla `orden_entrega`
--
ALTER TABLE `orden_entrega`
  ADD PRIMARY KEY (`id_orden_entrega`),
  ADD KEY `id_entrega` (`id_entrega`),
  ADD KEY `id_prenda` (`id_prenda`);

--
-- Indices de la tabla `orden_pedido`
--
ALTER TABLE `orden_pedido`
  ADD PRIMARY KEY (`id_orden_pedido`),
  ADD KEY `id_material` (`id_material`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `pedidos_prendas`
--
ALTER TABLE `pedidos_prendas`
  ADD PRIMARY KEY (`id_pedido_prenda`);

--
-- Indices de la tabla `pedidos_proveedores`
--
ALTER TABLE `pedidos_proveedores`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_proveedor` (`id_proveedor`,`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `prendas`
--
ALTER TABLE `prendas`
  ADD PRIMARY KEY (`id_prenda`),
  ADD KEY `id_categoria` (`id_categoria`,`id_coleccion`,`id_talla`),
  ADD KEY `id_categoria_2` (`id_categoria`,`id_coleccion`,`id_talla`),
  ADD KEY `id_categoria_3` (`id_categoria`,`id_coleccion`,`id_talla`),
  ADD KEY `unq_prendas_id_categoria` (`id_categoria`),
  ADD KEY `unq_prendas_id_coleccion` (`id_coleccion`),
  ADD KEY `unq_prendas_id_talla` (`id_talla`);

--
-- Indices de la tabla `prenda_patron`
--
ALTER TABLE `prenda_patron`
  ADD PRIMARY KEY (`id_prenda_patron`),
  ADD KEY `id_prenda` (`id_prenda`),
  ADD KEY `id_material` (`id_material`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD UNIQUE KEY `rif` (`rif_proveedor`);

--
-- Indices de la tabla `supervisores`
--
ALTER TABLE `supervisores`
  ADD PRIMARY KEY (`id_supervisor`),
  ADD UNIQUE KEY `cedula_empleado` (`cedula_supervisor`);

--
-- Indices de la tabla `tallas`
--
ALTER TABLE `tallas`
  ADD PRIMARY KEY (`id_talla`);

--
-- Indices de la tabla `tipos_materiales`
--
ALTER TABLE `tipos_materiales`
  ADD PRIMARY KEY (`id_tipo_material`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `categorias_prenda`
--
ALTER TABLE `categorias_prenda`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `colecciones_prenda`
--
ALTER TABLE `colecciones_prenda`
  MODIFY `id_coleccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `confeccion`
--
ALTER TABLE `confeccion`
  MODIFY `id_confeccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `orden_confeccion`
--
ALTER TABLE `orden_confeccion`
  MODIFY `id_orden_confeccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orden_entrega`
--
ALTER TABLE `orden_entrega`
  MODIFY `id_orden_entrega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `orden_pedido`
--
ALTER TABLE `orden_pedido`
  MODIFY `id_orden_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `pedidos_prendas`
--
ALTER TABLE `pedidos_prendas`
  MODIFY `id_pedido_prenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `pedidos_proveedores`
--
ALTER TABLE `pedidos_proveedores`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `prendas`
--
ALTER TABLE `prendas`
  MODIFY `id_prenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `prenda_patron`
--
ALTER TABLE `prenda_patron`
  MODIFY `id_prenda_patron` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `supervisores`
--
ALTER TABLE `supervisores`
  MODIFY `id_supervisor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tallas`
--
ALTER TABLE `tallas`
  MODIFY `id_talla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipos_materiales`
--
ALTER TABLE `tipos_materiales`
  MODIFY `id_tipo_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD CONSTRAINT `almacen_ibfk_1` FOREIGN KEY (`color_material`) REFERENCES `colores` (`id_color`) ON UPDATE CASCADE,
  ADD CONSTRAINT `almacen_ibfk_2` FOREIGN KEY (`tipo_material`) REFERENCES `tipos_materiales` (`id_tipo_material`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `confeccion`
--
ALTER TABLE `confeccion`
  ADD CONSTRAINT `confeccion_ibfk_2` FOREIGN KEY (`id_supervisor`) REFERENCES `supervisores` (`id_supervisor`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `orden_confeccion`
--
ALTER TABLE `orden_confeccion`
  ADD CONSTRAINT `id_confeccion` FOREIGN KEY (`id_confeccion`) REFERENCES `confeccion` (`id_confeccion`) ON UPDATE CASCADE,
  ADD CONSTRAINT `id_prenda` FOREIGN KEY (`id_prenda`) REFERENCES `prendas` (`id_prenda`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `orden_entrega`
--
ALTER TABLE `orden_entrega`
  ADD CONSTRAINT `orden_entrega_ibfk_1` FOREIGN KEY (`id_prenda`) REFERENCES `prendas` (`id_prenda`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orden_entrega_ibfk_2` FOREIGN KEY (`id_entrega`) REFERENCES `pedidos_prendas` (`id_pedido_prenda`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `orden_pedido`
--
ALTER TABLE `orden_pedido`
  ADD CONSTRAINT `orden_pedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos_proveedores` (`id_pedido`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orden_pedido_ibfk_2` FOREIGN KEY (`id_material`) REFERENCES `almacen` (`id_material`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos_proveedores`
--
ALTER TABLE `pedidos_proveedores`
  ADD CONSTRAINT `pedidos_proveedores_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_proveedores_ibfk_5` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `prendas`
--
ALTER TABLE `prendas`
  ADD CONSTRAINT `prendas_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias_prenda` (`id_categoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prendas_ibfk_3` FOREIGN KEY (`id_coleccion`) REFERENCES `colecciones_prenda` (`id_coleccion`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prendas_ibfk_4` FOREIGN KEY (`id_talla`) REFERENCES `tallas` (`id_talla`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `prenda_patron`
--
ALTER TABLE `prenda_patron`
  ADD CONSTRAINT `Material` FOREIGN KEY (`id_material`) REFERENCES `almacen` (`id_material`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prenda` FOREIGN KEY (`id_prenda`) REFERENCES `prendas` (`id_prenda`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

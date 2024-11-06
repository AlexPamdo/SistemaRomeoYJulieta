-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2024 a las 20:50:05
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
  `precio` float DEFAULT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id_material`, `nombre_material`, `tipo_material`, `color_material`, `stock`, `precio`, `estado`) VALUES
(62, 'materia prima 5', 1, 17, 2, 5, 0),
(63, 'materia prima 5', 1, 17, -3, 5, 0),
(64, 'materia prima 5', 1, 17, -2, 5, 0),
(65, 'materia prima 5', 1, 17, -1, 5, 0),
(66, 'materia prima 5', 1, 17, 10, 5, 0),
(67, 'materia prima 5', 1, 17, 11, 5, 0),
(68, 'materia prima 5', 1, 17, 6, 5, 0);

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
  `id_prenda` int(11) NOT NULL,
  `cantidad` int(30) NOT NULL,
  `tiempo_fabricacion` time DEFAULT NULL,
  `fecha_fabricacion` date DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `confeccion`
--

INSERT INTO `confeccion` (`id_confeccion`, `id_prenda`, `cantidad`, `tiempo_fabricacion`, `fecha_fabricacion`, `id_empleado`, `estado`) VALUES
(28, 105, 1, NULL, '2024-11-06', 1, 0),
(29, 105, 1, NULL, '2024-11-06', 1, 0),
(30, 105, 1, NULL, '2024-11-06', 5, 0),
(31, 105, 1, NULL, '2024-11-06', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `cedula_empleado` varchar(20) NOT NULL,
  `nombre_empleado` varchar(30) DEFAULT NULL,
  `apellido_empleado` varchar(30) DEFAULT NULL,
  `telefono_empleado` varchar(11) DEFAULT NULL,
  `email_empleado` varchar(30) DEFAULT NULL,
  `id_ocupacion` int(11) DEFAULT NULL,
  `sueldo` int(11) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `cedula_empleado`, `nombre_empleado`, `apellido_empleado`, `telefono_empleado`, `email_empleado`, `id_ocupacion`, `sueldo`, `estado`) VALUES
(1, 'v-30873556', 'Alexito', 'Pérez', '04125640755', 'Alex123@gmail.com', 1, 1500, 0),
(5, 'v-13344799', 'Luis', 'Ramírez', '3344556677', 'luis.ramirez@example.com', 5, 1000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregas`
--

CREATE TABLE `entregas` (
  `id_entrega` int(11) NOT NULL,
  `fecha_entrega` date NOT NULL,
  `total_entrega` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entregas`
--

INSERT INTO `entregas` (`id_entrega`, `fecha_entrega`, `total_entrega`, `estado`) VALUES
(5, '2024-11-06', 23, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ocupaciones`
--

CREATE TABLE `ocupaciones` (
  `id_ocupacion` int(11) NOT NULL,
  `ocupacion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ocupaciones`
--

INSERT INTO `ocupaciones` (`id_ocupacion`, `ocupacion`) VALUES
(1, 'costurero'),
(2, 'Sastre'),
(3, 'Asistente de tienda'),
(4, 'Gerente de ventas'),
(5, 'Contable'),
(6, 'Operador de máquina de coser'),
(7, 'Encargado de inventario'),
(8, 'Representante de atención al c'),
(9, 'Jefe de producción'),
(10, 'Especialista en marketing'),
(11, 'Diseñador gráfico'),
(12, 'Cortador de tela'),
(13, 'Técnico de calidad'),
(14, 'Consultor de moda'),
(15, 'Promotor de ventas'),
(16, 'Analista de tendencias'),
(17, 'Asistente administrativo'),
(18, 'Estilista'),
(19, 'Fotógrafo de productos'),
(20, 'Coordinador de eventos');

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
(2, 5, 105, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_pedido`
--

CREATE TABLE `orden_pedido` (
  `id_orden_pedido` int(11) NOT NULL,
  `id_pedido` int(30) NOT NULL,
  `id_material` int(11) DEFAULT NULL,
  `cantidad_material` int(30) NOT NULL
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
(14, 33, 65, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `estado_pedido` tinyint(1) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `total_pedido` int(30) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `id_proveedor`, `fecha_pedido`, `estado_pedido`, `id_usuario`, `total_pedido`, `estado`) VALUES
(22, 26, '2024-11-06', 0, 1, 69, 0),
(23, 26, '2024-11-06', 0, 1, 50, 0),
(24, 26, '2024-11-06', 0, 1, 40, 0),
(25, 26, '2024-11-06', 0, 1, 25, 0),
(26, 27, '2024-11-06', 0, 1, 30, 1),
(27, 26, '2024-11-06', 0, 1, 75, 0),
(31, 27, '2024-11-06', 0, 1, 5, 1),
(32, 27, '2024-11-06', 1, 1, 20, 1),
(33, 26, '2024-11-06', 0, 1, 40, 1);

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
  `id_color` int(30) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `id_coleccion` int(30) NOT NULL,
  `id_talla` int(30) NOT NULL,
  `precio_unitario` int(11) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prendas`
--

INSERT INTO `prendas` (`id_prenda`, `img_prenda`, `nombre_prenda`, `genero`, `id_categoria`, `id_color`, `stock`, `id_coleccion`, `id_talla`, `precio_unitario`, `estado`) VALUES
(105, 'src/Assets/img/prendas/prendaDefault.png', 'Camisa Negra', 'Niño', 1, 1, -3, 1, 2, 23, 0),
(106, 'src/Assets/img/prendas/prendaDefault.png', 'Prueba 2', 'Niño', 4, 1, 3, 3, 2, 10, 0);

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
(27, 106, 62, 3),
(28, 106, 68, 5);

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
(26, 'V321321321', 'Telas Alex', '0450807444444', 'aeld@gmail.com', 'Exelente provedorr askjdksajdksajdskjdsakjd', 0),
(27, 'V305223212', 'sis', '15465465465456454654', 'asdsad@gmail.comn', 'dfs', 1);

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
(1, 'Alexis', 'Perezaa', 'alexmegasuper5@gmail.com', '$2y$10$TLVKqG7GL1Wvy3DxqWcrjux', 1, '', 0),
(139, 'Alejandro', 'Pere', 'Alejandro.ajp@gmail.com', 'Julio0205@', 1, 'src/Assets/img/users/User_default_icon.png', 0),
(143, '', '', '', '', 1, 'src/Assets/img/users/User_default_icon.png', 1),
(144, 'Elena', 'Cachón', 'Eli123@gmail.com', 'Elena12345', 1, 'src/Assets/img/users/User_default_icon.png', 0),
(145, 'Ane', 'Pere', 'Ane123@gmail.com', 'AnaMaria123', 2, 'src/Assets/img/users/User_default_icon.png', 0),
(146, 'toño', 'Pere', 'Tono1234@hotmail.com', '123Aeiou', 1, 'src/Assets/img/users/User_default_icon.png', 1);

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
  ADD KEY `unq_confeccion_id_empleado` (`id_empleado`),
  ADD KEY `id_prenda` (`id_prenda`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD UNIQUE KEY `cedula_empleado` (`cedula_empleado`),
  ADD KEY `id_ocupacion` (`id_ocupacion`);

--
-- Indices de la tabla `entregas`
--
ALTER TABLE `entregas`
  ADD PRIMARY KEY (`id_entrega`);

--
-- Indices de la tabla `ocupaciones`
--
ALTER TABLE `ocupaciones`
  ADD PRIMARY KEY (`id_ocupacion`);

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
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_proveedor` (`id_proveedor`,`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `prendas`
--
ALTER TABLE `prendas`
  ADD PRIMARY KEY (`id_prenda`),
  ADD KEY `id_categoria` (`id_categoria`,`id_color`,`id_coleccion`,`id_talla`),
  ADD KEY `id_categoria_2` (`id_categoria`,`id_color`,`id_coleccion`,`id_talla`),
  ADD KEY `id_categoria_3` (`id_categoria`,`id_color`,`id_coleccion`,`id_talla`),
  ADD KEY `unq_prendas_id_categoria` (`id_categoria`),
  ADD KEY `unq_prendas_id_color` (`id_color`),
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
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

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
  MODIFY `id_confeccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `entregas`
--
ALTER TABLE `entregas`
  MODIFY `id_entrega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ocupaciones`
--
ALTER TABLE `ocupaciones`
  MODIFY `id_ocupacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `orden_entrega`
--
ALTER TABLE `orden_entrega`
  MODIFY `id_orden_entrega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `orden_pedido`
--
ALTER TABLE `orden_pedido`
  MODIFY `id_orden_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `prendas`
--
ALTER TABLE `prendas`
  MODIFY `id_prenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de la tabla `prenda_patron`
--
ALTER TABLE `prenda_patron`
  MODIFY `id_prenda_patron` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

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
  ADD CONSTRAINT `confeccion_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prenda_id` FOREIGN KEY (`id_prenda`) REFERENCES `prendas` (`id_prenda`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`id_ocupacion`) REFERENCES `ocupaciones` (`id_ocupacion`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `orden_entrega`
--
ALTER TABLE `orden_entrega`
  ADD CONSTRAINT `orden_entrega_ibfk_1` FOREIGN KEY (`id_prenda`) REFERENCES `prendas` (`id_prenda`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orden_entrega_ibfk_2` FOREIGN KEY (`id_entrega`) REFERENCES `entregas` (`id_entrega`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `orden_pedido`
--
ALTER TABLE `orden_pedido`
  ADD CONSTRAINT `orden_pedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id_pedido`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orden_pedido_ibfk_2` FOREIGN KEY (`id_material`) REFERENCES `almacen` (`id_material`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_5` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `prendas`
--
ALTER TABLE `prendas`
  ADD CONSTRAINT `prendas_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias_prenda` (`id_categoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prendas_ibfk_2` FOREIGN KEY (`id_color`) REFERENCES `colores` (`id_color`) ON UPDATE CASCADE,
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

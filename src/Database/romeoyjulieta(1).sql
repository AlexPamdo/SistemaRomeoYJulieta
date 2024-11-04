-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2024 a las 14:51:30
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
  `precio` int(11) DEFAULT NULL,
  `eliminado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id_material`, `nombre_material`, `tipo_material`, `color_material`, `stock`, `precio`, `eliminado`) VALUES
(1, 'Botón de plástico', 1, 1, 146, 4, 0),
(2, 'Tela de algodón', 1, 2, 205, 5, 0),
(3, 'Hilo de poliéster', 3, 4, 393, 3, 0),
(4, 'Botón de madera', 2, 6, 80, 0, 0),
(5, 'Tela de seda', 1, 3, 50, 15, 0),
(6, 'Hilo de algodón', 3, 5, 180, 2, 0),
(7, 'Cremallera metálica', 4, 14, 75, 3, 0),
(8, 'Tela vaquera', 1, 2, 60, 10, 0),
(9, 'Botón de cristal', 2, 19, 30, 1, 0),
(10, 'Hilo elástico', 3, 4, 100, 4, 0),
(11, 'Botón decorativo', 2, 14, 40, 1, 0),
(12, 'Tela de lana', 1, 10, 142, 12, 0),
(13, 'Hilo de nylon', 3, 2, 120, 4, 0),
(14, 'Cremallera plástica', 4, 4, 50, 3, 0),
(15, 'Tela de lino', 1, 12, 70, 8, 0),
(16, 'Botón de resina', 1, 1, 60, 0, 0),
(17, 'Hilo metálico', 3, 14, 40, 5, 0),
(18, 'Tela de terciopelo', 1, 1, 30, 20, 0),
(19, 'Cremallera invisible', 4, 5, 20, 4, 1),
(20, 'Hilos de bordados', 1, 1, 150, 6, 1),
(21, 'Telas Maria', 1, 1, 100, 2, 1);

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
  `id_patron` int(11) DEFAULT NULL,
  `cantidad` int(30) NOT NULL,
  `tiempo_fabricacion` time DEFAULT NULL,
  `fecha_fabricacion` date DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `eliminado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `confeccion`
--

INSERT INTO `confeccion` (`id_confeccion`, `id_patron`, `cantidad`, `tiempo_fabricacion`, `fecha_fabricacion`, `id_empleado`, `eliminado`) VALUES
(26, 85, 2, NULL, '2024-10-30', 5, 0),
(27, 83, 1, NULL, '2024-10-30', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `nombre_empleado` varchar(30) DEFAULT NULL,
  `apellido_empleado` varchar(30) DEFAULT NULL,
  `telefono_empleado` varchar(11) DEFAULT NULL,
  `email_empleado` varchar(30) DEFAULT NULL,
  `id_ocupacion` int(11) DEFAULT NULL,
  `sueldo` int(11) DEFAULT NULL,
  `cedula_empleado` varchar(20) DEFAULT NULL,
  `eliminado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombre_empleado`, `apellido_empleado`, `telefono_empleado`, `email_empleado`, `id_ocupacion`, `sueldo`, `cedula_empleado`, `eliminado`) VALUES
(1, 'Alex', 'Pérez', '04125640755', 'Alex123@gmail.com', 1, 1500, '30873556', 0),
(2, 'María', 'González', '0987654321', 'maria.gonzalez@example.com', 2, 1200, 'V-87654321', 0),
(3, 'Carlos', 'López', '1122334455', 'carlos.lopez@example.com', 3, 800, 'V-11223344', 0),
(4, 'Ana', 'Martínez', '2233445566', 'ana.martinez@example.com', 4, 2000, 'V-22334455', 0),
(5, 'Luis', 'Ramírez', '3344556677', 'luis.ramirez@example.com', 5, 1000, 'V-33445566', 0),
(6, 'Lau', 'Torres', '14455667788', 'laura.torres@example.com', 1, 900, '44556677', 0),
(7, 'Diego', 'Hernández', '5566778899', 'diego.hernandez@example.com', 7, 950, 'V-55667788', 1),
(9, 'Pedro', 'Cruz', '7788990011', 'pedro.cruz@example.com', 9, 1800, 'V-77889900', 1),
(10, 'Claudia', 'Ríos', '8899001122', 'claudia.rios@example.com', 10, 1400, 'V-88990011', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregas`
--

CREATE TABLE `entregas` (
  `id_entrega` int(11) NOT NULL,
  `fecha_entrega` date NOT NULL,
  `total_entrega` int(11) NOT NULL,
  `usuario_entrega` int(11) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos_prenda`
--

CREATE TABLE `generos_prenda` (
  `id_genero` int(11) NOT NULL,
  `genero` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `generos_prenda`
--

INSERT INTO `generos_prenda` (`id_genero`, `genero`) VALUES
(1, 'niño'),
(2, 'niña'),
(3, 'unisex');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patrones`
--

CREATE TABLE `patrones` (
  `id_patron` int(11) NOT NULL,
  `nombre_patron` varchar(30) NOT NULL,
  `costo_unitario` int(11) DEFAULT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `patrones`
--

INSERT INTO `patrones` (`id_patron`, `nombre_patron`, `costo_unitario`, `eliminado`) VALUES
(43, 'Si', 15, 0),
(80, '13', 100, 0),
(81, 'Prueba 1', 175, 1),
(83, 'Camisa Negra', 34, 0),
(84, 'Camisa Negra de Lino', 95, 0),
(85, 'Alejandro', NULL, 0),
(86, '', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patron_material`
--

CREATE TABLE `patron_material` (
  `id_patronMaterial` int(30) NOT NULL,
  `id_patron` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `patron_material`
--

INSERT INTO `patron_material` (`id_patronMaterial`, `id_patron`, `id_material`, `cantidad`) VALUES
(3, 34, 7, 10),
(4, 35, 9, 30),
(5, 35, 8, 10),
(3, 34, 7, 10),
(4, 35, 9, 30),
(5, 35, 8, 10),
(0, 78, 7, 23),
(0, 44, 7, 12),
(0, 44, 8, 4),
(0, 80, 7, 1),
(0, 80, 8, 2),
(0, 80, 9, 3),
(0, 81, 2, 5),
(0, 81, 3, 3),
(0, 81, 2, 5),
(0, 81, 3, 3),
(0, 83, 15, 10),
(0, 83, 3, 5),
(3, 34, 7, 10),
(4, 35, 9, 30),
(5, 35, 8, 10),
(3, 34, 7, 10),
(4, 35, 9, 30),
(5, 35, 8, 10),
(0, 78, 7, 23),
(0, 44, 7, 12),
(0, 44, 8, 4),
(0, 80, 7, 1),
(0, 80, 8, 2),
(0, 80, 9, 3),
(0, 81, 2, 5),
(0, 81, 3, 3),
(0, 81, 2, 5),
(0, 81, 3, 3),
(0, 83, 15, 10),
(0, 83, 3, 5),
(0, 85, 1, 2);

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
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prendas`
--

CREATE TABLE `prendas` (
  `id_prenda` int(11) NOT NULL,
  `img_prenda` varchar(250) NOT NULL,
  `nombre_prenda` varchar(30) DEFAULT NULL,
  `patron_prenda` int(30) NOT NULL,
  `id_categoria` int(30) NOT NULL,
  `id_color` int(30) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `id_coleccion` int(30) NOT NULL,
  `id_talla` int(30) NOT NULL,
  `id_genero` int(30) NOT NULL,
  `precio_unitario` int(11) DEFAULT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prendas`
--

INSERT INTO `prendas` (`id_prenda`, `img_prenda`, `nombre_prenda`, `patron_prenda`, `id_categoria`, `id_color`, `stock`, `id_coleccion`, `id_talla`, `id_genero`, `precio_unitario`, `eliminado`) VALUES
(81, 'Assets/img/prendas/prendaDefault.png', 'Camisa Negra', 81, 1, 4, 0, 10, 7, 1, 34, 0),
(83, 'src/Assets/img/prendas/prendaDefault.png', 'Camisa Negra de Lino', 83, 1, 4, 1, 1, 9, 1, 95, 0),
(85, 'src/Assets/img/prendas/prendaDefault.png', 'Alejandro', 85, 1, 12, 4, 3, 10, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `rif` varchar(10) NOT NULL,
  `nombre_proveedor` varchar(30) NOT NULL,
  `telefono_proveedor` varchar(30) NOT NULL,
  `gmail_proveedor` varchar(30) NOT NULL,
  `notas_proveedor` varchar(255) NOT NULL,
  `eliminado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `cedula_usuario` int(11) DEFAULT NULL,
  `gmail_usuario` varchar(30) DEFAULT NULL,
  `contrasena_usuario` varchar(30) DEFAULT NULL,
  `rol` int(11) NOT NULL,
  `pregunta` char(30) NOT NULL,
  `respuesta` char(30) NOT NULL,
  `img_usuario` varchar(300) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `apellido_usuario`, `cedula_usuario`, `gmail_usuario`, `contrasena_usuario`, `rol`, `pregunta`, `respuesta`, `img_usuario`, `eliminado`) VALUES
(1, 'Alexis', 'Pereza', 30872742, 'alexmegasuper5@gmail.com', '123456789Dd+', 1, 'Comida Favorita', 'Helado', '', 0),
(139, 'Alejandro', 'Pere', NULL, 'Alejandro.ajp@gmail.com', 'Julio0205@', 1, '¿Cúal es su deporte favorito?', 'Lucha Libre', 'src/Assets/img/users/User_default_icon.png', 0),
(143, '', '', NULL, '', '', 1, '¿Cúal es su hobby?', 'Kurt Cobain', 'src/Assets/img/users/User_default_icon.png', 1),
(144, 'Elena', 'Cachón', NULL, 'Eli123@gmail.com', 'Elena12345', 1, '¿Cúal es su deporte favorito?', 'BaseBall', 'src/Assets/img/users/User_default_icon.png', 0),
(145, 'Ane', 'Pere', NULL, 'Ane123@gmail.com', 'AnaMaria123', 2, '¿Cúal es el nombre de su masco', 'Rocky', 'src/Assets/img/users/User_default_icon.png', 0),
(146, 'toño', 'Pere', NULL, 'Tono1234@hotmail.com', '123Aeiou', 1, '¿Cúal es su hobby?', 'ver Base Ball', 'src/Assets/img/users/User_default_icon.png', 0);

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
  ADD KEY `id_receta` (`id_patron`),
  ADD KEY `unq_confeccion_id_empleado` (`id_empleado`);

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
  ADD PRIMARY KEY (`id_entrega`),
  ADD KEY `usuario_entrega` (`usuario_entrega`);

--
-- Indices de la tabla `generos_prenda`
--
ALTER TABLE `generos_prenda`
  ADD PRIMARY KEY (`id_genero`);

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
-- Indices de la tabla `patrones`
--
ALTER TABLE `patrones`
  ADD PRIMARY KEY (`id_patron`);

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
  ADD KEY `id_categoria` (`id_categoria`,`id_color`,`id_coleccion`,`id_talla`,`id_genero`),
  ADD KEY `id_categoria_2` (`id_categoria`,`id_color`,`id_coleccion`,`id_talla`,`id_genero`),
  ADD KEY `id_categoria_3` (`id_categoria`,`id_color`,`id_coleccion`,`id_talla`,`id_genero`),
  ADD KEY `unq_prendas_id_categoria` (`id_categoria`),
  ADD KEY `unq_prendas_id_color` (`id_color`),
  ADD KEY `unq_prendas_id_coleccion` (`id_coleccion`),
  ADD KEY `unq_prendas_id_talla` (`id_talla`),
  ADD KEY `unq_prendas_id_genero` (`id_genero`),
  ADD KEY `patron_prenda` (`patron_prenda`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD UNIQUE KEY `rif` (`rif`);

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
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `cedula_usuario` (`cedula_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
  MODIFY `id_confeccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `entregas`
--
ALTER TABLE `entregas`
  MODIFY `id_entrega` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `generos_prenda`
--
ALTER TABLE `generos_prenda`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ocupaciones`
--
ALTER TABLE `ocupaciones`
  MODIFY `id_ocupacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `orden_entrega`
--
ALTER TABLE `orden_entrega`
  MODIFY `id_orden_entrega` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orden_pedido`
--
ALTER TABLE `orden_pedido`
  MODIFY `id_orden_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `patrones`
--
ALTER TABLE `patrones`
  MODIFY `id_patron` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `prendas`
--
ALTER TABLE `prendas`
  MODIFY `id_prenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  ADD CONSTRAINT `confeccion_ibfk_3` FOREIGN KEY (`id_patron`) REFERENCES `patrones` (`id_patron`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`id_ocupacion`) REFERENCES `ocupaciones` (`id_ocupacion`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `entregas`
--
ALTER TABLE `entregas`
  ADD CONSTRAINT `entregas_ibfk_1` FOREIGN KEY (`usuario_entrega`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `orden_pedido_ibfk_1` FOREIGN KEY (`id_material`) REFERENCES `almacen` (`id_material`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orden_pedido_ibfk_2` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id_pedido`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `prendas_ibfk_4` FOREIGN KEY (`id_talla`) REFERENCES `tallas` (`id_talla`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prendas_ibfk_5` FOREIGN KEY (`id_genero`) REFERENCES `generos_prenda` (`id_genero`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prendas_ibfk_6` FOREIGN KEY (`patron_prenda`) REFERENCES `patrones` (`id_patron`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

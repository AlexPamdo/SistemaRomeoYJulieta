-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2024 a las 22:36:28
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
-- Estructura de tabla para la tabla `agencias`
--

CREATE TABLE `agencias` (
  `id_agencia` int(11) NOT NULL,
  `agencia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(7, 'Boton Azul', 1, 2, 503, 5, 0),
(8, 'Tela azul', 1, 1, 1447, 10, 0),
(9, 'Tela negra a rayas ', 1, 2, 55, 50, 0);

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
(1, 'franela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `telefono` varchar(30) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `contraseña` varchar(30) DEFAULT NULL,
  `cedula` int(11) DEFAULT NULL,
  `eliminado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `apellido`, `telefono`, `email`, `contraseña`, `cedula`, `eliminado`) VALUES
(38, 'Alexito', 'pire', '4145080744', 'alexmegasuper5@gmail.com', '43434343', 244444444, 0),
(40, 'Alex David P', 'Perez Perez', '2614664', 'alexmegasuper5@gmail.com', '123456789Dd+', 131, 0);

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
(1, 'lima limón');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores_materiales`
--

CREATE TABLE `colores_materiales` (
  `id_color` int(11) NOT NULL,
  `color` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `colores_materiales`
--

INSERT INTO `colores_materiales` (`id_color`, `color`) VALUES
(1, 'Rojo'),
(2, 'Azul');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores_prendas`
--

CREATE TABLE `colores_prendas` (
  `id_color` int(11) NOT NULL,
  `color` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `colores_prendas`
--

INSERT INTO `colores_prendas` (`id_color`, `color`) VALUES
(1, 'negro');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinos`
--

CREATE TABLE `destinos` (
  `id_ciudad` int(11) NOT NULL,
  `ciudad` varchar(30) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `cedula_empleado` int(11) DEFAULT NULL,
  `eliminado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombre_empleado`, `apellido_empleado`, `telefono_empleado`, `email_empleado`, `id_ocupacion`, `sueldo`, `cedula_empleado`, `eliminado`) VALUES
(10, 'Alex David', 'Perez Perez', '2147483647', 'asdasd@gmail.com', 1, 30, 30873743, 0),
(11, 'Alex', 'Perz', '41454444444', 'alex@gmail.com', 1, 30, 3939393, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `id_envio` int(11) NOT NULL,
  `id_venta` int(11) DEFAULT NULL,
  `id_entrega` int(11) DEFAULT NULL,
  `id_agencia` int(11) DEFAULT NULL,
  `id_destino` int(11) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  `fecha_llegada` date NOT NULL,
  `starken_id` int(11) DEFAULT NULL,
  `eliminado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_entrega`
--

CREATE TABLE `forma_entrega` (
  `id_entrega` int(11) NOT NULL,
  `entrega` varchar(30) DEFAULT NULL
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
(2, 'niña');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `id_metodo_pago` int(11) NOT NULL,
  `metodo_pago` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `metodo_pago`
--

INSERT INTO `metodo_pago` (`id_metodo_pago`, `metodo_pago`) VALUES
(1, 'efectivo'),
(2, 'transferencia'),
(3, 'ninguno');

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
(2, 'costurero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `id_orden` int(11) NOT NULL,
  `id_prenda` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `eliminado` tinyint(1) NOT NULL
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

--
-- Volcado de datos para la tabla `orden_pedido`
--

INSERT INTO `orden_pedido` (`id_orden_pedido`, `id_pedido`, `id_material`, `cantidad_material`) VALUES
(5, 1, 8, 8),
(6, 29, 8, 3),
(7, 29, 9, 2),
(8, 30, 7, 3),
(9, 31, 9, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_venta`
--

CREATE TABLE `orden_venta` (
  `id_ordenVenta` int(255) NOT NULL,
  `id_venta` int(255) NOT NULL,
  `id_prenda` int(255) NOT NULL,
  `cantidad_prenda` int(255) NOT NULL
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
(44, 'Si', 15, 0),
(80, '13', 100, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patron_material`
--

CREATE TABLE `patron_material` (
  `id_patronMaterial` int(30) NOT NULL,
  `id_patron` int(200) NOT NULL,
  `id_material` int(200) NOT NULL,
  `cantidad` int(200) NOT NULL
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
(0, 44, 8, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(30) NOT NULL,
  `id_proveedor` int(30) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `estado_pedido` tinyint(1) NOT NULL,
  `id_usuario` int(30) NOT NULL,
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
(44, 'Assets/img/prendas/prendaDefault.png', '13', 44, 1, 1, 0, 1, 1, 1, 100, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(30) NOT NULL,
  `nombre_proveedor` varchar(30) NOT NULL,
  `telefono_proveedor` varchar(30) NOT NULL,
  `gmail_proveedor` varchar(30) NOT NULL,
  `id_tipo_proveedor` int(30) NOT NULL,
  `notas_proveedor` varchar(30) NOT NULL,
  `eliminado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre_proveedor`, `telefono_proveedor`, `gmail_proveedor`, `id_tipo_proveedor`, `notas_proveedor`, `eliminado`) VALUES
(19, 'Raul', '321654987', 'aeld@gmail.com', 3, 'jkh', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_roles` int(11) NOT NULL,
  `rol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_roles`, `rol`) VALUES
(1, 'admin'),
(2, 'user');

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
(1, '5', 'S');

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
(2, 'Botones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_venta`
--

CREATE TABLE `tipos_venta` (
  `id_tipo_venta` int(11) NOT NULL,
  `nombre_tipo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_proveedor`
--

CREATE TABLE `tipo_proveedor` (
  `id_tipo_proveedor` int(30) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_proveedor`
--

INSERT INTO `tipo_proveedor` (`id_tipo_proveedor`, `tipo`) VALUES
(1, 'Telas'),
(2, 'Maquinaria'),
(3, 'Estampados');

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
  `contraseña_usuario` varchar(30) DEFAULT NULL,
  `id_roles` int(11) NOT NULL,
  `pregunta` char(30) NOT NULL,
  `respuesta` char(30) NOT NULL,
  `img_usuario` varchar(300) NOT NULL,
  `usuario_eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `apellido_usuario`, `cedula_usuario`, `gmail_usuario`, `contraseña_usuario`, `id_roles`, `pregunta`, `respuesta`, `img_usuario`, `usuario_eliminado`) VALUES
(100, 'Alex  ', 'Perez Perez', 30873743, 'alexmegasuper5@gmail.com', '123456789Dd+', 1, '', '', 'Assets/img/users/7130d0f10a4b8e51bb47eda958c8f636.jpg', 0),
(127, 'Raul', 'Suarez', NULL, 'raul@gmail.com', '12345', 2, '¿Cúal es su cantante favorito?', 'the weeknd', 'Assets/img/users/280-2804362_the-hollow-knight-hollow-knight-png-transparent-png.png', 0),
(128, 'Ariel', 'Perez', NULL, 'ariel@gmail.com', '21j3213213Df', 2, '¿Cúal es su deporte favorito?', 'Tenis', 'Assets/img/users/User_default_icon.png', 1),
(129, 'Ariel', 'Perez', NULL, 'papo@gmail.com', '123456789Dd', 2, '¿Cúal es su hobby?', 'Tenis', 'Assets/img/users/User_default_icon.png', 1),
(130, 'Ariel', 'Perez', NULL, 'alelimon@gmail.com', '123456789Dd+', 1, '¿Cúal es su hobby?', 'patear negros', 'Assets/img/users/User_default_icon.png', 1),
(132, 'Jose', 'Perez Perez', NULL, 'fasd@gmail.com', '123456789Dd+', 2, '¿Cúal es su hobby?', 'asdsad', 'Assets/img/users/User_default_icon.png', 1),
(133, 'Alex', 'sdadsad', NULL, 'alexmegasdsaduper5@gmail.com', 'dDsadsad34', 2, '¿Cúal es el nombre de su masco', 'sdsd', 'Assets/img/users/User_default_icon.png', 1),
(134, 'Alex', 'sdadsad', NULL, 'alexmegasdsaduperdd5@gmail.com', '312323123·dsD', 2, '¿Cúal es su hobby?', 'sdsd', 'Assets/img/users/User_default_icon.png', 1),
(135, 'Alex', 'sdadsad', NULL, 'alexmegasuper345@gmail.com', '342432d4324FFF', 2, '¿Cúal es su hobby?', '13213213', 'Assets/img/users/User_default_icon.png', 1),
(136, 'Alex', 'asad', NULL, 'alexmegasdsadupdddder5@gmail.c', '1321323DDd', 2, '¿Cúal es el nombre de su masco', 'erer', 'Assets/img/users/User_default_icon.png', 1),
(137, 'Alex', 'asad', NULL, 'alexmegasdsadupdddder5@gmail.c', '1321323DDd', 2, '¿Cúal es el nombre de su masco', 'erer', 'Assets/img/users/User_default_icon.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `id_cliente` int(30) NOT NULL,
  `id_tipo_venta` int(30) NOT NULL,
  `id_orden` int(30) NOT NULL,
  `id_pago` int(30) NOT NULL,
  `monto_total` int(30) NOT NULL,
  `eliminado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agencias`
--
ALTER TABLE `agencias`
  ADD PRIMARY KEY (`id_agencia`);

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
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `telefono` (`telefono`,`email`,`cedula`);

--
-- Indices de la tabla `colecciones_prenda`
--
ALTER TABLE `colecciones_prenda`
  ADD PRIMARY KEY (`id_coleccion`);

--
-- Indices de la tabla `colores_materiales`
--
ALTER TABLE `colores_materiales`
  ADD PRIMARY KEY (`id_color`);

--
-- Indices de la tabla `colores_prendas`
--
ALTER TABLE `colores_prendas`
  ADD PRIMARY KEY (`id_color`);

--
-- Indices de la tabla `confeccion`
--
ALTER TABLE `confeccion`
  ADD PRIMARY KEY (`id_confeccion`),
  ADD KEY `id_receta` (`id_patron`),
  ADD KEY `unq_confeccion_id_empleado` (`id_empleado`);

--
-- Indices de la tabla `destinos`
--
ALTER TABLE `destinos`
  ADD PRIMARY KEY (`id_ciudad`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `id_ocupacion` (`id_ocupacion`);

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`id_envio`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_entrega` (`id_entrega`),
  ADD KEY `id_agencia` (`id_agencia`),
  ADD KEY `id_destino` (`id_destino`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `forma_entrega`
--
ALTER TABLE `forma_entrega`
  ADD PRIMARY KEY (`id_entrega`);

--
-- Indices de la tabla `generos_prenda`
--
ALTER TABLE `generos_prenda`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`id_metodo_pago`);

--
-- Indices de la tabla `ocupaciones`
--
ALTER TABLE `ocupaciones`
  ADD PRIMARY KEY (`id_ocupacion`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`id_orden`),
  ADD KEY `id_prenda` (`id_prenda`);

--
-- Indices de la tabla `orden_pedido`
--
ALTER TABLE `orden_pedido`
  ADD PRIMARY KEY (`id_orden_pedido`),
  ADD KEY `id_material` (`id_material`);

--
-- Indices de la tabla `orden_venta`
--
ALTER TABLE `orden_venta`
  ADD PRIMARY KEY (`id_ordenVenta`);

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
  ADD KEY `id_tipo_proveedor` (`id_tipo_proveedor`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_roles`);

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
-- Indices de la tabla `tipos_venta`
--
ALTER TABLE `tipos_venta`
  ADD PRIMARY KEY (`id_tipo_venta`);

--
-- Indices de la tabla `tipo_proveedor`
--
ALTER TABLE `tipo_proveedor`
  ADD PRIMARY KEY (`id_tipo_proveedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_permisos` (`id_roles`),
  ADD KEY `id_permisos_2` (`id_roles`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_cliente` (`id_cliente`,`id_tipo_venta`,`id_orden`,`id_pago`),
  ADD KEY `id_tipo_venta` (`id_tipo_venta`),
  ADD KEY `id_orden` (`id_orden`),
  ADD KEY `id_pago` (`id_pago`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agencias`
--
ALTER TABLE `agencias`
  MODIFY `id_agencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `categorias_prenda`
--
ALTER TABLE `categorias_prenda`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `colecciones_prenda`
--
ALTER TABLE `colecciones_prenda`
  MODIFY `id_coleccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `colores_materiales`
--
ALTER TABLE `colores_materiales`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `colores_prendas`
--
ALTER TABLE `colores_prendas`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `confeccion`
--
ALTER TABLE `confeccion`
  MODIFY `id_confeccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `destinos`
--
ALTER TABLE `destinos`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `id_envio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `forma_entrega`
--
ALTER TABLE `forma_entrega`
  MODIFY `id_entrega` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `generos_prenda`
--
ALTER TABLE `generos_prenda`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `id_metodo_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ocupaciones`
--
ALTER TABLE `ocupaciones`
  MODIFY `id_ocupacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `id_orden` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orden_pedido`
--
ALTER TABLE `orden_pedido`
  MODIFY `id_orden_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `orden_venta`
--
ALTER TABLE `orden_venta`
  MODIFY `id_ordenVenta` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `patrones`
--
ALTER TABLE `patrones`
  MODIFY `id_patron` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `prendas`
--
ALTER TABLE `prendas`
  MODIFY `id_prenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_roles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tallas`
--
ALTER TABLE `tallas`
  MODIFY `id_talla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipos_materiales`
--
ALTER TABLE `tipos_materiales`
  MODIFY `id_tipo_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipos_venta`
--
ALTER TABLE `tipos_venta`
  MODIFY `id_tipo_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_proveedor`
--
ALTER TABLE `tipo_proveedor`
  MODIFY `id_tipo_proveedor` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD CONSTRAINT `almacen_ibfk_1` FOREIGN KEY (`color_material`) REFERENCES `colores_materiales` (`id_color`) ON UPDATE CASCADE,
  ADD CONSTRAINT `almacen_ibfk_2` FOREIGN KEY (`tipo_material`) REFERENCES `tipos_materiales` (`id_tipo_material`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `confeccion`
--
ALTER TABLE `confeccion`
  ADD CONSTRAINT `confeccion_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `confeccion_ibfk_3` FOREIGN KEY (`id_patron`) REFERENCES `patrones` (`id_patron`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `destinos`
--
ALTER TABLE `destinos`
  ADD CONSTRAINT `destinos_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id_estado`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`id_ocupacion`) REFERENCES `ocupaciones` (`id_ocupacion`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `envios`
--
ALTER TABLE `envios`
  ADD CONSTRAINT `envios_ibfk_1` FOREIGN KEY (`id_agencia`) REFERENCES `agencias` (`id_agencia`) ON UPDATE CASCADE,
  ADD CONSTRAINT `envios_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`) ON UPDATE CASCADE,
  ADD CONSTRAINT `envios_ibfk_3` FOREIGN KEY (`id_destino`) REFERENCES `destinos` (`id_ciudad`) ON UPDATE CASCADE,
  ADD CONSTRAINT `envios_ibfk_4` FOREIGN KEY (`id_entrega`) REFERENCES `forma_entrega` (`id_entrega`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`id_prenda`) REFERENCES `prendas` (`id_prenda`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `prendas_ibfk_2` FOREIGN KEY (`id_color`) REFERENCES `colores_prendas` (`id_color`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prendas_ibfk_3` FOREIGN KEY (`id_coleccion`) REFERENCES `colecciones_prenda` (`id_coleccion`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prendas_ibfk_4` FOREIGN KEY (`id_talla`) REFERENCES `tallas` (`id_talla`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prendas_ibfk_5` FOREIGN KEY (`id_genero`) REFERENCES `generos_prenda` (`id_genero`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prendas_ibfk_6` FOREIGN KEY (`patron_prenda`) REFERENCES `patrones` (`id_patron`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD CONSTRAINT `proveedores_ibfk_1` FOREIGN KEY (`id_tipo_proveedor`) REFERENCES `tipo_proveedor` (`id_tipo_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_permisos` FOREIGN KEY (`id_roles`) REFERENCES `roles` (`id_roles`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_tipo_venta`) REFERENCES `tipos_venta` (`id_tipo_venta`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`id_orden`) REFERENCES `orden` (`id_orden`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_4` FOREIGN KEY (`id_pago`) REFERENCES `tipo_pago` (`id_pago`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

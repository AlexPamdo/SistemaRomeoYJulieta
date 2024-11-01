-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2024 a las 04:04:16
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

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
(1, 'Botón de plástico', 1, 1, 149, 10, 0),
(2, 'Tela de algodón', 1, 2, 420, 5, 0),
(3, 'Hilo de poliéster', 3, 4, 403, 3, 0),
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
(15, 'Tela de lino', 1, 12, 90, 8, 0),
(16, 'Botón de resina', 1, 1, 60, 10, 0),
(17, 'Hilo metálico', 3, 14, 40, 5, 0),
(18, 'Tela de terciopelo', 1, 1, 30, 20, 0),
(19, 'Cremallera invisible', 4, 5, 20, 4, 0),
(20, 'Hilo de bordado', 1, 1, 150, 6, 0),
(21, 'Pire paleta', 1, 10, 5, 15, 0),
(22, 'Pire paleta', 1, 10, 0, 15, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo`
--

CREATE TABLE `catalogo` (
  `id_catalogo` int(255) NOT NULL,
  `desc_catalogo` int(255) NOT NULL,
  `precio_catalogo` int(255) NOT NULL,
  `grupo_catalogo` int(255) NOT NULL,
  `detalles_catalogo` varchar(500) NOT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `catalogo`
--

INSERT INTO `catalogo` (`id_catalogo`, `desc_catalogo`, `precio_catalogo`, `grupo_catalogo`, `detalles_catalogo`, `eliminado`) VALUES
(1, 80, 10, 1, 'ola', 1),
(2, 127, 1, 1, '1', 0);

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
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(255) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contraseña` varchar(255) DEFAULT NULL,
  `cedula` varchar(255) DEFAULT NULL,
  `eliminado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `apellido`, `telefono`, `email`, `contraseña`, `cedula`, `eliminado`) VALUES
(1, 'Alejandro', 'Martínez', '1234567890', 'alejandro.martinez@example.com', 'contraseña123', 'V-12345678', 0),
(2, 'Lucía', 'González', '0987654321', 'lucia.gonzalez@example.com', 'contraseña456', 'V-87654321', 0),
(3, 'Carlos', 'Pérez', '1122334455', 'carlos.perez@example.com', 'contraseña789', 'V-11223344', 0),
(4, 'María', 'López', '2233445566', 'maria.lopez@example.com', 'contraseña321', 'V-22334455', 0),
(5, 'Sofía', 'Torres', '3344556677', 'sofia.torres@example.com', 'contraseña654', 'V-33445566', 0),
(6, 'Luis', 'Ramírez', '4455667788', 'luis.ramirez@example.com', 'contraseña987', 'V-44556677', 0),
(7, 'Diego', 'Hernández', '5566778899', 'diego.hernandez@example.com', 'contraseña147', 'V-55667788', 0),
(8, 'Claudia', 'Mendoza', '6677889900', 'claudia.mendoza@example.com', 'contraseña258', 'V-66778899', 0),
(9, 'Pedro', 'Cruz', '7788990011', 'pedro.cruz@example.com', 'contraseña369', 'V-77889900', 0),
(10, 'Valentina', 'Ríos', '8899001122', 'valentina.rios@example.com', 'contraseña159', 'V-88990011', 0);

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
(26, 129, 2, NULL, '2024-10-30', 2, 0);

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
  `cedula_empleado` varchar(255) DEFAULT NULL,
  `eliminado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombre_empleado`, `apellido_empleado`, `telefono_empleado`, `email_empleado`, `id_ocupacion`, `sueldo`, `cedula_empleado`, `eliminado`) VALUES
(1, 'Juan', 'Pérez', '1234567890', 'juan.perez@example.com', 1, 1500, 'V-12345678', 0),
(2, 'María', 'González', '0987654321', 'maria.gonzalez@example.com', 2, 1200, 'V-87654321', 0),
(3, 'Carlos', 'López', '1122334455', 'carlos.lopez@example.com', 3, 800, 'V-11223344', 0),
(4, 'Ana', 'Martínez', '2233445566', 'ana.martinez@example.com', 4, 2000, 'V-22334455', 0),
(5, 'Luis', 'Ramírez', '3344556677', 'luis.ramirez@example.com', 5, 1000, 'V-33445566', 0),
(6, 'Laura', 'Torres', '4455667788', 'laura.torres@example.com', 6, 900, 'V-44556677', 0),
(7, 'Diego', 'Hernández', '5566778899', 'diego.hernandez@example.com', 7, 950, 'V-55667788', 0),
(8, 'Sofía', 'Mendoza', '6677889900', 'sofia.mendoza@example.com', 8, 1100, 'V-66778899', 0),
(9, 'Pedro', 'Cruz', '7788990011', 'pedro.cruz@example.com', 9, 1800, 'V-77889900', 0),
(10, 'Claudia', 'Ríos', '8899001122', 'claudia.rios@example.com', 10, 1400, 'V-88990011', 0);

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
(2, 'niña'),
(3, 'unisex');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_catalogo`
--

CREATE TABLE `imagenes_catalogo` (
  `id_imagen_catalogo` int(255) NOT NULL,
  `id_catalogo` int(255) NOT NULL,
  `img_ruta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes_catalogo`
--

INSERT INTO `imagenes_catalogo` (`id_imagen_catalogo`, `id_catalogo`, `img_ruta`) VALUES
(1, 1, '7d4c7fb8-521f-43b4-9096-68dd6d184009.jpg'),
(2, 1, '7d4c7fb8-521f-43b4-9096-68dd6d184009.jpg'),
(3, 1, '7d4c7fb8-521f-43b4-9096-68dd6d184009.jpg'),
(4, 2, 'Flyer1.png');

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
(9, 31, 9, 23),
(10, 1, 11, 2),
(11, 1, 3, 3),
(12, 34, 2, 5),
(13, 34, 12, 2),
(14, 35, 2, 10),
(15, 36, 21, 15),
(16, 36, 1, 1);

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
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `patrones`
--

INSERT INTO `patrones` (`id_patron`, `nombre_patron`, `eliminado`) VALUES
(127, 'Camisa Negra', 1),
(129, 'Camisa hecha de pire paletas', 0);

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
(1, 1, 1, 10),
(2, 1, 1, 10),
(3, 92, 1, 10),
(4, 93, 1, 10),
(5, 94, 1, 10),
(6, 95, 1, 1),
(7, 96, 1, 1),
(8, 97, 1, 2),
(9, 98, 1, 10),
(10, 99, 2, 1),
(11, 100, 2, 1),
(12, 101, 2, 1),
(13, 102, 1, 5),
(14, 103, 3, 4),
(15, 104, 3, 4),
(16, 105, 3, 4),
(17, 106, 3, 4),
(18, 0, 2, 1),
(19, 0, 5, 1),
(20, 0, 2, 1),
(21, 107, 2, 1),
(22, 108, 1, 2),
(23, 109, 1, 10),
(24, 110, 2, 1),
(25, 111, 2, 3),
(26, 113, 2, 10),
(27, 113, 2, 1),
(28, 114, 2, 1),
(29, 115, 5, 1),
(30, 115, 3, 3),
(31, 116, 2, 1),
(32, 117, 2, 2),
(33, 118, 2, 1),
(34, 119, 2, 1),
(35, 120, 2, 1),
(36, 1, 1, 1),
(37, 121, 2, 1),
(38, 1, 2, 11),
(39, 1, 2, 1),
(40, 1, 1, 1),
(41, 2, 1, 1),
(42, 126, 2, 2),
(43, 127, 2, 1),
(44, 127, 2, 2),
(45, 128, 2, 1),
(46, 128, 1, 1),
(49, 129, 1, 9);

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

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `id_proveedor`, `fecha_pedido`, `estado_pedido`, `id_usuario`, `total_pedido`, `eliminado`) VALUES
(33, 3, '2024-10-26', 0, 1, 9, 0),
(34, 1, '2024-10-26', 0, 1, 49, 0),
(35, 2, '2024-10-27', 0, 1, 50, 0),
(36, 20, '2024-10-30', 0, 1, 225, 0);

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
(127, 'src/Assets/img/prendas/prendaDefault.png', 'Camisa Negra', 127, 2, 2, 1, 1, 3, 1, 1, 1),
(129, 'src/Assets/img/prendas/prendaDefault.png', 'Camisa hecha de pire paletas', 129, 1, 4, 2, 6, 10, 1, 75, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(255) NOT NULL,
  `nombre_proveedor` varchar(255) NOT NULL,
  `rif_proveedor` varchar(255) NOT NULL,
  `telefono_proveedor` varchar(255) NOT NULL,
  `gmail_proveedor` varchar(255) NOT NULL,
  `notas_proveedor` varchar(255) NOT NULL,
  `eliminado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre_proveedor`, `rif_proveedor`, `telefono_proveedor`, `gmail_proveedor`, `notas_proveedor`, `eliminado`) VALUES
(1, 'Textiles S.A.', 'V312321321', '123456789', 'contacto@textilessa.com', 'Proveedores de telas de alta calidad', 0),
(2, 'Botones & Más', 'V988777777', '987654321', 'info@botonesymas.com', 'Especializados en botones de diversos materiales', 0),
(3, 'Hilos Finos', 'V988777777', '1122334455', 'ventas@hilosfinos.com', 'Hilos de diferentes grosores y colores', 0),
(4, 'Cremalleras Rápidas', 'V988780999', '22334898989', 'contacto@cremallerasrapidas.com', 'Cremalleras de todo tipo y tamaño', 0),
(5, 'Suministros de Moda', 'V988665656', '3344556677', 'ventas@suministrosmoda.com', 'Suministros generales para confección', 0),
(6, 'Telas & Colores', 'V987687687', '4455667788', 'info@telasycolores.com', 'Telas estampadas y unicolores', 0),
(7, 'Accesorios Creativos', 'M434232342', '5566778899', 'contacto@accesorioscreativos.com', 'Accesorios para la moda y la confección', 0),
(8, 'Papelería Textil', 'G423432432', '6677889900', 'info@papelariatextil.com', 'Papelería especializada en patrones de costura', 0),
(9, 'Cortinas y Más', 'G444444431', '7788990011', 'ventas@cortinasymas.com', 'Proveedores de telas para cortinas', 0),
(10, 'Materiales para Costura', 'V123212132', '8899001122', 'contacto@materialesparacostura.com', 'Materiales de costura variados', 0),
(20, 'Proveedor Pire Paleta', 'V312312312', '123213213213213123', 'pirepaleta@gmail.com', 'Alexskadksajdksajdsajdksajdksad,', 0),
(21, 'Proveedor Pire Paleta', 'V312312312', '12321321321', 'pirepaleta@gmail.com', '12esADSADSAD', 1);

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
  `rol` int(11) NOT NULL,
  `pregunta` char(30) NOT NULL,
  `respuesta` char(30) NOT NULL,
  `img_usuario` varchar(300) NOT NULL,
  `usuario_eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `apellido_usuario`, `cedula_usuario`, `gmail_usuario`, `contraseña_usuario`, `rol`, `pregunta`, `respuesta`, `img_usuario`, `usuario_eliminado`) VALUES
(1, 'Alex ', 'Perez', 30872742, 'alexmegasuper5@gmail.com', 'alexdavid', 1, 'Comida Favorita', 'Helado', '', 0);

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
-- Indices de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  ADD PRIMARY KEY (`id_catalogo`);

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
-- Indices de la tabla `imagenes_catalogo`
--
ALTER TABLE `imagenes_catalogo`
  ADD PRIMARY KEY (`id_imagen_catalogo`);

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
-- Indices de la tabla `patron_material`
--
ALTER TABLE `patron_material`
  ADD PRIMARY KEY (`id_patronMaterial`),
  ADD KEY `id_patronMaterial` (`id_patronMaterial`);

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
  ADD PRIMARY KEY (`id_proveedor`);

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
  ADD PRIMARY KEY (`id_usuario`);

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
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  MODIFY `id_catalogo` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categorias_prenda`
--
ALTER TABLE `categorias_prenda`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
  MODIFY `id_confeccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `imagenes_catalogo`
--
ALTER TABLE `imagenes_catalogo`
  MODIFY `id_imagen_catalogo` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `id_metodo_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ocupaciones`
--
ALTER TABLE `ocupaciones`
  MODIFY `id_ocupacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `id_orden` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orden_pedido`
--
ALTER TABLE `orden_pedido`
  MODIFY `id_orden_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `orden_venta`
--
ALTER TABLE `orden_venta`
  MODIFY `id_ordenVenta` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `patrones`
--
ALTER TABLE `patrones`
  MODIFY `id_patron` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT de la tabla `patron_material`
--
ALTER TABLE `patron_material`
  MODIFY `id_patronMaterial` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `prendas`
--
ALTER TABLE `prendas`
  MODIFY `id_prenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

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
  ADD CONSTRAINT `almacen_ibfk_1` FOREIGN KEY (`color_material`) REFERENCES `colores` (`id_color`) ON UPDATE CASCADE,
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
  ADD CONSTRAINT `prendas_ibfk_2` FOREIGN KEY (`id_color`) REFERENCES `colores` (`id_color`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prendas_ibfk_3` FOREIGN KEY (`id_coleccion`) REFERENCES `colecciones_prenda` (`id_coleccion`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prendas_ibfk_4` FOREIGN KEY (`id_talla`) REFERENCES `tallas` (`id_talla`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prendas_ibfk_5` FOREIGN KEY (`id_genero`) REFERENCES `generos_prenda` (`id_genero`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prendas_ibfk_6` FOREIGN KEY (`patron_prenda`) REFERENCES `patrones` (`id_patron`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

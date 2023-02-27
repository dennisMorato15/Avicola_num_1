-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-02-2023 a las 16:56:35
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbavicola`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimentacion`
--

CREATE TABLE `alimentacion` (
  `idAlim` int(11) NOT NULL,
  `nombreAlim` varchar(50) NOT NULL,
  `catidadAlim` int(11) NOT NULL,
  `stockAlim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `idCargo` int(11) NOT NULL,
  `cargo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`idCargo`, `cargo`) VALUES
(1, 'Administrador'),
(2, 'Empleado'),
(3, 'Vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombreCliente` varchar(50) NOT NULL,
  `direccionCliente` varchar(50) NOT NULL,
  `nombreEstablecimiento` varchar(50) NOT NULL,
  `telefonoCliente` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombreCliente`, `direccionCliente`, `nombreEstablecimiento`, `telefonoCliente`) VALUES
(5, 'hola', 'carrl', 'akcjkwvesd', '12342122'),
(6, 'jeerjsfjes', 'adefijefvne', 'wjeafwjeuf12', '12344');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galpon`
--

CREATE TABLE `galpon` (
  `idGalpon` int(11) NOT NULL,
  `nombreGalpon` varchar(25) NOT NULL,
  `capacidadGalpon` varchar(25) NOT NULL,
  `ponederos` int(11) NOT NULL,
  `comederos` int(11) NOT NULL,
  `vevederos` int(11) NOT NULL,
  `tamaño` varchar(50) NOT NULL,
  `imagenGalpon` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `galpon`
--

INSERT INTO `galpon` (`idGalpon`, `nombreGalpon`, `capacidadGalpon`, `ponederos`, `comederos`, `vevederos`, `tamaño`, `imagenGalpon`) VALUES
(10, 'Galpon FAA2', '89', 0, 0, 0, '', 'idice8.jpg'),
(13, 'fres', '2', 2, 2, 2, '45 mtros cuadrados', '1f60e.png'),
(14, 'FA55', '100', 50, 56, 56, '1029 metros cuadrados', 'galpon.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramienta`
--

CREATE TABLE `herramienta` (
  `idHerramienta` int(11) NOT NULL,
  `nombreHerra` varchar(50) NOT NULL,
  `contidadHerra` int(11) NOT NULL,
  `stockherra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `herramienta`
--

INSERT INTO `herramienta` (`idHerramienta`, `nombreHerra`, `contidadHerra`, `stockherra`) VALUES
(0, 'vevederos', 10, 2),
(1203, 'comedero', 9, 3),
(1204, 'tanque del agua', 5, 2),
(1205, 'palas', 12, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `idInventario` int(6) NOT NULL,
  `nombreProducto` varchar(50) NOT NULL,
  `precioProducto` int(12) NOT NULL,
  `existencias` decimal(10,0) NOT NULL,
  `stock` decimal(10,0) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `fecha_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`idInventario`, `nombreProducto`, `precioProducto`, `existencias`, `stock`, `imagen`, `fecha_reg`) VALUES
(48, 'Huevo A', 15500, '45', '14', 'indice2.jpg', '2023-02-14 12:27:51'),
(52, 'huevos Jumbo', 21000, '45', '3', 'indice5.jpg', '2022-12-06 02:53:13'),
(53, 'huevos 3AA', 19500, '34', '3', 'indice4.jpg', '2022-12-06 02:54:36'),
(54, 'huevo B', 14000, '32', '23', 'indice4.jpg', '2022-12-06 02:55:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lotegallina`
--

CREATE TABLE `lotegallina` (
  `codLote` int(11) NOT NULL,
  `fecha_In` datetime NOT NULL,
  `cantidaGallinas` int(11) NOT NULL,
  `razaGallina` varchar(50) NOT NULL,
  `idGalpon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lotegallina`
--

INSERT INTO `lotegallina` (`codLote`, `fecha_In`, `cantidaGallinas`, `razaGallina`, `idGalpon`) VALUES
(0, '2022-12-05 20:45:27', 12, 'la guerra', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medida`
--

CREATE TABLE `medida` (
  `idMedida` int(11) NOT NULL,
  `medida` varchar(30) NOT NULL,
  `colorHuevos` varchar(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produciongalpon`
--

CREATE TABLE `produciongalpon` (
  `idProduccion` int(11) NOT NULL,
  `idGalpon` int(11) NOT NULL,
  `produccionGalpon` decimal(10,0) NOT NULL,
  `idInventario` int(11) NOT NULL,
  `fechas` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idProveedor` int(11) NOT NULL,
  `nombreProveedor` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `empresaProveedor` varchar(25) NOT NULL,
  `telefonoEmpresa` varchar(15) NOT NULL,
  `direccionEmpresa` varchar(50) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `nombreProveedor`, `correo`, `empresaProveedor`, `telefonoEmpresa`, `direccionEmpresa`, `fecha_registro`) VALUES
(1, 'Dennis Jessenia Morato Qu', 'dennis@gmail.com', 'la fina', '312345678', 'calle 4', '2022-11-30 14:24:06'),
(2, 'Sandra Maria Solano Vargas', 'sia@gmail.com', 'Sianoque', '312345678', 'carrera 2 calle 2-69', '2022-12-06 02:58:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quimicos`
--

CREATE TABLE `quimicos` (
  `idQuimico` int(11) NOT NULL,
  `nombreQuim` varchar(50) NOT NULL,
  `catidadQuim` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `quimicos`
--

INSERT INTO `quimicos` (`idQuimico`, `nombreQuim`, `catidadQuim`, `stock`) VALUES
(21345, 'monopersulfato potásico', 5, 2),
(123456, 'glutaraldehído', 6, 2),
(23456, 'ivermectina', 8, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `password` varchar(25) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `fecha_reg` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `email`, `id_cargo`, `password`, `numero`, `fecha_reg`) VALUES
(16, 'Dennis Jessenia', 'Morato', 'ADMIN@GMAIL.COM', 1, 'Hwnc', '3123262225', '2022-11-13 15:58:58'),
(17, 'Dennis Jessenia', 'Morato Quitero', 'dennis@gmail.com', 2, 'HwnctaPldEAg', '31233456789', '2022-11-13 18:28:13'),
(18, 'lorena ', 'morato', 'lo@gmail.com', 3, '123', '31321324', '2022-11-14 00:55:09'),
(19, 'denis', 'tot', 't@gmail.com', 2, 'HwncsqLm', '4312345', '2022-11-14 01:03:32'),
(20, 'lorena', 'morato', 'd@d.com', 3, 'HwnctQ==', '3123456789', '2022-11-14 02:04:21'),
(22, 'Jair ', 'A', 'a@gmail.com', 1, 'Hwk=', '31243457658', '2023-02-13 00:39:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idVenta` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idInventario` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` decimal(11,0) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idCargo`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galpon`
--
ALTER TABLE `galpon`
  ADD PRIMARY KEY (`idGalpon`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`idInventario`);

--
-- Indices de la tabla `lotegallina`
--
ALTER TABLE `lotegallina`
  ADD PRIMARY KEY (`codLote`),
  ADD KEY `idGalpon` (`idGalpon`);

--
-- Indices de la tabla `medida`
--
ALTER TABLE `medida`
  ADD PRIMARY KEY (`idMedida`);

--
-- Indices de la tabla `produciongalpon`
--
ALTER TABLE `produciongalpon`
  ADD PRIMARY KEY (`idProduccion`),
  ADD KEY `nombreGalpon` (`idGalpon`),
  ADD KEY `idInventario` (`idInventario`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idVenta`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idInventario` (`idInventario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `galpon`
--
ALTER TABLE `galpon`
  MODIFY `idGalpon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `idInventario` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `medida`
--
ALTER TABLE `medida`
  MODIFY `idMedida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `produciongalpon`
--
ALTER TABLE `produciongalpon`
  MODIFY `idProduccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lotegallina`
--
ALTER TABLE `lotegallina`
  ADD CONSTRAINT `lotegallina_ibfk_1` FOREIGN KEY (`idGalpon`) REFERENCES `galpon` (`idGalpon`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `produciongalpon`
--
ALTER TABLE `produciongalpon`
  ADD CONSTRAINT `produciongalpon_ibfk_1` FOREIGN KEY (`idGalpon`) REFERENCES `galpon` (`idGalpon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produciongalpon_ibfk_2` FOREIGN KEY (`idInventario`) REFERENCES `inventario` (`idInventario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`idCargo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`idInventario`) REFERENCES `inventario` (`idInventario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

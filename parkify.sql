-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2025 a las 01:48:07
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
-- Base de datos: `parkify`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `fecha_registro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id_admin`, `correo`, `usuario`, `contraseña`, `fecha_registro`) VALUES
(2, 'superadmin@gmail.com', 'AdminPrincipal', 'Stivcode21.', '2025-11-05 09:25:39');

--
-- Disparadores `admins`
--
DELIMITER $$
CREATE TRIGGER `crear_casilleros_admins` AFTER INSERT ON `admins` FOR EACH ROW BEGIN
  DECLARE i INT DEFAULT 1;

  WHILE i <= 30 DO
    INSERT INTO casilleros (id_admin, numero_casillero, ocupado)
    VALUES (NEW.id_admin, i, 0);
    SET i = i + 1;
  END WHILE;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casilleros`
--

CREATE TABLE `casilleros` (
  `id_casillero` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `numero_casillero` int(11) NOT NULL,
  `placa` varchar(10) DEFAULT NULL,
  `ocupado` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `casilleros`
--

INSERT INTO `casilleros` (`id_casillero`, `id_admin`, `numero_casillero`, `placa`, `ocupado`) VALUES
(1, 2, 1, NULL, 0),
(2, 2, 2, NULL, 0),
(3, 2, 3, NULL, 0),
(4, 2, 4, NULL, 0),
(5, 2, 5, NULL, 0),
(6, 2, 6, NULL, 0),
(7, 2, 7, NULL, 0),
(8, 2, 8, NULL, 0),
(9, 2, 9, NULL, 0),
(10, 2, 10, NULL, 0),
(11, 2, 11, NULL, 0),
(12, 2, 12, 'GJSK32', 1),
(13, 2, 13, NULL, 0),
(14, 2, 14, NULL, 0),
(15, 2, 15, NULL, 0),
(16, 2, 16, 'HFRW12', 1),
(17, 2, 17, NULL, 0),
(18, 2, 18, NULL, 0),
(19, 2, 19, NULL, 0),
(20, 2, 20, NULL, 0),
(21, 2, 21, NULL, 0),
(22, 2, 22, NULL, 0),
(23, 2, 23, NULL, 0),
(24, 2, 24, NULL, 0),
(25, 2, 25, NULL, 0),
(26, 2, 26, NULL, 0),
(27, 2, 27, NULL, 0),
(28, 2, 28, NULL, 0),
(29, 2, 29, NULL, 0),
(30, 2, 30, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_historial` int(11) NOT NULL,
  `placa` varchar(20) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `numero_casillero` int(11) DEFAULT NULL,
  `id_admin` int(11) NOT NULL,
  `fecha_entrada` datetime NOT NULL,
  `fecha_salida` datetime DEFAULT current_timestamp(),
  `monto_total` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id_vehiculo` int(11) NOT NULL,
  `placa` varchar(20) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `id_casillero` int(11) DEFAULT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id_vehiculo`, `placa`, `tipo`, `id_casillero`, `id_admin`) VALUES
(1, 'GJSK32', 'moto', 12, 2),
(2, 'HFRW12', 'carro', 16, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `casilleros`
--
ALTER TABLE `casilleros`
  ADD PRIMARY KEY (`id_casillero`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD UNIQUE KEY `placa` (`placa`),
  ADD KEY `id_casillero` (`id_casillero`),
  ADD KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `casilleros`
--
ALTER TABLE `casilleros`
  MODIFY `id_casillero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `casilleros`
--
ALTER TABLE `casilleros`
  ADD CONSTRAINT `casilleros_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admins` (`id_admin`);

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admins` (`id_admin`);

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`id_casillero`) REFERENCES `casilleros` (`id_casillero`),
  ADD CONSTRAINT `vehiculos_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admins` (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

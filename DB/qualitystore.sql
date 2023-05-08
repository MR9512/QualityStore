-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2023 a las 22:07:20
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `qualitystore`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombreCategoria` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombreCategoria`) VALUES
(1, 'Electronica y computación'),
(3, 'Mascotas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` varchar(10) NOT NULL,
  `precio_anterior` varchar(50) NOT NULL,
  `desc_large` text NOT NULL,
  `desc_corta` text NOT NULL,
  `url_imagen` text NOT NULL,
  `url_mercado` text NOT NULL,
  `url_sams` text NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `fecha_subida` date NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `precio`, `precio_anterior`, `desc_large`, `desc_corta`, `url_imagen`, `url_mercado`, `url_sams`, `id_usuario`, `status`, `fecha_subida`, `id_categoria`) VALUES
(1, 'Mesa de Centro Keter California Tipo Ratán', '4000', '4500', 'Su diseño de mimbre redondeado y bajo peso la hace un complemento elegante y estilizado para cualquier juego de asientos. Convierta fácilmente su jardín o patio en la sala exterior de sus sueños. La construcción de resina con apariencia de mimbre es resistente a la intemperie y protegida contra rayos ultravioleta, haciendo que el mantenimiento sea muy fácil. Simplemente limpie con un trapo húmedo, y ya está lista.', 'Complemente su ambiente exterior con la mesa de centro California. ', 'img/mesacentro.jpeg', 'https://articulo.mercadolibre.com.mx/MLM-1879160437-mesa-de-centro-keter-california-tipo-ratan-_JM#position=1&search_layout=grid&type=item&tracking_id=26ab5151-92e1-46c7-9b64-b6b9e15675d2', 'https://www.sams.com.mx/exterior/mesa-de-centro-keter-california-tipo-ratan/981003590', 1, 0, '2023-05-05', 3),
(2, 'Linterna Recargable Honeywell con Clip 2000 LM', '1200', '2000', 'Su cable USB con longitud de 1 m te facilita su carga. Con abrazadera e imanes que te aseguran un adecuado uso en exteriores, ya que permite la operación de manos libres.', 'La linterna recargable Honeywell 2000LM es una luz de trabajo de sujeción recargable con carcasa de plástico y lente de plástico transparente.', 'img/linternahoney.jpeg', 'https://articulo.mercadolibre.com.mx/MLM-1793718783-linterna-recargable-honeywell-con-clip-2000-lm-con-sujecion-_JM#position=5&search_layout=grid&type=item&tracking_id=99d9dc25-1faf-47a3-ac5a-0ae313bacad0', 'https://www.sams.com.mx/autos/linterna-recargable-honeywell-con-clip-2000-lm/980036334', 1, 1, '0000-00-00', 1),
(3, 'Fragancia Carolina Herrera 212 VIP Men para Caball', '2050', '2500', 'La forma de su botella es el reflejo de su joven exuberancia que contiene la esencia moderna de las fiestas más exclusivas de Nueva York. Un coctel de frescor, con un aroma leñoso oriental que combina la misteriosa lima caviar con menta helada para una explosión fresca y energética.', '212 VIP Men de Carolina Herrera ha sido creada para una nueva generación que marca la diferencia con una fragancia moderna inolvidable', 'img/212men.jpeg', 'https://articulo.mercadolibre.com.mx/MLM-823798311-212-vip-men-200ml-edt-spray-_JM#position=18&search_layout=grid&type=item&tracking_id=e8f6ee25-9cc2-4288-96c6-e5fdd5812b84', 'https://www.sams.com.mx/perfumes-y-fragancias/fragancia-carolina-herrera-212-vip-men-para-caballero-200-ml/980043045', 1, 1, '0000-00-00', 1),
(15, 'Balon', '12', '', 'qweeqqwe', 'asfds', '15.png', 'aasd', 'adasd', 1, 1, '2023-05-02', 1),
(16, 'Balon', '12', '', 'qweeqqwe', 'asfds', '16.png', 'aasd', 'adasd', 1, 1, '2023-05-02', 1),
(17, 'Balon', '12', '', 'qweeqqwe', 'asfds', '17.png', 'aasd', 'adasd', 1, 1, '2023-05-02', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`) VALUES
(1, 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellidos` varchar(250) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `telefono` int(20) NOT NULL,
  `status` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `correo`, `password`, `telefono`, `status`, `id_rol`) VALUES
(1, 'Marco Antonio', 'Rodriguez Romero', 'mromero.10@hotmail.com', 'Marco9512*', 1, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE DATABASE deliveroo;
USE deliveroo;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Estructura de tabla para la tabla `platos`
--

CREATE TABLE `platos` (
  `id_plato` bigint(20) UNSIGNED NOT NULL,
  `nombre_plato` varchar(40) NOT NULL,
  `img_plato` varchar(40) NOT NULL,
  `id_tipo_plato` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `platos`
--

INSERT INTO `platos` (`id_plato`, `nombre_plato`, `img_plato`, `id_tipo_plato`) VALUES
(1, 'Arroz frito', 'arroz_frito.jpg', 1),
(2, 'Pizza Margherita', 'pizza_margherita.jpg', 4),
(3, 'Ensalada Vegana', 'ensalada_vegana.jpg', 3),
(4, 'Curry de pollo', 'curry_pollo.jpg', 2),
(5, 'Spaghetti Carbonara', 'spaghetti_carbonara.jpg', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurantes`
--

CREATE TABLE `restaurantes` (
  `id_rest` bigint(20) UNSIGNED NOT NULL,
  `nombre_rest` varchar(255) NOT NULL,
  `descripcion_rest` text NOT NULL,
  `img_rest` varchar(255) NOT NULL,
  `id_usu_rest` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `restaurantes`
--

INSERT INTO `restaurantes` (`id_rest`, `nombre_rest`, `descripcion_rest`, `img_rest`, `id_usu_rest`) VALUES
(1, 'Restaurante Los Sabores de María', 'Especialidades en cocina mediterránea', 'los_sabores_de_maria.jpg', 2),
(2, 'Barcelona Grill', 'Carnes a la parrilla y tapas españolas', 'barcelona_grill.jpg', 3),
(3, 'Sushi Palace', 'Auténtico sushi japonés', 'sushi_palace.jpg', 2),
(4, 'La Trattoria', 'Auténtica cocina italiana', 'la_trattoria.jpg', 9),
(5, 'Veggie Delight', 'Sabores frescos y saludables', 'veggie_delight.jpg', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurantes_platos`
--

CREATE TABLE `restaurantes_platos` (
  `id_rest_plato` bigint(20) UNSIGNED NOT NULL,
  `id_rest_rest_plato` bigint(20) UNSIGNED DEFAULT NULL,
  `id_plato_rest_plato` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `restaurantes_platos`
--

INSERT INTO `restaurantes_platos` (`id_rest_plato`, `id_rest_rest_plato`, `id_plato_rest_plato`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurantes_tipo`
--

CREATE TABLE `restaurantes_tipo` (
  `id_rest_tipo` bigint(20) UNSIGNED NOT NULL,
  `id_rest_rest_tipo` bigint(20) UNSIGNED DEFAULT NULL,
  `id_tipo_rest_tipo` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `restaurantes_tipo`
--

INSERT INTO `restaurantes_tipo` (`id_rest_tipo`, `id_rest_rest_tipo`, `id_tipo_rest_tipo`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_comida`
--

CREATE TABLE `tipo_comida` (
  `id_tipo` bigint(20) UNSIGNED NOT NULL,
  `nombre_tipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_comida`
--

INSERT INTO `tipo_comida` (`id_tipo`, `nombre_tipo`) VALUES
(1, 'China'),
(2, 'India'),
(3, 'Vegana'),
(4, 'Italiana'),
(5, 'Mediterránea'),
(6, 'Japonesa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usu` bigint(20) UNSIGNED NOT NULL,
  `nombre_usu` varchar(255) NOT NULL,
  `apellidos_usu` varchar(255) NOT NULL,
  `email_usu` varchar(255) NOT NULL,
  `tipo_usu` enum('Admin','Gerente','Estandar','Repartidor') NOT NULL,
  `pwd_usu` varchar(255) NOT NULL,
  `telf_usu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `nombre_usu`, `apellidos_usu`, `email_usu`, `tipo_usu`, `pwd_usu`, `telf_usu`) VALUES
(1, 'Adrián', 'Herráez', 'aherraez@gmail.com', 'Admin', '$2y$10$wigWyJ26umFhiMWROr/DK.NqNltLAI4M2dRT5l4MyPPkoy4YN5rW6', '666666666'),
(2, 'Carla', 'Maldonado', 'cmaldonado@gmail.com', 'Gerente', '$2y$10$wigWyJ26umFhiMWROr/DK.NqNltLAI4M2dRT5l4MyPPkoy4YN5rW6', '222222222'),
(3, 'Julia', 'Suarez', 'jsuarez@gmail.com', 'Gerente', '$2y$10$wigWyJ26umFhiMWROr/DK.NqNltLAI4M2dRT5l4MyPPkoy4YN5rW6', '333333333'),
(4, 'Daniel', 'Font', 'dfont@gmail.com', 'Estandar', '$2y$10$wigWyJ26umFhiMWROr/DK.NqNltLAI4M2dRT5l4MyPPkoy4YN5rW6', '555555555'),
(5, 'Ana', 'Martínez López', 'ana.garcia@example.com', 'Estandar', '$2y$10$wigWyJ26umFhiMWROr/DK.NqNltLAI4M2dRT5l4MyPPkoy4YN5rW6', '555123456'),
(6, 'Carlos', 'Fernández Pérez', 'carlos.rodriguez@example.com', 'Repartidor', '$2y$10$wigWyJ26umFhiMWROr/DK.NqNltLAI4M2dRT5l4MyPPkoy4YN5rW6', '123987654'),
(7, 'Laura', 'Gómez Ruiz', 'laura.sanchez@example.com', 'Estandar', '$2y$10$wigWyJ26umFhiMWROr/DK.NqNltLAI4M2dRT5l4MyPPkoy4YN5rW6', '666987654'),
(8, 'Miguel', 'Hernández González', 'miguel.lopez@example.com', 'Repartidor', '$2y$10$wigWyJ26umFhiMWROr/DK.NqNltLAI4M2dRT5l4MyPPkoy4YN5rW6', '123987654'),
(9, 'Sara', 'Jiménez Rodríguez', 'sara.martinez@example.com', 'Estandar', '$2y$10$wigWyJ26umFhiMWROr/DK.NqNltLAI4M2dRT5l4MyPPkoy4YN5rW6', '789123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion` (
  `id_val` bigint(20) UNSIGNED NOT NULL,
  `num_val` int(11) NOT NULL,
  `id_rest_val` bigint(20) UNSIGNED DEFAULT NULL,
  `id_usu_val` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `valoracion`
--

INSERT INTO `valoracion` (`id_val`, `num_val`, `id_rest_val`, `id_usu_val`) VALUES
(1, 5, 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `platos`
--
ALTER TABLE `platos`
  ADD PRIMARY KEY (`id_plato`),
  ADD KEY `platos_id_tipo_plato_foreign` (`id_tipo_plato`);

--
-- Indices de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD PRIMARY KEY (`id_rest`),
  ADD KEY `restaurantes_id_usu_rest_foreign` (`id_usu_rest`);

--
-- Indices de la tabla `restaurantes_platos`
--
ALTER TABLE `restaurantes_platos`
  ADD PRIMARY KEY (`id_rest_plato`),
  ADD KEY `restaurantes_platos_id_rest_rest_plato_foreign` (`id_rest_rest_plato`),
  ADD KEY `restaurantes_platos_id_plato_rest_plato_foreign` (`id_plato_rest_plato`);

--
-- Indices de la tabla `restaurantes_tipo`
--
ALTER TABLE `restaurantes_tipo`
  ADD PRIMARY KEY (`id_rest_tipo`),
  ADD KEY `restaurantes_tipo_id_rest_rest_tipo_foreign` (`id_rest_rest_tipo`),
  ADD KEY `restaurantes_tipo_id_tipo_rest_tipo_foreign` (`id_tipo_rest_tipo`);

--
-- Indices de la tabla `tipo_comida`
--
ALTER TABLE `tipo_comida`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usu`),
  ADD UNIQUE KEY `usuarios_email_usu_unique` (`email_usu`);

--
-- Indices de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD PRIMARY KEY (`id_val`),
  ADD KEY `valoracion_id_rest_val_foreign` (`id_rest_val`),
  ADD KEY `valoracion_id_usu_val_foreign` (`id_usu_val`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `platos`
--
ALTER TABLE `platos`
  MODIFY `id_plato` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  MODIFY `id_rest` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `restaurantes_platos`
--
ALTER TABLE `restaurantes_platos`
  MODIFY `id_rest_plato` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `restaurantes_tipo`
--
ALTER TABLE `restaurantes_tipo`
  MODIFY `id_rest_tipo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_comida`
--
ALTER TABLE `tipo_comida`
  MODIFY `id_tipo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  MODIFY `id_val` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `platos`
--
ALTER TABLE `platos`
  ADD CONSTRAINT `platos_id_tipo_plato_foreign` FOREIGN KEY (`id_tipo_plato`) REFERENCES `tipo_comida` (`id_tipo`) ON DELETE CASCADE;

--
-- Filtros para la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD CONSTRAINT `restaurantes_id_usu_rest_foreign` FOREIGN KEY (`id_usu_rest`) REFERENCES `usuarios` (`id_usu`) ON DELETE CASCADE;

--
-- Filtros para la tabla `restaurantes_platos`
--
ALTER TABLE `restaurantes_platos`
  ADD CONSTRAINT `restaurantes_platos_id_plato_foreign` FOREIGN KEY (`id_plato_rest_plato`) REFERENCES `platos` (`id_plato`) ON DELETE CASCADE,
  ADD CONSTRAINT `restaurantes_platos_id_rest_foreign` FOREIGN KEY (`id_rest_rest_plato`) REFERENCES `restaurantes` (`id_rest`) ON DELETE CASCADE;

--
-- Filtros para la tabla `restaurantes_tipo`
--
ALTER TABLE `restaurantes_tipo`
  ADD CONSTRAINT `restaurantes_tipo_id_rest_rest_tipo_foreign` FOREIGN KEY (`id_rest_rest_tipo`) REFERENCES `restaurantes` (`id_rest`) ON DELETE CASCADE,
  ADD CONSTRAINT `restaurantes_tipo_id_tipo_rest_tipo_foreign` FOREIGN KEY (`id_tipo_rest_tipo`) REFERENCES `tipo_comida` (`id_tipo`) ON DELETE CASCADE;

--
-- Filtros para la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD CONSTRAINT `valoracion_id_rest_val_foreign` FOREIGN KEY (`id_rest_val`) REFERENCES `restaurantes` (`id_rest`) ON DELETE CASCADE,
  ADD CONSTRAINT `valoracion_id_usu_val_foreign` FOREIGN KEY (`id_usu_val`) REFERENCES `usuarios` (`id_usu`) ON DELETE CASCADE;
COMMIT;
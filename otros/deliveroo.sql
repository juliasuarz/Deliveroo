CREATE DATABASE deliveroo;
USE deliveroo;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Estructura de tabla para la tabla `tipo_comida`
--

CREATE TABLE `tipo_comida` (
  `id_tipo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_tipo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_comida`
--

INSERT INTO `tipo_comida` (`nombre_tipo`) VALUES
('China'),
('India'),
('Vegana'),
('Italiana'),
('Mediterránea'),
('Japonesa');

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usu` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_usu` varchar(255) NOT NULL,
  `apellidos_usu` varchar(255) NOT NULL,
  `img_usu` varchar(255) NULL,
  `email_usu` varchar(255) NOT NULL,
  `tipo_usu` enum('Admin','Gerente','Estandar','Repartidor') NOT NULL,
  `pwd_usu` varchar(255) NOT NULL,
  `telf_usu` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_usu`),
  UNIQUE KEY `usuarios_email_usu_unique` (`email_usu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre_usu`, `apellidos_usu`, `email_usu`, `tipo_usu`, `pwd_usu`, `telf_usu`) VALUES
('Adrián', 'Herráez', 'aherraez@gmail.com', 'Admin', '$2y$10$wigWyJ26umFhiMWROr/DK.NqNltLAI4M2dRT5l4MyPPkoy4YN5rW6', '666666666'),
('Carla', 'Maldonado', 'cmaldonado@gmail.com', 'Gerente', '$2y$10$wigWyJ26umFhiMWROr/DK.NqNltLAI4M2dRT5l4MyPPkoy4YN5rW6', '222222222'),
('Julia', 'Suarez', 'jsuarez@gmail.com', 'Gerente', '$2y$10$wigWyJ26umFhiMWROr/DK.NqNltLAI4M2dRT5l4MyPPkoy4YN5rW6', '333333333'),
('Daniel', 'Font', 'dfont@gmail.com', 'Estandar', '$2y$10$wigWyJ26umFhiMWROr/DK.NqNltLAI4M2dRT5l4MyPPkoy4YN5rW6', '555555555'),
('Ana', 'Martínez López', 'ana.garcia@example.com', 'Estandar', '$2y$10$wigWyJ26umFhiMWROr/DK.NqNltLAI4M2dRT5l4MyPPkoy4YN5rW6', '555123456'),
('Carlos', 'Fernández Pérez', 'carlos.rodriguez@example.com', 'Repartidor', '$2y$10$wigWyJ26umFhiMWROr/DK.NqNltLAI4M2dRT5l4MyPPkoy4YN5rW6', '123987654'),
('Laura', 'Gómez Ruiz', 'laura.sanchez@example.com', 'Estandar', '$2y$10$wigWyJ26umFhiMWROr/DK.NqNltLAI4M2dRT5l4MyPPkoy4YN5rW6', '666987654'),
('Miguel', 'Hernández González', 'miguel.lopez@example.com', 'Repartidor', '$2y$10$wigWyJ26umFhiMWROr/DK.NqNltLAI4M2dRT5l4MyPPkoy4YN5rW6', '123987654'),
('Sara', 'Jiménez Rodríguez', 'sara.martinez@example.com', 'Estandar', '$2y$10$wigWyJ26umFhiMWROr/DK.NqNltLAI4M2dRT5l4MyPPkoy4YN5rW6', '789123456');

--
-- Estructura de tabla para la tabla `restaurantes`
--

CREATE TABLE `restaurantes` (
  `id_rest` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_rest` varchar(255) NOT NULL,
  `descripcion_rest` text NOT NULL,
  `tiempo_rest` enum('10','15','20','25','30','+30') NOT NULL,
  `descuento_rest` enum('0','10%','20%','30%','50%') NULL,
  `precio_envio_rest` decimal(4,2) NULL,
  `img_rest` varchar(255) NOT NULL,
  `id_usu_rest` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id_rest`),
  FOREIGN KEY (`id_usu_rest`) REFERENCES `usuarios` (`id_usu`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `restaurantes`
--

INSERT INTO `restaurantes` (`nombre_rest`, `descripcion_rest`, `tiempo_rest`, `descuento_rest`, `precio_envio_rest`, `img_rest`, `id_usu_rest`) VALUES
('Restaurante Los Sabores de María', 'Especialidades en cocina mediterránea', '15',  NULL, 1.49, 'los_sabores_de_maria.jpg', 2),
('Barcelona Grill', 'Carnes a la parrilla y tapas españolas', '30',  '0', 1.99, 'barcelona_grill.jpg', 3),
('Sushi Palace', 'Auténtico sushi japonés', '+30',  '10%', 1.49, 'sushi_palace.jpg', 2),
('La Trattoria', 'Auténtica cocina italiana', '10',  '20%', 2.49, 'la_trattoria.jpg', 9),
('Veggie Delight', 'Sabores frescos y saludables', '15', '20%', NULL, 'veggie_delight.jpg', 9);

--
-- Estructura de tabla para la tabla `platos`
--

CREATE TABLE `platos` (
  `id_plato` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_plato` varchar(40) NOT NULL,
  `precio_plato` decimal(5,2) NOT NULL,
  `img_plato` varchar(40) NOT NULL,
  `id_tipo_plato` bigint(20) UNSIGNED DEFAULT NULL,
  `id_rest_plato` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id_plato`),
  FOREIGN KEY (`id_tipo_plato`) REFERENCES `tipo_comida` (`id_tipo`) ON DELETE CASCADE,
  FOREIGN KEY (`id_rest_plato`) REFERENCES `restaurantes` (`id_rest`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `platos`
--

INSERT INTO `platos` (`nombre_plato`, `precio_plato`, `img_plato`, `id_tipo_plato`, `id_rest_plato`) VALUES
('Arroz frito', 30.20, 'arroz_frito.jpg', 1, 1),
('Pizza Margherita', 30.20, 'pizza_margherita.jpg', 4, 2),
('Ensalada Vegana', 30.20, 'ensalada_vegana.jpg', 3, 5),
('Curry de pollo', 30.20, 'curry_pollo.jpg', 2, 1),
('Spaghetti Carbonara', 30.20, 'spaghetti_carbonara.jpg', 4, 4);

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion` (
  `id_val` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `num_val` int(11) NOT NULL,
  `comentario_val` varchar(255) NULL,
  `id_rest_val` bigint(20) UNSIGNED DEFAULT NULL,
  `id_usu_val` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id_val`),
  FOREIGN KEY (`id_rest_val`) REFERENCES `restaurantes` (`id_rest`) ON DELETE CASCADE,
  FOREIGN KEY (`id_usu_val`) REFERENCES `usuarios` (`id_usu`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `valoracion`
--

INSERT INTO `valoracion` (`num_val`, `id_rest_val`, `id_usu_val`) VALUES
(5, 1, 2);

COMMIT;
-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-08-2019 a las 23:58:35
-- Versión del servidor: 10.1.39-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `growla_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beers`
--

CREATE TABLE `beers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `IBUs` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alcohol_content` decimal(4,2) NOT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `beers`
--

INSERT INTO `beers` (`id`, `type`, `description`, `IBUs`, `alcohol_content`, `color_id`, `image`, `created_at`, `updated_at`) VALUES
(9, 'Blonde Ale', 'Cerveza dorada de fermentación alta, perteneciente a la familia de las ALE, de moderada intensidad que tiene una complejidad sutil frutal-especiada a levadura belga, un poco de sabor a malta dulce y un final seco.', '28', '4.00', 4, 'uploads/3ScvZygGzcHrjROSoyFYxr9tVxQN59dqzDr8mWMN.jpeg', '2019-08-29 22:05:48', '2019-08-29 22:05:48'),
(10, 'IPA', 'Cerveza de fermentación alta y calificada como pálida, para diferenciarla de las características sobre las Brown, Stout o Porters. Presentan un color pálido anaranjado similar al ámbar de menor o mayor intensidad y poseen un mayor aporte de lúpulo que proporciona un mayor grado de amargor, aparte de una serie de matices aromáticos y de sabor particular.', '40', '5.00', 3, 'uploads/SsQy31ro69o2SGFgzJxzqBYtcx8stBMM2Lbj2aTA.jpeg', '2019-08-29 22:06:30', '2019-08-29 22:06:30'),
(11, 'Session IPA', 'Cerveza fácil de beber pero sin dejar de lado las características de la IPA, tiene un sabor algo más seco que las Pale Ales, aunque es innegable la gran similitud entre ambas.  Posee un cuerpo sumamente ligero y junto al lúpulo viene el intenso aroma, pero sin el amargor pronunciado ni el alto porcentaje de alcohol.', '50', '5.00', 3, 'uploads/EPORmFBAQ8xeeyEbbPWWBcvkNfgSopHBbvUdQYq0.jpeg', '2019-08-29 22:09:41', '2019-08-29 22:09:41'),
(12, 'Okctoberfest', 'El sabor a malta inicial a menudo sugiere dulzura, pero de acabado moderadamente seco. El complejo y único carácter maltoso a menudo incluye notas a pan y tostado. El amargor procedente del lúpulo es moderado, a pesar de que su sabor sea de bajo a imperceptible. Sin embargo, otorgan a la cerveza el equilibrio suficiente para que no predomine el dulzor de la malta.', '30', '6.00', 3, 'uploads/vNzizggbOYX3WjfhdevX0eaLhEzFguTvkP08KrmK.jpeg', '2019-08-29 22:11:13', '2019-08-29 22:11:13'),
(13, 'Porter', 'Cerveza oscura perteneciente a la familia de las ALE, de moderado bajo aroma de malta tostada, de pan y bizcocho, con un suave olor torrefacto y un tono a chocolate.', '35', '5.00', 2, 'uploads/t7qIsrnV5tBgyDRl4AgN91IQyxW1TGIAmoC5lNee.jpeg', '2019-08-29 22:11:42', '2019-08-29 22:11:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `colors`
--

INSERT INTO `colors` (`id`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Roja', NULL, NULL),
(2, 'Negra', NULL, NULL),
(3, 'Cobriza', NULL, NULL),
(4, 'Rubia', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_16_005940_create_all_tables', 1),
(4, '2019_08_28_002125_add_is_admin_column_to_users_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `beer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `avatar` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `email_verified_at`, `password`, `country`, `city`, `remember_token`, `created_at`, `updated_at`, `beer_id`, `avatar`, `is_admin`) VALUES
(3, 'Agustina', 'Dorado', 'aguswtf@hotmail.com', NULL, '$2y$10$NQg.oKFHUHwN5esfi058u.bY5BPq4oKIS2C5Ec.7Nzx5V8gkBD.cC', 'AR', NULL, NULL, '2019-08-28 02:05:49', '2019-08-28 02:05:49', NULL, 'img_5d65b74d42d6b.jpeg', 0),
(4, 'Agustina', 'Dorado', 'aguswhat@hotmail.com', NULL, '$2y$10$ZcbfbJ1yb4DEvzHVpkLzEO6B8KrTNjg9Iz21VUumRq5REPekhtJFi', 'AR', NULL, NULL, '2019-08-28 02:25:34', '2019-08-28 02:25:34', NULL, 'img_5d65bbeea7708.jpeg', 0),
(5, 'Juanito', 'Pepe', 'juanito@dh.com', NULL, '$2y$10$eTYBQFRKfgc.xtOd0uiu9ev/9IBi8KUDunZm/JtaZqWCecdj473Ca', 'ar', NULL, NULL, '2019-08-29 16:56:17', '2019-08-29 16:56:17', NULL, 'img_5d67d9813ca64.jpeg', 0),
(6, 'Juancito', 'Perez', 'juancito@lacaja.com.ar', NULL, '$2y$10$1IPx1Pg7jHgRJX2Cl4nen.gf4BTr3.OaloiVsrlBwoFgVr6qJHaF6', 'AR', 'Capital Federal', NULL, '2019-08-29 20:40:47', '2019-08-29 20:40:47', NULL, 'img_5d680e1f644ca.jpeg', 0),
(7, 'Agustina', 'Dorado', 'agus.sr@hotmail.com', NULL, '$2y$10$vOqU4b.bd5unsUEWN2oiRO29gIrvDd7VfmQWHVhj7cEyodqgZ5FyW', 'AR', 'Capital Federal', NULL, '2019-08-29 22:01:36', '2019-08-29 22:01:36', NULL, 'img_5d6821105f47a.jpeg', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `beers`
--
ALTER TABLE `beers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beers_color_id_foreign` (`color_id`);

--
-- Indices de la tabla `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_beer_id_foreign` (`beer_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `beers`
--
ALTER TABLE `beers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `beers`
--
ALTER TABLE `beers`
  ADD CONSTRAINT `beers_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_beer_id_foreign` FOREIGN KEY (`beer_id`) REFERENCES `beers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

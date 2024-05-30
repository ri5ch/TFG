-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2024 a las 16:38:06
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
-- Base de datos: `born`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('elmasduro@gmail.com|127.0.0.1', 'i:1;', 1715705498),
('elmasduro@gmail.com|127.0.0.1:timer', 'i:1715705498;', 1715705498);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `IDEvento` int(11) NOT NULL,
  `IDUsuarioOrganizador` bigint(20) UNSIGNED DEFAULT NULL,
  `IDTipoEvento` int(11) DEFAULT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Ubicacion` varchar(255) DEFAULT NULL,
  `Imagen` varchar(255) DEFAULT NULL,
  `Descripcion` text DEFAULT NULL,
  `HoraInicio` time DEFAULT NULL,
  `HoraFin` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`IDEvento`, `IDUsuarioOrganizador`, `IDTipoEvento`, `Nombre`, `Fecha`, `Ubicacion`, `Imagen`, `Descripcion`, `HoraInicio`, `HoraFin`) VALUES
(19, 7, 5, 'Brunch', '2024-07-11', 'Hotel Riu', '1717064146_pexels-photo-376464.jpeg', 'brunch only for members', '12:09:00', '09:17:00'),
(21, 1, 8, 'Airplane Exhibition', '2024-06-11', 'ifema', '1717064273_free-photo-of-gente-luces-noche-festival.jpeg', 'only form vips members', '15:17:00', '18:17:00'),
(22, 1, 6, 'Visit  a Museum', '2024-06-12', 'Madrid', '1717064542_pexels-jose-antonio-gallego-vazquez-1133558-2167395.jpg', 'free', '15:22:00', '17:22:00'),
(23, 1, 3, 'PFC MATCH', '2024-06-02', 'Pepu las Rosas', '1717064885_pexels-riciardus-41257.jpg', 'PFC membbers', '22:27:00', '23:27:00'),
(24, 1, 10, 'Community Safety of Sergis', '2024-07-13', 'Las Musas', '1717065055_main-qimg-0ddb0713d7319867f1c3fcfbe2921014-lq.jpg', 'have to be careful with these type of people', '23:29:00', '23:32:00'),
(25, 1, 2, 'Tomorrowland', '2024-07-27', 'Belgium', '1717065480_pexels-vishnurnair-1105666.jpg', 'Exclusive for Members', '12:37:00', '23:37:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logros`
--

CREATE TABLE `logros` (
  `IDLogro` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Descripcion` text DEFAULT NULL,
  `Puntos` int(11) DEFAULT NULL,
  `Imagen` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `logros`
--

INSERT INTO `logros` (`IDLogro`, `Nombre`, `Descripcion`, `Puntos`, `Imagen`) VALUES
(1, 'Bronce Inicial', 'For your first attendance at any event', 1, 'bronce.jpg'),
(2, 'Plata Frecuente', 'For attending 5 events in total', 5, 'plata.jpg'),
(3, 'Oro Asiduo', 'For attending 10 events in total', 10, 'oro.jpg'),
(4, 'Platino Devoto', 'For attending 20 events in total', 20, 'platino.jpg'),
(5, 'Diamante Incansable', 'For attending 50 events in total', 50, 'diamante.jpg'),
(6, 'Maestro de Eventos', 'For attending 100 events in total', 100, 'maestro.jpg'),
(7, 'Leyenda de la Participación', 'For attending 200 events in total', 200, 'leyenda.jpg'),
(8, 'Ícono de la Asistencia', 'Por asistir a 500 eventos en total', 500, 'icono.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logrosusuarios`
--

CREATE TABLE `logrosusuarios` (
  `IDLogroUsuario` int(11) NOT NULL,
  `IDUsuario` bigint(20) UNSIGNED DEFAULT NULL,
  `IDLogro` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participacioneventos`
--

CREATE TABLE `participacioneventos` (
  `IDParticipacion` int(11) NOT NULL,
  `IDUsuario` bigint(20) UNSIGNED DEFAULT NULL,
  `IDEvento` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('hEnIukD3V8in5a7BYsAGZXjMO7zmNoSNN4Pyot46', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRmhNeUdGWFRVRzdkQUI0MGtabEh0Q25JTG9YR3VrTjdBaTJrN0l3ZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi91c2Vycy8xL2VkaXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1717071085),
('MHJe1TSsj0m2HRHNwCgGkJ9XlpU3jLRInxE0WFKP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicm9QdFlMaDRBQXBHNVZkNHhvdFl4eVFuWmYxcVREdUg0QUttTnpOciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1717079708),
('TZRXwCwtGiezakWHX8IC0Y9yoCP4eZud79XyyG9U', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOGpoUDVPTEhZekdJOWFqUWlSeG9ybmtRMGZ5aXZIQmpGdmo0RkpVMiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1717065711);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoevento`
--

CREATE TABLE `tipoevento` (
  `IDTipoEvento` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipoevento`
--

INSERT INTO `tipoevento` (`IDTipoEvento`, `Nombre`) VALUES
(1, 'Conciertos'),
(2, 'Ferias/Festivales'),
(3, 'Deportes'),
(4, 'Cine'),
(5, 'Gastronomía'),
(6, 'Cultura/Arte'),
(7, 'Bienestar'),
(8, 'Educación'),
(9, 'Aventura'),
(10, 'Comunitarios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rol` varchar(50) NOT NULL DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `rol`) VALUES
(1, 'richard perez basora', 'ri5ch@hotmail.com', NULL, '$2y$12$d.9M75i0tIzd8qUf/c.94.NMb6uBeLI7jxfxLS.4ww/pzEU7TcDqe', NULL, '2024-03-26 12:07:21', '2024-03-26 12:07:21', 'admin'),
(2, 'dani', 'elmasduro@gmail.com', NULL, '$2y$12$FVn92meoEMCyQ9NgrWe.9O9z061Aq.3OPnP6498eU/UY2nx.0bx4q', NULL, '2024-03-26 17:39:57', '2024-03-26 17:39:57', 'usuario'),
(3, 'Born2Do', 'zebrawka@gmail.com', NULL, '$2y$12$ZKR6Ao/LGpqav8fiXUgj7uvf6BWJKJ5saWWyr6ko86HkbQXufLXBi', NULL, '2024-05-14 14:51:05', '2024-05-14 14:51:05', 'usuario'),
(7, 'Usuario', 'usuario@gmail.com', NULL, '$2y$12$aJ8aKsulYu4IKt19mYipn.ymngE/Kfv5woMEG6Whsv2Alz2SrOLtm', NULL, '2024-05-25 09:14:04', '2024-05-25 09:14:04', 'usuario'),
(9, 'roberto', 'usuario1@gmail.com', NULL, '$2y$12$V.ftgJDTIUxq1Sp92i4SSOvycNH7U8TBOxkItcbsPXeLE8MpXtS0O', NULL, '2024-05-28 16:15:45', '2024-05-28 16:15:45', 'usuario'),
(11, 'Born2Do', 'danidurito@gmail.com', NULL, '$2y$12$KXgbdChWdmiZsC6zqjvUHu0ES0j4vamjf7VN.Mht4GMCOyO97CqLC', NULL, '2024-05-28 16:35:39', '2024-05-28 16:35:39', 'usuario'),
(12, 'chenlu', 'chenlu@gmail.com', NULL, '$2y$12$YEj5Kl6XNbydztO8Q0HW7uuE90MMIdUob61fFy.0i5qAoOtlKqpqG', NULL, '2024-05-30 07:19:44', '2024-05-30 07:19:44', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`IDEvento`),
  ADD KEY `IDUsuarioOrganizador` (`IDUsuarioOrganizador`),
  ADD KEY `IDTipoEvento` (`IDTipoEvento`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `logros`
--
ALTER TABLE `logros`
  ADD PRIMARY KEY (`IDLogro`);

--
-- Indices de la tabla `logrosusuarios`
--
ALTER TABLE `logrosusuarios`
  ADD PRIMARY KEY (`IDLogroUsuario`),
  ADD KEY `IDUsuario` (`IDUsuario`),
  ADD KEY `IDLogro` (`IDLogro`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `participacioneventos`
--
ALTER TABLE `participacioneventos`
  ADD PRIMARY KEY (`IDParticipacion`),
  ADD KEY `IDUsuario` (`IDUsuario`),
  ADD KEY `IDEvento` (`IDEvento`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `tipoevento`
--
ALTER TABLE `tipoevento`
  ADD PRIMARY KEY (`IDTipoEvento`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `IDEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `logros`
--
ALTER TABLE `logros`
  MODIFY `IDLogro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `logrosusuarios`
--
ALTER TABLE `logrosusuarios`
  MODIFY `IDLogroUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `participacioneventos`
--
ALTER TABLE `participacioneventos`
  MODIFY `IDParticipacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipoevento`
--
ALTER TABLE `tipoevento`
  MODIFY `IDTipoEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`IDUsuarioOrganizador`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`IDTipoEvento`) REFERENCES `tipoevento` (`IDTipoEvento`);

--
-- Filtros para la tabla `logrosusuarios`
--
ALTER TABLE `logrosusuarios`
  ADD CONSTRAINT `logrosusuarios_ibfk_1` FOREIGN KEY (`IDUsuario`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `logrosusuarios_ibfk_2` FOREIGN KEY (`IDLogro`) REFERENCES `logros` (`IDLogro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `participacioneventos`
--
ALTER TABLE `participacioneventos`
  ADD CONSTRAINT `participacioneventos_ibfk_1` FOREIGN KEY (`IDUsuario`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `participacioneventos_ibfk_2` FOREIGN KEY (`IDEvento`) REFERENCES `eventos` (`IDEvento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

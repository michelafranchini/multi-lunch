-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 01, 2021 at 03:14 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multi_lunch`
--

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `n` smallint(6) NOT NULL,
  `date` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `n`, `date`, `start`, `end`, `created_at`, `updated_at`) VALUES
(1, 2, '2021-10-06', '14:00:00', '15:00:00', '2021-09-30 10:46:58', '2021-09-30 10:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_09_20_142121_create_restaurants_table', 2),
(5, '2021_09_20_143410_create_restaurant_user_table', 3),
(12, '2021_09_30_123914_create_configs_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `city`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Ristorante Cocchi', 'Parma', 'Viale Antonio Gramsci, 16', '2021-09-21 05:33:25', '2021-09-21 05:33:25'),
(2, 'Trattoria Corrieri', 'Parma', 'Strada Conservatorio, 1', '2021-09-21 05:45:18', '2021-09-21 05:45:18'),
(3, 'Ristorante La Filoma', 'Parma', 'Borgo XX Marzo, 15', '2021-09-21 05:46:13', '2021-09-21 05:46:13'),
(4, 'Gallo d\'Oro', 'Parma', 'Borgo della Salina, 3', '2021-09-21 05:50:55', '2021-09-21 05:50:55'),
(5, 'Porfido Collecchio', 'Collecchio', 'Via Spezia, 1/B', '2021-09-21 05:51:11', '2021-09-21 05:51:11'),
(6, 'Bistrot Il Cerchio', 'Collecchio', 'Via Oreste Grassi, 21', '2021-09-21 05:51:56', '2021-09-21 05:51:56'),
(7, 'Il Crociato', 'Ponte Taro', 'Via Emilia, 4', '2021-09-21 05:57:50', '2021-09-21 05:57:50'),
(8, 'I Monelli', 'Ponte Taro', 'Via Emilia, 11', '2021-09-21 05:58:05', '2021-09-21 05:58:05'),
(9, 'La Barchetta', 'Fontevivo', 'Via Emilia, 75', '2021-09-21 06:30:25', '2021-09-21 06:30:25'),
(10, 'Ristorante 12 Monaci', 'Fontevivo', 'Via Roma, 1', '2021-09-21 11:04:54', '2021-09-21 11:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_user`
--

CREATE TABLE `restaurant_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant_user`
--

INSERT INTO `restaurant_user` (`id`, `restaurant_id`, `user_id`) VALUES
(1, 4, 2),
(2, 5, 2),
(3, 6, 3),
(4, 7, 3),
(5, 8, 3),
(6, 9, 3),
(7, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_permission` tinyint(4) NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_permission`, `created_at`, `updated_at`) VALUES
(1, 'Michela', 'michela.franchini@outlook.it', NULL, '$2y$10$Qr4MG7GY7G.XlpxhFRu3Uuh9.hj4xm9KOpcaYnngG6p4GMVoowaEi', '5pAGSYudmHn28mxFMHN8eYhIVUN9sRsTid7jh7KPj72syleuHjUdMpTEi25R', 1, '2021-09-20 09:47:36', '2021-09-20 09:47:36'),
(2, 'Giada', 'giada@email.com', NULL, '$2y$10$Bmy1aZbCUPkCirMOZkrkjO88zFABJIcTPO3PJpYB5zHjDrFyszYVG', NULL, 2, '2021-09-20 09:48:21', '2021-09-20 09:48:21'),
(3, 'Roberto', 'rob@gmail.com', NULL, '$2y$10$ri/9kMkOJHE4CBIjMfiM8e1v.4AyX6rqomZt2X7sAvi.iM.7yjsqq', NULL, 2, '2021-09-20 11:47:41', '2021-09-20 11:47:41'),
(4, 'Gianni', 'gianni@email.com', NULL, '$2y$10$QiIECNLvaSLMonx.d9feLezdMV927dXRLJw5QBasWUqEM5B5vTB7m', NULL, 2, '2021-09-21 11:28:37', '2021-09-21 11:28:37'),
(5, 'Federico', 'federico@email.com', NULL, '$2y$10$w3P9qgoKGIwIkdSykjxj5OJ9n12waIyYP3Lhr28YfsmuDNBAKW/QK', NULL, 2, '2021-09-21 11:30:41', '2021-09-21 11:30:41'),
(6, 'Antonio', 'antonio@email.com', NULL, '$2y$10$8j7mKwxl5YwAhw6xuGzECe1A9iSjQVOmF3gxBMUGTmaDC6xOpEhJS', NULL, 2, '2021-09-21 11:32:46', '2021-09-21 11:32:46'),
(7, 'Stefano', 'stefano@email.com', NULL, '$2y$10$JWCWsbERn1k/8aWmN.yyjuhZfMdRNNfadX6RL36X7QH4TUOhv5Tum', NULL, 2, '2021-09-21 11:33:39', '2021-09-21 11:33:39'),
(8, 'Patrizio', 'patrizio@email.com', NULL, '$2y$10$RapitY3TvWfQGEvWunvOtuNmHmD/H7cVWwsapTWPIkT3VGJmTnqe.', NULL, 2, '2021-09-23 11:23:37', '2021-09-23 11:23:37'),
(9, 'Stella', 'stella@email.com', NULL, '$2y$10$M50ZYe6vbib6ONNdpj.pq.IqujobDdN9RusGg0XFfXNeowue7bcla', NULL, 2, '2021-09-23 11:23:53', '2021-09-23 11:23:53'),
(10, 'Francesca', 'francesca@email.com', NULL, '$2y$10$9T86T3YmTCQLzZNNgEQ.nOHLgfm2bnfhaPIBo7qnDUro76n58nKQW', NULL, 2, '2021-09-23 11:24:11', '2021-09-23 11:24:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_user`
--
ALTER TABLE `restaurant_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_user_restaurant_id_foreign` (`restaurant_id`),
  ADD KEY `restaurant_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `restaurant_user`
--
ALTER TABLE `restaurant_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `restaurant_user`
--
ALTER TABLE `restaurant_user`
  ADD CONSTRAINT `restaurant_user_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `restaurant_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

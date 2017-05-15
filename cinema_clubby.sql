-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 14, 2017 at 07:22 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinema_clubby`
--

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
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(6, '2016_06_01_000004_create_oauth_clients_table', 2),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('2e027969ea32285c23f463554cac777e3a1065fcd724b4dd5a711777af2098da697220b78feaf5e5', 1, 2, NULL, '[]', 0, '2017-05-07 04:03:25', '2017-05-07 04:03:25', '2018-05-07 09:33:25'),
('60d0c669832094aab755b02c529c99f61305e1457a61966d639b8be662c11df6d071aa7069cf1c59', 1, 2, NULL, '[]', 0, '2017-05-07 04:04:57', '2017-05-07 04:04:57', '2018-05-07 09:34:57'),
('c809628af767adf0bf554c050fa8aecbf6824ea91067ab0704a12d3fae11484b13a6526b79b1438d', 1, 2, NULL, '[]', 0, '2017-05-14 02:21:59', '2017-05-14 02:21:59', '2018-05-14 07:51:59');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'U3dOZRicHN19Kkn3bf1E79yNolATbHSN6Rm9JAi2', 'http://localhost', 1, 0, 0, '2017-05-07 03:47:16', '2017-05-07 03:47:16'),
(2, NULL, 'Laravel Password Grant Client', '66ZB6FfUCR9wwk03OYVfK10HsqKqDGjLYVusFpsQ', 'http://localhost', 0, 1, 0, '2017-05-07 03:47:16', '2017-05-07 03:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-05-07 03:47:16', '2017-05-07 03:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('940131ac433bc43677625f0740cf36cdf206bf64932545a56f9827bdba8b3789b39bc7d34e80afb2', 'c809628af767adf0bf554c050fa8aecbf6824ea91067ab0704a12d3fae11484b13a6526b79b1438d', 0, '2018-05-14 07:51:59'),
('d9148d490a72c8b0c8088efe259e281246e618c12843160d8f7133d54a41fd7edcdac4a4f66141a3', '60d0c669832094aab755b02c529c99f61305e1457a61966d639b8be662c11df6d071aa7069cf1c59', 0, '2018-05-07 09:34:57'),
('e9a7da99775e4e8c615a12391426a1a8c7d712d44c7c937544f586f6eb6fbe979c88c8d5987af48b', '2e027969ea32285c23f463554cac777e3a1065fcd724b4dd5a711777af2098da697220b78feaf5e5', 0, '2018-05-07 09:33:25');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Paul', 'paul@gmail.com', '$2y$10$bPTk37jnddOw2.XP.50C7O7.Vcpc1MbWcL7Y0UJNQ/JxDJEdFXfB6', '0eYShey39q2O2dlM6ZlJqtGH9r8IFgT0PM0qOEwvO8NjsoaO6g5FbNZRpuDh', '2017-05-07 02:29:24', '2017-05-07 02:29:24'),
(2, 'Dr. Ferne Collier DVM', 'effie54@example.net', '$2y$10$9ZOLeMaWHQ3pQ.OGxeDtiu4m0i36HPEJTU5Lw7EDEX/mg78zYc59.', 'j6AgPaCnlw', '2017-05-07 02:40:31', '2017-05-07 02:40:31'),
(3, 'Wilfrid Crooks', 'melisa01@example.org', '$2y$10$9ZOLeMaWHQ3pQ.OGxeDtiu4m0i36HPEJTU5Lw7EDEX/mg78zYc59.', 'dofNcxZMgR', '2017-05-07 02:40:31', '2017-05-07 02:40:31'),
(4, 'Wilhelm Kreiger', 'jenifer88@example.org', '$2y$10$9ZOLeMaWHQ3pQ.OGxeDtiu4m0i36HPEJTU5Lw7EDEX/mg78zYc59.', 'FAcUcuMwyG', '2017-05-07 02:40:31', '2017-05-07 02:40:31'),
(5, 'Griffin Thompson', 'vidal47@example.net', '$2y$10$9ZOLeMaWHQ3pQ.OGxeDtiu4m0i36HPEJTU5Lw7EDEX/mg78zYc59.', 'g1zN6mGl2s', '2017-05-07 02:40:31', '2017-05-07 02:40:31'),
(6, 'Beatrice Vandervort', 'king.josephine@example.com', '$2y$10$9ZOLeMaWHQ3pQ.OGxeDtiu4m0i36HPEJTU5Lw7EDEX/mg78zYc59.', 'SoFxva49jQ', '2017-05-07 02:40:31', '2017-05-07 02:40:31'),
(7, 'Prof. Tia Emard', 'tnitzsche@example.com', '$2y$10$9ZOLeMaWHQ3pQ.OGxeDtiu4m0i36HPEJTU5Lw7EDEX/mg78zYc59.', 'aR0X7FC22H', '2017-05-07 02:40:31', '2017-05-07 02:40:31'),
(8, 'Abbigail O\'Conner', 'juston.jast@example.com', '$2y$10$9ZOLeMaWHQ3pQ.OGxeDtiu4m0i36HPEJTU5Lw7EDEX/mg78zYc59.', 'a1218Dtg98', '2017-05-07 02:40:31', '2017-05-07 02:40:31'),
(9, 'Kane Larkin', 'fbahringer@example.org', '$2y$10$9ZOLeMaWHQ3pQ.OGxeDtiu4m0i36HPEJTU5Lw7EDEX/mg78zYc59.', 'epGjQTC2L7', '2017-05-07 02:40:31', '2017-05-07 02:40:31'),
(10, 'Ivy Little', 'leland74@example.net', '$2y$10$9ZOLeMaWHQ3pQ.OGxeDtiu4m0i36HPEJTU5Lw7EDEX/mg78zYc59.', 'WU79fLuGYY', '2017-05-07 02:40:31', '2017-05-07 02:40:31'),
(11, 'Patricia Schultz DDS', 'lesley.kunde@example.net', '$2y$10$9ZOLeMaWHQ3pQ.OGxeDtiu4m0i36HPEJTU5Lw7EDEX/mg78zYc59.', 'goyvSd43su', '2017-05-07 02:40:31', '2017-05-07 02:40:31'),
(12, 'Rebeka Wiza', 'keebler.hadley@example.com', '$2y$10$3LOG5ZuA7YxJGtGS10MrU.eu4t/6hEDElt5vBL/50ALdfRMmwMEs.', 'rZHH0g1HrQ', '2017-05-07 02:41:43', '2017-05-07 02:41:43'),
(13, 'Justyn Jacobs', 'johnpaul.larkin@example.com', '$2y$10$3LOG5ZuA7YxJGtGS10MrU.eu4t/6hEDElt5vBL/50ALdfRMmwMEs.', 'wT26WMmuwj', '2017-05-07 02:41:43', '2017-05-07 02:41:43'),
(14, 'Miss Lea Christiansen III', 'vmetz@example.org', '$2y$10$3LOG5ZuA7YxJGtGS10MrU.eu4t/6hEDElt5vBL/50ALdfRMmwMEs.', 'i5ZSO7Grda', '2017-05-07 02:41:43', '2017-05-07 02:41:43'),
(15, 'Kenny Schaden', 'ansley11@example.org', '$2y$10$3LOG5ZuA7YxJGtGS10MrU.eu4t/6hEDElt5vBL/50ALdfRMmwMEs.', 'e8HieQGrHB', '2017-05-07 02:41:43', '2017-05-07 02:41:43'),
(16, 'Brayan Lueilwitz', 'mona.marks@example.net', '$2y$10$3LOG5ZuA7YxJGtGS10MrU.eu4t/6hEDElt5vBL/50ALdfRMmwMEs.', '9O7CRleXiG', '2017-05-07 02:41:43', '2017-05-07 02:41:43'),
(17, 'Adrien Kunde', 'madilyn.macejkovic@example.net', '$2y$10$3LOG5ZuA7YxJGtGS10MrU.eu4t/6hEDElt5vBL/50ALdfRMmwMEs.', 'NksVejPDoK', '2017-05-07 02:41:43', '2017-05-07 02:41:43'),
(18, 'Jewell Nicolas PhD', 'royal04@example.net', '$2y$10$3LOG5ZuA7YxJGtGS10MrU.eu4t/6hEDElt5vBL/50ALdfRMmwMEs.', 'FBUwFrIUer', '2017-05-07 02:41:43', '2017-05-07 02:41:43'),
(19, 'Betsy Prosacco', 'maufderhar@example.org', '$2y$10$3LOG5ZuA7YxJGtGS10MrU.eu4t/6hEDElt5vBL/50ALdfRMmwMEs.', 'd2FXgtW81S', '2017-05-07 02:41:43', '2017-05-07 02:41:43'),
(20, 'Mr. Donavon Reinger', 'oma.zemlak@example.net', '$2y$10$3LOG5ZuA7YxJGtGS10MrU.eu4t/6hEDElt5vBL/50ALdfRMmwMEs.', '6j77atcoYG', '2017-05-07 02:41:43', '2017-05-07 02:41:43'),
(21, 'Dr. Brycen Weber', 'anjali.boyer@example.net', '$2y$10$3LOG5ZuA7YxJGtGS10MrU.eu4t/6hEDElt5vBL/50ALdfRMmwMEs.', 'RaLI9Jg3cE', '2017-05-07 02:41:43', '2017-05-07 02:41:43'),
(22, 'sssssssss', 'udaya@gmail.com', '$2y$10$.1Dak0.3ELJRwXx3dPL9DeTF9PzfatTS4pY/wllRat/RyJPjz5HiO', NULL, '2017-05-14 05:35:03', '2017-05-14 05:35:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

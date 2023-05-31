-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2022 at 02:17 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `festival`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `theme_layout_id` int(255) NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `theme_layout_id`, `company_name`, `address`, `created_at`, `updated_at`) VALUES
(1, 1, 'TechFiest', 'JK Chok', '2022-04-28 07:29:43', '2022-05-04 06:14:54'),
(2, 1, 'DigiteloderBook', 'jk chok', '2022-04-28 07:37:36', '2022-04-28 07:37:36'),
(3, 1, 'jay', 'puskardham', '2022-04-30 00:56:05', '2022-05-04 06:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `festivals`
--

CREATE TABLE `festivals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(255) NOT NULL,
  `theme_layout_id` int(225) NOT NULL,
  `festival` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `festivals`
--

INSERT INTO `festivals` (`id`, `company_id`, `theme_layout_id`, `festival`, `image`, `slug`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'holi', '1290a648e96c3e5bb6cc237b5839f771017ecfd8.jpg', 'holi', '2022-04-15', NULL, '2022-05-04 06:16:12'),
(2, 1, 3, 'diwali', '612fba0201baeb3d4454528ad767721be3b40761.jpg', 'diwali', '2022-04-15', NULL, '2022-05-04 06:16:24'),
(4, 1, 4, 'goodfriday', 'af01088dd5bd33f5c421a05030b49773748fb231.jpg', 'goodfriday', '2022-04-07', '2022-04-28 06:03:30', '2022-05-04 06:17:11'),
(6, 1, 1, 'ramnavmi', '03583982a8a4c8f019a221b5b374ec12cc79a183.jpg', 'ramnavmi', '2022-04-23', '2022-04-28 07:46:10', '2022-05-04 06:16:56'),
(7, 1, 3, 'hanuman jayanti', 'a569c36c157f432b60aa5317adf718286e3a4a65.jpg', 'hanuman-jayanti', '2022-04-10', '2022-04-28 07:53:01', '2022-05-04 06:16:35'),
(8, 1, 1, 'dhuleti', 'fd413c6f72654793616c243ee57437a901b40a54.jpg', 'dhuleti', '2022-04-12', '2022-04-28 07:55:08', '2022-05-04 06:16:46'),
(9, 1, 2, 'makarsankranti', 'a18438b1c5c62cb17db42481e211088c02de6db8.jpg', 'makarsankranti', '2023-01-14', '2022-04-28 07:56:46', '2022-05-04 06:15:58'),
(11, 1, 2, 'parsuram jayanti', '7a2cb2e80ad094409a7d1e291b971e585c7824d9.jpg', 'parsuram-jayanti', '2022-05-03', '2022-05-03 00:36:59', '2022-05-04 06:15:46'),
(12, 1, 3, 'abcd', 'f5f04131a2b230e1704044b4ba21a641e07dd5b6.jpg', 'aa', '2022-05-17', '2022-05-03 01:22:28', '2022-05-04 06:15:35'),
(13, 1, 1, 'mahasivratri', 'e5ff354a212e84e4a522c370fe7104358526889f.jpg', 'mahasivratri', '2022-05-04', '2022-05-03 03:13:26', '2022-05-04 06:15:24');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `festival_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `festival_id`, `name`, `number`, `image`, `address`, `created_at`, `updated_at`) VALUES
(8, '1', 'jay', 1234567890, 'a146ea340b702fcc99b9aab97bac78231f834249.png', 'g', '2022-05-02 00:24:57', '2022-05-02 00:24:57'),
(44, '7', 'kano', 1010101010, '7724cc52ce979add33405960d4fcc69c15c3933f.png', 'a', '2022-05-03 05:37:07', '2022-05-03 05:37:07'),
(51, '13', 'jack', 1231231233, '7ec6e20c2242fcad72e4fa676c02bf26b0dadd2f.png', 'as', '2022-05-03 06:03:17', '2022-05-03 06:03:17'),
(144, '2', 'nihir', 123456, '727c552065a7b94288d4768621e252ba8c91b061.png', 'd', '2022-05-04 01:56:09', '2022-05-04 01:56:09'),
(147, '2', 'dhaval', 112344, 'a09d736161896d2d8b7095243ef303c1686f1e07.png', 'wq', '2022-05-04 03:40:20', '2022-05-04 03:40:20'),
(162, '4', 'darshan', 1111122, '5b0e8b3510a1602137e5ebabd5b6852a73f434f8.png', 'aa', '2022-05-04 04:32:34', '2022-05-04 04:32:34'),
(169, '4', 'darshan', 123456, '60b97fd55e45540b5a3e627a11ec1b171eac3bd4.png', 'a', '2022-05-04 06:18:34', '2022-05-04 06:18:34'),
(170, '4', 'jay', 11111, '63102789fd7c2ec6b7dcc2299d0e856f5ce8b1df.png', 'qa', '2022-05-04 06:34:12', '2022-05-04 06:34:12');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_15_141349_create_festivals_table', 1),
(6, '2022_04_28_100047_create_holidays_table', 1),
(7, '2022_04_28_115339_create_companies_table', 2),
(8, '2022_04_28_133056_create_holidays_table', 3),
(9, '2022_04_29_050834_create_holidays_table', 4),
(10, '2022_04_30_053304_create_theme_layouts_table', 5);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `theme_layouts`
--

CREATE TABLE `theme_layouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `layout` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theme_layouts`
--

INSERT INTO `theme_layouts` (`id`, `theme`, `text`, `number`, `layout`, `created_at`, `updated_at`) VALUES
(1, 'top-left', '25, 0, 100, 1000', '25,0,800,1000', '30,30,0,0,170,170,170,170,170', NULL, NULL),
(2, 'top-center', '25, 0, 100, 1000', '25,0,800,1000', '400,30,0,0,170,170,170,170,170\n', NULL, NULL),
(3, 'top-right', '25, 0, 100, 1000', '25,0,800,1000', '800,30,0,0,170,170,170,170', NULL, NULL),
(4, 't-p', '25, 0, 100, 1000', '25,0,800,1000', '845,84,0,0,470,470,470,470', NULL, NULL);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'jay', 'jay@gmail.com', NULL, '$2y$10$QIIamnPF0lMYuypIZK3V7eBEb2QHDlMx0UoN6VIrhIQJoB34hEs0y', NULL, '2022-04-28 04:55:02', '2022-04-28 04:55:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `festivals`
--
ALTER TABLE `festivals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `theme_layouts`
--
ALTER TABLE `theme_layouts`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `festivals`
--
ALTER TABLE `festivals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `theme_layouts`
--
ALTER TABLE `theme_layouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

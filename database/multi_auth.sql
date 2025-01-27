-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2025 at 08:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multi_auth`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'md admin', 'admin@gmail.com', NULL, '$2y$10$a3MDoBUE.oUhfU9zoiKzh.ON4gHpasdwy9X1OuY4mPop8MwFpJbNu', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agencyName` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `rln` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `agencyName`, `firstname`, `lastname`, `email`, `phone`, `address`, `rln`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shamim Hossain', 'Shamim', 'Hossen', 'swiftoverseastravels@gmail.com', 1300361185, 'HM Plaza, Lift-12, Room no-07, Uttara-03, Dhaka-1230', 'BFH32165', NULL, '2025-01-26 12:21:45', '2025-01-26 12:21:45'),
(2, 'Ethical International', 'Jasim', 'Uddin', 'ethical@gmail.com', 1762154875, 'Uttara, Dhaka', 'N/A', NULL, '2025-01-26 12:24:51', '2025-01-26 12:24:51'),
(4, 'Swift Overseas Tours & Travels', 'Ashadul', 'Alam', 'swiftoverseastravels1@gmail.com', 1457854269, 'HM Plaza, Lift-12, Room no-07, Uttara-03, Dhaka-1230', 'N/A', NULL, '2025-01-26 12:26:14', '2025-01-26 12:26:14'),
(5, 'Al-Amin Air International', 'Al', 'Amin Khan', 'alamin@gmail.com', 1245789632, 'Dokkhin khan, Uttara, Dhaka', 'N/A', NULL, '2025-01-26 12:44:08', '2025-01-26 12:44:08'),
(6, 'Atik Air International', 'Atik', 'Islam', 'atik@gmail.com', 1365248565, 'Uttara, Dhaka', 'N/A', NULL, '2025-01-26 12:47:24', '2025-01-26 12:47:24'),
(7, 'Sakib Overseas Tours & Travels', 'Skaib', 'Khan', 'sakib@gmail.com', 1478523695, 'Uttara, Dhaka', 'N/A', NULL, '2025-01-26 12:51:24', '2025-01-26 12:51:24'),
(8, 'Shahed Air Internatinal', 'Shahed', 'Parves', 'shahed@gmail.com', 1547854236, 'Sirajgonj, Rajshahi', 'N/A', NULL, '2025-01-26 12:55:53', '2025-01-26 12:55:53'),
(9, 'Manik Overseas', 'Manik', 'Mia', 'manik@gmail.com', 1323748592, 'Sylhet, Dhaka, Bangladesh', 'N/A', NULL, '2025-01-26 12:56:57', '2025-01-26 12:56:57'),
(10, 'Rahim Overseas Travels', 'Rahim', 'Badsha', 'rahim@gmail.com', 1928374657, 'Gazipur, Dhaka', 'N/A', NULL, '2025-01-26 12:57:32', '2025-01-26 12:57:32'),
(11, 'Sabbir Enterprice Tours & Travels', 'Sabbir', 'Hossain', 'sabbir@gmail.com', 1827364536, 'Kaliakair, Gazipur, Dhaka', 'N/A', NULL, '2025-01-26 12:58:11', '2025-01-26 12:58:11'),
(12, 'Monir Overseas', 'Monir', 'Mia', 'monir@gmail.com', 1892837483, 'Gulshan, Dhaka-1220', 'N/A', NULL, '2025-01-26 12:59:13', '2025-01-26 12:59:13'),
(13, 'Mahim Air International', 'Mahim', 'Ali', 'mahim@gmail.com', 1324857689, 'Kaliakair, Gazipur, Dhaka', 'N/A', NULL, '2025-01-26 13:03:41', '2025-01-26 13:03:41'),
(14, 'Mokbol Overseas', 'Mokbol', 'Alam', 'mokbol@gmail.com', 1928374658, 'Uttara, Dhaka', 'BFH32165', NULL, '2025-01-26 13:12:42', '2025-01-26 13:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(6, '2025_01_24_152155_create_admins_table', 2),
(9, '2025_01_26_172246_create_agents_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user1', 'user1@gmail.com', NULL, '$2y$10$a3MDoBUE.oUhfU9zoiKzh.ON4gHpasdwy9X1OuY4mPop8MwFpJbNu', NULL, '2025-01-24 09:03:15', '2025-01-24 09:03:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `agents_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

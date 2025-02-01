-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2025 at 09:02 PM
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
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `senderType` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `receiverType` int(11) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'md admin', 'admin@gmail.com', NULL, '$2y$10$a3MDoBUE.oUhfU9zoiKzh.ON4gHpasdwy9X1OuY4mPop8MwFpJbNu', NULL, NULL, NULL),
(2, 'Shamim Hossain', 'samim@gamil.com', NULL, '$2y$10$a3MDoBUE.oUhfU9zoiKzh.ON4gHpasdwy9X1OuY4mPop8MwFpJbNu', NULL, NULL, NULL),
(3, 'Sabbir Hossain', 'sabbir@gamil.com', NULL, '$2y$10$a3MDoBUE.oUhfU9zoiKzh.ON4gHpasdwy9X1OuY4mPop8MwFpJbNu', NULL, NULL, NULL);

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
(1, 'Shamim Air International Tours & Travels', 'Shamim', 'Hossen', 'swiftoverseastravels@gmail.com', 1300361185, 'HM Plaza, Lift-12, Room no-07, Uttara-03, Dhaka-1230', 'BFH32165', NULL, '2025-01-26 12:21:45', '2025-01-29 00:53:55'),
(2, 'Ethical International', 'Jasim', 'Uddin', 'ethical@gmail.com', 1762154875, 'Uttara, Dhaka', 'N/A', NULL, '2025-01-26 12:24:51', '2025-01-26 12:24:51'),
(4, 'Swift Overseas Tours & Travels', 'Ashadul', 'Alam', 'swiftoverseastravels1@gmail.com', 1457854269, 'HM Plaza, Lift-12, Room no-07, Uttara-03, Dhaka-1230', 'N/A', NULL, '2025-01-26 12:26:14', '2025-01-26 12:26:14'),
(5, 'Al-Amin Air International', 'Al', 'Amin Khan', 'alamin@gmail.com', 1245789632, 'Dokkhin khan, Uttara, Dhaka', 'N/A', NULL, '2025-01-26 12:44:08', '2025-01-26 12:44:08'),
(6, 'Atik Air International', 'Atik', 'Islam', 'atik@gmail.com', 1365248565, 'Uttara, Dhaka', 'RML5698', NULL, '2025-01-26 12:47:24', '2025-01-28 09:52:17'),
(7, 'Sakib Overseas Tours & Travels', 'Skaib', 'Khan', 'sakib@gmail.com', 1478523695, 'Uttara, Dhaka', 'N/A', NULL, '2025-01-26 12:51:24', '2025-01-26 12:51:24'),
(8, 'Shahed Air Internatinal', 'Shahed', 'Parves', 'shahed@gmail.com', 1547854236, 'Sirajgonj, Rajshahi', 'N/A', NULL, '2025-01-26 12:55:53', '2025-01-26 12:55:53'),
(9, 'Manik Overseas', 'Manik', 'Mia', 'manik@gmail.com', 1323748592, 'Sylhet, Dhaka, Bangladesh', 'N/A', NULL, '2025-01-26 12:56:57', '2025-01-26 12:56:57'),
(10, 'Rahim Overseas Travels', 'Rahim', 'Badsha', 'rahim@gmail.com', 1928374657, 'Gazipur, Dhaka', 'N/A', NULL, '2025-01-26 12:57:32', '2025-01-26 12:57:32'),
(11, 'Sabbir Enterprice Tours & Travels', 'Sabbir', 'Hossain', 'sabbir@gmail.com', 1827364536, 'Kaliakair, Gazipur, Dhaka', 'N/A', NULL, '2025-01-26 12:58:11', '2025-01-26 12:58:11'),
(12, 'Monir Overseas', 'Monir', 'Mia', 'monir@gmail.com', 1892837483, 'Gulshan, Dhaka-1220', 'N/A', NULL, '2025-01-26 12:59:13', '2025-01-26 12:59:13'),
(13, 'Mahim Air International', 'Mahim', 'Ali', 'mahim@gmail.com', 1324857689, 'Kaliakair, Gazipur, Dhaka', 'N/A', NULL, '2025-01-26 13:03:41', '2025-01-26 13:03:41'),
(14, 'Mokbol Overseas', 'Mokbol', 'Alam', 'mokbol@gmail.com', 1928374658, 'Uttara, Dhaka', 'BFH32165', NULL, '2025-01-26 13:12:42', '2025-01-26 13:12:42'),
(15, 'Ekra Overseas Tours & Travels', 'Imamul', 'Hasan Ekra', 'ekra@gmail.com', 1547854652, 'Islampur, Jamalpur', 'RM548795', NULL, '2025-01-30 00:37:20', '2025-01-30 00:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `genderId` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passportNum` varchar(255) NOT NULL,
  `countryCode` varchar(255) NOT NULL,
  `passportAuthority` varchar(255) NOT NULL,
  `nidNumm` varchar(255) NOT NULL,
  `plaseOfBirth` varchar(255) NOT NULL,
  `passportIssueDateStart` varchar(255) NOT NULL,
  `passportIssueDateEnd` varchar(255) NOT NULL,
  `fatherName` varchar(255) DEFAULT NULL,
  `motherName` varchar(255) DEFAULT NULL,
  `spouseName` varchar(255) DEFAULT NULL,
  `s_dob` varchar(255) DEFAULT NULL,
  `s_address` varchar(255) DEFAULT NULL,
  `emgName` varchar(255) NOT NULL,
  `emgRelation` varchar(255) NOT NULL,
  `emgAddress` varchar(255) NOT NULL,
  `emgPhone` varchar(255) NOT NULL,
  `referid` int(11) NOT NULL,
  `countructAmount` int(11) NOT NULL,
  `advance` int(11) NOT NULL,
  `countryId` int(11) NOT NULL,
  `payMathod` varchar(255) DEFAULT NULL,
  `payBankName` varchar(255) DEFAULT NULL,
  `payAccountNum` varchar(255) DEFAULT NULL,
  `remark` varchar(255) NOT NULL,
  `pImg` varchar(255) DEFAULT NULL,
  `passImg` varchar(255) DEFAULT NULL,
  `nidImg` varchar(255) DEFAULT NULL,
  `sNidImg` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `firstName`, `lastname`, `dob`, `phone`, `genderId`, `address`, `email`, `passportNum`, `countryCode`, `passportAuthority`, `nidNumm`, `plaseOfBirth`, `passportIssueDateStart`, `passportIssueDateEnd`, `fatherName`, `motherName`, `spouseName`, `s_dob`, `s_address`, `emgName`, `emgRelation`, `emgAddress`, `emgPhone`, `referid`, `countructAmount`, `advance`, `countryId`, `payMathod`, `payBankName`, `payAccountNum`, `remark`, `pImg`, `passImg`, `nidImg`, `sNidImg`, `created_at`, `updated_at`) VALUES
(1, 'Sabbir', 'Hossain', '2001-01-17', 1762164746, 1, 'Uttara, Dhaka-1230', 'sabbir@gamil.com', 'A321654', 'BGD', 'DIP/DHAKA', '123654789', 'Gazipur', '2022-01-31', '2032-01-31', 'Amir Hossain', 'Mst. Amina Begum', 'Mst. Amina Begum', '1995-01-01', 'Dhaka', 'Amjad Ali', 'Father', 'Gazipur', '1546235897', 14, 1000000, 100000, 9, 'Bank', 'DBBL', '123456789', 'N/A', NULL, NULL, NULL, NULL, '2025-01-29 03:29:20', '2025-01-30 13:31:20'),
(4, 'Sharmim', 'Akter', '2001-01-01', 1762164746, 1, 'Uttara, Dhaka-1230', 'sharmin@gmail.com', 'A321655', 'BGD', 'DIP/DHAKA', '123654789', 'Gazipur', '2022-01-31', '2032-01-31', 'Amir Hossain', 'Mst. Amina Begum', 'Mst. Amina Begum', '1995-01-01', 'Dhaka', 'Amjad Ali', 'Father', 'Gazipur', '1546235897', 8, 1000000, 100000, 4, 'Bank', 'DBBL', '123456789', 'N/A', NULL, NULL, NULL, NULL, '2025-01-29 03:31:41', '2025-01-30 13:31:10'),
(6, 'Rakibul', 'Hossain', '2001-01-16', 1762164746, 1, 'Uttara, Dhaka-1230', 'rakibul@gmail.com', 'A321656', 'BGD', 'DIP/DHAKA', '123654789', 'Gazipur', '2022-01-31', '2032-01-31', 'Amir Hossain', 'Mst. Amina Begum', 'Mst. Amina Begum', '1995-01-01', 'Dhaka', 'Amjad Ali', 'Father', 'Gazipur', '1546235897', 13, 1000000, 100000, 3, 'Bank', 'DBBL', '123456789', 'N/A', NULL, NULL, NULL, NULL, '2025-01-29 03:32:17', '2025-01-30 13:30:59'),
(7, 'Abir', 'Hossain', '2001-01-31', 1762164746, 1, 'Uttara, Dhaka-1230', 'sabbir32@gmail.com', 'A321645', 'BGD', 'DIP/DHAKA', '123654789', 'Gazipur', '2022-01-31', '2032-01-31', 'Amir Hossain', 'Mst. Amina Begum', 'Mst. Amina Begum', '1995-01-01', 'Dhaka', 'Amjad Ali', 'Father', 'Gazipur', '1546235897', 5, 1000000, 100000, 2, 'Bank', 'DBBL', '123456789', 'N/A', NULL, NULL, NULL, NULL, '2025-01-29 04:01:54', '2025-01-29 12:36:20'),
(8, 'Limon', 'Hossain', '2000-12-07', 1762164746, 1, 'Uttara, Dhaka-1230', 'sabbir12@gmail.com', 'A321646', 'BGD', 'DIP/DHAKA', '123654789', 'Gazipur', '2022-01-31', '2032-01-31', 'Amir Hossain', 'Mst. Amina Begum', 'Mst. Amina Begum', '1995-01-01', 'Dhaka', 'Amjad Ali', 'Father', 'Gazipur', '1546235897', 9, 1000000, 100000, 1, 'Bank', 'DBBL', '123456789', 'N/A', NULL, NULL, NULL, NULL, '2025-01-29 04:02:08', '2025-01-30 13:31:30'),
(9, 'Rahim', 'Badsha', '2001-01-15', 1762164746, 1, 'Uttara, Dhaka-1230', 'sabbir43@gmail.com', 'A3216543', 'BGD', 'DIP/DHAKA', '123654789', 'Gazipur', '2022-01-31', '2032-01-31', 'Amir Hossain', 'Mst. Amina Begum', 'Mst. Amina Begum', '1995-01-01', 'Dhaka', 'Amjad Ali', 'Father', 'Gazipur', '1546235897', 10, 1000000, 100000, 8, 'Bank', 'DBBL', '123456789', 'N/A', NULL, NULL, NULL, NULL, '2025-01-29 04:02:57', '2025-01-30 13:31:38'),
(11, 'Pabel', 'Hossain', '2001-01-07', 1762164746, 1, 'Uttara, Dhaka-1230', 'pabel@gmail.com', 'A3216521', 'BGD', 'DIP/DHAKA', '123654789', 'Gazipur', '2022-01-31', '2032-01-31', 'Amir Hossain', 'Mst. Amina Begum', 'Mst. Amina Begum', '1995-01-01', 'Dhaka', 'Amjad Ali', 'Father', 'Gazipur', '1546235897', 12, 1000000, 100000, 6, 'Bank', 'DBBL', '123456789', 'N/A', NULL, NULL, NULL, NULL, '2025-01-29 04:03:16', '2025-01-30 13:31:48'),
(12, 'Farid', 'Hossain', '2001-02-08', 1762164746, 1, 'Uttara, Dhaka-1230', 'farid@gmail.com', 'A32165412', 'BGD', 'DIP/DHAKA', '123654789', 'Gazipur', '2022-01-31', '2032-01-31', 'Amir Hossain', 'Mst. Amina Begum', 'Mst. Amina Begum', '1995-01-01', 'Dhaka', 'Amjad Ali', 'Father', 'Gazipur', '1546235897', 2, 1000000, 100000, 4, 'Bank', 'DBBL', '123456789', 'N/A', NULL, NULL, NULL, NULL, '2025-01-29 04:03:26', '2025-01-30 13:31:57'),
(13, 'Rakibul', 'Islam', '2000-11-15', 1356847592, 1, 'Uttara, Dhaka-1230', 'sabbir76@gmail.com', 'A321678', 'BGD', 'DIP/DHAKA', '123654789', 'Gazipur', '2022-01-31', '2032-01-31', 'Amir Hossain', 'Mst. Amina Begum', 'Mst. Amina Begum', '1995-01-01', 'Dhaka', 'Amjad Ali', 'Father', 'Gazipur', '1546235897', 2, 1000000, 100000, 8, 'Bank', 'DBBL', '123456789', 'N/A', NULL, NULL, NULL, NULL, '2025-01-29 04:03:36', '2025-01-30 13:32:09'),
(14, 'Emon', 'Hossain', '2001-12-01', 1732564875, 1, 'Narshingdhi, Dhaka', 'emon@gmail.com', 'A326458', 'BGD', 'DIP/DHAKA', '321654987', 'Narshingdhi', '2025-01-01', '2035-01-29', 'Amir Hossain', 'Mst. Amina Begum', 'Mst. Amina Begum', '1995-01-01', 'Dhaka', 'Amjad Ali', 'Father', 'Narshingdhi, Dhaka', '123654789', 8, 1350000, 20000, 3, 'Bank', 'DBBL', '123456789', 'N/A', NULL, NULL, NULL, NULL, '2025-01-29 11:11:19', '2025-01-29 11:11:19'),
(15, 'Shamim', 'Hossain', '2001-12-31', 1533021557, 1, 'Kaliakair, Gazipur, Dhaka', 'samim@gmail.com', 'A654987', 'BGD', 'DIP/DHAKA', '654987321', 'Gazipur', '2025-01-01', '2035-01-29', 'Jamsher Ali', 'Shofiya Begum', NULL, NULL, NULL, 'Jamsher Ali', 'Father', 'Kaliakair, Gazipur, Dhaka', '3216549873', 4, 1000000, 50000, 7, NULL, NULL, NULL, '6 month a visa dibe. other wise taka back dibe.', NULL, NULL, NULL, NULL, '2025-01-29 11:49:40', '2025-01-29 12:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `countryName` varchar(255) NOT NULL,
  `clientCost` int(11) NOT NULL,
  `clientAdvance` int(11) NOT NULL,
  `agentCost` int(11) NOT NULL,
  `agentAdvance` int(11) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `countryName`, `clientCost`, `clientAdvance`, `agentCost`, `agentAdvance`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'Serbia', 850000, 50000, 800000, 50000, 'N/A', '2025-01-28 11:36:07', '2025-01-28 11:36:07'),
(2, 'Bosnia', 850000, 50000, 800000, 50000, 'N/A', '2025-01-28 11:44:45', '2025-01-28 23:20:10'),
(3, 'Crotia', 1400000, 100000, 1350000, 100000, 'N/A', '2025-01-28 23:11:45', '2025-01-28 23:16:58'),
(4, 'North Mesodonia', 850000, 50000, 800000, 50000, 'N/A', '2025-01-28 23:18:08', '2025-01-28 23:18:08'),
(5, 'Hungary', 1500000, 100000, 1250000, 100000, 'N/A', '2025-01-28 23:18:39', '2025-01-28 23:18:39'),
(6, 'Saudi Arob', 450000, 50000, 400000, 50000, 'N/A', '2025-01-28 23:19:25', '2025-01-28 23:19:25'),
(7, 'Purtogal', 2200000, 100000, 2000000, 100000, 'Refuse file visa hoi', '2025-01-28 23:20:46', '2025-01-28 23:21:13'),
(8, 'Singapore', 1100000, 100000, 1000000, 100000, 'N/A', '2025-01-28 23:22:50', '2025-01-28 23:22:50'),
(9, 'Bulgaria', 1300000, 100000, 1150000, 100000, 'N/A', '2025-01-28 23:23:25', '2025-01-28 23:23:25');

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
(9, '2025_01_26_172246_create_agents_table', 3),
(14, '2025_01_28_172915_create_countries_table', 4),
(15, '2025_01_29_061558_create_clients_table', 5),
(16, '2025_01_31_093357_create_accounts_table', 6);

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
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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

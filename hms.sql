-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 05:45 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 2),
(6, '2023_06_17_164123_create_rooms_table', 2),
(7, '2023_06_17_180442_create_enrollments_table', 3),
(8, '2023_06_18_132613_create_notifications_table', 3),
(9, '2023_06_18_140838_add_registration_fields_to_users', 4),
(10, '2023_06_18_153823_update_users_table', 5),
(11, '2023_06_18_164720_add_payment_receipt_path_to_users', 6);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Room_No` bigint(255) NOT NULL,
  `no_of_bed` bigint(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `Room_No`, `no_of_bed`, `created_at`, `updated_at`) VALUES
(1, 15, 10, '2023-06-17 11:41:07', '2023-06-17 12:06:30'),
(3, 56, 4, '2023-06-18 08:01:47', '2023-06-18 08:01:47'),
(4, 37, 2, '2023-06-18 12:39:03', '2023-06-18 12:39:03'),
(5, 43, 10, '2023-06-19 07:31:21', '2023-06-19 07:31:21'),
(6, 48, 5, '2023-06-19 08:08:26', '2023-06-19 08:08:26');

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
  `room_id` bigint(20) DEFAULT NULL,
  `is_permission` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hostel_registration_year` int(11) DEFAULT NULL,
  `payment_receipt_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `room_id`, `is_permission`, `remember_token`, `created_at`, `updated_at`, `hostel_registration_year`, `payment_receipt_path`) VALUES
(1, 'avishka udara', 'admin@admin.com', NULL, '$2y$10$3fo5v9u2GDZhcTXOSU.7x.b/mB9JCS67JFzSU7erypveKRkWVZNt6', 1, 2, NULL, '2023-06-17 09:19:16', '2023-06-17 13:04:16', NULL, NULL),
(2, 'user', 'user@user.com', NULL, '$2y$10$RMdrydLetFOIBfW4NGIOvuIs1lERBKVxHHOPq9sMB01UNwY.ADoum', NULL, 0, NULL, '2023-06-17 09:33:28', '2023-06-20 07:43:01', 2015, 'receipts/HxBb2hn62yqUh4u3ddcBrgGSBfKglOM8OhWRGL0A.png'),
(3, 'sub warden', 'subwarden@sub.com', NULL, '$2y$10$LHdMvhG74VK9IuoJlB.x3O2FNQ15ZdxCxBMqeTlD28tkx9rwpWk9u', 0, 1, NULL, '2023-06-17 09:34:43', '2023-06-17 09:34:43', NULL, NULL),
(6, 'Nuwan kumara', 'Nuwankumara@gmail.com', NULL, '$2y$10$D9CzpZPqR1tep3usfjUApuX7dL3rKTGAJyyVpJBPPDjIa4FOI54lK', NULL, 0, NULL, '2023-06-18 08:15:41', '2023-06-18 11:06:38', NULL, NULL),
(10, 'Sithum muthusara', 'Sithummuthusara@gmail.com', NULL, '$2y$10$GEDRBwXtOCBCh8BWv0D1Je5pmkxoolandPA1mRORTcJ4LkuHxh2KK', 5, 0, NULL, '2023-06-18 08:18:56', '2023-06-19 07:33:43', 2023, 'receipts/EATBwkiJS6toQiOIawKgBOngbACyyQDGzBLANExr.jpg'),
(11, 'Bandara hasitha', 'Bandarahasitha@gmail.com', NULL, '$2y$10$J7sJebz4.eGHNvZbltMPCutW3juLwNoQZh5f5DCNvQQiPQizkso6S', 4, 0, NULL, '2023-06-18 08:19:38', '2023-06-18 12:44:45', 2023, 'receipts/2oWGpaycMMakqrxDxrAQ5jW5HGbZyxVedNBb2DML.jpg'),
(12, 'Nafiz faruq', 'Nafizfaruq@gmail.com', NULL, '$2y$10$/hAb2JaYxJ7.wb6S.HJCsO6G2GG7lxTgYWKP.fVBSJQEpn3LhBoaC', 5, 0, NULL, '2023-06-18 08:20:51', '2023-06-19 17:23:47', 2024, 'receipts/gEZpy46AyEQea3xSbDet5tH4yzRyEFX30ihjnMaA.png'),
(15, 'yasiru dilshan', 'yasiru@gmail.com', NULL, '$2y$10$EbusbBQKGIPZr6an3nx7IeRyAS5v/1SLCZ4Ej1tL5/wlFAzdH96AO', 4, 0, NULL, '2023-06-18 12:40:31', '2023-06-18 12:43:08', 2023, 'receipts/znj5yUjyW2l3lei3Jsa7VeQ1PtbOxBWzE4dFxd0P.png'),
(16, 'Avishka Udara', 'avishka@admin.com', NULL, '$2y$10$QaC0lvLs1/Gb075YAIvtdOJ1By8f0ZeRqP4go5RAUptLIkiejSNgq', 2, 2, NULL, '2023-06-18 13:43:39', '2023-06-19 07:42:53', 2023, 'receipts/DcrVetkSrqKH6Vm2hQr9IX1vkOa6DHHu7tzAlgcN.jpg'),
(17, 'sub02', 'sub2@sub.com', NULL, '$2y$10$id4/zBob7dvDE2yCTm1pp.uf1D5s/YV5XImnzSKkU5//6Frn2P2mG', NULL, 1, NULL, '2023-06-19 01:58:59', '2023-06-19 01:58:59', NULL, NULL),
(18, 'kasun', 'ks@gmail.com', NULL, '$2y$10$whuFs86oFcdCKZ361RJCsuSWbMs8PPPoFFwPWcjmoPn828cW3oB/u', NULL, 1, NULL, '2023-06-19 06:01:03', '2023-06-19 06:01:03', NULL, NULL),
(19, 'Kasun Sameera', 'kasuneera@gmail.com', NULL, '$2y$10$GqflWgjGoEYOPgluv3hV2eyCElMbvdhxQ6SJGmGyP4kyhD5etFuZS', 6, 0, NULL, '2023-06-19 08:05:55', '2023-06-19 08:10:26', 2023, 'receipts/O297tLbd9mzGN06apVMxgAKxPW0O0qFC3mRfyJiZ.jpg'),
(20, 'anura kumara', 'ak@ak.com', NULL, '$2y$10$rw0EpSRzybSyTvU.iDU8ceXLTnKZu8g5Czca0imOLSk9Ois9FypTu', NULL, 0, NULL, '2023-06-19 10:08:58', '2023-06-19 10:09:23', 2024, 'receipts/F8PSq9VQ9TKGq7SLtcWOaX15kiOMq82MQXTp7acf.png'),
(21, 'ggwp', 'gg@gg.com', NULL, '$2y$10$I5bdTqauaLZx/SJ2PRR/T.OFvj.rRDWa5Qza6krImgRpEXSud024y', NULL, 0, NULL, '2023-06-19 10:11:43', '2023-06-19 10:13:08', 2023, 'receipts/fINsyVGej97MDAQKccmuiFaiaRDKqLJBop9AYpio.jpg'),
(22, 'vxcvxcvx', 'ak@aa.com', NULL, '$2y$10$XX6S9WC0uo03fSX9JQP7l.pGTKETS5k8ROjTCY8k0JbMOFCpBXj5C', NULL, 0, NULL, '2023-06-19 10:14:11', '2023-06-19 10:34:07', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enrollments_user_id_foreign` (`user_id`),
  ADD KEY `enrollments_room_id_foreign` (`room_id`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
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
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrollments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

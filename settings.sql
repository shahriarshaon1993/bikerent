-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2021 at 09:21 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `starte_kits`
--

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_title', 'StarterKit', '2021-10-15 10:33:40', '2021-10-15 10:33:40'),
(2, 'site_description', 'Et eiusmod cupidatat', '2021-10-15 10:33:40', '2021-10-15 10:33:40'),
(3, 'site_address', 'Doloremque odit repr', '2021-10-15 10:33:41', '2021-10-15 10:33:41'),
(4, 'site_logo', 'logo/Xh2yKcUEJymTkCkmqiSqJZyNrUzRLI5al8jFxfFa.jpg', '2021-10-15 10:34:06', '2021-10-15 10:34:06'),
(5, 'site_favicon', 'logo/jQC6v4fkKlh2zsckKbsda90XEtTMeU8hZETARyjh.jpg', '2021-10-15 10:34:06', '2021-10-15 10:34:06'),
(6, 'google_client_id', '588749545890-qhi8dgodinhalde0kj96do4a1giq4sfc.apps.googleusercontent.com', '2021-10-15 11:38:14', '2021-10-15 11:41:23'),
(7, 'google_client_secret', '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', '2021-10-15 11:38:14', '2021-10-15 11:41:23'),
(8, 'github_client_id', '68c53113dd126780e647', '2021-10-15 11:38:15', '2021-10-15 11:41:23'),
(9, 'github_client_secret', '5d26595a159d818405145acf5ede0eafd2cb3235', '2021-10-15 11:38:15', '2021-10-15 11:41:23'),
(10, 'mail_mailer', 'smtp', '2021-10-15 11:43:51', '2021-10-15 11:43:51'),
(11, 'mail_host', 'lara@gmail.com', '2021-10-15 11:43:52', '2021-10-15 11:43:52'),
(12, 'mail_port', '2525', '2021-10-15 11:43:52', '2021-10-15 11:43:52'),
(13, 'mail_username', 'gyvob@mailinator.com', '2021-10-15 11:43:52', '2021-10-15 11:43:52'),
(14, 'mail_password', 'Pa$$w0rd!', '2021-10-15 11:43:52', '2021-10-15 11:43:52'),
(15, 'mail_encryption', 'tls', '2021-10-15 11:43:52', '2021-10-15 11:43:52'),
(16, 'mail_from_address', 'fibuko@mailinator.com', '2021-10-15 11:43:52', '2021-10-15 11:43:52'),
(17, 'mail_from_name', 'StarterKit', '2021-10-15 11:43:52', '2021-10-15 11:43:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

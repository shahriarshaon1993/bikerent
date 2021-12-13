-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 12:46 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bikerent`
--

-- --------------------------------------------------------

--
-- Table structure for table `bikes`
--

CREATE TABLE `bikes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_per_day` decimal(8,2) NOT NULL,
  `discount_price` decimal(8,2) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bikes`
--

INSERT INTO `bikes` (`id`, `category_id`, `brand_id`, `title`, `slug`, `model`, `price_per_day`, `discount_price`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Dignissimos eum in q', 'dignissimos-eum-in-q', 'Sequi consequatur e', '644.00', NULL, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic</p>\r\n<p>typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2021-12-13 04:48:38', '2021-12-13 04:48:38'),
(2, 2, 2, 'Tempor laborum Lore', 'tempor-laborum-lore', 'Non rem unde ullam r', '614.00', '969.00', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem</p>\r\n<p>Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen</p>\r\n<p>book. It has survived not only five centuries, but also the leap into electronic</p>\r\n<p>typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2021-12-13 04:49:00', '2021-12-13 04:49:00'),
(3, 2, 1, 'Anim et cum autem eo', 'anim-et-cum-autem-eo', 'Maxime sapiente ipsu', '981.00', NULL, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen</p>\r\n<p>book. It has survived not only five centuries, but also the leap into electronic</p>\r\n<p>typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2021-12-13 04:49:18', '2021-12-13 05:44:50'),
(4, 2, 1, 'Voluptatem Dolor la', 'voluptatem-dolor-la', 'Adipisci autem nihil', '559.00', '616.00', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen</p>\r\n<p>book. It has survived not only five centuries, but also the leap into electronic</p>\r\n<p>typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2021-12-13 04:49:34', '2021-12-13 05:44:46'),
(5, 4, 2, 'Ex est esse necessit', 'ex-est-esse-necessit', 'Sequi mollitia atque', '700.00', NULL, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen</p>\r\n<p>book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with</p>\r\n<p>the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2021-12-13 04:50:28', '2021-12-13 04:50:28'),
(6, 2, 2, 'Maiores ut dolorum e', 'maiores-ut-dolorum-e', 'In dolorem et suscip', '943.00', '383.00', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic</p>\r\n<p>typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2021-12-13 04:50:43', '2021-12-13 04:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Yamaha', 'yamaha', '2021-12-13 04:38:11', '2021-12-13 04:38:11'),
(2, 'Honda', 'honda', '2021-12-13 04:38:25', '2021-12-13 04:38:25');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Bike', 'bike', NULL, '2021-12-13 02:15:39', '2021-12-13 02:15:39'),
(2, 'Yamaha', 'yamaha', 1, '2021-12-13 02:15:47', '2021-12-13 02:16:03'),
(3, 'R15', 'r15', 2, '2021-12-13 02:15:51', '2021-12-13 02:16:14'),
(4, 'Bajaj', 'bajaj', 1, '2021-12-13 02:16:31', '2021-12-13 02:16:31');

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
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Slider', 1, 'ba6f8310-186d-4446-aaf6-31b60dba4bc1', 'slider_image', 'francisco-requena-A9tP39BIn28-unsplash', '20939190641639375300.jpg', 'image/jpeg', 'public', 'public', 1830955, '[]', '[]', '[]', '[]', 1, '2021-12-13 00:01:41', '2021-12-13 00:01:41'),
(2, 'App\\Models\\Slider', 2, '50f2668b-153f-4e18-95f3-f8886e84315c', 'slider_image', '536957', '21258895081639390221.jpg', 'image/jpeg', 'public', 'public', 241030, '[]', '[]', '[]', '[]', 2, '2021-12-13 04:10:22', '2021-12-13 04:10:22'),
(3, 'App\\Models\\Slider', 3, '281abdae-17b6-4daf-92ac-55c674ab5495', 'slider_image', 'francisco-requena-A9tP39BIn28-unsplash', '13854891501639390295.jpg', 'image/jpeg', 'public', 'public', 1830955, '[]', '[]', '[]', '[]', 3, '2021-12-13 04:11:35', '2021-12-13 04:11:35'),
(4, 'App\\Models\\Brand', 1, '39b3c646-a0c7-45bd-a087-83f32bf31ed9', 'brand_image', 'png-transparent-yamaha-motor-company-motorcycle-newmarket-powersports-business-yamaha-mio-motorcycle-text-trademark-logo', '17545086241639391891.png', 'image/png', 'public', 'public', 26010, '[]', '[]', '[]', '[]', 4, '2021-12-13 04:38:12', '2021-12-13 04:38:12'),
(5, 'App\\Models\\Brand', 2, 'a956f3f1-c349-4a32-bf51-f13fe907c4b9', 'brand_image', 'download', '13784096901639391905.jpg', 'image/jpeg', 'public', 'public', 7168, '[]', '[]', '[]', '[]', 5, '2021-12-13 04:38:26', '2021-12-13 04:38:26'),
(6, 'App\\Models\\Bike', 1, 'fc625e80-8c93-407c-a40a-7b00e5a77b28', 'bike_image', 'pexels-gijs-coolen-2549942', '1996160191639392518.jpg', 'image/jpeg', 'public', 'public', 64339, '[]', '[]', '[]', '[]', 6, '2021-12-13 04:48:38', '2021-12-13 04:48:38'),
(7, 'App\\Models\\Bike', 2, 'd061a8b4-c249-4ded-a670-bcf0b7bffa43', 'bike_image', 'pexels-giorgio-de-angelis-1413412', '7245644361639392540.jpg', 'image/jpeg', 'public', 'public', 39845, '[]', '[]', '[]', '[]', 7, '2021-12-13 04:49:00', '2021-12-13 04:49:00'),
(8, 'App\\Models\\Bike', 3, '5aa652c7-baf2-4cf8-8be9-552f4fe07f1a', 'bike_image', 'pexels-min-an-1629180', '10265805371639392558.jpg', 'image/jpeg', 'public', 'public', 177690, '[]', '[]', '[]', '[]', 8, '2021-12-13 04:49:18', '2021-12-13 04:49:18'),
(9, 'App\\Models\\Bike', 4, 'b2537631-0bdf-4631-bf44-bfeb6417edc5', 'bike_image', 'pexels-pragyan-bezbaruah-1715193', '12853363901639392574.jpg', 'image/jpeg', 'public', 'public', 74041, '[]', '[]', '[]', '[]', 9, '2021-12-13 04:49:34', '2021-12-13 04:49:34'),
(10, 'App\\Models\\Bike', 5, '9135ab8d-ffbb-4f4f-9712-c7f5d3bef6e6', 'bike_image', 'pexels-roman-pohorecki-34006', '3769766191639392628.jpg', 'image/jpeg', 'public', 'public', 84210, '[]', '[]', '[]', '[]', 10, '2021-12-13 04:50:28', '2021-12-13 04:50:28'),
(11, 'App\\Models\\Bike', 6, 'da871d25-90a5-4c7f-a973-945e4069e266', 'bike_image', 'pexels-sourav-mishra-2658992', '2951508371639392643.jpg', 'image/jpeg', 'public', 'public', 49707, '[]', '[]', '[]', '[]', 11, '2021-12-13 04:50:43', '2021-12-13 04:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deletable` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `description`, `deletable`, `created_at`, `updated_at`) VALUES
(1, 'backend-sidebar', 'This is backend sidebar', 0, '2021-12-13 00:01:27', '2021-12-13 00:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('item','divider') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'item',
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `divider_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `type`, `parent_id`, `order`, `title`, `divider_title`, `url`, `target`, `icon_class`, `created_at`, `updated_at`) VALUES
(1, 1, 'divider', NULL, 1, NULL, 'Menus', NULL, '_self', NULL, '2021-12-13 00:01:27', '2021-12-13 00:01:27'),
(2, 1, 'item', NULL, 2, 'Dashboard', NULL, '/app/dashboard', '_self', 'pe-7s-rocket', '2021-12-13 00:01:27', '2021-12-13 00:01:27'),
(3, 1, 'item', NULL, 3, 'Sliders', NULL, '/app/sliders', '_self', 'pe-7s-photo', '2021-12-13 00:01:27', '2021-12-13 00:01:27'),
(4, 1, 'item', NULL, 4, 'Categories', NULL, '/app/categories', '_self', 'pe-7s-folder', '2021-12-13 00:01:27', '2021-12-13 00:01:27'),
(5, 1, 'item', NULL, 5, 'Brands', NULL, '/app/brands', '_self', 'pe-7s-way', '2021-12-13 00:01:27', '2021-12-13 00:01:27'),
(6, 1, 'item', NULL, 6, 'Bikes', NULL, '/app/bikes', '_self', 'pe-7s-bicycle', '2021-12-13 00:01:27', '2021-12-13 00:01:27'),
(7, 1, 'item', NULL, 7, 'Pages', NULL, '/app/pages', '_self', 'pe-7s-news-paper', '2021-12-13 00:01:27', '2021-12-13 00:01:27'),
(8, 1, 'divider', NULL, 8, NULL, 'Access controll', NULL, '_self', NULL, '2021-12-13 00:01:27', '2021-12-13 00:01:27'),
(9, 1, 'item', NULL, 9, 'Roles', NULL, '/app/roles', '_self', 'pe-7s-check', '2021-12-13 00:01:27', '2021-12-13 00:01:27'),
(10, 1, 'item', NULL, 10, 'Users', NULL, '/app/users', '_self', 'pe-7s-users', '2021-12-13 00:01:27', '2021-12-13 00:01:27'),
(11, 1, 'divider', NULL, 11, NULL, 'System', NULL, '_self', NULL, '2021-12-13 00:01:27', '2021-12-13 00:01:27'),
(12, 1, 'item', NULL, 12, 'Menus', NULL, '/app/menus', '_self', 'pe-7s-menu', '2021-12-13 00:01:27', '2021-12-13 00:01:27'),
(13, 1, 'item', NULL, 13, 'Backups', NULL, '/app/backups', '_self', 'pe-7s-cloud', '2021-12-13 00:01:27', '2021-12-13 00:01:27'),
(14, 1, 'item', NULL, 14, 'Settings', NULL, '/app/settings/general', '_self', 'pe-7s-settings', '2021-12-13 00:01:27', '2021-12-13 00:01:27');

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
(5, '2021_09_29_040150_create_modules_table', 1),
(6, '2021_09_29_041327_create_permissions_table', 1),
(7, '2021_09_29_041455_create_roles_table', 1),
(8, '2021_09_29_043642_create_permission_role_table', 1),
(9, '2021_10_02_175800_create_media_table', 1),
(10, '2021_10_04_171606_create_pages_table', 1),
(11, '2021_10_07_180238_create_menus_table', 1),
(12, '2021_10_07_182101_create_menu_items_table', 1),
(13, '2021_10_13_144441_create_settings_table', 1),
(14, '2021_12_12_094459_create_categories_table', 1),
(15, '2021_12_12_113511_create_brands_table', 1),
(16, '2021_12_12_113533_create_bikes_table', 1),
(17, '2021_12_13_050026_create_sliders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin Dashboard', '2021-12-13 00:01:25', '2021-12-13 00:01:25'),
(2, 'Role Management', '2021-12-13 00:01:25', '2021-12-13 00:01:25'),
(3, 'User Management', '2021-12-13 00:01:25', '2021-12-13 00:01:25'),
(4, 'Backups Management', '2021-12-13 00:01:25', '2021-12-13 00:01:25'),
(5, 'Page Management', '2021-12-13 00:01:25', '2021-12-13 00:01:25'),
(6, 'Menu Management', '2021-12-13 00:01:25', '2021-12-13 00:01:25'),
(7, 'Bike Management', '2021-12-13 00:01:25', '2021-12-13 00:01:25'),
(8, 'Slider Management', '2021-12-13 00:01:26', '2021-12-13 00:01:26');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `excerpt`, `body`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 'About', 'about', 'This is about page', '<h1>This is about page</h1>', 'about description', 'about, etc', 1, '2021-12-13 00:01:27', '2021-12-13 00:01:27');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `module_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'Access Dashboard', 'app.dashboard', '2021-12-13 00:01:25', '2021-12-13 00:01:25'),
(2, 2, 'Access Roles', 'app.roles.index', '2021-12-13 00:01:25', '2021-12-13 00:01:25'),
(3, 2, 'Create Role', 'app.roles.create', '2021-12-13 00:01:25', '2021-12-13 00:01:25'),
(4, 2, 'Edit Role', 'app.roles.edit', '2021-12-13 00:01:25', '2021-12-13 00:01:25'),
(5, 2, 'Delete Role', 'app.roles.destroy', '2021-12-13 00:01:25', '2021-12-13 00:01:25'),
(6, 3, 'Access Users', 'app.users.index', '2021-12-13 00:01:25', '2021-12-13 00:01:25'),
(7, 3, 'Create User', 'app.users.create', '2021-12-13 00:01:25', '2021-12-13 00:01:25'),
(8, 3, 'Edit User', 'app.users.edit', '2021-12-13 00:01:25', '2021-12-13 00:01:25'),
(9, 3, 'Delete User', 'app.users.destroy', '2021-12-13 00:01:25', '2021-12-13 00:01:25'),
(10, 4, 'Access backups', 'app.backups.index', '2021-12-13 00:01:25', '2021-12-13 00:01:25'),
(11, 4, 'Create backups', 'app.backups.create', '2021-12-13 00:01:25', '2021-12-13 00:01:25'),
(12, 4, 'Download backups', 'app.backups.download', '2021-12-13 00:01:25', '2021-12-13 00:01:25'),
(13, 4, 'Delete backup', 'app.backups.destroy', '2021-12-13 00:01:25', '2021-12-13 00:01:25'),
(14, 5, 'Access pages', 'app.pages.index', '2021-12-13 00:01:25', '2021-12-13 00:01:25'),
(15, 5, 'Create page', 'app.pages.create', '2021-12-13 00:01:25', '2021-12-13 00:01:25'),
(16, 5, 'Edit page', 'app.pages.edit', '2021-12-13 00:01:25', '2021-12-13 00:01:25'),
(17, 5, 'Delete page', 'app.pages.destroy', '2021-12-13 00:01:25', '2021-12-13 00:01:25'),
(18, 6, 'Access menus', 'app.menus.index', '2021-12-13 00:01:25', '2021-12-13 00:01:25'),
(19, 6, 'Access menu builder', 'app.menus.builder', '2021-12-13 00:01:25', '2021-12-13 00:01:25'),
(20, 6, 'Create menu', 'app.menus.create', '2021-12-13 00:01:25', '2021-12-13 00:01:25'),
(21, 6, 'Edit menu', 'app.menus.edit', '2021-12-13 00:01:25', '2021-12-13 00:01:25'),
(22, 6, 'Delete menu', 'app.menus.destroy', '2021-12-13 00:01:25', '2021-12-13 00:01:25'),
(23, 7, 'Access bike', 'app.bikes.index', '2021-12-13 00:01:26', '2021-12-13 00:01:26'),
(24, 7, 'Create bike', 'app.bikes.create', '2021-12-13 00:01:26', '2021-12-13 00:01:26'),
(25, 7, 'Edit bike', 'app.bikes.edit', '2021-12-13 00:01:26', '2021-12-13 00:01:26'),
(26, 7, 'Delete bike', 'app.bikes.destroy', '2021-12-13 00:01:26', '2021-12-13 00:01:26'),
(27, 8, 'Access slider', 'app.sliders.index', '2021-12-13 00:01:26', '2021-12-13 00:01:26'),
(28, 8, 'Create slider', 'app.sliders.create', '2021-12-13 00:01:26', '2021-12-13 00:01:26'),
(29, 8, 'Edit slider', 'app.sliders.edit', '2021-12-13 00:01:26', '2021-12-13 00:01:26'),
(30, 8, 'Delete slider', 'app.sliders.destroy', '2021-12-13 00:01:26', '2021-12-13 00:01:26');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 1, NULL, NULL),
(4, 4, 1, NULL, NULL),
(5, 5, 1, NULL, NULL),
(6, 6, 1, NULL, NULL),
(7, 7, 1, NULL, NULL),
(8, 8, 1, NULL, NULL),
(9, 9, 1, NULL, NULL),
(10, 10, 1, NULL, NULL),
(11, 11, 1, NULL, NULL),
(12, 12, 1, NULL, NULL),
(13, 13, 1, NULL, NULL),
(14, 14, 1, NULL, NULL),
(15, 15, 1, NULL, NULL),
(16, 16, 1, NULL, NULL),
(17, 17, 1, NULL, NULL),
(18, 18, 1, NULL, NULL),
(19, 19, 1, NULL, NULL),
(20, 20, 1, NULL, NULL),
(21, 21, 1, NULL, NULL),
(22, 22, 1, NULL, NULL),
(23, 23, 1, NULL, NULL),
(24, 24, 1, NULL, NULL),
(25, 25, 1, NULL, NULL),
(26, 26, 1, NULL, NULL),
(27, 27, 1, NULL, NULL),
(28, 28, 1, NULL, NULL),
(29, 29, 1, NULL, NULL),
(30, 30, 1, NULL, NULL);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deletable` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `deletable`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, 0, '2021-12-13 00:01:26', '2021-12-13 00:01:26'),
(2, 'User', 'user', NULL, 0, '2021-12-13 00:01:26', '2021-12-13 00:01:26');

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

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `slug`, `excerpt`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Example headline.', 'example-headline', 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'http://127.0.0.1:8000/register', 0, '2021-12-13 00:01:40', '2021-12-13 00:01:40'),
(2, 'Why do we use it?', 'why-do-we-use-it', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 'http://127.0.0.1:8000/register', 1, '2021-12-13 04:10:21', '2021-12-13 04:10:21'),
(3, 'What is Lorem Ipsum?', 'what-is-lorem-ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'http://127.0.0.1:8000/register', 1, '2021-12-13 04:11:35', '2021-12-13 04:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@mail.com', NULL, '$2y$10$vKiz1jKLjeteC802FAy.fOc59i8n4PZZIrXA3F4JGrAqyoZpbOUsW', 1, NULL, '2021-12-13 00:01:27', '2021-12-13 00:01:27'),
(2, 2, 'Jone Doe', 'user@mail.com', NULL, '$2y$10$cBlSJ76sCws0Nzds1zy4su/Vl.989AQB5SCkg5aoxrCG1qAwbkbPm', 1, NULL, '2021-12-13 00:01:27', '2021-12-13 00:01:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bikes`
--
ALTER TABLE `bikes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bikes_title_unique` (`title`),
  ADD UNIQUE KEY `bikes_slug_unique` (`slug`),
  ADD KEY `bikes_category_id_foreign` (`category_id`),
  ADD KEY `bikes_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modules_name_unique` (`name`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_title_unique` (`title`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_slug_unique` (`slug`),
  ADD KEY `permissions_module_id_foreign` (`module_id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sliders_title_unique` (`title`),
  ADD UNIQUE KEY `sliders_slug_unique` (`slug`);

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
-- AUTO_INCREMENT for table `bikes`
--
ALTER TABLE `bikes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bikes`
--
ALTER TABLE `bikes`
  ADD CONSTRAINT `bikes_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bikes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

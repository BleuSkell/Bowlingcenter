-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2025 at 04:35 PM
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
-- Database: `bowlingcenter`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `first_name`, `middle_name`, `last_name`, `phone_number`, `email`, `is_active`, `comment`, `created_at`, `updated_at`) VALUES
(1, 32, 'Novella', 'Yessenia', 'Walker', '1-251-944-8647', 'samson84@example.net', 0, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(2, 33, 'Marcia', NULL, 'Homenick', '831.485.7906', 'wilfredo.collins@example.org', 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(3, 34, 'Loyce', 'Else', 'Hammes', '951.987.4869', 'dwest@example.com', 0, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(4, 35, 'Brice', NULL, 'Skiles', '534-575-1434', 'mellie.white@example.org', 1, 'Qui ad qui autem omnis cupiditate temporibus.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(5, 36, 'Whitney', NULL, 'Von', '1-651-809-1556', 'matteo.abshire@example.net', 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(6, 37, 'Beulah', NULL, 'Reynolds', '+1 (281) 590-2632', 'jerad.russel@example.org', 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(7, 38, 'Greta', 'Carissa', 'Jenkins', '+1 (763) 778-3812', 'chloe17@example.net', 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(8, 39, 'Cecelia', 'Adele', 'Pacocha', '+1-785-466-1834', 'ibartoletti@example.com', 0, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(9, 40, 'Eden', NULL, 'O\'Keefe', '678-763-1264', 'koby26@example.com', 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(10, 41, 'Ashton', NULL, 'Tillman', '434.861.5548', 'kaley85@example.com', 0, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51');

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
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `lanes`
--

CREATE TABLE `lanes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lane_number` int(11) NOT NULL,
  `lane_type` tinyint(1) NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lanes`
--

INSERT INTO `lanes` (`id`, `lane_number`, `lane_type`, `is_available`, `is_active`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 1, 'Est animi dicta pariatur magni voluptatem cupiditate.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(2, 2, 1, 1, 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(3, 3, 1, 1, 0, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(4, 4, 1, 1, 0, 'Quibusdam quis adipisci omnis corrupti harum.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(5, 5, 0, 1, 0, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(6, 6, 0, 0, 1, 'Molestiae quasi inventore quas eum velit.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(7, 7, 0, 1, 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(8, 8, 1, 1, 0, 'Repellat quia iste ut dolore accusantium error.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(9, 9, 1, 0, 1, 'Voluptatum et eum dolore autem quae ab officia dolorem.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(10, 10, 0, 1, 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(11, 11, 0, 1, 1, 'Ut esse reprehenderit reprehenderit voluptatem nobis provident.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(12, 12, 0, 1, 0, 'Dolorem doloremque ducimus consequatur veritatis.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(13, 13, 0, 0, 1, 'Consequuntur aspernatur tempora facere et odit ipsum non.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(14, 14, 1, 1, 0, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(15, 15, 1, 0, 1, 'Delectus tempore explicabo saepe est ipsam explicabo placeat.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(16, 16, 1, 1, 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(17, 17, 0, 0, 0, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(18, 18, 1, 1, 0, 'Velit magnam eum consequatur cum est.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(19, 19, 1, 0, 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(20, 20, 0, 1, 1, 'Reprehenderit eaque hic magni dolorem et non sint.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(21, 21, 1, 1, 1, 'Dolorem eum perferendis numquam voluptas perspiciatis ab.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(22, 22, 0, 1, 0, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(23, 23, 1, 1, 0, 'Praesentium quisquam et sed sed sit.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(24, 24, 1, 0, 0, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(25, 25, 1, 0, 0, 'Et quidem quis similique blanditiis fugiat reprehenderit.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(26, 26, 0, 0, 0, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(27, 27, 1, 0, 0, 'Iure tempore magni autem inventore.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(28, 28, 1, 0, 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(29, 29, 0, 0, 0, 'Quo sint quis occaecati qui accusamus aperiam nostrum.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(30, 30, 1, 1, 1, 'Officia suscipit officiis dignissimos explicabo a ut ad.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(31, 31, 1, 0, 0, 'Deserunt soluta modi recusandae expedita.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(32, 32, 1, 0, 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(33, 33, 0, 0, 0, 'Cum eos non sed id.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(34, 34, 0, 1, 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(35, 35, 1, 0, 0, 'Laboriosam et hic voluptate beatae tempore iste.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(36, 36, 1, 1, 0, 'Temporibus optio eos facere.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(37, 37, 1, 0, 0, 'Itaque voluptas aspernatur modi ut itaque tempora et.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(38, 38, 0, 0, 0, 'Et facere consequatur et alias a sit dolorem.', '2025-04-10 12:25:51', '2025-04-10 12:25:51');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_10_072724_create_contacts_table', 1),
(5, '2025_04_10_072819_create_products_table', 1),
(6, '2025_04_10_072913_create_lanes_table', 1),
(7, '2025_04_10_072945_create_reservations_table', 1),
(8, '2025_04_10_072946_create_scores_table', 1),
(9, '2025_04_10_072947_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `reservation_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `reservation_id`, `quantity`, `total_price`, `status`, `is_active`, `comment`, `created_at`, `updated_at`) VALUES
(1, 11, 1, 5, 35.79, 'completed', 0, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(2, 12, 2, 9, 50.00, 'completed', 0, 'Nesciunt beatae non et quia rem consequatur.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(3, 13, 3, 3, 74.75, 'canceled', 0, 'Quasi explicabo nihil distinctio aut laudantium enim voluptatem.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(4, 14, 4, 10, 15.79, 'canceled', 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(5, 15, 5, 3, 99.37, 'completed', 1, 'Et eaque qui enim veniam provident.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(6, 16, 6, 5, 65.63, 'completed', 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(7, 17, 7, 3, 52.93, 'canceled', 1, 'Facilis quas rerum ut rerum modi explicabo placeat.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(8, 18, 8, 6, 86.52, 'pending', 0, 'Doloribus voluptates mollitia non odio fugiat qui.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(9, 19, 9, 4, 61.20, 'completed', 0, 'Sapiente suscipit earum vel praesentium sapiente veniam iste eos.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(10, 20, 10, 2, 22.72, 'canceled', 0, 'Placeat impedit rem nulla.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(11, 2, 3, 1, 9.08, 'pending', 1, NULL, '2025-04-10 12:33:11', '2025-04-10 12:33:11'),
(12, 3, 3, 1, 49.72, 'pending', 1, NULL, '2025-04-10 12:33:11', '2025-04-10 12:33:11'),
(13, 1, 3, 1, 78.86, 'pending', 1, NULL, '2025-04-10 12:33:11', '2025-04-10 12:33:11');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `image_url` varchar(500) DEFAULT NULL,
  `max_quantity` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `image_url`, `max_quantity`, `is_active`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'Snackpakket Paleo', 'Rerum necessitatibus aspernatur asperiores alias reprehenderit eaque omnis.', 78.86, 24, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.yummytoddlerfood.com%2Fwp-content%2Fuploads%2F2023%2F02%2Fvegetable-post-1024x683.jpg&f=1&nofb=1&ipt=8378225d0d47b4ff770d49a705dff0343c4523921a2ecd09102cf3f59139dc36', 2, 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(2, 'Snackpakket Organic', 'Quis rerum deserunt deserunt minima nesciunt labore iure.', 9.08, 3, '\n        https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.lekkerensimpel.com%2Fwp-content%2Fuploads%2F2016%2F06%2FIMG_6045-640x426.jpg&f=1&nofb=1&ipt=3f2714c23ab454cb08c49b3fc9bfea55203448977752b895d0bf480fb9740687', 8, 0, 'Tenetur molestiae exercitationem iusto ut saepe sed.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(3, 'Snackpakket Vegan', 'Quam in deserunt enim ex.', 49.72, 30, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.s-bol.com%2F33yBzVKA7GV9%2FgG6BV6%2F1121x1200.jpg&f=1&nofb=1&ipt=6b7332b905937e8676ca3586a7f5696a71294d5765b9ca127ec097e52cd656e4', 9, 1, 'Praesentium aperiam ut sit voluptate.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(4, 'Snackpakket Gezond', 'Qui doloribus quia quo quis doloribus hic est.', 2.01, 64, '\n        https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.lekkerensimpel.com%2Fwp-content%2Fuploads%2F2016%2F06%2FIMG_6045-640x426.jpg&f=1&nofb=1&ipt=3f2714c23ab454cb08c49b3fc9bfea55203448977752b895d0bf480fb9740687', 1, 0, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(5, 'Snackpakket Corporate', 'Maiores nobis eaque necessitatibus nulla ut reiciendis.', 70.89, 12, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fglobal-uploads.webflow.com%2F5f6cc9cd16d59d990c8fca33%2F64335322a9dcdb6019df25cd_vegetarian-fast-food.jpg&f=1&nofb=1&ipt=8b69b09c980c7dbcd6dc72e8d4ab25749df79e3d6c93e91c77462c71f75a0a36', 9, 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(6, 'Snackpakket Gezond', 'Aliquam possimus rerum culpa exercitationem ut deserunt.', 90.10, 84, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.whynot.com%2Fdeal%2Ffrietkraom-keulse-barriere-23072615582243.jpg&f=1&nofb=1&ipt=354d0e297333a66a93b3cc679fb7b078c46953db1df817f54a1b2ddbc6c10b09', 7, 0, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(7, 'Snackpakket Gezond', 'Vel repudiandae in odio reprehenderit atque.', 58.60, 19, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.yummytoddlerfood.com%2Fwp-content%2Fuploads%2F2023%2F02%2Fvegetable-post-1024x683.jpg&f=1&nofb=1&ipt=8378225d0d47b4ff770d49a705dff0343c4523921a2ecd09102cf3f59139dc36', 3, 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(8, 'Snackpakket Anniversary', 'Aut et quia dolores accusantium ad doloribus sed.', 24.90, 25, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.s-bol.com%2FR7MMWZ2zRo4V%2Fz1ER32%2F1200x1200.jpg&f=1&nofb=1&ipt=3cba1f7932184c844eec5d837d959593533499605b96c4a1734a8cfb18dce2d5', 8, 1, 'Cum culpa minus inventore omnis distinctio natus praesentium.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(9, 'Snackpakket Local', 'Et atque asperiores dolor beatae.', 15.67, 68, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.s-bol.com%2FR7MMWZ2zRo4V%2Fz1ER32%2F1200x1200.jpg&f=1&nofb=1&ipt=3cba1f7932184c844eec5d837d959593533499605b96c4a1734a8cfb18dce2d5', 6, 1, 'Saepe sit consequuntur rerum id est dolorem sit eos.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(10, 'Snackpakket Vegan', 'Soluta delectus praesentium est.', 56.51, 51, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Foveresch.nl%2Fwp-content%2Fuploads%2F2022%2F09%2FVoorbeeldpakket-DSW-10-08-2022-1536x1124.jpg&f=1&nofb=1&ipt=1049e901cc85df7eec76e180cc4d47c0d5d5d43ba6473105e8e495c74fc3e0ec', 6, 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(11, 'Snackpakket Local', 'Iste aut eaque natus.', 45.70, 81, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.yummytoddlerfood.com%2Fwp-content%2Fuploads%2F2023%2F02%2Fvegetable-post-1024x683.jpg&f=1&nofb=1&ipt=8378225d0d47b4ff770d49a705dff0343c4523921a2ecd09102cf3f59139dc36', 8, 1, 'Sunt ad qui aut.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(12, 'Snackpakket VIP', 'Quisquam omnis et molestias voluptatem aut.', 8.70, 52, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.s-bol.com%2F33yBzVKA7GV9%2FgG6BV6%2F1121x1200.jpg&f=1&nofb=1&ipt=6b7332b905937e8676ca3586a7f5696a71294d5765b9ca127ec097e52cd656e4', 2, 1, 'Impedit necessitatibus consequatur omnis expedita facere.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(13, 'Snackpakket Holiday', 'Harum labore vel dolorem ea id ut sapiente molestiae.', 82.98, 30, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.yummytoddlerfood.com%2Fwp-content%2Fuploads%2F2023%2F02%2Fvegetable-post-1024x683.jpg&f=1&nofb=1&ipt=8378225d0d47b4ff770d49a705dff0343c4523921a2ecd09102cf3f59139dc36', 3, 0, 'Aliquam perferendis et repellat illo possimus non sint corrupti.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(14, 'Snackpakket Keto', 'Et qui id dolor dolor.', 60.71, 58, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.makrokerstpakketten.nl%2FCmsData%2FArtikelen%2FFotos%2F2%2F0%2F2022%2520HS55%2520Kleurrijke%2520feestdagen%2Fv-637985847413403359%2F2022%2520HS55%2520Kleurrijke%2520feestdagen_main_349x349%402x_1.jpg&f=1&nofb=1&ipt=966e927addd853f5c9e3355ae75415864cc522dcc637bbc47dbf2649efd58de1', 2, 0, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(15, 'Snackpakket Student', 'Vero tenetur cupiditate alias numquam omnis esse.', 54.07, 72, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.whynot.com%2Fdeal%2Ffrietkraom-keulse-barriere-23072615582243.jpg&f=1&nofb=1&ipt=354d0e297333a66a93b3cc679fb7b078c46953db1df817f54a1b2ddbc6c10b09', 10, 1, 'In earum qui qui facere ipsam corrupti qui.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(16, 'Snackpakket Deluxe', 'Alias dolorem quos et quasi eum nesciunt vel.', 34.41, 43, '\n        https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.lekkerensimpel.com%2Fwp-content%2Fuploads%2F2016%2F06%2FIMG_6045-640x426.jpg&f=1&nofb=1&ipt=3f2714c23ab454cb08c49b3fc9bfea55203448977752b895d0bf480fb9740687', 8, 0, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(17, 'Snackpakket Party', 'Aperiam reiciendis ducimus modi reprehenderit.', 18.78, 10, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Foveresch.nl%2Fwp-content%2Fuploads%2F2022%2F09%2FVoorbeeldpakket-DSW-10-08-2022-1536x1124.jpg&f=1&nofb=1&ipt=1049e901cc85df7eec76e180cc4d47c0d5d5d43ba6473105e8e495c74fc3e0ec', 5, 0, 'Architecto rerum qui saepe nihil a porro voluptas.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(18, 'Snackpakket Wedding', 'Sint magni dolorum quibusdam quod.', 24.38, 71, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Foveresch.nl%2Fwp-content%2Fuploads%2F2022%2F09%2FVoorbeeldpakket-DSW-10-08-2022-1536x1124.jpg&f=1&nofb=1&ipt=1049e901cc85df7eec76e180cc4d47c0d5d5d43ba6473105e8e495c74fc3e0ec', 2, 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(19, 'Snackpakket Event', 'Ratione sint est deserunt explicabo molestias quod ab.', 59.20, 66, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fglobal-uploads.webflow.com%2F5f6cc9cd16d59d990c8fca33%2F64335322a9dcdb6019df25cd_vegetarian-fast-food.jpg&f=1&nofb=1&ipt=8b69b09c980c7dbcd6dc72e8d4ab25749df79e3d6c93e91c77462c71f75a0a36', 8, 0, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(20, 'Snackpakket Raw', 'Dolore nobis maxime perferendis id amet porro.', 79.59, 86, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.s-bol.com%2FR7MMWZ2zRo4V%2Fz1ER32%2F1200x1200.jpg&f=1&nofb=1&ipt=3cba1f7932184c844eec5d837d959593533499605b96c4a1734a8cfb18dce2d5', 7, 0, 'Veniam sint nostrum dolores.', '2025-04-10 12:25:51', '2025-04-10 12:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `lane_id` bigint(20) UNSIGNED NOT NULL,
  `adult_count` int(11) NOT NULL,
  `child_count` int(11) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `lane_id`, `adult_count`, `child_count`, `date`, `start_time`, `end_time`, `price`, `status`, `is_active`, `comment`, `created_at`, `updated_at`) VALUES
(1, 2, 9, 4, 0, '2025-05-09', '21:20:18', '15:15:35', 62.83, 'pending', 0, 'Voluptatibus et ad soluta id.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(2, 3, 10, 6, 1, '2025-04-09', '17:12:20', '19:21:26', 24.35, 'pending', 0, 'Dignissimos nemo id sint laboriosam et.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(3, 4, 11, 3, 1, '2025-04-18', '15:51:24', '14:57:32', 34.24, 'canceled', 1, 'Maiores nisi cupiditate necessitatibus commodi similique repellendus voluptatem.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(4, 5, 12, 8, 1, '2025-04-03', '12:23:42', '20:50:20', 95.80, 'canceled', 0, 'Aspernatur iste deserunt quis.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(5, 6, 13, 3, 2, '2025-03-17', '07:23:05', '15:54:30', 92.48, 'canceled', 1, 'Minus laborum labore dicta numquam placeat deleniti.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(6, 7, 14, 3, 3, '2025-04-18', '04:45:26', '02:49:40', 95.02, 'confirmed', 0, 'Sed vel doloremque officia omnis.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(7, 8, 15, 6, 4, '2025-05-02', '11:48:42', '13:13:54', 52.49, 'pending', 1, 'Qui eos ut incidunt.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(8, 9, 16, 3, 3, '2025-04-07', '23:04:36', '23:08:52', 63.82, 'pending', 0, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(9, 10, 17, 8, 1, '2025-04-25', '05:44:04', '12:08:13', 90.72, 'canceled', 0, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(10, 11, 18, 6, 1, '2025-03-24', '11:13:22', '11:57:11', 77.47, 'confirmed', 0, 'Modi possimus occaecati quia quia id ratione quia.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(11, 12, 19, 2, 0, '2025-05-02', '19:36:24', '13:22:50', 75.11, 'confirmed', 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(12, 13, 20, 8, 0, '2025-04-07', '05:22:24', '01:32:50', 51.14, 'canceled', 1, 'Numquam quasi eos accusamus asperiores saepe.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(13, 14, 21, 5, 4, '2025-04-10', '05:38:59', '16:31:57', 99.84, 'confirmed', 0, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(14, 15, 22, 5, 4, '2025-04-24', '23:37:22', '02:25:49', 91.92, 'canceled', 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(15, 16, 23, 4, 2, '2025-03-13', '18:24:24', '10:56:11', 94.50, 'canceled', 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(16, 17, 24, 7, 2, '2025-04-08', '16:24:04', '21:55:35', 45.09, 'confirmed', 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(17, 18, 25, 5, 4, '2025-04-10', '18:48:09', '21:08:49', 37.35, 'confirmed', 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(18, 19, 26, 1, 2, '2025-03-15', '03:29:34', '23:06:32', 74.38, 'confirmed', 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(19, 20, 27, 5, 2, '2025-04-27', '12:48:07', '10:14:12', 82.18, 'pending', 1, 'Molestiae eveniet fuga doloremque quasi quidem officia suscipit.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(20, 21, 28, 8, 0, '2025-03-19', '19:32:24', '07:05:46', 29.86, 'canceled', 0, 'Nam tenetur fuga et deserunt dolor.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(21, 22, 29, 5, 2, '2025-04-22', '19:10:45', '04:03:11', 98.09, 'pending', 1, 'Amet minima repellendus nobis et qui provident.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(22, 23, 30, 6, 3, '2025-04-19', '05:34:31', '01:38:40', 66.29, 'pending', 0, 'In vero necessitatibus laudantium officiis iste molestiae.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(23, 24, 31, 6, 0, '2025-03-22', '21:29:43', '06:56:10', 23.10, 'canceled', 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(24, 25, 32, 6, 1, '2025-04-10', '00:05:32', '10:23:53', 25.05, 'pending', 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(25, 26, 33, 3, 4, '2025-04-26', '01:03:15', '11:08:04', 95.38, 'canceled', 0, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(26, 27, 34, 7, 1, '2025-04-20', '00:58:57', '21:13:37', 57.82, 'confirmed', 0, 'Ut eos voluptas voluptatum voluptate voluptas possimus.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(27, 28, 35, 2, 3, '2025-03-17', '00:55:40', '20:49:55', 30.95, 'confirmed', 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(28, 29, 36, 8, 3, '2025-04-03', '18:22:52', '22:10:45', 33.30, 'confirmed', 1, 'Quas rerum rerum nulla.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(29, 30, 37, 3, 3, '2025-04-10', '05:50:32', '11:29:33', 86.92, 'pending', 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(30, 31, 38, 5, 1, '2025-03-27', '13:03:38', '11:22:31', 22.64, 'pending', 0, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reservation_id` bigint(20) UNSIGNED NOT NULL,
  `person` varchar(150) NOT NULL,
  `score` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `reservation_id`, `person`, `score`, `is_active`, `comment`, `created_at`, `updated_at`) VALUES
(1, 21, 'Prof. Kaylee Fahey', 22, 1, 'Et deleniti nisi facilis reprehenderit.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(2, 22, 'Dr. Randi Sauer MD', 140, 0, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(3, 23, 'Krystina Champlin', 264, 0, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(4, 24, 'Mr. Vicente Langworth Jr.', 52, 1, 'Non vero error vel qui velit.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(5, 25, 'Myrtice Leannon', 40, 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(6, 26, 'Delfina Beahan', 186, 1, 'Optio aut incidunt molestiae sit quo earum eum.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(7, 27, 'Uriel Leffler', 95, 0, 'Et sapiente vel nisi est qui vel nobis est.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(8, 28, 'Rosalinda Schiller', 12, 1, NULL, '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(9, 29, 'Monte Ankunding', 71, 0, 'Officiis minima tenetur eos sed.', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(10, 30, 'Leon Gislason II', 258, 1, 'Sed fugiat repellat tempore repellat.', '2025-04-10 12:25:51', '2025-04-10 12:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('AVgaoMHkG4LG5HahbGmJB7dwcjPNoqSucDWJ7YFa', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:137.0) Gecko/20100101 Firefox/137.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieFY2UVl3QXQ3SGgzVGNraGg5U0lXZXBzc0lZUzlBaDhMVkprMGdJTiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI4OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvb3JkZXJzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1744295608),
('LbsUESC1UUz4W6Hq4wCMWHB8muIdIh3ur0rAyRXi', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:137.0) Gecko/20100101 Firefox/137.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidFpmZG5aVmpST0kxTTJzQXNXWmpmUktSNkdPTmh1N0Q3N2prTUNnZCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2NhcnQiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2NhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1744295643),
('mgcKUDgck2WuKt0kdLffTHYE73jTFwqOAdwbVzUx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:137.0) Gecko/20100101 Firefox/137.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWjBqdlJRZkVteXp6a2pIU21HQUZqMGl6U3VZQTlNaU9ySE4wQjJzcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1744295644);

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
  `role` enum('worker','user','admin') NOT NULL DEFAULT 'user',
  `last_login` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `comment` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `last_login`, `is_active`, `comment`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2025-04-10 12:25:51', '$2y$12$K0oG5fhtxMrItNPhejeIPu0uBndiDPAalJKcXi3IVtcoNbusIuO6W', 'admin', '2025-04-10 12:25:51', 1, NULL, 'E5qNduDuNM', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(2, 'Mrs. Michelle Kautzer Jr.', 'upton.shany@example.net', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'user', '2025-04-10 12:25:51', 1, NULL, 'ak8cHebkgP', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(3, 'Ike Konopelski', 'parker.monroe@example.net', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'admin', '2025-04-10 12:25:51', 1, NULL, 'MkynJ4S3Sg', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(4, 'Christa Lakin', 'missouri.schinner@example.net', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'worker', '2025-04-10 12:25:51', 1, NULL, '5NOVIU4IZj', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(5, 'Abbey Yost', 'sammie86@example.org', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'worker', '2025-04-10 12:25:51', 1, NULL, 'rePQgovfDI', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(6, 'Myron Homenick', 'sadie53@example.com', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'user', '2025-04-10 12:25:51', 1, NULL, 'fU70tezv9N', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(7, 'Cloyd Hudson', 'lschaden@example.com', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'admin', '2025-04-10 12:25:51', 1, NULL, 'f5jDbIWs40', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(8, 'Dr. Einar Collier PhD', 'sallie.howell@example.com', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'admin', '2025-04-10 12:25:51', 1, NULL, 'ugaMZlyzkd', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(9, 'Nona Raynor', 'qkonopelski@example.com', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'admin', '2025-04-10 12:25:51', 1, NULL, 'tt31V3cFOR', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(10, 'Summer Hartmann', 'vbeer@example.org', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'user', '2025-04-10 12:25:51', 1, NULL, '5i3NhMRCXW', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(11, 'Prof. Ole Kilback', 'alejandra.gutmann@example.com', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'admin', '2025-04-10 12:25:51', 1, NULL, 'B5EfSqhOJH', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(12, 'Mr. Allen White', 'gust.prosacco@example.net', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'worker', '2025-04-10 12:25:51', 1, NULL, 'EIM0DxajJ7', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(13, 'Alexandra Wisozk MD', 'raleigh82@example.net', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'admin', '2025-04-10 12:25:51', 1, NULL, 'SHrnXhTkDP', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(14, 'Angeline Kuhn', 'tad33@example.net', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'user', '2025-04-10 12:25:51', 1, NULL, 'OYZOOX3Qzy', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(15, 'Mary Will I', 'santos.schinner@example.com', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'admin', '2025-04-10 12:25:51', 1, NULL, 'rN5K15aHT1', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(16, 'Isabell Hahn III', 'mgleichner@example.net', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'worker', '2025-04-10 12:25:51', 1, NULL, 'IrwTtnITs4', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(17, 'Mrs. Reina Smith', 'sauer.meagan@example.org', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'user', '2025-04-10 12:25:51', 1, NULL, 'qwCW91nu8C', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(18, 'Jailyn Emard', 'langworth.hortense@example.com', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'user', '2025-04-10 12:25:51', 1, NULL, 'Km4WsHn8QY', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(19, 'Prof. Jordan Altenwerth', 'welch.juliana@example.net', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'user', '2025-04-10 12:25:51', 1, NULL, '7CZEt0kPpl', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(20, 'Rosetta Christiansen', 'jay38@example.org', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'admin', '2025-04-10 12:25:51', 1, NULL, 'WWl1JxJ0gN', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(21, 'Prof. Darien Marvin II', 'quinton38@example.net', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'admin', '2025-04-10 12:25:51', 1, NULL, 'G457gfUDXN', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(22, 'Creola Gleichner', 'miracle44@example.com', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'admin', '2025-04-10 12:25:51', 1, NULL, 'xcmehkPEU2', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(23, 'Kavon Pfannerstill', 'carol.beatty@example.net', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'worker', '2025-04-10 12:25:51', 1, NULL, 'gHwMC7SBs1', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(24, 'Haylee Kozey PhD', 'rdickens@example.com', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'worker', '2025-04-10 12:25:51', 1, NULL, '5t5irfSK9z', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(25, 'Mrs. Icie Bosco', 'wkunde@example.com', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'worker', '2025-04-10 12:25:51', 1, NULL, 'Hh0o4OMCK3', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(26, 'Delbert Hahn MD', 'ustiedemann@example.org', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'admin', '2025-04-10 12:25:51', 1, NULL, '77bD9R86Kz', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(27, 'Robert Reynolds', 'barbara.weber@example.org', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'worker', '2025-04-10 12:25:51', 1, NULL, 'ESrtUzcIUd', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(28, 'Dr. John Will IV', 'turner.dianna@example.org', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'user', '2025-04-10 12:25:51', 1, NULL, 'cLuEVvtDGL', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(29, 'Stewart Beahan', 'uriah.kovacek@example.com', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'worker', '2025-04-10 12:25:51', 1, NULL, 'iVs5Kd65AD', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(30, 'Yesenia Fay', 'juliet.mccullough@example.org', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'admin', '2025-04-10 12:25:51', 1, NULL, 'EterDYLzji', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(31, 'Miss Marcelle Batz IV', 'cassandre.waters@example.net', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'admin', '2025-04-10 12:25:51', 1, NULL, 'IlQp0Sjnrj', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(32, 'Ms. Catherine Hamill', 'camila40@example.com', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'worker', '2025-04-10 12:25:51', 1, NULL, 'C0TKnsBEsS', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(33, 'Dr. Gage Mann', 'tromp.frances@example.com', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'admin', '2025-04-10 12:25:51', 1, NULL, 'BdJyvCZ3lk', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(34, 'Alexander Nolan', 'kip51@example.net', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'user', '2025-04-10 12:25:51', 1, NULL, '8u3bAEkZ6W', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(35, 'Americo Wunsch Sr.', 'larkin.andrew@example.net', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'worker', '2025-04-10 12:25:51', 1, NULL, 'bnBpZWdYSu', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(36, 'Danny Jakubowski V', 'kovacek.aiden@example.net', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'admin', '2025-04-10 12:25:51', 1, NULL, 'w8poYwUNKH', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(37, 'Velda Mitchell', 'stewart.wiza@example.com', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'worker', '2025-04-10 12:25:51', 1, NULL, 'B5LUO3Vd6h', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(38, 'Lura Flatley', 'xbeahan@example.com', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'worker', '2025-04-10 12:25:51', 1, NULL, 'YWgzJkpDyM', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(39, 'Mr. Paolo Smith III', 'grimes.cecilia@example.net', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'admin', '2025-04-10 12:25:51', 1, NULL, 'eMM0jCCNP7', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(40, 'Mrs. Audra Lakin', 'cruickshank.holden@example.com', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'admin', '2025-04-10 12:25:51', 1, NULL, 'dLfkI1U574', '2025-04-10 12:25:51', '2025-04-10 12:25:51'),
(41, 'Chelsie Dach', 'yhowell@example.com', '2025-04-10 12:25:51', '$2y$12$VuMgbCawEjqwcW4ReGn7.epIS.f1z4uNA5v0ALwh/NDutw3/qY1Tu', 'user', '2025-04-10 12:25:51', 1, NULL, 'KHdEIF2Cak', '2025-04-10 12:25:51', '2025-04-10 12:25:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lanes`
--
ALTER TABLE `lanes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_product_id_foreign` (`product_id`),
  ADD KEY `orders_reservation_id_foreign` (`reservation_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`),
  ADD KEY `reservations_lane_id_foreign` (`lane_id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scores_reservation_id_foreign` (`reservation_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lanes`
--
ALTER TABLE `lanes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orders_reservation_id_foreign` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_lane_id_foreign` FOREIGN KEY (`lane_id`) REFERENCES `lanes` (`id`),
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_reservation_id_foreign` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

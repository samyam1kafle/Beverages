-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 29, 2019 at 01:44 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-com`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_users`
--

DROP TABLE IF EXISTS `all_users`;
CREATE TABLE IF NOT EXISTS `all_users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL,
  `Is_active` tinyint(1) NOT NULL DEFAULT '1',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `all_users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `all_users`
--

INSERT INTO `all_users` (`id`, `name`, `image`, `role`, `Is_active`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'NAB', '1568994468media-share-0-02-06-a8ea23a680cb3b66116e29f0e6bb466612b7d965c6ccb0f87a5f9f27b1837049-c7962e2e-9b1d-489a-a419-11e0981ffd8d.jpg', 41, 1, 'nepalallbeverage@gmail.com', '2019-06-12 03:56:04', '$2y$10$6lSChD/NV9z.VlkmPmM5xeeJSgnHvUzPYyA/cC4GC9tpUe.ZbjDHG', 'tLkRy24CiLLVEh4O3UVhc6mauCEeLmwz4xejOqjJoG4qSrG0WNNBedD9d0Vc', '2019-06-12 03:54:31', '2019-09-20 15:47:49'),
(2, 'samyam', '15619438703.5.jpg', 41, 1, 'samyam1kafle@gmail.com', '2019-06-12 04:50:00', '$2y$10$WhZPUC5Janm7gWndJfpKAuPY5unYtzkqUv7E15SBCOQLj/vqdcIEC', '6yHG3GlaL7QTMrMFNq47fULu6eMUZynC0C2PEpldY5XwaBFciU1yMN7OwakC', '2019-06-12 04:49:00', '2019-07-01 01:17:50'),
(4, 'kapil', '1562205191war_pig_logo_by_djray1985-d47tcv4.png', 44, 1, 'kapilbhusal12@gmail.com', NULL, '$2y$10$fHaMi5/1jhg.xuJIa2MfG.cnpIIX.RU9QHjU4Lm9knYD01Eznq0b.', NULL, '2019-07-04 01:53:12', '2019-07-04 01:53:12'),
(3, 'Manoj', '1561255213MI0003397465.jpg', 44, 1, 'manozkhanal3@gmail.com', NULL, '$2y$10$Z7xyVkFc.MfGwiXCfPlX9u7FPtIPxcoxILVMwHLF.qRwRLwwMWQAW', NULL, '2019-06-23 02:00:13', '2019-06-23 02:00:13'),
(5, 'nabin', '1562743270media-share-0-02-06-1fd047266b0c8a6a908b6e481a3edc6393e536f8e845fb61d186850ba8b94b06-fae48b69-1a27-4a34-9240-76d744976056.jpg', 44, 1, 'zibrahimovich99@gmail.com', '2019-07-10 07:24:06', '$2y$10$6sUILzty8uMmwNCX9g7nLurxZHN5GTxw2XDZgq48Ra2767tZalTMi', NULL, '2019-07-10 07:21:11', '2019-07-10 07:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `status_id`, `created_at`, `updated_at`) VALUES
(9, '1562295546create-a-web-application-on-php-laravel-framework.jpg', 6, '2019-07-05 02:59:06', '2019-07-05 02:59:06'),
(10, '1562295560maxresdefault.jpg', 7, '2019-07-05 02:59:20', '2019-07-05 02:59:20'),
(11, '15622958173472656-avengers-endgame-00.jpg', 7, '2019-07-05 03:03:37', '2019-07-05 03:03:37'),
(12, '1562421535logo.png', 6, '2019-07-06 13:58:56', '2019-07-06 13:58:56'),
(8, '1562295283laravel-simple-leader.png', 7, '2019-07-05 02:54:43', '2019-07-05 02:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `banner_statuses`
--

DROP TABLE IF EXISTS `banner_statuses`;
CREATE TABLE IF NOT EXISTS `banner_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner_statuses`
--

INSERT INTO `banner_statuses` (`id`, `title`, `created_at`, `updated_at`) VALUES
(7, 'offer', '2019-07-04 00:40:50', '2019-07-04 00:40:50'),
(6, 'featured', '2019-07-04 00:40:37', '2019-07-04 00:40:37');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `offer_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `real_price` bigint(20) NOT NULL,
  `offered_price` bigint(20) NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `offer_id`, `title`, `offer_product_name`, `real_price`, `offered_price`, `slug`, `image`, `description`, `category_id`, `created_at`, `updated_at`) VALUES
(5, 0, 'sadas', 'ddddd', 7899, 1500, 'ddddd', '1557991026Content-writer.jpg', '<p>asdasd</p>', 1, '2019-05-16 01:32:06', '2019-05-16 01:32:06'),
(2, 0, 'New year Sale', 'Blenders Pride', 8590, 8000, 'blenders-pride', '1556176368th.jpg', '<p>hurry grab one</p>', 1, '2019-04-25 01:27:48', '2019-04-25 01:27:48'),
(4, 0, 'Tihar Sale', 'haldiram', 260, 200, 'blenders-pride-1', '1556779053Haldiram-Delhi-Khatta-Meetha.jpg', '<p>Nice stuffs</p>', 15, '2019-05-02 00:52:33', '2019-05-02 00:54:06'),
(6, 0, 'ran', 'nice', 7899, 777, 'nice', '15603397591_m7Kktezf98gz6Adpl5DGBQ.jpeg', '<p>adsasdasdasd</p>', 28, '2019-06-12 05:57:39', '2019-06-12 05:57:39');

-- --------------------------------------------------------

--
-- Table structure for table `blog_reviews`
--

DROP TABLE IF EXISTS `blog_reviews`;
CREATE TABLE IF NOT EXISTS `blog_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_id` int(11) NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `star` decimal(8,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_reviews_blog_id_index` (`blog_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_reviews`
--

INSERT INTO `blog_reviews` (`id`, `user_id`, `email`, `blog_id`, `comment`, `star`, `status`, `created_at`, `updated_at`) VALUES
(8, 2, 'samyam1kafle@gmail.com', 6, 'jnj', NULL, 1, '2019-06-18 11:09:06', '2019-06-18 11:09:06'),
(9, 2, 'samyam1kafle@gmail.com', 6, 'nice work', '3.00', 1, '2019-06-18 11:09:20', '2019-06-18 11:09:20'),
(10, 2, 'samyam1kafle@gmail.com', 5, 'nice bog', '5.00', 1, '2019-06-27 02:47:56', '2019-06-27 02:47:56'),
(11, 2, 'samyam1kafle@gmail.com', 5, 'nice work', NULL, 1, '2019-06-27 02:48:34', '2019-06-27 02:48:34'),
(13, 1, 'nepalallbeverage@gmail.com', 6, 'laksdhasjkdh k haskdh lkas;h', '4.00', 1, '2019-08-14 02:57:10', '2019-08-14 02:57:10');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_volume` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1 LTR',
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `product_name`, `product_volume`, `price`, `quantity`, `user_email`, `session_id`, `created_at`, `updated_at`) VALUES
(94, 36, 'Surya Classic', '1 LTR', 500, 3, 'zibrahimovich99@gmail.com', 'iFgUhiuVfPBHQmqeT1BpyscwOmzcW1KSazvXXywt', '2019-07-10 07:25:08', '2019-07-10 07:25:08'),
(89, 27, 'Music', '1 LTR', 7000, 2, 'nepalallbeverage@gmail.com', 'LJVFimEptKLbqHFDszJtq8f38rJqsI9M9VWqGaM8', '2019-06-28 02:36:57', '2019-06-28 02:36:57'),
(90, 57, 'Russlan Vodka', '1 LTR', 4800, 1, 'nepalallbeverage@gmail.com', 'LJVFimEptKLbqHFDszJtq8f38rJqsI9M9VWqGaM8', '2019-06-28 02:37:08', '2019-06-28 02:37:08'),
(92, 28, 'Haldiram', '1 LTR', 350, 2, 'nepalallbeverage@gmail.com', '5cwmWCXpS5XN1r74MvSw79UOmxpMqxLXqiQnHJQT', '2019-07-06 14:00:31', '2019-07-06 14:00:31'),
(93, 27, 'Music', '1 LTR', 7000, 1, 'nepalallbeverage@gmail.com', '5cwmWCXpS5XN1r74MvSw79UOmxpMqxLXqiQnHJQT', '2019-07-06 14:00:44', '2019-07-06 14:00:44'),
(87, 31, 'sad', '1 LTR', 4500, 1, 'samyam1kafle@gmail.com', '1ETVu3mqamUmG5xEQEhqpmUECvGvpcTWgkzjH4lc', '2019-06-18 11:33:23', '2019-06-18 11:33:23'),
(88, 36, 'Surya Classic', '1 LTR', 500, 2, 'samyam1kafle@gmail.com', 'gBliAS0Q9Exh4tSfqjjrvkHYm7DVdexMDFR5e0Yl', '2019-06-27 04:22:35', '2019-06-27 04:22:35'),
(78, 59, 'nepal ice', '1 LTR', 490, 3, 'samyam1kafle@gmail.com', '5lBGgwB4bEt94UpLVKn346dEUbYSQ2mL6z4Bym2K', '2019-06-16 06:05:25', '2019-06-16 06:05:25'),
(77, 36, 'Surya Classic', '1 LTR', 500, 2, 'samyam1kafle@gmail.com', '5lBGgwB4bEt94UpLVKn346dEUbYSQ2mL6z4Bym2K', '2019-06-16 06:02:45', '2019-06-16 06:02:45'),
(95, 60, 'wingston', '1 LTR', 300, 10, 'nepalallbeverage@gmail.com', '2LJNOUGsjque9UoTRktaM8OkUdYWdBqlKxnCbBx5', '2019-08-14 03:00:17', '2019-08-14 03:00:17'),
(96, 31, 'sad', '1 LTR', 4500, 1, 'nepalallbeverage@gmail.com', '2LJNOUGsjque9UoTRktaM8OkUdYWdBqlKxnCbBx5', '2019-08-14 03:01:40', '2019-08-14 03:01:40'),
(97, 61, 'dragon eyes', '1 LTR', 4588, 6, 'nepalallbeverage@gmail.com', 'moMIMtN6yJvyi25wS0gOEiE6HWM5NsJfi2PnqunX', '2019-09-20 15:46:12', '2019-09-20 15:46:12'),
(98, 27, 'Music', '1 LTR', 7000, 1, 'nepalallbeverage@gmail.com', 'ZVCC1SFqLemzUYzXtbF7isXgYWl7lY28YD9Zr5SQ', '2019-09-26 15:21:37', '2019-09-26 15:21:37');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_slug_index` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `created_at`, `updated_at`, `description`, `parent_id`, `slug`) VALUES
(1, 'Wishkey', NULL, '2019-04-30 01:38:27', 'All Kind Of Wishkey here', 0, 'wishkey'),
(6, 'Brandey', '2019-04-22 10:45:30', '2019-04-30 01:38:24', 'All Kind Of Brandey here', 0, 'brandey'),
(7, 'Wine', '2019-04-22 23:41:52', '2019-04-30 01:38:20', 'All Kind Of Wines', 0, 'wine'),
(10, 'Rum', '2019-04-23 00:55:29', '2019-04-30 01:38:08', 'Finest Product in nepal', 0, 'rum'),
(12, 'Sweet Wine', '2019-04-23 04:32:00', '2019-04-30 01:37:58', 'all sort of Sweet wines', 7, 'sweet-wine'),
(13, 'red wine', '2019-04-23 06:53:44', '2019-04-30 01:37:49', 'sweet wine', 7, 'red-wine'),
(14, 'Taquila', '2019-04-26 11:02:26', '2019-05-03 09:17:41', 'All kind of Taquila here', 1, 'taquila'),
(25, 'Cigarettes', '2019-05-26 05:19:49', '2019-05-26 05:19:49', 'All cigarettes here', 0, 'cigarettes'),
(24, 'Snacks', '2019-05-26 02:26:18', '2019-06-07 01:57:10', 'All snacks', 0, 'ram'),
(27, 'beer', '2019-06-07 05:08:37', '2019-06-07 05:08:37', 'beer', 26, 'beer'),
(26, 'can beer', '2019-06-07 05:07:40', '2019-06-07 05:07:40', 'beer', 20, 'can-beer-1'),
(20, 'Can Beer', '2019-05-16 22:01:25', '2019-05-16 22:01:25', 'can beer here', 0, 'can-beer'),
(28, 'snacks', '2019-06-07 22:46:42', '2019-06-07 22:46:42', 'all fresh', 24, 'snacks'),
(29, 'rum', '2019-06-27 01:36:23', '2019-06-27 01:36:23', 'reh', 10, 'rum-1');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(12, '2014_10_12_000000_create_users_table', 1),
(13, '2014_10_12_100000_create_password_resets_table', 1),
(14, '2019_04_16_082547_create_products_table', 1),
(15, '2019_04_18_192538_create_categories_table', 1),
(16, '2019_04_19_114626_create_roles_table', 2),
(17, '2019_04_23_051924_add_discription_column_to_categories', 3),
(21, '2019_04_23_054359_add_parent_id_column_to_categories', 4),
(26, '2019_04_23_111103_create_blogs_table', 5),
(27, '2019_04_23_113439_add_offer_to_products', 5),
(28, '2019_04_24_075618_add_offer_price_to_products', 6),
(31, '2019_04_25_051142_create_blogs_table', 7),
(32, '2019_04_25_103849_create_news_table', 8),
(33, '2019_04_28_072823_add_featured_to_products', 9),
(34, '2019_04_30_070745_add_slug_to_categories', 10),
(35, '2019_04_30_115100_create_reviews_table', 11),
(36, '2019_05_05_070154_add_approve_status_to_reviews', 12),
(63, '2019_05_07_102139_create_cart_table', 21),
(64, '2019_05_07_110208_add_volume_to_products', 21),
(65, '2019_05_15_100746_create_all_users_table', 21),
(66, '2019_06_11_061044_create_blog_reviews_table', 22),
(50, '2019_06_06_093251_create_wishists_table', 18),
(67, '2019_05_31_064648_create_subscribers_table', 23),
(68, '2019_06_06_093251_create_wishlists_table', 24),
(59, '2019_06_12_080726_add_star_to_reviews', 20),
(69, '2019_06_12_094629_create_reviews_table', 24),
(71, '2019_06_13_080651_create_shippings_table', 25),
(91, '2019_07_01_085923_create_banners_table', 27),
(88, '2019_06_16_104016_create_orders_table', 26),
(89, '2019_06_18_074335_create_order_products_table', 26),
(92, '2019_07_02_083859_create_banner_statuses_table', 27);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `about` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_category_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `about`, `title`, `image`, `description`, `news_category_id`, `created_at`, `updated_at`) VALUES
(1, 'offers', 'buy 1 get 1 free', '', 'buy our product and get a product for free\r\nfor limited time only .', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `all_user_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `all_user_id`, `total`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 2, 4885, 0, '2019-06-18 11:41:55', '2019-06-18 11:41:55'),
(2, 2, 4885, 0, '2019-06-18 11:43:13', '2019-06-18 11:43:13'),
(3, 2, 1170, 0, '2019-06-27 04:22:59', '2019-06-27 04:22:59'),
(4, 1, 15030, 0, '2019-06-28 02:38:15', '2019-06-28 02:38:15'),
(5, 1, 35146, 0, '2019-06-28 02:38:15', '2019-06-28 02:38:15'),
(6, 1, 849, 0, '2019-07-06 14:02:33', '2019-07-06 14:02:33'),
(7, 1, 9138, 0, '2019-07-06 14:02:33', '2019-07-06 14:02:33'),
(8, 5, 1705, 0, '2019-07-10 07:26:49', '2019-07-10 07:26:49'),
(9, 1, 3280, 0, '2019-08-14 03:07:12', '2019-08-14 03:07:12'),
(10, 1, 11355, 0, '2019-08-14 03:07:13', '2019-08-14 03:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

DROP TABLE IF EXISTS `order_products`;
CREATE TABLE IF NOT EXISTS `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `products_id`, `order_id`, `qty`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 87, 1, 1, 4885.00, NULL, NULL),
(2, 87, 2, 1, 4885.00, NULL, NULL),
(3, 88, 3, 2, 1170.00, NULL, NULL),
(4, 89, 4, 2, 15030.00, NULL, NULL),
(5, 90, 5, 1, 35146.00, NULL, NULL),
(6, 92, 6, 2, 849.00, NULL, NULL),
(7, 93, 7, 1, 9138.00, NULL, NULL),
(8, 94, 8, 3, 1705.00, NULL, NULL),
(9, 95, 9, 10, 3280.00, NULL, NULL),
(10, 96, 10, 1, 11355.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `offer` tinyint(1) NOT NULL DEFAULT '0',
  `offer_price` bigint(20) NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `stock` int(11) NOT NULL,
  `volume` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1 LTR',
  PRIMARY KEY (`id`),
  KEY `products_name_index` (`name`),
  KEY `products_featured_index` (`featured`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `description`, `category_id`, `slug`, `created_at`, `updated_at`, `offer`, `offer_price`, `featured`, `stock`, `volume`) VALUES
(59, 'nepal ice', '15599674643.5.jpg', 490, '<ul>\r\n	<li>asjkdn</li>\r\n	<li>jasjdn</li>\r\n	<li>,ansd</li>\r\n	<li>naskdj</li>\r\n	<li>jabdkj</li>\r\n	<li>naskfdjoi</li>\r\n</ul>', 1, 'nepal-ice', '2019-06-07 22:32:45', '2019-06-16 06:05:25', 0, 0, 1, 12, '1 LTR'),
(27, 'Music', '1558520039Khukri-XXX-Rum-1.jpg', 7590, '<p>addasas</p>', 1, 'music-1', '2019-05-02 00:40:45', '2019-09-26 15:21:37', 1, 7000, 1, 0, '1 LTR'),
(28, 'Haldiram', '1556778377snack.jpg', 400, '<p>Nice product grab your snack&nbsp;fast.</p>', 24, 'music-2', '2019-05-02 00:41:17', '2019-07-06 14:00:31', 1, 350, 1, 1, '1 LTR'),
(31, 'sad', '1557988142th (1).jpg', 4800, '<p>nice wishkey</p>', 1, 'sad', '2019-05-16 00:44:03', '2019-08-14 03:01:40', 1, 4500, 1, 2, '1 LTR'),
(36, 'Surya Classic', '1558868801126.jpg', 560, '<p>Want a good partner with your Wishkey ?&nbsp;<br />\r\nThen you should go with Surya classic . A good friend For You . Have more fun with the comfort with surya&nbsp;</p>', 1, 'surya-classic', '2019-05-26 05:21:42', '2019-07-10 07:25:08', 1, 500, 1, 3, '1 LTR'),
(58, 'Scotch', '1559801713img_7900.jpg', 5600, '<p>asdfasfd</p>', 1, 'ram', '2019-06-06 00:30:15', '2019-06-07 04:42:15', 0, 0, 1, 0, '1 LTR'),
(57, 'Russlan Vodka', '1559736766th (1).jpg', 4800, '<p>vodka in reasonable price grab yours fast limited in stock.</p>', 1, 'russlan-vodka', '2019-06-05 06:27:46', '2019-06-28 02:37:08', 0, 0, 1, 13, '1 LTR'),
(60, 'wingston', '1561942884images.jpg', 300, '<p>nivevuya&nbsp; kjasf o oihafsoi yjjbf mbh&nbsp; kkashgfjkagfiu&nbsp; urug j.</p>', 25, 'wingston', '2019-07-01 01:01:24', '2019-08-14 03:00:17', 0, 0, 1, 30, '1 LTR'),
(61, 'dragon eyes', '1562743809media-share-0-02-03-1afa70b87f33ad969560949ba84ac4c1db1b85b81e5604b48e3043d31fda90d6-d49e5f8b-4281-4ac0-b695-9f647b0bd2af.jpg', 4588, '<ul>\r\n	<li>alskdhkkasjdlk</li>\r\n	<li>askdhaskl</li>\r\n	<li>aksdnlashd</li>\r\n	<li>sabdlkashflk</li>\r\n	<li>ksdfklashfk</li>\r\n	<li>kasfhljhfsalsahgfjk;</li>\r\n	<li>askdasd</li>\r\n</ul>', 10, 'dragon-eyes', '2019-07-10 07:30:10', '2019-09-20 15:46:12', 0, 0, 1, 39, '1 LTR');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `star` decimal(8,2) DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  `author_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_product_id_index` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `star`, `author_id`, `author_email`, `review`, `author`, `created_at`, `updated_at`) VALUES
(1, 27, '4.00', 1, 'nepalallbeverage@gmail.com', 'nice', 'samyam', '2019-06-12 04:35:01', '2019-06-12 04:35:01'),
(2, 27, '4.00', 2, 'samyam1kafle@gmail.com', 'asdasd', 'samyam', '2019-06-12 04:53:33', '2019-06-12 04:53:33'),
(3, 31, '3.00', 2, 'samyam1kafle@gmail.com', 'cool product', 'samyam', '2019-06-12 05:00:51', '2019-06-12 05:00:51'),
(4, 31, '5.00', 2, 'samyam1kafle@gmail.com', 'kjb', 'samyam', '2019-06-12 05:03:13', '2019-06-12 05:03:13'),
(5, 27, '2.00', 1, 'nepalallbeverage@gmail.com', 'kjn jk', 'samyam', '2019-06-12 05:14:22', '2019-06-12 05:14:22'),
(6, 27, '3.00', 2, 'samyam1kafle@gmail.com', 'njnjinj', 'samyam', '2019-06-12 05:17:07', '2019-06-12 05:17:07'),
(7, 27, '2.00', 2, 'samyam1kafle@gmail.com', 'mmmmm', 'samyam', '2019-06-12 05:17:14', '2019-06-12 05:17:14'),
(8, 57, '4.00', 2, 'samyam1kafle@gmail.com', 'okey', 'samyam', '2019-06-18 11:00:37', '2019-06-18 11:00:37'),
(9, 58, '3.00', 2, 'samyam1kafle@gmail.com', 'nice', 'samyam', '2019-06-27 04:22:01', '2019-06-27 04:22:01'),
(10, 60, '3.00', 2, 'samyam1kafle@gmail.com', 'askd', 'samyam', '2019-07-01 01:09:25', '2019-07-01 01:09:25'),
(11, 27, '4.00', 1, 'nepalallbeverage@gmail.com', 'nice product', 'NAB', '2019-07-10 07:14:58', '2019-07-10 07:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(41, 'Admin', '2019-05-22 04:49:42', '2019-05-22 04:49:42'),
(44, 'Subscribers', '2019-05-22 05:40:36', '2019-05-22 05:40:36'),
(36, 'Sales Executive', '2019-04-22 01:14:58', '2019-05-16 01:28:27');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

DROP TABLE IF EXISTS `shippings`;
CREATE TABLE IF NOT EXISTS `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `landline` bigint(20) DEFAULT NULL,
  `Country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Nepal',
  `state` int(11) NOT NULL,
  `City` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shippings_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `user_id`, `user_name`, `user_email`, `mobile`, `landline`, `Country`, `state`, `City`, `address1`, `address2`, `created_at`, `updated_at`) VALUES
(1, 1, 'samyam', 'nepalallbeverage@gmail.com', 9815948146, 9862636810, 'Nepal', 3, 'Kathmandu', 'Kadhaghari', 'Baneswor', '2019-06-13 04:34:15', '2019-06-28 02:38:15'),
(2, 2, 'samyam', 'samyam1kafle@gmail.com', 9847561531, 9876543211, 'Nepal', 3, 'Kathmandu', 'Thimi', 'new baneswor', '2019-06-16 04:02:54', '2019-06-18 02:11:50'),
(3, 5, 'nabin', 'zibrahimovich99@gmail.com', 9814455554, 9854671235, 'Nepal', 3, 'Kathmandu', 'duwakot mod', 'sallaghari', '2019-07-10 07:26:30', '2019-07-10 07:26:49');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

DROP TABLE IF EXISTS `subscribers`;
CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscribers_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'samyam1kafle@gmail.com', 1, '2019-06-27 04:24:25', '2019-06-27 04:24:25'),
(2, 'pra@pravinb.com.np', 1, '2019-07-02 02:09:20', '2019-07-02 02:09:20'),
(3, 'kapilbhusal12@gmail.com', 1, '2019-07-04 01:51:09', '2019-07-04 01:51:09'),
(4, 'zibrahimovich99@gmail.com', 1, '2019-07-10 07:16:40', '2019-07-10 07:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL,
  `Is_active` tinyint(1) NOT NULL DEFAULT '1',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
CREATE TABLE IF NOT EXISTS `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(7, 2, 28, '2019-06-27 02:50:03', '2019-06-27 02:50:03'),
(8, 1, 31, '2019-08-14 03:01:10', '2019-08-14 03:01:10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

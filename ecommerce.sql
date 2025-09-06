-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2022 at 04:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupons` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `returnorder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orders` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reports` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alluser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adminuserrole` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(25) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `brand`, `category`, `product`, `slider`, `coupons`, `shipping`, `returnorder`, `review`, `orders`, `blog`, `setting`, `stock`, `reports`, `alluser`, `adminuserrole`, `type`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 'superadmin@gmail.com', '2022-04-09 02:26:43', '$2y$10$SQE.RtCZA0FxI9/FGjb9keYavIy/ymLSP30.35PJjX6OJw3TGLCJC', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, 'etaxt24lUZuDQWn6gLEsyxLXB3mChjy9tJmbnIEo1GzrslaeYS6qMXezsG0K', NULL, '20220416015112.jpeg', '2022-04-09 02:26:43', '2022-05-12 09:05:29'),
(2, 'Admin 1', 'admin@gmail.com', NULL, '$2y$10$v3IfY1fOTGNLDeqlwfGSReM5tN3L7K7m0tcIDxIWvouyqkRJUZQ.S', '0895335490295', '1', '1', '1', '1', '1', '1', '1', '1', '1', NULL, NULL, '1', NULL, NULL, NULL, 2, NULL, NULL, '202205121804avatar-1.png', '2022-05-12 11:02:41', '2022-05-12 11:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `post_title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_details_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `category_id`, `post_title_en`, `post_slug_en`, `post_image`, `post_details_en`, `created_at`, `updated_at`) VALUES
(1, 2, 'okkk', 'okkk', 'upload/post/1727068193986832.png', '<p>Artikelokkkkkkkkkkkkkkkkkkkkk</p>', '2022-03-11 21:49:51', NULL),
(2, 2, 'okkk', 'okkk', 'upload/post/1727068994608622.png', '<p>Artikelollllllllllllllllllllllllllllllllllllllllllll</p>', '2022-03-11 22:02:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_categories`
--

CREATE TABLE `blog_post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_category_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_category_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_post_categories`
--

INSERT INTO `blog_post_categories` (`id`, `blog_category_name_en`, `blog_category_slug_en`, `created_at`, `updated_at`) VALUES
(2, 'Ok', 'ok', '2022-03-11 21:47:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_slug`, `brand_image`, `created_at`, `updated_at`) VALUES
(1, 'Adidas', 'adidas', 'upload/brand/1726963965772172.jpeg', NULL, '2022-05-11 01:24:33'),
(2, 'Fila', 'fila', 'upload/brand/1727014810233066.jpeg', NULL, NULL),
(3, 'Puma', 'puma', 'upload/brand/1727015064536309.jpeg', NULL, NULL),
(4, 'New Balance', 'new-balance', 'upload/brand/1727015080674006.jpeg', NULL, NULL),
(5, 'Champion', 'champion', 'upload/brand/1727015098947747.jpeg', NULL, NULL),
(6, 'Vans', 'vans', 'upload/brand/1727015114666469.jpeg', NULL, NULL),
(7, 'Nike', 'nike', 'upload/brand/1727015206510797.jpeg', NULL, NULL),
(8, 'Superga', 'superga', 'upload/brand/1727016955208126.jpeg', NULL, NULL),
(9, 'Reebok', 'reebok', 'upload/brand/1727016967705456.jpeg', NULL, NULL),
(10, 'Converse', 'converse', 'upload/brand/1727016992297404.jpeg', NULL, NULL),
(11, 'Kickers', 'kickers', 'upload/brand/1727017008381817.jpeg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `category_icon`, `created_at`, `updated_at`) VALUES
(1, 'Wanita', 'wanita', 'fa fa-female', NULL, '2022-03-12 22:16:27'),
(2, 'Pria', 'pria', 'fa fa-male', NULL, NULL),
(3, 'Anak-Anak', 'anak-anak', 'fa fa-child', NULL, NULL),
(4, 'Pria Wanita', 'pria-wanita', 'fa fa-male', NULL, '2022-05-11 01:25:39');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_discount` int(11) NOT NULL,
  `coupon_validity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_discount`, `coupon_validity`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PROMO33', 20, '2023-03-31', 1, '2022-03-13 00:44:06', NULL),
(2, 'AKHIRBULAN', 30, '2022-02-29', 1, '2022-03-13 00:44:36', NULL);

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_02_02_203839_create_sessions_table', 1),
(7, '2021_02_02_212221_create_admins_table', 1),
(8, '2021_02_09_054528_create_brands_table', 1),
(9, '2021_02_09_111701_create_categories_table', 1),
(10, '2021_02_09_121910_create_sub_categories_table', 1),
(11, '2021_02_16_183944_create_sub_sub_categories_table', 1),
(12, '2021_02_16_204006_create_products_table', 1),
(13, '2021_02_16_205349_create_multi_imgs_table', 1),
(14, '2021_02_20_204829_create_sliders_table', 1),
(15, '2021_03_02_194613_create_wishlists_table', 1),
(16, '2021_03_03_211157_create_coupons_table', 1),
(17, '2021_03_03_222308_create_ship_divisions_table', 1),
(18, '2021_03_09_183956_create_ship_districts_table', 1),
(19, '2021_03_09_194733_create_ship_states_table', 1),
(20, '2021_03_14_203654_create_orders_table', 1),
(21, '2021_03_14_203901_create_order_items_table', 1),
(22, '2021_03_24_183649_create_blog_post_categories_table', 1),
(23, '2021_03_24_194838_create_blog_posts_table', 1),
(24, '2021_03_24_223430_create_site_settings_table', 1),
(25, '2021_03_26_194141_create_seos_table', 1),
(26, '2021_03_27_192140_create_reviews_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `multi_imgs`
--

CREATE TABLE `multi_imgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_imgs`
--

INSERT INTO `multi_imgs` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'upload/products/multi-image/1726964572942534.png', '2022-03-10 18:22:39', NULL),
(2, 1, 'upload/products/multi-image/1726964573617423.png', '2022-03-10 18:22:39', NULL),
(3, 1, 'upload/products/multi-image/1726964574245077.png', '2022-03-10 18:22:40', NULL),
(4, 1, 'upload/products/multi-image/1726964575077616.png', '2022-03-10 18:22:41', NULL),
(5, 1, 'upload/products/multi-image/1726964575850312.png', '2022-03-10 18:22:42', NULL),
(6, 2, 'upload/products/multi-image/1727060945305072.png', '2022-03-11 00:40:07', '2022-03-11 19:54:34'),
(10, 3, 'upload/products/multi-image/1726989054608938.png', '2022-03-11 00:51:46', NULL),
(11, 3, 'upload/products/multi-image/1726989055422517.png', '2022-03-11 00:51:47', NULL),
(12, 3, 'upload/products/multi-image/1726989056373741.png', '2022-03-11 00:51:48', NULL),
(13, 3, 'upload/products/multi-image/1726989057474452.png', '2022-03-11 00:51:49', NULL),
(14, 3, 'upload/products/multi-image/1726989058350126.png', '2022-03-11 00:51:50', NULL),
(15, 4, 'upload/products/multi-image/1726989408326515.png', '2022-03-11 00:57:24', NULL),
(16, 4, 'upload/products/multi-image/1726989409182332.png', '2022-03-11 00:57:24', NULL),
(17, 4, 'upload/products/multi-image/1726989409990600.png', '2022-03-11 00:57:25', NULL),
(18, 4, 'upload/products/multi-image/1726989410633969.webp', '2022-03-11 00:57:26', NULL),
(19, 5, 'upload/products/multi-image/1727015809195073.png', '2022-03-11 07:57:02', NULL),
(20, 5, 'upload/products/multi-image/1727015810150284.png', '2022-03-11 07:57:03', NULL),
(21, 5, 'upload/products/multi-image/1727015811125980.png', '2022-03-11 07:57:03', NULL),
(22, 5, 'upload/products/multi-image/1727015811971808.png', '2022-03-11 07:57:04', NULL),
(23, 5, 'upload/products/multi-image/1727015813301238.png', '2022-03-11 07:57:05', NULL),
(24, 5, 'upload/products/multi-image/1727015814199330.png', '2022-03-11 07:57:06', NULL),
(35, 1, 'upload/products/multi-image/1727162725769526.png', '2022-03-12 22:52:14', NULL),
(36, 1, 'upload/products/multi-image/1727162728729273.png', '2022-03-12 22:52:14', NULL),
(37, 1, 'upload/products/multi-image/1727162729043644.png', '2022-03-12 22:52:15', NULL),
(38, 1, 'upload/products/multi-image/1727162729390489.png', '2022-03-12 22:52:15', NULL),
(39, 1, 'upload/products/multi-image/1727162729678151.png', '2022-03-12 22:52:15', NULL),
(40, 1, 'upload/products/multi-image/1727162729994406.png', '2022-03-12 22:52:16', NULL),
(41, 2, 'upload/products/multi-image/1727163259686299.png', '2022-03-12 23:00:41', NULL),
(42, 2, 'upload/products/multi-image/1727163260067664.png', '2022-03-12 23:00:44', NULL),
(43, 2, 'upload/products/multi-image/1727163262991917.png', '2022-03-12 23:00:46', NULL),
(44, 2, 'upload/products/multi-image/1727163265635425.png', '2022-03-12 23:00:54', NULL),
(45, 2, 'upload/products/multi-image/1727163273462869.png', '2022-03-12 23:00:56', NULL),
(46, 3, 'upload/products/multi-image/1727166664508940.png', '2022-03-12 23:55:00', NULL),
(47, 3, 'upload/products/multi-image/1727166677482820.png', '2022-03-12 23:55:15', NULL),
(48, 3, 'upload/products/multi-image/1727166692930056.png', '2022-03-12 23:55:29', NULL),
(49, 4, 'upload/products/multi-image/1727166912993530.png', '2022-03-12 23:58:45', NULL),
(50, 4, 'upload/products/multi-image/1727166913327019.png', '2022-03-12 23:58:45', NULL),
(51, 4, 'upload/products/multi-image/1727166913658152.png', '2022-03-12 23:58:48', NULL),
(52, 4, 'upload/products/multi-image/1727166916562563.png', '2022-03-12 23:58:51', NULL),
(58, 6, 'upload/products/multi-image/1727171133061607.png', '2022-03-13 01:06:02', NULL),
(59, 6, 'upload/products/multi-image/1727171146235745.png', '2022-03-13 01:06:17', NULL),
(60, 6, 'upload/products/multi-image/1727171161780273.png', '2022-03-13 01:06:17', NULL),
(61, 6, 'upload/products/multi-image/1727171162137962.png', '2022-03-13 01:06:17', NULL),
(62, 6, 'upload/products/multi-image/1727171162469730.png', '2022-03-13 01:06:18', NULL),
(63, 7, 'upload/products/multi-image/1727171608018898.png', '2022-03-13 01:13:23', NULL),
(64, 7, 'upload/products/multi-image/1727171608495871.png', '2022-03-13 01:13:25', NULL),
(65, 7, 'upload/products/multi-image/1727171611440948.png', '2022-03-13 01:13:26', NULL),
(66, 8, 'upload/products/multi-image/1727172279480845.png', '2022-03-13 01:24:05', NULL),
(67, 8, 'upload/products/multi-image/1727172282413499.png', '2022-03-13 01:24:06', NULL),
(68, 8, 'upload/products/multi-image/1727172282786912.png', '2022-03-13 01:24:06', NULL),
(69, 8, 'upload/products/multi-image/1727172283074966.png', '2022-03-13 01:24:06', NULL),
(70, 8, 'upload/products/multi-image/1727172283386680.png', '2022-03-13 01:24:07', NULL),
(71, 8, 'upload/products/multi-image/1727172283756185.png', '2022-03-13 01:24:07', NULL),
(72, 9, 'upload/products/multi-image/1730281640648618.png', '2022-04-16 09:06:01', NULL),
(73, 9, 'upload/products/multi-image/1730281641415162.png', '2022-04-16 09:06:02', NULL),
(74, 9, 'upload/products/multi-image/1730281642046978.png', '2022-04-16 09:06:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` int(11) DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processing_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picked_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipped_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivered_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `division_id`, `district_id`, `state_id`, `name`, `email`, `phone`, `post_code`, `address`, `payment_type`, `payment_method`, `transaction_id`, `currency`, `amount`, `order_number`, `bukti_pembayaran`, `invoice_no`, `order_date`, `order_month`, `order_year`, `confirmed_date`, `processing_date`, `picked_date`, `shipped_date`, `delivered_date`, `cancel_date`, `return_date`, `return_order`, `return_reason`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 2, 4, 'User', 'user@gmail.com', '081563977109', 40972, 'Kp. Cibodas Rt 01 / Rw 16 Desa Cibodas', 'card_1KyekKCN92UgdufCK6TpFZQz', 'Stripe', 'txn_3KyekOCN92UgdufC03IbTlED', 'usd', 256000, '627d33be147ef', NULL, 'ESZ90863831', '12 May 2022', 'May', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'selesai', '2022-05-12 09:20:20', '2022-05-12 09:38:05'),
(2, 6, 1, 1, 2, 'User', 'user@gmail.com', '081563977109', 40972, 'Kp. Cibodas Rt 01 / Rw 16 Desa Cibodas', 'Cash On Delivery', 'Cash On Delivery', NULL, 'Rp', 400000, '86129307', NULL, 'ESZ92823617', '12 May 2022', 'May', '2022', NULL, NULL, NULL, NULL, NULL, NULL, '12 May 2022', '2', 'Sepatunya kurang satu', 'selesai', '2022-05-12 10:16:08', '2022-05-12 10:23:37'),
(3, 6, 1, 1, 2, 'Iceu', 'user@gmail.com', '081563977109', 40973, 'Kp. Pasir Luhur Rt 01 / Rw 16', 'Transfer Bank Manual', 'Transfer Bank Manual', NULL, 'Rp', 184000, '15556661', 'upload/orders/1732641739611373.jpg', 'ESZ66673377', '12 May 2022', 'May', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'selesai', '2022-05-12 10:18:49', '2022-05-12 10:21:49'),
(4, 7, 1, 1, 2, 'Salsa Nur Maulani', 'salsa@gmail.com', '0895335490295', 40973, 'Kp. Pasir Handap Rt 01 / Rw 16', 'card_1KygeKCN92UgdufC973V9YyQ', 'Stripe', 'txn_3KygeMCN92UgdufC01MhxURB', 'usd', 104000, '627d505121eb0', NULL, 'ESZ46378392', '12 May 2022', 'May', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ditunda', '2022-05-12 11:22:11', NULL),
(5, 7, 1, 1, 2, 'Salsa Nur Maulani', 'salsa@gmail.com', '0895335490295', 40973, 'Kp. Pasir Handap Rt 01 / Rw 16', 'Cash On Delivery', 'Cash On Delivery', NULL, 'Rp', 280000, '88881899', NULL, 'ESZ58367832', '12 May 2022', 'May', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ditunda', '2022-05-12 11:23:20', NULL),
(6, 7, 1, 2, 4, 'Salsa Nur Maulani', 'salsa@gmail.com', '0895335490295', 40973, 'Kp. Pasir Handap Rt 01 / Rw 16', 'Transfer Bank Manual', 'Transfer Bank Manual', NULL, 'Rp', 160000, '48117199', 'upload/orders/1732645889136445.jpg', 'ESZ71658085', '12 May 2022', 'May', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ditunda', '2022-05-12 11:24:45', NULL),
(8, 6, 1, 1, 2, 'User', 'user@gmail.com', '081563977109', 40972, 'Kp. Cibodas Rt 01 / Rw 16 Desa Cibodas', 'Transfer Bank Manual', 'Transfer Bank Manual', NULL, 'Rp', 104000, '69226131', 'upload/orders/1733174190545598.png', 'ESZ22897749', '18 May 2022', 'May', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ditunda', '2022-05-18 07:21:54', NULL),
(9, 6, 1, 1, 2, 'User', 'user@gmail.com', '081563977109', 40972, 'Kp. Cibodas Rt 01 / Rw 16 Desa Cibodas', 'Transfer Bank Manual', 'Transfer Bank Manual', NULL, 'Rp', 104000, '23380688', 'upload/orders/1733174227185948.png', 'ESZ33532112', '18 May 2022', 'May', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ditunda', '2022-05-18 07:22:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `color`, `size`, `qty`, `weight`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 'hitam', '36', '1', '500', 120000.00, '2022-05-12 09:20:26', NULL),
(2, 1, 7, 'hitam', '32', '2', '200', 100000.00, '2022-05-12 09:20:26', NULL),
(3, 2, 5, 'hitam', '36', '2', '500', 200000.00, '2022-05-12 10:16:08', NULL),
(4, 3, 3, 'hitam', '36', '1', '200', 230000.00, '2022-05-12 10:18:55', NULL),
(5, 4, 8, 'hitam', '36', '1', '400', 130000.00, '2022-05-12 11:22:17', NULL),
(6, 5, 6, 'kuning', '36', '1', '500', 280000.00, '2022-05-12 11:23:20', NULL),
(7, 6, 1, 'hitam', '36', '1', '200', 200000.00, '2022-05-12 11:24:49', NULL),
(8, 9, 8, 'hitam', '36', '1', '400', 130000.00, '2022-05-18 07:23:04', NULL);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_short_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_long_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thambnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_promo` int(11) DEFAULT NULL,
  `new_product` int(11) DEFAULT NULL,
  `new_arrival` int(11) DEFAULT NULL,
  `best_seller` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `subsubcategory_id`, `product_name`, `product_slug`, `product_code`, `product_qty`, `product_weight`, `product_tags`, `product_size`, `product_color`, `product_price`, `product_discount`, `product_short_desc`, `product_long_desc`, `product_thambnail`, `product_promo`, `new_product`, `new_arrival`, `best_seller`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 4, 6, 'ADIDAS FORUM LOW', 'adidas-forum-low', '210120200001', '50', '200', 'adidas ,slip on', '36,37,38,39', 'hitam,abu-abu,hijau,biru,putih', '200000', NULL, 'Sebuah konsep re-imajinasi yang rendah dari klasik kultus 80-an, adidas Forum adalah ikon b-ball yang dibuat untuk jalanan.', '<p>&nbsp;</p>\n\n<p>Sebuah konsep re-imajinasi yang rendah dari klasik kultus 80-an, adidas Forum adalah ikon b-ball yang dibuat untuk jalanan. Dalam gaya yang tak lekang oleh waktu, sepatu ini ditata dalam warna putih dan biru tua, dengan bagian atas kulit dan sol karet tahan lama, kemudian diikat dengan tali X yang terkenal di pergelangan kaki untuk sentuhan akhir yang khas.</p>\n\n<p>Detail Produk</p>\n\n<p>Bagian Atas Kulit</p>\n\n<p>Outsole Karet</p>\n\n<p>Kode Gaya: GY5831</p>', 'upload/products/thambnail/1727162722845638.png', NULL, NULL, 1, 1, 1, '2022-03-12 22:54:04', '2022-03-12 22:54:04'),
(2, 8, 2, 4, 8, 'LOEWE ELN CLIMBING SHOE', 'loewe-eln-climbing-shoe', '210120200002', '50', '400', 'boots', '36,37,38,39,40', 'kuning', '300000', '250000', 'Koleksi Eye/LOEWE/Nature baru dari Loewe memperkenalkan sepatu hiking yang mewah namun fungsional ini dalam warna kuning dan biru yang siap untuk musim gugur.', '<pre>\r\nKoleksi Eye/LOEWE/Nature baru dari Loewe memperkenalkan sepatu hiking yang mewah namun fungsional ini dalam warna kuning dan biru yang siap untuk musim gugur. Semua tentang menyalurkan alam luar sebagai latar belakang dan esensi, mereka menampilkan bagian atas suede yang berkelanjutan - dibuat dari kulit anak sapi yang lentur - dan sol karet Vibram, yang mengoptimalkan traksi dan daya tahan. Namun, detailnya tidak berhenti di situ &ndash; mereka juga dilengkapi dengan kaus kaki bagian dalam berwarna terong, agar pas, bersama dengan tali kontras poliester daur ulang.\r\n\r\nBagian Atas Suede Kulit Anak Sapi\r\nTab Tarik Tumit\r\nMerek Patch</pre>', 'upload/products/thambnail/1727163254109594.png', 1, NULL, NULL, 0, 1, '2022-03-12 23:00:40', NULL),
(3, 6, 2, 4, 6, 'VANS UA HALF CAB 33 DX', 'vans-ua-half-cab-33-dx', '210120200003', '49', '200', 'hitam,biru,merah', '36,37,38,39', 'hitam,biru,merah', '280000', '230000', 'Vans tetap setia pada estetika skate all-American dengan sepatu kets Half Cab 33 ini.', '<pre>\r\nVans tetap setia pada estetika skate all-American dengan sepatu kets Half Cab 33 ini. Ditata dalam warna hitam, bagian atasnya dibuat dari suede, kemudian didetailkan dengan motif buaya ungu di dinding samping untuk tampilan yang unik. Detail lainnya tetap sama seperti biasanya, dengan pita foxing mengkilap yang lebih tinggi dan outsole karet gum.\r\n\r\nAtasan Suede\r\nSockliner Ortholite&reg;\r\nPita Foxing Mengkilap Lebih Tinggi\r\nOutsole Karet Gum</pre>', 'upload/products/thambnail/1727166656350816.png', 1, NULL, 1, NULL, 1, '2022-03-12 23:54:48', '2022-05-12 10:21:49'),
(4, 6, 2, 4, 6, 'VANS UA OLD SKOOL 36 DX', 'vans-ua-old-skool-36-dx', '210120200004', '0', '400', 'hitam,biru,merah', '36,37,38,39,40', 'biru,merah,hijau,putih', '300000', NULL, 'Old Skools angkatan laut klasik ini mengingatkan pada siluet asli - dengan beberapa pembaruan kontemporer.', '<pre>\r\nOld Skools angkatan laut klasik ini mengingatkan pada siluet asli - dengan beberapa pembaruan kontemporer. Bagian atas kanvas dan suede menampilkan detail throwback seperti pita foxing yang lebih mengkilap dan tali katun, sedangkan sockliner Ortholite memberikan kenyamanan yang diperbarui. Sebagai penutup, mereka ditandai dengan sol karet wafel khas merek tersebut.\r\n\r\nAtasan Kanvas &amp; Suede\r\nOutsole Karet</pre>', 'upload/products/thambnail/1727166907454098.png', 1, 1, NULL, NULL, 0, '2022-03-14 10:11:03', '2022-05-12 10:28:46'),
(5, 1, 2, 4, 6, 'ADIDAS FORUM MID', 'adidas-forum-mid', '210120200005', '98', '500', 'adidas,mid', '36,37,38', 'hitam,biru,merah', '280000', '200000', 'adidas membawa Anda dengan mudah dari lapangan basket ke jalan-jalan kota dengan sepatu kets Forum ini. Pertama kali dirilis pada tahun \'84, pasangan putih dan hitam ini tetap berpegang pada desain aslinya', '<pre>\r\nadidas membawa Anda dengan mudah dari lapangan basket ke jalan-jalan kota dengan sepatu kets Forum ini. Pertama kali dirilis pada tahun &#39;84, pasangan putih dan hitam ini tetap berpegang pada desain aslinya; mereka dibuat dengan bagian atas kulit dalam gaya potongan tengah dan detail dengan tali pergelangan kaki empuk untuk melengkapi tampilan retro.\r\n\r\nBagian Atas Kulit\r\nOutsole Karet</pre>', 'upload/products/thambnail/1727167389212854.png', 1, NULL, NULL, NULL, 1, '2022-03-13 00:06:45', '2022-05-12 10:21:57'),
(6, 1, 2, 4, 8, 'ADIDAS TERREX PRIMEBLUE FREE HIKER', 'adidas-terrex-primeblue-free-hiker', '210120200006', '49', '500', 'boot', '36,37,38', 'kuning', '280000', NULL, 'Anda selalu dapat mengandalkan jajaran adidas Terrex untuk pakaian luar yang tahan lama – dan sepatu hiking ini tidak terkecuali.', '<pre>\r\nAnda selalu dapat mengandalkan jajaran adidas Terrex untuk pakaian luar yang tahan lama &ndash; dan sepatu hiking ini tidak terkecuali. Ditata dalam warna kuning cerah, bagian atasnya dibuat dari Primeknit dan memiliki ukuran yang pas, lengkap dengan midsole Boost dan bingkai stabilisasi EVA yang menjanjikan kenyamanan optimal di setiap langkah. Anda juga akan menemukan outsole karet Continental&trade; untuk traksi tinggi dan hasil akhir yang siap-jejak.\r\n\r\nBagian Atas Primeknit\r\nbiru tua\r\nMeningkatkan Midsoles\r\nOutsole Karet Continental&trade;\r\nKode Gaya: FZ3627-BYL</pre>', 'upload/products/thambnail/1727171119838980.png', NULL, NULL, 1, NULL, 1, '2022-03-13 01:05:49', '2022-05-12 08:48:23'),
(7, 7, 3, 10, 17, 'Nike Sunray Protect 3', 'nike-sunray-protect-3', '210120200007', '44', '200', 'hitam,biru,merah', '32,33,34', 'hitam,biru,merah', '100000', NULL, 'SLIP-ON MUDAH UNTUK TETAP MENYENANGKAN.', '<pre>\r\nSLIP-ON MUDAH UNTUK TETAP MENYENANGKAN.\r\nMasuki pasir, rerumputan, dan kolam renang dengan Nike Sunray Protect 3. Sandal ringan ini sangat sederhana dengan tali pengikat yang menahan kaki si kecil, ke mana pun mereka membawanya. Bantalan lembut membuatnya nyaman sehingga waktu bermain terus berjalan. Dan jangan lupa desain ujung kaki yang tertutup&mdash;tidak mengkhawatirkan jari kaki yang terpotong jauh lebih menyenangkan!\r\n\r\nDibangun tetap kokoh\r\nBahan fleksibel berpadu untuk desain yang ringan dan tahan lama yang juga cepat kering setelah basah.\r\n\r\nGaya Slip-In\r\n\r\nTali pengait dan pengait terbuka lebar seperti kupu-kupu sehingga anak-anak dapat dengan cepat melangkah masuk dan mengamankan kaki mereka.\r\nPerasaan Lembut\r\n\r\nBantalan busa di bagian bawah kaki membantu membuat setiap langkah terasa nyaman&mdash;baik di pantai, padang rumput, atau jalanan.</pre>', 'upload/products/thambnail/1727171605030663.png', 1, 1, NULL, NULL, 1, '2022-03-13 15:08:39', '2022-05-12 09:38:05'),
(8, 4, 2, 4, 6, 'NEW BALANCE W5740LT1', 'new-balance-w5740lt1', '210120200008', '98', '400', 'hitam,biru,merah', '36,37,38,39', 'hitam,navy,pink,putih,krem,abu-abu', '150000', '130000', '5740 New Balance terinspirasi oleh label 574 yang ikonik, hanya saja lebih berani dengan detail pelindung lumpur bergelombangnya.', '<pre>\r\n5740 New Balance terinspirasi oleh label 574 yang ikonik, hanya saja lebih berani dengan detail pelindung lumpur bergelombangnya. Iterasinya diwarnai dengan cokelat kopi &#39;Au Lait&#39; yang creamy dan menampilkan bagian atasnya yang terbuat dari suede mewah dengan branding &#39;N&#39; kulit tebal di dinding samping. Di bagian bawah, bantalan ENCAP&reg; memastikan kenyamanan dalam setiap langkah - baik Anda memakainya untuk makan siang atau berjalan di sepanjang French Riviera dengan cangkir di tangan.\r\n\r\nAtasan Suede\r\nLapisan Bawah Jaring\r\nLapisan Kulit\r\nTeknologi ENCAP&reg;\r\nOutsole Karet</pre>', 'upload/products/thambnail/1727172279127667.png', 1, 1, NULL, NULL, 1, '2022-03-13 15:08:52', '2022-05-10 05:21:52'),
(9, 9, 4, 11, 20, 'sneakers', 'sneakers', '2101202000001', '99', '500', 'hitam,biru,merah', '36,37,38', 'hitam,biru,merah', '150000', '120000', 'okkkkkkkkkkkkkkkkkkkkkkkkk', '<p>Long Description Englishokkkkkkkkkkkkkkkkkkkkkkkkk</p>', 'upload/products/thambnail/1730281639818173.png', 1, NULL, 1, 1, 1, '2022-04-16 09:06:00', '2022-05-12 09:38:05');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `comment`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(8, 9, 6, 'Keren, mantap !', '4', '1', '2022-05-12 09:54:01', '2022-05-12 09:54:26'),
(9, 7, 6, 'Bagus, lucu sepatunya!', '5', '1', '2022-05-12 09:55:54', '2022-05-12 09:56:10');

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytics` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `meta_title`, `meta_author`, `meta_keyword`, `meta_description`, `google_analytics`, `created_at`, `updated_at`) VALUES
(1, 'salza ecommerce', 'Salza', 'ecommerce, salza, salza store', 'ecommerce', 'window.dataLayer = window.dataLayer || [];\r\n  function gtag(){dataLayer.push(arguments);}\r\n  gtag(\'js\', new Date());\r\n\r\n  gtag(\'config\', \'UA-84816806-1\');', NULL, '2022-05-18 07:29:14');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Mo6Fvus34E88YhamPLBUxVyITqlQZ7VPuV29wAOh', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibEFJTXg3RTlsWEViZEhqVDNhNU9FeHpHc3VnU1FEWTJ6ZTgzT3FvayI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3VzZXIvaW52b2ljZV9kb3dubG9hZC8zIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9vcmRlcnMvaW52b2ljZS9kb3dubG9hZC85Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1652884212),
('xSZoAtrk9ymLAlyMJlVTRribbxLXmXm40HX459HV', 6, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 8.0.0; SM-G955U Build/R16NW) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Mobile Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoidHJrRGQ1dGl1NFpoRUtwbHp2T085RDVwQ2p0aklaQjcybFJ5T0hRbSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ4OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcHJvZHVjdC9kZXRhaWxzLzkvc25lYWtlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo2O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkb1FOem9MMUF2QTlOQlAuNk9YN1h0LnhILzMvbVYwdTVKbWNKVVRON3BUL1czWFJybkFQLjIiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJG9RTnpvTDFBdkE5TkJQLjZPWDdYdC54SC8zL21WMHU1Sm1jSlVUTjdwVC9XM1hScm5BUC4yIjtzOjQ6ImNhcnQiO2E6MDp7fX0=', 1652884423);

-- --------------------------------------------------------

--
-- Table structure for table `ship_districts`
--

CREATE TABLE `ship_districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_districts`
--

INSERT INTO `ship_districts` (`id`, `division_id`, `district_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kabupaten Bandung', '2022-03-13 01:50:49', NULL),
(2, 1, 'Bandung', '2022-03-13 01:50:56', NULL),
(3, 2, 'Madura', '2022-05-11 01:36:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ship_divisions`
--

CREATE TABLE `ship_divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_divisions`
--

INSERT INTO `ship_divisions` (`id`, `division_name`, `created_at`, `updated_at`) VALUES
(1, 'Jawa Barat', '2022-05-12 01:10:59', '2022-05-12 01:10:59'),
(2, 'Jawa Timur', '2022-05-11 01:36:38', NULL),
(3, 'DKI Jakarta', '2022-05-12 01:10:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ship_states`
--

CREATE TABLE `ship_states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_states`
--

INSERT INTO `ship_states` (`id`, `division_id`, `district_id`, `state_name`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'Ciwidey', '2022-03-13 01:51:18', NULL),
(4, 1, 2, 'Pasirjambu', '2022-05-12 02:24:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `logo`, `phone_one`, `phone_two`, `email`, `company_name`, `company_address`, `facebook`, `twitter`, `linkedin`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'upload/logo/1727013687201165.png', '+6281563977109', '+62895335490295', 'esalza@gmail.com', 'SALZA', 'Jl. Babakan Tiga No. 82 Ciwidey', 'salzashop', 'salzashop', 'salzashop', 'salza', NULL, '2022-05-12 11:03:31');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_img`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'upload/slider/1727233631981849.png', 'Adidas', 'Sepatu Adidas yang nyaman dipakai untuk menemani aktivitas anda', 1, NULL, '2022-03-13 17:39:30'),
(2, 'upload/slider/1730282148176288.png', NULL, NULL, 1, NULL, NULL),
(3, 'upload/slider/1730283908692425.png', NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name`, `subcategory_slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kasual', 'kasual', NULL, '2022-03-12 22:17:08'),
(2, 1, 'Klasik', 'klasik', NULL, NULL),
(3, 2, 'Klasik', 'klasik', NULL, NULL),
(4, 2, 'Kasual', 'kasual', NULL, NULL),
(5, 2, 'Sport', 'sport', NULL, NULL),
(6, 1, 'Sport', 'sport', NULL, NULL),
(7, 2, 'Formal', 'formal', NULL, NULL),
(8, 1, 'Formal', 'formal', NULL, NULL),
(9, 3, 'Formal', 'formal', NULL, '2022-03-12 22:23:32'),
(10, 3, 'Sepatu Bayi', 'sepatu-bayi', NULL, NULL),
(11, 4, 'Kasual', 'kasual', NULL, NULL),
(12, 4, 'Klasik', 'klasik', NULL, '2022-05-11 01:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_categories`
--

CREATE TABLE `sub_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_sub_categories`
--

INSERT INTO `sub_sub_categories` (`id`, `category_id`, `subcategory_id`, `subsubcategory_name`, `subsubcategory_slug`, `created_at`, `updated_at`) VALUES
(1, 3, 10, 'Sneakers', 'sneakers', NULL, '2022-05-11 04:13:14'),
(2, 3, 9, 'Sepatu Sekolah', 'sepatu-sekolah', NULL, '2022-03-12 22:23:57'),
(3, 2, 3, 'Boat', 'boat', NULL, '2022-03-12 22:27:05'),
(5, 1, 6, 'Trainers', 'trainers', NULL, NULL),
(6, 2, 4, 'Slip On', 'slip-on', NULL, NULL),
(7, 3, 9, 'Converse', 'converse', NULL, NULL),
(8, 2, 4, 'Sepatu Boot', 'sepatu-boot', NULL, NULL),
(9, 2, 7, 'Sepatu Oxford', 'sepatu-oxford', NULL, NULL),
(10, 2, 7, 'Sepatu Derby', 'sepatu-derby', NULL, NULL),
(11, 2, 3, 'Loafers', 'loafers', NULL, NULL),
(12, 1, 1, 'Ballerina Flats', 'ballerina-flats', NULL, NULL),
(13, 1, 1, 'Slip On', 'slip-on', NULL, NULL),
(14, 1, 2, 'Boots', 'boots', NULL, NULL),
(15, 1, 1, 'Canvas', 'canvas', NULL, NULL),
(16, 3, 9, 'Warrior', 'warrior', NULL, NULL),
(17, 3, 10, 'Slip On', 'slip-on', NULL, NULL),
(18, 3, 9, 'Sepatu Boot', 'sepatu-boot', NULL, NULL),
(19, 4, 11, 'Semi Formal', 'semi-formal', NULL, NULL),
(20, 4, 11, 'Sneakers', 'sneakers', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_seen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `post_code`, `address`, `last_seen`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(6, 'User', 'user@gmail.com', '081563977109', '40972', 'Kp. Cibodas Rt 01 / Rw 16 Desa Cibodas', '2022-05-18 14:33:40', NULL, '$2y$10$oQNzoL1AvA9NBP.6OX7Xt.xH/3/mV0u5JmcJUTN7pT/W3XRrnAP.2', NULL, NULL, 'njIw6Wf2KiUp64aoUnB1rBLXX5qyYLH1BdQYomVJ1j8nnH46WoEm6IpLAggG', NULL, '202205121617avatar-16.png', '2022-05-12 09:12:22', '2022-05-18 07:33:40'),
(7, 'Salsa Nur Maulani', 'salsa@gmail.com', '0895335490295', '40973', 'Kp. Pasir Handap Rt 01 / Rw 16', '2022-05-12 18:25:12', NULL, '$2y$10$i0/H6FSzZX0LOly01Omz2.m9Gup2OmCKIkWCYqs01BN2loK6H90XW', NULL, NULL, NULL, NULL, '202205121820avatar-3.png', '2022-05-12 11:18:23', '2022-05-12 11:25:12');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(3, 1, 9, '2022-05-09 21:40:04', NULL),
(4, 1, 8, '2022-05-09 21:49:58', NULL),
(5, 1, 5, '2022-05-09 22:12:17', NULL);

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
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_post_categories`
--
ALTER TABLE `blog_post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
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
-- Indexes for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `ship_districts`
--
ALTER TABLE `ship_districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship_divisions`
--
ALTER TABLE `ship_divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship_states`
--
ALTER TABLE `ship_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog_post_categories`
--
ALTER TABLE `blog_post_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ship_districts`
--
ALTER TABLE `ship_districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ship_divisions`
--
ALTER TABLE `ship_divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ship_states`
--
ALTER TABLE `ship_states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;







/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

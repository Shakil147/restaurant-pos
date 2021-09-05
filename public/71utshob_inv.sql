-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2021 at 01:22 PM
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
-- Database: `71utshob_inv`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `show_individual` tinyint(1) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `icon`, `image`, `text_1`, `text_2`, `status`, `show_individual`, `parent_id`, `created_at`, `updated_at`) VALUES
(41, 'Salad', 'salad', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-06-21 00:30:24', '2021-06-21 00:30:24'),
(42, 'Noodles/Pasta', 'noodlespasta', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-06-21 00:30:25', '2021-06-21 00:30:25'),
(43, 'Soup', 'soup', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-06-21 00:30:28', '2021-06-21 00:30:28'),
(44, 'Rice', 'rice', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-06-21 00:30:32', '2021-06-21 00:30:32'),
(45, 'Appetizers', 'appetizers', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-06-21 00:30:34', '2021-06-21 00:30:34'),
(46, 'Beverages', 'beverages', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-06-21 00:30:40', '2021-06-21 00:30:40'),
(47, 'Beef', 'beef', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-06-21 00:30:44', '2021-06-21 00:30:44'),
(48, 'Fish/Prawn', 'fishprawn', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-06-21 00:30:45', '2021-06-21 00:30:45'),
(49, 'Mutton', 'mutton', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-06-21 00:30:52', '2021-06-21 00:30:52'),
(50, 'Chicken', 'chicken', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-06-21 00:30:52', '2021-06-21 00:30:52'),
(51, 'First Food', 'first-food', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-06-21 00:31:05', '2021-06-21 00:31:05'),
(52, 'Vegetable', 'vegetable', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-06-21 00:31:10', '2021-06-21 00:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `purchase_price` double(20,2) NOT NULL DEFAULT 0.00,
  `selling_price` double(20,2) NOT NULL DEFAULT 0.00,
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `type_id`, `slug`, `sku`, `image`, `description`, `unit_id`, `purchase_price`, `selling_price`, `user_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hot Tea', 8, 'hot-tea', '21531897', NULL, 'I could say if I know THAT well enough; and what does it matter to me whether you\'re nervous or not.\' \'I\'m a poor man, your Majesty,\' said the.', 3, 60.00, 110.00, NULL, 1, '2021-09-05 00:49:51', '2021-09-05 00:49:51', NULL),
(2, 'Grape', 8, 'grape', '84548436', NULL, 'No room!\' they cried out when they passed too close, and waving their forepaws to mark the time, while the.', 2, 47.00, 97.00, NULL, 1, '2021-09-05 00:49:51', '2021-09-05 00:49:51', NULL),
(3, 'Mayonnaise sauce', 7, 'mayonnaise-sauce', '73298748', NULL, 'Alice took up the chimney, has he?\' said Alice aloud, addressing nobody in particular.', 8, 15.00, 65.00, NULL, 1, '2021-09-05 00:49:51', '2021-09-05 00:49:51', NULL),
(4, 'Bacon Cheeseburger', 7, 'bacon-cheeseburger', '25541960', NULL, 'King, and he went on eagerly. \'That\'s enough about lessons,\' the Gryphon whispered in a dreamy sort of chance of getting up and.', 7, 52.00, 102.00, NULL, 1, '2021-09-05 00:49:51', '2021-09-05 00:49:51', NULL),
(5, 'Papaya', 8, 'papaya', '47592629', NULL, 'Caterpillar. \'Well, perhaps your feelings may be different,\' said Alice; \'all I know is, something.', 8, 73.00, 123.00, NULL, 1, '2021-09-05 00:49:51', '2021-09-05 00:49:51', NULL),
(6, 'Lemonade', 10, 'lemonade', '24982009', NULL, 'Mock Turtle is.\' \'It\'s the Cheshire Cat sitting on the end of the garden: the roses growing on it but tea. \'I don\'t.', 2, 68.00, 118.00, NULL, 1, '2021-09-05 00:49:51', '2021-09-05 00:49:51', NULL),
(7, 'Egg', 8, 'egg', '58545966', NULL, 'I\'m doubtful about the crumbs,\' said the Gryphon. \'Of course,\' the Gryphon said to herself, \'after such a wretched height to be.\' \'It is a very.', 5, 75.00, 125.00, NULL, 1, '2021-09-05 00:49:51', '2021-09-05 00:49:51', NULL),
(8, 'Mayonnaise sauce', 6, 'mayonnaise-sauce', '71629797', NULL, 'English); \'now I\'m opening out like the three were all locked; and when she got up this morning? I.', 1, 17.00, 67.00, NULL, 1, '2021-09-05 00:49:51', '2021-09-05 00:49:51', NULL),
(9, 'Mozzarella', 4, 'mozzarella', '20543655', NULL, 'Alice a little shriek, and went on just as I\'d taken the highest tree in front of them, with her arms round it as far as they all.', 1, 22.00, 72.00, NULL, 1, '2021-09-05 00:49:51', '2021-09-05 00:49:51', NULL),
(10, 'Beer', 6, 'beer', '68290665', NULL, 'Alice; \'I daresay it\'s a set of verses.\' \'Are they in the pictures of him), while the rest of it now in sight.', 7, 97.00, 147.00, NULL, 1, '2021-09-05 00:49:51', '2021-09-05 00:49:51', NULL),
(11, 'Yogurt', 7, 'yogurt', '08520401', NULL, 'Shark, But, when the White Rabbit, with a round face, and large eyes full of the table.', 4, 67.00, 117.00, NULL, 1, '2021-09-05 00:49:51', '2021-09-05 00:49:51', NULL),
(12, 'Tomato sauce', 8, 'tomato-sauce', '93791526', NULL, 'She pitied him deeply. \'What is his sorrow?\' she asked the Gryphon, sighing in his note-book, cackled out \'Silence!\' and.', 8, 86.00, 136.00, NULL, 1, '2021-09-05 00:49:51', '2021-09-05 00:49:51', NULL),
(13, 'Tomato sauce', 6, 'tomato-sauce', '46218698', NULL, 'I see\"!\' \'You might just as the doubled-up soldiers were always getting up and.', 4, 40.00, 90.00, NULL, 1, '2021-09-05 00:49:51', '2021-09-05 00:49:51', NULL),
(14, 'Veggie Sandwich', 8, 'veggie-sandwich', '98956593', NULL, 'Cat in a great hurry. An enormous puppy was looking at them with one eye, How the.', 6, 25.00, 75.00, NULL, 1, '2021-09-05 00:49:52', '2021-09-05 00:49:52', NULL),
(15, 'Mozzarella', 7, 'mozzarella', '48352451', NULL, 'When the sands are all pardoned.\' \'Come, THAT\'S a good deal until she made some tarts, All on a bough of a tree. By the use of.', 3, 38.00, 88.00, NULL, 1, '2021-09-05 00:49:52', '2021-09-05 00:49:52', NULL),
(16, 'Miller Lite', 5, 'miller-lite', '12714896', NULL, 'Footman went on saying to herself that perhaps it was certainly too much frightened that she might as well.', 7, 9.00, 59.00, NULL, 1, '2021-09-05 00:49:52', '2021-09-05 00:49:52', NULL),
(17, 'Butter', 9, 'butter', '45850066', NULL, 'All on a little anxiously. \'Yes,\' said Alice, in a whisper.) \'That would be quite absurd for.', 1, 31.00, 81.00, NULL, 1, '2021-09-05 00:49:52', '2021-09-05 00:49:52', NULL),
(18, 'Cheese Pizza', 9, 'cheese-pizza', '92748033', NULL, 'IT. It\'s HIM.\' \'I don\'t see how he can EVEN finish, if he thought it would all wash off.', 7, 54.00, 104.00, NULL, 1, '2021-09-05 00:49:52', '2021-09-05 00:49:52', NULL),
(19, 'Mayonnaise sauce', 8, 'mayonnaise-sauce', '75607975', NULL, 'Alice was thoroughly puzzled. \'Does the boots and shoes!\' she repeated in a shrill.', 6, 31.00, 81.00, NULL, 1, '2021-09-05 00:49:52', '2021-09-05 00:49:52', NULL),
(20, 'BBQ sauce', 5, 'bbq-sauce', '12003488', NULL, 'King said, turning to Alice, and she heard her sentence three of the trees upon.', 2, 11.00, 61.00, NULL, 1, '2021-09-05 00:49:52', '2021-09-05 00:49:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_31_065158_create_web_infos_table', 1),
(5, '2021_05_23_105157_create_categories_table', 1),
(6, '2021_05_24_062924_create_products_table', 1),
(7, '2021_06_13_102442_product_category', 2),
(35, '2021_06_17_100051_create_orders_table', 3),
(36, '2021_06_20_045956_create_order_items_table', 3),
(38, '2021_06_20_070023_web_info', 4),
(39, '2021_06_17_100149_create_oder_items_table', 5),
(40, '2021_06_23_085244_create_permission_tables', 5),
(41, '2021_09_01_074752_add_kot_to_order', 6),
(42, '2021_06_26_065927_creat_product', 7),
(43, '2021_06_26_070008_creat_cetagory', 7),
(44, '2021_06_26_083111_products_categories', 7),
(45, '2021_09_02_042319_create_types_table', 7),
(52, '2021_09_02_051303_create_items_table', 8),
(53, '2021_09_02_061532_create_units_table', 8),
(54, '2021_09_04_033816_create_suppliers_table', 8),
(55, '2021_09_04_060422_create_stocks_table', 9),
(56, '2021_09_04_060725_create_stock_items_table', 10),
(61, '2021_09_05_081808_create_staff_table', 11),
(62, '2021_09_05_083037_create_staff_types_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `table` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` double(10,2) DEFAULT NULL,
  `vat` double(10,2) DEFAULT NULL,
  `total` double(10,2) DEFAULT NULL,
  `discount` double(10,2) DEFAULT NULL,
  `total_discount` double(10,2) DEFAULT NULL,
  `service_charge` double(10,2) DEFAULT NULL,
  `total_item` int(11) DEFAULT NULL,
  `grand_total` double(10,2) DEFAULT NULL,
  `payment_status` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collected` double(10,2) DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_code`, `name`, `table`, `tax`, `vat`, `total`, `discount`, `total_discount`, `service_charge`, `total_item`, `grand_total`, `payment_status`, `status`, `user_id`, `created_at`, `updated_at`, `kto`, `collected`, `note`) VALUES
(40, '#00000001', 'Shagor Ahmed', NULL, NULL, NULL, 1820.00, 32.00, 32.00, 0.00, 2, 1788.00, 1, 1, 1, '2021-06-22 10:38:47', '2021-06-22 10:38:47', NULL, NULL, NULL),
(41, '#00000041', 'null', NULL, NULL, NULL, 1160.00, 0.00, 0.00, 0.00, 2, 1160.00, 1, 1, 1, '2021-06-22 12:02:23', '2021-06-22 12:02:23', NULL, NULL, NULL),
(42, '#00000042', 'null', NULL, NULL, NULL, 80.00, 0.00, 0.00, 0.00, 1, 80.00, 1, 1, 1, '2021-06-22 12:02:33', '2021-06-22 12:02:33', NULL, NULL, NULL),
(43, '#00000043', 'null', NULL, NULL, NULL, 160.00, 0.00, 0.00, 0.00, 1, 160.00, 1, 1, 1, '2021-06-22 12:02:37', '2021-06-22 12:02:37', NULL, NULL, NULL),
(44, '#00000044', 'null', NULL, NULL, NULL, 2490.00, 0.00, 0.00, 0.00, 4, 2490.00, 1, 1, 1, '2021-06-22 13:32:40', '2021-06-22 13:32:40', NULL, NULL, NULL),
(45, '#00000045', 'null', NULL, NULL, NULL, 2890.00, 0.00, 0.00, 0.00, 5, 2890.00, 1, 1, 1, '2021-06-22 13:44:17', '2021-06-22 13:44:17', NULL, NULL, NULL),
(46, '#00000046', 'Uta Buchanan', NULL, NULL, NULL, 980.00, 0.00, 0.00, 0.00, 3, 980.00, 1, 1, 1, '2021-08-25 14:29:09', '2021-08-25 14:29:09', NULL, NULL, NULL),
(47, '#00000047', 'name', NULL, NULL, NULL, 37420.00, 23.00, 23.00, 0.00, 2, 37397.00, 1, 1, 1, '2021-09-01 01:49:41', '2021-09-01 01:49:41', NULL, -37197.00, 'collected'),
(48, '#00000048', 'Maisie Kinney', 'George Rutledge', NULL, NULL, 450.00, 0.00, 0.00, 0.00, 2, 450.00, 1, 1, 1, '2021-09-01 01:50:18', '2021-09-01 01:50:18', NULL, -450.00, ''),
(49, '#00000049', 'Brittany Summers', '1', NULL, NULL, 16720.00, 0.00, 0.00, 0.00, 2, 16720.00, 1, 1, 1, '2021-09-01 02:00:06', '2021-09-01 02:00:06', NULL, -16720.00, ''),
(50, '#00000050', 'name', NULL, NULL, NULL, 380.00, 0.00, 0.00, 0.00, 1, 380.00, 1, 1, 1, '2021-09-01 02:18:46', '2021-09-01 02:18:46', NULL, -380.00, ''),
(51, '#00000051', 'name', NULL, NULL, NULL, 800.00, 0.00, 0.00, 0.00, 1, 800.00, 1, 1, 1, '2021-09-01 02:18:59', '2021-09-01 02:18:59', NULL, -800.00, ''),
(52, '#00000052', 'name', NULL, NULL, NULL, 80.00, 0.00, 0.00, 0.00, 1, 80.00, 1, 1, 1, '2021-09-01 02:19:45', '2021-09-01 02:19:45', NULL, -80.00, ''),
(53, '#00000053', 'shobjeebd', '12', NULL, NULL, 1670.00, 0.00, 0.00, 0.00, 4, 1670.00, 1, 1, 1, '2021-09-01 02:29:33', '2021-09-01 02:29:33', NULL, 0.00, ''),
(54, '#00000054', 'Md Mailinator', '4', NULL, NULL, 1060.00, 0.00, 0.00, 0.00, 3, 1060.00, 1, 1, 1, '2021-09-04 04:28:22', '2021-09-04 04:28:22', NULL, 0.00, ''),
(55, '#00000055', 'name', NULL, NULL, NULL, 980.00, 0.00, 0.00, 0.00, 3, 980.00, 1, 1, 1, '2021-09-04 04:29:16', '2021-09-04 04:29:16', NULL, 700.00, ''),
(56, '#00000056', 'name', NULL, NULL, NULL, 1965.00, 205.75, 205.75, 0.00, 7, 1759.25, 1, 1, 1, '2021-09-04 04:37:07', '2021-09-04 04:37:07', NULL, 700.00, ''),
(57, '#00000057', 'name', NULL, NULL, NULL, 2495.00, 0.00, 0.00, 0.00, 6, 2495.00, 1, 1, 1, '2021-09-04 04:37:51', '2021-09-04 04:37:51', NULL, 12.00, ''),
(58, '#00000058', 'sada', '323', NULL, NULL, 350.00, 0.00, 0.00, 0.00, 1, 350.00, 1, 1, 1, '2021-09-04 04:38:07', '2021-09-04 04:38:07', NULL, 0.00, ''),
(59, '#00000059', 'name', NULL, NULL, NULL, 1100.00, 0.00, 0.00, 0.00, 3, 1100.00, 1, 1, 1, '2021-09-04 04:38:24', '2021-09-04 04:38:24', NULL, 12.00, ''),
(60, '#00000060', 'name', NULL, NULL, NULL, 700.00, 0.00, 0.00, 0.00, 2, 700.00, 1, 1, 1, '2021-09-04 04:40:30', '2021-09-04 04:40:30', NULL, 0.00, ''),
(61, '#00000061', 'N/A', NULL, NULL, NULL, 580.00, 0.00, 0.00, 0.00, 2, 580.00, 1, 1, 1, '2021-09-04 04:41:28', '2021-09-04 04:41:28', NULL, 0.00, ''),
(62, '#00000062', 'N/A', NULL, NULL, NULL, 580.00, 78.40, 78.40, 0.00, 2, 501.60, 1, 1, 1, '2021-09-04 04:49:31', '2021-09-04 04:49:31', NULL, 501.50, '');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `discount_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `order_code`, `product_id`, `product_name`, `price`, `quantity`, `discount`, `discount_type`, `created_at`, `updated_at`) VALUES
(107, 40, '#00000001', 51, 'Prawn with Casonat Salad', 500.00, 3, 0, 'plain', '2021-06-22 10:38:47', '2021-06-22 10:38:47'),
(108, 40, '#00000001', 50, 'Green Salad', 80.00, 4, 10, 'percentage', '2021-06-22 10:38:47', '2021-06-22 10:38:47'),
(109, 41, '#00000041', 50, 'Green Salad', 80.00, 2, NULL, 'plain', '2021-06-22 12:02:23', '2021-06-22 12:02:23'),
(110, 41, '#00000041', 51, 'Prawn with Casonat Salad', 500.00, 2, NULL, 'plain', '2021-06-22 12:02:23', '2021-06-22 12:02:23'),
(111, 42, '#00000042', 50, 'Green Salad', 80.00, 1, NULL, 'plain', '2021-06-22 12:02:33', '2021-06-22 12:02:33'),
(112, 43, '#00000043', 50, 'Green Salad', 80.00, 2, NULL, 'plain', '2021-06-22 12:02:37', '2021-06-22 12:02:37'),
(113, 44, '#00000044', 53, 'Special Salad', 450.00, 1, NULL, 'plain', '2021-06-22 13:32:40', '2021-06-22 13:32:40'),
(114, 44, '#00000044', 50, 'Green Salad', 80.00, 3, NULL, 'plain', '2021-06-22 13:32:40', '2021-06-22 13:32:40'),
(115, 44, '#00000044', 51, 'Prawn with Casonat Salad', 500.00, 2, NULL, 'plain', '2021-06-22 13:32:40', '2021-06-22 13:32:40'),
(116, 44, '#00000044', 52, 'Chicken with Casonat Salad', 400.00, 2, NULL, 'plain', '2021-06-22 13:32:40', '2021-06-22 13:32:40'),
(117, 45, '#00000045', 54, 'Salted Pasta', 320.00, 1, NULL, 'plain', '2021-06-22 13:44:17', '2021-06-22 13:44:17'),
(118, 45, '#00000045', 53, 'Special Salad', 450.00, 3, NULL, 'plain', '2021-06-22 13:44:17', '2021-06-22 13:44:17'),
(119, 45, '#00000045', 55, 'Cream Pasta', 320.00, 2, NULL, 'plain', '2021-06-22 13:44:17', '2021-06-22 13:44:17'),
(120, 45, '#00000045', 50, 'Green Salad', 80.00, 1, NULL, 'plain', '2021-06-22 13:44:17', '2021-06-22 13:44:17'),
(121, 45, '#00000045', 51, 'Prawn with Casonat Salad', 500.00, 1, NULL, 'plain', '2021-06-22 13:44:17', '2021-06-22 13:44:17'),
(122, 46, '#00000046', 50, 'Green Salad', 80.00, 1, NULL, 'plain', '2021-08-25 14:29:09', '2021-08-25 14:29:09'),
(123, 46, '#00000046', 51, 'Prawn with Casonat Salad', 500.00, 1, NULL, 'plain', '2021-08-25 14:29:09', '2021-08-25 14:29:09'),
(124, 46, '#00000046', 52, 'Chicken with Casonat Salad', 400.00, 1, NULL, 'plain', '2021-08-25 14:29:09', '2021-08-25 14:29:09'),
(125, 47, '#00000047', 51, 'Prawn with Casonat Salad', 500.00, 63, 1, 'plain', '2021-09-01 01:49:41', '2021-09-01 01:49:41'),
(126, 47, '#00000047', 50, 'Green Salad', 80.00, 74, 22, 'plain', '2021-09-01 01:49:41', '2021-09-01 01:49:41'),
(127, 48, '#00000048', 137, 'Mashroom Vegetable', 250.00, 1, NULL, 'plain', '2021-09-01 01:50:18', '2021-09-01 01:50:18'),
(128, 48, '#00000048', 138, 'Mixed Vegetables', 200.00, 1, NULL, 'plain', '2021-09-01 01:50:18', '2021-09-01 01:50:18'),
(129, 49, '#00000049', 50, 'Green Salad', 80.00, 59, 0, 'plain', '2021-09-01 02:00:06', '2021-09-01 02:00:06'),
(130, 49, '#00000049', 51, 'Prawn with Casonat Salad', 500.00, 24, 0, 'plain', '2021-09-01 02:00:06', '2021-09-01 02:00:06'),
(131, 50, '#00000050', 71, 'Special Vegetable Soup', 380.00, 1, NULL, 'plain', '2021-09-01 02:18:46', '2021-09-01 02:18:46'),
(132, 51, '#00000051', 72, 'Cocktail Soup', 400.00, 2, 0, 'plain', '2021-09-01 02:18:59', '2021-09-01 02:18:59'),
(133, 52, '#00000052', 50, 'Green Salad', 80.00, 1, NULL, 'plain', '2021-09-01 02:19:45', '2021-09-01 02:19:45'),
(134, 53, '#00000053', 51, 'Prawn with Casonat Salad', 500.00, 1, NULL, 'plain', '2021-09-01 02:29:33', '2021-09-01 02:29:33'),
(135, 53, '#00000053', 52, 'Chicken with Casonat Salad', 400.00, 1, NULL, 'plain', '2021-09-01 02:29:33', '2021-09-01 02:29:33'),
(136, 53, '#00000053', 53, 'Special Salad', 450.00, 1, NULL, 'plain', '2021-09-01 02:29:33', '2021-09-01 02:29:33'),
(137, 53, '#00000053', 54, 'Salted Pasta', 320.00, 1, NULL, 'plain', '2021-09-01 02:29:33', '2021-09-01 02:29:33'),
(138, 54, '#00000054', 50, 'Green Salad', 80.00, 2, 0, 'plain', '2021-09-04 04:28:23', '2021-09-04 04:28:23'),
(139, 54, '#00000054', 51, 'Prawn with Casonat Salad', 500.00, 1, NULL, 'plain', '2021-09-04 04:28:23', '2021-09-04 04:28:23'),
(140, 54, '#00000054', 52, 'Chicken with Casonat Salad', 400.00, 1, NULL, 'plain', '2021-09-04 04:28:23', '2021-09-04 04:28:23'),
(141, 55, '#00000055', 50, 'Green Salad', 80.00, 1, NULL, 'plain', '2021-09-04 04:29:16', '2021-09-04 04:29:16'),
(142, 55, '#00000055', 51, 'Prawn with Casonat Salad', 500.00, 1, NULL, 'plain', '2021-09-04 04:29:16', '2021-09-04 04:29:16'),
(143, 55, '#00000055', 52, 'Chicken with Casonat Salad', 400.00, 1, NULL, 'plain', '2021-09-04 04:29:16', '2021-09-04 04:29:16'),
(144, 56, '#00000056', 92, 'Faluda', 100.00, 1, NULL, 'plain', '2021-09-04 04:37:07', '2021-09-04 04:37:07'),
(145, 56, '#00000056', 101, 'Beef Chili (Dry)', 350.00, 1, NULL, 'plain', '2021-09-04 04:37:07', '2021-09-04 04:37:07'),
(146, 56, '#00000056', 102, 'Beef Chili Onion', 350.00, 1, NULL, 'plain', '2021-09-04 04:37:07', '2021-09-04 04:37:07'),
(147, 56, '#00000056', 100, 'Soft Drinks', 25.00, 1, 15, 'percentage', '2021-09-04 04:37:08', '2021-09-04 04:37:08'),
(148, 56, '#00000056', 95, 'Hot Cappuccino Coffee', 120.00, 1, 15, 'percentage', '2021-09-04 04:37:08', '2021-09-04 04:37:08'),
(149, 56, '#00000056', 89, 'Fried Awnthon', 220.00, 1, 40, 'percentage', '2021-09-04 04:37:08', '2021-09-04 04:37:08'),
(150, 56, '#00000056', 103, 'Beef Masala', 400.00, 2, 12, 'percentage', '2021-09-04 04:37:08', '2021-09-04 04:37:08'),
(151, 57, '#00000057', 101, 'Beef Chili (Dry)', 350.00, 1, NULL, 'plain', '2021-09-04 04:37:51', '2021-09-04 04:37:51'),
(152, 57, '#00000057', 102, 'Beef Chili Onion', 350.00, 1, NULL, 'plain', '2021-09-04 04:37:51', '2021-09-04 04:37:51'),
(153, 57, '#00000057', 103, 'Beef Masala', 400.00, 1, NULL, 'plain', '2021-09-04 04:37:51', '2021-09-04 04:37:51'),
(154, 57, '#00000057', 104, 'Red Sanpper B.B.Q', 445.00, 1, NULL, 'plain', '2021-09-04 04:37:51', '2021-09-04 04:37:51'),
(155, 57, '#00000057', 105, 'Red Sanpper Mushroom 7 Ginger', 500.00, 1, NULL, 'plain', '2021-09-04 04:37:51', '2021-09-04 04:37:51'),
(156, 57, '#00000057', 106, 'Red Sanpper Fry', 450.00, 1, NULL, 'plain', '2021-09-04 04:37:51', '2021-09-04 04:37:51'),
(157, 58, '#00000058', 101, 'Beef Chili (Dry)', 350.00, 1, NULL, 'plain', '2021-09-04 04:38:07', '2021-09-04 04:38:07'),
(158, 59, '#00000059', 101, 'Beef Chili (Dry)', 350.00, 1, NULL, 'plain', '2021-09-04 04:38:24', '2021-09-04 04:38:24'),
(159, 59, '#00000059', 102, 'Beef Chili Onion', 350.00, 1, NULL, 'plain', '2021-09-04 04:38:24', '2021-09-04 04:38:24'),
(160, 59, '#00000059', 103, 'Beef Masala', 400.00, 1, NULL, 'plain', '2021-09-04 04:38:24', '2021-09-04 04:38:24'),
(161, 60, '#00000060', 101, 'Beef Chili (Dry)', 350.00, 1, NULL, 'plain', '2021-09-04 04:40:30', '2021-09-04 04:40:30'),
(162, 60, '#00000060', 102, 'Beef Chili Onion', 350.00, 1, NULL, 'plain', '2021-09-04 04:40:30', '2021-09-04 04:40:30'),
(163, 61, '#00000061', 50, 'Green Salad', 80.00, 1, NULL, 'plain', '2021-09-04 04:41:28', '2021-09-04 04:41:28'),
(164, 61, '#00000061', 51, 'Prawn with Casonat Salad', 500.00, 1, NULL, 'plain', '2021-09-04 04:41:28', '2021-09-04 04:41:28'),
(165, 62, '#00000062', 51, 'Prawn with Casonat Salad', 500.00, 1, 70, 'plain', '2021-09-04 04:49:32', '2021-09-04 04:49:32'),
(166, 62, '#00000062', 50, 'Green Salad', 80.00, 1, 11, 'percentage', '2021-09-04 04:49:32', '2021-09-04 04:49:32');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard', 'web', '2021-08-25 03:57:45', '2021-08-25 03:57:45'),
(2, 'pos', 'web', '2021-08-25 03:57:45', '2021-08-25 03:57:45'),
(3, 'orders', 'web', '2021-08-25 03:57:45', '2021-08-25 03:57:45'),
(4, 'web-infos', 'web', '2021-08-25 03:57:45', '2021-08-25 03:57:45'),
(5, 'categories-index', 'web', '2021-08-25 03:57:45', '2021-08-25 03:57:45'),
(6, 'categories-create', 'web', '2021-08-25 03:57:46', '2021-08-25 03:57:46'),
(7, 'categories-show', 'web', '2021-08-25 03:57:46', '2021-08-25 03:57:46'),
(8, 'categories-update', 'web', '2021-08-25 03:57:46', '2021-08-25 03:57:46'),
(9, 'categories-destroy', 'web', '2021-08-25 03:57:46', '2021-08-25 03:57:46'),
(10, 'products-index', 'web', '2021-08-25 03:57:46', '2021-08-25 03:57:46'),
(11, 'products-create', 'web', '2021-08-25 03:57:46', '2021-08-25 03:57:46'),
(12, 'products-show', 'web', '2021-08-25 03:57:46', '2021-08-25 03:57:46'),
(13, 'products-update', 'web', '2021-08-25 03:57:46', '2021-08-25 03:57:46'),
(14, 'products-destroy', 'web', '2021-08-25 03:57:46', '2021-08-25 03:57:46'),
(15, 'admins-index', 'web', '2021-08-25 03:57:46', '2021-08-25 03:57:46'),
(16, 'admins-create', 'web', '2021-08-25 03:57:46', '2021-08-25 03:57:46'),
(17, 'admins-show', 'web', '2021-08-25 03:57:46', '2021-08-25 03:57:46'),
(18, 'admins-update', 'web', '2021-08-25 03:57:46', '2021-08-25 03:57:46'),
(19, 'admins-destroy', 'web', '2021-08-25 03:57:46', '2021-08-25 03:57:46'),
(20, 'roles-index', 'web', '2021-08-25 03:57:46', '2021-08-25 03:57:46'),
(21, 'roles-create', 'web', '2021-08-25 03:57:46', '2021-08-25 03:57:46'),
(22, 'roles-show', 'web', '2021-08-25 03:57:46', '2021-08-25 03:57:46'),
(23, 'roles-update', 'web', '2021-08-25 03:57:46', '2021-08-25 03:57:46'),
(24, 'roles-destroy', 'web', '2021-08-25 03:57:46', '2021-08-25 03:57:46');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `image`, `description`, `status`, `price`, `stock`, `user_id`, `created_at`, `updated_at`) VALUES
(50, 'Green Salad', 'green-salad', '/uploads/images/products/0image1622609260.png', NULL, 1, 80.00, 50, 1, '2021-06-21 00:30:24', '2021-06-21 00:30:24'),
(51, 'Prawn with Casonat Salad', 'prawn-with-casonat-salad', '/uploads/images/products/0image1622609236.png', NULL, 1, 500.00, 50, 1, '2021-06-21 00:30:24', '2021-06-21 00:30:25'),
(52, 'Chicken with Casonat Salad', 'chicken-with-casonat-salad', '/uploads/images/products/0image1622609197.png', NULL, 1, 400.00, 50, 1, '2021-06-21 00:30:25', '2021-06-21 00:30:25'),
(53, 'Special Salad', 'special-salad', '/uploads/images/products/0image1622609169.png', NULL, 1, 450.00, 50, 1, '2021-06-21 00:30:25', '2021-06-21 00:30:25'),
(54, 'Salted Pasta', 'salted-pasta', '/uploads/images/products/0image1622609125.png', NULL, 1, 320.00, 50, 1, '2021-06-21 00:30:25', '2021-06-21 00:30:25'),
(55, 'Cream Pasta', 'cream-pasta', '/uploads/images/products/0image1622609096.png', NULL, 1, 320.00, 50, 1, '2021-06-21 00:30:26', '2021-06-21 00:30:26'),
(56, 'Special Pasta', 'special-pasta', '/uploads/images/products/0image1622609053.png', NULL, 1, 350.00, 50, 1, '2021-06-21 00:30:26', '2021-06-21 00:30:26'),
(57, 'Chinese Chopsy (salted)', 'chinese-chopsy-salted', '/uploads/images/products/0image1622609009.png', NULL, 1, 280.00, 50, 1, '2021-06-21 00:30:26', '2021-06-21 00:30:26'),
(58, 'American Chopsy (sweet)', 'american-chopsy-sweet', '/uploads/images/products/0image1622608981.png', NULL, 1, 280.00, 50, 1, '2021-06-21 00:30:26', '2021-06-21 00:30:27'),
(59, 'Prawn Fried Noodles', 'prawn-fried-noodles', '/uploads/images/products/0image1622608939.png', NULL, 1, 320.00, 50, 1, '2021-06-21 00:30:27', '2021-06-21 00:30:27'),
(60, 'Sichuan Fried Noodles', 'sichuan-fried-noodles', '/uploads/images/products/0image1622608907.png', NULL, 1, 300.00, 50, 1, '2021-06-21 00:30:27', '2021-06-21 00:30:27'),
(61, 'Thai Fried Noodles', 'thai-fried-noodles', '/uploads/images/products/0image1622608856.png', NULL, 1, 350.00, 50, 1, '2021-06-21 00:30:27', '2021-06-21 00:30:27'),
(62, 'Chicken Fried Noodles', 'chicken-fried-noodles', '/uploads/images/products/0image1622608799.png', NULL, 1, 300.00, 50, 1, '2021-06-21 00:30:27', '2021-06-21 00:30:27'),
(63, 'Vegetable Noodles', 'vegetable-noodles', '/uploads/images/products/0image1622608728.png', NULL, 1, 280.00, 50, 1, '2021-06-21 00:30:27', '2021-06-21 00:30:28'),
(64, 'Special Noodles', 'special-noodles', '/uploads/images/products/0image1622608690.png', NULL, 1, 350.00, 50, 1, '2021-06-21 00:30:28', '2021-06-21 00:30:28'),
(65, 'Special Sichuan Soup', 'special-sichuan-soup', '/uploads/images/products/0image1622608624.png', NULL, 1, 350.00, 50, 1, '2021-06-21 00:30:28', '2021-06-21 00:30:28'),
(66, 'Steamed Chicken Soup', 'steamed-chicken-soup', '/uploads/images/products/0image1622608597.png', NULL, 1, 350.00, 50, 1, '2021-06-21 00:30:29', '2021-06-21 00:30:29'),
(67, 'Chicken Onion Soup', 'chicken-onion-soup', '/uploads/images/products/0image1622608568.png', NULL, 1, 300.00, 50, 1, '2021-06-21 00:30:29', '2021-06-21 00:30:29'),
(68, 'Special Corn Soup', 'special-corn-soup', '/uploads/images/products/0image1622608532.png', NULL, 1, 300.00, 50, 1, '2021-06-21 00:30:29', '2021-06-21 00:30:29'),
(69, 'Hot & Sour Soup', 'hot-sour-soup', '/uploads/images/products/0image1622608481.png', NULL, 1, 300.00, 50, 1, '2021-06-21 00:30:30', '2021-06-21 00:30:30'),
(70, 'Chicken Corn Soup', 'chicken-corn-soup', '/uploads/images/products/0image1622608455.png', NULL, 1, 250.00, 50, 1, '2021-06-21 00:30:30', '2021-06-21 00:30:30'),
(71, 'Special Vegetable Soup', 'special-vegetable-soup', '/uploads/images/products/0image1622608419.png', NULL, 1, 380.00, 50, 1, '2021-06-21 00:30:30', '2021-06-21 00:30:30'),
(72, 'Cocktail Soup', 'cocktail-soup', '/uploads/images/products/0image1622608371.png', NULL, 1, 400.00, 50, 1, '2021-06-21 00:30:31', '2021-06-21 00:30:31'),
(73, 'Tom Yum Soup(Gai/Goong)', 'tom-yum-soupgaigoong', '/uploads/images/products/0image1622608078.png', NULL, 1, 400.00, 50, 1, '2021-06-21 00:30:31', '2021-06-21 00:30:31'),
(74, 'Special Thai Soup', 'special-thai-soup', '/uploads/images/products/0image1622608043.png', NULL, 1, 380.00, 50, 1, '2021-06-21 00:30:31', '2021-06-21 00:30:31'),
(75, 'Steamed Rice', 'steamed-rice', '/uploads/images/products/0image1622607936.png', NULL, 1, 120.00, 50, 1, '2021-06-21 00:30:32', '2021-06-21 00:30:32'),
(76, 'Sichuan Fried Rice', 'sichuan-fried-rice', '/uploads/images/products/0image1622607904.png', NULL, 1, 300.00, 50, 1, '2021-06-21 00:30:32', '2021-06-21 00:30:32'),
(77, 'Masala Fried Rice', 'masala-fried-rice', '/uploads/images/products/0image1622607862.png', NULL, 1, 280.00, 50, 1, '2021-06-21 00:30:32', '2021-06-21 00:30:32'),
(78, 'Vegetable Fried Rice', 'vegetable-fried-rice', '/uploads/images/products/0image1622607818.png', NULL, 1, 280.00, 50, 1, '2021-06-21 00:30:32', '2021-06-21 00:30:32'),
(79, 'Prawn Fried Rice', 'prawn-fried-rice', '/uploads/images/products/0image1622607754.png', NULL, 1, 280.00, 50, 1, '2021-06-21 00:30:33', '2021-06-21 00:30:33'),
(80, 'Chicken Fried Rice', 'chicken-fried-rice', '/uploads/images/products/0image1622607717.png', NULL, 1, 300.00, 50, 1, '2021-06-21 00:30:33', '2021-06-21 00:30:33'),
(81, 'Egg Fried Rice', 'egg-fried-rice', '/uploads/images/products/0image1622607627.png', NULL, 1, 280.00, 50, 1, '2021-06-21 00:30:33', '2021-06-21 00:30:34'),
(82, 'Thai Rice', 'thai-rice', '/uploads/images/products/0image1622607504.png', NULL, 1, 350.00, 50, 1, '2021-06-21 00:30:34', '2021-06-21 00:30:34'),
(83, 'Fantasy Rice', 'fantasy-rice', '/uploads/images/products/0image1622607465.png', NULL, 1, 300.00, 50, 1, '2021-06-21 00:30:35', '2021-06-21 00:30:35'),
(84, 'Special Fried Rice', 'special-fried-rice', '/uploads/images/products/0image1622607438.png', NULL, 1, 350.00, 50, 1, '2021-06-21 00:30:35', '2021-06-21 00:30:35'),
(85, 'Friench Fry', 'friench-fry', '/uploads/images/products/0image1622607336.png', NULL, 1, 150.00, 50, 1, '2021-06-21 00:30:36', '2021-06-21 00:30:36'),
(86, 'Finger Roll', 'finger-roll', '/uploads/images/products/0image1622607305.png', NULL, 1, 240.00, 50, 1, '2021-06-21 00:30:36', '2021-06-21 00:30:36'),
(87, 'Prawn Toast', 'prawn-toast', '/uploads/images/products/0image1622607268.png', NULL, 1, 260.00, 50, 1, '2021-06-21 00:30:36', '2021-06-21 00:30:36'),
(88, 'Vegetable Pakora', 'vegetable-pakora', '/uploads/images/products/0image1622607234.png', NULL, 1, 200.00, 50, 1, '2021-06-21 00:30:37', '2021-06-21 00:30:37'),
(89, 'Fried Awnthon', 'fried-awnthon', '/uploads/images/products/0image1622607201.png', NULL, 1, 220.00, 50, 1, '2021-06-21 00:30:37', '2021-06-21 00:30:38'),
(90, 'Special Awnthon', 'special-awnthon', '/uploads/images/products/0image1622607166.png', NULL, 1, 240.00, 50, 1, '2021-06-21 00:30:38', '2021-06-21 00:30:39'),
(91, 'Prawn Fry(10 pcs)', 'prawn-fry10-pcs', '/uploads/images/products/0image1622607125.png', NULL, 1, 320.00, 50, 1, '2021-06-21 00:30:39', '2021-06-21 00:30:40'),
(92, 'Faluda', 'faluda', '/uploads/images/products/0image1622607031.png', NULL, 1, 100.00, 50, 1, '2021-06-21 00:30:40', '2021-06-21 00:30:40'),
(93, 'Lassi', 'lassi', '/uploads/images/products/0image1622606976.png', NULL, 1, 100.00, 50, 1, '2021-06-21 00:30:41', '2021-06-21 00:30:41'),
(94, 'Cold Coffee', 'cold-coffee', '/uploads/images/products/0image1622606924.png', NULL, 1, 80.00, 50, 1, '2021-06-21 00:30:41', '2021-06-21 00:30:41'),
(95, 'Hot Cappuccino Coffee', 'hot-cappuccino-coffee', '/uploads/images/products/0image1622606873.png', NULL, 1, 120.00, 50, 1, '2021-06-21 00:30:42', '2021-06-21 00:30:42'),
(96, 'Hot Coffee', 'hot-coffee', '/uploads/images/products/0image1622606835.png', NULL, 1, 80.00, 50, 1, '2021-06-21 00:30:42', '2021-06-21 00:30:42'),
(97, 'Can Drinks', 'can-drinks', '/uploads/images/products/0image1622606793.png', NULL, 1, 50.00, 50, 1, '2021-06-21 00:30:43', '2021-06-21 00:30:43'),
(98, 'Mineral Water (Small)', 'mineral-water-small', '/uploads/images/products/0image1622606698.png', NULL, 1, 20.00, 50, 1, '2021-06-21 00:30:43', '2021-06-21 00:30:43'),
(99, 'Mineral Water (Large)', 'mineral-water-large', '/uploads/images/products/0image1622606655.png', NULL, 1, 300.00, 50, 1, '2021-06-21 00:30:43', '2021-06-21 00:30:43'),
(100, 'Soft Drinks', 'soft-drinks', '/uploads/images/products/0image1622606622.png', NULL, 1, 25.00, 50, 1, '2021-06-21 00:30:43', '2021-06-21 00:30:44'),
(101, 'Beef Chili (Dry)', 'beef-chili-dry', '/uploads/images/products/0image1622606415.png', NULL, 1, 350.00, 50, 1, '2021-06-21 00:30:44', '2021-06-21 00:30:44'),
(102, 'Beef Chili Onion', 'beef-chili-onion', '/uploads/images/products/0image1622606380.png', NULL, 1, 350.00, 50, 1, '2021-06-21 00:30:44', '2021-06-21 00:30:44'),
(103, 'Beef Masala', 'beef-masala', '/uploads/images/products/0image1622606340.png', NULL, 1, 400.00, 50, 1, '2021-06-21 00:30:44', '2021-06-21 00:30:44'),
(104, 'Red Sanpper B.B.Q', 'red-sanpper-bbq', '/uploads/images/products/0image1622606284.png', NULL, 1, 445.00, 50, 1, '2021-06-21 00:30:45', '2021-06-21 00:30:45'),
(105, 'Red Sanpper Mushroom 7 Ginger', 'red-sanpper-mushroom-7-ginger', '/uploads/images/products/0image1622606238.png', NULL, 1, 500.00, 50, 1, '2021-06-21 00:30:45', '2021-06-21 00:30:45'),
(106, 'Red Sanpper Fry', 'red-sanpper-fry', '/uploads/images/products/0image1622543537.png', NULL, 1, 450.00, 50, 1, '2021-06-21 00:30:46', '2021-06-21 00:30:46'),
(107, 'Red Sanpper With Hot Sauce', 'red-sanpper-with-hot-sauce', '/uploads/images/products/0image1622543485.png', NULL, 1, 450.00, 50, 1, '2021-06-21 00:30:46', '2021-06-21 00:30:46'),
(108, 'Rupchada Fish Fry', 'rupchada-fish-fry', '/uploads/images/products/0image1622543444.png', NULL, 1, 450.00, 50, 1, '2021-06-21 00:30:46', '2021-06-21 00:30:47'),
(109, 'Prawn Sizzling', 'prawn-sizzling', '/uploads/images/products/0image1622543413.png', NULL, 1, 450.00, 50, 1, '2021-06-21 00:30:47', '2021-06-21 00:30:47'),
(110, 'King Prawn Hot Sauce', 'king-prawn-hot-sauce', '/uploads/images/products/0image1622543386.png', NULL, 1, 600.00, 50, 1, '2021-06-21 00:30:47', '2021-06-21 00:30:48'),
(111, 'Prawn Masala', 'prawn-masala', '/uploads/images/products/0image1622543350.png', NULL, 1, 450.00, 50, 1, '2021-06-21 00:30:49', '2021-06-21 00:30:50'),
(112, 'Mutton Karai Sizzling', 'mutton-karai-sizzling', '/uploads/images/products/0image1622543300.png', NULL, 1, 480.00, 50, 1, '2021-06-21 00:30:51', '2021-06-21 00:30:51'),
(113, 'Mutton Masala', 'mutton-masala', '/uploads/images/products/0image1622543268.png', NULL, 1, 450.00, 50, 1, '2021-06-21 00:30:52', '2021-06-21 00:30:52'),
(114, 'Chicken Mushroom With Ginger', 'chicken-mushroom-with-ginger', '/uploads/images/products/0image1622543120.png', NULL, 1, 350.00, 50, 1, '2021-06-21 00:30:53', '2021-06-21 00:30:53'),
(115, 'Sweel & Sour Chicken', 'sweel-sour-chicken', '/uploads/images/products/0image1622543031.png', NULL, 1, 350.00, 50, 1, '2021-06-21 00:30:54', '2021-06-21 00:30:54'),
(116, 'Special Foil Chicken Curry', 'special-foil-chicken-curry', '/uploads/images/products/0image1622542964.png', NULL, 1, 400.00, 50, 1, '2021-06-21 00:30:55', '2021-06-21 00:30:55'),
(117, 'Chicken Sizzling', 'chicken-sizzling', '/uploads/images/products/0image1622542877.png', NULL, 1, 420.00, 50, 1, '2021-06-21 00:30:55', '2021-06-21 00:30:55'),
(118, 'Szuan Chicken Curry', 'szuan-chicken-curry', '/uploads/images/products/0image1622542834.png', NULL, 1, 350.00, 50, 1, '2021-06-21 00:30:56', '2021-06-21 00:30:57'),
(119, 'Lemon Chicken', 'lemon-chicken', '/uploads/images/products/0image1622542780.png', NULL, 1, 350.00, 50, 1, '2021-06-21 00:30:57', '2021-06-21 00:30:57'),
(120, 'Bangkok Chicken Fry (8 pcs)', 'bangkok-chicken-fry-8-pcs', '/uploads/images/products/0image1622542635.png', NULL, 1, 320.00, 50, 1, '2021-06-21 00:30:58', '2021-06-21 00:30:58'),
(121, 'Chicken Chili (Dry)', 'chicken-chili-dry', '/uploads/images/products/0image1622542529.png', NULL, 1, 350.00, 50, 1, '2021-06-21 00:30:59', '2021-06-21 00:30:59'),
(122, 'Chicken Chili Onion', 'chicken-chili-onion', '/uploads/images/products/0image1622542485.png', NULL, 1, 350.00, 50, 1, '2021-06-21 00:30:59', '2021-06-21 00:31:00'),
(123, 'Chicken Masala', 'chicken-masala', '/uploads/images/products/0image1622542432.png', NULL, 1, 380.00, 50, 1, '2021-06-21 00:31:00', '2021-06-21 00:31:00'),
(124, 'Chicken Cutlets', 'chicken-cutlets', '/uploads/images/products/0image1622542392.png', NULL, 1, 350.00, 50, 1, '2021-06-21 00:31:00', '2021-06-21 00:31:01'),
(125, 'Chicken Lolipop', 'chicken-lolipop', '/uploads/images/products/0image1622542317.png', NULL, 1, 350.00, 50, 1, '2021-06-21 00:31:01', '2021-06-21 00:31:01'),
(126, 'Chicken Salay', 'chicken-salay', '/uploads/images/products/0image1622542281.png', NULL, 1, 400.00, 50, 1, '2021-06-21 00:31:02', '2021-06-21 00:31:02'),
(127, 'Spring Chicken Fry', 'spring-chicken-fry', '/uploads/images/products/0image1622542229.png', NULL, 1, 350.00, 50, 1, '2021-06-21 00:31:02', '2021-06-21 00:31:02'),
(128, 'Chicken B.B.Q', 'chicken-bbq', '/uploads/images/products/0image1622542160.png', NULL, 1, 450.00, 50, 1, '2021-06-21 00:31:02', '2021-06-21 00:31:03'),
(129, 'Special Sichuan Chicken Fry', 'special-sichuan-chicken-fry', '/uploads/images/products/0image1622542128.png', NULL, 1, 380.00, 50, 1, '2021-06-21 00:31:03', '2021-06-21 00:31:03'),
(130, 'Special Chicken Fry', 'special-chicken-fry', '/uploads/images/products/0image1622542079.png', NULL, 1, 400.00, 50, 1, '2021-06-21 00:31:03', '2021-06-21 00:31:04'),
(131, 'Cheese Sandwich', 'cheese-sandwich', '/uploads/images/products/0image1622542021.png', NULL, 1, 120.00, 50, 1, '2021-06-21 00:31:04', '2021-06-21 00:31:04'),
(132, 'Club Sandwich', 'club-sandwich', '/uploads/images/products/0image1622541987.png', NULL, 1, 150.00, 50, 1, '2021-06-21 00:31:07', '2021-06-21 00:31:07'),
(133, 'Special Pizza 12\"', 'special-pizza-12', '/uploads/images/products/0image1622541958.png', NULL, 1, 590.00, 50, 1, '2021-06-21 00:31:07', '2021-06-21 00:31:07'),
(134, 'Special Pizza 8\"', 'special-pizza-8', '/uploads/images/products/0image1622541925.png', NULL, 1, 450.00, 50, 1, '2021-06-21 00:31:08', '2021-06-21 00:31:09'),
(135, 'Crispy Chicken', 'crispy-chicken', '/uploads/images/products/0image1622541886.png', NULL, 1, 60.00, 50, 1, '2021-06-21 00:31:09', '2021-06-21 00:31:09'),
(136, 'Special Burger', 'special-burger', '/uploads/images/products/0image1622541851.png', NULL, 1, 120.00, 50, 1, '2021-06-21 00:31:09', '2021-06-21 00:31:10'),
(137, 'Mashroom Vegetable', 'mashroom-vegetable', '/uploads/images/products/0image1622541755.png', NULL, 1, 250.00, 50, 1, '2021-06-21 00:31:10', '2021-06-21 00:31:10'),
(138, 'Mixed Vegetables', 'mixed-vegetables', '/uploads/images/products/0image1622541717.png', NULL, 1, 200.00, 50, 1, '2021-06-21 00:31:11', '2021-06-21 00:31:11'),
(139, 'Beef Vegetable', 'beef-vegetable', '/uploads/images/products/0image1622541687.png', NULL, 1, 280.00, 50, 1, '2021-06-21 00:31:11', '2021-06-21 00:31:12'),
(140, 'Prawn Vegetable', 'prawn-vegetable', '/uploads/images/products/0image1622541649.png', NULL, 1, 280.00, 50, 1, '2021-06-21 00:31:12', '2021-06-21 00:31:12'),
(141, 'Chicken Vegetable', 'chicken-vegetable', '/uploads/images/products/0image1622541619.png', NULL, 1, 240.00, 50, 1, '2021-06-21 00:31:13', '2021-06-21 00:31:13'),
(142, 'Special vegetable', 'special-vegetable', '/uploads/images/products/0image1622541591.png', NULL, 1, 300.00, 50, 1, '2021-06-21 00:31:13', '2021-06-21 00:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `products_categories`
--

CREATE TABLE `products_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_categories`
--

INSERT INTO `products_categories` (`id`, `category_id`, `product_id`) VALUES
(11, 2, 2),
(12, 1, 2),
(13, 2, 1),
(14, 10, 10),
(15, 11, 10),
(16, 12, 10),
(17, 13, 10),
(18, 15, 10),
(19, 17, 20),
(20, 18, 21),
(21, 18, 22),
(22, 18, 23),
(23, 19, 24),
(24, 19, 25),
(25, 19, 26),
(26, 19, 27),
(27, 19, 28),
(28, 19, 29),
(29, 19, 30),
(30, 19, 31),
(31, 20, 32),
(32, 21, 33),
(33, 21, 34),
(34, 29, 35),
(35, 30, 36),
(36, 30, 37),
(37, 30, 38),
(38, 31, 39),
(39, 31, 40),
(40, 31, 41),
(41, 31, 42),
(42, 31, 43),
(43, 31, 44),
(44, 31, 45),
(45, 31, 46),
(46, 32, 47),
(47, 33, 48),
(48, 33, 49),
(49, 41, 50),
(50, 41, 51),
(51, 41, 52),
(52, 41, 53),
(53, 42, 54),
(54, 42, 55),
(55, 42, 56),
(56, 42, 57),
(57, 42, 58),
(58, 42, 59),
(59, 42, 60),
(60, 42, 61),
(61, 42, 62),
(62, 42, 63),
(63, 42, 64),
(64, 43, 65),
(65, 43, 66),
(66, 43, 67),
(67, 43, 68),
(68, 43, 69),
(69, 43, 70),
(70, 43, 71),
(71, 43, 72),
(72, 43, 73),
(73, 43, 74),
(74, 44, 75),
(75, 44, 76),
(76, 44, 77),
(77, 44, 78),
(78, 44, 79),
(79, 44, 80),
(80, 44, 81),
(81, 45, 82),
(82, 45, 83),
(83, 45, 84),
(84, 45, 85),
(85, 45, 86),
(86, 45, 87),
(87, 45, 88),
(88, 45, 89),
(89, 45, 90),
(90, 45, 91),
(91, 46, 92),
(92, 46, 93),
(93, 46, 94),
(94, 46, 95),
(95, 46, 96),
(96, 46, 97),
(97, 46, 98),
(98, 46, 99),
(99, 46, 100),
(100, 47, 101),
(101, 47, 102),
(102, 47, 103),
(103, 48, 104),
(104, 48, 105),
(105, 48, 106),
(106, 48, 107),
(107, 48, 108),
(108, 48, 109),
(109, 48, 110),
(110, 48, 111),
(111, 49, 112),
(112, 50, 113),
(113, 50, 114),
(114, 50, 115),
(115, 50, 116),
(116, 50, 117),
(117, 50, 118),
(118, 50, 119),
(119, 50, 120),
(120, 50, 121),
(121, 50, 122),
(122, 50, 123),
(123, 50, 124),
(124, 50, 125),
(125, 50, 126),
(126, 50, 127),
(127, 50, 128),
(128, 50, 129),
(129, 50, 130),
(130, 51, 131),
(131, 51, 132),
(132, 51, 133),
(133, 51, 134),
(134, 51, 135),
(135, 51, 136),
(136, 52, 137),
(137, 52, 138),
(138, 52, 139),
(139, 52, 140),
(140, 52, 141),
(141, 52, 142);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'web', '2021-08-25 03:56:41', '2021-08-25 03:56:41'),
(2, 'admin', 'web', '2021-08-25 03:56:41', '2021-08-25 03:56:41'),
(3, 'moderator', 'web', '2021-08-25 03:56:41', '2021-08-25 03:56:41'),
(4, 'new', 'web', '2021-08-25 03:56:41', '2021-08-25 03:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` timestamp NULL DEFAULT NULL,
  `join_date` timestamp NULL DEFAULT NULL,
  `staf_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `phone`, `email`, `image`, `address`, `description`, `uid`, `uid_type`, `dob`, `join_date`, `staf_type_id`, `user_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hakeem Cruz', '+1 (227) 755-3251', 'dyhixoso@mailinator.com', '/uploads/images/staff/image1630840261.png', 'Quis laborum consect', 'Sed sed nobis rerum', 'Nisi asperiores aut', 'nid', '1997-09-04 18:00:00', '2021-09-04 18:00:00', 5, 1, 1, '2021-09-05 04:23:46', '2021-09-05 05:12:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff_types`
--

CREATE TABLE `staff_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff_types`
--

INSERT INTO `staff_types` (`id`, `name`, `user_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'General Manager', NULL, 1, '2021-09-05 04:29:19', '2021-09-05 04:29:19', NULL),
(2, 'Assistant Manager', NULL, 1, '2021-09-05 04:29:19', '2021-09-05 04:29:19', NULL),
(3, 'Executive Chef', NULL, 1, '2021-09-05 04:29:20', '2021-09-05 04:29:20', NULL),
(4, 'Sous Chef', NULL, 1, '2021-09-05 04:29:20', '2021-09-05 04:29:20', NULL),
(5, 'Pastry Chef', NULL, 1, '2021-09-05 04:29:20', '2021-09-05 04:29:20', NULL),
(6, 'Kitchen Manager', NULL, 1, '2021-09-05 04:29:20', '2021-09-05 04:29:20', NULL),
(7, 'Food & Beverage Manager', NULL, 1, '2021-09-05 04:29:20', '2021-09-05 04:29:20', NULL),
(8, 'Line Cook', NULL, 1, '2021-09-05 04:29:20', '2021-09-05 04:29:20', NULL),
(9, 'Fast Food Cook', NULL, 1, '2021-09-05 04:29:20', '2021-09-05 04:29:20', NULL),
(10, 'Short Order Cook', NULL, 1, '2021-09-05 04:29:20', '2021-09-05 04:29:20', NULL),
(11, 'Prep cook', NULL, 1, '2021-09-05 04:29:20', '2021-09-05 04:29:20', NULL),
(12, 'Sommelier', NULL, 1, '2021-09-05 04:29:20', '2021-09-05 04:29:20', NULL),
(13, 'Server', NULL, 1, '2021-09-05 04:29:20', '2021-09-05 04:29:20', NULL),
(14, 'Runner', NULL, 1, '2021-09-05 04:29:20', '2021-09-05 04:29:20', NULL),
(15, 'Busser/Bus person', NULL, 1, '2021-09-05 04:29:20', '2021-09-05 04:29:20', NULL),
(16, 'Host/Hostess', NULL, 1, '2021-09-05 04:29:20', '2021-09-05 04:29:20', NULL),
(17, 'Bartender', NULL, 1, '2021-09-05 04:29:20', '2021-09-05 04:29:20', NULL),
(18, 'Barback', NULL, 1, '2021-09-05 04:29:20', '2021-09-05 04:29:20', NULL),
(19, 'Barista', NULL, 1, '2021-09-05 04:29:20', '2021-09-05 04:29:20', NULL),
(20, 'Drive-thru Operator', NULL, 1, '2021-09-05 04:29:20', '2021-09-05 04:29:20', NULL),
(21, 'Cashier', NULL, 1, '2021-09-05 04:29:20', '2021-09-05 04:29:20', NULL),
(22, 'Dishwasher', NULL, 1, '2021-09-05 04:29:20', '2021-09-05 04:29:20', NULL),
(23, 'Driver', NULL, 1, '2021-09-05 04:29:20', '2021-09-05 04:29:20', NULL),
(24, 'Guard', NULL, 1, '2021-09-05 04:29:20', '2021-09-05 04:29:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_items`
--

CREATE TABLE `stock_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stock_id` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` int(11) NOT NULL,
  `price` double(20,2) NOT NULL,
  `quantity` double(20,3) NOT NULL,
  `total` double(20,2) NOT NULL,
  `previous_stock` int(11) NOT NULL,
  `current_stock` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `company`, `phone`, `email`, `image`, `password`, `address`, `warehouse`, `description`, `user_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Aline Santiago', 'Gilliam and Herman Trading', '+1 (878) 648-1335', 'tepu@mailinator.com', '/uploads/images/suppliers/image1630730170.png', NULL, 'Pariatur Ipsum ut c', 'Alias non pariatur', 'Odit nisi vitae erro', 1, 1, '2021-09-03 22:29:48', '2021-09-03 22:36:10', NULL),
(2, 'Dr. Baby Ondricka III', 'Shields, Hermann and Thiel', '(435) 307-6172', 'charity.morissette@example.com', NULL, NULL, '41359 Michael Causeway Suite 058\nNorth Lyric, OR 94018-0060', '27274 Lueilwitz Lodge\nWest Deltaton, WA 00425', 'So Alice.', NULL, 1, '2021-09-05 00:09:10', '2021-09-05 00:09:10', NULL),
(3, 'Olin Abshire', 'Hoeger, Collins and Hahn', '1-380-994-1488', 'mwolf@example.org', NULL, NULL, '187 McCullough Mall Suite 978\nAlbinashire, WA 99540', '64060 Ruecker Union Apt. 731\nStarkview, MI 10436', 'Duchess, \'chop.', NULL, 1, '2021-09-05 00:09:10', '2021-09-05 00:09:10', NULL),
(4, 'Lacy Miller', 'Rolfson PLC', '731.493.1851', 'nat.cassin@example.org', NULL, NULL, '92360 Legros Cape\nPort Sim, MD 03225', '21124 Windler Lane\nWest Jaceyview, CA 93819-7762', 'FIT you,\' said.', NULL, 1, '2021-09-05 00:09:10', '2021-09-05 00:09:10', NULL),
(5, 'Thelma Hudson DDS', 'Borer, Gerlach and Rippin', '+1 (248) 309-4099', 'vesta39@example.com', NULL, NULL, '4338 Tillman Island\nZolaside, HI 90878', '3608 Ada Run\nElmirahaven, OH 56179', 'Was kindly.', NULL, 1, '2021-09-05 00:09:10', '2021-09-05 00:09:10', NULL),
(6, 'Dr. Fern Durgan Jr.', 'Wintheiser-Botsford', '+1-337-208-2015', 'mozelle.heathcote@example.com', NULL, NULL, '382 Renner Street\nWuckertchester, NH 40469-6291', '865 Luella Forest\nMartinafurt, IA 76094', 'King. The.', NULL, 1, '2021-09-05 00:09:10', '2021-09-05 00:09:10', NULL),
(7, 'Prof. Gisselle Zulauf', 'Douglas Group', '1-878-721-5680', 'magnolia.kuhlman@example.org', NULL, NULL, '407 Thea Points\nEast Eloisefurt, IL 82725', '6368 O\'Connell Valley\nKubville, OK 99779', 'In the very.', NULL, 1, '2021-09-05 00:09:10', '2021-09-05 00:09:10', NULL),
(8, 'Brandi Mayer', 'Mertz-Funk', '361-708-0654', 'mreichert@example.net', NULL, NULL, '471 Stamm Creek\nLake Jadon, WI 56258-9685', '5287 Hane Cape\nWest Mayeport, AL 12074', 'March Hare.', NULL, 1, '2021-09-05 00:09:10', '2021-09-05 00:09:10', NULL),
(9, 'Teresa Mante', 'Emard-Mosciski', '+1 (817) 295-4995', 'titus70@example.org', NULL, NULL, '919 Marty Track Apt. 119\nSchinnermouth, LA 91598', '5782 O\'Reilly Ways Suite 812\nPenelopefort, GA 25981-7511', 'NOT SWIM--\" you.', NULL, 1, '2021-09-05 00:09:10', '2021-09-05 00:09:10', NULL),
(10, 'Micah Ritchie V', 'Grady-Yost', '+1 (817) 852-8803', 'kulas.willa@example.com', NULL, NULL, '2897 Josianne Villages\nGoldnerbury, MA 01472-6673', '723 Missouri Bypass Suite 867\nNew Kathryneview, MD 01306-5116', 'There was.', NULL, 1, '2021-09-05 00:09:10', '2021-09-05 00:09:10', NULL),
(11, 'Garth Wilderman', 'Stokes and Sons', '1-424-818-7162', 'adelle97@example.net', NULL, NULL, '4510 Renee Loaf\nEast Erich, AZ 88319', '4971 Renee Rapid\nAdolphchester, CO 66927', 'VERY good.', NULL, 1, '2021-09-05 00:09:10', '2021-09-05 00:09:10', NULL),
(12, 'Mrs. Retha Ankunding', 'Price LLC', '1-585-590-6233', 'eturcotte@example.com', NULL, NULL, '89722 Shanie Square\nZiemannshire, CA 01072-3164', '232 Reichert Walk\nPascaletown, MA 25188-1344', 'There\'s no.', NULL, 1, '2021-09-05 00:09:10', '2021-09-05 00:09:10', NULL),
(13, 'Miss Velda Weimann DVM', 'Hane, Nader and Krajcik', '+1 (262) 324-8190', 'tcasper@example.com', NULL, NULL, '8227 Dickinson Extension Suite 689\nStrackeberg, IA 06142-0939', '45494 Micah View\nNew Josefina, AZ 07442', 'I to get.', NULL, 1, '2021-09-05 00:09:10', '2021-09-05 00:09:10', NULL),
(14, 'Skylar Aufderhar', 'Treutel Ltd', '469.652.5735', 'reichel.keeley@example.net', NULL, NULL, '785 Brett Ville\nMarvinburgh, KY 41247', '7414 Laurence Manors\nMitchellmouth, GA 73432-0904', 'And oh, my.', NULL, 1, '2021-09-05 00:09:10', '2021-09-05 00:09:10', NULL),
(15, 'Victoria Ferry', 'Cummerata-Wintheiser', '+1-484-427-4566', 'tokeefe@example.com', NULL, NULL, '943 Cheyanne Knolls\nBrisaberg, OK 10881-3825', '95102 Leland Union Suite 056\nHalvorsontown, TX 30032-0914', 'But her sister.', NULL, 1, '2021-09-05 00:09:10', '2021-09-05 00:09:10', NULL),
(16, 'Oswald Powlowski III', 'Kutch, Swaniawski and Spinka', '+1-872-386-7071', 'cremin.sienna@example.net', NULL, NULL, '3044 Bechtelar Parkway\nMileshaven, OK 09042', '641 Fanny Park Apt. 547\nGutkowskifort, CT 42963-4051', 'Involved in this.', NULL, 1, '2021-09-05 00:09:10', '2021-09-05 00:09:10', NULL),
(17, 'Sydnie Maggio', 'Heller-Carter', '575-475-6523', 'roselyn.grant@example.com', NULL, NULL, '873 Powlowski Oval Suite 455\nNew Reymundotown, NM 93673-2009', '24727 Leora Lights Apt. 990\nShanahanfurt, MS 48982', 'Alice had.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(18, 'Loma Kerluke', 'Dach Ltd', '1-657-937-0139', 'koch.keanu@example.net', NULL, NULL, '4764 Arvel Throughway Suite 351\nLake Fidelchester, KS 15365-8473', '483 Lora Key\nEast Tanner, AR 15492', 'And will.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(19, 'Jenifer Hill', 'Pouros Inc', '+1-508-845-6263', 'meta17@example.com', NULL, NULL, '4546 Delphia Pine Apt. 005\nDoloresside, NM 81807', '4641 Bayer Stream Suite 727\nEast Aprilborough, NJ 60035-6159', 'Cat. \'--so long.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(20, 'Ramon Murray', 'Kunde-O\'Hara', '+1-413-837-1084', 'alek.ernser@example.net', NULL, NULL, '80651 Liam Views Apt. 419\nEast Eloystad, MI 28452-0013', '331 Claudia Place Apt. 964\nEast Jamar, DC 35341-6418', 'Dormouse went.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(21, 'Mabelle Murray', 'Ruecker, Kreiger and Medhurst', '(612) 876-3265', 'elmo22@example.com', NULL, NULL, '5651 Merritt Rapid\nSteubertown, VT 38244-6405', '96639 Porter Vista\nEast Sheaburgh, OK 02356-8987', 'IS the fun?\'.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(22, 'Francesca Lang', 'Runolfsson-Marvin', '1-510-476-1484', 'hhaley@example.com', NULL, NULL, '63379 Feil Vista\nNew Judsonport, CT 47923-4675', '3209 Garrison Track Apt. 675\nAngeloport, CT 75203-8643', 'King. \'When did.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(23, 'Prof. Katelin Lockman', 'Abbott Group', '+1-838-276-5488', 'christiansen.frederik@example.net', NULL, NULL, '45222 Homenick Stream Apt. 778\nChristianachester, MN 31782', '609 Noble Gardens Suite 484\nWest Casimerfort, TN 27932', 'I hadn\'t.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(24, 'Liana Beatty', 'Kunde, Braun and West', '+14325609438', 'iliana.cole@example.net', NULL, NULL, '8302 Haley Divide Apt. 900\nCamrentown, TN 58825', '906 Lenore Roads\nBreanneville, IL 15514-2982', 'Duchess took.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(25, 'Jeramy King', 'Wolf-Sporer', '(575) 507-6891', 'chesley.welch@example.net', NULL, NULL, '15738 Fisher Dale Apt. 060\nEstrellaberg, NH 90128-6783', '93329 Smith Ridges Apt. 030\nChaimhaven, MD 02671', 'I didn\'t.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(26, 'Tyrel Jacobs', 'Greenholt, Gaylord and Parker', '781.355.4090', 'walter.kip@example.com', NULL, NULL, '2374 Lorine Prairie\nWest Hank, WY 81499', '81718 Kaitlyn Summit Apt. 144\nLizzieborough, AL 04576-7679', 'THEN--she found.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(27, 'Madyson Beatty', 'Simonis Inc', '907.852.9266', 'henry.schaden@example.org', NULL, NULL, '44081 Beatty Junctions\nLangberg, DC 69036-6609', '340 Osinski Garden\nMayerland, NJ 66114-4163', 'All on a branch.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(28, 'Mrs. Alia Zboncak I', 'Schroeder PLC', '973.560.4305', 'skihn@example.org', NULL, NULL, '42495 Demario Creek Suite 806\nGiovannimouth, MO 64382', '540 Adaline Glen Suite 723\nEast Ariannabury, KY 29533-0338', 'Mock Turtle in.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(29, 'Miss Vada Rath I', 'Hansen Inc', '+1-435-590-6433', 'eileen.satterfield@example.com', NULL, NULL, '270 Hoeger Views Apt. 477\nNew Helen, WV 07249-6741', '751 Hills Villages Apt. 597\nWest Torrance, UT 15929', 'Let me see--how.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(30, 'Ethyl Kshlerin', 'Mann-Veum', '929-675-0416', 'deangelo.ondricka@example.com', NULL, NULL, '289 Lueilwitz Stream Apt. 370\nMatildeville, IN 86090-4806', '3962 Schinner Plain\nPort Maybell, WI 24047-2374', 'She was close.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(31, 'Prof. Elisha King DVM', 'Jacobson, Jacobson and Hane', '+1 (779) 887-6259', 'jennifer.funk@example.com', NULL, NULL, '776 Terry Locks Suite 650\nPort Aaliyahfort, LA 62213', '869 Rusty Fall Suite 185\nWest Janeside, PA 19587', 'I almost.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(32, 'Clifford Herzog', 'Yundt-Buckridge', '+1-706-837-8917', 'istracke@example.org', NULL, NULL, '2731 Cruickshank Tunnel\nO\'Keefeberg, DE 19198', '469 Jones Bypass Suite 807\nEast Marisol, OH 63859-1923', 'Alice, looking.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(33, 'Shana Hauck', 'Kunze Inc', '+13467817858', 'jaida25@example.com', NULL, NULL, '52597 Esmeralda Wells Suite 968\nHowellview, PA 09196-8749', '5683 Schowalter Shoals Apt. 284\nEast Jarrod, MN 30184', 'Alice, and.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(34, 'Bonnie Lynch', 'Block Ltd', '+1.463.932.8635', 'vandervort.armando@example.net', NULL, NULL, '2067 Albin Drive Apt. 364\nNorth Issacfort, SC 65680', '3303 Julie Hollow Suite 534\nNorth Ali, LA 50556', 'Queen, tossing.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(35, 'Hudson Friesen', 'Kunde, Dach and Lubowitz', '1-469-661-5280', 'filomena.bogan@example.net', NULL, NULL, '271 Orn Crossroad Apt. 937\nPaucekside, WI 40212-7923', '24125 Kayli Expressway Apt. 766\nSchaeferchester, WI 55015-3867', 'I could not make.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(36, 'Conor Schaden', 'Ziemann Ltd', '+1 (323) 268-2866', 'nils.marquardt@example.com', NULL, NULL, '85948 Smith Canyon Apt. 826\nKozeyview, MO 06752', '933 Labadie Station Apt. 689\nMurphyfort, FL 10655', 'Cheshire.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(37, 'Gunnar Blick', 'Kozey, Ruecker and Sauer', '(831) 636-0415', 'dorcas.waters@example.com', NULL, NULL, '5032 Adele Lane Apt. 054\nPort Onieshire, OK 66745', '29265 Michale Lake\nWinnifredchester, SD 56912-3391', 'There was.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(38, 'Otho Keebler Sr.', 'Emard Group', '936-305-6870', 'anya87@example.org', NULL, NULL, '410 Enoch Club\nNew Nikkimouth, AR 78286-0841', '28358 Volkman Motorway Apt. 838\nNew Maritza, OK 13423-1475', 'I wonder if I.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(39, 'Trever Funk II', 'Wisozk, Hansen and Kshlerin', '504.790.6947', 'wlabadie@example.net', NULL, NULL, '53533 Tara Key\nWest Lessieville, HI 95125-8365', '473 O\'Connell Plains Apt. 019\nD\'Amoreport, NE 64880', 'Alice ventured to.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(40, 'Mrs. Sierra Stokes I', 'Prosacco, Marquardt and Mayer', '906.873.4081', 'alindgren@example.com', NULL, NULL, '48363 Rogahn Crescent Apt. 952\nSouth Major, PA 44900', '9224 Rickey Well\nSouth Jacquelyn, MI 99039-9810', 'I could show you.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(41, 'Yvonne Bartoletti', 'Zulauf Ltd', '+1.713.357.3698', 'stephanie02@example.org', NULL, NULL, '323 Shayna Shores\nNew Jett, UT 50271', '93355 Waelchi Loop Apt. 376\nNorth Ernestburgh, IL 56116-3174', 'Dodo had paused.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(42, 'Ashlynn Pacocha', 'Cummerata, Schmitt and Leuschke', '+1-773-297-1420', 'alan82@example.com', NULL, NULL, '74169 Schmeler Stravenue\nHannachester, MS 34152-0484', '909 Rylee Mill\nEast Jeanieton, TN 90314-6539', 'And concluded the.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(43, 'Chase Stiedemann', 'Kessler, Bechtelar and Goldner', '+1 (727) 686-5178', 'carrie21@example.org', NULL, NULL, '3847 Candida Islands\nWandatown, NJ 54052', '13558 Desmond Lodge\nDustinmouth, WI 88369-5307', 'VERY good.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(44, 'Freeman Turcotte', 'Funk, Lubowitz and Reynolds', '865.461.8708', 'chintz@example.net', NULL, NULL, '1255 Ona Ridge\nMosciskimouth, TN 28903', '94899 Deckow Spring Apt. 145\nPort Madilyn, SD 98729-5527', 'King, \'that saves.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(45, 'Miss Kelly Fahey PhD', 'Stark-Pacocha', '(820) 318-6631', 'wwalsh@example.com', NULL, NULL, '139 Chloe Meadows Suite 358\nLake Osbaldo, PA 51950', '829 Weimann Ramp\nWest Amiyaburgh, SD 80121', 'But the snail.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(46, 'Crawford Aufderhar', 'Trantow-Stroman', '740.832.9120', 'ernser.deron@example.com', NULL, NULL, '412 Lew Squares\nNew Bernardoport, WI 09983-4060', '26424 Sipes Hollow\nFeeneyfurt, ME 70645-6245', 'Alice. \'I.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(47, 'Asa Ryan', 'Stoltenberg-Weimann', '1-747-434-9317', 'isaias.zboncak@example.com', NULL, NULL, '194 Abernathy Route Suite 328\nKihnshire, WI 85372', '5800 Jordyn Trace Apt. 321\nErnserstad, AK 70048-4038', 'I to do such.', NULL, 1, '2021-09-05 00:09:11', '2021-09-05 00:09:11', NULL),
(48, 'King Schuppe', 'Jacobi PLC', '332.401.1333', 'clair.mayer@example.com', NULL, NULL, '89273 Koelpin Ranch\nMacieberg, MD 46771-2529', '44732 Watson Locks Apt. 797\nLurlinetown, AZ 11625-1057', 'Cat. \'--so long.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(49, 'Angel Jones', 'Runolfsson, Cummings and O\'Reilly', '539.406.1605', 'francesco.howe@example.com', NULL, NULL, '5024 Bayer Spurs\nLake Devantebury, IL 30192-2582', '6781 Lue Gardens\nNew Francescoville, OH 52671', 'I\'m mad?\' said.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(50, 'Mrs. Karolann Boyer', 'Barrows and Sons', '+1.934.388.5380', 'abbott.morton@example.com', NULL, NULL, '1626 Lemke Mill\nNorth Briaville, AZ 50472', '465 Elwyn Circles Apt. 087\nDooleytown, NE 93658-0377', 'King. \'It.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(51, 'Laron Murray', 'Lang PLC', '+1-425-660-9869', 'jenkins.ova@example.org', NULL, NULL, '6467 Carole Extension Apt. 762\nSouth Zack, CA 40980', '49934 Prohaska Court Apt. 196\nNolanberg, OK 52231', 'Bill had.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(52, 'Ashly Reilly', 'Shields LLC', '612-594-8112', 'gabriella78@example.com', NULL, NULL, '714 Tate Path Apt. 700\nWest Kayleighside, WV 13128-9089', '2500 Dayne Lodge Apt. 129\nZariahaven, NV 70454', 'I beat him when.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(53, 'Okey Morar', 'Mosciski, Pfannerstill and Murphy', '986-405-7983', 'ystrosin@example.org', NULL, NULL, '537 Lesch Causeway\nWilfridville, MN 03653-9368', '7604 Jaskolski Forges\nSpinkaburgh, IL 29428', 'IS the fun?\' said.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(54, 'Mr. Karson Schoen', 'Fisher, Stroman and Haley', '706.514.1794', 'schamberger.vella@example.net', NULL, NULL, '9844 Rempel Manor\nWillborough, UT 61485', '34839 Richmond Points Suite 113\nDietrichbury, MT 10432-6574', 'Alice as he.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(55, 'Holden Osinski III', 'Spencer, Lang and Mayert', '1-718-418-6386', 'glebsack@example.org', NULL, NULL, '1765 Walsh Dam Suite 783\nPort Chasityview, TX 05803-1257', '7424 Lamar Avenue Apt. 686\nWest Fiona, NM 23420', 'Alice said.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(56, 'Van Dooley', 'Weimann, Schamberger and Shields', '718.327.2951', 'dwight.halvorson@example.com', NULL, NULL, '29074 Lesch Route\nMillsborough, AR 17329', '52528 Abernathy Creek\nNorth Hermann, PA 49436-7137', 'I\'m pleased, and.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(57, 'Miss Kaia Beer', 'Gulgowski-Schroeder', '(606) 224-3218', 'bdonnelly@example.com', NULL, NULL, '2086 Katlyn Summit\nSouth Jany, SD 54732-4568', '528 Swift Alley Suite 274\nHaleystad, UT 18660', 'Alice as she fell.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(58, 'Amie Kiehn', 'Runolfsdottir, Jacobi and Torp', '+1-641-405-7028', 'jean.koch@example.net', NULL, NULL, '1904 Hudson Isle\nJordanefurt, AL 78763-7355', '63890 Art Mount\nKarishire, WY 92655-4561', 'She waited.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(59, 'Glenda Nikolaus DVM', 'Erdman-Conroy', '+1-351-517-9221', 'harvey04@example.org', NULL, NULL, '449 Melisa Points\nWarrenbury, AZ 01306-0785', '91428 Beahan Square\nShyannemouth, DE 12634-9944', 'The King looked.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(60, 'Miss Felicita McCullough PhD', 'Kling-Leffler', '+1 (973) 412-6266', 'ewindler@example.net', NULL, NULL, '54738 Robel Passage Apt. 674\nNew Krystel, UT 83833-8780', '3963 Hoyt Lights Suite 644\nEast Zaria, AK 08441', 'I beg your.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(61, 'Jess Beer II', 'Bruen-Schmitt', '(281) 407-9775', 'reilly.hilario@example.com', NULL, NULL, '824 Ankunding Point Apt. 804\nLake Jovanyburgh, CT 76591-4304', '75290 Shanahan Summit\nBodeport, KS 31417', 'Rabbit\'s.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(62, 'Sierra Wehner', 'Kiehn, Barrows and Boehm', '313-932-3176', 'rosie64@example.org', NULL, NULL, '6548 Lera Roads Apt. 262\nMadieton, WI 55358', '366 Laura Landing\nMcDermottborough, RI 29717', 'King said.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(63, 'Ms. Imelda Grant', 'McLaughlin, Harber and Senger', '+1-726-467-9102', 'edd.hoeger@example.org', NULL, NULL, '5042 Ortiz Parkways\nJayceeshire, CT 53099', '6137 Berge Ports\nHallieberg, CT 39037-4284', 'Five. \'I heard.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(64, 'Dewitt Rosenbaum', 'Raynor-Stroman', '(229) 780-2020', 'destinee43@example.net', NULL, NULL, '5072 Dedrick Groves Suite 358\nNorth Maxine, MO 06901', '6595 Tatyana Drive\nPollychester, AZ 48066', 'And the moral of.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(65, 'Dr. Reginald Turner Sr.', 'Rosenbaum Group', '551.510.5568', 'ashlee.terry@example.com', NULL, NULL, '6882 Brekke Ways\nNew Kenton, NH 78822-4475', '760 Lottie Dale Apt. 704\nMcKenzieview, HI 13894-3893', 'Alice; \'but a grin.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(66, 'Dr. Laurel Gerhold DDS', 'Fadel, Emard and McDermott', '+12185947385', 'vsanford@example.org', NULL, NULL, '816 Bianka Expressway\nNew Kristopherside, ID 07879', '1350 Okuneva Cove\nNorth Herthaville, GA 46944-3247', 'For some minutes.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(67, 'Adelia Cassin', 'Kuphal, Gorczany and Krajcik', '+1-737-795-0092', 'cherzog@example.org', NULL, NULL, '44555 Cordell Row Suite 169\nPort Guadalupefurt, MA 29831-9480', '368 Coty View Suite 938\nJessiebury, NJ 70856-4139', 'Number One,\'.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(68, 'Amy Friesen', 'Borer-Toy', '+15015258654', 'zulauf.fabiola@example.net', NULL, NULL, '9763 Vandervort Falls Suite 343\nLake Cooperville, LA 44499', '472 Samantha Springs Apt. 701\nAlvenaport, DE 73349-3135', 'March Hare.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(69, 'Mr. Tristian Vandervort', 'Littel PLC', '+13513007125', 'ghartmann@example.org', NULL, NULL, '177 Lora Junctions\nParkerside, SD 53164-2319', '466 Earline Station\nWestonside, MN 62123', 'White Rabbit.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(70, 'Miss Briana Bogisich', 'Emard, McLaughlin and Ondricka', '843.907.4834', 'hyatt.linda@example.org', NULL, NULL, '20545 Benton Ramp\nPollichton, NC 51553-6702', '28133 Okuneva Hills\nNorth Rachelside, CA 70983', 'Alice was only.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(71, 'Thalia Marks', 'Ondricka, Keebler and Moen', '731-220-8935', 'samson87@example.org', NULL, NULL, '357 Tony Stravenue Suite 572\nNorth Andreanneside, MS 26360-3056', '712 Maxine Dam\nCasperchester, LA 05646-2059', 'I ought to.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(72, 'Noah Ledner', 'Hackett-Stiedemann', '207-877-2488', 'ugoodwin@example.org', NULL, NULL, '9990 Kolby Mill Apt. 797\nFaustinoville, MS 17352', '94886 Russel Mountains Suite 480\nBeatriceport, HI 66255', 'King sharply. \'Do.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(73, 'Mackenzie Von', 'Purdy, Kessler and Swift', '253.991.6589', 'josue66@example.org', NULL, NULL, '19815 Hoppe Crescent\nWest Mervin, FL 83104', '72201 Zoe Square\nWest Janellemouth, AK 35196', 'Rabbit was.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(74, 'Eino Bartell', 'Ruecker, Hauck and Abernathy', '+1.678.278.0607', 'ernser.tanya@example.net', NULL, NULL, '326 Hand Spring\nSouth Maegan, UT 29055', '554 Leffler Vista\nHauckberg, OR 01121-5421', 'Dormouse\'s.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(75, 'Mrs. Annalise Stehr MD', 'Will and Sons', '+1 (385) 324-1251', 'vprohaska@example.org', NULL, NULL, '88161 Sage Street Suite 008\nNorth Alford, MD 34697-4159', '946 Lula Camp\nO\'Konview, MN 05969', 'I eat or drink.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(76, 'Gunnar Bogan PhD', 'Christiansen-Reinger', '1-878-648-8315', 'gillian.upton@example.net', NULL, NULL, '5749 Hilpert Junction\nLake Aletha, CT 47593-5352', '2751 Ebba Street Apt. 806\nHillardland, MD 66734-2331', 'Hatter, it.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(77, 'Mr. Kadin Kling II', 'Rodriguez and Sons', '820-791-9618', 'abernathy.matt@example.net', NULL, NULL, '3263 Rylan Plain Suite 050\nBennettmouth, AK 59324', '92295 Uriah Ways\nWest Wandaport, UT 03808', 'I to do?\'.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(78, 'Ms. Jaunita Dare Jr.', 'Pagac LLC', '225-780-4635', 'ozulauf@example.com', NULL, NULL, '263 Destini Lodge\nBoehmshire, WA 12485', '220 Treutel Mountain\nLake Ivahfort, NE 74803-0132', 'Rabbit-Hole.', NULL, 1, '2021-09-05 00:09:12', '2021-09-05 00:09:12', NULL),
(79, 'Pierre Shanahan IV', 'Armstrong, Rolfson and Sanford', '(617) 254-4710', 'eli13@example.net', NULL, NULL, '82296 Herman Islands Suite 530\nPort Tiffanybury, CA 82603-2160', '4776 Wuckert Canyon Suite 318\nWest Loyal, IL 04636', 'And he got.', NULL, 1, '2021-09-05 00:09:13', '2021-09-05 00:09:13', NULL),
(80, 'Tomasa Veum', 'Schimmel, Stehr and Ebert', '573.373.8348', 'asawayn@example.org', NULL, NULL, '1381 Amiya Wells\nMannland, FL 67467-0716', '6782 Weissnat Branch Suite 139\nNorth Mervinville, NH 73128', 'Allow me to sell.', NULL, 1, '2021-09-05 00:09:13', '2021-09-05 00:09:13', NULL),
(81, 'Dasia Heaney PhD', 'Kris, Haag and Koss', '(270) 420-2027', 'glover.camryn@example.net', NULL, NULL, '351 Hollis Roads Apt. 673\nWest Brownbury, CO 23507-8038', '8158 McLaughlin Ports Suite 282\nNew Nilshaven, MI 26646', 'Duchess and the.', NULL, 1, '2021-09-05 00:09:13', '2021-09-05 00:09:13', NULL),
(82, 'Jaylin Haley', 'Glover, Doyle and Rosenbaum', '734-289-7511', 'etromp@example.org', NULL, NULL, '99444 Caterina Motorway Suite 689\nJaydahaven, NM 87106-0289', '4795 Lucinda Pass\nAsaview, ND 55858', 'Alice had no.', NULL, 1, '2021-09-05 00:09:13', '2021-09-05 00:09:13', NULL),
(83, 'Miss Marilyne Gislason Jr.', 'Cummerata-Auer', '754-540-6079', 'aleen35@example.org', NULL, NULL, '139 Laury Village\nIssacview, DC 78466', '7197 Prohaska Glens\nAaliyahside, WA 04623', 'I know all.', NULL, 1, '2021-09-05 00:09:13', '2021-09-05 00:09:13', NULL),
(84, 'Tyrel Walter V', 'Padberg-Bradtke', '+1-530-485-4444', 'corwin.milan@example.org', NULL, NULL, '41461 Marjolaine Rapid Suite 291\nEast Orinchester, NC 72010', '99238 Conor Wall Apt. 648\nNew Eastonbury, OR 08385', 'Alice, \'as.', NULL, 1, '2021-09-05 00:09:13', '2021-09-05 00:09:13', NULL),
(85, 'Elenora Greenfelder', 'Wolf-Yundt', '(213) 750-0828', 'bruen.marina@example.net', NULL, NULL, '49725 Cielo Avenue Suite 119\nLake Loyceborough, MO 05419-5236', '196 Rose Meadows Apt. 016\nShermanport, MI 59125', 'King hastily said.', NULL, 1, '2021-09-05 00:09:13', '2021-09-05 00:09:13', NULL),
(86, 'Kale Koss', 'Strosin-Dickinson', '+1.218.579.7407', 'ohane@example.org', NULL, NULL, '3453 Aufderhar Burg Apt. 328\nJeffreyport, VA 55914', '73307 Farrell Rapids\nWest Blaze, GA 60145', 'I\'ll take.', NULL, 1, '2021-09-05 00:09:13', '2021-09-05 00:09:13', NULL),
(87, 'Jules Abbott', 'Treutel, Turcotte and Zieme', '+1-440-373-1816', 'grant.tia@example.com', NULL, NULL, '9937 Bergstrom Glen Suite 450\nWest Dejahstad, WV 63140', '18817 Little Centers\nAugustineland, IL 57505', 'VERY long.', NULL, 1, '2021-09-05 00:09:13', '2021-09-05 00:09:13', NULL),
(88, 'Tristin Cassin', 'Kertzmann, Koss and Green', '+1.442.371.4146', 'lillian.mccullough@example.com', NULL, NULL, '8269 Aletha Spur Apt. 629\nWest Haylie, UT 43191', '4167 Moen Throughway Apt. 335\nBauchberg, CO 19731-4547', 'All the time she.', NULL, 1, '2021-09-05 00:09:13', '2021-09-05 00:09:13', NULL),
(89, 'Prof. Rod Schulist', 'Thompson Inc', '820.322.0802', 'florian44@example.net', NULL, NULL, '3249 Shannon Square Apt. 210\nNorth Reva, VA 49080-8561', '83609 Kristian Extension\nSouth Allanchester, AL 31880-3688', 'I should.', NULL, 1, '2021-09-05 00:09:13', '2021-09-05 00:09:13', NULL),
(90, 'Simone Runolfsdottir Sr.', 'Greenholt-Larson', '+1-202-656-3917', 'abigale56@example.com', NULL, NULL, '263 Isai Inlet Apt. 168\nLake Valentinbury, ND 70673-0796', '3408 Green Trail\nNorth Madysonton, NJ 02230-7966', 'Alice thought).', NULL, 1, '2021-09-05 00:09:13', '2021-09-05 00:09:13', NULL),
(91, 'Mr. Hans Hand', 'Borer, Homenick and Sipes', '(463) 323-9267', 'ygreenholt@example.org', NULL, NULL, '7786 Cynthia Garden\nNew Orville, NE 24399-5440', '176 Quitzon Mews Suite 188\nPort Tylerville, CA 45173', 'It was all very.', NULL, 1, '2021-09-05 00:09:13', '2021-09-05 00:09:13', NULL),
(92, 'Danny McGlynn', 'Mante Group', '850-310-2998', 'vbecker@example.org', NULL, NULL, '9116 Moshe Courts Suite 635\nWendellbury, MS 96564', '973 Oberbrunner Mount Suite 466\nAlicefurt, MT 89222', 'I\'m Mabel, I\'ll.', NULL, 1, '2021-09-05 00:09:13', '2021-09-05 00:09:13', NULL),
(93, 'Jaunita Ward', 'Daugherty and Sons', '925.980.5147', 'nmurray@example.net', NULL, NULL, '20176 Casper Row\nFarrellville, MN 19434-0672', '95059 Alexis Shore\nUbaldomouth, FL 48982', 'Mock Turtle.', NULL, 1, '2021-09-05 00:09:13', '2021-09-05 00:09:13', NULL),
(94, 'Mr. Darrick Pfannerstill', 'Mosciski, Considine and Rutherford', '+1 (551) 428-2925', 'torey.mckenzie@example.org', NULL, NULL, '8577 Lesch View Apt. 478\nLilyanfurt, MA 54261', '6550 Deion Flats Apt. 612\nBertaborough, OK 16717-5651', 'I shall think.', NULL, 1, '2021-09-05 00:09:13', '2021-09-05 00:09:13', NULL),
(95, 'Nyah Smith DVM', 'Price Ltd', '410-343-0694', 'brenda.ferry@example.org', NULL, NULL, '73116 Bogisich Green Apt. 512\nErnserland, NY 54068-4074', '9540 Nicolette Crest Apt. 613\nEast Serenityburgh, NV 03549-6672', 'Dormouse.', NULL, 1, '2021-09-05 00:09:14', '2021-09-05 00:09:14', NULL),
(96, 'Toney Glover', 'Berge-Blanda', '1-518-359-4512', 'heller.harmon@example.net', NULL, NULL, '2730 Joyce Tunnel Apt. 483\nNew Izabellachester, OH 05863-1515', '59591 Hessel Divide Suite 950\nSporerfurt, LA 10831-3904', 'And welcome.', NULL, 1, '2021-09-05 00:09:14', '2021-09-05 00:09:14', NULL),
(97, 'Christelle Kub', 'McKenzie, Grant and Blanda', '+19298846829', 'letha.weimann@example.org', NULL, NULL, '64674 Gutmann Course\nWest Elizaland, NY 24191', '532 Gaetano Rapids\nSouth Derekfurt, CT 90238', 'And he got up.', NULL, 1, '2021-09-05 00:09:14', '2021-09-05 00:09:14', NULL),
(98, 'Julianne Gusikowski', 'Weber PLC', '+1.720.215.2526', 'amiya.bartoletti@example.com', NULL, NULL, '934 Tiffany Key\nWest Miahaven, NC 91305', '53366 Ernestine Circle Suite 266\nFeeneyville, GA 90790-6818', 'Alice coming.', NULL, 1, '2021-09-05 00:09:14', '2021-09-05 00:09:14', NULL),
(99, 'Deonte Gerhold I', 'Feeney, Wunsch and Lemke', '1-847-756-1160', 'kgulgowski@example.net', NULL, NULL, '222 Amya Causeway\nLutherside, ND 85943-6040', '824 Carroll Bridge\nWest Michaelafort, LA 54478', 'Exactly as we.', NULL, 1, '2021-09-05 00:09:14', '2021-09-05 00:09:14', NULL),
(100, 'Miss Velma Hahn', 'Weber, King and Kunze', '1-341-895-9524', 'heath11@example.org', NULL, NULL, '22733 Glover Brooks Suite 914\nWest Loisport, KS 40718-9282', '208 Madisen Crossroad Suite 386\nNew Aubree, SD 32892-2356', 'She hastily put.', NULL, 1, '2021-09-05 00:09:14', '2021-09-05 00:09:14', NULL),
(101, 'Arielle Schmitt', 'Hettinger-Jakubowski', '714.338.8296', 'bart.anderson@example.com', NULL, NULL, '4086 Pietro Ways\nBeckerborough, VT 72085', '159 Feest Well\nCollinview, DC 00980-9380', 'ME\' were.', NULL, 1, '2021-09-05 00:09:14', '2021-09-05 00:09:14', NULL),
(102, 'Lawson Steuber Jr.', 'Bashirian Ltd', '+1.341.288.8362', 'opadberg@example.org', NULL, NULL, '5323 Wilfred Circles\nNorth Kelly, IN 55613', '495 Beer Shoal Suite 188\nVonRuedenfort, MD 94414-3794', 'As she said.', NULL, 1, '2021-09-05 00:09:14', '2021-09-05 00:09:14', NULL),
(103, 'Tevin Mraz', 'Lehner-Murray', '986.429.8235', 'hudson.savanna@example.net', NULL, NULL, '99935 Jerde Hill\nRosastad, OK 84579-0269', '874 Kaia Extension\nSouth Dagmarbury, ND 58530', 'King say.', NULL, 1, '2021-09-05 00:09:15', '2021-09-05 00:09:15', NULL),
(104, 'Colleen Schimmel', 'Pacocha PLC', '1-616-751-7370', 'sasha95@example.com', NULL, NULL, '94687 Terrence Ridges Suite 104\nMelliehaven, VT 97604-6801', '75261 Ward Ports Apt. 205\nSouth Cydney, AR 33499', 'Alice. \'Reeling.', NULL, 1, '2021-09-05 00:09:15', '2021-09-05 00:09:15', NULL),
(105, 'Mrs. Zena Purdy MD', 'Kozey-O\'Keefe', '469.569.3861', 'kade15@example.org', NULL, NULL, '3722 Lang Vista Suite 953\nBillyburgh, MO 74782', '5988 Alexandro Island\nKosston, WV 96996', 'Alice, and.', NULL, 1, '2021-09-05 00:09:15', '2021-09-05 00:09:15', NULL),
(106, 'Miss Chloe Hermiston', 'Kilback, Marquardt and Hills', '503-797-3354', 'whuel@example.net', NULL, NULL, '1319 Daugherty Ports Suite 623\nLake Bryce, HI 48484-7856', '3474 Margarita Corner\nNorth Enos, KY 16712-2097', 'Who Stole.', NULL, 1, '2021-09-05 00:09:15', '2021-09-05 00:09:15', NULL),
(107, 'Gunner Herman', 'White, Walker and Stark', '(831) 548-5858', 'dorthy23@example.net', NULL, NULL, '5190 Durgan Extensions\nNorth Emelie, TN 55997', '409 Melany Oval Apt. 033\nTurnerborough, IL 59360', 'After a minute or.', NULL, 1, '2021-09-05 00:09:15', '2021-09-05 00:09:15', NULL),
(108, 'Yazmin Rice', 'O\'Hara, Muller and Kovacek', '+17153332007', 'karli.champlin@example.net', NULL, NULL, '888 Hammes Walk\nSchoenbury, DC 46970-5706', '89410 Reyna Run\nGiuseppeland, VT 22349', 'Paris, and Paris.', NULL, 1, '2021-09-05 00:09:15', '2021-09-05 00:09:15', NULL),
(109, 'Josiah Klocko', 'Cruickshank, VonRueden and Schowalter', '+1.463.250.8945', 'anissa86@example.net', NULL, NULL, '5253 Orn Plains\nLake Henriton, PA 73785-7594', '5243 Brionna Fields Suite 898\nNorth Edisonmouth, DC 57200', 'King say in.', NULL, 1, '2021-09-05 00:09:15', '2021-09-05 00:09:15', NULL),
(110, 'Jovanny Bednar', 'Kessler-Batz', '+1-215-613-3043', 'zboncak.dandre@example.com', NULL, NULL, '7483 Arturo Forge\nSouth Ben, AR 56492', '113 Block Mill\nRogahnview, MO 86438-9403', 'The Hatter.', NULL, 1, '2021-09-05 00:09:15', '2021-09-05 00:09:15', NULL),
(111, 'Ryan Ebert', 'Gerlach, Hammes and Cole', '(458) 201-1832', 'elda.vandervort@example.org', NULL, NULL, '8949 Ferry Green Apt. 320\nFunkland, WV 79904', '617 Vicenta Route\nLake Reggie, NE 28889-0913', 'Alice, a.', NULL, 1, '2021-09-05 00:09:15', '2021-09-05 00:09:15', NULL),
(112, 'Myrtice Bradtke', 'Murray Inc', '725.699.1605', 'dale58@example.org', NULL, NULL, '8861 Raymundo Bypass\nJosiahside, MN 49723-3720', '59658 Devin Glens\nBrayanbury, SC 42163-5930', 'I shall fall.', NULL, 1, '2021-09-05 00:09:15', '2021-09-05 00:09:15', NULL),
(113, 'Omer Howe', 'Cormier, Schamberger and Block', '(816) 559-5704', 'casandra72@example.com', NULL, NULL, '22323 Williamson Mountains\nKuhnport, NY 67044-5719', '181 Kirsten Stream\nBechtelarport, IA 84685', 'And yesterday.', NULL, 1, '2021-09-05 00:09:15', '2021-09-05 00:09:15', NULL),
(114, 'Edyth Veum', 'Jakubowski Inc', '+1.240.360.7635', 'cory26@example.com', NULL, NULL, '3500 Adella Path Suite 829\nEast Celestinofort, SC 42970-6361', '912 Reinger Overpass\nLake Faustomouth, OH 10090-6957', 'If I or she.', NULL, 1, '2021-09-05 00:09:15', '2021-09-05 00:09:15', NULL),
(115, 'Marilyne Willms', 'Trantow PLC', '+1 (860) 814-3807', 'jasen52@example.net', NULL, NULL, '71662 Robyn Groves Apt. 804\nNew Vaughnfort, TN 20893-4649', '69521 Roberto Creek\nEast Allison, FL 66758-3802', 'Then the Queen.', NULL, 1, '2021-09-05 00:09:15', '2021-09-05 00:09:15', NULL),
(116, 'Caleb Shields V', 'Murphy, Jerde and Thompson', '+1-272-324-1215', 'johns.adeline@example.com', NULL, NULL, '22967 Liliane Curve Apt. 014\nRyanmouth, HI 24601-0447', '95880 Kilback Cove Apt. 019\nNicholausview, ME 71261-9055', 'Shakespeare.', NULL, 1, '2021-09-05 00:09:15', '2021-09-05 00:09:15', NULL),
(117, 'Heather Langosh', 'Parisian, Stanton and Shields', '347-494-6671', 'kobe.konopelski@example.net', NULL, NULL, '96873 Altenwerth Trafficway Apt. 510\nKrystalport, ME 79495', '365 Keanu Walks Suite 169\nPort Hannaville, WA 45858-8281', 'An obstacle that.', NULL, 1, '2021-09-05 00:09:15', '2021-09-05 00:09:15', NULL),
(118, 'Loyal Medhurst', 'Lehner, Johnson and Kuhn', '+1.610.205.1940', 'schumm.jeanie@example.com', NULL, NULL, '594 Erica Lock\nMorarmouth, WV 48738-3620', '10809 Gutmann Crossroad Apt. 609\nCaylaview, CA 08768-8826', 'Alice, \'shall I.', NULL, 1, '2021-09-05 00:09:15', '2021-09-05 00:09:15', NULL),
(119, 'Enos Hauck', 'Harber, Gutmann and Beahan', '(516) 853-2442', 'qkerluke@example.com', NULL, NULL, '498 Karianne Springs Apt. 588\nPort Jovanimouth, LA 28278', '2253 Jack Dam Suite 838\nPort Filomenaport, IL 95909', 'Alice! when.', NULL, 1, '2021-09-05 00:09:16', '2021-09-05 00:09:16', NULL),
(120, 'Kade Daugherty PhD', 'Lehner Inc', '1-925-308-0151', 'watsica.elinore@example.com', NULL, NULL, '96937 Bauch Stravenue\nRonnymouth, GA 27730', '124 Rodrick Mountains\nNew Tavares, CO 44559', 'How the Owl and.', NULL, 1, '2021-09-05 00:09:16', '2021-09-05 00:09:16', NULL),
(121, 'Alvina Strosin', 'Murray-Raynor', '225.632.3023', 'lilliana06@example.com', NULL, NULL, '854 Henriette Forest Apt. 313\nMaryamborough, ME 73167-1640', '6560 Trenton Roads\nSouth Vivienland, MI 05996', 'Hatter. \'I deny.', NULL, 1, '2021-09-05 00:09:16', '2021-09-05 00:09:16', NULL),
(122, 'Hollie Satterfield', 'Jast PLC', '1-603-614-1561', 'wschinner@example.net', NULL, NULL, '1449 Oberbrunner Oval\nArdenberg, AZ 03890-8813', '4028 Romaguera Turnpike\nWest Alf, MD 37240', 'Caterpillar.', NULL, 1, '2021-09-05 00:09:16', '2021-09-05 00:09:16', NULL),
(123, 'Daphnee Connelly', 'Heathcote Group', '1-209-701-9909', 'jadon.beatty@example.net', NULL, NULL, '57349 Shanahan Canyon Apt. 944\nNorth Katherineton, SC 13830', '671 Schiller Terrace Apt. 038\nKaelynhaven, KS 32157', 'March.\' As.', NULL, 1, '2021-09-05 00:09:16', '2021-09-05 00:09:16', NULL),
(124, 'Franz Legros', 'Reilly-Mante', '1-620-597-9083', 'yesenia.weber@example.com', NULL, NULL, '5674 Dietrich Plaza\nZiemannstad, AL 27877-1190', '5192 Jackeline Roads Suite 314\nPort Olafmouth, OR 46273', 'Bill! I wouldn\'t.', NULL, 1, '2021-09-05 00:09:16', '2021-09-05 00:09:16', NULL),
(125, 'Alfonso Olson', 'Sawayn Inc', '+15736467303', 'hills.madeline@example.org', NULL, NULL, '99465 Lysanne Plains\nEdythetown, UT 62412', '5107 Tracey Lights\nMeaghanland, NY 73299', 'I\'ve got to.', NULL, 1, '2021-09-05 00:09:16', '2021-09-05 00:09:16', NULL),
(126, 'Miss Leonora Heathcote PhD', 'Abshire, Heller and Daniel', '+1.401.203.2622', 'batz.roy@example.net', NULL, NULL, '9230 Corwin Creek Suite 251\nNorth Maye, NV 04622', '5719 Wilkinson Ranch Suite 738\nEast Curtis, DE 99667', 'King say.', NULL, 1, '2021-09-05 00:09:16', '2021-09-05 00:09:16', NULL),
(127, 'Prof. Rozella Cartwright V', 'Hills, Kris and Ankunding', '1-619-206-3492', 'xlarkin@example.net', NULL, NULL, '484 Domenica Well\nEast Imelda, NH 05009-9252', '264 Gleason Crescent Suite 553\nGutkowskiborough, MS 24282-7691', 'Alice replied.', NULL, 1, '2021-09-05 00:09:16', '2021-09-05 00:09:16', NULL),
(128, 'Prof. Casimer Mosciski V', 'Schowalter PLC', '+1-865-843-1581', 'wyatt.rowe@example.com', NULL, NULL, '61337 Suzanne Rest Suite 257\nKubville, DC 55576-8514', '3212 Hyatt Locks\nLake Orion, MO 90119', 'Alice, \'but I must.', NULL, 1, '2021-09-05 00:09:16', '2021-09-05 00:09:16', NULL),
(129, 'Alexie Pacocha', 'Emmerich, Treutel and Auer', '+1-651-945-5346', 'zoie.rolfson@example.com', NULL, NULL, '65078 Flatley Burgs\nNew Lesleymouth, RI 88574-3263', '867 Colby Field Suite 558\nOndrickaville, KY 24908', 'So they got.', NULL, 1, '2021-09-05 00:09:16', '2021-09-05 00:09:16', NULL),
(130, 'Daniella Beatty', 'Schinner-Parisian', '+1-681-570-4976', 'dgislason@example.org', NULL, NULL, '13342 Lubowitz Underpass Apt. 228\nLake Dominic, UT 02422', '36525 Predovic Forge Apt. 958\nSouth Elianeside, GA 75034-4755', 'Mock Turtle.', NULL, 1, '2021-09-05 00:09:16', '2021-09-05 00:09:16', NULL),
(131, 'Mrs. Adelia Heathcote Jr.', 'Waters, Glover and Daniel', '(708) 913-7471', 'kutch.reece@example.com', NULL, NULL, '363 Cicero Field Suite 145\nNew Alyson, HI 40532', '45456 Gislason Gateway Apt. 842\nEast Luciousport, KY 78044-2580', 'Rabbit asked.', NULL, 1, '2021-09-05 00:09:16', '2021-09-05 00:09:16', NULL),
(132, 'Evan Mills', 'Bauch Group', '+1.430.731.0261', 'blick.noemy@example.com', NULL, NULL, '75090 Zemlak Wells\nOttiliechester, MS 33594-9412', '12258 Walsh Drive Apt. 061\nEast Isaac, DE 60431-4486', 'WHATEVER?\'.', NULL, 1, '2021-09-05 00:09:16', '2021-09-05 00:09:16', NULL),
(133, 'Darrel Dibbert', 'Lang-Ziemann', '(972) 922-8378', 'tomasa73@example.com', NULL, NULL, '3730 Lempi Manor\nKochfort, NM 82718', '219 Bauch Road\nEast Kenyatta, TN 96141', 'I WAS when I got.', NULL, 1, '2021-09-05 00:09:16', '2021-09-05 00:09:16', NULL),
(134, 'Dr. Keegan Farrell III', 'Dickens PLC', '1-210-999-2315', 'lizeth72@example.net', NULL, NULL, '67519 Ludwig Green\nMurrayfort, IL 31760-8620', '4127 Edwina Forges\nManuelabury, MD 00543', 'Come on!\' So.', NULL, 1, '2021-09-05 00:09:16', '2021-09-05 00:09:16', NULL),
(135, 'Alberto Hahn', 'Daniel-Pollich', '806-385-3981', 'jenkins.madilyn@example.org', NULL, NULL, '83907 Paolo Falls Suite 868\nEast Derek, OK 79804-5194', '63090 Wilburn Shoal\nLake Cleo, MI 24937', 'Hatter, with.', NULL, 1, '2021-09-05 00:09:16', '2021-09-05 00:09:16', NULL),
(136, 'Violet Daniel', 'D\'Amore, Crist and McCullough', '+18284455917', 'kailey.ankunding@example.org', NULL, NULL, '159 Baylee Burg\nLake Jaunita, KS 99991-1078', '85330 Thiel Flats\nMattiefurt, IL 74075', 'I\'m sure I.', NULL, 1, '2021-09-05 00:09:16', '2021-09-05 00:09:16', NULL),
(137, 'Dr. Fred Conroy Jr.', 'Brakus, Leffler and Ziemann', '(864) 550-1136', 'fiona.deckow@example.org', NULL, NULL, '286 Eino Port Suite 282\nCorrinemouth, ND 59300', '86000 Kovacek Pike\nRoseborough, OH 67970-5113', 'I mentioned.', NULL, 1, '2021-09-05 00:09:16', '2021-09-05 00:09:16', NULL),
(138, 'Dr. Carolyne Grady V', 'Gerlach, Greenfelder and Gerlach', '270-706-1993', 'xmccullough@example.com', NULL, NULL, '583 Zboncak Cape\nDonnellyberg, HI 62397', '9667 Corine Manor Apt. 184\nPort Finnton, NM 52136-2018', 'I shall remember.', NULL, 1, '2021-09-05 00:09:16', '2021-09-05 00:09:16', NULL),
(139, 'Mrs. Aiyana Ryan Jr.', 'Leffler and Sons', '1-681-426-8181', 'dicki.elena@example.com', NULL, NULL, '42066 Nelson Mews\nNorth Brooke, NY 55361-2052', '65043 Cooper Course\nCarlottatown, HI 46148-3011', 'YOU?\' said.', NULL, 1, '2021-09-05 00:09:16', '2021-09-05 00:09:16', NULL),
(140, 'Liza Gorczany', 'Kutch Group', '1-385-207-3200', 'dkeebler@example.org', NULL, NULL, '7372 Schuster Ridge\nLake Carrollside, NC 46255-9578', '5975 Erdman Mountain Apt. 366\nSouth Ceasar, NY 94733-6853', 'May it won\'t be.', NULL, 1, '2021-09-05 00:09:16', '2021-09-05 00:09:16', NULL),
(141, 'Jailyn Bauch', 'Pfeffer, Larson and Jast', '531-379-6406', 'krystal87@example.com', NULL, NULL, '95394 Lowe Pass Apt. 950\nSouth Devynborough, DE 57550-3216', '61935 Ludie Stream\nWalterview, NM 39846', 'Knave of.', NULL, 1, '2021-09-05 00:09:16', '2021-09-05 00:09:16', NULL),
(142, 'Shanny Barrows', 'O\'Keefe-Walter', '+1 (802) 518-0647', 'pgutmann@example.net', NULL, NULL, '13969 Vanessa Views Apt. 115\nMurazikshire, OH 54482', '4905 Annabelle Spur\nMitchellview, OH 81417', 'I think--\'.', NULL, 1, '2021-09-05 00:09:16', '2021-09-05 00:09:16', NULL),
(143, 'Manley Conroy', 'Hegmann-Borer', '1-341-836-3928', 'rosalee.konopelski@example.org', NULL, NULL, '956 Corrine Parkway\nEast Reinholdville, CT 28905', '3335 Bogisich Cove Suite 784\nHoegerfort, KS 65610', 'King. The White.', NULL, 1, '2021-09-05 00:09:16', '2021-09-05 00:09:16', NULL),
(144, 'Willy Gottlieb', 'Daugherty Ltd', '1-843-831-4799', 'marina.lehner@example.com', NULL, NULL, '26470 Lehner Plains\nEdwardoside, PA 39651', '4879 Kasandra Trafficway\nSauerview, AL 42360', 'Alice, and she.', NULL, 1, '2021-09-05 00:09:16', '2021-09-05 00:09:16', NULL),
(145, 'Kaela Bergnaum', 'Cummings Inc', '520.375.2451', 'cletus.terry@example.net', NULL, NULL, '8941 Hettinger Flats\nJewellchester, NC 88755', '213 Hansen Road\nLake Jaunita, KS 33745', 'Alice, \'and.', NULL, 1, '2021-09-05 00:09:16', '2021-09-05 00:09:16', NULL),
(146, 'Rickey Ward', 'Mayert-Marvin', '1-915-876-3087', 'adrien.bins@example.com', NULL, NULL, '833 Orn Lodge\nWest Vita, NH 46630-2437', '50773 Nolan Underpass Suite 899\nWest Gerry, MO 59113', 'The door.', NULL, 1, '2021-09-05 00:09:16', '2021-09-05 00:09:16', NULL),
(147, 'Mrs. Norene Kuvalis', 'D\'Amore and Sons', '1-281-554-3784', 'marley21@example.net', NULL, NULL, '1627 Aracely Motorway Suite 429\nZiemannview, AL 98415', '5759 Geovanni Flat Suite 720\nKrajcikport, LA 93463', 'As soon as.', NULL, 1, '2021-09-05 00:09:17', '2021-09-05 00:09:17', NULL),
(148, 'Arvel Dicki', 'Will-Swaniawski', '1-669-892-4420', 'miller.adalberto@example.net', NULL, NULL, '111 Watsica Fields Apt. 254\nArvidmouth, OH 65185-4650', '4911 Carter Hill\nRowenamouth, IA 44084-0741', 'The Duchess took.', NULL, 1, '2021-09-05 00:09:17', '2021-09-05 00:09:17', NULL),
(149, 'Marcella Howe', 'Torp, Dare and Langworth', '(773) 366-9613', 'rodriguez.mckenna@example.com', NULL, NULL, '1045 Nat Flats\nSouth Cameronchester, AR 29006-8821', '9455 Eliseo Street\nBauchberg, MA 95426', 'Shakespeare, in.', NULL, 1, '2021-09-05 00:09:17', '2021-09-05 00:09:17', NULL),
(150, 'Dr. Tierra Greenfelder', 'Kilback-Ferry', '432.458.2306', 'olehner@example.net', NULL, NULL, '114 Luna Streets Apt. 495\nKihnfurt, MO 15280-7242', '94226 Kuhlman Manors\nWillieside, AK 08655-1527', 'Normans--\" How.', NULL, 1, '2021-09-05 00:09:17', '2021-09-05 00:09:17', NULL),
(151, 'Virginie Volkman MD', 'Lindgren LLC', '1-602-812-8001', 'wintheiser.kirstin@example.net', NULL, NULL, '35429 Virgie Camp Suite 187\nLake Cierra, WV 38252', '42514 Schulist Squares\nNew Gladystown, IA 80489', 'Be off, or.', NULL, 1, '2021-09-05 00:09:17', '2021-09-05 00:09:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `slug`, `image`, `description`, `user_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'কাচা বাজার', 'kaca-bajar', NULL, NULL, NULL, 1, '2021-09-03 23:26:42', '2021-09-03 23:26:42', NULL),
(4, 'মুদি বাজর', 'mudi-bajr', NULL, NULL, NULL, 1, '2021-09-03 23:26:42', '2021-09-03 23:26:42', NULL),
(5, 'মাছ', 'mach', NULL, NULL, NULL, 1, '2021-09-03 23:26:42', '2021-09-03 23:26:42', NULL),
(6, 'মাংস', 'mangs', NULL, NULL, NULL, 1, '2021-09-03 23:26:42', '2021-09-03 23:26:42', NULL),
(7, 'ডিম', 'dim', NULL, NULL, NULL, 1, '2021-09-03 23:26:42', '2021-09-03 23:26:42', NULL),
(8, 'চাইনিজ সস', 'cainij-ss', NULL, NULL, NULL, 1, '2021-09-03 23:26:42', '2021-09-03 23:26:42', NULL),
(9, 'বেভারেজ', 'bevarej', NULL, NULL, NULL, 1, '2021-09-03 23:26:43', '2021-09-03 23:26:43', NULL),
(10, 'জ্বালানি', 'jwalani', NULL, NULL, NULL, 1, '2021-09-03 23:26:43', '2021-09-03 23:26:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `user_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'mg', NULL, 1, '2021-09-03 22:41:31', '2021-09-03 22:41:31', NULL),
(2, 'gm', NULL, 1, '2021-09-03 22:41:31', '2021-09-03 22:41:31', NULL),
(3, 'kg', NULL, 1, '2021-09-03 22:41:31', '2021-09-03 22:41:31', NULL),
(4, 'ml', NULL, 1, '2021-09-03 22:41:31', '2021-09-03 22:41:31', NULL),
(5, 'litter', NULL, 1, '2021-09-03 22:41:31', '2021-09-03 22:41:31', NULL),
(6, 'dozen', NULL, 1, '2021-09-03 22:41:31', '2021-09-03 22:41:31', NULL),
(7, 'bundell', NULL, 1, '2021-09-03 22:41:31', '2021-09-03 22:41:31', NULL),
(8, 'piece', NULL, 1, '2021-09-03 22:41:31', '2021-09-03 22:41:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(191) DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `status`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shakil', NULL, NULL, 'shakil@admin.com', NULL, '$2y$10$MSCHPAvylyE1RKK/hFVMtOeSqqJvCZ.pFQ/EKXz045M8qqaA.BWAO', 'SGb5wlZRBotGltxKulCUQROIYadLi56fTrPLYioSNznYBDUYduPcJaoHcEao', '2021-06-13 02:19:41', '2021-06-13 02:19:41'),
(2, 'Khan', NULL, NULL, 'khan@admin.com', NULL, '$2y$10$368vXdvnW478B9B6NmFw1OhIi1wV7BpWU7erQJbsWQGpmLaHrdzVW', NULL, '2021-06-13 02:19:41', '2021-06-13 02:19:41'),
(3, 'Mahmud', NULL, 1, 'mahmud@admin.com', NULL, '$2y$10$WGjwR4SKcUF7wG60qgtOH.JQw8CCOIIOMQ7Y8DI9mCpGujj73wvKK', NULL, '2021-06-13 02:19:41', '2021-08-25 04:00:52'),
(4, 'Robin', NULL, NULL, 'robin@admin.com', NULL, '$2y$10$RZMFPe.ZkxR41hJW2Vu7suxI3um1EwGm2EtTuFznTr9ctMJ0qTGWW', NULL, '2021-06-13 02:19:41', '2021-06-13 02:19:41'),
(5, 'Asif', NULL, NULL, 'asif@admin.com', NULL, '$2y$10$LnPYCQREN92./WffqJZ0GOdezCC.6dhBO45ouqV5nxdCr3Z6cYg1y', NULL, '2021-06-13 02:19:41', '2021-06-13 02:19:41'),
(6, 'Tatyana Ullrich', NULL, NULL, 'henderson13@example.net', '2021-09-05 00:08:36', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ONRtgwC0Np', '2021-09-05 00:08:36', '2021-09-05 00:08:36'),
(7, 'Cleve Wintheiser', NULL, NULL, 'erica.ziemann@example.net', '2021-09-05 00:08:36', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'RZCEk0EPbx', '2021-09-05 00:08:36', '2021-09-05 00:08:36'),
(8, 'Phyllis Cassin', NULL, NULL, 'bria.nikolaus@example.com', '2021-09-05 00:08:36', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'zUbXs0kX3g', '2021-09-05 00:08:36', '2021-09-05 00:08:36'),
(9, 'Gerson Wilderman', NULL, NULL, 'heller.harley@example.com', '2021-09-05 00:08:36', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'L7T5L0Mu1Q', '2021-09-05 00:08:36', '2021-09-05 00:08:36'),
(10, 'Estrella Pfeffer', NULL, NULL, 'sdibbert@example.net', '2021-09-05 00:08:36', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'oawVQCSus9', '2021-09-05 00:08:36', '2021-09-05 00:08:36'),
(11, 'Prof. Lilla Stokes Sr.', NULL, NULL, 'annabelle.schmeler@example.com', '2021-09-05 00:08:36', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'tpUoefMmYA', '2021-09-05 00:08:37', '2021-09-05 00:08:37'),
(12, 'Schuyler Fritsch', NULL, NULL, 'ronny88@example.org', '2021-09-05 00:08:36', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Twn7BaRTRh', '2021-09-05 00:08:37', '2021-09-05 00:08:37'),
(13, 'Toney Feil', NULL, NULL, 'kgerlach@example.org', '2021-09-05 00:08:36', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kFiNxaLGmQ', '2021-09-05 00:08:37', '2021-09-05 00:08:37'),
(14, 'Marcia Ward DDS', NULL, NULL, 'pdooley@example.net', '2021-09-05 00:08:36', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6xRSkiUsLx', '2021-09-05 00:08:37', '2021-09-05 00:08:37'),
(15, 'Dr. Thomas Bechtelar', NULL, NULL, 'georgianna17@example.com', '2021-09-05 00:08:36', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'SBKiPrAaJo', '2021-09-05 00:08:37', '2021-09-05 00:08:37'),
(16, 'Randy Schowalter', NULL, NULL, 'torp.garrison@example.com', '2021-09-05 00:09:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'i6rZ1f3k4V', '2021-09-05 00:09:09', '2021-09-05 00:09:09'),
(17, 'Prof. Terrill Wintheiser', NULL, NULL, 'leanne.borer@example.org', '2021-09-05 00:09:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FhDjLT5Bg1', '2021-09-05 00:09:09', '2021-09-05 00:09:09'),
(18, 'Murl O\'Keefe I', NULL, NULL, 'wgibson@example.net', '2021-09-05 00:09:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QDnNwFLt47', '2021-09-05 00:09:09', '2021-09-05 00:09:09'),
(19, 'Dr. Lucie Nolan', NULL, NULL, 'ywitting@example.com', '2021-09-05 00:09:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'atdqR4FZ27', '2021-09-05 00:09:09', '2021-09-05 00:09:09'),
(20, 'Candido Turcotte', NULL, NULL, 'jhilpert@example.com', '2021-09-05 00:09:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'bqgpRrJLuq', '2021-09-05 00:09:09', '2021-09-05 00:09:09'),
(21, 'Dr. Yadira Lind Sr.', NULL, NULL, 'colleen83@example.net', '2021-09-05 00:09:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'THnNDCRkQM', '2021-09-05 00:09:09', '2021-09-05 00:09:09'),
(22, 'Twila Blanda DVM', NULL, NULL, 'yturner@example.org', '2021-09-05 00:09:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'GoQHveDnKz', '2021-09-05 00:09:09', '2021-09-05 00:09:09'),
(23, 'Melissa Collier', NULL, NULL, 'sterling.carter@example.net', '2021-09-05 00:09:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ChvYt7bj4i', '2021-09-05 00:09:09', '2021-09-05 00:09:09'),
(24, 'Dr. Ronny O\'Reilly Sr.', NULL, NULL, 'schowalter.aurelie@example.net', '2021-09-05 00:09:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ImuG7IPUPt', '2021-09-05 00:09:09', '2021-09-05 00:09:09'),
(25, 'Melody Miller', NULL, NULL, 'ccassin@example.org', '2021-09-05 00:09:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'zy2yFeu9Iu', '2021-09-05 00:09:09', '2021-09-05 00:09:09');

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE `websites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iframe` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_us` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_4` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `web_infos`
--

CREATE TABLE `web_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iframe` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_us` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_4` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_infos`
--

INSERT INTO `web_infos` (`id`, `name`, `logo`, `icon`, `address`, `service_charge`, `vat`, `tax`, `email`, `phone`, `fb`, `twitter`, `instagram`, `youtube`, `iframe`, `image_1`, `image_2`, `image_3`, `image_4`, `services`, `about_us`, `text_3`, `text_4`, `created_at`, `updated_at`) VALUES
(1, '71 Utsav Chinese Restaurant & Party Center', '/uploads/images/web/imagelogo_1629885526.png', '/uploads/images/web/imageicon_1629885526.png', 'Madaripur Rd, Shibchar.', '0%', '0%', 'Est soluta molestia', 'xepyxu@mailinator.com', '01812391633', 'Illo corrupti dolor', 'Voluptates laudantiu', NULL, 'Illum ex amet libe', 'Ullamco enim quae su', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-20 01:06:51', '2021-08-25 03:58:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_code_unique` (`order_code`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_phone_unique` (`phone`),
  ADD UNIQUE KEY `staff_email_unique` (`email`);

--
-- Indexes for table `staff_types`
--
ALTER TABLE `staff_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_items`
--
ALTER TABLE `stock_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_phone_unique` (`phone`),
  ADD UNIQUE KEY `suppliers_email_unique` (`email`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_infos`
--
ALTER TABLE `web_infos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `products_categories`
--
ALTER TABLE `products_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff_types`
--
ALTER TABLE `staff_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_items`
--
ALTER TABLE `stock_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `web_infos`
--
ALTER TABLE `web_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

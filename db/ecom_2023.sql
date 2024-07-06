/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `home_sliders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `top_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `regular_price` decimal(8,2) NOT NULL,
  `sale_price` decimal(8,2) DEFAULT NULL,
  `SKU` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_status` enum('instock','outstock') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int unsigned NOT NULL DEFAULT '10',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `category_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `utype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USR' COMMENT 'ADM for admin and USR for normal user',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(4, 'labore', 'labore', '2023-05-03 12:55:01', '2023-05-03 12:55:01');
INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(6, 'omnis', 'omnis', '2023-05-03 12:55:01', '2023-05-03 12:55:01');
INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(11, 'kemon aco group', 'kemon-aco-group', '2023-05-31 11:53:37', '2023-05-31 11:53:37');
INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(12, 'dolor', 'dolor', '2023-05-31 16:20:05', '2023-05-31 16:20:05'),
(13, 'doloribus', 'doloribus', '2023-05-31 16:20:05', '2023-05-31 16:20:05'),
(14, 'explicabo', 'explicabo', '2023-05-31 16:20:05', '2023-05-31 16:20:05'),
(15, 'sit', 'sit', '2023-05-31 16:20:06', '2023-05-31 16:20:06'),
(16, 'dolorum', 'dolorum', '2023-05-31 16:20:06', '2023-05-31 16:20:06'),
(17, 'et', 'et', '2023-05-31 16:20:06', '2023-05-31 16:20:06'),
(18, 'et', 'et', '2023-05-31 16:21:20', '2023-05-31 16:21:20'),
(19, 'in', 'in', '2023-05-31 16:21:20', '2023-05-31 16:21:20'),
(20, 'laboriosam', 'laboriosam', '2023-05-31 16:21:20', '2023-05-31 16:21:20'),
(21, 'veniam', 'veniam', '2023-05-31 16:21:20', '2023-05-31 16:21:20'),
(22, 'aut', 'aut', '2023-05-31 16:21:20', '2023-05-31 16:21:20'),
(23, 'dolor', 'dolor', '2023-05-31 16:21:20', '2023-05-31 16:21:20'),
(24, 'hgdh', 'hgdh', '2023-05-31 19:58:26', '2023-06-05 17:39:04');



INSERT INTO `home_sliders` (`id`, `top_title`, `title`, `sub_title`, `offer`, `link`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'hjfgjh', 'ytujytj', 'jfhg', 'jfh', 'gkfgjhfjjjjjh', '1686041861.jpg', 1, '2023-06-06 08:57:41', '2023-06-06 08:57:41');
INSERT INTO `home_sliders` (`id`, `top_title`, `title`, `sub_title`, `offer`, `link`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'ghhhhhh', 'jhfgjhh', 'fgjfhf', 'jfgjhfj', 'fjghj', '1686077785.jpg', 1, '2023-06-06 18:39:00', '2023-06-06 18:56:25');


INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_0000000_create_users_table', 2),
(6, '2023_05_03_120651_create_categories_table', 3),
(7, '2023_05_02_120651_create_categories_table', 4),
(8, '2023_05_03_120708_create_products_table', 4),
(9, '2023_06_05_192048_create_home_sliders_table', 5);





INSERT INTO `products` (`id`, `name`, `slug`, `short_description`, `description`, `regular_price`, `sale_price`, `SKU`, `stock_status`, `quantity`, `featured`, `image`, `images`, `category_id`, `created_at`, `updated_at`) VALUES
(5, 'fghj', 'hgggj', 'Molestiae exercitationem laudantium cumque totam. Error facere a repellendus dicta reiciendis sed. Quaerat fugit ea ad suscipit a. Numquam rerum culpa pariatur ut sunt temporibus architecto.', 'Harum architecto quo qui. Laboriosam corrupti dolorem molestiae veniam officia esse. Ut ipsam quaerat neque necessitatibus quas. Rerum sed nobis et quia veritatis id maiores quis. Esse officiis dolorem et consequatur officia. Consequuntur nihil voluptatem voluptate qui. Placeat quisquam aliquam est et porro voluptas. Vel libero iure nulla repellat. Totam deserunt nemo at eligendi accusantium quo. Aut laboriosam saepe tenetur dolores aut sit vel. Et optio mollitia et soluta. Dolor aut id nulla.', 165.00, 2.00, 'hgol', 'instock', 35, 0, '1685990415.jpg', NULL, 22, '2023-05-03 12:55:01', '2023-06-05 18:40:15');
INSERT INTO `products` (`id`, `name`, `slug`, `short_description`, `description`, `regular_price`, `sale_price`, `SKU`, `stock_status`, `quantity`, `featured`, `image`, `images`, `category_id`, `created_at`, `updated_at`) VALUES
(34, 'hgfigyfoluguo', 'dsfg', 'jhihfg', 'uftfuggyju', 20.00, 30.00, 'NM-836', 'instock', 20, 1, 'products/wOHX7uae3M6L20Z4loB3nbJbaYxrGshK9SzBkKVX.jpg', NULL, 12, '2023-05-31 21:16:29', '2023-05-31 21:16:29');
INSERT INTO `products` (`id`, `name`, `slug`, `short_description`, `description`, `regular_price`, `sale_price`, `SKU`, `stock_status`, `quantity`, `featured`, `image`, `images`, `category_id`, `created_at`, `updated_at`) VALUES
(35, 'kemon aco group', 'fghfg', 'jfdgjdfgj', 'jdfgjd', 20.00, 30.00, 'NM-1848', 'instock', 20, 1, '1685568490.jpg', NULL, 24, '2023-05-31 21:28:10', '2023-05-31 21:28:10');
INSERT INTO `products` (`id`, `name`, `slug`, `short_description`, `description`, `regular_price`, `sale_price`, `SKU`, `stock_status`, `quantity`, `featured`, `image`, `images`, `category_id`, `created_at`, `updated_at`) VALUES
(36, 'gf', 'istiak', '  m', 'njm', 20.00, 30.00, 'NM-8435', 'instock', 20, 1, '1685569120.jpg', NULL, 23, '2023-05-31 21:38:40', '2023-05-31 21:38:40'),
(37, 'Istiak Hossain', 'tytry', 'hdghdgh', 'dhggdhdgh', 10.00, 2.00, 'hgol', 'instock', 10, 1, '1685953944.jpg', NULL, 12, '2023-06-05 08:32:24', '2023-06-05 08:32:24'),
(38, 'Bed & Breakfasts', 'hfg', 'hdghhhd', 'hdghdfhd', 10.00, 2.00, 'hgol', 'instock', 10, 1, '1685954399.webp', NULL, 23, '2023-06-05 08:39:59', '2023-06-05 08:39:59'),
(39, 'kfgkgh', 'fggjhfh', 'jhfjhhfh', 'jfhfjhfgjfh', 100.00, 90.00, 'gfhj', 'instock', 20, 1, '1686081546.webp', NULL, 13, '2023-06-06 19:59:06', '2023-06-06 19:59:06');

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `utype`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Istiak Hossain', 'is@user.com', NULL, 'USR', '$2y$10$ymCH378OhtLqR1Hp1xDEu.gCuzGnL0OodQHaZY8X.wHdmEx/NgxGi', NULL, '2023-05-03 11:16:28', '2023-05-03 11:16:28');
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `utype`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Istiak Hossain', 'is@admin.com', NULL, 'ADM', '$2y$10$msvjQVrjnGofIVu8HlAVC./3cWg8UzZ5iVjIyeRWdbmGeKWsRkhuq', 'O7tEdPMzASKFfQCiLCN3L5KPf2vre9bgiBBIIY3drue0z1NC3OYU98T8SXjF', '2023-05-03 11:17:11', '2023-05-03 11:17:11');
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `utype`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Istiak Hossain', 'istiakjoypurhat@gmail.com', NULL, 'USR', '$2y$10$B.2JHi33QkPOls0.vv8X5.0CC5eGheylmEmKQQVSPC34Zut5zuhmK', NULL, '2023-05-03 11:49:46', '2023-05-03 11:49:46');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 12, 2020 lúc 10:38 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopwatch`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Đồng hồ Daniel Wellington', 'Daniel Wellington là hãng đồng hồ non trẻ của Thụy Điển nhưng đây gây được tiếng vang lớn trong ngành. Hãng đồng hồ DW được thành lập năm 2011, tên Daniel Wellington đặt teo tên của một du khách người Anh với phong cách du lịch bụi bặm. ', '6420daniel.png', '2020-08-05 11:40:59', '2020-08-05 11:40:59'),
(2, 'Đồng hồ Casio', 'Nói về độ bền và rẻ thì khó có hãng đồng hồ thế giới nào vượt qua được Casio. Casio Việt Nam gắn liền với nhiều thế hệ với chiếc đồng hồ điện tử chính xác từng giây.', '8343casio.png', '2020-08-05 13:06:00', '2020-08-05 13:06:00'),
(3, 'Đồng hồ Orient', 'Xu hướng thiết kế đơn giản, dễ dàng kết hợp với mọi loại trang phục từ công sở đến dạo phố, Orient dành được sự quan tâm của giới yêu đồng hồ tại Việt Nam.', '6045orient.png', '2020-08-05 14:31:43', '2020-08-05 14:31:43'),
(4, 'Đồng hồ Tissot', 'Tissot với 164 năm tuổi đến từ Thụy Sỹ. Bề dày lịch sử đi cùng chất lượng tuyệt hảo, những cải tiến công nghệ và thiết kế đẳng cấp, Tissot nghiễm nhiên giữ vững vị trí trong lòng người mộ điệu. ', '8168tissot.png', '2020-08-05 14:34:55', '2020-08-05 14:34:55'),
(5, 'Đồng hồ Citizen', 'Citizen với tên gọi mang ý nghĩa toàn cầu, hãng đồng hồ đứng thứ 2 Nhật Bản có tham vọng mang sản phẩm của mình đến mọi ngóc ngách trên địa cầu. Citizen mở rộng thế mạnh sản xuất của mình từ đồng hồ máy cơ, đồng hồ pin, đồng hồ năng lượng mặt trời, phân k', '6065citizen.png', '2020-08-05 14:32:59', '2020-08-05 14:32:59'),
(6, 'Đồng hồ Patek Philippe', 'Patek Philippe là một trong số ít những thương hiệu đồng hồ cao cấp được giới mộ điệu “thèm khát” với số lượng khan hiếm dưới 100 chiếc đồng hồ được ra mắt mỗi năm. Người chơi có thể bỏ ra đến hàng triệu đô để có thể sở hữu được chiếc đồng hồ Patek Philip', '9704See You On The Otherside - The 126ers.mp3', '2020-08-05 14:36:29', '2020-08-12 00:28:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Đồng hồ nam', '2020-08-05 14:41:56', '2020-08-05 14:41:56'),
(2, 'Đồng hồ nữ', '2020-08-05 14:41:56', '2020-08-05 14:41:56'),
(3, 'Đồng hồ đôi', '2020-08-05 14:42:29', '2020-08-05 14:42:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_07_21_010448_create_products_table', 1),
(4, '2019_07_21_010802_create_brands_table', 1),
(5, '2019_07_21_010830_create_categories_table', 1),
(6, '2019_07_21_010859_create_roles_table', 1),
(7, '2019_07_21_010920_create_orders_table', 1),
(8, '2019_07_21_011004_create_order_details_table', 1),
(9, '2019_07_21_011036_create_product_images_table', 1),
(10, '2019_07_22_042232_create_product_details_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `confirm` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `tel`, `address`, `user_id`, `confirm`, `created_at`, `updated_at`) VALUES
(1, '0983127775', 'Lệ xuyên-Quảng Trị', 1, 1, '2020-08-06 03:50:55', '2020-08-06 03:50:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `quantity`, `order_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2020-08-06 03:52:53', '2020-08-06 03:52:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `brand_id`, `image`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Đồng hồ Tissot T118', 1, 4, '19949.jpg', 1400000, '2020-08-05 15:16:48', '2020-08-05 15:16:48'),
(2, 'Đồng hồ Tissot T006', 1, 4, '27398.jpg', 350000, '2020-08-05 15:33:30', '2020-08-05 15:33:30'),
(3, 'Đồng hồ Tissot T007', 1, 4, '521011.jpg', 200000, '2020-08-05 15:33:30', '2020-08-05 15:33:30'),
(4, 'Đồng hồ Tissot T008', 1, 4, '637413.jpg', 350000, '2020-08-05 15:33:30', '2020-08-05 15:33:30'),
(5, 'Đông hồ Tissot 0502', 2, 4, 'tải xuống (7).jpg', 210000, '2020-08-05 15:49:54', '2020-08-05 15:49:54'),
(6, 'Đông hồ Tissot 0558', 2, 4, 'tải xuống (8).jpg', 350000, '2020-08-05 15:49:54', '2020-08-05 15:49:54'),
(7, 'Đông hồ Tissot 05365', 2, 4, 'tải xuống (9).jpg', 310000, '2020-08-05 15:49:54', '2020-08-05 15:49:54'),
(8, 'Đông hồ Tissot 0433', 3, 4, '15015.jpg', 500000, '2020-08-05 15:49:54', '2020-08-05 15:49:54'),
(9, 'STANICASIO 1214', 3, 2, '341721.png', 1400000, '2020-08-06 03:30:39', '2020-08-06 03:30:39'),
(10, 'Casio MTP-434L', 1, 2, '27696.jpg', 250000, '2020-08-05 03:22:30', '2020-08-06 03:22:30'),
(11, 'Casio MTP-434L', 1, 2, '34891.jpg', 350000, '2020-08-06 03:22:30', '2020-08-06 03:22:30'),
(12, 'Casio MTP-584L', 1, 2, '35292.jpg', 140000, '2020-08-06 03:22:30', '2020-08-06 03:22:30'),
(13, 'Casio MTP-2524L', 1, 2, '38944.png', 860000, '2020-08-06 03:22:30', '2020-08-06 03:22:30'),
(14, 'Casio MTP-43404N', 2, 2, 'tải xuống (3).jpg', 450000, '2020-08-06 03:22:30', '2020-08-06 03:22:30'),
(15, 'Casio MTP-524L', 2, 2, 'tải xuống (4).jpg', 340000, '2020-08-06 03:22:30', '2020-08-06 03:22:30'),
(16, 'Casio NGP-434L', 2, 2, 'tải xuống (5).jpg', 344000, '2020-08-06 03:25:52', '2020-08-06 03:25:52'),
(17, 'Casio NGP-434L', 2, 2, 'tải xuống (6).jpg', 340000, '2020-08-06 03:25:52', '2020-08-06 03:25:52'),
(18, 'Citizen EW2530-87L', 1, 5, '4685.jpg', 340000, '2020-08-06 03:33:51', '2020-08-06 03:33:51'),
(19, 'Citizen EW2220-87L', 1, 5, '790010.jpg', 20, '2020-08-06 03:33:51', '2020-08-06 03:33:51'),
(21, 'Citizen EW2620-87L', 1, 5, '20805.jpg', 346000, '2020-08-06 03:33:51', '2020-08-06 03:33:51'),
(22, 'Citizen EW2571-87L', 1, 5, '841610.jpg', 3400000, '2020-08-06 03:33:51', '2020-08-06 03:33:51'),
(23, 'Citizen EW2754-87L', 2, 5, 'images (5).jpg', 346000, '2020-08-06 03:33:51', '2020-08-06 03:33:51'),
(24, 'Citizen EW2244-87L', 2, 5, 'images.jpg', 3470000, '2020-08-06 03:33:51', '2020-08-06 03:33:51'),
(25, 'Citizen EW280-87L', 2, 5, 'tải xuống (1).jpg', 3478000, '2020-08-06 03:33:51', '2020-08-06 03:33:51'),
(26, 'Citizen EW25650-87L', 3, 5, 'tải xuống (2).jpg', 370000, '2020-08-06 03:33:51', '2020-08-06 03:33:51'),
(27, 'Citizen EW24120-87L', 3, 5, 'tải xuống (1).jpg', 3460000, '2020-08-06 03:33:51', '2020-08-06 03:33:51'),
(28, 'Patek PH724G Grand', 1, 6, '3222dong-ho-capin-day-inox-1.jpg', 4040000, '2020-08-06 10:14:23', '2020-08-06 10:14:23'),
(29, 'Patek PH274G Grand', 1, 6, '6326d-day-da-320x320.jpg', 243700, '2020-08-05 14:42:29', '2020-08-06 10:14:23'),
(30, 'Patek PH454G Grand', 1, 6, '9453dong-ho-casio-ex-320x320.jpg', 450000, '2020-08-06 10:14:23', '2020-08-06 03:33:51'),
(31, 'Patek P024G Grand', 2, 6, 'tải xuống (15).jpg', 3792000, '2020-08-06 10:14:23', '2020-08-06 10:14:23'),
(32, 'Patek P254G Grand', 2, 6, 'tải xuống (16).jpg', 7952110, '2020-08-06 10:14:23', '2020-08-06 10:14:23'),
(33, 'Patek PL4G Grand', 2, 6, 'tải xuống (17).jpg', 752000, '2020-08-06 10:14:23', '2020-08-06 10:14:23'),
(34, 'Patek P2454G Grand', 2, 6, 'tải xuống.jpg', 760000, '2020-08-06 03:33:51', '2020-08-06 03:33:51'),
(35, 'Patek P254G Grand', 3, 6, '427816.jpg', 456000, '2020-08-06 10:14:23', '2020-08-06 10:14:23'),
(36, 'Patek Ph054G Grand', 1, 6, '1732.jpg', 424000, '2020-08-06 03:33:51', '2020-08-06 10:14:23'),
(37, 'Orient FEU07001BX', 1, 3, '65221.jpg', 1000000, '2020-08-06 03:33:51', '2020-08-05 11:40:59'),
(38, 'Orient FE35401BX', 1, 3, '53433.jpg', 3400000, '2020-08-06 03:33:51', '2020-08-05 15:05:49'),
(39, 'Orient FEU4201BX', 1, 3, '86112.jpg', 4300000, '2020-08-05 14:42:29', '2020-08-05 14:42:29'),
(40, 'Orient FEU082601BX', 1, 3, '564810.jpg', 436000, '2020-08-06 03:33:51', '2020-08-06 03:33:51'),
(41, 'Orient FEU08201BX', 2, 3, 'tải xuống (11).jpg', 7600000, '2020-08-05 11:35:40', '2020-08-05 11:35:40'),
(42, 'Orient FEU07251BX', 2, 3, 'tải xuống (12).jpg', 4360000, '2020-08-06 03:33:51', '2020-08-06 03:33:51'),
(43, 'Orient FEU07001YS', 2, 3, 'tải xuống (13).jpg', 420000, '2020-08-06 10:29:17', '2020-08-06 10:29:17'),
(44, 'Orient FEU071251YS', 2, 3, 'tải xuống (14).jpg', 4200000, '2020-08-06 03:33:51', '2020-08-06 03:33:51'),
(45, 'Orient FEU001YS', 3, 3, '499521.png', 427000, '2020-08-06 10:29:17', '2020-08-06 10:29:17'),
(46, 'DW DW00500002', 1, 1, '56287.jpg', 1400000, '2020-08-06 03:33:51', '2020-08-05 14:36:29'),
(47, 'DW DW00520002', 1, 1, '59867.jpg', 4040000, '2020-08-06 03:33:51', '2020-08-05 15:05:49'),
(48, 'DW DW0050LL02', 1, 1, '342711.jpg', 452000, '2020-08-05 14:42:29', '2020-08-05 14:42:29'),
(49, 'DW DW0050KH02', 1, 1, '882111.jpg', 430000, '2020-08-06 03:33:51', '2020-08-05 15:49:54'),
(50, 'DW DW005JH002', 2, 1, 'images (1).jpg', 721000, '2020-08-05 11:35:40', '2020-08-05 11:35:40'),
(51, 'DW DW005d0002', 2, 1, 'images (2).jpg', 421000, '2020-08-06 03:33:51', '2020-08-06 03:33:51'),
(52, 'DW DW005FS002', 2, 1, 'images (3).jpg', 453200, '2020-08-06 10:40:26', '2020-08-06 10:14:23'),
(53, 'DW DW005TD002', 2, 1, 'images (4).jpg', 430000, '2020-08-06 03:33:51', '2020-08-06 03:33:51'),
(55, 'Casio 1280 đôi', 1, 1, '23903222dong-ho-capin-day-inox-1.jpg', -2, '2020-08-08 17:32:36', '2020-08-11 02:19:25'),
(56, 'à', 1, 1, '1616260f1111148efbd0a29f.jpg', -2, '2020-08-11 02:24:00', '2020-08-11 02:24:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_details`
--

CREATE TABLE `product_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `material` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `case` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strap` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `water_resistance` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_details`
--

INSERT INTO `product_details` (`id`, `material`, `case`, `strap`, `water_resistance`, `amount`, `description`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '', '', '', '', 0, 'JULIUS thương hiệu đăng ký đầu tiên tại Seoul Hàn Quốc, công nghệ Nhật Bản với máy Nhật nhập khẩu 100%. Thiết kế bởi chuyên gia thời trang hàng đầu Hàn Quốc, tiêu chuẩn quốc tế, lắp ráp tại Trung Quốc, bảo hành toàn quốc và quốc tế, chế độ hậu mãi tốt nhấ', 20, '2020-08-06 03:33:51', '2020-08-06 11:40:59'),
(3, 'Kim cương', 'Mạ vàng', 'inox', '100%', -2, 'Đồng hồ được thiết kế bằng kim cương chất lượng cao', 55, '2020-08-08 17:32:36', '2020-08-11 02:16:45'),
(4, 'à', 'à', 'à', 'à', 1001, 'fadf', 56, '2020-08-11 02:24:00', '2020-08-11 02:24:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `name`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '5327499521.png', 55, '2020-08-08 17:32:36', '2020-08-08 17:32:36'),
(2, '98444685.jpg', 55, '2020-08-08 18:26:42', '2020-08-08 18:26:42'),
(3, '717815015.jpg', 55, '2020-08-08 18:28:24', '2020-08-08 18:28:24'),
(4, '513913af7d8079de6c3bf8c.jpg', 56, '2020-08-11 02:24:00', '2020-08-11 02:24:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2020-08-05 15:08:59', '2020-08-05 15:08:59'),
(2, 'User', '2020-08-05 15:08:59', '2020-08-05 15:08:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Kun', 'Quan030401@gmail.com', '0000-00-00 00:00:00', '$2y$12$Jixt1zaE1Zs9I6gPNHC90On3gHxAmcd9cmlNbhXPn2UaZJgZHWsxy', 1, 'G0KsgYXwHQIpvZyJSxbaEswWC0xzWFMspy7gd61w7hLcAXAwCOlELthDI1He', '2020-08-05 15:05:49', '2020-08-05 15:05:49'),
(3, 'Quân', 'nhatquangiuse1@gmail.com', NULL, '$2y$10$dGqyvTtdXfPcpjcmwWVJFO1PVHlTmzb3gu2.dBYYbDn2A1/Qf1BUy', 2, NULL, '2020-08-07 18:36:47', '2020-08-07 18:36:47'),
(4, 'Quân', 'jesusiloveyou2509@gmail.com', NULL, '$2y$10$GbE4WUd9Nsl8s9.ZXlu8GuYfTeIQ2JMqQqz/f8TXzuSc1bT6Fih7W', 2, NULL, '2020-08-08 09:36:07', '2020-08-08 09:36:07'),
(5, '##@$dsf', 'nhatquang25@gmail.com', NULL, '$2y$10$YjJHm/8RFDzaDaWO.L2mX.dnmyv335IPF.UWsoBqZnp2Sa6i2E9ry', 2, NULL, '2020-08-08 09:49:19', '2020-08-08 09:49:19'),
(6, 'Quân', '12fghfghdfhdhdfhfdhdfhdfhdffhdffhdfhdfhdfhdfhd@gmail.com', NULL, '$2y$10$DimRFns/f2VGObAxU./7BukVMQdaGdowUTYKvFwObHLxTnMTd8ZfK', 2, NULL, '2020-08-08 09:51:48', '2020-08-08 09:51:48'),
(7, 'ầẻ', 'nhatquan#$#%#giuse@gmail.com', NULL, '$2y$10$xwoO2SRnQRVyVeq5WABGQexJHytIJ3hgSP48AvyaewwJP494I8Af6', 2, NULL, '2020-08-08 10:22:54', '2020-08-08 10:22:54'),
(8, 'sdf', 'nhatquangiujhe@gmail.com', NULL, '$2y$10$7JCcg8/y/Vm1WFRnl2Fuk.m3b0YjF.iphvxQUeW4aEWGmoCG5PFSu', 2, NULL, '2020-08-08 10:28:00', '2020-08-08 10:28:00'),
(9, 'rt', 'stwrt@sdfsdf', NULL, '$2y$10$AUvR/Um4qt3TPq/zuHpT6uJphqsHOQZO8OCK0U7uSiQg4Mg1ME.rO', 2, NULL, '2020-08-08 10:47:08', '2020-08-08 10:47:08');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 04, 2018 at 07:06 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BloodBank`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_types`
--

CREATE TABLE `blood_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_types`
--

INSERT INTO `blood_types` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, NULL, NULL, 'O-'),
(2, NULL, NULL, 'A-'),
(3, NULL, NULL, 'O+'),
(4, NULL, NULL, 'A+'),
(5, NULL, NULL, 'AB-'),
(6, NULL, NULL, 'AB+');

-- --------------------------------------------------------

--
-- Table structure for table `blood_type_client`
--

CREATE TABLE `blood_type_client` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `blood_type_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_type_client`
--

INSERT INTO `blood_type_client` (`id`, `created_at`, `updated_at`, `client_id`, `blood_type_id`) VALUES
(1, NULL, NULL, 62, 4),
(3, NULL, NULL, 77, 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, '2018-11-16 07:04:26', '2018-11-16 07:04:26', 'Medical prevention'),
(2, '2018-11-16 07:04:52', '2018-11-16 07:04:52', 'Medical Advice'),
(3, '2018-11-16 07:05:25', '2018-11-16 07:05:25', 'The health'),
(4, '2018-11-16 07:05:56', '2018-11-16 07:05:56', 'Health Nutrition');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `governerate_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `created_at`, `updated_at`, `governerate_id`, `name`) VALUES
(1, '2018-11-16 07:02:26', '2018-11-16 07:02:26', 1, 'tanta'),
(2, '2018-11-16 07:02:34', '2018-11-16 07:02:34', 1, 'Mahla'),
(3, '2018-11-16 07:02:40', '2018-11-16 07:02:46', 2, 'quesna'),
(4, '2018-11-16 07:03:10', '2018-11-16 07:03:10', 3, 'nasr city'),
(5, '2018-11-16 07:03:25', '2018-11-16 07:03:25', 4, 'Qlauib');

-- --------------------------------------------------------

--
-- Table structure for table `city_client`
--

CREATE TABLE `city_client` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city_client`
--

INSERT INTO `city_client` (`id`, `created_at`, `updated_at`, `city_id`, `client_id`) VALUES
(1, NULL, NULL, 3, 62),
(7, NULL, NULL, 1, 77);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_type` enum('O+','O-','A+','A-','AB+','AB-') COLLATE utf8mb4_unicode_ci NOT NULL,
  `donation_last_date` date NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `api_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verifyToken` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `created_at`, `updated_at`, `name`, `email`, `birth_date`, `phone`, `password`, `blood_type`, `donation_last_date`, `city_id`, `api_token`, `pin_code`, `remember_token`, `verifyToken`, `status`) VALUES
(62, '2018-11-25 05:43:08', '2018-11-25 05:43:20', 'mohamed', 'mohamedsalahaamerr@gmail.com', '5555-05-05', '01001542112', '$2y$10$BVcuIH3hK.fR4XsyFbjMpOQOZO0UwRPrLx5c8AXYitdsL1MoOs98K', 'A+', '0555-05-05', 3, NULL, NULL, 'PIoN5Dq7N9GKsFbaEmNDM1UEDgKKbibXnDt5uEhln5DE0ZWtrjTTnoVAIYok', NULL, 1),
(77, '2018-12-03 08:37:50', '2018-12-03 08:37:50', 'mohamed', 'mo@yahoo.com', '5555-05-05', '01005542112', '$2y$10$gpRZzX8Fk1rhy8MAnFPhb./mTQIHMiuGyQoMANdhY0AEkycIAwKK6', 'O+', '5555-05-05', 1, NULL, NULL, 'mCDY4rL2x49E75cOZh1hjcwDCqNVUzVXVeLHQf7K6rEuKDWWBUFlmdhugLi0', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `client_notification`
--

CREATE TABLE `client_notification` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `notification_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_notification`
--

INSERT INTO `client_notification` (`id`, `created_at`, `updated_at`, `client_id`, `notification_id`) VALUES
(1, NULL, NULL, 62, 2),
(2, NULL, NULL, 62, 48),
(3, NULL, NULL, 62, 50),
(5, NULL, NULL, 62, 52),
(6, NULL, NULL, 77, 53),
(7, NULL, NULL, 77, 54);

-- --------------------------------------------------------

--
-- Table structure for table `client_post`
--

CREATE TABLE `client_post` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `created_at`, `updated_at`, `title`, `message`, `client_id`) VALUES
(3, '2018-11-27 15:33:54', '2018-11-27 15:33:54', 'wfwefq', 'bhjgjh', 62),
(4, '2018-11-27 15:33:55', '2018-11-27 15:33:55', 'wfwefq', 'bhjgjh', 62);

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `patient_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_age` int(11) NOT NULL,
  `blood_type_id` int(10) UNSIGNED NOT NULL,
  `blood_bags` int(11) NOT NULL,
  `hospital_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `created_at`, `updated_at`, `patient_name`, `patient_age`, `blood_type_id`, `blood_bags`, `hospital_name`, `hospital_address`, `phone`, `notes`, `city_id`) VALUES
(69, '2018-11-22 19:28:00', '2018-11-22 19:28:00', 'wswdw', 4, 2, 5, 'sdsf', 'fsfdsf', '01236547896', 'fsfsf', 1),
(70, '2018-11-22 19:29:24', '2018-11-22 19:29:24', 'wswdw', 4, 2, 5, 'sdsf', 'fsfdsf', '01236547806', 'fsfsf', 1),
(72, '2018-11-25 06:45:36', '2018-11-25 06:45:36', 'momo', 55, 1, 5, 'wasl', 'giza', '01068676362', 'nothing', 2),
(73, '2018-11-29 16:17:24', '2018-11-29 16:17:24', 'ddd', 55, 4, 5, 'ddd', 'ddd', '04440000000', 'ddd', 4),
(74, '2018-11-29 16:18:07', '2018-11-29 16:18:07', 'ddd', 11, 4, 5, 'wasl', 'sds', '01011100000', 'aaaaaaaaaaaaaaaaaaaaaaaaaaa', 3),
(75, '2018-11-29 16:26:37', '2018-11-29 16:26:37', 'dddd', 444, 1, 5, 'dddd', 'ddd', '01001542001', 'sss', 3),
(76, '2018-11-29 16:28:18', '2018-11-29 16:28:18', 'dddd', 444, 1, 5, 'dddd', 'ddd', '01055542001', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 4),
(77, '2018-11-29 16:29:28', '2018-11-29 16:29:28', 'dddd', 444, 1, 5, 'dddd', 'ddd', '01055547701', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 4),
(78, '2018-11-29 16:34:14', '2018-11-29 16:34:14', 'dddd', 444, 1, 5, 'dddd', 'ddd', '01057747701', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 1),
(79, '2018-11-29 16:34:36', '2018-11-29 16:34:36', 'dddd', 444, 1, 5, 'dddd', 'ddd', '01052047701', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 5),
(80, '2018-11-29 16:39:03', '2018-11-29 16:39:03', 'ssss', 55, 4, 5, 'sss', 'sss', '01551542112', 'ssss', 3),
(81, '2018-11-29 17:06:01', '2018-11-29 17:06:01', 'salah', 4444, 3, 8, 'ddd', 'fff', '01001777112', 'ffff', 1),
(82, '2018-11-29 17:06:34', '2018-11-29 17:06:34', 'salah', 4444, 3, 8, 'ddd', 'fff', '01041777112', 'ffff', 1),
(83, '2018-11-29 17:10:15', '2018-11-29 17:10:15', 'salah', 4444, 3, 8, 'ddd', 'fff', '01041747112', 'ffff', 1),
(84, '2018-11-29 17:10:34', '2018-11-29 17:10:34', 'salah', 4444, 3, 8, 'ddd', 'fff', '71041747112', 'ffff', 1),
(85, '2018-11-29 17:12:34', '2018-11-29 17:12:34', 'salah', 4444, 3, 8, 'ddd', 'fff', '71045747112', 'ffff', 3),
(86, '2018-11-29 17:34:30', '2018-11-29 17:34:30', 'yousif', 11, 2, 4, 'ggg', 'tttt', '01001542112', 'tttt', 1),
(87, '2018-11-29 17:48:16', '2018-11-29 17:48:16', 'momo', 87, 2, 5, 'sss', 'sdd', '01587542112', 'ffff', 1),
(89, '2018-11-29 17:53:13', '2018-11-29 17:53:13', 'momo', 55, 1, 5, 'wasl', 'giza', '01068676367', 'nothing', 2),
(91, '2018-11-29 17:56:52', '2018-11-29 17:56:52', 'momo', 55, 1, 5, 'wasl', 'giza', '01068656367', 'nothing', 2),
(92, '2018-12-03 06:58:56', '2018-12-03 06:58:56', 'yousif', 44, 4, 4, 'wasl', 'kkkkk', '01444442112', 'wdwwee', 3),
(93, '2018-12-03 07:22:19', '2018-12-03 07:22:19', 'yousif', 44, 4, 4, 'wasl', 'kkkkk', '01444242112', 'wdwwee', 3),
(94, '2018-12-03 07:22:47', '2018-12-03 07:22:47', 'yousif', 44, 4, 4, 'wasl', 'kkkkk', '01444342112', 'wdwwee', 3),
(95, '2018-12-03 07:32:15', '2018-12-03 07:32:15', 'yousif', 25, 3, 4, 'dsdsd', 'sdsds', '01785422112', 'dccc', 4),
(96, '2018-12-03 07:35:12', '2018-12-03 07:35:12', 'momo', 55, 4, 7, 'llll', 'dssad', '01410076362', 'scdf', 3),
(97, '2018-12-03 08:35:23', '2018-12-03 08:35:23', 'yousif', 44, 3, 4, 'wasl', 'kkkkk', '01740000000', 'dfdf', 1),
(98, '2018-12-03 08:36:33', '2018-12-03 08:36:33', 'yousif', 44, 4, 4, 'wasl', 'dssad', '01075000000', 'sdsad', 3),
(99, '2018-12-03 08:39:33', '2018-12-03 08:39:33', 'yousif', 44, 3, 8, 'wasl', 'Giza', '01001582112', 'sss', 1),
(100, '2018-12-03 08:53:25', '2018-12-03 08:53:25', 'yousif', 44, 3, 4, 'wasl', 'Giza', '01001842112', 'eee', 1);

-- --------------------------------------------------------

--
-- Table structure for table `governerates`
--

CREATE TABLE `governerates` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `governerates`
--

INSERT INTO `governerates` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, '2018-11-16 07:01:57', '2018-11-16 07:01:57', 'Gharbia'),
(2, '2018-11-16 07:02:05', '2018-11-16 07:02:05', 'Menofia'),
(3, '2018-11-16 07:02:13', '2018-11-16 07:02:13', 'Cairo'),
(4, '2018-11-16 07:02:18', '2018-11-16 07:02:18', 'Qalubia');

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
(3, '2018_10_13_111547_create_blood_type_client_table', 1),
(4, '2018_10_13_111547_create_blood_types_table', 1),
(5, '2018_10_13_111547_create_categories_table', 1),
(6, '2018_10_13_111547_create_cities_table', 1),
(7, '2018_10_13_111547_create_city_client_table', 1),
(8, '2018_10_13_111547_create_client_notification_table', 1),
(9, '2018_10_13_111547_create_clients_table', 1),
(10, '2018_10_13_111547_create_contacts_table', 1),
(11, '2018_10_13_111547_create_donations_table', 1),
(12, '2018_10_13_111547_create_governerates_table', 1),
(13, '2018_10_13_111547_create_notifications_table', 1),
(14, '2018_10_13_111547_create_posts_table', 1),
(15, '2018_10_13_111547_create_reports_table', 1),
(16, '2018_10_13_111547_create_settings_table', 1),
(17, '2018_10_13_111557_create_foreign_keys', 1),
(18, '2018_10_31_100534_add_column_pin_code_table', 1),
(19, '2018_11_01_163432_add_column_remember_token_table', 1),
(20, '2018_11_16_085144_create_client_post_table', 1),
(21, '2018_11_18_080828_add_column_verify_email_table', 2),
(22, '2018_11_18_181151_add_column_token_table', 3),
(23, '2018_11_18_181334_add_column_token_table', 4),
(24, '2018_11_18_192153_add_column_verify_email_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'You Have Notification',
  `content` text COLLATE utf8mb4_unicode_ci,
  `donation_request_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `created_at`, `updated_at`, `title`, `content`, `donation_request_id`) VALUES
(1, '2018-11-21 09:10:19', '2018-11-21 09:10:19', NULL, NULL, NULL),
(2, '2018-11-21 09:10:20', '2018-11-21 09:10:20', NULL, NULL, NULL),
(5, '2018-11-21 09:28:28', '2018-11-21 09:28:28', 'You Have Notification', NULL, NULL),
(6, '2018-11-21 09:28:28', '2018-11-21 09:28:28', 'You Have Notification', NULL, NULL),
(7, '2018-11-21 09:33:48', '2018-11-21 09:33:48', 'You Have Notification', NULL, NULL),
(8, '2018-11-21 09:33:49', '2018-11-21 09:33:49', 'You Have Notification', NULL, NULL),
(29, '2018-11-22 19:28:00', '2018-11-22 19:28:00', 'You Have New Notification ', 'Belongs To wswdwAdded By mohamed', 69),
(30, '2018-11-22 19:29:24', '2018-11-22 19:29:24', 'You Have New Notification ', 'Belongs To wswdwAdded By mohamed', 70),
(31, '2018-11-25 06:45:36', '2018-11-25 06:45:36', 'mo', 'f', 72),
(32, '2018-11-29 16:17:24', '2018-11-29 16:17:24', 'You Have New Notification ', 'Belongs To dddAdded By mohamed', 73),
(33, '2018-11-29 16:18:07', '2018-11-29 16:18:07', 'You Have New Notification ', 'Belongs To dddAdded By mohamed', 74),
(34, '2018-11-29 16:28:18', '2018-11-29 16:28:18', 'You Have New Notification ', 'Belongs To ddddAdded By mohamed', 76),
(35, '2018-11-29 16:34:36', '2018-11-29 16:34:36', 'You Have New Notification ', 'Belongs To ddddAdded By mohamed', 79),
(36, '2018-11-29 16:39:03', '2018-11-29 16:39:03', 'You Have New Notification ', 'Belongs To ssssAdded By mido', 80),
(37, '2018-11-29 17:06:01', '2018-11-29 17:06:01', 'You Have New Notification ', 'Belongs To salahAdded By mohamed', 81),
(38, '2018-11-29 17:06:34', '2018-11-29 17:06:34', 'You Have New Notification ', 'Belongs To salahAdded By mohamed', 82),
(39, '2018-11-29 17:10:15', '2018-11-29 17:10:15', 'You Have New Notification ', 'Belongs To salahAdded By mohamed', 83),
(40, '2018-11-29 17:10:34', '2018-11-29 17:10:34', 'You Have New Notification ', 'Belongs To salahAdded By mohamed', 84),
(41, '2018-11-29 17:12:35', '2018-11-29 17:12:35', 'You Have New Notification ', 'Belongs To salahAdded By mohamed', 85),
(42, '2018-11-29 17:34:30', '2018-11-29 17:34:30', 'You Have New Notification ', 'Belongs To yousifAdded By mohamed', 86),
(43, '2018-11-29 17:48:16', '2018-11-29 17:48:16', 'You Have New Notification ', 'Belongs To momoAdded By mohamed', 87),
(44, '2018-11-29 17:53:13', '2018-11-29 17:53:13', 'mo', 'f', 89),
(45, '2018-11-29 17:56:52', '2018-11-29 17:56:52', 'mo', 'f', 91),
(46, '2018-12-03 06:58:56', '2018-12-03 06:58:56', 'You Have New Notification ', 'Belongs To yousifAdded By mohamed', 92),
(47, '2018-12-03 07:22:19', '2018-12-03 07:22:19', 'You Have New Notification ', 'Belongs To yousifAdded By mohamed', 93),
(48, '2018-12-03 07:22:47', '2018-12-03 07:22:47', 'You Have New Notification ', 'Belongs To yousifAdded By mohamed', 94),
(49, '2018-12-03 07:32:15', '2018-12-03 07:32:15', 'You Have New Notification ', 'Belongs To yousifAdded By mohamed', 95),
(50, '2018-12-03 07:35:12', '2018-12-03 07:35:12', 'You Have New Notification ', 'Belongs To momoAdded By baraka', 96),
(51, '2018-12-03 08:35:23', '2018-12-03 08:35:23', 'You Have New Notification ', 'Belongs To yousifAdded By mohamed', 97),
(52, '2018-12-03 08:36:33', '2018-12-03 08:36:33', 'You Have New Notification ', 'Belongs To yousifAdded By mohamed', 98),
(53, '2018-12-03 08:39:34', '2018-12-03 08:39:34', 'You Have New Notification ', 'Belongs To yousifAdded By mohamed', 99),
(54, '2018-12-03 08:53:25', '2018-12-03 08:53:25', 'You Have New Notification ', 'Belongs To yousifAdded By mohamed', 100);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mohamed.slah6660@gmail.com', '$2y$10$33Q9ddYV5CtNR9I7TNg18OwkfgyDcZYVMDt2ZfoD3qk2AaK0hIgpu', '2018-11-20 16:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `created_at`, `updated_at`, `title`, `content`, `thumbnail`, `category_id`) VALUES
(1, '2018-11-16 07:12:24', '2018-11-16 07:20:53', 'Discontent With Previous Doctors', 'Almost as frequent as wanting a second opinion were answers expressing discontent with health care previously received and in particular discontent with doctors. Many participants complained that their doctor \"did not know the answer\" or that doctors had \"given contradictory answers.\" Others claimed that their doctor \"did not care,\" \"did not listen,\" \"was short of time,\" \"was nonchalant,\" \"was negligent,\" or \"did not rack his brain with the problem.\" Some participants complained that the doctor was \"hard to understand\" because of language difficulties.', 'medical_chirurgen_1542360053.jpg', 3),
(2, '2018-11-16 07:13:33', '2018-11-16 07:13:33', 'Patient Education', 'Social media can also improve patients’ access to health care information and other educational resources.12 In the U.S., eight in 10 Internet users search for health information online, and 74% of these people use social media.5,19 Through social media, patients can join virtual communities, participate in research, receive financial or moral support, set goals, and track personal progress.4,19', 'BloodPressure_1542359613.png', 2),
(3, '2018-11-16 07:14:31', '2018-11-16 07:14:31', 'Virtual Reality and Gaming Environments', 'Multi-User Virtual Environments (MUVEs) are three-dimensional environments that allow users to interact with each other through a virtual representation of themselves (known as an avatar).17 The application of MUVEs in health care is growing rapidly. They are increasingly being used for patient education, for the simulation of epidemiology and mass prophylaxis, for psychotherapy, for surgery, and for research.17 However, the fact that MUVEs are often perceived as computer games rather than as serious clinical tools may impede their adoption by health care institutions.17', 'head-marche-medical_1542359671.jpg', 2),
(4, '2018-11-16 07:15:05', '2018-11-16 07:15:05', 'Social Media and Health Care Professionals', 'Many social media tools are available for health care professionals (HCPs), including social networking platforms, blogs, microblogs, wikis, media-sharing sites, and virtual reality and gaming environments.1–8 These tools can be used to improve or enhance professional networking and education, organizational promotion, patient care, patient education, and public health programs.3,5–10 However, they also present potential risks to patients and HCPs regarding the distribution of poor-quality information, damage to professional image, breaches of patient privacy, violation of personal–professional boundaries, and licensing or legal issues.2–4,8,10–17 Many health care institutions and professional organizations have issued guidelines to prevent these risks.3,4,7,10,17,18', 'ESI-Medical-Benefits_1542359705.jpg', 2),
(5, '2018-11-16 07:16:24', '2018-11-16 07:16:24', 'Reasons for Consulting a Doctor on the Interne', '1223 surveys were completed (response rate 34%). Of the participants in the survey 322 (26%) were male and 901 (74%) female. As major reasons for choosing to consult previously-unknown doctors on the Internet participants indicated: convenience (52%), anonymity (36%), \"doctors too busy\" (21%), difficult to find time to visit a doctor (16%), difficulty to get an appointment (13%), feeling uncomfortable when seeing a doctor (9%), and not being able to afford a doctors\' visit (3%). Further motives elicited through a qualitative analysis of free-text answers were: seeking a second opinion, discontent with previous doctors and a wish for a primary evaluation of a medical problem, asking embarrassing or sensitive questions, seeking information on behalf of relatives, preferring written communication, and (from responses by expatriates, travelers, and others) living far away from regular health care.', 'healthcare-training_1542359784.jpg', 1),
(6, '2018-11-16 07:19:23', '2018-11-16 07:19:23', 'Top 10 things you didn\'t know about your penis', 'When you consider the penis as an evolutionary adaptation, it has done remarkably well.\r\n\r\nWe can all say without too much doubt that our father\'s penis worked, as did our grandfather\'s, and his father\'s, and so on, right back through successive generations until we reach far beyond the birth of humanity.\r\n\r\nThe penis is ancient. Just in case you were wondering, the oldest known penis dates back 425 million years, and its fossilized remains belong to an arthropod dubbed Colymbosathon ecplecticos, which means \"amazing swimmer with a large penis\" in Greek.\r\n\r\nIt\'s worth reflecting on its role in our species\' survival next time you are surprised by how easily your penis is \"activated.\" As far as reproduction is concerned, a false arousal is better than a missed opportunity.\r\n\r\nAs the author Mokokoma Mokhonoana once wrote, \"Even the world\'s greatest actor cannot fake an erection.\" This leads us on to the first penis fact of the day.', 'doctor-failure_wide-be24865c59bdb77ede3a502ad7fdf7832ce8af3f_1542359963.jpg', 4),
(7, '2018-11-16 07:20:02', '2018-11-16 07:20:02', 'The state of cancer: Are we close to a cure', 'Cancer is the leading cause of death across the globe. For years now, researchers have led meticulous studies focused on how to stop this deadly disease in its tracks. How close are we to finding more effective treatments?\r\nresearchers in the lab\r\nHow far has cancer research come?\r\nThe World Health Organization (WHO) note that, worldwide, nearly 1 in 6 deaths are down to cancer.\r\n\r\nIn the United States alone, the National Cancer Institute (NCI) estimated 1,688,780 new cancer cases and 600,920 cancer-related deaths in 2017.\r\n\r\nCurrently, the most common types of cancer treatment are chemotherapy, radiotherapy, tumor surgery, and — in the case prostate cancer and breast cancer — hormonal therapy.\r\n\r\nHowever, other types of treatment are beginning to pick up steam: therapies that — on their own or in combination with other treatments — are meant to help defeat cancer more efficiently and, ideally, have fewer side effects.\r\n\r\nInnovations in cancer treatment aim to address a set of issues that will typically face healthcare providers and patients, including aggressive treatment accompanied by unwanted side effects, tumor recurrence after treatment, surgery, or both, and aggressive cancers that are resilient to widely utilized treatments.', 'fotolia_65704664_s_1542360002.jpg', 2),
(8, '2018-11-16 07:21:06', '2018-11-16 07:21:06', 'Why you feel tired all the time', 'These include obesity, high blood pressure, depression, heart disease, stroke, and an increased risk of death.\r\n\r\nIf you struggle to fit in 7 hours of sleep, here are some tips to help you achieve a full dose of much-needed slumber:\r\n\r\nMaintain a consistent sleep routine. Try to go to bed at the same time every night and get up at the same time each morning — even on the weekends.\r\n\r\nAvoid naps. We need a certain amount of sleep within a 24-hour period and no more than that. Napping reduces the amount of sleep that we require the following night, which might lead to difficulty getting to sleep and fragmented sleep.\r\n\r\nLimit time awake in bed to 5–10 minutes. If you find that you are lying awake in bed worrying or with your mind racing, get out of bed and sit in the dark until you are feeling sleepy, then go back to bed.\r\n\r\nEnsure that your bedroom is quiet, dark, and a comfortable temperature. Any light that enters your room could disturb your sleep. Ensure that your room is dark and that light emitted from digital devices is out of sight. Cooler room temperatures are considered better to promote sleep than warmer temperatures.', 'careers cta_1542360066.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_app` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` int(11) NOT NULL,
  `instgram` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_url` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mohamed', 'mohamed.slah6660@gmail.com', NULL, 'ivjqDtgwBCU0U', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_types`
--
ALTER TABLE `blood_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_type_client`
--
ALTER TABLE `blood_type_client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blood_type_client_client_id_foreign` (`client_id`),
  ADD KEY `blood_type_client_bloods_type_id_foreign` (`blood_type_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_governerate_id_foreign` (`governerate_id`);

--
-- Indexes for table `city_client`
--
ALTER TABLE `city_client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_client_city_id_foreign` (`city_id`),
  ADD KEY `city_client_client_id_foreign` (`client_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_city_id_foreign` (`city_id`);

--
-- Indexes for table `client_notification`
--
ALTER TABLE `client_notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_notification_notification_id_foreign` (`notification_id`),
  ADD KEY `client_notification_client_id_foreign` (`client_id`);

--
-- Indexes for table `client_post`
--
ALTER TABLE `client_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_post_client_id_foreign` (`client_id`),
  ADD KEY `client_post_post_id_foreign` (`post_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_client_id_foreign` (`client_id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `donations_phone_unique` (`phone`),
  ADD KEY `donations_city_id_foreign` (`city_id`),
  ADD KEY `donations_blood_type_id_foreign` (`blood_type_id`);

--
-- Indexes for table `governerates`
--
ALTER TABLE `governerates`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `notifications_donation_request_id_foreign` (`donation_request_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_client_id_foreign` (`client_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
-- AUTO_INCREMENT for table `blood_types`
--
ALTER TABLE `blood_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `blood_type_client`
--
ALTER TABLE `blood_type_client`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `city_client`
--
ALTER TABLE `city_client`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `client_notification`
--
ALTER TABLE `client_notification`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `client_post`
--
ALTER TABLE `client_post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `governerates`
--
ALTER TABLE `governerates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `blood_type_client`
--
ALTER TABLE `blood_type_client`
  ADD CONSTRAINT `blood_type_client_bloods_type_id_foreign` FOREIGN KEY (`blood_type_id`) REFERENCES `blood_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blood_type_client_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_governerate_id_foreign` FOREIGN KEY (`governerate_id`) REFERENCES `governerates` (`id`);

--
-- Constraints for table `city_client`
--
ALTER TABLE `city_client`
  ADD CONSTRAINT `city_client_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `city_client_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client_notification`
--
ALTER TABLE `client_notification`
  ADD CONSTRAINT `client_notification_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `client_notification_notification_id_foreign` FOREIGN KEY (`notification_id`) REFERENCES `notifications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client_post`
--
ALTER TABLE `client_post`
  ADD CONSTRAINT `client_post_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `client_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_blood_type_id_foreign` FOREIGN KEY (`blood_type_id`) REFERENCES `blood_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donations_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_donation_request_id_foreign` FOREIGN KEY (`donation_request_id`) REFERENCES `donations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

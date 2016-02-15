-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 06, 2015 at 08:28 PM
-- Server version: 5.6.27-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE IF NOT EXISTS `area` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `line_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `name`, `line_id`, `created_at`, `updated_at`) VALUES
(1, 'Area 1', 1, '2015-11-24 11:35:55', '2015-11-24 11:35:55'),
(2, 'Area 2', 2, '2015-11-24 11:35:55', '2015-11-24 11:35:55'),
(3, 'Area 3', 2, '2015-11-24 11:35:55', '2015-11-24 11:35:55'),
(4, 'Area 4', 3, '2015-11-24 11:35:55', '2015-11-24 11:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `area_target`
--

CREATE TABLE IF NOT EXISTS `area_target` (
`id` int(10) unsigned NOT NULL,
  `product_target_id` int(10) unsigned NOT NULL,
  `area_id` int(10) unsigned NOT NULL,
  `percent` double(11,3) NOT NULL,
  `months_target` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `area_target`
--

INSERT INTO `area_target` (`id`, `product_target_id`, `area_id`, `percent`, `months_target`, `created_at`, `updated_at`) VALUES
(3, 3, 1, 0.250, '{"jan":"0.1","feb":"0.1","mar":"0.05","apr":"0.05","may":"0.05","jun":"0.05","jul":"0.05","aug":"0.05","sep":"0.05","oct":"0.05","nov":"0.2","dec":"0.3"}', '2015-11-26 10:00:35', '2015-11-26 10:00:35');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class` enum('A+','A','B','C') COLLATE utf8_unicode_ci NOT NULL,
  `description` enum('clinic','polyclinic','hospital','pharmacy','medical_center') COLLATE utf8_unicode_ci NOT NULL,
  `description_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `specialty` enum('GYN','IM','GP','Surg','Orth','Ped','Ophth','VS') COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clinic_tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `address_description` text COLLATE utf8_unicode_ci NOT NULL,
  `am_working` time DEFAULT NULL,
  `mr_id` int(10) unsigned NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `class`, `description`, `description_name`, `specialty`, `mobile`, `clinic_tel`, `address`, `address_description`, `am_working`, `mr_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Ali Mohamed', 'ali-mohamed@gmail.com', 'A', 'clinic', 'عنوان العيادة', 'GYN', '01014235842', '023822901', 'Ali''s Address', 'Ali''s Address Description', '09:00:00', 3, 1, '2015-11-24 11:35:55', '2015-11-24 11:35:55'),
(7, 'Mohamed Gamal', 'mg.freelancer92@gmail.com', 'C', 'clinic', 'عنوان العيادة', 'Orth', '01014300690', '0237227911', 'Gamal Abd ElNasser Faysel Giza', '', NULL, 3, 1, '2015-11-24 12:21:16', '2015-11-24 13:08:20'),
(8, 'TestCustomer', 'tes@customer.com', 'B', 'medical_center', 'إسم المركز الطبى', 'Ped', '01014300999', '0237227000', '46 street Gamal Abd ElNasser Faysel Giza', 'address description', NULL, 3, 1, '2015-11-24 13:14:48', '2015-11-24 13:14:48');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
`id` int(10) unsigned NOT NULL,
  `line_id` int(11) NOT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level_id` int(10) unsigned NOT NULL,
  `hiring_date` date DEFAULT NULL,
  `leaving_date` date DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `line_id`, `manager_id`, `name`, `email`, `level_id`, `hiring_date`, `leaving_date`, `active`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Mohamed Gamal', 'mg.freelancer92@gmail.com', 2, '2015-11-01', '0000-00-00', 1, '$2y$10$58RQDxIaBfiJD7eKoRdRiuq3qHC4oJi9IraxVvJU0PzKtz.Ki753.', '2015-11-24 11:35:55', '2015-11-24 11:35:55'),
(2, 2, 1, 'Ahmed Mohamed', 'ahmed-mohamed@gmail.com', 3, '2015-10-01', '0000-00-00', 1, '$2y$10$BzVqBtx/0bjmJUBC.e7Eo.AkSf9fuTRSJ7iYeaPI5ugSXSqL2TKeu', '2015-11-24 11:35:55', '2015-11-24 11:35:55'),
(3, 1, 2, 'Amr Mohamed', 'amr-mohamed@gmail.com', 7, '2015-09-01', '0000-00-00', 1, '$2y$10$0Rrwebos9tDvHc8pJ/nAfOIeEcCSM3pJviIKTOAY1QsT4jRmYtVJq', '2015-11-24 11:35:55', '2015-11-24 11:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `expense_report`
--

CREATE TABLE IF NOT EXISTS `expense_report` (
`id` int(10) unsigned NOT NULL,
  `mr_id` int(10) unsigned NOT NULL,
  `serial` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `month` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `hotel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meals` text COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cost` double(11,2) NOT NULL,
  `group_meeting` text COLLATE utf8_unicode_ci NOT NULL,
  `used_facilities` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `total` double(11,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `expense_report`
--

INSERT INTO `expense_report` (`id`, `mr_id`, `serial`, `month`, `date`, `hotel`, `meals`, `city`, `cost`, `group_meeting`, `used_facilities`, `description`, `total`, `created_at`, `updated_at`) VALUES
(4, 3, '201', 'Dec-2015', '2015-12-03', 'hotel', 'meals', 'city', 10.50, 'group', 'used', 'Description', 200.00, '2015-12-03 14:23:45', '2015-12-03 14:23:45');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE IF NOT EXISTS `form` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `name`, `created_at`, `updated_at`) VALUES
(6, 'Form 1', '2015-11-26 11:14:38', '2015-11-26 11:14:38'),
(7, 'Form 2', '2015-11-26 11:14:39', '2015-11-26 11:14:39'),
(8, 'Form 3', '2015-11-26 11:14:39', '2015-11-26 11:14:39'),
(9, 'Form 4', '2015-11-26 11:14:39', '2015-11-26 11:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `gift`
--

CREATE TABLE IF NOT EXISTS `gift` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gift`
--

INSERT INTO `gift` (`id`, `name`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'Gift 1', 20, '2015-11-24 11:35:55', '2015-11-24 11:35:55'),
(2, 'Gift 2', 20, '2015-11-24 11:35:56', '2015-11-24 11:35:56'),
(3, 'Gift 3', 14, '2015-11-24 11:35:56', '2015-11-24 11:35:56'),
(4, 'Gift 4', 10, '2015-11-24 11:35:56', '2015-11-24 11:35:56'),
(5, 'Gift 5', 27, '2015-11-24 11:35:56', '2015-11-24 11:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `leave_request`
--

CREATE TABLE IF NOT EXISTS `leave_request` (
`id` int(10) unsigned NOT NULL,
  `month` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mr_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `reason` text COLLATE utf8_unicode_ci NOT NULL,
  `leave_start` date NOT NULL,
  `leave_end` date NOT NULL,
  `count` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `leave_request`
--

INSERT INTO `leave_request` (`id`, `month`, `mr_id`, `date`, `reason`, `leave_start`, `leave_end`, `count`, `created_at`, `updated_at`) VALUES
(1, 'Dec-2015', 3, '2015-12-03', 'Sick Leave', '2015-12-03', '2015-12-10', 7, '2015-12-03 15:45:16', '2015-12-03 15:45:16'),
(2, 'Dec-2015', 3, '2015-12-06', 'Other', '2015-12-07', '2015-12-19', 12, '2015-12-06 15:06:40', '2015-12-06 15:06:40');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'General Manager', '2015-11-24 11:35:54', '2015-11-24 11:35:54'),
(2, 'Sales Manager', '2015-11-24 11:35:55', '2015-11-24 11:35:55'),
(3, 'Area Manager', '2015-11-24 11:35:55', '2015-11-24 11:35:55'),
(4, 'Product Manager', '2015-11-24 11:35:55', '2015-11-24 11:35:55'),
(5, 'Line Manager', '2015-11-24 11:35:55', '2015-11-24 11:35:55'),
(6, 'Marketing Manager', '2015-11-24 11:35:55', '2015-11-24 11:35:55'),
(7, 'Medical Rep', '2015-11-24 11:35:55', '2015-11-24 11:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `line`
--

CREATE TABLE IF NOT EXISTS `line` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `line`
--

INSERT INTO `line` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Line 1', '2015-11-24 11:35:54', '2015-11-24 11:35:54'),
(2, 'Line 2', '2015-11-24 11:35:54', '2015-11-24 11:35:54'),
(3, 'Line 3', '2015-11-24 11:35:54', '2015-11-24 11:35:54'),
(4, 'Line 4', '2015-11-24 11:35:54', '2015-11-24 11:35:54'),
(5, 'Line 5', '2015-11-24 11:35:54', '2015-11-24 11:35:54'),
(6, 'Line 6', '2015-11-24 11:35:54', '2015-11-24 11:35:54'),
(7, 'Line 7', '2015-11-24 11:35:54', '2015-11-24 11:35:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_11_04_162236_create_level_table', 1),
('2015_11_08_035730_create_employee_table', 1),
('2015_11_08_110929_create_customer_table', 1),
('2015_11_09_163951_create_line_table', 1),
('2015_11_10_225940_create_product_table', 1),
('2015_11_11_002000_create_area_table', 1),
('2015_11_11_003715_create_territory_table', 1),
('2015_11_11_014515_create_gift_table', 1),
('2015_11_11_020832_create_visit_class_table', 1),
('2015_11_15_220754_create_products_target_table', 1),
('2015_11_15_220754_create_product_target_table', 2),
('2015_11_25_111816_create_area_target_table', 2),
('2015_11_25_111824_create_territory_target_table', 3),
('2015_11_25_142302_create_product_target_table', 4),
('2015_11_25_142307_create_area_target_table', 4),
('2015_11_25_142312_create_territory_target_table', 4),
('2015_11_25_142955_create_product_target_table', 5),
('2015_11_25_142958_create_area_target_table', 5),
('2015_11_25_143000_create_territory_target_table', 5),
('2015_11_26_124817_create_form_table', 6),
('2015_12_03_145602_create_expense_report_table', 7),
('2015_12_03_165207_create_leave_report_table', 8),
('2015_12_03_171651_create_leave_report_table', 9),
('2015_12_03_172151_create_leave_request_table', 10),
('2015_12_03_180042_create_service_request_table', 11),
('2015_12_03_191953_create_plan_table', 12),
('2015_12_04_142009_create_report_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE IF NOT EXISTS `plan` (
`id` int(10) unsigned NOT NULL,
  `month` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mr_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `doctors` text COLLATE utf8_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `month`, `mr_id`, `date`, `doctors`, `approved`, `created_at`, `updated_at`) VALUES
(2, 'Dec-2015', 3, '2015-12-04', '["1","7"]', 0, '2015-12-03 17:32:33', '2015-12-03 17:32:33'),
(3, 'Dec-2015', 3, '2015-12-04', '["8"]', 0, '2015-12-04 02:32:34', '2015-12-04 02:32:34'),
(4, 'Dec-2015', 3, '2015-12-06', '["8"]', 0, '2015-12-05 23:52:24', '2015-12-05 23:52:24'),
(5, 'Dec-2015', 3, '2015-12-09', '["7"]', 0, '2015-12-06 17:34:37', '2015-12-06 17:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `form_id` int(11) NOT NULL,
  `line_id` int(10) unsigned NOT NULL,
  `unit_price` double(11,3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `form_id`, `line_id`, `unit_price`, `created_at`, `updated_at`) VALUES
(1, 'Product 1', 6, 1, 11.200, '2015-11-24 11:35:56', '2015-11-24 14:26:31'),
(2, 'Product 2', 6, 1, 11.500, '2015-11-24 11:35:56', '2015-11-24 11:35:56'),
(3, 'Product 3', 7, 1, 20.000, '2015-11-24 11:35:56', '2015-11-24 11:35:56'),
(4, 'Product 4', 6, 2, 12.000, '2015-11-24 11:35:56', '2015-11-24 11:35:56'),
(5, 'Product 5', 6, 3, 12.500, '2015-11-24 11:35:56', '2015-11-24 11:35:56'),
(7, 'Product 6', 6, 1, 20.500, '2015-11-24 14:04:40', '2015-11-24 14:20:41'),
(8, 'Product 7', 6, 1, 29.300, '2015-11-24 14:22:26', '2015-11-24 14:26:38');

-- --------------------------------------------------------

--
-- Table structure for table `product_target`
--

CREATE TABLE IF NOT EXISTS `product_target` (
`id` int(10) unsigned NOT NULL,
  `year` int(11) DEFAULT NULL,
  `line_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `months_target` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_target`
--

INSERT INTO `product_target` (`id`, `year`, `line_id`, `product_id`, `quantity`, `months_target`, `created_at`, `updated_at`) VALUES
(3, 2016, 1, 1, 100000, '{"jan":"0.1","feb":"0.1","mar":"0.05","apr":"0.05","may":"0.05","jun":"0.05","jul":"0.05","aug":"0.05","sep":"0.1","oct":"0.1","nov":"0.1","dec":"0.2"}', '2015-11-26 09:59:40', '2015-11-26 09:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
`id` int(10) unsigned NOT NULL,
  `month` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mr_id` int(10) unsigned NOT NULL,
  `doctor_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `promoted_products` text COLLATE utf8_unicode_ci NOT NULL,
  `samples_products` text COLLATE utf8_unicode_ci NOT NULL,
  `sold_products` text COLLATE utf8_unicode_ci NOT NULL,
  `total_sold_products_price` double(11,3) NOT NULL,
  `gifts` text COLLATE utf8_unicode_ci NOT NULL,
  `feedback` text COLLATE utf8_unicode_ci NOT NULL,
  `follow_up` text COLLATE utf8_unicode_ci NOT NULL,
  `double_visit_manager_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `month`, `mr_id`, `doctor_id`, `date`, `promoted_products`, `samples_products`, `sold_products`, `total_sold_products_price`, `gifts`, `feedback`, `follow_up`, `double_visit_manager_id`, `created_at`, `updated_at`) VALUES
(1, 'Dec-2015', 3, 8, '2015-12-04', '["1","7"]', '["2"]', '{"1":"1","2":"2","7":"6"}', 157.200, '["4","5"]', 'feedback', 'follow up', NULL, '2015-12-04 17:02:07', '2015-12-04 17:02:07'),
(2, 'Dec-2015', 3, 7, '2015-12-04', '["8"]', '["8"]', '{"8":"7"}', 205.100, '["4"]', 'feedback', 'follow up', NULL, '2015-12-04 17:17:56', '2015-12-04 17:17:56'),
(5, 'Dec-2015', 3, 8, '2015-12-06', 'NULL', 'NULL', 'NULL', 0.000, 'NULL', 'feedback', '', NULL, '2015-12-06 00:36:41', '2015-12-06 00:36:41'),
(8, 'Dec-2015', 3, 1, '2015-12-06', 'NULL', 'NULL', '{"1":"9","2":"3"}', 135.300, 'NULL', 'feedback', 'follow up', NULL, '2015-12-06 12:33:23', '2015-12-06 12:33:23'),
(9, 'Dec-2015', 3, 7, '2015-12-09', 'NULL', 'NULL', '{"1":"5"}', 56.000, 'NULL', '', '', NULL, '2015-12-06 18:17:00', '2015-12-06 18:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `service_request`
--

CREATE TABLE IF NOT EXISTS `service_request` (
`id` int(10) unsigned NOT NULL,
  `month` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mr_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `request_text` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service_request`
--

INSERT INTO `service_request` (`id`, `month`, `mr_id`, `date`, `request_text`, `created_at`, `updated_at`) VALUES
(2, 'Dec-2015', 3, '2015-12-10', 'Service Request', '2015-12-03 16:25:51', '2015-12-03 16:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `territory`
--

CREATE TABLE IF NOT EXISTS `territory` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `territory`
--

INSERT INTO `territory` (`id`, `name`, `area_id`, `created_at`, `updated_at`) VALUES
(1, 'Territory 1', 1, '2015-11-24 11:35:56', '2015-11-24 11:35:56'),
(2, 'Territory 2', 1, '2015-11-24 11:35:56', '2015-11-24 11:35:56'),
(3, 'Territory 3', 3, '2015-11-24 11:35:57', '2015-11-24 11:35:57');

-- --------------------------------------------------------

--
-- Table structure for table `territory_target`
--

CREATE TABLE IF NOT EXISTS `territory_target` (
`id` int(10) unsigned NOT NULL,
  `area_target_id` int(10) unsigned NOT NULL,
  `territory_id` int(10) unsigned NOT NULL,
  `percent` double(11,3) NOT NULL,
  `months_target` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `territory_target`
--

INSERT INTO `territory_target` (`id`, `area_target_id`, `territory_id`, `percent`, `months_target`, `created_at`, `updated_at`) VALUES
(2, 3, 2, 0.500, '{"jan":"0.1","feb":"0.05","mar":"0.05","apr":"0.05","may":"0.05","jun":"0.05","jul":"0.05","aug":"0.05","sep":"0.05","oct":"0.1","nov":"0.2","dec":"0.2"}', '2015-11-26 10:01:55', '2015-11-26 10:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `visit_class`
--

CREATE TABLE IF NOT EXISTS `visit_class` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visits_count` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `visit_class`
--

INSERT INTO `visit_class` (`id`, `name`, `visits_count`, `created_at`, `updated_at`) VALUES
(1, 'A', 5, '2015-11-24 11:35:57', '2015-11-24 11:35:57'),
(2, 'B', 4, '2015-11-24 11:35:57', '2015-11-24 11:35:57'),
(3, 'C', 3, '2015-11-24 11:35:57', '2015-11-24 11:35:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
 ADD PRIMARY KEY (`id`), ADD KEY `area_line_id_foreign` (`line_id`);

--
-- Indexes for table `area_target`
--
ALTER TABLE `area_target`
 ADD PRIMARY KEY (`id`), ADD KEY `area_target_product_target_id_foreign` (`product_target_id`), ADD KEY `area_target_area_id_foreign` (`area_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `customer_email_unique` (`email`), ADD KEY `customer_mr_id_foreign` (`mr_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`id`), ADD KEY `employee_level_id_foreign` (`level_id`), ADD KEY `line_id` (`line_id`), ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `expense_report`
--
ALTER TABLE `expense_report`
 ADD PRIMARY KEY (`id`), ADD KEY `expense_report_mr_id_foreign` (`mr_id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gift`
--
ALTER TABLE `gift`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_request`
--
ALTER TABLE `leave_request`
 ADD PRIMARY KEY (`id`), ADD KEY `leave_request_mr_id_foreign` (`mr_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `line`
--
ALTER TABLE `line`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
 ADD PRIMARY KEY (`id`), ADD KEY `plan_mr_id_foreign` (`mr_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`id`), ADD KEY `product_line_id_foreign` (`line_id`), ADD KEY `form_id` (`form_id`);

--
-- Indexes for table `product_target`
--
ALTER TABLE `product_target`
 ADD PRIMARY KEY (`id`), ADD KEY `product_target_line_id_foreign` (`line_id`), ADD KEY `product_target_product_id_foreign` (`product_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
 ADD PRIMARY KEY (`id`), ADD KEY `report_mr_id_foreign` (`mr_id`), ADD KEY `report_double_visit_manager_id_foreign` (`double_visit_manager_id`), ADD KEY `report_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `service_request`
--
ALTER TABLE `service_request`
 ADD PRIMARY KEY (`id`), ADD KEY `service_request_mr_id_foreign` (`mr_id`);

--
-- Indexes for table `territory`
--
ALTER TABLE `territory`
 ADD PRIMARY KEY (`id`), ADD KEY `territory_area_id_foreign` (`area_id`);

--
-- Indexes for table `territory_target`
--
ALTER TABLE `territory_target`
 ADD PRIMARY KEY (`id`), ADD KEY `territory_target_area_target_id_foreign` (`area_target_id`), ADD KEY `territory_target_territory_id_foreign` (`territory_id`);

--
-- Indexes for table `visit_class`
--
ALTER TABLE `visit_class`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `area_target`
--
ALTER TABLE `area_target`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `expense_report`
--
ALTER TABLE `expense_report`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `gift`
--
ALTER TABLE `gift`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `leave_request`
--
ALTER TABLE `leave_request`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `line`
--
ALTER TABLE `line`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product_target`
--
ALTER TABLE `product_target`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `service_request`
--
ALTER TABLE `service_request`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `territory`
--
ALTER TABLE `territory`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `territory_target`
--
ALTER TABLE `territory_target`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `visit_class`
--
ALTER TABLE `visit_class`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `area`
--
ALTER TABLE `area`
ADD CONSTRAINT `area_line_id_foreign` FOREIGN KEY (`line_id`) REFERENCES `line` (`id`);

--
-- Constraints for table `area_target`
--
ALTER TABLE `area_target`
ADD CONSTRAINT `area_target_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`),
ADD CONSTRAINT `area_target_product_target_id_foreign` FOREIGN KEY (`product_target_id`) REFERENCES `product_target` (`id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
ADD CONSTRAINT `customer_mr_id_foreign` FOREIGN KEY (`mr_id`) REFERENCES `employee` (`id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
ADD CONSTRAINT `employee_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `level` (`id`);

--
-- Constraints for table `expense_report`
--
ALTER TABLE `expense_report`
ADD CONSTRAINT `expense_report_mr_id_foreign` FOREIGN KEY (`mr_id`) REFERENCES `employee` (`id`);

--
-- Constraints for table `leave_request`
--
ALTER TABLE `leave_request`
ADD CONSTRAINT `leave_request_mr_id_foreign` FOREIGN KEY (`mr_id`) REFERENCES `employee` (`id`);

--
-- Constraints for table `plan`
--
ALTER TABLE `plan`
ADD CONSTRAINT `plan_mr_id_foreign` FOREIGN KEY (`mr_id`) REFERENCES `employee` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
ADD CONSTRAINT `product_line_id_foreign` FOREIGN KEY (`line_id`) REFERENCES `line` (`id`);

--
-- Constraints for table `product_target`
--
ALTER TABLE `product_target`
ADD CONSTRAINT `product_target_line_id_foreign` FOREIGN KEY (`line_id`) REFERENCES `line` (`id`),
ADD CONSTRAINT `product_target_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
ADD CONSTRAINT `report_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `customer` (`id`),
ADD CONSTRAINT `report_double_visit_manager_id_foreign` FOREIGN KEY (`double_visit_manager_id`) REFERENCES `employee` (`id`),
ADD CONSTRAINT `report_mr_id_foreign` FOREIGN KEY (`mr_id`) REFERENCES `employee` (`id`);

--
-- Constraints for table `service_request`
--
ALTER TABLE `service_request`
ADD CONSTRAINT `service_request_mr_id_foreign` FOREIGN KEY (`mr_id`) REFERENCES `employee` (`id`);

--
-- Constraints for table `territory`
--
ALTER TABLE `territory`
ADD CONSTRAINT `territory_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`);

--
-- Constraints for table `territory_target`
--
ALTER TABLE `territory_target`
ADD CONSTRAINT `territory_target_area_target_id_foreign` FOREIGN KEY (`area_target_id`) REFERENCES `area_target` (`id`),
ADD CONSTRAINT `territory_target_territory_id_foreign` FOREIGN KEY (`territory_id`) REFERENCES `territory` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 24, 2015 at 03:07 PM
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
-- Table structure for table `announcement`
--

CREATE TABLE IF NOT EXISTS `announcement` (
`id` int(10) unsigned NOT NULL,
  `month` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start` date DEFAULT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `month`, `start`, `text`, `created_at`, `updated_at`) VALUES
(2, 'Dec-2015', '2015-12-23', 'announcement', '2015-12-24 07:32:53', '2015-12-24 08:04:34');

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
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `time_of_visit` time NOT NULL,
  `mr_id` int(10) unsigned NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `class`, `description`, `description_name`, `specialty`, `mobile`, `clinic_tel`, `address`, `address_description`, `am_working`, `comment`, `time_of_visit`, `mr_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Ali Mohamed', 'ali-mohamed@gmail.com', 'A', 'clinic', 'عنوان العيادة', 'GYN', '01014235842', '023822901', 'Ali''s Address', 'Ali''s Address Description', '09:00:00', '', '00:00:00', 3, 1, '2015-11-24 11:35:55', '2015-11-24 11:35:55'),
(7, 'Mohamed Gamal', 'mg.freelancer92@gmail.com', 'C', 'clinic', 'عنوان العيادة', 'Orth', '01014300690', '0237227911', 'Gamal Abd ElNasser Faysel Giza', '', NULL, '', '00:00:00', 3, 1, '2015-11-24 12:21:16', '2015-11-24 13:08:20'),
(8, 'TestCustomer', 'tes@customer.com', 'B', 'medical_center', 'إسم المركز الطبى', 'Ped', '01014300999', '0237227000', '46 street Gamal Abd ElNasser Faysel Giza', 'address description', NULL, '', '00:00:00', 3, 1, '2015-11-24 13:14:48', '2015-11-24 13:14:48'),
(9, 'Mai Ahmed', 'mai.ahmed@gmail.com', 'A', 'hospital', 'مستشفى تبارك', 'Ped', '0101134469', '0237225931', 'Faysel Street, Giza', '', NULL, '', '00:00:00', 3, 1, '2015-11-24 12:21:16', '2015-11-24 13:08:20'),
(10, 'Shady Ahmed', 'shady.ahmed@gmail.com', 'C', 'hospital', 'مستشفى الشفاء', 'Orth', '0101134400', '0237225911', 'Faysel Street, Giza', '', NULL, '', '00:00:00', 3, 1, '2015-11-24 12:21:16', '2015-11-24 13:08:20'),
(11, 'Isam Ahmed', 'islam.ahmed@gmail.com', 'B', 'hospital', 'مستشفى الشفاء', 'GYN', '0101134111', '0237225111', 'Faysel Street, Giza', '', NULL, '', '00:00:00', 3, 1, '2015-11-24 12:21:16', '2015-11-24 13:08:20'),
(12, 'Nourhan Ahmed', 'nourhan.ahmed@gmail.com', 'A', 'hospital', 'مستشفى تبارك', 'Ped', '0101134488', '0237200000', 'Faysel Street, Giza', '', NULL, '', '00:00:00', 3, 1, '2015-11-24 12:21:16', '2015-11-24 13:08:20'),
(13, 'Mostafa Mohamed', 'mostafa.mohamed@gmail.com', 'B', 'hospital', 'مستشفى تبارك', 'Orth', '0101350423', '0237224301', 'Faysel Street, Giza', '', NULL, '', '00:00:00', 3, 1, '2015-11-24 12:21:16', '2015-11-24 13:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
`id` int(10) unsigned NOT NULL,
  `line_id` int(11) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level_id` int(10) unsigned DEFAULT NULL,
  `hiring_date` date DEFAULT NULL,
  `leaving_date` date DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `line_id`, `manager_id`, `name`, `email`, `level_id`, `hiring_date`, `leaving_date`, `active`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Mohamed Gamal', 'mg.freelancer92@gmail.com', 2, '2015-11-01', NULL, 1, '$2y$10$58RQDxIaBfiJD7eKoRdRiuq3qHC4oJi9IraxVvJU0PzKtz.Ki753.', '2015-11-24 11:35:55', '2015-11-24 11:35:55'),
(2, 2, 1, 'Ahmed Mohamed', 'ahmed-mohamed@gmail.com', 3, '2015-10-01', NULL, 1, '$2y$10$BzVqBtx/0bjmJUBC.e7Eo.AkSf9fuTRSJ7iYeaPI5ugSXSqL2TKeu', '2015-11-24 11:35:55', '2015-11-24 11:35:55'),
(3, 1, 4, 'Amr Mohamed', 'amr-mohamed@gmail.com', 7, '2015-09-01', NULL, 1, '$2y$10$0Rrwebos9tDvHc8pJ/nAfOIeEcCSM3pJviIKTOAY1QsT4jRmYtVJq', '2015-11-24 11:35:55', '2015-12-19 17:58:29'),
(4, 4, 1, 'Tarek Ayman', 'employee@gmail.com', 3, '2015-12-08', NULL, 1, '$2y$10$MmkNgxE4KP2VrKzPh8MGMeMKel5XTqTw5UmqMqoWqwC.r/Lz2aEyK', '2015-12-19 15:56:25', '2015-12-19 18:05:10'),
(7, 0, NULL, 'Admin', 'admin@dkt.com', 1, '2015-08-01', NULL, 1, '$2y$10$MmkNgxE4KP2VrKzPh8MGMeMKel5XTqTw5UmqMqoWqwC.r/Lz2aEyK', '2015-12-19 15:57:10', '2015-12-19 15:57:10');

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
-- Table structure for table `ibns`
--

CREATE TABLE IF NOT EXISTS `ibns` (
`id` int(10) unsigned NOT NULL,
  `month` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mrs_percents` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=309 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ibns`
--

INSERT INTO `ibns` (`id`, `month`, `code`, `product_name`, `area`, `quantity`, `mrs_percents`, `created_at`, `updated_at`) VALUES
(203, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', '6 OCTOUBER  CITY', '42', '{"3":"0.3"}', '2015-12-23 14:31:41', '2015-12-23 21:51:05'),
(204, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'ABU HOMUS & KAFR ELDAWAR', '59', NULL, '2015-12-23 14:31:41', '2015-12-23 14:31:41'),
(205, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'ABU KEBER & HEHYA', '4', NULL, '2015-12-23 14:31:41', '2015-12-23 14:31:41'),
(206, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'ABUKEER - ELMONTZAH', '6', NULL, '2015-12-23 14:31:41', '2015-12-23 14:31:41'),
(207, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'AGA', '3', NULL, '2015-12-23 14:31:41', '2015-12-23 14:31:41'),
(208, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'ASHMON', '7', NULL, '2015-12-23 14:31:41', '2015-12-23 14:31:41'),
(209, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'ASSIUT CITY', '5', NULL, '2015-12-23 14:31:41', '2015-12-23 14:31:41'),
(210, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'ASWAN CITY', '7', NULL, '2015-12-23 14:31:42', '2015-12-23 14:31:42'),
(211, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'BANHA', '4', NULL, '2015-12-23 14:31:42', '2015-12-23 14:31:42'),
(212, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'BANY SWIF CITY', '16', '{"3":"0.5"}', '2015-12-23 14:31:42', '2015-12-23 21:49:05'),
(213, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'BASION - KATOR', '26', NULL, '2015-12-23 14:31:42', '2015-12-23 14:31:42'),
(214, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'BEIALA - ELHAMOL', '54', NULL, '2015-12-23 14:31:42', '2015-12-23 14:31:42'),
(215, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'BELKAS', '3', NULL, '2015-12-23 14:31:42', '2015-12-23 14:31:42'),
(216, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'DAMANHOR', '92', NULL, '2015-12-23 14:31:42', '2015-12-23 14:31:42'),
(217, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'DAR ELSALAM', '15', NULL, '2015-12-23 14:31:42', '2015-12-23 14:31:42'),
(218, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'DEKERNES', '19', NULL, '2015-12-23 14:31:42', '2015-12-23 14:31:42'),
(219, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'DELENGAT - KOM HAMADA', '32', NULL, '2015-12-23 14:31:42', '2015-12-23 14:31:42'),
(220, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'DESOK', '5', NULL, '2015-12-23 14:31:42', '2015-12-23 14:31:42'),
(221, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'DOMIAT', '2', NULL, '2015-12-23 14:31:42', '2015-12-23 14:31:42'),
(222, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'EL 10 OF RAMADAN', '4', NULL, '2015-12-23 14:31:42', '2015-12-23 14:31:42'),
(223, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'EL ASAFRA -ELMANDARA', '32', NULL, '2015-12-23 14:31:42', '2015-12-23 14:31:42'),
(224, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'EL AWAYID - JANKLIS', '37', NULL, '2015-12-23 14:31:43', '2015-12-23 14:31:43'),
(225, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'EL AYAAT', '3', NULL, '2015-12-23 14:31:43', '2015-12-23 14:31:43'),
(226, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'EL ISMAELIA  SQ', '3', NULL, '2015-12-23 14:31:43', '2015-12-23 14:31:43'),
(227, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'EL MAASARA - HADAYEK HELWAN', '4', NULL, '2015-12-23 14:31:43', '2015-12-23 14:31:43'),
(228, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'EL MAHALA EL KOBRA', '31', NULL, '2015-12-23 14:31:43', '2015-12-23 14:31:43'),
(229, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'EL MAHMODIA', '8', NULL, '2015-12-23 14:31:43', '2015-12-23 14:31:43'),
(230, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'EL MANSHIA - BAHARY', '15', NULL, '2015-12-23 14:31:43', '2015-12-23 14:31:43'),
(231, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'EL MANSOURA', '10', NULL, '2015-12-23 14:31:43', '2015-12-23 14:31:43'),
(232, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'EL MATARIA - AIN SHAMS', '18', NULL, '2015-12-23 14:31:43', '2015-12-23 14:31:43'),
(233, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'EL OMRANIA', '4', NULL, '2015-12-23 14:31:43', '2015-12-23 14:31:43'),
(234, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'EL SAFF', '10', NULL, '2015-12-23 14:31:43', '2015-12-23 14:31:43'),
(235, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'EL SENBELAWIN', '3', NULL, '2015-12-23 14:31:43', '2015-12-23 14:31:43'),
(236, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'EL SEWIS', '2', NULL, '2015-12-23 14:31:43', '2015-12-23 14:31:43'),
(237, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'EL WADI ELGEDED', '10', NULL, '2015-12-23 14:31:43', '2015-12-23 14:31:43'),
(238, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'EL WAILY - EL AMIREYA', '1', NULL, '2015-12-23 14:31:43', '2015-12-23 14:31:43'),
(239, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'EL ZAYTON', '1', NULL, '2015-12-23 14:31:44', '2015-12-23 14:31:44'),
(240, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'ELDEKHILA - EL AGAMY', '65', NULL, '2015-12-23 14:31:44', '2015-12-23 14:31:44'),
(241, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'ELSALAM CITY- EZBET ELNAKHL - ELMARG', '14', NULL, '2015-12-23 14:31:44', '2015-12-23 14:31:44'),
(242, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'FAKOUS', '16', NULL, '2015-12-23 14:31:44', '2015-12-23 14:31:44'),
(243, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'FAYOM CITY', '31', NULL, '2015-12-23 14:31:44', '2015-12-23 14:31:44'),
(244, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'FEISAL', '6', NULL, '2015-12-23 14:31:44', '2015-12-23 14:31:44'),
(245, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'FOHA - MOTOBAS', '30', NULL, '2015-12-23 14:31:44', '2015-12-23 14:31:44'),
(246, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'HELWAN', '37', NULL, '2015-12-23 14:31:44', '2015-12-23 14:31:44'),
(247, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'HOSH ESSA - ABO ELMATAMIR', '19', NULL, '2015-12-23 14:31:44', '2015-12-23 14:31:44'),
(248, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'IMBABA', '1', NULL, '2015-12-23 14:31:44', '2015-12-23 14:31:44'),
(249, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'ISMAELIA', '43', NULL, '2015-12-23 14:31:44', '2015-12-23 14:31:44'),
(250, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'KAFR ELZAYAT', '15', NULL, '2015-12-23 14:31:44', '2015-12-23 14:31:44'),
(251, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'KALIOUB', '37', NULL, '2015-12-23 14:31:44', '2015-12-23 14:31:44'),
(252, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'LORAN - GELEM- BAKOUS', '40', NULL, '2015-12-23 14:31:44', '2015-12-23 14:31:44'),
(253, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'LUXOR CITY', '1', NULL, '2015-12-23 14:31:44', '2015-12-23 14:31:44'),
(254, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'MAHATET EL RAML- ELAZARETA', '28', NULL, '2015-12-23 14:31:44', '2015-12-23 14:31:44'),
(255, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'MARAKEZ  ASSIUT BAHARY', '29', NULL, '2015-12-23 14:31:44', '2015-12-23 14:31:44'),
(256, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'MARAKEZ ASUT KEBLY', '14', NULL, '2015-12-23 14:31:44', '2015-12-23 14:31:44'),
(257, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'MARAKEZ BANY SEWIF BAHARY', '24', NULL, '2015-12-23 14:31:44', '2015-12-23 14:31:44'),
(258, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'MARAKEZ BANY SEWIF KEBLY', '9', NULL, '2015-12-23 14:31:45', '2015-12-23 14:31:45'),
(259, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'MARAKEZ EL KHAT EL FARANSAWI', '9', NULL, '2015-12-23 14:31:45', '2015-12-23 14:31:45'),
(260, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'MARAKEZ ELMENIA BAHARY', '8', NULL, '2015-12-23 14:31:45', '2015-12-23 14:31:45'),
(261, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'MARAKEZ IMBABA', '4', NULL, '2015-12-23 14:31:45', '2015-12-23 14:31:45'),
(262, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'MARAKEZ QENA BAHARY', '4', NULL, '2015-12-23 14:31:45', '2015-12-23 14:31:45'),
(263, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'MARAKEZ SOHAG BAHARY', '42', NULL, '2015-12-23 14:31:45', '2015-12-23 14:31:45'),
(264, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'MARAKEZ SOHAG KEBLY', '9', NULL, '2015-12-23 14:31:45', '2015-12-23 14:31:45'),
(265, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'MATROUH- EL AMERIA', '74', NULL, '2015-12-23 14:31:45', '2015-12-23 14:31:45'),
(266, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'MEET GHAMR', '8', NULL, '2015-12-23 14:31:45', '2015-12-23 14:31:45'),
(267, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'MENIA EL KAMH - BELBES', '20', NULL, '2015-12-23 14:31:45', '2015-12-23 14:31:45'),
(268, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'MENOF', '13', NULL, '2015-12-23 14:31:45', '2015-12-23 14:31:45'),
(269, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'MIAMI - SEDI BESHR', '26', NULL, '2015-12-23 14:31:45', '2015-12-23 14:31:45'),
(270, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'MOHARAM BEIK- EL ANFOSHI', '38', NULL, '2015-12-23 14:31:45', '2015-12-23 14:31:45'),
(271, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'NEW MADI', '1', NULL, '2015-12-23 14:31:45', '2015-12-23 14:31:45'),
(272, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'PORT SAIED', '1', NULL, '2015-12-23 14:31:45', '2015-12-23 14:31:45'),
(273, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'QWESNA - BERKET ELSABAA', '3', NULL, '2015-12-23 14:31:45', '2015-12-23 14:31:45'),
(274, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'RED SEA', '2', NULL, '2015-12-23 14:31:45', '2015-12-23 14:31:45'),
(275, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'ROXY', '3', NULL, '2015-12-23 14:31:45', '2015-12-23 14:31:45'),
(276, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'SEDI GABER - SPORTING - ROSHDY', '34', NULL, '2015-12-23 14:31:45', '2015-12-23 14:31:45'),
(277, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'SHEBEN  ELKANATER', '9', NULL, '2015-12-23 14:31:46', '2015-12-23 14:31:46'),
(278, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'SHEBIN ELKOM', '31', NULL, '2015-12-23 14:31:46', '2015-12-23 14:31:46'),
(279, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'SHERBEN', '2', NULL, '2015-12-23 14:31:46', '2015-12-23 14:31:46'),
(280, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'SHOBRA KHET -  ETAY ELBAROD', '56', NULL, '2015-12-23 14:31:46', '2015-12-23 14:31:46'),
(281, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'SOHAG CITY', '15', NULL, '2015-12-23 14:31:46', '2015-12-23 14:31:46'),
(282, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'TALA - ELSHOHADA', '13', NULL, '2015-12-23 14:31:46', '2015-12-23 14:31:46'),
(283, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'TAMIA - SENORAS', '104', NULL, '2015-12-23 14:31:46', '2015-12-23 19:04:53'),
(284, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'TANTA', '55', NULL, '2015-12-23 14:31:46', '2015-12-23 14:31:46'),
(285, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'TOKH', '11', NULL, '2015-12-23 14:31:46', '2015-12-23 14:31:46'),
(286, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'ZAGAZIK', '19', NULL, '2015-12-23 14:31:46', '2015-12-23 14:31:46'),
(287, 'Dec-2015', 579240, 'FOLIBONIN 30 CAP                        ', 'ZEFTA', '39', NULL, '2015-12-23 14:31:46', '2015-12-23 14:31:46'),
(288, 'Dec-2015', 582697, 'FIESTA DELAY GEL                        ', 'DELENGAT - KOM HAMADA', '1', NULL, '2015-12-23 14:31:46', '2015-12-23 14:31:46'),
(289, 'Dec-2015', 582705, 'FIESTA CONDOM(GREEN APPLE)              ', 'EL MATARIA - AIN SHAMS', '0', NULL, '2015-12-23 14:31:46', '2015-12-23 14:31:46'),
(290, 'Dec-2015', 585563, 'FIESTA NATURAL LUBRICANT GEL 50ML       ', 'EL MATARIA - AIN SHAMS', '1', NULL, '2015-12-23 14:31:46', '2015-12-23 14:31:46'),
(291, 'Dec-2015', 585563, 'FIESTA NATURAL LUBRICANT GEL 50ML       ', 'MARAKEZ ELMENIA BAHARY', '1', NULL, '2015-12-23 14:31:46', '2015-12-23 14:31:46'),
(292, 'Dec-2015', 585563, 'FIESTA NATURAL LUBRICANT GEL 50ML       ', 'SEDI GABER - SPORTING - ROSHDY', '2', NULL, '2015-12-23 14:31:47', '2015-12-23 14:31:47'),
(293, 'Dec-2015', 585563, 'FIESTA NATURAL LUBRICANT GEL 50ML       ', 'SHOBRA EL KHEMA', '1', NULL, '2015-12-23 14:31:47', '2015-12-23 14:31:47'),
(294, 'Dec-2015', 585563, 'FIESTA NATURAL LUBRICANT GEL 50ML       ', 'SOHAG CITY', '1', NULL, '2015-12-23 14:31:47', '2015-12-23 14:31:47'),
(295, 'Dec-2015', 585563, 'FIESTA NATURAL LUBRICANT GEL 50ML       ', 'TAMIA - SENORAS', '1', NULL, '2015-12-23 14:31:47', '2015-12-23 14:31:47'),
(296, 'Dec-2015', 585663, 'FIESTA WARMING LUBRICANT GEL 50ML       ', 'EL MONEB', '1', NULL, '2015-12-23 14:31:47', '2015-12-23 14:31:47'),
(297, 'Dec-2015', 585663, 'FIESTA WARMING LUBRICANT GEL 50ML       ', 'EL ZAYTON', '1', NULL, '2015-12-23 14:31:47', '2015-12-23 14:31:47'),
(298, 'Dec-2015', 585663, 'FIESTA WARMING LUBRICANT GEL 50ML       ', 'MARAKEZ ELMENIA BAHARY', '1', NULL, '2015-12-23 14:31:47', '2015-12-23 14:31:47'),
(299, 'Dec-2015', 585663, 'FIESTA WARMING LUBRICANT GEL 50ML       ', 'MARAKEZ SOHAG BAHARY', '0', NULL, '2015-12-23 14:31:47', '2015-12-23 14:31:47'),
(300, 'Dec-2015', 585663, 'FIESTA WARMING LUBRICANT GEL 50ML       ', 'MIAMI - SEDI BESHR', '1', NULL, '2015-12-23 14:31:47', '2015-12-23 14:31:47'),
(301, 'Dec-2015', 585663, 'FIESTA WARMING LUBRICANT GEL 50ML       ', 'SEDI GABER - SPORTING - ROSHDY', '3', NULL, '2015-12-23 14:31:47', '2015-12-23 14:31:47'),
(302, 'Dec-2015', 585663, 'FIESTA WARMING LUBRICANT GEL 50ML       ', 'SHOBRA EL KHEMA', '2', NULL, '2015-12-23 14:31:47', '2015-12-23 14:31:47'),
(303, 'Dec-2015', 585663, 'FIESTA WARMING LUBRICANT GEL 50ML       ', 'SOHAG CITY', '1', NULL, '2015-12-23 14:31:47', '2015-12-23 14:31:47'),
(304, 'Dec-2015', 585664, 'FIESTA DELAY LUBRICANT GEL 50ML         ', 'EL ZAYTON', '1', NULL, '2015-12-23 14:31:47', '2015-12-23 14:31:47'),
(305, 'Dec-2015', 585664, 'FIESTA DELAY LUBRICANT GEL 50ML         ', 'HAWAMDIA', '0', NULL, '2015-12-23 14:31:47', '2015-12-23 14:31:47'),
(306, 'Dec-2015', 585664, 'FIESTA DELAY LUBRICANT GEL 50ML         ', 'MAHATET EL RAML- ELAZARETA', '1', NULL, '2015-12-23 14:31:47', '2015-12-23 14:31:47'),
(307, 'Dec-2015', 585664, 'FIESTA DELAY LUBRICANT GEL 50ML         ', 'SEDI GABER - SPORTING - ROSHDY', '1', NULL, '2015-12-23 14:31:47', '2015-12-23 14:31:47'),
(308, 'Dec-2015', 585664, 'FIESTA DELAY LUBRICANT GEL 50ML         ', 'SOHAG CITY', '1', NULL, '2015-12-23 14:31:47', '2015-12-23 14:31:47');

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
  `approved` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `leave_request`
--

INSERT INTO `leave_request` (`id`, `month`, `mr_id`, `date`, `reason`, `leave_start`, `leave_end`, `count`, `approved`, `created_at`, `updated_at`) VALUES
(2, 'Dec-2015', 3, '2015-12-06', 'Other', '2015-12-10', '2015-12-14', 12, 1, '2015-12-06 15:06:40', '2015-12-24 06:24:30');

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
('2015_12_04_142009_create_report_table', 13),
('2015_12_14_143233_create_mr_lines_table', 14),
('2015_12_19_152311_create_report_promoted_product_table', 15),
('2015_12_19_152318_create_report_sample_product_table', 15),
('2015_12_19_152323_create_report_sold_product_table', 15),
('2015_12_19_152329_create_report_gift_table', 15),
('2015_12_23_132700_create_ucp_table', 16),
('2015_12_23_132708_create_ibns_table', 16),
('2015_12_23_132712_create_pos_table', 16),
('2015_12_24_083632_create_announcement_table', 17),
('2015_12_24_083640_create_task_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `mr_lines`
--

CREATE TABLE IF NOT EXISTS `mr_lines` (
`id` int(10) unsigned NOT NULL,
  `mr_id` int(10) unsigned NOT NULL,
  `line_id` int(10) unsigned NOT NULL,
  `from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mr_lines`
--

INSERT INTO `mr_lines` (`id`, `mr_id`, `line_id`, `from`, `to`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 'Jan-2015', 'Oct-2015', '2015-12-14 13:59:16', '2015-12-14 13:59:16'),
(2, 3, 1, 'Nov-2015', NULL, '2015-12-14 13:59:16', '2015-12-14 13:59:16');

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
  `approved` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `month`, `mr_id`, `date`, `doctors`, `approved`, `created_at`, `updated_at`) VALUES
(2, 'Dec-2015', 3, '2015-12-04', '["1","7"]', 0, '2015-12-03 17:32:33', '2015-12-24 06:24:26'),
(3, 'Dec-2015', 3, '2015-12-04', '["8"]', 1, '2015-12-04 02:32:34', '2015-12-04 02:32:34'),
(4, 'Dec-2015', 3, '2015-12-06', '["8"]', 1, '2015-12-05 23:52:24', '2015-12-05 23:52:24'),
(5, 'Dec-2015', 3, '2015-12-09', '["7"]', 1, '2015-12-06 17:34:37', '2015-12-06 17:34:37'),
(7, 'Dec-2015', 3, '2015-12-15', '["12"]', 1, '2015-12-14 09:24:29', '2015-12-14 09:24:29'),
(8, 'Dec-2015', 3, '2015-12-15', '["9"]', 1, '2015-12-15 11:51:28', '2015-12-15 11:51:28');

-- --------------------------------------------------------

--
-- Table structure for table `pos`
--

CREATE TABLE IF NOT EXISTS `pos` (
`id` int(10) unsigned NOT NULL,
  `month` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mrs_percents` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=327 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pos`
--

INSERT INTO `pos` (`id`, `month`, `code`, `product_name`, `area`, `quantity`, `mrs_percents`, `created_at`, `updated_at`) VALUES
(187, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'ميامي', '27', NULL, '2015-12-23 16:41:31', '2015-12-23 19:44:20'),
(188, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'القباري', '57', NULL, '2015-12-23 16:41:31', '2015-12-23 16:41:31'),
(189, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'مينا البصل', '66', NULL, '2015-12-23 16:41:31', '2015-12-23 16:41:31'),
(190, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'الفلكى', '120', '{"3":"0.5"}', '2015-12-23 16:41:31', '2015-12-23 21:47:48'),
(191, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'النزهة', '82', NULL, '2015-12-23 16:41:31', '2015-12-23 16:41:31'),
(192, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'كفر الزيات', '57', NULL, '2015-12-23 16:41:31', '2015-12-23 16:41:31'),
(193, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'دمنهور', '65', NULL, '2015-12-23 16:41:31', '2015-12-23 16:41:31'),
(194, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'طنطا', '28', NULL, '2015-12-23 16:41:31', '2015-12-23 16:41:31'),
(195, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'المحلة', '9', NULL, '2015-12-23 16:41:31', '2015-12-23 16:41:31'),
(196, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'المنصورة', '5', NULL, '2015-12-23 16:41:31', '2015-12-23 16:41:31'),
(197, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'دكرنس', '34', NULL, '2015-12-23 16:41:31', '2015-12-23 16:41:31'),
(198, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'دمياط', '11', NULL, '2015-12-23 16:41:32', '2015-12-23 16:41:32'),
(199, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'شبين الكوم', '48', NULL, '2015-12-23 16:41:32', '2015-12-23 16:41:32'),
(200, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'الناصرية', '101', NULL, '2015-12-23 16:41:32', '2015-12-23 16:41:32'),
(201, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'دمنهور 2', '65', NULL, '2015-12-23 16:41:32', '2015-12-23 16:41:32'),
(202, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'الزقازيق', '53', NULL, '2015-12-23 16:41:32', '2015-12-23 16:41:32'),
(203, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'بنها 2', '47', NULL, '2015-12-23 16:41:32', '2015-12-23 16:41:32'),
(204, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'المطرية', '5', NULL, '2015-12-23 16:41:32', '2015-12-23 16:41:32'),
(205, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'مصر الجديدة', '12', NULL, '2015-12-23 16:41:32', '2015-12-23 16:41:32'),
(206, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'مدينة نصر', NULL, NULL, '2015-12-23 16:41:32', '2015-12-23 16:41:32'),
(207, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'عين شمس', '8', NULL, '2015-12-23 16:41:32', '2015-12-23 16:41:32'),
(208, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'روض الفرج', NULL, NULL, '2015-12-23 16:41:32', '2015-12-23 16:41:32'),
(209, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'الجيزة', '2', NULL, '2015-12-23 16:41:32', '2015-12-23 16:41:32'),
(210, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'خاتم المرسلين', '7', NULL, '2015-12-23 16:41:32', '2015-12-23 16:41:32'),
(211, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'حلوان', '44', NULL, '2015-12-23 16:41:32', '2015-12-23 16:41:32'),
(212, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'امبابة 1', '5', NULL, '2015-12-23 16:41:32', '2015-12-23 16:41:32'),
(213, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'مسطرد', '8', NULL, '2015-12-23 16:41:32', '2015-12-23 16:41:32'),
(214, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'امبابة 2', '2', NULL, '2015-12-23 16:41:32', '2015-12-23 16:41:32'),
(215, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'الفيوم', '13', NULL, '2015-12-23 16:41:33', '2015-12-23 16:41:33'),
(216, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'بني سويف', '35', NULL, '2015-12-23 16:41:33', '2015-12-23 16:41:33'),
(217, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'المنيا', NULL, NULL, '2015-12-23 16:41:33', '2015-12-23 16:41:33'),
(218, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'اسيوط', '41', NULL, '2015-12-23 16:41:33', '2015-12-23 16:41:33'),
(219, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'سوهاج', '20', NULL, '2015-12-23 16:41:33', '2015-12-23 16:41:33'),
(220, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'قنا', '2', NULL, '2015-12-23 16:41:33', '2015-12-23 16:41:33'),
(221, 'Dec-2015', 10681, 'فوليبونين 30 كبسولة', 'المنيا 2', '1', NULL, '2015-12-23 16:41:33', '2015-12-23 16:41:33'),
(222, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'ميامي', NULL, NULL, '2015-12-23 16:41:33', '2015-12-23 16:41:33'),
(223, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'القباري', NULL, NULL, '2015-12-23 16:41:33', '2015-12-23 16:41:33'),
(224, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'مينا البصل', NULL, NULL, '2015-12-23 16:41:33', '2015-12-23 16:41:33'),
(225, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'الفلكى', NULL, NULL, '2015-12-23 16:41:33', '2015-12-23 16:41:33'),
(226, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'النزهة', '1', NULL, '2015-12-23 16:41:33', '2015-12-23 16:41:33'),
(227, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'كفر الزيات', NULL, NULL, '2015-12-23 16:41:33', '2015-12-23 16:41:33'),
(228, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'دمنهور', NULL, NULL, '2015-12-23 16:41:33', '2015-12-23 16:41:33'),
(229, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'طنطا', NULL, NULL, '2015-12-23 16:41:33', '2015-12-23 16:41:33'),
(230, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'المحلة', NULL, NULL, '2015-12-23 16:41:33', '2015-12-23 16:41:33'),
(231, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'المنصورة', NULL, NULL, '2015-12-23 16:41:33', '2015-12-23 16:41:33'),
(232, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'دكرنس', NULL, NULL, '2015-12-23 16:41:33', '2015-12-23 16:41:33'),
(233, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'دمياط', '1', NULL, '2015-12-23 16:41:33', '2015-12-23 16:41:33'),
(234, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'شبين الكوم', '1', NULL, '2015-12-23 16:41:33', '2015-12-23 16:41:33'),
(235, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'الناصرية', NULL, NULL, '2015-12-23 16:41:34', '2015-12-23 16:41:34'),
(236, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'دمنهور 2', NULL, NULL, '2015-12-23 16:41:34', '2015-12-23 16:41:34'),
(237, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'الزقازيق', NULL, NULL, '2015-12-23 16:41:34', '2015-12-23 16:41:34'),
(238, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'بنها 2', NULL, NULL, '2015-12-23 16:41:34', '2015-12-23 16:41:34'),
(239, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'المطرية', '1', NULL, '2015-12-23 16:41:34', '2015-12-23 16:41:34'),
(240, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'مصر الجديدة', NULL, NULL, '2015-12-23 16:41:34', '2015-12-23 16:41:34'),
(241, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'مدينة نصر', NULL, NULL, '2015-12-23 16:41:34', '2015-12-23 16:41:34'),
(242, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'عين شمس', NULL, NULL, '2015-12-23 16:41:34', '2015-12-23 16:41:34'),
(243, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'روض الفرج', '1', NULL, '2015-12-23 16:41:34', '2015-12-23 16:41:34'),
(244, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'الجيزة', NULL, NULL, '2015-12-23 16:41:34', '2015-12-23 16:41:34'),
(245, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'خاتم المرسلين', NULL, NULL, '2015-12-23 16:41:34', '2015-12-23 16:41:34'),
(246, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'حلوان', NULL, NULL, '2015-12-23 16:41:34', '2015-12-23 16:41:34'),
(247, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'امبابة 1', NULL, NULL, '2015-12-23 16:41:34', '2015-12-23 16:41:34'),
(248, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'مسطرد', NULL, NULL, '2015-12-23 16:41:34', '2015-12-23 16:41:34'),
(249, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'امبابة 2', NULL, NULL, '2015-12-23 16:41:34', '2015-12-23 16:41:34'),
(250, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'الفيوم', NULL, NULL, '2015-12-23 16:41:34', '2015-12-23 16:41:34'),
(251, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'بني سويف', NULL, NULL, '2015-12-23 16:41:34', '2015-12-23 16:41:34'),
(252, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'المنيا', NULL, NULL, '2015-12-23 16:41:34', '2015-12-23 16:41:34'),
(253, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'اسيوط', NULL, NULL, '2015-12-23 16:41:35', '2015-12-23 16:41:35'),
(254, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'سوهاج', NULL, NULL, '2015-12-23 16:41:35', '2015-12-23 16:41:35'),
(255, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'قنا', '2', NULL, '2015-12-23 16:41:35', '2015-12-23 16:41:35'),
(256, 'Dec-2015', 17085, 'فيستا عادى مزلق', 'المنيا 2', NULL, NULL, '2015-12-23 16:41:35', '2015-12-23 16:41:35'),
(257, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'ميامي', NULL, NULL, '2015-12-23 16:41:35', '2015-12-23 16:41:35'),
(258, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'القباري', NULL, NULL, '2015-12-23 16:41:35', '2015-12-23 16:41:35'),
(259, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'مينا البصل', NULL, NULL, '2015-12-23 16:41:35', '2015-12-23 16:41:35'),
(260, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'الفلكى', NULL, NULL, '2015-12-23 16:41:35', '2015-12-23 16:41:35'),
(261, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'النزهة', NULL, NULL, '2015-12-23 16:41:35', '2015-12-23 16:41:35'),
(262, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'كفر الزيات', NULL, NULL, '2015-12-23 16:41:35', '2015-12-23 16:41:35'),
(263, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'دمنهور', NULL, NULL, '2015-12-23 16:41:35', '2015-12-23 16:41:35'),
(264, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'طنطا', NULL, NULL, '2015-12-23 16:41:35', '2015-12-23 16:41:35'),
(265, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'المحلة', '1', NULL, '2015-12-23 16:41:35', '2015-12-23 16:41:35'),
(266, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'المنصورة', '2', NULL, '2015-12-23 16:41:35', '2015-12-23 16:41:35'),
(267, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'دكرنس', NULL, NULL, '2015-12-23 16:41:35', '2015-12-23 16:41:35'),
(268, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'دمياط', '1', NULL, '2015-12-23 16:41:35', '2015-12-23 16:41:35'),
(269, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'شبين الكوم', NULL, NULL, '2015-12-23 16:41:35', '2015-12-23 16:41:35'),
(270, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'الناصرية', NULL, NULL, '2015-12-23 16:41:35', '2015-12-23 16:41:35'),
(271, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'دمنهور 2', NULL, NULL, '2015-12-23 16:41:36', '2015-12-23 16:41:36'),
(272, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'الزقازيق', NULL, NULL, '2015-12-23 16:41:36', '2015-12-23 16:41:36'),
(273, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'بنها 2', NULL, NULL, '2015-12-23 16:41:36', '2015-12-23 16:41:36'),
(274, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'المطرية', NULL, NULL, '2015-12-23 16:41:36', '2015-12-23 16:41:36'),
(275, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'مصر الجديدة', NULL, NULL, '2015-12-23 16:41:36', '2015-12-23 16:41:36'),
(276, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'مدينة نصر', '2', NULL, '2015-12-23 16:41:36', '2015-12-23 16:41:36'),
(277, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'عين شمس', NULL, NULL, '2015-12-23 16:41:36', '2015-12-23 16:41:36'),
(278, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'روض الفرج', NULL, NULL, '2015-12-23 16:41:36', '2015-12-23 16:41:36'),
(279, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'الجيزة', NULL, NULL, '2015-12-23 16:41:36', '2015-12-23 16:41:36'),
(280, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'خاتم المرسلين', NULL, NULL, '2015-12-23 16:41:36', '2015-12-23 16:41:36'),
(281, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'حلوان', NULL, NULL, '2015-12-23 16:41:36', '2015-12-23 16:41:36'),
(282, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'امبابة 1', NULL, NULL, '2015-12-23 16:41:37', '2015-12-23 16:41:37'),
(283, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'مسطرد', NULL, NULL, '2015-12-23 16:41:37', '2015-12-23 16:41:37'),
(284, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'امبابة 2', NULL, NULL, '2015-12-23 16:41:37', '2015-12-23 16:41:37'),
(285, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'الفيوم', NULL, NULL, '2015-12-23 16:41:37', '2015-12-23 16:41:37'),
(286, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'بني سويف', NULL, NULL, '2015-12-23 16:41:37', '2015-12-23 16:41:37'),
(287, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'المنيا', '2', NULL, '2015-12-23 16:41:37', '2015-12-23 16:41:37'),
(288, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'اسيوط', NULL, NULL, '2015-12-23 16:41:37', '2015-12-23 16:41:37'),
(289, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'سوهاج', NULL, NULL, '2015-12-23 16:41:37', '2015-12-23 16:41:37'),
(290, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'قنا', '1', NULL, '2015-12-23 16:41:37', '2015-12-23 16:41:37'),
(291, 'Dec-2015', 17086, 'فيستا مؤخر مزلق', 'المنيا 2', NULL, NULL, '2015-12-23 16:41:37', '2015-12-23 16:41:37'),
(292, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'ميامي', NULL, NULL, '2015-12-23 16:41:37', '2015-12-23 16:41:37'),
(293, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'القباري', NULL, NULL, '2015-12-23 16:41:37', '2015-12-23 16:41:37'),
(294, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'مينا البصل', NULL, NULL, '2015-12-23 16:41:37', '2015-12-23 16:41:37'),
(295, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'الفلكى', NULL, NULL, '2015-12-23 16:41:38', '2015-12-23 16:41:38'),
(296, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'النزهة', NULL, NULL, '2015-12-23 16:41:38', '2015-12-23 16:41:38'),
(297, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'كفر الزيات', NULL, NULL, '2015-12-23 16:41:38', '2015-12-23 16:41:38'),
(298, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'دمنهور', NULL, NULL, '2015-12-23 16:41:38', '2015-12-23 16:41:38'),
(299, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'طنطا', NULL, NULL, '2015-12-23 16:41:38', '2015-12-23 16:41:38'),
(300, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'المحلة', NULL, NULL, '2015-12-23 16:41:38', '2015-12-23 16:41:38'),
(301, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'المنصورة', NULL, NULL, '2015-12-23 16:41:38', '2015-12-23 16:41:38'),
(302, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'دكرنس', NULL, NULL, '2015-12-23 16:41:38', '2015-12-23 16:41:38'),
(303, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'دمياط', '1', NULL, '2015-12-23 16:41:38', '2015-12-23 16:41:38'),
(304, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'شبين الكوم', NULL, NULL, '2015-12-23 16:41:38', '2015-12-23 16:41:38'),
(305, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'الناصرية', NULL, NULL, '2015-12-23 16:41:38', '2015-12-23 16:41:38'),
(306, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'دمنهور 2', NULL, NULL, '2015-12-23 16:41:38', '2015-12-23 16:41:38'),
(307, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'الزقازيق', NULL, NULL, '2015-12-23 16:41:38', '2015-12-23 16:41:38'),
(308, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'بنها 2', NULL, NULL, '2015-12-23 16:41:38', '2015-12-23 16:41:38'),
(309, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'المطرية', NULL, NULL, '2015-12-23 16:41:38', '2015-12-23 16:41:38'),
(310, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'مصر الجديدة', NULL, NULL, '2015-12-23 16:41:38', '2015-12-23 16:41:38'),
(311, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'مدينة نصر', NULL, NULL, '2015-12-23 16:41:38', '2015-12-23 16:41:38'),
(312, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'عين شمس', NULL, NULL, '2015-12-23 16:41:38', '2015-12-23 16:41:38'),
(313, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'روض الفرج', NULL, NULL, '2015-12-23 16:41:38', '2015-12-23 16:41:38'),
(314, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'الجيزة', NULL, NULL, '2015-12-23 16:41:39', '2015-12-23 16:41:39'),
(315, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'خاتم المرسلين', NULL, NULL, '2015-12-23 16:41:39', '2015-12-23 16:41:39'),
(316, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'حلوان', NULL, NULL, '2015-12-23 16:41:39', '2015-12-23 16:41:39'),
(317, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'امبابة 1', NULL, NULL, '2015-12-23 16:41:39', '2015-12-23 16:41:39'),
(318, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'مسطرد', NULL, NULL, '2015-12-23 16:41:39', '2015-12-23 16:41:39'),
(319, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'امبابة 2', NULL, NULL, '2015-12-23 16:41:39', '2015-12-23 16:41:39'),
(320, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'الفيوم', NULL, NULL, '2015-12-23 16:41:39', '2015-12-23 16:41:39'),
(321, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'بني سويف', NULL, NULL, '2015-12-23 16:41:39', '2015-12-23 16:41:39'),
(322, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'المنيا', NULL, NULL, '2015-12-23 16:41:39', '2015-12-23 16:41:39'),
(323, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'اسيوط', NULL, NULL, '2015-12-23 16:41:39', '2015-12-23 16:41:39'),
(324, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'سوهاج', NULL, NULL, '2015-12-23 16:41:39', '2015-12-23 16:41:39'),
(325, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'قنا', '1', NULL, '2015-12-23 16:41:39', '2015-12-23 16:41:39'),
(326, 'Dec-2015', 17087, 'فيستا وورم مزلق', 'المنيا 2', NULL, NULL, '2015-12-23 16:41:39', '2015-12-23 16:41:39');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `form_id` int(11) NOT NULL,
  `line_id` int(10) unsigned NOT NULL,
  `unit_price` double(11,3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `code`, `form_id`, `line_id`, `unit_price`, `created_at`, `updated_at`) VALUES
(1, 'Product 1', '0', 6, 1, 11.200, '2015-11-24 11:35:56', '2015-11-24 14:26:31'),
(2, 'Product 2', '0', 6, 1, 11.500, '2015-11-24 11:35:56', '2015-11-24 11:35:56'),
(3, 'Product 3', '0', 7, 1, 20.000, '2015-11-24 11:35:56', '2015-11-24 11:35:56'),
(4, 'Product 4', '0', 6, 2, 12.000, '2015-11-24 11:35:56', '2015-11-24 11:35:56'),
(5, 'Product 5', '0', 6, 3, 12.500, '2015-11-24 11:35:56', '2015-11-24 11:35:56'),
(7, 'Product 6', '0', 6, 1, 20.500, '2015-11-24 14:04:40', '2015-11-24 14:20:41'),
(8, 'Product 7', '0', 6, 1, 29.300, '2015-11-24 14:22:26', '2015-11-24 14:26:38');

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
  `is_planned` tinyint(1) NOT NULL,
  `lat` float(11,6) NOT NULL,
  `lon` float(11,6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `month`, `mr_id`, `doctor_id`, `date`, `promoted_products`, `samples_products`, `sold_products`, `total_sold_products_price`, `gifts`, `feedback`, `follow_up`, `double_visit_manager_id`, `is_planned`, `lat`, `lon`, `created_at`, `updated_at`) VALUES
(1, 'Dec-2015', 3, 8, '2015-12-04', '["1","7"]', '["2"]', '{"1":"1","2":"2","7":"6"}', 157.200, '["4","5"]', 'feedback', 'follow up', NULL, 1, 0.000000, 0.000000, '2015-12-04 17:02:07', '2015-12-04 17:02:07'),
(2, 'Dec-2015', 3, 7, '2015-12-04', '["8"]', '["8"]', '{"8":"7"}', 205.100, '["4"]', 'feedback', 'follow up', NULL, 1, 0.000000, 0.000000, '2015-12-04 17:17:56', '2015-12-04 17:17:56'),
(5, 'Dec-2015', 3, 8, '2015-12-06', 'NULL', 'NULL', 'NULL', 0.000, 'NULL', 'feedback', '', NULL, 1, 0.000000, 0.000000, '2015-12-06 00:36:41', '2015-12-06 00:36:41'),
(8, 'Dec-2015', 3, 1, '2015-12-06', 'NULL', 'NULL', '{"1":"9","2":"3"}', 135.300, 'NULL', 'feedback', 'follow up', NULL, 1, 0.000000, 0.000000, '2015-12-06 12:33:23', '2015-12-06 12:33:23'),
(9, 'Dec-2015', 3, 7, '2015-12-09', 'NULL', 'NULL', '{"1":"5"}', 56.000, 'NULL', '', '', NULL, 1, 0.000000, 0.000000, '2015-12-06 18:17:00', '2015-12-06 18:17:00'),
(11, 'Dec-2015', 3, 12, '2015-12-15', 'NULL', 'NULL', 'NULL', 0.000, 'NULL', 'feedback', 'follow up', NULL, 1, 41.310001, -72.919998, '2015-12-15 11:43:54', '2015-12-15 11:43:54'),
(12, 'Dec-2015', 3, 9, '2015-12-15', 'NULL', 'NULL', '{"2":"1","7":"1"}', 32.000, 'NULL', 'feedback', 'follow up', NULL, 1, 41.310001, -72.919998, '2015-12-15 11:56:33', '2015-12-15 11:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `report_gift`
--

CREATE TABLE IF NOT EXISTS `report_gift` (
`id` int(10) unsigned NOT NULL,
  `report_id` int(10) unsigned NOT NULL,
  `gift_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `report_gift`
--

INSERT INTO `report_gift` (`id`, `report_id`, `gift_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 2, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `report_promoted_product`
--

CREATE TABLE IF NOT EXISTS `report_promoted_product` (
`id` int(10) unsigned NOT NULL,
  `report_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `report_promoted_product`
--

INSERT INTO `report_promoted_product` (`id`, `report_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 2, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `report_sample_product`
--

CREATE TABLE IF NOT EXISTS `report_sample_product` (
`id` int(10) unsigned NOT NULL,
  `report_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `report_sample_product`
--

INSERT INTO `report_sample_product` (`id`, `report_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `report_sold_product`
--

CREATE TABLE IF NOT EXISTS `report_sold_product` (
`id` int(10) unsigned NOT NULL,
  `report_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `report_sold_product`
--

INSERT INTO `report_sold_product` (`id`, `report_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 7, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 2, 8, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 8, 1, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 8, 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 9, 1, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 12, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 12, 7, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
  `approved` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service_request`
--

INSERT INTO `service_request` (`id`, `month`, `mr_id`, `date`, `request_text`, `approved`, `created_at`, `updated_at`) VALUES
(2, 'Dec-2015', 3, '2015-12-10', 'Service Request', 1, '2015-12-03 16:25:51', '2015-12-24 06:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
`id` int(10) unsigned NOT NULL,
  `month` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employee_id` int(10) unsigned NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `month`, `employee_id`, `text`, `created_at`, `updated_at`) VALUES
(1, 'Dec-2015', 1, 'text', '2015-12-24 07:20:38', '2015-12-24 08:03:55');

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
-- Table structure for table `ucp`
--

CREATE TABLE IF NOT EXISTS `ucp` (
`id` int(10) unsigned NOT NULL,
  `month` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mrs_percents` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3444 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ucp`
--

INSERT INTO `ucp` (`id`, `month`, `code`, `product_name`, `area`, `quantity`, `mrs_percents`, `created_at`, `updated_at`) VALUES
(2339, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'حلوان', NULL, NULL, '2015-12-23 16:22:28', '2015-12-23 16:22:28'),
(2340, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'دسوق', NULL, NULL, '2015-12-23 16:22:28', '2015-12-23 16:22:28'),
(2341, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'شبين الكوم', NULL, NULL, '2015-12-23 16:22:28', '2015-12-23 16:22:28'),
(2342, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'الفيوم', NULL, NULL, '2015-12-23 16:22:28', '2015-12-23 16:22:28'),
(2343, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'سوهاج الجديد', NULL, NULL, '2015-12-23 16:22:28', '2015-12-23 16:22:28'),
(2344, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'دمنهور', NULL, NULL, '2015-12-23 16:22:28', '2015-12-23 16:22:28'),
(2345, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'طموه', NULL, NULL, '2015-12-23 16:22:28', '2015-12-23 16:22:28'),
(2346, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'شبرا مصر', NULL, NULL, '2015-12-23 16:22:28', '2015-12-23 16:22:28'),
(2347, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'الزاوية', NULL, NULL, '2015-12-23 16:22:28', '2015-12-23 16:22:28'),
(2348, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'المطرية', NULL, NULL, '2015-12-23 16:22:28', '2015-12-23 16:22:28'),
(2349, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'عين شمس', NULL, NULL, '2015-12-23 16:22:28', '2015-12-23 16:22:28'),
(2350, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'م.الجديدة', NULL, NULL, '2015-12-23 16:22:28', '2015-12-23 16:22:28'),
(2351, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'ش الخيمة', NULL, NULL, '2015-12-23 16:22:29', '2015-12-23 16:22:29'),
(2352, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'ش القناطر', NULL, NULL, '2015-12-23 16:22:29', '2015-12-23 16:22:29'),
(2353, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'وسط البلد', NULL, NULL, '2015-12-23 16:22:29', '2015-12-23 16:22:29'),
(2354, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'المهندسين', NULL, NULL, '2015-12-23 16:22:29', '2015-12-23 16:22:29'),
(2355, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'الهرم', NULL, NULL, '2015-12-23 16:22:29', '2015-12-23 16:22:29'),
(2356, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'العريش', NULL, NULL, '2015-12-23 16:22:29', '2015-12-23 16:22:29'),
(2357, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'م.نصر', NULL, NULL, '2015-12-23 16:22:29', '2015-12-23 16:22:29'),
(2358, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'امبابة', NULL, NULL, '2015-12-23 16:22:29', '2015-12-23 16:22:29'),
(2359, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'المعادى', NULL, NULL, '2015-12-23 16:22:29', '2015-12-23 16:22:29'),
(2360, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'دار السلام', NULL, NULL, '2015-12-23 16:22:29', '2015-12-23 16:22:29'),
(2361, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'البراجيل', NULL, NULL, '2015-12-23 16:22:29', '2015-12-23 16:22:29'),
(2362, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'بورسعيد', NULL, NULL, '2015-12-23 16:22:29', '2015-12-23 16:22:29'),
(2363, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'الدخيلة', NULL, NULL, '2015-12-23 16:22:29', '2015-12-23 16:22:29'),
(2364, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'سموحة', NULL, NULL, '2015-12-23 16:22:30', '2015-12-23 16:22:30'),
(2365, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'السويس', NULL, NULL, '2015-12-23 16:22:30', '2015-12-23 16:22:30'),
(2366, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'العصافرة', NULL, NULL, '2015-12-23 16:22:30', '2015-12-23 16:22:30'),
(2367, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'كفر الدوار', NULL, NULL, '2015-12-23 16:22:30', '2015-12-23 16:22:30'),
(2368, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'المنيا', NULL, NULL, '2015-12-23 16:22:30', '2015-12-23 16:22:30'),
(2369, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'بنى مزار', NULL, NULL, '2015-12-23 16:22:30', '2015-12-23 16:22:30'),
(2370, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'اسيوط', NULL, NULL, '2015-12-23 16:22:30', '2015-12-23 16:22:30'),
(2371, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'سوهاج', NULL, NULL, '2015-12-23 16:22:30', '2015-12-23 16:22:30'),
(2372, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'القوصية', NULL, NULL, '2015-12-23 16:22:30', '2015-12-23 16:22:30'),
(2373, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'نجع حمادى', NULL, NULL, '2015-12-23 16:22:30', '2015-12-23 16:22:30'),
(2374, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'قنا', NULL, NULL, '2015-12-23 16:22:30', '2015-12-23 16:22:30'),
(2375, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'الاقصر', NULL, NULL, '2015-12-23 16:22:30', '2015-12-23 16:22:30'),
(2376, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'بنى سويف', NULL, NULL, '2015-12-23 16:22:30', '2015-12-23 16:22:30'),
(2377, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'جرجا', NULL, NULL, '2015-12-23 16:22:30', '2015-12-23 16:22:30'),
(2378, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'كفر الشيخ', NULL, NULL, '2015-12-23 16:22:30', '2015-12-23 16:22:30'),
(2379, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'الفلكى', '30', '{"3":"0.3"}', '2015-12-23 16:22:30', '2015-12-23 21:44:20'),
(2380, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'اسماعلية', NULL, NULL, '2015-12-23 16:22:30', '2015-12-23 16:22:30'),
(2381, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'محرم بك', NULL, NULL, '2015-12-23 16:22:31', '2015-12-23 16:22:31'),
(2382, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'السواح', NULL, NULL, '2015-12-23 16:22:31', '2015-12-23 16:22:31'),
(2383, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'منصورة غ', NULL, NULL, '2015-12-23 16:22:31', '2015-12-23 16:22:31'),
(2384, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'الغردقة', NULL, NULL, '2015-12-23 16:22:31', '2015-12-23 16:22:31'),
(2385, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'منصورة ش', NULL, NULL, '2015-12-23 16:22:31', '2015-12-23 16:22:31'),
(2386, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'كفر الزيات', NULL, NULL, '2015-12-23 16:22:31', '2015-12-23 16:22:31'),
(2387, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'المحلة', NULL, NULL, '2015-12-23 16:22:31', '2015-12-23 16:22:31'),
(2388, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'المأمون', NULL, NULL, '2015-12-23 16:22:31', '2015-12-23 16:22:31'),
(2389, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'الاستاد', NULL, NULL, '2015-12-23 16:22:31', '2015-12-23 16:22:31'),
(2390, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'المنزلة', NULL, NULL, '2015-12-23 16:22:31', '2015-12-23 16:22:31'),
(2391, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'ميت غمر', NULL, NULL, '2015-12-23 16:22:31', '2015-12-23 16:22:31'),
(2392, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'شربين', NULL, NULL, '2015-12-23 16:22:31', '2015-12-23 16:22:31'),
(2393, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'دمياط', NULL, NULL, '2015-12-23 16:22:31', '2015-12-23 16:22:31'),
(2394, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'ابو كبير', NULL, NULL, '2015-12-23 16:22:31', '2015-12-23 16:22:31'),
(2395, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'بلبيس', NULL, NULL, '2015-12-23 16:22:31', '2015-12-23 16:22:31'),
(2396, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'القومية', NULL, NULL, '2015-12-23 16:22:31', '2015-12-23 16:22:31'),
(2397, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'الزهور', NULL, NULL, '2015-12-23 16:22:31', '2015-12-23 16:22:31'),
(2398, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'ايتاى البارود', NULL, NULL, '2015-12-23 16:22:31', '2015-12-23 16:22:31'),
(2399, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'بنها', NULL, NULL, '2015-12-23 16:22:32', '2015-12-23 16:22:32'),
(2400, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'قويسنا', NULL, NULL, '2015-12-23 16:22:32', '2015-12-23 16:22:32'),
(2401, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'اشمون', '1', NULL, '2015-12-23 16:22:32', '2015-12-23 16:22:32'),
(2402, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'اسوان', NULL, NULL, '2015-12-23 16:22:32', '2015-12-23 16:22:32'),
(2403, 'Dec-2015', 11464, '%سوترا عازل طبى 3 قطعة 50', 'فيصل', NULL, NULL, '2015-12-23 16:22:32', '2015-12-23 16:22:32'),
(2404, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'حلوان', NULL, NULL, '2015-12-23 16:22:32', '2015-12-23 16:22:32'),
(2405, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'دسوق', NULL, NULL, '2015-12-23 16:22:32', '2015-12-23 16:22:32'),
(2406, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'شبين الكوم', NULL, NULL, '2015-12-23 16:22:32', '2015-12-23 16:22:32'),
(2407, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'الفيوم', NULL, NULL, '2015-12-23 16:22:32', '2015-12-23 16:22:32'),
(2408, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'سوهاج الجديد', NULL, NULL, '2015-12-23 16:22:32', '2015-12-23 16:22:32'),
(2409, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'دمنهور', NULL, NULL, '2015-12-23 16:22:32', '2015-12-23 16:22:32'),
(2410, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'طموه', NULL, NULL, '2015-12-23 16:22:32', '2015-12-23 16:22:32'),
(2411, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'شبرا مصر', NULL, NULL, '2015-12-23 16:22:32', '2015-12-23 16:22:32'),
(2412, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'الزاوية', NULL, NULL, '2015-12-23 16:22:32', '2015-12-23 16:22:32'),
(2413, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'المطرية', NULL, NULL, '2015-12-23 16:22:32', '2015-12-23 16:22:32'),
(2414, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'عين شمس', NULL, NULL, '2015-12-23 16:22:32', '2015-12-23 16:22:32'),
(2415, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'م.الجديدة', NULL, NULL, '2015-12-23 16:22:32', '2015-12-23 16:22:32'),
(2416, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'ش الخيمة', NULL, NULL, '2015-12-23 16:22:32', '2015-12-23 16:22:32'),
(2417, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'ش القناطر', NULL, NULL, '2015-12-23 16:22:32', '2015-12-23 16:22:32'),
(2418, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'وسط البلد', NULL, NULL, '2015-12-23 16:22:33', '2015-12-23 16:22:33'),
(2419, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'المهندسين', NULL, NULL, '2015-12-23 16:22:33', '2015-12-23 16:22:33'),
(2420, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'الهرم', NULL, NULL, '2015-12-23 16:22:33', '2015-12-23 16:22:33'),
(2421, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'العريش', NULL, NULL, '2015-12-23 16:22:33', '2015-12-23 16:22:33'),
(2422, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'م.نصر', NULL, NULL, '2015-12-23 16:22:33', '2015-12-23 16:22:33'),
(2423, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'امبابة', NULL, NULL, '2015-12-23 16:22:33', '2015-12-23 16:22:33'),
(2424, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'المعادى', NULL, NULL, '2015-12-23 16:22:33', '2015-12-23 16:22:33'),
(2425, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'دار السلام', NULL, NULL, '2015-12-23 16:22:33', '2015-12-23 16:22:33'),
(2426, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'البراجيل', NULL, NULL, '2015-12-23 16:22:33', '2015-12-23 16:22:33'),
(2427, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'بورسعيد', NULL, NULL, '2015-12-23 16:22:33', '2015-12-23 16:22:33'),
(2428, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'الدخيلة', '-2', NULL, '2015-12-23 16:22:33', '2015-12-23 16:22:33'),
(2429, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'سموحة', NULL, NULL, '2015-12-23 16:22:33', '2015-12-23 16:22:33'),
(2430, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'السويس', NULL, NULL, '2015-12-23 16:22:33', '2015-12-23 16:22:33'),
(2431, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'العصافرة', NULL, NULL, '2015-12-23 16:22:33', '2015-12-23 16:22:33'),
(2432, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'كفر الدوار', NULL, NULL, '2015-12-23 16:22:33', '2015-12-23 16:22:33'),
(2433, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'المنيا', NULL, NULL, '2015-12-23 16:22:33', '2015-12-23 16:22:33'),
(2434, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'بنى مزار', NULL, NULL, '2015-12-23 16:22:33', '2015-12-23 16:22:33'),
(2435, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'اسيوط', NULL, NULL, '2015-12-23 16:22:33', '2015-12-23 16:22:33'),
(2436, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'سوهاج', NULL, NULL, '2015-12-23 16:22:34', '2015-12-23 16:22:34'),
(2437, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'القوصية', NULL, NULL, '2015-12-23 16:22:34', '2015-12-23 16:22:34'),
(2438, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'نجع حمادى', NULL, NULL, '2015-12-23 16:22:34', '2015-12-23 16:22:34'),
(2439, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'قنا', NULL, NULL, '2015-12-23 16:22:34', '2015-12-23 16:22:34'),
(2440, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'الاقصر', NULL, NULL, '2015-12-23 16:22:34', '2015-12-23 16:22:34'),
(2441, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'بنى سويف', NULL, NULL, '2015-12-23 16:22:34', '2015-12-23 16:22:34'),
(2442, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'جرجا', NULL, NULL, '2015-12-23 16:22:34', '2015-12-23 16:22:34'),
(2443, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'كفر الشيخ', NULL, NULL, '2015-12-23 16:22:34', '2015-12-23 16:22:34'),
(2444, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'الفلكى', NULL, NULL, '2015-12-23 16:22:34', '2015-12-23 16:22:34'),
(2445, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'اسماعلية', NULL, NULL, '2015-12-23 16:22:34', '2015-12-23 16:22:34'),
(2446, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'محرم بك', NULL, NULL, '2015-12-23 16:22:34', '2015-12-23 16:22:34'),
(2447, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'السواح', NULL, NULL, '2015-12-23 16:22:34', '2015-12-23 16:22:34'),
(2448, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'منصورة غ', NULL, NULL, '2015-12-23 16:22:34', '2015-12-23 16:22:34'),
(2449, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'الغردقة', NULL, NULL, '2015-12-23 16:22:34', '2015-12-23 16:22:34'),
(2450, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'منصورة ش', NULL, NULL, '2015-12-23 16:22:34', '2015-12-23 16:22:34'),
(2451, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'كفر الزيات', NULL, NULL, '2015-12-23 16:22:34', '2015-12-23 16:22:34'),
(2452, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'المحلة', NULL, NULL, '2015-12-23 16:22:34', '2015-12-23 16:22:34'),
(2453, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'المأمون', NULL, NULL, '2015-12-23 16:22:34', '2015-12-23 16:22:34'),
(2454, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'الاستاد', NULL, NULL, '2015-12-23 16:22:35', '2015-12-23 16:22:35'),
(2455, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'المنزلة', NULL, NULL, '2015-12-23 16:22:35', '2015-12-23 16:22:35'),
(2456, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'ميت غمر', NULL, NULL, '2015-12-23 16:22:35', '2015-12-23 16:22:35'),
(2457, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'شربين', NULL, NULL, '2015-12-23 16:22:35', '2015-12-23 16:22:35'),
(2458, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'دمياط', NULL, NULL, '2015-12-23 16:22:35', '2015-12-23 16:22:35'),
(2459, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'ابو كبير', NULL, NULL, '2015-12-23 16:22:35', '2015-12-23 16:22:35'),
(2460, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'بلبيس', NULL, NULL, '2015-12-23 16:22:35', '2015-12-23 16:22:35'),
(2461, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'القومية', NULL, NULL, '2015-12-23 16:22:35', '2015-12-23 16:22:35'),
(2462, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'الزهور', NULL, NULL, '2015-12-23 16:22:35', '2015-12-23 16:22:35'),
(2463, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'ايتاى البارود', NULL, NULL, '2015-12-23 16:22:36', '2015-12-23 16:22:36'),
(2464, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'بنها', NULL, NULL, '2015-12-23 16:22:36', '2015-12-23 16:22:36'),
(2465, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'قويسنا', NULL, NULL, '2015-12-23 16:22:36', '2015-12-23 16:22:36'),
(2466, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'اشمون', NULL, NULL, '2015-12-23 16:22:36', '2015-12-23 16:22:36'),
(2467, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'اسوان', NULL, NULL, '2015-12-23 16:22:36', '2015-12-23 16:22:36'),
(2468, 'Dec-2015', 12094, '%كونترابلان2  75ومجم2كبسولة20', 'فيصل', NULL, NULL, '2015-12-23 16:22:36', '2015-12-23 16:22:36'),
(2469, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'حلوان', NULL, NULL, '2015-12-23 16:22:36', '2015-12-23 16:22:36'),
(2470, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'دسوق', NULL, NULL, '2015-12-23 16:22:36', '2015-12-23 16:22:36'),
(2471, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'شبين الكوم', NULL, NULL, '2015-12-23 16:22:36', '2015-12-23 16:22:36'),
(2472, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'الفيوم', NULL, NULL, '2015-12-23 16:22:36', '2015-12-23 16:22:36'),
(2473, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'سوهاج الجديد', NULL, NULL, '2015-12-23 16:22:36', '2015-12-23 16:22:36'),
(2474, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'دمنهور', NULL, NULL, '2015-12-23 16:22:36', '2015-12-23 16:22:36'),
(2475, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'طموه', NULL, NULL, '2015-12-23 16:22:36', '2015-12-23 16:22:36'),
(2476, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'شبرا مصر', NULL, NULL, '2015-12-23 16:22:36', '2015-12-23 16:22:36'),
(2477, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'الزاوية', NULL, NULL, '2015-12-23 16:22:36', '2015-12-23 16:22:36'),
(2478, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'المطرية', NULL, NULL, '2015-12-23 16:22:37', '2015-12-23 16:22:37'),
(2479, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'عين شمس', NULL, NULL, '2015-12-23 16:22:37', '2015-12-23 16:22:37'),
(2480, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'م.الجديدة', '3', NULL, '2015-12-23 16:22:37', '2015-12-23 16:22:37'),
(2481, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'ش الخيمة', NULL, NULL, '2015-12-23 16:22:37', '2015-12-23 16:22:37'),
(2482, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'ش القناطر', NULL, NULL, '2015-12-23 16:22:37', '2015-12-23 16:22:37'),
(2483, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'وسط البلد', NULL, NULL, '2015-12-23 16:22:37', '2015-12-23 16:22:37'),
(2484, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'المهندسين', NULL, NULL, '2015-12-23 16:22:37', '2015-12-23 16:22:37'),
(2485, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'الهرم', NULL, NULL, '2015-12-23 16:22:37', '2015-12-23 16:22:37'),
(2486, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'العريش', NULL, NULL, '2015-12-23 16:22:37', '2015-12-23 16:22:37'),
(2487, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'م.نصر', NULL, NULL, '2015-12-23 16:22:37', '2015-12-23 16:22:37'),
(2488, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'امبابة', NULL, NULL, '2015-12-23 16:22:37', '2015-12-23 16:22:37'),
(2489, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'المعادى', NULL, NULL, '2015-12-23 16:22:37', '2015-12-23 16:22:37'),
(2490, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'دار السلام', NULL, NULL, '2015-12-23 16:22:38', '2015-12-23 16:22:38'),
(2491, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'البراجيل', NULL, NULL, '2015-12-23 16:22:38', '2015-12-23 16:22:38'),
(2492, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'بورسعيد', NULL, NULL, '2015-12-23 16:22:38', '2015-12-23 16:22:38'),
(2493, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'الدخيلة', NULL, NULL, '2015-12-23 16:22:38', '2015-12-23 16:22:38'),
(2494, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'سموحة', NULL, NULL, '2015-12-23 16:22:38', '2015-12-23 16:22:38'),
(2495, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'السويس', NULL, NULL, '2015-12-23 16:22:38', '2015-12-23 16:22:38'),
(2496, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'العصافرة', NULL, NULL, '2015-12-23 16:22:38', '2015-12-23 16:22:38'),
(2497, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'كفر الدوار', NULL, NULL, '2015-12-23 16:22:38', '2015-12-23 16:22:38'),
(2498, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'المنيا', NULL, NULL, '2015-12-23 16:22:38', '2015-12-23 16:22:38'),
(2499, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'بنى مزار', NULL, NULL, '2015-12-23 16:22:38', '2015-12-23 16:22:38'),
(2500, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'اسيوط', NULL, NULL, '2015-12-23 16:22:38', '2015-12-23 16:22:38'),
(2501, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'سوهاج', NULL, NULL, '2015-12-23 16:22:38', '2015-12-23 16:22:38'),
(2502, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'القوصية', NULL, NULL, '2015-12-23 16:22:39', '2015-12-23 16:22:39'),
(2503, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'نجع حمادى', NULL, NULL, '2015-12-23 16:22:39', '2015-12-23 16:22:39'),
(2504, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'قنا', NULL, NULL, '2015-12-23 16:22:39', '2015-12-23 16:22:39'),
(2505, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'الاقصر', NULL, NULL, '2015-12-23 16:22:39', '2015-12-23 16:22:39'),
(2506, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'بنى سويف', NULL, NULL, '2015-12-23 16:22:39', '2015-12-23 16:22:39'),
(2507, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'جرجا', NULL, NULL, '2015-12-23 16:22:39', '2015-12-23 16:22:39'),
(2508, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'كفر الشيخ', NULL, NULL, '2015-12-23 16:22:39', '2015-12-23 16:22:39'),
(2509, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'الفلكى', NULL, NULL, '2015-12-23 16:22:39', '2015-12-23 16:22:39'),
(2510, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'اسماعلية', NULL, NULL, '2015-12-23 16:22:39', '2015-12-23 16:22:39'),
(2511, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'محرم بك', NULL, NULL, '2015-12-23 16:22:39', '2015-12-23 16:22:39'),
(2512, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'السواح', NULL, NULL, '2015-12-23 16:22:39', '2015-12-23 16:22:39'),
(2513, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'منصورة غ', NULL, NULL, '2015-12-23 16:22:40', '2015-12-23 16:22:40'),
(2514, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'الغردقة', NULL, NULL, '2015-12-23 16:22:40', '2015-12-23 16:22:40'),
(2515, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'منصورة ش', NULL, NULL, '2015-12-23 16:22:40', '2015-12-23 16:22:40'),
(2516, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'كفر الزيات', NULL, NULL, '2015-12-23 16:22:40', '2015-12-23 16:22:40'),
(2517, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'المحلة', NULL, NULL, '2015-12-23 16:22:40', '2015-12-23 16:22:40'),
(2518, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'المأمون', NULL, NULL, '2015-12-23 16:22:40', '2015-12-23 16:22:40'),
(2519, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'الاستاد', NULL, NULL, '2015-12-23 16:22:40', '2015-12-23 16:22:40'),
(2520, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'المنزلة', NULL, NULL, '2015-12-23 16:22:40', '2015-12-23 16:22:40'),
(2521, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'ميت غمر', NULL, NULL, '2015-12-23 16:22:40', '2015-12-23 16:22:40'),
(2522, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'شربين', NULL, NULL, '2015-12-23 16:22:40', '2015-12-23 16:22:40'),
(2523, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'دمياط', NULL, NULL, '2015-12-23 16:22:40', '2015-12-23 16:22:40'),
(2524, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'ابو كبير', NULL, NULL, '2015-12-23 16:22:40', '2015-12-23 16:22:40'),
(2525, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'بلبيس', NULL, NULL, '2015-12-23 16:22:41', '2015-12-23 16:22:41'),
(2526, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'القومية', NULL, NULL, '2015-12-23 16:22:41', '2015-12-23 16:22:41'),
(2527, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'الزهور', NULL, NULL, '2015-12-23 16:22:41', '2015-12-23 16:22:41'),
(2528, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'ايتاى البارود', NULL, NULL, '2015-12-23 16:22:41', '2015-12-23 16:22:41'),
(2529, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'بنها', NULL, NULL, '2015-12-23 16:22:41', '2015-12-23 16:22:41'),
(2530, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'قويسنا', NULL, NULL, '2015-12-23 16:22:41', '2015-12-23 16:22:41'),
(2531, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'اشمون', NULL, NULL, '2015-12-23 16:22:41', '2015-12-23 16:22:41'),
(2532, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'اسوان', NULL, NULL, '2015-12-23 16:22:41', '2015-12-23 16:22:41'),
(2533, 'Dec-2015', 12441, '%يو كير لولب نحاســى  15', 'فيصل', NULL, NULL, '2015-12-23 16:22:41', '2015-12-23 16:22:41'),
(2534, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'حلوان', NULL, NULL, '2015-12-23 16:22:41', '2015-12-23 16:22:41'),
(2535, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'دسوق', NULL, NULL, '2015-12-23 16:22:41', '2015-12-23 16:22:41'),
(2536, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'شبين الكوم', NULL, NULL, '2015-12-23 16:22:41', '2015-12-23 16:22:41'),
(2537, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'الفيوم', NULL, NULL, '2015-12-23 16:22:41', '2015-12-23 16:22:41'),
(2538, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'سوهاج الجديد', NULL, NULL, '2015-12-23 16:22:41', '2015-12-23 16:22:41'),
(2539, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'دمنهور', '1', NULL, '2015-12-23 16:22:41', '2015-12-23 16:22:41'),
(2540, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'طموه', NULL, NULL, '2015-12-23 16:22:42', '2015-12-23 16:22:42'),
(2541, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'شبرا مصر', NULL, NULL, '2015-12-23 16:22:42', '2015-12-23 16:22:42'),
(2542, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'الزاوية', NULL, NULL, '2015-12-23 16:22:42', '2015-12-23 16:22:42'),
(2543, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'المطرية', NULL, NULL, '2015-12-23 16:22:42', '2015-12-23 16:22:42'),
(2544, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'عين شمس', '2', NULL, '2015-12-23 16:22:42', '2015-12-23 16:22:42'),
(2545, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'م.الجديدة', NULL, NULL, '2015-12-23 16:22:42', '2015-12-23 16:22:42'),
(2546, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'ش الخيمة', NULL, NULL, '2015-12-23 16:22:42', '2015-12-23 16:22:42'),
(2547, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'ش القناطر', NULL, NULL, '2015-12-23 16:22:42', '2015-12-23 16:22:42'),
(2548, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'وسط البلد', NULL, NULL, '2015-12-23 16:22:42', '2015-12-23 16:22:42'),
(2549, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'المهندسين', NULL, NULL, '2015-12-23 16:22:42', '2015-12-23 16:22:42'),
(2550, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'الهرم', NULL, NULL, '2015-12-23 16:22:42', '2015-12-23 16:22:42'),
(2551, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'العريش', NULL, NULL, '2015-12-23 16:22:42', '2015-12-23 16:22:42'),
(2552, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'م.نصر', '10', NULL, '2015-12-23 16:22:42', '2015-12-23 16:22:42'),
(2553, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'امبابة', NULL, NULL, '2015-12-23 16:22:42', '2015-12-23 16:22:42'),
(2554, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'المعادى', '3', NULL, '2015-12-23 16:22:42', '2015-12-23 16:22:42'),
(2555, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'دار السلام', NULL, NULL, '2015-12-23 16:22:42', '2015-12-23 16:22:42'),
(2556, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'البراجيل', NULL, NULL, '2015-12-23 16:22:42', '2015-12-23 16:22:42'),
(2557, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'بورسعيد', NULL, NULL, '2015-12-23 16:22:43', '2015-12-23 16:22:43'),
(2558, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'الدخيلة', NULL, NULL, '2015-12-23 16:22:43', '2015-12-23 16:22:43'),
(2559, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'سموحة', NULL, NULL, '2015-12-23 16:22:43', '2015-12-23 16:22:43'),
(2560, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'السويس', NULL, NULL, '2015-12-23 16:22:43', '2015-12-23 16:22:43'),
(2561, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'العصافرة', NULL, NULL, '2015-12-23 16:22:43', '2015-12-23 16:22:43'),
(2562, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'كفر الدوار', NULL, NULL, '2015-12-23 16:22:43', '2015-12-23 16:22:43'),
(2563, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'المنيا', NULL, NULL, '2015-12-23 16:22:43', '2015-12-23 16:22:43'),
(2564, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'بنى مزار', NULL, NULL, '2015-12-23 16:22:43', '2015-12-23 16:22:43'),
(2565, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'اسيوط', NULL, NULL, '2015-12-23 16:22:43', '2015-12-23 16:22:43'),
(2566, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'سوهاج', NULL, NULL, '2015-12-23 16:22:43', '2015-12-23 16:22:43'),
(2567, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'القوصية', NULL, NULL, '2015-12-23 16:22:43', '2015-12-23 16:22:43'),
(2568, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'نجع حمادى', NULL, NULL, '2015-12-23 16:22:43', '2015-12-23 16:22:43'),
(2569, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'قنا', NULL, NULL, '2015-12-23 16:22:43', '2015-12-23 16:22:43'),
(2570, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'الاقصر', NULL, NULL, '2015-12-23 16:22:43', '2015-12-23 16:22:43'),
(2571, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'بنى سويف', NULL, NULL, '2015-12-23 16:22:43', '2015-12-23 16:22:43'),
(2572, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'جرجا', NULL, NULL, '2015-12-23 16:22:43', '2015-12-23 16:22:43'),
(2573, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'كفر الشيخ', NULL, NULL, '2015-12-23 16:22:43', '2015-12-23 16:22:43'),
(2574, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'الفلكى', NULL, NULL, '2015-12-23 16:22:43', '2015-12-23 16:22:43'),
(2575, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'اسماعلية', NULL, NULL, '2015-12-23 16:22:44', '2015-12-23 16:22:44'),
(2576, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'محرم بك', NULL, NULL, '2015-12-23 16:22:44', '2015-12-23 16:22:44'),
(2577, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'السواح', NULL, NULL, '2015-12-23 16:22:44', '2015-12-23 16:22:44'),
(2578, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'منصورة غ', NULL, NULL, '2015-12-23 16:22:44', '2015-12-23 16:22:44'),
(2579, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'الغردقة', NULL, NULL, '2015-12-23 16:22:44', '2015-12-23 16:22:44'),
(2580, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'منصورة ش', NULL, NULL, '2015-12-23 16:22:44', '2015-12-23 16:22:44'),
(2581, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'كفر الزيات', NULL, NULL, '2015-12-23 16:22:44', '2015-12-23 16:22:44'),
(2582, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'المحلة', NULL, NULL, '2015-12-23 16:22:44', '2015-12-23 16:22:44'),
(2583, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'المأمون', NULL, NULL, '2015-12-23 16:22:44', '2015-12-23 16:22:44'),
(2584, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'الاستاد', NULL, NULL, '2015-12-23 16:22:44', '2015-12-23 16:22:44'),
(2585, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'المنزلة', NULL, NULL, '2015-12-23 16:22:44', '2015-12-23 16:22:44'),
(2586, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'ميت غمر', NULL, NULL, '2015-12-23 16:22:44', '2015-12-23 16:22:44'),
(2587, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'شربين', NULL, NULL, '2015-12-23 16:22:44', '2015-12-23 16:22:44'),
(2588, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'دمياط', NULL, NULL, '2015-12-23 16:22:44', '2015-12-23 16:22:44'),
(2589, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'ابو كبير', NULL, NULL, '2015-12-23 16:22:44', '2015-12-23 16:22:44'),
(2590, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'بلبيس', NULL, NULL, '2015-12-23 16:22:44', '2015-12-23 16:22:44'),
(2591, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'القومية', NULL, NULL, '2015-12-23 16:22:44', '2015-12-23 16:22:44'),
(2592, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'الزهور', NULL, NULL, '2015-12-23 16:22:44', '2015-12-23 16:22:44'),
(2593, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'ايتاى البارود', NULL, NULL, '2015-12-23 16:22:45', '2015-12-23 16:22:45'),
(2594, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'بنها', NULL, NULL, '2015-12-23 16:22:45', '2015-12-23 16:22:45'),
(2595, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'قويسنا', NULL, NULL, '2015-12-23 16:22:45', '2015-12-23 16:22:45'),
(2596, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'اشمون', NULL, NULL, '2015-12-23 16:22:45', '2015-12-23 16:22:45'),
(2597, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'اسوان', NULL, NULL, '2015-12-23 16:22:45', '2015-12-23 16:22:45'),
(2598, 'Dec-2015', 20300, '%بريجنا سيف لود لولب 20', 'فيصل', NULL, NULL, '2015-12-23 16:22:45', '2015-12-23 16:22:45'),
(2599, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'حلوان', NULL, NULL, '2015-12-23 16:22:45', '2015-12-23 16:22:45'),
(2600, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'دسوق', NULL, NULL, '2015-12-23 16:22:45', '2015-12-23 16:22:45'),
(2601, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'شبين الكوم', NULL, NULL, '2015-12-23 16:22:45', '2015-12-23 16:22:45'),
(2602, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'الفيوم', NULL, NULL, '2015-12-23 16:22:45', '2015-12-23 16:22:45'),
(2603, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'سوهاج الجديد', NULL, NULL, '2015-12-23 16:22:45', '2015-12-23 16:22:45'),
(2604, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'دمنهور', NULL, NULL, '2015-12-23 16:22:45', '2015-12-23 16:22:45'),
(2605, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'طموه', NULL, NULL, '2015-12-23 16:22:45', '2015-12-23 16:22:45'),
(2606, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'شبرا مصر', NULL, NULL, '2015-12-23 16:22:45', '2015-12-23 16:22:45'),
(2607, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'الزاوية', NULL, NULL, '2015-12-23 16:22:45', '2015-12-23 16:22:45'),
(2608, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'المطرية', NULL, NULL, '2015-12-23 16:22:45', '2015-12-23 16:22:45'),
(2609, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'عين شمس', '1', NULL, '2015-12-23 16:22:45', '2015-12-23 16:22:45'),
(2610, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'م.الجديدة', NULL, NULL, '2015-12-23 16:22:45', '2015-12-23 16:22:45'),
(2611, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'ش الخيمة', NULL, NULL, '2015-12-23 16:22:46', '2015-12-23 16:22:46'),
(2612, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'ش القناطر', NULL, NULL, '2015-12-23 16:22:46', '2015-12-23 16:22:46'),
(2613, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'وسط البلد', NULL, NULL, '2015-12-23 16:22:46', '2015-12-23 16:22:46'),
(2614, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'المهندسين', NULL, NULL, '2015-12-23 16:22:46', '2015-12-23 16:22:46'),
(2615, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'الهرم', NULL, NULL, '2015-12-23 16:22:46', '2015-12-23 16:22:46'),
(2616, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'العريش', NULL, NULL, '2015-12-23 16:22:46', '2015-12-23 16:22:46'),
(2617, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'م.نصر', NULL, NULL, '2015-12-23 16:22:46', '2015-12-23 16:22:46'),
(2618, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'امبابة', NULL, NULL, '2015-12-23 16:22:46', '2015-12-23 16:22:46'),
(2619, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'المعادى', NULL, NULL, '2015-12-23 16:22:46', '2015-12-23 16:22:46'),
(2620, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'دار السلام', NULL, NULL, '2015-12-23 16:22:46', '2015-12-23 16:22:46'),
(2621, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'البراجيل', NULL, NULL, '2015-12-23 16:22:46', '2015-12-23 16:22:46'),
(2622, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'بورسعيد', NULL, NULL, '2015-12-23 16:22:46', '2015-12-23 16:22:46'),
(2623, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'الدخيلة', NULL, NULL, '2015-12-23 16:22:46', '2015-12-23 16:22:46'),
(2624, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'سموحة', NULL, NULL, '2015-12-23 16:22:46', '2015-12-23 16:22:46'),
(2625, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'السويس', NULL, NULL, '2015-12-23 16:22:46', '2015-12-23 16:22:46'),
(2626, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'العصافرة', NULL, NULL, '2015-12-23 16:22:46', '2015-12-23 16:22:46'),
(2627, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'كفر الدوار', NULL, NULL, '2015-12-23 16:22:46', '2015-12-23 16:22:46'),
(2628, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'المنيا', NULL, NULL, '2015-12-23 16:22:47', '2015-12-23 16:22:47'),
(2629, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'بنى مزار', NULL, NULL, '2015-12-23 16:22:47', '2015-12-23 16:22:47'),
(2630, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'اسيوط', '8', NULL, '2015-12-23 16:22:47', '2015-12-23 16:22:47'),
(2631, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'سوهاج', NULL, NULL, '2015-12-23 16:22:47', '2015-12-23 16:22:47'),
(2632, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'القوصية', NULL, NULL, '2015-12-23 16:22:47', '2015-12-23 16:22:47'),
(2633, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'نجع حمادى', NULL, NULL, '2015-12-23 16:22:47', '2015-12-23 16:22:47'),
(2634, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'قنا', NULL, NULL, '2015-12-23 16:22:47', '2015-12-23 16:22:47'),
(2635, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'الاقصر', NULL, NULL, '2015-12-23 16:22:47', '2015-12-23 16:22:47'),
(2636, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'بنى سويف', '18', NULL, '2015-12-23 16:22:47', '2015-12-23 16:22:47'),
(2637, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'جرجا', NULL, NULL, '2015-12-23 16:22:47', '2015-12-23 16:22:47'),
(2638, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'كفر الشيخ', NULL, NULL, '2015-12-23 16:22:47', '2015-12-23 16:22:47'),
(2639, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'الفلكى', NULL, NULL, '2015-12-23 16:22:47', '2015-12-23 16:22:47'),
(2640, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'اسماعلية', NULL, NULL, '2015-12-23 16:22:47', '2015-12-23 16:22:47'),
(2641, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'محرم بك', NULL, NULL, '2015-12-23 16:22:47', '2015-12-23 16:22:47'),
(2642, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'السواح', NULL, NULL, '2015-12-23 16:22:47', '2015-12-23 16:22:47'),
(2643, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'منصورة غ', NULL, NULL, '2015-12-23 16:22:47', '2015-12-23 16:22:47'),
(2644, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'الغردقة', NULL, NULL, '2015-12-23 16:22:47', '2015-12-23 16:22:47'),
(2645, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'منصورة ش', NULL, NULL, '2015-12-23 16:22:48', '2015-12-23 16:22:48'),
(2646, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'كفر الزيات', NULL, NULL, '2015-12-23 16:22:48', '2015-12-23 16:22:48'),
(2647, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'المحلة', NULL, NULL, '2015-12-23 16:22:48', '2015-12-23 16:22:48'),
(2648, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'المأمون', NULL, NULL, '2015-12-23 16:22:48', '2015-12-23 16:22:48'),
(2649, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'الاستاد', NULL, NULL, '2015-12-23 16:22:48', '2015-12-23 16:22:48'),
(2650, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'المنزلة', NULL, NULL, '2015-12-23 16:22:48', '2015-12-23 16:22:48'),
(2651, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'ميت غمر', NULL, NULL, '2015-12-23 16:22:48', '2015-12-23 16:22:48'),
(2652, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'شربين', NULL, NULL, '2015-12-23 16:22:48', '2015-12-23 16:22:48'),
(2653, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'دمياط', NULL, NULL, '2015-12-23 16:22:48', '2015-12-23 16:22:48'),
(2654, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'ابو كبير', NULL, NULL, '2015-12-23 16:22:48', '2015-12-23 16:22:48'),
(2655, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'بلبيس', NULL, NULL, '2015-12-23 16:22:48', '2015-12-23 16:22:48'),
(2656, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'القومية', NULL, NULL, '2015-12-23 16:22:48', '2015-12-23 16:22:48'),
(2657, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'الزهور', NULL, NULL, '2015-12-23 16:22:48', '2015-12-23 16:22:48'),
(2658, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'ايتاى البارود', NULL, NULL, '2015-12-23 16:22:48', '2015-12-23 16:22:48'),
(2659, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'بنها', NULL, NULL, '2015-12-23 16:22:48', '2015-12-23 16:22:48'),
(2660, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'قويسنا', NULL, NULL, '2015-12-23 16:22:48', '2015-12-23 16:22:48'),
(2661, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'اشمون', NULL, NULL, '2015-12-23 16:22:48', '2015-12-23 16:22:48'),
(2662, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'اسوان', NULL, NULL, '2015-12-23 16:22:48', '2015-12-23 16:22:48'),
(2663, 'Dec-2015', 22327, '%سلفر لاين380  لولب  12', 'فيصل', NULL, NULL, '2015-12-23 16:22:49', '2015-12-23 16:22:49'),
(2664, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'حلوان', NULL, NULL, '2015-12-23 16:22:49', '2015-12-23 16:22:49'),
(2665, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'دسوق', NULL, NULL, '2015-12-23 16:22:49', '2015-12-23 16:22:49'),
(2666, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'شبين الكوم', NULL, NULL, '2015-12-23 16:22:49', '2015-12-23 16:22:49'),
(2667, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'الفيوم', NULL, NULL, '2015-12-23 16:22:49', '2015-12-23 16:22:49'),
(2668, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'سوهاج الجديد', NULL, NULL, '2015-12-23 16:22:49', '2015-12-23 16:22:49'),
(2669, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'دمنهور', NULL, NULL, '2015-12-23 16:22:49', '2015-12-23 16:22:49'),
(2670, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'طموه', NULL, NULL, '2015-12-23 16:22:49', '2015-12-23 16:22:49'),
(2671, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'شبرا مصر', NULL, NULL, '2015-12-23 16:22:49', '2015-12-23 16:22:49'),
(2672, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'الزاوية', NULL, NULL, '2015-12-23 16:22:49', '2015-12-23 16:22:49'),
(2673, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'المطرية', NULL, NULL, '2015-12-23 16:22:49', '2015-12-23 16:22:49'),
(2674, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'عين شمس', NULL, NULL, '2015-12-23 16:22:49', '2015-12-23 16:22:49'),
(2675, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'م.الجديدة', NULL, NULL, '2015-12-23 16:22:49', '2015-12-23 16:22:49'),
(2676, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'ش الخيمة', NULL, NULL, '2015-12-23 16:22:49', '2015-12-23 16:22:49'),
(2677, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'ش القناطر', NULL, NULL, '2015-12-23 16:22:49', '2015-12-23 16:22:49'),
(2678, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'وسط البلد', NULL, NULL, '2015-12-23 16:22:49', '2015-12-23 16:22:49'),
(2679, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'المهندسين', NULL, NULL, '2015-12-23 16:22:49', '2015-12-23 16:22:49'),
(2680, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'الهرم', NULL, NULL, '2015-12-23 16:22:50', '2015-12-23 16:22:50'),
(2681, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'العريش', NULL, NULL, '2015-12-23 16:22:50', '2015-12-23 16:22:50'),
(2682, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'م.نصر', NULL, NULL, '2015-12-23 16:22:50', '2015-12-23 16:22:50');
INSERT INTO `ucp` (`id`, `month`, `code`, `product_name`, `area`, `quantity`, `mrs_percents`, `created_at`, `updated_at`) VALUES
(2683, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'امبابة', NULL, NULL, '2015-12-23 16:22:50', '2015-12-23 16:22:50'),
(2684, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'المعادى', NULL, NULL, '2015-12-23 16:22:50', '2015-12-23 16:22:50'),
(2685, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'دار السلام', NULL, NULL, '2015-12-23 16:22:50', '2015-12-23 16:22:50'),
(2686, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'البراجيل', NULL, NULL, '2015-12-23 16:22:50', '2015-12-23 16:22:50'),
(2687, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'بورسعيد', NULL, NULL, '2015-12-23 16:22:50', '2015-12-23 16:22:50'),
(2688, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'الدخيلة', NULL, NULL, '2015-12-23 16:22:50', '2015-12-23 16:22:50'),
(2689, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'سموحة', NULL, NULL, '2015-12-23 16:22:50', '2015-12-23 16:22:50'),
(2690, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'السويس', NULL, NULL, '2015-12-23 16:22:50', '2015-12-23 16:22:50'),
(2691, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'العصافرة', NULL, NULL, '2015-12-23 16:22:50', '2015-12-23 16:22:50'),
(2692, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'كفر الدوار', NULL, NULL, '2015-12-23 16:22:50', '2015-12-23 16:22:50'),
(2693, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'المنيا', NULL, NULL, '2015-12-23 16:22:50', '2015-12-23 16:22:50'),
(2694, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'بنى مزار', NULL, NULL, '2015-12-23 16:22:50', '2015-12-23 16:22:50'),
(2695, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'اسيوط', NULL, NULL, '2015-12-23 16:22:50', '2015-12-23 16:22:50'),
(2696, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'سوهاج', NULL, NULL, '2015-12-23 16:22:51', '2015-12-23 16:22:51'),
(2697, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'القوصية', NULL, NULL, '2015-12-23 16:22:51', '2015-12-23 16:22:51'),
(2698, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'نجع حمادى', NULL, NULL, '2015-12-23 16:22:51', '2015-12-23 16:22:51'),
(2699, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'قنا', NULL, NULL, '2015-12-23 16:22:51', '2015-12-23 16:22:51'),
(2700, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'الاقصر', NULL, NULL, '2015-12-23 16:22:51', '2015-12-23 16:22:51'),
(2701, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'بنى سويف', NULL, NULL, '2015-12-23 16:22:51', '2015-12-23 16:22:51'),
(2702, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'جرجا', NULL, NULL, '2015-12-23 16:22:51', '2015-12-23 16:22:51'),
(2703, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'كفر الشيخ', NULL, NULL, '2015-12-23 16:22:51', '2015-12-23 16:22:51'),
(2704, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'الفلكى', NULL, NULL, '2015-12-23 16:22:51', '2015-12-23 16:22:51'),
(2705, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'اسماعلية', '2', NULL, '2015-12-23 16:22:51', '2015-12-23 16:22:51'),
(2706, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'محرم بك', NULL, NULL, '2015-12-23 16:22:51', '2015-12-23 16:22:51'),
(2707, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'السواح', NULL, NULL, '2015-12-23 16:22:51', '2015-12-23 16:22:51'),
(2708, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'منصورة غ', NULL, NULL, '2015-12-23 16:22:51', '2015-12-23 16:22:51'),
(2709, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'الغردقة', NULL, NULL, '2015-12-23 16:22:51', '2015-12-23 16:22:51'),
(2710, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'منصورة ش', NULL, NULL, '2015-12-23 16:22:51', '2015-12-23 16:22:51'),
(2711, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'كفر الزيات', NULL, NULL, '2015-12-23 16:22:51', '2015-12-23 16:22:51'),
(2712, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'المحلة', NULL, NULL, '2015-12-23 16:22:51', '2015-12-23 16:22:51'),
(2713, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'المأمون', NULL, NULL, '2015-12-23 16:22:51', '2015-12-23 16:22:51'),
(2714, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'الاستاد', NULL, NULL, '2015-12-23 16:22:52', '2015-12-23 16:22:52'),
(2715, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'المنزلة', NULL, NULL, '2015-12-23 16:22:52', '2015-12-23 16:22:52'),
(2716, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'ميت غمر', NULL, NULL, '2015-12-23 16:22:52', '2015-12-23 16:22:52'),
(2717, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'شربين', NULL, NULL, '2015-12-23 16:22:52', '2015-12-23 16:22:52'),
(2718, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'دمياط', NULL, NULL, '2015-12-23 16:22:52', '2015-12-23 16:22:52'),
(2719, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'ابو كبير', NULL, NULL, '2015-12-23 16:22:52', '2015-12-23 16:22:52'),
(2720, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'بلبيس', NULL, NULL, '2015-12-23 16:22:52', '2015-12-23 16:22:52'),
(2721, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'القومية', NULL, NULL, '2015-12-23 16:22:52', '2015-12-23 16:22:52'),
(2722, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'الزهور', NULL, NULL, '2015-12-23 16:22:52', '2015-12-23 16:22:52'),
(2723, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'ايتاى البارود', NULL, NULL, '2015-12-23 16:22:52', '2015-12-23 16:22:52'),
(2724, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'بنها', NULL, NULL, '2015-12-23 16:22:52', '2015-12-23 16:22:52'),
(2725, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'قويسنا', NULL, NULL, '2015-12-23 16:22:52', '2015-12-23 16:22:52'),
(2726, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'اشمون', NULL, NULL, '2015-12-23 16:22:52', '2015-12-23 16:22:52'),
(2727, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'اسوان', NULL, NULL, '2015-12-23 16:22:52', '2015-12-23 16:22:52'),
(2728, 'Dec-2015', 22328, '%سليك 375 سى يو لولب 12', 'فيصل', NULL, NULL, '2015-12-23 16:22:52', '2015-12-23 16:22:52'),
(2729, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'حلوان', NULL, NULL, '2015-12-23 16:22:52', '2015-12-23 16:22:52'),
(2730, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'دسوق', NULL, NULL, '2015-12-23 16:22:52', '2015-12-23 16:22:52'),
(2731, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'شبين الكوم', NULL, NULL, '2015-12-23 16:22:53', '2015-12-23 16:22:53'),
(2732, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'الفيوم', NULL, NULL, '2015-12-23 16:22:53', '2015-12-23 16:22:53'),
(2733, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'سوهاج الجديد', NULL, NULL, '2015-12-23 16:22:53', '2015-12-23 16:22:53'),
(2734, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'دمنهور', NULL, NULL, '2015-12-23 16:22:53', '2015-12-23 16:22:53'),
(2735, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'طموه', NULL, NULL, '2015-12-23 16:22:53', '2015-12-23 16:22:53'),
(2736, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'شبرا مصر', NULL, NULL, '2015-12-23 16:22:53', '2015-12-23 16:22:53'),
(2737, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'الزاوية', NULL, NULL, '2015-12-23 16:22:53', '2015-12-23 16:22:53'),
(2738, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'المطرية', NULL, NULL, '2015-12-23 16:22:53', '2015-12-23 16:22:53'),
(2739, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'عين شمس', NULL, NULL, '2015-12-23 16:22:53', '2015-12-23 16:22:53'),
(2740, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'م.الجديدة', NULL, NULL, '2015-12-23 16:22:53', '2015-12-23 16:22:53'),
(2741, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'ش الخيمة', NULL, NULL, '2015-12-23 16:22:53', '2015-12-23 16:22:53'),
(2742, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'ش القناطر', NULL, NULL, '2015-12-23 16:22:53', '2015-12-23 16:22:53'),
(2743, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'وسط البلد', NULL, NULL, '2015-12-23 16:22:53', '2015-12-23 16:22:53'),
(2744, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'المهندسين', NULL, NULL, '2015-12-23 16:22:53', '2015-12-23 16:22:53'),
(2745, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'الهرم', NULL, NULL, '2015-12-23 16:22:53', '2015-12-23 16:22:53'),
(2746, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'العريش', NULL, NULL, '2015-12-23 16:22:53', '2015-12-23 16:22:53'),
(2747, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'م.نصر', NULL, NULL, '2015-12-23 16:22:53', '2015-12-23 16:22:53'),
(2748, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'امبابة', NULL, NULL, '2015-12-23 16:22:53', '2015-12-23 16:22:53'),
(2749, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'المعادى', NULL, NULL, '2015-12-23 16:22:53', '2015-12-23 16:22:53'),
(2750, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'دار السلام', NULL, NULL, '2015-12-23 16:22:53', '2015-12-23 16:22:53'),
(2751, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'البراجيل', NULL, NULL, '2015-12-23 16:22:54', '2015-12-23 16:22:54'),
(2752, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'بورسعيد', NULL, NULL, '2015-12-23 16:22:54', '2015-12-23 16:22:54'),
(2753, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'الدخيلة', NULL, NULL, '2015-12-23 16:22:54', '2015-12-23 16:22:54'),
(2754, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'سموحة', NULL, NULL, '2015-12-23 16:22:54', '2015-12-23 16:22:54'),
(2755, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'السويس', NULL, NULL, '2015-12-23 16:22:54', '2015-12-23 16:22:54'),
(2756, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'العصافرة', NULL, NULL, '2015-12-23 16:22:54', '2015-12-23 16:22:54'),
(2757, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'كفر الدوار', NULL, NULL, '2015-12-23 16:22:54', '2015-12-23 16:22:54'),
(2758, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'المنيا', NULL, NULL, '2015-12-23 16:22:54', '2015-12-23 16:22:54'),
(2759, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'بنى مزار', NULL, NULL, '2015-12-23 16:22:54', '2015-12-23 16:22:54'),
(2760, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'اسيوط', NULL, NULL, '2015-12-23 16:22:54', '2015-12-23 16:22:54'),
(2761, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'سوهاج', NULL, NULL, '2015-12-23 16:22:54', '2015-12-23 16:22:54'),
(2762, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'القوصية', NULL, NULL, '2015-12-23 16:22:54', '2015-12-23 16:22:54'),
(2763, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'نجع حمادى', NULL, NULL, '2015-12-23 16:22:54', '2015-12-23 16:22:54'),
(2764, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'قنا', NULL, NULL, '2015-12-23 16:22:54', '2015-12-23 16:22:54'),
(2765, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'الاقصر', NULL, NULL, '2015-12-23 16:22:54', '2015-12-23 16:22:54'),
(2766, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'بنى سويف', NULL, NULL, '2015-12-23 16:22:54', '2015-12-23 16:22:54'),
(2767, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'جرجا', NULL, NULL, '2015-12-23 16:22:55', '2015-12-23 16:22:55'),
(2768, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'كفر الشيخ', NULL, NULL, '2015-12-23 16:22:55', '2015-12-23 16:22:55'),
(2769, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'الفلكى', NULL, NULL, '2015-12-23 16:22:55', '2015-12-23 16:22:55'),
(2770, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'اسماعلية', NULL, NULL, '2015-12-23 16:22:55', '2015-12-23 16:22:55'),
(2771, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'محرم بك', NULL, NULL, '2015-12-23 16:22:55', '2015-12-23 16:22:55'),
(2772, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'السواح', NULL, NULL, '2015-12-23 16:22:55', '2015-12-23 16:22:55'),
(2773, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'منصورة غ', NULL, NULL, '2015-12-23 16:22:55', '2015-12-23 16:22:55'),
(2774, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'الغردقة', NULL, NULL, '2015-12-23 16:22:55', '2015-12-23 16:22:55'),
(2775, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'منصورة ش', NULL, NULL, '2015-12-23 16:22:55', '2015-12-23 16:22:55'),
(2776, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'كفر الزيات', NULL, NULL, '2015-12-23 16:22:55', '2015-12-23 16:22:55'),
(2777, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'المحلة', NULL, NULL, '2015-12-23 16:22:56', '2015-12-23 16:22:56'),
(2778, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'المأمون', NULL, NULL, '2015-12-23 16:22:56', '2015-12-23 16:22:56'),
(2779, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'الاستاد', NULL, NULL, '2015-12-23 16:22:56', '2015-12-23 16:22:56'),
(2780, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'المنزلة', NULL, NULL, '2015-12-23 16:22:56', '2015-12-23 16:22:56'),
(2781, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'ميت غمر', NULL, NULL, '2015-12-23 16:22:56', '2015-12-23 16:22:56'),
(2782, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'شربين', NULL, NULL, '2015-12-23 16:22:56', '2015-12-23 16:22:56'),
(2783, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'دمياط', NULL, NULL, '2015-12-23 16:22:56', '2015-12-23 16:22:56'),
(2784, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'ابو كبير', NULL, NULL, '2015-12-23 16:22:56', '2015-12-23 16:22:56'),
(2785, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'بلبيس', NULL, NULL, '2015-12-23 16:22:56', '2015-12-23 16:22:56'),
(2786, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'القومية', '1', NULL, '2015-12-23 16:22:56', '2015-12-23 16:22:56'),
(2787, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'الزهور', NULL, NULL, '2015-12-23 16:22:56', '2015-12-23 16:22:56'),
(2788, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'ايتاى البارود', NULL, NULL, '2015-12-23 16:22:56', '2015-12-23 16:22:56'),
(2789, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'بنها', NULL, NULL, '2015-12-23 16:22:56', '2015-12-23 16:22:56'),
(2790, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'قويسنا', NULL, NULL, '2015-12-23 16:22:57', '2015-12-23 16:22:57'),
(2791, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'اشمون', NULL, NULL, '2015-12-23 16:22:57', '2015-12-23 16:22:57'),
(2792, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'اسوان', NULL, NULL, '2015-12-23 16:22:57', '2015-12-23 16:22:57'),
(2793, 'Dec-2015', 22583, '%فيستا واقى بجوز الهند  50', 'فيصل', NULL, NULL, '2015-12-23 16:22:57', '2015-12-23 16:22:57'),
(2794, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'حلوان', NULL, NULL, '2015-12-23 16:22:57', '2015-12-23 16:22:57'),
(2795, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'دسوق', NULL, NULL, '2015-12-23 16:22:57', '2015-12-23 16:22:57'),
(2796, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'شبين الكوم', NULL, NULL, '2015-12-23 16:22:57', '2015-12-23 16:22:57'),
(2797, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'الفيوم', NULL, NULL, '2015-12-23 16:22:57', '2015-12-23 16:22:57'),
(2798, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'سوهاج الجديد', NULL, NULL, '2015-12-23 16:22:57', '2015-12-23 16:22:57'),
(2799, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'دمنهور', NULL, NULL, '2015-12-23 16:22:57', '2015-12-23 16:22:57'),
(2800, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'طموه', NULL, NULL, '2015-12-23 16:22:57', '2015-12-23 16:22:57'),
(2801, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'شبرا مصر', NULL, NULL, '2015-12-23 16:22:57', '2015-12-23 16:22:57'),
(2802, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'الزاوية', NULL, NULL, '2015-12-23 16:22:58', '2015-12-23 16:22:58'),
(2803, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'المطرية', NULL, NULL, '2015-12-23 16:22:58', '2015-12-23 16:22:58'),
(2804, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'عين شمس', NULL, NULL, '2015-12-23 16:22:58', '2015-12-23 16:22:58'),
(2805, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'م.الجديدة', NULL, NULL, '2015-12-23 16:22:58', '2015-12-23 16:22:58'),
(2806, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'ش الخيمة', NULL, NULL, '2015-12-23 16:22:58', '2015-12-23 16:22:58'),
(2807, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'ش القناطر', NULL, NULL, '2015-12-23 16:22:58', '2015-12-23 16:22:58'),
(2808, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'وسط البلد', NULL, NULL, '2015-12-23 16:22:58', '2015-12-23 16:22:58'),
(2809, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'المهندسين', NULL, NULL, '2015-12-23 16:22:58', '2015-12-23 16:22:58'),
(2810, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'الهرم', NULL, NULL, '2015-12-23 16:22:58', '2015-12-23 16:22:58'),
(2811, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'العريش', NULL, NULL, '2015-12-23 16:22:58', '2015-12-23 16:22:58'),
(2812, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'م.نصر', NULL, NULL, '2015-12-23 16:22:58', '2015-12-23 16:22:58'),
(2813, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'امبابة', NULL, NULL, '2015-12-23 16:22:58', '2015-12-23 16:22:58'),
(2814, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'المعادى', NULL, NULL, '2015-12-23 16:22:58', '2015-12-23 16:22:58'),
(2815, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'دار السلام', NULL, NULL, '2015-12-23 16:22:58', '2015-12-23 16:22:58'),
(2816, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'البراجيل', NULL, NULL, '2015-12-23 16:22:59', '2015-12-23 16:22:59'),
(2817, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'بورسعيد', NULL, NULL, '2015-12-23 16:22:59', '2015-12-23 16:22:59'),
(2818, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'الدخيلة', NULL, NULL, '2015-12-23 16:22:59', '2015-12-23 16:22:59'),
(2819, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'سموحة', NULL, NULL, '2015-12-23 16:22:59', '2015-12-23 16:22:59'),
(2820, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'السويس', NULL, NULL, '2015-12-23 16:22:59', '2015-12-23 16:22:59'),
(2821, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'العصافرة', NULL, NULL, '2015-12-23 16:22:59', '2015-12-23 16:22:59'),
(2822, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'كفر الدوار', NULL, NULL, '2015-12-23 16:22:59', '2015-12-23 16:22:59'),
(2823, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'المنيا', NULL, NULL, '2015-12-23 16:22:59', '2015-12-23 16:22:59'),
(2824, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'بنى مزار', NULL, NULL, '2015-12-23 16:22:59', '2015-12-23 16:22:59'),
(2825, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'اسيوط', NULL, NULL, '2015-12-23 16:22:59', '2015-12-23 16:22:59'),
(2826, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'سوهاج', NULL, NULL, '2015-12-23 16:22:59', '2015-12-23 16:22:59'),
(2827, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'القوصية', NULL, NULL, '2015-12-23 16:22:59', '2015-12-23 16:22:59'),
(2828, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'نجع حمادى', NULL, NULL, '2015-12-23 16:22:59', '2015-12-23 16:22:59'),
(2829, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'قنا', NULL, NULL, '2015-12-23 16:22:59', '2015-12-23 16:22:59'),
(2830, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'الاقصر', NULL, NULL, '2015-12-23 16:22:59', '2015-12-23 16:22:59'),
(2831, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'بنى سويف', NULL, NULL, '2015-12-23 16:22:59', '2015-12-23 16:22:59'),
(2832, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'جرجا', NULL, NULL, '2015-12-23 16:23:00', '2015-12-23 16:23:00'),
(2833, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'كفر الشيخ', NULL, NULL, '2015-12-23 16:23:00', '2015-12-23 16:23:00'),
(2834, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'الفلكى', NULL, NULL, '2015-12-23 16:23:00', '2015-12-23 16:23:00'),
(2835, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'اسماعلية', NULL, NULL, '2015-12-23 16:23:00', '2015-12-23 16:23:00'),
(2836, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'محرم بك', NULL, NULL, '2015-12-23 16:23:00', '2015-12-23 16:23:00'),
(2837, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'السواح', NULL, NULL, '2015-12-23 16:23:00', '2015-12-23 16:23:00'),
(2838, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'منصورة غ', NULL, NULL, '2015-12-23 16:23:00', '2015-12-23 16:23:00'),
(2839, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'الغردقة', NULL, NULL, '2015-12-23 16:23:00', '2015-12-23 16:23:00'),
(2840, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'منصورة ش', NULL, NULL, '2015-12-23 16:23:00', '2015-12-23 16:23:00'),
(2841, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'كفر الزيات', NULL, NULL, '2015-12-23 16:23:00', '2015-12-23 16:23:00'),
(2842, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'المحلة', NULL, NULL, '2015-12-23 16:23:00', '2015-12-23 16:23:00'),
(2843, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'المأمون', NULL, NULL, '2015-12-23 16:23:00', '2015-12-23 16:23:00'),
(2844, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'الاستاد', NULL, NULL, '2015-12-23 16:23:00', '2015-12-23 16:23:00'),
(2845, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'المنزلة', NULL, NULL, '2015-12-23 16:23:00', '2015-12-23 16:23:00'),
(2846, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'ميت غمر', NULL, NULL, '2015-12-23 16:23:00', '2015-12-23 16:23:00'),
(2847, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'شربين', NULL, NULL, '2015-12-23 16:23:00', '2015-12-23 16:23:00'),
(2848, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'دمياط', NULL, NULL, '2015-12-23 16:23:01', '2015-12-23 16:23:01'),
(2849, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'ابو كبير', NULL, NULL, '2015-12-23 16:23:01', '2015-12-23 16:23:01'),
(2850, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'بلبيس', NULL, NULL, '2015-12-23 16:23:01', '2015-12-23 16:23:01'),
(2851, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'القومية', '-1', NULL, '2015-12-23 16:23:01', '2015-12-23 16:23:01'),
(2852, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'الزهور', NULL, NULL, '2015-12-23 16:23:01', '2015-12-23 16:23:01'),
(2853, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'ايتاى البارود', NULL, NULL, '2015-12-23 16:23:01', '2015-12-23 16:23:01'),
(2854, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'بنها', NULL, NULL, '2015-12-23 16:23:01', '2015-12-23 16:23:01'),
(2855, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'قويسنا', NULL, NULL, '2015-12-23 16:23:01', '2015-12-23 16:23:01'),
(2856, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'اشمون', NULL, NULL, '2015-12-23 16:23:01', '2015-12-23 16:23:01'),
(2857, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'اسوان', NULL, NULL, '2015-12-23 16:23:01', '2015-12-23 16:23:01'),
(2858, 'Dec-2015', 22584, '%فيستا واقى بالكراميل  50', 'فيصل', NULL, NULL, '2015-12-23 16:23:01', '2015-12-23 16:23:01'),
(2859, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'حلوان', NULL, NULL, '2015-12-23 16:23:01', '2015-12-23 16:23:01'),
(2860, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'دسوق', NULL, NULL, '2015-12-23 16:23:01', '2015-12-23 16:23:01'),
(2861, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'شبين الكوم', NULL, NULL, '2015-12-23 16:23:01', '2015-12-23 16:23:01'),
(2862, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'الفيوم', NULL, NULL, '2015-12-23 16:23:01', '2015-12-23 16:23:01'),
(2863, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'سوهاج الجديد', NULL, NULL, '2015-12-23 16:23:01', '2015-12-23 16:23:01'),
(2864, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'دمنهور', NULL, NULL, '2015-12-23 16:23:01', '2015-12-23 16:23:01'),
(2865, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'طموه', NULL, NULL, '2015-12-23 16:23:01', '2015-12-23 16:23:01'),
(2866, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'شبرا مصر', NULL, NULL, '2015-12-23 16:23:01', '2015-12-23 16:23:01'),
(2867, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'الزاوية', NULL, NULL, '2015-12-23 16:23:01', '2015-12-23 16:23:01'),
(2868, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'المطرية', NULL, NULL, '2015-12-23 16:23:01', '2015-12-23 16:23:01'),
(2869, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'عين شمس', NULL, NULL, '2015-12-23 16:23:02', '2015-12-23 16:23:02'),
(2870, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'م.الجديدة', NULL, NULL, '2015-12-23 16:23:02', '2015-12-23 16:23:02'),
(2871, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'ش الخيمة', NULL, NULL, '2015-12-23 16:23:02', '2015-12-23 16:23:02'),
(2872, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'ش القناطر', NULL, NULL, '2015-12-23 16:23:02', '2015-12-23 16:23:02'),
(2873, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'وسط البلد', NULL, NULL, '2015-12-23 16:23:02', '2015-12-23 16:23:02'),
(2874, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'المهندسين', NULL, NULL, '2015-12-23 16:23:02', '2015-12-23 16:23:02'),
(2875, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'الهرم', NULL, NULL, '2015-12-23 16:23:02', '2015-12-23 16:23:02'),
(2876, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'العريش', NULL, NULL, '2015-12-23 16:23:02', '2015-12-23 16:23:02'),
(2877, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'م.نصر', NULL, NULL, '2015-12-23 16:23:02', '2015-12-23 16:23:02'),
(2878, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'امبابة', NULL, NULL, '2015-12-23 16:23:02', '2015-12-23 16:23:02'),
(2879, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'المعادى', NULL, NULL, '2015-12-23 16:23:02', '2015-12-23 16:23:02'),
(2880, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'دار السلام', NULL, NULL, '2015-12-23 16:23:02', '2015-12-23 16:23:02'),
(2881, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'البراجيل', NULL, NULL, '2015-12-23 16:23:02', '2015-12-23 16:23:02'),
(2882, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'بورسعيد', NULL, NULL, '2015-12-23 16:23:02', '2015-12-23 16:23:02'),
(2883, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'الدخيلة', NULL, NULL, '2015-12-23 16:23:02', '2015-12-23 16:23:02'),
(2884, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'سموحة', NULL, NULL, '2015-12-23 16:23:03', '2015-12-23 16:23:03'),
(2885, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'السويس', NULL, NULL, '2015-12-23 16:23:03', '2015-12-23 16:23:03'),
(2886, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'العصافرة', NULL, NULL, '2015-12-23 16:23:03', '2015-12-23 16:23:03'),
(2887, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'كفر الدوار', NULL, NULL, '2015-12-23 16:23:03', '2015-12-23 16:23:03'),
(2888, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'المنيا', NULL, NULL, '2015-12-23 16:23:03', '2015-12-23 16:23:03'),
(2889, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'بنى مزار', NULL, NULL, '2015-12-23 16:23:03', '2015-12-23 16:23:03'),
(2890, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'اسيوط', NULL, NULL, '2015-12-23 16:23:03', '2015-12-23 16:23:03'),
(2891, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'سوهاج', NULL, NULL, '2015-12-23 16:23:03', '2015-12-23 16:23:03'),
(2892, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'القوصية', NULL, NULL, '2015-12-23 16:23:03', '2015-12-23 16:23:03'),
(2893, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'نجع حمادى', NULL, NULL, '2015-12-23 16:23:03', '2015-12-23 16:23:03'),
(2894, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'قنا', NULL, NULL, '2015-12-23 16:23:03', '2015-12-23 16:23:03'),
(2895, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'الاقصر', NULL, NULL, '2015-12-23 16:23:03', '2015-12-23 16:23:03'),
(2896, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'بنى سويف', NULL, NULL, '2015-12-23 16:23:03', '2015-12-23 16:23:03'),
(2897, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'جرجا', NULL, NULL, '2015-12-23 16:23:03', '2015-12-23 16:23:03'),
(2898, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'كفر الشيخ', NULL, NULL, '2015-12-23 16:23:03', '2015-12-23 16:23:03'),
(2899, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'الفلكى', NULL, NULL, '2015-12-23 16:23:03', '2015-12-23 16:23:03'),
(2900, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'اسماعلية', NULL, NULL, '2015-12-23 16:23:03', '2015-12-23 16:23:03'),
(2901, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'محرم بك', NULL, NULL, '2015-12-23 16:23:03', '2015-12-23 16:23:03'),
(2902, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'السواح', NULL, NULL, '2015-12-23 16:23:04', '2015-12-23 16:23:04'),
(2903, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'منصورة غ', NULL, NULL, '2015-12-23 16:23:04', '2015-12-23 16:23:04'),
(2904, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'الغردقة', NULL, NULL, '2015-12-23 16:23:04', '2015-12-23 16:23:04'),
(2905, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'منصورة ش', NULL, NULL, '2015-12-23 16:23:04', '2015-12-23 16:23:04'),
(2906, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'كفر الزيات', NULL, NULL, '2015-12-23 16:23:04', '2015-12-23 16:23:04'),
(2907, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'المحلة', NULL, NULL, '2015-12-23 16:23:04', '2015-12-23 16:23:04'),
(2908, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'المأمون', NULL, NULL, '2015-12-23 16:23:04', '2015-12-23 16:23:04'),
(2909, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'الاستاد', NULL, NULL, '2015-12-23 16:23:04', '2015-12-23 16:23:04'),
(2910, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'المنزلة', NULL, NULL, '2015-12-23 16:23:04', '2015-12-23 16:23:04'),
(2911, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'ميت غمر', NULL, NULL, '2015-12-23 16:23:04', '2015-12-23 16:23:04'),
(2912, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'شربين', NULL, NULL, '2015-12-23 16:23:04', '2015-12-23 16:23:04'),
(2913, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'دمياط', NULL, NULL, '2015-12-23 16:23:04', '2015-12-23 16:23:04'),
(2914, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'ابو كبير', NULL, NULL, '2015-12-23 16:23:04', '2015-12-23 16:23:04'),
(2915, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'بلبيس', NULL, NULL, '2015-12-23 16:23:04', '2015-12-23 16:23:04'),
(2916, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'القومية', '1', NULL, '2015-12-23 16:23:04', '2015-12-23 16:23:04'),
(2917, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'الزهور', NULL, NULL, '2015-12-23 16:23:04', '2015-12-23 16:23:04'),
(2918, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'ايتاى البارود', NULL, NULL, '2015-12-23 16:23:04', '2015-12-23 16:23:04'),
(2919, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'بنها', NULL, NULL, '2015-12-23 16:23:04', '2015-12-23 16:23:04'),
(2920, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'قويسنا', NULL, NULL, '2015-12-23 16:23:05', '2015-12-23 16:23:05'),
(2921, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'اشمون', NULL, NULL, '2015-12-23 16:23:05', '2015-12-23 16:23:05'),
(2922, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'اسوان', NULL, NULL, '2015-12-23 16:23:05', '2015-12-23 16:23:05'),
(2923, 'Dec-2015', 22585, '%فيستا واقى رفيع جدا  50', 'فيصل', NULL, NULL, '2015-12-23 16:23:05', '2015-12-23 16:23:05'),
(2924, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'حلوان', NULL, NULL, '2015-12-23 16:23:05', '2015-12-23 16:23:05'),
(2925, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'دسوق', NULL, NULL, '2015-12-23 16:23:05', '2015-12-23 16:23:05'),
(2926, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'شبين الكوم', NULL, NULL, '2015-12-23 16:23:05', '2015-12-23 16:23:05'),
(2927, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'الفيوم', NULL, NULL, '2015-12-23 16:23:05', '2015-12-23 16:23:05'),
(2928, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'سوهاج الجديد', NULL, NULL, '2015-12-23 16:23:05', '2015-12-23 16:23:05'),
(2929, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'دمنهور', NULL, NULL, '2015-12-23 16:23:05', '2015-12-23 16:23:05'),
(2930, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'طموه', NULL, NULL, '2015-12-23 16:23:05', '2015-12-23 16:23:05'),
(2931, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'شبرا مصر', NULL, NULL, '2015-12-23 16:23:06', '2015-12-23 16:23:06'),
(2932, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'الزاوية', NULL, NULL, '2015-12-23 16:23:06', '2015-12-23 16:23:06'),
(2933, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'المطرية', NULL, NULL, '2015-12-23 16:23:06', '2015-12-23 16:23:06'),
(2934, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'عين شمس', NULL, NULL, '2015-12-23 16:23:06', '2015-12-23 16:23:06'),
(2935, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'م.الجديدة', NULL, NULL, '2015-12-23 16:23:06', '2015-12-23 16:23:06'),
(2936, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'ش الخيمة', NULL, NULL, '2015-12-23 16:23:06', '2015-12-23 16:23:06'),
(2937, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'ش القناطر', NULL, NULL, '2015-12-23 16:23:06', '2015-12-23 16:23:06'),
(2938, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'وسط البلد', NULL, NULL, '2015-12-23 16:23:06', '2015-12-23 16:23:06'),
(2939, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'المهندسين', NULL, NULL, '2015-12-23 16:23:06', '2015-12-23 16:23:06'),
(2940, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'الهرم', NULL, NULL, '2015-12-23 16:23:06', '2015-12-23 16:23:06'),
(2941, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'العريش', NULL, NULL, '2015-12-23 16:23:06', '2015-12-23 16:23:06'),
(2942, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'م.نصر', NULL, NULL, '2015-12-23 16:23:06', '2015-12-23 16:23:06'),
(2943, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'امبابة', '5', NULL, '2015-12-23 16:23:06', '2015-12-23 16:23:06'),
(2944, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'المعادى', NULL, NULL, '2015-12-23 16:23:06', '2015-12-23 16:23:06'),
(2945, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'دار السلام', NULL, NULL, '2015-12-23 16:23:07', '2015-12-23 16:23:07'),
(2946, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'البراجيل', NULL, NULL, '2015-12-23 16:23:07', '2015-12-23 16:23:07'),
(2947, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'بورسعيد', NULL, NULL, '2015-12-23 16:23:07', '2015-12-23 16:23:07'),
(2948, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'الدخيلة', NULL, NULL, '2015-12-23 16:23:07', '2015-12-23 16:23:07'),
(2949, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'سموحة', NULL, NULL, '2015-12-23 16:23:07', '2015-12-23 16:23:07'),
(2950, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'السويس', NULL, NULL, '2015-12-23 16:23:07', '2015-12-23 16:23:07'),
(2951, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'العصافرة', NULL, NULL, '2015-12-23 16:23:07', '2015-12-23 16:23:07'),
(2952, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'كفر الدوار', NULL, NULL, '2015-12-23 16:23:07', '2015-12-23 16:23:07'),
(2953, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'المنيا', NULL, NULL, '2015-12-23 16:23:07', '2015-12-23 16:23:07'),
(2954, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'بنى مزار', NULL, NULL, '2015-12-23 16:23:07', '2015-12-23 16:23:07'),
(2955, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'اسيوط', NULL, NULL, '2015-12-23 16:23:07', '2015-12-23 16:23:07'),
(2956, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'سوهاج', NULL, NULL, '2015-12-23 16:23:07', '2015-12-23 16:23:07'),
(2957, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'القوصية', NULL, NULL, '2015-12-23 16:23:07', '2015-12-23 16:23:07'),
(2958, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'نجع حمادى', NULL, NULL, '2015-12-23 16:23:07', '2015-12-23 16:23:07'),
(2959, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'قنا', NULL, NULL, '2015-12-23 16:23:07', '2015-12-23 16:23:07'),
(2960, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'الاقصر', NULL, NULL, '2015-12-23 16:23:07', '2015-12-23 16:23:07'),
(2961, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'بنى سويف', NULL, NULL, '2015-12-23 16:23:08', '2015-12-23 16:23:08'),
(2962, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'جرجا', NULL, NULL, '2015-12-23 16:23:08', '2015-12-23 16:23:08'),
(2963, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'كفر الشيخ', NULL, NULL, '2015-12-23 16:23:08', '2015-12-23 16:23:08'),
(2964, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'الفلكى', NULL, NULL, '2015-12-23 16:23:08', '2015-12-23 16:23:08'),
(2965, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'اسماعلية', NULL, NULL, '2015-12-23 16:23:08', '2015-12-23 16:23:08'),
(2966, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'محرم بك', NULL, NULL, '2015-12-23 16:23:08', '2015-12-23 16:23:08'),
(2967, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'السواح', NULL, NULL, '2015-12-23 16:23:08', '2015-12-23 16:23:08'),
(2968, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'منصورة غ', NULL, NULL, '2015-12-23 16:23:08', '2015-12-23 16:23:08'),
(2969, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'الغردقة', NULL, NULL, '2015-12-23 16:23:08', '2015-12-23 16:23:08'),
(2970, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'منصورة ش', NULL, NULL, '2015-12-23 16:23:08', '2015-12-23 16:23:08'),
(2971, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'كفر الزيات', NULL, NULL, '2015-12-23 16:23:08', '2015-12-23 16:23:08'),
(2972, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'المحلة', NULL, NULL, '2015-12-23 16:23:08', '2015-12-23 16:23:08'),
(2973, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'المأمون', NULL, NULL, '2015-12-23 16:23:08', '2015-12-23 16:23:08'),
(2974, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'الاستاد', NULL, NULL, '2015-12-23 16:23:08', '2015-12-23 16:23:08'),
(2975, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'المنزلة', NULL, NULL, '2015-12-23 16:23:08', '2015-12-23 16:23:08'),
(2976, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'ميت غمر', NULL, NULL, '2015-12-23 16:23:08', '2015-12-23 16:23:08'),
(2977, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'شربين', NULL, NULL, '2015-12-23 16:23:08', '2015-12-23 16:23:08'),
(2978, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'دمياط', NULL, NULL, '2015-12-23 16:23:08', '2015-12-23 16:23:08'),
(2979, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'ابو كبير', NULL, NULL, '2015-12-23 16:23:09', '2015-12-23 16:23:09'),
(2980, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'بلبيس', NULL, NULL, '2015-12-23 16:23:09', '2015-12-23 16:23:09'),
(2981, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'القومية', NULL, NULL, '2015-12-23 16:23:09', '2015-12-23 16:23:09'),
(2982, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'الزهور', NULL, NULL, '2015-12-23 16:23:09', '2015-12-23 16:23:09'),
(2983, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'ايتاى البارود', NULL, NULL, '2015-12-23 16:23:09', '2015-12-23 16:23:09'),
(2984, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'بنها', NULL, NULL, '2015-12-23 16:23:09', '2015-12-23 16:23:09'),
(2985, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'قويسنا', NULL, NULL, '2015-12-23 16:23:09', '2015-12-23 16:23:09'),
(2986, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'اشمون', NULL, NULL, '2015-12-23 16:23:09', '2015-12-23 16:23:09'),
(2987, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'اسوان', NULL, NULL, '2015-12-23 16:23:09', '2015-12-23 16:23:09'),
(2988, 'Dec-2015', 22586, '%فيستا واقى محبب  50', 'فيصل', NULL, NULL, '2015-12-23 16:23:09', '2015-12-23 16:23:09'),
(2989, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'حلوان', '95', NULL, '2015-12-23 16:23:09', '2015-12-23 16:23:09'),
(2990, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'دسوق', '2', NULL, '2015-12-23 16:23:09', '2015-12-23 16:23:09'),
(2991, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'شبين الكوم', '69', NULL, '2015-12-23 16:23:09', '2015-12-23 16:23:09'),
(2992, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'الفيوم', '182', NULL, '2015-12-23 16:23:09', '2015-12-23 16:23:09'),
(2993, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'سوهاج الجديد', '17', NULL, '2015-12-23 16:23:09', '2015-12-23 16:23:09'),
(2994, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'دمنهور', '118', NULL, '2015-12-23 16:23:10', '2015-12-23 16:23:10'),
(2995, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'طموه', '19', NULL, '2015-12-23 16:23:10', '2015-12-23 16:23:10'),
(2996, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'شبرا مصر', '8', NULL, '2015-12-23 16:23:10', '2015-12-23 16:23:10'),
(2997, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'الزاوية', NULL, NULL, '2015-12-23 16:23:10', '2015-12-23 16:23:10'),
(2998, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'المطرية', '51', NULL, '2015-12-23 16:23:10', '2015-12-23 16:23:10'),
(2999, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'عين شمس', '2', NULL, '2015-12-23 16:23:10', '2015-12-23 16:23:10'),
(3000, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'م.الجديدة', NULL, NULL, '2015-12-23 16:23:10', '2015-12-23 16:23:10'),
(3001, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'ش الخيمة', '23', NULL, '2015-12-23 16:23:10', '2015-12-23 16:23:10'),
(3002, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'ش القناطر', '28', NULL, '2015-12-23 16:23:10', '2015-12-23 16:23:10'),
(3003, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'وسط البلد', NULL, NULL, '2015-12-23 16:23:10', '2015-12-23 16:23:10'),
(3004, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'المهندسين', '1', NULL, '2015-12-23 16:23:10', '2015-12-23 16:23:10'),
(3005, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'الهرم', '16', NULL, '2015-12-23 16:23:10', '2015-12-23 16:23:10'),
(3006, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'العريش', NULL, NULL, '2015-12-23 16:23:10', '2015-12-23 16:23:10'),
(3007, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'م.نصر', NULL, NULL, '2015-12-23 16:23:10', '2015-12-23 16:23:10'),
(3008, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'امبابة', '7', NULL, '2015-12-23 16:23:10', '2015-12-23 16:23:10'),
(3009, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'المعادى', '3', NULL, '2015-12-23 16:23:10', '2015-12-23 16:23:10'),
(3010, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'دار السلام', '11', NULL, '2015-12-23 16:23:11', '2015-12-23 16:23:11'),
(3011, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'البراجيل', '38', NULL, '2015-12-23 16:23:11', '2015-12-23 16:23:11'),
(3012, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'بورسعيد', '2', NULL, '2015-12-23 16:23:11', '2015-12-23 16:23:11'),
(3013, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'الدخيلة', '91', NULL, '2015-12-23 16:23:11', '2015-12-23 16:23:11'),
(3014, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'سموحة', '25', NULL, '2015-12-23 16:23:11', '2015-12-23 16:23:11'),
(3015, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'السويس', '5', NULL, '2015-12-23 16:23:11', '2015-12-23 16:23:11'),
(3016, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'العصافرة', '13', NULL, '2015-12-23 16:23:11', '2015-12-23 16:23:11'),
(3017, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'كفر الدوار', '414', NULL, '2015-12-23 16:23:11', '2015-12-23 16:23:11'),
(3018, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'المنيا', '5', NULL, '2015-12-23 16:23:11', '2015-12-23 16:23:11'),
(3019, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'بنى مزار', '19', NULL, '2015-12-23 16:23:11', '2015-12-23 16:23:11'),
(3020, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'اسيوط', '164', NULL, '2015-12-23 16:23:11', '2015-12-23 16:23:11'),
(3021, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'سوهاج', '94', NULL, '2015-12-23 16:23:11', '2015-12-23 16:23:11'),
(3022, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'القوصية', '164', NULL, '2015-12-23 16:23:11', '2015-12-23 16:23:11'),
(3023, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'نجع حمادى', '26', NULL, '2015-12-23 16:23:11', '2015-12-23 16:23:11'),
(3024, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'قنا', NULL, NULL, '2015-12-23 16:23:11', '2015-12-23 16:23:11'),
(3025, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'الاقصر', '5', NULL, '2015-12-23 16:23:11', '2015-12-23 16:23:11'),
(3026, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'بنى سويف', '105', NULL, '2015-12-23 16:23:11', '2015-12-23 16:23:11'),
(3027, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'جرجا', '3', NULL, '2015-12-23 16:23:11', '2015-12-23 16:23:11'),
(3028, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'كفر الشيخ', '119', NULL, '2015-12-23 16:23:12', '2015-12-23 16:23:12'),
(3029, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'الفلكى', '147', NULL, '2015-12-23 16:23:12', '2015-12-23 16:23:12');
INSERT INTO `ucp` (`id`, `month`, `code`, `product_name`, `area`, `quantity`, `mrs_percents`, `created_at`, `updated_at`) VALUES
(3030, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'اسماعلية', '62', NULL, '2015-12-23 16:23:12', '2015-12-23 16:23:12'),
(3031, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'محرم بك', '55', NULL, '2015-12-23 16:23:12', '2015-12-23 16:23:12'),
(3032, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'السواح', '2', NULL, '2015-12-23 16:23:12', '2015-12-23 16:23:12'),
(3033, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'منصورة غ', '5', NULL, '2015-12-23 16:23:12', '2015-12-23 16:23:12'),
(3034, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'الغردقة', '6', NULL, '2015-12-23 16:23:12', '2015-12-23 16:23:12'),
(3035, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'منصورة ش', '5', NULL, '2015-12-23 16:23:12', '2015-12-23 16:23:12'),
(3036, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'كفر الزيات', '59', NULL, '2015-12-23 16:23:12', '2015-12-23 16:23:12'),
(3037, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'المحلة', '6', NULL, '2015-12-23 16:23:12', '2015-12-23 16:23:12'),
(3038, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'المأمون', '55', NULL, '2015-12-23 16:23:12', '2015-12-23 16:23:12'),
(3039, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'الاستاد', '87', NULL, '2015-12-23 16:23:12', '2015-12-23 16:23:12'),
(3040, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'المنزلة', '117', NULL, '2015-12-23 16:23:12', '2015-12-23 16:23:12'),
(3041, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'ميت غمر', '15', NULL, '2015-12-23 16:23:12', '2015-12-23 16:23:12'),
(3042, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'شربين', '14', NULL, '2015-12-23 16:23:12', '2015-12-23 16:23:12'),
(3043, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'دمياط', NULL, NULL, '2015-12-23 16:23:12', '2015-12-23 16:23:12'),
(3044, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'ابو كبير', '106', NULL, '2015-12-23 16:23:12', '2015-12-23 16:23:12'),
(3045, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'بلبيس', '77', NULL, '2015-12-23 16:23:12', '2015-12-23 16:23:12'),
(3046, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'القومية', '21', NULL, '2015-12-23 16:23:13', '2015-12-23 16:23:13'),
(3047, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'الزهور', '56', NULL, '2015-12-23 16:23:13', '2015-12-23 16:23:13'),
(3048, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'ايتاى البارود', '167', NULL, '2015-12-23 16:23:13', '2015-12-23 16:23:13'),
(3049, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'بنها', '82', NULL, '2015-12-23 16:23:13', '2015-12-23 16:23:13'),
(3050, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'قويسنا', '6', NULL, '2015-12-23 16:23:13', '2015-12-23 16:23:13'),
(3051, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'اشمون', '35', NULL, '2015-12-23 16:23:13', '2015-12-23 16:23:13'),
(3052, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'اسوان', '3', NULL, '2015-12-23 16:23:13', '2015-12-23 16:23:13'),
(3053, 'Dec-2015', 22921, '%فوليبونين 30 كبسولة 20', 'فيصل', '17', NULL, '2015-12-23 16:23:13', '2015-12-23 16:23:13'),
(3054, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'حلوان', NULL, NULL, '2015-12-23 16:23:13', '2015-12-23 16:23:13'),
(3055, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'دسوق', NULL, NULL, '2015-12-23 16:23:13', '2015-12-23 16:23:13'),
(3056, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'شبين الكوم', NULL, NULL, '2015-12-23 16:23:13', '2015-12-23 16:23:13'),
(3057, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'الفيوم', NULL, NULL, '2015-12-23 16:23:13', '2015-12-23 16:23:13'),
(3058, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'سوهاج الجديد', NULL, NULL, '2015-12-23 16:23:13', '2015-12-23 16:23:13'),
(3059, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'دمنهور', NULL, NULL, '2015-12-23 16:23:13', '2015-12-23 16:23:13'),
(3060, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'طموه', NULL, NULL, '2015-12-23 16:23:13', '2015-12-23 16:23:13'),
(3061, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'شبرا مصر', NULL, NULL, '2015-12-23 16:23:13', '2015-12-23 16:23:13'),
(3062, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'الزاوية', NULL, NULL, '2015-12-23 16:23:13', '2015-12-23 16:23:13'),
(3063, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'المطرية', NULL, NULL, '2015-12-23 16:23:14', '2015-12-23 16:23:14'),
(3064, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'عين شمس', NULL, NULL, '2015-12-23 16:23:14', '2015-12-23 16:23:14'),
(3065, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'م.الجديدة', NULL, NULL, '2015-12-23 16:23:14', '2015-12-23 16:23:14'),
(3066, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'ش الخيمة', NULL, NULL, '2015-12-23 16:23:14', '2015-12-23 16:23:14'),
(3067, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'ش القناطر', NULL, NULL, '2015-12-23 16:23:14', '2015-12-23 16:23:14'),
(3068, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'وسط البلد', NULL, NULL, '2015-12-23 16:23:14', '2015-12-23 16:23:14'),
(3069, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'المهندسين', NULL, NULL, '2015-12-23 16:23:14', '2015-12-23 16:23:14'),
(3070, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'الهرم', NULL, NULL, '2015-12-23 16:23:14', '2015-12-23 16:23:14'),
(3071, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'العريش', NULL, NULL, '2015-12-23 16:23:14', '2015-12-23 16:23:14'),
(3072, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'م.نصر', NULL, NULL, '2015-12-23 16:23:14', '2015-12-23 16:23:14'),
(3073, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'امبابة', NULL, NULL, '2015-12-23 16:23:14', '2015-12-23 16:23:14'),
(3074, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'المعادى', NULL, NULL, '2015-12-23 16:23:14', '2015-12-23 16:23:14'),
(3075, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'دار السلام', NULL, NULL, '2015-12-23 16:23:14', '2015-12-23 16:23:14'),
(3076, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'البراجيل', NULL, NULL, '2015-12-23 16:23:14', '2015-12-23 16:23:14'),
(3077, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'بورسعيد', NULL, NULL, '2015-12-23 16:23:14', '2015-12-23 16:23:14'),
(3078, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'الدخيلة', NULL, NULL, '2015-12-23 16:23:14', '2015-12-23 16:23:14'),
(3079, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'سموحة', '1', NULL, '2015-12-23 16:23:14', '2015-12-23 16:23:14'),
(3080, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'السويس', NULL, NULL, '2015-12-23 16:23:14', '2015-12-23 16:23:14'),
(3081, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'العصافرة', NULL, NULL, '2015-12-23 16:23:15', '2015-12-23 16:23:15'),
(3082, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'كفر الدوار', NULL, NULL, '2015-12-23 16:23:15', '2015-12-23 16:23:15'),
(3083, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'المنيا', NULL, NULL, '2015-12-23 16:23:15', '2015-12-23 16:23:15'),
(3084, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'بنى مزار', NULL, NULL, '2015-12-23 16:23:15', '2015-12-23 16:23:15'),
(3085, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'اسيوط', NULL, NULL, '2015-12-23 16:23:15', '2015-12-23 16:23:15'),
(3086, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'سوهاج', NULL, NULL, '2015-12-23 16:23:15', '2015-12-23 16:23:15'),
(3087, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'القوصية', NULL, NULL, '2015-12-23 16:23:15', '2015-12-23 16:23:15'),
(3088, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'نجع حمادى', NULL, NULL, '2015-12-23 16:23:15', '2015-12-23 16:23:15'),
(3089, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'قنا', NULL, NULL, '2015-12-23 16:23:15', '2015-12-23 16:23:15'),
(3090, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'الاقصر', NULL, NULL, '2015-12-23 16:23:15', '2015-12-23 16:23:15'),
(3091, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'بنى سويف', NULL, NULL, '2015-12-23 16:23:15', '2015-12-23 16:23:15'),
(3092, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'جرجا', NULL, NULL, '2015-12-23 16:23:15', '2015-12-23 16:23:15'),
(3093, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'كفر الشيخ', NULL, NULL, '2015-12-23 16:23:15', '2015-12-23 16:23:15'),
(3094, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'الفلكى', NULL, NULL, '2015-12-23 16:23:15', '2015-12-23 16:23:15'),
(3095, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'اسماعلية', NULL, NULL, '2015-12-23 16:23:15', '2015-12-23 16:23:15'),
(3096, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'محرم بك', NULL, NULL, '2015-12-23 16:23:15', '2015-12-23 16:23:15'),
(3097, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'السواح', NULL, NULL, '2015-12-23 16:23:16', '2015-12-23 16:23:16'),
(3098, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'منصورة غ', NULL, NULL, '2015-12-23 16:23:16', '2015-12-23 16:23:16'),
(3099, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'الغردقة', NULL, NULL, '2015-12-23 16:23:16', '2015-12-23 16:23:16'),
(3100, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'منصورة ش', NULL, NULL, '2015-12-23 16:23:16', '2015-12-23 16:23:16'),
(3101, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'كفر الزيات', NULL, NULL, '2015-12-23 16:23:16', '2015-12-23 16:23:16'),
(3102, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'المحلة', NULL, NULL, '2015-12-23 16:23:16', '2015-12-23 16:23:16'),
(3103, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'المأمون', NULL, NULL, '2015-12-23 16:23:16', '2015-12-23 16:23:16'),
(3104, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'الاستاد', NULL, NULL, '2015-12-23 16:23:16', '2015-12-23 16:23:16'),
(3105, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'المنزلة', NULL, NULL, '2015-12-23 16:23:16', '2015-12-23 16:23:16'),
(3106, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'ميت غمر', NULL, NULL, '2015-12-23 16:23:16', '2015-12-23 16:23:16'),
(3107, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'شربين', NULL, NULL, '2015-12-23 16:23:16', '2015-12-23 16:23:16'),
(3108, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'دمياط', NULL, NULL, '2015-12-23 16:23:16', '2015-12-23 16:23:16'),
(3109, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'ابو كبير', NULL, NULL, '2015-12-23 16:23:16', '2015-12-23 16:23:16'),
(3110, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'بلبيس', NULL, NULL, '2015-12-23 16:23:16', '2015-12-23 16:23:16'),
(3111, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'القومية', NULL, NULL, '2015-12-23 16:23:16', '2015-12-23 16:23:16'),
(3112, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'الزهور', NULL, NULL, '2015-12-23 16:23:17', '2015-12-23 16:23:17'),
(3113, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'ايتاى البارود', NULL, NULL, '2015-12-23 16:23:17', '2015-12-23 16:23:17'),
(3114, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'بنها', NULL, NULL, '2015-12-23 16:23:17', '2015-12-23 16:23:17'),
(3115, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'قويسنا', NULL, NULL, '2015-12-23 16:23:17', '2015-12-23 16:23:17'),
(3116, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'اشمون', NULL, NULL, '2015-12-23 16:23:17', '2015-12-23 16:23:17'),
(3117, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'اسوان', NULL, NULL, '2015-12-23 16:23:17', '2015-12-23 16:23:17'),
(3118, 'Dec-2015', 22962, 'فيستا   جيل  عادى', 'فيصل', NULL, NULL, '2015-12-23 16:23:17', '2015-12-23 16:23:17'),
(3119, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'حلوان', '3', NULL, '2015-12-23 16:23:17', '2015-12-23 16:23:17'),
(3120, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'دسوق', NULL, NULL, '2015-12-23 16:23:17', '2015-12-23 16:23:17'),
(3121, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'شبين الكوم', NULL, NULL, '2015-12-23 16:23:17', '2015-12-23 16:23:17'),
(3122, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'الفيوم', NULL, NULL, '2015-12-23 16:23:17', '2015-12-23 16:23:17'),
(3123, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'سوهاج الجديد', NULL, NULL, '2015-12-23 16:23:17', '2015-12-23 16:23:17'),
(3124, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'دمنهور', '8', NULL, '2015-12-23 16:23:17', '2015-12-23 16:23:17'),
(3125, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'طموه', '3', NULL, '2015-12-23 16:23:17', '2015-12-23 16:23:17'),
(3126, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'شبرا مصر', '1', NULL, '2015-12-23 16:23:17', '2015-12-23 16:23:17'),
(3127, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'الزاوية', NULL, NULL, '2015-12-23 16:23:17', '2015-12-23 16:23:17'),
(3128, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'المطرية', '1', NULL, '2015-12-23 16:23:17', '2015-12-23 16:23:17'),
(3129, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'عين شمس', NULL, NULL, '2015-12-23 16:23:18', '2015-12-23 16:23:18'),
(3130, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'م.الجديدة', '2', NULL, '2015-12-23 16:23:18', '2015-12-23 16:23:18'),
(3131, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'ش الخيمة', '1', NULL, '2015-12-23 16:23:18', '2015-12-23 16:23:18'),
(3132, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'ش القناطر', NULL, NULL, '2015-12-23 16:23:18', '2015-12-23 16:23:18'),
(3133, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'وسط البلد', NULL, NULL, '2015-12-23 16:23:18', '2015-12-23 16:23:18'),
(3134, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'المهندسين', NULL, NULL, '2015-12-23 16:23:18', '2015-12-23 16:23:18'),
(3135, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'الهرم', '-1', NULL, '2015-12-23 16:23:18', '2015-12-23 16:23:18'),
(3136, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'العريش', NULL, NULL, '2015-12-23 16:23:18', '2015-12-23 16:23:18'),
(3137, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'م.نصر', NULL, NULL, '2015-12-23 16:23:18', '2015-12-23 16:23:18'),
(3138, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'امبابة', NULL, NULL, '2015-12-23 16:23:18', '2015-12-23 16:23:18'),
(3139, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'المعادى', NULL, NULL, '2015-12-23 16:23:18', '2015-12-23 16:23:18'),
(3140, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'دار السلام', NULL, NULL, '2015-12-23 16:23:18', '2015-12-23 16:23:18'),
(3141, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'البراجيل', NULL, NULL, '2015-12-23 16:23:18', '2015-12-23 16:23:18'),
(3142, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'بورسعيد', NULL, NULL, '2015-12-23 16:23:18', '2015-12-23 16:23:18'),
(3143, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'الدخيلة', NULL, NULL, '2015-12-23 16:23:19', '2015-12-23 16:23:19'),
(3144, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'سموحة', NULL, NULL, '2015-12-23 16:23:19', '2015-12-23 16:23:19'),
(3145, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'السويس', '1', NULL, '2015-12-23 16:23:19', '2015-12-23 16:23:19'),
(3146, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'العصافرة', NULL, NULL, '2015-12-23 16:23:19', '2015-12-23 16:23:19'),
(3147, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'كفر الدوار', NULL, NULL, '2015-12-23 16:23:19', '2015-12-23 16:23:19'),
(3148, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'المنيا', NULL, NULL, '2015-12-23 16:23:19', '2015-12-23 16:23:19'),
(3149, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'بنى مزار', NULL, NULL, '2015-12-23 16:23:19', '2015-12-23 16:23:19'),
(3150, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'اسيوط', NULL, NULL, '2015-12-23 16:23:19', '2015-12-23 16:23:19'),
(3151, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'سوهاج', '10', NULL, '2015-12-23 16:23:19', '2015-12-23 16:23:19'),
(3152, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'القوصية', NULL, NULL, '2015-12-23 16:23:19', '2015-12-23 16:23:19'),
(3153, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'نجع حمادى', NULL, NULL, '2015-12-23 16:23:19', '2015-12-23 16:23:19'),
(3154, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'قنا', NULL, NULL, '2015-12-23 16:23:19', '2015-12-23 16:23:19'),
(3155, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'الاقصر', '10', NULL, '2015-12-23 16:23:19', '2015-12-23 16:23:19'),
(3156, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'بنى سويف', NULL, NULL, '2015-12-23 16:23:19', '2015-12-23 16:23:19'),
(3157, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'جرجا', '1', NULL, '2015-12-23 16:23:19', '2015-12-23 16:23:19'),
(3158, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'كفر الشيخ', NULL, NULL, '2015-12-23 16:23:20', '2015-12-23 16:23:20'),
(3159, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'الفلكى', NULL, NULL, '2015-12-23 16:23:20', '2015-12-23 16:23:20'),
(3160, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'اسماعلية', NULL, NULL, '2015-12-23 16:23:20', '2015-12-23 16:23:20'),
(3161, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'محرم بك', NULL, NULL, '2015-12-23 16:23:20', '2015-12-23 16:23:20'),
(3162, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'السواح', NULL, NULL, '2015-12-23 16:23:20', '2015-12-23 16:23:20'),
(3163, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'منصورة غ', NULL, NULL, '2015-12-23 16:23:20', '2015-12-23 16:23:20'),
(3164, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'الغردقة', NULL, NULL, '2015-12-23 16:23:20', '2015-12-23 16:23:20'),
(3165, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'منصورة ش', '20', NULL, '2015-12-23 16:23:20', '2015-12-23 16:23:20'),
(3166, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'كفر الزيات', NULL, NULL, '2015-12-23 16:23:20', '2015-12-23 16:23:20'),
(3167, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'المحلة', NULL, NULL, '2015-12-23 16:23:20', '2015-12-23 16:23:20'),
(3168, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'المأمون', '3', NULL, '2015-12-23 16:23:20', '2015-12-23 16:23:20'),
(3169, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'الاستاد', NULL, NULL, '2015-12-23 16:23:20', '2015-12-23 16:23:20'),
(3170, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'المنزلة', NULL, NULL, '2015-12-23 16:23:20', '2015-12-23 16:23:20'),
(3171, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'ميت غمر', '2', NULL, '2015-12-23 16:23:20', '2015-12-23 16:23:20'),
(3172, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'شربين', NULL, NULL, '2015-12-23 16:23:20', '2015-12-23 16:23:20'),
(3173, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'دمياط', '2', NULL, '2015-12-23 16:23:20', '2015-12-23 16:23:20'),
(3174, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'ابو كبير', NULL, NULL, '2015-12-23 16:23:20', '2015-12-23 16:23:20'),
(3175, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'بلبيس', NULL, NULL, '2015-12-23 16:23:20', '2015-12-23 16:23:20'),
(3176, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'القومية', NULL, NULL, '2015-12-23 16:23:21', '2015-12-23 16:23:21'),
(3177, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'الزهور', NULL, NULL, '2015-12-23 16:23:21', '2015-12-23 16:23:21'),
(3178, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'ايتاى البارود', '12', NULL, '2015-12-23 16:23:21', '2015-12-23 16:23:21'),
(3179, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'بنها', '35', NULL, '2015-12-23 16:23:21', '2015-12-23 16:23:21'),
(3180, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'قويسنا', NULL, NULL, '2015-12-23 16:23:21', '2015-12-23 16:23:21'),
(3181, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'اشمون', NULL, NULL, '2015-12-23 16:23:21', '2015-12-23 16:23:21'),
(3182, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'اسوان', '5', NULL, '2015-12-23 16:23:21', '2015-12-23 16:23:21'),
(3183, 'Dec-2015', 24564, '%بلانى اختبار تبويض 26', 'فيصل', '12', NULL, '2015-12-23 16:23:21', '2015-12-23 16:23:21'),
(3184, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'حلوان', NULL, NULL, '2015-12-23 16:23:21', '2015-12-23 16:23:21'),
(3185, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'دسوق', NULL, NULL, '2015-12-23 16:23:21', '2015-12-23 16:23:21'),
(3186, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'شبين الكوم', NULL, NULL, '2015-12-23 16:23:21', '2015-12-23 16:23:21'),
(3187, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'الفيوم', NULL, NULL, '2015-12-23 16:23:21', '2015-12-23 16:23:21'),
(3188, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'سوهاج الجديد', NULL, NULL, '2015-12-23 16:23:21', '2015-12-23 16:23:21'),
(3189, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'دمنهور', NULL, NULL, '2015-12-23 16:23:21', '2015-12-23 16:23:21'),
(3190, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'طموه', NULL, NULL, '2015-12-23 16:23:21', '2015-12-23 16:23:21'),
(3191, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'شبرا مصر', NULL, NULL, '2015-12-23 16:23:21', '2015-12-23 16:23:21'),
(3192, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'الزاوية', NULL, NULL, '2015-12-23 16:23:21', '2015-12-23 16:23:21'),
(3193, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'المطرية', NULL, NULL, '2015-12-23 16:23:22', '2015-12-23 16:23:22'),
(3194, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'عين شمس', NULL, NULL, '2015-12-23 16:23:22', '2015-12-23 16:23:22'),
(3195, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'م.الجديدة', NULL, NULL, '2015-12-23 16:23:22', '2015-12-23 16:23:22'),
(3196, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'ش الخيمة', NULL, NULL, '2015-12-23 16:23:22', '2015-12-23 16:23:22'),
(3197, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'ش القناطر', NULL, NULL, '2015-12-23 16:23:22', '2015-12-23 16:23:22'),
(3198, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'وسط البلد', NULL, NULL, '2015-12-23 16:23:22', '2015-12-23 16:23:22'),
(3199, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'المهندسين', NULL, NULL, '2015-12-23 16:23:22', '2015-12-23 16:23:22'),
(3200, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'الهرم', NULL, NULL, '2015-12-23 16:23:22', '2015-12-23 16:23:22'),
(3201, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'العريش', NULL, NULL, '2015-12-23 16:23:22', '2015-12-23 16:23:22'),
(3202, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'م.نصر', NULL, NULL, '2015-12-23 16:23:22', '2015-12-23 16:23:22'),
(3203, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'امبابة', NULL, NULL, '2015-12-23 16:23:22', '2015-12-23 16:23:22'),
(3204, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'المعادى', NULL, NULL, '2015-12-23 16:23:22', '2015-12-23 16:23:22'),
(3205, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'دار السلام', NULL, NULL, '2015-12-23 16:23:22', '2015-12-23 16:23:22'),
(3206, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'البراجيل', NULL, NULL, '2015-12-23 16:23:22', '2015-12-23 16:23:22'),
(3207, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'بورسعيد', NULL, NULL, '2015-12-23 16:23:23', '2015-12-23 16:23:23'),
(3208, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'الدخيلة', NULL, NULL, '2015-12-23 16:23:23', '2015-12-23 16:23:23'),
(3209, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'سموحة', NULL, NULL, '2015-12-23 16:23:23', '2015-12-23 16:23:23'),
(3210, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'السويس', NULL, NULL, '2015-12-23 16:23:23', '2015-12-23 16:23:23'),
(3211, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'العصافرة', NULL, NULL, '2015-12-23 16:23:23', '2015-12-23 16:23:23'),
(3212, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'كفر الدوار', NULL, NULL, '2015-12-23 16:23:23', '2015-12-23 16:23:23'),
(3213, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'المنيا', NULL, NULL, '2015-12-23 16:23:23', '2015-12-23 16:23:23'),
(3214, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'بنى مزار', NULL, NULL, '2015-12-23 16:23:23', '2015-12-23 16:23:23'),
(3215, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'اسيوط', NULL, NULL, '2015-12-23 16:23:23', '2015-12-23 16:23:23'),
(3216, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'سوهاج', NULL, NULL, '2015-12-23 16:23:23', '2015-12-23 16:23:23'),
(3217, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'القوصية', NULL, NULL, '2015-12-23 16:23:23', '2015-12-23 16:23:23'),
(3218, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'نجع حمادى', NULL, NULL, '2015-12-23 16:23:23', '2015-12-23 16:23:23'),
(3219, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'قنا', NULL, NULL, '2015-12-23 16:23:23', '2015-12-23 16:23:23'),
(3220, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'الاقصر', NULL, NULL, '2015-12-23 16:23:23', '2015-12-23 16:23:23'),
(3221, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'بنى سويف', NULL, NULL, '2015-12-23 16:23:23', '2015-12-23 16:23:23'),
(3222, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'جرجا', NULL, NULL, '2015-12-23 16:23:23', '2015-12-23 16:23:23'),
(3223, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'كفر الشيخ', NULL, NULL, '2015-12-23 16:23:23', '2015-12-23 16:23:23'),
(3224, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'الفلكى', NULL, NULL, '2015-12-23 16:23:24', '2015-12-23 16:23:24'),
(3225, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'اسماعلية', NULL, NULL, '2015-12-23 16:23:24', '2015-12-23 16:23:24'),
(3226, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'محرم بك', NULL, NULL, '2015-12-23 16:23:24', '2015-12-23 16:23:24'),
(3227, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'السواح', NULL, NULL, '2015-12-23 16:23:24', '2015-12-23 16:23:24'),
(3228, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'منصورة غ', NULL, NULL, '2015-12-23 16:23:24', '2015-12-23 16:23:24'),
(3229, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'الغردقة', '-2', NULL, '2015-12-23 16:23:24', '2015-12-23 16:23:24'),
(3230, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'منصورة ش', NULL, NULL, '2015-12-23 16:23:24', '2015-12-23 16:23:24'),
(3231, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'كفر الزيات', NULL, NULL, '2015-12-23 16:23:24', '2015-12-23 16:23:24'),
(3232, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'المحلة', NULL, NULL, '2015-12-23 16:23:24', '2015-12-23 16:23:24'),
(3233, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'المأمون', NULL, NULL, '2015-12-23 16:23:24', '2015-12-23 16:23:24'),
(3234, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'الاستاد', NULL, NULL, '2015-12-23 16:23:24', '2015-12-23 16:23:24'),
(3235, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'المنزلة', NULL, NULL, '2015-12-23 16:23:24', '2015-12-23 16:23:24'),
(3236, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'ميت غمر', NULL, NULL, '2015-12-23 16:23:24', '2015-12-23 16:23:24'),
(3237, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'شربين', NULL, NULL, '2015-12-23 16:23:24', '2015-12-23 16:23:24'),
(3238, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'دمياط', NULL, NULL, '2015-12-23 16:23:24', '2015-12-23 16:23:24'),
(3239, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'ابو كبير', NULL, NULL, '2015-12-23 16:23:24', '2015-12-23 16:23:24'),
(3240, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'بلبيس', NULL, NULL, '2015-12-23 16:23:24', '2015-12-23 16:23:24'),
(3241, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'القومية', NULL, NULL, '2015-12-23 16:23:24', '2015-12-23 16:23:24'),
(3242, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'الزهور', NULL, NULL, '2015-12-23 16:23:25', '2015-12-23 16:23:25'),
(3243, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'ايتاى البارود', NULL, NULL, '2015-12-23 16:23:25', '2015-12-23 16:23:25'),
(3244, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'بنها', NULL, NULL, '2015-12-23 16:23:25', '2015-12-23 16:23:25'),
(3245, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'قويسنا', NULL, NULL, '2015-12-23 16:23:25', '2015-12-23 16:23:25'),
(3246, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'اشمون', NULL, NULL, '2015-12-23 16:23:25', '2015-12-23 16:23:25'),
(3247, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'اسوان', NULL, NULL, '2015-12-23 16:23:25', '2015-12-23 16:23:25'),
(3248, 'Dec-2015', 29014, 'فيستا جيل فراولة بونـص', 'فيصل', NULL, NULL, '2015-12-23 16:23:25', '2015-12-23 16:23:25'),
(3249, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'حلوان', NULL, NULL, '2015-12-23 16:23:25', '2015-12-23 16:23:25'),
(3250, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'دسوق', NULL, NULL, '2015-12-23 16:23:25', '2015-12-23 16:23:25'),
(3251, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'شبين الكوم', NULL, NULL, '2015-12-23 16:23:25', '2015-12-23 16:23:25'),
(3252, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'الفيوم', NULL, NULL, '2015-12-23 16:23:25', '2015-12-23 16:23:25'),
(3253, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'سوهاج الجديد', NULL, NULL, '2015-12-23 16:23:25', '2015-12-23 16:23:25'),
(3254, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'دمنهور', NULL, NULL, '2015-12-23 16:23:25', '2015-12-23 16:23:25'),
(3255, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'طموه', NULL, NULL, '2015-12-23 16:23:25', '2015-12-23 16:23:25'),
(3256, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'شبرا مصر', NULL, NULL, '2015-12-23 16:23:25', '2015-12-23 16:23:25'),
(3257, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'الزاوية', NULL, NULL, '2015-12-23 16:23:25', '2015-12-23 16:23:25'),
(3258, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'المطرية', NULL, NULL, '2015-12-23 16:23:26', '2015-12-23 16:23:26'),
(3259, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'عين شمس', NULL, NULL, '2015-12-23 16:23:26', '2015-12-23 16:23:26'),
(3260, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'م.الجديدة', NULL, NULL, '2015-12-23 16:23:26', '2015-12-23 16:23:26'),
(3261, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'ش الخيمة', NULL, NULL, '2015-12-23 16:23:26', '2015-12-23 16:23:26'),
(3262, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'ش القناطر', NULL, NULL, '2015-12-23 16:23:26', '2015-12-23 16:23:26'),
(3263, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'وسط البلد', NULL, NULL, '2015-12-23 16:23:26', '2015-12-23 16:23:26'),
(3264, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'المهندسين', NULL, NULL, '2015-12-23 16:23:26', '2015-12-23 16:23:26'),
(3265, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'الهرم', NULL, NULL, '2015-12-23 16:23:26', '2015-12-23 16:23:26'),
(3266, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'العريش', NULL, NULL, '2015-12-23 16:23:26', '2015-12-23 16:23:26'),
(3267, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'م.نصر', '2', NULL, '2015-12-23 16:23:26', '2015-12-23 16:23:26'),
(3268, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'امبابة', NULL, NULL, '2015-12-23 16:23:26', '2015-12-23 16:23:26'),
(3269, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'المعادى', NULL, NULL, '2015-12-23 16:23:26', '2015-12-23 16:23:26'),
(3270, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'دار السلام', NULL, NULL, '2015-12-23 16:23:26', '2015-12-23 16:23:26'),
(3271, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'البراجيل', NULL, NULL, '2015-12-23 16:23:26', '2015-12-23 16:23:26'),
(3272, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'بورسعيد', '1', NULL, '2015-12-23 16:23:26', '2015-12-23 16:23:26'),
(3273, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'الدخيلة', '1', NULL, '2015-12-23 16:23:26', '2015-12-23 16:23:26'),
(3274, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'سموحة', NULL, NULL, '2015-12-23 16:23:26', '2015-12-23 16:23:26'),
(3275, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'السويس', NULL, NULL, '2015-12-23 16:23:26', '2015-12-23 16:23:26'),
(3276, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'العصافرة', NULL, NULL, '2015-12-23 16:23:27', '2015-12-23 16:23:27'),
(3277, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'كفر الدوار', NULL, NULL, '2015-12-23 16:23:27', '2015-12-23 16:23:27'),
(3278, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'المنيا', NULL, NULL, '2015-12-23 16:23:27', '2015-12-23 16:23:27'),
(3279, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'بنى مزار', NULL, NULL, '2015-12-23 16:23:27', '2015-12-23 16:23:27'),
(3280, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'اسيوط', NULL, NULL, '2015-12-23 16:23:27', '2015-12-23 16:23:27'),
(3281, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'سوهاج', NULL, NULL, '2015-12-23 16:23:27', '2015-12-23 16:23:27'),
(3282, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'القوصية', NULL, NULL, '2015-12-23 16:23:27', '2015-12-23 16:23:27'),
(3283, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'نجع حمادى', NULL, NULL, '2015-12-23 16:23:27', '2015-12-23 16:23:27'),
(3284, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'قنا', NULL, NULL, '2015-12-23 16:23:27', '2015-12-23 16:23:27'),
(3285, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'الاقصر', NULL, NULL, '2015-12-23 16:23:27', '2015-12-23 16:23:27'),
(3286, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'بنى سويف', NULL, NULL, '2015-12-23 16:23:27', '2015-12-23 16:23:27'),
(3287, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'جرجا', NULL, NULL, '2015-12-23 16:23:27', '2015-12-23 16:23:27'),
(3288, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'كفر الشيخ', NULL, NULL, '2015-12-23 16:23:27', '2015-12-23 16:23:27'),
(3289, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'الفلكى', NULL, NULL, '2015-12-23 16:23:27', '2015-12-23 16:23:27'),
(3290, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'اسماعلية', '3', NULL, '2015-12-23 16:23:27', '2015-12-23 16:23:27'),
(3291, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'محرم بك', NULL, NULL, '2015-12-23 16:23:27', '2015-12-23 16:23:27'),
(3292, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'السواح', NULL, NULL, '2015-12-23 16:23:28', '2015-12-23 16:23:28'),
(3293, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'منصورة غ', NULL, NULL, '2015-12-23 16:23:28', '2015-12-23 16:23:28'),
(3294, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'الغردقة', NULL, NULL, '2015-12-23 16:23:28', '2015-12-23 16:23:28'),
(3295, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'منصورة ش', NULL, NULL, '2015-12-23 16:23:28', '2015-12-23 16:23:28'),
(3296, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'كفر الزيات', NULL, NULL, '2015-12-23 16:23:28', '2015-12-23 16:23:28'),
(3297, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'المحلة', NULL, NULL, '2015-12-23 16:23:28', '2015-12-23 16:23:28'),
(3298, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'المأمون', NULL, NULL, '2015-12-23 16:23:28', '2015-12-23 16:23:28'),
(3299, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'الاستاد', NULL, NULL, '2015-12-23 16:23:28', '2015-12-23 16:23:28'),
(3300, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'المنزلة', '5', NULL, '2015-12-23 16:23:28', '2015-12-23 16:23:28'),
(3301, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'ميت غمر', '1', NULL, '2015-12-23 16:23:28', '2015-12-23 16:23:28'),
(3302, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'شربين', NULL, NULL, '2015-12-23 16:23:28', '2015-12-23 16:23:28'),
(3303, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'دمياط', NULL, NULL, '2015-12-23 16:23:28', '2015-12-23 16:23:28'),
(3304, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'ابو كبير', NULL, NULL, '2015-12-23 16:23:28', '2015-12-23 16:23:28'),
(3305, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'بلبيس', NULL, NULL, '2015-12-23 16:23:28', '2015-12-23 16:23:28'),
(3306, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'القومية', NULL, NULL, '2015-12-23 16:23:29', '2015-12-23 16:23:29'),
(3307, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'الزهور', NULL, NULL, '2015-12-23 16:23:29', '2015-12-23 16:23:29'),
(3308, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'ايتاى البارود', NULL, NULL, '2015-12-23 16:23:29', '2015-12-23 16:23:29'),
(3309, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'بنها', NULL, NULL, '2015-12-23 16:23:29', '2015-12-23 16:23:29'),
(3310, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'قويسنا', NULL, NULL, '2015-12-23 16:23:29', '2015-12-23 16:23:29'),
(3311, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'اشمون', NULL, NULL, '2015-12-23 16:23:29', '2015-12-23 16:23:29'),
(3312, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'اسوان', NULL, NULL, '2015-12-23 16:23:29', '2015-12-23 16:23:29'),
(3313, 'Dec-2015', 41573, '(فيستا عادى (مزلق', 'فيصل', NULL, NULL, '2015-12-23 16:23:29', '2015-12-23 16:23:29'),
(3314, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'حلوان', '3', NULL, '2015-12-23 16:23:29', '2015-12-23 16:23:29'),
(3315, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'دسوق', NULL, NULL, '2015-12-23 16:23:29', '2015-12-23 16:23:29'),
(3316, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'شبين الكوم', NULL, NULL, '2015-12-23 16:23:29', '2015-12-23 16:23:29'),
(3317, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'الفيوم', NULL, NULL, '2015-12-23 16:23:29', '2015-12-23 16:23:29'),
(3318, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'سوهاج الجديد', NULL, NULL, '2015-12-23 16:23:29', '2015-12-23 16:23:29'),
(3319, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'دمنهور', '1', NULL, '2015-12-23 16:23:29', '2015-12-23 16:23:29'),
(3320, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'طموه', NULL, NULL, '2015-12-23 16:23:29', '2015-12-23 16:23:29'),
(3321, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'شبرا مصر', NULL, NULL, '2015-12-23 16:23:29', '2015-12-23 16:23:29'),
(3322, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'الزاوية', NULL, NULL, '2015-12-23 16:23:29', '2015-12-23 16:23:29'),
(3323, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'المطرية', NULL, NULL, '2015-12-23 16:23:29', '2015-12-23 16:23:29'),
(3324, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'عين شمس', NULL, NULL, '2015-12-23 16:23:30', '2015-12-23 16:23:30'),
(3325, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'م.الجديدة', NULL, NULL, '2015-12-23 16:23:30', '2015-12-23 16:23:30'),
(3326, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'ش الخيمة', NULL, NULL, '2015-12-23 16:23:30', '2015-12-23 16:23:30'),
(3327, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'ش القناطر', NULL, NULL, '2015-12-23 16:23:30', '2015-12-23 16:23:30'),
(3328, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'وسط البلد', NULL, NULL, '2015-12-23 16:23:30', '2015-12-23 16:23:30'),
(3329, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'المهندسين', NULL, NULL, '2015-12-23 16:23:30', '2015-12-23 16:23:30'),
(3330, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'الهرم', '2', NULL, '2015-12-23 16:23:30', '2015-12-23 16:23:30'),
(3331, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'العريش', NULL, NULL, '2015-12-23 16:23:30', '2015-12-23 16:23:30'),
(3332, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'م.نصر', NULL, NULL, '2015-12-23 16:23:30', '2015-12-23 16:23:30'),
(3333, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'امبابة', NULL, NULL, '2015-12-23 16:23:30', '2015-12-23 16:23:30'),
(3334, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'المعادى', NULL, NULL, '2015-12-23 16:23:30', '2015-12-23 16:23:30'),
(3335, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'دار السلام', NULL, NULL, '2015-12-23 16:23:30', '2015-12-23 16:23:30'),
(3336, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'البراجيل', NULL, NULL, '2015-12-23 16:23:30', '2015-12-23 16:23:30'),
(3337, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'بورسعيد', NULL, NULL, '2015-12-23 16:23:30', '2015-12-23 16:23:30'),
(3338, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'الدخيلة', '1', NULL, '2015-12-23 16:23:30', '2015-12-23 16:23:30'),
(3339, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'سموحة', NULL, NULL, '2015-12-23 16:23:30', '2015-12-23 16:23:30'),
(3340, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'السويس', NULL, NULL, '2015-12-23 16:23:31', '2015-12-23 16:23:31'),
(3341, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'العصافرة', NULL, NULL, '2015-12-23 16:23:31', '2015-12-23 16:23:31'),
(3342, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'كفر الدوار', NULL, NULL, '2015-12-23 16:23:31', '2015-12-23 16:23:31'),
(3343, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'المنيا', '2', NULL, '2015-12-23 16:23:31', '2015-12-23 16:23:31'),
(3344, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'بنى مزار', NULL, NULL, '2015-12-23 16:23:31', '2015-12-23 16:23:31'),
(3345, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'اسيوط', NULL, NULL, '2015-12-23 16:23:31', '2015-12-23 16:23:31'),
(3346, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'سوهاج', NULL, NULL, '2015-12-23 16:23:31', '2015-12-23 16:23:31'),
(3347, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'القوصية', NULL, NULL, '2015-12-23 16:23:31', '2015-12-23 16:23:31'),
(3348, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'نجع حمادى', NULL, NULL, '2015-12-23 16:23:31', '2015-12-23 16:23:31'),
(3349, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'قنا', NULL, NULL, '2015-12-23 16:23:31', '2015-12-23 16:23:31'),
(3350, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'الاقصر', NULL, NULL, '2015-12-23 16:23:31', '2015-12-23 16:23:31'),
(3351, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'بنى سويف', NULL, NULL, '2015-12-23 16:23:31', '2015-12-23 16:23:31'),
(3352, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'جرجا', NULL, NULL, '2015-12-23 16:23:31', '2015-12-23 16:23:31'),
(3353, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'كفر الشيخ', NULL, NULL, '2015-12-23 16:23:31', '2015-12-23 16:23:31'),
(3354, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'الفلكى', NULL, NULL, '2015-12-23 16:23:31', '2015-12-23 16:23:31'),
(3355, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'اسماعلية', '7', NULL, '2015-12-23 16:23:31', '2015-12-23 16:23:31'),
(3356, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'محرم بك', NULL, NULL, '2015-12-23 16:23:31', '2015-12-23 16:23:31'),
(3357, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'السواح', NULL, NULL, '2015-12-23 16:23:32', '2015-12-23 16:23:32'),
(3358, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'منصورة غ', NULL, NULL, '2015-12-23 16:23:32', '2015-12-23 16:23:32'),
(3359, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'الغردقة', NULL, NULL, '2015-12-23 16:23:32', '2015-12-23 16:23:32'),
(3360, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'منصورة ش', NULL, NULL, '2015-12-23 16:23:32', '2015-12-23 16:23:32'),
(3361, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'كفر الزيات', NULL, NULL, '2015-12-23 16:23:32', '2015-12-23 16:23:32'),
(3362, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'المحلة', NULL, NULL, '2015-12-23 16:23:32', '2015-12-23 16:23:32'),
(3363, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'المأمون', NULL, NULL, '2015-12-23 16:23:32', '2015-12-23 16:23:32'),
(3364, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'الاستاد', NULL, NULL, '2015-12-23 16:23:32', '2015-12-23 16:23:32'),
(3365, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'المنزلة', NULL, NULL, '2015-12-23 16:23:32', '2015-12-23 16:23:32'),
(3366, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'ميت غمر', NULL, NULL, '2015-12-23 16:23:32', '2015-12-23 16:23:32'),
(3367, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'شربين', NULL, NULL, '2015-12-23 16:23:32', '2015-12-23 16:23:32'),
(3368, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'دمياط', NULL, NULL, '2015-12-23 16:23:32', '2015-12-23 16:23:32'),
(3369, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'ابو كبير', NULL, NULL, '2015-12-23 16:23:32', '2015-12-23 16:23:32'),
(3370, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'بلبيس', NULL, NULL, '2015-12-23 16:23:32', '2015-12-23 16:23:32'),
(3371, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'القومية', NULL, NULL, '2015-12-23 16:23:32', '2015-12-23 16:23:32'),
(3372, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'الزهور', '-1', NULL, '2015-12-23 16:23:32', '2015-12-23 16:23:32'),
(3373, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'ايتاى البارود', NULL, NULL, '2015-12-23 16:23:33', '2015-12-23 16:23:33'),
(3374, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'بنها', NULL, NULL, '2015-12-23 16:23:33', '2015-12-23 16:23:33'),
(3375, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'قويسنا', NULL, NULL, '2015-12-23 16:23:33', '2015-12-23 16:23:33'),
(3376, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'اشمون', NULL, NULL, '2015-12-23 16:23:33', '2015-12-23 16:23:33'),
(3377, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'اسوان', NULL, NULL, '2015-12-23 16:23:33', '2015-12-23 16:23:33'),
(3378, 'Dec-2015', 41574, '(فيستا موخر (مزلق', 'فيصل', NULL, NULL, '2015-12-23 16:23:33', '2015-12-23 16:23:33'),
(3379, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'حلوان', NULL, NULL, '2015-12-23 16:23:33', '2015-12-23 16:23:33'),
(3380, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'دسوق', NULL, NULL, '2015-12-23 16:23:33', '2015-12-23 16:23:33'),
(3381, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'شبين الكوم', NULL, NULL, '2015-12-23 16:23:33', '2015-12-23 16:23:33'),
(3382, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'الفيوم', NULL, NULL, '2015-12-23 16:23:33', '2015-12-23 16:23:33'),
(3383, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'سوهاج الجديد', NULL, NULL, '2015-12-23 16:23:33', '2015-12-23 16:23:33'),
(3384, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'دمنهور', NULL, NULL, '2015-12-23 16:23:33', '2015-12-23 16:23:33'),
(3385, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'طموه', NULL, NULL, '2015-12-23 16:23:33', '2015-12-23 16:23:33'),
(3386, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'شبرا مصر', NULL, NULL, '2015-12-23 16:23:33', '2015-12-23 16:23:33'),
(3387, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'الزاوية', NULL, NULL, '2015-12-23 16:23:33', '2015-12-23 16:23:33'),
(3388, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'المطرية', NULL, NULL, '2015-12-23 16:23:33', '2015-12-23 16:23:33');
INSERT INTO `ucp` (`id`, `month`, `code`, `product_name`, `area`, `quantity`, `mrs_percents`, `created_at`, `updated_at`) VALUES
(3389, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'عين شمس', NULL, NULL, '2015-12-23 16:23:33', '2015-12-23 16:23:33'),
(3390, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'م.الجديدة', NULL, NULL, '2015-12-23 16:23:33', '2015-12-23 16:23:33'),
(3391, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'ش الخيمة', NULL, NULL, '2015-12-23 16:23:34', '2015-12-23 16:23:34'),
(3392, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'ش القناطر', NULL, NULL, '2015-12-23 16:23:34', '2015-12-23 16:23:34'),
(3393, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'وسط البلد', NULL, NULL, '2015-12-23 16:23:34', '2015-12-23 16:23:34'),
(3394, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'المهندسين', NULL, NULL, '2015-12-23 16:23:34', '2015-12-23 16:23:34'),
(3395, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'الهرم', '4', NULL, '2015-12-23 16:23:34', '2015-12-23 16:23:34'),
(3396, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'العريش', NULL, NULL, '2015-12-23 16:23:34', '2015-12-23 16:23:34'),
(3397, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'م.نصر', NULL, NULL, '2015-12-23 16:23:34', '2015-12-23 16:23:34'),
(3398, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'امبابة', NULL, NULL, '2015-12-23 16:23:34', '2015-12-23 16:23:34'),
(3399, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'المعادى', NULL, NULL, '2015-12-23 16:23:34', '2015-12-23 16:23:34'),
(3400, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'دار السلام', NULL, NULL, '2015-12-23 16:23:34', '2015-12-23 16:23:34'),
(3401, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'البراجيل', NULL, NULL, '2015-12-23 16:23:34', '2015-12-23 16:23:34'),
(3402, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'بورسعيد', NULL, NULL, '2015-12-23 16:23:34', '2015-12-23 16:23:34'),
(3403, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'الدخيلة', NULL, NULL, '2015-12-23 16:23:34', '2015-12-23 16:23:34'),
(3404, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'سموحة', NULL, NULL, '2015-12-23 16:23:34', '2015-12-23 16:23:34'),
(3405, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'السويس', NULL, NULL, '2015-12-23 16:23:34', '2015-12-23 16:23:34'),
(3406, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'العصافرة', NULL, NULL, '2015-12-23 16:23:34', '2015-12-23 16:23:34'),
(3407, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'كفر الدوار', NULL, NULL, '2015-12-23 16:23:34', '2015-12-23 16:23:34'),
(3408, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'المنيا', NULL, NULL, '2015-12-23 16:23:34', '2015-12-23 16:23:34'),
(3409, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'بنى مزار', NULL, NULL, '2015-12-23 16:23:35', '2015-12-23 16:23:35'),
(3410, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'اسيوط', NULL, NULL, '2015-12-23 16:23:35', '2015-12-23 16:23:35'),
(3411, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'سوهاج', NULL, NULL, '2015-12-23 16:23:35', '2015-12-23 16:23:35'),
(3412, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'القوصية', NULL, NULL, '2015-12-23 16:23:35', '2015-12-23 16:23:35'),
(3413, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'نجع حمادى', NULL, NULL, '2015-12-23 16:23:35', '2015-12-23 16:23:35'),
(3414, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'قنا', NULL, NULL, '2015-12-23 16:23:35', '2015-12-23 16:23:35'),
(3415, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'الاقصر', NULL, NULL, '2015-12-23 16:23:35', '2015-12-23 16:23:35'),
(3416, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'بنى سويف', NULL, NULL, '2015-12-23 16:23:35', '2015-12-23 16:23:35'),
(3417, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'جرجا', NULL, NULL, '2015-12-23 16:23:35', '2015-12-23 16:23:35'),
(3418, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'كفر الشيخ', NULL, NULL, '2015-12-23 16:23:35', '2015-12-23 16:23:35'),
(3419, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'الفلكى', NULL, NULL, '2015-12-23 16:23:35', '2015-12-23 16:23:35'),
(3420, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'اسماعلية', NULL, NULL, '2015-12-23 16:23:35', '2015-12-23 16:23:35'),
(3421, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'محرم بك', NULL, NULL, '2015-12-23 16:23:35', '2015-12-23 16:23:35'),
(3422, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'السواح', NULL, NULL, '2015-12-23 16:23:35', '2015-12-23 16:23:35'),
(3423, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'منصورة غ', NULL, NULL, '2015-12-23 16:23:35', '2015-12-23 16:23:35'),
(3424, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'الغردقة', NULL, NULL, '2015-12-23 16:23:35', '2015-12-23 16:23:35'),
(3425, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'منصورة ش', NULL, NULL, '2015-12-23 16:23:35', '2015-12-23 16:23:35'),
(3426, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'كفر الزيات', NULL, NULL, '2015-12-23 16:23:35', '2015-12-23 16:23:35'),
(3427, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'المحلة', NULL, NULL, '2015-12-23 16:23:35', '2015-12-23 16:23:35'),
(3428, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'المأمون', NULL, NULL, '2015-12-23 16:23:35', '2015-12-23 16:23:35'),
(3429, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'الاستاد', NULL, NULL, '2015-12-23 16:23:36', '2015-12-23 16:23:36'),
(3430, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'المنزلة', NULL, NULL, '2015-12-23 16:23:36', '2015-12-23 16:23:36'),
(3431, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'ميت غمر', NULL, NULL, '2015-12-23 16:23:36', '2015-12-23 16:23:36'),
(3432, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'شربين', NULL, NULL, '2015-12-23 16:23:36', '2015-12-23 16:23:36'),
(3433, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'دمياط', NULL, NULL, '2015-12-23 16:23:36', '2015-12-23 16:23:36'),
(3434, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'ابو كبير', NULL, NULL, '2015-12-23 16:23:36', '2015-12-23 16:23:36'),
(3435, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'بلبيس', NULL, NULL, '2015-12-23 16:23:36', '2015-12-23 16:23:36'),
(3436, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'القومية', NULL, NULL, '2015-12-23 16:23:36', '2015-12-23 16:23:36'),
(3437, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'الزهور', NULL, NULL, '2015-12-23 16:23:36', '2015-12-23 16:23:36'),
(3438, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'ايتاى البارود', NULL, NULL, '2015-12-23 16:23:36', '2015-12-23 16:23:36'),
(3439, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'بنها', NULL, NULL, '2015-12-23 16:23:36', '2015-12-23 16:23:36'),
(3440, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'قويسنا', NULL, NULL, '2015-12-23 16:23:36', '2015-12-23 16:23:36'),
(3441, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'اشمون', NULL, NULL, '2015-12-23 16:23:36', '2015-12-23 16:23:36'),
(3442, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'اسوان', NULL, NULL, '2015-12-23 16:23:36', '2015-12-23 16:23:36'),
(3443, 'Dec-2015', 41575, '(فيستا وورم اكثر حرارة (مزلق', 'فيصل', NULL, NULL, '2015-12-23 16:23:36', '2015-12-23 16:23:36');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `class` enum('A+','A','B','C') COLLATE utf8_unicode_ci NOT NULL,
  `description` enum('clinic','polyclinic','hospital','pharmacy','medical_center') COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `specialty` enum('GYN','IM','GP','Surg','Orth','Ped','Ophth','VS') COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clinic_tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `address_description` text COLLATE utf8_unicode_ci,
  `am_working` time DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `time_of_visit` time DEFAULT NULL,
  `mr_id` int(10) unsigned NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=422 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `name`, `email`, `class`, `description`, `description_name`, `specialty`, `mobile`, `clinic_tel`, `address`, `address_description`, `am_working`, `comment`, `time_of_visit`, `mr_id`, `active`, `created_at`, `updated_at`) VALUES
(233, 'اسامه الاشقر', 'shkar_254@hotmail.com', 'A', 'clinic', NULL, 'GYN', '1223232805', NULL, '23شارع كنيسه الاقباط محطه الرمل بجوار مول الفلك', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:43', '2015-12-20 14:11:43'),
(234, 'طارق قرقوره', NULL, 'A', 'polyclinic', 'مستوصف الشفا', 'GYN', '1223152544', NULL, ' 22شارع العزفه التجاريه محطه الرمل بجوارصيدليه طارق', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:43', '2015-12-20 14:11:43'),
(235, 'مختار طوذادا', 'mktoppozada@hotmail.com', 'B', 'hospital', 'مستشفى الهرم', 'GYN', NULL, NULL, '19شارع ميدان سعد زغلول محطه الرمل', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:43', '2015-12-20 14:11:43'),
(236, 'الإسعاف', NULL, 'C', 'pharmacy', 'صيدليه', 'GYN', '1223116984', NULL, '12شارع كليه الطب محطه الرمل بجوار صيدليه اكسفرد', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:43', '2015-12-20 14:11:43'),
(237, 'ماجد شكرى', 'mkarass@mkarass.com', 'A', '', 'مركز الهدى', 'GYN', '1278210425', NULL, '34شارع سعد زغلول محطه الرمل بجوار شيكوريل', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:43', '2015-12-20 14:11:43'),
(238, 'محمد مراد العبد', 'sh_shamaa@yahoo.com', 'C', NULL, NULL, 'GYN', '1221058688', NULL, '29شارع العزفه التجاريه محطه الرمل', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:43', '2015-12-20 14:11:43'),
(239, 'هشام جلال', NULL, 'A+', NULL, NULL, 'GYN', '1223232902', NULL, '11شارع سيدى جابر', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:43', '2015-12-20 14:11:43'),
(240, 'غاده حرفوش', NULL, 'A', NULL, NULL, 'GYN', '1274745735', NULL, '83شار ع سيدى جابر الشيخ بجوار سنترال سيدى جابر', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:43', '2015-12-20 14:11:43'),
(241, 'شوقى محمدى', NULL, 'B', NULL, NULL, 'GYN', NULL, NULL, '41شارع الشعيه احمد اسماعيل سيدي جابر الشيخ بجوار سنترال سيدى جابر', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:44', '2015-12-20 14:11:44'),
(242, 'ياسر عريف', NULL, 'A', NULL, NULL, 'GYN', NULL, NULL, 'شارع يانوراما الشرق سيدى جابر امام المنطقه الشماليه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:44', '2015-12-20 14:11:44'),
(243, 'سحر الصاوى', NULL, 'A', NULL, NULL, 'GYN', '1099990354', NULL, '103شارع سيدى جابر الشيخ امام المنطقه النسمايه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:44', '2015-12-20 14:11:44'),
(244, 'سامح سعد الدين', NULL, 'C', NULL, NULL, 'GYN', NULL, NULL, '8شارع الشحيه محمد السيد حنفي سيدي جابر بجوار الوحيد', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:44', '2015-12-20 14:11:44'),
(245, 'محمود عبد النبي', NULL, 'B', NULL, NULL, 'GYN', NULL, NULL, '5شارع بور سعيد الشاطى بجوار صيدليه سان مينه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:44', '2015-12-20 14:11:44'),
(246, 'محمود مليس', NULL, 'C', NULL, NULL, 'GYN', NULL, NULL, '387شارع قناه الويس الشاطى بجوار مستشفه الشاطى', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:44', '2015-12-20 14:11:44'),
(247, 'فتحي عز الدين', NULL, 'C', NULL, NULL, 'GYN', NULL, NULL, '27شارع جوال حش  االايراهيميه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:44', '2015-12-20 14:11:44'),
(248, 'محمد عبد المعطى', 'dr.melsamra@gmail.com', 'B', NULL, NULL, 'GYN', '1005004757', NULL, 'طريق الحريه الابراهيميه بجوار كليه الهندسه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:44', '2015-12-20 14:11:44'),
(249, 'ماجد ميخائيل', 'dr.magedmichaael@yahoo.com', 'B', NULL, NULL, 'GYN', '100536343', NULL, '63شارع احمد فؤاد جلال الابراهيميه متفرع من الاجتيه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:44', '2015-12-20 14:11:44'),
(250, 'عطيات ابراهيم', NULL, 'B', NULL, NULL, 'GYN', NULL, NULL, '54شارع بلتيه متفرع من اللاجثيه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:44', '2015-12-20 14:11:44'),
(251, 'عادل خلف', NULL, 'C', NULL, NULL, 'GYN', NULL, NULL, '36شارع هليويوليس كامب شيزار', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:44', '2015-12-20 14:11:44'),
(252, 'اجلال قاسم', NULL, 'C', NULL, NULL, 'GYN', NULL, NULL, '6شارع فاقوس متفرع من عمر لطفي كمب شيزار', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:44', '2015-12-20 14:11:44'),
(253, 'فاتن الشنيطى', NULL, 'A', NULL, NULL, 'GYN', '1068366299', NULL, '39شارع عمر لطفى كمب شيزار سبنى اوديون', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:44', '2015-12-20 14:11:44'),
(254, 'يحيى عثمان', NULL, 'C', NULL, NULL, 'GYN', '101637392', NULL, '50شارع عمر لطفى كمب شيزار امام سينى اوريون', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:44', '2015-12-20 14:11:44'),
(255, 'حسن شرف', NULL, 'B', NULL, NULL, 'GYN', NULL, NULL, '50شارع عمر لطفى كمب شيزار امام سينما اوريون', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:44', '2015-12-20 14:11:44'),
(256, 'فوزيه صالح', NULL, 'B', NULL, NULL, 'GYN', NULL, NULL, '72شارع الامير ابرهيم الابراهيميه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:44', '2015-12-20 14:11:44'),
(257, 'نهال زغلول', 'yasmineishahat@yahoo.com', 'A+', NULL, NULL, 'GYN', '1223244150', NULL, '122شارع بورسعيد الابراهيميه بعد بنك NSGB', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:44', '2015-12-20 14:11:44'),
(258, 'محمد ولاء الديب', 'walaa@eldeeb.ws', 'A', NULL, NULL, 'GYN', '1222130603', NULL, '106شارع بورسعيد الابراهيميه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:45', '2015-12-20 14:11:45'),
(259, 'منى نوار', 'doctormonawar@yahoo.com', 'A', NULL, NULL, 'GYN', '1145758458', NULL, '55شارع بورسعيد الابراهيميه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:45', '2015-12-20 14:11:45'),
(260, 'احمد عبدالعزيز اسماعيل', 'Dr_Ahmed_Abd_el_aziz@hotmail.com', 'C', NULL, NULL, 'GYN', '12435714', NULL, '  3شارع رحان كمب شيزار امام مبنى اوريون ', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:45', '2015-12-20 14:11:45'),
(261, 'عونى رضوان', 'Awny_radwan@yahoo.com', 'A', NULL, NULL, 'GYN', '1007060359', NULL, '12شارع الدلتا متفرع من بور سعيد سيورتنج', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:45', '2015-12-20 14:11:45'),
(262, 'مدحت امين', NULL, 'B', NULL, NULL, 'GYN', NULL, NULL, 'شارع عمر لطفي سيورتنج', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:45', '2015-12-20 14:11:45'),
(263, 'سميد السيد', NULL, 'C', NULL, NULL, 'GYN', NULL, NULL, '146شرع عمر لطفى سيورتنج', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:45', '2015-12-20 14:11:45'),
(264, 'عثمان الاحمدى', NULL, 'C', NULL, NULL, 'GYN', NULL, NULL, '139تقاطع من طيبه وعرف سيورتنج', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:45', '2015-12-20 14:11:45'),
(265, 'ياسر الكسار', NULL, 'B', NULL, NULL, 'GYN', NULL, NULL, '169شارع بورسعيد سيورتنج', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:45', '2015-12-20 14:11:45'),
(266, 'اميره بدوي', NULL, 'A+', NULL, NULL, 'GYN', '1220209220', NULL, 'شارع بورسعيد ميدان كليوباترا حمامات عماره كليوباترا كلاسى', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:45', '2015-12-20 14:11:45'),
(267, 'سلوى خليل', NULL, 'A', NULL, NULL, 'GYN', NULL, NULL, '60شارع سيدى جابر كليوباترا حمامات محطه ترام كليوباترا محامات', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:45', '2015-12-20 14:11:45'),
(268, 'على خليف', NULL, 'B', NULL, NULL, 'GYN', NULL, NULL, '48شارع سيدى جابر كليوباترا محامات', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:45', '2015-12-20 14:11:45'),
(269, 'منال فاضل', NULL, 'A', NULL, NULL, 'GYN', NULL, NULL, '247شارع بورسعيد كليوباترا محامات', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:45', '2015-12-20 14:11:45'),
(270, 'نجوى حمدى', NULL, 'B', NULL, NULL, 'GYN', NULL, NULL, 'شارع طيبه كليوباترا محامات', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:45', '2015-12-20 14:11:45'),
(271, 'هانى عبد الرحمن', NULL, 'B', NULL, NULL, 'GYN', NULL, NULL, '235شارع عمر لطفى كليوباترا ', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:45', '2015-12-20 14:11:45'),
(272, 'امال فرحات', NULL, 'B', NULL, NULL, 'IM', NULL, NULL, '235شارع عمر لطفى كليوباترا زنايتري ', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:45', '2015-12-20 14:11:45'),
(273, 'نهي ابرهيم', NULL, 'A', NULL, NULL, 'IM', NULL, NULL, '4شارع صفوت منصور كليوباترا محامات', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:45', '2015-12-20 14:11:45'),
(274, 'هانى الشافعي', NULL, 'A', NULL, NULL, 'IM', '1276796234', NULL, 'بجوار مقهوه فاروقى بحري', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:45', '2015-12-20 14:11:45'),
(275, 'منى عبدالعال', NULL, 'A', NULL, NULL, 'IM', '1223305681', NULL, '4شارع صلاح بحرى بجوار ايس كريم مكرم', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:45', '2015-12-20 14:11:45'),
(276, 'ناديه الحداد', NULL, 'B', NULL, NULL, 'IM', '1005348987', NULL, '12الاولى شارع الفى المنشيه دار اسماعيل', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:45', '2015-12-20 14:11:45'),
(277, 'منى عبدالحافظ', NULL, 'A', NULL, NULL, 'IM', '1224926782', NULL, '54شارع السبع بنات المنشيه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:46', '2015-12-20 14:11:46'),
(278, 'تهانى المغربي', NULL, 'A', NULL, NULL, 'IM', NULL, NULL, 'شارع الزهرر الحضره الجديده اعلى صيدليه عبد السلام خاطر', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:46', '2015-12-20 14:11:46'),
(279, 'محمد سميح', NULL, 'A', NULL, NULL, 'IM', NULL, NULL, 'اول شارع الزهور الحضره الجديده اعلى صيدليه عبد السلام خاطر', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:46', '2015-12-20 14:11:46'),
(280, 'رانيا عبدالرازق', NULL, 'A+', NULL, NULL, 'IM', '1006176723', NULL, 'شارع الزهور الحضره الجديده اعلى صيدليه محمود حمدى', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:46', '2015-12-20 14:11:46'),
(281, 'رشا الرسوفى', NULL, 'A', NULL, NULL, 'IM', '123889113', NULL, '97شارع المدينه المنوره متفرع من الاراله الحضره الجديده بجوار صيدليه محمود حسن', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:46', '2015-12-20 14:11:46'),
(282, 'منى على امين', NULL, 'A', NULL, NULL, 'IM', '1005273783', NULL, 'شارع محمد محمود متفرع من الجواهر الحضره بجوار صيدليه الجواهر', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:46', '2015-12-20 14:11:46'),
(283, 'هدي الهلال', NULL, 'B', NULL, NULL, 'IM', '1005611879', NULL, 'امام مستشفه العامريه بجوار مسجد الشرقاوى', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:46', '2015-12-20 14:11:46'),
(284, 'جيهان الاسيوتى ', NULL, 'B', NULL, NULL, 'IM', '1221091806', NULL, 'شارع العشم خلف شركه الكهرباء العامريه بجوار صيدليه ةلاء ', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:46', '2015-12-20 14:11:46'),
(285, 'امال مغازى', NULL, 'A', NULL, NULL, 'IM', '1223334993', NULL, 'شارع عمربنى الخطاب العامريه امام مستشفه الشيخ بدوى', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:46', '2015-12-20 14:11:46'),
(286, 'رضا شعيب', NULL, 'A', NULL, NULL, 'IM', '1227609072', NULL, 'شارع القسم العامريه امام صيدليه فجير', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:46', '2015-12-20 14:11:46'),
(287, 'على خلف الله', NULL, 'B', NULL, NULL, 'IM', '101596123', NULL, 'خلف صيدليه ابرهيم من مخزن الزيت العامريه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:46', '2015-12-20 14:11:46'),
(288, 'حمزه حسين', 'Ham za1Hussien@yahoo.com', 'A', NULL, NULL, 'IM', '127219335', NULL, 'امام مستشفه العامريه العامريه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:46', '2015-12-20 14:11:46'),
(289, 'سلوى عبد اللطيف', NULL, 'A', NULL, NULL, 'IM', '1006684065', NULL, 'البرج الجديده خلف قسم الشرطه ومركز الشباب برج العرب', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:47', '2015-12-20 14:11:47'),
(290, 'امال ابوطالب', NULL, 'A', NULL, NULL, 'IM', '1289003503', NULL, 'ماكن800 برج العرب الجديده صيدليه النميري خلف مسجد 800', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:47', '2015-12-20 14:11:47'),
(291, 'سوزان سليم', NULL, 'B', NULL, NULL, 'GP', NULL, NULL, '58شارع الطوفى راغب كرموز    بجوار صيدليه العمال', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:47', '2015-12-20 14:11:47'),
(292, 'د.محمد سعيد مضار', NULL, 'A', NULL, NULL, 'GP', NULL, NULL, 'شارع كرموز بجوار صيدليه منال محفوظ', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:47', '2015-12-20 14:11:47'),
(293, 'اميل عبده ', NULL, 'A', NULL, NULL, 'GP', '1224572956', NULL, 'شارع ايزيس محرم بك بجوار مستشفه ايزيس', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:48', '2015-12-20 14:11:48'),
(294, 'د.على النجومى', NULL, 'C', NULL, NULL, 'GP', NULL, NULL, '138شارع شركه المحموريه امام كويري راغب اعلي صيدليه د.مهي', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:48', '2015-12-20 14:11:48'),
(295, 'حنان الكنانى', NULL, 'B', NULL, NULL, 'GP', '1227112031', NULL, '72شارع كرموز بجوار صيدليه منال محفوظ', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:48', '2015-12-20 14:11:48'),
(296, 'عصمت عبد الخالق', 'dr_3esmat@hotmail.com', 'B', NULL, NULL, 'GP', '1225343560', NULL, '19شارع الطابيه غيط العنب بجوار صيدليه نهله عبدالخالق', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:48', '2015-12-20 14:11:48'),
(297, 'نجلاء الفطراني', NULL, 'B', NULL, NULL, 'GP', '1007292395', NULL, '80شارع الرند غيط العنب بجوار الكنيسه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:48', '2015-12-20 14:11:48'),
(298, 'سحر الزقم', NULL, 'B', NULL, NULL, 'GP', '1223525183', NULL, '49شارع محلرم بك بجوار صيدليه مزراحي', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:48', '2015-12-20 14:11:48'),
(299, 'امانى خاطر', NULL, 'B', NULL, NULL, 'GP', '1284862450', NULL, 'شارع محرم بك بجوار صيدليه بثيه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:48', '2015-12-20 14:11:48'),
(300, 'عزيزه صالح', NULL, 'B', NULL, NULL, 'GP', NULL, NULL, '58شارع بوالينو محرم بك بجوار صيدليه بوالينو', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:48', '2015-12-20 14:11:48'),
(301, 'زكيه ابوطالب', NULL, 'A+', NULL, NULL, 'GP', '105199847', NULL, 'شارع الغيط الصعيدي اميروزو  محرم بك', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:48', '2015-12-20 14:11:48'),
(302, 'محمد حسين', NULL, 'A', NULL, NULL, 'Surg', NULL, NULL, '40شارع اللرصافه محرم بك بجوار صيدليه الماسيه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:48', '2015-12-20 14:11:48'),
(303, 'صلاح عبدربه', 'Abdrabbo_100@yahoo.com', 'A', NULL, NULL, 'Surg', '1001634289', NULL, '10شارع محرم بك اعلى صيدليه محطه مصر', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:48', '2015-12-20 14:11:48'),
(304, 'زينب الباز', NULL, 'B', NULL, NULL, 'Surg', '127153526', NULL, 'محرم بك بجوار صيدليه الشفاء', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:49', '2015-12-20 14:11:49'),
(305, 'منال عبدالله', NULL, 'A+', NULL, NULL, 'Surg', '1001633545', NULL, '86شارع محرم بك بجوار شركه الفتح لمستحضرات التجميل', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:49', '2015-12-20 14:11:49'),
(306, 'سحر عبده', NULL, 'B', NULL, NULL, 'Surg', '1005191640', NULL, '89شارع محرم بك بجوار صيدليه الهلال الاحمر', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:49', '2015-12-20 14:11:49'),
(307, 'كمال حسين', NULL, 'C', NULL, NULL, 'Surg', NULL, NULL, 'شارع قناه السويس اسفل كوبري محرم بك بجوار صيدليه محفوظ', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:49', '2015-12-20 14:11:49'),
(308, 'علاء هندى', NULL, 'B', NULL, NULL, 'Surg', '122488028', NULL, '37شارع محرم بك قبل تقاطع علي محرمبك', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:49', '2015-12-20 14:11:49'),
(309, 'حلمى عبدالستار', NULL, 'B', NULL, NULL, 'Orth', '1062831231', NULL, '11شارع عبد القادر العزياتى الرصافه محرمبك بجوار فتحالله', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:49', '2015-12-20 14:11:49'),
(310, 'طارق امين', NULL, 'B', NULL, NULL, 'Orth', NULL, NULL, '5شارع محرم بك', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:49', '2015-12-20 14:11:49'),
(311, 'سوميه صديق', NULL, 'A', NULL, NULL, 'Orth', '1225161762', NULL, 'شارع الفقال الورديان بجوار صيدليه الفقال', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:49', '2015-12-20 14:11:49'),
(312, 'سهير محمد', NULL, 'A+', NULL, NULL, 'Orth', '1001586174', NULL, 'شارع الامن الورديان بجوار قهوه عكازى', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:49', '2015-12-20 14:11:49'),
(313, 'ناديه الفقى', NULL, 'A+', NULL, NULL, 'Orth', '1061488815', NULL, '73شارع ام السلطان الورديان بجوار صيدليه الايثار', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:50', '2015-12-20 14:11:50'),
(314, 'داليا قطب', NULL, 'B', NULL, NULL, 'Orth', '1005185457', NULL, '2شارع الملك شاه بجوار شركه داتا القبارى', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:50', '2015-12-20 14:11:50'),
(315, 'ناهد ابو رحاب', NULL, 'B', NULL, NULL, 'Orth', '1057916181', NULL, 'شارع الامير لؤلؤ المثراى الورديان امام مستشفه الزهراء', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:50', '2015-12-20 14:11:50'),
(316, 'منال امين', NULL, 'B', NULL, NULL, 'Orth', '1222664337', NULL, 'شارع الامير لؤلؤ المتراس الورديان بجوار صيدليه الامير لؤلؤ', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:50', '2015-12-20 14:11:50'),
(317, 'ايمان طه', NULL, 'B', NULL, NULL, 'Orth', '1001525982', NULL, '52شارع الققال الورديان بجوار صيدله محفوظ', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:50', '2015-12-20 14:11:50'),
(318, 'عبد المجيد مصطفى', NULL, 'B', NULL, NULL, 'Orth', NULL, NULL, '79شارع عبد الكريم منقرع من القفال الورديان امام صيدليه فينوس', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:50', '2015-12-20 14:11:50'),
(319, 'حسين الحديدى', 'hussienehadidi@yahoo.com', 'B', NULL, NULL, 'Orth', '1280875583', NULL, '77شارع عبد الكريم متفرع من القفال الورديان بجوار صيدليه فينوس', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:50', '2015-12-20 14:11:50'),
(320, 'محمد عياس حجازي', NULL, 'C', NULL, NULL, 'Orth', NULL, NULL, '26شارع اليه على الورديان', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:50', '2015-12-20 14:11:50'),
(321, 'دينا شبل', NULL, 'A', NULL, NULL, 'Ped', '1129690539', NULL, '82شارع الامان خفاجه عماره عبد المجيد يعقوب الورديان محطه ثرام  خفاجه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:50', '2015-12-20 14:11:50'),
(322, 'احمد كامل', NULL, 'A', NULL, NULL, 'Ped', '1223843201', NULL, '39طرق المكس القباري اعلى صيدله عمرو سويلم', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:51', '2015-12-20 14:11:51'),
(323, 'حسناء عبد المعطى', NULL, 'C', NULL, NULL, 'Ped', '106163391', NULL, 'شارع مسجد ناجى الدخيله امام مطعم فهمي', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:51', '2015-12-20 14:11:51'),
(324, 'ليلى دردير', NULL, 'A', NULL, NULL, 'Ped', '123645517', NULL, 'ميدان كليوباترا الدخيله عند الموقف', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:51', '2015-12-20 14:11:51'),
(325, 'سهير وليم', NULL, 'A', NULL, NULL, 'Ped', '1229389828', NULL, '23شارع الجيش الدخيله امام شارع الجيش', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:51', '2015-12-20 14:11:51'),
(326, 'دعاء يوسف', NULL, 'B', NULL, NULL, 'Ped', '101991479', NULL, 'طريق اسكندريه مطروح الدخيله عمارات السلام', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:51', '2015-12-20 14:11:51'),
(327, 'صفاء سراج', NULL, 'A+', NULL, NULL, 'Ped', '1006161604', NULL, 'اول شارع الجيش الدخيله بجوار صيدله الاقصر', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:51', '2015-12-20 14:11:51'),
(328, 'هدى فتحى', NULL, 'A', NULL, NULL, 'Ped', NULL, NULL, 'طريق اسكندريه ريه مطروح الدخيله قبل مستشفه قصر الشفا', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:51', '2015-12-20 14:11:51'),
(329, 'نجلاء الجمل', NULL, 'A+', NULL, NULL, 'Ped', '1004268652', NULL, 'طريق اسكندريه مطروح الدرايسه العجمى بجوار صيدله فضه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:51', '2015-12-20 14:11:51'),
(330, 'عواطف ', NULL, 'A', NULL, NULL, 'Ped', '1223709401', NULL, 'اول شارع الحديدوالصلب بجوار صيدله محمد فهيم', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:51', '2015-12-20 14:11:51'),
(331, 'هويدا جاد جيد', NULL, 'A', NULL, NULL, 'Ped', '122439228', NULL, 'طريق اسكندريه مطروح الهانوفيل بجوار صيدليه وليم', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:51', '2015-12-20 14:11:51'),
(332, 'وفاء عبد الرازاق', NULL, 'C', NULL, NULL, 'Ped', '125606626', NULL, 'شارع العزبى امام الهانوفيل200 بجوار صيدليه لبيب كامل', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:51', '2015-12-20 14:11:51'),
(333, 'فريده حجازى', NULL, 'B', NULL, NULL, 'Ped', '1006067343', NULL, '24طريق اسكندريه الساحل ك21 بعد شركه جهينه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:51', '2015-12-20 14:11:51'),
(334, 'ثناء سعيد حمد', NULL, 'B', NULL, NULL, 'Ped', '1224007548', NULL, 'شارع الجيش ابو يوسف الكيلو 19 العجمي', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:51', '2015-12-20 14:11:51'),
(335, 'انعام فكري', NULL, 'B', NULL, NULL, 'Ped', '1271254221', NULL, 'الدرايسه طريق اسكندريه مطروح العجمى بعد صيدليه فضه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:52', '2015-12-20 14:11:52'),
(336, 'عبد الحليم مكاوى', NULL, 'B', NULL, NULL, 'Ped', '123732835', NULL, '1شارع ايوهنديه متفرع من شارع الهانوفيل العجمى بجوار مستشفه ابو هنديه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:52', '2015-12-20 14:11:52'),
(337, 'عزه الدسوقى', NULL, 'B', NULL, NULL, 'Ped', '122979012', NULL, 'شارع ابوهنديه الهانوفيل العجمي بجوار صيدله فاين', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:52', '2015-12-20 14:11:52'),
(338, 'ثريزا عبده', NULL, 'A', NULL, NULL, 'Ped', '1222308929', NULL, 'نهايه شارع فضه العجمى صيدله فضه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:52', '2015-12-20 14:11:52'),
(339, 'السيد عبدالمنعم ', NULL, 'A+', NULL, NULL, 'Ped', NULL, NULL, 'طريق اسكندريه مطروح الدرايسه العجمى اعلى صيدله فضه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:52', '2015-12-20 14:11:52'),
(340, 'مها طلبه', NULL, 'A', NULL, NULL, 'Ped', '1223615146', NULL, 'الكيلو 21 امام شارع التامين صيدليه اوركا', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:52', '2015-12-20 14:11:52'),
(341, 'سماح عبد الرسول', NULL, 'B', NULL, NULL, 'Ped', '123521662', NULL, 'طريق اسكندريه مطروح بجوار جامع القويري العجمى قبل صيدليه عجيبه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:52', '2015-12-20 14:11:52'),
(342, 'ميرفت عبدالحميد', NULL, 'A', NULL, NULL, 'Ped', NULL, NULL, ' شارع عين شمس متفرع من البيطاش العجمي بجوار صيدله على امين', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:53', '2015-12-20 14:11:53'),
(343, 'مريم مصطفى', NULL, 'A', NULL, NULL, 'Ped', '1001706873', NULL, 'البطاشى امام 6عبد شمس شارع البيطاش الرئيسي اعلى صيدليه عين شمس ', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:53', '2015-12-20 14:11:53'),
(344, 'يسرى النويعم', NULL, 'B', NULL, NULL, 'Ped', '122184556', NULL, '38شارع البيطاش  الرئيس العجمى بيطاش امام صيدله صابرين', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:53', '2015-12-20 14:11:53'),
(345, 'الهام الكردى', NULL, 'B', NULL, NULL, 'Ped', '1283813429', NULL, 'طريق اسكندريه مطروح بجوار صيدليه   فاطمى العجمي', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:53', '2015-12-20 14:11:53'),
(346, 'محمد مصطفى العريان', NULL, 'B', NULL, NULL, 'Ped', '10726868', NULL, '12شارع الشيخ سيد درويش متفرع من شارع صفيه زغلول العطاريه ', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:53', '2015-12-20 14:11:53'),
(347, 'رئيفه البدوي', NULL, 'A+', NULL, NULL, 'Ped', '1006027868', NULL, 'طريق مصر اسكندريه الصحراوي', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:53', '2015-12-20 14:11:53'),
(348, 'محمد صبرى ', NULL, 'B', NULL, NULL, 'Ped', '1065177758', NULL, 'طريق اسكندريه مطروح الدراسه الهانوفيل صيدليه عجيبه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:53', '2015-12-20 14:11:53'),
(349, 'ايناس عبدالسميع', NULL, 'B', NULL, NULL, 'Ped', '1065177758', NULL, 'طريق اسكندريه مطروح الدرايسه الهانوفيل ', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:54', '2015-12-20 14:11:54'),
(350, 'رودينا على', NULL, 'B', NULL, NULL, 'Ped', '1065177758', NULL, 'شارع اسكندريه  مطروح الدرايسه العجمى', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:54', '2015-12-20 14:11:54'),
(351, 'حنان اسماعيل', NULL, 'B', NULL, NULL, 'Ped', '1065177758', NULL, 'طريق اسكندريه مطروح الدرايسه العجمى اعلى صيدله فضه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:54', '2015-12-20 14:11:54'),
(352, 'سيد بدوي', NULL, 'A', NULL, NULL, 'Ped', '01065177758 03924483', NULL, 'طريق اسكندريه مطروح الدرايسه العجمي', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:54', '2015-12-20 14:11:54'),
(353, 'احمد هاشم', 'dr.ahmed hashem1@gmail.com', 'B', NULL, NULL, 'Ped', '11112671109', NULL, 'طريق اسكندريه مطروح ابويوسف العجمي امام بنزينه توتال', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:54', '2015-12-20 14:11:54'),
(354, 'جهاد', NULL, 'B', NULL, NULL, 'Ped', '1150871217', NULL, '54شارع البيطاش  الرئيسي  امام صيدليه احمد شيد', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:54', '2015-12-20 14:11:54'),
(355, 'جيهان شحاته', NULL, 'B', NULL, NULL, 'Ped', '1007991766', NULL, '76شارع المكسى القيارى بجوار بنزينه الطراهونى', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:54', '2015-12-20 14:11:54'),
(356, 'سلمى', NULL, 'A', NULL, NULL, 'Ped', '1111324051', NULL, '1شارع مسجد الغفران البيطاش امام عمر افندى ', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:54', '2015-12-20 14:11:54'),
(357, 'فاطمه', NULL, 'B', NULL, NULL, 'Ped', NULL, NULL, '1شارع مسجد الغفران البيطاش امام عمر افندى ', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:54', '2015-12-20 14:11:54'),
(358, 'نعمه عنتر', NULL, 'B', NULL, NULL, 'Ped', '1224029145', NULL, '2بلوك2 المتراسى الورديان خلف السوق', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:54', '2015-12-20 14:11:54'),
(359, 'اسماء ', NULL, 'B', NULL, NULL, 'Ped', '1282054167', NULL, 'النهضه قريه شريات النهضه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:54', '2015-12-20 14:11:54'),
(360, 'ايمان محروس', NULL, 'B', NULL, NULL, 'Ped', '1229512982', NULL, 'كويرى غط العنب كرموز', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:55', '2015-12-20 14:11:55'),
(361, 'هاله الجوهرى', NULL, 'C', NULL, NULL, 'Ophth', '1227818831', NULL, 'كابو الحضره عصير ابه الحته', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:55', '2015-12-20 14:11:55'),
(362, 'هاله حجازي', NULL, 'B', NULL, NULL, 'Ophth', '1111236616', NULL, 'شارع القسم العصريه قسم العصريه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:55', '2015-12-20 14:11:55'),
(363, 'هناء', NULL, 'B', NULL, NULL, 'Ophth', '1116760948', NULL, 'برج العرب', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:55', '2015-12-20 14:11:55'),
(364, 'حنان برعى', NULL, 'B', NULL, NULL, 'Ophth', '1004166828', NULL, 'الاول لو20 طرق اسكندريه مطروح العجمى صيدليه حجازى', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:55', '2015-12-20 14:11:55'),
(365, 'هدى البدري', NULL, 'C', NULL, NULL, 'Ophth', '1222965385', NULL, 'طريق اسكندريه مطروح العجمى بجوار مدرسه العجمى النموذجى', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:55', '2015-12-20 14:11:55'),
(366, 'ليلى صلاح', NULL, 'B', NULL, NULL, 'Ophth', '1004523640', NULL, 'امام مستشفه العامريه العمريه بجوار صيدليه ابرهيم', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:55', '2015-12-20 14:11:55'),
(367, 'سماح شديد', NULL, 'B', NULL, NULL, 'Ophth', '1006303530', NULL, '6شارع ابوالدراداء اللبان محطه الدرداء', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:55', '2015-12-20 14:11:55'),
(368, 'مصطفى الجبالى', NULL, 'B', NULL, NULL, 'Ophth', NULL, NULL, '6شارع ابو الاخضر محطه مصر صيدليه كيلوباترا', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:55', '2015-12-20 14:11:55'),
(369, 'صياح ربيع', NULL, 'B', NULL, NULL, 'Ophth', NULL, NULL, '89شارع الاسكندريه محرم بك محطه الاسكندريه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:56', '2015-12-20 14:11:56'),
(370, 'تامر حنفى', NULL, 'B', NULL, NULL, 'Ophth', NULL, NULL, '1شارع الليوميرى الجمرك بحرى صيدليه مختار', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:56', '2015-12-20 14:11:56'),
(371, 'الشيماء احمد', NULL, 'B', NULL, NULL, 'Ophth', NULL, NULL, 'بوابه 18الهانوفيل العجمى القويرى', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:56', '2015-12-20 14:11:56'),
(372, 'هانم عبيد', NULL, 'B', NULL, NULL, 'Ophth', NULL, NULL, 'عمارات ديارا الصفا الهانوفيل العجمى جامع القويرى', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:56', '2015-12-20 14:11:56'),
(373, 'ابرهيم المخزنجى', NULL, 'C', NULL, NULL, 'Ophth', NULL, NULL, '64شارع صفيه زغلول محطه الرمل ', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:56', '2015-12-20 14:11:56'),
(374, 'امال رفعت على', NULL, 'C', NULL, NULL, 'Ophth', NULL, NULL, 'شارع ثزيه منش الانهار غيط العنب ترعه المحموديه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:56', '2015-12-20 14:11:56'),
(375, 'مصطفى انوار سلطان ', NULL, 'B', NULL, NULL, 'Ophth', NULL, NULL, '28تقاطع شارع سيزوثرس كنيسه الاقباط محطه الرمل مول الفلكى', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:56', '2015-12-20 14:11:56'),
(376, 'عزه عبد الصارق', NULL, 'A', NULL, NULL, 'Ophth', '124028650', NULL, 'خلف بنك مصر مكا اسيد عماره 8 الهاتوفيل صيدليه اسيد', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:56', '2015-12-20 14:11:56'),
(377, 'سوزان اسماعيل', NULL, 'A', NULL, NULL, 'Ophth', NULL, NULL, 'شارع الهانوفيل الرئيسي بجوار بنك مصر صيدليه فاين', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:56', '2015-12-20 14:11:56'),
(378, 'امين مصطفى امين', NULL, 'C', NULL, NULL, 'Ophth', NULL, NULL, 'شارع الخديوى محطه مصر امام شارع العطارين', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:56', '2015-12-20 14:11:56'),
(379, 'سامى عبدالقادر', NULL, 'C', NULL, NULL, 'Ophth', NULL, NULL, 'شارع الشمرلي الجمرك بحرى', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:57', '2015-12-20 14:11:57'),
(380, 'سحر نصار', NULL, 'A', NULL, NULL, 'Ophth', NULL, NULL, 'شارع عثمان جلال ابراج البركه محرم بك ', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:57', '2015-12-20 14:11:57'),
(381, 'مها سلامه', NULL, 'C', NULL, NULL, 'Ophth', NULL, NULL, 'الكيلو12.5 طريق اسكندريه مطروح العجمى صيدليه الشورى', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:57', '2015-12-20 14:11:57'),
(382, 'على حسن', NULL, 'C', NULL, NULL, 'Ophth', NULL, NULL, 'شارع مسجد ناجى الدخيله الدخيله', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:57', '2015-12-20 14:11:57'),
(383, 'محمود حجازي', NULL, 'C', NULL, NULL, 'Ophth', NULL, NULL, '31شارع الشهيده ام صابر الغيط الصعيد اميروزو بجوار السوق', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:57', '2015-12-20 14:11:57'),
(384, 'راويه حسنى', NULL, 'C', NULL, NULL, 'Ophth', '123645206', NULL, 'مدخل البيطاش اعلى حلوانى احمد سعيد ', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:57', '2015-12-20 14:11:57'),
(385, 'نرمين البلتاجي', NULL, 'B', NULL, NULL, 'Ophth', NULL, NULL, '19شارع احمد عرابى المنشيه ', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:57', '2015-12-20 14:11:57'),
(386, 'سوزان سامى', NULL, 'B', NULL, NULL, 'GYN', NULL, NULL, '3شارع البرنس ابرهيم الحضره صيدليه محطه الحضره', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:57', '2015-12-20 14:11:57'),
(387, 'الفت صلاح', NULL, 'C', NULL, NULL, 'GYN', NULL, NULL, '3شارع البرنس ابرهيم الحضره صيدليه محطه الحضره', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:57', '2015-12-20 14:11:57'),
(388, 'ساميه احمد ', NULL, 'C', NULL, NULL, 'GYN', NULL, NULL, '3شارع البرنس ابرهيم الحضره صيدليه محطه الحضره', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:58', '2015-12-20 14:11:58'),
(389, 'فيولا مكرم', 'Makram_viola@yahoo.com', 'A', NULL, NULL, 'GYN', '1222267532', NULL, '81شارع الفرغانى عزيال صيدليه كوكب', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:58', '2015-12-20 14:11:58'),
(390, 'نشوى نيازى', NULL, 'A', NULL, NULL, 'GYN', NULL, NULL, 'لو20 طريق اسكندريه مطروح العجمي صيدليه مجازى', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:58', '2015-12-20 14:11:58'),
(391, 'تامر عبد الدايم', NULL, 'A', NULL, NULL, 'GYN', '1200342746', NULL, '4شارع الدكتور على مشرفه سوتر الازاريطه المشف الميرى', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:58', '2015-12-20 14:11:58'),
(392, 'داليا النيلي', NULL, 'C', NULL, NULL, 'GYN', '1200342746', NULL, '4شارع اكوينى على الترام الازاريطه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:58', '2015-12-20 14:11:58'),
(393, 'هبه قاسم ', NULL, 'C', NULL, NULL, 'GYN', '1200342746', NULL, '4شارع اكوينى على الترام الازاريطه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:58', '2015-12-20 14:11:58'),
(394, 'خالد سلام', NULL, 'B', NULL, NULL, 'GYN', '1200342746', NULL, '138شارع شركه المحموديه امام كويرى راغب', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:58', '2015-12-20 14:11:58'),
(395, 'هاني فوزي', NULL, 'B', NULL, NULL, 'GYN', '1200342746', NULL, 'شارع عمر بن الخطاب  العامريه امام مستشفه بدوى', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:58', '2015-12-20 14:11:58'),
(396, 'عديله الليثى', NULL, 'C', NULL, NULL, 'GYN', '1200342746', NULL, '2شارع اسماعيل صبرى بحرى ', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:59', '2015-12-20 14:11:59'),
(397, 'شريف السويفى ', NULL, 'A', NULL, NULL, 'GYN', '1200342746', NULL, '8شارع الفلكى محطه الرمل مول الفلكى', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:59', '2015-12-20 14:11:59'),
(398, 'اشرف هانى عبد الرحمن', NULL, 'C', NULL, NULL, 'GYN', '1222589219', NULL, '53شارع السيد حنفي كليوباترا ', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:59', '2015-12-20 14:11:59'),
(399, 'هدى ابراهيم', NULL, 'B', NULL, NULL, 'GYN', '1222589219', NULL, 'شارع الحجارى الانقوشى بحرى صيدليه الحجارى', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:59', '2015-12-20 14:11:59'),
(400, 'هند محمد رجب', NULL, 'B', NULL, NULL, 'GYN', '1222589219', NULL, '1شارع الدياريكري محرمبك شارع امير البحر', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:59', '2015-12-20 14:11:59'),
(401, 'عاصم محمد مطاوع', 'assem_metawei@yahoo.com', 'A', NULL, NULL, 'GYN', '1222589219', NULL, '47شارع سعد زغلول محطه الرمل', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:59', '2015-12-20 14:11:59'),
(402, 'محمد سالم ', NULL, 'C', NULL, NULL, 'GYN', '1222589219', NULL, 'طريق العجمى بجوار الكوبرى العلوى الدخيله بجوار صيدليه انتصار عجمى', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:59', '2015-12-20 14:11:59'),
(403, 'سناء السعيد', NULL, 'B', NULL, NULL, 'GYN', '1222876342', NULL, 'شارع الزهرر الحضره', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:11:59', '2015-12-20 14:11:59'),
(404, 'عمرو على حسن ', 'Abo_ aanna207@yahoo.com', 'C', NULL, NULL, 'GYN', '1282157811', NULL, 'الاامل طريق اسكندريه مطروح ابو يوسف بجوار بنزيمهTOAL', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:12:00', '2015-12-20 14:12:00'),
(405, 'عبير رجب رمضان', NULL, 'A', NULL, NULL, 'GYN', '1011120952', NULL, 'عماره 4 بجوار سان ماك برج العرب الجديد منطقه800', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:12:00', '2015-12-20 14:12:00'),
(406, 'عفاف عاطف', NULL, 'C', NULL, NULL, 'GYN', '1000762550', NULL, '11شارع الرصافه محرم بك بجوار مستشفه احمد عبد العزيز', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:12:00', '2015-12-20 14:12:00'),
(407, 'مياده القاضي', NULL, 'C', NULL, NULL, 'GYN', '1286049956', NULL, '75شارع اسماعيل صبرى الجمرك بحرى امام قهوه فاروق', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:12:00', '2015-12-20 14:12:00'),
(408, 'محمود النجار', NULL, 'C', NULL, NULL, 'GYN', '1228886677', NULL, '8شارع المساهميه الدخيله ', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:12:00', '2015-12-20 14:12:00'),
(409, 'مصطفى حامد', NULL, 'A', NULL, NULL, 'GYN', '1222997888', NULL, '22شارع الثانويه العسكريه مرسى مطروح خلف محلات الشعشاعى علم الروم', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:12:00', '2015-12-20 14:12:00'),
(410, 'محمد فتحي خلف', NULL, 'A+', NULL, NULL, 'GYN', '1205533133', NULL, 'العطارين صيدليه الشفاء', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:12:00', '2015-12-20 14:12:00'),
(411, 'نبيل مسعود', NULL, 'A', NULL, NULL, 'GYN', '1005187385', NULL, 'شارع محرم بك صيدليه محرم بك', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:12:01', '2015-12-20 14:12:01'),
(412, 'راند صابر ', NULL, 'A', NULL, NULL, 'GYN', '1227516818', NULL, 'طريق اسكندريه مطروح اكتوبر بجوار مدخل اكتوبر', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:12:01', '2015-12-20 14:12:01'),
(413, 'سلوى مصطفى', NULL, 'A', NULL, NULL, 'VS', '1004011298', NULL, 'خلف الموقف مدينه البرج برج العرب خلف صيدليه عبد الفتاح', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:12:01', '2015-12-20 14:12:01'),
(414, 'حنان حبشى ', NULL, 'A', NULL, NULL, 'VS', '1004011298', NULL, 'شارع الاويد لؤلؤ المتراس', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:12:01', '2015-12-20 14:12:01'),
(415, 'مرفت فتحي', NULL, 'A', NULL, NULL, 'VS', '1004011298', NULL, 'طريق اسكندريه مطروح العجمى ', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:12:01', '2015-12-20 14:12:01'),
(416, 'مها حسين', NULL, 'A', NULL, NULL, 'VS', '1004011298', NULL, 'طريق اسكندريه مطروح العجمى', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:12:01', '2015-12-20 14:12:01'),
(417, 'ايمان القاضى', NULL, 'A', NULL, NULL, 'VS', '1004011298', NULL, 'الحضره سلطنه الحضره', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:12:01', '2015-12-20 14:12:01'),
(418, 'عزه عوف', NULL, 'A', NULL, NULL, 'VS', '1004011298', NULL, 'شارع متفرع من الجواهر الحضره', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:12:01', '2015-12-20 14:12:01'),
(419, 'منى حسان', NULL, 'B', NULL, NULL, 'VS', '1004011298', NULL, 'شارع الامير لؤلؤ المتراس الورديان بجوار صيدليه الامير لؤلؤ', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:12:01', '2015-12-20 14:12:01'),
(420, 'احمد عبد الحميد', NULL, 'A', NULL, NULL, 'VS', '1004011298', NULL, 'شارع القسم العامريه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:12:01', '2015-12-20 14:12:01'),
(421, 'نفين', NULL, 'B', NULL, NULL, 'VS', '1004011298', NULL, 'شارع القسم العامريه', NULL, NULL, NULL, NULL, 3, 0, '2015-12-20 14:12:01', '2015-12-20 14:12:01');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `visit_class`
--

INSERT INTO `visit_class` (`id`, `name`, `visits_count`, `created_at`, `updated_at`) VALUES
(1, 'A', 5, '2015-11-24 11:35:57', '2015-11-24 11:35:57'),
(2, 'B', 4, '2015-11-24 11:35:57', '2015-11-24 11:35:57'),
(3, 'C', 3, '2015-11-24 11:35:57', '2015-11-24 11:35:57'),
(4, 'A+', 6, '2015-11-24 11:35:57', '2015-11-24 11:35:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
 ADD PRIMARY KEY (`id`);

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
-- Indexes for table `ibns`
--
ALTER TABLE `ibns`
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
-- Indexes for table `mr_lines`
--
ALTER TABLE `mr_lines`
 ADD PRIMARY KEY (`id`), ADD KEY `mr_lines_mr_id_foreign` (`mr_id`), ADD KEY `mr_lines_line_id_foreign` (`line_id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
 ADD PRIMARY KEY (`id`), ADD KEY `plan_mr_id_foreign` (`mr_id`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
 ADD PRIMARY KEY (`id`);

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
-- Indexes for table `report_gift`
--
ALTER TABLE `report_gift`
 ADD PRIMARY KEY (`id`), ADD KEY `report_gift_report_id_foreign` (`report_id`), ADD KEY `report_gift_gift_id_foreign` (`gift_id`);

--
-- Indexes for table `report_promoted_product`
--
ALTER TABLE `report_promoted_product`
 ADD PRIMARY KEY (`id`), ADD KEY `report_promoted_product_report_id_foreign` (`report_id`), ADD KEY `report_promoted_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `report_sample_product`
--
ALTER TABLE `report_sample_product`
 ADD PRIMARY KEY (`id`), ADD KEY `report_sample_product_report_id_foreign` (`report_id`), ADD KEY `report_sample_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `report_sold_product`
--
ALTER TABLE `report_sold_product`
 ADD PRIMARY KEY (`id`), ADD KEY `report_sold_product_report_id_foreign` (`report_id`), ADD KEY `report_sold_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `service_request`
--
ALTER TABLE `service_request`
 ADD PRIMARY KEY (`id`), ADD KEY `service_request_mr_id_foreign` (`mr_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
 ADD PRIMARY KEY (`id`), ADD KEY `task_employee_id_foreign` (`employee_id`);

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
-- Indexes for table `ucp`
--
ALTER TABLE `ucp`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `customer_email_unique` (`email`), ADD KEY `customer_mr_id_foreign` (`mr_id`);

--
-- Indexes for table `visit_class`
--
ALTER TABLE `visit_class`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
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
-- AUTO_INCREMENT for table `ibns`
--
ALTER TABLE `ibns`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=309;
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
-- AUTO_INCREMENT for table `mr_lines`
--
ALTER TABLE `mr_lines`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=327;
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
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `report_gift`
--
ALTER TABLE `report_gift`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `report_promoted_product`
--
ALTER TABLE `report_promoted_product`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `report_sample_product`
--
ALTER TABLE `report_sample_product`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `report_sold_product`
--
ALTER TABLE `report_sold_product`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `service_request`
--
ALTER TABLE `service_request`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
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
-- AUTO_INCREMENT for table `ucp`
--
ALTER TABLE `ucp`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3444;
--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=422;
--
-- AUTO_INCREMENT for table `visit_class`
--
ALTER TABLE `visit_class`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
-- Constraints for table `mr_lines`
--
ALTER TABLE `mr_lines`
ADD CONSTRAINT `mr_lines_line_id_foreign` FOREIGN KEY (`line_id`) REFERENCES `line` (`id`),
ADD CONSTRAINT `mr_lines_mr_id_foreign` FOREIGN KEY (`mr_id`) REFERENCES `employee` (`id`);

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
-- Constraints for table `report_gift`
--
ALTER TABLE `report_gift`
ADD CONSTRAINT `report_gift_gift_id_foreign` FOREIGN KEY (`gift_id`) REFERENCES `gift` (`id`),
ADD CONSTRAINT `report_gift_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `report` (`id`);

--
-- Constraints for table `report_promoted_product`
--
ALTER TABLE `report_promoted_product`
ADD CONSTRAINT `report_promoted_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
ADD CONSTRAINT `report_promoted_product_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `report` (`id`);

--
-- Constraints for table `report_sample_product`
--
ALTER TABLE `report_sample_product`
ADD CONSTRAINT `report_sample_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
ADD CONSTRAINT `report_sample_product_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `report` (`id`);

--
-- Constraints for table `report_sold_product`
--
ALTER TABLE `report_sold_product`
ADD CONSTRAINT `report_sold_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
ADD CONSTRAINT `report_sold_product_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `report` (`id`);

--
-- Constraints for table `service_request`
--
ALTER TABLE `service_request`
ADD CONSTRAINT `service_request_mr_id_foreign` FOREIGN KEY (`mr_id`) REFERENCES `employee` (`id`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
ADD CONSTRAINT `task_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`);

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

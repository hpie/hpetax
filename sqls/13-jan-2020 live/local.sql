-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2020 at 01:12 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taxpay`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `admin_user_id` bigint(20) NOT NULL,
  `ip_address` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activation_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgotten_password_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgotten_password_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remember_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `admin_user_status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`admin_user_id`, `ip_address`, `username`, `password`, `email`, `phone`, `first_name`, `last_name`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `last_login`, `admin_user_status`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, '', 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin@gmail.com', '9099384773', 'vasim', 'look', '123456', NULL, '2019-12-17 14:19:18', '123456', '2019-12-17 14:19:18', NULL, '', '2019-05-19 14:32:05', NULL, '2019-12-17 14:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `ip`
--

CREATE TABLE `ip` (
  `ip_id` int(11) NOT NULL,
  `ip_address` varchar(30) NOT NULL,
  `ip_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ip`
--

INSERT INTO `ip` (`ip_id`, `ip_address`, `ip_update`) VALUES
(25, '::1', '2019-06-04 01:21:11'),
(26, '::1', '2019-06-04 14:48:50'),
(27, '::1', '2019-06-11 10:46:03'),
(28, '::1', '2019-11-04 12:14:35'),
(29, '::1', '2019-11-15 05:41:55'),
(30, '::1', '2019-11-19 06:28:22'),
(31, '::1', '2019-11-19 06:28:26'),
(32, '::1', '2019-11-19 06:28:29'),
(33, '::1', '2019-11-20 09:47:30'),
(34, '::1', '2019-11-20 12:09:18'),
(35, '::1', '2019-11-21 04:19:14'),
(36, '::1', '2019-11-21 04:19:18'),
(37, '::1', '2019-11-21 05:46:46'),
(38, '::1', '2019-11-21 10:51:07'),
(39, '::1', '2019-11-29 07:12:50'),
(40, '::1', '2019-12-02 14:59:51'),
(41, '::1', '2019-12-02 14:59:58'),
(42, '::1', '2019-12-02 15:00:01'),
(43, '::1', '2019-12-10 05:08:43'),
(44, '::1', '2019-12-10 05:08:46'),
(45, '::1', '2019-12-11 16:37:25'),
(46, '::1', '2019-12-11 17:47:03'),
(47, '::1', '2019-12-11 17:47:07'),
(48, '::1', '2019-12-11 17:47:11'),
(49, '::1', '2019-12-12 13:36:04'),
(50, '::1', '2019-12-12 13:36:08'),
(51, '::1', '2019-12-12 13:36:12'),
(52, '::1', '2019-12-14 09:47:45'),
(53, '::1', '2019-12-14 10:11:07'),
(54, '::1', '2019-12-14 14:32:16'),
(55, '::1', '2019-12-17 14:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `tax_challan`
--

CREATE TABLE `tax_challan` (
  `tax_challan_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'not an auto incriment value',
  `tax_challan_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_depositors_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_depositors_phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_depositors_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tax_depositors_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_depositors_city` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Post Code of Depisitor',
  `tax_depositors_zip` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Post Code of Depisitor',
  `tax_challan_location` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_challan_duration` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'daily , week month',
  `tax_challan_from_dt` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_challan_to_dt` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_challan_purpose` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_challan_amount` double(10,2) NOT NULL DEFAULT '0.00',
  `tax_transaction_no` bigint(20) NOT NULL COMMENT 'from transaction table tax_transaction_queue',
  `tax_transaction_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'PENDING' COMMENT '''FAILURE'' ''SUCCESS'' ''PENDING'' ''AWAITNG CONFIRMATION''',
  `tax_challan_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `tax_type_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Foreign Key from tax_type',
  `tax_dealer_id` bigint(20) NOT NULL COMMENT 'Foreign key from tax_dealer',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tax_challan`
--

INSERT INTO `tax_challan` (`tax_challan_id`, `tax_challan_title`, `tax_depositors_name`, `tax_depositors_phone`, `tax_depositors_email`, `tax_depositors_address`, `tax_depositors_city`, `tax_depositors_zip`, `tax_challan_location`, `tax_challan_duration`, `tax_challan_from_dt`, `tax_challan_to_dt`, `tax_challan_purpose`, `tax_challan_amount`, `tax_transaction_no`, `tax_transaction_status`, `tax_challan_status`, `tax_type_id`, `tax_dealer_id`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
('154847728852373066', 'dummy', 'central bank of india', '9099384773', 'vasimlook@gmail.com', 'bajar visatar, kareli, surat, gangadhara Rs, gujar', 'surat', '394310', 'BILASPUR - BLP00-509', 'daily', '2020-01-13', '2020-01-13', 'dummy', 2.00, 0, 'PENDING', 'ACTIVE', 'AG', 0, 'vasim', '2020-01-13 06:20:54', 'vasim', '2020-01-13 06:20:54'),
('166706387743707200268', 'dummy', 'central bank of india', '9099384773', 'vasimlook@gmail.com', 'bajar visatar, kareli, surat, gangadhara Rs, gujar', 'surat', '394310', 'DELHI - DLI00-509', 'daily', '2020-01-13', '2020-01-13', 'dummy', 5.00, 0, 'PENDING', 'ACTIVE', 'CGCR', 0, 'vasim', '2020-01-13 07:21:53', 'vasim', '2020-01-13 07:21:53'),
('1843453603396288000', 'dummy', 'central bank of india', '9099384773', 'vasimlook@gmail.com', 'bajar visatar, kareli, surat, gangadhara Rs, gujar', 'surat', '394310', 'CHAMBA - CHM00-509', 'daily', '2020-01-13', '2020-01-13', 'dummy', 2.00, 0, 'PENDING', 'ACTIVE', 'AG', 0, 'vasim', '2020-01-13 06:28:47', 'vasim', '2020-01-13 06:28:47'),
('18812177832210828802', 'dummy', 'central bank of india', '9099384773', 'vasimlook@gmail.com', 'bajar visatar, kareli, surat, gangadhara Rs, gujar', 'surat', '394310', 'BILASPUR', 'daily', '2019-12-04', '2019-12-04', 'dummy', 273.00, 0, 'SUCCESS', 'ACTIVE', 'AG', 0, 'vasim', '2019-12-04 05:58:52', 'vasim', '2019-12-06 12:13:44'),
('19104434555315628880', 'dummy', 'central bank of india', '9099384773', 'vasimlook@gmail.com', 'bajar visatar, kareli, surat, gangadhara Rs, gujar', 'surat', '394310', 'DELHI - DLI00-509', 'daily', '2020-01-13', '2020-01-13', 'dummy', 5.00, 0, 'PENDING', 'ACTIVE', 'CGCR', 0, 'vasim', '2020-01-13 07:21:00', 'vasim', '2020-01-13 07:21:00'),
('20934552436215416680', 'dummy', 'central bank of india', '9099384773', 'vasimlook@gmail.com', 'bajar visatar, kareli, surat, gangadhara Rs, gujar', 'surat', '394310', 'DELHI - DLI00-509', 'daily', '2020-01-13', '2020-01-13', 'dummy', 5.00, 0, 'PENDING', 'ACTIVE', 'CGCR', 0, 'vasim', '2020-01-13 07:19:54', 'vasim', '2020-01-13 07:19:54'),
('21216496705681580822', 'dummy', 'central bank of india', '9099384773', 'vasimlook@gmail.com', 'bajar visatar, kareli, surat, gangadhara Rs, gujar', 'surat', '394310', 'BILASPUR - BLP00-509', 'daily', '2020-01-13', '2020-01-13', 'dummy', 50.00, 0, 'PENDING', 'ACTIVE', 'CGCR', 0, 'vasim', '2020-01-13 06:14:15', 'vasim', '2020-01-13 06:14:15'),
('25618296805083424020', 'dummy', 'central bank of india', '9099384773', 'vasimlook@gmail.com', 'bajar visatar, kareli, surat, gangadhara Rs, gujar', 'surat', '394310', 'DELHI - DLI00-509', 'daily', '2020-01-13', '2020-01-13', 'dummy', 5.00, 0, 'PENDING', 'ACTIVE', 'CGCR', 0, 'vasim', '2020-01-13 06:58:44', 'vasim', '2020-01-13 06:58:44'),
('28256868653372824600', 'dummy', 'central bank of india', '9099384773', 'vasimlook@gmail.com', 'bajar visatar, kareli, surat, gangadhara Rs, gujar', 'surat', '394310', 'BILASPUR - BLP00-509', 'daily', '2020-01-13', '2020-01-13', 'dummy', 2.00, 0, 'PENDING', 'ACTIVE', 'AG', 0, 'vasim', '2020-01-13 06:20:36', 'vasim', '2020-01-13 06:20:36'),
('29410550727668440648', 'dummy', 'central bank of india', '9099384773', '', 'bajar visatar, kareli, surat, gangadhara Rs, gujar', 'surat', '394310', 'BILASPUR - BLP00-509', 'daily', '2019-12-04', '2019-12-04', 'dummy', 5.00, 0, 'PENDING', 'ACTIVE', 'AG', 0, 'vasim', '2019-12-04 14:01:36', 'vasim', '2019-12-04 14:01:36'),
('38659821988378736826', 'dummy', 'central bank of india', '9099384773', 'vasimlook@gmail.com', 'bajar visatar, kareli, surat, gangadhara Rs, gujar', 'surat', '394310', 'BILASPUR - BLP00-509', 'daily', '2019-12-14', '2019-12-14', 'dummy', 20.00, 0, 'PENDING', 'ACTIVE', 'AG', 0, 'vasim', '2019-12-14 05:51:47', 'vasim', '2019-12-14 05:51:47'),
('42907537774241584200', 'dummy', 'central bank of india', '9099384773', 'vasimlook@gmail.com', 'bajar visatar, kareli, surat, gangadhara Rs, gujar', 'surat', '394310', 'DELHI - DLI00-509', 'daily', '2020-01-13', '2020-01-13', 'dummy', 5.00, 0, 'PENDING', 'ACTIVE', 'CGCR', 0, 'vasim', '2020-01-13 07:21:33', 'vasim', '2020-01-13 07:21:33'),
('45006045042024416082', 'dummy', 'central bank of india', '9099384773', 'vasimlook@gmail.com', 'bajar visatar, kareli, surat, gangadhara Rs, gujar', 'surat', '394310', 'DELHI - DLI00-509', 'daily', '2020-01-13', '2020-01-13', 'dummy', 5.00, 0, 'PENDING', 'ACTIVE', 'CGCR', 0, 'vasim', '2020-01-13 06:59:00', 'vasim', '2020-01-13 06:59:00'),
('46731724709620224004', 'dummy', 'central bank of india', '9099384773', 'vasimlook@gmail.com', 'bajar visatar, kareli, surat, gangadhara Rs, gujar', 'surat', '394310', 'CHAMBA - CHM00-509', 'daily', '2020-01-13', '2020-01-13', 'dummy', 2.00, 0, 'PENDING', 'ACTIVE', 'AG', 0, 'vasim', '2020-01-13 06:28:33', 'vasim', '2020-01-13 06:28:33'),
('46798383086703098820', 'dummy', 'central bank of india', '9099384773', '', 'bajar visatar, kareli, surat, gangadhara Rs, gujar', 'surat', '394310', 'BILASPUR', 'daily', '2019-12-04', '2019-12-04', 'dummy', 273.00, 0, 'PENDING', 'ACTIVE', 'AG', 0, 'vasim', '2019-12-04 05:58:15', 'vasim', '2019-12-04 05:58:15'),
('47523133741315992606', 'dummy', 'central bank of india', '9099384773', '', 'bajar visatar, kareli, surat, gangadhara Rs, gujar', 'surat', '394310', 'BILASPUR - BLP00-509', 'daily', '2019-12-04', '2019-12-04', 'dummy', 5.00, 0, 'PENDING', 'ACTIVE', 'AG', 0, 'vasim', '2019-12-04 14:02:19', 'vasim', '2019-12-04 14:02:19'),
('56867960154371552088', 'dummy', 'central bank of india', '9099384773', 'vasimlook@gmail.com', 'bajar visatar, kareli, surat, gangadhara Rs, gujar', 'surat', '394310', 'BILASPUR - BLP00-509', 'daily', '2019-12-30', '2020-01-03', 'dummy', 5.00, 0, 'PENDING', 'ACTIVE', 'AG', 0, 'vasim', '2019-12-04 14:21:22', 'vasim', '2019-12-04 14:21:22');

-- --------------------------------------------------------

--
-- Table structure for table `tax_challan_item`
--

CREATE TABLE `tax_challan_item` (
  `tax_challan_item_id` bigint(20) NOT NULL,
  `tax_type_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tax_commodity_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_vehicle_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tax_item_weight` int(11) NOT NULL,
  `tax_item_weight_units` int(11) NOT NULL,
  `tax_item_quantity` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tax_item_quantity_units` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tax_item_source_location` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tax_item_destination_location` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tax_item_distanceinkm` int(11) NOT NULL,
  `tax_item_tax_amount` double(10,2) NOT NULL DEFAULT '0.00',
  `tax_item_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `tax_challan_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tax_commodity_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Foreign Key from tax_commodity',
  `tax_type_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Foreign Key from tax_type',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tax_challan_item`
--

INSERT INTO `tax_challan_item` (`tax_challan_item_id`, `tax_type_name`, `tax_commodity_name`, `tax_vehicle_number`, `tax_item_weight`, `tax_item_weight_units`, `tax_item_quantity`, `tax_item_quantity_units`, `tax_item_source_location`, `tax_item_destination_location`, `tax_item_distanceinkm`, `tax_item_tax_amount`, `tax_item_status`, `tax_challan_id`, `tax_commodity_id`, `tax_type_code`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, 'Additional Goods Tax', 'Carpets of all types', 'gj190661', 20, 0, '', '', 'Shimla, Himachal Pra', 'Shimla, Himachal Pra', 1, 20.00, 'ACTIVE', '38659821988378736826', 'CARPET_10', 'AG', 'SYSTEM', '2019-12-14 05:51:47', 'SYSTEM', '2019-12-14 05:51:47'),
(2, 'Additional Goods Tax', 'Carpets of all types', 'gj190661', 5, 0, '', '', 'Shimla, Himachal Pra', 'Shimla, Himachal Pra', 1, 5.00, 'ACTIVE', '29410550727668440648', 'CARPET_10', 'AG', 'SYSTEM', '2019-12-04 14:01:36', 'SYSTEM', '2019-12-04 14:01:36'),
(3, 'Additional Goods Tax', 'Carpets of all types', 'gj190661', 5, 0, '', '', 'Shimla, Himachal Pra', 'Shimla, Himachal Pra', 1, 5.00, 'ACTIVE', '56867960154371552088', 'CARPET_10', 'AG', 'SYSTEM', '2019-12-04 14:21:22', 'SYSTEM', '2019-12-04 14:21:22'),
(4, 'Additional Goods Tax', 'Carpets of all types', 'gj190661', 10, 0, '', '', 'Shimla, Himachal Pra', 'Solan, Himachal Prad', 45, 10.00, 'ACTIVE', '46798383086703098820', 'CARPET_10', 'AG', 'SYSTEM', '2019-12-04 05:58:15', 'SYSTEM', '2019-12-04 05:58:15'),
(5, 'Additional Goods Tax', 'Fly Ash', 'gj190661', 10, 0, '', '', 'Shimla, Himachal Pra', 'Solan, Himachal Prad', 45, 262.50, 'ACTIVE', '46798383086703098820', 'FLYASH', 'AG', 'SYSTEM', '2019-12-04 05:58:15', 'SYSTEM', '2019-12-04 05:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `tax_commodity`
--

CREATE TABLE `tax_commodity` (
  `tax_commodity_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'not an auto incriment value',
  `tax_commodity_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_commodity_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax_commodity_rate` double(10,2) NOT NULL DEFAULT '0.00',
  `tax_commodity_rate_unit` int(11) NOT NULL DEFAULT '10' COMMENT 'minimum requires and in multiples of',
  `tax_commodity_unit_measure` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Kg' COMMENT 'pull from central table',
  `tax_commodity_taxcalculation` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'BY_WEIGHT' COMMENT 'By_Weight, By_Count, Flat_Rate',
  `tax_commodity_isdistancedependent` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `tax_commodity_subhead` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tax Collection Sub-Heads ',
  `tax_commodity_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `tax_type_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Foreign Key from tax_type',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tax_commodity`
--

INSERT INTO `tax_commodity` (`tax_commodity_id`, `tax_commodity_name`, `tax_commodity_description`, `tax_commodity_rate`, `tax_commodity_rate_unit`, `tax_commodity_unit_measure`, `tax_commodity_taxcalculation`, `tax_commodity_isdistancedependent`, `tax_commodity_subhead`, `tax_commodity_status`, `tax_type_id`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
('APPLE_BOX_10', 'Apples contained in the boxes upto 10 Kg.', 'Apples contained in the boxes upto 10 Kg.: Rs. 0.50 per box	', 0.50, 1, 'Boxes', 'BY_COUNT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('APPLE_BOX_20', 'Apples contained in the boxes of more than 10 Kg a', 'Apples contained in the boxes of more than 10 Kg and upto 20 Kg.:Rs. 1.00 per box	', 1.00, 1, 'Boxes', 'BY_COUNT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('APPLE_LOOSE_10', 'Apples contained in any other packing or loose 10 ', 'Apples contained in any other packing or loose 10 Kg.:Rs.0.50 per Kg	', 0.50, 10, 'Kg', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('BAJARI', 'Bajri', 'Bajri : Rs. 10 Per Ton	', 10.00, 1, 'Ton', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('BANANA_10', 'Bananas', 'Bananas: Rs. 0.50 per 10 Kg	', 0.50, 10, 'Kg', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('BIG_BUS', 'Big Bus', 'Big Bus', 9000.00, 1, 'NA', 'FLAT_RATE', 'NO', '00-103', 'ACTIVE', 'PGT', '', '2019-12-03 18:34:27', NULL, '2019-12-03 18:34:27'),
('BRICKBATS', 'Brick bats', 'Brick bats: Rs. 22.00 per Ton	', 22.00, 1, 'Ton', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('BRICKS_1000', 'Bricks', 'Bricks: Rs 65 Per Thousand Unit	', 65.00, 1000, 'Units', 'BY_COUNT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('BUS_DELUXE', 'Deluxe Bus Services', 'Deluxe Bus Services', 0.69, 1, 'Count', 'BY_COUNT', 'YES', '00-103', 'ACTIVE', 'PTCG', '', '2019-12-03 18:43:03', NULL, '2019-12-03 18:43:03'),
('BUS_NIGHT_EXP', 'Night Express Services', 'Night Express Services', 0.49, 1, 'Count', 'BY_COUNT', 'YES', '00-103', 'ACTIVE', 'PTCG', '', '2019-12-03 18:43:03', NULL, '2019-12-03 18:43:03'),
('BUS_ORDINARY', 'Ordinary Bus Services', 'Ordinary Bus Services', 0.35, 1, 'Count', 'BY_COUNT', 'YES', '00-103', 'ACTIVE', 'PTCG', '', '2019-12-03 18:43:03', NULL, '2019-12-03 18:43:03'),
('BUS_SEMI_DELUXE', 'Semi Deluxe Bus Services', 'Semi Deluxe Bus Services', 0.52, 1, 'Count', 'BY_COUNT', 'YES', '00-103', 'ACTIVE', 'PTCG', '', '2019-12-03 18:43:03', NULL, '2019-12-03 18:43:03'),
('CARPET_10', 'Carpets of all types', 'Carpets of all types : Rs. 10 per 10 kg or part thereof	', 10.00, 10, 'Kg', 'BY_WEIGHT', 'NO', '00-104', 'ACTIVE', 'AG', '', '2019-12-03 18:20:06', NULL, '2019-12-03 18:20:06'),
('CEMENT_50', 'Cement', 'Cement: Rs.7.50 per bag of 50 Kg	', 7.50, 1, 'Bag', 'BY_COUNT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('CITRUS_10', 'Mandrin, Sweet Oranges including Kinnu', 'Mandrin, Sweet Oranges including Kinnu: Rs. 0.50 per 10 Kg	', 0.50, 10, 'Kg', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('CLINKER', 'Clinker', 'Clinker: Rs. 160.00 per Ton	', 160.00, 1, 'Ton', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('CONDUCTOR_10', 'All types of Conductors and aluminium wire rods', 'All types of Conductors and aluminium wire rods : Rs. 1.50 per 10 kg or part thereof	', 1.50, 10, 'Kg', 'BY_WEIGHT', 'NO', '00-104', 'ACTIVE', 'AG', '', '2019-12-03 18:20:06', NULL, '2019-12-03 18:20:06'),
('DRINKING_WATER_PKD', 'Packaged drinking water', 'Packaged drinking water: Rs. 2.00 per 10 litre	', 2.00, 1, 'Lts', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('EXPLOSIVE_10', 'Prepared explosive, safety fuses, detonatingfuses,', 'Prepared explosive, safety fuses, detonating  fuses, detonating caps, detonators and propellant powder: Rs. 5.00 per 10 Kg	', 5.00, 10, 'Kg', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('FLYASH', 'Fly Ash', 'Fly Ash : Rs. 26.25 per Ton	', 26.25, 1, 'Ton', 'BY_WEIGHT', 'NO', '00-104', 'ACTIVE', 'AG', '', '2019-12-03 18:20:06', NULL, '2019-12-03 18:20:06'),
('FOREST_BHABAR_5', 'Other Forest Produce: Bhabar Grass', 'Other Forest Produce: Bhabar Grass : Rs. 5.00 per quintal	', 5.00, 1, 'Quintal', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('FOREST_CHILGOZA_10', 'Other Forest Produce: Juglansregia (Akhrot bark an', 'Other Forest Produce: Juglansregia (Akhrot bark and fruit), or Violserpens Violaodorata (Banafsha)and Chilgoza: Rs. 10.00 per 10 Kg	', 10.00, 10, 'Kg', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('FOREST_DHOOP_10', 'Other Forest Produce: Centiana Karu (Kaur), Jurine', 'Other Forest Produce: Centiana Karu (Kaur), Jurinea or Macrorephila (Dhoop)Picrothiza Karrosa (Kaur, Karu): Rs. 5.00 per 10 Kg	', 5.00, 10, 'Kg', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('FOREST_FUEL_WOOD', 'Forest produce: Fuel Wood and Chil Pulpwood', 'Forest produce: Fuel Wood and Chil Pulpwood: Rs. 10.00 per quintal	', 10.00, 1, 'Quintal', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('FOREST_GUCHHI_10', 'Other Forest Produce: Marchella Esculents (Guchhi)', 'Other Forest Produce: Marchella Esculents (Guchhi): Rs. 30 per 10 Kg	', 30.00, 10, 'Kg', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('FOREST_KATHA_10', 'Other Forest Produce: Carum Carvi (Kala Zeera and ', 'Other Forest Produce: Carum Carvi (Kala Zeera and Katha ) (excluding Kutch): Rs. 30 per 10 Kg	', 30.00, 10, 'Kg', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('FOREST_KHAIR', 'Forest produce: Khair Wood (including rots or in a', 'Forest produce: Khair Wood (including rots or in any other form): Rs. 90.00 per quintal	', 90.00, 1, 'Quintal', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('FOREST_KUTCH_10', 'Other Forest Produce: Kutch', 'Other Forest Produce: Kutch: Rs. 1.70 per 10 Kg	', 1.70, 10, 'Kg', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('FOREST_RAUWELFIA_10', 'Other Forest Produce: Rauwelfia Serpantina (Rauwel', 'Other Forest Produce: Rauwelfia Serpantina (Rauwelfia): Rs. 75 per 10 Kg	', 75.00, 10, 'Kg', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('FOREST_RESIN_10', 'Other Forest Produce: Bamboo, Barberies,Emblica of', 'Other Forest Produce: Bamboo, Barberies,Emblica offcianale or (Amla fruit) and Resin :  Rs. 2.00 per 10 Kg	', 2.00, 10, 'Kg', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('FOREST_RETHA_10', 'Other Forest Produce: Diescoreca, Saussure lappa (', 'Other Forest Produce: Diescoreca, Saussure lappa (Kuth) Retha: Rs. 4.00 per 10 Kg	', 4.00, 10, 'Kg', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('FOREST_SEEDS_10', 'Seeds: Seeds of all forest species like Deodar,Kai', 'Seeds: Seeds of all forest species like Deodar,Kail,Chil and Broad leaved species : Rs. 10.00 per 10 Kg	', 10.00, 10, 'Kg', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('FOREST_TIMBER', 'Forest produce: Timber (Sawn, Hakries, Dimdimas, l', 'Forest produce: Timber (Sawn, Hakries, Dimdimas, logs)  Ballies and Rough Axed of All sizes : Rs. 65.00 per cum	', 65.00, 1, 'Cubic Mete', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('GRAPE_10', 'Grapes', 'Grapes: Rs. 0.50 per 10 Kg	', 0.50, 10, 'Kg', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('IRON_STEEL', 'Iron and Steel', 'Iron and Steel : Rs. 5.00 per Kg or part thereof	', 5.00, 1, 'Kg', 'BY_WEIGHT', 'NO', '00-104', 'ACTIVE', 'AG', '', '2019-12-03 18:20:06', NULL, '2019-12-03 18:20:06'),
('LIMESTONE', 'Lime Stone', 'Lime Stone : Rs. 26.25 Per Ton	', 26.25, 1, 'Ton', 'BY_WEIGHT', 'NO', '00-104', 'ACTIVE', 'AG', '', '2019-12-03 18:20:06', NULL, '2019-12-03 18:20:06'),
('LIMESTONE_CHIPS_10', 'Lime Stone Chips', 'Lime Stone Chips : Rs. 0.07 per 10 kg or part thereof	', 0.07, 10, 'Kg', 'BY_WEIGHT', 'NO', '00-104', 'ACTIVE', 'AG', '', '2019-12-03 18:20:06', NULL, '2019-12-03 18:20:06'),
('MANGO_10', 'Mangoes', 'Mangoes: Rs. 0.50 per 10 Kg	', 0.50, 10, 'Kg', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('MARBLE_10', 'Granite and Marble including Marble Chips and Piec', 'Granite and Marble including Marble Chips and Pieces : Rs. 0.75 per 10 kg or part thereof	', 0.75, 10, 'Kg', 'BY_WEIGHT', 'NO', '00-104', 'ACTIVE', 'AG', '', '2019-12-03 18:20:06', NULL, '2019-12-03 18:20:06'),
('MINERALS', 'Other minerals (excludingBarytes, Shale and Rock S', 'Other minerals (excluding  Barytes, Shale and Rock Salt): Rs. 7 Per Ton	', 7.00, 1, 'Ton', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('MINI_BUS', 'Mini Bus', 'Mini Bus', 7200.00, 1, 'NA', 'FLAT_RATE', 'NO', '00-103', 'ACTIVE', 'PGT', '', '2019-12-03 18:34:27', NULL, '2019-12-03 18:34:27'),
('OTHER_FRUIT_10', 'All other fruits', 'All other fruits: Rs. 0.50 per 10 Kg	', 0.50, 10, 'Kg', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('PEAR_10', 'Pears', 'Pears: Rs. 0.50 per 10 Kg	', 0.50, 10, 'Kg', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('PLASTIC', 'Plastic goods,sheets,pipes films and mouldings exc', 'Plastic goods,sheets,pipes films and mouldings excluding plastic footwear,plastic chips,plastic powder and plastic granules : Rs. 0.75 per kg or part thereof	', 0.75, 1, 'Kg', 'BY_WEIGHT', 'NO', '00-104', 'ACTIVE', 'AG', '', '2019-12-03 18:20:06', NULL, '2019-12-03 18:20:06'),
('POTATO_10', 'Potatoes', 'Potatoes: Rs. 0.25 per 10 Kg	', 0.25, 10, 'Kg', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('ROCKSALT', 'Barytes shale and Rock salt', 'Barytes shale and Rock salt : Rs. 7 per Ton	', 7.00, 1, 'Ton', 'BY_WEIGHT', 'NO', '00-104', 'ACTIVE', 'AG', '', '2019-12-03 18:20:06', NULL, '2019-12-03 18:20:06'),
('SAND', 'Sand', 'Sand : Rs. 10 Per Ton	', 10.00, 1, 'Ton', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('SEATS_7_8', 'Having seats between 7-8', 'Having seats between 7-8', 5350.00, 1, 'NA', 'FLAT_RATE', 'NO', '00-103', 'ACTIVE', 'PGT', '', '2019-12-03 18:34:27', NULL, '2019-12-03 18:34:27'),
('SEATS_9_12', 'Having seats between 9 - 12', 'Having seats between 9 - 12', 8000.00, 1, 'NA', 'FLAT_RATE', 'NO', '00-103', 'ACTIVE', 'PGT', '', '2019-12-03 18:34:27', NULL, '2019-12-03 18:34:27'),
('STONE_FRUIT_10', 'Apricots, Peaches, Plums', 'Apricots, Peaches, Plums: Rs. 0.50 per 10 Kg	', 0.50, 10, 'Kg', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('TERMINALIA_10', 'Terminalia Chebula(Harar fruit) and Terminalia Bel', 'Terminalia Chebula(Harar fruit) and Terminalia Belerica(Behra fruit)  : Rs. 4 per 10 kg or part thereof	', 4.00, 10, 'Kg', 'BY_WEIGHT', 'NO', '00-104', 'ACTIVE', 'AG', '', '2019-12-03 18:20:06', NULL, '2019-12-03 18:20:06'),
('TOBACCO', 'Tobacoo in all forms, including Pan Masala, Pan Ch', 'Tobacoo in all forms, including Pan Masala, Pan Chatney and Preparations containing Tobacoo or,  Tobacoo substitutes: Rs. 3.00 per Kg	', 3.00, 1, 'Kg', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('VEGETABLE_10', 'All other vegetables', 'All other vegetables: Rs. 0.25 per 10 Kg	', 0.25, 10, 'Kg', 'BY_WEIGHT', 'NO', '00-800', 'ACTIVE', 'CGCR', '', '2019-12-03 17:32:31', NULL, '2019-12-03 17:32:31'),
('VEHICLE_100_1000', 'Cars/Vehicles upto 1000CC', 'Cars/Vehicles upto 1000CC', 1350.00, 1, 'NA', 'FLAT_RATE', 'NO', '00-103', 'ACTIVE', 'PGT', '', '2019-12-03 18:34:27', NULL, '2019-12-03 18:34:27'),
('VEHICLE_1000_1500', 'Cars/Vehicles above 1000CC and upto 1500CC', 'Cars/Vehicles above 1000CC and upto 1500CC', 2400.00, 1, 'NA', 'FLAT_RATE', 'NO', '00-103', 'ACTIVE', 'PGT', '', '2019-12-03 18:34:27', NULL, '2019-12-03 18:34:27'),
('VEHICLE_ABOVE_1500', 'Cars/Vehicles above 1500CC', 'Cars/Vehicles above 1500CC', 2800.00, 1, 'NA', 'FLAT_RATE', 'NO', '00-103', 'ACTIVE', 'PGT', '', '2019-12-03 18:34:27', NULL, '2019-12-03 18:34:27'),
('WEIGHT_1_10', 'Less than 10 quintals', 'Less than 10 quintals', 1000.00, 1, 'NA', 'FLAT_RATE', 'NO', '00-103', 'ACTIVE', 'PGT', '', '2019-12-03 18:34:27', NULL, '2019-12-03 18:34:27'),
('WEIGHT_10_20', 'Between 10 - 20 quintals', 'Between 10 - 20 quintals', 2000.00, 1, 'NA', 'FLAT_RATE', 'NO', '00-103', 'ACTIVE', 'PGT', '', '2019-12-03 18:34:27', NULL, '2019-12-03 18:34:27'),
('WEIGHT_20_30', 'Between 20 - 30 quintals (6 tyres)', 'Between 20 - 30 quintals (6 tyres)', 3000.00, 1, 'NA', 'FLAT_RATE', 'NO', '00-103', 'ACTIVE', 'PGT', '', '2019-12-03 18:34:27', NULL, '2019-12-03 18:34:27'),
('WEIGHT_30_120', 'Between 30 - 120 quintals', 'Between 30 - 120 quintals(10-18 tyres)', 6000.00, 1, 'NA', 'FLAT_RATE', 'NO', '00-103', 'ACTIVE', 'PGT', '', '2019-12-03 18:34:27', NULL, '2019-12-03 18:34:27'),
('WEIGHT_ABOVE_120', 'Above 120 quintals (10-18 tyres)', 'Above 120 quintals (10-18 tyres)', 10000.00, 1, 'NA', 'FLAT_RATE', 'NO', '00-103', 'ACTIVE', 'PGT', '', '2019-12-03 18:34:27', NULL, '2019-12-03 18:34:27'),
('YARN_10', 'All type of yarn(excluding woolen yarn)', 'All type of yarn(excluding woolen yarn) : Rs. 3.00 per 10 kg or part thereof	', 3.00, 10, 'Kg', 'BY_WEIGHT', 'NO', '00-104', 'ACTIVE', 'AG', '', '2019-12-03 18:20:06', NULL, '2019-12-03 18:20:06');

-- --------------------------------------------------------

--
-- Table structure for table `tax_dealer`
--

CREATE TABLE `tax_dealer` (
  `tax_dealer_id` bigint(20) NOT NULL,
  `tax_dealer_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tax_dealer_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'not an auto incriment value will assigned by the department',
  `tax_dealer_password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_dealer_tin` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tin Number',
  `tax_dealer_tin_expiry` date NOT NULL COMMENT 'Tin Validity',
  `tax_dealer_mobile` varchar(12) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Registered Mobile number',
  `tax_dealer_pan` varchar(12) COLLATE utf8_unicode_ci NOT NULL COMMENT 'PAN number',
  `tax_dealer_aadhar` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Aadhar number',
  `tax_dealer_security_q` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Password retrival Security question',
  `tax_dealer_security_a` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Password retrival Security answer',
  `tax_dealer_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_dealer_lastlogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tax_delaer_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tax_dealer`
--

INSERT INTO `tax_dealer` (`tax_dealer_id`, `tax_dealer_name`, `tax_dealer_code`, `tax_dealer_password`, `tax_dealer_tin`, `tax_dealer_tin_expiry`, `tax_dealer_mobile`, `tax_dealer_pan`, `tax_dealer_aadhar`, `tax_dealer_security_q`, `tax_dealer_security_a`, `tax_dealer_email`, `tax_dealer_lastlogin`, `tax_delaer_status`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, 'vasim', '123456789', 'e10adc3949ba59abbe56e057f20f883e', '123456789123', '2019-12-31', '9099384773', '', '', '', '', 'vasimlook@gmail.com', '2019-12-14 15:00:52', 'ACTIVE', '', '2019-12-12 13:33:23', NULL, '2019-12-14 15:00:52'),
(2, 'central bank of india', '', '', '1234567891010', '2019-12-14', '8099384773', '', '', '', '', 'v1asimlook@gmail.com', '2019-12-14 14:58:59', 'ACTIVE', '', '2019-12-14 14:58:59', NULL, '2019-12-14 14:58:59');

-- --------------------------------------------------------

--
-- Table structure for table `tax_edt_invoice`
--

CREATE TABLE `tax_edt_invoice` (
  `tax_edt_invoice_id` bigint(20) NOT NULL,
  `invoice_no` varchar(20) DEFAULT NULL COMMENT 'Presented Invoice Number',
  `invoice_date` datetime DEFAULT NULL COMMENT 'Presented Invoice Date',
  `invoice_amount` double DEFAULT NULL COMMENT 'Invoice amount on the presented invoice',
  `vehicle_number` varchar(20) DEFAULT NULL COMMENT 'Vehicle number at the time of inspection',
  `transaction_type` varchar(20) DEFAULT NULL COMMENT 'Should be a foreign Key from Master Table',
  `consigner_gst` varchar(20) DEFAULT NULL,
  `consigner_firm_name` varchar(255) DEFAULT NULL,
  `consigner_firm_address` varchar(255) DEFAULT NULL,
  `consignee_gst` varchar(20) DEFAULT NULL,
  `consignee_firm_name` varchar(255) DEFAULT NULL,
  `consignee_bill_to` varchar(255) DEFAULT NULL,
  `consignee_ship_to` varchar(255) DEFAULT NULL,
  `identification_type` varchar(20) DEFAULT NULL COMMENT 'AADHAAR, DRIVING LISENCE, PAN, Should be a foreign Key from Master Table',
  `identification_number` varchar(50) DEFAULT NULL COMMENT 'Identification number presented by Unregistered User',
  `is_registered` int(1) DEFAULT '0' COMMENT '0 - unregistered, 1 - registered',
  `tax_dealer_code` varchar(100) DEFAULT NULL COMMENT 'Dealer code from tax_dealer table',
  `inspected_date` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Date when inspected',
  `tax_employee_code` varchar(20) NOT NULL COMMENT 'Employee code of who did the inspection',
  `created_by` int(11) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax_edt_invoice`
--

INSERT INTO `tax_edt_invoice` (`tax_edt_invoice_id`, `invoice_no`, `invoice_date`, `invoice_amount`, `vehicle_number`, `transaction_type`, `consigner_gst`, `consigner_firm_name`, `consigner_firm_address`, `consignee_gst`, `consignee_firm_name`, `consignee_bill_to`, `consignee_ship_to`, `identification_type`, `identification_number`, `is_registered`, `tax_dealer_code`, `inspected_date`, `tax_employee_code`, `created_by`, `created_date`) VALUES
(1, '123', '2019-12-03 00:00:00', 100, 'gj1906612', 'AG', '54564', '4564564asas', 'asasas54545,sas 54', 'asa54', 'as54as54as45', 'a64sas4', 'as5a4s5a4s', 'a65s4as', 'asa54s', 1, '123456789', '2019-12-16 19:43:04', '123456789', NULL, '2019-12-16 14:13:04'),
(2, '1234', '2019-12-03 00:00:00', 100, 'gj190661', 'CGA', '54564', '4564564asas', 'asasas54545,sas 54', 'asa54', 'as54as54as45', 'a64sas4', 'as5a4s5a4s', 'a65s4as', 'asa54s', 1, '123456789', '2019-12-16 19:43:04', '123456789', NULL, '2019-12-16 14:13:04');

-- --------------------------------------------------------

--
-- Table structure for table `tax_employee`
--

CREATE TABLE `tax_employee` (
  `tax_employee_id` bigint(20) NOT NULL,
  `tax_employee_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'not an auto incriment value will assigned by the department',
  `tax_employee_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tax_employee_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Employee name',
  `tax_employee_mobile` varchar(12) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Registered Mobile number',
  `tax_employee_security_q` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Password retrival Security question',
  `tax_employee_security_a` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Password retrival Security answer',
  `tax_employee_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_employee_lastlogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tax_employee_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tax_employee`
--

INSERT INTO `tax_employee` (`tax_employee_id`, `tax_employee_code`, `tax_employee_password`, `tax_employee_name`, `tax_employee_mobile`, `tax_employee_security_q`, `tax_employee_security_a`, `tax_employee_email`, `tax_employee_lastlogin`, `tax_employee_status`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, '123456', 'e10adc3949ba59abbe56e057f20f883e', 'vasim', '9099384773', 'Born place', 'gangadhara', 'vasimlook@gmail.com', '2019-12-14 15:15:11', 'INACTIVE', '', '2019-12-14 09:48:16', NULL, '2019-12-14 15:15:11'),
(2, '123456789', 'e10adc3949ba59abbe56e057f20f883e', 'central bank of india', '9099384774', 'Born place', 'abc', 'vasimlook1@gmail.com', '2019-12-14 10:12:08', 'ACTIVE', '', '2019-12-14 10:12:08', NULL, '2019-12-14 10:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `tax_item_queue`
--

CREATE TABLE `tax_item_queue` (
  `tax_item_queue_id` bigint(20) NOT NULL,
  `tax_queue_session` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tax_type_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tax_commodity_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_vehicle_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tax_item_weight` int(11) NOT NULL,
  `tax_item_weight_units` int(11) NOT NULL,
  `tax_item_quantity` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tax_item_quantity_units` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tax_item_source_location` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tax_item_destination_location` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tax_item_distanceinkm` int(11) NOT NULL,
  `tax_item_tax_amount` double(10,2) NOT NULL DEFAULT '0.00',
  `tax_item_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `tax_commodity_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Foreign Key from tax_commodity',
  `tax_type_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Foreign Key from tax_type',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tax_item_queue`
--

INSERT INTO `tax_item_queue` (`tax_item_queue_id`, `tax_queue_session`, `tax_type_name`, `tax_commodity_name`, `tax_vehicle_number`, `tax_item_weight`, `tax_item_weight_units`, `tax_item_quantity`, `tax_item_quantity_units`, `tax_item_source_location`, `tax_item_destination_location`, `tax_item_distanceinkm`, `tax_item_tax_amount`, `tax_item_status`, `tax_commodity_id`, `tax_type_id`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(4, '::1', 'Additional Goods Tax', 'Carpets of all types', 'gj190661', 10, 0, '0', '', 'Shimla, Himachal Pra', 'Solan, Himachal Prad', 46, 10.00, 'ACTIVE', 'CARPET_10', 'AG', '', '2020-01-13 11:58:52', NULL, '2020-01-13 11:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `tax_location_ddo`
--

CREATE TABLE `tax_location_ddo` (
  `tax_location_ddo_id` bigint(20) NOT NULL,
  `tax_location_ddo_location` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'DDO Location to be avaliable for user to select. A location can have Multiple DDO Codes so the user has to select one',
  `tax_location_ddo_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'DDO Code to be sent to Payment Gateway and saved for refrence',
  `tax_location_ddo_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'DDO Name to be Displayed to the User',
  `tax_location_ddo_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tax_location_ddo`
--

INSERT INTO `tax_location_ddo` (`tax_location_ddo_id`, `tax_location_ddo_location`, `tax_location_ddo_code`, `tax_location_ddo_name`, `tax_location_ddo_status`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, 'BILASPUR', 'BLP00-509', 'BLP00-505 CHIEF MEDICAL OFFICER BILASPUR', 'ACTIVE', '', '2019-12-03 20:13:55', NULL, '2019-12-03 22:36:43'),
(2, 'CHAMBA', 'CHM00-509', 'CHM00-500 DISTRICT TREASURY OFFICER CHAMBA', 'ACTIVE', '', '2019-12-03 20:13:55', NULL, '2019-12-03 22:36:29'),
(3, 'DELHI', 'DLI00-509', 'DLI00-509 DEPUTY COMMISSIONER STATE TAXES AND EXCISE', 'ACTIVE', '', '2019-12-03 20:13:55', NULL, '2019-12-03 22:36:52'),
(4, 'HAMIRPUR', 'HMR00-509', 'HMR00-509 DEPUTY COMMISSIONER STATE TAXES AND EXCISE', 'ACTIVE', '', '2019-12-03 20:13:55', NULL, '2019-12-03 22:36:57'),
(5, 'KANGRA', 'KNG00-509', 'KNG00-509 DEPUTY COMMISSIONER STATE TAXES AND EXCISE', 'ACTIVE', '', '2019-12-03 20:13:55', NULL, '2019-12-03 22:37:01'),
(6, 'KAZA', NULL, NULL, 'ACTIVE', '', '2019-12-03 20:13:55', NULL, '2019-12-03 20:13:55'),
(7, 'KINNAUR', 'KNR00-509', 'KNR00-509 DEPUTY COMMISSIONER STATE TAXES AND EXCISE', 'ACTIVE', '', '2019-12-03 20:13:55', NULL, '2019-12-03 22:37:07'),
(8, 'KULLU', 'KLU00-509', 'KLU00-509 DEPUTY COMMISSIONER STATE TAXES AND EXCISE', 'ACTIVE', '', '2019-12-03 20:13:55', NULL, '2019-12-03 22:37:11'),
(9, 'LAHAULSPITI', 'LHL00-509', 'LHL00-509 DEPUTY COMMISSIONER STATE TAXES AND EXCISE', 'ACTIVE', '', '2019-12-03 20:13:55', NULL, '2019-12-03 22:37:21'),
(10, 'MANDI', 'MDI00-509', 'MDI00-509 DEPUTY COMMISSIONER STATE TAXES AND EXCISE', 'ACTIVE', '', '2019-12-03 20:13:55', NULL, '2019-12-03 22:37:25'),
(11, 'PANGI', NULL, NULL, 'ACTIVE', '', '2019-12-03 20:13:55', NULL, '2019-12-03 20:13:55'),
(12, 'SHIMLA', 'CTO00-509', 'CTO00-509 DEPUTY COMMISSIONER STATE TAXES AND EXCISE', 'ACTIVE', '', '2019-12-03 20:13:55', NULL, '2019-12-03 22:37:30'),
(13, 'SHIMLA', 'SML00-509', 'SML00-509 DEPUTY COMMISSIONER STATE TAXES AND EXCISE', 'ACTIVE', '', '2019-12-03 20:13:55', NULL, '2019-12-03 22:37:35'),
(14, 'SIRMAUR', 'SMR00-509', 'SMR00-509 DEPUTY COMMISSIONER STATE TAXES AND EXCISE', 'ACTIVE', '', '2019-12-03 20:13:55', NULL, '2019-12-03 22:37:39'),
(15, 'SOLAN', 'SOL00-509', 'SOL00-509 DEPUTY COMMISSIONER STATE TAXES AND EXCISE', 'ACTIVE', '', '2019-12-03 20:13:55', NULL, '2019-12-03 22:37:44'),
(16, 'UNA', 'UNA00-509', 'UNA00-509 DEPUTY COMMISSIONER STATE TAXES AND EXCISE', 'ACTIVE', '', '2019-12-03 20:13:55', NULL, '2019-12-03 22:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `tax_master`
--

CREATE TABLE `tax_master` (
  `tax_master_id` bigint(20) NOT NULL,
  `tax_transaction_head` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'fixed Main Scheme under which payment is made, should be unique',
  `tax_transaction_dept` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'fixed value for department who will receive paymnet',
  `tax_transaction_ddo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'fixed value for DDO of receiveing department',
  `tax_master_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tax_master`
--

INSERT INTO `tax_master` (`tax_master_id`, `tax_transaction_head`, `tax_transaction_dept`, `tax_transaction_ddo`, `tax_master_status`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, 'h', 'h', 'h', 'ACTIVE', '', '2019-06-11 10:50:08', NULL, '2019-06-11 10:50:08');

-- --------------------------------------------------------

--
-- Table structure for table `tax_revenue_receipt`
--

CREATE TABLE `tax_revenue_receipt` (
  `tax_revenue_receipt_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Unique Receipt ID',
  `tax_revenue_receipt_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_revenue_receipt_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax_receipt_head` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Cumulative Head and Subhead from tax_type.tax_type_head-tax_commodity.tax_commodity_subhead',
  `tax_revenue_receipt_head` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Will be the Receipt Code agains which the payment will be recorded. To be appended with Head and Sub-head',
  `tax_revenue_receipt_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tax_revenue_receipt`
--

INSERT INTO `tax_revenue_receipt` (`tax_revenue_receipt_id`, `tax_revenue_receipt_name`, `tax_revenue_receipt_description`, `tax_receipt_head`, `tax_revenue_receipt_head`, `tax_revenue_receipt_status`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
('ADD_GOODS_TAX', 'Receipt from Addl. Goods Tax', '02- Receipt from Addl. Goods Tax', '02', 'ACTIVE', '0042-00-10', '', '2019-12-03 19:19:17', NULL, '2019-12-03 19:19:17'),
('DEDUCT_REFUND', 'Deduct Refund PGT', '90- Deduct Refund PGT', '90', 'ACTIVE', '0042-00-80', '', '2019-12-03 19:19:17', NULL, '2019-12-03 19:19:17'),
('GOODS_TAX', 'Receipt from Goods Tax', '01- Receipt from Goods Tax', '01', 'ACTIVE', '0042-00-10', '', '2019-12-03 19:19:17', NULL, '2019-12-03 19:19:17'),
('GOODS_TAX_ROAD', 'Receipt from goods carried by road', '01- Receipt from goods carried by road', '01', 'ACTIVE', '0045-00-80', '', '2019-12-03 19:19:17', NULL, '2019-12-03 19:19:17'),
('MISC_RECEIPTS', 'Misc. Receipts', '01- Misc. Receipts', '01', 'ACTIVE', '0042-00-80', '', '2019-12-03 19:19:17', NULL, '2019-12-03 19:19:17'),
('PASSNG_TAX_PANELTY', 'Receipts from Penalty', '04- Receipts from Penalty', '04', 'ACTIVE', '0042-00-10', '', '2019-12-03 19:19:17', NULL, '2019-12-03 19:19:17'),
('PASSNG_TAX_RECEIPT', 'Receipt from Passenger Tax', '01- Receipt from Passenger Tax', '01', 'ACTIVE', '0042-00-10', '', '2019-12-03 19:19:17', NULL, '2019-12-03 19:19:17'),
('PASSNG_TAX_STAMPS', 'Passenger Tax Stamps', '03- Passenger Tax Stamps', '03', 'ACTIVE', '0042-00-10', '', '2019-12-03 19:19:17', NULL, '2019-12-03 19:19:17'),
('PASSNG_TAX_SURCHARG', 'Surcharge on Passenger Tax', '02- Surcharge on Passenger Tax', '02', 'ACTIVE', '0042-00-10', '', '2019-12-03 19:19:17', NULL, '2019-12-03 19:19:17'),
('REFUND_DEDUCT', 'Deduct Refund CGCR', '90- Deduct Refund CGCR', '90', 'ACTIVE', '0045-00-80', '', '2019-12-03 19:19:17', NULL, '2019-12-03 19:19:17'),
('REGIS_FEES', 'Registration Fees', '02- Registration Fees', '02', 'ACTIVE', '0042-00-80', '', '2019-12-03 19:19:17', NULL, '2019-12-03 19:19:17');

-- --------------------------------------------------------

--
-- Table structure for table `tax_transaction_queue`
--

CREATE TABLE `tax_transaction_queue` (
  `tax_transaction_queue_id` bigint(20) NOT NULL,
  `tax_transaction_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tax_transaction_dept` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'fixed value for department who will receive paymnet',
  `tax_AppRefNo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tax_payment_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tax_payment_bank` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax_payment_amount` double(10,2) NOT NULL DEFAULT '0.00',
  `tax_transaction_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'PENDING' COMMENT '''FAILURE'' ''SUCCESS'' ''PENDING'' ''AWAITNG CONFIRMATION''',
  `tax_challan_brn` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Bank Refrence Number',
  `tax_challan_himgrn` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'HIMGRN by himkosh.hp.nic.in',
  `tax_challan_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'FK from tax_challan for which payment is made',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tax_transaction_queue`
--

INSERT INTO `tax_transaction_queue` (`tax_transaction_queue_id`, `tax_transaction_dt`, `tax_transaction_dept`, `tax_AppRefNo`, `tax_payment_dt`, `tax_payment_bank`, `tax_payment_amount`, `tax_transaction_status`, `tax_challan_brn`, `tax_challan_himgrn`, `tax_challan_id`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, '2019-12-06 12:12:41', '59880', '24053', '0000-00-00 00:00:00', 'MOP', 5.00, 'SUCCESS', 'CPW5532684', 'A19K146412', '125804225642503840662680620200686402460', 'SYSTEM', '2019-12-06 12:12:41', 'SYSTEM', '2019-12-06 12:12:41'),
(2, '2019-12-11 16:36:43', '59880', '24053', '2019-11-23 20:04:35', 'MOP', 5.00, 'SUCCESS', 'CPW5532684', 'A19K146412', '18812177832210828802', 'SYSTEM', '2019-12-06 12:13:02', 'SYSTEM', '2019-12-11 16:36:43');

-- --------------------------------------------------------

--
-- Table structure for table `tax_type`
--

CREATE TABLE `tax_type` (
  `tax_type_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'AG, PGT, PTCG, CGCR',
  `tax_type_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_type_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax_type_head` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT ' Tax Collection Heads for Accounts',
  `tax_type_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tax_type`
--

INSERT INTO `tax_type` (`tax_type_id`, `tax_type_name`, `tax_type_description`, `tax_type_head`, `tax_type_status`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
('AG', 'Additional Goods Tax', 'Additional Goods Tax', '0042', 'ACTIVE', '', '2019-06-04 01:23:50', NULL, '2019-12-02 16:32:47'),
('CGCR', 'Certain Goods Carried By Road Tax', 'Certain Goods Carried By Road Tax', '0045', 'ACTIVE', '', '2019-06-04 01:26:35', NULL, '2019-12-02 16:32:50'),
('PGT', 'Passenger And Goods Tax', 'PGT', '0042', 'ACTIVE', '', '2019-06-04 01:24:48', NULL, '2019-12-02 16:23:06'),
('PTCG', 'Passenger Tax on Contract Carriage', 'PTCG', '0042', 'ACTIVE', '', '2019-06-04 01:25:44', NULL, '2019-12-02 16:23:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`admin_user_id`);

--
-- Indexes for table `ip`
--
ALTER TABLE `ip`
  ADD PRIMARY KEY (`ip_id`);

--
-- Indexes for table `tax_challan`
--
ALTER TABLE `tax_challan`
  ADD PRIMARY KEY (`tax_challan_id`);

--
-- Indexes for table `tax_challan_item`
--
ALTER TABLE `tax_challan_item`
  ADD PRIMARY KEY (`tax_challan_item_id`),
  ADD UNIQUE KEY `tax_challan_vehicle_UK` (`tax_vehicle_number`,`tax_challan_id`,`tax_commodity_id`) USING BTREE;

--
-- Indexes for table `tax_commodity`
--
ALTER TABLE `tax_commodity`
  ADD PRIMARY KEY (`tax_commodity_id`),
  ADD UNIQUE KEY `tax_commodity_name_UK` (`tax_commodity_name`);

--
-- Indexes for table `tax_dealer`
--
ALTER TABLE `tax_dealer`
  ADD PRIMARY KEY (`tax_dealer_id`);

--
-- Indexes for table `tax_edt_invoice`
--
ALTER TABLE `tax_edt_invoice`
  ADD PRIMARY KEY (`tax_edt_invoice_id`);

--
-- Indexes for table `tax_employee`
--
ALTER TABLE `tax_employee`
  ADD PRIMARY KEY (`tax_employee_id`),
  ADD UNIQUE KEY `tax_employee_code_UK` (`tax_employee_code`),
  ADD UNIQUE KEY `tax_employee_email_UK` (`tax_employee_email`),
  ADD UNIQUE KEY `tax_employee_mobile_UK` (`tax_employee_mobile`);

--
-- Indexes for table `tax_item_queue`
--
ALTER TABLE `tax_item_queue`
  ADD PRIMARY KEY (`tax_item_queue_id`),
  ADD UNIQUE KEY `tax_queue_vehicle_UK` (`tax_queue_session`,`tax_vehicle_number`,`tax_commodity_id`) USING BTREE;

--
-- Indexes for table `tax_location_ddo`
--
ALTER TABLE `tax_location_ddo`
  ADD PRIMARY KEY (`tax_location_ddo_id`),
  ADD UNIQUE KEY `tax_location_ddo_code_UK` (`tax_location_ddo_code`),
  ADD UNIQUE KEY `tax_location_ddo_name_UK` (`tax_location_ddo_name`);

--
-- Indexes for table `tax_master`
--
ALTER TABLE `tax_master`
  ADD PRIMARY KEY (`tax_master_id`),
  ADD UNIQUE KEY `tax_transaction_head_UK` (`tax_transaction_head`),
  ADD UNIQUE KEY `tax_transaction_UK` (`tax_transaction_dept`,`tax_transaction_ddo`,`tax_transaction_head`);

--
-- Indexes for table `tax_revenue_receipt`
--
ALTER TABLE `tax_revenue_receipt`
  ADD PRIMARY KEY (`tax_revenue_receipt_id`),
  ADD UNIQUE KEY `tax_revenue_receipt_name_UK` (`tax_revenue_receipt_name`);

--
-- Indexes for table `tax_transaction_queue`
--
ALTER TABLE `tax_transaction_queue`
  ADD PRIMARY KEY (`tax_transaction_queue_id`);

--
-- Indexes for table `tax_type`
--
ALTER TABLE `tax_type`
  ADD PRIMARY KEY (`tax_type_id`),
  ADD UNIQUE KEY `tax_type_name_UK` (`tax_type_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `admin_user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ip`
--
ALTER TABLE `ip`
  MODIFY `ip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `tax_challan_item`
--
ALTER TABLE `tax_challan_item`
  MODIFY `tax_challan_item_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tax_dealer`
--
ALTER TABLE `tax_dealer`
  MODIFY `tax_dealer_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tax_edt_invoice`
--
ALTER TABLE `tax_edt_invoice`
  MODIFY `tax_edt_invoice_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tax_employee`
--
ALTER TABLE `tax_employee`
  MODIFY `tax_employee_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tax_item_queue`
--
ALTER TABLE `tax_item_queue`
  MODIFY `tax_item_queue_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tax_location_ddo`
--
ALTER TABLE `tax_location_ddo`
  MODIFY `tax_location_ddo_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tax_transaction_queue`
--
ALTER TABLE `tax_transaction_queue`
  MODIFY `tax_transaction_queue_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

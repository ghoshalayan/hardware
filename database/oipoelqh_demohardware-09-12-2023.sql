-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 09, 2023 at 06:53 PM
-- Server version: 8.0.35
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oipoelqh_demohardware`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int NOT NULL,
  `cash` varchar(155) NOT NULL,
  `cash_reason` varchar(255) NOT NULL,
  `cash_withdraw` varchar(155) NOT NULL,
  `cash_withdraw_reason` varchar(255) NOT NULL,
  `bank` varchar(155) NOT NULL,
  `bank_reason` varchar(255) NOT NULL,
  `bank_withdraw` varchar(155) NOT NULL,
  `bank_withdraw_reason` varchar(255) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `cash`, `cash_reason`, `cash_withdraw`, `cash_withdraw_reason`, `bank`, `bank_reason`, `bank_withdraw`, `bank_withdraw_reason`, `insert_date`) VALUES
(1, '10000', '', '', '', '201', '', '', '', '2023-11-25 11:27:03'),
(2, '500', '', '', '', '', '', '', '', '2023-11-25 23:01:51'),
(3, '', '', '51', 'tesrt', '', '', '', '', '2023-11-25 23:02:05'),
(4, '', '', '', '', '101', '', '', '', '2023-11-25 23:02:18'),
(5, '', '', '', '', '', '', '101', 'ffd', '2023-11-25 23:02:32'),
(6, '1000', '', '', '', '', '', '', '', '2023-11-25 23:17:17'),
(7, '', '', '', '', '', '', '100', 'abc', '2023-11-25 23:18:50'),
(8, '51', 'testing adda', '', '', '', '', '', '', '2023-11-25 23:36:38'),
(9, '100000', 'open', '', '', '', '', '', '', '2023-11-26 19:07:29'),
(10, '1001', '', '', '', '', '', '', '', '2023-11-28 17:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_login_id` int NOT NULL,
  `name` varchar(55) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `admin_email` varchar(55) NOT NULL,
  `role` varchar(55) NOT NULL,
  `account_status` varchar(11) NOT NULL,
  `dateofcreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_login_id`, `name`, `user_name`, `password`, `admin_email`, `role`, `account_status`, `dateofcreation`) VALUES
(1, 'Admin', 'admin', '123', 'admin@gmail.com', 'Admin', 'Y', '2023-04-23 07:35:34'),
(4, 'User', 'user', '123', 'user@gmail.com', 'User', 'Y', '2023-03-08 12:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `insert_date`) VALUES
(5, 'suprime', '2023-06-13 11:47:37'),
(7, 'steel', '2023-06-13 11:53:03'),
(8, 'pvc', '2023-06-13 16:52:01'),
(9, 'ceramic', '2023-06-13 16:56:08'),
(10, 'inner', '2023-06-13 20:42:03'),
(12, 'MPI', '2023-08-03 11:55:46'),
(13, 'pearl', '2023-08-04 11:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `decorator`
--

CREATE TABLE `decorator` (
  `decorator_id` int NOT NULL,
  `name` varchar(155) NOT NULL,
  `phone` varchar(55) NOT NULL,
  `address` varchar(255) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `decorator`
--

INSERT INTO `decorator` (`decorator_id`, `name`, `phone`, `address`, `insert_date`) VALUES
(2, 'MINTU BISWAS', '8145321432', 'RAJNAGAR', '2023-01-10 20:47:33'),
(3, 'MILON DAS', '9064744341', 'KHOLAPOTA', '2023-01-10 20:48:50'),
(4, 'SWAPAN DAS', '8436596982', 'RARHATI', '2023-01-10 20:50:12'),
(5, 'BAMAPADA DAS', '8101100285', 'KHOLAPOTA', '2023-01-10 20:51:06'),
(6, 'KAILASH MONDAL', '9635596424', 'SREEKRISHNAPUR', '2023-01-10 20:52:14'),
(7, 'MANTU DUTTA', '8348226373', 'KHOLAPOTA', '2023-01-10 20:53:54'),
(8, 'SUKUMAR SARDAR', '9564992738', 'SREEKRISHNAPUR', '2023-01-10 20:55:22'),
(9, 'ROCKY MONDAL', '8653534659', 'HARISHPUR', '2023-01-10 20:56:32'),
(10, 'BHUSAN MONDAL', '9800857049', 'KHOLAPOTA', '2023-01-10 20:57:23'),
(11, 'RAMU MONDAL', '8101345783', 'SREEKRISHNAPUR', '2023-01-10 20:58:13'),
(12, 'UTPAL ADHIKARI', '6297545127', 'KHOLAPOTA', '2023-01-10 21:01:05'),
(13, 'BIJOY GAYEN', '9635503709', 'SREEKRISHNAPUR', '2023-01-10 21:02:25'),
(14, 'SANKAR MONDAL', '9564322145', 'SREEKRISHNAPUR', '2023-01-10 21:03:04'),
(15, 'KRITTIBAS SARDAR', '9735331836', 'SREEKRISHNAPUR', '2023-01-10 21:04:05'),
(16, 'SAHEB DA', '8145014965', 'RAGHUNATHPUR', '2023-01-10 21:05:00'),
(17, 'somnath ree', '9547503310', 'singerkone', '2023-07-15 10:16:30'),
(18, 'partha ree', '8101266617', 'singerkone', '2023-07-15 10:18:04'),
(19, 'prafulla', '9732312907', 'biruha', '2023-07-15 10:19:14'),
(20, 'sanju', '9564904594', 'gopalpur', '2023-07-15 10:21:43'),
(21, 'uday ree ', '9475237221', 'singerkone', '2023-08-13 17:22:20'),
(22, 'sahadeb ', '9547977964', 'baro baharkuli', '2023-08-13 17:23:33'),
(23, 'tuser ', '9091749090', 'singerkone (npara)\r\n', '2023-08-13 17:24:31'),
(24, 'pijus', '8001767444', 'inchura', '2023-08-13 17:25:13'),
(25, 'asis', '9883815772', 'inchura', '2023-08-13 17:27:07'),
(26, 'susanta pramanick', '8001311133', 'panchraki', '2023-08-13 17:28:32'),
(27, 'somnath ', '6296928317', 'ramnagar', '2023-08-13 17:29:32'),
(28, 'manik', '9735843034', 'sriristala', '2023-08-13 17:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `decorator_commision`
--

CREATE TABLE `decorator_commision` (
  `decorator_commision_id` int NOT NULL,
  `sales_id` int NOT NULL,
  `decorator_id` int NOT NULL,
  `decorator_amount` varchar(55) NOT NULL,
  `decorator_paid` varchar(55) NOT NULL,
  `decorator_due` varchar(55) NOT NULL,
  `description` longtext NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `decorator_commision`
--

INSERT INTO `decorator_commision` (`decorator_commision_id`, `sales_id`, `decorator_id`, `decorator_amount`, `decorator_paid`, `decorator_due`, `description`, `insert_date`) VALUES
(2, 2, 2, '', '', '', '', '2023-05-24 16:26:59'),
(3, 3, 0, '', '', '', '', '2023-05-24 19:06:29'),
(4, 4, 0, '', '', '', '', '2023-05-24 19:06:56'),
(5, 5, 0, '', '', '', '', '2023-05-24 19:08:19'),
(6, 6, 0, '', '', '', '', '2023-05-24 19:08:50'),
(7, 7, 0, '', '', '', '', '2023-05-24 19:09:45'),
(8, 8, 4, '300', '', '0', '', '2023-05-25 09:39:13'),
(9, 9, 5, '500', '', '0', '', '2023-05-28 17:49:07'),
(10, 10, 0, '', '', '', '', '2023-11-26 13:13:54'),
(11, 11, 0, '', '', '', '', '2023-11-26 23:25:13'),
(12, 12, 0, '', '', '', '', '2023-11-28 15:55:16'),
(13, 13, 0, '', '', '', '', '2023-11-28 16:01:58'),
(14, 14, 0, '', '', '', '', '2023-11-28 17:25:54'),
(15, 15, 0, '', '', '', '', '2023-12-05 21:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int NOT NULL,
  `bill_no` varchar(55) NOT NULL,
  `bill_date` varchar(15) NOT NULL,
  `purchase_from` varchar(155) NOT NULL,
  `payment_mode` varchar(55) NOT NULL,
  `total_amount` varchar(55) NOT NULL,
  `advance_payment` varchar(55) NOT NULL,
  `remaining_amount` varchar(55) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `bill_no`, `bill_date`, `purchase_from`, `payment_mode`, `total_amount`, `advance_payment`, `remaining_amount`, `insert_date`) VALUES
(1, 'NEW', '2023-01-31', '', 'Cash', '89555', '89555', '0', '2023-01-31 13:04:04'),
(2, 'NEW 1', '2023-01-31', '', 'Cash', '267018', '267018', '0', '2023-01-31 13:53:06'),
(3, 'NEW 2', '2023-01-31', '', 'Cash', '32731', '32731', '0', '2023-01-31 18:54:55'),
(4, 'NEW 3', '2023-01-31', '', 'Cash', '19173', '19173', '0', '2023-01-31 19:26:59'),
(5, 'NEW 4', '2023-02-03', 'BERGER WEATHERCOAT GLOW', 'Cash', '91956', '91956', '0', '2023-02-03 12:59:52'),
(6, 'NEW 5', '2023-02-03', 'BERGER EASY CLEAN BISON SILKGLAMOUR', 'Cash', '88323', '88323', '0', '2023-02-03 13:34:49'),
(7, 'NEW 6', '2023-03-02', 'BERGER LONGLIFE 10', 'Cash', '117856', '117856', '0', '2023-02-03 13:55:04'),
(8, 'NEW 7', '2023-02-03', 'BERGER LONG LIFE BROWN', 'Cash', '9606', '9606', '0', '2023-02-03 13:57:40'),
(9, 'NEW 8', '2023-02-05', 'ASIAN PAINTS APEX', 'Cash', '90476', '90476', '0', '2023-02-05 13:08:37'),
(10, 'NEW 9', '2023-02-05', 'ASIAN PAINTS APEX ACE SHYNE', 'Cash', '81489', '81489', '0', '2023-02-05 13:42:39'),
(11, 'NEW 10', '2023-02-05', 'ASIAN PAINTS ULTIMA', 'Cash', '90097', '90097', '0', '2023-02-05 19:26:23'),
(12, 'NEW 11', '2023-02-05', 'ASIAN PAINTS ROYALE ROYALE SHYNE', 'Cash', '82224', '82224', '0', '2023-02-06 18:54:33'),
(13, 'NEW 12', '2023-02-09', 'ASIAN PAINTS OIL', 'Cash', '27770', '27770', '0', '2023-02-09 10:27:14'),
(14, 'NEW 13', '2023-02-09', 'ASIAN PAINTS OIL', 'Cash', '4796', '4796', '0', '2023-02-09 10:33:51'),
(15, 'NEW 14', '2023-02-14', 'BERGER OIL', 'Cash', '27775', '27775', '0', '2023-02-14 13:47:03'),
(16, 'NEW 15', '2023-02-16', 'BERGER OIL', 'Cash', '15917', '15917', '0', '2023-02-16 13:46:20'),
(17, 'NEW 16', '2023-02-20', 'ASIAN PLAY NEO', 'Cash', '16988', '16988', '0', '2023-02-20 19:15:21'),
(18, '', '2023-04-23', '', 'Select Pay Mode', '15000', '', '', '2023-04-24 21:22:15'),
(19, '00001', '2023-05-22', 'DSP', 'Cash', '100000', '', '', '2023-05-22 11:27:38'),
(20, '', '1970-01-01', '', 'Cash', '12500', '', '', '2023-05-24 16:22:41'),
(21, '', '2023-05-24', 'supreme', 'Cash', '2479000', '24790', '0', '2023-05-25 09:27:24'),
(22, 'yu', '2023-07-09', '', 'Cash', '710', '', '', '2023-07-09 09:25:07'),
(23, '00002', '2023-08-01', 'asd', 'Cash', '1000', '', '', '2023-08-01 21:57:54'),
(24, '', '1970-01-01', '', 'Select Pay Mode', '1000000', '', '', '2023-08-09 20:50:33'),
(25, 'kol/sr/1', '2022-11-11', 'sr enterprise', 'Cash', '1100', '', '', '2023-08-17 18:55:14'),
(26, 'kol/sr/1', '2023-11-28', 'sr enterprise', 'Cash', '1300', '', '', '2023-08-17 18:56:12'),
(27, '000012', '2023-12-06', 'DSP', 'Cash', '25000', '25000', '0', '2023-12-05 20:59:38');

-- --------------------------------------------------------

--
-- Table structure for table `item_sales`
--

CREATE TABLE `item_sales` (
  `item_sales_id` int NOT NULL,
  `sales_id` int NOT NULL,
  `item_name` varchar(155) NOT NULL,
  `quantity` varchar(55) NOT NULL,
  `price` varchar(55) NOT NULL,
  `total_price` varchar(55) NOT NULL,
  `description` varchar(255) NOT NULL,
  `refer_type` varchar(15) NOT NULL DEFAULT 'S',
  `insert_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `item_sales`
--

INSERT INTO `item_sales` (`item_sales_id`, `sales_id`, `item_name`, `quantity`, `price`, `total_price`, `description`, `refer_type`, `insert_date`) VALUES
(1, 1, '10', '1', '200', '200', '', 'S', '2023-11-26 11:19:10'),
(2, 2, '611', '1', '3000', '3000', '', 'S', '2023-11-26 11:19:10'),
(3, 3, '8', '1', '689', '689', '', 'S', '2023-11-26 11:19:10'),
(4, 4, '8', '1', '689', '689', '', 'S', '2023-11-26 11:19:10'),
(5, 5, '1', '1', '1200', '1200', '', 'S', '2023-11-26 11:19:10'),
(6, 6, '1', '1', '805', '805', '', 'S', '2023-11-26 11:19:10'),
(7, 7, '1', '1', '805', '805', '', 'S', '2023-11-26 11:19:10'),
(8, 8, '595', '12', '121', '1452', '\r\n', 'S', '2023-11-26 11:19:10'),
(9, 8, '2', '10', '100', '1000', '', 'S', '2023-11-26 11:19:10'),
(10, 8, '20', '17', '121', '2057', '', 'S', '2023-11-26 11:19:10'),
(11, 9, '1', '50', '1200', '60000', '', 'S', '2023-11-26 11:19:10'),
(12, 10, 'Select Product', '2', '', '0.00', '', 'S', '2023-11-26 13:13:54'),
(13, 11, '10', '5', '1363.5', '6817.50', '', 'S', '2023-11-26 23:25:13'),
(14, 11, '105', '3', '1464.5', '4393.50', '', 'S', '2023-11-26 23:25:13'),
(15, 12, '10', '2', '1363.5', '2727.00', '', 'S', '2023-11-28 15:55:16'),
(16, 12, '103', '1', '6363', '6363.00', '', 'S', '2023-11-28 15:55:16'),
(17, 13, '10', '10', '1363.5', '13635.00', '', 'S', '2023-11-28 16:01:58'),
(18, 13, '103', '1', '6363', '6363.00', '', 'S', '2023-11-28 16:01:58'),
(19, 14, '10', '2', '1363.5', '2727.00', '', 'S', '2023-11-28 17:25:54'),
(20, 14, '107', '2', '100', '200.00', '', 'S', '2023-11-28 17:25:54'),
(21, 15, '10', '5', '1363.5', '6817.50', '', 'S', '2023-12-05 21:03:16'),
(22, 16, '12', '1', '404', '404.00', '', 'R', '2023-12-09 08:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int NOT NULL,
  `category_id` int NOT NULL,
  `sub_category_id` int NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_volume` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `product_desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `quantity` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `insert_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `sub_category_id`, `product_name`, `product_volume`, `product_desc`, `quantity`, `insert_date`) VALUES
(1, 2, 1, 'BERGER BISON WALL PUTTY', '40 KG', 'INTERIOR PUTTY', '128', '2022-12-27 19:56:32'),
(2, 0, 0, 'BERGER BISON WALL PUTTY', '30 KG', 'INTERIOR PUTTY', '3', '2022-12-27 19:57:26'),
(3, 0, 0, 'BERGER HOMESHEILD WATERPROOF PUTTY', '40 KG', 'EXTERIOR PUTTY', '', '2022-12-27 21:02:05'),
(4, 0, 0, 'BERGER ACRALYC PASTE PUTTY', '20 KG', 'PASTE PUTTY', '', '2022-12-27 21:03:08'),
(5, 0, 0, 'BERGER ACRALYC PASTE PUTTY', '10 KG', 'PASTE PUTTY', '', '2022-12-27 21:03:32'),
(6, 0, 0, 'BERGER ACRALYC PASTE PUTTY', '5 KG', 'PASTE PUTTY', '', '2022-12-27 21:04:23'),
(7, 0, 0, 'BERGER ACRALYC PASTE PUTTY', '1 KG', 'PASTE PUTTY', '', '2022-12-27 21:04:43'),
(8, 0, 0, 'ASIAN PAINTS TRUCARE PUTTY', '40 KG', 'INTERIOR PUTTY', '26', '2022-12-27 21:07:28'),
(9, 0, 0, 'ASIAN PAINTS WATERPROOF PUTTY', '40 KG', 'EXTERIOR PUTTY', '', '2022-12-27 21:10:21'),
(10, 0, 0, 'ASIAN PAINTS PASTE PUTTY', '20 KG', 'PASTE PUTTY', '13', '2022-12-27 21:11:00'),
(11, 0, 0, 'ASIAN PAINTS PASTE PUTTY', '10 KG', 'PASTE PUTTY', '', '2022-12-27 21:11:23'),
(12, 0, 0, 'ASIAN PAINTS PASTE PUTTY', '5 KG', 'PASTE PUTTY', '4', '2022-12-27 21:11:38'),
(13, 0, 0, 'ASIAN PAINTS PASTE PUTTY', '1 KG', 'PASTE PUTTY', '6', '2022-12-27 21:11:50'),
(14, 0, 0, 'BERGER SEAL O PRIME', '20 LTR', 'EXTERIOR PRIMER', '21', '2022-12-27 21:22:39'),
(15, 0, 0, 'BERGER SEAL O PRIME', '10 LTR', 'EXTERIOR PRIMER', '1', '2022-12-27 21:23:16'),
(16, 0, 0, 'BERGER SEAL O PRIME', '4 LTR', 'EXTERIOR PRIMER', '', '2022-12-27 21:23:34'),
(17, 0, 0, 'BERGER SEAL O PRIME', '1 LTR', 'EXTERIOR PRIMER', '3', '2022-12-27 21:23:56'),
(18, 0, 0, 'BERGER WEATHERCOAT PRIMER', '20 LTR', 'EXTERIOR PRIMER', '7', '2022-12-27 21:25:20'),
(19, 0, 0, 'BERGER WEATHERCOAT PRIMER', '10 LTR', 'EXTERIOR PRIMER', '', '2022-12-27 21:25:38'),
(20, 0, 0, 'BERGER WEATHERCOAT PRIMER', '4 LTR', 'EXTERIOR PRIMER', '2', '2022-12-27 21:25:56'),
(21, 0, 0, 'BERGER WEATHERCOAT PRIMER', '1 LTR', 'EXTERIOR PRIMER', '5', '2022-12-27 21:26:13'),
(22, 0, 0, 'BERGER WALMASTA PRIMER', '20 LTR', 'EXTERIOR PRIMER', '2', '2022-12-27 21:27:20'),
(23, 0, 0, 'BERGER WALMASTA PRIMER', '10 LTR', 'EXTERIOR PRIMER', '1', '2022-12-27 21:27:36'),
(24, 0, 0, 'BERGER WALMASTA PRIMER', '4 LTR', 'EXTERIOR PRIMER', '3', '2022-12-27 21:27:51'),
(25, 0, 0, 'BERGER WALMASTA PRIMER', '1 LTR', 'EXTERIOR PRIMER', '', '2022-12-27 21:28:09'),
(26, 0, 0, 'ASIAN PAINTS TRUCARE EXTERIOR PRIMER', '20 LTR', 'EXTERIOR PRIMER', '42', '2022-12-27 21:29:56'),
(27, 0, 0, 'ASIAN PAINTS TRUCARE EXTERIOR PRIMER', '10 LTR', 'EXTERIOR PRIMER', '2', '2022-12-27 21:30:10'),
(28, 0, 0, 'ASIAN PAINTS TRUCARE EXTERIOR PRIMER', '4 LTR', 'EXTERIOR PRIMER', '2', '2022-12-27 21:30:24'),
(29, 0, 0, 'ASIAN PAINTS TRUCARE EXTERIOR PRIMER', '1 LTR', 'EXTERIOR PRIMER', '2', '2022-12-27 21:30:46'),
(30, 0, 0, 'ASIAN PAINTS TRUCARE ECONOMY PRIMER', '20 LTR', 'INTERIOR PRIMER', '2', '2022-12-27 21:32:11'),
(31, 0, 0, 'ASIAN PAINTS TRUCARE ECONOMY PRIMER', '10 LTR', 'INTERIOR PRIMER', '2', '2022-12-27 21:32:35'),
(32, 0, 0, 'ASIAN PAINTS TRUCARE ECONOMY PRIMER', '4 LTR', 'INTERIOR PRIMER', '2', '2022-12-27 21:32:51'),
(33, 0, 0, 'ASIAN PAINTS TRUCARE ECONOMY PRIMER', '1 LTR', 'INTERIOR PRIMER', '5', '2022-12-27 21:33:06'),
(34, 0, 0, 'ASIAN PAINTS TRUCARE SPARC PRIMER', '20 LTR', 'INTERIOR PRIMER', '4', '2022-12-27 21:33:32'),
(35, 0, 0, 'ASIAN PAINTS TRUCARE SPARC PRIMER', '10 LTR', 'INTERIOR PRIMER', '9', '2022-12-27 21:33:46'),
(36, 0, 0, 'ASIAN PAINTS TRUCARE SPARC PRIMER', '4 LTR', 'INTERIOR PRIMER', '3', '2022-12-27 21:34:01'),
(37, 0, 0, 'ASIAN PAINTS TRUCARE SPARC PRIMER', '1 LTR', 'INTERIOR PRIMER', '4', '2022-12-27 21:34:15'),
(38, 0, 0, 'BERGER BP CEMENT PRIMER', '20 LTR', 'INTERIOR PRIMER', '2', '2022-12-27 21:35:02'),
(39, 0, 0, 'BERGER BP CEMENT PRIMER', '10 LTR', 'INTERIOR PRIMER', '2', '2022-12-27 21:35:24'),
(40, 0, 0, 'BERGER BP CEMENT PRIMER', '4 LTR', 'INTERIOR PRIMER', '3', '2022-12-27 21:35:40'),
(41, 0, 0, 'BERGER BP CEMENT PRIMER', '1 LTR', 'INTERIOR PRIMER', '', '2022-12-27 21:36:25'),
(42, 0, 0, 'ASIAN PAINTS DAMP SHEATH PRIMER', '20 LTR', 'EXTERIOR PRIMER', '57', '2022-12-27 21:38:08'),
(43, 0, 0, 'ASIAN PAINTS DAMP SHEATH PRIMER', '10 LTR', 'EXTERIOR PRIMER', '', '2022-12-27 21:38:33'),
(44, 0, 0, 'ASIAN PAINTS DAMP SHEATH PRIMER', '4 LTR', 'EXTERIOR PRIMER', '', '2022-12-27 21:38:48'),
(45, 0, 0, 'ASIAN PAINTS DAMP SHEATH PRIMER', '1 LTR', 'EXTERIOR PRIMER', '', '2022-12-27 21:39:04'),
(46, 0, 0, 'BERGER BUTTERFLY RED OXIDE PRIMER', '4 LTS', 'BLACK IRON PRIMER', '4', '2022-12-27 22:47:43'),
(47, 0, 0, 'BERGER BUTTERFLY RED OXIDE PRIMER', '1 LTR', 'BLACK IRON PRIMER', '', '2022-12-27 22:49:31'),
(48, 0, 0, 'BERGER BUTTERFLY RED OXIDE PRIMER', '500 ML', 'BLACK IRON PRIMER', '6', '2022-12-27 22:49:59'),
(49, 0, 0, 'ASIAN PAINTS RED OXIDE PRIMER', '4 LTR', 'BLACK IRON PRIMER', '', '2022-12-27 22:50:47'),
(50, 0, 0, 'ASIAN PAINTS RED OXIDE PRIMER', '1 LTR', 'BLACK IRON PRIMER', '10', '2022-12-27 22:51:13'),
(51, 0, 0, 'ASIAN PAINTS RED OXIDE PRIMER', '500 ML', 'BLACK IRON PRIMER', '6', '2022-12-27 22:51:40'),
(52, 0, 0, 'BERGER BP ZINC OXIDE PRIMER', '4 LTR', 'WHITE IRON PRIMER', '4', '2022-12-27 22:53:26'),
(53, 0, 0, 'BERGER BP ZINC OXIDE PRIMER', '1 LTR', 'WHITE IRON PRIMER', '4', '2022-12-27 22:54:10'),
(54, 0, 0, 'BERGER BP ZINC OXIDE PRIMER', '500 ML', 'WHITE IRON PRIMER', '7', '2022-12-27 22:54:43'),
(55, 0, 0, 'ASIAN PAINTS WOOD PRIMER', '4 LTR', 'WOOD PRIMER', '', '2022-12-27 22:56:24'),
(56, 0, 0, 'ASIAN PAINTS WOOD PRIMER', '1 LTR', 'WOOD PRIMER', '', '2022-12-27 22:56:46'),
(57, 0, 0, 'ASIAN PAINTS WOOD PRIMER', '500 ML', 'WOOD PRIMER', '', '2022-12-27 22:57:19'),
(58, 0, 0, 'BERGER PARROT WOOD PRIMER', '4 LTS', 'WOOD PRIMER', '3', '2022-12-27 22:57:51'),
(59, 0, 0, 'BERGER PARROT WOOD PRIMER', '1 LTR', 'WOOD PRIMER', '3', '2022-12-27 22:58:24'),
(60, 0, 0, 'BERGER PARROT WOOD PRIMER', '500 ML', 'WOOD PRIMER', '4', '2022-12-27 22:59:17'),
(61, 0, 0, 'BERGER ALUMINIUM PAINTS', '4 LTR', 'ALUMINIUM PAINTS', '2', '2022-12-28 22:29:35'),
(62, 0, 0, 'BERGER PAINTS ALUMINIUM PAINTS', '1 LTR', 'ALUMINIUM PAINTS', '', '2022-12-28 22:30:23'),
(63, 0, 0, 'BERGER ALUMINIUM PAINTS', '500 ML', 'ALUMINIUM PAINTS', '', '2022-12-28 22:30:54'),
(64, 0, 0, 'ASIAN PAINTS ALUMINIUM PAINTS', '4 LTR', 'ALUMINIUM PAINTS', '', '2022-12-28 22:31:34'),
(65, 0, 0, 'ASIAN PAINTS ALUMINIUM PAINTS', '1 LTR', 'ALUMINIUM PAINTS', '', '2022-12-28 22:31:55'),
(66, 0, 0, 'ASIAN PAINTS ALUMINIUM PAINTS', '500 ML', 'ALUMINIUM PAINTS', '9', '2022-12-28 22:32:24'),
(67, 0, 0, 'INDIGO FLORA SNOWCWM', '25 KG', 'SNOWCEM', '20', '2022-12-28 22:33:20'),
(68, 0, 0, 'KAMDHENU SNOWCEM', '25 KG', 'SNOWCEM', '', '2022-12-28 22:33:46'),
(69, 0, 0, 'ASIAN PAINTS PLASTER COAT', '40 KG', 'SNOWCEM', '26', '2022-12-28 22:34:10'),
(70, 0, 0, 'BERGER DUROCEM NEO', '25 KG', 'SNOWCEM', '', '2022-12-28 22:34:46'),
(71, 0, 0, 'JK WHITE CEMENT', '5 KG', 'WHITE CEMENT', '9', '2022-12-28 22:35:48'),
(72, 0, 0, 'JK WHITE CEMENT', '1 KG', 'WHITE CEMENT', '50', '2022-12-28 22:36:25'),
(73, 0, 0, 'BIRLA WHITE CEMENT', '5 KG', 'WHITE CEMENT', '', '2022-12-28 22:36:44'),
(74, 0, 0, 'BIRLA WHITE CEMENT', '1 KG', 'WHITE CEMENT', '', '2022-12-28 22:37:02'),
(75, 0, 0, 'BERGER LONGLIFE 10-WHITE', '20 LTR', 'BERGER EMULSION', '', '2022-12-28 22:38:41'),
(76, 0, 0, 'BERGER LONGLIFE 10-WHITE', '10 LTR', 'BERGER EMULSION', '', '2022-12-28 22:38:59'),
(77, 0, 0, 'BERGER LONGLIFE 10-WHITE', '4 LTR', 'BERGER EMULSION', '', '2022-12-28 22:39:17'),
(78, 0, 0, 'BERGER LONGLIFE 10-WHITE', '1 LTR', 'BERGER EMULSION', '', '2022-12-28 22:39:34'),
(79, 0, 0, 'BERGER LONGLIFE 10-P0', '20 LTR', 'BERGER EMULSION', '6', '2022-12-28 22:40:05'),
(80, 0, 0, 'BERGER LONGLIFE 10-P0', '10 LTR', 'BERGER EMULSION', '1', '2022-12-28 22:40:22'),
(81, 0, 0, 'BERGER LONGLIFE 10-P0', '4 LTR', 'BERGER EMULSION', '2', '2022-12-28 22:40:35'),
(82, 0, 0, 'BERGER LONGLIFE 10-P0', '1 LTR', 'BERGER EMULSION', '5', '2022-12-28 22:40:55'),
(83, 0, 0, 'BERGER LONGLIFE 10-P1', '20 LTR', 'BERGER EMULSION', '', '2022-12-28 22:42:17'),
(84, 0, 0, 'BERGER LONGLIFE 10-P1', '10 LTR', 'BERGER EMULSION', '2', '2022-12-28 22:42:33'),
(85, 0, 0, 'BERGER LONGLIFE 10-P1', '4 LTR', 'BERGER EMULSION', '3', '2022-12-28 22:42:48'),
(86, 0, 0, 'BERGER LONGLIFE 10-P1', '1 LTR', 'BERGER EMULSION', '4', '2022-12-28 22:43:08'),
(87, 0, 0, 'BERGER LONGLIFE 10-N1', '20 LTR', 'BERGER EMULSION', '2', '2022-12-28 22:43:57'),
(88, 0, 0, 'BERGER LONGLIFE 10-N1', '10 LTR', 'BERGER EMULSION', '2', '2022-12-28 22:44:14'),
(89, 0, 0, 'BERGER LONGLIFE 10-N1', '4 LTR', 'BERGER EMULSION', '3', '2022-12-28 22:44:32'),
(90, 0, 0, 'BERGER LONGLIFE 10-N1', '1 LTR', 'BERGER EMULSION', '1', '2022-12-28 22:44:51'),
(91, 0, 0, 'BERGER LONGLIFE 10-N2', '20 LTR', 'BERGER EMULSION', '1', '2022-12-28 22:45:46'),
(92, 0, 0, 'BERGER LONGLIFE 10-N2', '10 LTR', 'BERGER EMULSION', '1', '2022-12-28 22:46:04'),
(93, 0, 0, 'BERGER LONGLIFE 10-N2', '4 LTR', 'BERGER EMULSION', '3', '2022-12-28 22:46:23'),
(94, 0, 0, 'BERGER LONGLIFE 10-N2', '1 LTR', 'BERGER EMULSION', '5', '2022-12-28 22:46:38'),
(95, 0, 0, 'BERGER LONGLIFE 10-YELLOW', '20 LTR', 'BERGER EMULSION', '1', '2022-12-28 22:47:25'),
(96, 0, 0, 'BERGER LONGLIFE 10-YELLOW', '10 LTR', '', '2', '2022-12-28 22:47:49'),
(97, 0, 0, 'BERGER LONGLIFE 10-YELLOW', '4 LTR', '', '3', '2022-12-28 22:48:03'),
(98, 0, 0, 'BERGER LONGLIFE 10-YELLOW', '1 LTR', '', '4', '2022-12-28 22:48:12'),
(99, 0, 0, 'BERGER LONGLIFE 10-CR7', '20 LTR', '', '1', '2022-12-28 22:48:39'),
(100, 0, 0, 'BERGER LONGLIFE 10-CR7', '10 LTR', '', '1', '2022-12-28 22:48:49'),
(101, 0, 0, 'BERGER LONGLIFE 10-CR7', '4 LTR', '', '4', '2022-12-28 22:48:59'),
(102, 0, 0, 'BERGER LONGLIFE 10-CR7', '1 LTR', '', '6', '2022-12-28 22:49:09'),
(103, 0, 0, 'BERGER WEATHERCOAT GLOW-P0', '20 LTR', '', '8', '2022-12-28 22:50:31'),
(104, 0, 0, 'BERGER WEATHERCOAT GLOW-P0', '10 LTR', '', '1', '2022-12-28 22:50:41'),
(105, 0, 0, 'BERGER WEATHERCOAT GLOW-P0', '4 LTR', '', '5', '2022-12-28 22:50:50'),
(106, 0, 0, 'BERGER WEATHERCOAT GLOW-P0', '1 LTR', '', '4', '2022-12-28 22:50:59'),
(107, 0, 0, 'BERGER WEATHERCOAT GLOW-W1', '20 LTR', '', '2', '2022-12-28 22:51:32'),
(108, 0, 0, 'BERGER WEATHERCOAT GLOW-W1', '10 LTR', '', '1', '2022-12-28 22:51:41'),
(109, 0, 0, 'BERGER WEATHERCOAT GLOW-W1', '4 LTR', '', '2', '2022-12-28 22:51:50'),
(110, 0, 0, 'BERGER WEATHERCOAT GLOW-W1', '1 LTR', '', '2', '2022-12-28 22:51:59'),
(111, 0, 0, 'BERGER WEATHERCOAT GLOW-N1', '20 LTR', '', '1', '2022-12-28 22:52:43'),
(112, 0, 0, 'BERGER WEATHERCOAT GLOW-N1', '10 LTR', '', '2', '2022-12-28 22:52:54'),
(113, 0, 0, 'BERGER WEATHERCOAT GLOW-N1', '4 LTR', '', '2', '2022-12-28 22:53:05'),
(114, 0, 0, 'BERGER WEATHERCOAT GLOW-N1', '1 LTR', '', '4', '2022-12-28 22:53:16'),
(115, 0, 0, 'BERGER WEATHERCOAT GLOW-N2', '20 LTR', '', '2', '2022-12-28 22:54:31'),
(116, 0, 0, 'BERGER WEATHERCOAT GLOW-N2', '10 LTR', '', '1', '2022-12-28 22:54:43'),
(117, 0, 0, 'BERGER WEATHERCOAT GLOW-N2', '4 LTR', '', '4', '2022-12-28 22:54:52'),
(118, 0, 0, 'BERGER WEATHERCOAT GLOW-N2', '1 LTR', '', '7', '2022-12-28 22:55:02'),
(119, 0, 0, 'BERGER WEATHERCOAT GLOW-YELLOW', '20 LTR', '', '2', '2022-12-28 22:55:42'),
(120, 0, 0, 'BERGER WEATHERCOAT GLOW-YELLOW', '10 LTR', '', '1', '2022-12-28 22:55:50'),
(121, 0, 0, 'BERGER WEATHERCOAT GLOW-YELLOW', '4 LTR', '', '4', '2022-12-28 22:55:58'),
(122, 0, 0, 'BERGER WEATHERCOAT GLOW-YELLOW', '1 LTR', '', '7', '2022-12-28 22:56:06'),
(123, 0, 0, 'BERGER WEATHERCOAT GLOW-IVORY', '20 LTR', '', '', '2022-12-28 22:56:26'),
(124, 0, 0, 'BERGER WEATHERCOAT GLOW-IVORY', '10 LTR', '', '1', '2022-12-28 22:56:34'),
(125, 0, 0, 'BERGER WEATHERCOAT GLOW-IVORY', '4 LTR', '', '', '2022-12-28 22:56:43'),
(126, 0, 0, 'BERGER WEATHERCOAT GLOW-IVORY', '1 LTR', '', '', '2022-12-28 22:56:52'),
(127, 0, 0, 'BERGER WEATHERCOAT GLOW-RED', '20 LTR', '', '', '2022-12-28 22:57:13'),
(128, 0, 0, 'BERGER WEATHERCOAT GLOW-RED', '10 LTR', '', '', '2022-12-28 22:57:21'),
(129, 0, 0, 'BERGER WEATHERCOAT GLOW-RED', '4 LTR', '', '2', '2022-12-28 22:57:31'),
(130, 0, 0, 'BERGER WEATHERCOAT GLOW-RED', '1 LTR', '', '2', '2022-12-28 22:57:39'),
(131, 0, 0, 'BERGER WEATHERCOAT GLOW-BROWN', '20 LTR', '', '', '2022-12-28 22:58:07'),
(132, 0, 0, 'BERGER WEATHERCOAT GLOW-BROWN', '10 LTR', '', '', '2022-12-28 22:58:27'),
(133, 0, 0, 'BERGER WEATHERCOAT GLOW-BROWN', '4 LTR', '', '2', '2022-12-28 22:58:37'),
(134, 0, 0, 'BERGER WEATHERCOAT GLOW-BROWN', '1 LTR', '', '5', '2022-12-28 22:58:47'),
(135, 0, 0, 'BERGER WEATHERCOAT GLOW-SIGNAL RED', '20 LTR', '', '', '2022-12-28 22:59:47'),
(136, 0, 0, 'BERGER WEATHERCOAT GLOW-SIGNAL RED', '10 LTR', '', '', '2022-12-28 23:00:05'),
(137, 0, 0, 'BERGER WEATHERCOAT GLOW-SIGNAL RED', '4 LTR', '', '2', '2022-12-28 23:00:15'),
(138, 0, 0, 'BERGER WEATHERCOAT GLOW-SIGNAL RED', '1 LTR', '', '3', '2022-12-28 23:00:26'),
(139, 0, 0, 'BERGER WALMASTA-PO', '20 LTR', '', '', '2022-12-29 17:55:06'),
(140, 0, 0, 'BERGER WALMASTA-PO', '10 LTR', '', '', '2022-12-29 17:55:17'),
(141, 0, 0, 'BERGER WALMASTA-PO', '4 LTR', '', '', '2022-12-29 17:55:27'),
(142, 0, 0, 'BERGER WALMASTA-PO', '1 LTR', '', '', '2022-12-29 17:55:38'),
(143, 0, 0, 'BERGER WALMASTA-W1', '20 LTR', '', '', '2022-12-29 17:56:23'),
(144, 0, 0, 'BERGER WALMASTA-W1', '10 LTR', '', '', '2022-12-29 17:57:00'),
(145, 0, 0, 'BERGER WALMASTA-W1', '4 LTR', '', '', '2022-12-29 17:57:11'),
(146, 0, 0, 'BERGER WALMASTA-W1', '1 LTR', '', '', '2022-12-29 17:57:19'),
(147, 0, 0, 'BERGER WALMASTA-N1', '20 LTR', '', '', '2022-12-29 17:58:40'),
(148, 0, 0, 'BERGER WALMASTA-N1', '10 LTR', '', '', '2022-12-29 17:59:00'),
(149, 0, 0, 'BERGER WALMASTA-N1', '4 LTR', '', '', '2022-12-29 17:59:09'),
(150, 0, 0, 'BERGER WALMASTA-N1', '1 LTR', '', '', '2022-12-29 17:59:18'),
(151, 0, 0, 'BERGER WALMASTA-N2', '20 LTR', '', '', '2022-12-29 17:59:33'),
(152, 0, 0, 'BERGER WALMASTA-N2', '10 LTR', '', '', '2022-12-29 17:59:43'),
(153, 0, 0, 'BERGER WALMASTA-N2', '4 LTR', '', '', '2022-12-29 17:59:52'),
(154, 0, 0, 'BERGER WALMASTA-N2', '1 LTR', '', '', '2022-12-29 18:00:00'),
(155, 0, 0, 'BERGER WALMASTA-CREAM', '20 LTR', '', '', '2022-12-29 18:00:38'),
(156, 0, 0, 'BERGER WALMASTA-CREAM', '10 LTR', '', '', '2022-12-29 18:01:10'),
(157, 0, 0, 'BERGER WALMASTA-CREAM', '4 LTR', '', '', '2022-12-29 18:01:20'),
(158, 0, 0, 'BERGER WALMASTA-CREAM', '1 LTR', '', '', '2022-12-29 18:01:31'),
(159, 0, 0, 'BERGER WALMASTA-BROWN', '20 LTR', '', '', '2022-12-29 18:03:32'),
(160, 0, 0, 'BERGER WALMASTA-BROWN', '10 LTR', '', '', '2022-12-29 18:03:50'),
(161, 0, 0, 'BERGER WALMASTA-BROWN', '4 LTR', '', '', '2022-12-29 18:04:00'),
(162, 0, 0, 'BERGER WALMASTA-BROWN', '1 LTR', '', '', '2022-12-29 18:04:09'),
(163, 0, 0, 'BERGER WALMASTA-YELLOW', '20 LTR', '', '', '2022-12-29 18:04:53'),
(164, 0, 0, 'BERGER WALMASTA-YELLOW', '10 LTR', '', '', '2022-12-29 18:05:01'),
(165, 0, 0, 'BERGER WALMASTA-YELLOW', '4 LTR', '', '', '2022-12-29 18:05:12'),
(166, 0, 0, 'BERGER WALMASTA-YELLOW', '1 LTR', '', '', '2022-12-29 18:05:20'),
(167, 0, 0, 'BERGER EASYCLEAN-P0', '20 LTR', '', '6', '2022-12-29 18:06:34'),
(168, 0, 0, 'BERGER EASYCLEAN-P0', '10 LTR', '', '1', '2022-12-29 18:08:36'),
(169, 0, 0, 'BERGER EASYCLEAN-P0', '4 LTR', '', '1', '2022-12-29 18:08:53'),
(170, 0, 0, 'BERGER EASYCLEAN-P0', '1 LTR', '', '', '2022-12-29 18:09:02'),
(171, 0, 0, 'BERGER EASYCLEAN-W1', '20 LTR', '', '', '2022-12-29 18:10:03'),
(172, 0, 0, 'BERGER EASYCLEAN-W1', '10 LTR', '', '1', '2022-12-29 18:10:20'),
(173, 0, 0, 'BERGER EASYCLEAN-W1', '4 LTR', '', '2', '2022-12-29 18:10:35'),
(174, 0, 0, 'BERGER EASYCLEAN-W1', '1 LTR', '', '', '2022-12-29 18:10:44'),
(175, 0, 0, 'BERGER EASYCLEAN-N1', '20 LTR', '', '', '2022-12-29 18:11:16'),
(176, 0, 0, 'BERGER EASYCLEAN-N1', '10 LTR', '', '', '2022-12-29 18:11:28'),
(177, 0, 0, 'BERGER EASYCLEAN-N1', '4 LTR', '', '', '2022-12-29 18:11:37'),
(178, 0, 0, 'BERGER EASYCLEAN-N1', '1 LTR', '', '', '2022-12-29 18:11:51'),
(179, 0, 0, 'BERGER EASYCLEAN-N2', '20 LTR', '', '', '2022-12-29 18:12:40'),
(180, 0, 0, 'BERGER EASYCLEAN-N2', '10 LTR', '', '', '2022-12-29 18:12:49'),
(181, 0, 0, 'BERGER EASYCLEAN-N2', '4 LTR', '', '4', '2022-12-29 18:12:58'),
(182, 0, 0, 'BERGER EASYCLEAN-N2', '1 LTR', '', '1', '2022-12-29 18:13:07'),
(183, 0, 0, 'BERGER EASYCLEAN-YELLOW', '20 LTR', '', '', '2022-12-29 18:13:43'),
(184, 0, 0, 'BERGER EASYCLEAN-YELLOW', '10 LTR', '', '', '2022-12-29 18:13:52'),
(185, 0, 0, 'BERGER EASYCLEAN-YELLOW', '4 LTR', '', '4', '2022-12-29 18:14:00'),
(186, 0, 0, 'BERGER EASYCLEAN-YELLOW', '1 LTR', '', '3', '2022-12-29 18:14:09'),
(187, 0, 0, 'BERGER BISON-P0', '20 LTR', '', '', '2022-12-29 18:15:26'),
(188, 0, 0, 'BERGER BISON-P0', '10 LTR', '', '', '2022-12-29 18:15:35'),
(189, 0, 0, 'BERGER BISON-P0', '4 LTR', '', '', '2022-12-29 18:15:48'),
(190, 0, 0, 'BERGER BISON-P0', '1 LTR', '', '', '2022-12-29 18:15:58'),
(191, 0, 0, 'BERGER BISON-W1', '20 LTR', '', '', '2022-12-29 18:16:51'),
(192, 0, 0, 'BERGER BISON-W1', '10 LTR', '', '', '2022-12-29 18:17:06'),
(193, 0, 0, 'BERGER BISON-W1', '4 LTR', '', '4', '2022-12-29 18:17:14'),
(194, 0, 0, 'BERGER BISON-W1', '1 LTR', '', '4', '2022-12-29 18:17:22'),
(195, 0, 0, 'BERGER BISON-N2', '20 LTR', '', '', '2022-12-29 18:19:41'),
(196, 0, 0, 'BERGER BISON-N2', '10 LTR', '', '', '2022-12-29 18:19:58'),
(197, 0, 0, 'BERGER BISON-N2', '4 LTR', '', '4', '2022-12-29 18:20:39'),
(198, 0, 0, 'BERGER BISON-N2', '1 LTR', '', '6', '2022-12-29 18:20:48'),
(199, 0, 0, 'BERGER BISON-CREAM', '20 LTR', '', '', '2022-12-29 18:30:07'),
(200, 0, 0, 'BERGER BISON-CREAM', '10 LTR', '', '', '2022-12-29 18:48:10'),
(201, 0, 0, 'BERGER BISON-CREAM', '4 LTR', '', '', '2022-12-29 18:48:21'),
(202, 0, 0, 'BERGER BISON-CREAM', '1 LTR', '', '', '2022-12-29 18:48:36'),
(203, 0, 0, 'BERGER BISON-YELLOW', '20 LTR', '', '', '2022-12-29 18:49:18'),
(204, 0, 0, 'BERGER BISON-YELLOW', '10 LTR', '', '', '2022-12-29 18:49:27'),
(205, 0, 0, 'BERGER BISON-YELLOW', '4 LTR', '', '4', '2022-12-29 18:49:37'),
(206, 0, 0, 'BERGER BISON-YELLOW', '1 LTR', '', '3', '2022-12-29 18:49:46'),
(207, 0, 0, 'BERGER SILKGLAMOR-ULTRAWHITE', '20 LTR', '', '18', '2022-12-29 18:53:48'),
(208, 0, 0, 'BERGER SILKGLAMOR-ULTRAWHITE', '10 LTR', '', '1', '2022-12-29 18:54:14'),
(209, 0, 0, 'BERGER SILKGLAMOR-ULTRAWHITE', '4 LTR', '', '', '2022-12-29 18:54:38'),
(210, 0, 0, 'BERGER SILKGLAMOR-ULTRAWHITE', '1 LTR', '', '7', '2022-12-29 18:54:50'),
(211, 0, 0, 'BERGER SILKGLAMOR-P0', '20 LTR', '', '', '2022-12-29 18:58:06'),
(212, 0, 0, 'BERGER SILKGLAMOR-P0', '10 LTR', '', '1', '2022-12-29 18:58:14'),
(213, 0, 0, 'BERGER SILKGLAMOR-P0', '4 LTR', '', '6', '2022-12-29 18:58:23'),
(214, 0, 0, 'BERGER SILKGLAMOR-P0', '1 LTR', '', '2', '2022-12-29 18:58:33'),
(215, 0, 0, 'BERGER SILKGLAMOR-W1', '20 LTR', '', '', '2022-12-29 19:25:42'),
(216, 0, 0, 'BERGER SILKGLAMOR-W1', '10 LTR', '', '1', '2022-12-29 19:25:54'),
(217, 0, 0, 'BERGER SILKGLAMOR-W1', '4 LTR', '', '2', '2022-12-29 19:26:03'),
(218, 0, 0, 'BERGER SILKGLAMOR-W1', '1 LTR', '', '6', '2022-12-29 19:26:19'),
(219, 0, 0, 'BERGER SILKGLAMOR-N2', '20 LTR', '', '', '2022-12-29 19:26:45'),
(220, 0, 0, 'BERGER SILKGLAMOR-N2', '10 LTR', '', '', '2022-12-29 19:26:59'),
(221, 0, 0, 'BERGER SILKGLAMOR-N2', '4 LTR', '', '4', '2022-12-29 19:27:07'),
(222, 0, 0, 'BERGER SILKGLAMOR-N2', '1 LTR', '', '3', '2022-12-29 19:27:15'),
(223, 0, 0, 'BERGER SILKGLAMOR-YELLOW', '20 LTR', '', '', '2022-12-29 19:29:07'),
(224, 0, 0, 'BERGER SILKGLAMOR-YELLOW', '10 LTR', '', '', '2022-12-29 19:29:23'),
(225, 0, 0, 'BERGER SILKGLAMOR-YELLOW', '4 LTR', '', '4', '2022-12-29 19:29:33'),
(226, 0, 0, 'BERGER SILKGLAMOR-YELLOW', '1 LTR', '', '6', '2022-12-29 19:29:42'),
(227, 0, 0, 'BERGER SILKGLAMART-GOLD', '1 LTR', '', '4', '2022-12-29 19:30:17'),
(228, 0, 0, 'BERGER SILKGLAMART-GOLD', '200 ML', '', '5', '2022-12-29 19:30:38'),
(229, 0, 0, 'BERGER SILKGLAMART-SILVER', '1 LTR', '', '3', '2022-12-29 19:30:51'),
(230, 0, 0, 'BERGER SILKGLAMART-SILVER', '200 ML', '', '', '2022-12-29 19:31:05'),
(231, 0, 0, 'ASIAN PAINTS ACE SHYNE-AH2', '20 LTR', '', '', '2022-12-30 10:33:46'),
(232, 0, 0, 'ASIAN PAINTS ACE SHYNE-AH2', '10 LTR', '', '', '2022-12-30 10:33:56'),
(233, 0, 0, 'ASIAN PAINTS ACE SHYNE-AH2', '4 LTR', '', '3', '2022-12-30 10:34:05'),
(234, 0, 0, 'ASIAN PAINTS ACE SHYNE-AH2', '1 LTR', '', '4', '2022-12-30 10:34:14'),
(235, 0, 0, 'ASIAN PAINTS ACE SHYNE-AH10', '20 LTR', '', '1', '2022-12-30 10:34:28'),
(236, 0, 0, 'ASIAN PAINTS ACE SHYNE-AH10', '10 LTR', '', '2', '2022-12-30 10:34:41'),
(237, 0, 0, 'ASIAN PAINTS ACE SHYNE-AH10', '4 LTR', '', '4', '2022-12-30 10:34:50'),
(238, 0, 0, 'ASIAN PAINTS ACE SHYNE-AH10', '1 LTR', '', '2', '2022-12-30 10:35:00'),
(239, 0, 0, 'ASIAN PAINTS ACE SHYNE-AH21', '20 LTR', '', '', '2022-12-30 10:35:33'),
(240, 0, 0, 'ASIAN PAINTS ACE SHYNE-AH21', '10 LTR', '', '2', '2022-12-30 10:35:41'),
(241, 0, 0, 'ASIAN PAINTS ACE SHYNE-AH21', '4 LTR', '', '4', '2022-12-30 10:35:50'),
(242, 0, 0, 'ASIAN PAINTS ACE SHYNE-AH21', '1 LTR', '', '6', '2022-12-30 10:35:59'),
(243, 0, 0, 'ASIAN PAINTS APEX SHYNE-AY2', '20 LTR', '', '1', '2022-12-30 10:36:27'),
(244, 0, 0, 'ASIAN PAINTS APEX SHYNE-AY2', '10 LTR', '', '', '2022-12-30 10:36:35'),
(245, 0, 0, 'ASIAN PAINTS APEX SHYNE-AY2', '4 LTR', '', '3', '2022-12-30 10:36:44'),
(246, 0, 0, 'ASIAN PAINTS APEX SHYNE-AY2', '1 LTR', '', '4', '2022-12-30 10:36:53'),
(247, 0, 0, 'ASIAN PAINTS APEX SHYNE-AY11', '20 LTR', '', '', '2022-12-30 10:37:16'),
(248, 0, 0, 'ASIAN PAINTS APEX SHYNE-AY11', '10 LTR', '', '2', '2022-12-30 10:37:23'),
(249, 0, 0, 'ASIAN PAINTS APEX SHYNE-AY11', '4 LTR', '', '4', '2022-12-30 10:37:32'),
(250, 0, 0, 'ASIAN PAINTS APEX SHYNE-AY11', '1 LTR', '', '7', '2022-12-30 10:37:40'),
(251, 0, 0, 'ASIAN PAINTS APEX SHYNE-AY17', '20 LTR', '', '1', '2022-12-30 10:38:06'),
(252, 0, 0, 'ASIAN PAINTS APEX SHYNE-AY17', '10 LTR', '', '2', '2022-12-30 10:38:13'),
(253, 0, 0, 'ASIAN PAINTS APEX SHYNE-AY17', '4 LTR', '', '7', '2022-12-30 10:38:21'),
(254, 0, 0, 'ASIAN PAINTS APEX SHYNE-AY17', '1 LTR', '', '3', '2022-12-30 10:38:29'),
(255, 0, 0, 'ASIAN PAINTS APEX SHYNE-AY21', '20 LTR', '', '1', '2022-12-30 10:38:45'),
(256, 0, 0, 'ASIAN PAINTS APEX SHYNE-AY21', '10 LTR', '', '2', '2022-12-30 10:38:54'),
(257, 0, 0, 'ASIAN PAINTS APEX SHYNE-AY21', '4 LTR', '', '8', '2022-12-30 10:39:04'),
(258, 0, 0, 'ASIAN PAINTS APEX SHYNE-AY21', '1 LTR', '', '12', '2022-12-30 10:39:12'),
(259, 0, 0, 'ASIAN PAINTS APEX-AB2', '20 LTR', '', '1', '2022-12-30 10:39:59'),
(260, 0, 0, 'ASIAN PAINTS APEX-AB2', '10 LTR', '', '1', '2022-12-30 10:40:07'),
(261, 0, 0, 'ASIAN PAINTS APEX-AB2', '4 LTR', '', '7', '2022-12-30 10:40:14'),
(262, 0, 0, 'ASIAN PAINTS APEX-AB2', '1 LTR', '', '7', '2022-12-30 10:40:22'),
(263, 0, 0, 'ASIAN PAINTS APEX-AB6', '20 LTR', '', '25', '2022-12-30 10:40:45'),
(264, 0, 0, 'ASIAN PAINTS APEX-AB6', '10 LTR', '', '7', '2022-12-30 10:40:52'),
(265, 0, 0, 'ASIAN PAINTS APEX-AB6', '4 LTR', '', '14', '2022-12-30 10:41:00'),
(266, 0, 0, 'ASIAN PAINTS APEX-AB6', '1 LTR', '', '14', '2022-12-30 10:41:08'),
(267, 0, 0, 'ASIAN PAINTS APEX-AB11', '20 LTR', '', '1', '2022-12-30 10:42:02'),
(268, 0, 0, 'ASIAN PAINTS APEX-AB11', '10 LTR', '', '1', '2022-12-30 10:42:10'),
(269, 0, 0, 'ASIAN PAINTS APEX-AB11', '4 LTR', '', '7', '2022-12-30 10:42:18'),
(270, 0, 0, 'ASIAN PAINTS APEX-AB11', '1 LTR', '', '5', '2022-12-30 10:42:28'),
(271, 0, 0, 'ASIAN PAINTS APEX-AB12', '20 LTR', '', '', '2022-12-30 10:43:06'),
(272, 0, 0, 'ASIAN PAINTS APEX-AB12', '10 LTR', '', '', '2022-12-30 10:43:14'),
(273, 0, 0, 'ASIAN PAINTS APEX-AB12', '4 LTR', '', '', '2022-12-30 10:43:22'),
(274, 0, 0, 'ASIAN PAINTS APEX-AB12', '1 LTR', '', '6', '2022-12-30 10:43:30'),
(275, 0, 0, 'ASIAN PAINTS APEX-AB15', '20 LTR', '', '', '2022-12-30 10:46:09'),
(276, 0, 0, 'ASIAN PAINTS APEX-AB15', '10 LTR', '', '', '2022-12-30 10:46:25'),
(277, 0, 0, 'ASIAN PAINTS APEX-AB15', '4 LTR', '', '', '2022-12-30 10:46:34'),
(278, 0, 0, 'ASIAN PAINTS APEX-AB15', '1 LTR', '', '8', '2022-12-30 10:46:43'),
(279, 0, 0, 'ASIAN PAINTS APEX-AB17C', '20 LTR', '', '1', '2022-12-30 10:46:58'),
(280, 0, 0, 'ASIAN PAINTS APEX-AB17C', '10 LTR', '', '2', '2022-12-30 10:47:14'),
(281, 0, 0, 'ASIAN PAINTS APEX-AB17C', '4 LTR', '', '7', '2022-12-30 10:47:23'),
(282, 0, 0, 'ASIAN PAINTS APEX-AB17C', '1 LTR', '', '4', '2022-12-30 10:47:31'),
(283, 0, 0, 'ASIAN PAINTS APEX-AB18C', '20 LTR', '', '', '2022-12-30 10:47:50'),
(284, 0, 0, 'ASIAN PAINTS APEX-AB18C', '10 LTR', '', '', '2022-12-30 10:47:59'),
(285, 0, 0, 'ASIAN PAINTS APEX-AB18C', '4 LTR', '', '', '2022-12-30 10:48:06'),
(286, 0, 0, 'ASIAN PAINTS APEX-AB18C', '1 LTR', '', '3', '2022-12-30 10:48:14'),
(287, 0, 0, 'ASIAN PAINTS APEX-AB21G', '20 LTR', '', '1', '2022-12-30 10:48:45'),
(288, 0, 0, 'ASIAN PAINTS APEX-AB21G', '10 LTR', '', '1', '2022-12-30 10:48:53'),
(289, 0, 0, 'ASIAN PAINTS APEX-AB21G', '4 LTR', '', '3', '2022-12-30 10:49:03'),
(290, 0, 0, 'ASIAN PAINTS APEX-AB21G', '1 LTR', '', '3', '2022-12-30 10:49:12'),
(291, 0, 0, 'ASIAN PAINTS APEX ULTIMA-HQ2N', '20 LTR', '', '1', '2022-12-30 10:50:20'),
(292, 0, 0, 'ASIAN PAINTS APEX ULTIMA-HQ2N', '10 LTR', '', '1', '2022-12-30 10:50:28'),
(293, 0, 0, 'ASIAN PAINTS APEX ULTIMA-HQ2N', '4 LTR', '', '2', '2022-12-30 10:50:36'),
(294, 0, 0, 'ASIAN PAINTS APEX ULTIMA-HQ2N', '1 LTR', '', '12', '2022-12-30 10:50:45'),
(295, 0, 0, 'ASIAN PAINTS APEX ULTIMA-HQ10N', '20 LTR', '', '1', '2022-12-30 10:51:03'),
(296, 0, 0, 'ASIAN PAINTS APEX ULTIMA-HQ10N', '10 LTR', '', '1', '2022-12-30 10:51:10'),
(297, 0, 0, 'ASIAN PAINTS APEX ULTIMA-HQ10N', '4 LTR', '', '3', '2022-12-30 10:51:18'),
(298, 0, 0, 'ASIAN PAINTS APEX ULTIMA-HQ10N', '1 LTR', '', '5', '2022-12-30 10:51:31'),
(299, 0, 0, 'ASIAN PAINTS APEX ULTIMA-HQ13', '20 LTR', '', '', '2022-12-30 10:51:55'),
(300, 0, 0, 'ASIAN PAINTS APEX ULTIMA-HQ13', '10 LTR', '', '', '2022-12-30 10:52:03'),
(301, 0, 0, 'ASIAN PAINTS APEX ULTIMA-HQ13', '4 LTR', '', '', '2022-12-30 10:52:11'),
(302, 0, 0, 'ASIAN PAINTS APEX ULTIMA-HQ13', '1 LTR', '', '4', '2022-12-30 10:58:04'),
(303, 0, 0, 'ASIAN PAINTS APEX ULTIMA-HQ16', '20 LTR', '', '', '2022-12-30 11:07:59'),
(304, 0, 0, 'ASIAN PAINTS APEX ULTIMA-HQ16', '10 LTR', '', '', '2022-12-30 11:08:09'),
(305, 0, 0, 'ASIAN PAINTS APEX ULTIMA-HQ16', '4 LTR', '', '', '2022-12-30 11:08:17'),
(306, 0, 0, 'ASIAN PAINTS APEX ULTIMA-HQ16', '1 LTR', '', '8', '2022-12-30 11:08:28'),
(307, 0, 0, 'ASIAN PAINTS APEX ULTIMA-HQ17', '20 LTR', '', '1', '2022-12-30 11:12:17'),
(308, 0, 0, 'ASIAN PAINTS APEX ULTIMA-HQ17', '10 LTR', '', '2', '2022-12-30 11:12:25'),
(309, 0, 0, 'ASIAN PAINTS APEX ULTIMA-HQ17', '4 LTR', '', '5', '2022-12-30 11:12:33'),
(310, 0, 0, 'ASIAN PAINTS APEX ULTIMA-HQ17', '1 LTR', '', '8', '2022-12-30 11:12:41'),
(311, 0, 0, 'ASIAN PAINTS APEX ULTIMA-HQ20N', '20 LTR', '', '1', '2022-12-30 11:14:30'),
(312, 0, 0, 'ASIAN PAINTS APEX ULTIMA-HQ20N', '10 LTR', '', '1', '2022-12-30 11:15:08'),
(313, 0, 0, 'ASIAN PAINTS APEX ULTIMA-HQ20N', '4 LTR', '', '5', '2022-12-30 11:15:21'),
(314, 0, 0, 'ASIAN PAINTS APEX ULTIMA-HQ20N', '1 LTR', '', '7', '2022-12-30 11:15:30'),
(315, 0, 0, 'ASIAN PAINTS ROYALE-RB1N', '20 LTR', '', '', '2022-12-30 12:51:31'),
(316, 0, 0, 'ASIAN PAINTS ROYALE-RB1N', '10 LTR', '', '1', '2022-12-30 12:51:39'),
(317, 0, 0, 'ASIAN PAINTS ROYALE-RB1N', '4 LTR', '', '4', '2022-12-30 12:51:57'),
(318, 0, 0, 'ASIAN PAINTS ROYALE-RB1N', '1 LTR', '', '6', '2022-12-30 12:52:17'),
(319, 0, 0, 'ASIAN PAINTS ROYALE-RB11', '20 LTR', '', '', '2022-12-30 12:53:11'),
(320, 0, 0, 'ASIAN PAINTS ROYALE-RB11', '10 LTR', '', '', '2022-12-30 12:53:20'),
(321, 0, 0, 'ASIAN PAINTS ROYALE-RB11', '4 LTR', '', '', '2022-12-30 12:53:30'),
(322, 0, 0, 'ASIAN PAINTS ROYALE-RB11', '1 LTR', '', '', '2022-12-30 12:53:38'),
(323, 0, 0, 'ASIAN PAINTS ROYALE-RB13', '20 LTR', '', '', '2022-12-30 12:53:57'),
(324, 0, 0, 'ASIAN PAINTS ROYALE-RB13', '10 LTR', '', '', '2022-12-30 12:54:06'),
(325, 0, 0, 'ASIAN PAINTS ROYALE-RB13', '4 LTR', '', '4', '2022-12-30 12:54:15'),
(326, 0, 0, 'ASIAN PAINTS ROYALE-RB13', '1 LTR', '', '6', '2022-12-30 12:54:24'),
(327, 0, 0, 'ASIAN PAINTS ROYALE-RB15', '20 LTR', '', '', '2022-12-30 12:54:56'),
(328, 0, 0, 'ASIAN PAINTS ROYALE-RB15', '10 LTR', '', '', '2022-12-30 12:55:03'),
(329, 0, 0, 'ASIAN PAINTS ROYALE-RB15', '4 LTR', '', '', '2022-12-30 12:55:11'),
(330, 0, 0, 'ASIAN PAINTS ROYALE-RB15', '1 LTR', '', '6', '2022-12-30 12:55:19'),
(331, 0, 0, 'ASIAN PAINTS ROYALE-RB22', '20 LTR', '', '', '2022-12-30 12:55:48'),
(332, 0, 0, 'ASIAN PAINTS ROYALE-RB22', '10 LTR', '', '', '2022-12-30 12:55:57'),
(333, 0, 0, 'ASIAN PAINTS ROYALE-RB22', '4 LTR', '', '', '2022-12-30 12:56:04'),
(334, 0, 0, 'ASIAN PAINTS ROYALE-RB22', '1 LTR', '', '', '2022-12-30 12:56:12'),
(335, 0, 0, 'ASIAN PAINTS ROYALE SHYNE-SN3', '20 LTR', '', '', '2022-12-30 12:56:57'),
(336, 0, 0, 'ASIAN PAINTS ROYALE SHYNE-SN3', '10 LTR', '', '1', '2022-12-30 12:57:18'),
(337, 0, 0, 'ASIAN PAINTS ROYALE SHYNE-SN3', '4 LTR', '', '3', '2022-12-30 12:57:25'),
(338, 0, 0, 'ASIAN PAINTS ROYALE SHYNE-SN3', '1 LTR', '', '7', '2022-12-30 12:57:32'),
(339, 0, 0, 'ASIAN PAINTS ROYALE SHYNE-SN10', '20 LTR', '', '', '2022-12-30 12:57:59'),
(340, 0, 0, 'ASIAN PAINTS ROYALE SHYNE-SN10', '10 LTR', '', '1', '2022-12-30 12:58:08'),
(341, 0, 0, 'ASIAN PAINTS ROYALE SHYNE-SN10', '4 LTR', '', '3', '2022-12-30 12:58:17'),
(342, 0, 0, 'ASIAN PAINTS ROYALE SHYNE-SN10', '1 LTR', '', '7', '2022-12-30 12:58:24'),
(343, 0, 0, 'ASIAN PAINTS ROYALE SHYNE-SN13', '20 LTR', '', '', '2022-12-30 12:58:53'),
(344, 0, 0, 'ASIAN PAINTS ROYALE SHYNE-SN13', '10 LTR', '', '', '2022-12-30 12:59:00'),
(346, 0, 0, 'ASIAN PAINTS ROYALE SHYNE-SN13', '4 LTR', '', '', '2022-12-30 12:59:16'),
(347, 0, 0, 'ASIAN PAINTS ROYALE SHYNE-SN13', '1 LTR', '', '6', '2022-12-30 12:59:23'),
(348, 0, 0, 'ASIAN PAINTS ROYALE SHYNE-SN15', '20 LTR', '', '', '2022-12-30 13:00:13'),
(349, 0, 0, 'ASIAN PAINTS ROYALE SHYNE-SN15', '10 LTR', '', '', '2022-12-30 13:00:22'),
(350, 0, 0, 'ASIAN PAINTS ROYALE SHYNE-SN15', '4 LTR', '', '', '2022-12-30 13:00:31'),
(351, 0, 0, 'ASIAN PAINTS ROYALE SHYNE-SN15', '1 LTR', '', '6', '2022-12-30 13:00:42'),
(352, 0, 0, 'ASIAN PAINTS ROYALE SHYNE-SN21', '20 LTR', '', '', '2022-12-30 13:01:06'),
(353, 0, 0, 'ASIAN PAINTS ROYALE SHYNE-SN21', '10 LTR', '', '', '2022-12-30 13:01:15'),
(354, 0, 0, 'ASIAN PAINTS ROYALE SHYNE-SN21', '4 LTR', '', '5', '2022-12-30 13:01:25'),
(355, 0, 0, 'ASIAN PAINTS ROYALE SHYNE-SN21', '1 LTR', '', '8', '2022-12-30 13:01:35'),
(356, 0, 0, 'ASIAN PAINTS ROYALE SHYNE-WHITE', '20 LTR', '', '', '2022-12-30 13:01:53'),
(357, 0, 0, 'ASIAN PAINTS ROYALE SHYNE-WHITE', '10 LTR', '', '', '2022-12-30 13:02:00'),
(358, 0, 0, 'ASIAN PAINTS ROYALE SHYNE-WHITE', '4 LTR', '', '4', '2022-12-30 13:02:09'),
(359, 0, 0, 'ASIAN PAINTS ROYALE SHYNE-WHITE', '1 LTR', '', '4', '2022-12-30 13:02:18'),
(360, 0, 0, 'ASIAN PAINTS ROYALE NEO-GOLD', '1 LTR', '', '6', '2022-12-30 13:04:12'),
(361, 0, 0, 'ASIAN PAINTS ROYALE NEO-SILVER', '1 LTR', '', '6', '2022-12-30 13:04:28'),
(362, 0, 0, 'BERGER LUXOL HI GLOSS-SNOWWHITE', '4 LTR', '', '1', '2022-12-30 18:37:17'),
(363, 0, 0, 'BERGER LUXOL HI GLOSS-SNOWWHITE', '1 LTR', '', '4', '2022-12-30 18:37:26'),
(364, 0, 0, 'BERGER LUXOL HI GLOSS-SNOWWHITE', '500 ML', '', '', '2022-12-30 18:37:44'),
(365, 0, 0, 'BERGER LUXOL HI GLOSS-DAZZLINGWHITE', '4 LTR', '', '', '2022-12-30 19:22:34'),
(366, 0, 0, 'BERGER LUXOL HI GLOSS-DAZZLINGWHITE', '1 LTR', '', '', '2022-12-30 19:22:45'),
(367, 0, 0, 'BERGER LUXOL HI GLOSS-DAZZLINGWHITE', '500 ML', '', '', '2022-12-30 19:23:09'),
(368, 0, 0, 'BERGER LUXOL HI GLOSS-DEEPORANGE', '4 LTR', '', '', '2022-12-30 19:24:29'),
(369, 0, 0, 'BERGER LUXOL HI GLOSS-DEEPORANGE', '1 LTR', '', '6', '2022-12-30 19:24:52'),
(370, 0, 0, 'BERGER LUXOL HI GLOSS-DEEPORANGE', '500 ML', '', '7', '2022-12-30 19:25:02'),
(371, 0, 0, 'BERGER LUXOL HI GLOSS-GOLDENYELLOW', '4 LTR', '', '1', '2022-12-30 19:25:33'),
(372, 0, 0, 'BERGER LUXOL HI GLOSS-GOLDENYELLOW', '1 LTR', '', '6', '2022-12-30 19:25:41'),
(373, 0, 0, 'BERGER LUXOL HI GLOSS-GOLDENYELLOW', '500 ML', '', '5', '2022-12-30 19:25:51'),
(374, 0, 0, 'BERGER LUXOL HI GLOSS-GOLDENYELLOW', '200 ML', '', '', '2022-12-30 19:26:13'),
(375, 0, 0, 'BERGER LUXOL HI GLOSS-GOLDENYELLOW', '50 ML', '', '', '2022-12-30 19:26:25'),
(376, 0, 0, 'BERGER LUXOL HI GLOSS-MAHOGANY', '4 LTR', '', '', '2022-12-30 19:27:58'),
(377, 0, 0, 'BERGER LUXOL HI GLOSS-MAHOGANY', '1 LTR', '', '', '2022-12-30 19:28:11'),
(378, 0, 0, 'BERGER LUXOL HI GLOSS-MAHOGANY', '500 ML', '', '', '2022-12-30 19:28:20'),
(379, 0, 0, 'BERGER LUXOL HI GLOSS-PALECREAM', '4 LTR', '', '', '2022-12-30 19:28:47'),
(380, 0, 0, 'BERGER LUXOL HI GLOSS-PALECREAM', '1 LTR', '', '7', '2022-12-30 19:28:56'),
(381, 0, 0, 'BERGER LUXOL HI GLOSS-PALECREAM', '500 ML', '', '', '2022-12-30 19:29:05'),
(382, 0, 0, 'BERGER LUXOL HI GLOSS-ROYALIVORY', '4 LTR', '', '2', '2022-12-30 19:29:34'),
(383, 0, 0, 'BERGER LUXOL HI GLOSS-ROYALIVORY', '1 LTR', '', '3', '2022-12-30 19:29:42'),
(384, 0, 0, 'BERGER LUXOL HI GLOSS-ROYALIVORY', '500 ML', '', '6', '2022-12-30 19:29:49'),
(385, 0, 0, 'BERGER LUXOL HI GLOSS-ROYALIVORY', '200 ML', '', '', '2022-12-30 19:30:03'),
(386, 0, 0, 'BERGER LUXOL HI GLOSS-WILDLILAC', '4 LTR', '', '', '2022-12-30 19:30:48'),
(387, 0, 0, 'BERGER LUXOL HI GLOSS-WILDLILAC', '1 LTR', '', '', '2022-12-30 19:30:58'),
(388, 0, 0, 'BERGER LUXOL HI GLOSS-WILDLILAC', '500 ML', '', '5', '2022-12-30 19:31:07'),
(389, 0, 0, 'BERGER LUXOL HI GLOSS-BLACK', '4 LTR', '', '4', '2022-12-30 19:31:47'),
(390, 0, 0, 'BERGER LUXOL HI GLOSS-BLACK', '1 LTR', '', '4', '2022-12-30 19:31:56'),
(391, 0, 0, 'BERGER LUXOL HI GLOSS-BLACK', '500 ML', '', '7', '2022-12-30 19:32:05'),
(392, 0, 0, 'BERGER LUXOL HI GLOSS-PHIROZABLUE', '4 LTR', '', '2', '2022-12-30 19:32:40'),
(393, 0, 0, 'BERGER LUXOL HI GLOSS-PHIROZABLUE', '1 LTR', '', '', '2022-12-30 19:32:47'),
(394, 0, 0, 'BERGER LUXOL HI GLOSS-PHIROZABLUE', '500 ML', '', '', '2022-12-30 19:32:58'),
(395, 0, 0, 'BERGER LUXOL HI GLOSS-BLACK', '200 ML', '', '', '2022-12-30 19:34:02'),
(396, 0, 0, 'BERGER LUXOL HI GLOSS-BLACK', '50 ML', '', '', '2022-12-30 19:34:17'),
(397, 0, 0, 'BERGER LUXOL HI GLOSS-GOLDENBROWN', '4 LTR', '', '2', '2022-12-30 19:35:15'),
(398, 0, 0, 'BERGER LUXOL HI GLOSS-GOLDENBROWN', '1 LTR', '', '', '2022-12-30 19:35:23'),
(399, 0, 0, 'BERGER LUXOL HI GLOSS-GOLDENBROWN', '500 ML', '', '', '2022-12-30 19:35:32'),
(400, 0, 0, 'BERGER LUXOL HI GLOSS-BUSGREEN', '4 LTR', '', '', '2022-12-30 19:36:12'),
(401, 0, 0, 'BERGER LUXOL HI GLOSS-BUSGREEN', '1 LTR', '', '4', '2022-12-30 19:36:20'),
(402, 0, 0, 'BERGER LUXOL HI GLOSS-BUSGREEN', '500 ML', '', '7', '2022-12-30 19:36:29'),
(403, 0, 0, 'BERGER LUXOL HI GLOSS-BUSGREEN', '200 ML', '', '', '2022-12-30 19:36:38'),
(404, 0, 0, 'BERGER LUXOL HI GLOSS-BUSGREEN', '50 ML', '', '', '2022-12-30 19:36:52'),
(405, 0, 0, 'BERGER LUXOL HI GLOSS-SMOKEGREY', '4 LTR', '', '', '2022-12-30 19:37:50'),
(406, 0, 0, 'BERGER LUXOL HI GLOSS-SMOKEGREY', '1 LTR', '', '6', '2022-12-30 19:38:00'),
(408, 0, 0, 'BERGER LUXOL HI GLOSS-SMOKEGREY', '500 ML', '', '8', '2022-12-30 19:38:20'),
(409, 0, 0, 'BERGER LUXOL HI GLOSS-BROWN', '4 LTR', '', '', '2022-12-30 19:47:56'),
(410, 0, 0, 'BERGER LUXOL HI GLOSS-BROWN', '1 LTR', '', '', '2022-12-30 19:48:04'),
(411, 0, 0, 'BERGER LUXOL HI GLOSS-BROWN', '500 ML', '', '', '2022-12-30 19:48:14'),
(412, 0, 0, 'BERGER LUXOL HI GLOSS-LBMAGENTA', '4 LTR', '', '', '2022-12-30 20:10:58'),
(413, 0, 0, 'BERGER LUXOL HI GLOSS-LBMAGENTA', '1 LTR', '', '4', '2022-12-30 20:11:13'),
(414, 0, 0, 'BERGER LUXOL HI GLOSS-LBMAGENTA', '500 ML', '', '7', '2022-12-30 20:11:35'),
(415, 0, 0, 'BERGER LUXOL HI GLOSS-LBPURPLE', '4 LTR', '', '', '2022-12-30 20:12:13'),
(416, 0, 0, 'BERGER LUXOL HI GLOSS-LBPURPLE', '1 LTR', '', '', '2022-12-30 20:12:21'),
(417, 0, 0, 'BERGER LUXOL HI GLOSS-LBPURPLE', '500 ML', '', '', '2022-12-30 20:12:30'),
(418, 0, 0, 'BERGER LUXOL HI GLOSS-GOLD', '200 ML', '', '', '2022-12-30 20:13:18'),
(419, 0, 0, 'BERGER LUXOL HI GLOSS-GOLD', '50 ML', '', '', '2022-12-30 20:13:30'),
(421, 0, 0, 'BERGER LUXOL HI GLOSS-SILVER', '200 ML', '', '', '2022-12-30 20:14:00'),
(422, 0, 0, 'BERGER LUXOL HI GLOSS-SILVER', '50 ML', '', '', '2022-12-30 20:14:11'),
(423, 0, 0, 'BERGER PU ENAMEL-WHITE', '4 LTR', '', '', '2022-12-31 11:59:42'),
(424, 0, 0, 'BERGER PU ENAMEL-WHITE', '1 LTR', '', '1', '2022-12-31 11:59:59'),
(425, 0, 0, 'BERGER PU ENAMEL-WHITE', '500 ML', '', '', '2022-12-31 12:00:08'),
(426, 0, 0, 'BERGER PU ENAMEL-PHIROZABLUE', '4 LTR', '', '', '2022-12-31 12:01:06'),
(427, 0, 0, 'BERGER PU ENAMEL-PHIROZABLUE', '1 LTR', '', '8', '2022-12-31 12:01:15'),
(428, 0, 0, 'BERGER PU ENAMEL-PHIROZABLUE', '500 ML', '', '', '2022-12-31 12:01:24'),
(429, 0, 0, 'BERGER PU ENAMEL-BUSGREEN', '4 LTR', '', '', '2022-12-31 12:01:50'),
(430, 0, 0, 'BERGER PU ENAMEL-BUSGREEN', '1 LTR', '', '', '2022-12-31 12:01:58'),
(431, 0, 0, 'BERGER PU ENAMEL-BUSGREEN', '500 ML', '', '', '2022-12-31 12:02:11'),
(432, 0, 0, 'BERGER PU ENAMEL-BROWN', '4 LTR', '', '', '2022-12-31 12:02:46'),
(433, 0, 0, 'BERGER PU ENAMEL-BROWN', '1 LTR', '', '5', '2022-12-31 12:02:53'),
(434, 0, 0, 'BERGER PU ENAMEL-BROWN', '500 ML', '', '', '2022-12-31 12:03:01'),
(435, 0, 0, 'BERGER PU ENAMEL-GOLDENBROWN', '4 LTR', '', '', '2022-12-31 12:03:27'),
(436, 0, 0, 'BERGER PU ENAMEL-GOLDENBROWN', '500 ML', '', '8', '2022-12-31 12:03:52'),
(437, 0, 0, 'BERGER PU ENAMEL-GOLDENBROWN', '1 LTR', '', '1', '2022-12-31 12:04:13'),
(438, 0, 0, 'BERGER PU ENAMEL-SMOKEGREY', '4 LTR', '', '', '2022-12-31 12:04:32'),
(439, 0, 0, 'BERGER PU ENAMEL-SMOKEGREY', '1 LTR', '', '', '2022-12-31 12:04:38'),
(440, 0, 0, 'BERGER PU ENAMEL-SMOKEGREY', '500 ML', '', '', '2022-12-31 12:04:45'),
(441, 0, 0, 'BERGER PU ENAMEL-BLACK', '4 LTR', '', '', '2022-12-31 12:05:50'),
(442, 0, 0, 'BERGER PU ENAMEL-BLACK', '1 LTR', '', '1', '2022-12-31 12:05:59'),
(443, 0, 0, 'BERGER PU ENAMEL-BLACK', '500 ML', '', '6', '2022-12-31 12:06:08'),
(444, 0, 0, 'BERGER PU ENAMEL-SKYBLUE', '4 LTR', '', '', '2022-12-31 12:06:29'),
(445, 0, 0, 'BERGER PU ENAMEL-SKYBLUE', '1 LTR', '', '', '2022-12-31 12:06:35'),
(446, 0, 0, 'BERGER PU ENAMEL-SKYBLUE', '500 ML', '', '', '2022-12-31 12:06:46'),
(447, 0, 0, 'BERGER PU ENAMEL-GOLDENYELLOW', '4 LTR', '', '', '2022-12-31 12:07:27'),
(448, 0, 0, 'BERGER PU ENAMEL-GOLDENYELLOW', '1 LTR', '', '6', '2022-12-31 12:07:35'),
(449, 0, 0, 'BERGER PU ENAMEL-GOLDENYELLOW', '500 ML', '', '', '2022-12-31 12:07:42'),
(450, 0, 0, 'BERGER PU ENAMEL-MAHOGANY', '4 LTR', '', '', '2022-12-31 12:08:11'),
(451, 0, 0, 'BERGER PU ENAMEL-MAHOGANY', '1 LTR', '', '3', '2022-12-31 12:08:18'),
(452, 0, 0, 'BERGER PU ENAMEL-MAHOGANY', '500 ML', '', '', '2022-12-31 12:08:28'),
(453, 0, 0, 'BERGER PU ENAMEL-DEEPORANGE', '4 LTR', '', '', '2022-12-31 12:08:59'),
(454, 0, 0, 'BERGER PU ENAMEL-DEEPORANGE', '1 LTR', '', '', '2022-12-31 12:09:06'),
(455, 0, 0, 'BERGER PU ENAMEL-DEEPORANGE', '500 ML', '', '', '2022-12-31 12:09:13'),
(456, 0, 0, 'BERGER DAMPSTOP', '5 KG', '', '', '2022-12-31 12:39:02'),
(457, 0, 0, 'BERGER DAMPSTOP', '2 KG', '', '', '2022-12-31 12:39:19'),
(458, 0, 0, 'BERGER HOMESHEILD 2K', '15 KG', '', '', '2022-12-31 13:18:40'),
(459, 0, 0, 'BERGER HOMESHEILD 2K', '3 KG', '', '', '2022-12-31 13:19:00'),
(460, 0, 0, 'ASIAN PAINTS APCOLITE-GOLDENBROWN', '4 LTR', '', '', '2022-12-31 18:55:23'),
(461, 0, 0, 'ASIAN PAINTS APCOLITE-GOLDENBROWN', '1 LTR', '', '6', '2022-12-31 18:55:32'),
(462, 0, 0, 'ASIAN PAINTS APCOLITE-GOLDENBROWN', '500 ML', '', '4', '2022-12-31 18:55:40'),
(463, 0, 0, 'ASIAN PAINTS APCOLITE-SKYBLUE', '4 LTR', '', '', '2022-12-31 18:56:11'),
(464, 0, 0, 'ASIAN PAINTS APCOLITE-SKYBLUE', '1 LTR', '', '6', '2022-12-31 18:56:18'),
(465, 0, 0, 'ASIAN PAINTS APCOLITE-SKYBLUE', '500 ML', '', '8', '2022-12-31 18:56:26'),
(466, 0, 0, 'ASIAN PAINTS APCOLITE-AQUAMARINE', '4 LTR', '', '', '2022-12-31 18:57:03'),
(467, 0, 0, 'ASIAN PAINTS APCOLITE-AQUAMARINE', '1 LTR', '', '4', '2022-12-31 18:57:09'),
(468, 0, 0, 'ASIAN PAINTS APCOLITE-AQUAMARINE', '500 ML', '', '', '2022-12-31 18:57:18'),
(469, 0, 0, 'ASIAN PAINTS APCOLITE-GOLDENYELLOW', '4 LTR', '', '', '2022-12-31 18:57:49'),
(470, 0, 0, 'ASIAN PAINTS APCOLITE-GOLDENYELLOW', '1 LTR', '', '6', '2022-12-31 18:57:56'),
(471, 0, 0, 'ASIAN PAINTS APCOLITE-GOLDENYELLOW', '500 ML', '', '8', '2022-12-31 18:58:42'),
(472, 0, 0, 'ASIAN PAINTS APCOLITE-MINTGREEN', '4 LTR', '', '', '2022-12-31 18:59:04'),
(473, 0, 0, 'ASIAN PAINTS APCOLITE-MINTGREEN', '1 LTR', '', '5', '2022-12-31 18:59:11'),
(474, 0, 0, 'ASIAN PAINTS APCOLITE-MINTGREEN', '500 ML', '', '8', '2022-12-31 18:59:19'),
(475, 0, 0, 'ASIAN PAINTS APCOLITE-PALECREAM', '4 LTR', '', '', '2022-12-31 18:59:42'),
(476, 0, 0, 'ASIAN PAINTS APCOLITE-PALECREAM', '1 LTR', '', '8', '2022-12-31 18:59:48'),
(477, 0, 0, 'ASIAN PAINTS APCOLITE-PALECREAM', '500 ML', '', '6', '2022-12-31 18:59:55'),
(478, 0, 0, 'ASIAN PAINTS APCOLITE-PORED', '4 LTR', '', '', '2022-12-31 19:01:06'),
(479, 0, 0, 'ASIAN PAINTS APCOLITE-PORED', '1 LTR', '', '5', '2022-12-31 19:01:13'),
(480, 0, 0, 'ASIAN PAINTS APCOLITE-PORED', '500 ML', '', '6', '2022-12-31 19:01:22'),
(481, 0, 0, 'ASIAN PAINTS APCOLITE-SATINBLUE', '4 LTR', '', '', '2022-12-31 19:01:58'),
(482, 0, 0, 'ASIAN PAINTS APCOLITE-SATINBLUE', '1 LTR', '', '', '2022-12-31 19:02:03'),
(483, 0, 0, 'ASIAN PAINTS APCOLITE-SATINBLUE', '500 ML', '', '', '2022-12-31 19:02:12'),
(484, 0, 0, 'ASIAN PAINTS APCOLITE-WILDPURPLE', '4 LTR', '', '', '2022-12-31 19:02:44'),
(485, 0, 0, 'ASIAN PAINTS APCOLITE-WILDPURPLE', '1 LTR', '', '4', '2022-12-31 19:02:52'),
(486, 0, 0, 'ASIAN PAINTS APCOLITE-WILDPURPLE', '500 ML', '', '8', '2022-12-31 19:03:00'),
(487, 0, 0, 'ASIAN PAINTS APCOLITE-SILVER', '200 ML', '', '', '2022-12-31 19:03:22'),
(488, 0, 0, 'ASIAN PAINTS APCOLITE-SILVER', '50 ML', '', '', '2022-12-31 19:03:30'),
(490, 0, 0, 'ASIAN PAINTS APCOLITE-GOLD', '200 ML', '', '', '2022-12-31 19:04:06'),
(491, 0, 0, 'ASIAN PAINTS APCOLITE-GOLD', '50 ML', '', '', '2022-12-31 19:04:13'),
(492, 0, 0, 'ASIAN PAINTS APCOLITE-EB1', '4 LTR', '', '', '2022-12-31 19:06:08'),
(493, 0, 0, 'ASIAN PAINTS APCOLITE-EB1', '1 LTR', '', '5', '2022-12-31 19:06:15'),
(494, 0, 0, 'ASIAN PAINTS APCOLITE-EB1', '500 ML', '', '', '2022-12-31 19:06:22'),
(495, 0, 0, 'ASIAN PAINTS APCOLITE-EB6', '4 LTR', '', '', '2022-12-31 19:06:33'),
(496, 0, 0, 'ASIAN PAINTS APCOLITE-EB6', '1 LTR', '', '5', '2022-12-31 19:06:40'),
(497, 0, 0, 'ASIAN PAINTS APCOLITE-EB6', '500 ML', '', '13', '2022-12-31 19:06:47'),
(498, 0, 0, 'ASIAN PAINTS APCOLITE-EB10', '4 LTR', '', '', '2022-12-31 19:07:55'),
(499, 0, 0, 'ASIAN PAINTS APCOLITE-EB10', '1 LTR', '', '6', '2022-12-31 19:08:01'),
(500, 0, 0, 'ASIAN PAINTS APCOLITE-EB10', '500 ML', '', '8', '2022-12-31 19:08:09'),
(501, 0, 0, 'ASIAN PAINTS APCOLITE-EB14', '4 LTR', '', '', '2022-12-31 19:08:31'),
(502, 0, 0, 'ASIAN PAINTS APCOLITE-EB14', '1 LTR', '', '4', '2022-12-31 19:08:37'),
(503, 0, 0, 'ASIAN PAINTS APCOLITE-EB14', '500 ML', '', '', '2022-12-31 19:08:45'),
(504, 0, 0, 'ASIAN PAINTS APCOLITE-EB16', '4 LTR', '', '', '2022-12-31 19:09:26'),
(505, 0, 0, 'ASIAN PAINTS APCOLITE-EB16', '1 LTR', '', '', '2022-12-31 19:09:34'),
(506, 0, 0, 'ASIAN PAINTS APCOLITE-EB16', '500 ML', '', '', '2022-12-31 19:09:42'),
(507, 0, 0, 'ASIAN PAINTS APCOLITE-EB19', '4 LTR', '', '', '2022-12-31 19:09:52'),
(508, 0, 0, 'ASIAN PAINTS APCOLITE-EB19', '1 LTR', '', '', '2022-12-31 19:10:02'),
(509, 0, 0, 'ASIAN PAINTS APCOLITE-EB19', '500 ML', '', '', '2022-12-31 19:10:11'),
(510, 0, 0, 'ASIAN PAINTS MACHINE COLOURANT-HTYELLOW', '1 LTR', '', '', '2022-12-31 19:12:40'),
(511, 0, 0, 'ASIAN PAINTS MACHINE COLOURANT-HTREDOXIDE', '1 LTR', '', '', '2022-12-31 19:13:05'),
(512, 0, 0, 'ASIAN PAINTS MACHINE COLOURANT-FASTYELLOW', '1 LTR', '', '', '2022-12-31 19:13:25'),
(513, 0, 0, 'ASIAN PAINTS MACHINE COLOURANT-HTWHITE', '1 LTR', '', '', '2022-12-31 19:13:42'),
(514, 0, 0, 'ASIAN PAINTS MACHINE COLOURANT-HTBLUE', '1 LTR', '', '', '2022-12-31 19:13:56'),
(515, 0, 0, 'ASIAN PAINTS MACHINE COLOURANT-FASTYELLOWOXIDE', '1 LTR', '', '', '2022-12-31 19:14:21'),
(516, 0, 0, 'ASIAN PAINTS MACHINE COLOURANT-FASTBLUE', '1 LTR', '', '', '2022-12-31 19:14:53'),
(517, 0, 0, 'ASIAN PAINTS MACHINE COLOURANT-INTERIORRED', '1 LTR', '', '', '2022-12-31 19:15:15'),
(518, 0, 0, 'ASIAN PAINTS MACHINE COLOURANT-HTGREEN', '1 LTR', '', '', '2022-12-31 19:15:35'),
(519, 0, 0, 'ASIAN PAINTS MACHINE COLOURANT-FASTGREEN', '1 LTR', '', '', '2022-12-31 21:00:19'),
(520, 0, 0, 'ASIAN PAINTS MACHINE COLOURANT-FASTBLACK', '1 LTR', '', '', '2022-12-31 21:00:50'),
(521, 0, 0, 'ASIAN PAINTS MACHINE COLOURANT-EXTERIORRED', '1 LTR', '', '', '2022-12-31 21:02:20'),
(522, 0, 0, 'ASIAN PAINTS MACHINE COLOURANT-HTVIOLET', '1 LTR', '', '', '2022-12-31 21:02:39'),
(523, 0, 0, 'ASIAN PAINTS MACHINE COLOURANT-MAGENTA', '1 LTR', '', '', '2022-12-31 21:03:00'),
(524, 0, 0, 'ASIAN PAINTS MACHINE COLOURANT-ORANGE', '1 LTR', '', '', '2022-12-31 21:03:17'),
(525, 0, 0, 'ASIAN PAINTS ADVANCED COLOURANT-WHITE', '1 LTR', '', '', '2022-12-31 21:04:01'),
(526, 0, 0, 'ASIAN PAINTS ADVANCED COLOURANT-BLACK', '1 LTR', '', '', '2022-12-31 21:04:15'),
(527, 0, 0, 'ASIAN PAINTS ADVANCED COLOURANT-BLUE', '1 LTR', '', '', '2022-12-31 21:04:33'),
(528, 0, 0, 'ASIAN PAINTS ADVANCED COLOURANT-GREEN', '1 LTR', '', '', '2022-12-31 21:04:50'),
(529, 0, 0, 'ASIAN PAINTS ADVANCED COLOURANT-LEMONYELLOW', '1 LTR', '', '', '2022-12-31 21:05:15'),
(530, 0, 0, 'ASIAN PAINTS ADVANCED COLOURANT-ORGANICORANGE', '1 LTR', '', '', '2022-12-31 21:05:33'),
(531, 0, 0, 'ASIAN PAINTS ADVANCED COLOURANT-VIOLET', '1 LTR', '', '', '2022-12-31 21:05:47'),
(532, 0, 0, 'ASIAN PAINTS ADVANCED COLOURANT-PURPLERED', '1 LTR', '', '', '2022-12-31 21:06:08'),
(533, 0, 0, 'ASIAN PAINTS ADVANCED COLOURANT-CARMINERED', '1 LTR', '', '', '2022-12-31 21:06:32'),
(534, 0, 0, 'ASIAN PAINTS ADVANCED COLOURANT-YELLOWOXIDE', '1 LTR', '', '', '2022-12-31 21:06:50'),
(535, 0, 0, 'ASIAN PAINTS ADVANCED COLOURANT-REDOXIDE', '1 LTR', '', '', '2022-12-31 21:07:07'),
(536, 0, 0, 'ASIAN PAINTS ADVANCED COLOURANT-GOLDENYELLOW', '1 LTR', '', '', '2022-12-31 21:07:28'),
(537, 0, 0, 'BERGER MACHINE COLOURANT-WT', '1 LTR', '', '', '2022-12-31 21:10:23'),
(538, 0, 0, 'BERGER MACHINE COLOURANT-LM', '1 LTR', '', '', '2022-12-31 21:10:35'),
(539, 0, 0, 'BERGER MACHINE COLOURANT-NS', '1 LTR', '', '', '2022-12-31 21:10:48'),
(540, 0, 0, 'BERGER MACHINE COLOURANT-OC', '1 LTR', '', '', '2022-12-31 21:11:26'),
(541, 0, 0, 'BERGER MACHINE COLOURANT-OR', '1 LTR', '', '', '2022-12-31 21:11:47'),
(542, 0, 0, 'BERGER MACHINE COLOURANT-RE', '1 LTR', '', '', '2022-12-31 21:12:03'),
(543, 0, 0, 'BERGER MACHINE COLOURANT-SP', '1 LTR', '', '', '2022-12-31 21:12:43'),
(544, 0, 0, 'BERGER MACHINE COLOURANT-RD', '1 LTR', '', '', '2022-12-31 21:13:28'),
(545, 0, 0, 'BERGER MACHINE COLOURANT-MG', '1 LTR', '', '', '2022-12-31 21:13:44'),
(546, 0, 0, 'BERGER MACHINE COLOURANT-VB', '1 LTR', '', '', '2022-12-31 21:13:55'),
(547, 0, 0, 'BERGER MACHINE COLOURANT-BF', '1 LTR', '', '', '2022-12-31 21:14:05'),
(548, 0, 0, 'BERGER MACHINE COLOURANT-BC', '1 LTR', '', '', '2022-12-31 21:14:15'),
(549, 0, 0, 'BERGER MACHINE COLOURANT-GC', '1 LTR', '', '', '2022-12-31 21:14:26'),
(550, 0, 0, 'BERGER MACHINE COLOURANT-GF', '1 LTR', '', '', '2022-12-31 21:14:37'),
(551, 0, 0, 'BERGER MACHINE COLOURANT-BR', '1 LTR', '', '', '2022-12-31 21:14:47'),
(552, 0, 0, 'BERGER MACHINE COLOURANT-NT', '1 LTR', '', '', '2022-12-31 21:14:57'),
(553, 0, 0, 'UNIVERSAL STAINER-FASTBLUE', '200 ML', '', '', '2022-12-31 21:18:08'),
(554, 0, 0, 'UNIVERSAL STAINER-FASTBLUE', '100 ML', '', '', '2022-12-31 21:18:18'),
(555, 0, 0, 'UNIVERSAL STAINER-FASTBLUE', '50 ML', '', '', '2022-12-31 21:18:28'),
(556, 0, 0, 'UNIVERSAL STAINER-FASTGREEN', '200 ML', '', '', '2022-12-31 21:18:49'),
(557, 0, 0, 'UNIVERSAL STAINER-FASTGREEN', '100 ML', '', '', '2022-12-31 21:19:04'),
(558, 0, 0, 'UNIVERSAL STAINER-FASTGREEN', '50 ML', '', '', '2022-12-31 21:19:14'),
(559, 0, 0, 'UNIVERSAL STAINER-FASTYELLOWGREEN', '200 ML', '', '', '2022-12-31 21:19:35'),
(560, 0, 0, 'UNIVERSAL STAINER-FASTYELLOWGREEN', '100 ML', '', '', '2022-12-31 21:19:44'),
(561, 0, 0, 'UNIVERSAL STAINER-FASTYELLOWGREEN', '50 ML', '', '', '2022-12-31 21:19:53'),
(562, 0, 0, 'UNIVERSAL STAINER-FASTYELLOW', '200 ML', '', '', '2022-12-31 21:20:21'),
(563, 0, 0, 'UNIVERSAL STAINER-FASTYELLOW', '100 ML', '', '', '2022-12-31 21:20:30'),
(564, 0, 0, 'UNIVERSAL STAINER-FASTYELLOW', '50 ML', '', '', '2022-12-31 21:20:36'),
(565, 0, 0, 'TARPIN OIL', '1 LTR', '', '', '2023-01-04 13:02:18'),
(566, 0, 0, 'TARPIN OIL', '400 ML', '', '', '2023-01-04 13:02:28'),
(567, 0, 0, 'TARPIN OIL', '200 ML', '', '', '2023-01-04 13:02:43'),
(568, 0, 0, 'DISTEMPER BRUSH', 'H', '', '', '2023-01-04 13:04:04'),
(569, 0, 0, 'DISTEMPER BRUSH', 'L', '', '', '2023-01-04 13:04:15'),
(570, 0, 0, 'WATER PAPER', '80', '', '', '2023-01-04 13:04:55'),
(571, 0, 0, 'WATER PAPER', '100', '', '', '2023-01-04 13:08:51'),
(572, 0, 0, 'WATER PAPER', '120', '', '', '2023-01-04 13:08:58'),
(573, 0, 0, 'WATER PAPER', '150', '', '', '2023-01-04 13:09:06'),
(574, 0, 0, 'WATER PAPER', '180', '', '', '2023-01-04 13:09:14'),
(575, 0, 0, 'WATER PAPER', '200', '', '', '2023-01-04 13:09:55'),
(576, 0, 0, 'WATER PAPER', '220', '', '', '2023-01-04 13:10:02'),
(577, 0, 0, 'IRON PAPER', 'H', '', '', '2023-01-04 13:12:11'),
(578, 0, 0, 'BRUSH PLAIN', '1 INCH', '', '', '2023-01-04 18:45:19'),
(579, 0, 0, 'BRUSH PLAIN', '2 INCH', '', '', '2023-01-04 18:45:38'),
(580, 0, 0, 'BRUSH PLAIN', '2.5 INCH', '', '', '2023-01-04 18:45:54'),
(581, 0, 0, 'BRUSH PLAIN', '3 INCH', '', '', '2023-01-04 18:46:11'),
(582, 0, 0, 'BRUSH PLAIN', '4 INCH', '', '', '2023-01-04 18:46:24'),
(583, 0, 0, 'HOG BRUSH', 'ALL', '', '', '2023-01-04 18:46:59'),
(585, 0, 0, 'ASIAN PAINTS MING RED', '4 LTR', '', '0', '2023-01-31 12:06:49'),
(586, 0, 0, 'ASIAN PAINTS MING RED', '1 LTR', '', '6', '2023-01-31 12:07:22'),
(587, 0, 0, 'ASIAN PAINTS MING RED', '500 ML', '', '0', '2023-01-31 12:07:32'),
(588, 0, 0, 'CEM PLUS SNOWCEM', '25 KG', '', '23', '2023-01-31 12:50:52'),
(589, 0, 0, 'DELUX PREMIUM SNOWCEM', '25 KG', '', '15', '2023-01-31 12:51:27'),
(590, 0, 0, 'ASIAN PAINTS ALUMINIUM PAINTS', '100 ML', '', '18', '2023-01-31 19:27:29'),
(595, 0, 0, 'ASIAN PAINTS APCOLITE-BRWHITE', '4 LTR', '', '0', '2023-02-09 10:29:19'),
(598, 0, 0, 'ASIAN PAINTS APCOLITE-CASCADEGREEN', '500 ML', '', '0', '2023-02-09 10:30:10'),
(599, 0, 0, 'ASIAN PAINTS APCOLITE-BRANDY', '1 LTR', '', '1', '2023-02-09 10:30:30'),
(600, 0, 0, 'ASIAN PAINTS APCOLITE-BRANDY', '4 LTR', '', '0', '2023-02-09 10:30:37'),
(601, 0, 0, 'ASIAN PAINTS APCOLITE-BRANDY', '500 ML', '', '0', '2023-02-09 10:30:45'),
(602, 0, 0, 'BERGER LUXOL HI GLOSS-LEAFBROWN', '4 LTR', '', '2', '2023-02-16 13:28:43'),
(603, 0, 0, 'BERGER LUXOL HI GLOSS-LEAFBROWN', '1 LTR', '', '3', '2023-02-16 13:28:51'),
(604, 0, 0, 'BERGER LUXOL HI GLOSS-LEAFBROWN', '500 ML', '', '7', '2023-02-16 13:29:01'),
(611, 7, 11, 'bib cock', '4 pic', '', '0', '2023-06-13 16:58:51');
INSERT INTO `product` (`product_id`, `category_id`, `sub_category_id`, `product_name`, `product_volume`, `product_desc`, `quantity`, `insert_date`) VALUES
(612, 7, 12, '12', '10', 'kol0001', '0', '2023-06-13 17:05:04'),
(613, 7, 12, '15\" arms', '10 pic', 'kol0002', '10', '2023-06-13 17:06:22'),
(614, 7, 12, 'flange bati', '240 pic', 'kol0003', '0', '2023-06-13 17:08:33'),
(615, 7, 12, 'cp hook', '12', 'kol0004', '0', '2023-06-13 17:09:45'),
(616, 7, 12, 'mazic 2 in 1 bib cock', '4 pic', 'kol0006', '0', '2023-06-13 17:12:15'),
(617, 7, 12, 'opal swan neek ', '2', 'kol0007', '0', '2023-06-13 17:13:18'),
(618, 7, 12, 'mazic long body', '8 pic', 'kol0008', '0', '2023-06-13 20:21:20'),
(619, 7, 12, 'mini soften angular cock', '8 pic', 'kol0009', '0', '2023-06-13 20:22:42'),
(620, 7, 12, 'slim 2 in 1 bib cock', '4 pic', 'kol0010', '0', '2023-06-13 20:23:53'),
(621, 7, 15, 'edge angular cock ', '8 pic', 'kol0011', '0', '2023-06-13 20:26:23'),
(622, 7, 11, 'kohler steel shower', '4 pic', 'kol0012', '0', '2023-06-13 20:27:58'),
(623, 7, 15, 'hugo soft bib cock', '3', 'kol0003', '0', '2023-06-13 20:29:01'),
(624, 7, 12, 'ultra slim steel shower', '4 pic', 'kol0014', '0', '2023-06-13 20:33:53'),
(625, 10, 21, '2 rsy inner', '24 pic', 'kol0015', '0', '2023-06-13 20:44:33'),
(627, 10, 21, '4 rsy', '24 pic', 'kol0017', '0', '2023-06-13 20:46:09'),
(628, 7, 12, '9\" arms', '10 pic', 'kol0018', '0', '2023-06-13 20:47:10'),
(629, 5, 22, '18\" connecting pipe', '10 pic', 'kol0020', '10', '2023-06-13 20:54:11'),
(630, 5, 22, '30\" arms', '10 pic', 'kol0021', '0', '2023-06-13 20:54:58'),
(633, 12, 26, 'MPI TANK 200 2L', '1', '', '1000', '2023-08-03 11:56:44'),
(634, 13, 27, 'pearl c-011/p', '5', 'printed ', '0', '2023-08-04 12:48:32'),
(635, 13, 27, 'pearl c-004', '3', '', '0', '2023-08-04 13:00:59'),
(636, 13, 27, 'pearl c-008', '2', '', '0', '2023-08-04 13:01:39'),
(637, 7, 12, '12\" arms', '10', 'heavy', '10', '2023-08-17 18:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int NOT NULL,
  `bill_number` varchar(55) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `pay_mode` varchar(55) NOT NULL,
  `total_purchase_amount` varchar(155) NOT NULL,
  `total_amount` varchar(55) NOT NULL,
  `paid` varchar(55) NOT NULL,
  `due` varchar(55) NOT NULL,
  `description` longtext NOT NULL,
  `decorator_id` varchar(55) NOT NULL,
  `next_payment_date` varchar(55) NOT NULL,
  `refer_type` varchar(15) NOT NULL DEFAULT 'S',
  `insert_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `bill_number`, `name`, `address`, `phone`, `email`, `pay_mode`, `total_purchase_amount`, `total_amount`, `paid`, `due`, `description`, `decorator_id`, `next_payment_date`, `refer_type`, `insert_date`) VALUES
(1, '100', 'ram', '', '9474949899', '', 'Cash', '', '210', '200', '10', 'Array', '10', '1970-01-01', 'S', '2023-11-26 11:02:44'),
(2, '101', 'Ayan', '', '9932219661', 'aayanghoshal553@gmail.com', 'Cash', '', '3000', '3000', '0', 'Array', '2', '1970-01-01', 'S', '2023-11-26 11:02:52'),
(3, '102', 'cbn', 'cvbn', 'cbn', 'amal96karmakar@gmail.com', 'Cheque', '', '689', '689', '0', 'cbn', 'Select Decorator', '2023-05-23', 'S', '2023-11-26 11:02:57'),
(5, '103', 'h', 'fdgh', 'dfgh', 'amal96sadfkarmakar@gmail.com', 'Paytm', '', '1200', '1200', '0', 'fdgh', 'Select Decorator', '2023-05-18', 'S', '2023-11-26 11:03:00'),
(6, '104', 'Cement', 'asdf', 'asdf', 'amal96karmakar@gmail.com', 'Cheque', '', '805', '805', '0', 'asdf', 'Select Decorator', '2023-05-11', 'S', '2023-11-26 11:03:02'),
(7, '105', 'fsdg', 'dsfg', 'dfs', 'amal96karmakar@gmail.com', 'Cash', '', '805', '800', '5', 'sdfg', 'Select Decorator', '2023-05-25', 'S', '2023-11-26 11:03:05'),
(8, '106', '', '', '', '', 'UPI/Net banking', '', '4509', '4509', '0', '', '4', '1970-01-01', 'S', '2023-11-26 11:03:08'),
(9, '107', 'sumit', '', '9474949487', '', 'Cash', '', '60000', '35000', '25000', '', '5', '2023-05-31', 'S', '2023-11-26 11:03:13'),
(10, '108', '', '', '', '', 'Select Pay Mode', '', '0', '', '', '', 'Select Decorator', '1970-01-01', 'S', '2023-11-26 13:13:54'),
(11, '109', 'abcd', '', '999999999', 'gdafds@dhdhfd', 'Cash', '', '11211', '11000', '211', '', 'Select Decorator', '2023-11-26', 'S', '2023-11-26 23:25:13'),
(12, '110', 'abc', '', '999999999', 'dsgds@jhvjhgjb', 'Cash', '9090', '9090', '9000', '90', '', 'Select Decorator', '2023-11-28', 'S', '2023-11-28 15:55:16'),
(13, '111', 'abc', '', '99999', 'adsafd@gsgf', 'Cash', '17267.97', '19998', '19990', '8', '', 'Select Decorator', '2023-11-28', 'S', '2023-11-28 16:01:58'),
(14, '112', 'abc', '', '99999', 'sdsgfsgf@gfh', 'Debit card', '12033.14', '2927', '2927', '0', '', 'Select Decorator', '2023-11-28', 'S', '2023-11-28 17:25:54'),
(15, '113', 'Ayan', 'gram kulti kalna purba bardhaman west bengal 712146', '9932219661', 'aayanghoshal553@gmail.com', 'Cash', '6211.5', '6817.5', '6817.5', '0', '', 'Select Decorator', '2023-12-06', 'S', '2023-12-05 21:03:16'),
(16, '102', 'cbn', 'cvbn', 'cbn', 'amal96karmakar@gmail.com', 'Cheque', '', '689', '689', '0', 'cbn', 'Select Decorator', '2023-05-23', 'R', '2023-12-09 08:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int NOT NULL,
  `invoice_id` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pname` varchar(155) NOT NULL,
  `quantity` varchar(15) NOT NULL,
  `issued_quantity` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `balance_quanity` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `pprice` varchar(15) NOT NULL,
  `sprice` varchar(15) NOT NULL,
  `item_desc` varchar(255) NOT NULL,
  `ptotal` varchar(15) NOT NULL,
  `stotal` varchar(15) NOT NULL,
  `profit` varchar(15) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `invoice_id`, `pname`, `quantity`, `issued_quantity`, `balance_quanity`, `pprice`, `sprice`, `item_desc`, `ptotal`, `stotal`, `profit`, `insert_date`) VALUES
(1, '1', '1', '13', '53', '-37', '761.6', '805', '670', '8580', '8840', '260', '2023-01-31 13:04:04'),
(2, '1', '2', '1', '10', '-9', '565.6', '585.8', '570', '560', '580', '20', '2023-01-31 13:04:04'),
(3, '1', '8', '26', '2', '25', '676.7', '696.9', '680', '17420', '17940', '520', '2023-01-31 13:04:04'),
(4, '1', '69', '26', '0', '26', '1010', '1313', '1300', '26000', '33800', '7800', '2023-01-31 13:04:04'),
(5, '1', '67', '20', '0', '20', '696.9', '934.25', '910', '13800', '18500', '4700', '2023-01-31 13:04:04'),
(6, '1', '588', '23', '0', '23', '595.9', '1010', '980', '13570', '23000', '9430', '2023-01-31 13:04:04'),
(7, '1', '589', '15', '0', '15', '484.8', '757.5', '730', '7200', '11250', '4050', '2023-01-31 13:04:04'),
(8, '1', '71', '9', '0', '9', '126.25', '141.4', '140', '1125', '1260', '135', '2023-01-31 13:04:04'),
(9, '1', '72', '50', '0', '50', '26.26', '40.4', '40', '1300', '2000', '700', '2023-01-31 13:04:04'),
(10, '2', '26', '42', '0', '42', '2828', '3030', '3100', '117600', '126000', '8400', '2023-01-31 13:53:06'),
(11, '2', '27', '2', '0', '2', '1658.42', '1919', '1850', '3284', '3800', '516', '2023-01-31 13:53:06'),
(12, '2', '28', '2', '0', '2', '690.84', '808', '780', '1368', '1600', '232', '2023-01-31 13:53:06'),
(13, '2', '29', '2', '0', '2', '178.77', '212.1', '200', '354', '420', '66', '2023-01-31 13:53:06'),
(14, '2', '42', '33', '0', '33', '3181.5', '3585.5', '3500', '103950', '117150', '13200', '2023-01-31 13:53:06'),
(15, '2', '34', '4', '0', '4', '1520.05', '1818', '1800', '6020', '7200', '1180', '2023-01-31 13:53:06'),
(16, '2', '35', '9', '0', '9', '804.97', '1060.5', '1000', '7173', '9450', '2277', '2023-01-31 13:53:06'),
(17, '2', '36', '3', '0', '3', '356.53', '464.6', '450', '1059', '1380', '321', '2023-01-31 13:53:06'),
(18, '2', '37', '4', '0', '4', '99.99', '131.3', '120', '396', '520', '124', '2023-01-31 13:53:06'),
(19, '2', '30', '2', '0', '2', '2132.11', '2525', '2450', '4222', '5000', '778', '2023-01-31 13:53:06'),
(20, '2', '31', '2', '0', '2', '1105.95', '1414', '1300', '2190', '2800', '610', '2023-01-31 13:53:06'),
(21, '2', '32', '2', '0', '2', '474.7', '575.7', '550', '940', '1140', '200', '2023-01-31 13:53:06'),
(22, '2', '33', '5', '0', '5', '129.28', '161.6', '150', '640', '800', '160', '2023-01-31 13:53:06'),
(23, '2', '10', '13', '25', '8', '1242.3', '1363.5', '1300', '15990', '17550', '1560', '2023-01-31 13:53:06'),
(24, '2', '12', '4', '1', '3', '350.47', '404', '390', '1388', '1600', '212', '2023-01-31 13:53:06'),
(25, '2', '13', '6', '0', '6', '74.74', '101', '90', '444', '600', '156', '2023-01-31 13:53:06'),
(26, '3', '14', '3', '0', '3', '3030', '3535', '3400', '9000', '10500', '1500', '2023-01-31 18:54:55'),
(27, '3', '15', '1', '0', '1', '1801.84', '2121', '2000', '1784', '2100', '316', '2023-01-31 18:54:55'),
(28, '3', '17', '3', '0', '3', '193.92', '232.3', '220', '576', '690', '114', '2023-01-31 18:54:55'),
(29, '3', '18', '1', '0', '1', '3062.32', '3434', '3300', '3032', '3400', '368', '2023-01-31 18:54:55'),
(30, '3', '20', '2', '17', '-15', '654.48', '808', '750', '1296', '1600', '304', '2023-01-31 18:54:55'),
(31, '3', '21', '5', '0', '5', '169.68', '212.1', '200', '840', '1050', '210', '2023-01-31 18:54:55'),
(32, '3', '22', '2', '0', '2', '1973.54', '2424', '2350', '3908', '4800', '892', '2023-01-31 18:54:55'),
(33, '3', '23', '1', '0', '1', '1061.51', '1363.5', '1300', '1051', '1350', '299', '2023-01-31 18:54:55'),
(34, '3', '24', '3', '0', '3', '474.7', '606', '570', '1410', '1800', '390', '2023-01-31 18:54:55'),
(35, '3', '38', '2', '0', '2', '2676.5', '3080.5', '3000', '5300', '6100', '800', '2023-01-31 18:54:55'),
(36, '3', '39', '2', '0', '2', '1404.91', '1666.5', '1600', '2782', '3300', '518', '2023-01-31 18:54:55'),
(37, '3', '40', '3', '0', '3', '589.84', '707', '680', '1752', '2100', '348', '2023-01-31 18:54:55'),
(38, '4', '46', '4', '0', '4', '743.36', '858.5', '820', '2944', '3400', '456', '2023-01-31 19:26:59'),
(39, '4', '48', '6', '0', '6', '101', '126.25', '120', '600', '750', '150', '2023-01-31 19:26:59'),
(40, '4', '52', '4', '0', '4', '859.51', '959.5', '930', '3404', '3800', '396', '2023-01-31 19:26:59'),
(41, '4', '53', '4', '0', '4', '218.16', '252.5', '250', '864', '1000', '136', '2023-01-31 19:26:59'),
(42, '4', '54', '7', '0', '7', '119.18', '141.4', '140', '826', '980', '154', '2023-01-31 19:26:59'),
(43, '4', '58', '3', '0', '3', '814.06', '909', '880', '2418', '2700', '282', '2023-01-31 19:26:59'),
(44, '4', '59', '3', '0', '3', '211.09', '252.5', '240', '627', '750', '123', '2023-01-31 19:26:59'),
(45, '4', '60', '4', '0', '4', '110.09', '141.4', '130', '436', '560', '124', '2023-01-31 19:26:59'),
(46, '4', '61', '2', '0', '2', '1353.4', '1464.5', '1440', '2680', '2900', '220', '2023-01-31 19:26:59'),
(47, '4', '50', '10', '0', '10', '206.04', '232.3', '225', '2040', '2300', '260', '2023-01-31 19:26:59'),
(48, '4', '51', '6', '0', '6', '108.07', '131.3', '130', '642', '780', '138', '2023-01-31 19:26:59'),
(49, '4', '66', '9', '0', '9', '189.88', '212.1', '210', '1692', '1890', '198', '2023-01-31 19:26:59'),
(50, '5', '103', '2', '2', '1', '4844.97', '6363', '', '9594', '12600', '3006', '2023-02-03 12:59:52'),
(51, '5', '107', '2', '2', '0', '4774.27', '0', '', '9454', '0', '-9454', '2023-02-03 12:59:52'),
(52, '5', '119', '2', '0', '2', '4953.04', '0', '', '9808', '0', '-9808', '2023-02-03 12:59:52'),
(53, '5', '115', '2', '0', '2', '4373.3', '0', '', '8660', '0', '-8660', '2023-02-03 12:59:52'),
(54, '5', '111', '1', '0', '1', '4400.57', '0', '', '4357', '0', '-4357', '2023-02-03 12:59:52'),
(55, '5', '112', '2', '0', '2', '2281.59', '0', '', '4518', '0', '-4518', '2023-02-03 12:59:52'),
(56, '5', '116', '1', '0', '1', '2254.32', '0', '', '2232', '0', '-2232', '2023-02-03 12:59:52'),
(57, '5', '124', '1', '0', '1', '2372.49', '0', '', '2349', '0', '-2349', '2023-02-03 12:59:52'),
(58, '5', '104', '1', '0', '1', '2506.82', '3333', '', '2482', '3300', '818', '2023-02-03 12:59:52'),
(59, '5', '108', '1', '0', '1', '2480.56', '0', '', '2456', '0', '-2456', '2023-02-03 12:59:52'),
(60, '5', '120', '1', '0', '1', '2532.07', '0', '', '2507', '0', '-2507', '2023-02-03 12:59:52'),
(61, '5', '105', '5', '3', '2', '1038.28', '1464.5', '', '5140', '7250', '2110', '2023-02-03 12:59:52'),
(62, '5', '109', '2', '0', '2', '1032.22', '0', '', '2044', '0', '-2044', '2023-02-03 12:59:52'),
(63, '5', '113', '2', '0', '2', '953.44', '0', '', '1888', '0', '-1888', '2023-02-03 12:59:52'),
(64, '5', '117', '4', '0', '4', '927.18', '0', '', '3672', '0', '-3672', '2023-02-03 12:59:52'),
(65, '5', '121', '4', '0', '4', '1042.32', '0', '', '4128', '0', '-4128', '2023-02-03 12:59:52'),
(66, '5', '133', '2', '0', '2', '986.77', '0', '', '1954', '0', '-1954', '2023-02-03 12:59:52'),
(67, '5', '129', '2', '0', '2', '1169.58', '0', '', '2316', '0', '-2316', '2023-02-03 12:59:52'),
(68, '5', '130', '2', '0', '2', '300.98', '0', '', '596', '0', '-596', '2023-02-03 12:59:52'),
(69, '5', '110', '2', '0', '2', '267.65', '0', '', '530', '0', '-530', '2023-02-03 12:59:52'),
(70, '5', '118', '7', '0', '7', '239.37', '0', '', '1659', '0', '-1659', '2023-02-03 12:59:52'),
(71, '5', '134', '5', '0', '5', '256.54', '0', '', '1270', '0', '-1270', '2023-02-03 12:59:52'),
(72, '5', '114', '4', '0', '4', '246.44', '0', '', '976', '0', '-976', '2023-02-03 12:59:52'),
(73, '5', '106', '4', '0', '4', '268.66', '383.8', '', '1064', '1520', '456', '2023-02-03 12:59:52'),
(74, '5', '122', '7', '0', '7', '268.66', '0', '', '1862', '0', '-1862', '2023-02-03 12:59:52'),
(75, '5', '137', '2', '0', '2', '330.27', '393.9', '380', '654', '780', '126', '2023-02-03 12:59:52'),
(76, '5', '138', '3', '0', '3', '1274.62', '1464.5', '1400', '3786', '4350', '564', '2023-02-03 12:59:52'),
(77, '6', '168', '1', '0', '1', '3286.54', '4242', '', '3254', '4200', '946', '2023-02-03 13:34:49'),
(78, '6', '172', '1', '0', '1', '3195.64', '0', '', '3164', '0', '-3164', '2023-02-03 13:34:49'),
(79, '6', '181', '4', '0', '4', '1221.09', '0', '', '4836', '0', '-4836', '2023-02-03 13:34:49'),
(80, '6', '185', '4', '0', '4', '1366.53', '0', '', '5412', '0', '-5412', '2023-02-03 13:34:49'),
(81, '6', '173', '2', '0', '2', '1300.88', '0', '', '2576', '0', '-2576', '2023-02-03 13:34:49'),
(82, '6', '169', '1', '0', '1', '1321.08', '1717', '', '1308', '1700', '392', '2023-02-03 13:34:49'),
(83, '6', '182', '1', '0', '1', '313.1', '0', '', '310', '0', '-310', '2023-02-03 13:34:49'),
(84, '6', '186', '3', '0', '3', '342.39', '0', '', '1017', '0', '-1017', '2023-02-03 13:34:49'),
(85, '6', '193', '4', '0', '4', '493.89', '0', '', '1956', '0', '-1956', '2023-02-03 13:34:49'),
(86, '6', '205', '4', '0', '4', '602.97', '0', '', '2388', '0', '-2388', '2023-02-03 13:34:49'),
(87, '6', '197', '4', '0', '4', '477.73', '0', '', '1892', '0', '-1892', '2023-02-03 13:34:49'),
(88, '6', '198', '6', '0', '6', '127.26', '0', '', '756', '0', '-756', '2023-02-03 13:34:49'),
(89, '6', '194', '4', '0', '4', '130.29', '0', '', '516', '0', '-516', '2023-02-03 13:34:49'),
(90, '6', '206', '3', '0', '3', '158.57', '0', '', '471', '0', '-471', '2023-02-03 13:34:49'),
(91, '6', '212', '1', '0', '1', '4599.54', '5757', '', '4554', '5700', '1146', '2023-02-03 13:34:49'),
(92, '6', '208', '1', '0', '1', '4599.54', '5858', '', '4554', '5800', '1246', '2023-02-03 13:34:49'),
(93, '6', '216', '1', '0', '1', '4410.67', '0', '', '4367', '0', '-4367', '2023-02-03 13:34:49'),
(94, '6', '213', '6', '0', '6', '1858.4', '2323', '', '11040', '13800', '2760', '2023-02-03 13:34:49'),
(95, '6', '217', '2', '0', '2', '1781.64', '0', '', '3528', '0', '-3528', '2023-02-03 13:34:49'),
(96, '6', '225', '4', '0', '4', '1776.59', '0', '', '7036', '0', '-7036', '2023-02-03 13:34:49'),
(97, '6', '221', '4', '0', '4', '1725.08', '0', '', '6832', '0', '-6832', '2023-02-03 13:34:49'),
(98, '6', '226', '6', '0', '6', '452.48', '0', '', '2688', '0', '-2688', '2023-02-03 13:34:49'),
(99, '6', '218', '6', '0', '6', '459.55', '0', '', '2730', '0', '-2730', '2023-02-03 13:34:49'),
(100, '6', '210', '7', '0', '7', '471.67', '626.2', '', '3269', '4340', '1071', '2023-02-03 13:34:49'),
(101, '6', '222', '3', '0', '3', '443.39', '0', '', '1317', '0', '-1317', '2023-02-03 13:34:49'),
(102, '6', '214', '2', '0', '2', '471.67', '626.2', '', '934', '1240', '306', '2023-02-03 13:34:49'),
(103, '6', '227', '4', '0', '4', '708.01', '808', '', '2804', '3200', '396', '2023-02-03 13:34:49'),
(104, '6', '229', '3', '0', '3', '684.78', '787.8', '', '2034', '2340', '306', '2023-02-03 13:34:49'),
(105, '6', '228', '5', '0', '5', '157.56', '191.9', '', '780', '950', '170', '2023-02-03 13:34:49'),
(106, '7', '87', '2', '0', '2', '7690.14', '0', '', '15228', '0', '-15228', '2023-02-03 13:55:04'),
(107, '7', '95', '1', '0', '1', '8385.02', '0', '', '8302', '0', '-8302', '2023-02-03 13:55:04'),
(108, '7', '99', '1', '0', '1', '7912.34', '0', '', '7834', '0', '-7834', '2023-02-03 13:55:04'),
(109, '7', '91', '1', '0', '1', '7653.78', '0', '', '7578', '0', '-7578', '2023-02-03 13:55:04'),
(110, '7', '84', '2', '0', '2', '4031.92', '0', '', '7984', '0', '-7984', '2023-02-03 13:55:04'),
(111, '7', '88', '2', '0', '2', '3908.7', '0', '', '7740', '0', '-7740', '2023-02-03 13:55:04'),
(112, '7', '96', '2', '0', '2', '4326.84', '0', '', '8568', '0', '-8568', '2023-02-03 13:55:04'),
(113, '7', '100', '1', '0', '1', '4072.32', '0', '', '4032', '0', '-4032', '2023-02-03 13:55:04'),
(114, '7', '92', '1', '0', '1', '3895.57', '0', '', '3857', '0', '-3857', '2023-02-03 13:55:04'),
(115, '7', '80', '1', '0', '1', '4217.76', '5403.5', '', '4176', '5350', '1174', '2023-02-03 13:55:04'),
(116, '7', '97', '3', '0', '3', '1833.15', '0', '', '5445', '0', '-5445', '2023-02-03 13:55:04'),
(117, '7', '85', '3', '0', '3', '1705.89', '0', '', '5067', '0', '-5067', '2023-02-03 13:55:04'),
(118, '7', '81', '2', '0', '2', '1782.65', '2323', '', '3530', '4600', '1070', '2023-02-03 13:55:04'),
(119, '7', '93', '3', '0', '3', '1651.35', '0', '', '4905', '0', '-4905', '2023-02-03 13:55:04'),
(120, '7', '101', '4', '0', '4', '1724.07', '0', '', '6828', '0', '-6828', '2023-02-03 13:55:04'),
(121, '7', '89', '3', '0', '3', '1660.44', '0', '', '4932', '0', '-4932', '2023-02-03 13:55:04'),
(122, '7', '98', '4', '0', '4', '503.99', '0', '', '1996', '0', '-1996', '2023-02-03 13:55:04'),
(123, '7', '90', '1', '0', '1', '459.55', '0', '', '455', '0', '-455', '2023-02-03 13:55:04'),
(124, '7', '94', '5', '0', '5', '457.53', '0', '', '2265', '0', '-2265', '2023-02-03 13:55:04'),
(125, '7', '86', '4', '0', '4', '472.68', '0', '', '1872', '0', '-1872', '2023-02-03 13:55:04'),
(126, '7', '82', '5', '0', '5', '490.86', '656.5', '', '2430', '3250', '820', '2023-02-03 13:55:04'),
(127, '7', '102', '6', '0', '6', '476.72', '0', '', '2832', '0', '-2832', '2023-02-03 13:55:04'),
(128, '8', '591', '4', '0', '4', '1714.98', '0', '', '6792', '0', '-6792', '2023-02-03 13:57:40'),
(129, '8', '592', '6', '0', '6', '473.69', '0', '', '2814', '0', '-2814', '2023-02-03 13:57:40'),
(130, '9', '267', '1', '0', '1', '5114.64', '0', '', '5064', '0', '-5064', '2023-02-05 13:08:37'),
(131, '9', '259', '1', '0', '1', '5114.64', '6565', '', '5064', '6500', '1436', '2023-02-05 13:08:37'),
(132, '9', '279', '1', '0', '1', '5355.02', '0', '', '5302', '0', '-5302', '2023-02-05 13:08:37'),
(133, '9', '263', '1', '0', '1', '5114.64', '0', '', '5064', '0', '-5064', '2023-02-05 13:08:37'),
(134, '9', '287', '1', '0', '1', '5006.57', '0', '', '4957', '0', '-4957', '2023-02-05 13:08:37'),
(135, '9', '264', '1', '0', '1', '2646.2', '0', '', '2620', '0', '-2620', '2023-02-05 13:08:37'),
(136, '9', '288', '1', '0', '1', '2574.49', '0', '', '2549', '0', '-2549', '2023-02-05 13:08:37'),
(137, '9', '260', '1', '0', '1', '2646.2', '3434', '', '2620', '3400', '780', '2023-02-05 13:08:37'),
(138, '9', '268', '1', '0', '1', '2646.2', '0', '', '2620', '0', '-2620', '2023-02-05 13:08:37'),
(139, '9', '280', '2', '0', '2', '2721.95', '0', '', '5390', '0', '-5390', '2023-02-05 13:08:37'),
(140, '9', '265', '8', '0', '8', '1095.85', '0', '', '8680', '0', '-8680', '2023-02-05 13:08:37'),
(141, '9', '269', '7', '0', '7', '1095.85', '0', '', '7595', '0', '-7595', '2023-02-05 13:08:37'),
(142, '9', '289', '3', '0', '3', '1069.59', '0', '', '3177', '0', '-3177', '2023-02-05 13:08:37'),
(143, '9', '281', '7', '0', '7', '1116.05', '0', '', '7735', '0', '-7735', '2023-02-05 13:08:37'),
(144, '9', '261', '7', '0', '7', '1095.85', '1414', '', '7595', '9800', '2205', '2023-02-05 13:08:37'),
(145, '9', '266', '8', '0', '8', '283.81', '0', '', '2248', '0', '-2248', '2023-02-05 13:08:37'),
(146, '9', '282', '4', '0', '4', '287.85', '0', '', '1140', '0', '-1140', '2023-02-05 13:08:37'),
(147, '9', '262', '7', '0', '7', '283.81', '363.6', '', '1967', '2520', '553', '2023-02-05 13:08:37'),
(148, '9', '274', '6', '0', '6', '277.75', '0', '', '1650', '0', '-1650', '2023-02-05 13:08:37'),
(149, '9', '270', '5', '0', '5', '283.81', '0', '', '1405', '0', '-1405', '2023-02-05 13:08:37'),
(150, '9', '290', '3', '0', '3', '277.75', '0', '', '825', '0', '-825', '2023-02-05 13:08:37'),
(151, '9', '286', '3', '0', '3', '324.21', '0', '', '963', '0', '-963', '2023-02-05 13:08:37'),
(152, '9', '278', '8', '0', '8', '277.75', '0', '', '2200', '0', '-2200', '2023-02-05 13:08:37'),
(153, '9', '586', '6', '0', '6', '344.41', '393.9', '380', '2046', '2340', '294', '2023-02-05 13:08:37'),
(154, '10', '235', '1', '0', '1', '3021.92', '0', '', '2992', '0', '-2992', '2023-02-05 13:42:39'),
(155, '10', '240', '2', '0', '2', '1527.12', '0', '', '3024', '0', '-3024', '2023-02-05 13:42:39'),
(156, '10', '236', '2', '0', '2', '1584.69', '0', '', '3138', '0', '-3138', '2023-02-05 13:42:39'),
(157, '10', '233', '3', '0', '3', '685.79', '929.2', '', '2037', '2760', '723', '2023-02-05 13:42:39'),
(158, '10', '237', '4', '0', '4', '658.52', '0', '', '2608', '0', '-2608', '2023-02-05 13:42:39'),
(159, '10', '241', '4', '0', '4', '633.27', '0', '', '2508', '0', '-2508', '2023-02-05 13:42:39'),
(160, '10', '238', '2', '0', '2', '172.71', '0', '', '342', '0', '-342', '2023-02-05 13:42:39'),
(161, '10', '242', '6', '0', '6', '164.63', '0', '', '978', '0', '-978', '2023-02-05 13:42:39'),
(162, '10', '234', '4', '0', '4', '178.77', '242.4', '', '708', '960', '252', '2023-02-05 13:42:39'),
(163, '10', '251', '1', '0', '1', '5374.21', '0', '', '5321', '0', '-5321', '2023-02-05 13:42:39'),
(164, '10', '243', '1', '0', '1', '5133.83', '6363', '', '5083', '6300', '1217', '2023-02-05 13:42:39'),
(165, '10', '255', '1', '0', '1', '5025.76', '0', '', '4976', '0', '-4976', '2023-02-05 13:42:39'),
(166, '10', '248', '2', '0', '2', '2655.29', '0', '', '5258', '0', '-5258', '2023-02-05 13:42:39'),
(167, '10', '252', '2', '0', '2', '2731.04', '0', '', '5408', '0', '-5408', '2023-02-05 13:42:39'),
(168, '10', '256', '2', '0', '2', '2584.59', '0', '', '5118', '0', '-5118', '2023-02-05 13:42:39'),
(169, '10', '249', '4', '0', '4', '1099.89', '0', '', '4356', '0', '-4356', '2023-02-05 13:42:39'),
(170, '10', '245', '3', '0', '3', '1099.89', '1414', '', '3267', '4200', '933', '2023-02-05 13:42:39'),
(171, '10', '253', '7', '0', '7', '1120.09', '0', '', '7763', '0', '-7763', '2023-02-05 13:42:39'),
(172, '10', '257', '8', '0', '8', '1073.63', '0', '', '8504', '0', '-8504', '2023-02-05 13:42:39'),
(173, '10', '250', '7', '0', '7', '284.82', '0', '', '1974', '0', '-1974', '2023-02-05 13:42:39'),
(174, '10', '246', '4', '0', '4', '284.82', '373.7', '', '1128', '1480', '352', '2023-02-05 13:42:39'),
(175, '10', '258', '12', '0', '12', '278.76', '0', '', '3312', '0', '-3312', '2023-02-05 13:42:39'),
(176, '10', '254', '3', '0', '3', '288.86', '0', '', '858', '0', '-858', '2023-02-05 13:42:39'),
(177, '10', '590', '18', '0', '18', '46.46', '70.7', '', '828', '1260', '432', '2023-02-05 13:42:39'),
(178, '11', '295', '1', '0', '1', '7283.11', '0', '', '7211', '0', '-7211', '2023-02-05 19:26:23'),
(179, '11', '291', '1', '0', '1', '7454.81', '9292', '', '7381', '9200', '1819', '2023-02-05 19:26:23'),
(180, '11', '307', '1', '0', '1', '7739.63', '0', '', '7663', '0', '-7663', '2023-02-05 19:26:23'),
(181, '11', '311', '1', '0', '1', '7283.11', '0', '', '7211', '0', '-7211', '2023-02-05 19:26:23'),
(182, '11', '296', '1', '0', '1', '3733.97', '0', '', '3697', '0', '-3697', '2023-02-05 19:26:23'),
(183, '11', '312', '1', '0', '1', '3733.97', '0', '', '3697', '0', '-3697', '2023-02-05 19:26:23'),
(184, '11', '292', '1', '0', '1', '3818.81', '4797.5', '', '3781', '4750', '969', '2023-02-05 19:26:23'),
(185, '11', '308', '2', '0', '2', '3968.29', '0', '', '7858', '0', '-7858', '2023-02-05 19:26:23'),
(186, '11', '293', '2', '0', '2', '1560.45', '1969.5', '', '3090', '3900', '810', '2023-02-05 19:26:23'),
(187, '11', '297', '3', '0', '3', '1526.11', '0', '', '4533', '0', '-4533', '2023-02-05 19:26:23'),
(188, '11', '313', '5', '0', '5', '1526.11', '0', '', '7555', '0', '-7555', '2023-02-05 19:26:23'),
(189, '11', '309', '5', '0', '5', '1628.12', '0', '', '8060', '0', '-8060', '2023-02-05 19:26:23'),
(190, '11', '294', '12', '0', '12', '396.93', '505', '', '4716', '6000', '1284', '2023-02-05 19:26:23'),
(191, '11', '298', '5', '0', '5', '386.83', '0', '', '1915', '0', '-1915', '2023-02-05 19:26:23'),
(192, '11', '302', '4', '0', '4', '383.8', '0', '', '1520', '0', '-1520', '2023-02-05 19:26:23'),
(193, '11', '306', '8', '0', '8', '535.3', '0', '', '4240', '0', '-4240', '2023-02-05 19:26:23'),
(194, '11', '310', '8', '0', '8', '415.11', '0', '', '3288', '0', '-3288', '2023-02-05 19:26:23'),
(195, '11', '314', '7', '0', '7', '386.83', '0', '', '2681', '0', '-2681', '2023-02-05 19:26:23'),
(196, '12', '316', '1', '0', '1', '4509.65', '5625.7', '', '4465', '5570', '1105', '2023-02-06 18:54:33'),
(197, '12', '317', '4', '0', '4', '1809.92', '1969.5', '', '7168', '7800', '632', '2023-02-06 18:54:33'),
(198, '12', '325', '4', '0', '4', '1749.32', '0', '', '6928', '0', '-6928', '2023-02-06 18:54:33'),
(199, '12', '326', '6', '0', '6', '444.4', '0', '', '2640', '0', '-2640', '2023-02-06 18:54:33'),
(200, '12', '318', '6', '0', '6', '460.56', '0', '', '2736', '0', '-2736', '2023-02-06 18:54:33'),
(201, '12', '330', '6', '0', '6', '436.32', '585.8', '', '2592', '3480', '888', '2023-02-06 18:54:33'),
(202, '12', '336', '1', '0', '1', '4874.26', '6060', '', '4826', '6000', '1174', '2023-02-06 18:54:33'),
(203, '12', '340', '1', '0', '1', '4701.55', '0', '', '4655', '0', '-4655', '2023-02-06 18:54:33'),
(204, '12', '341', '3', '0', '3', '1894.76', '0', '', '5628', '0', '-5628', '2023-02-06 18:54:33'),
(205, '12', '354', '5', '0', '5', '1824.06', '0', '', '9030', '0', '-9030', '2023-02-06 18:54:33'),
(206, '12', '337', '3', '0', '3', '1961.42', '2474.5', '', '5826', '7350', '1524', '2023-02-06 18:54:33'),
(207, '12', '358', '4', '0', '4', '1961.42', '2474.5', '', '7768', '9800', '2032', '2023-02-06 18:54:33'),
(208, '12', '359', '4', '0', '4', '497.93', '626.2', '', '1972', '2480', '508', '2023-02-06 18:54:33'),
(209, '12', '347', '6', '0', '6', '471.67', '0', '', '2802', '0', '-2802', '2023-02-06 18:54:33'),
(210, '12', '342', '7', '0', '7', '479.75', '0', '', '3325', '0', '-3325', '2023-02-06 18:54:33'),
(211, '12', '355', '8', '0', '8', '462.58', '0', '', '3664', '0', '-3664', '2023-02-06 18:54:33'),
(212, '12', '351', '6', '0', '6', '462.58', '0', '', '2748', '0', '-2748', '2023-02-06 18:54:33'),
(213, '12', '338', '7', '0', '7', '497.93', '626.2', '', '3451', '4340', '889', '2023-02-06 18:54:33'),
(214, '13', '461', '6', '0', '6', '265.63', '292.9', '280', '1578', '1740', '162', '2023-02-09 10:27:14'),
(215, '13', '462', '4', '0', '4', '138.37', '161.6', '150', '548', '640', '92', '2023-02-09 10:27:14'),
(216, '13', '476', '8', '0', '8', '292.9', '313.1', '300', '2320', '2480', '160', '2023-02-09 10:27:14'),
(217, '13', '477', '6', '0', '6', '152.51', '171.7', '160', '906', '1020', '114', '2023-02-09 10:27:14'),
(218, '13', '467', '4', '0', '4', '292.9', '313.1', '300', '1160', '1240', '80', '2023-02-09 10:27:14'),
(219, '13', '464', '6', '0', '6', '265.63', '292.9', '280', '1578', '1740', '162', '2023-02-09 10:27:14'),
(220, '13', '465', '8', '0', '8', '138.37', '161.6', '150', '1096', '1280', '184', '2023-02-09 10:27:14'),
(221, '13', '470', '6', '0', '6', '292.9', '313.1', '300', '1740', '1860', '120', '2023-02-09 10:27:14'),
(222, '13', '471', '8', '0', '8', '152.51', '171.7', '160', '1208', '1360', '152', '2023-02-09 10:27:14'),
(223, '13', '479', '5', '0', '5', '292.9', '313.1', '300', '1450', '1550', '100', '2023-02-09 10:27:14'),
(224, '13', '480', '6', '0', '6', '152.51', '171.7', '160', '906', '1020', '114', '2023-02-09 10:27:14'),
(225, '13', '485', '4', '0', '4', '292.9', '313.1', '300', '1160', '1240', '80', '2023-02-09 10:27:14'),
(226, '13', '486', '8', '0', '8', '152.51', '171.7', '160', '1208', '1360', '152', '2023-02-09 10:27:14'),
(227, '13', '473', '5', '0', '5', '292.9', '313.1', '300', '1450', '1550', '100', '2023-02-09 10:27:14'),
(228, '13', '474', '8', '0', '8', '152.51', '171.7', '160', '1208', '1360', '152', '2023-02-09 10:27:14'),
(229, '13', '496', '5', '0', '5', '275.73', '0', '', '1365', '0', '-1365', '2023-02-09 10:27:14'),
(230, '13', '497', '13', '0', '13', '143.42', '0', '', '1846', '0', '-1846', '2023-02-09 10:27:14'),
(231, '13', '493', '5', '0', '5', '275.73', '0', '', '1365', '0', '-1365', '2023-02-09 10:27:14'),
(232, '13', '499', '6', '0', '6', '261.59', '0', '', '1554', '0', '-1554', '2023-02-09 10:27:14'),
(233, '13', '500', '8', '0', '8', '136.35', '0', '', '1080', '0', '-1080', '2023-02-09 10:27:14'),
(234, '13', '502', '4', '0', '4', '263.61', '0', '', '1044', '0', '-1044', '2023-02-09 10:27:14'),
(235, '14', '593', '6', '0', '6', '288.86', '313.1', '300', '1716', '1860', '144', '2023-02-09 10:33:51'),
(236, '14', '594', '7', '12', '-5', '151.5', '171.7', '160', '1050', '1190', '140', '2023-02-09 10:33:51'),
(237, '14', '599', '1', '0', '1', '292.9', '313.1', '300', '290', '310', '20', '2023-02-09 10:33:51'),
(238, '14', '597', '6', '0', '6', '292.9', '313.1', '300', '1740', '1860', '120', '2023-02-09 10:33:51'),
(239, '15', '433', '5', '0', '5', '263.61', '282.8', '280', '1305', '1400', '95', '2023-02-14 13:47:03'),
(240, '15', '427', '8', '0', '8', '263.61', '282.8', '280', '2088', '2240', '152', '2023-02-14 13:47:03'),
(241, '15', '448', '6', '0', '6', '290.88', '313.1', '310', '1728', '1860', '132', '2023-02-14 13:47:03'),
(242, '15', '451', '3', '0', '3', '290.88', '313.1', '310', '864', '930', '66', '2023-02-14 13:47:03'),
(243, '15', '424', '1', '0', '1', '284.82', '303', '300', '282', '300', '18', '2023-02-14 13:47:03'),
(244, '15', '442', '1', '0', '1', '263.61', '282.8', '280', '261', '280', '19', '2023-02-14 13:47:03'),
(245, '15', '443', '6', '0', '6', '144.43', '171.7', '160', '858', '1020', '162', '2023-02-14 13:47:03'),
(246, '15', '437', '1', '0', '1', '263.61', '282.8', '280', '261', '280', '19', '2023-02-14 13:47:03'),
(247, '15', '436', '8', '0', '8', '144.43', '171.7', '160', '1144', '1360', '216', '2023-02-14 13:47:03'),
(248, '15', '383', '3', '0', '3', '276.74', '303', '290', '822', '900', '78', '2023-02-14 13:47:03'),
(249, '15', '384', '6', '0', '6', '144.43', '161.6', '160', '858', '960', '102', '2023-02-14 13:47:03'),
(250, '15', '413', '4', '0', '4', '295.93', '323.2', '310', '1172', '1280', '108', '2023-02-14 13:47:03'),
(251, '15', '406', '6', '0', '6', '251.49', '272.7', '270', '1494', '1620', '126', '2023-02-14 13:47:03'),
(252, '15', '408', '8', '0', '8', '131.3', '151.5', '140', '1040', '1200', '160', '2023-02-14 13:47:03'),
(253, '15', '372', '6', '0', '6', '276.74', '303', '290', '1644', '1800', '156', '2023-02-14 13:47:03'),
(254, '15', '373', '5', '0', '5', '144.43', '161.6', '160', '715', '800', '85', '2023-02-14 13:47:03'),
(255, '15', '390', '4', '0', '4', '251.49', '272.7', '270', '996', '1080', '84', '2023-02-14 13:47:03'),
(256, '15', '391', '7', '0', '7', '131.3', '151.5', '140', '910', '1050', '140', '2023-02-14 13:47:03'),
(257, '15', '369', '6', '0', '6', '276.74', '303', '290', '1644', '1800', '156', '2023-02-14 13:47:03'),
(258, '15', '370', '7', '0', '7', '144.43', '161.6', '160', '1001', '1120', '119', '2023-02-14 13:47:03'),
(259, '15', '401', '4', '0', '4', '251.49', '272.7', '260', '996', '1080', '84', '2023-02-14 13:47:03'),
(260, '15', '402', '7', '0', '7', '131.3', '151.5', '140', '910', '1050', '140', '2023-02-14 13:47:03'),
(261, '15', '414', '7', '0', '7', '152.51', '171.7', '170', '1057', '1190', '133', '2023-02-14 13:47:03'),
(262, '15', '380', '7', '0', '7', '276.74', '303', '290', '1918', '2100', '182', '2023-02-14 13:47:03'),
(263, '15', '363', '4', '0', '4', '275.73', '303', '290', '1092', '1200', '108', '2023-02-14 13:47:03'),
(264, '15', '388', '5', '0', '5', '144.43', '161.6', '160', '715', '800', '85', '2023-02-14 13:47:03'),
(265, '16', '602', '2', '0', '2', '1075.65', '1161.5', '1130', '2130', '2300', '170', '2023-02-16 13:46:20'),
(266, '16', '603', '3', '0', '3', '276.74', '303', '290', '822', '900', '78', '2023-02-16 13:46:20'),
(267, '16', '604', '7', '0', '7', '144.43', '161.6', '160', '1001', '1120', '119', '2023-02-16 13:46:20'),
(268, '16', '392', '2', '0', '2', '974.65', '1060.5', '1030', '1930', '2100', '170', '2023-02-16 13:46:20'),
(269, '16', '362', '1', '0', '1', '1059.49', '1141.3', '1110', '1049', '1130', '81', '2023-02-16 13:46:20'),
(270, '16', '389', '4', '0', '4', '974.65', '1060.5', '1030', '3860', '4200', '340', '2023-02-16 13:46:20'),
(271, '16', '382', '2', '0', '2', '1075.65', '1161.5', '1130', '2130', '2300', '170', '2023-02-16 13:46:20'),
(272, '16', '371', '1', '0', '1', '1075.65', '1161.5', '1130', '1065', '1150', '85', '2023-02-16 13:46:20'),
(273, '16', '397', '2', '0', '2', '974.65', '1060.5', '1030', '1930', '2100', '170', '2023-02-16 13:46:20'),
(274, '17', '360', '6', '0', '6', '755.48', '858.5', '830', '4488', '5100', '612', '2023-02-20 19:15:21'),
(275, '17', '361', '6', '0', '6', '755.48', '858.5', '830', '4488', '5100', '612', '2023-02-20 19:15:21'),
(276, '17', '605', '3', '0', '3', '1130.19', '1212', '1200', '3357', '3600', '243', '2023-02-20 19:15:21'),
(277, '17', '606', '12', '0', '12', '247.45', '282.8', '275', '2940', '3360', '420', '2023-02-20 19:15:21'),
(278, '17', '608', '7', '0', '7', '274.4', '322', '275', '1715', '1960', '245', '2023-02-20 19:15:21'),
(279, '18', '1', '5', '0', '5', '3360', '4025', '', '15000', '17500', '2500', '2023-04-24 21:22:15'),
(280, '19', '1', '100', '0', '100', '1000', '1200', '', '100000', '120000', '20000', '2023-05-22 11:27:38'),
(281, '20', '610', '5', '1', '4', '2500', '3000', '', '12500', '15000', '2500', '2023-05-24 16:22:41'),
(282, '21', '610', '3700', '0', '3700', '670', '680', '', '2479000', '2516000', '37000', '2023-05-25 09:27:24'),
(283, '22', '629', '10', '0', '10', '71', '80', '', '710', '800', '90', '2023-07-09 09:25:07'),
(284, '23', '632', '10', '0', '10', '105', '210', '', '1000', '2000', '1000', '2023-08-01 21:57:54'),
(285, '24', '633', '1000', '0', '1000', '1050', '1590', '', '1000000', '1500000', '500000', '2023-08-09 20:50:33'),
(286, '25', '637', '10', '0', '10', '110', '140', 'heavy', '1100', '1400', '300', '2023-11-28 18:55:14'),
(287, '26', '613', '10', '0', '10', '130', '160', '', '1300', '1600', '300', '2023-11-28 18:56:12'),
(288, '27', '1', '5', '0', '5', '5000', '5500', '', '25000', '27500', '2500', '2023-12-05 20:59:38');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_category_id` int NOT NULL,
  `category_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `category_id`, `name`, `insert_date`) VALUES
(7, 5, 'pipe', '2023-06-13 11:48:10'),
(8, 5, 'fittings', '2023-06-13 11:49:05'),
(9, 5, 'tank', '2023-06-13 11:49:20'),
(11, 7, 'mark', '2023-06-13 11:53:53'),
(12, 7, 'dwell', '2023-06-13 11:55:21'),
(13, 8, 'prayag', '2023-06-13 16:54:32'),
(14, 8, 'pearl', '2023-06-13 16:54:45'),
(15, 7, 'hugo', '2023-06-13 16:55:07'),
(16, 7, 'cosflow', '2023-06-13 16:55:26'),
(17, 9, 'hindware', '2023-06-13 16:56:29'),
(18, 9, 'morbi', '2023-06-13 16:56:43'),
(19, 9, 'pariware', '2023-06-13 16:56:59'),
(20, 7, 'essco', '2023-06-13 16:57:34'),
(21, 10, 'fullturn', '2023-06-13 20:42:31'),
(22, 5, 'connecting pipe', '2023-06-13 20:48:31'),
(23, 8, 'connecting pipe', '2023-06-13 20:55:45'),
(24, 11, 'abc', '2023-08-01 21:56:20'),
(25, 8, 'MPI', '2023-08-03 11:55:14'),
(26, 12, 'TANK', '2023-08-03 11:56:11'),
(27, 13, 'cistern', '2023-08-04 12:45:45'),
(28, 13, 'bathroom fitting', '2023-08-04 12:46:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_login_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `decorator`
--
ALTER TABLE `decorator`
  ADD PRIMARY KEY (`decorator_id`);

--
-- Indexes for table `decorator_commision`
--
ALTER TABLE `decorator_commision`
  ADD PRIMARY KEY (`decorator_commision_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `item_sales`
--
ALTER TABLE `item_sales`
  ADD PRIMARY KEY (`item_sales_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_login_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `decorator`
--
ALTER TABLE `decorator`
  MODIFY `decorator_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `decorator_commision`
--
ALTER TABLE `decorator_commision`
  MODIFY `decorator_commision_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `item_sales`
--
ALTER TABLE `item_sales`
  MODIFY `item_sales_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=638;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

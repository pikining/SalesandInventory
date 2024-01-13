-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 12:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prince`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CATEGORY_ID` int(11) NOT NULL,
  `CNAME` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CATEGORY_ID`, `CNAME`) VALUES
(33, 'FOAM'),
(34, 'PAINT'),
(35, 'FAUCET'),
(36, 'DOOR LOCK'),
(37, 'WATER TANK'),
(38, 'CEMENT'),
(39, 'BED FRAME');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CUST_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUST_ID`, `FIRST_NAME`, `LAST_NAME`, `PHONE_NUMBER`) VALUES
(27, 'JOHN', 'JHONNY', '09093241567'),
(28, 'AIDEN', 'YUP', '09234156794'),
(29, 'geng', 'geng', '87654321907');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EMPLOYEE_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `GENDER` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL,
  `JOB_ID` int(11) DEFAULT NULL,
  `employeeid` varchar(25) NOT NULL,
  `HIRED_DATE` varchar(50) NOT NULL,
  `LOCATION_ID` int(11) DEFAULT NULL,
  `designation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMPLOYEE_ID`, `FIRST_NAME`, `LAST_NAME`, `GENDER`, `EMAIL`, `PHONE_NUMBER`, `JOB_ID`, `employeeid`, `HIRED_DATE`, `LOCATION_ID`, `designation`) VALUES
(1, 'Prince Ly', 'Cesar', 'Male', 'viy@gmail.com', '09124033805', 1, 'admin123', '0000-00-00', 113, 1),
(2, 'Josuey', 'Mag-asos', 'Male', 'jmagaso@yahoo.com', '09091245761', 2, 'baba123', '2019-01-28', 156, 1),
(4, 'Monica', 'Empinado', 'Female', 'monicapadernal@gmail.com', '09123357105', 1, '', '2019-03-06', 158, 1),
(12, 'Danica', 'fuebo', 'Male', 'dlm@gmail.com', '09567966559', 4, 'aa123', '2023-08-05', 166, 1),
(17, 'rose', 'reyes', 'Female', 'sdasdhajdn@gmail.com', '05552303256', 3, 'Emp 132165', '2023-08-31', 173, 1),
(32, 'ezekiel', 'rizal', 'Male', 'joydanielacortez@gmail.com', '09567966558', 3, 'Emp 1321675', '2024-01-04', 196, 1),
(33, 'lala', 'lala', 'Male', 'joydanielacortez@gmail.com', '02465871521', 3, '12345', '2024-01-08', 197, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `JOB_ID` int(11) NOT NULL,
  `JOB_TITLE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`JOB_ID`, `JOB_TITLE`) VALUES
(1, 'Manager'),
(2, 'Cashier'),
(3, 'Inventory Clerk'),
(4, 'Sales Employee');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `LOCATION_ID` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `PROVINCE` varchar(100) DEFAULT NULL,
  `CITY` varchar(100) DEFAULT NULL,
  `Barangay` varchar(100) NOT NULL,
  `Unit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`LOCATION_ID`, `userId`, `PROVINCE`, `CITY`, `Barangay`, `Unit`) VALUES
(111, 0, 'Negros Occidental', 'Bacolod City', '', ''),
(112, 0, 'Negros Occidental', 'Bacolod City', '', ''),
(113, 0, 'Negros Occidental', 'Binalbagan', '', ''),
(114, 0, 'Negros Occidental', 'Himamaylan', '', ''),
(115, 0, 'Negros Oriental', 'Dumaguette City', '', ''),
(116, 0, 'Negros Occidental', 'Isabella', '', ''),
(126, 0, 'Negros Occidental', 'Binalbagan', '', ''),
(130, 0, 'Cebu', 'Bogo City', '', ''),
(131, 0, 'Negros Occidental', 'Himamaylan', '', ''),
(132, 0, 'Negros', 'Jupiter', '', ''),
(133, 0, 'Aincrad', 'Floor 91', '', ''),
(134, 0, 'negros', 'binalbagan', '', ''),
(135, 0, 'hehe', 'tehee', '', ''),
(136, 0, 'PLANET YEKOK', 'KOKEY', '', ''),
(137, 0, 'Camiguin', 'Catarman', '', ''),
(138, 0, 'Camiguin', 'Catarman', '', ''),
(139, 0, 'Negros Occidental', 'Binalbagan', '', ''),
(140, 0, 'Batangas', 'Lemery', '', ''),
(141, 0, 'Capiz', 'Panay', '', ''),
(142, 0, 'Camarines Norte', 'Labo', '', ''),
(143, 0, 'Camarines Norte', 'Labo', '', ''),
(144, 0, 'Camarines Norte', 'Labo', '', ''),
(145, 0, 'Camarines Norte', 'Labo', '', ''),
(146, 0, 'Capiz', 'Pilar', '', ''),
(147, 0, 'Negros Occidental', 'Moises Padilla', '', ''),
(148, 0, 'a', 'a', '', ''),
(149, 0, '1', '1', '', ''),
(150, 0, 'Negros Occidental', 'Himamaylan', '', ''),
(151, 0, 'Masbate', 'Mandaon', '', ''),
(152, 0, 'Aklanas', 'Madalagsasa', '', ''),
(153, 0, 'Batangas', 'Mabini', '', ''),
(154, 0, 'Bataan', 'Morong', '', ''),
(155, 0, 'Capiz', 'Pillar', '', ''),
(156, 0, 'Negros Occidental', 'Bacolod', '', ''),
(157, 0, 'Camarines Norte', 'Labo', '', ''),
(158, 0, 'Negros Occidental', 'Binalbagan', '', ''),
(159, 0, 'Laguna', 'Calamba', '', ''),
(160, 0, 'Laguna', 'Calamba', '', ''),
(161, 0, 'Laguna', 'Calamba', '', ''),
(162, 0, 'Cagayan', 'Lasam', '', ''),
(163, 0, 'Bohol', 'Sierra Bullones', '', ''),
(164, 0, 'Bulacan', 'Pandi', '', ''),
(165, 0, 'Cagayan', 'Peñablanca', '', ''),
(166, 0, 'Abra', 'Bangued', 'Palao', 'Blk12 Lot 88 Majada In'),
(167, 0, 'Abra', 'Bangued', 'Macray', 'Blk12 Lot 88 Majada In'),
(168, 0, 'Abra', 'Bucay', 'North Poblacion', 'slasl;dalsa'),
(169, 0, 'Agusan del Sur', 'Loreto', 'San Diego', 'vvdfvdfv'),
(170, 16, 'Agusan del Norte', 'Buenavista', 'Abilan', ',mklklml'),
(171, 0, 'Agusan del Sur', 'Bunawan', '', ''),
(172, 0, 'Agusan del Norte', 'Butuan', '', ''),
(173, 0, 'Agusan del Norte', 'Cabadbaran', '', ''),
(174, 17, 'Aklan', 'Banga', 'Dingle', 'Blk12 Lot 88'),
(175, 0, 'Laguna', 'Los Baños', '', ''),
(176, 0, 'Batangas', 'Batangas City', '', ''),
(177, 0, 'Cavite', 'Alfonso', '', ''),
(178, 0, 'Abra', 'La Paz', '', ''),
(179, 0, 'Ilocos Norte', 'Pagudpud', '', ''),
(180, 18, 'Agusan del Sur', 'Rosario', 'Santa Cruz', '70'),
(181, 19, 'Abra', 'Bucay', 'Bugbog', '12'),
(182, 20, 'Bulacan', 'Bulakan', 'Maysantol', '12'),
(183, 0, 'Antique', 'Laua-an', '', ''),
(184, 0, 'Agusan del Norte', 'Cabadbaran', '', ''),
(185, 0, 'Agusan del Norte', 'Butuan', '', ''),
(186, 21, 'Biliran', 'Cabucgayan', 'Looc', 'rtyrtyrty'),
(187, 22, 'Bukidnon', 'Talakag', 'Tikalaan', 'dedded'),
(188, 23, 'Bohol', 'Pilar', 'Poblacion', 'dfsdfsdf'),
(189, 24, 'Guimaras', 'San Lorenzo', 'SAPAL', 'fsdfsdf'),
(190, 25, 'Camarines Norte', 'Talisay', 'Santo Niño', 'saada'),
(191, 26, 'Bulacan', 'San Rafael', 'Sapang Pahalang', 'assas'),
(192, 27, 'Cagayan', 'Rizal', 'Nanungaran', 'sdasdas'),
(193, 28, 'Bukidnon', 'Kalilangan', 'Ninoy Aquino', 'sasa'),
(194, 29, 'Camarines Norte', 'Paracale', 'Maybato', 'asad'),
(195, 30, 'Bukidnon', 'Kadingilan', 'Poblacion', 'aasas'),
(196, 31, 'Bukidnon', 'Talakag', 'Santo Niño', 'sdadas'),
(197, 32, 'Camarines Norte', 'Talisay', 'San Jose', 'asas'),
(198, 33, 'Cagayan', 'Rizal', 'Nanungaran', '55887');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `LOCATION_ID` int(11) NOT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`FIRST_NAME`, `LAST_NAME`, `LOCATION_ID`, `EMAIL`, `PHONE_NUMBER`) VALUES
('Prince Ly', 'Cesar', 113, 'PC@00', '09124033805'),
('Emman', 'Adventures', 116, 'emman@', '09123346576'),
('Bruce', 'Willis', 113, 'bruce@', NULL),
('Regine', 'Santos', 111, 'regine@', '09123456789');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `PRODUCT_CODE` varchar(20) NOT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `DESCRIPTION` varchar(250) NOT NULL,
  `QTY_STOCK` int(50) DEFAULT NULL,
  `ON_HAND` varchar(250) NOT NULL,
  `PRICE` int(50) DEFAULT NULL,
  `p_unit` varchar(50) NOT NULL,
  `CATEGORY_ID` int(11) DEFAULT NULL,
  `SUB_ID` int(11) NOT NULL,
  `SUPPLIER_ID` int(11) DEFAULT NULL,
  `addby` int(11) NOT NULL,
  `DATE_STOCK_IN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `PRODUCT_ID`, `PRODUCT_CODE`, `NAME`, `DESCRIPTION`, `QTY_STOCK`, `ON_HAND`, `PRICE`, `p_unit`, `CATEGORY_ID`, `SUB_ID`, `SUPPLIER_ID`, `addby`, `DATE_STOCK_IN`) VALUES
(97532, 31964, '01', 'SINGLE BED FOAM', 'High Quality', 10, 'pcs', 2500, '', 33, 20, 20, 13, '2023-09-26 04:55:03'),
(97533, 83893, '011', 'RED PAINT', 'RED', 10, 'PCS', 350, '', 34, 23, 21, 13, '2023-09-26 05:03:00'),
(97534, 51892, '002', 'EAGLE CEMENT', 'a fine, soft powder used as a binder because it hardens after contact with water.', 20, 'SACK', 200, '', 38, 31, 23, 13, '2023-09-26 08:17:48'),
(97535, 77848, '003', 'METAL BED FRAME', 'SOLID', 15, 'PCS', 5000, '', 39, 34, 24, 13, '2023-09-26 08:19:33'),
(97536, 92420, '004', 'WOODEN BED FRAME', 'SOLID', 13, 'PCS', 8000, '', 39, 33, 23, 13, '2023-09-26 08:21:36'),
(97537, 31964, '01', 'SINGLE BED FOAM', 'High Quality', 5, 'pcs', 2500, '', 33, 20, 20, 13, '2023-09-26 13:58:16'),
(97538, 78656, '02', 'DOUBLE BED FOAM', 'A', 5, 'PCS', 3200, '', 33, 21, 20, 13, '2023-09-26 14:05:02'),
(97539, 71721, '03', 'FAMILY BED FOAM', 'B', 9, 'PCS', 5000, '', 33, 22, 20, 13, '2023-09-26 14:05:56'),
(97540, 51892, '002', 'EAGLE CEMENT', 'a fine, soft powder used as a binder because it hardens after contact with water.', 20, 'SACK', 200, '', 38, 31, 24, 13, '2023-10-21 08:35:29'),
(97541, 51892, '002', 'EAGLE CEMENT', 'a fine, soft powder used as a binder because it hardens after contact with water.', 50, 'SACK', 200, '', 38, 31, 22, 17, '2023-11-17 13:14:09'),
(97542, 77848, '003', 'METAL BED FRAME', 'SOLID', 20, 'PCS', 5000, '', 39, 34, 24, 17, '2023-11-17 13:14:57'),
(97543, 92420, '004', 'WOODEN BED FRAME', 'SOLID', 50, 'PCS', 8000, '', 39, 33, 24, 17, '2023-11-17 13:15:21'),
(97544, 31964, '01', 'SINGLE BED FOAM', 'High Quality', 20, 'pcs', 2500, '', 33, 20, 24, 17, '2023-11-17 13:15:42'),
(97545, 83893, '011', 'RED PAINT', 'RED', 100, 'PCS', 350, '', 34, 23, 21, 17, '2023-11-17 13:15:58'),
(97546, 78656, '02', 'DOUBLE BED FOAM', 'A', 100, 'PCS', 3200, '', 33, 21, 20, 17, '2023-11-17 13:16:13'),
(97547, 71721, '03', 'FAMILY BED FOAM', 'B', 100, 'PCS', 5000, '', 33, 22, 20, 17, '2023-11-17 13:16:28'),
(97548, 96804, '010101', 'new', 'sad', 100, 'pcs', 50, '', 35, 26, 24, 17, '2023-11-17 13:37:26'),
(97551, 33814, '6565', '5fsdfdsf', '66dssd', 2, 'pcs', 20, '', 33, 22, 22, 17, '2023-12-01 07:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_ID` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_ID`, `status`) VALUES
(1, 'Active'),
(0, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `PRO_ID` int(11) NOT NULL,
  `PRODUCT_CODE` varchar(50) NOT NULL,
  `total_stock` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `PRO_ID`, `PRODUCT_CODE`, `total_stock`, `unit`) VALUES
(8, 140, '134512', 15, 'unit'),
(21, 31964, '01', 33, 'pcs'),
(22, 83893, '011', 107, 'PCS'),
(23, 51892, '002', 48, 'SACK'),
(24, 77848, '003', 35, 'PCS'),
(25, 92420, '004', 62, 'PCS'),
(26, 78656, '02', 104, 'PCS'),
(27, 71721, '03', 109, 'PCS'),
(28, 96804, '010101', 100, 'pcs'),
(29, 33814, '6565', 2, 'pcs');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `SUB_ID` int(11) NOT NULL,
  `SUB_NAME` varchar(50) NOT NULL,
  `CAT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`SUB_ID`, `SUB_NAME`, `CAT_ID`) VALUES
(5, 'jose', 3),
(17, 'Samsung', 6),
(19, 'mother of hen', 6),
(20, 'SINGLE', 33),
(21, 'DOUBLE', 33),
(22, 'FAMILY', 33),
(23, 'BOYSEN', 34),
(24, 'DAVIES', 34),
(25, 'RAIN OR SHINE', 34),
(26, 'KITCHEN', 35),
(27, 'SMART LOCK', 36),
(28, 'DIGITAL LOCK', 36),
(29, 'BIG TANK', 37),
(30, 'SMALL TANK', 37),
(31, 'EAGLE', 38),
(32, 'REPUBLIC', 38),
(33, 'WOODEN', 39),
(34, 'METAL', 39);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `SUPPLIER_ID` int(11) NOT NULL,
  `COMPANY_NAME` varchar(50) DEFAULT NULL,
  `LOCATION_ID` int(11) NOT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`SUPPLIER_ID`, `COMPANY_NAME`, `LOCATION_ID`, `PHONE_NUMBER`) VALUES
(20, 'URATEX CORP', 175, '01234567890'),
(21, 'PINTURA CORP', 176, '12345678901'),
(22, 'WILCON', 177, '09785136428'),
(23, 'KINEMBERLU', 178, '57894268197'),
(24, 'OTHERS', 179, '28975641308');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TRANS_ID` int(50) NOT NULL,
  `CUST_ID` int(11) DEFAULT NULL,
  `NUMOFITEMS` varchar(250) NOT NULL,
  `SUBTOTAL` varchar(50) NOT NULL,
  `LESSVAT` varchar(50) NOT NULL,
  `NETVAT` varchar(50) NOT NULL,
  `ADDVAT` varchar(50) NOT NULL,
  `GRANDTOTAL` varchar(250) NOT NULL,
  `CASH` varchar(250) NOT NULL,
  `DATE` varchar(50) NOT NULL,
  `TRANS_D_ID` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`TRANS_ID`, `CUST_ID`, `NUMOFITEMS`, `SUBTOTAL`, `LESSVAT`, `NETVAT`, `ADDVAT`, `GRANDTOTAL`, `CASH`, `DATE`, `TRANS_D_ID`) VALUES
(3, 16, '3', '456,982.00', '48,962.36', '408,019.64', '48,962.36', '456,982.00', '500000', '2019-03-18', '0318160336'),
(4, 11, '2', '1,967.00', '210.75', '1,756.25', '210.75', '1,967.00', '2000', '2019-03-18', '0318160622'),
(5, 14, '1', '550.00', '58.93', '491.07', '58.93', '550.00', '550', '2019-03-18', '0318170309'),
(6, 15, '1', '77,850.00', '8,341.07', '69,508.93', '8,341.07', '77,850.00', '80000', '2019-03-18', '0318170352'),
(7, 16, '1', '1,718.00', '184.07', '1,533.93', '184.07', '1,718.00', '2000', '2019-03-18', '0318170511'),
(8, 16, '1', '1,718.00', '184.07', '1,533.93', '184.07', '1,718.00', '2000', '2019-03-18', '0318170524'),
(9, 14, '1', '1,718.00', '184.07', '1,533.93', '184.07', '1,718.00', '2000', '2019-03-18', '0318170551'),
(10, 11, '1', '289.00', '30.96', '258.04', '30.96', '289.00', '500', '2019-03-18', '0318170624'),
(11, 9, '2', '1,148.00', '123.00', '1,025.00', '123.00', '1,148.00', '2000', '2019-03-18', '0318170825'),
(12, 9, '1', '5,500.00', '589.29', '4,910.71', '589.29', '5,500.00', '6000', '2019-03-18 19:40 pm', '0318194016'),
(13, 18, '1', '550.00', '58.93', '491.07', '58.93', '550.00', '1000', '2023-07-28 02:08 am', '072820904'),
(14, 9, '1', '550.00', '58.93', '491.07', '58.93', '550.00', '1000', '2023-08-08 02:03 am', '080820414'),
(15, 20, '3', '4,100.00', '439.29', '3,660.71', '439.29', '4,100.00', '1000', '2023-08-30 04:25 am', '083042543'),
(16, 16, '2', '215.00', '23.04', '191.96', '23.04', '215.00', '215', '2023-08-30 07:16 am', '083072142'),
(17, 20, '2', '110.00', '11.79', '98.21', '11.79', '110.00', '110', '2023-08-30 07:22 am', '083072311'),
(18, 19, '1', '100.00', '10.71', '89.29', '10.71', '100.00', '100', '2023-08-30 07:32 am', '083073217'),
(19, 19, '1', '5,550.00', '594.64', '4,955.36', '594.64', '5,550.00', '5550', '2023-08-30 21:43 pm', '0830214359'),
(20, 16, '1', '1,110.00', '118.93', '991.07', '118.93', '1,110.00', '1110', '2023-08-30 21:44 pm', '0830214449'),
(21, 9, '2', '3,530.00', '378.21', '3,151.79', '378.21', '3,530.00', '3530', '2023-08-30 21:47 pm', '0830214729'),
(22, 25, '3', '24,775.00', '2,654.46', '22,120.54', '2,654.46', '24,775.00', '24775', '2023-09-01 01:53 am', '090115336'),
(23, 25, '2', '6,250.00', '669.64', '5,580.36', '669.64', '6,250.00', '6250', '2023-09-01 01:56 am', '090115714'),
(24, 9, '1', '2,500.00', '267.86', '2,232.14', '267.86', '2,500.00', '3000', '2023-09-26 05:06 am', '092650656'),
(25, 24, '1', '350.00', '37.50', '312.50', '37.50', '350.00', '350', '2023-09-26 05:07 am', '092650738'),
(26, 27, '1', '350.00', '37.50', '312.50', '37.50', '350.00', '350', '2023-09-26 05:15 am', '092651554'),
(27, 27, '1', '2,500.00', '267.86', '2,232.14', '267.86', '2,500.00', '2500', '2023-09-26 05:16 am', '092651623'),
(28, 28, '2', '8,200.00', '878.57', '7,321.43', '878.57', '8,200.00', '8000', '2023-10-23 07:37 am', '102373758'),
(29, 29, '2', '3,550.00', '380.36', '3,169.64', '380.36', '3,550.00', '550', '2023-10-23 14:40 pm', '1023144136'),
(30, 27, '1', '200.00', '21.43', '178.57', '21.43', '200.00', '200', '2023-11-17 15:29 pm', '1117152936'),
(31, 27, '1', '200.00', '21.43', '178.57', '21.43', '200.00', '200', '2023-11-17 15:31 pm', '1117153143');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `ID` int(11) NOT NULL,
  `TRANS_D_ID` varchar(250) NOT NULL,
  `PRODUCTS_CODE` varchar(50) NOT NULL,
  `PRODUCTS` varchar(250) NOT NULL,
  `QTY` varchar(250) NOT NULL,
  `PRICE` varchar(250) NOT NULL,
  `EMPLOYEE` varchar(250) NOT NULL,
  `ROLE` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`ID`, `TRANS_D_ID`, `PRODUCTS_CODE`, `PRODUCTS`, `QTY`, `PRICE`, `EMPLOYEE`, `ROLE`) VALUES
(7, '0318160336', '', 'Lenovo ideapad 20059', '2', '32999', 'Prince Ly', 'Manager'),
(8, '0318160336', '', 'Predator Helios 300 Gaming Laptop', '5', '77850', 'Prince Ly', 'Manager'),
(9, '0318160336', '', 'A4tech OP-720', '6', '289', 'Prince Ly', 'Manager'),
(10, '0318160622', '', 'Newmen E120', '2', '550', 'Prince Ly', 'Manager'),
(11, '0318160622', '', 'A4tech OP-720', '3', '289', 'Prince Ly', 'Manager'),
(12, '0318170309', '', 'Newmen E120', '1', '550', 'Prince Ly', 'Manager'),
(13, '0318170352', '', 'Predator Helios 300 Gaming Laptop', '1', '77850', 'Prince Ly', 'Manager'),
(14, '0318170511', '', 'Fantech EG1', '2', '859', 'Prince Ly', 'Manager'),
(15, '0318170524', '', 'Fantech EG1', '2', '859', 'Prince Ly', 'Manager'),
(16, '0318170551', '', 'Fantech EG1', '2', '859', 'Prince Ly', 'Manager'),
(17, '0318170624', '', 'A4tech OP-720', '1', '289', 'Prince Ly', 'Manager'),
(18, '0318170825', '', 'A4tech OP-720', '1', '289', 'Prince Ly', 'Manager'),
(19, '0318170825', '', 'Fantech EG1', '1', '859', 'Prince Ly', 'Manager'),
(20, '0318194016', '', 'Newmen E120', '10', '550', 'Josuey', 'Cashier'),
(21, '072820904', '', '<br />\r\n<b>Warning</b>:  Undefined array key ', '1', '550', 'Prince Ly', 'Manager'),
(22, '080820414', '', '<br />\r\n<b>Warning</b>:  Undefined array key ', '1', '550', 'ezekiel', 'Cashier'),
(23, '083042543', '12356cxy', 'Bago', '3', '1230', 'Josuey', 'Cashier'),
(24, '083042543', '123123117', 'lalala', '2', '5', 'Josuey', 'Cashier'),
(25, '083042543', '12312311', 'I-pen', '20', '20', 'Josuey', 'Cashier'),
(26, '083071314', '12312311', 'I-pen', '5', '20', 'Josuey', 'Cashier'),
(27, '083071608', '12312311', 'I-pen', '5', '20', 'Josuey', 'Cashier'),
(28, '083071700', '12312311', 'I-pen', '10', '20', 'Josuey', 'Cashier'),
(29, '083071726', '12312311', 'I-pen', '10', '20', 'Josuey', 'Cashier'),
(30, '083071742', '12312311', 'I-pen', '10', '20', 'Josuey', 'Cashier'),
(31, '083071759', '12312311', 'I-pen', '10', '20', 'Josuey', 'Cashier'),
(32, '083071819', '12312311', 'I-pen', '10', '20', 'Josuey', 'Cashier'),
(33, '083072018', '12312311', 'I-pen', '10', '20', 'Josuey', 'Cashier'),
(34, '083072042', '12312311', 'I-pen', '10', '20', 'Josuey', 'Cashier'),
(35, '083072142', '12312311', 'I-pen', '10', '20', 'Josuey', 'Cashier'),
(36, '083072142', '123123117', 'lalala', '3', '5', 'Josuey', 'Cashier'),
(37, '083072311', '12312311', 'I-pen', '5', '20', 'Josuey', 'Cashier'),
(38, '083072311', '123123117', 'lalala', '2', '5', 'Josuey', 'Cashier'),
(39, '083073217', '12312311', 'I-pen', '5', '20', 'Josuey', 'Cashier'),
(40, '0830214359', 'bahs444', 'try', '50', '111', 'Josuey', 'Cashier'),
(41, '0830214449', 'bahs444', 'try', '10', '111', 'Josuey', 'Cashier'),
(42, '0830214729', '12312311', 'I-pen', '10', '20', 'Josuey', 'Cashier'),
(43, '0830214729', 'bahs444', 'try', '30', '111', 'Josuey', 'Cashier'),
(44, '090115336', '12312311', 'I-pen', '5', '20', 'Josuey', 'Cashier'),
(45, '090115336', '12356cxy', 'Bago', '20', '1230', 'Josuey', 'Cashier'),
(46, '090115336', '2313213210', 'ssadasd', '5', '15', 'Josuey', 'Cashier'),
(47, '090115714', '1111', 'bababbaba', '2', '50', 'Josuey', 'Cashier'),
(48, '090115714', '12356cxy', 'Bago', '5', '1230', 'Josuey', 'Cashier'),
(49, '092650656', '001', 'URATEX', '1', '2500', 'Josuey', 'Cashier'),
(50, '092650738', '011', 'PAINT', '1', '350', 'Josuey', 'Cashier'),
(51, '092651554', '011', 'PAINT', '1', '350', 'Josuey', 'Cashier'),
(52, '092651623', '001', 'URATEX', '1', '2500', 'Josuey', 'Cashier'),
(53, '102373758', '002', 'EAGLE CEMENT', '1', '200', 'a', 'Cashier'),
(54, '102373758', '004', 'WOODEN BED FRAME', '1', '8000', 'a', 'Cashier'),
(55, '1023144136', '011', 'RED PAINT', '1', '350', 'Josuey', 'Cashier'),
(56, '1023144136', '02', 'DOUBLE BED FOAM', '1', '3200', 'Josuey', 'Cashier'),
(57, '1117152936', '002', 'EAGLE CEMENT', '1', '200', 'Josuey', 'Cashier'),
(58, '1117153143', '002', 'EAGLE CEMENT', '1', '200', 'Josuey', 'Cashier');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `TYPE_ID` int(11) NOT NULL,
  `TYPE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`TYPE_ID`, `TYPE`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `EMP_ID` int(11) DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `TYPE_ID` int(11) DEFAULT NULL,
  `emp_email` varchar(255) NOT NULL,
  `verify_token` varchar(255) NOT NULL,
  `token_expire` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `EMP_ID`, `USERNAME`, `PASSWORD`, `TYPE_ID`, `emp_email`, `verify_token`, `token_expire`) VALUES
(1, 1, 'Prince Ly', '$2y$10$fQqUxGJUqUKPy9KWV0y8BeqVrr/rTq9j5pbTIMm5F4BvJ2nlDOVte', 1, 'viy@gmail.com', 'f4bf1fa0a4f913b936d0e647597aaf9a', '2023-12-06 16:44:16'),
(7, 2, 'Josuey', '$2y$10$mE3tXAd95hmSN0lXSp.c0O21XT37AxI8FaAOd0veZdKtc34Ji9ZDW', 2, 'malabanangladys7@gmail.com', 'a844917115c0dc851aa78ebd3cebd1a8', '2023-12-06 16:35:52'),
(9, 4, 'Monica', '$2y$10$gDq4tIEVn284a1LBLHTaEe2RJBUkfzhQynpyEgSbTj4btEwZkvQyS', 2, 'joydanielacortez@gmail.', '54df34cfd74d4a5a56f82b512048f078', '2024-01-08 13:06:18'),
(13, 12, 'Danica', '$2y$10$/5ALH1Um0i6JKmEDHAveV.3QzVkbZgHkEauYE8WSom4k/vhSeHS8K', 2, 'dlm@gmail.com', '', '2023-12-06 16:32:34'),
(18, 17, 'Rose', '$2y$10$sGS9xod3fzWnlz2Xy1Un2uhKJ6qt3TRbibQXnLgnU55tWqVc5h1yu', 2, 'sdasdhajdn@gmail.com', '', '2024-01-13 13:35:56'),
(33, 32, 'Emp 1321675', '$2y$10$k8ev9ez.2TwpRvLDmLSRyuNXSOICkIRqLIOS3eT5T7sq6XNLadjxq', 2, 'joydanielacortez@gmail.', '', '2024-01-08 12:58:35'),
(34, 33, '12345', '$2y$10$BWxyWVsbSd0188rH1GPH0uI9jlWKxWHA/vbX3mqX38P5D.HbI2F6m', 2, 'joydanielacortez@gmail.com', '1b3e4febea40bbec115b743c0f64b28a', '2024-01-08 13:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `LOGS` int(11) NOT NULL,
  `EMP` int(11) NOT NULL,
  `date_log` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`LOGS`, `EMP`, `date_log`) VALUES
(1, 2, '2023-08-30 22:27:06'),
(4, 2, '2023-08-31 04:41:04'),
(5, 1, '2023-08-30 22:42:30'),
(6, 13, '2023-08-31 01:38:50'),
(7, 1, '2023-08-31 19:33:56'),
(8, 2, '2023-09-01 01:51:06'),
(9, 13, '2023-09-01 02:16:21'),
(10, 13, '2023-09-01 02:17:34'),
(11, 1, '2023-09-01 02:30:43'),
(12, 13, '2023-09-01 02:57:11'),
(13, 13, '2023-09-01 03:14:48'),
(14, 12, '2023-09-01 03:44:51'),
(15, 2, '2023-09-01 03:48:47'),
(16, 1, '2023-09-01 03:53:15'),
(17, 1, '2023-09-09 06:33:04'),
(18, 1, '2023-09-14 02:18:42'),
(19, 2, '2023-09-26 04:20:24'),
(20, 13, '2023-09-26 04:21:15'),
(21, 12, '2023-09-26 04:24:07'),
(22, 1, '2023-09-26 04:26:20'),
(23, 1, '2023-09-26 04:28:14'),
(24, 13, '2023-09-26 04:36:57'),
(25, 2, '2023-09-26 05:06:01'),
(26, 1, '2023-09-26 05:08:01'),
(27, 12, '2023-09-26 05:12:20'),
(28, 1, '2023-09-26 05:14:51'),
(29, 2, '2023-09-26 05:15:16'),
(30, 1, '2023-09-26 05:16:40'),
(31, 1, '2023-09-26 07:18:13'),
(32, 1, '2023-09-26 07:33:50'),
(33, 1, '2023-09-26 08:01:04'),
(34, 13, '2023-09-26 08:01:28'),
(35, 1, '2023-09-26 13:57:25'),
(36, 13, '2023-09-26 13:57:43'),
(37, 2, '2023-09-26 14:08:04'),
(38, 1, '2023-09-26 14:08:32'),
(39, 4, '2023-09-26 14:15:46'),
(40, 1, '2023-09-26 14:16:12'),
(41, 4, '2023-09-27 01:34:20'),
(42, 1, '2023-09-28 01:19:44'),
(43, 16, '2023-09-28 01:20:42'),
(44, 16, '2023-09-28 01:21:45'),
(45, 18, '2023-09-28 01:23:13'),
(46, 1, '2023-10-16 02:44:19'),
(47, 1, '2023-10-21 07:51:35'),
(48, 1, '2023-10-21 08:28:00'),
(49, 1, '2023-10-21 08:28:58'),
(50, 13, '2023-10-21 08:34:42'),
(51, 2, '2023-10-21 08:36:08'),
(52, 1, '2023-10-21 08:37:14'),
(53, 12, '2023-10-21 08:38:52'),
(54, 2, '2023-10-21 08:40:12'),
(55, 1, '2023-10-21 08:41:27'),
(56, 17, '2023-10-21 08:43:06'),
(57, 1, '2023-10-21 08:43:46'),
(58, 1, '2023-10-23 07:25:10'),
(59, 1, '2023-10-23 07:26:56'),
(60, 1, '2023-10-23 07:27:15'),
(61, 19, '2023-10-23 07:27:56'),
(62, 19, '2023-10-23 07:31:54'),
(63, 20, '2023-10-23 07:36:27'),
(64, 1, '2023-10-23 07:42:59'),
(65, 20, '2023-10-23 07:44:30'),
(66, 4, '2023-10-23 07:46:23'),
(67, 12, '2023-10-23 07:47:54'),
(68, 1, '2023-10-23 07:50:27'),
(69, 16, '2023-10-23 07:51:36'),
(70, 12, '2023-10-23 14:39:57'),
(71, 2, '2023-10-23 14:40:26'),
(72, 1, '2023-10-23 14:44:53'),
(73, 1, '2023-10-24 03:52:06'),
(74, 4, '2023-10-24 03:52:52'),
(75, 2, '2023-10-24 03:54:43'),
(76, 1, '2023-10-24 03:58:57'),
(77, 2, '2023-10-24 04:02:09'),
(78, 1, '2023-10-24 04:03:10'),
(79, 4, '2023-10-24 04:03:38'),
(80, 12, '2023-10-24 04:04:22'),
(81, 1, '2023-10-24 04:05:00'),
(82, 16, '2023-10-24 04:08:43'),
(83, 1, '2023-10-24 04:09:15'),
(84, 2, '2023-11-08 02:46:17'),
(85, 1, '2023-11-08 02:47:30'),
(86, 2, '2023-11-08 02:48:22'),
(87, 1, '2023-11-17 12:44:17'),
(88, 17, '2023-11-17 13:13:24'),
(89, 1, '2023-11-17 14:27:35'),
(90, 1, '2023-11-17 14:43:38'),
(91, 1, '2023-11-17 15:00:20'),
(92, 17, '2023-11-17 15:14:25'),
(93, 17, '2023-11-17 15:18:32'),
(94, 12, '2023-11-17 15:22:52'),
(95, 12, '2023-11-17 15:25:05'),
(96, 4, '2023-11-17 15:27:04'),
(97, 2, '2023-11-17 15:27:26'),
(98, 2, '2023-11-17 15:30:05'),
(99, 1, '2023-12-01 07:03:46'),
(100, 17, '2023-12-01 07:16:25'),
(101, 17, '2023-12-06 04:29:30'),
(102, 12, '2023-12-06 04:45:22'),
(103, 1, '2023-12-06 05:04:46'),
(104, 1, '2023-12-06 07:58:32'),
(105, 26, '2023-12-06 08:31:09'),
(106, 26, '2023-12-06 08:32:08'),
(107, 4, '2023-12-06 09:31:03'),
(108, 12, '2023-12-06 09:32:57'),
(109, 17, '2023-12-06 09:34:26'),
(110, 2, '2023-12-06 09:36:03'),
(111, 1, '2023-12-06 09:37:10'),
(112, 1, '2023-12-06 09:43:53'),
(113, 1, '2023-12-06 09:44:27'),
(114, 4, '2023-12-06 09:54:50'),
(115, 2, '2023-12-07 10:31:57'),
(116, 1, '2024-01-04 04:30:44'),
(117, 1, '2024-01-08 05:43:09'),
(118, 33, '2024-01-08 05:55:09'),
(119, 33, '2024-01-08 05:56:17'),
(120, 33, '2024-01-08 05:57:00'),
(121, 4, '2024-01-08 06:04:45'),
(122, 4, '2024-01-08 06:05:06'),
(123, 33, '2024-01-08 06:09:33'),
(124, 33, '2024-01-08 06:10:02'),
(125, 1, '2024-01-13 06:04:57'),
(126, 17, '2024-01-13 06:34:54'),
(127, 17, '2024-01-13 06:35:40'),
(128, 17, '2024-01-13 06:36:08'),
(129, 1, '2024-01-13 08:36:35'),
(130, 1, '2024-01-13 12:17:11'),
(131, 2, '2024-01-13 12:18:31'),
(132, 17, '2024-01-13 12:21:25'),
(133, 2, '2024-01-13 12:23:11'),
(134, 17, '2024-01-13 12:23:26'),
(135, 12, '2024-01-13 12:23:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CATEGORY_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUST_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EMPLOYEE_ID`),
  ADD UNIQUE KEY `EMPLOYEE_ID` (`EMPLOYEE_ID`),
  ADD UNIQUE KEY `PHONE_NUMBER` (`PHONE_NUMBER`),
  ADD KEY `LOCATION_ID` (`LOCATION_ID`),
  ADD KEY `JOB_ID` (`JOB_ID`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`JOB_ID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`LOCATION_ID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD UNIQUE KEY `PHONE_NUMBER` (`PHONE_NUMBER`),
  ADD KEY `LOCATION_ID` (`LOCATION_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD KEY `CATEGORY_ID` (`CATEGORY_ID`),
  ADD KEY `SUPPLIER_ID` (`SUPPLIER_ID`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `PRODUCT_CODE` (`PRODUCT_CODE`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`SUB_ID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`SUPPLIER_ID`),
  ADD KEY `LOCATION_ID` (`LOCATION_ID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TRANS_ID`),
  ADD KEY `TRANS_DETAIL_ID` (`TRANS_D_ID`),
  ADD KEY `CUST_ID` (`CUST_ID`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TRANS_D_ID` (`TRANS_D_ID`) USING BTREE;

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`TYPE_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TYPE_ID` (`TYPE_ID`),
  ADD KEY `EMPLOYEE_ID` (`EMP_ID`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`LOGS`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CATEGORY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CUST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EMPLOYEE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `LOCATION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97552;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `SUB_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `SUPPLIER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TRANS_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `LOGS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`LOCATION_ID`) REFERENCES `location` (`LOCATION_ID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`CATEGORY_ID`) REFERENCES `category` (`CATEGORY_ID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`SUPPLIER_ID`) REFERENCES `supplier` (`SUPPLIER_ID`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`LOCATION_ID`) REFERENCES `location` (`LOCATION_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

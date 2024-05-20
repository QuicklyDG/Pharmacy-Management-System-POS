-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 03, 2023 at 04:13 PM
-- Server version: 8.0.29
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zarcy`
--

-- --------------------------------------------------------

--
-- Table structure for table `final_sales`
--

CREATE TABLE `final_sales` (
  `id` int NOT NULL,
  `invoice_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `salestotal` decimal(15,2) DEFAULT NULL,
  `profittotal` decimal(15,2) DEFAULT NULL,
  `discount` decimal(15,2) DEFAULT NULL,
  `cus_pay` decimal(15,2) DEFAULT NULL,
  `cus_change` decimal(15,2) DEFAULT NULL,
  `staff` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `posted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `final_sales`
--

INSERT INTO `final_sales` (`id`, `invoice_id`, `salestotal`, `profittotal`, `discount`, `cus_pay`, `cus_change`, `staff`, `posted`) VALUES
(1, 'E-0000001', '2670.00', '540.00', NULL, '3000.00', '330.00', NULL, '2022-12-23'),
(2, 'E-0000002', '148.50', '13.50', NULL, '150.00', '1.50', NULL, '2022-12-23'),
(3, 'E-0000003', '5575.00', '575.00', NULL, '6000.00', '425.00', NULL, '2022-12-23'),
(4, 'E-0000004', '456.50', '53.50', NULL, '500.00', '43.50', NULL, '2023-02-05'),
(5, 'E-0000005', '570.00', '65.00', NULL, '600.00', '30.00', NULL, '2023-02-05'),
(6, 'E-0000006', '99.50', '14.50', NULL, '500.00', '400.50', NULL, '2023-02-05'),
(7, 'E-0000007', '32.50', '9.50', NULL, '50.00', '17.50', NULL, '2023-02-05'),
(8, 'E-0000008', '890.00', '178.00', NULL, '1000.00', '110.00', NULL, '2023-02-13'),
(9, 'E-0000009', '198.00', '18.00', NULL, '200.00', '2.00', NULL, '2023-02-17'),
(10, 'E-0000010', '1930.50', '175.50', NULL, '2000.00', '69.50', NULL, '2023-02-17'),
(11, 'E-0000011', '74.50', '9.50', NULL, '80.00', '5.50', NULL, '2023-02-17'),
(12, 'E-0000012', '55.00', '11.00', NULL, '100.00', '45.00', NULL, '2023-02-17'),
(13, 'E-0000013', '34.50', '7.50', NULL, '34.50', '0.00', NULL, '2023-02-23'),
(14, 'E-0000014', '3316.50', '301.50', NULL, '10000.00', '6683.50', NULL, '2023-02-27'),
(15, 'E-0000015', '10.00', '5.00', NULL, '20.00', '10.00', NULL, '2023-02-27'),
(16, 'E-0000016', '81.00', '27.00', NULL, '100.00', '19.00', NULL, '2023-02-28'),
(17, 'E-0000017', '150.00', '30.00', NULL, '200.00', '50.00', NULL, '2023-02-28'),
(18, 'E-0000018', '200.00', '40.00', NULL, '200.00', '0.00', NULL, '2023-02-28'),
(19, 'E-0000019', '45.00', '15.00', NULL, '50.00', '5.00', NULL, '2023-02-28'),
(20, 'E-0000020', '150.00', '30.00', NULL, '200.00', '50.00', NULL, '2023-02-28'),
(21, 'E-0000021', '100.00', '20.00', NULL, '100.00', '0.00', NULL, '2023-02-28'),
(22, 'E-0000022', '45.00', '15.00', NULL, '45.00', '0.00', NULL, '2023-02-28'),
(24, 'E-0000023', '80.00', '20.00', '0.20', '200.00', '100.00', NULL, '2023-03-02'),
(25, 'E-0000024', '495.00', '45.00', NULL, '500.00', '5.00', NULL, '2023-03-02'),
(26, 'E-0000025', '80.00', '20.00', '0.20', '100.00', '0.00', NULL, '2023-03-02'),
(27, 'E-0000026', '50.00', '10.00', NULL, '100.00', '50.00', NULL, '2023-03-02'),
(28, 'E-0000026', '50.00', '10.00', NULL, '100.00', '50.00', NULL, '2023-03-02'),
(29, 'E-0000027', '45.00', '15.00', NULL, '50.00', '5.00', NULL, '2023-03-02'),
(30, 'E-0000028', '80.00', '35.00', '0.20', '100.00', '0.00', NULL, '2023-03-02'),
(31, 'E-0000029', '36.00', '15.00', '0.20', '50.00', '5.00', NULL, '2023-03-02'),
(32, 'E-0000030', '283.50', '40.50', NULL, '500.00', '216.50', NULL, '2023-03-02'),
(33, 'E-0000031', '49.50', '4.50', NULL, '50.00', '0.50', NULL, '2023-03-02'),
(34, 'E-0000032', '175.00', '35.00', NULL, '175.00', '0.00', NULL, '2023-03-02'),
(35, 'E-0000033', '125.00', '25.00', NULL, '125.00', '0.00', NULL, '2023-03-02'),
(36, 'E-0000034', '148.50', '13.50', NULL, '150.00', '1.50', NULL, '2023-03-02'),
(37, 'E-0000035', '50.00', '10.00', NULL, '50.00', '0.00', NULL, '2023-03-02'),
(38, 'E-0000036', '100.00', '20.00', NULL, '100.00', '0.00', NULL, '2023-03-02'),
(39, 'E-0000037', '-8512.00', '68.00', '20.00', '500.00', '52.00', NULL, '2023-03-02'),
(40, 'E-0000038', '-855.00', '15.00', '20.00', '50.00', '5.00', NULL, '2023-03-02'),
(41, 'E-0000039', '36.00', '15.00', '0.20', '50.00', '5.00', NULL, '2023-03-02'),
(42, 'E-0000040', '36.00', '15.00', '0.20', '50.00', '5.00', NULL, '2023-03-02'),
(43, 'E-0000041', '200.00', '40.00', NULL, '200.00', '0.00', NULL, '2023-03-02'),
(44, 'E-0000042', '40.00', '10.00', '0.20', '100.00', '50.00', NULL, '2023-03-02'),
(45, 'E-0000043', '76.80', '30.00', '0.20', '100.00', '4.00', NULL, '2023-03-04'),
(46, 'E-0000044', '64.00', '20.00', '0.20', '100.00', '20.00', NULL, '2023-03-04'),
(47, 'E-0000045', '80.00', '16.00', '0.20', '100.00', '20.00', NULL, '2023-03-04'),
(48, 'E-0000046', '100.00', '20.00', NULL, '200.00', '100.00', NULL, '2023-03-04');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int NOT NULL,
  `maincat` varchar(255) NOT NULL,
  `subcat` varchar(255) NOT NULL,
  `meds` varchar(255) NOT NULL,
  `mdate` date NOT NULL,
  `exdate` date NOT NULL,
  `stock` int NOT NULL,
  `origprice` decimal(15,2) NOT NULL,
  `sellprice` decimal(15,2) NOT NULL,
  `auth` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `maincat`, `subcat`, `meds`, `mdate`, `exdate`, `stock`, `origprice`, `sellprice`, `auth`) VALUES
(13, 'Antibiotics', 'Syrup', 'Bioflex', '2020-02-02', '2025-02-02', 50, '8.00', '10.00', 'no'),
(15, 'Antibacterials', 'Syrup', 'Bactidol', '2022-12-23', '2024-12-23', 11, '45.00', '49.50', 'Yes'),
(16, 'Antihestamine', 'Tablet', 'Cetirizine', '2023-02-01', '2027-11-11', 400, '3.00', '4.50', 'no'),
(18, 'Antibacterials', 'Tablet', 'Betadine', '2023-02-02', '2025-02-19', 56, '20.00', '25.00', 'no'),
(19, 'Antacids', 'Bottled Meds', 'Bioflu', '2023-02-01', '2023-02-26', 13, '5.00', '10.00', 'no'),
(20, 'Antibacterials', 'Tablet', 'Diatabs', '2023-02-01', '2026-02-01', 110, '8.00', '10.00', 'YES'),
(21, 'Antihestamine', 'Capsule', 'Montelukast', '2023-01-01', '2023-03-03', 50, '30.00', '35.00', 'YES'),
(22, 'Antibiotics', 'Bio', 'Sample Drug', '2023-03-01', '2023-03-03', 50, '12.00', '15.00', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `maincategory`
--

CREATE TABLE `maincategory` (
  `id` int NOT NULL,
  `maincat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maincategory`
--

INSERT INTO `maincategory` (`id`, `maincat`) VALUES
(2, 'Antacids'),
(4, 'Antibiotics'),
(6, 'Antibacterials'),
(9, 'Antihestamine');

-- --------------------------------------------------------

--
-- Table structure for table `notifiication`
--

CREATE TABLE `notifiication` (
  `id` int NOT NULL,
  `meds` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `exdate` date DEFAULT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifiication`
--

INSERT INTO `notifiication` (`id`, `meds`, `exdate`, `usertype`, `status`) VALUES
(1, 'Bioflex', '2023-03-01', 'admin', 'read'),
(2, 'Bactidol', '2023-02-23', 'admin', 'read'),
(3, 'Montelukast', '2023-03-03', 'admin', 'read'),
(4, 'Sample Drug', '2023-03-03', 'admin', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int NOT NULL,
  `invoice_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `meds` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `origprice` decimal(15,2) NOT NULL,
  `sellprice` decimal(15,2) NOT NULL,
  `profit` decimal(15,2) NOT NULL,
  `qty` int NOT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `profittotal` decimal(15,2) NOT NULL,
  `staff` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `posted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `invoice_id`, `meds`, `origprice`, `sellprice`, `profit`, `qty`, `subtotal`, `profittotal`, `staff`, `posted`) VALUES
(1, 'E-0000001', 'SHABU', '20.00', '25.00', '5.00', 1, '2500.00', '500.00', '', '2022-12-23'),
(2, 'E-0000001', 'Bioflex', '8.00', '10.00', '2.00', 10, '100.00', '20.00', '', '2022-12-23'),
(3, 'E-0000001', 'Marijuana', '5.00', '7.00', '2.00', 10, '70.00', '20.00', '', '2022-12-23'),
(4, 'E-0000002', 'Bactidol', '45.00', '49.50', '4.50', 3, '148.50', '13.50', '', '2022-12-23'),
(5, 'E-0000003', 'Bactidol', '45.00', '49.50', '4.50', 100, '4950.00', '450.00', '', '2022-12-23'),
(6, 'E-0000003', 'SHABU', '20.00', '25.00', '5.00', 1, '625.00', '125.00', '', '2022-12-23'),
(7, 'E-0000004', 'Bioflex', '8.00', '10.00', '2.00', 1, '10.00', '2.00', '', '2023-02-05'),
(8, 'E-0000004', 'Bactidol', '45.00', '49.50', '4.50', 7, '346.50', '31.50', '', '2023-02-05'),
(9, 'E-0000004', 'SHABU', '20.00', '25.00', '5.00', 4, '100.00', '20.00', '', '2023-02-05'),
(12, 'E-0000005', 'Bactidol', '45.00', '49.50', '4.50', 10, '495.00', '45.00', '', '2023-02-05'),
(13, 'E-0000005', 'Marijuana', '5.50', '7.50', '2.00', 10, '75.00', '20.00', '', '2023-02-05'),
(15, 'E-0000006', 'Bactidol', '45.00', '49.50', '4.50', 1, '49.50', '4.50', '', '2023-02-05'),
(16, 'E-0000006', 'Bioflex', '8.00', '10.00', '2.00', 5, '50.00', '10.00', '', '2023-02-05'),
(18, 'E-0000007', 'Bioflex', '8.00', '10.00', '2.00', 1, '10.00', '2.00', '', '2023-02-05'),
(19, 'E-0000007', 'Cetirizine', '3.00', '4.50', '1.50', 5, '22.50', '7.50', '', '2023-02-05'),
(21, 'E-0000008', 'Bioflex', '8.00', '10.00', '2.00', 89, '890.00', '178.00', '', '2023-02-13'),
(22, 'E-0000009', 'Bactidol', '45.00', '49.50', '4.50', 1, '49.50', '4.50', '', '2023-02-17'),
(23, 'E-0000009', 'Bactidol', '45.00', '49.50', '4.50', 1, '49.50', '4.50', '', '2023-02-17'),
(24, 'E-0000009', 'Bactidol', '45.00', '49.50', '4.50', 1, '49.50', '4.50', '', '2023-02-17'),
(25, 'E-0000009', 'Bactidol', '45.00', '49.50', '4.50', 1, '49.50', '4.50', '', '2023-02-17'),
(26, 'E-0000010', 'Bactidol', '45.00', '49.50', '4.50', 39, '1930.50', '175.50', '', '2023-02-17'),
(27, 'E-0000011', 'Bactidol', '45.00', '49.50', '4.50', 1, '49.50', '4.50', '', '2023-02-17'),
(28, 'E-0000011', 'Betadine', '20.00', '25.00', '5.00', 1, '25.00', '5.00', '', '2023-02-17'),
(29, 'E-0000012', 'Betadine', '20.00', '25.00', '5.00', 1, '25.00', '5.00', '', '2023-02-17'),
(30, 'E-0000012', 'Betadine', '8.00', '10.00', '2.00', 1, '10.00', '2.00', '', '2023-02-17'),
(31, 'E-0000012', 'Bactidol', '8.00', '10.00', '2.00', 1, '10.00', '2.00', '', '2023-02-17'),
(32, 'E-0000012', 'Bactidol', '8.00', '10.00', '2.00', 1, '10.00', '2.00', '', '2023-02-17'),
(33, 'E-0000013', 'Bactidol', '8.00', '10.00', '2.00', 1, '10.00', '2.00', '', '2023-02-18'),
(34, 'E-0000013', 'Bioflex', '8.00', '10.00', '2.00', 1, '10.00', '2.00', '', '2023-02-23'),
(35, 'E-0000013', 'Bioflex', '8.00', '10.00', '2.00', 1, '10.00', '2.00', '', '2023-02-23'),
(36, 'E-0000013', 'Cetirizine', '3.00', '4.50', '1.50', 1, '4.50', '1.50', '', '2023-02-23'),
(37, 'E-0000014', 'Bactidol', '45.00', '49.50', '4.50', 67, '3316.50', '301.50', '', '2023-02-27'),
(39, 'E-0000015', 'viagra', '5.00', '10.00', '5.00', 1, '10.00', '5.00', '', '2023-02-27'),
(40, 'E-0000016', 'Cetirizine', '3.00', '4.50', '1.50', 18, '81.00', '27.00', '', '2023-02-28'),
(41, 'E-0000017', 'Diatabs', '8.00', '10.00', '2.00', 15, '150.00', '30.00', '', '2023-02-28'),
(42, 'E-0000018', 'Diatabs', '8.00', '10.00', '2.00', 15, '150.00', '30.00', '', '2023-02-28'),
(43, 'E-0000018', 'Diatabs', '8.00', '10.00', '2.00', 5, '50.00', '10.00', '', '2023-02-28'),
(44, 'E-0000019', 'Cetirizine', '3.00', '4.50', '1.50', 10, '45.00', '15.00', '', '2023-02-28'),
(45, 'E-0000020', 'Diatabs', '8.00', '10.00', '2.00', 15, '150.00', '30.00', '', '2023-02-28'),
(46, 'E-0000021', 'Diatabs', '8.00', '10.00', '2.00', 10, '100.00', '20.00', '', '2023-02-28'),
(47, 'E-0000022', 'Cetirizine', '3.00', '4.50', '1.50', 10, '45.00', '15.00', '', '2023-02-28'),
(48, 'E-0000023', 'Diatabs', '8.00', '10.00', '2.00', 10, '100.00', '20.00', '', '2023-02-28'),
(49, 'E-0000024', 'Bactidol', '45.00', '49.50', '4.50', 10, '495.00', '45.00', '', '2023-03-02'),
(50, 'E-0000025', 'Bioflex', '8.00', '10.00', '2.00', 10, '100.00', '20.00', '', '2023-03-02'),
(51, 'E-0000026', 'Bioflex', '8.00', '10.00', '2.00', 5, '50.00', '10.00', '', '2023-03-02'),
(52, 'E-0000027', 'Cetirizine', '3.00', '4.50', '1.50', 10, '45.00', '15.00', '', '2023-03-02'),
(53, 'E-0000028', 'Betadine', '20.00', '25.00', '5.00', 2, '50.00', '10.00', '', '2023-03-02'),
(54, 'E-0000028', 'Bioflu', '5.00', '10.00', '5.00', 5, '50.00', '25.00', '', '2023-03-02'),
(55, 'E-0000029', 'Cetirizine', '3.00', '4.50', '1.50', 10, '45.00', '15.00', '', '2023-03-02'),
(56, 'E-0000030', 'Bactidol', '45.00', '49.50', '4.50', 3, '148.50', '13.50', '', '2023-03-02'),
(57, 'E-0000030', 'Betadine', '20.00', '25.00', '5.00', 5, '125.00', '25.00', '', '2023-03-02'),
(58, 'E-0000030', 'Bioflex', '8.00', '10.00', '2.00', 1, '10.00', '2.00', '', '2023-03-02'),
(59, 'E-0000031', 'Bactidol', '45.00', '49.50', '4.50', 1, '49.50', '4.50', '', '2023-03-02'),
(60, 'E-0000032', 'Bioflex', '8.00', '10.00', '2.00', 5, '50.00', '10.00', '', '2023-03-02'),
(61, 'E-0000032', 'Betadine', '20.00', '25.00', '5.00', 5, '125.00', '25.00', '', '2023-03-02'),
(62, 'E-0000033', 'Betadine', '20.00', '25.00', '5.00', 5, '125.00', '25.00', '', '2023-03-02'),
(63, 'E-0000034', 'Bactidol', '45.00', '49.50', '4.50', 3, '148.50', '13.50', '', '2023-03-02'),
(64, 'E-0000035', 'Bioflex', '8.00', '10.00', '2.00', 5, '50.00', '10.00', '', '2023-03-02'),
(65, 'E-0000036', 'Diatabs', '8.00', '10.00', '2.00', 10, '100.00', '20.00', '', '2023-03-02'),
(66, 'E-0000037', 'Bactidol', '45.00', '49.50', '4.50', 4, '198.00', '18.00', '', '2023-03-02'),
(67, 'E-0000037', 'Betadine', '20.00', '25.00', '5.00', 10, '250.00', '50.00', '', '2023-03-02'),
(68, 'E-0000038', 'Cetirizine', '3.00', '4.50', '1.50', 10, '45.00', '15.00', '', '2023-03-02'),
(69, 'E-0000039', 'Cetirizine', '3.00', '4.50', '1.50', 10, '45.00', '15.00', '', '2023-03-02'),
(70, 'E-0000040', 'Cetirizine', '3.00', '4.50', '1.50', 10, '45.00', '15.00', '', '2023-03-02'),
(71, 'E-0000041', 'Betadine', '20.00', '25.00', '5.00', 8, '200.00', '40.00', '', '2023-03-02'),
(72, 'E-0000042', 'Betadine', '20.00', '25.00', '5.00', 2, '50.00', '10.00', '', '2023-03-02'),
(73, 'E-0000043', 'Bioflu', '5.00', '10.00', '5.00', 2, '20.00', '10.00', '', '2023-03-03'),
(74, 'E-0000043', 'Betadine', '20.00', '25.00', '5.00', 4, '100.00', '20.00', '', '2023-03-03'),
(75, 'E-0000044', 'Diatabs', '8.00', '10.00', '2.00', 10, '100.00', '20.00', '', '2023-03-04'),
(76, 'E-0000045', 'Bioflex', '8.00', '10.00', '2.00', 10, '100.00', '20.00', '', '2023-03-04'),
(77, 'E-0000046', 'Bioflex', '8.00', '10.00', '2.00', 10, '100.00', '20.00', '', '2023-03-04');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int NOT NULL,
  `m_id` int DEFAULT NULL,
  `mdate` date DEFAULT NULL,
  `exdate` date DEFAULT NULL,
  `laststock` int DEFAULT NULL,
  `addstock` int DEFAULT NULL,
  `newstock` int DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `posted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `m_id`, `mdate`, `exdate`, `laststock`, `addstock`, `newstock`, `status`, `posted`) VALUES
(1, 15, '2023-02-01', '2023-03-14', 179, 21, 200, 'Inactive', '2023-02-14'),
(2, 15, '2023-03-10', '2023-04-10', 200, 50, 250, 'Inactive', '2023-02-14'),
(3, 13, '2023-02-01', '2023-03-01', -81, 181, 100, 'Inactive', '2023-02-14'),
(4, 15, '2023-02-01', '2023-02-23', 97, 2, 99, 'Inactive', '2023-02-23'),
(5, 21, '2023-01-01', '2023-03-03', 0, 0, 50, 'Inactive', '2023-03-03'),
(6, 22, '2023-03-01', '2023-03-03', 0, 0, 15, 'Inactive', '2023-03-03'),
(7, 22, '2023-03-01', '2023-03-03', 15, 35, 50, 'Inactive', '2023-03-03');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int NOT NULL,
  `subcat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `subcat`) VALUES
(10, 'Tablet'),
(11, 'Syrup'),
(12, 'Bio'),
(15, 'Bottled Meds'),
(16, 'Capsule');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `fullname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `profile` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `role` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `username`, `password`, `profile`, `role`) VALUES
(2, 'Quickly De Guzman', 'quickly@me.com', 'admin', '', 'Admin'),
(5, 'Yllah Mae Pasilan', 'yllah@me.com', 'staff', '', 'Staff'),
(10, 'Augustine Luague', 'dodong@me.com', 'staff', NULL, 'Staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `final_sales`
--
ALTER TABLE `final_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maincategory`
--
ALTER TABLE `maincategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifiication`
--
ALTER TABLE `notifiication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `final_sales`
--
ALTER TABLE `final_sales`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `maincategory`
--
ALTER TABLE `maincategory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notifiication`
--
ALTER TABLE `notifiication`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

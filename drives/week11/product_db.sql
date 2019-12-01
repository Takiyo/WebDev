-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2019 at 03:00 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tbrytowski`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_db`
--

CREATE TABLE `product_db` (
  `productId` int(11) NOT NULL,
  `toolsName` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `toolsShipper` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `toolsWeight` float DEFAULT NULL,
  `electronicsName` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `electronicsRecyclable` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `product_db`
--

INSERT INTO `product_db` (`productId`, `toolsName`, `toolsShipper`, `toolsWeight`, `electronicsName`, `electronicsRecyclable`) VALUES
(1, '', NULL, 0, 'sadas', 0),
(2, '', NULL, 0, 'casdasd', 0),
(3, 'sadsa', 'FedEx', 123, '', 0),
(4, 'asd', 'FedEx', 123, '', 0),
(5, '', NULL, 0, 'sadas', 0),
(6, 'dsda', 'FedEx', 23, '', 0),
(7, 'dsda', 'FedEx', 23, '', 0),
(8, 'ddd', 'UPS', 123, '', 0),
(9, 'ddd', 'UPS', 123, '', 0),
(10, 'dasdsa', 'UPS', 2545, '', 0),
(11, 'dasdsa', 'UPS', 2545, '', 0),
(12, '312', 'USPS', 3213, '', 0),
(13, '312', 'USPS', 3213, '', 0),
(14, '312', 'USPS', 3213, '', 0),
(15, '312', 'USPS', 3213, '', 0),
(16, '312', 'USPS', 3213, '', 0),
(17, 'dsfsdf', NULL, 0, 'gfdgergrg', 0),
(18, 'asds', 'FedEx', 23131, '', NULL),
(19, 'dwadwa', 'UPS', 1233, '', NULL),
(20, '', NULL, 231132, 'sadad', 0),
(21, '', NULL, 0, 'saddsa', 0),
(22, '', NULL, 0, 'wadaw', 0),
(23, '', NULL, 0, '231', 1),
(24, 'sada', 'UPS', 23, '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_db`
--
ALTER TABLE `product_db`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_db`
--
ALTER TABLE `product_db`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

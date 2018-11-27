-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2018 at 11:48 PM
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
-- Table structure for table `riskyregistration`
--

CREATE TABLE `riskyregistration` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `last_name` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `phone` bigint(11) NOT NULL,
  `job` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `resume` varchar(6000) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `riskyregistration`
--

INSERT INTO `riskyregistration` (`id`, `first_name`, `last_name`, `email`, `phone`, `job`, `resume`) VALUES
(1, 'ds', 'dsds', 'takiyobrytowski@gmail.com', 12312, '1231231234', '12313'),
(2, 'das', 'dsad', 'dsad', 0, 'das', 'dsa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `riskyregistration`
--
ALTER TABLE `riskyregistration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `riskyregistration`
--
ALTER TABLE `riskyregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

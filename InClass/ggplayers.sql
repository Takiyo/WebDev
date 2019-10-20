-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2019 at 05:48 AM
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
-- Table structure for table `ggplayers`
--

CREATE TABLE `ggplayers` (
  `playerId` int(11) NOT NULL,
  `tag` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `firstName` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `startDate` date NOT NULL,
  `seedExpectation` int(4) NOT NULL,
  `isCompeting` tinyint(1) NOT NULL,
  `isVolunteer` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `ggplayers`
--

INSERT INTO `ggplayers` (`playerId`, `tag`, `firstName`, `startDate`, `seedExpectation`, `isCompeting`, `isVolunteer`) VALUES
(3, 'Something', 'Takiyo', '2019-10-01', 1, 1, 0),
(4, 'da2d2a', 'dadwadaw', '2019-10-04', 7, 1, 0),
(5, 'da2d2a', 'dadwadaw', '2019-10-04', 7, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ggplayers`
--
ALTER TABLE `ggplayers`
  ADD PRIMARY KEY (`playerId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ggplayers`
--
ALTER TABLE `ggplayers`
  MODIFY `playerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

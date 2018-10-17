-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2018 at 05:06 AM
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
-- Table structure for table `dbfzcharacter`
--

CREATE TABLE `dbfzcharacter` (
  `playerId` int(11) NOT NULL,
  `playerName` char(20) COLLATE latin1_general_ci NOT NULL,
  `characterName` char(20) COLLATE latin1_general_ci NOT NULL,
  `topPlayersUse` tinyint(1) NOT NULL,
  `datePlayerStarted` date NOT NULL,
  `coolnessRating` tinyint(3) NOT NULL,
  `password` varchar(40) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `dbfzcharacter`
--

INSERT INTO `dbfzcharacter` (`playerId`, `playerName`, `characterName`, `topPlayersUse`, `datePlayerStarted`, `coolnessRating`, `password`) VALUES
(1, '', '', 0, '0000-00-00', 0, NULL),
(2, '', '', 0, '0000-00-00', 50, NULL),
(3, '', '', 0, '0000-00-00', 50, NULL),
(4, 'dsds', 'dsds', 0, '2018-09-12', 50, NULL),
(5, '', '', 0, '0000-00-00', 50, NULL),
(6, 'wew', 'ewew', 0, '2018-09-13', 95, NULL),
(8, 'wew', 'ewew', 0, '2018-09-13', 95, NULL),
(9, 'wew', 'ewew', 0, '2018-09-13', 95, NULL),
(11, 'wew', 'ewew', 0, '2018-09-13', 95, NULL),
(12, '', '', 0, '0000-00-00', 50, NULL),
(13, 'dsd', 'dsds', 0, '2018-08-29', 84, NULL),
(14, 'dsd', 'dsds', 0, '2018-08-29', 84, NULL),
(15, '232', '3232', 0, '2018-08-29', 100, NULL),
(16, '232', '3232', 0, '2018-08-29', 100, NULL),
(26, '', '', 0, '0000-00-00', 50, NULL),
(28, 'dasdsa', 'dasda', 0, '2018-08-29', 83, NULL),
(29, 'dasdsa', 'dasda', 0, '2018-08-29', 83, NULL),
(30, 'dasdsa', 'dasda', 0, '2018-08-29', 83, NULL),
(31, 'dasdsa', 'dasda', 0, '2018-08-29', 83, NULL),
(32, 'dasdsa', 'dasda', 0, '2018-08-29', 83, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dbfzcharacter`
--
ALTER TABLE `dbfzcharacter`
  ADD PRIMARY KEY (`playerId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dbfzcharacter`
--
ALTER TABLE `dbfzcharacter`
  MODIFY `playerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

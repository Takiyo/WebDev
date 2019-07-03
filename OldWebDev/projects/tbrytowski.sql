-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2018 at 08:18 AM
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
  `coolnessRating` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `dbfzcharacter`
--

INSERT INTO `dbfzcharacter` (`playerId`, `playerName`, `characterName`, `topPlayersUse`, `datePlayerStarted`, `coolnessRating`) VALUES
(1, '', '', 0, '0000-00-00', 0),
(2, '', '', 0, '0000-00-00', 50),
(3, '', '', 0, '0000-00-00', 50),
(4, 'dsds', 'dsds', 0, '2018-09-12', 50),
(5, '', '', 0, '0000-00-00', 50),
(6, 'wew', 'ewew', 0, '2018-09-13', 95),
(7, 'wew', 'ewew', 0, '2018-09-13', 95),
(8, 'wew', 'ewew', 0, '2018-09-13', 95),
(9, 'wew', 'ewew', 0, '2018-09-13', 95),
(10, 'wew', 'ewew', 0, '2018-09-13', 95),
(11, 'wew', 'ewew', 0, '2018-09-13', 95),
(12, '', '', 0, '0000-00-00', 50),
(13, 'dsd', 'dsds', 0, '2018-08-29', 84),
(14, 'dsd', 'dsds', 0, '2018-08-29', 84),
(15, '232', '3232', 0, '2018-08-29', 100),
(16, '232', '3232', 0, '2018-08-29', 100),
(17, '32423', '23423', 0, '2018-08-09', 79),
(18, '32423', '23423', 0, '2018-08-09', 79),
(19, '32423', '23423', 0, '2018-08-09', 79),
(20, '32423', '23423', 0, '2018-08-09', 79),
(21, '32423', '23423', 0, '2018-08-09', 79),
(22, '', '', 0, '0000-00-00', 50),
(23, '32423', '23423', 0, '2018-08-09', 18),
(24, '32423', '23423', 0, '2018-08-09', 18),
(25, '32423', '23423', 0, '2018-08-09', 18),
(26, '', '', 0, '0000-00-00', 50),
(27, '32423', '23423', 0, '2018-08-09', 18),
(28, 'dasdsa', 'dasda', 0, '2018-08-29', 83),
(29, 'dasdsa', 'dasda', 0, '2018-08-29', 83),
(30, 'dasdsa', 'dasda', 0, '2018-08-29', 83),
(31, 'dasdsa', 'dasda', 0, '2018-08-29', 83),
(32, 'dasdsa', 'dasda', 0, '2018-08-29', 83);

-- --------------------------------------------------------

--
-- Table structure for table `email_list`
--

CREATE TABLE `email_list` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `last_name` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(60) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `email_list`
--

INSERT INTO `email_list` (`id`, `first_name`, `last_name`, `email`) VALUES
(1, 'Denny', 'Bubbleton', 'denny@mightygumball.net');

-- --------------------------------------------------------

--
-- Table structure for table `madlibstable`
--

CREATE TABLE `madlibstable` (
  `noun` char(20) COLLATE latin1_general_ci NOT NULL,
  `verb` char(20) COLLATE latin1_general_ci NOT NULL,
  `adjective` char(20) COLLATE latin1_general_ci NOT NULL,
  `adverb` char(20) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `madlibstable`
--

INSERT INTO `madlibstable` (`noun`, `verb`, `adjective`, `adverb`) VALUES
('dsd', 'dsds', 'dsds', 'dsds'),
('111', '2222', '333', '44'),
('111', '2222', '333', '44'),
('ds', 'dsds', 'dsds', 'ds'),
('ds', 'dsds', 'dsds', 'ds'),
('ds', 'dsds', 'dsds', 'ds'),
('ds', 'dsds', 'dsds', 'ds'),
('ds', 'dsds', 'dsds', 'ds'),
('ds', 'dsds', 'dsds', 'ds'),
('ds', 'dsds', 'dsds', 'ds'),
('ds', 'dsds', 'dsds', 'ds'),
('boy', 'ran', 'blue', 'blissfully'),
('boy', 'ran', 'blue', 'blissfully'),
('boy', 'ran', 'blue', 'blissfully'),
('boy', 'ran', 'blue', 'blissfully'),
('boy', 'ran', 'blue', 'blissfully'),
('boy', 'ran', 'blue', 'blissfully'),
('boy', 'ran', 'blue', 'blissfully'),
('boy', 'ran', 'blue', 'blissfully'),
('boy', 'ran', 'blue', 'blissfully'),
('boy', 'ran', 'blue', 'blissfully'),
('boy', 'ran', 'blue', 'blissfully'),
('boy', 'ran', 'blue', 'blissfully'),
('boy', 'ran', 'blue', 'blissfully'),
('boy', 'ran', 'blue', 'blissfully'),
('boy', 'ran', 'blue', 'blissfully'),
('boy', 'ran', 'blue', 'blissfully'),
('boy', 'ran', 'blue', 'blissfully'),
('boy', 'ran', 'blue', 'blissfully'),
('nazi', 'run', 'blue', 'skillfully'),
('nazi', 'run', 'blue', 'skillfully'),
('noun', 'verb', 'adjective', 'adverb'),
('noun', 'verb', 'adjective', 'adverb'),
('noun', 'verb', 'adjective', 'adverb'),
('noun', 'verb', 'adjective', 'adverb'),
('ss', 'ss', 'ss', ''),
('ss', 'ss', 'ss', 'das'),
('sdsa', 'as', 'd', 'a'),
('sdsa', 'as', 'd', 'a'),
('sdsa', 'as', 'd', 'a'),
('sdsa', 'as', 'd', 'a'),
('da', 'ss', 'aa', 'zz'),
('sdf', 'fsd', 'fsd', 'dsf'),
('da', 'ss', 'aa', 'zz'),
('da', 'ss', 'aa', 'zz'),
('da', 'ss', 'aa', 'zz'),
('asas', 'ss', 'asa', 'as'),
('asd', 'asd', 'sadas', 'wdaw'),
('2321', 'dawda2', '3wda2', 'ad2d2w');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dbfzcharacter`
--
ALTER TABLE `dbfzcharacter`
  ADD PRIMARY KEY (`playerId`);

--
-- Indexes for table `email_list`
--
ALTER TABLE `email_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dbfzcharacter`
--
ALTER TABLE `dbfzcharacter`
  MODIFY `playerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `email_list`
--
ALTER TABLE `email_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

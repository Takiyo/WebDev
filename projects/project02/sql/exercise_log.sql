-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2018 at 04:15 AM
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
-- Table structure for table `exercise_log`
--

CREATE TABLE `exercise_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `date` date NOT NULL,
  `heartrate` int(11) NOT NULL,
  `calories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `exercise_log`
--

INSERT INTO `exercise_log` (`id`, `user_id`, `age`, `weight`, `duration`, `date`, `heartrate`, `calories`) VALUES
(46, 0, 23, 233, 23, '2018-10-29', 233, 0),
(47, 0, 23, 233, 23, '2018-10-29', 233, 646),
(48, 0, 23, 233, 23, '2018-10-29', 233, 646),
(49, 0, 23, 233, 23, '2018-10-29', 233, 646),
(50, 0, 23, 233, 23, '2018-10-29', 233, 646),
(51, 0, 23, 23, 233, '2018-10-29', 25, -1816),
(52, 0, 23, 233, 23, '2018-10-29', 233, 646),
(53, 0, 23, 233, 23, '2018-10-29', 233, 646),
(54, 0, 23, 233, 23, '2018-10-29', 233, 646),
(55, 0, 23, 233, 23, '2018-10-29', 233, 646),
(56, 0, 44, 23123232, 32, '2018-10-30', 23, 15947095),
(57, 0, 44, 23123232, 32, '2018-10-30', 23, 15947095),
(58, 0, 44, 23123232, 32, '2018-10-30', 23, 15947095),
(59, 0, 44, 23123232, 32, '2018-10-30', 23, 15947095),
(60, 0, 44, 23123232, 32, '2018-10-30', 23, 15947095),
(61, 0, 44, 23123232, 32, '2018-10-30', 23, 15947095),
(62, 0, 44, 23123232, 32, '2018-10-30', 23, 15947095),
(63, 0, 44, 23123232, 32, '2018-10-30', 23, 15947095),
(64, 0, 44, 23123232, 32, '2018-10-30', 23, 15947095),
(65, 0, 44, 23123232, 32, '2018-10-30', 23, 15947095);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exercise_log`
--
ALTER TABLE `exercise_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exercise_log`
--
ALTER TABLE `exercise_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

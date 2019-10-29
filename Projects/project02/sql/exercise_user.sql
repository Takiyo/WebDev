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
-- Table structure for table `exercise_user`
--

CREATE TABLE `exercise_user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `last_name` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `gender` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `birthdate` date NOT NULL,
  `weight` int(11) NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(30) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `exercise_user`
--

INSERT INTO `exercise_user` (`id`, `first_name`, `last_name`, `gender`, `birthdate`, `weight`, `username`, `password`) VALUES
(1, 'Takiyo', 'Brytowski', 'Male', '1993-04-02', 180, 'fug', '00f4619cda81c764c0d292c4c06489'),
(2, 'blop', 'wop', 'Male', '1993-04-02', 200, 'bop', '5042d146667518a1a5017644946b86'),
(3, 'tuk', 'tok', 'male', '1993-04-02', 200, 'bob', '7a86b15480e0a870f0b07a4d23a54e'),
(4, 'Tuko', 'Tungle', 'Male', '1993-04-02', 100, 'man', 'SHA(123)'),
(5, 'daw', 'dawdaw', 'Male', '2018-10-03', 23, 'boo', 'ae8d904cebfd629cdb1cc773a5bce8'),
(6, 'sajdoa', 'oasjkdoa', 'Male', '1993-02-04', 100, 'tom', '96835dd8bfa718bd6447ccc87af89a'),
(7, 'dadaw', 'adwdaw', 'Female', '1993-04-02', 23, 'woah', '5bae372e69f5293eda5b478a2663f5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exercise_user`
--
ALTER TABLE `exercise_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exercise_user`
--
ALTER TABLE `exercise_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

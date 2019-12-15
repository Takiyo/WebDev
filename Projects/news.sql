-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2019 at 01:37 AM
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
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(128) COLLATE latin1_general_ci NOT NULL,
  `slug` varchar(128) COLLATE latin1_general_ci NOT NULL,
  `text` text COLLATE latin1_general_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `text`, `date`) VALUES
(1, 'title', 'slug', 'sakldjmaskldasoiwioadmnawd8uiwahd sakldjmaskldasoiwioadmnawd8uiwahd sakldjmaskldasoiwioadmnawd8uiwahd sakldjmaskldasoiwioadmnawd8uiwahd sakldjmaskldasoiwioadmnawd8uiwahd sakldjmaskldasoiwioadmnawd8uiwahd sakldjmaskldasoiwioadmnawd8uiwahd sakldjmaskldasoiwioadmnawd8uiwahd sakldjmaskldasoiwioadmnawd8uiwahd sakldjmaskldasoiwioadmnawd8uiwahd sakldjmaskldasoiwioadmnawd8uiwahd sakldjmaskldasoiwioadmnawd8uiwahd sakldjmaskldasoiwioadmnawd8uiwahd sakldjmaskldasoiwioadmnawd8uiwahd sakldjmaskldasoiwioadmnawd8uiwahd sakldjmaskldasoiwioadmnawd8uiwahd sakldjmaskldasoiwioadmnawd8uiwahd sakldjmaskldasoiwioadmnawd8uiwahd sakldjmaskldasoiwioadmnawd8uiwahd sakldjmaskldasoiwioadmnawd8uiwahd sakldjmaskldasoiwioadmnawd8uiwahd ', '0000-00-00'),
(2, 'test', 'test', 'test2', '0000-00-00'),
(3, 'sdfs', 'sdfs', 'fds', '0000-00-00'),
(4, 'fdsfs', 'fdsfs', 'gdfsg', '0000-00-00'),
(5, 'fdsfs', 'fdsfs', 'gdfsg', '0000-00-00'),
(6, 'fdsfs', 'fdsfs', 'gdfsg', '0000-00-00'),
(7, 'fdgd', 'fdgd', 'gdfgfd', '0000-00-00'),
(8, 'test15dasdaw', 'test15dasdaw', 'wowakldjsa wowakldjsa wowakldjsa wowakldjsa wowakldjsa wowakldjsa wowakldjsa wowakldjsa wowakldjsa wowakldjsa wowakldjsa wowakldjsa wowakldjsa wowakldjsa wowakldjsa wowakldjsa wowakldjsa wowakldjsa wowakldjsa wowakldjsa wowakldjsa wowakldjsa wowakldjsa wowakldjsa wowakldjsa wowakldjsa wowakldjsa ', '0000-00-00'),
(9, 'dasd', 'dasd', 'dsad', '0000-00-00'),
(10, 'sadasd', 'sadasd', 'asd', '0000-00-00'),
(11, 'sadasd', 'sadasd', 'asd', '0000-00-00'),
(12, 'sadasd', 'sadasd', 'asd', '0000-00-00'),
(13, 'sadasd', 'sadasd', 'asd', '0000-00-00'),
(14, 'sadasd', 'sadasd', 'asd', '0000-00-00'),
(15, 'sada', 'sada', 'dwad', '2019-12-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

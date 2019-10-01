-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 30, 2019 at 08:06 PM
-- Server version: 5.7.16-log
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `guitarwars`
--

CREATE TABLE `guitarwars` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(32) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `screenshot` varchar(64) DEFAULT NULL,
  `approved` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guitarwars`
--

INSERT INTO `guitarwars` (`id`, `date`, `name`, `score`, `screenshot`, `approved`) VALUES
(1, '2008-05-02 01:37:23', 'Paco Jastorius', 127650, 'pacosscore.gif', 1),
(2, '2008-05-02 01:37:02', 'Nevil Johansson', 98430, 'nevilsscore.gif', 1),
(3, '2008-05-02 01:36:45', 'Jacob Scorcherson', 389740, 'jacobsscore.gif', 1),
(4, '2008-05-02 01:36:07', 'Belita Chevy', 282470, 'belitasscore.gif', 1),
(5, '2008-05-02 01:37:40', 'Phiz Lairston', 186580, 'phizsscore.gif', 1),
(6, '2008-05-02 01:38:00', 'Kenny Lavitz', 64930, 'kennysscore.gif', 1),
(7, '2008-05-02 01:38:23', 'Jean Paul Jones', 243260, 'jeanpaulsscore.gif', 1),
(8, '2008-06-20 20:46:31', 'Owen Owens', 500, 'unverified.gif', 0),
(9, '2008-05-02 02:14:56', 'Leddy Gee', 308710, 'leddysscore.gif', 1),
(10, '2008-05-02 02:15:17', 'T-Bone Taylor', 354190, 'tbonesscore.gif', 1),
(11, '2008-06-20 20:47:29', 'Ruby Toupee', 1000, 'unverified.gif', 0),
(12, '2008-05-03 01:32:54', 'Biff Jeck', 314340, 'biffsscore.gif', 1),
(13, '2008-05-03 01:36:28', 'Pez Law', 322710, 'pezsscore.gif', 0),
(15, '2019-10-01 02:03:10', 'kirby', 1, '12.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guitarwars`
--
ALTER TABLE `guitarwars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guitarwars`
--
ALTER TABLE `guitarwars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2019 at 02:27 AM
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
-- Table structure for table `aliens_abduction`
--

CREATE TABLE `aliens_abduction` (
  `abduction_id` int(11) NOT NULL,
  `first_name` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `last_name` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `when_it_happened` date DEFAULT NULL,
  `how_long` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `how_many` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `alien_description` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `what_they_did` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `fang_spotted` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `other` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(50) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `aliens_abduction`
--

INSERT INTO `aliens_abduction` (`abduction_id`, `first_name`, `last_name`, `when_it_happened`, `how_long`, `how_many`, `alien_description`, `what_they_did`, `fang_spotted`, `other`, `email`) VALUES
(1, 'Alf', 'Nader', '2000-07-12', 'one week', 'at least 12', 'It was a big non-recyclable shiny disc full of what appeared to be mutated labor union officials.', 'Swooped down from the sky and snatched me up with no warning.', 'no', 'That\'s it.', 'ralph@nader.com'),
(2, 'Don', 'Quayle', '1991-09-14', '37 seconds', 'dunno', 'They looked like donkeys made out of metal with some kind of jet packs attached to them.', 'I was sitting there eating a baked potatoe when \"Zwoosh!\", this beam of light took me away.', 'yes', 'I really do love potatos.', 'dq@iwasvicepresident.com'),
(3, 'Rick', 'Nixon', '1969-01-21', 'nearly 4 years', 'just one', 'They were pasty and pandering, and not very forgiving.', 'Impeached me, of course, then they probed me.', 'no', 'I\'m lonely.', 'rnixon@not'),
(4, 'Belita', 'Chevy', '2008-06-21', 'almost a week', '27', 'Clumsy little buggers, had no rhythm.', 'Tried to get me to play bad music.', 'no', 'Looking forward to playing some Guitar Wars now that I\'m back.', 'belitac@rockin.net'),
(5, 'Sally', 'Jones', '2008-05-11', '1 day', 'four', 'green with six tentacles', 'We just talked and played with a dog', 'yes', 'I may have seen your dog. Contact me.', 'sally@gregs-list.net'),
(6, 'Meinhold', 'Ressner', '2008-08-10', '3 hours', 'couldn\'t tell', 'They were in a ship the size of a full moon.', 'Carried me to the top of a mountain and dropped me off.', 'no', 'Just want to thank those fellas for helping me out.', 'meinhold@icanclimbit.com'),
(7, 'Mickey', 'Mikens', '2008-07-11', '45 minutes', 'hundreds', 'Huge heads, skinny arms and legs', 'Read my mind,', 'yes', 'I\'m thinking about designing a helmet to thwart future abductions.', 'mickey@stopreadingmymind.net'),
(8, 'Shill', 'Watner', '2008-07-05', '2 hours', 'don\'t know', 'There was a bright light in the sky, followed by a bark or two.', 'They beamed me toward a gas station in the desert.', 'yes', 'I was out of gas, so it was a pretty good abduction.', 'shillwatner@imightbecaptkirk.com'),
(9, 'asda', 'sa', '2019-12-02', '23', '21', 'asda', 'adwdawdwa', 'no', 'dawdaw', 'sadsa@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aliens_abduction`
--
ALTER TABLE `aliens_abduction`
  ADD PRIMARY KEY (`abduction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aliens_abduction`
--
ALTER TABLE `aliens_abduction`
  MODIFY `abduction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2018 at 11:14 PM
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
-- Table structure for table `mismatch_user`
--

CREATE TABLE `mismatch_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(32) COLLATE latin1_general_ci DEFAULT NULL,
  `password` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  `join_date` datetime DEFAULT NULL,
  `first_name` varchar(32) COLLATE latin1_general_ci DEFAULT NULL,
  `last_name` varchar(32) COLLATE latin1_general_ci DEFAULT NULL,
  `gender` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `city` varchar(32) COLLATE latin1_general_ci DEFAULT NULL,
  `state` varchar(2) COLLATE latin1_general_ci DEFAULT NULL,
  `picture` varchar(32) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `mismatch_user`
--

INSERT INTO `mismatch_user` (`user_id`, `username`, `password`, `join_date`, `first_name`, `last_name`, `gender`, `birthdate`, `city`, `state`, `picture`) VALUES
(1, 'sidneyk', '745c52f30f82d4323292dcca9eea0aee87feecc5', '2008-06-03 14:51:46', 'Sidney', 'Kelsow', 'F', '1984-07-19', 'Tempe', 'AZ', 'sidneypic.jpg'),
(2, 'nevilj', '12a20bcb5ed139a5f3fc808704897762cbab74ec', '2008-06-03 14:52:09', 'Nevil', 'Johansson', 'M', '1973-05-13', 'Reno', 'NV', 'nevilpic.jpg'),
(3, 'alexc', '676a6666682bd41bef5fd1c1f629fa233b1307a4', '2008-06-03 14:53:05', 'Alex', 'Cooper', 'M', '1974-09-13', 'Boise', 'ID', 'alexpic.jpg'),
(4, 'sdaniels', '1ff915f2fae864032e44cbe5a6cdd858500c9df7', '2008-06-03 14:58:40', 'Susannah', 'Daniels', 'F', '1977-02-23', 'Pasadena', 'CA', 'susannahpic.jpg'),
(5, 'ethelh', '53a56acb2a52f3815a2518e75029b071c298477a', '2008-06-03 15:00:37', 'Ethel', 'Heckel', 'F', '1943-03-27', 'Wichita', 'KS', 'ethelpic.jpg'),
(6, 'oklugman', 'df00f36c0b795c30a0409778d7f9db27a970f74f', '2008-06-03 15:00:48', 'Oscar', 'Klugman', 'M', '1968-06-04', 'Providence', 'RI', 'oscarpic.jpg'),
(7, 'belitac', '7c19dd287e03ae31ce190c4043b5a7f9795c41dc', '2008-06-03 15:01:08', 'Belita', 'Chevy', 'F', '1975-07-08', 'El Paso', 'TX', 'belitapic.jpg'),
(8, 'jasonf', '3da70cd115b7c3a7cebc2b5282706f07d185de9e', '2008-06-03 15:01:19', 'Jason', 'Filmington', 'M', '1969-09-24', 'Hollywood', 'CA', 'jasonpic.jpg'),
(9, 'dierdre', '08447be571e1c113f2f175472753ca5f5af454f3', '2008-06-03 15:01:51', 'Dierdre', 'Pennington', 'F', '1970-04-26', 'Cambridge', 'MA', 'dierdrepic.jpg'),
(10, 'baldpaul', '230dcb28e2d1dc19ec14990721e85cd5c5234245', '2008-06-03 15:02:02', 'Paul', 'Hillsman', 'M', '1964-12-18', 'Charleston', 'SC', 'paulpic.jpg'),
(11, 'jnettles', 'e511d793f532dbe0e0483538e11977f7b7c33b28', '2008-06-03 15:02:13', 'Johan', 'Nettles', 'M', '1981-11-03', 'Athens', 'GA', 'johanpic.jpg'),
(12, 'rubyr', '062e4a8476b1063e05caa69958e36a905f887619', '2008-06-03 15:02:24', 'Ruby', 'Reasons', 'F', '1972-09-18', 'Conundrum', 'AZ', 'rubypic.jpg'),
(13, 'Takiyo', 'a2bcc90502334df57e081c9e7d5ac2d33cf31095', '2018-10-16 15:02:30', 'ah', 'eee', 'M', '0000-00-00', 'dsadas', 'wi', 'profile.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mismatch_user`
--
ALTER TABLE `mismatch_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mismatch_user`
--
ALTER TABLE `mismatch_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

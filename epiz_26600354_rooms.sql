-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql312.epizy.com
-- Generation Time: Mar 16, 2021 at 06:57 AM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_26600354_rooms`
--

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `sno` int(7) NOT NULL,
  `roomname` varchar(255) NOT NULL,
  `stime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`sno`, `roomname`, `stime`) VALUES
(22, 'Sayanti@2020', '2020-09-13 03:59:57'),
(21, 'him@456', '2020-09-08 23:42:07'),
(20, 'Qwert@123', '2020-09-08 05:03:47'),
(19, 'Anchit@12', '2020-09-03 09:22:45'),
(18, 'him@123', '2020-08-31 15:05:14'),
(23, 'rahul@12', '2020-10-03 03:51:09'),
(24, 'sagar@123', '2021-02-02 23:56:19'),
(25, 'AJAy@#$', '2021-02-03 23:07:33'),
(26, 'AJAy$32', '2021-02-03 23:08:04'),
(27, 'akhrup@123', '2021-02-16 06:14:59'),
(28, 'sh@12', '2021-03-08 04:20:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `sno` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

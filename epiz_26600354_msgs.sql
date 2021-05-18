-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql312.epizy.com
-- Generation Time: Mar 16, 2021 at 06:55 AM
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
-- Database: `epiz_26600354_msgs`
--

-- --------------------------------------------------------

--
-- Table structure for table `msgs`
--

CREATE TABLE `msgs` (
  `sno` int(7) NOT NULL,
  `msg` text NOT NULL,
  `room` text NOT NULL,
  `ip` varchar(255) NOT NULL,
  `stime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msgs`
--

INSERT INTO `msgs` (`sno`, `msg`, `room`, `ip`, `stime`) VALUES
(32, 'test msg', 'him@123', '157.36.79.48', '2020-08-31 15:39:57'),
(31, 'hii', 'him@123', '157.36.79.48', '2020-08-31 15:38:58'),
(30, 'sdsd', 'him@123', '157.36.79.48', '2020-08-31 15:26:39'),
(29, 'hello', 'him@123', '157.36.79.48', '2020-08-31 15:26:29'),
(28, 'dsds', 'him@123', '157.36.79.48', '2020-08-31 15:14:29'),
(27, '&lt;body&gt;', 'him@123', '157.36.79.48', '2020-08-31 15:14:06'),
(26, '123', 'him@123', '157.36.79.48', '2020-08-31 15:06:53'),
(25, 'heel', 'him@123', '157.36.79.48', '2020-08-31 15:06:34'),
(24, 'noo', 'him@123', '157.36.79.48', '2020-08-31 15:06:27'),
(23, 'hii', 'him@123', '157.36.79.48', '2020-08-31 15:05:21'),
(33, 'How are you polard', 'Anchit@12', '49.176.144.106', '2020-09-03 09:23:35'),
(34, 'I am fine', 'anchit@12', '157.36.99.69', '2020-09-03 09:23:52'),
(35, 'Jainy ki maa ki', 'Anchit@12', '49.176.144.106', '2020-09-03 09:24:06'),
(36, 'Anchit hrmi hai', 'anchit@12', '157.36.99.69', '2020-09-03 09:24:08'),
(37, 'Jjjjjjainy', 'Anchit@12', '49.176.144.106', '2020-09-03 09:24:17'),
(38, 'Hii ', 'qwert@123', '157.36.79.101', '2020-09-08 05:04:44'),
(39, 'Huh', 'Qwert@123', '169.149.193.213', '2020-09-08 05:04:53'),
(40, 'Hello', 'qwert@123', '157.36.79.101', '2020-09-08 05:05:17'),
(42, 'hi', 'him@456', '157.36.87.152', '2020-09-08 23:42:18'),
(43, 'Hi himanshu', 'him@456', '157.36.57.242', '2020-09-08 23:46:48'),
(44, 'Hi', 'Sayanti@2020', '42.110.224.133', '2020-09-13 04:00:37'),
(45, 'Hi sayanti', 'Sayanti@2020', '157.36.61.239', '2020-09-13 04:02:28'),
(46, 'Ok', 'Sayanti@2020', '42.110.224.133', '2020-09-13 04:02:35'),
(47, 'It shows ur ip and my ip, need to update with names', 'Sayanti@2020', '157.36.61.239', '2020-09-13 04:03:03'),
(48, 'hiii', 'rahul@12', '157.47.198.200', '2020-10-03 03:51:15'),
(49, 'Hello rahul', 'rahul@12', '157.36.184.196', '2020-10-03 03:52:17'),
(50, 'kese ho', 'rahul@12', '157.47.198.200', '2020-10-03 03:52:18'),
(51, 'bhai ko nai batana ki koi new project pr kam kar rha hu ', 'rahul@12', '157.47.198.200', '2020-10-03 03:52:38'),
(52, 'Bhai communication gap ajata hai khi baar bhul jata hu', 'rahul@12', '157.36.184.196', '2020-10-03 03:53:13'),
(53, 'hii ! there', 'sagar@123', '27.123.251.202', '2021-02-02 23:57:23'),
(54, 'Hii', 'sagar@123', '139.167.248.70', '2021-02-02 23:57:55'),
(55, 'Kaise ho', 'sagar@123', '139.167.248.70', '2021-02-02 23:58:11'),
(56, 'maja ma', 'sagar@123', '27.123.251.202', '2021-02-02 23:58:20'),
(57, 'Very good', 'sagar@123', '139.167.248.70', '2021-02-02 23:58:26'),
(58, 'ok bye', 'sagar@123', '27.123.251.202', '2021-02-02 23:58:39'),
(59, 'Bye', 'sagar@123', '139.167.248.70', '2021-02-02 23:58:45'),
(60, 'Hii ! There', 'AJAy$32', '27.123.251.202', '2021-02-03 23:08:39'),
(61, 'what\"s Up', 'AJAy$32', '27.123.251.202', '2021-02-04 04:00:41'),
(62, 'hey', 'AJAy$32', '27.123.251.202', '2021-02-04 04:00:51'),
(63, 'Hi Rups', 'akhrup@123', '132.154.11.36', '2021-02-16 06:17:52'),
(64, 'hlw kaddu', 'akhrup@123', '27.123.251.202', '2021-02-16 06:18:17'),
(65, 'how is ur preparation going on??', 'akhrup@123', '27.123.251.202', '2021-02-16 06:18:52'),
(66, 'hello gulati', 'sh@12', '27.123.251.202', '2021-03-08 04:21:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `msgs`
--
ALTER TABLE `msgs`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `msgs`
--
ALTER TABLE `msgs`
  MODIFY `sno` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

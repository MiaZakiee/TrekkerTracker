-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2024 at 02:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtrekkertracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblflights`
--

CREATE TABLE `tblflights` (
  `flightId` int(5) NOT NULL,
  `airline` varchar(20) NOT NULL,
  `origin` varchar(20) NOT NULL,
  `destination` varchar(20) NOT NULL,
  `departureDT` datetime(6) NOT NULL,
  `arrivalDT` datetime(6) NOT NULL,
  `seatingCapacity` int(3) NOT NULL,
  `totalPassengers` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblflights`
--

INSERT INTO `tblflights` (`flightId`, `airline`, `origin`, `destination`, `departureDT`, `arrivalDT`, `seatingCapacity`, `totalPassengers`) VALUES
(1, 'Cebpac', 'Talisay', 'Naga', '2024-04-13 00:00:00.000000', '2024-04-13 03:00:00.000000', 100, 0),
(2, 'yawa', 'Naga', 'Talisay', '2024-04-13 03:00:00.000000', '2024-04-13 06:00:00.000000', 100, 0),
(3, 'Cebpac', 'Naga', 'Hell', '2024-04-13 06:00:00.000000', '2024-04-13 09:00:00.000000', 100, 0),
(4, 'I miss you', 'Talisay', 'Hell', '2024-04-13 09:00:00.000000', '2024-04-13 12:00:00.000000', 100, 0),
(5, 'I miss you', 'Talisay', 'Hell', '2024-04-13 12:00:00.000000', '2024-04-13 15:00:00.000000', 100, 0),
(6, 'Cebpac', 'Naga', 'Talisay', '2024-04-13 15:00:00.000000', '2024-04-13 18:00:00.000000', 100, 0),
(7, 'I miss you', 'Hell', 'Naga', '2024-04-13 18:00:00.000000', '2024-04-13 21:00:00.000000', 100, 0),
(8, 'Cebpac', 'Talisay', 'Naga', '2024-04-13 21:00:00.000000', '2024-04-14 00:00:00.000000', 100, 0),
(9, 'Cebpac', 'Hell', 'Naga', '2024-04-13 00:00:00.000000', '2024-04-13 01:00:00.000000', 100, 0),
(10, 'Cebpac', 'Talisay', 'Naga', '2024-04-13 01:00:00.000000', '2024-04-13 02:00:00.000000', 100, 0),
(11, 'I miss you', 'Hell', 'Talisay', '2024-04-13 02:00:00.000000', '2024-04-13 03:00:00.000000', 100, 0),
(12, 'Cebpac', 'Naga', 'Talisay', '2024-04-13 03:00:00.000000', '2024-04-13 04:00:00.000000', 100, 0),
(13, 'I miss you', 'Naga', 'Hell', '2024-04-13 04:00:00.000000', '2024-04-13 05:00:00.000000', 100, 0),
(14, 'yawa', 'Naga', 'Talisay', '2024-04-13 05:00:00.000000', '2024-04-13 06:00:00.000000', 100, 0),
(15, 'I miss you', 'Naga', 'Talisay', '2024-04-13 06:00:00.000000', '2024-04-13 07:00:00.000000', 100, 0),
(16, 'Cebpac', 'Hell', 'Naga', '2024-04-13 07:00:00.000000', '2024-04-13 08:00:00.000000', 100, 0),
(17, 'yawa', 'Naga', 'Hell', '2024-04-13 08:00:00.000000', '2024-04-13 09:00:00.000000', 100, 0),
(18, 'I miss you', 'Talisay', 'Naga', '2024-04-13 09:00:00.000000', '2024-04-13 10:00:00.000000', 100, 0),
(19, 'I miss you', 'Hell', 'Naga', '2024-04-13 10:00:00.000000', '2024-04-13 11:00:00.000000', 100, 0),
(20, 'yawa', 'Talisay', 'Naga', '2024-04-13 11:00:00.000000', '2024-04-13 12:00:00.000000', 100, 0),
(21, 'yawa', 'Naga', 'Talisay', '2024-04-13 12:00:00.000000', '2024-04-13 13:00:00.000000', 100, 0),
(22, 'yawa', 'Naga', 'Talisay', '2024-04-13 13:00:00.000000', '2024-04-13 14:00:00.000000', 100, 0),
(23, 'Cebpac', 'Naga', 'Hell', '2024-04-13 14:00:00.000000', '2024-04-13 15:00:00.000000', 100, 0),
(24, 'yawa', 'Talisay', 'Hell', '2024-04-13 15:00:00.000000', '2024-04-13 16:00:00.000000', 100, 0),
(25, 'yawa', 'Talisay', 'Hell', '2024-04-13 16:00:00.000000', '2024-04-13 17:00:00.000000', 100, 0),
(26, 'Cebpac', 'Naga', 'Talisay', '2024-04-13 17:00:00.000000', '2024-04-13 18:00:00.000000', 100, 0),
(27, 'yawa', 'Hell', 'Naga', '2024-04-13 18:00:00.000000', '2024-04-13 19:00:00.000000', 100, 0),
(28, 'I miss you', 'Hell', 'Naga', '2024-04-13 19:00:00.000000', '2024-04-13 20:00:00.000000', 100, 0),
(29, 'I miss you', 'Hell', 'Talisay', '2024-04-13 20:00:00.000000', '2024-04-13 21:00:00.000000', 100, 0),
(30, 'yawa', 'Naga', 'Talisay', '2024-04-13 21:00:00.000000', '2024-04-13 22:00:00.000000', 100, 0),
(31, 'yawa', 'Naga', 'Talisay', '2024-04-13 22:00:00.000000', '2024-04-13 23:00:00.000000', 100, 0),
(32, 'yawa', 'Naga', 'Talisay', '2024-04-13 23:00:00.000000', '2024-04-14 00:00:00.000000', 100, 0),
(33, 'Cebpac', 'Hell', 'Naga', '2024-04-13 00:00:00.000000', '2024-04-13 04:00:00.000000', 100, 0),
(34, 'Cebpac', 'Naga', 'Talisay', '2024-04-13 04:00:00.000000', '2024-04-13 08:00:00.000000', 100, 0),
(35, 'yawa', 'Naga', 'Talisay', '2024-04-13 08:00:00.000000', '2024-04-13 12:00:00.000000', 100, 0),
(36, 'Cebpac', 'Hell', 'Naga', '2024-04-13 12:00:00.000000', '2024-04-13 16:00:00.000000', 100, 0),
(37, 'Cebpac', 'Hell', 'Talisay', '2024-04-13 16:00:00.000000', '2024-04-13 20:00:00.000000', 100, 0),
(38, 'yawa', 'Hell', 'Talisay', '2024-04-13 20:00:00.000000', '2024-04-14 00:00:00.000000', 100, 0),
(39, 'Cebpac', 'Hell', 'Naga', '2024-04-13 00:00:00.000000', '2024-04-13 04:00:00.000000', 100, 0),
(40, 'yawa', 'Talisay', 'Hell', '2024-04-13 04:00:00.000000', '2024-04-13 08:00:00.000000', 100, 0),
(41, 'yawa', 'Hell', 'Talisay', '2024-04-13 08:00:00.000000', '2024-04-13 12:00:00.000000', 100, 0),
(42, 'I miss you', 'Talisay', 'Hell', '2024-04-13 12:00:00.000000', '2024-04-13 16:00:00.000000', 100, 0),
(43, 'Cebpac', 'Naga', 'Hell', '2024-04-13 16:00:00.000000', '2024-04-13 20:00:00.000000', 100, 0),
(44, 'Cebpac', 'Naga', 'Talisay', '2024-04-13 20:00:00.000000', '2024-04-14 00:00:00.000000', 100, 0),
(45, 'yawa', 'Naga', 'Talisay', '2024-04-13 00:00:00.000000', '2024-04-13 01:00:00.000000', 100, 0),
(46, 'Cebpac', 'Hell', 'Talisay', '2024-04-13 01:00:00.000000', '2024-04-13 02:00:00.000000', 100, 0),
(47, 'Cebpac', 'Hell', 'Naga', '2024-04-13 02:00:00.000000', '2024-04-13 03:00:00.000000', 100, 0),
(48, 'yawa', 'Naga', 'Hell', '2024-04-13 03:00:00.000000', '2024-04-13 04:00:00.000000', 100, 0),
(49, 'Cebpac', 'Naga', 'Talisay', '2024-04-13 04:00:00.000000', '2024-04-13 05:00:00.000000', 100, 0),
(50, 'yawa', 'Naga', 'Talisay', '2024-04-13 05:00:00.000000', '2024-04-13 06:00:00.000000', 100, 0),
(51, 'yawa', 'Hell', 'Talisay', '2024-04-13 06:00:00.000000', '2024-04-13 07:00:00.000000', 100, 0),
(52, 'Cebpac', 'Hell', 'Talisay', '2024-04-13 07:00:00.000000', '2024-04-13 08:00:00.000000', 100, 0),
(53, 'yawa', 'Hell', 'Talisay', '2024-04-13 08:00:00.000000', '2024-04-13 09:00:00.000000', 100, 0),
(54, 'Cebpac', 'Talisay', 'Hell', '2024-04-13 09:00:00.000000', '2024-04-13 10:00:00.000000', 100, 0),
(55, 'I miss you', 'Talisay', 'Naga', '2024-04-13 10:00:00.000000', '2024-04-13 11:00:00.000000', 100, 0),
(56, 'yawa', 'Talisay', 'Hell', '2024-04-13 11:00:00.000000', '2024-04-13 12:00:00.000000', 100, 0),
(57, 'Cebpac', 'Naga', 'Hell', '2024-04-13 12:00:00.000000', '2024-04-13 13:00:00.000000', 100, 0),
(58, 'yawa', 'Talisay', 'Hell', '2024-04-13 13:00:00.000000', '2024-04-13 14:00:00.000000', 100, 0),
(59, 'I miss you', 'Hell', 'Naga', '2024-04-13 14:00:00.000000', '2024-04-13 15:00:00.000000', 100, 0),
(60, 'Cebpac', 'Naga', 'Hell', '2024-04-13 15:00:00.000000', '2024-04-13 16:00:00.000000', 100, 0),
(61, 'yawa', 'Talisay', 'Naga', '2024-04-13 16:00:00.000000', '2024-04-13 17:00:00.000000', 100, 0),
(62, 'I miss you', 'Talisay', 'Hell', '2024-04-13 17:00:00.000000', '2024-04-13 18:00:00.000000', 100, 0),
(63, 'Cebpac', 'Naga', 'Talisay', '2024-04-13 18:00:00.000000', '2024-04-13 19:00:00.000000', 100, 0),
(64, 'yawa', 'Talisay', 'Naga', '2024-04-13 19:00:00.000000', '2024-04-13 20:00:00.000000', 100, 0),
(65, 'I miss you', 'Talisay', 'Hell', '2024-04-13 20:00:00.000000', '2024-04-13 21:00:00.000000', 100, 0),
(66, 'Cebpac', 'Talisay', 'Hell', '2024-04-13 21:00:00.000000', '2024-04-13 22:00:00.000000', 100, 0),
(67, 'Cebpac', 'Talisay', 'Naga', '2024-04-13 22:00:00.000000', '2024-04-13 23:00:00.000000', 100, 0),
(68, 'Cebpac', 'Naga', 'Hell', '2024-04-13 23:00:00.000000', '2024-04-14 00:00:00.000000', 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccount`
--

CREATE TABLE `tbluseraccount` (
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `user_email` varchar(20) NOT NULL,
  `user_username` varchar(20) NOT NULL,
  `user_password` varchar(65) DEFAULT NULL,
  `user_type` enum('0','1','2','') DEFAULT '1' COMMENT '0 = Admin, 1 = User, 2 = Guest'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`account_id`, `user_email`, `user_username`, `user_password`, `user_type`) VALUES
(33, 'user@gmail.com', 'user', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbluserprofile`
--

CREATE TABLE `tbluserprofile` (
  `userid` bigint(20) UNSIGNED NOT NULL,
  `user_fname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluserprofile`
--

INSERT INTO `tbluserprofile` (`userid`, `user_fname`, `user_lname`) VALUES
(70, 'user', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblflights`
--
ALTER TABLE `tblflights`
  ADD PRIMARY KEY (`flightId`);

--
-- Indexes for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  ADD UNIQUE KEY `user_ID` (`account_id`);

--
-- Indexes for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblflights`
--
ALTER TABLE `tblflights`
  MODIFY `flightId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  MODIFY `account_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  MODIFY `userid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

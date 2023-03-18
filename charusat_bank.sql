-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2023 at 04:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `charusat_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackid` int(11) NOT NULL,
  `message` varchar(111) NOT NULL,
  `userid` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackid`, `message`, `userid`, `date`) VALUES
(10, 'hii \r\n', 57, '2023-01-02 05:31:43'),
(11, 'hii \r\n', 57, '2023-01-02 05:31:58'),
(12, 'hiiiii', 58, '2023-02-06 21:50:46');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL DEFAULT 'cashier',
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `type`, `date`) VALUES
(3, 'cashier@gmail.com', '123', 'cashier', '2022-11-10 05:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` int(100) NOT NULL,
  `type` varchar(100) NOT NULL DEFAULT 'manager',
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `email`, `password`, `type`, `date`) VALUES
(1, 'manager@manager.com', 1234, 'manager', '2022-10-07 08:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `notice` text CHARACTER SET latin1 NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `otheraccounts`
--

CREATE TABLE `otheraccounts` (
  `id` int(11) NOT NULL,
  `accountno` varchar(11) NOT NULL,
  `bankname` varchar(11) NOT NULL,
  `holdername` varchar(11) NOT NULL,
  `balance` varchar(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transactionId` int(11) NOT NULL,
  `action` varchar(50) NOT NULL,
  `credit` varchar(50) CHARACTER SET latin1 NOT NULL,
  `debit` varchar(50) NOT NULL,
  `balance` varchar(50) NOT NULL,
  `beneld` varchar(50) NOT NULL,
  `other` varchar(50) NOT NULL,
  `userid` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transactionId`, `action`, `credit`, `debit`, `balance`, `beneld`, `other`, `userid`, `date`) VALUES
(1, 'transfer', '', '2000', '', '', '1667924704', 52, '2022-11-08 16:26:17'),
(2, 'transfer', '', '5500', '', '', '1667924704', 52, '2022-11-08 16:50:56'),
(3, 'transfer', '', '5000', '', '', '1667924704', 52, '2022-11-08 16:58:58'),
(4, 'transfer', '', '500', '', '', '1667924704', 52, '2022-11-08 16:59:35'),
(5, 'transfer', '', '400', '', '', '1667924704', 52, '2022-11-08 17:00:06'),
(6, 'transfer', '', '3000', '', '', '1667924704', 52, '2022-11-08 17:09:59'),
(7, 'transfer', '', '3600', '', '', '1667924704', 52, '2022-11-08 17:10:32'),
(8, 'transfer', '', '3000', '', '', '1667924704', 53, '2022-11-08 17:33:36'),
(9, 'transfer', '', '3000', '', '', '1667489276', 53, '2022-11-08 17:35:14'),
(10, 'transfer', '', '3000', '', '', '1667966401', 54, '2022-11-09 04:02:01'),
(11, 'transfer', '', '3000', '', '', '1667966401', 55, '2022-11-09 04:05:01'),
(12, 'transfer', '', '5000', '', '', '1667966401', 55, '2022-11-09 04:06:00'),
(13, 'transfer', '', '5000', '', '', '1667966167', 55, '2022-11-09 04:11:17'),
(14, 'transfer', '', '3000', '', '', '1667966401', 54, '2022-11-09 04:17:45'),
(15, 'transfer', '', '4000', '', '', '1667966167', 55, '2022-11-09 04:19:09'),
(16, 'transfer', '', '5000', '', '', '1667966167', 54, '2022-11-09 04:19:44'),
(17, 'transfer', '', '3000', '', '', '1667966167', 54, '2022-11-09 04:20:09'),
(18, 'transfer', '', '6000', '', '', '1667966401', 54, '2022-11-09 04:36:25'),
(19, 'transfer', '', '3000', '', '', '1667966167', 55, '2022-11-09 04:50:11'),
(20, 'transfer', '', '3000', '', '', '1667971493', 55, '2022-11-09 05:27:38'),
(21, 'transfer', '', '5000', '', '', '1667966401', 56, '2022-11-09 14:24:07'),
(22, 'withdraw', '', '3000', '', '', '1', 0, '2022-11-09 15:50:04'),
(23, 'withdraw', '', '3000', '', '', '1', 0, '2022-11-09 15:50:44'),
(24, 'withdraw', '', '3000', '', '', '1', 0, '2022-11-09 15:51:25'),
(25, 'withdraw', '', '3000', '', '', '1', 0, '2022-11-09 15:51:36'),
(26, 'withdraw', '', '-4031', '', '', '1', 0, '2022-11-09 15:52:48'),
(27, 'withdraw', '', '-4031', '', '', '1', 0, '2022-11-09 15:53:14'),
(28, 'withdraw', '', '-4031', '', '', '1', 0, '2022-11-09 15:53:16'),
(29, 'withdraw', '', '500', '', '', '1', 55, '2022-11-09 15:53:25'),
(30, 'withdraw', '', '593', '', '', '15', 55, '2022-11-09 15:53:55'),
(31, 'withdraw', '', '2000', '', '', '1', 55, '2022-11-09 15:54:48'),
(32, 'deposit', '5000', '', '', '', '2', 55, '2022-11-09 15:56:33'),
(33, 'withdraw', '', '2500', '', '', '1', 55, '2022-11-09 15:58:29'),
(34, 'withdraw', '', '25', '', '', '1', 55, '2022-11-09 15:58:49'),
(35, 'withdraw', '', '7475', '', '', '', 55, '2022-11-09 16:00:46'),
(36, 'withdraw', '', '7475', '', '', '', 55, '2022-11-09 16:05:21'),
(37, 'withdraw', '', '7475', '', '', '', 55, '2022-11-09 16:06:35'),
(38, 'withdraw', '', '7475', '', '', '', 55, '2022-11-09 16:06:49'),
(39, 'deposit', '1', '', '', '', '1', 55, '2022-11-09 16:08:50'),
(40, 'withdraw', '', '3000', '', '', '1', 55, '2022-11-09 16:11:14'),
(41, 'deposit', '5000', '', '', '', '1', 55, '2022-11-09 16:29:33'),
(42, 'withdraw', '', '5000', '', '', '1', 55, '2022-11-09 16:34:15'),
(43, 'deposit', '5000', '', '', '', '1', 55, '2022-11-09 16:43:09'),
(44, 'deposit', '5000', '', '', '', '1', 55, '2022-11-09 16:43:39'),
(45, 'withdraw', '', '3000', '', '', '1', 55, '2022-11-09 16:43:52'),
(46, 'withdraw', '', '3000', '', '', '1', 55, '2022-11-09 16:44:04'),
(47, 'withdraw', '', '3000', '', '', '1', 55, '2022-11-09 16:46:49'),
(48, 'transfer', '', '5000', '', '', '1668057431', 57, '2023-01-02 05:34:29'),
(49, 'transfer', '', '5000', '', '', '1668057431', 57, '2023-02-06 21:49:02'),
(50, 'transfer', '', '4000', '', '', '1668057431', 57, '2023-02-06 21:49:51'),
(51, 'withdraw', '', '4000', '', '', '2', 59, '2023-03-18 14:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE `useraccounts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `aadhaar` varchar(15) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `profile` varchar(50) NOT NULL,
  `dob` date DEFAULT NULL,
  `accountno` int(30) NOT NULL,
  `accounttype` varchar(10) NOT NULL,
  `deposit` int(10) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`id`, `name`, `aadhaar`, `gender`, `email`, `phonenumber`, `city`, `address`, `password`, `profile`, `dob`, `accountno`, `accounttype`, `deposit`, `branch`, `occupation`, `time`) VALUES
(59, 'admin', '122225656525', 'Male', 'admin123@gmail.com', '6569556688', 'mumbai', '33, hihi society ', '1234', 'charusat_symbol.jpg', '2023-03-08', 1679149486, 'Saving', 1000, '', 'Bussiness', '2023-03-18 14:41:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otheraccounts`
--
ALTER TABLE `otheraccounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transactionId`);

--
-- Indexes for table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `otheraccounts`
--
ALTER TABLE `otheraccounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transactionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2021 at 04:39 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentId` int(11) NOT NULL,
  `departmentName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentId`, `departmentName`) VALUES
(1, 'Business Development'),
(2, 'Marketing'),
(3, 'Business Intelligence & Analytic Office'),
(4, 'Finance'),
(5, 'Call Center'),
(6, 'Sale'),
(7, 'Accounting & Commission Management'),
(8, 'Rework'),
(9, 'Compliance & Risk Management'),
(10, 'Credit'),
(11, 'Agent Service'),
(12, 'IT'),
(13, 'Management'),
(14, 'Human Resources & General Affair'),
(15, 'Warehouse & Logistic'),
(16, 'Forth Smart Digital'),
(17, 'Company Kiosks'),
(18, 'E-Commerce'),
(19, 'Revenue Assurance'),
(20, 'Forth Vending');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `userid` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `departmentName` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(150) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`userid`, `username`, `name`, `password`, `departmentName`, `phone`, `email`, `address`, `birthday`, `role`) VALUES
(20, 'Admin', 'Admin Admin', 'Admin', 'IT', '1234567890', '1234@gmail.com', NULL, NULL, 'HR'),
(22, 'Worrameth', 'Worrameth Manajit', '1234', 'IT', '0954409779', '1234@gmail.com', NULL, NULL, NULL),
(23, 'Manager', 'Manager Manager', '1234', 'Management', '1234567890', '1234@gmail.com', NULL, NULL, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `leave_main`
--

CREATE TABLE `leave_main` (
  `leaveId` int(10) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `leaveTypeId` int(10) NOT NULL,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  `leave_description` varchar(255) NOT NULL,
  `leave_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE `leave_type` (
  `leaveTypeId` int(11) NOT NULL,
  `leaveTypeName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentId`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `leave_main`
--
ALTER TABLE `leave_main`
  ADD PRIMARY KEY (`leaveId`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Indexes for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD PRIMARY KEY (`leaveTypeId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `leave_type`
--
ALTER TABLE `leave_type`
  MODIFY `leaveTypeId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

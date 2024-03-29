-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2021 at 02:42 PM
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
-- Table structure for table `air_card`
--

CREATE TABLE `air_card` (
  `acId` varchar(255) NOT NULL,
  `toolStatusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `air_card`
--

INSERT INTO `air_card` (`acId`, `toolStatusId`) VALUES
('3194103012030215', 1),
('3194103012030216', 1),
('3194103012030217', 1),
('3194103012030218', 1),
('3194103012030222', 1);

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrowId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `departmentId` int(11) NOT NULL,
  `borrowItem` varchar(255) NOT NULL,
  `borrow_date` date NOT NULL,
  `return_date` date NOT NULL,
  `toolStatusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrowId`, `userId`, `departmentId`, `borrowItem`, `borrow_date`, `return_date`, `toolStatusId`) VALUES
(35, 22, 12, '3194103012030217', '2021-06-11', '2021-06-12', 1),
(40, 22, 12, 'H4010RH0001BE', '2021-06-11', '2021-06-12', 1),
(41, 24, 12, 'H4010RH0001BV', '2021-06-10', '2021-06-11', 2),
(42, 24, 12, 'TL1J1JC000191', '2021-06-17', '2021-06-18', 2),
(43, 20, 12, 'TL1J1JC000196', '2021-06-09', '2021-06-10', 1),
(45, 35, 7, 'TL1J1C002384', '2021-06-18', '2021-06-19', 2),
(46, 35, 7, 'H4010RH0001BE', '2021-06-13', '2021-06-15', 2);

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
  `password` varchar(200) DEFAULT NULL,
  `departmentId` int(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`userid`, `username`, `name`, `password`, `departmentId`, `phone`, `email`, `role`) VALUES
(20, 'Admin', 'Admin Admin', '1234', 12, '1234567890', '1234@gmail.com', 'HR'),
(22, 'Worrameth', 'Worrameth Manajit', '1234', 12, '0954409779', '1234@gmail.com', 'Employee'),
(23, 'Manager', 'Manager Manager', '1234', 12, '1234567890', '1234@gmail.com', 'Manager'),
(24, '1234', '123 123', '1234', 12, '1234567890', '1234@gmail.com', 'Employee'),
(26, 'Worrameth123', 'Worrameth Manajiasdas', '1234', 12, '1234567890', '1234@gmail.com', 'Employee'),
(35, 'wilanda.l', 'วิลันดา  ลามอ', 'Forthsmart1', 7, '0888888888', 'wilanda_l@forthsmart.co.th', 'Employee'),
(36, 'saowakhon.k', 'เสาวคนธ์ คงถาวร', 'Forthsmart1', 7, '0888888888', 'saowakhon_k@forthsmart.co.th', 'Employee'),
(37, 'mattaneeya.r', 'มัทนียา รอดภัย', 'Forthsmart1', 7, '0888888888', 'mattaneeya.r@forthsmart.co.th', 'Employee'),
(38, 'varunee.m', 'วารุณี มณีนวล', 'Forthsmart1', 7, '0888888888', 'varunee.m@forthsmart.co.th', 'Employee'),
(39, 'sasitorn.s', 'ศศิธร แสงทอง', 'Forthsmart1', 7, '0888888888', 'sasitorn.s@forthsmart.co.th', 'Employee'),
(40, 'kanyarat.nu', 'กัญญารัตน์ หนูมาก', 'Forthsmart1', 4, '0888888888', 'kanyarat.nu@forthsmart.co.th', 'Employee'),
(41, 'watchara.p', 'วัชระ เพ็งหอม', 'Forthsmart1', 4, '0888888888', 'watchara_p@forthsmart.co.th', 'Employee'),
(42, 'rata.c', 'รตา จันทร์คำ', 'Forthsmart1', 4, '0888888888', 'rata.c@forthsmart.co.th', 'Employee'),
(43, 'nanthikan.s', 'นันทิกานต์ แซ่เติ๋น', 'Forthsmart1', 4, '0888888888', 'nanthikan.s@forthsmart.co.th', 'Employee'),
(44, 'pakamas.a', 'ผกามาศ อัสสเมธี', 'Forthsmart1', 4, '0888888888', 'pakamas_a@forthsmart.co.th', 'Employee'),
(45, 'jirawan.p', 'จิรวรรณ ปานจันทร์', 'Forthsmart1', 11, '0888888888', 'jirawan.p@forthsmart.co.th', 'Employee'),
(46, 'waravut.s', 'วราวุฒิ สิงห์เชื้อ', 'Forthsmart1', 11, '0888888888', 'waravut_s@forthsmart.co.th', 'Employee'),
(47, 'phedcharad.p', 'เพชรรัตน์ โพธิทากุล', 'Forthsmart1', 11, '0888888888', 'phedcharad.p@forthsmart.co.th', 'Employee'),
(48, 'thatsin.d', 'ทรรศิน ดำมุสิก', 'Forthsmart1', 11, '0888888888', 'thatsin.d@forthsmart.co.th', 'Employee'),
(49, 'sedthawut.m', 'เสฎฐวุฒิ มิลินทสูต', 'Forthsmart1', 11, '0888888888', 'sedthawut.m@forthsmart.co.th', 'Employee'),
(50, 'weerayut.s', 'วีรยุทธ สุกใส', 'Forthsmart1', 12, '0888888888', 'weerayut.s@forthsmart.co.th', 'Employee'),
(51, 'peerapong.k', 'พีรพงศ์ กุลกาญจนรัตน์', 'Forthsmart1', 12, '0888888888', 'peerapong.k@forthsmart.co.th', 'Employee'),
(52, 'augson.t', 'อักษร ตงบุญชัย', 'Forthsmart1', 12, '0888888888', 'augson.t@forthsmart.co.th', 'Employee'),
(53, 'ananya.l', 'อนัญญา ลภัสธรวรภร', 'Forthsmart1', 12, '0888888888', 'ananya.l@forthsmart.co.th', 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `headphones`
--

CREATE TABLE `headphones` (
  `hpId` varchar(255) NOT NULL,
  `toolStatusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `headphones`
--

INSERT INTO `headphones` (`hpId`, `toolStatusId`) VALUES
('H4010RH00017F', 1),
('H4010RH0001BE', 2),
('H4010RH0001BS', 1),
('H4010RH0001BV', 2),
('H4010RH0001BW', 1);

-- --------------------------------------------------------

--
-- Table structure for table `leave_main`
--

CREATE TABLE `leave_main` (
  `leaveId` int(11) NOT NULL,
  `userid` int(50) NOT NULL,
  `leaveTypeId` int(10) NOT NULL,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  `leave_description` varchar(255) NOT NULL,
  `leaveStatusId` int(11) NOT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_main`
--

INSERT INTO `leave_main` (`leaveId`, `userid`, `leaveTypeId`, `leave_from`, `leave_to`, `leave_description`, `leaveStatusId`, `note`) VALUES
(10, 22, 2, '2021-06-12', '2021-06-15', 'ไม่สบายงับบบบ', 3, 'ไม่อนุมัติ เนื่องจาก ไม่รู้'),
(11, 24, 1, '2021-06-29', '2021-06-30', 'ไม่สุบัยง่าาาาา', 1, NULL),
(12, 20, 2, '2021-06-03', '2021-06-05', 'ลาหยุด', 1, NULL),
(13, 26, 1, '2021-06-02', '2021-06-03', 'ลาป่วยยยยย', 2, NULL),
(14, 22, 2, '2021-06-04', '2021-06-05', '12345', 2, 'อนุมัติ'),
(19, 20, 2, '2021-06-07', '2021-06-08', '123455555', 1, NULL),
(22, 22, 2, '2021-06-09', '2021-06-10', 'ง่วง', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leave_status`
--

CREATE TABLE `leave_status` (
  `leaveStatusId` int(11) NOT NULL,
  `leaveStatusName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_status`
--

INSERT INTO `leave_status` (`leaveStatusId`, `leaveStatusName`) VALUES
(1, 'รออนุมัติ'),
(2, 'อนุมัติ'),
(3, 'ไม่อนุมัติ');

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE `leave_type` (
  `leaveTypeId` int(11) NOT NULL,
  `leaveTypeName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`leaveTypeId`, `leaveTypeName`) VALUES
(1, 'ลาป่วย'),
(2, 'ลาหยุด');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `newsId` int(1) NOT NULL,
  `headline` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `upload_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`newsId`, `headline`, `image`, `filename`, `upload_time`) VALUES
(11, 'หัวข้อที่หนึ่ง', 'Capture.PNG', 'ROS.pdf', '2021-06-12 15:28:32'),
(12, 'หัวข้อที่สอง', 'Capture.PNG', 'Python_Exam_WD.pdf', '2021-06-12 16:08:00'),
(13, 'หัวข้อที่สาม', 'van.jpg', 'Python_Exam_WD.pdf', '2021-06-12 16:08:11');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleId` int(11) NOT NULL,
  `roleName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleId`, `roleName`) VALUES
(1, 'Employee'),
(2, 'HR'),
(3, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `tool_status`
--

CREATE TABLE `tool_status` (
  `toolStatusId` int(11) NOT NULL,
  `toolStatusName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tool_status`
--

INSERT INTO `tool_status` (`toolStatusId`, `toolStatusName`) VALUES
(1, 'สำรอง'),
(2, 'กำลังใช้งาน');

-- --------------------------------------------------------

--
-- Table structure for table `wireless`
--

CREATE TABLE `wireless` (
  `wrId` varchar(255) NOT NULL,
  `toolStatusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wireless`
--

INSERT INTO `wireless` (`wrId`, `toolStatusId`) VALUES
('TL1J1C002384', 2),
('TL1J1JC000191', 2),
('TL1J1JC000195', 1),
('TL1J1JC000196', 1),
('TL1J1JC000200', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `air_card`
--
ALTER TABLE `air_card`
  ADD PRIMARY KEY (`acId`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrowId`);

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
-- Indexes for table `headphones`
--
ALTER TABLE `headphones`
  ADD PRIMARY KEY (`hpId`);

--
-- Indexes for table `leave_main`
--
ALTER TABLE `leave_main`
  ADD PRIMARY KEY (`leaveId`);

--
-- Indexes for table `leave_status`
--
ALTER TABLE `leave_status`
  ADD PRIMARY KEY (`leaveStatusId`);

--
-- Indexes for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD PRIMARY KEY (`leaveTypeId`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsId`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `tool_status`
--
ALTER TABLE `tool_status`
  ADD PRIMARY KEY (`toolStatusId`);

--
-- Indexes for table `wireless`
--
ALTER TABLE `wireless`
  ADD PRIMARY KEY (`wrId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrowId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `leave_main`
--
ALTER TABLE `leave_main`
  MODIFY `leaveId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `leave_status`
--
ALTER TABLE `leave_status`
  MODIFY `leaveStatusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leave_type`
--
ALTER TABLE `leave_type`
  MODIFY `leaveTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `newsId` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tool_status`
--
ALTER TABLE `tool_status`
  MODIFY `toolStatusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

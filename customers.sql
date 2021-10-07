-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2021 at 10:58 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customers`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CUSTOMER_ID` int(9) NOT NULL,
  `CREATE_DATE` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `TIME` time NOT NULL,
  `AMOUNT` float NOT NULL,
  `JOB` varchar(255) NOT NULL,
  `EQUIPMENT` varchar(255) NOT NULL,
  `USER` varchar(255) NOT NULL,
  `DEALER` varchar(255) NOT NULL,
  `WE` varchar(255) NOT NULL DEFAULT 'Azza',
  `SUPPLIER` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUSTOMER_ID`, `CREATE_DATE`, `TIME`, `AMOUNT`, `JOB`, `EQUIPMENT`, `USER`, `DEALER`, `WE`, `SUPPLIER`) VALUES
(7, '2021/10/14', '15:15:00', 54321.2, 'ประชุมออนไลน์', 'Server-Linux', 'ร้านค้า', 'เจริญชัยมาเก็ตติ้ง', 'Azza', 'LG'),
(9, '2021/10/20', '16:16:00', 1.2, 'แข่งACM', 'PC RAM8GB 10 เครื่อง', 'มหาวิทยาลัย', 'เจริญชัยมาเก็ตติ้ง', 'Azza', 'LG'),
(11, '2021/12/30', '18:30:00', 1.5, 'แข่งเขียนโปรแกรม', 'AT-MEGA8BIT', 'โรงแรม', 'เอสเอ็นไอที', 'Azza', 'HISENSE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_groupcode`
--

CREATE TABLE `tbl_master_groupcode` (
  `ID` int(9) NOT NULL,
  `TYPE` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `REMARK` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_master_groupcode`
--

INSERT INTO `tbl_master_groupcode` (`ID`, `TYPE`, `NAME`, `REMARK`) VALUES
(1, 'USER', 'โรงเรียน', NULL),
(2, 'USER', 'มหาวิทยาลัย', NULL),
(3, 'USER', 'โรงพยาบาล', NULL),
(4, 'DEALER', 'เอสเอ็นไอที', NULL),
(5, 'DEALER', 'เจริญชัยมาเก็ตติ้ง', NULL),
(6, 'DEALER', 'ไอเอ็มไอ', NULL),
(7, 'USER', 'โรงแรม', NULL),
(8, 'USER', 'ร้านค้า', NULL),
(9, 'USER', 'บริษัท/ห้าง/เอกชน', NULL),
(10, 'USER', 'บุคคลทั่วไป', NULL),
(12, 'USER', 'ราชการ', NULL),
(13, 'SUPPLIER', 'LG', NULL),
(14, 'SUPPLIER', 'HISENSE', NULL),
(16, 'SUPPLIER', 'MDEC', NULL),
(17, 'SUPPLIER', 'VST', NULL),
(18, 'SUPPLIER', 'SIS', NULL),
(19, 'SUPPLIER', 'INGRAM', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUSTOMER_ID`);

--
-- Indexes for table `tbl_master_groupcode`
--
ALTER TABLE `tbl_master_groupcode`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CUSTOMER_ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_master_groupcode`
--
ALTER TABLE `tbl_master_groupcode`
  MODIFY `ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

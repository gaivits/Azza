-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2021 at 08:32 AM
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
  `REF_NO` varchar(255) NOT NULL,
  `CUSTOMER_ID` int(10) NOT NULL,
  `CREATE_DATE` varchar(255) NOT NULL,
  `TIME` varchar(255) NOT NULL,
  `AMOUNT` float NOT NULL,
  `PROJECT` varchar(255) NOT NULL,
  `EQUIPMENT` varchar(255) NOT NULL,
  `USER` varchar(255) NOT NULL,
  `UNIT` varchar(255) DEFAULT NULL,
  `BRANDNAME` varchar(255) NOT NULL,
  `SERIES` varchar(255) NOT NULL,
  `LOGO` varchar(255) DEFAULT NULL,
  `PROVINCE` varchar(255) NOT NULL,
  `DISTRICT` varchar(255) NOT NULL,
  `SUBDISTRICT` varchar(255) NOT NULL,
  `ZIPCODE` varchar(5) NOT NULL,
  `CONTACT` varchar(255) NOT NULL,
  `DEPARTMENT` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `PHONE` varchar(10) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `DEALER` varchar(255) NOT NULL,
  `WE` varchar(255) NOT NULL DEFAULT 'Azza',
  `SUPPLIER` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`REF_NO`, `CUSTOMER_ID`, `CREATE_DATE`, `TIME`, `AMOUNT`, `PROJECT`, `EQUIPMENT`, `USER`, `UNIT`, `BRANDNAME`, `SERIES`, `LOGO`, `PROVINCE`, `DISTRICT`, `SUBDISTRICT`, `ZIPCODE`, `CONTACT`, `DEPARTMENT`, `NAME`, `PHONE`, `EMAIL`, `DEALER`, `WE`, `SUPPLIER`) VALUES
('211127', 1, '21/11/27', '17:30', 10.01, 'job0', 'job0', 'มหาวิทยาลัย', NULL, 'HISENSE', 'VDO-WALL', '1.8mm 55L18H5K', '5พระนครศรีอยุธยา', '74พระนครศรีอยุธยา', '140101ประตูชัย', '13000', 'หน่อง', 'HR', 'นิกร', '0245504748', 'hhh@yahoos.com', 'เจริญชัยมาเก็ตติ้ง', 'Azza', 'MDEC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD UNIQUE KEY `PK` (`CUSTOMER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CUSTOMER_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

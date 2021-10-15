-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2021 at 08:26 AM
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
  `CREATE_DATE` varchar(255) NOT NULL,
  `TIME` varchar(255) NOT NULL,
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
(1, '2021/10/02', '12:05', 0.04, 'ประชุมออนไลน์', 'PC10ea', 'โรงเรียน', 'เอสเอ็นไอที', 'Azza', 'MDEC'),
(2, '2021/10/12', '15:30', 0.04, 'แข่งACM', 'SERVER10ea', 'มหาวิทยาลัย', 'เอสเอ็นไอที', 'Azza', 'MDEC'),
(3, '2021/11/30', '15:43', 15.3, 'hello', 'Linux', 'โรงเรียน', 'เอสเอ็นไอที', 'Azza', 'HISENSE'),
(4, '2021/10/27', '22:05', 15.5, 'hello', 'Fedora', 'โรงเรียน', 'ไอเอ็มไอ', 'Azza', 'LG'),
(5, '2021/10/28', '07:30', 3.25, 'ประชุมโรงเรียน', 'ubuntu', 'มหาวิทยาลัย', 'ไอเอ็มไอ', 'Azza', 'MDEC'),
(6, '2021/10/29', '08:00', 3.25, 'ประชุมโรงงาน', 'lubuntu', 'โรงเรียน', 'เอสเอ็นไอที', 'Azza', 'HISENSE'),
(7, '2021/10/30', '09:00', 4.25, 'ประชุมโรงครัว', 'mint', 'โรงเรียน', 'ไอเอ็มไอ', 'Azza', 'VST'),
(8, '2021/10/02', '05:30', 4.25, 'ประชุมโรงฆ่าสัตว์', 'Arch', 'โรงพยาบาล', 'เอสเอ็นไอที', 'Azza', 'INGRAM'),
(9, '2021/10/15', '03:30', 5.25, 'ประชุมโรงเลี้ยง', 'Biotonic', 'ราชการ', 'เอสเอ็นไอที', 'Azza', 'LG'),
(10, '2021/10/02', '20:00', 5.25, 'ประชุมโรงไม้', 'Cent', 'บุคคลทั่วไป', 'เจริญชัยมาเก็ตติ้ง', 'Azza', 'HISENSE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUSTOMER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CUSTOMER_ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

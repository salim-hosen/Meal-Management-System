-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2021 at 05:31 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_meal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `adlogId` int(11) NOT NULL,
  `adminUsername` varchar(255) DEFAULT NULL,
  `adminPass` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`adlogId`, `adminUsername`, `adminPass`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `bazar_date`
--

CREATE TABLE `bazar_date` (
  `bdId` int(11) NOT NULL,
  `bdName` varchar(255) DEFAULT NULL,
  `bDate` varchar(255) DEFAULT NULL,
  `bdStatus` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bazar_date`
--

INSERT INTO `bazar_date` (`bdId`, `bdName`, `bDate`, `bdStatus`) VALUES
(1, 'Buniwad Hasan', '1-01-2018', 1),
(2, 'Rakib Hasan', '2-01-2018', 2),
(3, 'Hasan Haider', '3-01-2018', 2),
(4, 'Arifur Jaman', '4-01-2018', 2),
(5, '', '5-01-2018', 0),
(6, '', '6-01-2018', 0),
(7, '', '7-01-2018', 0),
(8, '', '8-01-2018', 0),
(9, '', '9-01-2018', 0),
(10, '', '10-01-2018', 0),
(11, '', '11-01-2018', 0),
(12, '', '12-01-2018', 0),
(13, '', '13-01-2018', 0),
(14, '', '14-01-2018', 0),
(15, '', '15-01-2018', 0),
(16, '', '16-01-2018', 0),
(17, '', '17-01-2018', 0),
(18, '', '18-01-2018', 0),
(19, '', '19-01-2018', 0),
(20, '', '20-01-2018', 0),
(21, '', '21-01-2018', 0),
(22, '', '22-01-2018', 0),
(23, '', '23-01-2018', 0),
(24, '', '24-01-2018', 0),
(25, '', '25-01-2018', 0),
(26, '', '26-01-2018', 0),
(27, '', '27-01-2018', 0),
(28, '', '28-01-2018', 0),
(29, '', '29-01-2018', 0),
(30, '', '30-01-2018', 0),
(31, '', '31-01-2018', 0);

-- --------------------------------------------------------

--
-- Table structure for table `meal_off`
--

CREATE TABLE `meal_off` (
  `offID` int(11) NOT NULL,
  `memId` int(11) DEFAULT NULL,
  `startDate` varchar(255) DEFAULT NULL,
  `endDate` varchar(255) DEFAULT NULL,
  `startPeriod` varchar(255) DEFAULT NULL,
  `endPeriod` varchar(255) DEFAULT NULL,
  `offStatus` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meal_tbl`
--

CREATE TABLE `meal_tbl` (
  `mealId` int(11) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `memID_19` varchar(255) DEFAULT NULL,
  `memID_20` varchar(255) DEFAULT NULL,
  `memID_21` varchar(255) DEFAULT NULL,
  `memID_23` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal_tbl`
--

INSERT INTO `meal_tbl` (`mealId`, `date`, `memID_19`, `memID_20`, `memID_21`, `memID_23`) VALUES
(7, '2018-01-13', '2.5', '2.5', '1', NULL),
(6, '2018-01-12', '2', '2.5', '1.5', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bazar`
--

CREATE TABLE `tbl_bazar` (
  `bazId` int(11) NOT NULL,
  `bName` varchar(255) DEFAULT NULL,
  `bDate` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bazar`
--

INSERT INTO `tbl_bazar` (`bazId`, `bName`, `bDate`, `image`, `amount`) VALUES
(3, 'Mohammad Hosen', '2018-01-11', '19aa8c901a.jpg', 1200.00),
(4, 'Hasan Ahmed', '2018-01-11', 'b3cb089519.jpg', 1500.00),
(5, 'Sabuj Ahmed', '2018-01-12', '5b2e63b70c.jpg', 3000.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deposit`
--

CREATE TABLE `tbl_deposit` (
  `depId` int(11) NOT NULL,
  `uName` varchar(255) DEFAULT NULL,
  `depDate` varchar(255) DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_deposit`
--

INSERT INTO `tbl_deposit` (`depId`, `uName`, `depDate`, `amount`) VALUES
(9, 'Rakib Hasan', '2018-01-14', 2000.00),
(8, 'Hasan Haider', '2018-01-14', 2000.00),
(7, 'Sabuj Ahmed', '2018-01-12', 5000.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members`
--

CREATE TABLE `tbl_members` (
  `memId` int(11) NOT NULL,
  `memName` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_members`
--

INSERT INTO `tbl_members` (`memId`, `memName`) VALUES
(23, 'Arifur Jaman'),
(21, 'Hasan Haider'),
(20, 'Buniwad Hasan'),
(19, 'Rakib Hasan');

-- --------------------------------------------------------

--
-- Table structure for table `usr_reg`
--

CREATE TABLE `usr_reg` (
  `regId` int(11) NOT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `rePass` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usr_reg`
--

INSERT INTO `usr_reg` (`regId`, `userName`, `fullName`, `email`, `phone`, `pass`, `rePass`) VALUES
(1, 'salim', 'salim hosen', 'salimhosen19@gmail.com', '01762473884', '60761a77524cbadf993a9ba56748fbef', '60761a77524cbadf993a9ba56748fbef'),
(3, 'hasan', 'hasan haider', 'hasan@gmail.com', '01768389292', 'f690d3b8d4b51c1f189d886b7bab26b7', 'f690d3b8d4b51c1f189d886b7bab26b7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`adlogId`);

--
-- Indexes for table `bazar_date`
--
ALTER TABLE `bazar_date`
  ADD PRIMARY KEY (`bdId`);

--
-- Indexes for table `meal_off`
--
ALTER TABLE `meal_off`
  ADD PRIMARY KEY (`offID`);

--
-- Indexes for table `meal_tbl`
--
ALTER TABLE `meal_tbl`
  ADD PRIMARY KEY (`mealId`);

--
-- Indexes for table `tbl_bazar`
--
ALTER TABLE `tbl_bazar`
  ADD PRIMARY KEY (`bazId`);

--
-- Indexes for table `tbl_deposit`
--
ALTER TABLE `tbl_deposit`
  ADD PRIMARY KEY (`depId`);

--
-- Indexes for table `tbl_members`
--
ALTER TABLE `tbl_members`
  ADD PRIMARY KEY (`memId`);

--
-- Indexes for table `usr_reg`
--
ALTER TABLE `usr_reg`
  ADD PRIMARY KEY (`regId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `adlogId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bazar_date`
--
ALTER TABLE `bazar_date`
  MODIFY `bdId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `meal_off`
--
ALTER TABLE `meal_off`
  MODIFY `offID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meal_tbl`
--
ALTER TABLE `meal_tbl`
  MODIFY `mealId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_bazar`
--
ALTER TABLE `tbl_bazar`
  MODIFY `bazId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_deposit`
--
ALTER TABLE `tbl_deposit`
  MODIFY `depId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `memId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `usr_reg`
--
ALTER TABLE `usr_reg`
  MODIFY `regId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

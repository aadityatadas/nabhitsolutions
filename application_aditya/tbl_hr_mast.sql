-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 16, 2018 at 10:05 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hr_mast`
--

DROP TABLE IF EXISTS `tbl_hr_mast`;
CREATE TABLE IF NOT EXISTS `tbl_hr_mast` (
  `hr_id` int(10) NOT NULL AUTO_INCREMENT,
  `hr_staff` varchar(150) NOT NULL,
  `hr_empcode` varchar(20) NOT NULL,
  `hr_desig` varchar(100) NOT NULL,
  `hr_dept` varchar(100) NOT NULL,
  `hr_datej` varchar(20) NOT NULL,
  `hr_ctstat` varchar(50) NOT NULL,
  `hr_ctstat_det` varchar(15) NOT NULL,
  `hr_recd` varchar(100) NOT NULL,
  PRIMARY KEY (`hr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

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
-- Table structure for table `tbl_hr_indic`
--

DROP TABLE IF EXISTS `tbl_hr_indic`;
CREATE TABLE IF NOT EXISTS `tbl_hr_indic` (
  `hr_id` int(10) NOT NULL AUTO_INCREMENT,
  `hrid` varchar(11) NOT NULL,
  `hr_absent` varchar(20) NOT NULL,
  `hr_satis_score` varchar(20) NOT NULL,
  `hr_occpany` varchar(200) NOT NULL,
  `hr_need_inj` varchar(200) NOT NULL,
  `hr_tottrain` varchar(100) NOT NULL,
  `hr_perf_score` varchar(50) NOT NULL,
  `hr_per_file` varchar(50) NOT NULL,
  `hr_health_chk` varchar(50) NOT NULL,
  `hr_griv` varchar(50) NOT NULL,
  `hr_immune` varchar(50) NOT NULL,
  `hr_recd` varchar(100) NOT NULL,
  PRIMARY KEY (`hr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

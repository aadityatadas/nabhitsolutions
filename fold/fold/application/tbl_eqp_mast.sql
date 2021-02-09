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
-- Table structure for table `tbl_eqp_mast`
--

DROP TABLE IF EXISTS `tbl_eqp_mast`;
CREATE TABLE IF NOT EXISTS `tbl_eqp_mast` (
  `eqp_id` int(10) NOT NULL AUTO_INCREMENT,
  `eqp_name` varchar(150) NOT NULL,
  `eqp_type` varchar(50) NOT NULL,
  `eqp_idno` varchar(50) NOT NULL,
  `eqp_srno` varchar(50) NOT NULL,
  `eqp_model` varchar(100) NOT NULL,
  `eqp_make` varchar(100) NOT NULL,
  `eqp_dtpur` varchar(20) NOT NULL,
  `eqp_dtins` varchar(20) NOT NULL,
  `eqp_wty1` varchar(20) NOT NULL,
  `eqp_wty2` varchar(20) NOT NULL,
  `eqp_recd` varchar(100) NOT NULL,
  PRIMARY KEY (`eqp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

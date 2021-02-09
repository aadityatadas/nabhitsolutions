-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 29, 2018 at 01:41 AM
-- Server version: 5.7.21
-- PHP Version: 7.0.29

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
  `eqpid` int(10) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`eqpid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_eqp_mast`
--

INSERT INTO `tbl_eqp_mast` (`eqpid`, `eqp_name`, `eqp_type`, `eqp_idno`, `eqp_srno`, `eqp_model`, `eqp_make`, `eqp_dtpur`, `eqp_dtins`, `eqp_wty1`, `eqp_wty2`, `eqp_recd`) VALUES
(1, 'sdfdsfdsf', 'Critical', '3223231', 'fdgfg 65456465', 'dsfds', 'sdjfhdskf sdjfhdfjd sdfd', '2017-10-25', '2018-10-24', '2017-11-01', '2018-11-01', 'admin'),
(2, 'sdasdasdsd', 'Critical', 'asdsadasd', '232132132', 'as232', 'aadADad', '2018-11-01', '2018-11-02', '2018-11-01', '2019-11-01', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

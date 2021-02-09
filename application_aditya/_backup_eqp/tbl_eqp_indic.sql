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
-- Table structure for table `tbl_eqp_indic`
--

DROP TABLE IF EXISTS `tbl_eqp_indic`;
CREATE TABLE IF NOT EXISTS `tbl_eqp_indic` (
  `eqp_id` int(10) NOT NULL AUTO_INCREMENT,
  `eqpid` varchar(11) NOT NULL,
  `eqp_brkdwn_date` varchar(15) NOT NULL,
  `eqp_amcs` varchar(50) NOT NULL,
  `eqp_amc1` varchar(20) NOT NULL,
  `eqp_amc2` varchar(20) NOT NULL,
  `eqp_psch1` varchar(20) NOT NULL,
  `eqp_psch2` varchar(20) NOT NULL,
  `eqp_psch3` varchar(20) NOT NULL,
  `eqp_psch4` varchar(20) NOT NULL,
  `eqp_csch1` varchar(20) NOT NULL,
  `eqp_csch2` varchar(20) NOT NULL,
  `eqp_brkd` varchar(100) NOT NULL,
  `eqp_dtbr` varchar(15) NOT NULL,
  `eqp_tmbr` varchar(15) NOT NULL,
  `eqp_dtrp` varchar(20) NOT NULL,
  `eqp_tmrp` varchar(15) NOT NULL,
  `eqp_cond` varchar(50) NOT NULL,
  `eqp_lic` varchar(50) NOT NULL,
  `eqp_recd` varchar(100) NOT NULL,
  PRIMARY KEY (`eqp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_eqp_indic`
--

INSERT INTO `tbl_eqp_indic` (`eqp_id`, `eqpid`, `eqp_brkdwn_date`, `eqp_amcs`, `eqp_amc1`, `eqp_amc2`, `eqp_psch1`, `eqp_psch2`, `eqp_psch3`, `eqp_psch4`, `eqp_csch1`, `eqp_csch2`, `eqp_brkd`, `eqp_dtbr`, `eqp_tmbr`, `eqp_dtrp`, `eqp_tmrp`, `eqp_cond`, `eqp_lic`, `eqp_recd`) VALUES
(1, '1', '2018-10-21', 'Yes', '2018-10-01', '2018-12-31', '2018-10-21', '', '', '', '2018-10-21', '', 'Corrective maintenance', '2018-11-21', '08:00', '2018-11-21', '08:15', 'No', 'No', 'admin'),
(2, '2', '2018-11-21', 'No', '', '', '', '', '', '', '', '', 'Risk-based maintenance', '2018-11-21', '10:00', '2018-11-21', '12:27', 'No', 'No', 'admin'),
(3, '1', '2018-11-21', '', '', '', '', '', '', '', '', '', 'Preventive maintenance', '2018-11-21', '11:55', '2018-11-21', '12:45', 'Yes', 'Yes', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

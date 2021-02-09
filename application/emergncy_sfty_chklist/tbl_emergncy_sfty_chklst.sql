-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2019 at 05:43 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

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
-- Table structure for table `tbl_emergncy_sfty_chklst`
--

CREATE TABLE `tbl_emergncy_sfty_chklst` (
  `emergncy_sfty_chklst_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `sign` varchar(100) DEFAULT NULL,
  `date1` varchar(50) DEFAULT NULL,
  `time1` varchar(50) DEFAULT NULL,
  
 `emergncy_codes_numbers_yn`   varchar(50) DEFAULT NULL,
`emergncy_codes_numbers_loc`   varchar(50) DEFAULT NULL,
`emergncy_codes_numbers_rmrk`   varchar(255) DEFAULT NULL,
`roles_emrgy_cards_yn`   varchar(50) DEFAULT NULL,
`roles_emrgy_cards_loc`   varchar(50) DEFAULT NULL,
`roles_emrgy_cards_rmrk`   varchar(255) DEFAULT NULL,
`emergncy_code_alarm_yn`   varchar(50) DEFAULT NULL,
`emergncy_code_alarm_loc`   varchar(50) DEFAULT NULL,
`emergncy_code_alarm_rmrk`   varchar(255) DEFAULT NULL,
`mock_drills_check_yn`   varchar(50) DEFAULT NULL,
`mock_drills_check_loc`   varchar(50) DEFAULT NULL,
`mock_drills_check_rmrk`   varchar(255) DEFAULT NULL,
`emergncy_equipment_chklst_yn`   varchar(50) DEFAULT NULL,
`emergncy_equipment_chklst_loc`   varchar(50) DEFAULT NULL,
`emergncy_equipment_chklst_rmrk`   varchar(255) DEFAULT NULL

 
  


) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_emergncy_sfty_chklst`
--
ALTER TABLE `tbl_emergncy_sfty_chklst`
  ADD PRIMARY KEY (`emergncy_sfty_chklst_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_emergncy_sfty_chklst`
--
ALTER TABLE `tbl_emergncy_sfty_chklst`
  MODIFY `emergncy_sfty_chklst_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

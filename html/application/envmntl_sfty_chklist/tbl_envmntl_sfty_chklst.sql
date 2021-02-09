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
-- Table structure for table `tbl_envmntl_sfty_chklst`
--

CREATE TABLE `tbl_envmntl_sfty_chklst` (
  `envmntl_sfty_chklst_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `sign` varchar(100) DEFAULT NULL,
  `date1` varchar(50) DEFAULT NULL,
  `time1` varchar(50) DEFAULT NULL,
  
  `object_can_harm_yn`   varchar(50) DEFAULT NULL,
`object_can_harm_loc`   varchar(50) DEFAULT NULL,
`object_can_harm_rmrk`   varchar(255) DEFAULT NULL,
`staircase_and_bulding_safe_yn`   varchar(50) DEFAULT NULL,
`staircase_and_bulding_safe_loc`   varchar(50) DEFAULT NULL,
`staircase_and_bulding_safe_rmrk`   varchar(255) DEFAULT NULL,
`terraces_shall_locked_secured_yn`   varchar(50) DEFAULT NULL,
`terraces_shall_locked_secured_loc`   varchar(50) DEFAULT NULL,
`terraces_shall_locked_secured_rmrk`   varchar(255) DEFAULT NULL,
`wanter_tanks_secured_looked_yn`   varchar(50) DEFAULT NULL,
`wanter_tanks_secured_looked_loc`   varchar(50) DEFAULT NULL,
`wanter_tanks_secured_looked_rmrk`   varchar(255) DEFAULT NULL,
`glasses_securd_head_yn`   varchar(50) DEFAULT NULL,
`glasses_securd_head_loc`   varchar(50) DEFAULT NULL,
`glasses_securd_head_rmrk`   varchar(255) DEFAULT NULL,
`bulding_secured_design_yn`   varchar(50) DEFAULT NULL,
`bulding_secured_design_loc`   varchar(50) DEFAULT NULL,
`bulding_secured_design_rmrk`   varchar(255) DEFAULT NULL,
`hospital_building_permission_yn`   varchar(50) DEFAULT NULL,
`hospital_building_permission_loc`   varchar(50) DEFAULT NULL,
`hospital_building_permission_rmrk`   varchar(255) DEFAULT NULL,
`lift_shall_licensed_mantained_yn`   varchar(50) DEFAULT NULL,
`lift_shall_licensed_mantained_loc`   varchar(50) DEFAULT NULL,
`lift_shall_licensed_mantained_rmrk`   varchar(255) DEFAULT NULL

 
  


) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_envmntl_sfty_chklst`
--
ALTER TABLE `tbl_envmntl_sfty_chklst`
  ADD PRIMARY KEY (`envmntl_sfty_chklst_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_envmntl_sfty_chklst`
--
ALTER TABLE `tbl_envmntl_sfty_chklst`
  MODIFY `envmntl_sfty_chklst_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

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
-- Table structure for table `tbl_fire_sfty_chklst`
--

CREATE TABLE `tbl_fire_sfty_chklst` (
  `fire_sfty_chklst_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `sign` varchar(100) DEFAULT NULL,
  `date1` varchar(50) DEFAULT NULL,
  `time1` varchar(50) DEFAULT NULL,
  
  `fire_noc_updted_yn`   varchar(50) DEFAULT NULL,
  `fire_noc_updted_loc`   varchar(50) DEFAULT NULL,
`fire_noc_updted_rmrk`   varchar(255) DEFAULT NULL,
   `fire_extg_rifled_yn`   varchar(50) DEFAULT NULL,
  `fire_extg_rifled_loc`   varchar(50) DEFAULT NULL,
`fire_extg_rifled_rmrk`   varchar(255) DEFAULT NULL,
`fire_hose_wrking_yn`   varchar(50) DEFAULT NULL,
`fire_hose_wrking_loc`   varchar(50) DEFAULT NULL,
`fire_hose_wrking_rmrk`   varchar(255) DEFAULT NULL,
`fire_exit_deptrmnt_yn`   varchar(50) DEFAULT NULL,
`fire_exit_deptrmnt_loc`   varchar(50) DEFAULT NULL,
`fire_exit_deptrmnt_rmrk`   varchar(255) DEFAULT NULL,
`chemcl_comb_matrl_yn`   varchar(50) DEFAULT NULL,
`chemcl_comb_matrl_loc`   varchar(50) DEFAULT NULL,
`chemcl_comb_matrl_rmrk`   varchar(255) DEFAULT NULL,
`pa_system_wrking_yn`   varchar(50) DEFAULT NULL,
`pa_system_wrking_loc`   varchar(50) DEFAULT NULL,
`pa_system_wrking_rmrk`   varchar(255) DEFAULT NULL,
`smoke_condtin_yn`   varchar(50) DEFAULT NULL,
`smoke_condtin_loc`   varchar(50) DEFAULT NULL,
`smoke_condtin_rmrk`   varchar(255) DEFAULT NULL,
`fire_safty_rounds_yn`   varchar(50) DEFAULT NULL,
`fire_safty_rounds_loc`   varchar(50) DEFAULT NULL,
`fire_safty_rounds_rmrk`   varchar(255) DEFAULT NULL,
`fire_preventin_abc_yn`   varchar(50) DEFAULT NULL,
`fire_preventin_abc_loc`   varchar(50) DEFAULT NULL,
`fire_preventin_abc_rmrk`   varchar(255) DEFAULT NULL
 
  


) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_fire_sfty_chklst`
--
ALTER TABLE `tbl_fire_sfty_chklst`
  ADD PRIMARY KEY (`fire_sfty_chklst_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_fire_sfty_chklst`
--
ALTER TABLE `tbl_fire_sfty_chklst`
  MODIFY `fire_sfty_chklst_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

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
-- Table structure for table `tbl_ansthsia_chklst`
--

CREATE TABLE `tbl_ansthsia_chklst` (
  `ansthsia_chklst_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `sign` varchar(100) DEFAULT NULL,
  `date1` varchar(50) DEFAULT NULL,
  `time1` varchar(50) DEFAULT NULL,
  `surg_sfty_implnt_yn`   varchar(50) DEFAULT NULL,
   `surg_sfty_implnt_loc`   varchar(50) DEFAULT NULL,
  `surg_sfty_implnt_rmrk`   varchar(255) DEFAULT NULL,

   `pre_ope_ans_clfscn_yn`   varchar(50) DEFAULT NULL,
  `pre_ope_ans_clfscn_loc`   varchar(50) DEFAULT NULL,
  `pre_ope_ans_clfscn_rmrk`   varchar(255) DEFAULT NULL,
  
  `pac_done_24_hrs_yn`   varchar(50) DEFAULT NULL,
  `pac_done_24_hrs_loc`   varchar(50) DEFAULT NULL,
 `pac_done_24_hrs_rmrk`   varchar(255) DEFAULT NULL,
  
  `imm_pre_documt_yn`   varchar(50) DEFAULT NULL,
  `imm_pre_documt_loc`   varchar(50) DEFAULT NULL,
  `imm_pre_documt_rmrk`   varchar(255) DEFAULT NULL,

  `peri_ans_evnt_yn`   varchar(50) DEFAULT NULL,
  `peri_ans_evnt_loc`   varchar(50) DEFAULT NULL,
 `peri_ans_evnt_rmrk`   varchar(255) DEFAULT NULL,

  `anst_machin_equpmnt_yn`   varchar(50) DEFAULT NULL,
  `anst_machin_equpmnt_loc`   varchar(50) DEFAULT NULL,
 `anst_machin_equpmnt_rmrk`   varchar(255) DEFAULT NULL,

  `anst_drug_rectn_yn`   varchar(50) DEFAULT NULL,
  `anst_drug_rectn_loc`   varchar(50) DEFAULT NULL,
 `anst_drug_rectn_rmrk`   varchar(255) DEFAULT NULL,


  `anst_advrse_ade_yn`   varchar(50) DEFAULT NULL,
  `anst_advrse_ade_loc`   varchar(50) DEFAULT NULL,
 `anst_advrse_ade_rmrk`   varchar(255) DEFAULT NULL,

  `post_anst_trnsfr_yn`   varchar(50) DEFAULT NULL,
 `post_anst_trnsfr_loc`   varchar(50) DEFAULT NULL,
 `post_anst_trnsfr_rmrk`   varchar(255) DEFAULT NULL,
 
  `anst_const_risk_yn`   varchar(50) DEFAULT NULL,
 `anst_const_risk_loc`   varchar(50) DEFAULT NULL,
 `anst_const_risk_rmrk`   varchar(255) DEFAULT NULL
 
  


) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ansthsia_chklst`
--
ALTER TABLE `tbl_ansthsia_chklst`
  ADD PRIMARY KEY (`ansthsia_chklst_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ansthsia_chklst`
--
ALTER TABLE `tbl_ansthsia_chklst`
  MODIFY `ansthsia_chklst_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

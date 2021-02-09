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
-- Table structure for table `tbl_biomedicaleqip_sfty_chklst`
--

CREATE TABLE `tbl_biomedicaleqip_sfty_chklst` (
  `biomedicaleqip_sfty_chklst_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `sign` varchar(100) DEFAULT NULL,
  `date1` varchar(50) DEFAULT NULL,
  `time1` varchar(50) DEFAULT NULL,
  
 

 
`list_upted_tag_yn`   varchar(50) DEFAULT NULL,
`list_upted_tag_loc`   varchar(50) DEFAULT NULL,
`list_upted_tag_rmrk`   varchar(255) DEFAULT NULL,
`critical_bio_equmnt_yn`   varchar(50) DEFAULT NULL,
`critical_bio_equmnt_loc`   varchar(50) DEFAULT NULL,
`critical_bio_equmnt_rmrk`   varchar(255) DEFAULT NULL,
`prvintv_maintce_reports_yn`   varchar(50) DEFAULT NULL,
`prvintv_maintce_reports_loc`   varchar(50) DEFAULT NULL,
`prvintv_maintce_reports_rmrk`   varchar(255) DEFAULT NULL,
`calibratn_reports_yn`   varchar(50) DEFAULT NULL,
`calibratn_reports_loc`   varchar(50) DEFAULT NULL,
`calibratn_reports_rmrk`   varchar(255) DEFAULT NULL,
`breakdown_equpment_yn`   varchar(50) DEFAULT NULL,
`breakdown_equpment_loc`   varchar(50) DEFAULT NULL,
`breakdown_equpment_rmrk`   varchar(255) DEFAULT NULL,
`dos_dont_precution_yn`   varchar(50) DEFAULT NULL,
`dos_dont_precution_loc`   varchar(50) DEFAULT NULL,
`dos_dont_precution_rmrk`   varchar(255) DEFAULT NULL,
`emrgncy_alarm_yn`   varchar(50) DEFAULT NULL,
`emrgncy_alarm_loc`   varchar(50) DEFAULT NULL,
`emrgncy_alarm_rmrk`   varchar(255) DEFAULT NULL,
`intrnl_extrnl_repots_yn`   varchar(50) DEFAULT NULL,
`intrnl_extrnl_repots_loc`   varchar(50) DEFAULT NULL,
`intrnl_extrnl_repots_rmrk`   varchar(255) DEFAULT NULL,
`all_wires_use_yn`   varchar(50) DEFAULT NULL,
`all_wires_use_loc`   varchar(50) DEFAULT NULL,
`all_wires_use_rmrk`   varchar(255) DEFAULT NULL,
`qualified_biomedcl_checks_yn`   varchar(50) DEFAULT NULL,
`qualified_biomedcl_checks_loc`   varchar(50) DEFAULT NULL,
`qualified_biomedcl_checks_rmrk`   varchar(255) DEFAULT NULL
  


) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_biomedicaleqip_sfty_chklst`
--
ALTER TABLE `tbl_biomedicaleqip_sfty_chklst`
  ADD PRIMARY KEY (`biomedicaleqip_sfty_chklst_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_biomedicaleqip_sfty_chklst`
--
ALTER TABLE `tbl_biomedicaleqip_sfty_chklst`
  MODIFY `biomedicaleqip_sfty_chklst_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

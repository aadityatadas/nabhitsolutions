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
-- Table structure for table `tbl_sedatin_sfty_chklst.sql`
--

CREATE TABLE `tbl_sedatin_sfty_chklst.sql` (
  `sedatin_sfty_chklst_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `sign` varchar(100) DEFAULT NULL,
  `date1` varchar(50) DEFAULT NULL,
  `time1` varchar(50) DEFAULT NULL,
  `sedtin_cnstnt_tkn_yn`   varchar(50) DEFAULT NULL,  
`sedtin_cnstnt_tkn_loc`   varchar(50) DEFAULT NULL,
`sedtin_cnstnt_tkn_rmrk`   varchar(255) DEFAULT NULL, 
`sedtin_score_filld_yn`   varchar(50) DEFAULT NULL,
`sedtin_score_filld_loc`   varchar(50) DEFAULT NULL,  
`sedtin_score_filld_rmrk`   varchar(255) DEFAULT NULL,  
`sedtin_gvn_only_yn`   varchar(50) DEFAULT NULL,  
`sedtin_gvn_only_loc`   varchar(50) DEFAULT NULL, 
`sedtin_gvn_only_rmrk`   varchar(255) DEFAULT NULL, 
`if_sedtive_restnt_only_yn`   varchar(50) DEFAULT NULL, 
`if_sedtive_restnt_only_loc`   varchar(50) DEFAULT NULL, 
 `if_sedtive_restnt_only_rmrk`   varchar(255) DEFAULT NULL,  
`sedtive_drug_prtcl_yn`   varchar(50) DEFAULT NULL,
`sedtive_drug_prtcl_loc`   varchar(50) DEFAULT NULL,  
`sedtive_drug_prtcl_rmrk`   varchar(255) DEFAULT NULL 
  


) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_sedatin_sfty_chklst.sql`
--
ALTER TABLE `tbl_sedatin_sfty_chklst.sql`
  ADD PRIMARY KEY (`sedatin_sfty_chklst_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_sedatin_sfty_chklst.sql`
--
ALTER TABLE `tbl_sedatin_sfty_chklst.sql`
  MODIFY `sedatin_sfty_chklst_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

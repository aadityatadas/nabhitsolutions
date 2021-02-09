-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 29, 2014 at 06:52 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ciaddressimport`
--

-- --------------------------------------------------------

--
-- Table structure for table `addressbook`
--

CREATE TABLE IF NOT EXISTS `addressbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `addressbook`
--

INSERT INTO `addressbook` (`id`, `firstname`, `lastname`, `phone`, `email`) VALUES
(1, 'Veda', 'Zane', '1-822-111-8722', 'tristique.neque@imperdietullamcorperDuis.ca'),
(2, 'Debra', 'Barclay', '1-834-403-5169', 'eu@Donecfeugiatmetus.com'),
(3, 'Cameran', 'Ethan', '1-424-207-4344', 'sed.tortor@Suspendissealiquetmolestie.net'),
(4, 'Bertha', 'Uriah', '1-213-739-6455', 'feugiat.tellus@Curabiturconsequatlectus.com'),
(5, 'Adrian', 'Geoffrey', '1-401-946-3860', 'arcu@id.ca'),
(6, 'Hammett', 'Keaton', '1-365-910-5682', 'Donec.feugiat@pharetra.ca'),
(7, 'Gay', 'Brock', '1-577-863-9970', 'Sed@laoreetlibero.net'),
(8, 'Candace', 'Felix', '1-624-293-4547', 'velit.eget@leo.org'),
(9, 'Theodore', 'Ezra', '1-357-355-3798', 'suscipit.est@nullamagnamalesuada.com'),
(10, 'Dalton', 'Dennis', '1-515-960-7108', 'hendrerit.neque.In@nonummyipsumnon.net'),
(11, 'Eden', 'Rashad', '1-173-452-1081', 'aliquet.magna.a@nullaat.ca'),
(12, 'Keely', 'Palmer', '1-527-238-0028', 'nisi@elit.edu'),
(13, 'Summer', 'Donovan', '1-535-643-7231', 'nec.ante@euelit.org'),
(14, 'Sierra', 'Zephania', '1-628-730-5416', 'iaculis.enim@ligulatortor.net'),
(15, 'Stephen', 'Derek', '1-425-259-2099', 'ultricies@posuereatvelit.co.uk'),
(16, 'Zelda', 'Amery', '1-721-373-8263', 'dignissim@ornare.net'),
(17, 'Jenna', 'Troy', '1-909-208-1319', 'aliquet.vel@Crasdolordolor.co.uk'),
(18, 'Christian', 'Preston', '1-290-927-2204', 'Duis.volutpat@actellusSuspendisse.net'),
(19, 'Yuli', 'Graham', '1-102-244-0059', 'elementum.dui@vehicula.ca'),
(20, 'Cailin', 'Jason', '1-532-863-2211', 'ipsum.dolor.sit@odio.co.uk');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

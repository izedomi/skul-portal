-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2018 at 08:49 PM
-- Server version: 5.6.41
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wwicscho_payment`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `class` varchar(30) NOT NULL,
  `wing` varchar(15) NOT NULL,
  `term` varchar(30) NOT NULL,
  `unique_id` varchar(10) NOT NULL,
  `date` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `class`, `wing`, `term`, `unique_id`, `date`) VALUES
(1, 'EMMANUEL EMMANUEL', 'JSS 2', 'BRONZE', 'FIRST TERM', 'J2B01008', '01-08-18'),
(2, 'JOHN DOE', 'SSS 3', 'GOLD', 'THIRD TERM', 'S3G03009', '01-08-18'),
(3, 'RAFAEAL NADAL', 'JSS 1', 'GOLD', 'FIRST TERM', 'J1G01010', '01-09-18'),
(4, 'SERENE EMMANUEL', 'JSS 1', 'BRONZE', 'FIRST TERM', 'J1B01011', '01-09-18'),
(5, 'SERENE EMMANUEL', 'JSS 1', 'BRONZE', 'FIRST TERM', 'J1B01012', '01-09-18'),
(6, 'SERENE DOE', 'JSS 3', 'GOLD', 'FIRST TERM', 'J3G01013', '01-09-18'),
(7, 'SERENE DOE', 'JSS 3', 'GOLD', 'FIRST TERM', 'J3G01014', '01-09-18'),
(8, 'IZEDOMI OLOITARE', 'PRIMARY 2', 'GOLD', 'SECOND TERM', 'P2G02001', '01-09-18'),
(9, 'JOHN OLOITARE', 'JSS 1', 'SILVER', 'FIRST TERM', 'J1S01015', '01-09-18'),
(10, 'EMMANUEL EMMANUEL', 'JSS 1', 'GOLD', 'SECOND TERM', 'J1G02017', '01-11-18'),
(11, 'EMMANUEL EMMANUEL', 'JSS 1', 'GOLD', 'SECOND TERM', 'J1G02018', '01-11-18'),
(12, 'EMMANUEL EMMANUEL', 'JSS 1', 'GOLD', 'SECOND TERM', 'J1G02019', '01-11-18'),
(13, 'EMMANUEL EMMANUEL', 'JSS 1', 'GOLD', 'SECOND TERM', 'J1G02020', '01-11-18'),
(14, 'CHRISTOPHER TANIA', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'P1G01002', '01-13-18'),
(15, 'UDOMOH  FESTUS', 'SSS 3', 'GOLD', 'SECOND TERM', 'S3G02022', '04-10-18'),
(16, 'UDOMOH  FESTUS', 'SSS 3', 'GOLD', 'SECOND TERM', 'S3G02023', '04-10-18'),
(17, 'JON RASZ FIX', 'PRIMARY 2', 'SILVER', 'FIRST TERM', 'P2S01004', '06-10-18'),
(18, 'JON RASZ FIX', 'PRIMARY 2', 'SILVER', 'FIRST TERM', 'P2S01005', '06-10-18'),
(19, 'JON RASZ FIX', 'PRIMARY 2', 'SILVER', 'FIRST TERM', 'P2S01006', '06-10-18'),
(20, 'IZEDOMI IZEDOMI', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'P4BN01031', '08-24-18'),
(21, 'IZEDOMI IZEDOMI', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'P4BN01031', '08-24-18'),
(22, 'IZEDOMI IZEDOMI', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'P4BN01031', '08-24-18'),
(23, 'IZEDOMI IZEDOMI', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'P4BN01031', '08-24-18'),
(24, 'IZEDOMI IZEDOMI', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'P4BN01031', '08-24-18'),
(25, 'IZEDOMI IZEDOMI', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'P4BN01031', '08-24-18'),
(26, 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'P1G01035', '11-28-18');

-- --------------------------------------------------------

--
-- Table structure for table `development_fee`
--

CREATE TABLE `development_fee` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `class` varchar(30) NOT NULL,
  `wing` varchar(15) NOT NULL,
  `term` varchar(30) NOT NULL,
  `unique_id` varchar(10) NOT NULL,
  `date` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `development_fee`
--

INSERT INTO `development_fee` (`id`, `name`, `class`, `wing`, `term`, `unique_id`, `date`) VALUES
(1, 'EMMANUEL OLOITARE', 'JSS 1', 'GOLD', 'SECOND TERM', 'J1G02num', '01-08-18'),
(2, 'EMMANUEL EMMANUEL', 'JSS 1', 'GOLD', 'THIRD TERM', 'J1G037', '01-08-18'),
(3, 'EMMANUEL EMMANUEL', 'JSS 2', 'BRONZE', 'FIRST TERM', 'J2B01008', '01-08-18'),
(4, 'JOHN DOE', 'SSS 3', 'GOLD', 'THIRD TERM', 'S3G03009', '01-08-18'),
(5, 'IZEDOMI OLOITARE', 'PRIMARY 2', 'GOLD', 'SECOND TERM', 'P2G02001', '01-09-18'),
(6, 'SAMMY DOE', 'JSS 1', 'GOLD', 'FIRST TERM', 'J1G01021', '01-11-18'),
(7, 'CHRISTOPHER TANIA', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'P1G01002', '01-13-18'),
(8, 'JON RASZ FIX', 'PRIMARY 2', 'SILVER', 'FIRST TERM', 'P2S01004', '06-10-18'),
(9, 'JON RASZ FIX', 'PRIMARY 2', 'SILVER', 'FIRST TERM', 'P2S01005', '06-10-18'),
(10, 'JON RASZ FIX', 'PRIMARY 2', 'SILVER', 'FIRST TERM', 'P2S01006', '06-10-18'),
(11, 'TAS HGAS', 'PRIMARY 1', 'BRONZE', 'SECOND TERM', 'P1B02007', '06-10-18'),
(12, 'TAS HGAS', 'PRIMARY 1', 'BRONZE', 'SECOND TERM', 'P1B02008', '06-10-18'),
(13, 'G F', 'PRIMARY 4', 'BRONZE', 'THIRD TERM', 'P4BN03034', '11-15-18'),
(14, 'G F', 'PRIMARY 4', 'BRONZE', 'THIRD TERM', 'P4BN03034', '11-15-18'),
(15, 'G F', 'PRIMARY 4', 'BRONZE', 'THIRD TERM', 'P4BN03034', '11-15-18'),
(16, 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'P1G01035', '11-28-18');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'root', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `date`) VALUES
(5, 'sdfs', '<p>dsfsd</p>', '2018-01-04'),
(3, 'test3', 'this is test3 edited', '2018-01-01'),
(4, 'news1', 'this is test', '2018-01-01'),
(6, 'development ', '<p>&nbsp;</p>', '2018-01-04'),
(7, 'just want to add', '<p><strong>yes am still working on it</strong></p>', '2018-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `payment_category`
--

CREATE TABLE `payment_category` (
  `id` int(11) NOT NULL,
  `category` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_category`
--

INSERT INTO `payment_category` (`id`, `category`) VALUES
(2, 'Term Fees'),
(3, 'Special Fees'),
(11, 'new');

-- --------------------------------------------------------

--
-- Table structure for table `payment_purpose`
--

CREATE TABLE `payment_purpose` (
  `id` int(11) NOT NULL,
  `purpose` varchar(150) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_purpose`
--

INSERT INTO `payment_purpose` (`id`, `purpose`, `amount`) VALUES
(25, 'School Fee', 59000),
(26, 'Books', 27500),
(27, 'Development Fee', 17000),
(28, 'PTA', 2750);

-- --------------------------------------------------------

--
-- Table structure for table `pta`
--

CREATE TABLE `pta` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `class` varchar(30) NOT NULL,
  `wing` varchar(15) NOT NULL,
  `term` varchar(30) NOT NULL,
  `unique_id` varchar(10) NOT NULL,
  `date` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pta`
--

INSERT INTO `pta` (`id`, `name`, `class`, `wing`, `term`, `unique_id`, `date`) VALUES
(1, 'EMMANUEL OLOITARE', 'JSS 1', 'GOLD', 'SECOND TERM', '', ''),
(2, 'EMMANUEL OLOITARE', 'JSS 1', 'GOLD', 'SECOND TERM', '', ''),
(3, 'EMMANUEL OLOITARE', 'JSS 1', 'GOLD', 'SECOND TERM', 'J1G02num', '01-08-18'),
(4, 'EMMANUEL EMMANUEL', 'JSS 1', 'GOLD', 'THIRD TERM', 'J1G037', '01-08-18'),
(5, 'EMMANUEL EMMANUEL', 'JSS 2', 'BRONZE', 'FIRST TERM', 'J2B01008', '01-08-18'),
(6, 'JOHN DOE', 'SSS 3', 'GOLD', 'THIRD TERM', 'S3G03009', '01-08-18'),
(7, 'SERENE EMMANUEL', 'JSS 1', 'BRONZE', 'FIRST TERM', 'J1B01011', '01-09-18'),
(8, 'SERENE EMMANUEL', 'JSS 1', 'BRONZE', 'FIRST TERM', 'J1B01012', '01-09-18'),
(9, 'SERENE DOE', 'JSS 3', 'GOLD', 'FIRST TERM', 'J3G01013', '01-09-18'),
(10, 'SERENE DOE', 'JSS 3', 'GOLD', 'FIRST TERM', 'J3G01014', '01-09-18'),
(11, 'EMMANUEL EMMANUEL', 'JSS 1', 'GOLD', 'SECOND TERM', 'J1G02017', '01-11-18'),
(12, 'EMMANUEL EMMANUEL', 'JSS 1', 'GOLD', 'SECOND TERM', 'J1G02018', '01-11-18'),
(13, 'EMMANUEL EMMANUEL', 'JSS 1', 'GOLD', 'SECOND TERM', 'J1G02019', '01-11-18'),
(14, 'EMMANUEL EMMANUEL', 'JSS 1', 'GOLD', 'SECOND TERM', 'J1G02020', '01-11-18'),
(15, 'SAMMY DOE', 'JSS 1', 'GOLD', 'FIRST TERM', 'J1G01021', '01-11-18'),
(16, 'CHRISTOPHER TANIA', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'P1G01002', '01-13-18'),
(17, 'UDOMOH  FESTUS', 'SSS 3', 'GOLD', 'SECOND TERM', 'S3G02022', '04-10-18'),
(18, 'UDOMOH  FESTUS', 'SSS 3', 'GOLD', 'SECOND TERM', 'S3G02023', '04-10-18'),
(19, 'TAS HGAS', 'PRIMARY 1', 'BRONZE', 'SECOND TERM', 'P1B02007', '06-10-18'),
(20, 'TAS HGAS', 'PRIMARY 1', 'BRONZE', 'SECOND TERM', 'P1B02008', '06-10-18'),
(21, 'IZEDOMI IZEDOMI', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'P4BN01031', '08-24-18'),
(22, 'IZEDOMI IZEDOMI', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'P4BN01031', '08-24-18'),
(23, 'IZEDOMI IZEDOMI', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'P4BN01031', '08-24-18'),
(24, 'IZEDOMI IZEDOMI', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'P4BN01031', '08-24-18'),
(25, 'IZEDOMI IZEDOMI', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'P4BN01031', '08-24-18'),
(26, 'IZEDOMI IZEDOMI', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'P4BN01031', '08-24-18'),
(27, 'IZEDOMI IZEDOMI', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'P4BN01032', '08-24-18'),
(28, 'IZEDOMI IZEDOMI', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'P4BN01032', '08-24-18'),
(29, 'IZEDOMI IZEDOMI', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'P4BN01032', '08-24-18'),
(30, 'IZEDOMI IZEDOMI', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'P4BN01032', '08-24-18'),
(31, 'IZEDOMI IZEDOMI', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'P4BN01032', '08-24-18'),
(32, 'IZEDOMI IZEDOMI', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'P4BN01032', '08-24-18'),
(33, 'IZEDOMI IZEDOMI', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'P4BN01032', '08-24-18'),
(34, 'IZEDOMI IZEDOMI', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'P4BN01032', '08-24-18'),
(35, 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'P1G01035', '11-28-18');

-- --------------------------------------------------------

--
-- Table structure for table `p_payment_details`
--

CREATE TABLE `p_payment_details` (
  `id` int(11) NOT NULL,
  `category` varchar(60) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `class` varchar(30) NOT NULL,
  `wing` varchar(20) NOT NULL,
  `term` varchar(30) NOT NULL,
  `g_fullname` varchar(120) NOT NULL,
  `g_phone` varchar(15) NOT NULL,
  `payment` varchar(400) NOT NULL,
  `total` varchar(15) NOT NULL,
  `reference` varchar(25) DEFAULT NULL,
  `unique_id` varchar(15) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_payment_details`
--

INSERT INTO `p_payment_details` (`id`, `category`, `fullname`, `class`, `wing`, `term`, `g_fullname`, `g_phone`, `payment`, `total`, `reference`, `unique_id`, `date`) VALUES
(1, 'SPECIAL FEES', 'IZEDOMI OLOITARE', 'PRIMARY 2', 'GOLD', 'SECOND TERM', 'BRITTS ADAMS', '23408038328878', 'School Fee (#59,000)-Books (#27,500)-Development Fee (#17,000)-', '103,500', NULL, 'P2G02001', '01-09-18'),
(2, 'TERM FEES', 'CHRISTOPHER TANIA', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'JULIA CHRISTOPHER', '23408171234373', 'Books (#27,500)-Development Fee (#17,000)-PTA (#2,750)-', '47 ,250', NULL, 'P1G01002', '01-13-18'),
(3, 'TERM FEES', 'MORDI  PAULA ', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'MORDI PATRICIA ', '23408036999554', 'School Fee (#59,000)-', '59 ,000', NULL, 'P1G01003', '01-15-18'),
(4, 'TERM FEES', 'JON RASZ FIX', 'PRIMARY 2', 'SILVER', 'FIRST TERM', 'IZEDOMI EMMANUEL ', '23408161659990', 'School Fee (#59,000)-Books (#27,500)-Development Fee (#17,000)-', '103,500', NULL, NULL, NULL),
(5, 'TERM FEES', 'JON RASZ FIX', 'PRIMARY 2', 'SILVER', 'FIRST TERM', 'IZEDOMI EMMANUEL ', '23408161659990', 'School Fee (#59,000)-Books (#27,500)-Development Fee (#17,000)-', '103,500', NULL, NULL, NULL),
(6, 'TERM FEES', 'JON RASZ FIX', 'PRIMARY 2', 'SILVER', 'FIRST TERM', 'IZEDOMI EMMANUEL ', '23408161659990', 'School Fee (#59,000)-Books (#27,500)-Development Fee (#17,000)-', '103,500', NULL, 'P2S01006', '06-10-18'),
(7, 'SPECIAL FEES', 'TAS HGAS', 'PRIMARY 1', 'BRONZE', 'SECOND TERM', 'IZEDOMI EMMANUEL ', '23408063498356', 'Development Fee (#17,000)-PTA (#2,750)-', '19 ,750', NULL, NULL, NULL),
(8, 'SPECIAL FEES', 'TAS HGAS', 'PRIMARY 1', 'BRONZE', 'SECOND TERM', 'IZEDOMI EMMANUEL ', '23408063498356', 'Development Fee (#17,000)-PTA (#2,750)-', '19 ,750', NULL, 'P1B02008', '06-10-18'),
(9, 'TERM FEES', 'JOJO FSS', 'PRIMARY 2', 'GOLD', 'FIRST TERM', 'IZEDOIN', '23408063498356', 'School Fee (#59,000)-', '59 ,000', NULL, NULL, NULL),
(10, 'TERM FEES', 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'IZEDOIN', '23408063498356', 'School Fee (#59,000)-', '59 ,000', NULL, NULL, NULL),
(11, 'TERM FEES', 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'IZEDOIN', '23408063498356', 'School Fee (#59,000)-', '59 ,000', NULL, NULL, NULL),
(12, 'TERM FEES', 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'IZEDOIN', '23408063498356', 'School Fee (#59,000)-', '59 ,000', NULL, NULL, NULL),
(13, 'TERM FEES', 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'IZEDOIN', '23408063498356', 'School Fee (#59,000)-', '59 ,000', NULL, NULL, NULL),
(14, 'TERM FEES', 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'IZEDOIN', '23408063498356', 'School Fee (#59,000)-', '59 ,000', NULL, NULL, NULL),
(15, 'TERM FEES', 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'IZEDOIN', '23408063498356', 'School Fee (#59,000)-', '59 ,000', NULL, NULL, NULL),
(16, 'TERM FEES', 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'IZEDOIN', '23408063498356', 'School Fee (#59,000)-', '59 ,000', NULL, NULL, NULL),
(17, 'TERM FEES', 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'IZEDOIN', '23408063498356', 'School Fee (#59,000)-', '59 ,000', NULL, NULL, NULL),
(18, 'TERM FEES', 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'IZEDOIN', '23408063498356', 'School Fee (#59,000)-', '59 ,000', NULL, NULL, NULL),
(19, 'TERM FEES', 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'IZEDOIN', '23408063498356', 'School Fee (#59,000)-', '59 ,000', NULL, NULL, NULL),
(20, 'TERM FEES', 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'IZEDOIN', '23408063498356', 'School Fee (#59,000)-', '59 ,000', NULL, NULL, NULL),
(21, 'TERM FEES', 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'IZEDOIN', '23408063498356', 'School Fee (#59,000)-', '59 ,000', NULL, NULL, NULL),
(22, 'TERM FEES', 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'IZEDOIN', '23408063498356', 'School Fee (#59,000)-', '59 ,000', NULL, NULL, NULL),
(23, 'TERM FEES', 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'IZEDOIN', '23408063498356', 'School Fee (#59,000)-', '59 ,000', NULL, NULL, NULL),
(24, 'TERM FEES', 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'IZEDOIN', '23408063498356', 'School Fee (#59,000)-', '59 ,000', NULL, NULL, NULL),
(25, 'SPECIAL FEES', 'IZEDOMI QQQQQ', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'IZEDOINTAAA', '23408063498231', 'Books-PTA-', '30,250', NULL, NULL, NULL),
(26, 'SPECIAL FEES', 'IZEDOMI QQQQQ', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'IZEDOINTAAA', '23408063498231', 'Books-PTA-', '30,250', NULL, NULL, NULL),
(27, 'SPECIAL FEES', 'IZEDOMI QQQQQ', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'IZEDOINTAAA', '23408063498231', 'Books-PTA-', '30,250', 'prypnCuyaykqtdlL9xt4', NULL, NULL),
(28, 'SPECIAL FEES', 'IZEDOMI QQQQQ', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'IZEDOINTAAA', '23408063498231', 'Books-PTA-', '30,250', NULL, NULL, NULL),
(29, 'SPECIAL FEES', 'IZEDOMI QQQQQ', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'IZEDOINTAAA', '23408063498231', 'Books-PTA-', '30,250', 'pryreypuBEJ97aPeRKFF', NULL, NULL),
(30, 'SPECIAL FEES', 'IZEDOMI QQQQQ', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'IZEDOINTAAA', '23408063498231', 'Books-PTA-', '30,250', 'pryJSgGY1SUfyzmljemj', NULL, NULL),
(31, 'SPECIAL FEES', 'IZEDOMI IZEDOMI', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'IZED', '23408063498211', 'School Fee-Books-PTA-', '89,250', 'pryEmZJltJ6xRVehb8hi', 'P4BN01031', '08-24-18'),
(32, 'SPECIAL FEES', 'IZEDOMI IZEDOMI', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'IZED', '23408063498356', 'PTA-', '2,750', 'pryvORMoWbR97iUdEGP8', 'P4BN01032', '08-24-18'),
(33, 'NEW', 'IZ JO', 'PRIMARY 4', 'SILVER', 'THIRD TERM', 'VC', '23408063498356', 'Development Fee-', '17,000', 'pryI6B1dkDwn7WzOlzkr', NULL, NULL),
(34, 'SPECIAL FEES', 'G F', 'PRIMARY 4', 'BRONZE', 'THIRD TERM', 'F', '23408063498356', 'Development Fee-', '17,000', 'prysz2HSbjNnOYferOON', 'P4BN03034', '11-15-18'),
(35, 'NEW', 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'JAME JAY', '23408063498231', 'Books-Development Fee-PTA-', '47,250', 'prydDGfia39ll8Seg9wr', 'P1G01035', '11-28-18'),
(36, 'TERM FEES', 'OMORODION IKPONMWOSA', 'PRIMARY 3', 'BRONZE', 'THIRD TERM', 'OMORODION QUEEN', '23408058763270', 'School Fee-', '59,000', 'prybHoVROTiKcj5qqSPN', 'P3BN03036', '12-02-18');

-- --------------------------------------------------------

--
-- Table structure for table `school_fee`
--

CREATE TABLE `school_fee` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `class` varchar(30) NOT NULL,
  `wing` varchar(15) NOT NULL,
  `term` varchar(30) NOT NULL,
  `unique_id` varchar(10) NOT NULL,
  `date` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_fee`
--

INSERT INTO `school_fee` (`id`, `name`, `class`, `wing`, `term`, `unique_id`, `date`) VALUES
(1, 'EMMANUEL OLOITARE', 'JSS 1', 'GOLD', 'SECOND TERM', '', ''),
(2, 'EMMANUEL OLOITARE', 'JSS 1', 'GOLD', 'SECOND TERM', '', ''),
(3, 'EMMANUEL OLOITARE', 'JSS 1', 'GOLD', 'SECOND TERM', 'J1G02num', '01-08-18'),
(4, 'EMMANUEL EMMANUEL', 'JSS 1', 'GOLD', 'THIRD TERM', 'J1G037', '01-08-18'),
(5, 'EMMANUEL EMMANUEL', 'JSS 2', 'BRONZE', 'FIRST TERM', 'J2B01008', '01-08-18'),
(6, 'JOHN DOE', 'SSS 3', 'GOLD', 'THIRD TERM', 'S3G03009', '01-08-18'),
(7, 'RAFAEAL NADAL', 'JSS 1', 'GOLD', 'FIRST TERM', 'J1G01010', '01-09-18'),
(8, 'IZEDOMI OLOITARE', 'PRIMARY 2', 'GOLD', 'SECOND TERM', 'P2G02001', '01-09-18'),
(9, 'IZEDOMI IZEDOMI', 'SSS 3', 'GOLD', 'SECOND TERM', 'S3G02016', '01-09-18'),
(10, 'EMMANUEL EMMANUEL', 'JSS 1', 'GOLD', 'SECOND TERM', 'J1G02020', '01-11-18'),
(11, 'MORDI  PAULA ', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'P1G01003', '01-15-18'),
(12, 'UDOMOH  FESTUS', 'SSS 3', 'GOLD', 'SECOND TERM', 'S3G02022', '04-10-18'),
(13, 'UDOMOH  FESTUS', 'SSS 3', 'GOLD', 'SECOND TERM', 'S3G02023', '04-10-18'),
(14, 'JON RASZ FIX', 'PRIMARY 2', 'SILVER', 'FIRST TERM', 'P2S01004', '06-10-18'),
(15, 'JON RASZ FIX', 'PRIMARY 2', 'SILVER', 'FIRST TERM', 'P2S01005', '06-10-18'),
(16, 'JON RASZ FIX', 'PRIMARY 2', 'SILVER', 'FIRST TERM', 'P2S01006', '06-10-18'),
(17, 'JASON MILE', 'JSS 3', 'GOLD', 'SECOND TERM', 'J3G02024', '06-10-18'),
(18, 'JOJO FSS', 'PRIMARY 2', 'GOLD', 'FIRST TERM', 'P2G01009', '07-31-18'),
(19, 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'P1G01010', '08-22-18'),
(20, 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'P1G01011', '08-22-18'),
(21, 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'P1G01012', '08-22-18'),
(22, 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'P1G01013', '08-22-18'),
(23, 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'P1G01014', '08-22-18'),
(24, 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'P1G01015', '08-22-18'),
(25, 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'P1G01016', '08-22-18'),
(26, 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'P1G01017', '08-22-18'),
(27, 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'P1G01018', '08-22-18'),
(28, 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'P1G01019', '08-22-18'),
(29, 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'P1G01020', '08-22-18'),
(30, 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'P1G01021', '08-22-18'),
(31, 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'P1G01022', '08-22-18'),
(32, 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'P1G01023', '08-22-18'),
(33, 'EMMANUEL EMMANUEL', 'PRIMARY 1', 'GOLD', 'FIRST TERM', 'P1G01024', '08-22-18'),
(34, 'IZEDOMI IZEDOMI', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'P4BN01031', '08-24-18'),
(35, 'IZEDOMI IZEDOMI', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'P4BN01031', '08-24-18'),
(36, 'IZEDOMI IZEDOMI', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'P4BN01031', '08-24-18'),
(37, 'IZEDOMI IZEDOMI', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'P4BN01031', '08-24-18'),
(38, 'IZEDOMI IZEDOMI', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'P4BN01031', '08-24-18'),
(39, 'IZEDOMI IZEDOMI', 'PRIMARY 4', 'BRONZE', 'FIRST TERM', 'P4BN01031', '08-24-18'),
(40, 'OMORODION IKPONMWOSA', 'PRIMARY 3', 'BRONZE', 'THIRD TERM', 'P3BN03036', '12-02-18');

-- --------------------------------------------------------

--
-- Table structure for table `s_payment_details`
--

CREATE TABLE `s_payment_details` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `class` varchar(30) NOT NULL,
  `wing` varchar(20) NOT NULL,
  `term` varchar(30) NOT NULL,
  `g_fullname` varchar(200) NOT NULL,
  `g_phone` varchar(15) NOT NULL,
  `payment` text NOT NULL,
  `total` varchar(15) NOT NULL,
  `reference` varchar(25) DEFAULT NULL,
  `unique_id` varchar(15) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_payment_details`
--

INSERT INTO `s_payment_details` (`id`, `category`, `fullname`, `class`, `wing`, `term`, `g_fullname`, `g_phone`, `payment`, `total`, `reference`, `unique_id`, `date`) VALUES
(1, 'SPECIAL FEES', 'JOHN EMMANUEL', 'JSS 2', 'BRONZE', 'FIRST TERM', 'IZEDOMI ENAHORO', '09076473847', 'School Fee (#59,000)-', '59 ,000', NULL, NULL, NULL),
(2, 'SPECIAL FEES', 'EMMANUEL EMMANUEL', 'JSS 1', 'GOLD', 'FIRST TERM', 'BRITTS ADAMS', '09076473847', 'Books (#27,500)-PTA (#2,750)-', '30 ,250', NULL, NULL, NULL),
(3, 'SPECIAL FEES', 'JOHN EMMANUEL', 'JSS 1', 'GOLD', 'FIRST TERM', 'IZEDOMI ENAHORO', '09076473847', 'School Fee (#59,000)-', '59 ,000', NULL, 'J1G01003', '01-20-18'),
(4, 'SPECIAL FEES', 'JOHN OLOITARE', 'JSS 1', 'GOLD', 'FIRST TERM', 'IZEDOMI ENAHORO', '09076473847', 'School Fee (#59,000)-PTA (#2,750)-', '61 ,750', NULL, NULL, NULL),
(5, 'SPECIAL FEES', 'EMMANUEL OLOITARE', 'JSS 1', 'GOLD', 'SECOND TERM', 'IZEDOMI ENAHORO', '09076473847', 'School Fee (#59,000)-PTA (#2,750)-', '61 ,750', NULL, 'J1G02005', '01-08-18'),
(6, 'SPECIAL FEES', 'EMMANUEL OLOITARE', 'JSS 1', 'GOLD', 'SECOND TERM', 'IZEDOMI ENAHORO', '09076473847', 'School Fee (#59,000)-Development Fee (#17,000)-PTA (#2,750)-', '78 ,750', NULL, 'J1G02006', '01-08-18'),
(7, 'SPECIAL FEES', 'EMMANUEL EMMANUEL', 'JSS 1', 'GOLD', 'THIRD TERM', 'IZEDOMI ENAHORO', '09076473847', 'School Fee (#59,000)-Development Fee (#17,000)-PTA (#2,750)-', '78 ,750', NULL, 'J1G03007', '01-08-18'),
(8, 'SPECIAL FEES', 'EMMANUEL EMMANUEL', 'JSS 2', 'BRONZE', 'FIRST TERM', 'IZEDOMI ENAHORO', '09076473847', 'School Fee (#59,000)-Books (#27,500)-Development Fee (#17,000)-PTA (#2,750)-', '106,250', NULL, 'J2B01008', '01-08-18'),
(9, 'SPECIAL FEES', 'JOHN DOE', 'SSS 3', 'GOLD', 'THIRD TERM', 'BRUCE WARNER', '08063498356', 'School Fee (#59,000)-Books (#27,500)-Development Fee (#17,000)-PTA (#2,750)-', '106,250', NULL, 'S3G03009', '01-08-18'),
(10, 'SPECIAL FEES', 'RAFAEAL NADAL', 'JSS 1', 'GOLD', 'FIRST TERM', 'ROGER FEDERER', '08161659990', 'School Fee (#59,000)-Books (#27,500)-', '86 ,500', NULL, 'J1G01010', '01-09-18'),
(11, 'SPECIAL FEES', 'SERENE EMMANUEL', 'JSS 1', 'BRONZE', 'FIRST TERM', 'IZEDOMI ENAHORO', '23408038328878', 'Books (#27,500)-PTA (#2,750)-', '30 ,250', NULL, NULL, NULL),
(12, 'SPECIAL FEES', 'SERENE EMMANUEL', 'JSS 1', 'BRONZE', 'FIRST TERM', 'IZEDOMI ENAHORO', '23408069470282', 'Books (#27,500)-PTA (#2,750)-', '30 ,250', NULL, 'J1B01012', '01-09-18'),
(13, 'SPECIAL FEES', 'SERENE DOE', 'JSS 3', 'GOLD', 'FIRST TERM', 'BRITTS ADAMS', '09076473842', 'Books (#27,500)-PTA (#2,750)-', '30 ,250', NULL, NULL, NULL),
(14, 'SPECIAL FEES', 'SERENE DOE', 'JSS 3', 'GOLD', 'FIRST TERM', 'BRITTS ADAMS', '23408063498356', 'Books (#27,500)-PTA (#2,750)-', '30 ,250', NULL, 'J3G01014', '01-09-18'),
(15, 'SPECIAL FEES', 'JOHN OLOITARE', 'JSS 1', 'SILVER', 'FIRST TERM', 'IZEDOMI ENAHORO', '23409076473847', 'Books (#27,500)-', '27 ,500', NULL, NULL, NULL),
(16, 'TERM FEES', 'IZEDOMI IZEDOMI', 'SSS 3', 'GOLD', 'SECOND TERM', 'IZEDOMI', '23407084715213', 'School Fee (#59,000)-', '59 ,000', NULL, 'S3G02016', '01-09-18'),
(17, 'SPECIAL FEES', 'EMMANUEL EMMANUEL', 'JSS 1', 'GOLD', 'SECOND TERM', 'ENAHORO IZEDOMI OSASUWA', '23409076473847', 'Books (#27,500)-PTA (#2,750)-', '30 ,250', NULL, NULL, NULL),
(18, 'SPECIAL FEES', 'EMMANUEL EMMANUEL', 'JSS 1', 'GOLD', 'SECOND TERM', 'ENAHORO IZEDOMI OSASUWA', '23409076473847', 'Books (#27,500)-PTA (#2,750)-', '30 ,250', NULL, NULL, NULL),
(19, 'SPECIAL FEES', 'EMMANUEL EMMANUEL', 'JSS 1', 'GOLD', 'SECOND TERM', 'ENAHORO IZEDOMI OSASUWA', '23409076473847', 'Books (#27,500)-PTA (#2,750)-', '30 ,250', NULL, 'J1G02019', '01-11-18'),
(20, 'SPECIAL FEES', 'EMMANUEL EMMANUEL', 'JSS 1', 'GOLD', 'SECOND TERM', 'ENAHORO IZEDOMI OSASUWA', '23408063498356', 'School Fee (#59,000)-Books (#27,500)-PTA (#2,750)-', '89 ,250', NULL, 'J1G02020', '01-11-18'),
(21, 'SPECIAL FEES', 'SAMMY DOE', 'JSS 1', 'GOLD', 'FIRST TERM', 'IZEDOMI ENAHORO', '23408061659990', 'Development Fee (#17,000)-PTA (#2,750)-', '19 ,750', NULL, 'J1G01021', '01-11-18'),
(22, 'TERM FEES', 'UDOMOH  FESTUS', 'SSS 3', 'GOLD', 'SECOND TERM', 'FESTUS FESTUS', '23408166671357', 'School Fee (#59,000)-Books (#27,500)-PTA (#2,750)-', '89 ,250', NULL, NULL, NULL),
(23, 'TERM FEES', 'UDOMOH  FESTUS', 'SSS 3', 'GOLD', 'SECOND TERM', 'FESTUS FESTUS', '23408166671357', 'School Fee (#59,000)-Books (#27,500)-PTA (#2,750)-', '89 ,250', NULL, 'S3G02023', '04-10-18'),
(24, 'TERM FEES', 'JASON MILE', 'JSS 3', 'GOLD', 'SECOND TERM', 'WINIFRED', '23408035055849', 'School Fee (#59,000)-', '59 ,000', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `development_fee`
--
ALTER TABLE `development_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_category`
--
ALTER TABLE `payment_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_purpose`
--
ALTER TABLE `payment_purpose`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pta`
--
ALTER TABLE `pta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_payment_details`
--
ALTER TABLE `p_payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_fee`
--
ALTER TABLE `school_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_payment_details`
--
ALTER TABLE `s_payment_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `development_fee`
--
ALTER TABLE `development_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment_category`
--
ALTER TABLE `payment_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payment_purpose`
--
ALTER TABLE `payment_purpose`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pta`
--
ALTER TABLE `pta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `p_payment_details`
--
ALTER TABLE `p_payment_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `school_fee`
--
ALTER TABLE `school_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `s_payment_details`
--
ALTER TABLE `s_payment_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

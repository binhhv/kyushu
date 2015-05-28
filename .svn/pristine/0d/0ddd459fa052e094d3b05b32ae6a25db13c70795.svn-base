-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2015 at 03:28 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kir772876_kyushu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci,
  `password` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admintest');

-- --------------------------------------------------------

--
-- Table structure for table `airdata`
--

CREATE TABLE IF NOT EXISTS `airdata` (
`id` int(11) NOT NULL,
  `month` text COLLATE utf8_unicode_ci,
  `year` text COLLATE utf8_unicode_ci,
  `airdata` text COLLATE utf8_unicode_ci,
  `airdataold` text COLLATE utf8_unicode_ci,
  `unit` text COLLATE utf8_unicode_ci,
  `idmonitor` text COLLATE utf8_unicode_ci,
  `namesearch` text COLLATE utf8_unicode_ci,
  `flag` int(11) DEFAULT NULL,
  `dateregister` text COLLATE utf8_unicode_ci,
  `dateupdate` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `airdata`
--

INSERT INTO `airdata` (`id`, `month`, `year`, `airdata`, `airdataold`, `unit`, `idmonitor`, `namesearch`, `flag`, `dateregister`, `dateupdate`) VALUES
(1, '05', '2015', '0.0001', '0.0936', 'μSv/h', 'mon00', 'mon00_201505_air.csv', 2, '2015/05/28 PM02:37', '2015/05/28 PM03:18'),
(3, '05', '2015', '0.0936', NULL, 'μSv/h', 'mon01', 'mon01_201505_air.csv', 1, '2015/05/28 PM02:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `airspacedata`
--

CREATE TABLE IF NOT EXISTS `airspacedata` (
`id` int(11) NOT NULL,
  `month` text COLLATE utf8_unicode_ci,
  `year` text COLLATE utf8_unicode_ci,
  `airspacedata` text COLLATE utf8_unicode_ci,
  `airspacedataold` text COLLATE utf8_unicode_ci,
  `unit` text COLLATE utf8_unicode_ci,
  `idmonitor` text COLLATE utf8_unicode_ci,
  `namesearch` text COLLATE utf8_unicode_ci,
  `flag` int(11) DEFAULT NULL,
  `dateregister` text COLLATE utf8_unicode_ci,
  `dateupdate` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `airspacedata`
--

INSERT INTO `airspacedata` (`id`, `month`, `year`, `airspacedata`, `airspacedataold`, `unit`, `idmonitor`, `namesearch`, `flag`, `dateregister`, `dateupdate`) VALUES
(1, '05', '2015', '0.0222', '0.0222', 'μSv/h', 'mon00', 'mon00_201505_space.csv', 2, '2015/05/28 PM02:56', '2015/05/28 PM03:28');

-- --------------------------------------------------------

--
-- Table structure for table `avgmonitoringdate`
--

CREATE TABLE IF NOT EXISTS `avgmonitoringdate` (
`id` int(11) NOT NULL,
  `day` date DEFAULT NULL,
  `monitoringdata` text COLLATE utf8_unicode_ci,
  `unit` text COLLATE utf8_unicode_ci,
  `idmonitor` text COLLATE utf8_unicode_ci,
  `namesearch` text COLLATE utf8_unicode_ci,
  `nameavgmonth` text COLLATE utf8_unicode_ci,
  `flag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `avgmonitoringmonth`
--

CREATE TABLE IF NOT EXISTS `avgmonitoringmonth` (
`id` int(11) NOT NULL,
  `month` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `monitoringdata` text COLLATE utf8_unicode_ci,
  `unit` text COLLATE utf8_unicode_ci,
  `idmonitor` text COLLATE utf8_unicode_ci,
  `namesearch` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `monitoringdata`
--

CREATE TABLE IF NOT EXISTS `monitoringdata` (
`id` int(11) NOT NULL,
  `day` date DEFAULT NULL,
  `hour` text COLLATE utf8_unicode_ci,
  `monitoringdata` text COLLATE utf8_unicode_ci,
  `monitoringdataold` text COLLATE utf8_unicode_ci,
  `unit` text COLLATE utf8_unicode_ci,
  `idmonitor` text COLLATE utf8_unicode_ci,
  `namesearch` text COLLATE utf8_unicode_ci,
  `flag` int(11) DEFAULT NULL,
  `dateregister` text COLLATE utf8_unicode_ci,
  `dateupdate` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=264 ;

--
-- Dumping data for table `monitoringdata`
--

INSERT INTO `monitoringdata` (`id`, `day`, `hour`, `monitoringdata`, `monitoringdataold`, `unit`, `idmonitor`, `namesearch`, `flag`, `dateregister`, `dateupdate`) VALUES
(249, '2013-04-01', '00', '0.0943', NULL, 'μSv/h', 'mon01', 'mon00_20130407_03.csv', 1, '2015/01/15 AM10:57', NULL),
(248, '2013-04-02', '01', '0.0951', NULL, 'μSv/h', 'mon01', 'mon00_20130407_02.csv', 1, '2015/01/15 AM10:57', NULL),
(247, '2013-04-03', '01', '0.0997', NULL, 'μSv/h', 'mon01', 'mon00_20130407_01.csv', 1, '2015/01/15 AM10:57', NULL),
(246, '2013-04-04', '01', '0.112', NULL, 'μSv/h', 'mon01', 'mon00_20130407_00.csv', 1, '2015/01/15 AM10:57', NULL),
(245, '2014-04-05', '01', '0.0938', NULL, 'μSv/h', 'mon01', 'mon00_20141126_04.csv', 1, '2015/01/15 AM10:57', NULL),
(244, '2014-04-06', '01', '0.0937', NULL, 'μSv/h', 'mon01', 'mon00_20141126_03.csv', 1, '2015/01/15 AM10:57', NULL),
(243, '2014-04-07', '01', '0.094', NULL, 'μSv/h', 'mon01', 'mon00_20141126_02.csv', 1, '2015/01/15 AM10:57', NULL),
(242, '2014-04-08', '01', '0.0935', NULL, 'μSv/h', 'mon01', 'mon00_20141126_01.csv', 1, '2015/01/15 AM10:57', NULL),
(241, '2014-04-09', '01', '0.0939', NULL, 'μSv/h', 'mon01', 'mon00_20141126_00.csv', 1, '2015/01/15 AM10:57', NULL),
(240, '2014-04-10', '01', '0.0931', NULL, 'μSv/h', 'mon01', 'mon00_20141225_14.csv', 1, '2014/12/26 AM10:55', NULL),
(239, '2013-04-11', '01', '0.0936', NULL, 'μSv/h', 'mon01', 'mon00_20130402_18.csv', 1, '2014/12/02 PM12:16', NULL),
(238, '2013-04-12', '01', '0.0948', NULL, 'μSv/h', 'mon01', 'mon01_20130407_06.csv', 1, '2014/12/02 AM02:21', NULL),
(236, '2013-04-13', '01', '0.0944', NULL, 'μSv/h', 'mon01', 'mon01_20130407_04.csv', 1, '2014/12/02 AM02:21', NULL),
(237, '2013-04-14', '01', '0.0947', NULL, 'μSv/h', 'mon01', 'mon01_20130407_05.csv', 1, '2014/12/02 AM02:21', NULL),
(234, '2013-04-15', '01', '0.0951', NULL, 'μSv/h', 'mon01', 'mon01_20130407_02.csv', 1, '2014/12/02 AM02:21', NULL),
(235, '2013-04-16', '00', '0.0943', NULL, 'μSv/h', 'mon01', 'mon01_20130407_03.csv', 1, '2014/12/02 AM02:21', NULL),
(233, '2013-04-17', '00', '0.0997', NULL, 'μSv/h', 'mon01', 'mon01_20130407_01.csv', 1, '2014/12/02 AM02:21', NULL),
(232, '2013-04-18', '00', '0.112', NULL, 'μSv/h', 'mon01', 'mon01_20130407_00.csv', 1, '2014/12/02 AM02:21', NULL),
(250, '2013-04-19', '00', '0.0944', NULL, 'μSv/h', 'mon01', 'mon00_20130407_04.csv', 1, '2015/01/15 AM10:57', NULL),
(251, '2013-04-20', '00', '0.0947', NULL, 'μSv/h', 'mon01', 'mon00_20130407_05.csv', 1, '2015/01/15 AM10:57', NULL),
(252, '2013-04-21', '00', '0.0948', NULL, 'μSv/h', 'mon01', 'mon00_20130407_06.csv', 1, '2015/01/15 AM10:57', NULL),
(253, '2013-04-22', '00', '0.0939', NULL, 'μSv/h', 'mon01', 'mon00_20150115_00.csv', 1, '2015/01/15 AM11:09', NULL),
(254, '2013-04-23', '00', '0.0935', NULL, 'μSv/h', 'mon01', 'mon00_20150115_01.csv', 1, '2015/01/15 AM11:09', NULL),
(255, '2013-04-24', '00', '0.094', NULL, 'μSv/h', 'mon01', 'mon00_20150115_02.csv', 1, '2015/01/15 AM11:09', NULL),
(256, '2013-04-25', '00', '0.0937', NULL, 'μSv/h', 'mon01', 'mon00_20150115_03.csv', 1, '2015/01/15 AM11:09', NULL),
(257, '2015-01-15', '04', '0.0938', NULL, 'μSv/h', 'mon00', 'mon00_20150115_04.csv', 1, '2015/01/15 AM11:09', NULL),
(258, '2015-01-15', '14', '0.0931', NULL, 'μSv/h', 'mon00', 'mon00_20150115_14.csv', 1, '2015/01/15 AM11:09', NULL),
(259, '2015-02-04', '11', '0.0936', NULL, 'μSv/h', 'mon00', 'mon00_20150204_11.csv', 1, '2015/02/04 PM01:52', NULL),
(260, '2015-02-04', '11', '0.0931', NULL, 'μSv/h', 'mon01', 'mon01_20150204_11.csv', 1, '2015/02/04 PM01:55', NULL),
(261, '2015-02-04', '12', '0.09', NULL, 'μSv/h', 'mon01', 'mon01_20150204_12.csv', 1, '2015/02/04 PM01:58', NULL),
(262, '2015-02-04', '12', '0.0936', NULL, 'μSv/h', 'mon00', 'mon00_20150204_12.csv', 1, '2015/02/04 PM02:14', NULL),
(263, '2015-02-04', '13', '0.09', NULL, 'μSv/h', 'mon01', 'mon01_20150204_13.csv', 1, '2015/02/04 PM02:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pointmonitoring`
--

CREATE TABLE IF NOT EXISTS `pointmonitoring` (
  `namepoint` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pointmonitoring`
--

INSERT INTO `pointmonitoring` (`namepoint`) VALUES
('mon02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `airdata`
--
ALTER TABLE `airdata`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `airspacedata`
--
ALTER TABLE `airspacedata`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avgmonitoringdate`
--
ALTER TABLE `avgmonitoringdate`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avgmonitoringmonth`
--
ALTER TABLE `avgmonitoringmonth`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monitoringdata`
--
ALTER TABLE `monitoringdata`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `airdata`
--
ALTER TABLE `airdata`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `airspacedata`
--
ALTER TABLE `airspacedata`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `avgmonitoringdate`
--
ALTER TABLE `avgmonitoringdate`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `avgmonitoringmonth`
--
ALTER TABLE `avgmonitoringmonth`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `monitoringdata`
--
ALTER TABLE `monitoringdata`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=264;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2025 at 02:25 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `demo`
--
CREATE DATABASE `demo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `demo`;

-- --------------------------------------------------------

--
-- Table structure for table `home_slider`
--

CREATE TABLE IF NOT EXISTS `home_slider` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(12) NOT NULL,
  `status` varchar(1) NOT NULL,
  `updateOn` datetime NOT NULL,
  `userid` varchar(20) NOT NULL,
  `removeOn` datetime DEFAULT NULL,
  `userid2` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`sl`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `home_slider`
--

INSERT INTO `home_slider` (`sl`, `id`, `status`, `updateOn`, `userid`, `removeOn`, `userid2`) VALUES
(1, '251014173057', 'd', '2025-10-14 17:30:57', 'admin', '2025-10-14 17:31:30', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `work_group`
--

CREATE TABLE IF NOT EXISTS `work_group` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(12) NOT NULL,
  `title` varchar(30) NOT NULL,
  `bgpic` varchar(20) DEFAULT NULL,
  `status` varchar(1) NOT NULL,
  `updateOn` datetime NOT NULL,
  `userid` varchar(20) NOT NULL,
  `removeOn` datetime DEFAULT NULL,
  `userid2` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`sl`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `work_group`
--

INSERT INTO `work_group` (`sl`, `id`, `title`, `bgpic`, `status`, `updateOn`, `userid`, `removeOn`, `userid2`) VALUES
(2, '251005202631', 'OFFICE', '251005202631', 'y', '2025-10-05 20:26:31', 'aminmehedi', NULL, NULL),
(3, '251005202657', 'SCULPTURE', '251005202657', 'y', '2025-10-05 20:26:57', 'aminmehedi', NULL, NULL),
(4, '251005202755', 'FACADE', '251005202755', 'd', '2025-10-05 20:27:55', 'aminmehedi', '2025-10-09 18:49:30', 'admin'),
(5, '251005202911', 'ART CONCERT', '251005202911', 'y', '2025-10-05 20:29:11', 'aminmehedi', '2025-10-05 20:34:43', 'aminmehedi'),
(6, '251005202923', 'LANDSCAPING', '251005202923', 'y', '2025-10-05 20:29:23', 'aminmehedi', NULL, NULL),
(7, '251005202936', 'METAL FABRICATION', '251005202936', 'y', '2025-10-05 20:29:36', 'aminmehedi', NULL, NULL),
(8, '251005203014', 'WOODEN CNC & METAL CNC', '251005203014', 'y', '2025-10-05 20:30:14', 'aminmehedi', NULL, NULL),
(9, '251005203137', 'RESIDENCE', '251005203137', 'y', '2025-10-05 20:31:37', 'aminmehedi', NULL, NULL),
(10, '251013122622', 'TOUFIQ', '251013125941', 'y', '2025-10-13 12:59:41', 'aminmehedi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE IF NOT EXISTS `works` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `work` varchar(30) NOT NULL,
  `client` varchar(30) NOT NULL,
  `id` varchar(12) NOT NULL,
  `intro` varchar(12) NOT NULL,
  `details` varchar(500) DEFAULT NULL,
  `status` varchar(1) NOT NULL,
  `updateOn` datetime NOT NULL,
  `userid` varchar(20) NOT NULL,
  `removeOn` datetime DEFAULT NULL,
  `userid2` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`sl`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `work` (`work`,`client`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`sl`, `work`, `client`, `id`, `intro`, `details`, `status`, `updateOn`, `userid`, `removeOn`, `userid2`) VALUES
(2, 'OFFICE', 'TUHEEN & ASSOCIATES', '251005212521', '251006011157', NULL, 'y', '2025-10-06 01:11:57', 'aminmehedi', NULL, NULL),
(3, 'OFFICE', 'FOURSQUARE', '251009185300', '251009185300', 'asdfasd', 'y', '2025-10-09 18:53:00', 'admin', NULL, NULL),
(4, 'METAL FABRICATION', 'INAN', '251009201100', '251009201100', 'personal', 'y', '2025-10-09 20:11:00', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `works_details`
--

CREATE TABLE IF NOT EXISTS `works_details` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(12) NOT NULL COMMENT 'work id',
  `pic` varchar(12) NOT NULL,
  `status` varchar(1) NOT NULL,
  `updateOn` datetime NOT NULL,
  `userid` varchar(20) NOT NULL,
  `removeOn` datetime DEFAULT NULL,
  `userid2` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`sl`),
  UNIQUE KEY `id` (`id`,`pic`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `works_details`
--

INSERT INTO `works_details` (`sl`, `id`, `pic`, `status`, `updateOn`, `userid`, `removeOn`, `userid2`) VALUES
(1, '251005212521', '251006014916', 'y', '2025-10-06 01:49:16', 'aminmehedi', NULL, NULL),
(2, '251005212521', '251006014917', 'y', '2025-10-06 01:49:17', 'aminmehedi', NULL, NULL),
(3, '251005212521', '251006014918', 'y', '2025-10-06 01:49:18', 'aminmehedi', NULL, NULL),
(4, '251005212521', '251006014919', 'y', '2025-10-06 01:49:19', 'aminmehedi', NULL, NULL),
(5, '251005212521', '251006014920', 'y', '2025-10-06 01:49:20', 'aminmehedi', NULL, NULL),
(6, '251005212521', '251006014921', 'y', '2025-10-06 01:49:21', 'aminmehedi', NULL, NULL),
(7, '251005212521', '251006014922', 'y', '2025-10-06 01:49:22', 'aminmehedi', NULL, NULL),
(8, '251005212521', '251006014923', 'y', '2025-10-06 01:49:23', 'aminmehedi', NULL, NULL),
(9, '251005212521', '251006014924', 'y', '2025-10-06 01:49:24', 'aminmehedi', NULL, NULL),
(10, '251005212521', '251006014925', 'y', '2025-10-06 01:49:25', 'aminmehedi', NULL, NULL),
(11, '251005212521', '251006014926', 'y', '2025-10-06 01:49:26', 'aminmehedi', NULL, NULL),
(12, '251005212521', '251006014927', 'y', '2025-10-06 01:49:27', 'aminmehedi', NULL, NULL),
(13, '251005212521', '251006014928', 'y', '2025-10-06 01:49:28', 'aminmehedi', NULL, NULL),
(14, '251005212521', '251006014929', 'y', '2025-10-06 01:49:29', 'aminmehedi', NULL, NULL),
(15, '251005212521', '251006014930', 'y', '2025-10-06 01:49:30', 'aminmehedi', NULL, NULL),
(16, '251005212521', '251006014931', 'y', '2025-10-06 01:49:31', 'aminmehedi', NULL, NULL),
(17, '251005212521', '251006014932', 'y', '2025-10-06 01:49:32', 'aminmehedi', NULL, NULL),
(18, '251005212521', '251006014933', 'y', '2025-10-06 01:49:33', 'aminmehedi', NULL, NULL),
(19, '251009185300', '251009185554', 'y', '2025-10-09 18:55:54', 'admin', NULL, NULL),
(20, '251009201100', '251009201122', 'y', '2025-10-09 20:11:22', 'admin', NULL, NULL),
(21, '251009201100', '251009201132', 'y', '2025-10-09 20:11:32', 'admin', NULL, NULL);

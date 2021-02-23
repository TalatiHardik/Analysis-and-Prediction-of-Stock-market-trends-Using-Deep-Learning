-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 14, 2019 at 06:38 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

DROP TABLE IF EXISTS `details`;
CREATE TABLE IF NOT EXISTS `details` (
  `username` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `subType` varchar(255) NOT NULL,
  `payType` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`username`, `firstName`, `lastName`, `contact`, `address`, `subType`, `payType`) VALUES
('gjariwala9', 'Gaurav', 'Jariwala', '9876543210', 'Surat', 'standard', 'cc');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `name` varchar(255) NOT NULL,
  `catagory` varchar(255) NOT NULL,
  `shortName` varchar(255) NOT NULL,
  `train` tinyint(1) NOT NULL,
  `test` tinyint(1) NOT NULL,
  `predicted` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`name`, `catagory`, `shortName`, `train`, `test`, `predicted`) VALUES
('State Bank Of India', 'Government', 'SBI', 1, 1, 0),
('Google', 'Industry', 'Google', 1, 1, 1),
('Asian Paint', 'Industry', 'asian_paint', 1, 1, 1),
('Hero', 'Industry', 'hero', 1, 1, 1),
('Hindustan Zinc', 'Industry', 'hzinc', 1, 1, 1),
('ITC', 'Industry', 'ITC', 1, 1, 1),
('L&T', 'Industry', 'lt', 1, 1, 1),
('Tech Mahindra', 'Industry', 'Mahindra', 1, 1, 1),
('Oil and Natural Gas Corporation', 'Industry', 'ongc', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(9999) NOT NULL,
  `email` varchar(9999) NOT NULL,
  `password` varchar(9999) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`) VALUES
('gjariwala9', 'gjariwala9@gmail.com', '202cb962ac59075b964b07152d234b70');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

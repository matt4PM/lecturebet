-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 27, 2015 at 09:46 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bettingSite`
--

-- --------------------------------------------------------

--
-- Table structure for table `bets`
--

CREATE TABLE IF NOT EXISTS `bets` (
  `userID` int(11) NOT NULL,
  `thingID` int(11) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `transactionID` int(11) NOT NULL,
  `counted` int(11) NOT NULL,
  UNIQUE KEY `transactionID` (`transactionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bets`
--

INSERT INTO `bets` (`userID`, `thingID`, `timeStamp`, `transactionID`, `counted`) VALUES
(1, 1, '2015-03-27 09:17:40', 1, 2),
(3, 1, '2015-03-27 09:23:00', 13, 2),
(3, 1, '2015-03-27 09:40:56', 14, 2),
(3, 1, '2015-03-27 09:42:28', 16, 1),
(3, 1, '2015-03-27 10:05:49', 18, 1),
(4, 1, '2015-03-27 10:47:57', 20, 2),
(4, 1, '2015-03-27 10:48:53', 23, 2),
(6, 1, '2015-03-27 11:00:31', 26, 2),
(4, 1, '2015-03-27 11:28:53', 27, 1),
(4, 1, '2015-03-27 11:33:36', 31, 2),
(4, 1, '2015-03-27 11:34:38', 32, 2),
(5, 1, '2015-03-28 00:57:43', 35, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lectureActive`
--

CREATE TABLE IF NOT EXISTS `lectureActive` (
  `lectureName` text NOT NULL,
  `state` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lectureActive`
--

INSERT INTO `lectureActive` (`lectureName`, `state`) VALUES
('foundations', 'active'),
('webdesign', 'active'),
('programing', 'active'),
('comunications', 'disabled');

-- --------------------------------------------------------

--
-- Table structure for table `things`
--

CREATE TABLE IF NOT EXISTS `things` (
  `lectureName` varchar(100) NOT NULL,
  `thingID` int(11) NOT NULL AUTO_INCREMENT,
  `subtitle` text NOT NULL,
  `thingTitle` text NOT NULL,
  `odds` float NOT NULL,
  PRIMARY KEY (`thingID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `things`
--

INSERT INTO `things` (`lectureName`, `thingID`, `subtitle`, `thingTitle`, `odds`) VALUES
('foundations', 1, 'something', 'something', 1.4);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `transactionID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `transactionTitle` varchar(1012) NOT NULL,
  `type` char(1) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`transactionID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transactionID`, `userID`, `transactionTitle`, `type`, `amount`, `date`) VALUES
(1, 3, 'Welcome', 'C', 500, NULL),
(11, 3, 'You placed a bet', 'D', 22, '2015-03-27 09:21:20'),
(12, 3, 'You placed a bet', 'D', 22, '2015-03-27 09:21:52'),
(13, 3, 'You placed a bet', 'D', 22, '2015-03-27 09:23:00'),
(14, 3, 'You placed a bet', 'D', 22, '2015-03-27 09:40:56'),
(15, 3, 'You won a bet', 'C', 31, '2015-03-27 09:42:05'),
(16, 3, 'You placed a bet', 'D', 22, '2015-03-27 09:42:28'),
(17, 3, 'You won a bet', 'C', 31, '2015-03-27 09:42:37'),
(18, 3, 'You placed a bet', 'D', 22, '2015-03-27 10:05:49'),
(19, 4, 'Welcome', 'C', 500, '2015-03-27 10:47:24'),
(20, 4, 'You placed a bet', 'D', 22, '2015-03-27 10:47:57'),
(21, 3, 'You won a bet', 'C', 31, '2015-03-27 10:48:37'),
(22, 4, 'You won a bet', 'C', 31, '2015-03-27 10:48:37'),
(23, 4, 'You placed a bet', 'D', 22, '2015-03-27 10:48:53'),
(24, 5, 'Welcome', 'C', 500, '2015-03-27 10:53:08'),
(25, 6, 'Welcome', 'C', 500, '2015-03-27 10:57:55'),
(26, 6, 'You placed a bet', 'D', 1, '2015-03-27 11:00:31'),
(27, 4, 'You placed a bet', 'D', 24, '2015-03-27 11:28:53'),
(28, 4, 'You won a bet', 'C', 31, '2015-03-27 11:29:02'),
(29, 6, 'You won a bet', 'C', 1, '2015-03-27 11:29:02'),
(30, 4, 'You won a bet', 'C', 34, '2015-03-27 11:29:02'),
(31, 4, 'You placed a bet', 'D', 22, '2015-03-27 11:33:36'),
(32, 4, 'You placed a bet', 'D', 22, '2015-03-27 11:34:38'),
(33, 4, 'You won a bet', 'C', 31, '2015-03-27 11:34:41'),
(34, 7, 'Welcome', 'C', 500, '2015-03-27 22:24:42'),
(35, 5, 'You placed a bet', 'D', 22, '2015-03-28 00:57:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1012) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `name`) VALUES
(1, 'Matt'),
(2, 'Matt'),
(3, 'Matt'),
(4, 'Matt'),
(5, 'Matt'),
(6, 'SleepingTurtle'),
(7, 'SleepingTurtle');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

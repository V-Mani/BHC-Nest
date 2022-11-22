-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 20, 2020 at 07:05 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `socialnetwork`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(50) NOT NULL,
  `psw` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `psw`) VALUES
('admin', '11');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `loc` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `desc` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `loc`, `date`, `desc`, `img`) VALUES
(1, 'test', 'trichy', '2020-03-23', 'test description', 'cabletv.sql');

-- --------------------------------------------------------

--
-- Table structure for table `friendship`
--

CREATE TABLE `friendship` (
  `user1_id` int(11) NOT NULL,
  `user2_id` int(11) NOT NULL,
  `friendship_status` int(11) NOT NULL,
  KEY `user1_id` (`user1_id`),
  KEY `user2_id` (`user2_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friendship`
--


-- --------------------------------------------------------

--
-- Table structure for table `group1`
--

CREATE TABLE `group1` (
  `id` int(5) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `msg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group1`
--

INSERT INTO `group1` (`id`, `uid`, `class`, `msg`) VALUES
(1, '1', '3 bca a', 'hi To All'),
(2, '1', '3 bca a', 'How R u all'),
(3, '1', '3 bca a', 'How R u all');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(5) NOT NULL,
  `caption` varchar(100) NOT NULL,
  `date` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `uid` varchar(5) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `caption`, `date`, `type`, `uid`, `img`) VALUES
(1, 'fgdjfugjty', '17/03/2020', 'public', '1', 'admin.png'),
(2, 'fgdjfugjty', '18/03/2020', 'public', '1', 'admin.png'),
(3, 'wserdgtert', '18/03/2020', 'Private', '1', 'admin.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL auto_increment,
  `user_firstname` varchar(20) NOT NULL,
  `user_lastname` varchar(20) NOT NULL,
  `user_nickname` varchar(20) default NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_gender` char(1) NOT NULL,
  `user_birthdate` date NOT NULL,
  `user_status` char(1) default NULL,
  `user_about` text,
  `user_hometown` varchar(255) default NULL,
  `dept` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `img` varchar(100) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `user_nickname`, `user_password`, `user_email`, `user_gender`, `user_birthdate`, `user_status`, `user_about`, `user_hometown`, `dept`, `class`, `img`) VALUES
(1, 'vinoth', 'kumar', 'vino', '698d51a19d8a121ce581499d7b701668', 'vinotht1216@gmail.com', 'M', '1999-03-23', 'S', 'trichy', 'trichy', 'computer Application', '3 bca a', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_phone`
--

CREATE TABLE `user_phone` (
  `user_id` int(11) default NULL,
  `user_phone` int(11) default NULL,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_phone`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `friendship`
--
ALTER TABLE `friendship`
  ADD CONSTRAINT `friendship_ibfk_1` FOREIGN KEY (`user1_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `friendship_ibfk_2` FOREIGN KEY (`user2_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `user_phone`
--
ALTER TABLE `user_phone`
  ADD CONSTRAINT `user_phone_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

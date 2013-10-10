-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 09, 2013 at 09:26 AM
-- Server version: 5.5.32-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `learnsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE IF NOT EXISTS `forums` (
  `forum_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`forum_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`forum_id`, `name`) VALUES
(1, 'MySQL'),
(2, 'PHP'),
(3, 'Sports'),
(4, 'HTML'),
(5, 'CSS'),
(6, 'Kindling');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `forum_id` tinyint(3) unsigned NOT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  `user_id` mediumint(8) unsigned NOT NULL,
  `subject` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `body` longtext COLLATE latin1_general_ci NOT NULL,
  `date_entered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `forum_id`, `parent_id`, `user_id`, `subject`, `body`, `date_entered`) VALUES
(1, 1, 0, 1, 'Question about\r\n normalization.', 'I''m confused\r\n about normalization. For the second\r\n normal form (2NF), I read...', '2013-07-15 08:30:20'),
(2, 1, 0, 2, 'Database Design', 'I''m\r\n creating a new database and am\r\n having problems with the structure.\r\n How many tables should I have?...', '2013-07-15 08:30:20'),
(3, 1, 2, 1, 'Database Design', 'The\r\n number of tables your database\r\n includes...', '2013-07-15 08:30:20'),
(4, 1, 3, 2, 'Database Design', 'Okay,\r\n thanks!', '2013-07-15 08:30:20'),
(5, 2, 0, 3, 'PHP Errors', 'I''m using\r\n the scripts from Chapter 3 and I\r\n can''t get the first calculator\r\n example to work. When I submit the\r\n form...', '2013-07-15 08:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE IF NOT EXISTS `quotes` (
  `user_id` mediumint(8) unsigned NOT NULL,
  `text` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`user_id`, `text`, `creation_date`) VALUES
(22, 'Byrzata kuchka slepi gi rajda', '2013-07-31 13:11:01'),
(29, 'Ga qdi kiftetta ni riva...', '2013-08-01 02:38:07'),
(29, 'Da bi mirno sedqlo, ne bi chudo vidqlo!', '2013-08-01 08:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `shoutbox`
--

CREATE TABLE IF NOT EXISTS `shoutbox` (
  `message_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` tinyint(3) unsigned NOT NULL,
  `timestamp` datetime NOT NULL,
  `subject` varchar(100) NOT NULL,
  `body` varchar(500) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `pass` char(40) COLLATE latin1_general_ci DEFAULT NULL,
  `first_name` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `last_name` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `registration_date` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=35 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `pass`, `first_name`, `last_name`, `email`, `registration_date`) VALUES
(29, '', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 'pass', 'pass', 'pass', '2013-07-31 06:25:13'),
(22, '', '5e034d534edd3a5d9ab358a9536bd6f0b731f7ef', 'opatropa', 'opa', 'opa@abv.bg', '2013-07-22 07:41:22'),
(3, 'Gareth', '0d73e0a895b147446cba85df36b3e7d1e4ecec97', 'Gareth', 'Keenan', 'gk@example.com', '0000-00-00 00:00:00'),
(10, '', '85136c79cbf9fe36bb9d05d0639c70c265c18d37', 'probo', 'probov', 'proba@proba.pro', '2013-07-17 07:44:26'),
(9, '', '3be5f6058e8642a7e454ec27b7f13f03d7ab8c1d', 'Dodo', 'Dodov', 'dodo@dodo.dod', '2013-07-17 06:57:51'),
(15, '', '417532b2c2c27c35ff441f370bce1b0ea0af2911', 'az', 'toi', 'ivanski@gbg.bg', '2013-07-18 07:00:22'),
(17, '', 'f10e2821bbbea527ea02200352313bc059445190', 'asd1', 'asd1', 'asd@asd', '2013-07-19 09:02:22'),
(18, '', 'bfc896e1ecd35d326871e60c70649a1e99571ffa', 'dfg', 'dfgd', 'fgdfgdfg', '2013-07-22 06:42:27'),
(19, '', '046827b58f128d5f522134b9c4ac3c6d68377055', 'ghjghj', 'ghjghjg', 'ghjghj', '2013-07-22 06:42:35'),
(26, '', 'fc23764ac5b792f40bb1a00c0e3284e45f3f49c0', 'qqq1', 'qqq2', 'qqq@qqq', '2013-07-30 07:05:23'),
(21, '', '4c1b52409cf6be3896cf163fa17b32e4da293f2e', '7777771', '6666661', '767676', '2013-07-22 06:43:07'),
(23, '', '5f327584e555fdf0bb09d6b964b57f156a41364e', 'dod', 'dod', 'dod@dod', '2013-07-23 08:32:05'),
(24, '', 'fc23764ac5b792f40bb1a00c0e3284e45f3f49c0', 'pop', 'popop', 'pop@pop', '2013-07-26 06:35:07'),
(25, '', 'fc23764ac5b792f40bb1a00c0e3284e45f3f49c0', 'popp', 'popop', 'oop@oop', '2013-07-29 01:54:41'),
(28, '', 'fc23764ac5b792f40bb1a00c0e3284e45f3f49c0', 'user1', 'user2', 'user', '2013-07-31 06:19:12'),
(30, NULL, NULL, 'proba1', 'proba2', 'pr@pr', '2013-09-04 13:22:01'),
(31, NULL, NULL, 'Dodo', 'Dodov', 'ddobrev81@gmail.com', '2013-09-05 04:10:12'),
(32, NULL, NULL, 'Dodo', 'Dodov', 'ddobrev81@gmail.com', '2013-09-05 04:15:17'),
(33, NULL, 'dcb19ff84086fedbc4e01881080cb7d58c40a387', 'poo', 'poo', 'poo@poo', '2013-10-02 16:26:07'),
(34, NULL, 'c75f281f8968158c5bf07e6164f548d999fc364c', 'Ivaylo', 'Ivanov', 'fornoone@abv.bg', '2013-10-08 09:43:08');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

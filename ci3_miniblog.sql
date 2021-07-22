-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:4306
-- Generation Time: Jul 22, 2021 at 05:46 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci3_miniblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `blogid` int(11) NOT NULL,
  `blog_title` longtext,
  `blog_desc` text,
  `blog_img` varchar(300) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>published 0=>unpublished',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Stores Blog Data';

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`blogid`, `blog_title`, `blog_desc`, `blog_img`, `status`, `created_on`, `updated_on`) VALUES
(23, 'bb', 'bbbb', 'assets/upload/blogimg/03069_inferno_1920x1408.jpg', 1, '2020-05-08 08:01:54', '2020-05-08 09:06:41'),
(24, 'dddd', 'uuuuuuu123', 'assets/upload/blogimg/Natural_Wilderness_by_Shane66.jpg', 1, '2020-05-08 08:02:07', '2020-05-08 09:33:38'),
(25, 'aa', 'aaa123', 'assets/upload/blogimg/en-face_wallpapers_(2).jpg', 1, '2020-05-11 01:32:30', '2020-05-12 09:54:11');

-- --------------------------------------------------------

--
-- Table structure for table `backenduser`
--

CREATE TABLE `backenduser` (
  `uid` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '1=>Active 0=>Blocked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Login for Backend Panel';

--
-- Dumping data for table `backenduser`
--

INSERT INTO `backenduser` (`uid`, `username`, `password`, `status`) VALUES
(1, 'admin', '123', 1),
(2, 'Moon Lay', '123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`blogid`);

--
-- Indexes for table `backenduser`
--
ALTER TABLE `backenduser`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `blogid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `backenduser`
--
ALTER TABLE `backenduser`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

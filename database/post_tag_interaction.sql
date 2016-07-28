-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2016 at 12:07 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fdo_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `post_tag_interaction`
--

CREATE TABLE `post_tag_interaction` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_tag_interaction`
--

INSERT INTO `post_tag_interaction` (`post_id`, `tag_id`) VALUES
(1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post_tag_interaction`
--
ALTER TABLE `post_tag_interaction`
  ADD UNIQUE KEY `post_id_UNIQUE` (`post_id`),
  ADD UNIQUE KEY `tag_id_UNIQUE` (`tag_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post_tag_interaction`
--
ALTER TABLE `post_tag_interaction`
  ADD CONSTRAINT `post_id_interaction` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `tag_id_interaction` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

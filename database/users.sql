-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2016 at 02:43 PM
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(100) DEFAULT NULL,
  `full_name` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `About` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

UPDATE `users` SET `id` = 1,`username` = 'admin',`password_hash` = '$2y$10$QlKthcuYhn.XP/gy5A/OZeQdOzIznqxqOf/qBrSAnGpoW4labIL0W',`full_name` = 'Admin Adminov Adminski',`email` = 'admin@email.com',`About` = '' WHERE `users`.`id` = 1;
UPDATE `users` SET `id` = 2,`username` = 'nakov',`password_hash` = '$2y$10$XViubT.zSoBtskZmKl6kdOX8Yq7T7tLrcrLn/5dkAqbgjVACeFUGe',`full_name` = 'Svetlin Nakov',`email` = 'nakov@email.com',`About` = '' WHERE `users`.`id` = 2;
UPDATE `users` SET `id` = 3,`username` = 'maria',`password_hash` = '$2y$10$gzlpX/N5apTruTBajMJwM.0h9OgLVgQxk6N0YhGy2iY4BI73SYkKO',`full_name` = 'Maria Ivanova',`email` = 'ivanova@email.com',`About` = '' WHERE `users`.`id` = 3;
UPDATE `users` SET `id` = 4,`username` = 'ani',`password_hash` = '$2y$10$9T9bN6ctJ4R.fdnLvzsdQOj0sk4mWqwohILMx60/jP1YEXtJguhD2',`full_name` = 'Ani Kirova',`email` = 'kirova@email.com',`About` = '' WHERE `users`.`id` = 4;
UPDATE `users` SET `id` = 5,`username` = 'joe',`password_hash` = '$2y$10$aIOC0qiNK1mjZdUUbuj/Teh49VI/g9xanuWCNYEUruwcvOGVaXOGK',`full_name` = 'Joe Green',`email` = 'green@email.com',`About` = '' WHERE `users`.`id` = 5;
UPDATE `users` SET `id` = 6,`username` = 'test',`password_hash` = '$2y$10$I5y7X1ZilitEZYOztOI5SuA2rBeRJUj/ZhlgmSZK32LPqaqh3Gy3q',`full_name` = '',`email` = 'test@email.com',`About` = '' WHERE `users`.`id` = 6;
UPDATE `users` SET `id` = 7,`username` = 'it''s security "test"<br>',`password_hash` = '$2y$10$thSx6ceSyCPxdl.BDGLhKe7lQu8d3oopQ/LJYK8ma.Dz6jWbOgj8C',`full_name` = 'it''s security "test"<br>',`email` = 'test1@email.com',`About` = '' WHERE `users`.`id` = 7;
UPDATE `users` SET `id` = 8,`username` = 'vikash',`password_hash` = '$2y$10$Exc5mMcThOlEnXZ2.kAPl.ouBSDl8S0GjD.3vvB6KohMpcgfsLsde',`full_name` = 'Vikash Jain',`email` = 'Jain@email.com',`About` = '' WHERE `users`.`id` = 8;
UPDATE `users` SET `id` = 9,`username` = 'ralka',`password_hash` = '$2y$10$SDjcFUZ9R4LCF4HvGMiaIueLXzRjfocCy3bfUlLEAK/VrJIL1MNcK',`full_name` = 'ralka',`email` = 'ralka@gmail.com',`About` = '' WHERE `users`.`id` = 9;
UPDATE `users` SET `id` = 10,`username` = 'oggy',`password_hash` = '$2y$10$W85qLYDjZuEqLYX/Qx88a.56fvWH6gBNwn4xy27BQya71rETm./Se',`full_name` = 'Ognyan Stanoev',`email` = 'oggy@oggy.com',`About` = '' WHERE `users`.`id` = 10;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

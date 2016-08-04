-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2016 at 11:40 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

DROP DATABASE IF EXISTS `fdo_blog`;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fdo_blog`
--
CREATE DATABASE IF NOT EXISTS `fdo_blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `fdo_blog`;

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comments_count` int(11) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `points_given_by_user` int(11) DEFAULT NULL,
  `Activitycol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `user_id`, `comments_count`, `points`, `points_given_by_user`, `Activitycol`) VALUES
(1, 3, 4, 5, 1, NULL),
(2, 2, 3, 1, 1, NULL),
(3, 9, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(4, 'Affiliate Advertising'),
(1, 'Building Websites'),
(5, 'Copywriting'),
(2, 'Ecommerce'),
(6, 'Freelance Development'),
(3, 'Social Media Marketing');

-- --------------------------------------------------------

--
-- Table structure for table `category_post_interaction`
--

DROP TABLE IF EXISTS `category_post_interaction`;
CREATE TABLE `category_post_interaction` (
  `category_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment_body` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment_body`, `author_id`, `post_id`, `date`) VALUES
(1, 'hello, this is my comment', 1, 1, '2016-07-26 13:26:06'),
(2, 'hi my name is ...', 2, 2, '2016-07-26 13:26:06'),
(5, 'this is great', 3, 3, '2016-07-26 13:27:45'),
(7, 'i like this', 4, 4, '2016-07-26 13:28:42'),
(9, 'potato', 5, 5, '2016-07-26 13:29:27'),
(11, 'i dont like git hub', 6, 6, '2016-07-26 13:30:21');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `views_count` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `date`, `user_id`, `views_count`) VALUES
(1, 'Website Building', '<p>If the internet is a country, then websites are like real estates. I’m hoping by now you have a general understanding that real estates are valuable in the physical world – digital real estates work the same way. By building a website, you’re creating your own plot of online “land.”</p>\n\n<p>You can fill this land with whatever you want, but you have to promote it through social media (and anywhere else you can think of) for this to be successful. When you build traffic to your land, you can sell people whatever you have to offer. In order to build a website, you need a host (i.e <a href="https://uk.godaddy.com/?isc=cjcdplink&iphoneview=1&cvosrc=affiliate.cj.5647096">GoDaddy</a>), a template (i.e <a href="https://wordpress.com/">WordPress</a>), and content.</p>\n\n<p>The first two parts are easy to find, and content is only as difficult as you make it. You can post blogs, items for sale, pictures, videos, or whatever you want. Opening up your own website gives you the potential to make money from the avenues I’m going to mention.</p>\n', '2016-05-22 10:13:37', 2, 1),
(2, 'B2B Marketing', '<p>An online business model I love is utilized by <a href="https://getvoip.com/business/">GetVoiP</a>, an affiliate marketer based in New York. GetVoiP acts as an agent for business communication providers. They maintain updated listings of VoiP providers, including ratings, comparisons, consumer reviews, in-depth knowledge of market and end-user trends, and expert opinions from business professionals on a variety of topics related to business consumers. By not only keeping abreast of news, but providing detailed analysis of products being offered, GetVoiP is able to generate traffic to their site and increase their clout with businesses.</p>\n\n<p>The more online clout you have as a business, the more money you’ll make. If you’re known for making lasting connections (as is the case with GetVoiP above), then you’ll have no issues building your online brand. You’ll be recognized in your community and begin to build a buzz in your industry. Tracking your numbers (how many people view your site, click each ad, and make a purchase from that click) gives you the leverage to expand this part of your business, enabling you to continue building your online rep.</p>\n', '2016-05-20 11:18:26', 8, 0),
(3, 'Google Adsense', '<p>If that sounds like too much technical information for you, there is an easy button – Google’s advertising platform is as simple as signing up, enabling (on Blogger) or pasting a small code on your website, and allowing the advertisements to automatically roll in. The problem with this program is that you don’t get any commissions – and you don’t get to control the ad content. This is useful for some, but powerful users will want something a little more robust.</p>\n', '2016-05-07 11:21:21', 3, 1),
(4, '<p>Amazon Associates', 'Amazon has an Associates program for site owners and bloggers. They offer a search tool to find the right products and services from their site and a variety of ad styles to display on your site, including text-based and banner images (digital billboards) like this:<p>\n\n<p>Each item purchased through your Amazon links give you a commission. It doesn’t take high volume traffic to achieve results, either. I began making money with the program when I only had 1,000 hits per month on my site. They can apply your earnings to your Amazon account balance, issue you a check, or direct deposit into your bank account. If you love Amazon, you’ll love their associate’s program. Click here for another Lifehack dedicated to Amazon Associates.</p>\n', '2016-04-07 11:25:40', 2, 0),
(5, 'Rakuten Linkshare', '<p>Amazon and Google are far from your only options for online advertising. Rakuten Linkshare is a great place to search for other affiliates for your ads. Through their program, you can get customized ad links, email links, and banner ads for Starbucks, Walmart, iTunes, and a slew of other popular brands. With this program, you can also find smaller companies, regional or specialized brands, and more. I run a combination of Google, Amazon, and Rakuten’s programs, and my monthly income is approximately $150 from these programs. It’s not a lot of money, but it’s also not a lot of work for residual (it means recurring…since the ads are permanent…) income.</p>\n', '2016-01-17 11:27:50', 5, 0),
(6, 'Company Referral Programs', '<p>Speaking of the benefits of permanent ads, banners and links aren’t the only ways to earn a little bit of dough off your online endeavors. By having a website, you gain the power of emailing companies to ask them for things. I have no shame in letting the yoga company whose mat I’m looking into purchasing know that I have a blog and write for yoga publications – it sometimes gets me discounts.</p>\n\n<p>Other times, I gain a valuable business contact in PR, advertising, or other aspects of corporate sales. Sometimes I just get a free drink. Either way, money in and of itself is worthless. Ditch the middle man and use the internet to barter what you have and can do for what you need.</p>\n', '2015-11-22 11:57:40', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_tag_interaction`
--

DROP TABLE IF EXISTS `post_tag_interaction`;
CREATE TABLE `post_tag_interaction` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_tag_interaction`
--

INSERT INTO `post_tag_interaction` (`post_id`, `tag_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `tag_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag_name`) VALUES
(5, '#blog'),
(6, '#creativeWriting'),
(3, '#development'),
(4, '#digitalMarketing'),
(1, '#ecommerce');

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
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password_hash`, `full_name`, `email`) VALUES
(1, 'admin', '$2y$10$QlKthcuYhn.XP/gy5A/OZeQdOzIznqxqOf/qBrSAnGpoW4labIL0W', '', 'admin@email.com'),
(2, 'nakov', '$2y$10$XViubT.zSoBtskZmKl6kdOX8Yq7T7tLrcrLn/5dkAqbgjVACeFUGe', 'Svetlin Nakov', 'nakov@email.com'),
(3, 'maria', '$2y$10$gzlpX/N5apTruTBajMJwM.0h9OgLVgQxk6N0YhGy2iY4BI73SYkKO', 'Maria Ivanova', 'ivanova@email.com'),
(4, 'ani', '$2y$10$9T9bN6ctJ4R.fdnLvzsdQOj0sk4mWqwohILMx60/jP1YEXtJguhD2', 'Ani Kirova', 'kirova@email.com'),
(5, 'joe', '$2y$10$aIOC0qiNK1mjZdUUbuj/Teh49VI/g9xanuWCNYEUruwcvOGVaXOGK', 'Joe Green', 'green@email.com'),
(6, 'test', '$2y$10$I5y7X1ZilitEZYOztOI5SuA2rBeRJUj/ZhlgmSZK32LPqaqh3Gy3q', '', 'test@email.com'),
(7, 'it''s security "test"<br>', '$2y$10$thSx6ceSyCPxdl.BDGLhKe7lQu8d3oopQ/LJYK8ma.Dz6jWbOgj8C', 'it''s security "test"<br>', 'test1@email.com'),
(8, 'vikash', '$2y$10$Exc5mMcThOlEnXZ2.kAPl.ouBSDl8S0GjD.3vvB6KohMpcgfsLsde', 'Vikash Jain', 'Jain@email.com'),
(9, 'ralka', '$2y$10$SDjcFUZ9R4LCF4HvGMiaIueLXzRjfocCy3bfUlLEAK/VrJIL1MNcK', 'ralka', 'ralka@gmail.com'),
(10, 'oggy', '$2y$10$W85qLYDjZuEqLYX/Qx88a.56fvWH6gBNwn4xy27BQya71rETm./Se', 'Ognyan Stanoev', 'oggy@oggy.com');

-- --------------------------------------------------------

--
-- Table structure for table `u_g_interaction`
--

DROP TABLE IF EXISTS `u_g_interaction`;
CREATE TABLE `u_g_interaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `u_g_interaction`
--

INSERT INTO `u_g_interaction` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 2),
(4, 4, 2),
(5, 5, 2),
(6, 6, 2),
(7, 7, 2),
(8, 9, 2),
(9, 10, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name_UNIQUE` (`category_name`);

--
-- Indexes for table `category_post_interaction`
--
ALTER TABLE `category_post_interaction`
  ADD UNIQUE KEY `category_id_UNIQUE` (`category_id`),
  ADD UNIQUE KEY `post_id_UNIQUE` (`post_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_posts_idx` (`user_id`);

--
-- Indexes for table `post_tag_interaction`
--
ALTER TABLE `post_tag_interaction`
  ADD UNIQUE KEY `post_id_UNIQUE` (`post_id`),
  ADD UNIQUE KEY `tag_id_UNIQUE` (`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tag_name_UNIQUE` (`tag_name`),
  ADD UNIQUE KEY `tag_name` (`tag_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexes for table `u_g_interaction`
--
ALTER TABLE `u_g_interaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_groups` (`user_id`),
  ADD KEY `fk_groups_users` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `u_g_interaction`
--
ALTER TABLE `u_g_interaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_post_interaction`
--
ALTER TABLE `category_post_interaction`
  ADD CONSTRAINT `cat_name_interaction` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `post_title_interaction` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_users_posts` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `u_g_interaction`
--
ALTER TABLE `u_g_interaction`
  ADD CONSTRAINT `fk_groups_users` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `fk_users_groups` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

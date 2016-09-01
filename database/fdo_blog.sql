-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Server version:               10.1.13-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Версия:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for fdo_blog
DROP DATABASE IF EXISTS `fdo_blog`;
CREATE DATABASE IF NOT EXISTS `fdo_blog` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `fdo_blog`;


-- Dumping structure for table fdo_blog.activity
DROP TABLE IF EXISTS `activity`;
CREATE TABLE IF NOT EXISTS `activity` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comments_count` int(11) DEFAULT NULL,
  `posts_count` int(11) DEFAULT NULL,
  `points_given_by_user` int(11) DEFAULT NULL,
  `Activitycol` varchar(45) DEFAULT NULL,
  KEY `FK_activity_user` (`user_id`),
  CONSTRAINT `FK_activity_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fdo_blog.activity: ~6 rows (approximately)
/*!40000 ALTER TABLE `activity` DISABLE KEYS */;
INSERT INTO `activity` (`id`, `user_id`, `comments_count`, `posts_count`, `points_given_by_user`, `Activitycol`) VALUES
	(1, 3, 4, 5, 1, NULL),
	(0, 11, NULL, NULL, NULL, NULL),
	(0, 12, NULL, NULL, NULL, NULL),
	(0, 13, NULL, NULL, NULL, NULL),
	(0, 14, NULL, NULL, NULL, NULL),
	(0, 15, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `activity` ENABLE KEYS */;


-- Dumping structure for table fdo_blog.category
DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_name_UNIQUE` (`category_name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table fdo_blog.category: ~6 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `category_name`) VALUES
	(4, 'Affiliate_Advertising'),
	(1, 'Building_Websites'),
	(5, 'Copywriting'),
	(2, 'Ecommerce'),
	(6, 'Freelance_ Development'),
	(3, 'Social_Media_Marketing');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;


-- Dumping structure for table fdo_blog.category_post_interaction
DROP TABLE IF EXISTS `category_post_interaction`;
CREATE TABLE IF NOT EXISTS `category_post_interaction` (
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`,`category_id`),
  KEY `FK__category` (`category_id`),
  CONSTRAINT `FK__category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fdo_blog.category_post_interaction: ~7 rows (approximately)
/*!40000 ALTER TABLE `category_post_interaction` DISABLE KEYS */;
INSERT INTO `category_post_interaction` (`post_id`, `category_id`) VALUES
	(2, 1),
	(3, 1),
	(5, 2),
	(6, 2),
	(9, 5),
	(10, 1),
	(11, 4);
/*!40000 ALTER TABLE `category_post_interaction` ENABLE KEYS */;


-- Dumping structure for table fdo_blog.comments
DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_body` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_comment_user_id` (`author_id`),
  KEY `FK_comment_post_id` (`post_id`),
  CONSTRAINT `FK_comment_post_id` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_comment_user_id` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- Dumping data for table fdo_blog.comments: ~4 rows (approximately)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `comment_body`, `author_id`, `post_id`, `date`) VALUES
	(5, 'this is great', 3, 3, '2016-07-26 13:27:45'),
	(9, 'potato', 5, 5, '2016-07-26 13:29:27'),
	(11, 'i dont like git hub', 6, 6, '2016-07-26 13:30:21'),
	(17, 'New comment from Oggy', 10, 6, '2016-08-31 14:49:29');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;


-- Dumping structure for table fdo_blog.deleted_posts
DROP TABLE IF EXISTS `deleted_posts`;
CREATE TABLE IF NOT EXISTS `deleted_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `content` text,
  `post_id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `date_deleted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table fdo_blog.deleted_posts: ~1 rows (approximately)
/*!40000 ALTER TABLE `deleted_posts` DISABLE KEYS */;
INSERT INTO `deleted_posts` (`id`, `title`, `content`, `post_id`, `username`, `user_id`, `date_deleted`) VALUES
	(7, 'One morepost from Roli', 'hugtyjghjbk', 25, 'roli', 18, '2016-09-01 03:38:35');
/*!40000 ALTER TABLE `deleted_posts` ENABLE KEYS */;


-- Dumping structure for table fdo_blog.groups
DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table fdo_blog.groups: ~3 rows (approximately)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `group_name`) VALUES
	(1, 'admin'),
	(2, 'user'),
	(3, 'moderator');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;


-- Dumping structure for table fdo_blog.posts
DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `views_count` int(11) DEFAULT '0',
  `points` int(11) unsigned NOT NULL DEFAULT '0',
  `date_edited` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_users_posts_idx` (`user_id`),
  CONSTRAINT `fk_users_posts` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- Dumping data for table fdo_blog.posts: ~8 rows (approximately)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `title`, `content`, `date`, `user_id`, `views_count`, `points`, `date_edited`) VALUES
	(1, 'new', 'new', '2016-09-01 03:42:01', 1, 0, 0, '2016-09-01 03:42:01'),
	(2, 'B2B Marketing', '<p>An online business model I love is utilized by <a href="https://getvoip.com/business/">GetVoiP</a>, an affiliate marketer based in New York. GetVoiP acts as an agent for business communication providers. They maintain updated listings of VoiP providers, including ratings, comparisons, consumer reviews, in-depth knowledge of market and end-user trends, and expert opinions from business professionals on a variety of topics related to business consumers. By not only keeping abreast of news, but providing detailed analysis of products being offered, GetVoiP is able to generate traffic to their site and increase their clout with businesses.</p>\n\n<p>The more online clout you have as a business, the more money you’ll make. If you’re known for making lasting connections (as is the case with GetVoiP above), then you’ll have no issues building your online brand. You’ll be recognized in your community and begin to build a buzz in your industry. Tracking your numbers (how many people view your site, click each ad, and make a purchase from that click) gives you the leverage to expand this part of your business, enabling you to continue building your online rep.</p>\n', '2016-05-20 11:18:26', 8, 1, 0, '0000-00-00 00:00:00'),
	(3, 'Google Adsense', '<p>If that sounds like too much technical information for you, there is an easy button – Google’s advertising platform is as simple as signing up, enabling (on Blogger) or pasting a small code on your website, and allowing the advertisements to automatically roll in. The problem with this program is that you don’t get any commissions – and you don’t get to control the ad content. This is useful for some, but powerful users will want something a little more robust.</p>\n', '2016-05-07 11:21:21', 3, 2, 0, '0000-00-00 00:00:00'),
	(5, 'Rakuten Linkshare', '<p>Amazon and Google are far from your only options for online advertising. Rakuten Linkshare is a great place to search for other affiliates for your ads. Through their program, you can get customized ad links, email links, and banner ads for Starbucks, Walmart, iTunes, and a slew of other popular brands. With this program, you can also find smaller companies, regional or specialized brands, and more. I run a combination of Google, Amazon, and Rakuten’s programs, and my monthly income is approximately $150 from these programs. It’s not a lot of money, but it’s also not a lot of work for residual (it means recurring…since the ads are permanent…) income.</p>\n', '2016-01-17 11:27:50', 5, 9, 0, '0000-00-00 00:00:00'),
	(6, 'Company Referral Programs', '<p>Speaking of the benefits of permanent ads, banners and links aren’t the only ways to earn a little bit of dough off your online endeavors. By having a website, you gain the power of emailing companies to ask them for things. I have no shame in letting the yoga company whose mat I’m looking into purchasing know that I have a blog and write for yoga publications – it sometimes gets me discounts.</p>\n\n<p>Other times, I gain a valuable business contact in PR, advertising, or other aspects of corporate sales. Sometimes I just get a free drink. Either way, money in and of itself is worthless. Ditch the middle man and use the internet to barter what you have and can do for what you need.</p>\n', '2015-11-22 11:57:40', 5, 60, 2, '0000-00-00 00:00:00'),
	(9, 'Best title', 'How to write the best titles!', '2016-08-23 15:26:30', 1, 0, 0, '0000-00-00 00:00:00'),
	(10, 'Build the best websites', 'Best websites eva!', '2016-08-23 15:27:39', 10, 9, 0, '0000-00-00 00:00:00'),
	(11, 'Sleep is for the weak', 'jhgjvykbhnjkm fghjkl;kjhg hgftjghjl', '2016-08-29 15:47:32', 1, 10, 2, '2016-08-31 13:24:08');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;


-- Dumping structure for table fdo_blog.post_tag_interaction
DROP TABLE IF EXISTS `post_tag_interaction`;
CREATE TABLE IF NOT EXISTS `post_tag_interaction` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`,`tag_id`),
  KEY `FK__tags` (`tag_id`),
  CONSTRAINT `FK__posts_tags` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__tags` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fdo_blog.post_tag_interaction: ~3 rows (approximately)
/*!40000 ALTER TABLE `post_tag_interaction` DISABLE KEYS */;
INSERT INTO `post_tag_interaction` (`post_id`, `tag_id`) VALUES
	(2, 3),
	(3, 4),
	(11, 5);
/*!40000 ALTER TABLE `post_tag_interaction` ENABLE KEYS */;


-- Dumping structure for table fdo_blog.post_user_status
DROP TABLE IF EXISTS `post_user_status`;
CREATE TABLE IF NOT EXISTS `post_user_status` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`,`user_id`),
  KEY `FK__users_status` (`user_id`),
  CONSTRAINT `FK__posts_status` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__users_status` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fdo_blog.post_user_status: ~2 rows (approximately)
/*!40000 ALTER TABLE `post_user_status` DISABLE KEYS */;
INSERT INTO `post_user_status` (`post_id`, `user_id`) VALUES
	(6, 10),
	(11, 1);
/*!40000 ALTER TABLE `post_user_status` ENABLE KEYS */;


-- Dumping structure for table fdo_blog.tags
DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tag_name_UNIQUE` (`tag_name`),
  UNIQUE KEY `tag_name` (`tag_name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table fdo_blog.tags: ~5 rows (approximately)
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` (`id`, `tag_name`) VALUES
	(5, '#blog'),
	(6, '#creativeWriting'),
	(3, '#development'),
	(4, '#digitalMarketing'),
	(1, '#ecommerce');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;


-- Dumping structure for table fdo_blog.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(100) DEFAULT NULL,
  `full_name` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `About` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Dumping data for table fdo_blog.users: ~8 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password_hash`, `full_name`, `email`, `About`) VALUES
	(1, 'admin', '$2y$10$QlKthcuYhn.XP/gy5A/OZeQdOzIznqxqOf/qBrSAnGpoW4labIL0W', 'Admin Adminov Adminski', 'admin@email.com', ''),
	(3, 'maria', '$2y$10$gzlpX/N5apTruTBajMJwM.0h9OgLVgQxk6N0YhGy2iY4BI73SYkKO', 'Maria Ivanova', 'ivanova@email.com', ''),
	(4, 'ani', '$2y$10$9T9bN6ctJ4R.fdnLvzsdQOj0sk4mWqwohILMx60/jP1YEXtJguhD2', 'Ani Kirova', 'kirova@email.com', ''),
	(5, 'joe', '$2y$10$aIOC0qiNK1mjZdUUbuj/Teh49VI/g9xanuWCNYEUruwcvOGVaXOGK', 'Joe Green', 'green@email.com', ''),
	(6, 'test', '$2y$10$I5y7X1ZilitEZYOztOI5SuA2rBeRJUj/ZhlgmSZK32LPqaqh3Gy3q', '', 'test@email.com', ''),
	(7, 'it\'s security "test"<br>', '$2y$10$thSx6ceSyCPxdl.BDGLhKe7lQu8d3oopQ/LJYK8ma.Dz6jWbOgj8C', 'it\'s security "test"<br>', 'test1@email.com', ''),
	(8, 'vikash', '$2y$10$Exc5mMcThOlEnXZ2.kAPl.ouBSDl8S0GjD.3vvB6KohMpcgfsLsde', 'Vikash Jain', 'Jain@email.com', ''),
	(10, 'oggy', '$2y$10$W85qLYDjZuEqLYX/Qx88a.56fvWH6gBNwn4xy27BQya71rETm./Se', 'Ognyan Stanoev', 'oggy@oggy.com', '');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for table fdo_blog.u_g_interaction
DROP TABLE IF EXISTS `u_g_interaction`;
CREATE TABLE IF NOT EXISTS `u_g_interaction` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `FK_u_g_interaction_groups` (`group_id`),
  CONSTRAINT `FK_u_g_interaction_groups` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_u_g_interaction_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fdo_blog.u_g_interaction: ~8 rows (approximately)
/*!40000 ALTER TABLE `u_g_interaction` DISABLE KEYS */;
INSERT INTO `u_g_interaction` (`user_id`, `group_id`) VALUES
	(1, 1),
	(3, 2),
	(4, 2),
	(5, 2),
	(6, 2),
	(7, 2),
	(8, 2),
	(10, 2);
/*!40000 ALTER TABLE `u_g_interaction` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

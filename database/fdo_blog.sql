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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `comments_count` int(11) DEFAULT '0',
  `points_given_by_user` int(11) DEFAULT '0',
  `Activitycol` varchar(45) DEFAULT '0',
  `posts_count` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `activity_user_id` (`user_id`),
  CONSTRAINT `activity_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Dumping data for table fdo_blog.activity: ~0 rows (approximately)
/*!40000 ALTER TABLE `activity` DISABLE KEYS */;
INSERT INTO `activity` (`id`, `user_id`, `comments_count`, `points_given_by_user`, `Activitycol`, `posts_count`) VALUES
	(17, 24, 0, 0, '0', 0);
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
  CONSTRAINT `FK__category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK__posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fdo_blog.category_post_interaction: ~0 rows (approximately)
/*!40000 ALTER TABLE `category_post_interaction` DISABLE KEYS */;
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
  KEY `FK_comment_post_id` (`post_id`),
  KEY `FK_comment_user_id` (`author_id`),
  CONSTRAINT `FK_comment_post_id` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_comment_user_id` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- Dumping data for table fdo_blog.comments: ~0 rows (approximately)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;


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
  CONSTRAINT `fk_users_posts` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Dumping data for table fdo_blog.posts: ~0 rows (approximately)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;


-- Dumping structure for table fdo_blog.post_tag_interaction
DROP TABLE IF EXISTS `post_tag_interaction`;
CREATE TABLE IF NOT EXISTS `post_tag_interaction` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`,`tag_id`),
  KEY `FK__tags` (`tag_id`),
  CONSTRAINT `FK__posts_tags` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK__tags` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fdo_blog.post_tag_interaction: ~0 rows (approximately)
/*!40000 ALTER TABLE `post_tag_interaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_tag_interaction` ENABLE KEYS */;


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
  `About` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- Dumping data for table fdo_blog.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password_hash`, `full_name`, `email`, `About`) VALUES
	(1, 'admin', '$2y$10$QlKthcuYhn.XP/gy5A/OZeQdOzIznqxqOf/qBrSAnGpoW4labIL0W', 'Admin Adminov Adminski', 'admin@email.com', ''),
	(24, 'ralka', '$2y$10$5Ur2xwQPXE.F7eBUPJsBIujUNgaapNqB7wa6UwDo2GQgCmyV4BRL2', 'Ralitsa Dimitrova', 'ralitza@start.bg', 'Something about me...');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for table fdo_blog.u_g_interaction
DROP TABLE IF EXISTS `u_g_interaction`;
CREATE TABLE IF NOT EXISTS `u_g_interaction` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `FK_u_g_interaction_groups` (`group_id`),
  CONSTRAINT `FK_u_g_interaction_groups` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_u_g_interaction_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fdo_blog.u_g_interaction: ~0 rows (approximately)
/*!40000 ALTER TABLE `u_g_interaction` DISABLE KEYS */;
INSERT INTO `u_g_interaction` (`user_id`, `group_id`) VALUES
	(24, 2);
/*!40000 ALTER TABLE `u_g_interaction` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

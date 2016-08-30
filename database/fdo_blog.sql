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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table fdo_blog.activity: ~9 rows (approximately)
/*!40000 ALTER TABLE `activity` DISABLE KEYS */;
INSERT INTO `activity` (`id`, `user_id`, `comments_count`, `points_given_by_user`, `Activitycol`, `posts_count`) VALUES
	(1, 3, 4, 1, NULL, 0),
	(2, 2, 3, 1, NULL, 0),
	(4, 11, 0, 0, NULL, 0),
	(5, 12, 0, 0, NULL, 0),
	(6, 13, 0, 0, NULL, 0),
	(7, 14, 0, 0, NULL, 0),
	(8, 15, 0, 0, NULL, 0),
	(9, 16, 0, 1, '0', 0),
	(10, 17, 2, 5, '0', 2);
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
  CONSTRAINT `FK__category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `FK__posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fdo_blog.category_post_interaction: ~11 rows (approximately)
/*!40000 ALTER TABLE `category_post_interaction` DISABLE KEYS */;
INSERT INTO `category_post_interaction` (`post_id`, `category_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 2),
	(5, 2),
	(6, 2),
	(9, 5),
	(10, 1),
	(13, 4),
	(14, 4),
	(15, 4);
/*!40000 ALTER TABLE `category_post_interaction` ENABLE KEYS */;


-- Dumping structure for table fdo_blog.comments
DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_body` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- Dumping data for table fdo_blog.comments: ~9 rows (approximately)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `comment_body`, `author_id`, `post_id`, `date`) VALUES
	(1, 'hello, this is my comment', 1, 1, '2016-07-26 13:26:06'),
	(2, 'hi my name is ...', 2, 2, '2016-07-26 13:26:06'),
	(5, 'this is great', 3, 3, '2016-07-26 13:27:45'),
	(7, 'i like this', 4, 4, '2016-07-26 13:28:42'),
	(9, 'potato', 5, 5, '2016-07-26 13:29:27'),
	(11, 'i dont like git hub', 6, 6, '2016-07-26 13:30:21'),
	(17, 'New comment', 16, 13, '2016-08-30 08:37:12'),
	(18, 'Roli\'s comment', 17, 1, '2016-08-30 09:09:39'),
	(19, 'One more comment from Roli', 17, 1, '2016-08-30 09:10:19');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;


-- Dumping structure for table fdo_blog.deleted_posts
DROP TABLE IF EXISTS `deleted_posts`;
CREATE TABLE IF NOT EXISTS `deleted_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(100) NOT NULL,
  `post_content` text NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `author_email` varchar(100) NOT NULL,
  `date_deleted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reason_to_be_deleted` text NOT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  `views_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table fdo_blog.deleted_posts: ~2 rows (approximately)
/*!40000 ALTER TABLE `deleted_posts` DISABLE KEYS */;
INSERT INTO `deleted_posts` (`id`, `post_title`, `post_content`, `author_name`, `author_email`, `date_deleted`, `reason_to_be_deleted`, `points`, `views_count`) VALUES
	(1, 'Sleep is for the weak', 'jhgjvykbhnjkm new new new', 'ralka', 'ralka@gmail.com', '2016-08-30 08:27:42', 'User deleted', 0, 4),
	(2, 'SSiena Root', 'Into the stream', 'ralka', 'ralka@gmail.com', '2016-08-30 08:35:16', 'User deleted', 0, 0);
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
  CONSTRAINT `fk_users_posts` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Dumping data for table fdo_blog.posts: ~11 rows (approximately)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `title`, `content`, `date`, `user_id`, `views_count`, `points`, `date_edited`) VALUES
	(1, 'Website Building', '<p>If the internet is a country, then websites are like real estates. I’m hoping by now you have a general understanding that real estates are valuable in the physical world – digital real estates work the same way. By building a website, you’re creating your own plot of online “land.”</p>\n\n<p>You can fill this land with whatever you want, but you have to promote it through social media (and anywhere else you can think of) for this to be successful. When you build traffic to your land, you can sell people whatever you have to offer. In order to build a website, you need a host (i.e <a href="https://uk.godaddy.com/?isc=cjcdplink&iphoneview=1&cvosrc=affiliate.cj.5647096">GoDaddy</a>), a template (i.e <a href="https://wordpress.com/">WordPress</a>), and content.</p>\n\n<p>The first two parts are easy to find, and content is only as difficult as you make it. You can post blogs, items for sale, pictures, videos, or whatever you want. Opening up your own website gives you the potential to make money from the avenues I’m going to mention.</p>\n', '2016-05-22 10:13:37', 2, 27, 3, '0000-00-00 00:00:00'),
	(2, 'B2B Marketing', '<p>An online business model I love is utilized by <a href="https://getvoip.com/business/">GetVoiP</a>, an affiliate marketer based in New York. GetVoiP acts as an agent for business communication providers. They maintain updated listings of VoiP providers, including ratings, comparisons, consumer reviews, in-depth knowledge of market and end-user trends, and expert opinions from business professionals on a variety of topics related to business consumers. By not only keeping abreast of news, but providing detailed analysis of products being offered, GetVoiP is able to generate traffic to their site and increase their clout with businesses.</p>\n\n<p>The more online clout you have as a business, the more money you’ll make. If you’re known for making lasting connections (as is the case with GetVoiP above), then you’ll have no issues building your online brand. You’ll be recognized in your community and begin to build a buzz in your industry. Tracking your numbers (how many people view your site, click each ad, and make a purchase from that click) gives you the leverage to expand this part of your business, enabling you to continue building your online rep.</p>\n', '2016-05-20 11:18:26', 8, 0, 0, '0000-00-00 00:00:00'),
	(3, 'Google Adsense', '<p>If that sounds like too much technical information for you, there is an easy button – Google’s advertising platform is as simple as signing up, enabling (on Blogger) or pasting a small code on your website, and allowing the advertisements to automatically roll in. The problem with this program is that you don’t get any commissions – and you don’t get to control the ad content. This is useful for some, but powerful users will want something a little more robust.</p>\n', '2016-05-07 11:21:21', 3, 1, 0, '0000-00-00 00:00:00'),
	(4, '<p>Amazon Associates', 'Amazon has an Associates program for site owners and bloggers. They offer a search tool to find the right products and services from their site and a variety of ad styles to display on your site, including text-based and banner images (digital billboards) like this:<p>\n\n<p>Each item purchased through your Amazon links give you a commission. It doesn’t take high volume traffic to achieve results, either. I began making money with the program when I only had 1,000 hits per month on my site. They can apply your earnings to your Amazon account balance, issue you a check, or direct deposit into your bank account. If you love Amazon, you’ll love their associate’s program. Click here for another Lifehack dedicated to Amazon Associates.</p>\n', '2016-04-07 11:25:40', 2, 4, 0, '0000-00-00 00:00:00'),
	(5, 'Rakuten Linkshare', '<p>Amazon and Google are far from your only options for online advertising. Rakuten Linkshare is a great place to search for other affiliates for your ads. Through their program, you can get customized ad links, email links, and banner ads for Starbucks, Walmart, iTunes, and a slew of other popular brands. With this program, you can also find smaller companies, regional or specialized brands, and more. I run a combination of Google, Amazon, and Rakuten’s programs, and my monthly income is approximately $150 from these programs. It’s not a lot of money, but it’s also not a lot of work for residual (it means recurring…since the ads are permanent…) income.</p>\n', '2016-01-17 11:27:50', 5, 9, 0, '0000-00-00 00:00:00'),
	(6, 'Company Referral Programs', '<p>Speaking of the benefits of permanent ads, banners and links aren’t the only ways to earn a little bit of dough off your online endeavors. By having a website, you gain the power of emailing companies to ask them for things. I have no shame in letting the yoga company whose mat I’m looking into purchasing know that I have a blog and write for yoga publications – it sometimes gets me discounts.</p>\n\n<p>Other times, I gain a valuable business contact in PR, advertising, or other aspects of corporate sales. Sometimes I just get a free drink. Either way, money in and of itself is worthless. Ditch the middle man and use the internet to barter what you have and can do for what you need.</p>\n', '2015-11-22 11:57:40', 5, 21, 0, '0000-00-00 00:00:00'),
	(9, 'Best title', 'How to write the best titles!', '2016-08-23 15:26:30', 1, 14, 8, '0000-00-00 00:00:00'),
	(10, 'Build the best websites', 'Best websites eva!', '2016-08-23 15:27:39', 10, 9, 0, '0000-00-00 00:00:00'),
	(13, 'New Title', 'Something', '2016-08-30 08:37:04', 16, 4, 1, '2016-08-30 08:37:04'),
	(14, 'New post', 'dtfjygkuhljio', '2016-08-30 09:15:38', 17, 0, 0, '2016-08-30 09:15:38'),
	(15, 'Siena Root', 'trfyguhjiko', '2016-08-30 09:16:37', 17, 0, 0, '2016-08-30 09:16:37');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;


-- Dumping structure for table fdo_blog.post_tag_interaction
DROP TABLE IF EXISTS `post_tag_interaction`;
CREATE TABLE IF NOT EXISTS `post_tag_interaction` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`,`tag_id`),
  KEY `FK__tags` (`tag_id`),
  CONSTRAINT `FK__posts_tags` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  CONSTRAINT `FK__tags` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fdo_blog.post_tag_interaction: ~6 rows (approximately)
/*!40000 ALTER TABLE `post_tag_interaction` DISABLE KEYS */;
INSERT INTO `post_tag_interaction` (`post_id`, `tag_id`) VALUES
	(1, 5),
	(2, 3),
	(3, 4),
	(13, 3),
	(14, 3),
	(15, 5);
/*!40000 ALTER TABLE `post_tag_interaction` ENABLE KEYS */;


-- Dumping structure for table fdo_blog.post_user_status
DROP TABLE IF EXISTS `post_user_status`;
CREATE TABLE IF NOT EXISTS `post_user_status` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`,`user_id`),
  KEY `FK__users_status` (`user_id`),
  CONSTRAINT `FK__posts_status` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  CONSTRAINT `FK__users_status` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fdo_blog.post_user_status: ~2 rows (approximately)
/*!40000 ALTER TABLE `post_user_status` DISABLE KEYS */;
INSERT INTO `post_user_status` (`post_id`, `user_id`) VALUES
	(1, 17),
	(13, 16);
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
  `About` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Dumping data for table fdo_blog.users: ~11 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password_hash`, `full_name`, `email`, `About`) VALUES
	(1, 'admin', '$2y$10$QlKthcuYhn.XP/gy5A/OZeQdOzIznqxqOf/qBrSAnGpoW4labIL0W', 'Admin Adminov Adminski', 'admin@email.com', ''),
	(2, 'nakov', '$2y$10$XViubT.zSoBtskZmKl6kdOX8Yq7T7tLrcrLn/5dkAqbgjVACeFUGe', 'Svetlin Nakov', 'nakov@email.com', ''),
	(3, 'maria', '$2y$10$gzlpX/N5apTruTBajMJwM.0h9OgLVgQxk6N0YhGy2iY4BI73SYkKO', 'Maria Ivanova', 'ivanova@email.com', ''),
	(4, 'ani', '$2y$10$9T9bN6ctJ4R.fdnLvzsdQOj0sk4mWqwohILMx60/jP1YEXtJguhD2', 'Ani Kirova', 'kirova@email.com', ''),
	(5, 'joe', '$2y$10$aIOC0qiNK1mjZdUUbuj/Teh49VI/g9xanuWCNYEUruwcvOGVaXOGK', 'Joe Green', 'green@email.com', ''),
	(6, 'test', '$2y$10$I5y7X1ZilitEZYOztOI5SuA2rBeRJUj/ZhlgmSZK32LPqaqh3Gy3q', '', 'test@email.com', ''),
	(7, 'it\'s security "test"<br>', '$2y$10$thSx6ceSyCPxdl.BDGLhKe7lQu8d3oopQ/LJYK8ma.Dz6jWbOgj8C', 'it\'s security "test"<br>', 'test1@email.com', ''),
	(8, 'vikash', '$2y$10$Exc5mMcThOlEnXZ2.kAPl.ouBSDl8S0GjD.3vvB6KohMpcgfsLsde', 'Vikash Jain', 'Jain@email.com', ''),
	(10, 'oggy', '$2y$10$W85qLYDjZuEqLYX/Qx88a.56fvWH6gBNwn4xy27BQya71rETm./Se', 'Ognyan Stanoev', 'oggy@oggy.com', ''),
	(16, 'ralka', '$2y$10$6Zwb53ncW2hrBe1pdD4QpumifWzaAY.z4b10z.GUSMw9agXhIgtg6', 'ralka', 'ralka@gmail.com', 'sflkjdhgfhtcgvhjbk'),
	(17, 'roli', '$2y$10$/xxSpcwk5Vi4AJsRnCibZO.3w8UDvpsCWh2z6Hs1SJB.RKf1f4pnu', 'roli', 'roli@gmail.com', 'hdgftdhfbj');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for table fdo_blog.u_g_interaction
DROP TABLE IF EXISTS `u_g_interaction`;
CREATE TABLE IF NOT EXISTS `u_g_interaction` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `FK_u_g_interaction_groups` (`group_id`),
  CONSTRAINT `FK_u_g_interaction_groups` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  CONSTRAINT `FK_u_g_interaction_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fdo_blog.u_g_interaction: ~11 rows (approximately)
/*!40000 ALTER TABLE `u_g_interaction` DISABLE KEYS */;
INSERT INTO `u_g_interaction` (`user_id`, `group_id`) VALUES
	(1, 1),
	(2, 2),
	(3, 2),
	(4, 2),
	(5, 2),
	(6, 2),
	(7, 2),
	(8, 2),
	(10, 2),
	(16, 2),
	(17, 2);
/*!40000 ALTER TABLE `u_g_interaction` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

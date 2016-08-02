-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2016 at 07:00 PM
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
-- Table structure for table `posts`
--

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
(3, 'Google Adsense', '<p>If that sounds like too much technical information for you, there is an easy button – Google’s advertising platform is as simple as signing up, enabling (on Blogger) or pasting a small code on your website, and allowing the advertisements to automatically roll in. The problem with this program is that you don’t get any commissions – and you don’t get to control the ad content. This is useful for some, but powerful users will want something a little more robust.</p>\n', '2016-05-07 11:21:21', 3, 0),
(4, '<p>Amazon Associates', 'Amazon has an Associates program for site owners and bloggers. They offer a search tool to find the right products and services from their site and a variety of ad styles to display on your site, including text-based and banner images (digital billboards) like this:<p>\n\n<p>Each item purchased through your Amazon links give you a commission. It doesn’t take high volume traffic to achieve results, either. I began making money with the program when I only had 1,000 hits per month on my site. They can apply your earnings to your Amazon account balance, issue you a check, or direct deposit into your bank account. If you love Amazon, you’ll love their associate’s program. Click here for another Lifehack dedicated to Amazon Associates.</p>\n', '2016-04-07 11:25:40', 2, 1),
(5, 'Rakuten Linkshare', '<p>Amazon and Google are far from your only options for online advertising. Rakuten Linkshare is a great place to search for other affiliates for your ads. Through their program, you can get customized ad links, email links, and banner ads for Starbucks, Walmart, iTunes, and a slew of other popular brands. With this program, you can also find smaller companies, regional or specialized brands, and more. I run a combination of Google, Amazon, and Rakuten’s programs, and my monthly income is approximately $150 from these programs. It’s not a lot of money, but it’s also not a lot of work for residual (it means recurring…since the ads are permanent…) income.</p>\n', '2016-01-17 11:27:50', 5, 3),
(6, 'Company Referral Programs', '<p>Speaking of the benefits of permanent ads, banners and links aren’t the only ways to earn a little bit of dough off your online endeavors. By having a website, you gain the power of emailing companies to ask them for things. I have no shame in letting the yoga company whose mat I’m looking into purchasing know that I have a blog and write for yoga publications – it sometimes gets me discounts.</p>\n\n<p>Other times, I gain a valuable business contact in PR, advertising, or other aspects of corporate sales. Sometimes I just get a free drink. Either way, money in and of itself is worthless. Ditch the middle man and use the internet to barter what you have and can do for what you need.</p>\n', '2015-11-22 11:57:40', 5, 4),
(7, 'post', 'post', '2016-08-02 13:33:47', 9, 1),
(8, 'tova e nov post', 'noviqt mi post', '2016-08-02 13:34:44', 9, 10),
(9, 'tova novi post', 'poredniq tst', '2016-08-02 16:03:31', 3, 1),
(10, 'maria ', 'post ot maria', '2016-08-02 16:50:17', 3, 0),
(11, 'i ot men edin post', 'poredniq testov bb', '2016-08-02 17:18:25', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_posts_idx` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_users_posts` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

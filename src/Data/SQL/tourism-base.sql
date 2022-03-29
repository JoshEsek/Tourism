-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2022 at 02:31 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `tourism`
--
DROP DATABASE IF EXISTS `tourism`;
CREATE DATABASE IF NOT EXISTS `tourism` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tourism`;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
    `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `option_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
    `autoload` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
    PRIMARY KEY (`option_id`),
    UNIQUE KEY `option_name` (`option_name`),
    KEY `autoload` (`autoload`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
    `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
    `post_date` datetime NOT NULL DEFAULT curdate(),
    `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
    `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
    `post_excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
    `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
    `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
    `post_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'page',
    `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
    `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `comment_count` bigint(20) NOT NULL DEFAULT 0,
    PRIMARY KEY (`ID`),
    KEY `post_name` (`post_name`),
    KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
    KEY `post_author` (`post_author`)
    ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`ID`, `post_author`, `post_date`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `post_name`, `post_type`, `post_mime_type`, `comment_count`) VALUES
                                                                                                                                                                                                       (1, 1, '0000-00-00 00:00:00', '<div class=\"container my-4\">\r\n        <div class=\"row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg\">\r\n          <div class=\"col-lg-7 p-3 p-lg-5 pt-lg-3\">\r\n            <h1 class=\"display-4 fw-bold lh-1\">#ScotlandIsNow </h1>\r\n            <p style=\"text-align: center;\">Scotland is kindness, respect and generosity. Scotland is determination, creativity and curiosity. We are castles, lochs and mountains. We are students, explorers, innovators. We are Scotland and good things live here.&nbsp;</p>\r\n            <p style=\"text-align: center;\">We’ve come a long way, and you could too.&nbsp; <a href=\"http://localhost/tourism/study\">Study</a>\r\n                                           ,&nbsp;<a href=\"http://localhost/tourism/business\">invest</a>,&nbsp;<a href=\"https://www.scotland.org/live-in-scotland\">live</a>,&nbsp;&nbsp;<a href=\"http://localhost/tourism/work\">work</a>, or&nbsp;<a href=\"http://localhost/tourism/visit\">visit</a>,&nbsp;Scotland is waiting, and open to you.…</p>\r\n\r\n          </div>\r\n          <div class=\"col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg\">\r\n            <img class=\"rounded-lg-3\" src=\" http://localhost/tourism/assets/images/jpg/0d7fc35ebdc5100d68104b3bf663a86f8549b02f.jpg\" alt=\"\" width=\"720\">\r\n      </div>\r\n      </div>\r\n      </div>', 'The Official Gateway to Scotland', 'The official gateway to Scotland provides information on Scottish culture and living, working, studying, visiting, and doing business in Scotland.', 'publish', 'open', 'home', 'post', 'text/html', 0),
                                                                                                                                                                                                       (2, 1, '2022-03-29 01:33:12', '<div class=\"container my-4\">\r\n        <div class=\"row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg\">\r\n          <div class=\"col-lg-7 p-3 p-lg-5 pt-lg-3\">\r\n            <h1 class=\"display-4 fw-bold lh-1\">Where is Scotland?</h1>\r\n            <div class=\" col-sm-10 mx-auto text-align-center\">\r\n											<div class=\"header-tab__intro\">\r\n												<p>Scotland is a part of the United Kingdom (UK) and occupies the northern third of Great Britain. Scotland’s mainland shares a border with England to the south. It is home to almost 800 small islands, including the northern isles of Shetland and Orkney, the Hebrides, Arran and Skye.</p>\r\n											</div>\r\n									</div>\r\n            <div class=\"rte-container\">\r\n						<h2>Scotland on the map</h2>\r\n\r\n<p>Located in the mid-west of Europe, Scotland may be small, but we have plenty to shout about! Occupying the northern third of Great Britain we share a border with England in the south and pack some of the most stunning scenery in all the UK into our borders. From wild coastlines and pristine beaches to rolling valleys and towering mountains, Scotland’s geography is a huge part of its appeal. If that\'s not enough, we are strategically placed near the best of Europe and beyond, making us the perfect destination for work and play.</p>\r\n					</div>\r\n\r\n          </div>\r\n          <div class=\"col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg\">\r\n            <img class=\"rounded-lg-3\" src=\" http://localhost/tourism/assets/images/jpg/52b3e5956c603f9c0a4fbd2d505ff59e4a42a4eb.jpg\" alt=\"\" width=\"720\">\r\n      </div>\r\n      </div>\r\n      </div>', 'Where is Scotland | Scotland&#039;s Location', 'Find out more about Scotland&#039;s location and explore its rich and varied geography including the many regions.', 'publish', 'open', 'where-is-scotland', 'post', 'text/html', 0),
(3, 1, '0000-00-00 00:00:00', '<div class=\"container my-4\">\r\n        <div class=\"row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg\">\r\n          <div class=\"col-lg-7 p-3 p-lg-5 pt-lg-3\">\r\n            <h1 class=\"display-4 fw-bold lh-1 pb-3\">Study in Scotland</h1>\r\n            <div class=\" col-sm-10 mx-auto text-align-center\">\r\n											<div class=\"mt-2 pt-2\">\r\n						<p class=\"lead\">Scotland has a world-renowned education system, top-class universities and a reputation for producing creative thinkers. That\'s why more than 50,000 students from over 180 different countries choose to study in Scotland every year. You could join them.</p>\r\n											</div>\r\n								<h2 class=\"alternating-content__heading\" id=\"image-strip-coronavirus-student-information\">Coronavirus – advice and information for new and prospective students </h2>\r\n								<p class=\"lead\">We know that you might be worried about the coronavirus pandemic and how it will affect your future plans to study in Scotland. From questions around your application process to info about scholarships and travel, we’ve put together a list of resources which should be of help to you.</p>\r\n									</div>\r\n\r\n          </div>\r\n          <div class=\"col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg\">\r\n            <img class=\"rounded-lg-3\" src=\"http://localhost/tourism/assets/images/jpg/efd02f692a53fbdb149c0dc58b3a2d75c9ae9ead.jpg\" alt=\"\" width=\"720\">\r\n      </div>\r\n      </div>\r\n      </div>', 'Study in Scotland | Scotland.org', 'From university courses and accommodation, to student life and culture, there\'s plenty to find out about studying in Scotland.', 'publish', 'open', 'study', 'post', 'text/html', 0),
(4, 1, '0000-00-00 00:00:00', '<div class=\"container my-4\">\r\n        <div class=\"row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg\">\r\n          <div class=\"col-lg-7 p-3 p-lg-5 pt-lg-3\">\r\n            <h1 class=\"display-4 fw-bold lh-1 pb-3\">Scotland\'s Stories</h1>\r\n            <div class=\" col-sm-10 mx-auto text-align-center\">\r\n											<div class=\"mt-2 pt-2\">\r\n						<p class=\"lead\">World-leading innovation, incredible diversity, a warm welcome for all - Scotland is all this and so much more.&nbsp;</p>\r\n\r\n<p class=\"lead\">Find out more about the stories that make Scotland the place to be. Now!</p>\r\n											</div>\r\n									</div><div class=\"alternating-content__content\">\r\n\r\n								<h2 class=\"alternating-content__heading\" id=\"image-strip-scotland-is-going-net-zero\">Scotland is Going Net Zero</h2>\r\n								<p>Scotland’s playing its part and has committed to reach net-zero emissions by 2045 in a way that’s equal, fair and creates new opportunities. Find out&nbsp;more about Scotland’s action on climate change.&nbsp;</p>\r\n								<p>\r\n\r\n										<a class=\"btn-default\" href=\"http://localhost/tourism/study\" aria-labelledby=\"image-strip-scotland-is-going-net-zero\">Learn more</a>\r\n\r\n								</p>\r\n\r\n						</div>\r\n\r\n          </div>\r\n          <div class=\"col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg\">\r\n            <img class=\"rounded-lg-3\" src=\"http://localhost/tourism/assets/images/jpg/20031070da03b7e6ee3fb535ea5e47f8bd8a524a.jpg\" alt=\"\" width=\"720\">\r\n      </div>\r\n      </div>\r\n      </div>', 'About Scotland | Scottish Facts', 'Scotland is a progressive nation built on dynamism, creativity and the fabulous warmth of its people. Get to know us.', 'publish', 'open', 'about', 'post', 'text/html', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT current_timestamp(),
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT 0,
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`),
  KEY `user_email` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

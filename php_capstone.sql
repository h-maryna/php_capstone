-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 12, 2019 at 03:09 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(55) DEFAULT NULL,
  `last_name` varchar(55) DEFAULT NULL,
  `is_admin` varchar(15) NOT NULL DEFAULT 'regular',
  `age` int(11) DEFAULT NULL,
  `street` varchar(55) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `postal_code` varchar(6) DEFAULT NULL,
  `province` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `phone` char(10) DEFAULT NULL,
  `email` varchar(125) DEFAULT NULL,
  `password` varchar(12) DEFAULT NULL,
  `conf_passw` varchar(12) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `is_admin`, `age`, `street`, `city`, `postal_code`, `province`, `country`, `phone`, `email`, `password`, `conf_passw`, `created_at`, `updated_at`) VALUES
(1, 'Maryna', 'lastname', 'regular', 33, '59 Donald Street, 206', 'winnipeg', 'R3C1L9', 'manitoba', 'Canada', '3334444', 'hello@gmail.com', 'mypass', 'mypass', '2019-05-10 17:13:30', '2019-05-10 17:13:30'),
(2, 'Junice ', 'Savares', 'regular', 24, '1051 Taylor', 'Winnipeg', 'R3C1L9', 'Manitoba', 'Canada', '3334444', 'junice@gmail.com', 'mypass', 'mypass', '2019-05-10 17:14:58', '2019-05-10 17:14:58'),
(3, 'Vadim', 'Haidashevskyi', 'admin', 33, '1325 Taylor Avenue', 'Winniped', 'R3M2K7', 'Manitoba', 'Canada', '2045095915', 'vadim33@gmail.com', 'mypass', 'mypass', '2019-05-10 17:17:58', '2019-05-10 17:17:58'),
(4, 'Maryna', 'jhkh', 'regular', 24, '59 Donald Street, 206', 'Winnipeg', 'R3C1L9', 'Manitoba', 'Canada', '3334444', 'marina-chigrin@rambler.ru', 'mypass', 'mypass', '2019-05-10 21:04:49', '2019-05-10 21:04:49'),
(5, 'John', 'lastname', 'regular', 44, '45 tailot sfg', 'winnipeg', 'R3C1L9', 'manitoba', 'Canada', '3334444', 'john123@gmail.com', 'mypass', 'mypass', '2019-05-10 21:05:24', '2019-05-10 21:05:24'),
(6, 'Amador', 'Lopez', 'regular', 55, '59 Donald Street, 206', 'Winnipeg', 'R3C1L9', 'Manitoba', 'Canada', '3334444', 'amador55@example.com', 'mypass', 'mypass', '2019-05-10 21:59:44', '2019-05-10 21:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `event`) VALUES
(1, '/public/'),
(2, '/public/'),
(3, '/public/'),
(4, 'Created at: 2019/05/08 21:01:41 REQUEST_URI: /public/menu_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(5, 'Created at: 2019/05/08 21:01:43 REQUEST_URI: /public/shop_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(6, 'Created at: 2019/05/08 21:01:43 REQUEST_URI: /public/login_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(7, 'Created at: 2019/05/08 21:01:44 REQUEST_URI: /public/register_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(8, 'Created at: 2019/05/08 21:01:45 REQUEST_URI: /public/menu_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(9, 'Created at: 2019/05/09 13:24:51 REQUEST_URI: /public/menu_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(10, 'Created at: 2019/05/09 13:24:52 REQUEST_URI: /public/menu_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(11, 'Created at: 2019/05/10 22:31:42 REQUEST_URI: /public/index.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(12, 'Created at: 2019/05/10 22:31:43 REQUEST_URI: /public/about_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(13, 'Created at: 2019/05/10 22:31:43 REQUEST_URI: /public/menu_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(14, 'Created at: 2019/05/10 22:32:21 REQUEST_URI: /public/menu_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(15, 'Created at: 2019/05/10 22:32:22 REQUEST_URI: /public/menu_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(16, 'Created at: 2019/05/10 22:32:22 REQUEST_URI: /public/menu_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(17, 'Created at: 2019/05/10 22:33:22 REQUEST_URI: /public/menu_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(18, 'Created at: 2019/05/10 22:33:39 REQUEST_URI: /public/admin_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(19, 'Created at: 2019/05/10 22:34:14 REQUEST_URI: /public/admin_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(20, 'Created at: 2019/05/10 22:34:39 REQUEST_URI: /public/admin_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(21, 'Created at: 2019/05/10 22:37:59 REQUEST_URI: /public/menu_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(22, 'Created at: 2019/05/10 22:38:00 REQUEST_URI: /public/menu_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(23, 'Created at: 2019/05/10 22:38:02 REQUEST_URI: /public/index.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(24, 'Created at: 2019/05/10 22:38:03 REQUEST_URI: /public/shop_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(25, 'Created at: 2019/05/10 22:38:06 REQUEST_URI: /public/admin_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(26, 'Created at: 2019/05/10 22:38:36 REQUEST_URI: /public/admin_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(27, 'Created at: 2019/05/10 22:40:32 REQUEST_URI: /public/index.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(28, 'Created at: 2019/05/10 22:40:33 REQUEST_URI: /public/about_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(29, 'Created at: 2019/05/10 22:40:34 REQUEST_URI: /public/menu_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(30, 'Created at: 2019/05/10 22:40:35 REQUEST_URI: /public/admin_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(31, 'Created at: 2019/05/10 22:40:59 REQUEST_URI: /public/admin_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(32, 'Created at: 2019/05/10 22:41:31 REQUEST_URI: /public/admin_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(33, 'Created at: 2019/05/10 22:41:33 REQUEST_URI: /public/index.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(34, 'Created at: 2019/05/10 22:41:40 REQUEST_URI: /public/index.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(35, 'Created at: 2019/05/10 22:42:30 REQUEST_URI: /public/login_page.php?logout=1 Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(36, 'Created at: 2019/05/10 22:42:30 REQUEST_URI: /public/login_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(37, 'Created at: 2019/05/10 22:44:23 REQUEST_URI: /public/login_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(38, 'Created at: 2019/05/10 22:44:23 REQUEST_URI: /public/profile_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(39, 'Created at: 2019/05/10 22:44:28 REQUEST_URI: /public/admin_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(40, 'Created at: 2019/05/10 22:47:23 REQUEST_URI: /public/admin_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(41, 'Created at: 2019/05/10 23:09:40 REQUEST_URI: /public/admin_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(42, 'Created at: 2019/05/10 23:09:46 REQUEST_URI: /public/login_page.php?logout=1 Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(43, 'Created at: 2019/05/10 23:09:46 REQUEST_URI: /public/login_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(44, 'Created at: 2019/05/11 02:04:27 REQUEST_URI: /public/index.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(45, 'Created at: 2019/05/11 02:04:30 REQUEST_URI: /public/register_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(46, 'Created at: 2019/05/11 02:04:49 REQUEST_URI: /public/register_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(47, 'Created at: 2019/05/11 02:04:49 REQUEST_URI: /public/redirect_form.php?customer_id=4 Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(48, 'Created at: 2019/05/11 02:04:49 REQUEST_URI: /public/login_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(49, 'Created at: 2019/05/11 02:05:01 REQUEST_URI: /public/register_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(50, 'Created at: 2019/05/11 02:05:24 REQUEST_URI: /public/register_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(51, 'Created at: 2019/05/11 02:05:24 REQUEST_URI: /public/redirect_form.php?customer_id=5 Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(52, 'Created at: 2019/05/11 02:05:24 REQUEST_URI: /public/login_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(53, 'Created at: 2019/05/11 02:05:32 REQUEST_URI: /public/login_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(54, 'Created at: 2019/05/11 02:05:33 REQUEST_URI: /public/profile_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(55, 'Created at: 2019/05/11 02:05:36 REQUEST_URI: /public/login_page.php?logout=1 Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(56, 'Created at: 2019/05/11 02:05:36 REQUEST_URI: /public/login_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(57, 'Created at: 2019/05/11 02:05:55 REQUEST_URI: /public/login_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(58, 'Created at: 2019/05/11 02:05:56 REQUEST_URI: /public/profile_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(59, 'Created at: 2019/05/11 02:05:59 REQUEST_URI: /public/admin_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(60, 'Created at: 2019/05/11 02:07:44 REQUEST_URI: /public/admin_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(61, 'Created at: 2019/05/11 02:10:20 REQUEST_URI: /public/admin_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(62, 'Created at: 2019/05/11 02:10:22 REQUEST_URI: /public/admin_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(63, 'Created at: 2019/05/11 02:11:46 REQUEST_URI: /public/admin_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(64, 'Created at: 2019/05/11 02:12:14 REQUEST_URI: /public/admin_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(65, 'Created at: 2019/05/11 02:12:15 REQUEST_URI: /public/admin_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(66, 'Created at: 2019/05/11 02:12:15 REQUEST_URI: /public/admin_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(67, 'Created at: 2019/05/11 02:13:13 REQUEST_URI: /public/admin_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(68, 'Created at: 2019/05/11 02:13:52 REQUEST_URI: /public/admin_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(69, 'Created at: 2019/05/11 02:14:10 REQUEST_URI: /public/profile_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(70, 'Created at: 2019/05/11 02:14:30 REQUEST_URI: /public/profile_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(71, 'Created at: 2019/05/11 02:14:31 REQUEST_URI: /public/admin_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(72, 'Created at: 2019/05/11 02:14:33 REQUEST_URI: /public/admin_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(73, 'Created at: 2019/05/11 02:14:37 REQUEST_URI: /public/profile_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(74, 'Created at: 2019/05/11 02:15:33 REQUEST_URI: /public/profile_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(75, 'Created at: 2019/05/11 02:15:59 REQUEST_URI: /public/profile_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(76, 'Created at: 2019/05/11 02:16:10 REQUEST_URI: /public/profile_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(77, 'Created at: 2019/05/11 02:18:16 REQUEST_URI: /public/profile_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(78, 'Created at: 2019/05/11 02:21:03 REQUEST_URI: /public/profile_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(79, 'Created at: 2019/05/11 02:21:04 REQUEST_URI: /public/profile_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(80, 'Created at: 2019/05/11 02:21:04 REQUEST_URI: /public/profile_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(81, 'Created at: 2019/05/11 02:21:22 REQUEST_URI: /public/profile_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(82, 'Created at: 2019/05/11 02:21:23 REQUEST_URI: /public/profile_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(83, 'Created at: 2019/05/11 02:21:23 REQUEST_URI: /public/profile_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(84, 'Created at: 2019/05/11 02:21:24 REQUEST_URI: /public/admin_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(85, 'Created at: 2019/05/11 02:59:20 REQUEST_URI: /public/login_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(86, 'Created at: 2019/05/11 02:59:22 REQUEST_URI: /public/register_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(87, 'Created at: 2019/05/11 02:59:44 REQUEST_URI: /public/register_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(88, 'Created at: 2019/05/11 02:59:44 REQUEST_URI: /public/redirect_form.php?customer_id=6 Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(89, 'Created at: 2019/05/11 02:59:44 REQUEST_URI: /public/login_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(90, 'Created at: 2019/05/11 03:00:07 REQUEST_URI: /public/login_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(91, 'Created at: 2019/05/11 03:00:07 REQUEST_URI: /public/profile_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(92, 'Created at: 2019/05/11 03:00:14 REQUEST_URI: /public/login_page.php?logout=1 Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(93, 'Created at: 2019/05/11 03:00:14 REQUEST_URI: /public/login_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(94, 'Created at: 2019/05/11 05:35:54 REQUEST_URI: /public/admin_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(95, 'Created at: 2019/05/11 05:41:54 REQUEST_URI: /public/ Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(96, 'Created at: 2019/05/11 05:41:56 REQUEST_URI: /public/login_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(97, 'Created at: 2019/05/11 05:42:07 REQUEST_URI: /public/login_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(98, 'Created at: 2019/05/12 02:29:32 REQUEST_URI: /public/ Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(99, 'Created at: 2019/05/12 02:29:34 REQUEST_URI: /public/login_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(100, 'Created at: 2019/05/12 02:29:40 REQUEST_URI: /public/login_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(101, 'Created at: 2019/05/12 02:29:41 REQUEST_URI: /public/profile_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(102, 'Created at: 2019/05/12 02:29:47 REQUEST_URI: /public/index.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(103, 'Created at: 2019/05/12 02:29:47 REQUEST_URI: /public/menu_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(104, 'Created at: 2019/05/12 02:29:48 REQUEST_URI: /public/shop_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(105, 'Created at: 2019/05/12 02:29:50 REQUEST_URI: /public/profile_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(106, 'Created at: 2019/05/12 02:29:51 REQUEST_URI: /public/about_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(107, 'Created at: 2019/05/12 02:29:52 REQUEST_URI: /public/menu_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(108, 'Created at: 2019/05/12 02:29:53 REQUEST_URI: /public/profile_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(109, 'Created at: 2019/05/12 02:29:54 REQUEST_URI: /public/admin_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(110, 'Created at: 2019/05/12 02:30:30 REQUEST_URI: /public/profile_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(111, 'Created at: 2019/05/12 02:30:33 REQUEST_URI: /public/login_page.php?logout=1 Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36 IP-address: ::1 HTTP status: 200'),
(112, 'Created at: 2019/05/12 02:30:33 REQUEST_URI: /public/login_page.php Browser: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36 IP-address: ::1 HTTP status: 200');

-- --------------------------------------------------------

--
-- Table structure for table `orderproduct`
--

DROP TABLE IF EXISTS `orderproduct`;
CREATE TABLE IF NOT EXISTS `orderproduct` (
  `orderproduct_id` int(11) NOT NULL AUTO_INCREMENT,
  `price` decimal(10,0) DEFAULT NULL,
  `cost` varchar(45) DEFAULT NULL,
  `quantity` decimal(10,0) DEFAULT NULL,
  `subtotal` decimal(10,0) DEFAULT NULL,
  `taxes` decimal(10,0) DEFAULT NULL,
  `delivery_cost` decimal(10,0) DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`orderproduct_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderproduct`
--

INSERT INTO `orderproduct` (`orderproduct_id`, `price`, `cost`, `quantity`, `subtotal`, `taxes`, `delivery_cost`, `total`) VALUES
(1, '32', '15.00', '3', '2', '15', '7', '22'),
(2, '38', '19.00', '3', '2', '15', '7', '22'),
(3, '42', '12.00', '3', '2', '15', '7', '22'),
(4, '50', '26.00', '1', '4', '30', '0', '30'),
(5, '40', '20.00', '3', '4', '24', '7', '31');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `price` decimal(10,0) DEFAULT NULL,
  `cost` decimal(10,0) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `delivery_cost` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `price`, `cost`, `quantity`, `delivery_cost`) VALUES
(1, '32', '15', 3, 'after $50 dollars we deliver it for free'),
(2, '38', '19', 2, 'after $50 dollars we deliver it for free'),
(3, '42', '12', 1, 'after $50 dollars we deliver it for free'),
(4, '50', '26', 3, 'after $50 dollars we deliver it for free'),
(5, '40', '20', 5, 'after $50 dollars we deliver it for free'),
(6, '28', '10', 2, 'after $50 dollars we deliver it for free');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(45) DEFAULT NULL,
  `long_description` text,
  `short_description` varchar(255) DEFAULT NULL,
  `avalability` tinyint(1) NOT NULL DEFAULT '0',
  `country_of_origin` varchar(45) DEFAULT NULL,
  `weight` varchar(55) DEFAULT NULL,
  `price` varchar(55) DEFAULT NULL,
  `roast` varchar(45) DEFAULT NULL,
  `grind` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `long_description`, `short_description`, `avalability`, `country_of_origin`, `weight`, `price`, `roast`, `grind`) VALUES
(1, 'Vista', ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the \nindustry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type \nspecimen book.', 'sweet taste, with orange smell', 1, 'Brazil', '450gr', '$7.50', 'roasted', 'whole beans'),
(2, 'Kirima', ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the \nindustry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type \nspecimen book.', 'strong taste, with caramel smell', 0, 'Ephiophia', '500gr', NULL, '$6.20', 'roastedwhole beans'),
(3, 'Latto', ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the \nindustry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type \nspecimen book.', 'dark beans for stronger taste, with chocolate smell', 1, 'Guinea', '450gr', NULL, '$4.65', 'whole beans'),
(4, 'Bella', ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the \nindustry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type \nspecimen book.', 'aromatic - fresh and fruity', 1, 'Colombia', '450gr', NULL, '$5.60', 'whole beans'),
(5, 'Khadid', ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the \nindustry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type \nspecimen book.', 'sweet apple taste, with apple smell', 1, 'Brazil', '450gr', '$4.50', 'roasted', 'whole beans'),
(6, 'Perturico', ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the \nindustry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type \nspecimen book.', 'nonsweet taste, with strong grape smell', 1, 'Puerto-Rico', '500gr', '$4.50', 'unroasted', 'small grind'),
(7, 'Pronto', ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the \nindustry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type \nspecimen book.', 'sweet taste, with fruity smell', 1, 'Ephiophia', '500gr', '$6.75', 'unroasted', 'small grind'),
(8, 'Bravito', ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the \nindustry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type \nspecimen book.', 'aromatic, strong with orange smell', 1, 'Brazil', '450gr', '$5.50', 'roasted', 'whole beans'),
(9, 'Colombiana', ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the \nindustry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type \nspecimen book.', 'good taste, with aromatic after taste', 1, 'Colombia', '500gr', '$3.50', 'roasted', 'whole beans'),
(10, 'Karoline', ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the \nindustry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type \nspecimen book.', 'strong taste, with cappucino smell', 1, 'Brazil', '750gr', '$10.50', 'unroasted', 'whole beans'),
(11, 'Maria', ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the \nindustry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type \nspecimen book.', 'sweet taste, with orange smell', 1, 'Guinea', '650gr', '$7.50', 'roasted', 'medium grind'),
(12, 'Carla', ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the \nindustry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type \nspecimen book.', 'caramel taste, with aromatic after taste', 1, 'Mexico', '550gr', '$6.50', 'unroasted', 'whole beans'),
(13, 'Jubellee', ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the \nindustry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type \nspecimen book.', 'chocolate taste, with orange smell', 1, 'Brazil', '450gr', '$4.75', 'roasted', 'whole beans'),
(14, 'Supremo', ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the \nindustry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type \nspecimen book.', 'ease taste, with aromatic orange smell', 0, 'Tanzania', '450gr', '$5.50', 'roasted', 'whole beans'),
(15, 'Peaberry', ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the \nindustry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type \nspecimen book.', 'sweet taste, with orange smell', 1, 'Brazil', '450gr', '$8.50', 'roasted', 'whole beans'),
(16, 'Chocco', ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the \nindustry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type \nspecimen book.', 'sweet taste, with orange smell', 1, 'Gonduras', '550gr', '$4.50', 'unroasted', 'whole beans'),
(17, 'Storm', ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the \nindustry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type \nspecimen book.', 'sweet taste, with orange smell', 1, 'Guatemalla', '450gr', '$5.50', 'roasted', 'whole beans'),
(18, 'Ecselso', ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the \nindustry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type \nspecimen book.', 'sweet taste, with orange smell', 1, 'India', '550gr', '$6.50', 'roasted', 'whole beans'),
(19, 'Panamacho', ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the \nindustry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type \nspecimen book.', 'sweet taste, with orange smell', 1, 'Panama', '450gr', '$3.50', 'unroasted', 'whole beans'),
(20, 'Carlmelita', ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the \nindustry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type \nspecimen book.', 'caramel taste, with aromatic after taste', 1, 'Mexico', '550gr', '$6.50', 'unroasted', 'whole beans');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

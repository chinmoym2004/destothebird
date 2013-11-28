-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2013 at 02:08 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thebird`
--
CREATE DATABASE IF NOT EXISTS `thebird` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `thebird`;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2013_11_22_061208_create_users_table', 1),
('2013_11_22_085326_create_password_reminders_table', 2),
('2013_11_25_090212_create_users_upload_table', 3),
('2013_11_25_123726_create_users_upload_table', 4),
('2013_11_26_070704_create_users_upload_table', 5),
('2013_11_26_121442_create_users_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reminders`
--

CREATE TABLE IF NOT EXISTS `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_reminders_email_index` (`email`),
  KEY `password_reminders_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_reminders`
--

INSERT INTO `password_reminders` (`email`, `token`, `created_at`) VALUES
('chinmoym2004@gmail.com', '94a999f2309313fa2bbf5d7ae872e6dca484115c', '2013-11-22 03:26:17'),
('chinmoym2004@gmail.com', 'b03b8dd3b0d4187d52a2d415b3239410382c53de', '2013-11-25 00:34:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `useras` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `useras`, `created_at`, `updated_at`) VALUES
(1, 'chiin', 'Maity', 'chinmoym2004@gmail.com', '$2y$08$CEIu1drIl77VUEsCwoA7ge/8Tt.MVFF8lym0k2pOQtLqeNmVGWABq', '1', '2013-11-26 06:53:26', '2013-11-26 06:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `users_upload`
--

CREATE TABLE IF NOT EXISTS `users_upload` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `filpath` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Not verified','verified','processing','unknown') COLLATE utf8_unicode_ci NOT NULL,
  `specisname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `specificname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `recorded_on` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `identified_img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `identfId` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `users_upload_uid_index` (`uid`),
  KEY `users_upload_identfid_index` (`identfId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users_upload`
--

INSERT INTO `users_upload` (`id`, `uid`, `filpath`, `status`, `specisname`, `specificname`, `area`, `recorded_on`, `identified_img`, `identfId`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/file_5296ca65f1b9d', 'Not verified', 'chin2', 'chin2', 'chennai2', '0000000000000', '', 0, '2013-11-27 23:15:27', '0000-00-00 00:00:00'),
(3, 1, 'uploads/Sleep Away.mp3', 'Not verified', 'last', 'last', 'last', 'er8ti gi', '', 0, '2013-11-27 23:47:29', '0000-00-00 00:00:00'),
(4, 1, 'uploads/Sleep Away.mp3', 'Not verified', 'last2', 'last21', 'last21', 'good nit1', '', 0, '2013-11-28 06:29:52', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

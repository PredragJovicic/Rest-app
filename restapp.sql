-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 13, 2018 at 06:34 PM
-- Server version: 5.5.55-0ubuntu0.14.04.1
-- PHP Version: 7.0.19-1+deb.sury.org~trusty+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `restapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE IF NOT EXISTS `agencies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `countri` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `web` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`id`, `name`, `address`, `city`, `countri`, `phone`, `email`, `web`, `created_at`, `updated_at`) VALUES
(1, 'Hand-Rolfson', '4261 Howe MillTrantowborough, PA 05911-23941', 'Belgrade', 'Serbia', '(647) 326-52501', 'flossie72@lowe.com', 'www.addadadadad.com', '2018-03-08 13:03:39', '2018-03-11 16:06:54'),
(2, 'Ryan, Feil and Bode', '227 Idella Vista\nStromanshire, UT 35226', 'New york', 'America', '984.280.7348', 'espinka@hotmail.com', 'www.addadadadad.com', '2018-03-08 13:03:39', '2018-03-08 13:03:39'),
(3, 'Kub, Kirlin and Fadel', '672 Noel Passage Apt. 015\nNorth Angusview, MT 26238', 'Valjevo', 'Serbia', '1-445-750-2527 x9749', 'tierra18@hotmail.com', 'www.addadadadad.com', '2018-03-08 13:03:39', '2018-03-08 13:03:39'),
(22, 'Test agencija', '4261 Howe MillTrantowborough, PA 05911-23941', 'Belgrade', 'Serbia', '1-430-387-5258 x0641', 'aa@aa.aa', 'www.addadadadad.com', '2018-03-13 10:41:04', '2018-03-13 10:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `country`, `city`, `created_at`, `updated_at`) VALUES
(1, 'Serbia', 'Belgrade', NULL, NULL),
(2, 'Serbia', 'Valjevo', NULL, NULL),
(3, 'America', 'New york', NULL, NULL),
(4, 'America', 'Boston', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country`, `created_at`, `updated_at`) VALUES
(1, 'Serbia', NULL, NULL),
(2, 'America', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_05_095853_create_agencies_table', 1),
(4, '2018_03_05_111646_adds_api_token_to_users_table', 1),
(5, '2018_03_05_170950_create_professions_table', 1),
(6, '2018_03_05_171148_create_country_table', 1),
(7, '2018_03_05_171202_create_city_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professions`
--

CREATE TABLE IF NOT EXISTS `professions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `profession` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `professions`
--

INSERT INTO `professions` (`id`, `profession`, `created_at`, `updated_at`) VALUES
(1, 'Prefesor', NULL, NULL),
(2, 'Lawyer', NULL, NULL),
(3, 'Menager', NULL, NULL),
(4, 'Social worker', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `professions` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_api_token_unique` (`api_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `admin`, `agency`, `professions`, `phone`, `avatar`, `api_token`) VALUES
(1, 'Admin', 'admin@admin.admin', '$2y$10$SC6iBv.C1a/FkjcoRzTAxeUGdyxve.WhsdOhc5TfgM5gx7rsg0aRu', NULL, '2018-03-08 13:03:39', '2018-03-13 18:14:05', '1', '', '', '623.644.2776 x67150', '1_avatar.jpeg', NULL),
(2, 'Lavon Lubowitz', 'amara42@zboncak.org2', '$2y$10$vbGoD5M/QmhLG5fyuJ6uAu3RObFFbJg7enb/TlMHpJWdx4B4FZBPW', NULL, '2018-03-08 13:03:39', '2018-03-12 14:04:40', '0', 'Hand-Rolfson', 'Lawyer,Menager', '1-430-387-5258 x0641', '1520863480_avatar.jpeg', NULL),
(10, 'Moj kontakt', 'user@user.user', '$2y$10$b67Bs1BTP9gackTgMWD1/eTiI3NwHJ6l8eHp14agf865CU4du467.', NULL, '2018-03-13 10:42:21', '2018-03-13 13:52:18', '0', 'Ryan, Feil and Bode', 'Prefesor,Menager', '(647) 326-5250 1', '1520939678_avatar.png', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

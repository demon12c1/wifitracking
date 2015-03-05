-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 05, 2015 at 08:42 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wifi_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `Profile`
--

CREATE TABLE IF NOT EXISTS `Profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `profile_wifi_quantity` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `WifiInfo`
--

CREATE TABLE IF NOT EXISTS `WifiInfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `longtitude` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wifi_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wifi_pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `external_ip_wifi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bssid_wifi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `WifiInfo`
--

INSERT INTO `WifiInfo` (`id`, `longtitude`, `latitude`, `wifi_name`, `wifi_pass`, `description`, `external_ip_wifi`, `bssid_wifi`) VALUES
(25, '106.6407198', '10.8051745', 'Tenda_3D6A20', 'yfhh', 'ghvxf', '192.168.1.8', 'Tenda_3D6A20');

-- --------------------------------------------------------

--
-- Table structure for table `WifiPasswordListStore`
--

CREATE TABLE IF NOT EXISTS `WifiPasswordListStore` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wifi_id` int(11) DEFAULT NULL,
  `wifi_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wifi_pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_54510E705204490F` (`wifi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `WifiPasswordListStore`
--

INSERT INTO `WifiPasswordListStore` (`id`, `wifi_id`, `wifi_name`, `wifi_pass`) VALUES
(1, 25, 'Tenda_3D6A20', '54321'),
(3, 25, 'Tenda_3D6A20', '5432124215'),
(4, 25, 'Tenda_3D6A20', '5432124215');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `WifiPasswordListStore`
--
ALTER TABLE `WifiPasswordListStore`
  ADD CONSTRAINT `FK_54510E705204490F` FOREIGN KEY (`wifi_id`) REFERENCES `WifiInfo` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

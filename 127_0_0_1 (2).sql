-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 11, 2021 at 12:43 AM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eservweb`
--
CREATE DATABASE IF NOT EXISTS `eservweb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE eservweb;

-- --------------------------------------------------------

--
-- Table structure for table `lostnfound`
--

DROP TABLE IF EXISTS `lostnfound`;
CREATE TABLE IF NOT EXISTS `lostnfound` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `location` varchar(50) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lostnfound`
--

INSERT INTO `lostnfound` (`id`, `type`, `name`, `contact`, `subject`, `location`, `notes`, `date`, `time`) VALUES
(1, 'lost', 'hbhkg', 'ghkgh', 'gjkgjkg', 'jkgkgk', 'mnjlh', '2021-06-11', '00:38:53'),
(2, 'lost', 'h', 'hg', 'hg', 'hg', 'jg', '2021-06-11', '00:39:12'),
(3, 'found', 'j', 'j', 'lkhj', 'klhlk', 'hl', '2021-06-11', '00:39:36'),
(4, 'found', 'lkjklj', 'jkljlk', 'jkljklj', 'kljklj', 'kljkl', '2021-06-11', '00:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
CREATE TABLE IF NOT EXISTS `pictures` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `type` varchar(15) NOT NULL,
  `ref_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `name`, `type`, `ref_id`) VALUES
(1, 'add-to-cart.gif', 'lost', 1),
(2, '1_FA9JEiRgBpk8IrQ5jmDjHg@2x.png', 'lost', 2),
(3, 'checkoutbutton.gif', 'found', 3),
(4, 'Anime-Wallpapers-5.jpg', 'found', 4);

-- --------------------------------------------------------

--
-- Table structure for table `proofs`
--

DROP TABLE IF EXISTS `proofs`;
CREATE TABLE IF NOT EXISTS `proofs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `report_id` int NOT NULL,
  `proof_name` varchar(30) NOT NULL,
  `proof_loc` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `proofs`
--

INSERT INTO `proofs` (`id`, `report_id`, `proof_name`, `proof_loc`) VALUES
(1, 1, 'add-to-cart.gif', 'add-to-cart.gif');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `location` varchar(30) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `notes` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `name`, `location`, `contact`, `subject`, `notes`) VALUES
(1, 'jhjh', 'hkjhjkh', 'hkjh', 'hkjhjk', 'kjhk');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

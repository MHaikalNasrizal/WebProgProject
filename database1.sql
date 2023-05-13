-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 03, 2023 at 01:59 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database1`
--

-- --------------------------------------------------------

--
-- Table structure for table `category1`
--

DROP TABLE IF EXISTS `category1`;
CREATE TABLE IF NOT EXISTS `category1` (
  `id_Category` int NOT NULL AUTO_INCREMENT,
  `Category` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `CategoryQuota` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Descrip` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_Category`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category1`
--

INSERT INTO `category1` (`id_Category`, `Category`, `CategoryQuota`, `Descrip`) VALUES
(1, 'No Category', '1', 'You have not choose a subcategory yet.\r\nPlease choose subcategory to participate.'),
(5, 'Malaysian Cuisine', '10', 'This is a category for Malaysian Cuisine.\r\nE.g. Nasi Lemak, Curry, Chicken Rice'),
(6, 'Western Cuisine', '2', 'This is a category for Western Cuisine.\r\nE.g. Burgers, Pizza, Steak'),
(7, 'Japanese Cuisine', '2', 'This is a category for Japanese Cuisine.\r\nE.g. Ramen, Sushi, Tempura'),
(9, 'Chinese Cuisine', '2', 'This is a category for Chinese Cuisine\r\nE.g. Dim Sum, Dumplings, Char Siu'),
(10, 'Arabian Cuisine', '3', 'This is a category for Arabian Cuisine.\r\nE.g. Shawarma, Kebab, Falafel'),
(11, 'Thai Cuisine', '10', 'This is Thai Cuisine');

-- --------------------------------------------------------

--
-- Table structure for table `table1`
--

DROP TABLE IF EXISTS `table1`;
CREATE TABLE IF NOT EXISTS `table1` (
  `id_User` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Role` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_Category` int NOT NULL,
  `age` int DEFAULT NULL,
  `phone` bigint DEFAULT NULL,
  `address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `occupation` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_User`),
  KEY `id_Category` (`id_Category`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table1`
--

INSERT INTO `table1` (`id_User`, `Username`, `Password`, `Email`, `Role`, `id_Category`, `age`, `phone`, `address`, `occupation`, `gender`) VALUES
(1, 'Haikal', '2c0305a5226c76c7fd336c5067dde73e', 'haikal@gmail.com', 'Participant', 1, 0, 0, '', '', ''),
(18, 'Z4Teen', '209a122c94f77ce6474640da749cca10', 'zulhakimshinichi@gmail.com', 'Participant', 5, 22, 601155032587, 'Kelompok Cendekiawan Jalan IKRAM UNITEN Universiti Tenaga Nasional', 'Student', 'Female'),
(19, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail', 'Admin', 1, 20, 12345, 'UNITEN', 'Admin', 'Nonbinary'),
(20, 'Ahmad', '8de13959395270bf9d6819f818ab1a00', 'ahmad123@gmail.com', 'Participant', 5, 15, 601144789542, 'Lot 541, Jalan Bangi 1, Bangi, Selangor', 'Student', 'Male'),
(21, 'John', '6e0b7076126a29d5dfcbd54835387b7b', 'john@gmail.com', 'Participant', 6, 21, 60145873324, 'Kelompok Amanah, Persiaran Universiti, Universiti Tenaga Nasional 43000 Kajang Selangor', 'Student', 'Female'),
(22, 'Akmal', 'a4b409d73f441c78cb65cc5b55149e85', 'akmal@gmail.com', 'Participant', 6, 26, 60112342321, 'Lot 421 Shah Alam Juristech', 'Software Engineer', 'Male'),
(23, 'Jasmine', 'e3586b257e1b0d9300d2432b55deb8c3', 'jasmine@gmail.com', 'Participant', 9, 23, 60146582245, 'Kelompok Murni, Persiaran Universiti, Universiti Tenaga Nasional, Jalan IKRAM UNITEN, 43000 Selangor', 'Student', 'Female'),
(24, 'Bryan', '64b718b8502c31a5e94325d7d60777f8', 'bryan123@gmail.com', 'Participant', 9, 33, 60123198855, 'Lot 982, Jalan Kajang Lama, Bandar Teknologi Kajang, 43000 Kajang Selangor', 'Lecturer', 'Male'),
(25, 'Yuuki', 'ada8215eeded8c51b4346359746f7f84', 'yuuki@gmail.com', 'Participant', 7, 23, 6011332256432, 'Apartment Seri Perdana, Jalan Kenanga, Bangsar, 32122 Kuala Lumpur', 'Police', 'Male');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `table1`
--
ALTER TABLE `table1`
  ADD CONSTRAINT `table1_ibfk_1` FOREIGN KEY (`id_Category`) REFERENCES `category1` (`id_Category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 25, 2023 at 08:32 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

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
-- Table structure for table `table1`
--

DROP TABLE IF EXISTS `table1`;
CREATE TABLE IF NOT EXISTS `table1` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `Username` varchar(25) NOT NULL,
  `Password` varchar(225) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Role` varchar(25) NOT NULL,
  `Category` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table1`
--

INSERT INTO `table1` (`ID`, `Username`, `Password`, `Email`, `Role`, `Category`) VALUES
(2, 'Haikal', '2c0305a5226c76c7fd336c5067dde73e', 'Haikal@gmail.com', 'Admin', 'N/A'),
(6, 'Haok', 'NAsss', 'Hai@gmail.com', 'Participant', 'N/A'),
(7, 'sda', 'nas', 'asdad@gmail.com', 'Participant', 'N/A'),
(17, 'kk', '11', '111@gmail.com', 'Participant', 'N/A'),
(13, 'Irfan', 'Nas1', 'hik@gmail.com', 'Participant', 'N/A'),
(14, 'Irfan', 'nas2', 'hik@gmail.com', 'Participant', 'N/A'),
(15, 'jj', 'hh', 'jj@gmaill.com', 'Participant', 'N/A'),
(16, 'joew', '123', '123@gmail.com', 'Participant', 'N/A'),
(18, 'kk', '11', '111@gmail.com', 'Participant', 'N/A'),
(19, 'kk', '11', '111@gmail.com', 'Participant', 'N/A'),
(20, 'Haok2', 'nas', 'sasa@gma.com', 'Participant', 'N/A'),
(22, 'plo', 'aa', 'aa@gmail.com', 'Participant', 'N/A'),
(23, 'Yuuki', 'nas1', 'yuuki@gmail.com', 'Participant', 'N/A');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

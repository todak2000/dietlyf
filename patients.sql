-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2018 at 08:27 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dietlyf`
--

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `phoneNo` varchar(13) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('M','F') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `userName`, `firstName`, `lastName`, `phoneNo`, `email`, `password`, `age`, `gender`) VALUES
(0, 'Ebnet', 'Ebenezer', 'Ndukwe', '1223232323', 'ebene@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 99, 'M'),
(0, 'Ebnet', 'Ebenezer', 'Ndukwe', '1223232323', 'ebene@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 99, 'M'),
(0, 'Ebnet', 'Ebenezer', 'Ndukwe', '1223232323', 'ebene@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 99, 'M'),
(0, 'Ebnet', 'Ebenezer', 'Ndukwe', '1223232323', 'ebene@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 99, 'M'),
(0, 'Ebnet', 'Ebenezer', 'Ndukwe', '1223232323', 'ebene@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 99, 'M'),
(0, 'Ebnet', 'Ebenezer', 'Ndukwe', '1223232323', 'ebene@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 99, 'M'),
(0, 'Ebnet', 'Ebenezer', 'Ndukwe', '1223232323', 'ebene@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 99, 'M'),
(0, 'Ebnet', 'Ebenezer', 'Ndukwe', '1223232323', 'ebene@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 99, 'M'),
(0, 'Ebnet', 'sss', 'sds', 'wewe', 'ebene@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 343, 'F'),
(0, 'dan', 'dan', 'monday', '22333', 'dan@gmail.com', '9180b4da3f0c7e80975fad685f7f134e', 1999, 'M');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

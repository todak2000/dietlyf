-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2018 at 09:56 AM
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `phoneNo` varchar(13) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `bmi` int(11) NOT NULL,
  `bsl` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `userName`, `firstName`, `lastName`, `phoneNo`, `email`, `password`, `age`, `bmi`, `bsl`, `height`, `weight`, `gender`, `image`) VALUES
(1, 'dan', 'Daniel', 'Olagunju', '2333333', 'todak2000@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 34, 0, 0, 0, 0, 'M', ''),
(2, 'dddd', 'asasa', 'dss', '1222', 'user@prime.com', '900150983cd24fb0d6963f7d28e17f72', 2, 0, 0, 0, 0, 'M', ''),
(3, 'sqwq', 'trf', 'xcx', '2132', 'dan@prime.com', '900150983cd24fb0d6963f7d28e17f72', 44, 222, 22, 22, 0, 'M', ''),
(4, '', '', '', '', '', '', 0, 0, 0, 0, 0, 'M', ''),
(5, '', '', '', '', '', '', 0, 0, 0, 0, 0, 'M', ''),
(6, '', '', '', '', '', '', 0, 0, 0, 0, 0, 'M', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

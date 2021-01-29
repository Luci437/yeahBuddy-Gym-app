-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2021 at 10:42 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yeahbuddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `prdName` varchar(50) NOT NULL,
  `prdDesc` varchar(500) NOT NULL,
  `prdImage` varchar(100) NOT NULL,
  `prdPrice` bigint(20) NOT NULL,
  `prdQty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `prdName`, `prdDesc`, `prdImage`, `prdPrice`, `prdQty`) VALUES
(1, 'Rope', 'This is very long lasting rope', 'images/uploads/prd.jpg', 321, 12),
(2, 'Dumbell', 'This is a 2kg dumbell', 'images/uploads/61qdBdwYHXL._SL1280_.jpg', 340, 12);

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `id` int(11) NOT NULL,
  `trainerName` varchar(50) NOT NULL,
  `trainerAbout` varchar(200) NOT NULL,
  `trainerImage` varchar(200) NOT NULL,
  `trainerEOX` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`id`, `trainerName`, `trainerAbout`, `trainerImage`, `trainerEOX`) VALUES
(1, 'Reniz', 'He is very good ', 'images/uploads/trainer4.jpg', 34);

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(500) NOT NULL,
  `profile_pic` varchar(300) DEFAULT 'images/uploads/logo.jpg',
  `phone` bigint(12) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `firstName`, `lastName`, `gender`, `email`, `password`, `profile_pic`, `phone`) VALUES
(16, 'Kamal', 'E J', NULL, 'kamal@gmail.com', 'kamal', 'images/uploads/ronnie_coleman_255-mobile.jpg', 7025396023),
(17, 'Reniz', 'Nazar', NULL, 'reniz@gmail.com', 'reniz', 'images/uploads/pic5.jpg', 5689231518),
(18, 'Sachin', 'Geo Jacob', NULL, 'sachin@gmail.com', 'sachin', 'images/uploads/sijo_george.jpg', 12457823),
(20, 'Aby', 'Thomas', NULL, 'aby@gmail.com', 'aby', 'images/uploads/logo.jpg', 7542563219);

-- --------------------------------------------------------

--
-- Table structure for table `userwh`
--

CREATE TABLE `userwh` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_weight` int(11) NOT NULL DEFAULT 0,
  `user_height` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userwh`
--

INSERT INTO `userwh` (`id`, `user_id`, `user_weight`, `user_height`) VALUES
(12, 16, 80, 171),
(13, 17, 55, 182),
(14, 18, 5, 110),
(16, 20, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `userwh`
--
ALTER TABLE `userwh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userwh_ibfk_1` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `userwh`
--
ALTER TABLE `userwh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userwh`
--
ALTER TABLE `userwh`
  ADD CONSTRAINT `userwh_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usertable` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

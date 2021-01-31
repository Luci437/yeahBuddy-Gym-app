-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2021 at 07:27 AM
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
-- Table structure for table `advice`
--

CREATE TABLE `advice` (
  `id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(2000) NOT NULL,
  `send_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advice`
--

INSERT INTO `advice` (`id`, `trainer_id`, `user_id`, `message`, `send_time`) VALUES
(4, 21, 16, 'This is the most awesome place ', '31-01-2021');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orderaddress`
--

CREATE TABLE `orderaddress` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `houseName` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `distric` varchar(50) NOT NULL,
  `pincode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderaddress`
--

INSERT INTO `orderaddress` (`id`, `order_id`, `houseName`, `state`, `distric`, `pincode`) VALUES
(6, 6, 'KarukaParambil', 'Kerala', 'Idukki', '68486595'),
(7, 7, 'IttiManiHouse', 'Kerala', 'Kottayam', '5461648'),
(8, 8, 'Edathiparambil', 'Kerala', 'Kottayam', '686608');

-- --------------------------------------------------------

--
-- Table structure for table `orderedproducts`
--

CREATE TABLE `orderedproducts` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `prdStatus` varchar(20) NOT NULL DEFAULT 'waiting'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderedproducts`
--

INSERT INTO `orderedproducts` (`id`, `order_id`, `prd_id`, `qty`, `prdStatus`) VALUES
(8, 6, 1, 1, 'confirm'),
(9, 6, 2, 1, 'confirm'),
(10, 7, 2, 1, 'confirm'),
(11, 8, 4, 1, 'waiting'),
(12, 8, 1, 1, 'waiting');

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
(1, 'Rope', 'This is very long lasting rope', 'images/uploads/prd.jpg', 321, 8),
(2, 'Dumbell', 'This is a 2kg dumbell', 'images/uploads/61qdBdwYHXL._SL1280_.jpg', 340, 7),
(3, 'Protein ', 'Very good quality protein', 'images/uploads/ON-Gold-Standard-Whey-Protein-5Lb.jpg', 999, 50),
(4, 'Rest table', 'Very good table', 'images/uploads/514Z7DC6TmL._SL1010_.jpg', 879, 49);

-- --------------------------------------------------------

--
-- Table structure for table `productorder`
--

CREATE TABLE `productorder` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `totalPay` int(11) NOT NULL,
  `orderDate` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'ordered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productorder`
--

INSERT INTO `productorder` (`id`, `user_id`, `totalPay`, `orderDate`, `status`) VALUES
(6, 20, 661, '2021/01/30', 'ordered'),
(7, 18, 340, '2021/01/30', 'ordered'),
(8, 16, 1200, '2021/01/31', 'ordered');

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `id` int(11) NOT NULL,
  `trainerName` varchar(50) NOT NULL,
  `trainerAbout` varchar(200) NOT NULL,
  `trainerImage` varchar(200) NOT NULL,
  `trainerEOX` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`id`, `trainerName`, `trainerAbout`, `trainerImage`, `trainerEOX`, `user_id`) VALUES
(4, 'Reniz', 'Got Phd in Gym Trainer', 'images/uploads/trainer1.jpg', 5, 21);

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(500) NOT NULL,
  `profile_pic` varchar(300) DEFAULT 'images/uploads/logo.jpg',
  `phone` bigint(12) DEFAULT 0,
  `role` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `firstName`, `lastName`, `gender`, `email`, `password`, `profile_pic`, `phone`, `role`) VALUES
(16, 'Kamal', 'E J', NULL, 'kamal@gmail.com', 'kamal', 'images/uploads/ronnie_coleman_255-mobile.jpg', 7025396023, 'user'),
(17, 'Reniz', 'Nazar', NULL, 'reniz@gmail.com', 'reniz', 'images/uploads/pic5.jpg', 5689231518, 'user'),
(18, 'Sachin', 'Geo Jacob', NULL, 'sachin@gmail.com', 'sachin', 'images/uploads/sijo_george.jpg', 12457823, 'user'),
(20, 'Aby', 'Thomas', NULL, 'aby@gmail.com', 'aby', 'images/uploads/logo.jpg', 7542563219, 'user'),
(21, NULL, NULL, NULL, 'reniz@yeahbuddy.com', 'reniz', 'images/uploads/logo.jpg', 0, 'trainer');

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
(16, 20, 52, 165);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advice`
--
ALTER TABLE `advice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderaddress`
--
ALTER TABLE `orderaddress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `orderedproducts`
--
ALTER TABLE `orderedproducts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productorder`
--
ALTER TABLE `productorder`
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
-- AUTO_INCREMENT for table `advice`
--
ALTER TABLE `advice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orderaddress`
--
ALTER TABLE `orderaddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orderedproducts`
--
ALTER TABLE `orderedproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `productorder`
--
ALTER TABLE `productorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `userwh`
--
ALTER TABLE `userwh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderaddress`
--
ALTER TABLE `orderaddress`
  ADD CONSTRAINT `orderaddress_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `productorder` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderedproducts`
--
ALTER TABLE `orderedproducts`
  ADD CONSTRAINT `orderedproducts_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `productorder` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userwh`
--
ALTER TABLE `userwh`
  ADD CONSTRAINT `userwh_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usertable` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 30, 2022 at 12:16 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pro1014_duan`
--

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `id` smallint(6) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Comment`
--

CREATE TABLE `Comment` (
  `user_id` int(6) NOT NULL,
  `product_id` int(6) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Feedback`
--

CREATE TABLE `Feedback` (
  `user_id` int(6) NOT NULL,
  `product_id` int(6) NOT NULL,
  `text` text NOT NULL,
  `rating` float(3,0) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Order`
--

CREATE TABLE `Order` (
  `id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `price` double NOT NULL DEFAULT 0,
  `is_pay` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 false / 1 true',
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `OrderDetail`
--

CREATE TABLE `OrderDetail` (
  `order_id` int(6) NOT NULL,
  `product_id` int(6) NOT NULL,
  `quantity` int(4) NOT NULL DEFAULT 1,
  `price` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `id` int(6) NOT NULL,
  `cate_id` smallint(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `sale_percent` float NOT NULL DEFAULT 0,
  `rating` float NOT NULL DEFAULT 0,
  `img_url` varchar(255) NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0 false / 1 true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

CREATE TABLE `Role` (
  `id` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Role`
--

INSERT INTO `Role` (`id`, `name`) VALUES
(0, 'user'),
(1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int(6) NOT NULL,
  `role_id` tinyint(1) NOT NULL DEFAULT 0,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `currency` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `role_id`, `username`, `password`, `email`, `fullname`, `phone_number`, `currency`) VALUES
(1, 1, 'pthieenlong', 'pthieenlong', 'longptps19740@fpt.edu.vn', 'Pham Thien Long', '0373118242', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Comment`
--
ALTER TABLE `Comment`
  ADD KEY `fk_user_cmt` (`user_id`),
  ADD KEY `fk_prd_cmt` (`product_id`);

--
-- Indexes for table `Feedback`
--
ALTER TABLE `Feedback`
  ADD KEY `fk_user_feedback` (`user_id`),
  ADD KEY `fk_product_feedback` (`product_id`);

--
-- Indexes for table `Order`
--
ALTER TABLE `Order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user_id`);

--
-- Indexes for table `OrderDetail`
--
ALTER TABLE `OrderDetail`
  ADD KEY `order` (`order_id`),
  ADD KEY `product` (`product_id`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cate` (`cate_id`);

--
-- Indexes for table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Order`
--
ALTER TABLE `Order`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `fk_prd_cmt` FOREIGN KEY (`product_id`) REFERENCES `Product` (`id`),
  ADD CONSTRAINT `fk_user_cmt` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

--
-- Constraints for table `Feedback`
--
ALTER TABLE `Feedback`
  ADD CONSTRAINT `fk_product_feedback` FOREIGN KEY (`product_id`) REFERENCES `Product` (`id`),
  ADD CONSTRAINT `fk_user_feedback` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

--
-- Constraints for table `Order`
--
ALTER TABLE `Order`
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

--
-- Constraints for table `OrderDetail`
--
ALTER TABLE `OrderDetail`
  ADD CONSTRAINT `order` FOREIGN KEY (`order_id`) REFERENCES `Order` (`id`),
  ADD CONSTRAINT `product` FOREIGN KEY (`product_id`) REFERENCES `Product` (`id`);

--
-- Constraints for table `Product`
--
ALTER TABLE `Product`
  ADD CONSTRAINT `cate` FOREIGN KEY (`cate_id`) REFERENCES `Category` (`id`);

--
-- Constraints for table `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `role` FOREIGN KEY (`role_id`) REFERENCES `Role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

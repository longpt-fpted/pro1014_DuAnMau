-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 20, 2022 at 03:28 AM
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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` smallint(6) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'FPS'),
(3, 'Video Production'),
(4, 'Simulation'),
(5, 'Sport'),
(6, 'Anthem'),
(7, 'Origin'),
(8, 'Acc Game'),
(9, '3D'),
(10, 'Ubisoft'),
(11, 'RPG'),
(12, 'Adventure'),
(13, 'Battle Field'),
(14, 'Racing');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `user_id` int(6) NOT NULL,
  `product_id` int(6) NOT NULL,
  `text` text NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 - notify\r\n1 - faqs',
  `subject` text DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `user_id` int(6) NOT NULL,
  `product_id` int(6) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`user_id`, `product_id`, `date`) VALUES
(1, 4, '2022-07-16'),
(1, 2, '2022-07-16'),
(1, 12, '2022-07-16'),
(1, 13, '2022-07-16'),
(1, 40, '2022-07-16'),
(1, 3, '2022-07-15'),
(1, 4, '2022-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `user_id` int(6) NOT NULL,
  `product_id` int(6) NOT NULL,
  `text` text NOT NULL,
  `rating` float(3,0) NOT NULL DEFAULT 0,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`user_id`, `product_id`, `text`, `rating`, `date`) VALUES
(1, 17, 'tùm lum tùm la trong đây nè ba', 0, '2022-07-19'),
(1, 34, 'game này rất là hay, đáng tiền để mua và trải nghiệm', 0, '2022-07-19'),
(1, 35, 'Game này rất đáng sợ khi chơi một mình huhu', 40, '2022-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `Notify`
--

CREATE TABLE `Notify` (
  `id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `type` int(1) NOT NULL DEFAULT 0 COMMENT '0 = product sale\r\n1 = product feedback\r\n2 = order done',
  `type_id` int(6) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Notify`
--

INSERT INTO `Notify` (`id`, `user_id`, `type`, `type_id`, `date`) VALUES
(2, 1, 1, 17, '2022-07-18'),
(3, 1, 1, 35, '2022-07-18'),
(5, 1, 1, 25, '2022-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `price` double NOT NULL DEFAULT 0,
  `is_pay` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 false / 1 true',
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `price`, `is_pay`, `date`) VALUES
(1, 1, 5837400, 1, '2022-07-12'),
(2, 1, 4875500, 1, '2022-07-12'),
(3, 1, 1553400, 1, '2022-07-12'),
(4, 1, 3982850, 1, '2022-07-13'),
(12, 1, 1552000, 1, '2022-07-13'),
(13, 1, 648600, 1, '2022-07-13'),
(33, 1, 1297200, 1, '2022-07-13'),
(38, 1, 1158200, 1, '2022-07-13'),
(39, 1, 190000, 1, '2022-07-13'),
(41, 1, 285000, 1, '2022-07-18'),
(42, 1, 2503500, 1, '2022-07-18'),
(43, 1, 1552000, 1, '2022-07-18'),
(44, 1, 0, 0, '2022-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `order_id` int(6) NOT NULL,
  `product_id` int(6) NOT NULL,
  `quantity` int(4) NOT NULL DEFAULT 1,
  `price` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 2, 9, 5837400),
(2, 17, 1, 787500),
(2, 3, 1, 4088000),
(3, 13, 1, 254800),
(3, 2, 1, 648600),
(3, 19, 1, 650000),
(4, 2, 1, 648600),
(4, 13, 1, 254800),
(4, 25, 1, 1552000),
(4, 23, 1, 1527450),
(12, 25, 1, 1552000),
(13, 2, 1, 648600),
(33, 2, 2, 1297200),
(38, 13, 2, 509600),
(38, 2, 1, 648600),
(39, 39, 2, 190000),
(41, 39, 3, 285000),
(42, 17, 1, 787500),
(42, 35, 1, 1716000),
(43, 25, 1, 1552000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(6) NOT NULL,
  `cate_id` smallint(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `sale_percent` float NOT NULL DEFAULT 0,
  `rating` float NOT NULL DEFAULT 0,
  `img_url` varchar(255) NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `sell_count` int(11) NOT NULL DEFAULT 0,
  `is_available` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0 false / 1 true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cate_id`, `name`, `price`, `sale_percent`, `rating`, `img_url`, `view`, `sell_count`, `is_available`) VALUES
(1, 2, 'Battlefield 4 - Origin', 500000, 5, 70, './assets/game/bf4.png', 2, 0, 1),
(2, 1, 'MONSTER HUNTER RISE + Special DLC (Item Pack) (CD Key Steam)', 1410000, 54, 50, './assets/game/mhr.jpg', 1, 14, 1),
(3, 3, 'VEGAS Pro 17 Edit Steam Edition', 5110000, 20, 45, './assets/game/vp17.jpg', 2, 0, 1),
(4, 3, 'VEGAS Pro 16 Edit Steam Edition', 4491000, 10, 90, './assets/game/vp16.jpg', 0, 0, 1),
(5, 3, 'VEGAS Pro 14 Edit Steam Edition', 3880000, 10, 100, './assets/game/vp14.jpg', 0, 0, 1),
(6, 4, 'Microsoft Flight Simulator Premium Deluxe Bundle', 2536000, 10, 80, './assets/game/mfs.jpg', 0, 0, 1),
(7, 5, 'EA SPORTS™ FIFA 21 Ultimate Edition', 2224000, 10, 25, './assets/game/ff21.jpg', 0, 0, 1),
(8, 4, 'Fire Safety VR Training', 2175000, 10, 0, './assets/game/fsvr.jpg', 0, 0, 1),
(9, 1, 'Call of Duty®: Black Ops III - Zombies Deluxe', 2150000, 10, 100, './assets/game/cod.png', 0, 0, 1),
(10, 1, 'Call of Duty®: Black Ops III - Zetsubou No Shima Zombies Map', 178000, 0, 90, './assets/game/cod_zetsubou.jpg', 0, 0, 1),
(11, 4, 'War Thunder - Black Friday 2021 Pack\r\n', 1978000, 10, 3, './assets/game/War Thunder - Black Friday 2021 Pack.jpg\n', 0, 0, 1),
(12, 12, 'FINAL FANTASY VII REMAKE INTERGRADE', 1702000, 0, 0, './assets/game/FINAL FANTASY VII REMAKE INTERGRADE.jpg', 0, 0, 1),
(13, 12, 'The Sims™ 4', 980000, 74, 0, './assets/game/The Sims™ 4.png', 4, 2, 1),
(14, 12, 'Red Dead Redemption 2: Ultimate Edition', 1561000, 0, 0, './assets/game/Red Dead Redemption 2 Ultimate Edition.jpg', 0, 0, 1),
(15, 12, 'Watch_Dogs2 Gold Edition', 1561000, 0, 0, './assets/game/Watch_Dogs2 Gold Edition.jpg', 0, 0, 1),
(16, 14, 'The Crew 2 - Gold Edition', 1485000, 0, 0, './assets/game/The Crew 2 - Gold Edition.jpg', 0, 0, 1),
(17, 13, 'Battlefield 3 Premium Edition', 1050000, 25, 0, './assets/game/Battlefield 3 Premium Edition.jpg', 0, 1, 1),
(18, 13, 'Battlefield 4 Premium Edition', 1000000, 11, 0, './assets/game/Battlefield 4 Premium Edition.jpg', 0, 0, 1),
(19, 13, 'Battlefield 1 Revolution', 1000000, 35, 0, './assets/game/Battlefield 1 Revolution.png', 2, 0, 1),
(20, 5, 'Madden NFL 22 (Origin)', 1080000, 0, 0, './assets/game/Madden NFL 22 (Origin).jpg', 0, 0, 1),
(21, 2, 'Titanfall™ 2', 1250000, 0, 0, './assets/game/Titanfall™ 2.jpg', 0, 0, 1),
(22, 6, 'Anthem Legion of Dawn Edition', 1750000, 10, 0, './assets/game/Anthem Legion of Dawn Edition.png', 0, 0, 1),
(23, 10, 'Assassin\'s Creed® Odyssey - Ultimate Edition', 1797000, 15, 0, './assets/game/Assassin\'s Creed® Odyssey - Ultimate Edition.jpg', 0, 1, 1),
(24, 13, 'Battlefield™ 1 Shortcut Kit: Ultimate Bundle - Origin', 990000, 0, 0, './assets/game/Battlefield™ 1 Shortcut Kit Ultimate Bundle - Origin.png', 0, 0, 1),
(25, 1, 'DRAGON BALL FighterZ - Ultimate Edition', 1940000, 20, 0, './assets/game/DRAGON BALL FighterZ - Ultimate Edition.jpg', 0, 3, 1),
(26, 1, 'SCP: Derelict - SciFi First Person Shooter', 1514000, 0, 0, './assets/game/SCP Derelict - SciFi First Person Shooter.jpg', 0, 0, 1),
(27, 1, 'SOULCALIBUR VI Deluxe Edition', 1514000, 0, 0, './assets/game/SOULCALIBUR VI Deluxe Edition.jpg', 0, 0, 1),
(28, 1, 'FOR HONOR™ - COMPLETE EDITION', 1561000, 0, 0, './assets/game/FOR HONOR™ - COMPLETE EDITION.jpg', 0, 0, 1),
(29, 12, 'Tom Clancy\'s Ghost Recon Wildlands - Ultimate Year 2', 1561000, 0, 0, './assets/game/Tom Clancy\'s Ghost Recon Wildlands - Ultimate Year 2.jpg', 0, 0, 1),
(30, 5, 'NBA 2K21 Mamba Forever', 1608000, 0, 0, './assets/game/NBA 2K21 Mamba Forever.jpg', 0, 0, 1),
(31, 4, 'Jurassic World Evolution: Premium Edition', 1600000, 0, 0, './assets/game/Jurassic World Evolution Premium Edition.png', 0, 0, 1),
(32, 11, 'Ni no Kuni II: Revenant Kingdom - The Prince\'s Edition', 1637000, 0, 0, './assets/game/Ni no Kuni II Revenant Kingdom - The Prince\'s Edition.jpg', 0, 0, 1),
(33, 1, 'DRAGON BALL FighterZ - FighterZ Edition', 1637000, 0, 0, './assets/game/DRAGON BALL FighterZ - FighterZ Edition.jpg', 0, 0, 1),
(34, 1, 'Back 4 Blood Ultimate', 1700000, 10, 0, './assets/game/Back 4 Blood Ultimate.jpg', 0, 0, 1),
(35, 1, 'Resident Evil Village Deluxe Edition', 1716000, 0, 0, './assets/game/Resident Evil Village Deluxe Edition.jpg', 0, 1, 1),
(36, 2, 'Titanfall™ 2 Ultimate Edition', 700000, 0, 0, './assets/game/Titanfall™ 2 Ultimate Edition.jpg', 0, 0, 1),
(37, 2, 'Titanfall™ 2', 1250000, 0, 0, './assets/game/Titanfall™ 2.jpg', 0, 0, 1),
(38, 8, 'Tài Khoản PUBG Cực Vip', 1000000, 0, 0, './assets/game/pubg.jpg', 0, 0, 1),
(39, 8, 'Tài Khoản Battlefield 5 (Origin)', 950000, 90, 0, './assets/game/Tài Khoản Battlefield 5 (Origin).jpg', 8, 2, 1),
(40, 7, 'It Takes Two (Origin)', 750000, 20, 0, './assets/game/It Takes Two (Origin).jpeg', 3, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(0, 'user'),
(1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(6) NOT NULL,
  `role_id` tinyint(1) NOT NULL DEFAULT 0,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone_number` varchar(10) DEFAULT NULL,
  `currency` double NOT NULL DEFAULT 0,
  `avatar` text DEFAULT './assets/images/man.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role_id`, `username`, `password`, `email`, `fullname`, `phone_number`, `currency`, `avatar`) VALUES
(1, 1, 'pthieenlong', 'pthieenlong', 'longptps19740@fpt.edu.vn', 'Pham Thien Long', '0373118242', 99984276250, ''),
(2, 0, 'tester', 'tester', 'tester@gmail.com', 'Day la tai khoan Tester', '0999999999', 0, './assets/images/man.png'),
(3, 0, 'tuilatester', 'pthieenlong', 'vgvvghvhv@gmail.com', 'Tui la User', '0', 0, './assets/images/man.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD KEY `fk_user_cmt` (`user_id`),
  ADD KEY `fk_prd_cmt` (`product_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD KEY `favorite_user_id` (`user_id`),
  ADD KEY `favorite_product_id` (`product_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD KEY `fk_user_feedback` (`user_id`),
  ADD KEY `fk_product_feedback` (`product_id`);

--
-- Indexes for table `Notify`
--
ALTER TABLE `Notify`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_notify` (`user_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user_id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD KEY `order` (`order_id`),
  ADD KEY `product` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cate` (`cate_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Notify`
--
ALTER TABLE `Notify`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_prd_cmt` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `fk_user_cmt` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `favorite_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_product_feedback` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `fk_user_feedback` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

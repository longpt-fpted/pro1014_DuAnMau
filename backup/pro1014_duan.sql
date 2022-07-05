-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th7 05, 2022 lúc 07:37 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pro1014_duan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` smallint(6) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'FPS'),
(3, 'Video Production'),
(4, 'Simulation'),
(5, 'Sport');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `user_id` int(6) NOT NULL,
  `product_id` int(6) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `user_id` int(6) NOT NULL,
  `product_id` int(6) NOT NULL,
  `text` text NOT NULL,
  `rating` float(3,0) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Notify`
--

CREATE TABLE `Notify` (
  `id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `price` double NOT NULL DEFAULT 0,
  `is_pay` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 false / 1 true',
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `order_id` int(6) NOT NULL,
  `product_id` int(6) NOT NULL,
  `quantity` int(4) NOT NULL DEFAULT 1,
  `price` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
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
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `cate_id`, `name`, `price`, `sale_percent`, `rating`, `img_url`, `view`, `sell_count`, `is_available`) VALUES
(1, 2, 'Battlefield 4 - Origin', 500000, 5, 70, 'bf4.png', 2, 0, 1),
(2, 1, 'MONSTER HUNTER RISE + Special DLC (Item Pack) (CD Key Steam)', 1410000, 54, 50, 'mhr.jpg', 0, 0, 1),
(3, 3, 'VEGAS Pro 17 Edit Steam Edition', 5110000, 20, 45, 'vp17.jpg', 0, 0, 1),
(4, 3, 'VEGAS Pro 16 Edit Steam Edition', 4491000, 10, 90, 'vp16.jpg', 0, 0, 1),
(5, 3, 'VEGAS Pro 14 Edit Steam Edition', 3880000, 10, 100, 'vp14.jpg', 0, 0, 1),
(6, 4, 'Microsoft Flight Simulator Premium Deluxe Bundle', 2536000, 10, 80, 'mfs.jpg', 0, 0, 1),
(7, 5, 'EA SPORTS™ FIFA 21 Ultimate Edition', 2224000, 10, 25, 'ff21.jpg', 0, 0, 1),
(8, 4, 'Fire Safety VR Training', 2175000, 10, 0, 'fsvr.jpg', 0, 0, 1),
(9, 1, 'Call of Duty®: Black Ops III - Zombies Deluxe', 2150000, 10, 100, 'cod.png', 0, 0, 1),
(10, 1, 'Call of Duty®: Black Ops III - Zetsubou No Shima Zombies Map', 178000, 0, 90, 'cod_zetsubou.jpg', 0, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(0, 'user'),
(1, 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
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
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `role_id`, `username`, `password`, `email`, `fullname`, `phone_number`, `currency`, `avatar`) VALUES
(1, 1, 'pthieenlong', 'pthieenlong', 'longptps19740@fpt.edu.vn', 'Pham Thien Long', '0373118242', 0, ''),
(2, 0, 'tester', 'tester', 'tester@gmail.com', 'Day la tai khoan Tester', '0999999999', 0, './assets/images/man.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD KEY `fk_user_cmt` (`user_id`),
  ADD KEY `fk_prd_cmt` (`product_id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD KEY `fk_user_feedback` (`user_id`),
  ADD KEY `fk_product_feedback` (`product_id`);

--
-- Chỉ mục cho bảng `Notify`
--
ALTER TABLE `Notify`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_notify` (`user_id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user_id`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD KEY `order` (`order_id`),
  ADD KEY `product` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cate` (`cate_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `Notify`
--
ALTER TABLE `Notify`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_prd_cmt` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `fk_user_cmt` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_product_feedback` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `fk_user_feedback` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `Notify`
--
ALTER TABLE `Notify`
  ADD CONSTRAINT `user_notify` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `order` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `cate` FOREIGN KEY (`cate_id`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

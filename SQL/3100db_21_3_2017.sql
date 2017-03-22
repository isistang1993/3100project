-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-03-21 11:34:50
-- 伺服器版本: 10.1.21-MariaDB
-- PHP 版本： 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `3100db`
--

-- --------------------------------------------------------

--
-- 資料表結構 `account`
--

CREATE TABLE `account` (
  `acc_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lock_date` date DEFAULT NULL,
  `type` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `account`
--

INSERT INTO `account` (`acc_id`, `username`, `password`, `create_date`, `lock_date`, `type`) VALUES
(1, 'isis1234', 'isistang', '2017-03-08 23:28:14', NULL, 'sup'),
(2, 'lbmdderek', '19960304', '2017-03-08 23:28:14', NULL, 'sup'),
(3, 'kenkenken', 'suckmydick', '2017-03-08 23:28:14', NULL, 'sup'),
(4, 'opopopocd', 'wooohooo', '2017-03-08 23:28:14', NULL, 'nor'),
(5, 'chanch5', '12345678', '2017-03-08 23:28:15', NULL, 'sup'),
(6, 'ingrid6028', '12345678', '2017-03-08 23:28:15', NULL, 'U'),
(7, 'honglo', 'dllmdllm', '2017-03-08 23:28:15', NULL, 'ft'),
(8, 'doublej', '13579', '2017-03-08 23:28:15', NULL, 'pt');

-- --------------------------------------------------------

--
-- 資料表結構 `brand`
--

CREATE TABLE `brand` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(20) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remove_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `brand`
--

INSERT INTO `brand` (`b_id`, `b_name`, `phone`, `address`, `create_date`, `remove_date`) VALUES
(4, 'Nike', '11111111', 'United States', '2017-03-08 23:28:16', NULL),
(5, 'Adidas', '222222222', 'Germany', '2017-03-08 23:28:16', NULL),
(6, 'Converse', '33333333', 'United States', '2017-03-08 23:28:16', NULL),
(7, 'Vans', '44444444', 'United States', '2017-03-08 23:28:16', NULL),
(8, 'New Balance', '55555555', 'United Kingdom', '2017-03-08 23:28:17', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `colour`
--

CREATE TABLE `colour` (
  `cr_id` int(11) NOT NULL,
  `cr_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `colour`
--

INSERT INTO `colour` (`cr_id`, `cr_name`) VALUES
(6, 'Black'),
(7, 'White'),
(8, 'Red'),
(9, 'Green'),
(10, 'Blue'),
(11, 'Grey'),
(12, 'Navy'),
(13, 'Pink');

-- --------------------------------------------------------

--
-- 資料表結構 `driver_account`
--

CREATE TABLE `driver_account` (
  `driver_id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `work_type` varchar(15) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lock_date` date DEFAULT NULL,
  `resign_date` date DEFAULT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `driver_account`
--

INSERT INTO `driver_account` (`driver_id`, `acc_id`, `phone`, `email`, `work_type`, `create_date`, `lock_date`, `resign_date`, `f_name`, `l_name`) VALUES
(1, 7, '22222222', 'hong@3100.com', 'FT', '2017-03-08 23:59:03', NULL, NULL, 'Hong', 'Lo'),
(2, 8, '22222222', 'matthew@3100.com', 'PT', '2017-03-08 23:59:03', NULL, NULL, 'Matthew', 'Ting');

-- --------------------------------------------------------

--
-- 資料表結構 `message`
--

CREATE TABLE `message` (
  `msg_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `msg` varchar(500) DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remove_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `officer_account`
--

CREATE TABLE `officer_account` (
  `officer_id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lock_date` date DEFAULT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `officer_account`
--

INSERT INTO `officer_account` (`officer_id`, `acc_id`, `email`, `type`, `create_date`, `lock_date`, `f_name`, `l_name`) VALUES
(1, 1, 'isis@3100.com', 'sup', '2017-03-08 23:59:03', NULL, 'Isis', 'Tang'),
(2, 2, 'derek@3100.com', 'sup', '2017-03-08 23:59:04', NULL, 'Derek', 'Leung'),
(3, 3, 'ken@3100.com', 'sup', '2017-03-08 23:59:04', NULL, 'Ken', 'Hon'),
(4, 4, 'sharon@3100.com', 'nor', '2017-03-08 23:59:04', NULL, 'Sharon', 'Yim'),
(5, 5, 'tom@3100.com', 'sup', '2017-03-08 23:59:04', NULL, 'Tom', 'Chan');

-- --------------------------------------------------------

--
-- 資料表結構 `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shoes_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `ship_date` date DEFAULT NULL,
  `create_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `remove_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_method` varchar(20) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `detail` varchar(200) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remove_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `rank`
--

CREATE TABLE `rank` (
  `rank_id` int(11) NOT NULL,
  `shoes_id` int(11) NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `sex`
--

CREATE TABLE `sex` (
  `sex` varchar(5) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `sex`
--

INSERT INTO `sex` (`sex`, `name`) VALUES
('F', 'Women'),
('K', 'Kids'),
('M', 'Men'),
('O', 'Others');

-- --------------------------------------------------------

--
-- 資料表結構 `shoes`
--

CREATE TABLE `shoes` (
  `s_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img_src_name_1` varchar(200) DEFAULT NULL,
  `img_src_name_2` varchar(200) NOT NULL,
  `img_src_name_3` varchar(200) NOT NULL,
  `img_src_name_4` varchar(200) NOT NULL,
  `cr_id` int(10) NOT NULL,
  `size` varchar(10) NOT NULL,
  `sex` varchar(2) NOT NULL,
  `qty` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `p_details` varchar(500) NOT NULL,
  `highlights` varchar(500) NOT NULL,
  `desc` varchar(500) NOT NULL,
  `terms` varchar(500) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remove_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `shoes`
--

INSERT INTO `shoes` (`s_id`, `name`, `img_src_name_1`, `img_src_name_2`, `img_src_name_3`, `img_src_name_4`, `cr_id`, `size`, `sex`, `qty`, `b_id`, `price`, `category`, `p_details`, `highlights`, `desc`, `terms`, `create_date`, `remove_date`) VALUES
(1, 'testing', NULL, '', '', '', 10, '38', 'M', 20, 4, 120, 'Foot Ball', 'p_details', 'highlights', 'desc', 'terms', '2017-03-19 18:21:50', NULL),
(2, 'Air Force 1', NULL, '', '', '', 6, '12', 'M', 10, 4, 90, 'Basketball', 'Leather with supportive overlays for durability', 'The legend lives on in the Nike Air Force 1 Men\'s Shoe, a modern take on the icon that blends classic style and fresh, crisp details.', 'Nike, Inc. is an American multinational corporation that is engaged in the design, development, manufacturing and worldwide marketing and sales of footwear, apparel, equipment, accessories and services.', 'The images represent actual product though color of the image and product may slightly differ.', '2017-03-20 00:48:14', NULL),
(3, 'Stan Smith', NULL, '', '', '', 7, '7', 'F', 20, 5, 75, 'Tennis', 'Leather and synthetic upper', 'Originally launched in 1973, adidas Stan Smith shoes have achieved icon sneaker status with a sleek, clean look.', 'Adidas AG is a German multinational corporation, headquartered in Herzogenaurach, Germany, that designs and manufactures shoes, clothing and accessories.', 'The images represent actual product though color of the image and product may slightly differ.', '2017-03-20 00:48:14', NULL),
(4, 'Air Presto', NULL, '', '', '', 11, '8', 'F', 5, 4, 120, 'Casual', 'Stretch mesh upper for a flexible, lightweight feel', 'The Nike Air Presto Women\'s Shoe is inspired by the comfort and minimalism of a classic T-shirt for lightweight everyday comfort.', 'Nike, Inc. is an American multinational corporation that is engaged in the design, development, manufacturing and worldwide marketing and sales of footwear, apparel, equipment, accessories and services.', 'The images represent actual product though color of the image and product may slightly differ.', '2017-03-20 00:48:14', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shoes_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remove_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `user_account`
--

CREATE TABLE `user_account` (
  `user_id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `sex` varchar(2) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lock_date` date DEFAULT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `user_account`
--

INSERT INTO `user_account` (`user_id`, `acc_id`, `phone`, `email`, `sex`, `create_date`, `lock_date`, `f_name`, `l_name`) VALUES
(1, 6, '11111111', 'ingrid@3100.com', 'F', '2017-03-08 23:59:05', NULL, 'Ingrid', 'Chan');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- 資料表索引 `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`b_id`);

--
-- 資料表索引 `colour`
--
ALTER TABLE `colour`
  ADD PRIMARY KEY (`cr_id`);

--
-- 資料表索引 `driver_account`
--
ALTER TABLE `driver_account`
  ADD PRIMARY KEY (`driver_id`);

--
-- 資料表索引 `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`);

--
-- 資料表索引 `officer_account`
--
ALTER TABLE `officer_account`
  ADD PRIMARY KEY (`officer_id`);

--
-- 資料表索引 `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- 資料表索引 `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- 資料表索引 `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`rank_id`);

--
-- 資料表索引 `sex`
--
ALTER TABLE `sex`
  ADD PRIMARY KEY (`sex`);

--
-- 資料表索引 `shoes`
--
ALTER TABLE `shoes`
  ADD PRIMARY KEY (`s_id`);

--
-- 資料表索引 `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- 資料表索引 `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `account`
--
ALTER TABLE `account`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用資料表 AUTO_INCREMENT `brand`
--
ALTER TABLE `brand`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用資料表 AUTO_INCREMENT `colour`
--
ALTER TABLE `colour`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- 使用資料表 AUTO_INCREMENT `driver_account`
--
ALTER TABLE `driver_account`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `officer_account`
--
ALTER TABLE `officer_account`
  MODIFY `officer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用資料表 AUTO_INCREMENT `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `rank`
--
ALTER TABLE `rank`
  MODIFY `rank_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `shoes`
--
ALTER TABLE `shoes`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用資料表 AUTO_INCREMENT `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

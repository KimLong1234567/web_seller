-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2023 at 11:28 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seller_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_count` int(11) NOT NULL,
  `admin_name` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL,
  `admin_date_add` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_count`, `admin_name`, `admin_password`, `admin_date_add`) VALUES
(1, 'admin', 'admin', '2023-08-20 22:48:45');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_stt` int(11) NOT NULL,
  `contact_mess` varchar(255) DEFAULT NULL,
  `contact_name` varchar(50) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_date_add` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_stt`, `contact_mess`, `contact_name`, `contact_email`, `contact_date_add`) VALUES
(1, 'vcdbnkvsbkvsm,vs', 'Nao', 'test@gmail.com', '2023-08-27 00:08:34'),
(2, 'cac z.z.lzcllqla', 'Nao', 'test@gmail.com', '2023-08-27 00:09:13'),
(3, 'cac z.z.lzcllqla', 'Nao', 'test@gmail.com', '2023-08-27 00:09:16'),
(4, 'vcbnxkvbkwq', 'kanade', 'test@gmail.com', '2023-08-27 00:11:02');

-- --------------------------------------------------------

--
-- Table structure for table `feed_back`
--

CREATE TABLE `feed_back` (
  `feed_back_id` int(11) NOT NULL,
  `feed_back_name` varchar(50) DEFAULT NULL,
  `feed_back_phone` varchar(255) DEFAULT NULL,
  `feed_back_mess` varchar(255) DEFAULT NULL,
  `feed_back_date` datetime DEFAULT NULL,
  `feed_back_image` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `prod_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feed_back`
--

INSERT INTO `feed_back` (`feed_back_id`, `feed_back_name`, `feed_back_phone`, `feed_back_mess`, `feed_back_date`, `feed_back_image`, `user_id`, `prod_id`) VALUES
(1, 'Gia Huy', '0552544', 'scakcak', '2023-08-21 16:55:40', 'amazon-pet-products-today2-170828.jpg', 1, 'PPQCCA');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(10) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `order_total` double DEFAULT NULL,
  `order_numberOfItem` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `prod_id` varchar(255) DEFAULT NULL,
  `order_address` varchar(255) DEFAULT NULL,
  `order_city` varchar(255) DEFAULT NULL,
  `order_phone` varchar(255) DEFAULT NULL,
  `order_status` bit(1) DEFAULT b'0',
  `order_name_card_customer` varchar(255) DEFAULT NULL,
  `order_number_credit_card` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `order_total`, `order_numberOfItem`, `user_id`, `prod_id`, `order_address`, `order_city`, `order_phone`, `order_status`, `order_name_card_customer`, `order_number_credit_card`) VALUES
('0IqR5WmG36', '2023-08-26 11:35:33', 240000, 4, 1, 'QPCAK', 'czkll kacnlnqlk alcakl;mc', 'vklsnncakl', '0558866476', b'1', 'vskjbvckj', '0662-1451-1550'),
('RCp1ZkJdL9', '2023-09-11 09:08:57', 180000, 3, 1, 'CPVOA', NULL, NULL, NULL, b'0', NULL, NULL),
('u8SrE4DbB2', '2023-08-26 11:07:08', 2700000, 3, 1, 'DPCA', 'czkll kacnlnqlk alcakl;mc', 'vklsnncakl', '0558866476', b'1', 'vskjbvckj', '0662-1451-1550');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_count` int(11) NOT NULL,
  `prod_id` varchar(255) DEFAULT NULL,
  `prod_name` varchar(255) DEFAULT NULL,
  `prod_detail` varchar(255) DEFAULT NULL,
  `prod_price` double DEFAULT NULL,
  `prod_origin` varchar(255) DEFAULT NULL,
  `prod_image` varchar(255) DEFAULT NULL,
  `prod_cate_id` int(11) DEFAULT NULL,
  `prod_quantity` int(11) DEFAULT NULL,
  `prod_date_add` datetime DEFAULT NULL,
  `prod_date_chage` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_count`, `prod_id`, `prod_name`, `prod_detail`, `prod_price`, `prod_origin`, `prod_image`, `prod_cate_id`, `prod_quantity`, `prod_date_add`, `prod_date_chage`) VALUES
(2, 'CPA!', 'áo', 'cacqqcqcq', 50000, 'JP', 'men-01.jpg', 1, 1000, '2023-08-20 23:16:32', '2023-08-20 23:43:50'),
(3, 'CAPQ', 'dầu thơm nam', 'bchạkjckcnslqq', 500000, 'alocq', 'dior-sauvage-eau-de-parfum-100ml_e1c611f46daa451f8a159c1652c8d6c1_grande.webp', 2, 100, '2023-08-21 10:37:02', '2023-08-21 11:07:02'),
(4, 'PAOOC', 'LAOMC', 'ckáo;;oq', 800000, 'AP', 'trang-suc-cho-nam-gioi-1.png', 3, 250, '2023-08-21 10:43:33', '2023-08-21 13:01:27'),
(5, 'PAPQQ', 'Đồng hồ', 'vkavmqlaq', 8000000, 'TQ', 'dajd064_f1886a74dce946f3bddba29ec0a284f6_1024x1024.webp', 4, 500, '2023-08-21 11:11:47', '2023-08-21 11:57:17'),
(6, 'QPCAK', 'Áo Thun nam', 'Okcálvlaz', 60000, 'GR', '75036afeba72961b9dcd4fcf6d50fe56.jpg', 1, 496, '2023-08-21 11:44:05', NULL),
(7, 'PPQCCA', 'Áo thun trắng', 'nacíalcan', 80000, 'usa', 'ao-thun-nam-ca-tinh-thoi-trang-2.jpg', 1, 69, '2023-08-21 11:46:33', NULL),
(8, 'FQPC', 'đồ bộ nam ', 'svadvjak', 90000, 'india', 'a9207861806dbb35d9a8b73ec2dc4bb0.jpg', 1, 60, '2023-08-21 12:30:23', NULL),
(9, 'DQLCA', 'Dầu Thơm', 'cíackkva', 800000, 'Pháp', '265ad02c3e7afc43fc881477dbf08790.jpg', 2, 30, '2023-08-21 12:37:53', '2023-08-21 12:45:17'),
(10, 'DPCA', 'Dầu', 'vidkvnâ', 900000, 'Anh', 'nuoc-hoa-nam-versace-pour-homme-eau-de-toilette-100ml-1-1654918585_img_380x380_64adc6_fit_center.jpg', 2, 44, '2023-08-21 12:40:12', NULL),
(11, 'DLZMC', 'Dau THom', 'ácnạka', 900000, 'England', 'sg-11134201-22110-cbcdjucvjikv87.jpg', 2, 60, '2023-08-21 12:50:01', NULL),
(12, 'DPACCA', 'Dây chuyền', 'vnsjkvsdbsk', 60000, 'TQ', 'Day-Chuyen-Nam-Soi-Lon.jpg', 3, 500, '2023-08-21 12:59:25', '2023-08-21 12:59:56'),
(13, 'PAOCA', 'Bóp tiền', 'dbáâccsa', 600000, 'KR', 'bop-nam-dep_0ee315f630244b3fa25c5355c53ce290.jpg', 4, 60, '2023-08-21 13:00:42', NULL),
(14, 'CPVOA', 'Cà vạt', 'dnakaka', 60000, 'KR', 'CA-VAT-2.jpg', 4, 497, '2023-08-21 13:02:33', '2023-08-21 13:04:17'),
(15, 'DLCA', 'Dây nịt', 'vnadjka', 300000, 'Fr', '721be0be33452ecc7514b87792a7e73b.png', 4, 60, '2023-08-21 13:06:09', NULL),
(16, 'NLAC', 'Bộ nhẫn ', 'vdạkakq', 900000, 'KR', 'download (4).jpg', 3, 55, '2023-08-21 13:11:33', NULL),
(17, 'NXOZ', 'Bộ trang sức', 'vdankakk', 10000000, 'ACL', 'thuong-hieu-trang-suc-nam-75_473.jpg', 3, 80, '2023-08-21 13:12:40', '2023-08-21 13:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `prod_cate_id` int(11) NOT NULL,
  `prod_cate_name` varchar(255) DEFAULT NULL,
  `prod_cate_date_add` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`prod_cate_id`, `prod_cate_name`, `prod_cate_date_add`) VALUES
(1, 'Thời trang', '2023-08-20 22:48:45'),
(2, 'dầu thơm', '2023-08-20 22:48:45'),
(3, 'trang sức', '2023-08-20 22:48:45'),
(4, 'Phụ kiện', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_date_add` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_email`, `user_date_add`) VALUES
(1, 'Gia Huy', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'test@gmail.com', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_count`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_stt`);

--
-- Indexes for table `feed_back`
--
ALTER TABLE `feed_back`
  ADD PRIMARY KEY (`feed_back_id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_count`),
  ADD UNIQUE KEY `prod_id` (`prod_id`),
  ADD KEY `prod_cate_id` (`prod_cate_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`prod_cate_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_count` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feed_back`
--
ALTER TABLE `feed_back`
  MODIFY `feed_back_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_count` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `prod_cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feed_back`
--
ALTER TABLE `feed_back`
  ADD CONSTRAINT `feed_back_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`),
  ADD CONSTRAINT `feed_back_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`prod_cate_id`) REFERENCES `product_category` (`prod_cate_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

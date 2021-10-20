-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql103.byetcluster.com
-- Generation Time: Oct 20, 2021 at 07:07 AM
-- Server version: 5.7.35-38
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_30107281_emart`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `order_number` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `image`, `heading`, `message`, `order_number`, `added_on`, `status`) VALUES
(5, '871369014_about_d1.jpg', 'Our Mission', 'To Desing the E-Marketplace Farmer and Tribal sell their product online and they give better prices for their products and also our team aim to develop digital farm.', 1, '2021-07-08 07:13:00', 1),
(6, '226519017_about_vission.png', 'Our Visson', ' Our vision is to achieve sustainable growth within India’s agricultural industry by simplifying the everyday lives of farmers throughout the country. We aim to improve the quality of life for farmers throughout India by providing the technological infrastructure necessary to create the smarter future of farming.', 2, '2021-07-08 07:15:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(10) NOT NULL,
  `roll` tinyint(4) NOT NULL,
  `register_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL,
  `email_verification` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `username`, `password`, `roll`, `register_on`, `status`, `email_verification`) VALUES
(1, 'Pruthviraj Rajput', 'pruthvirajrajput305@gmail.com', ' admin', '7384', 1, '2021-07-12 12:50:14', 1, 1),
(2, 'John Dev', 'prithvirajrajput575@gmail.com', ' vendor', '123', 0, '2021-07-12 08:50:09', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `order_number` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `image`, `heading`, `order_number`, `status`, `added_on`) VALUES
(5, '390622529_img1.jpg', 'banner1', 1, 1, '2021-10-20 10:02:15'),
(6, '276716646_img2.jpg', 'banner2', 2, 1, '2021-10-20 10:02:27'),
(7, '675558984_img3.jpg', 'banner3', 3, 1, '2021-10-20 10:02:36'),
(8, '899752015_img4.jpg', 'banner4', 4, 1, '2021-10-20 10:02:46'),
(9, '203073880_img5.jpg', 'banner5', 5, 1, '2021-10-20 10:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `order_no` int(11) NOT NULL,
  `status` tinyint(11) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `order_no`, `status`, `added_by`, `added_on`) VALUES
(7, 'paintings ', 3, 1, ' Pruthviraj Dineshsing Rajput', '2021-07-06 00:27:55'),
(8, 'Home & Living ', 4, 1, ' Pruthviraj Dineshsing Rajput', '2021-07-07 04:25:49'),
(10, 'craft', 6, 1, ' Pruthviraj Dineshsing Rajput', '2021-07-07 00:29:54'),
(11, 'Forest Products ', 1, 1, ' Pruthviraj Dineshsing Rajput', '2021-07-07 09:39:15');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `user_id`, `message`, `added_on`) VALUES
(1, 1, 'Hi Everyone !', '2021-07-13 03:42:57'),
(2, 2, 'hi', '2021-07-13 03:49:14'),
(3, 2, 'Hi How Are You ?', '2021-07-13 03:50:50'),
(4, 1, 'hi', '2021-07-13 03:51:43'),
(5, 2, 'Hello', '2021-07-13 03:52:34');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `meassage` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_code`
--

CREATE TABLE `coupon_code` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(20) NOT NULL,
  `coupon_type` enum('P','F') NOT NULL,
  `coupon_value` int(11) NOT NULL,
  `cart_min_value` int(11) NOT NULL,
  `expired_on` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy`
--

CREATE TABLE `delivery_boy` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery_boy`
--

INSERT INTO `delivery_boy` (`id`, `name`, `mobile`, `password`, `status`, `added_on`) VALUES
(1, 'Pruthviraj Rajput', '7720993937', '123', 1, '2021-07-10 18:19:54');

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE `order_master` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `payment_status` tinyint(4) NOT NULL,
  `delivery_boy_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `product` varchar(200) NOT NULL,
  `product_detail` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` enum('tribal','forest') NOT NULL,
  `added_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `sub_category_id`, `product`, `product_detail`, `image`, `type`, `added_by`, `status`, `added_on`) VALUES
(1, 11, 23, 'tomato', 'Tomato Is Best Product', '937347129_v3.jpg', 'tribal', 1, 1, '2021-10-20 09:55:00'),
(2, 11, 21, 'DRY FRUIT BOX', 'Nicely Crafted Work To Keep Dry Fruits With Good Quality Wood.', '541004910_w1.jpg', 'tribal', 1, 1, '2021-10-20 10:00:40'),
(3, 8, 19, 'HAND CRAFTED FAN', 'The folk and tribal arts of India are very ethnic and simple, and yet colorful and vibrant enough to speak volumes about the countries rich heritage.', '233380271_d1.jpg', 'tribal', 1, 1, '2021-10-20 10:05:39'),
(5, 11, 23, 'FRESHO MOSAMBI', 'Fresh Mosambis are of the best quality, handpicked and sourced directly from the farmers of Anantapur. Sweet lime or mosambi is lime-like, large-sized with an underlying yellow base. The intense, refreshing aroma is due to the essential oils present in its skin. It generally tastes sweet, occasionally tart to sweet. Enriched with Vitamin C, protein and fiber, it provides a range of health benefits. You can even make Juice from this fruit.', '525683987_f5.jpg', 'forest', 1, 1, '2021-10-20 10:08:04'),
(6, 11, 23, 'FRESHO MALLIKA MANGO', 'Being a hybrid of Neelum and Dasher, Mallika has a perfect blend of sweetness and tartness.', '236044887_f3.jpg', 'forest', 1, 1, '2021-10-20 10:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `product_detailes`
--

CREATE TABLE `product_detailes` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `attribute` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_detailes`
--

INSERT INTO `product_detailes` (`id`, `product_id`, `attribute`, `price`, `status`, `added_on`) VALUES
(1, 1, '1 kg', 30, 1, '2021-07-09 22:02:21'),
(2, 2, '1 kg', 20, 1, '2021-07-09 22:03:16'),
(3, 3, '1 kg', 50, 1, '2021-07-09 22:05:47'),
(5, 5, '1 kg', 20, 1, '2021-07-09 22:07:35'),
(7, 7, 'Per Item ', 250, 1, '2021-07-09 22:09:45'),
(8, 8, 'Per Item ', 400, 1, '2021-07-09 22:10:38'),
(11, 1, '1kg', 20, 1, '2021-10-20 09:55:00'),
(12, 2, 'Per Item', 500, 1, '2021-10-20 10:00:40'),
(13, 3, 'Per Item', 410, 1, '2021-10-20 10:05:39'),
(15, 5, '1kg', 20, 1, '2021-10-20 10:08:04'),
(16, 6, '1kg', 80, 1, '2021-10-20 10:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `sub_category` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `category`, `sub_category`, `added_by`, `added_on`, `status`) VALUES
(15, 'paintings ', 'Bhil', ' Pruthviraj Dineshsing Rajput', '2021-07-07 00:53:36', 1),
(16, 'paintings ', 'Gond', ' Pruthviraj Dineshsing Rajput', '2021-07-07 00:53:55', 1),
(17, 'paintings ', 'Warli', ' Pruthviraj Dineshsing Rajput', '2021-07-07 00:54:49', 1),
(18, 'Home & Living ', 'Home Linen', ' Pruthviraj Dineshsing Rajput', '2021-07-07 04:27:22', 1),
(19, 'Home & Living ', 'Decoratives', ' Pruthviraj Dineshsing Rajput', '2021-07-07 00:57:49', 1),
(20, 'craft', 'Metal Craft', ' Pruthviraj Dineshsing Rajput', '2021-07-07 00:59:08', 1),
(21, 'craft', 'Wood Crafts ', ' Pruthviraj Dineshsing Rajput', '2021-07-07 00:59:30', 1),
(22, 'Forest Products ', 'Vegetables ', ' Pruthviraj Dineshsing Rajput', '2021-07-07 05:15:45', 1),
(23, 'Forest Products ', 'Fruits ', ' Pruthviraj Dineshsing Rajput', '2021-07-07 09:39:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `resister_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL,
  `email_verification` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `resister_on`, `status`, `email_verification`) VALUES
(1, ' Pruthviraj Rajput', 'prithvirajrajput575@gmail.com', ' user', '202cb962ac59075b964b07152d234b70', '2021-07-13 03:42:03', 1, 1),
(2, ' Gaurav  Pawar', 'pruthviraj.rajput011@gmail.com', ' pruthvi', '202cb962ac59075b964b07152d234b70', '2021-07-13 03:48:36', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pin_code` int(11) NOT NULL,
  `address_type` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `mobile_no`, `house_no`, `city`, `pin_code`, `address_type`, `added_on`) VALUES
(1, 1, '', '', '', 0, '', '2021-07-13 03:41:17'),
(2, 2, '', '', '', 0, '', '2021-07-13 03:48:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_code`
--
ALTER TABLE `coupon_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_detailes`
--
ALTER TABLE `product_detailes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon_code`
--
ALTER TABLE `coupon_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_detailes`
--
ALTER TABLE `product_detailes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_cart`
--
ALTER TABLE `user_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

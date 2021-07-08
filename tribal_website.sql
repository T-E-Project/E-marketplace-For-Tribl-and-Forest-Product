-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 08:00 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tribal_website`
--

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
  `register_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `username`, `password`, `roll`, `register_on`, `status`) VALUES
(1, ' Pruthviraj Dineshsing Rajput', 'pruthvirajrajput305@gmail.com', ' admin', 'admin', 1, '2021-07-06 05:18:32', 1);

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
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `image`, `heading`, `order_number`, `status`, `added_on`) VALUES
(5, '403972810_img1.jpg', 'banner1', 1, 1, '2021-07-07 08:19:44'),
(6, '120431227_img2.jpg', 'banner2', 2, 1, '2021-07-07 08:19:54'),
(7, '716562554_img3.jpg', 'banner3', 3, 1, '2021-07-07 08:19:55'),
(8, '709907756_img4.jpg', 'banner4', 4, 1, '2021-07-07 08:19:57'),
(9, '617816256_img5.jpg', 'banner5', 5, 1, '2021-07-07 03:15:34');

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
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `meassage` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon_code`
--

INSERT INTO `coupon_code` (`id`, `coupon_code`, `coupon_type`, `coupon_value`, `cart_min_value`, `expired_on`, `status`, `added_on`) VALUES
(2, 'FIRST_50', 'P', 100, 200, '2021-07-09', 1, '2021-07-06 01:30:21');

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
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery_boy`
--

INSERT INTO `delivery_boy` (`id`, `name`, `mobile`, `password`, `status`, `added_on`) VALUES
(1, 'Pruthviraj Dineshsing ', '7720993937', '123', 1, '2021-07-06 16:52:44');

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
  `added_by` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `sub_category_id`, `product`, `product_detail`, `image`, `type`, `added_by`, `status`, `added_on`) VALUES
(3, 11, 22, 'Onion', 'Onion is a vegetable which is almost like a staple in Indian food. This is also known to be one of the essential ingredients of raw salads. They come in different colours like white, red or yellow and are quite in demand in cold salads and hot soups.\r\nYou can dice, slice or cut it in rings and put it in burgers and sandwiches. Onions emit a sharp flavour and fragrance once they are fried; it is due to the sulphur compound in the vegetable.Onions are known to be rich in biotin.\r\nMost of the flavonoids which are known as anti-oxidants are concentrated more in the outer layers, so when you peel off the layers, you should remove as little as possible.', '172748382_v1.jpg', 'forest', ' Pruthviraj Dineshsing Rajput', 1, '2021-07-07 11:17:15'),
(4, 11, 22, 'Potato', 'Fresho Potatoes are nutrient-dense, non-fattening and have reasonable amount of calories. Include them in your regular meals so that the body receives a good supply of carbohydrates, dietary fibers and essential minerals such as copper, magnesium, and iron. In India, potatoes are probably the second-most consumed vegetables after onions.', '443902981_v2.jpg', 'forest', ' Pruthviraj Dineshsing Rajput', 1, '2021-07-06 19:49:49'),
(5, 11, 22, 'Tomato', 'Tomato Hybrids are high-quality fruits compared to desi, local tomatoes. They contain numerous edible seeds and are red in colour due to lycopene, an anti-oxidant.', '553503941_v3.jpg', 'forest', ' Pruthviraj Dineshsing Rajput', 1, '2021-07-06 19:52:53'),
(6, 11, 22, 'Fresho Capsicum', 'Leaving a moderately pungent taste on the tongue, Green capsicums, also known as green peppers are bell shaped, medium-sized fruit pods.\r\nThey have thick and shiny skin with a fleshy texture inside.\r\n', '529522360_v4.jpg', 'forest', ' Pruthviraj Dineshsing Rajput', 1, '2021-07-06 19:58:15'),
(7, 11, 23, 'Fresho Banana', 'Tiny and small sized, this variety is called Yelakki in Bangalore and Elaichi in Mumbai. Despite its small size, they are naturally flavoured, aromatic and sweeter compared to regular bananas.', '860151324_f1.jpg', 'forest', ' Pruthviraj Dineshsing Rajput', 1, '2021-07-06 20:01:39'),
(8, 11, 23, 'Fresho Orange', 'Navel oranges are very sugary and juicy and considered to be the world\'s finest orange for fresh consumption because they are very sweet, naturally juice, seedless and peels and segments very easily. It has a variety of phytochemicals containing flavanoids hesperetin, beta-carotene and carotenoids alpha etc.', '696957634_f2.jpg', 'forest', ' Pruthviraj Dineshsing Rajput', 1, '2021-07-06 20:05:48'),
(9, 11, 23, 'Fresho Mallika Mango', 'Being a hybrid of Neelum and Dasheri, Mallika has a perfect blend of sweetness and tartness.\r\nIt is a mid season variety.\r\nWe have handpicked the best quality mangoes just for you.', '959371458_f3.jpg', 'forest', ' Pruthviraj Dineshsing Rajput', 1, '2021-07-06 20:08:22'),
(10, 11, 23, 'Fresho Muskmelon', 'Fresho Organic products are organically grown and handpicked by expert.\r\nProduct image shown is for representation purpose only, the actually product may vary based on season, produce & availability.', '923074327_f4.jpg', 'forest', ' Pruthviraj Dineshsing Rajput', 1, '2021-07-06 20:13:00'),
(11, 11, 23, 'Fresho Mosambi ', 'Fresho Mosambis are of the best quality, handpicked and sourced directly from the farmers of Anantapur. Sweet lime or mosambi is lime-like, large-sized with an underlying yellow base. The intense, refreshing aroma is due to the essential oils present in its skin. It generally tastes sweet, occasionally tart to sweet. Enriched with Vitamin C, protein and fiber, it provides a range of health benefits. You can even make Juice from this fruit.', '197802950_f5.jpg', 'forest', ' Pruthviraj Dineshsing Rajput', 1, '2021-07-06 20:15:44'),
(12, 11, 23, 'Fresho Papaya ', 'Semi ripe papayas have blend of sweet buttery consistency and sour taste. They are half green and half yellow.\r\nRipe papaya have orange flesh and black coloured seeds at the centre.\r\nDo not forget to check our delicious fruit recipe - https://www.bigbasket.com/cookbook/recipes/557/raw-papaya-and-coconut-curry/', '286427720_f6.jpg', 'forest', ' Pruthviraj Dineshsing Rajput', 1, '2021-07-06 20:17:36'),
(13, 7, 15, 'Bhil Black & White Paper Painting', 'Each Tribes India Bhil painting is appealing to the visual senses. The bhil paintings intelligently use natural materials like neem twigs, turmeric and leaves.', '745057715_pb1.jpg', 'tribal', ' Pruthviraj Dineshsing Rajput', 1, '2021-07-06 20:20:50'),
(14, 7, 15, 'Bhil Blue, Green', 'The Bhil Paintings make intelligent use of natural materials such as neem twigs, turmeric, leaves, vegetables, flour and oil to intorduce attractive colours to their traditional painting form. Each Bhil Painting offered by Tribes India is appealing to the visual senses.', '977778452_pb2.jpg', 'tribal', ' Pruthviraj Dineshsing Rajput', 1, '2021-07-06 20:22:36'),
(15, 8, 18, 'Handwoven Single Runnner Mat', 'Now, beautify your home with Tribes India’s this table runner.It will look good on your bed room, dinning room, guest room.', '764836391_l1.jpg', 'tribal', ' Pruthviraj Dineshsing Rajput', 1, '2021-07-06 20:24:36'),
(16, 8, 19, 'Hand Crafted FAN', 'The folk and tribal arts of India are very ethnic and simple, and yet colorful and vibrant enough to speak volumes about the countries rich heritage', '914098383_d1.jpg', 'tribal', ' Pruthviraj Dineshsing Rajput', 1, '2021-07-06 20:26:14'),
(17, 10, 21, 'Dry Fruit Box', 'Nicely Crafted Work To Keep Dry Fruits With Good Quality Wood.', '292571522_w1.jpg', 'tribal', ' Pruthviraj Dineshsing Rajput', 1, '2021-07-07 17:58:40');

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
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_detailes`
--

INSERT INTO `product_detailes` (`id`, `product_id`, `attribute`, `price`, `status`, `added_on`) VALUES
(1, 15, 'one item ', 50, 1, '2021-07-07 18:05:38'),
(7, 14, 'Per Item ', 200, 1, '2021-07-07 18:06:26'),
(8, 13, 'Per Item ', 250, 1, '2021-07-07 18:07:05'),
(9, 12, '1 kg', 50, 1, '2021-07-07 18:07:38'),
(10, 11, '1 kg', 50, 1, '2021-07-07 02:34:31'),
(11, 10, '1 kg', 60, 1, '2021-07-07 18:08:27'),
(12, 9, '1 kg', 60, 1, '2021-07-07 18:08:57'),
(13, 8, '1 kg', 40, 1, '2021-07-07 18:09:27'),
(14, 7, '1 kg', 50, 1, '2021-07-07 18:09:54'),
(19, 1, '1 kg', 250, 1, '2021-07-07 07:08:26'),
(21, 3, '1 kg', 25, 1, '2021-07-07 11:14:08'),
(22, 3, '500Gm', 18, 1, '2021-07-06 19:44:08'),
(23, 4, '1 kg', 30, 1, '2021-07-07 18:10:39'),
(24, 4, '500 Gm', 20, 1, '2021-07-07 18:10:39'),
(25, 5, '1 kg', 20, 1, '2021-07-06 19:52:53'),
(26, 5, '500Gm', 10, 1, '2021-07-06 19:52:53'),
(27, 6, '1 kg', 50, 1, '2021-07-06 19:58:15'),
(28, 7, '500 Gm', 30, 1, '2021-07-07 18:09:54'),
(29, 8, '500 Gm', 20, 1, '2021-07-07 18:09:27'),
(30, 9, '500 Gm', 30, 1, '2021-07-07 18:08:57'),
(31, 10, '500 Gm', 30, 1, '2021-07-07 18:08:27'),
(32, 11, '500 Gm', 25, 1, '2021-07-07 18:07:58'),
(33, 12, '500 Gm', 25, 1, '2021-07-07 18:07:38'),
(34, 13, 'Per two  Item ', 365, 1, '2021-07-07 18:07:05'),
(35, 14, 'Per two items ', 350, 1, '2021-07-07 18:06:26'),
(36, 15, 'two Item ', 300, 1, '2021-07-07 18:05:38'),
(37, 16, 'Per Item ', 200, 1, '2021-07-06 20:26:14'),
(38, 17, 'Per Item ', 200, 1, '2021-07-06 20:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `sub_category` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `resister_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `resister_on`, `status`) VALUES
(1, ' Pruthviraj Rajput', 'prithvirajrajput575@gmail.com', ' user', '123', '2021-07-07 17:57:05', 1);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

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
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon_code`
--
ALTER TABLE `coupon_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_detailes`
--
ALTER TABLE `product_detailes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

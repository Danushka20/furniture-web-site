-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 12:06 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`) VALUES
(39, '::1', 2),
(40, '::1', 3),
(47, '::1', 1),
(51, '::1', 3),
(53, '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(8) NOT NULL,
  `p_category_id` int(10) NOT NULL,
  `p_material_id` int(10) NOT NULL,
  `product_title` varchar(50) NOT NULL,
  `product_description` varchar(120) NOT NULL,
  `product_price` decimal(7,2) NOT NULL,
  `product_discount` int(4) NOT NULL,
  `product_image1` text NOT NULL,
  `product_image2` text NOT NULL,
  `product_image3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_category_id`, `p_material_id`, `product_title`, `product_description`, `product_price`, `product_discount`, `product_image1`, `product_image2`, `product_image3`) VALUES
(12, 4, 1, 'Wooded Bed', 'Experience unparalleled comfort and restful nights with our exceptional bed collection. ', '650.00', 0, 'bed1a-wood.PNG', 'bed1b-wood.PNG', 'bed1c-wood.PNG'),
(13, 4, 1, 'Wooded Bed', 'Experience unparalleled comfort and restful nights with our exceptional bed collection. ', '700.00', 0, 'bed2b-wood.PNG', 'bed2a-wood.PNG', 'bed2c-wood.PNG'),
(14, 4, 1, 'Wooded Bed', 'Experience unparalleled comfort and restful nights with our exceptional bed collection. ', '600.00', 0, 'bed3a-wood.PNG', 'bed3b-wood.PNG', 'bed3c-wood.PNG'),
(15, 4, 1, 'Wooded Bed', 'Experience unparalleled comfort and restful nights with our exceptional bed collection. ', '780.00', 0, 'bed4a-wood.PNG', 'bed4c-wood.PNG', 'bed4b-wood.PNG'),
(16, 2, 1, 'Wooded Chair', 'Meticulously crafted with attention to detail, our chairs offer a seamless blend of functionality and elegance.', '120.00', 0, 'chair1b-wood.PNG', 'chair1a-wood.PNG', 'chair1c-wood.PNG'),
(17, 2, 1, 'Wooded Chair', 'Meticulously crafted with attention to detail, our chairs offer a seamless blend of functionality and elegance.', '95.00', 0, 'chair2a-wood.PNG', 'chair2b-wood.PNG', 'chair2c-wood.PNG'),
(18, 2, 1, 'Wooded Chair', 'Meticulously crafted with attention to detail, our chairs offer a seamless blend of functionality and elegance.', '100.00', 0, 'chair3a-wood.PNG', 'chair3b-wood.PNG', 'chair3c-wood.PNG'),
(19, 3, 1, 'Wooded Sofa', 'Elevate your home with a centerpiece that embodies both sophistication and coziness', '100.00', 0, 'sofa1a-wood.PNG', 'sofa1b-wood.PNG', 'sofa1c-wood.PNG'),
(20, 3, 1, 'Wooded Sofa', 'Elevate your home with a centerpiece that embodies both sophistication and coziness', '300.00', 0, 'sofa3a-wood.PNG', 'sofa3b-wood.PNG', 'sofa3c-wood.PNG'),
(21, 1, 1, 'Wooded Table', 'Elevate your home with a statement piece that combines functionality and aesthetic appeal.', '95.00', 0, 'table1c-wood.PNG', 'table1b-wood.PNG', 'table1a-wood.PNG'),
(22, 1, 1, 'Wooded Table', '. Elevate your home with a statement piece that combines functionality and aesthetic appeal.', '180.00', 0, 'table2c-wood.PNG', 'table2a-wood.PNG', 'table2b-wood.PNG'),
(23, 1, 1, 'Wooded Table', '. Elevate your home with a statement piece that combines functionality and aesthetic appeal.', '155.00', 0, 'table4c-wood.PNG', 'table4b-wood.PNG', 'table4a-wood.PNG'),
(24, 4, 3, 'Metallic Sleigh Bed', 'Experience unparalleled comfort and restful nights with our exceptional bed collection. ', '450.00', 0, 'bed1b-metal.PNG', 'bed1c-metal.PNG', 'bed1a-metal.PNG'),
(25, 2, 3, 'Metal Frame Dining Chair', 'Meticulously crafted with attention to detail, our chairs offer a seamless blend of functionality and elegance.', '65.00', 0, 'chair1b-metal.PNG', 'chair1a-metal.PNG', 'chair1c-metal.PNG'),
(26, 2, 3, 'Bar & Counter Stools', 'Meticulously crafted with attention to detail, our chairs offer a seamless blend of functionality and elegance.', '70.00', 0, 'chair2c-metal.PNG', 'chair2b-metal.PNG', 'chair2a-metal.PNG'),
(27, 2, 3, 'Slope Play Chair', 'Meticulously crafted with attention to detail, our chairs offer a seamless blend of functionality and elegance.', '80.00', 0, 'chair4b-metal.PNG', 'chair4c-metal.PNG', 'chair4a-metal.PNG'),
(28, 1, 3, 'Round Dinning Table', 'Elevate your home with a statement piece that combines functionality and aesthetic appeal.', '145.00', 0, 'table1c-metal.PNG', 'table1b-metal.PNG', 'table1a-metal.PNG'),
(29, 1, 3, 'Living Room Table', 'Elevate your home with a statement piece that combines functionality and aesthetic appeal.', '120.00', 0, 'table3c-metal.PNG', 'table3b-metal.PNG', 'table3a-metal.PNG'),
(30, 4, 5, 'Leather Bed', 'Experience unparalleled comfort and restful nights with our exceptional bed collection. ', '200.00', 0, 'bed3a-leather.PNG', 'bed3b-leather.PNG', 'bed3c-leather.PNG'),
(31, 1, 5, 'Leather Coffee Table', 'Elevate your home with a statement piece that combines functionality and aesthetic appeal.', '130.00', 0, 'table2a-leather.PNG', 'table2b-leather.PNG', 'table2c-leather.PNG'),
(32, 3, 5, 'Leather Sofa - Wood Legs', 'Elevate your home with a centerpiece that embodies both sophistication and coziness', '200.00', 0, 'sofa2a-leather.PNG', 'sofa2b-leather.PNG', 'sofa2c-leather.PNG'),
(33, 3, 5, 'Leather Sofa', 'Elevate your home with a centerpiece that embodies both sophistication and coziness', '180.00', 0, 'sofa1a-leather.PNG', 'sofa1b-leather.PNG', 'sofa1c-leather.PNG'),
(34, 3, 5, 'Leather Sofa', 'Elevate your home with a statement piece that combines functionality and aesthetic appeal.', '260.00', 0, 'sofa4b-leather.PNG', 'sofa4a-leather.PNG', 'sofa4c-leather.PNG'),
(35, 1, 3, 'Metallic Coffee Table', 'Elevate your home with a statement piece that combines functionality and aesthetic appeal.', '95.00', 0, 'table4a-metal.PNG', 'table4b-metal.PNG', 'table4c-metal.PNG'),
(39, 4, 5, 'Leather Details Bed', 'Experience unparalleled comfort and restful nights with our exceptional bed collection. ', '300.00', 0, 'bed4a-leather.PNG', 'bed4b-leather.PNG', 'bed4c-leather.PNG'),
(40, 1, 3, 'Metal Legs Table', 'Elevate your home with a statement piece that combines functionality and aesthetic appeal.', '130.00', 0, 'table2a-metal.PNG', 'table2b-metal.PNG', 'table2c-metal.PNG'),
(53, 7, 3, 'Metal Leg Chair', 'Meticulously crafted with attention to detail, our chairs offer a seamless blend of functionality and elegance.', '65.00', 25, 'chair5a-metal.jpg', 'chair5b-metal.jpg', 'chair5c-metal.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_category_id` int(10) NOT NULL,
  `p_category_title` varchar(50) NOT NULL,
  `p_category_desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_category_id`, `p_category_title`, `p_category_desc`) VALUES
(1, 'Table', 'Whether you\'re looking for a dining table to gather your loved ones or a versatile coffee table for your living room, our collection offers a wide range of options to suit your taste and lifestyle.'),
(2, 'Chairs', 'Explore our range and discover the perfect chair that elevates your home decor and provides unparalleled comfort for years to come.'),
(3, 'Sofas', 'Whether you\'re entertaining guests or enjoying a quiet evening, our sofas offer the perfect retreat for ultimate comfort and relaxation. '),
(4, 'Beds', 'Sink into the plush comfort of our high-quality mattresses and indulge in a peaceful sleep, while the elegant bed frames add a touch of sophistication to your bedroom decor. '),
(7, 'SALE', 'Don\'t miss out on this limited-time opportunity. Shop our sale products and bring style, comfort, and affordability into your home.');

-- --------------------------------------------------------

--
-- Table structure for table `product_material`
--

CREATE TABLE `product_material` (
  `p_material_id` int(10) NOT NULL,
  `p_material_title` varchar(50) NOT NULL,
  `p_material_desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_material`
--

INSERT INTO `product_material` (`p_material_id`, `p_material_title`, `p_material_desc`) VALUES
(1, 'Wood', 'Transform your living spaces with the organic charm and sophistication of our wood furniture collection.'),
(3, 'Metal', 'Crafted with precision and durability in mind, our metal furniture pieces effortlessly blend style and functionality.'),
(5, 'Leather', 'Elevate your home with the luxurious charm of our leather furniture and embrace a level of comfort and elegance that is truly unmatched.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `surname`, `address`, `phone_number`) VALUES
(1, 'erezaaa', 'erezaasllani2@gmail.com', '$2y$10$uEQTiIyxBbsqhoeFwyUiEuypC7FK8iNVghL5Q/q076zQUxUl6l9fa', 'asllani', 'Vushtrri', '046156254'),
(2, 'Erëza', 'erzaas14@gmail.com', '$2y$10$VcBYCUjdp8imQRSJlfSwbOosJjE./rB6oJ/ZsQPMMW9QBB4yibUJe', 'Asllani', 'Kosovo', '0215668');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_category_id`);

--
-- Indexes for table `product_material`
--
ALTER TABLE `product_material`
  ADD PRIMARY KEY (`p_material_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_material`
--
ALTER TABLE `product_material`
  MODIFY `p_material_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

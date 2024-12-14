-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2024 at 01:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db3`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_category`
--

CREATE TABLE `food_category` (
  `foodCate_id` int(11) NOT NULL,
  `foodCate_resID` int(11) NOT NULL,
  `foodCate_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_category`
--

INSERT INTO `food_category` (`foodCate_id`, `foodCate_resID`, `foodCate_name`) VALUES
(3, 1, 'ต้ม'),
(4, 1, 'ราดข้าว'),
(5, 1, 'ราดหน้า'),
(6, 1, 'เมนูเส้น');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_cateID` int(11) NOT NULL,
  `menu_name` varchar(20) NOT NULL,
  `menu_price` int(11) NOT NULL,
  `menu_discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_cateID`, `menu_name`, `menu_price`, `menu_discount`) VALUES
(2, 4, 'กะเพราหมูสับ', 40, 5),
(3, 4, 'กะเพราไก่+ไข่ดาว', 45, 10),
(5, 4, 'กะเพรากุ้ง', 45, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `orders_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `orders_resID` int(11) NOT NULL,
  `orders_cusID` int(11) NOT NULL,
  `orders_riderID` int(11) NOT NULL,
  `orders_qty` int(11) NOT NULL,
  `orders_totalPrice` int(11) NOT NULL,
  `orders_discount` int(11) NOT NULL,
  `orders_totalAmount` int(11) NOT NULL,
  `orders_review` varchar(255) NOT NULL,
  `orders_status` varchar(50) NOT NULL DEFAULT 'waiting for rider...'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `orDetail_id` int(11) NOT NULL,
  `orDetail_OrderID` int(11) NOT NULL,
  `orDetail_menuID` int(11) NOT NULL,
  `orDetail_QTY` int(11) NOT NULL,
  `orDetail_discount` int(11) NOT NULL,
  `orDetail_totalAmount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `res_type` int(11) NOT NULL,
  `res_name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `res_type`, `res_name`, `username`, `email`, `address`, `tel`, `password`, `status`) VALUES
(1, 1, 'อาหารตามสั่ง01', 'tamsang01', 'tamsang01@res.tvcman', '1234', '1234567890', '1234', 0);

-- --------------------------------------------------------

--
-- Table structure for table `res_type`
--

CREATE TABLE `res_type` (
  `resType_id` int(11) NOT NULL,
  `resType_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `res_type`
--

INSERT INTO `res_type` (`resType_id`, `resType_name`) VALUES
(1, 'อาหารตามสั่ง'),
(2, 'เครื่องดื่ม/คาเฟ่');

-- --------------------------------------------------------

--
-- Table structure for table `rider`
--

CREATE TABLE `rider` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `role` varchar(20) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_category`
--
ALTER TABLE `food_category`
  ADD PRIMARY KEY (`foodCate_id`),
  ADD KEY `foodCate_resID` (`foodCate_resID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `menu_cateID` (`menu_cateID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `orders_cusID` (`orders_cusID`),
  ADD KEY `orders_resID` (`orders_resID`),
  ADD KEY `orders_riderID` (`orders_riderID`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`orDetail_id`),
  ADD KEY `orDe_menu` (`orDetail_menuID`),
  ADD KEY `orDe_OrderID` (`orDetail_OrderID`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `res_type` (`res_type`);

--
-- Indexes for table `res_type`
--
ALTER TABLE `res_type`
  ADD PRIMARY KEY (`resType_id`);

--
-- Indexes for table `rider`
--
ALTER TABLE `rider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_category`
--
ALTER TABLE `food_category`
  MODIFY `foodCate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `orDetail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `res_type`
--
ALTER TABLE `res_type`
  MODIFY `resType_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rider`
--
ALTER TABLE `rider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food_category`
--
ALTER TABLE `food_category`
  ADD CONSTRAINT `food_category_ibfk_1` FOREIGN KEY (`foodCate_resID`) REFERENCES `restaurant` (`id`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`menu_cateID`) REFERENCES `food_category` (`foodCate_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`orders_cusID`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`orders_resID`) REFERENCES `restaurant` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`orders_riderID`) REFERENCES `rider` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`orDetail_menuID`) REFERENCES `menu` (`menu_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`orDetail_OrderID`) REFERENCES `orders` (`orders_id`);

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`res_type`) REFERENCES `res_type` (`resType_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2022 at 01:54 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rms`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_tb`
--

CREATE TABLE `category_tb` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `type` enum('product','service') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_tb`
--

INSERT INTO `category_tb` (`category_id`, `category_name`, `type`) VALUES
(1, 'shampoo', 'product'),
(2, 'Hair oil', 'product'),
(3, 'conditioners', 'product'),
(4, 'service1', 'service'),
(5, 'category 1', 'product'),
(6, 'category 2', 'product'),
(7, 'category 3', 'product'),
(8, 'category 4', 'product'),
(9, 'service2', 'service'),
(10, 'service3', 'service'),
(11, 'service4', 'service');

-- --------------------------------------------------------

--
-- Table structure for table `products_tb`
--

CREATE TABLE `products_tb` (
  `sub_category_id` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `subcategory_name` varchar(20) NOT NULL,
  `GST` int(3) NOT NULL,
  `price` int(5) NOT NULL,
  `commission_per` int(5) NOT NULL,
  `commission` int(5) NOT NULL,
  `discount_per` int(5) NOT NULL,
  `discount` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_tb`
--

INSERT INTO `products_tb` (`sub_category_id`, `category_name`, `subcategory_name`, `GST`, `price`, `commission_per`, `commission`, `discount_per`, `discount`) VALUES
(1, 'shampoo', 'Loreal', 3, 350, 0, 50, 10, 0),
(2, 'Hair oil', 'Bajaj Almond', 4, 450, 5, 2, 2, 50),
(5, 'category 3', 'sc3', 3, 500, 10, 0, 0, 0),
(7, 'service2', 'sc5', 2, 370, 5, 0, 0, 0),
(8, 'service3', 'sc6', 2, 300, 4, 0, 5, 0),
(10, 'category 1', 'sc1', 2, 350, 0, 25, 0, 0),
(11, 'service4', 'sc2', 3, 450, 0, 25, 0, 0),
(12, 'service4', 'sc7', 2, 370, 5, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_tb`
--
ALTER TABLE `category_tb`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products_tb`
--
ALTER TABLE `products_tb`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_tb`
--
ALTER TABLE `category_tb`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products_tb`
--
ALTER TABLE `products_tb`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

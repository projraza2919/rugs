-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2021 at 07:12 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webmuza_ahl`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(99) NOT NULL,
  `username` varchar(249) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(50) NOT NULL DEFAULT 'inserted',
  `del` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `email`, `updated_on`, `status`, `del`) VALUES
(1, 'ahl_admin', '$2y$10$vr/VowDiRkydXwniycKgte5MZbzKioj0rKnwcYpkxlec9K/RZhSGK', 'test@test.com', '2021-10-04 18:21:00', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(99) NOT NULL,
  `file` text NOT NULL,
  `about` text NOT NULL,
  `del` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `file`, `about`, `del`) VALUES
(1, 'http://localhost/ahl/banner/1633546926.png', 'just a test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(99) NOT NULL,
  `name` varchar(249) NOT NULL,
  `keywords` text NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL DEFAULT 'inserted',
  `del` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `keywords`, `added_on`, `status`, `del`) VALUES
(1, 'Cloth', 'red', '2021-10-05 19:07:50', 'active', 0),
(2, 'thick', 'thick,warm,good quality', '2021-10-06 19:16:48', 'active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(99) NOT NULL,
  `name` varchar(249) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` int(15) NOT NULL,
  `message` text NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `del` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(99) NOT NULL,
  `name` varchar(200) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(200) NOT NULL,
  `product` text NOT NULL,
  `address` text NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL DEFAULT 'inserted',
  `del` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(99) NOT NULL,
  `name` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `files` text NOT NULL,
  `original_price` int(50) NOT NULL DEFAULT 0,
  `selling_price` int(50) NOT NULL DEFAULT 0,
  `currency` varchar(100) NOT NULL DEFAULT '₹',
  `about` text NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'inserted',
  `del` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `files`, `original_price`, `selling_price`, `currency`, `about`, `status`, `del`) VALUES
(1, '', 'Cloth', 'http://localhost/ahl/image/1633461272.png', 0, 0, '₹', '', 'status', 1),
(2, 'test', 'Cloth', 'http://localhost/ahl/image/1633461412.png', 56, 50, '₹', 'testning', 'status', 0),
(3, 'ras', 'Cloth', 'http://localhost/ahl/image/big_file- upload_failed', 236, 200, '₹', 'lorem ipsomlorem ipsomlorem ipsomvlorem ipsomlorem ipsomlorem ipsomlorem ipsomlorem ipsomlorem ipsomlorem ipsomv', 'active', 0),
(4, 'admin', 'Cloth', 'http://localhost/ahl/image/1633461677.png', 69, 85, '₹', 'kjkjk jkjkjk jkjkjkjkjkjkj kjkjkj kjkjk  ', 'inactive', 0),
(5, 'yoyo', 'Cloth', 'http://localhost/ahl/image/1633535514.png', 34, 34, '₹', 'just a test', 'active', 1),
(6, 'main product', 'Cloth', 'http://localhost/ahl/image/1633542378.png', 5698, 65665, '₹', 'sdsds', 'active', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
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
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

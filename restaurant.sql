-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2017 at 08:38 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `foto`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin X', '4441.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `category_code` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `id_publish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_code`, `category_name`, `id_publish`) VALUES
(14, 'C002', 'Drink', 1),
(17, 'C001', 'Food', 1),
(18, 'C003', 'Coffee', 1),
(19, 'C004', 'Cake', 1),
(20, 'C005', 'Dessert', 1);

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE `credit` (
  `id` int(11) NOT NULL,
  `bank_code` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credit`
--

INSERT INTO `credit` (`id`, `bank_code`, `bank_name`) VALUES
(1, 'CC001', 'BCA'),
(3, 'CC002', 'Mandiri'),
(4, 'CC003', 'BRI'),
(5, 'CC004', 'BNI'),
(6, 'CC005', 'Permata');

-- --------------------------------------------------------

--
-- Table structure for table `debit`
--

CREATE TABLE `debit` (
  `id` int(11) NOT NULL,
  `bank_code` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `debit`
--

INSERT INTO `debit` (`id`, `bank_code`, `bank_name`) VALUES
(1, 'DC001', 'Mandiri'),
(2, 'DC002', 'BCA'),
(3, 'DC003', 'BNI'),
(4, 'DC004', 'Permata'),
(5, 'DC005', 'BRI');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `id_category` int(11) NOT NULL,
  `price` double NOT NULL,
  `description` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `id_publish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_code`, `product_name`, `id_category`, `price`, `description`, `picture`, `id_publish`) VALUES
(19, 'P002', 'Steak', 17, 100000, 'qwerty', '', 1),
(21, 'P003', 'Coffee Moccachino', 18, 50000, 'qwerty', '', 1),
(22, 'P004', 'Cheese Cake', 19, 25000, 'qwerty', '', 1),
(24, 'P005', 'Salad Slice', 20, 100000, 'qwerty', '', 1),
(25, 'P001', 'Wine Classic', 14, 250000, 'qwerty', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `publish`
--

CREATE TABLE `publish` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publish`
--

INSERT INTO `publish` (`id`, `status`) VALUES
(1, 'On'),
(2, 'Off');

-- --------------------------------------------------------

--
-- Table structure for table `vip`
--

CREATE TABLE `vip` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `expired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vip`
--

INSERT INTO `vip` (`id`, `code`, `name`, `phone_number`, `email`, `expired`) VALUES
(2, 'U001', 'Mr. X', '0987654321', 'mrx@vip.com', '2017-08-15'),
(6, 'U002', 'Mr. Y', '1234567890', 'mry@vip.com', '2017-08-16'),
(7, 'U003', 'Mr. Z', '6789012345', 'mrz@vip.com', '2017-08-17'),
(8, 'U004', 'Mr. A', '1234567890', 'mra@vip.com', '2017-08-18'),
(9, 'U005', 'Mr. B', '0987654321', 'mrb@vip.com', '2017-08-19'),
(10, 'U006', 'Mr. C', '6789012345', 'mrc@vip.com', '2017-08-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit`
--
ALTER TABLE `credit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debit`
--
ALTER TABLE `debit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publish`
--
ALTER TABLE `publish`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vip`
--
ALTER TABLE `vip`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `credit`
--
ALTER TABLE `credit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `debit`
--
ALTER TABLE `debit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `publish`
--
ALTER TABLE `publish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vip`
--
ALTER TABLE `vip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

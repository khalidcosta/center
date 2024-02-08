-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2022 at 11:15 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sala`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `hag`
--

CREATE TABLE `hag` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sala` int(11) NOT NULL,
  `dat` date NOT NULL,
  `test` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hag`
--

INSERT INTO `hag` (`id`, `name`, `phone`, `address`, `sala`, `dat`, `test`) VALUES
(1, 'khaled', 0, '0', 200000, '0000-00-00', 1),
(2, 'admin', 66, '0', 200000, '2022-09-06', 1),
(3, 'kh@123.com', 66, '0', 200000, '2022-08-30', 1),
(4, 'الماسية', 55, '0', 200000, '2022-08-29', 1),
(7, 'hh', 777, 'hh', 200000, '2022-09-05', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `des` text NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `iamg` varchar(255) NOT NULL,
  `dat` date NOT NULL,
  `ty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `des`, `phone`, `password`, `email`, `iamg`, `dat`, `ty`) VALUES
(1, 'الماسية', 'الخرطوم', 'توجد هذه الصالة في شارع المطار بالقرب من عفرا جوار فندق السلام روتانا\r\nتتميز هذه الصالة ب اتساعها ل استقبال الف زائر\r\n', 99999999, '123', 'kh@123.com', 'sa.jpg', '0000-00-00', ''),
(2, 'درة بحري', 'ام درمان', 'تقع بالقرب من شارع النيلين وتتميز ب اتساعها لي 2000 زائر و تمتلك كراسي فاخرة و ادوات تصوير عالي الجودة و اصطاف عمل ممتاز', 8888888, '123', 'kh1@12.com', 'sa.jpg', '0000-00-00', ''),
(3, 'hh', 'الخرطوم', 't', 0, '123', 'kf@43.c', 'sa.jpg', '2022-09-28', ''),
(4, 'hh', 'الخرطوم', 't', 0, '123', 'kf@43.c', 'sa.jpg', '2022-09-28', ''),
(6, 'hi', 'الخرطوم', 'kh', 776, '123', 'kk@k.com', 'sa.jpg', '2022-09-14', ''),
(7, 'hi', 'الخرطوم', 'kh', 776, '123', 'kk@k.com', 'sa.jpg', '2022-09-14', ''),
(8, 'hi', 'الخرطوم', 'kh', 776, '123', 'kk@k.com', 'sa.jpg', '2022-09-14', ''),
(9, 'hi', 'الخرطوم', 'kh', 776, '123', 'kk@k.com', 'sa.jpg', '2022-09-14', ''),
(10, 'kh@123.com', 'الخرطوم', 'h', 55, '66', 'kk@k.com', 'a.jpg', '2022-09-21', 'image/jpeg'),
(11, 'اات', 'الخرطوم', 'تت', 66, '123', 'kh@9.co', 'sa.jpg', '2022-09-27', 'image/jpeg'),
(12, 'اات', 'الخرطوم', 'تت', 66, '123', 'kh@9.co', 'sa.jpg', '2022-09-27', 'image/jpeg'),
(13, 'اات', 'الخرطوم', 'تت', 66, '123', 'kh@9.co', 'sa.jpg', '2022-09-27', 'image/jpeg'),
(14, 'اات', 'الخرطوم', 'تت', 66, '123', 'kh@9.co', 'sa.jpg', '2022-09-27', 'image/jpeg'),
(15, 'اات', 'الخرطوم', 'تت', 66, '123', 'kh@9.co', 'sa.jpg', '2022-09-27', 'image/jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hag`
--
ALTER TABLE `hag`
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
-- AUTO_INCREMENT for table `hag`
--
ALTER TABLE `hag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

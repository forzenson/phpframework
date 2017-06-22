-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~trusty.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 20, 2017 at 05:56 PM
-- Server version: 5.5.55-0ubuntu0.14.04.1
-- PHP Version: 7.1.5-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopaholic`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_comment` text,
  `user_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `products` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_name`, `user_phone`, `user_comment`, `user_id`, `date`, `products`, `status`) VALUES
(3, 'userName', 'userPhone', 'userText', 1, '2017-03-12 18:21:11', '\"[{\\\"id\\\":\\\"109\\\",\\\"quantity\\\":\\\"3\\\"}]\"', 1),
(11, 'jan', 'userPhone', 'userText', 1, '2017-03-12 23:50:33', '\"[{\\\"id\\\":\\\"109\\\",\\\"quantity\\\":\\\"1\\\"}]\"', 1),
(12, 'jan', 'userPhone', 'userText', 1, '2017-03-13 09:01:23', '\"[{\\\"id\\\":\\\"110\\\",\\\"quantity\\\":\\\"1\\\"},{\\\"id\\\":\\\"110\\\",\\\"quantity\\\":\\\"1\\\"}]\"', 1),
(13, 'root', 'userPhone', 'userText', 2, '2017-03-13 09:04:21', '\"[{\\\"id\\\":\\\"110\\\",\\\"quantity\\\":\\\"3\\\"}]\"', 1),
(14, 'root', 'userPhone', 'userText', 2, '2017-03-13 09:27:23', '\"[{\\\"id\\\":\\\"107\\\",\\\"quantity\\\":\\\"1\\\"}]\"', 1),
(15, 'root', 'userPhone', 'userText', 2, '2017-03-13 09:28:37', '\"[{\\\"id\\\":\\\"110\\\",\\\"quantity\\\":\\\"2\\\"}]\"', 1),
(16, 'root', 'userPhone', 'userText', 2, '2017-03-13 09:45:04', '\"[{\\\"id\\\":\\\"110\\\",\\\"quantity\\\":\\\"1\\\"},{\\\"id\\\":\\\"111\\\",\\\"quantity\\\":\\\"1\\\"}]\"', 1),
(17, 'root', 'userPhone', 'userText', 2, '2017-03-13 10:29:21', '\"[{\\\"id\\\":\\\"109\\\",\\\"quantity\\\":\\\"2\\\"},{\\\"id\\\":\\\"110\\\",\\\"quantity\\\":\\\"1\\\"}]\"', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

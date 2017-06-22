-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~trusty.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 20, 2017 at 10:34 PM
-- Server version: 5.5.55-0ubuntu0.14.04.1
-- PHP Version: 7.1.5-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopaholics`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`) VALUES
(1, 'Планшеты', 1),
(2, 'Ноутбуки', 1),
(3, 'Телефоны', 1),
(4, 'Наушники', 1),
(5, 'Чехлы', 1);

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
(3, 'userName', 'userPhone', 'userText', 2, '2017-05-20 15:21:11', '\"[{\\\"id\\\":\\\"3\\\",\\\"quantity\\\":\\\"3\\\"}]\"', 1),
(11, 'jan', 'userPhone', 'userText', 1, '2017-05-20 20:50:33', '\"[{\\\"id\\\":\\\"4\\\",\\\"quantity\\\":\\\"1\\\"}]\"', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `create_at`, `status`) VALUES
(1, 'Объекты PHP', '<p>При создании программы, рассчитанной на использование объектов, нужно сконструировать некую совокупность данных и кода, называемую классом.</p>\r\n<p>Каждый новый объект, осн<img style=\"margin: 3px;\" src=\"../../../source/3.jpg\" />ованный на этом классе, называется экземпляром этого класса. Данные, связанные с объектом, называются его свойствами, а используемые им функции &mdash; методами. При определении класса задаются имена его свойств и код для его методов.</p>', '2017-05-04 12:33:47', 1),
(2, 'Класс', '<p>Каждое определение класса начинается с ключевого слова class, затем следует имя класса, и далее пара фигурных скобок, которые заключают в себе определение свойств и методов этого класса. Именем класса может быть любое слово, при условии, что оно не входит в список зарезервированных слов PHP, начинается с буквы или символа подчеркивания и за которым следует любое количество букв, цифр или символов подчеркивания. Класс может содержать собственные константы, переменные (называемые свойствами) и функции (называемые методами).</p>\r\n<p><img src=\"../../../source/B_0GfRUVEAAieHL.jpg\" /></p>', '2017-05-04 12:34:22', 1),
(4, 'Шаблоны', '<p><img src=\"../../../source/B5vHlmtCIAAIcOw.jpg\" /></p>\r\n<p>Отделение логики получения данных от логики их отображения - очень важная составляющая веб-девелопмента. Любой программист, который поднялся чуть выше уровня \"Hello world\", начинает ощущать потребность в таком разделении. Но далеко не все приходят к правильным выводам и решениям. Поэтому я приведу здесь самые важные правила: 1. Код получения и код отображения данных надо разделять. 2. Любой вывод должен начинаться только после того, как для него готовы все данные. 3. Как следствие, любой скрипт должен заниматься только обработкой данных. После этого он может либо отправить какой-то НТТР заголовок, или вызвать шаблон, передав ему подготовленные данные, или и то и другое вместе. 4. Каким именно шаблонизатором пользоваться - дело десятое. Самый простой и доступный - сам РНР, поэтому примеры будет приводиться на нём.</p>', '2017-05-12 14:13:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `price` float NOT NULL,
  `availability` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_new` int(11) NOT NULL DEFAULT '0',
  `is_recommended` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `code`, `price`, `availability`, `brand`, `description`, `is_new`, `is_recommended`, `status`) VALUES
(3, 'product', 1, 1234567, 1111, 1, 'Test', 'product 1', 1, 0, 1),
(4, 'Product2', 2, 2345678, 234, 1, 'test', 'Test product2', 1, 0, 1),
(5, 'Product22', 1, 1234456, 444, 1, 'test', 'test product22', 1, 0, 1),
(6, 'Product4', 1, 2345, 555, 1, 'test', 'Product 4', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `status`) VALUES
(1, 'janus', 'janus@uk.ua', '$2y$10$zSAevU2SHCvCSjCTG6tOw.7v8Qua40f48gWU1jhAssM8WNfkMdok6', 1, 1),
(2, 'Jan', 'jan@my.com', '$2y$10$b.MlgdIuBxYKFdVbzRVVsOkSghpWahZ5g5.MmzMXK3F19A9EtXLBm', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

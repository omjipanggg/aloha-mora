-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2022 at 05:06 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esteh`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(4) NOT NULL,
  `name` varchar(25) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Tea', '20% authentic tea, 8% other ingredients, 3% ice cubes, 69% love of Nusantara.'),
(2, 'Macchiato', 'It is either tea or no tea, foamed with a few bits of milk, and of course, the love of Nusantara.'),
(3, 'Milk Tea', 'Tea and milk, and other optional ingredients. Could be served with several toppings. Who does not love milk tea these days?');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(15) NOT NULL,
  `id_user` int(4) NOT NULL,
  `count_sales` int(11) NOT NULL,
  `total_sales` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `count_sales`, `total_sales`, `created_at`) VALUES
(1662570000000, 1, 5, 45000, '2022-10-08 19:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `id_order` bigint(15) NOT NULL,
  `id_product` int(4) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `id_order`, `id_product`, `quantity`) VALUES
(38, 1662570000000, 8, 1),
(39, 1662570000000, 2, 1),
(40, 1662570000000, 15, 2),
(41, 1662570000000, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(25) NOT NULL,
  `price` int(6) NOT NULL,
  `description` text DEFAULT NULL,
  `id_category` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `description`, `id_category`) VALUES
(1, 'Original Tea', 'OTOG.webp', 4000, 'Authentic flavour of Nusantara.', 1),
(2, 'Taro', 'MTTA.webp', 8000, 'Taro.', 3),
(3, 'Caffe Latte', 'MTCL.webp', 8000, 'Caffe, latte.', 3),
(4, 'Lemon Tea', 'OTLE.webp', 7000, 'When life gives you a lemon, make it a Lemon Tea with Nusantara.', 1),
(5, 'Chocolate Macchiato', 'MCCH.webp', 10000, 'Chocolate, macchiato.', 2),
(6, 'Yakult Tea', 'OTYA.webp', 7000, 'Tea with a combination of Yakult.', 1),
(7, 'Strawberry', 'MTST.webp', 8000, 'Tea with milky and strawberry flavoury.', 3),
(8, 'Taro Macchiato', 'MCTA.webp', 10000, 'Taro, macchiato.', 2),
(9, 'Green Tea', 'MTGT.webp', 8000, 'Green tea, matcha, you name it.', 3),
(10, 'Mango', 'MTMA.webp', 8000, 'Mango, punten.', 3),
(11, 'Lychee Tea', 'OTLY.webp', 7000, 'Lychee, more like sweet apple thingy.', 1),
(12, 'Peach Tea', 'OTPE.webp', 7000, 'Peach, more like sweet melon thingy.', 1),
(13, 'Cookies', 'MTCO.webp', 10000, 'The most favorite variant based on purchases, the fortune cookies. ', 3),
(14, 'Milk Tea', 'MTOG.webp', 8000, 'The OG of milk tea, my personal favorite!', 3),
(15, 'Red Velvet Macchiato', 'MCRV.webp', 10000, 'Red Velvet, cute color.', 2),
(16, 'Chocolate', 'MTCH.webp', 8000, 'It is basically a chocolate.', 3),
(17, 'Green Tea Macchiato', 'MTGT.webp', 10000, 'Macchiato, but it is green tea.', 2),
(18, 'Strawberry Macchiato', 'MTST.webp', 10000, 'Strawberry with macchiato flavor, or otherwise.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(96) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(72) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `phone`, `email`) VALUES
(1, 'admin', 'cEJCZlhhNlRZTytHM1UyN2N6MXBwQT09', '081806060979', 'admin@000webhost.com'),
(2, 'maula', 'VjVEamhSYjFtcDdKN0VoN1ErRGxwdz09', '081806060979', 'omjipanggg@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

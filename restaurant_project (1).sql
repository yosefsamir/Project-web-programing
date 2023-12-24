-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2023 at 08:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_client`
--

CREATE TABLE `cart_client` (
  `id` bigint(20) NOT NULL,
  `id_client` bigint(20) NOT NULL,
  `id_product` bigint(20) NOT NULL,
  `quantity` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_client`
--

INSERT INTO `cart_client` (`id`, `id_client`, `id_product`, `quantity`) VALUES
(59, 22, 35, 2),
(61, 22, 38, 1);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id_client` bigint(20) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id_client`, `first_name`, `last_name`, `phone`, `password`) VALUES
(18, 'hossam', 'khalid', '0572215137', '$2y$10$uNZqg4vsODdFyT/HDVU0l.V1aFUhZ.INd5hnM5x.qJk'),
(21, 'ahmed', 'mohamed', '123456789', '$2y$10$sdaXBVssofi33QV3FmG1FOEB95rd2pC4h3hveNCA1nz'),
(22, 'yousef', 'samir', '01030748297', '$2y$10$WXzciIs8422YNP2mNY5yZ.Cap/knVSg.irZt8aeJF6xXPuuBrSNFy'),
(23, 'yousef', 'samir', '1234', '$2y$10$XAuwB6qlD2WhzF4aBNxY/O9Nz7otZGJlEVZPPl6r54L3QloLjZD2K'),
(24, 'mohamed', 'shata', '01020304050', '$2y$10$3ltfhtNxnZtY4lKC1RMSNuKZInNlyqvmAalQJIEP7Xz4MqpWcv8XO'),
(25, 'yousef', 'samir', '01020304040', '$2y$10$cDfotpyVgnb77Z9aU7qArOaqcNv2by4fruXWimOVuC7iSVbdfcEta'),
(26, 'tarek', 'ahmed', '0572215139', '$2y$10$6q0zW271U35ZHdrs2Cx1xe8pQl3ScOoQj96TKs4SZT73Kd9RZjNTO'),
(27, 'ayman', 'hassan', '01004002364', '$2y$10$KAgCUjEi4lBvbBZk4Waq2O.274gDjdADaae7DJ8P8zBJmP1R64XEy'),
(28, 'admin', 'samir', '12345', '$2y$10$2sbE1752/xGycEy.3drm1OPmLvX.6cScmLwVDZoVUJE5N5r004N8a'),
(29, 's1', 's2', '1478520', '$2y$10$EY.YhbWObieUYMjRh3if..eEidWPTPS.D97jk8TiEaqoXr9CXpMSm'),
(30, 'يوسف', 'سمير', '01222577696', '$2y$10$W1l1tQd8rH4.cUaf/czVwuw6NzFJniuO03I96yAkceFFEGtUy4WJC');

-- --------------------------------------------------------

--
-- Table structure for table `details_order`
--

CREATE TABLE `details_order` (
  `id_order` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(20,0) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `details_order`
--

INSERT INTO `details_order` (`id_order`, `quantity`, `name`, `description`, `price`, `category`) VALUES
(1, 1, 'pasta espaniol', 'pasta , tomato and oil', 210, 'Meal'),
(1, 1, 'mix checken', 'checken , rice  and cola', 230, 'Meal'),
(1, 1, 'Arabic shawarma chicken', 'bread surian , chicken , thomia', 120, 'Meal'),
(1, 1, 'chicken breast', 'chicken breast and rice', 160, 'Meal'),
(2, 1, 'beef gril', 'meet and rice and spiro spatis', 180, 'Meal'),
(3, 2, 'Arabic shawarma chicken', 'bread surian , chicken , thomia', 120, 'Meal'),
(18, 2, 'Arabic shawarma chicken', 'bread surian , chicken , thomia', 120, 'Meal'),
(18, 1, 'beef gril', 'meet and rice and spiro spatis', 180, 'Meal'),
(18, 1, 'فراخ كرسبي', '5 قطع كرسبي ', 120, 'Meal'),
(19, 2, 'pasta espaniol', 'pasta , tomato and oil', 210, 'Meal'),
(20, 3, 'pizaa italian', 'pizaa cheese and tomato', 190, 'Pizza'),
(20, 2, 'pizaa ranch', 'ranch sose and chicken', 160, 'Pizza'),
(20, 2, 'burger', 'beef , onion and tomato', 160, 'Burger'),
(20, 1, 'egyptian burgar', 'beef , onion', 120, 'Burger'),
(21, 1, 'beef gril', 'meet and rice and spiro spatis', 180, 'Meal'),
(22, 1, 'pasta espaniol', 'pasta , tomato and oil', 210, 'Meal'),
(22, 1, 'beef gril', 'meet and rice and spiro spatis', 180, 'Meal'),
(22, 1, 'mix checken', 'checken , rice  and cola', 230, 'Meal'),
(23, 1, 'pizaa italian', 'pizaa cheese and tomato', 190, 'Pizza'),
(23, 1, 'Arabic pizza', 'chees and meet', 210, 'Pizza'),
(24, 1, 'فراخ كرسبي', '5 قطع كرسبي ', 120, 'Meal'),
(24, 1, 'Arabic shawarma chicken', 'bread surian , chicken , thomia', 120, 'Meal'),
(25, 2, 'pizaa ranch', 'ranch sose and chicken', 160, 'Pizza'),
(25, 2, 'فراخ كرسبي', '5 قطع كرسبي ', 120, 'Meal'),
(26, 2, 'chicken breast', 'chicken breast and rice', 160, 'Meal');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` bigint(20) NOT NULL,
  `id_client` bigint(20) NOT NULL,
  `total_price` decimal(30,2) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `time_order` time NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `id_client`, `total_price`, `phone_number`, `time_order`, `address`) VALUES
(1, 26, 720.00, '01030748297', '01:49:44', 'دمياط باب الحرس '),
(2, 26, 180.00, '01030748297', '01:52:34', 'دمياط باب الحرس '),
(3, 26, 240.00, '01030748297', '01:56:41', 'دمياط الجديدة المركزية امام عالفحم'),
(16, 30, 540.00, '01222577696', '07:26:41', 'دمياط'),
(17, 30, 540.00, '', '07:27:56', ''),
(18, 30, 540.00, '01030748297', '07:31:45', 'دمياط'),
(19, 30, 420.00, '01030748297', '07:32:41', 'دمياط'),
(20, 30, 1330.00, '01222577696', '07:33:41', 'دمياط الجديدة المركزية امام عالفحم'),
(21, 30, 180.00, '', '07:36:21', ''),
(22, 30, 620.00, '01030748297', '07:36:48', 'دمياط'),
(23, 30, 400.00, '01222577696', '07:38:21', 'دمياط الجديدة المركزية امام عالفحم'),
(24, 30, 240.00, '01222577696', '07:39:12', 'دمياط الجديدة المركزية امام عالفحم'),
(25, 30, 560.00, '010307482977', '07:40:00', 'دمياط الجديدة المركزية امام عالفحم'),
(26, 26, 320.00, '01030748297', '08:07:51', 'دمياط');

-- --------------------------------------------------------

--
-- Table structure for table `prouducts`
--

CREATE TABLE `prouducts` (
  `id_product` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prouducts`
--

INSERT INTO `prouducts` (`id_product`, `name`, `category`, `description`, `price`, `img`) VALUES
(35, 'mix checken', 'Meal', 'checken , rice  and cola', 230.00, '6577432243821.jpg'),
(36, 'Arabic shawarma chicken', 'Meal', 'bread surian , chicken , thomia', 120.00, '65774410c8a53.jpg'),
(37, 'chicken breast', 'Meal', 'chicken breast and rice', 160.00, '65774612cd21d.jpg'),
(38, 'chicken ', 'Meal', 'checken , rice  and cola', 170.00, '657746d7d64ab.jpg'),
(39, 'pizaa italian', 'Pizza', 'pizaa cheese and tomato', 190.00, '65774f88758d2.jpg'),
(40, 'Arabic pizza', 'Pizza', 'chees and meet', 210.00, '65774fda095b9.jpg'),
(41, 'pizaa ranch', 'Pizza', 'ranch sose and chicken', 160.00, '6577501e5d53e.jpg'),
(47, 'فراخ كرسبي', 'Meal', '5 قطع كرسبي ', 120.00, '6586ebdb23576.jpg'),
(48, 'mix beef', 'Meal', 'meet and rice and spiro spatis', 250.00, '65888069100cd.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_client`
--
ALTER TABLE `cart_client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`),
  ADD UNIQUE KEY `phone_2` (`phone`),
  ADD KEY `phone` (`phone`);

--
-- Indexes for table `details_order`
--
ALTER TABLE `details_order`
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `prouducts`
--
ALTER TABLE `prouducts`
  ADD PRIMARY KEY (`id_product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_client`
--
ALTER TABLE `cart_client`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `prouducts`
--
ALTER TABLE `prouducts`
  MODIFY `id_product` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_client`
--
ALTER TABLE `cart_client`
  ADD CONSTRAINT `cart_client_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`),
  ADD CONSTRAINT `cart_client_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `prouducts` (`id_product`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

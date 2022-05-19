-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 19, 2022 at 02:08 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_email`, `admin_password`) VALUES
(1, 'admin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Samsung'),
(2, 'Ramtons'),
(3, 'LG'),
(4, 'Sony'),
(5, 'Hisense'),
(6, 'VON'),
(7, 'Armco');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) UNSIGNED NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Refrigerators'),
(2, 'Washing Machines'),
(3, 'Microwaves'),
(4, 'Water Dispensers'),
(5, 'Electric  & Gas Cookers'),
(6, 'Air Conditioners'),
(7, 'Dish Washers');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_fname` text NOT NULL,
  `customer_lname` text NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_county` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_ip`, `customer_fname`, `customer_lname`, `customer_email`, `customer_pass`, `customer_county`, `customer_city`, `customer_contact`, `customer_address`) VALUES
(1, '127.0.0.1', 'test', 'test', 'test@gmail.com', '123456', 'Kiambu', 'Ruiru', '0725501586', 'Moi Drive,Umoja'),
(4, '127.0.0.1', 'trevor', 'toni', 'toni@gmail.com', 'toni123', 'Kiambu', 'Ruiru', '0734214563', 'Moi Drive');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `order_amount` int(11) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(3) NOT NULL,
  `order_date` datetime NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `order_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `order_amount`, `invoice_no`, `product_id`, `product_name`, `quantity`, `order_date`, `payment_status`, `order_status`) VALUES
(1, 1, 320000, 208621764, 9, 'LG Ceramic Free standing Electric Oven, Big Capacity -Bake Heater ', 4, '2022-05-19 00:16:40', 'paid', 'on transit'),
(2, 1, 5000, 1493162328, 6, 'Armco Electric Tabletop Double Hotplate Coil Cooker ', 1, '2022-05-19 02:01:16', 'paid', 'on transit'),
(3, 1, 30000, 1493162328, 8, 'Armco AM-MS2023-Manual Microwave Oven, 700W, Black. ', 3, '2022-05-19 02:01:16', 'paid', 'on transit'),
(4, 1, 15000, 1110182182, 6, 'Armco Electric Tabletop Double Hotplate Coil Cooker ', 3, '2022-05-19 02:39:51', 'paid', 'on transit');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(1) NOT NULL,
  `card_no` varchar(16) NOT NULL,
  `card_type` text NOT NULL,
  `payment_amount` int(100) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `card_no`, `card_type`, `payment_amount`, `customer_email`, `customer_id`, `payment_time`) VALUES
(1, '4242424242424242', 'Visa', 39550, 'test@gmail.com', 1, '2022-05-19 02:01:16'),
(2, '5526454657665777', 'Visa', 16950, 'test@gmail.com', 1, '2022-05-19 02:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` longtext NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(2, 1, 5, 'Hisense REF092DR - 92L Single Door Fridge', 21500, '-Capacity (Litre): 92L.\r\n-Single Door.\r\n-Color: SILVER.\r\n-Water Dispenser: No.\r\n-Low Noise: Yes.\r\n-Frost: Yes.', 'hisensefridge1.jpg', 'hisense ,fridge,single,door,silver,frost,'),
(3, 2, 6, 'VON HWF-708S/VALW-07FXS Front Load Washing Machine Silver 7KG', 55000, '1200 Rpm\r\n-LED display\r\n-Detergent dispenser\r\n-Adjustable ‘feet’\r\n-Electronic jog dial\r\n-8L water consumption/per cycle/per KG\r\n-8 Wash programs \r\n-Quick wash program\r\n-4 Temp settings\r\n-Time Delay function\r\n-Child lock function\r\n-High temp self-cleaning program\r\n-Clothing balance testing\r\n-Breakdown self-diagnostics\r\n-Automatic restart function\r\n-Improved drum durability', 'washing_machine1.jpg', 'washing ,machine, von '),
(4, 3, 1, 'Samsung MG23K3515AK - 23L Digital Microwave Oven Grill - Black', 16500, '23L Grill Microwave\r\n5 Key Programs:\r\nAuto Cook (20 Default Programs)\r\nKeep Warm\r\nDeodorisation\r\nCombination Cooking\r\nGrill + 30 Seconds\r\n6 Power Levels\r\nJog Dial Control\r\nChild Lock Function\r\nEco Energy Saving Mode\r\nBlack Finish', 'samsung_microwave.jpg', 'samsung ,microwave,black,grill'),
(5, 6, 3, 'LG Air-conditioner Dual Cool Inverter AC Energy Saving', 75000, 'DUAL Inverter Compressor™ With 10 Year Warranty\r\nFast Cooling & Energy Saving\r\nDUAL Inverter Compressor™\r\nGEN Mode\r\nLow Noise\r\nSimple and Slim Design with Hidden Display', 'ramtons_airconditioner1.jpg', 'lg,air,conditioner,cool,ac,saving'),
(6, 5, 7, 'Armco Electric Tabletop Double Hotplate Coil Cooker', 5000, 'Tabletop\r\nPortable single spiral hot plate\r\nPowerful for faster heating\r\nSpiral burner spreads heat\r\nChrome drip pans\r\nAdjustable temperature control\r\nPower ready on light\r\nEasy to clean ', 'electric_cooker1.jpg', 'electric,cooker,double,coil'),
(7, 4, 2, 'Ramtons RM/429 - Hot & Normal Water Dispenser + Stand - White', 9000, 'Stainless steel hot water inner tank \r\nSaves on energy costs\r\nAutomatic temperature control\r\nDurable push taps\r\nDry burning prevention for safety\r\nEasy to use', 'ramtoms_waterdispenser1.jpg', 'ramtons,water,dispenser'),
(8, 3, 7, 'Armco AM-MS2023-Manual Microwave Oven, 700W, Black.', 10000, '20L Microwave Oven\r\nManual Control\r\n700W\r\n5 Power levels\r\nSpeedy Defrost\r\nExpress cooking\r\nCooking End Signal', 'armco_microwave1.jpg', 'armco,microwave,manual'),
(9, 5, 3, 'LG Ceramic Free standing Electric Oven, Big Capacity -Bake Heater', 80000, 'True Convection\r\nPowerful Burner\r\nEasyClean™\r\nLarge Capacity\r\nAuto Dual Hz', 'electric_cooker2.jpg', 'lg,electric,cooker');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`) USING BTREE,
  ADD KEY `product_cat` (`product_cat`),
  ADD KEY `product_brand` (`product_brand`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_cat`) REFERENCES `categories` (`cat_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`product_brand`) REFERENCES `brands` (`brand_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

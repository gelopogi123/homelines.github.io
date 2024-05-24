-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2019 at 10:34 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homelines`
--

-- --------------------------------------------------------

--
-- Table structure for table `activitylog`
--

CREATE TABLE `activitylog` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(20) NOT NULL,
  `activity_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `admin_name`, `address`, `contact`) VALUES
(16, 'Roderick', 'Pinagkuartelan Pandi Bulacan', '09751768663'),
(17, 'Tintan', 'Pinagkuartelan Pandi Bulacan', '09751768662'),
(18, 'Admin', 'Pinagkuartelan Pandi Bulacan', '09165232447');

-- --------------------------------------------------------

--
-- Table structure for table `admin_detail`
--

CREATE TABLE `admin_detail` (
  `adminid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `access` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_detail`
--

INSERT INTO `admin_detail` (`adminid`, `username`, `password`, `access`) VALUES
(14, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 2),
(16, 'admin', '80dd83c258f2397b960448a22f4e718d', 2),
(17, 'tintan', '696d29e0940a4957748fe3fc9efd22a3', 2),
(18, 'admin', '202cb962ac59075b964b07152d234b70', 2);

-- --------------------------------------------------------

--
-- Table structure for table `admin_side`
--

CREATE TABLE `admin_side` (
  `salesid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `sales_total` double NOT NULL,
  `sales_date` datetime NOT NULL,
  `active` tinyint(4) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_side`
--

INSERT INTO `admin_side` (`salesid`, `orderid`, `name`, `address`, `contact`, `email`, `payment`, `sales_total`, `sales_date`, `active`, `status`) VALUES
(294, 44, 'Jerick Cabuhay T', 'Pinagkuartelan,pandi,bulacan 1', '091652324472', 'Jerick1@gmail.com', 'cash on delivery', 1800, '2019-03-01 15:18:23', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `inventoryid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `action` varchar(50) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `inventory_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`inventoryid`, `userid`, `action`, `productid`, `quantity`, `inventory_date`) VALUES
(195, 14, 'Add Product', 50, 200, '2019-02-15 09:10:27'),
(196, 14, 'Add Product', 51, 200, '2019-02-15 09:11:16'),
(197, 14, 'Add Product', 52, 50, '2019-02-15 09:12:01'),
(198, 14, 'Add Product', 53, 50, '2019-02-15 09:13:18'),
(199, 14, 'Update Quantity', 53, 50, '2019-02-15 09:13:42'),
(201, 14, 'Add Product', 55, 50, '2019-02-15 09:17:08'),
(202, 14, 'Add Product', 56, 100, '2019-02-15 09:19:05'),
(203, 14, 'Update Quantity', 56, 100, '2019-02-15 09:19:29'),
(204, 14, 'Update Quantity', 56, 100, '2019-02-15 09:21:07'),
(205, 14, 'Add Product', 57, 150, '2019-02-15 09:22:15'),
(206, 14, 'Add Product', 58, 50, '2019-02-15 09:23:11'),
(207, 14, 'Add Product', 59, 50, '2019-02-15 09:24:39'),
(208, 14, 'Update Quantity', 59, 50, '2019-02-15 09:30:12'),
(210, 14, 'Add Product', 61, 50, '2019-02-15 09:38:53'),
(211, 23, 'Add Product', 62, 100, '2019-02-15 10:14:12'),
(212, 23, 'Update Quantity', 58, 50, '2019-02-15 10:14:58'),
(213, 23, 'Add Product', 63, 100, '2019-02-15 10:15:51'),
(214, 23, 'Update Quantity', 63, 100, '2019-02-15 10:16:11'),
(215, 23, 'Update Quantity', 63, 100, '2019-02-15 10:16:38'),
(216, 23, 'Update Quantity', 58, 50, '2019-02-15 10:17:11'),
(217, 23, 'Add Product', 64, 100, '2019-02-15 10:18:10'),
(218, 23, 'Update Quantity', 57, 100, '2019-02-15 10:18:53'),
(219, 23, 'Add Product', 65, 150, '2019-02-15 10:20:10'),
(220, 23, 'Add Product', 66, 150, '2019-02-15 10:20:46'),
(221, 23, 'Add Product', 67, 150, '2019-02-15 10:21:21'),
(222, 23, 'Add Product', 68, 50, '2019-02-15 10:22:12'),
(223, 23, 'Add Product', 69, 50, '2019-02-15 10:22:38'),
(224, 23, 'Add Product', 70, 50, '2019-02-15 10:23:16'),
(225, 23, 'Add Product', 71, 100, '2019-02-15 10:24:05'),
(227, 23, 'Add Product', 73, 100, '2019-02-15 10:25:50'),
(229, 23, 'Update Quantity', 50, 200, '2019-02-15 10:40:10'),
(230, 23, 'Update Quantity', 54, 100, '2019-02-15 10:40:50'),
(231, 23, 'Update Quantity', 52, 50, '2019-02-15 10:41:40'),
(232, 14, 'Update Quantity', 51, 199, '2019-02-15 10:45:15'),
(233, 14, 'Update Quantity', 55, 50, '2019-02-15 10:45:28'),
(234, 14, 'Update Quantity', 51, 199, '2019-02-15 10:46:18'),
(235, 14, 'Update Quantity', 51, 199, '2019-02-15 10:47:27'),
(236, 14, 'Update Quantity', 51, 199, '2019-02-15 10:47:42'),
(237, 23, 'Update Quantity', 54, 100, '2019-02-15 11:58:31'),
(238, 14, 'Update Quantity', 55, 50, '2019-02-15 12:29:17'),
(239, 14, 'Add Product', 75, 50, '2019-02-15 12:30:28'),
(240, 14, 'Add Product', 76, 50, '2019-02-15 12:35:01'),
(241, 37, 'Update Product', 68, 50, '2019-02-26 14:17:53'),
(256, 44, 'Update Product', 53, 20, '2019-03-01 15:34:45'),
(257, 44, 'Update Product', 53, 40, '2019-03-01 17:13:12'),
(258, 44, 'Update Product', 53, 90, '2019-03-01 17:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `qty` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `category_name`) VALUES
(7, 'Paint'),
(8, 'Tools Boxs'),
(9, 'Tool Kits'),
(16, 'Gardening Tools'),
(17, 'Cutting Tools');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `userid` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `bpassword` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `access` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`userid`, `customer_name`, `username`, `password`, `bpassword`, `address`, `contact`, `email`, `payment`, `access`) VALUES
(40, 'roderick', 'roderick', '7815696ecbf1c96e6894b779456d330e', 'asd', 'pinagkuartelan,pandi,bulacan', '09165232447', 'roderick1717@gmail.com', '', 2),
(41, 'jerick', 'jerick', '1610838743cc90e3e4fdda748282d9b8', 'dave', 'borol 2nd', '09165232447', 'jerick@gmail.com', '', 2),
(42, 'asd', 'asd', '7815696ecbf1c96e6894b779456d330e', 'asd', 'asd', 'asd', 'adriane1818@gmail.com', '', 2),
(43, 'john', 'john', '76d80224611fc919a5d54f0ff9fba446', 'qwe', 'Kuartel23461', '09165232447', 'john@gmail.com', '', 2),
(44, 'jerick cabuhay', 'jerick1', '7815696ecbf1c96e6894b779456d330e', 'asd', 'pinagkuartelan,pandi,bulacan', '09165232447', 'jerick1@gmail.com', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventoryid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `action` varchar(50) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `inventory_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventoryid`, `userid`, `action`, `productid`, `quantity`, `inventory_date`) VALUES
(301, 44, 'Purchase', 50, 4, '2019-03-01 15:18:47'),
(302, 44, 'Purchase', 52, 4, '2019-03-01 15:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_price` double NOT NULL,
  `product_qty` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `supplierid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `categoryid`, `product_name`, `product_price`, `product_qty`, `photo`, `supplierid`) VALUES
(50, 7, 'Davies Aqua Gloss It Paint', 200, 166, 'upload/Davies-Aqua-Gloss-It.jpg_350x350_1547140488_1550198410.jpg', 1),
(51, 7, 'Boysen WallGuard Paint', 200, 127, 'upload/Boysen-Wallguard-Exterior-Semi-Gloss-Latex-B-5715-16-Liters_1547139810_1550193076.jpg', 1),
(52, 7, 'FlintKote Paint', 250, 3, 'upload/7f639d05bfbed88f3a470d48fcd1151e_1550148508_1550193198_1550198500.jpg', 1),
(53, 7, 'Boysen Roof Guard Paint', 150, 90, 'upload/Boysen-Roofgard-1_1550146459_1550193222.jpg', 0),
(54, 7, 'Boysen Plexibond Paint', 150, 91, 'upload/Plexibond-500x500_1550146363_1550193306_1550198449.jpg', 6),
(55, 8, 'Red & Black Tool BOx', 200, 40, 'upload/91BwQsqE+aL._SX450__1550204957.jpg', 3),
(56, 8, 'Stanley Orange & Black Tool Box', 200, 70, 'upload/74d3ac89-d62e-4470-a400-d7a5306d1c5b_1.30b03a57b3153d0583955ad5c3c7c820_1550146855_1550193545.png', 3),
(57, 9, 'Stanley Hammer', 200, 93, 'upload/stanley-hammer_1547141327_1550197133.png', 2),
(58, 8, 'Pure Blackool Box', 200, 50, 'upload/plastic-toolbox_1547141530_1550193790_1550197030.png', 3),
(59, 9, 'Screw', 200, 50, 'upload/phillips_1547140882_1550193879.png', 3),
(61, 9, 'screw(flat)', 10, 50, 'upload/flat screw_1547140749_1550194733.png', 3),
(62, 8, 'Iron Tool Box', 200, 100, 'upload/iron-toolbox_1547141503_1550196850.png', 3),
(63, 9, 'Long Nose Plier', 200, 100, 'upload/71UiGTmJssL._SL1500__1550147675_1550196951_1550196998.jpg', 2),
(64, 9, 'Thick yellow Screw', 200, 100, 'upload/3ba281c8-0c73-43b6-9cc3-21b6926658a5_1550147588_1550197090.jpg', 2),
(65, 17, 'Stanley Saw', 200, 150, 'upload/1-20-090_1_1550154515_1550197210.jpg', 6),
(66, 17, 'Japanese Style Saw', 200, 150, 'upload/Japanese-Saw_1550197246.jpg', 6),
(67, 17, 'Iron Cutter Saw', 200, 150, 'upload/irwin-218hp-300-12-combi-saw-with-wood-cutting-and-hacksaw-blades-4_1550197281.jpg', 6),
(68, 16, 'Yellow gloves', 100, 50, 'upload/firm-grip-gardening-gloves-5138-06-64_400_compressed_1550197332.jpg', 6),
(69, 16, 'Flat Shovel', 100, 50, 'upload/289974xlg_1550197358.jpg', 6),
(70, 16, 'Stanley Mattock', 200, 50, 'upload/nupla-pickaxes-mattocks-24552-64_1000_1550197396.jpg', 6),
(71, 16, 'Green WheelBarrow', 100, 100, 'upload/Garden-Tools-5-Cuft-Metal-Wheel-Barrow-Wheelbarrow-for-Gardening-Construction_1550197445.jpg', 6),
(73, 16, 'Watering Can', 100, 100, 'upload/lg_1018_1550197550.jpg', 6),
(75, 8, 'Black  & Orange Tool Box', 200, 50, 'upload/black-ridgid-portable-tool-boxes-222570-64_1000_1550205028.jpg', 3),
(76, 8, 'Red Milwaukee Tool Box', 200, 50, 'upload/red-milwaukee-portable-tool-boxes-233663-64_1000_1547141579_1550205301.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sales_detail`
--

CREATE TABLE `sales_detail` (
  `sales_detailid` int(11) NOT NULL,
  `salesid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `sales_qty` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_detail`
--

INSERT INTO `sales_detail` (`sales_detailid`, `salesid`, `productid`, `sales_qty`) VALUES
(720, 294, 50, 4),
(721, 294, 52, 4);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplierid` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_address` varchar(150) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplierid`, `company_name`, `company_address`, `contact`) VALUES
(2, 'Stanley', 'Manila', '09751768662'),
(3, 'Power Tools', 'Kuartel', '09165232448'),
(4, 'Davies', 'manila', '09165232449'),
(5, 'Coat Saver', 'Manila', '09751768664'),
(6, 'Tintan Company', 'Manila', '09165232447'),
(7, 'Mentos Company', 'Manila', '09512525125');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activitylog`
--
ALTER TABLE `activitylog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `admin_detail`
--
ALTER TABLE `admin_detail`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `admin_side`
--
ALTER TABLE `admin_side`
  ADD PRIMARY KEY (`salesid`);

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`inventoryid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventoryid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `sales_detail`
--
ALTER TABLE `sales_detail`
  ADD PRIMARY KEY (`sales_detailid`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplierid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activitylog`
--
ALTER TABLE `activitylog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `admin_detail`
--
ALTER TABLE `admin_detail`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `admin_side`
--
ALTER TABLE `admin_side`
  MODIFY `salesid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `inventoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `sales_detail`
--
ALTER TABLE `sales_detail`
  MODIFY `sales_detailid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=722;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplierid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

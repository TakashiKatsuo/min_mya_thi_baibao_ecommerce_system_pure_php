-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 27, 2020 at 09:33 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baibao_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Category_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Category_image` text COLLATE utf8_unicode_ci NOT NULL,
  `Category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Category_id`, `Category_image`, `Category_name`, `created_at`, `updated_at`) VALUES
('CATE_0001', '../images/categories/Categ.png', 'Movies, Music & Games', '2020-09-25 18:09:10', '2020-09-25 18:09:10'),
('CATE_0002', '../images/categories/Electronics.jpg', 'Electronics & Computers', '2020-09-25 18:12:59', '2020-09-25 18:12:59'),
('CATE_0003', '../images/categories/clothings.jpg', 'Clothing, Shoes, & Jewelry', '2020-09-25 18:14:40', '2020-09-25 18:14:40'),
('CATE_0004', '../images/categories/Toys_and_Kids.png', 'Toys, Kids & Baby', '2020-09-25 18:16:12', '2020-09-25 18:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `Order_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Sub_quantity_amount` int(11) NOT NULL,
  `Product_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Product_variant_option` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Product_vop` decimal(19,2) NOT NULL,
  `Product_per_weight` decimal(19,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Order_date` date NOT NULL,
  `Order_total_price_amount` decimal(19,2) NOT NULL,
  `Order_total_discount_amount` decimal(19,2) DEFAULT NULL,
  `Order_total_weight_amount` decimal(19,2) NOT NULL,
  `Order_total_quantity_amount` int(11) NOT NULL,
  `O_address` text COLLATE utf8_unicode_ci NOT NULL,
  `O_phone_number` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Notes` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Payment_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Payment_status` tinyint(1) NOT NULL,
  `Credit_card_number` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Shipment_status` tinyint(1) NOT NULL,
  `Order_cancel_status` tinyint(1) NOT NULL,
  `User_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Shipping_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Status_changed_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Product_image` text COLLATE utf8_unicode_ci NOT NULL,
  `Product_brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Product_price` decimal(19,2) NOT NULL,
  `Product_discounted_price` decimal(19,2) NOT NULL,
  `Product_weight` decimal(19,2) NOT NULL,
  `Product_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Status_approve` tinyint(1) NOT NULL,
  `Status_changed_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Subcategory_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Seller_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_id`, `Product_image`, `Product_brand`, `Product_name`, `Product_price`, `Product_discounted_price`, `Product_weight`, `Product_description`, `Status_approve`, `Status_changed_by`, `Subcategory_id`, `Seller_id`, `created_at`, `updated_at`) VALUES
('PRO_0001', '../images/products/VR04.jpg', 'Oculus', 'Oculus Quest VR (2019 Remodel)', '1100000.00', '890000.00', '2.98', 'The Oculus Quest is a completely wireless virtual reality headset. It doesn\'t need to be tethered to a PC like other powerful VR headsets and doesn\'t require a phone like some mobile VR devices. It features six degrees of freedom (6DoF), meaning it can track your movements up, down, left, right, forward, and backward.', 1, 'USER_0001', 'SUB_CATE_0005', 'USER_0001', '2020-09-25 18:43:48', '2020-09-27 15:20:57'),
('PRO_0002', '../images/products/VR03.png', 'Oculus', 'Oculus Quest All-in-One VR Gaming Heatset', '1200000.00', '900000.00', '4.78', 'Oculus is a brand of Facebook Technologies, LLC (formerly known as Oculus VR, LLC), a subsidiary of Facebook Inc. ... In April 2012, Luckey announced the Rift, a virtual reality headset designed for video gaming, and launched a Kickstarter campaign in August to make virtual reality headsets available to developers.', 1, 'USER_0001', 'SUB_CATE_0005', 'USER_0001', '2020-09-25 18:49:26', '2020-09-27 15:20:49'),
('PRO_0003', '../images/products/VR02.png', 'Oculus', 'Oculus Quest VR (2018)', '700000.00', '550000.00', '1.78', 'Virtual Reality (VR) is the use of computer technology to create a simulated environment. Unlike traditional user interfaces, VR places the user inside an experience. Instead of viewing a screen in front of them, users are immersed and able to interact with 3D worlds.', 1, 'USER_0001', 'SUB_CATE_0005', 'USER_0001', '2020-09-25 18:52:20', '2020-09-27 15:20:43'),
('PRO_0004', '../images/products/VR01.jpg', 'Ticketys', 'Oculus Quest Controllers Strips', '36500.00', '26000.00', '0.07', 'Strips virtual reality has been around for years, the tethered hardware to experience it has traditionally been expensive, bulky and power-hungry. Today, mobile VR headsets, which are basically goggles that will hold a smartphone, have allowed VR apps to spread into the consumer market. The goal of each type of VR headset is to provide the viewer with an experience that is so real, the headset itself is forgotten.', 1, 'USER_0001', 'SUB_CATE_0006', 'USER_0001', '2020-09-25 18:59:00', '2020-09-27 15:20:36'),
('PRO_0005', '../images/products/unnamed-1.jpg', 'Playstation', 'PS3 Controller', '32000.00', '30000.00', '0.14', 'a computer-based system that reignited interest in virtual reality when the Oculus VR startup launched a successful Kickstarter campaign. Rift works with positioning technology that lets the user move physically through 3D space and has Touch controllers.', 1, 'USER_0001', 'SUB_CATE_0006', 'USER_0001', '2020-09-25 19:01:18', '2020-09-27 15:20:30'),
('PRO_0006', '../images/products/Laptop03.jpg', 'MSI', 'MSI GL75 LEOPARD 10SFK-029', '2287500.00', '2100000.00', '15.87', 'MSI, MSI gaming, dragon, and dragon shield names and logos, as well as any other MSI service or product names or logos displayed on the MSI website, are registered trademarks or trademarks of MSI. The names and logos of third party products and companies shown on our website and used in the materials are the property of their respective owners and may also be trademarks. MSI trademarks and copyrighted materials may be used only with written permission from MSI. Any rights not expressly granted herein are reserved.', 1, 'USER_0001', 'SUB_CATE_0004', 'USER_0001', '2020-09-27 15:14:02', '2020-09-27 17:21:22'),
('PRO_0007', '../images/products/Laptop06.jpg', 'HP', 'HP Spectre x360 15 (2019)', '1900000.00', '1780000.00', '14.87', 'Product specification, functions and appearance may vary by models and differ from country to country. All specifications are subject to change without notice. Although we endeavor to present the most precise and comprehensive information at the time of publication, a small number of items may contain typography or photography errors. Some products and configuration may not be available in all markets or launch time differs. Supplies are limited. We recommend you to check with your local supplier for exact offers and detail specifications.', 1, 'USER_0001', 'SUB_CATE_0004', 'USER_0001', '2020-09-27 15:18:58', '2020-09-27 17:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `Shipping_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Shipping_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Per_order_price` decimal(19,2) NOT NULL,
  `Per_item_price` decimal(19,2) NOT NULL,
  `Per_weight_price` decimal(19,2) NOT NULL,
  `Shipping_provider_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Status_approve` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Status_changed_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`Shipping_id`, `Shipping_name`, `Per_order_price`, `Per_item_price`, `Per_weight_price`, `Shipping_provider_id`, `Status_approve`, `Status_changed_by`, `created_at`, `updated_at`) VALUES
('SHIPP_0001', 'Basic Package (3 ~5 days)', '10000.00', '2000.00', '50.12', 'USER_0001', '1', 'USER_0001', '2020-09-25 19:24:43', '2020-09-25 19:24:50'),
('SHIPP_0002', 'Tracked Package (2 ~ 3 days)', '12999.88', '879.00', '78.41', 'USER_0001', '1', 'USER_0001', '2020-09-25 19:25:57', '2020-09-25 19:26:02');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `Subcategory_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Subcategory_image` text COLLATE utf8_unicode_ci NOT NULL,
  `Subcategory_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Category_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`Subcategory_id`, `Subcategory_image`, `Subcategory_name`, `Category_id`, `created_at`, `updated_at`) VALUES
('SUB_CATE_0001', '../images/subcategories/Movies & TV.jpeg', 'Movies & TV', 'CATE_0001', '2020-09-25 18:20:12', '2020-09-25 18:20:12'),
('SUB_CATE_0002', '../images/subcategories/blue-ray.jpg', 'Blue-ray', 'CATE_0001', '2020-09-25 18:23:52', '2020-09-25 18:23:52'),
('SUB_CATE_0003', '../images/subcategories/videogames.jpg', 'Video Games', 'CATE_0001', '2020-09-25 18:25:43', '2020-09-25 18:25:43'),
('SUB_CATE_0004', '../images/subcategories/laptops_featurepic.jpg', 'Laptops', 'CATE_0002', '2020-09-25 18:30:20', '2020-09-25 18:30:20'),
('SUB_CATE_0005', '../images/subcategories/vr.jpg', 'Virtual Reality', 'CATE_0002', '2020-09-25 18:32:36', '2020-09-25 18:32:36'),
('SUB_CATE_0006', '../images/subcategories/amazon_electronics_increase.jpg', 'Electronics Accessories', 'CATE_0002', '2020-09-25 18:34:25', '2020-09-25 18:34:25'),
('SUB_CATE_0007', '../images/subcategories/Shirt03.jpg', 'Shirts', 'CATE_0003', '2020-09-25 18:35:07', '2020-09-25 18:35:07'),
('SUB_CATE_0008', '../images/subcategories/bagsss.jpg', 'Bags', 'CATE_0003', '2020-09-25 18:36:02', '2020-09-25 18:36:02'),
('SUB_CATE_0009', '../images/subcategories/1190588.jpg', 'Cosmetics', 'CATE_0003', '2020-09-25 18:37:37', '2020-09-25 18:37:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Role` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Photo` text COLLATE utf8_unicode_ci NOT NULL,
  `Fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Password` text COLLATE utf8_unicode_ci NOT NULL,
  `Dob` date NOT NULL,
  `Phone_number` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Address` text COLLATE utf8_unicode_ci NOT NULL,
  `User_approval` tinyint(1) NOT NULL,
  `CR_detail` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isEmailConfirmed` tinyint(1) NOT NULL,
  `token` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Status_changed_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_id`, `Role`, `Photo`, `Fullname`, `Username`, `Email`, `Password`, `Dob`, `Phone_number`, `Address`, `User_approval`, `CR_detail`, `Company`, `isEmailConfirmed`, `token`, `Status_changed_by`, `created_at`, `deleted_at`) VALUES
('USER_0001', 'ADMIN', '../images/users/myphoto.jpg', 'Min Mya Thi', 'minmyathi', 'takashikatsuo97@gmail.com', '123', '2020-09-09', '09529180', 'Pyi Myanmar Condominium, 5th Floor A, Yankin Tsp.', 1, '', 'Baibao Ltd.', 1, '', '', '2020-09-22 14:17:57', '2020-09-27 17:46:42'),
('USER_0002', 'MANAGER', '../images/users/managerphoto.png', 'Alice', 'alice', 'alice@gmail.com', '123', '2020-09-09', '09529180', 'Pyi Myanmar Condominium, 5th Floor A, Yankin Tsp.', 1, '', NULL, 1, '', 'USER_0001', '2020-09-22 14:17:57', '2020-09-27 17:46:48'),
('USER_0003', 'SELLER', '../images/users/sellerphoto.jpeg', 'Yamato Kanzaki', 'yamato', 'yamato@gmail.com', '123', '2020-09-09', '092432422222', '48 Condo, 5th Floor A, Bota taung Tsp.', 1, '', NULL, 1, '', 'USER_0001', '2020-09-22 14:17:57', '2020-09-27 17:46:54'),
('USER_0004', 'SHIPPER', '../images/users/shipperphoto.png', 'Kuma', 'kuma', 'kuma@gmail.com', '123', '2020-09-09', '09123343223', 'Golden City, 9th Floor A, Yankin Tsp.', 1, '', NULL, 1, '', 'USER_0001', '2020-09-22 14:17:57', '2020-09-27 17:47:00'),
('USER_0005', 'CUSTOMER', '../images/users/userphoto.jpg', 'Jenny', 'jenny', 'jenny@gmail.com', '123', '2020-09-22', '09876543', 'St. Mall 24 street Maha Myaing Tsp', 1, '', NULL, 1, NULL, 'USER_0002', '2020-09-22 21:18:46', '2020-09-27 17:47:05');

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE `variants` (
  `Variant_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Variant_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Variant_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Product_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `variants`
--

INSERT INTO `variants` (`Variant_id`, `Variant_name`, `Variant_description`, `Product_id`, `created_at`, `updated_at`) VALUES
('VARI_0001', 'Storage Sizes', 'Memory Storage to store data', 'PRO_0001', '2020-09-25 19:03:48', '2020-09-25 19:03:48'),
('VARI_0002', 'Oculus Colors', 'Any Types of color you want!', 'PRO_0001', '2020-09-25 19:04:50', '2020-09-25 19:04:50'),
('VARI_0003', 'Memory Storage Sizes', 'Memory Storage Sizes for your Oculus Quest VR', 'PRO_0002', '2020-09-25 19:05:49', '2020-09-25 19:05:49'),
('VARI_0004', 'Limited Oculus Quest Colors', 'Limited Oculus Quest Colors is now here! Come and grab ass fast as you can!', 'PRO_0002', '2020-09-25 19:06:55', '2020-09-25 19:06:55'),
('VARI_0005', 'Storage Sizes', 'Sizes for your VR storage', 'PRO_0003', '2020-09-25 19:07:27', '2020-09-25 19:07:27'),
('VARI_0006', 'Oculus Colors', 'Colors anywhere', 'PRO_0003', '2020-09-25 19:07:47', '2020-09-25 19:07:47'),
('VARI_0007', 'Strips Colors', 'Color for your controller\'s strips', 'PRO_0004', '2020-09-25 19:08:32', '2020-09-25 19:08:32'),
('VARI_0008', 'Modal', 'Modal in this one vary naw!', 'PRO_0005', '2020-09-25 19:09:29', '2020-09-25 19:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `variant_options`
--

CREATE TABLE `variant_options` (
  `Variant_option_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Variant_option_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Variant_option_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Variant_option_additional_price` decimal(19,2) NOT NULL,
  `Variant_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `variant_options`
--

INSERT INTO `variant_options` (`Variant_option_id`, `Variant_option_name`, `Variant_option_description`, `Variant_option_additional_price`, `Variant_id`, `created_at`, `updated_at`) VALUES
('VARI_OPT_0001', '64 GB', 'It is still a good choice for you!', '0.00', 'VARI_0003', '2020-09-25 19:13:56', '2020-09-25 19:13:56'),
('VARI_OPT_0002', '128 GB', 'Beast is coming right at you!', '200000.00', 'VARI_0003', '2020-09-25 19:14:44', '2020-09-25 19:14:44'),
('VARI_OPT_0003', '64 GB', '', '0.00', 'VARI_0001', '2020-09-25 19:18:07', '2020-09-25 19:18:07'),
('VARI_OPT_0004', '128 GB', 'More storage for you!', '80000.00', 'VARI_0001', '2020-09-25 19:18:41', '2020-09-27 17:59:13'),
('VARI_OPT_0005', 'White', '', '50000.00', 'VARI_0004', '2020-09-25 19:19:10', '2020-09-25 19:19:10'),
('VARI_OPT_0006', 'Space Gray', '', '70000.00', 'VARI_0004', '2020-09-25 19:19:38', '2020-09-25 19:19:38'),
('VARI_OPT_0007', 'Ocean Blue', '', '30000.00', 'VARI_0004', '2020-09-25 19:20:07', '2020-09-25 19:20:07'),
('VARI_OPT_0008', 'Blue', '', '0.00', 'VARI_0002', '2020-09-25 19:20:50', '2020-09-25 19:20:50'),
('VARI_OPT_0009', 'Marine Sky', '', '30000.00', 'VARI_0002', '2020-09-25 19:21:19', '2020-09-25 19:21:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`Shipping_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`Subcategory_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_id`);

--
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`Variant_id`);

--
-- Indexes for table `variant_options`
--
ALTER TABLE `variant_options`
  ADD PRIMARY KEY (`Variant_option_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

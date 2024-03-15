-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2024 at 11:11 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `associatives`
--

CREATE TABLE `associatives` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(100) NOT NULL,
  `cus_adhaar` varchar(50) NOT NULL,
  `cus_address` text NOT NULL,
  `cus_email` varchar(100) NOT NULL,
  `cus_phoneno` varchar(20) NOT NULL,
  `cus_state` varchar(20) NOT NULL,
  `cus_logid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `associatives`
--

INSERT INTO `associatives` (`cus_id`, `cus_name`, `cus_adhaar`, `cus_address`, `cus_email`, `cus_phoneno`, `cus_state`, `cus_logid`) VALUES
(2, 'FedEx', 'L9090808', 'FedEx', 'L9090809@gmail.com', '7895689568', 'Goa', 7),
(3, 'Ecom Express', 'L6767675', 'Ecom Express', 'amitha@gmail.com', '8956895623', 'bangalure', 9),
(4, 'DTDC', 'L9090809', 'DTDC ', 'customersupport@dtdc.com', '8956895623', 'Kerala', 10),
(5, 'Blue Dart', 'L3454521', 'Blue Dart', 'bluedart@gmail.com', '7895689568', 'Mumbai', 11),
(6, 'DHL', 'U9898767', 'DHL', 'dhl@gmail.com', '7895689568', 'bangalure', 12);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` text NOT NULL,
  `country_code` varchar(100) NOT NULL,
  `currency_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `country_code`, `currency_code`) VALUES
(1, 'VFGDGD', 'GDFG', 'GDF'),
(3, 'UK', 'UK', 'UK');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(100) NOT NULL,
  `cus_adhaar` varchar(50) NOT NULL,
  `cus_address` text NOT NULL,
  `cus_gender` varchar(50) NOT NULL,
  `cus_email` varchar(100) NOT NULL,
  `cus_phoneno` varchar(20) NOT NULL,
  `cus_state` varchar(20) NOT NULL,
  `cus_logid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_name`, `cus_adhaar`, `cus_address`, `cus_gender`, `cus_email`, `cus_phoneno`, `cus_state`, `cus_logid`) VALUES
(1, 'sarath', '895689568956', 'fgdg', 'Male', 'sarath@gmail.com', '8956895623', 'Chhattisgarh', 6);

-- --------------------------------------------------------

--
-- Table structure for table `parcels`
--

CREATE TABLE `parcels` (
  `id` int(30) NOT NULL,
  `reference_number` varchar(100) NOT NULL,
  `sender_name` text NOT NULL,
  `sender_address` text NOT NULL,
  `sender_contact` text NOT NULL,
  `recipient_name` text NOT NULL,
  `recipient_address` text NOT NULL,
  `recipient_contact` text NOT NULL,
  `type` int(1) NOT NULL COMMENT '1 = Deliver, 2=Pickup',
  `from_branch_id` varchar(30) NOT NULL,
  `to_branch_id` varchar(30) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `height` varchar(100) NOT NULL,
  `width` varchar(100) NOT NULL,
  `length` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `add_logid` int(11) NOT NULL,
  `update_logid` int(11) DEFAULT NULL,
  `update_boy_name` varchar(200) DEFAULT NULL,
  `cate` varchar(200) DEFAULT NULL,
  `item` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parcels`
--

INSERT INTO `parcels` (`id`, `reference_number`, `sender_name`, `sender_address`, `sender_contact`, `recipient_name`, `recipient_address`, `recipient_contact`, `type`, `from_branch_id`, `to_branch_id`, `weight`, `height`, `width`, `length`, `price`, `status`, `date_created`, `add_logid`, `update_logid`, `update_boy_name`, `cate`, `item`) VALUES
(1, '201406231415', 'John Smith', 'Sample', '+123456', 'Claire Blake', 'Sample', 'Sample', 1, '1', '0', '30kg', '12in', '12in', '15in', 2500, 7, '2020-11-26 16:15:46', 0, NULL, NULL, NULL, NULL),
(2, '117967400213', 'John Smith', 'Sample', '+123456', 'Claire Blake', 'Sample', 'Sample', 2, '1', '3', '30kg', '12in', '12in', '15in', 2500, 1, '2020-11-26 16:46:03', 0, NULL, NULL, NULL, NULL),
(3, '983186540795', 'John Smith', 'Sample', '+123456', 'Claire Blake', 'Sample', 'Sample', 2, '1', '3', '20Kg', '10in', '10in', '10in', 1500, 2, '2020-11-26 16:46:03', 0, NULL, NULL, NULL, NULL),
(4, '514912669061', 'Claire Blake', 'Sample', '+123456', 'John Smith', 'Sample Address', '+12345', 2, '4', '1', '23kg', '12in', '12in', '15in', 1900, 0, '2020-11-27 13:52:14', 0, NULL, NULL, NULL, NULL),
(5, '897856905844', 'Claire Blake', 'Sample', '+123456', 'John Smith', 'Sample Address', '+12345', 2, '4', '1', '30kg', '10in', '10in', '10in', 1450, 0, '2020-11-27 13:52:14', 0, NULL, NULL, NULL, NULL),
(6, '505604168988', 'John Smith', 'Sample', '+123456', 'Sample', 'Sample', '+12345', 1, '1', '0', '23kg', '12in', '12in', '15in', 2500, 1, '2020-11-27 14:06:42', 0, NULL, NULL, NULL, NULL),
(7, '791144246025', 'fxgfsdg', 'gfdg', '566556', 'dffsgf', 'dgdfg', '454', 1, '1', '', '120', '130', '33', '33', 333, 0, '2024-01-26 16:28:56', 0, NULL, NULL, NULL, NULL),
(8, '137664032714', 'testing', 'fgdf', 'gdfhfd', 'ghdf', 'gdfhgdf', 'ghfh', 2, '2', '1', '202', '402', '122', '156', 200, 0, '2024-01-26 18:44:18', 0, NULL, NULL, NULL, NULL),
(9, '913790493976', 'Manoharan', 'manoharan karnadaka -601003', '566556', 'sarath', 'sarath bhavan kollam kerala-691004', '9878787878', 1, '7', '', '202', '402', '122', '156', 200, 3, '2024-01-26 20:18:55', 6, 8, 'parvathy s', NULL, NULL),
(10, '863134996870', 'Manoharan1', 'manoharan karnadaka -601003', '8989787878', 'sarath2', 'sarath bhavan kollam kerala-691004', '8989898989', 2, '7', '3', '202', '402', '122', '156', 200, 3, '2024-01-26 20:22:27', 6, 8, NULL, NULL, NULL),
(11, '963924589940', 'amitha', 'amitha bhavanam', '5665568899', 'gokul', 'gokul bhavan', '9878787878', 1, '7', '', '1', '2', '4', '3', 450, 0, '2024-02-17 19:02:58', 6, NULL, NULL, 'Consumer Goods', 'car'),
(12, '082875654382', 'sarath', 'fgdg', '8956895623', 'fsdfds', 'gdg', '9878787878', 2, '7', '1', '1', '2', '4', '3', 450, 0, '2024-02-20 11:10:05', 6, NULL, NULL, 'Consumer Goods', 'car'),
(13, '464330065134', 'sarath', 'fgdg', '8956895623', 'fsdfds', 'gdg', '9878787878', 2, '7', '1', '202', '402', '122', '156', 0, 0, '2024-02-20 11:10:05', 6, NULL, NULL, 'Industrial Goods', 'car'),
(14, '007830992900', 'sarath', 'fgdg', '8956895623', 'gopalan', 'gopal bhavan', '9878787878', 2, '7', '3', '1', '2', '4', '3', 450, 2, '2024-02-20 16:10:58', 6, 8, 'parvathy s', 'Consumer Goods', 'car'),
(15, '063496515277', 'sarath', 'fgdg', '8956895623', 'MANU', 'test address', '8956852356', 1, '7', '1', '1', '2', '4', '3', 450, 0, '2024-03-07 14:02:59', 6, NULL, NULL, 'Consumer Goods', 'car');

-- --------------------------------------------------------

--
-- Table structure for table `parcel_tracks`
--

CREATE TABLE `parcel_tracks` (
  `id` int(30) NOT NULL,
  `parcel_id` int(30) NOT NULL,
  `status` int(2) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `current_route` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parcel_tracks`
--

INSERT INTO `parcel_tracks` (`id`, `parcel_id`, `status`, `date_created`, `current_route`) VALUES
(1, 2, 1, '2020-11-27 09:53:27', NULL),
(2, 3, 1, '2020-11-27 09:55:17', NULL),
(3, 1, 1, '2020-11-27 10:28:01', NULL),
(4, 1, 2, '2020-11-27 10:28:10', NULL),
(5, 1, 3, '2020-11-27 10:28:16', NULL),
(6, 1, 4, '2020-11-27 11:05:03', NULL),
(7, 1, 5, '2020-11-27 11:05:17', NULL),
(8, 1, 7, '2020-11-27 11:05:26', NULL),
(9, 3, 2, '2020-11-27 11:05:41', NULL),
(10, 6, 1, '2020-11-27 14:06:57', NULL),
(11, 10, 0, '2024-01-26 22:06:18', NULL),
(12, 10, 10, '2024-01-26 22:07:51', NULL),
(13, 9, 1, '2024-02-16 16:51:40', NULL),
(14, 9, 0, '2024-02-16 16:51:48', NULL),
(15, 10, 3, '2024-02-16 17:55:56', NULL),
(16, 9, 1, '2024-02-16 17:56:49', NULL),
(17, 9, 3, '2024-02-17 12:07:43', 'dsadd'),
(18, 14, 1, '2024-02-20 16:34:13', ''),
(19, 14, 1, '2024-02-20 16:37:39', ''),
(20, 14, 0, '2024-02-20 17:12:03', ''),
(21, 14, 0, '2024-02-20 17:14:34', ''),
(22, 14, 0, '2024-02-20 17:15:32', ''),
(23, 14, 10, '2024-02-20 17:25:19', ''),
(24, 14, 10, '2024-02-20 17:27:02', NULL),
(25, 14, 2, '2024-02-20 18:00:10', 'mysor');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` int(30) NOT NULL,
  `pcategory` varchar(200) DEFAULT NULL,
  `weight_from` text NOT NULL,
  `height_from` text NOT NULL,
  `length_from` text NOT NULL,
  `width_from` varchar(50) NOT NULL,
  `weight_to` varchar(50) NOT NULL,
  `height_to` varchar(50) NOT NULL,
  `length_to` varchar(50) NOT NULL,
  `width_to` varchar(50) NOT NULL,
  `amount` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `pcategory`, `weight_from`, `height_from`, `length_from`, `width_from`, `weight_to`, `height_to`, `length_to`, `width_to`, `amount`, `date_created`) VALUES
(5, 'Consumer Goods', '200', '400', '150', '120', '300', '450', '180', '150', '200', '2024-01-26 15:57:21'),
(8, 'Consumer Goods', '1', '2', '3', '4', '2', '4', '4', '5', '450', '2024-01-28 11:05:05'),
(9, 'Specialized Cargo', '300', '10', '100', '200', '400', '20', '200', '300', '4500', '2024-02-17 17:55:17'),
(10, 'Consumer Goods', '1', '2', '3', '4', '2', '4', '4', '5', '450', '2024-02-17 18:10:51');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rate_id` int(11) NOT NULL,
  `rate_associative` int(11) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `review` text NOT NULL,
  `rate_userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rate_id`, `rate_associative`, `rating`, `review`, `rate_userid`) VALUES
(1, 7, '2', 'not good', 6),
(2, 10, '1', 'gOOD', 0),
(3, 11, '4', 'GOOD', 0),
(4, 9, '3', 'GOOD', 0),
(5, 9, '2', 'GOOD', 0);

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `cover_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `address`, `cover_img`) VALUES
(1, 'Cargo Master', 'info@sample.com', '+6948 8542 623', 'Cargo Master', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1 = admin, 2 = delboy,3-user,4-associative',
  `branch_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `type`, `branch_id`, `date_created`) VALUES
(1, 'Administrator', '', 'admin@admin.com', '0192023a7bbd73250516f069df18b500', 1, 0, '2020-11-26 10:57:04'),
(2, 'John', 'Smith', 'jsmith@sample.com', '1254737c076cf867dc53d60a0364f38e', 2, 1, '2020-11-26 11:52:04'),
(3, 'George', 'Wilson', 'gwilson@sample.com', '72e755bd535574e35739d253821646fe', 2, 4, '2020-11-27 13:32:12'),
(6, 'sarath', '', 'sarath@gmail.com', '6451d62c34ba801398a21df221f675b6', 3, 0, '2024-01-17 17:57:02'),
(7, 'Associate', 'GR', 'as@gmail.com', '2ae667aefbb9705a49297ed9214cfbea', 4, 0, '2024-01-17 18:08:42'),
(8, 'parvathy', 's', 'parvathy@gmail.com', '2ae667aefbb9705a49297ed9214cfbea', 2, 7, '2024-01-26 21:59:45'),
(9, 'amitha', '', 'amitha@gmail.com', '0c4bd27c6a82cfb316aecc3014f0505b', 4, 0, '2024-02-20 16:01:11'),
(10, 'DTDC', '', 'customersupport@dtdc.com', '4d271e65d3a8711599ed8a762efc9a49', 4, 0, '2024-03-07 15:11:32'),
(11, 'Blue Dart', '', 'bluedart@gmail.com', '48d6215903dff56238e52e8891380c8f', 4, 0, '2024-03-07 15:14:58'),
(12, 'DHL', '', 'dhl@gmail.com', '2146175e6584b7c11f026f2ec967d1e3', 4, 0, '2024-03-07 15:19:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `associatives`
--
ALTER TABLE `associatives`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `parcels`
--
ALTER TABLE `parcels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcel_tracks`
--
ALTER TABLE `parcel_tracks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
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
-- AUTO_INCREMENT for table `associatives`
--
ALTER TABLE `associatives`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parcels`
--
ALTER TABLE `parcels`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `parcel_tracks`
--
ALTER TABLE `parcel_tracks`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

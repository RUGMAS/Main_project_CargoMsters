-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2024 at 08:47 AM
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
(2, 'rgsdhfs', 'h7485', 'hgfhj', 'ddd@gmail.com', '7895689568', 'Goa', 7);

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
  `add_logid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parcels`
--

INSERT INTO `parcels` (`id`, `reference_number`, `sender_name`, `sender_address`, `sender_contact`, `recipient_name`, `recipient_address`, `recipient_contact`, `type`, `from_branch_id`, `to_branch_id`, `weight`, `height`, `width`, `length`, `price`, `status`, `date_created`, `add_logid`) VALUES
(1, '201406231415', 'John Smith', 'Sample', '+123456', 'Claire Blake', 'Sample', 'Sample', 1, '1', '0', '30kg', '12in', '12in', '15in', 2500, 7, '2020-11-26 16:15:46', 0),
(2, '117967400213', 'John Smith', 'Sample', '+123456', 'Claire Blake', 'Sample', 'Sample', 2, '1', '3', '30kg', '12in', '12in', '15in', 2500, 1, '2020-11-26 16:46:03', 0),
(3, '983186540795', 'John Smith', 'Sample', '+123456', 'Claire Blake', 'Sample', 'Sample', 2, '1', '3', '20Kg', '10in', '10in', '10in', 1500, 2, '2020-11-26 16:46:03', 0),
(4, '514912669061', 'Claire Blake', 'Sample', '+123456', 'John Smith', 'Sample Address', '+12345', 2, '4', '1', '23kg', '12in', '12in', '15in', 1900, 0, '2020-11-27 13:52:14', 0),
(5, '897856905844', 'Claire Blake', 'Sample', '+123456', 'John Smith', 'Sample Address', '+12345', 2, '4', '1', '30kg', '10in', '10in', '10in', 1450, 0, '2020-11-27 13:52:14', 0),
(6, '505604168988', 'John Smith', 'Sample', '+123456', 'Sample', 'Sample', '+12345', 1, '1', '0', '23kg', '12in', '12in', '15in', 2500, 1, '2020-11-27 14:06:42', 0),
(7, '791144246025', 'fxgfsdg', 'gfdg', '566556', 'dffsgf', 'dgdfg', '454', 1, '1', '', '120', '130', '33', '33', 333, 0, '2024-01-26 16:28:56', 0),
(8, '137664032714', 'testing', 'fgdf', 'gdfhfd', 'ghdf', 'gdfhgdf', 'ghfh', 2, '2', '1', '202', '402', '122', '156', 200, 0, '2024-01-26 18:44:18', 0),
(9, '913790493976', 'Manoharan', 'manoharan karnadaka -601003', '566556', 'sarath', 'sarath bhavan kollam kerala-691004', '9878787878', 1, '7', '', '202', '402', '122', '156', 200, 0, '2024-01-26 20:18:55', 6),
(10, '863134996870', 'Manoharan1', 'manoharan karnadaka -601003', '8989787878', 'sarath2', 'sarath bhavan kollam kerala-691004', '8989898989', 2, '7', '3', '202', '402', '122', '156', 200, 1, '2024-01-26 20:22:27', 6);

-- --------------------------------------------------------

--
-- Table structure for table `parcel_tracks`
--

CREATE TABLE `parcel_tracks` (
  `id` int(30) NOT NULL,
  `parcel_id` int(30) NOT NULL,
  `status` int(2) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parcel_tracks`
--

INSERT INTO `parcel_tracks` (`id`, `parcel_id`, `status`, `date_created`) VALUES
(1, 2, 1, '2020-11-27 09:53:27'),
(2, 3, 1, '2020-11-27 09:55:17'),
(3, 1, 1, '2020-11-27 10:28:01'),
(4, 1, 2, '2020-11-27 10:28:10'),
(5, 1, 3, '2020-11-27 10:28:16'),
(6, 1, 4, '2020-11-27 11:05:03'),
(7, 1, 5, '2020-11-27 11:05:17'),
(8, 1, 7, '2020-11-27 11:05:26'),
(9, 3, 2, '2020-11-27 11:05:41'),
(10, 6, 1, '2020-11-27 14:06:57'),
(11, 10, 0, '2024-01-26 22:06:18'),
(12, 10, 10, '2024-01-26 22:07:51');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` int(30) NOT NULL,
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

INSERT INTO `prices` (`id`, `weight_from`, `height_from`, `length_from`, `width_from`, `weight_to`, `height_to`, `length_to`, `width_to`, `amount`, `date_created`) VALUES
(5, '200', '400', '150', '120', '300', '450', '180', '150', '200', '2024-01-26 15:57:21'),
(8, '1', '2', '3', '4', '2', '4', '4', '5', '450', '2024-01-28 11:05:05');

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
(8, 'parvathy', 's', 'parvathy@gmail.com', 'c0497c74269a2c840438ddce45465daa', 2, 7, '2024-01-26 21:59:45');

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
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `parcel_tracks`
--
ALTER TABLE `parcel_tracks`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

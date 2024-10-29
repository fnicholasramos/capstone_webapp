-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2024 at 12:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `doc_orders`
--

CREATE TABLE `doc_orders` (
  `id` int(11) NOT NULL,
  `flow_rate` int(10) NOT NULL,
  `volume` int(10) NOT NULL,
  `drip_rate` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `iv_data`
--

CREATE TABLE `iv_data` (
  `id` int(11) NOT NULL,
  `liter` float NOT NULL,
  `percent` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `iv_data`
--

INSERT INTO `iv_data` (`id`, `liter`, `percent`, `time`) VALUES
(1, 5, 0, '2024-10-23 16:59:27'),
(2, 5, 0, '2024-10-23 16:59:29'),
(3, 7, 0, '2024-10-23 17:00:12'),
(4, 5, 0, '2024-10-23 17:00:14'),
(5, 5, 0, '2024-10-23 17:00:16'),
(6, 5, 0, '2024-10-23 17:00:17'),
(7, 4, 0, '2024-10-23 17:00:19'),
(8, 5, 0, '2024-10-23 17:00:23'),
(9, 5, 0, '2024-10-23 17:00:24'),
(10, 6, 0, '2024-10-23 17:00:26'),
(11, 7, 0, '2024-10-23 17:00:28'),
(12, 7, 0, '2024-10-23 17:00:32'),
(13, 6, 0, '2024-10-23 17:00:34'),
(14, 7, 0, '2024-10-23 17:00:39'),
(15, 7, 0, '2024-10-23 17:00:40'),
(16, 7, 0, '2024-10-23 17:00:42'),
(17, 7, 0, '2024-10-23 17:00:44'),
(18, 6, 0, '2024-10-23 17:00:47'),
(19, 5, 0, '2024-10-23 17:00:49'),
(20, 4, 0, '2024-10-23 17:00:50'),
(21, 4, 0, '2024-10-23 17:00:52'),
(22, 5, 0, '2024-10-23 17:00:54'),
(23, 5, 0, '2024-10-23 17:01:01'),
(24, 6, 0, '2024-10-23 17:01:03'),
(25, 5, 0, '2024-10-23 17:01:06'),
(26, 4, 0, '2024-10-23 17:01:08'),
(27, 3, 0, '2024-10-23 17:01:10'),
(28, 3, 0, '2024-10-23 17:01:12'),
(29, 2, 0, '2024-10-23 17:01:14'),
(30, 4, 0, '2024-10-23 17:01:22'),
(31, 3, 0, '2024-10-23 17:01:24'),
(32, 2, 0, '2024-10-23 17:01:26'),
(33, 3, 0, '2024-10-23 17:01:27'),
(34, 3, 0, '2024-10-23 17:01:29'),
(35, 3, 0, '2024-10-23 17:01:31'),
(36, 4, 0, '2024-10-23 17:01:32'),
(37, 3, 0, '2024-10-23 17:01:34'),
(38, 3, 0, '2024-10-23 17:01:36'),
(39, 3, 0, '2024-10-23 17:01:38'),
(40, 3, 0, '2024-10-23 17:01:40'),
(41, 2, 0, '2024-10-23 17:01:42'),
(42, 2, 0, '2024-10-23 17:01:43'),
(43, 2, 0, '2024-10-23 17:01:45'),
(44, 3, 0, '2024-10-23 17:01:47'),
(45, 3, 0, '2024-10-23 17:01:49'),
(46, 5, 0, '2024-10-23 17:01:51'),
(47, 5, 0, '2024-10-23 17:01:52'),
(48, 4, 0, '2024-10-23 17:01:54'),
(49, 4, 0, '2024-10-23 17:01:56'),
(50, 4, 0, '2024-10-23 17:01:58'),
(51, 4, 0, '2024-10-23 17:02:00'),
(52, 5, 0, '2024-10-23 17:02:01'),
(53, 4, 0, '2024-10-23 17:02:03'),
(54, 4, 0, '2024-10-23 17:02:05'),
(55, 4, 0, '2024-10-23 17:02:07'),
(56, 4, 0, '2024-10-23 17:02:09'),
(57, 4, 0, '2024-10-23 17:02:11'),
(58, 3, 0, '2024-10-23 17:02:12'),
(59, 2, 0, '2024-10-23 17:02:14'),
(60, 2, 0, '2024-10-23 17:02:17'),
(61, 2, 0, '2024-10-23 17:02:19'),
(62, 2, 0, '2024-10-23 17:02:21'),
(63, 2, 0, '2024-10-23 17:02:23'),
(64, 2, 0, '2024-10-23 17:02:25'),
(65, 2, 0, '2024-10-23 17:02:27'),
(66, 3, 0, '2024-10-23 17:02:29'),
(67, 1, 0, '2024-10-23 17:02:31'),
(68, 1, 0, '2024-10-23 17:02:33'),
(69, 1, 0, '2024-10-23 17:02:37'),
(70, 1, 0, '2024-10-23 17:02:39'),
(71, 0, 0, '2024-10-23 17:05:26'),
(72, 0, 0, '2024-10-23 17:05:28'),
(73, 0, 0, '2024-10-23 17:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `patient_management`
--

CREATE TABLE `patient_management` (
  `id` int(11) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `room_number` varchar(5) NOT NULL,
  `date_of_birth` varchar(50) NOT NULL,
  `admit_date` varchar(255) NOT NULL,
  `admit_time` varchar(50) NOT NULL,
  `actions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_management`
--

INSERT INTO `patient_management` (`id`, `patient_name`, `room_number`, `date_of_birth`, `admit_date`, `admit_time`, `actions`) VALUES
(6, 'Maria Yvone Siobal', '0027', '2003/09/18', '2024/02/10', '11:17:00', ''),
(8, 'Perry Da Black Camp', '0003', '2024-10-12', '2024-10-04', '10:01:00', ''),
(9, 'Winter Mae', '0004', '2002/04/05', '2024/10/26', '08:25:32', ''),
(12, 'Casper Mcposa', '0089', '2003/02/10', '2024/10/27', '10:00:32', ''),
(13, 'King Tyrone', '0069', '2002/03/03', '2024/10/26', '08:25:32', ''),
(14, 'Meowchi', '0078', '2003/02/10', '2024/10/28', '10:00:32', ''),
(15, 'mcposa', '0005', '2003/02/10', '2024/10/25', '08:25:32', ''),
(17, 'Posang Mataba', '0004', '2024-10-28', '2024-10-28', '11:21pm', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doc_orders`
--
ALTER TABLE `doc_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iv_data`
--
ALTER TABLE `iv_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_management`
--
ALTER TABLE `patient_management`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doc_orders`
--
ALTER TABLE `doc_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iv_data`
--
ALTER TABLE `iv_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `patient_management`
--
ALTER TABLE `patient_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2024 at 09:44 PM
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
-- Table structure for table `discharge`
--

CREATE TABLE `discharge` (
  `id` int(10) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `iv_fluid` varchar(255) NOT NULL,
  `admission_date` date NOT NULL,
  `admission_time` varchar(255) NOT NULL,
  `discharge_date` varchar(255) NOT NULL,
  `discharge_time` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `ivf_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discharge`
--

INSERT INTO `discharge` (`id`, `patient_name`, `iv_fluid`, `admission_date`, `admission_time`, `discharge_date`, `discharge_time`, `ivf_no`) VALUES
(1, 'Edsel S. Nasol', 'Saline', '2024-11-10', '11:21pm', '2024-11-10', '11:23 PM', 1),
(3, 'Ramon G. Gemaguim', 'Saline', '2024-11-10', '11:22pm', '2024-11-10', '11:36 PM', 2);

-- --------------------------------------------------------

--
-- Table structure for table `doc_orders`
--

CREATE TABLE `doc_orders` (
  `id` int(11) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `room_number` varchar(10) NOT NULL,
  `iv_fluid_name` varchar(255) NOT NULL,
  `volume` int(10) NOT NULL,
  `flow_rate` int(10) NOT NULL,
  `incorp` varchar(255) NOT NULL,
  `ivf_no` varchar(255) NOT NULL,
  `date_started` varchar(255) NOT NULL,
  `time_started` varchar(255) NOT NULL DEFAULT '''current_timestamp()''',
  `date_consumed` varchar(255) NOT NULL,
  `time_consumed` varchar(255) NOT NULL,
  `nurse` varchar(255) NOT NULL,
  `device_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doc_orders`
--

INSERT INTO `doc_orders` (`id`, `patient_name`, `room_number`, `iv_fluid_name`, `volume`, `flow_rate`, `incorp`, `ivf_no`, `date_started`, `time_started`, `date_consumed`, `time_consumed`, `nurse`, `device_id`) VALUES
(1, 'Edsel S. Nasol', '0001', 'Saline', 1000, 100, '', '1', '2024-11-10', '11:21pm', '2024-11-10', '12:21pm', 'Nurse 1', ''),
(2, 'Ramon G. Gemaguim', '0002', 'Saline', 1000, 120, '', '2', '2024-11-10', '11:22pm', '2024-11-10', '2:00am', 'Nurse 2', ''),
(5, 'Edrian Salasalan', '0010', 'RX Saline', 1000, 100, '', '5', '2024-11-17', '10:50pm', '2024-11-20', '10:50pm', 'Jonathan Velasquez', 'null'),
(7, 'Juan Dela Cruz', '0006', 'Saline', 1000, 120, '', '5', '2024-11-17', '11:40 PM', '2024-11-30', '11:59 pm', 'Justin Bieber', 'pt0001');

-- --------------------------------------------------------

--
-- Table structure for table `iv_data`
--

CREATE TABLE `iv_data` (
  `device_id` varchar(50) NOT NULL,
  `liter` float NOT NULL,
  `percent` int(11) NOT NULL,
  `flow_rate_sensor` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `iv_data`
--

INSERT INTO `iv_data` (`device_id`, `liter`, `percent`, `flow_rate_sensor`, `time`) VALUES
('pt0001', 0, 0, 0, '2024-11-17 18:27:00'),
('pt0002', 0, 0, 0, '2024-11-17 17:25:24');

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
  `actions` varchar(255) NOT NULL,
  `device_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_management`
--

INSERT INTO `patient_management` (`id`, `patient_name`, `room_number`, `date_of_birth`, `admit_date`, `admit_time`, `actions`, `device_id`) VALUES
(45, 'Francis Nicholas P. Ramos', '0001', '2000/01/01', '2000/01/01', '5:58 pm', '', '0'),
(46, 'Edrian Salasalan', '0002', '2000/01/01', '2000/01/01', '5:58 pm', '', '0'),
(47, 'Edsel S. Nasol', '0003', '2000/01/01', '2000/01/01', '5:59 pm', '', '0'),
(48, 'Ramon G. Gemaguim', '0004', '2000/01/01', '2000/01/01', '5:59 pm', '', '0'),
(49, 'Juan Dela Cruz', '2000/', '2000/01/01', '2024/11/18', '2:40 am', '', '0'),
(68, 'Test Patient', '', '2003/02/10', '2024/10/25', '08:25 pm', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `liter` float NOT NULL,
  `percent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `liter`, `percent`) VALUES
(1, 'test1', 220, 20),
(2, 'test2', 330, 30),
(3, 'test3', 440, 40);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `token`, `expires_at`) VALUES
(1, 'admin', '$2y$10$QuexlpREzqCXegm.Xfc6MuSAQwleNMVwmpyHlGDnZc31HjVbmx1WG', 'ramosnicholas75@gmail.com', '215b2b0b8ec5600011cd0b9cd97f33b4b52a864d55b59bc2329ae274ea3922f6', '2024-11-17 13:59:03'),
(2, 'test', 'test', '', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `discharge`
--
ALTER TABLE `discharge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doc_orders`
--
ALTER TABLE `doc_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iv_data`
--
ALTER TABLE `iv_data`
  ADD PRIMARY KEY (`device_id`);

--
-- Indexes for table `patient_management`
--
ALTER TABLE `patient_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
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
-- AUTO_INCREMENT for table `discharge`
--
ALTER TABLE `discharge`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `doc_orders`
--
ALTER TABLE `doc_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patient_management`
--
ALTER TABLE `patient_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

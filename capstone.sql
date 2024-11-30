-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2024 at 08:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
  `ivf_no` int(10) NOT NULL,
  `nurse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discharge`
--

INSERT INTO `discharge` (`id`, `patient_name`, `iv_fluid`, `admission_date`, `admission_time`, `discharge_date`, `discharge_time`, `ivf_no`, `nurse`) VALUES
(19, 'Ramon G. Gemaguim', 'Saline', '2024-11-10', '11:22pm', '2024-11-24', '06:50 PM', 2, ''),
(20, 'Francis Nicholas P. Ramos', 'Saline', '2024-11-24', '10:13pm ', '2024-11-24', '10:15 PM', 1, ''),
(21, 'Megan Griffin', 'Dark Elixir', '2024-11-30', '7:26pm', '2024-11-30', '08:36 PM', 1, 'Peter Griffin'),
(22, 'Juan Dela Cruz', 'Saline', '2024-11-10', '11:21pm', '2024-11-30', '08:37 PM', 1, 'Sophia Nicole Macam'),
(23, 'Test', 'Dark Elixir', '2024-12-01', '10:34pm', '2024-12-01', '02:21 AM', 1, 'Justin Bieber');

-- --------------------------------------------------------

--
-- Table structure for table `doc_orders`
--

CREATE TABLE `doc_orders` (
  `id` int(11) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `diagnose` varchar(255) NOT NULL,
  `room_number` varchar(10) NOT NULL,
  `iv_fluid_name` varchar(255) NOT NULL,
  `volume` int(10) NOT NULL,
  `flow_rate` int(10) NOT NULL,
  `answer` varchar(4) NOT NULL,
  `drop_factor` varchar(5) NOT NULL,
  `minutes` varchar(10) NOT NULL,
  `drip_rate_answer` varchar(10) NOT NULL,
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

INSERT INTO `doc_orders` (`id`, `patient_name`, `diagnose`, `room_number`, `iv_fluid_name`, `volume`, `flow_rate`, `answer`, `drop_factor`, `minutes`, `drip_rate_answer`, `incorp`, `ivf_no`, `date_started`, `time_started`, `date_consumed`, `time_consumed`, `nurse`, `device_id`) VALUES
(56, 'Juan Dela Cruz', 'Dengue', '0001', 'Normal Saline', 1000, 8, '125', '20', '60', '41.67', '', '1', '2024-11-30', '8:43pm', '2024-11-30', '4:43am', 'Sophia Nicole Macam', 'pt0001');

-- --------------------------------------------------------

--
-- Table structure for table `iv_data`
--

CREATE TABLE `iv_data` (
  `device_id` varchar(50) NOT NULL,
  `liter` float NOT NULL,
  `percent` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `iv_data`
--

INSERT INTO `iv_data` (`device_id`, `liter`, `percent`, `time`) VALUES
('pt0001', 0, 0, '2024-11-30 18:22:35'),
('pt0002', 0, 0, '2024-11-17 17:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `iv_history`
--

CREATE TABLE `iv_history` (
  `id` int(11) NOT NULL,
  `device_id` varchar(255) NOT NULL,
  `liter` int(11) NOT NULL,
  `percent` int(11) NOT NULL,
  `recorded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(49, 'Juan Dela Cruz', '2000/', '2000/01/01', '2024/11/18', '2:40 am', '');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `patient_name` varchar(255) DEFAULT NULL,
  `diagnostic` varchar(255) DEFAULT NULL,
  `room_no` varchar(50) DEFAULT NULL,
  `device_id` varchar(50) DEFAULT NULL,
  `iv_fluid` varchar(255) DEFAULT NULL,
  `volume` int(11) DEFAULT NULL,
  `per_hour` int(11) DEFAULT NULL,
  `drop_factor` int(11) DEFAULT NULL,
  `per_minute` int(11) DEFAULT NULL,
  `incorporation` varchar(255) DEFAULT NULL,
  `ivf_no` int(11) DEFAULT NULL,
  `date_started` date DEFAULT NULL,
  `time_started` varchar(20) DEFAULT NULL,
  `date_to_consumed` date DEFAULT NULL,
  `time_to_consumed` varchar(20) DEFAULT NULL,
  `nurse_on_duty` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `patient_name`, `diagnostic`, `room_no`, `device_id`, `iv_fluid`, `volume`, `per_hour`, `drop_factor`, `per_minute`, `incorporation`, `ivf_no`, `date_started`, `time_started`, `date_to_consumed`, `time_to_consumed`, `nurse_on_duty`) VALUES
(15, 'Megan Griffin', 'Noy', '0002', 'pt0001', 'Dark Elixir', 1000, 8, 20, 60, '', 1, '2024-11-30', '7:26pm', '2024-11-30', '3:26am', 'Peter Griffin'),
(16, 'Megan Griffin', 'Noy', '0002', 'pt0001', 'Dark Elixir', 1000, 8, 20, 60, '', 1, '2024-11-30', '7:26pm', '2024-11-30', '3:26am', 'Peter Griffin'),
(17, 'Megan Griffin', 'Noy', '0002', 'pt0001', 'Dark Elixir', 1000, 8, 20, 60, '', 1, '2024-11-30', '7:26pm', '2024-11-30', '3:26am', 'Peter Griffin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `privilege` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `privilege`, `email`, `token`, `expires_at`) VALUES
(1, 'admin', '$2y$10$tI0fOIjB16IVJOEX0gU3ouOze8dxrp57R0/40qzWFsgcgNErmHdHK', 'admin', 'ramosnicholas75@gmail.com', '', NULL),
(22, 'user1', '$2y$10$lRyVVkQGtjbucjGGMoWOneyl1d26hPldmZyMXw9Cln4zUfbRNdEz.', 'user', 'user1@gmail.com', '', NULL),
(23, 'user2', '$2y$10$Qj0NYowRUwoYrEOskI1NNOWACohLSwHLUFqWD4uLj3N7hP0GW8Q82', 'user', 'user2@gmail.com', '', NULL);

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
-- Indexes for table `iv_history`
--
ALTER TABLE `iv_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `device_id` (`device_id`);

--
-- Indexes for table `patient_management`
--
ALTER TABLE `patient_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `doc_orders`
--
ALTER TABLE `doc_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `iv_history`
--
ALTER TABLE `iv_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_management`
--
ALTER TABLE `patient_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `iv_history`
--
ALTER TABLE `iv_history`
  ADD CONSTRAINT `iv_history_ibfk_1` FOREIGN KEY (`device_id`) REFERENCES `iv_data` (`device_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

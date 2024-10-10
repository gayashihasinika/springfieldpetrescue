-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2024 at 06:34 AM
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
-- Database: `sprinfieldpetrescue`
--

-- --------------------------------------------------------

--
-- Table structure for table `adopt`
--

CREATE TABLE `adopt` (
  `adopt_id` int(5) NOT NULL,
  `pet_id` int(5) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `district` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `is_confirmed` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adopt`
--

INSERT INTO `adopt` (`adopt_id`, `pet_id`, `full_name`, `district`, `city`, `phone_number`, `is_confirmed`) VALUES
(42, 32, 'Pubudu', 'Colombo', 'Maharagama', 763425142, 0),
(43, 31, 'Anjana', 'Gampaha', 'Gampaha', 78352152, 1),
(44, 33, 'Gayashi', 'Gampaha', 'gampaha', 788890412, 0),
(45, 32, 'Rashmika Nethupul', 'Gampaha', 'gampaha', 761343005, 0),
(46, 38, 'Gayashi', 'Gampaha', 'gampaha', 761343005, 1),
(47, 39, 'Anusha', 'Colombo', 'colombo', 788890412, 0),
(48, 40, 'Aruth Hettiarachchi', 'Colombo', 'colombo', 555569, 0),
(49, 32, 'Gayashi Hasinika', 'Gampaha', 'gampaha', 788890412, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `pet_id` int(5) NOT NULL,
  `user_name` varchar(12) NOT NULL,
  `name` varchar(12) NOT NULL,
  `pet_type` varchar(16) NOT NULL,
  `age` int(2) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `district` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `description` varchar(150) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_adopted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_name` varchar(12) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL,
  `is_admin` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_name`, `full_name`, `email`, `password`, `is_admin`) VALUES
('Gayashi', 'Gayashi Hasinika', 'gayashihasinika482@gmail.com', 'gayashi123', 0),
('kajanthas', 'Kajanthas', 'kajanthas@gmail.com', 'k', 0),
('oshini', 'Oshini', 'oshini@gmail.com', 'o', 0),
('pasindu', 'Pasindu', 'pasindu@gmail.com', 'p', 0),
('ranindu', 'Ranindu', 'ranindu@gmail.com', 'r', 1),
('Rashmika', 'Rashmika Nethupul', 'rashmikanethupul@gmail.com', 'rashmika123', 0),
('shyaman', 'Shyaman', 'shyaman@gmail.com', 's', 1),
('uoc', 'uoc', 'uoc@gmail.com', 'uoc', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adopt`
--
ALTER TABLE `adopt`
  ADD PRIMARY KEY (`adopt_id`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`pet_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adopt`
--
ALTER TABLE `adopt`
  MODIFY `adopt_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `pet_id` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

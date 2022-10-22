-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2022 at 09:42 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hor_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_record`
--

CREATE TABLE `book_record` (
  `id` int(11) NOT NULL,
  `user_id` varchar(120) NOT NULL,
  `first_name` varchar(120) NOT NULL,
  `last_name` varchar(120) NOT NULL,
  `room_code` varchar(120) NOT NULL,
  `room_name` varchar(120) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `payment_status` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_record`
--

INSERT INTO `book_record` (`id`, `user_id`, `first_name`, `last_name`, `room_code`, `room_name`, `check_in`, `check_out`, `payment_status`) VALUES
(1, '2', 'Aiken', 'Kimichi', 'R1', 'Luxury Room', '2022-10-13', '2022-10-06', 'Cancelled'),
(2, '2', 'Aiken', 'Kimichi', 'R2', 'The Redundant Room', '2022-10-04', '2022-10-20', 'Received'),
(4, '2', 'Aiken', 'Kimichi', 'R1', 'Luxury Room', '2022-10-19', '2022-10-20', 'Cancelled'),
(5, '2', 'Aiken', 'Kimichi', 'R4', 'Salas', '2022-10-20', '2022-10-21', 'Confirmed'),
(6, '2', 'Aiken', 'Kimichi', 'R3', 'Rooms', '2022-10-20', '2022-10-22', 'Received'),
(7, '2', 'Aiken', 'Kimichi', 'R1', 'Luxury Room', '2022-10-20', '2022-10-21', 'Confirmed'),
(8, '2', 'Aiken', 'Kimichi', 'R3', 'Rooms', '2022-10-19', '2022-10-20', 'Confirmed'),
(9, '7', 'Elcid', 'Mamanao', 'R1', 'Luxury Room', '2022-10-19', '2022-10-20', 'Confirmed'),
(10, '7', 'Elcid', 'Mamanao', 'R5', 'Test Room', '2022-10-11', '2022-10-21', 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `book_transaction`
--

CREATE TABLE `book_transaction` (
  `id` int(11) NOT NULL,
  `booking_id` varchar(11) NOT NULL,
  `room_code` varchar(120) NOT NULL,
  `room_price` varchar(120) NOT NULL,
  `bill` varchar(120) NOT NULL,
  `user_id` varchar(120) NOT NULL,
  `payment_method` varchar(120) NOT NULL,
  `transaction_status` varchar(120) NOT NULL,
  `days_of_stay` varchar(11) NOT NULL,
  `transaction_date` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_transaction`
--

INSERT INTO `book_transaction` (`id`, `booking_id`, `room_code`, `room_price`, `bill`, `user_id`, `payment_method`, `transaction_status`, `days_of_stay`, `transaction_date`) VALUES
(1, '2', 'R2', '1000', '2000', '2', 'Pay on arrival', 'Complete', '2', '2022-10-20'),
(2, '6', 'R3', '4000', '8000', '2', 'Pay on arrival', 'Complete', '2', '2022-10-20'),
(3, '5', 'R4', '2000', '2000', '2', 'Pay on arrival', 'Incomplete', '1', ''),
(4, '7', 'R1', '4000', '4000', '2', 'Pay on arrival', 'Incomplete', '1', ''),
(5, '8', 'R3', '4000', '4000', '2', 'Pay on arrival', 'Incomplete', '1', '2022-10-20'),
(6, '9', 'R1', '4000', '4000', '7', 'Pay on arrival', 'Complete', '1', '2022-10-21');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `daily` varchar(11) NOT NULL,
  `weekly` varchar(11) NOT NULL,
  `monthly` varchar(11) NOT NULL,
  `report_date` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `daily`, `weekly`, `monthly`, `report_date`) VALUES
(3, '0.00', '10,000.00', '10,000.00', '2022-10-21'),
(4, '4,000.00', '14,000.00', '14,000.00', '2022-10-21');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_code` varchar(128) NOT NULL,
  `room_name` varchar(128) NOT NULL,
  `room_type` varchar(128) NOT NULL,
  `room_availability` varchar(128) NOT NULL,
  `room_rate` varchar(128) NOT NULL,
  `room_size` varchar(128) NOT NULL,
  `room_description` varchar(900) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_code`, `room_name`, `room_type`, `room_availability`, `room_rate`, `room_size`, `room_description`) VALUES
(10, 'R1', 'Luxury Room', 'Single', 'Not Available', '4000', '50 sqr meter', 'Enjoy our elegant 50 m² guest rooms, designed in warm beige tones and tailored to the needs of private and business travelers alike. All rooms have a large marble bathroom, a double bed, air conditioning, an additional work area with free internet access and a walk-in closet. Our superior rooms impress with a wonderful view of the city and the adjacent park. Additional services: 24 hour room service, Bathrobe, slippers, Daily newspaper on request, Welcome gifts: Fruit basket, 1 bottle of mineral, waterCoffee and tea'),
(11, 'R2', 'The Redundant Room', 'Single', 'Available', '1000', '20 sqr meter', 'All our guestrooms are elegantly furnished with handmade furniture include luxury en-suite facilities with complimentary amenities pack, flat screen LCD TV, tea/coffee making facilities, fan, hairdryer and the finest pure white linen and towels.'),
(12, 'R3', 'Rooms', 'Quad', 'Not Available', '4000', '50 sqr meter', 'Test Description'),
(13, 'R4', 'Salas', 'Single', 'Available', '2000', '20 sqr meter', 'Salas namin'),
(14, 'R5', 'Test Room', 'Single', 'Available', '5000', '30sqr meter', 'Test Details');

-- --------------------------------------------------------

--
-- Table structure for table `room_image`
--

CREATE TABLE `room_image` (
  `id` int(11) NOT NULL,
  `room_code` varchar(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_image`
--

INSERT INTO `room_image` (`id`, `room_code`, `status`) VALUES
(4, 'R1', 0),
(5, 'R2', 0),
(6, 'R3', 0),
(7, 'R4', 0),
(8, 'R5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `contact_number` varchar(128) NOT NULL,
  `user_password` varchar(128) NOT NULL,
  `type` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `first_name`, `last_name`, `email`, `contact_number`, `user_password`, `type`) VALUES
(1, 'zreon', 'Zorenl Rkyle', 'Dayrit', 'zrodayrit@gmail.com', '09662631704', '$2y$10$HEksNxqXKjAEovLMgSee4e8FfVD6gw9riOlgzhgnH9Ev20UzCzclu', 'admin'),
(2, 'aiken', 'Aiken', 'Kimichi', 'aiken@gmail.com', '09790485723', '$2y$10$ANtCGCHjvgUgp3xTiQij/uv6FoV.llJUZXFNtEgo4YqaLO3umu52y', 'user'),
(6, 'zorenl', 'Zorenl', 'Dayrit', 'zorenl@gmail.com', '09662631704', '$2y$10$cNr23oNHPx7usvPVflCHMOfB6yq./SrEx2/.218zv/iFgwq30hEpK', 'user'),
(7, 'elcid', 'Elcid', 'Mamanao', 'elcid@gmail.com', '09895454444', '$2y$10$u4sIcRvEJtPuRd50Z46LEufjTWVo506KvfwDlmsZxei3gYJNMkT.m', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_record`
--
ALTER TABLE `book_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_transaction`
--
ALTER TABLE `book_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_image`
--
ALTER TABLE `room_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_record`
--
ALTER TABLE `book_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `book_transaction`
--
ALTER TABLE `book_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `room_image`
--
ALTER TABLE `room_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

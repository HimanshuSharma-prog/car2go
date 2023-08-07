-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 07, 2023 at 04:41 AM
-- Server version: 8.0.18
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car2go`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(100) NOT NULL,
  `emp_id` int(100) NOT NULL,
  `car_company` varchar(2000) COLLATE utf8mb4_general_ci NOT NULL,
  `car_name` varchar(2000) COLLATE utf8mb4_general_ci NOT NULL,
  `rent` int(100) NOT NULL,
  `sheating` int(100) NOT NULL,
  `image` varchar(2000) COLLATE utf8mb4_general_ci NOT NULL,
  `car_cat` varchar(2000) COLLATE utf8mb4_general_ci NOT NULL,
  `car_no` varchar(2000) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `emp_id`, `car_company`, `car_name`, `rent`, `sheating`, `image`, `car_cat`, `car_no`) VALUES
(1, 1, 'Tata', 'Nexon', 1200, 7, '609-front-left-side-47-(2).webp', 'suv', 'HR 35 N 0001'),
(2, 1, 'Hyundai', 'Verna', 1100, 5, '193-front-left-side-47-(3).webp', 'sedan', 'HR 35 N 0002'),
(3, 3, 'Mahindra', 'Thar', 1500, 7, '178-front-left-side-47-(1).webp', 'suv', 'HR 35 N 0003'),
(4, 3, 'Maruti', 'Baleno', 700, 5, '278-front-left-side-47-(5).webp', 'hatchback', 'HR 35 N 1231');

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `emp_id` int(100) NOT NULL,
  `emp_name` varchar(2000) COLLATE utf8mb4_general_ci NOT NULL,
  `emp_email` varchar(2000) COLLATE utf8mb4_general_ci NOT NULL,
  `emp_agency` varchar(2000) COLLATE utf8mb4_general_ci NOT NULL,
  `emp_pass` varchar(2000) COLLATE utf8mb4_general_ci NOT NULL,
  `emp_phone` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`emp_id`, `emp_name`, `emp_email`, `emp_agency`, `emp_pass`, `emp_phone`) VALUES
(1, 'test', 'test@gmail.com', 'test agency', 'e99a18c428cb38d5f260853678922e03', '12345689'),
(3, 'Himanshu Sharma', 'sharmahimanshu1611@gmail.com', 'Balaji Cars', 'e99a18c428cb38d5f260853678922e03', '8950960268');

-- --------------------------------------------------------

--
-- Table structure for table `rent_cars`
--

CREATE TABLE `rent_cars` (
  `rent_id` int(100) NOT NULL,
  `u_id` int(100) NOT NULL,
  `car_id` int(100) NOT NULL,
  `emp_id` int(100) NOT NULL,
  `car_name` varchar(2000) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(2000) COLLATE utf8mb4_general_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `rent` int(100) NOT NULL,
  `days` int(100) NOT NULL,
  `total_rent` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rent_cars`
--

INSERT INTO `rent_cars` (`rent_id`, `u_id`, `car_id`, `emp_id`, `car_name`, `image`, `start_date`, `end_date`, `rent`, `days`, `total_rent`) VALUES
(1, 3, 2, 1, 'Hyundai Verna', '650-front-left-side-47-(3).webp', '2023-08-08', '2023-08-22', 1000, 14, 14000),
(2, 3, 1, 1, 'Tata Nexon', '634-front-left-side-47-(2).webp', '2023-08-06', '2023-08-07', 1000, 1, 1000),
(3, 3, 1, 1, 'Tata Nexon', '634-front-left-side-47-(2).webp', '2023-08-09', '2023-08-10', 1000, 1, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(100) NOT NULL,
  `u_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `u_email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `u_phone` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `u_pass` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_email`, `u_phone`, `u_pass`) VALUES
(1, 'test', 'test@gmail.com', '1234567890', 'abc123'),
(2, 'test', 'test1@gmail.com', '123456789', '900150983cd24fb0d6963f7d28e17f72'),
(3, 'himanshu', 'himanshu@gmail.com', '1234567890', 'e99a18c428cb38d5f260853678922e03'),
(4, 'Himanshu Sharma', 'sharmahimanshu1611@gmail.com', '6361720268', 'e99a18c428cb38d5f260853678922e03'),
(5, 'himanshu sharma', 'sharma@gmail.com', '8950960268', 'a141c47927929bc2d1fb6d336a256df4'),
(6, 'test', 'test2@gmail.com', '284687264823', 'e99a18c428cb38d5f260853678922e03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `rent_cars`
--
ALTER TABLE `rent_cars`
  ADD PRIMARY KEY (`rent_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `emp`
--
ALTER TABLE `emp`
  MODIFY `emp_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rent_cars`
--
ALTER TABLE `rent_cars`
  MODIFY `rent_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

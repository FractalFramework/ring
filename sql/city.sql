-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2023 at 03:33 PM
-- Server version: 5.7.33
-- PHP Version: 8.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ring`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` bigint(20) NOT NULL,
  `country` varchar(64) NOT NULL,
  `city_label` varchar(64) NOT NULL,
  `CREATION_DATE` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `country`, `city_label`, `CREATION_DATE`) VALUES
(1, 'Iceland', 'Reykjavik', '2023-04-03 09:30:49'),
(2, 'Ireland', 'Dublin', '2023-04-03 09:30:49'),
(3, 'United Kingdom', 'London', '2023-04-03 09:30:49'),
(4, 'Norway', 'Oslo', '2023-04-03 09:30:49'),
(5, 'Sweden', 'Stockholm', '2023-04-03 09:30:49'),
(6, 'Finland', 'Helsinki', '2023-04-03 09:30:49'),
(7, 'Denmark', 'Copenhagen', '2023-04-03 09:30:49'),
(8, 'Portugal', 'Lisbon', '2023-04-03 09:30:49'),
(9, 'Spain', 'Madrid', '2023-04-03 09:30:49'),
(10, 'France', 'Paris', '2023-04-03 09:30:49'),
(11, 'Belgium', 'Brussels', '2023-04-03 09:30:49'),
(12, 'Netherlands', 'Amsterdam', '2023-04-03 09:30:49'),
(13, 'Germany', 'Berlin', '2023-04-03 09:30:49'),
(14, 'Switzerland', 'Bern', '2023-04-03 09:30:49'),
(16, 'Italy', 'Rome', '2023-04-03 09:30:49'),
(17, 'Greece', 'Athens', '2023-04-03 09:30:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2026 at 10:19 AM
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
-- Database: `doctor_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `specialization` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `specialization`, `location`) VALUES
(1, 'Dr. Raj', 'Cardiologist', 'Bangalore'),
(2, 'Dr. Meena', 'Dermatologist', 'Chennai'),
(3, 'Dr. John', 'Neurologist', 'Mumbai'),
(4, 'Dr. Raj', 'Cardiologist', 'Bangalore'),
(5, 'Dr. Meena', 'Dermatologist', 'Chennai'),
(6, 'Dr. John', 'Neurologist', 'Mumbai'),
(7, 'Dr. Raj', 'Cardiologist', 'Bangalore'),
(8, 'Dr. Meena', 'Dermatologist', 'Chennai'),
(9, 'Dr. John', 'Neurologist', 'Mumbai'),
(10, 'Dr. John', 'Cardiologist', 'Bangalore'),
(11, 'Dr. Meena', 'Dentist', 'Chennai'),
(12, 'Dr. Rahul', 'Neurologist', 'Delhi'),
(13, 'Dr. Priya', 'Dermatologist', 'Mumbai'),
(14, 'Dr. Arjun', 'Orthopedic', 'Hyderabad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2023 at 10:53 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `integrativesystem_attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `employeeID` varchar(255) NOT NULL,
  `employeeName` varchar(255) NOT NULL,
  `collegeDepartment` varchar(255) NOT NULL,
  `officeDepartment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `employeeID`, `employeeName`, `collegeDepartment`, `officeDepartment`) VALUES
(5, '23-19858-968', 'Dr. Stephen Anthony Strange', 'CEA', 'Marketing Department'),
(7, '23-89298-581', 'Dr. Dommy Mitchel Shelly', 'None', 'None'),
(13, '23-32954-118', 'Prof. Billie Joe Armstrong', 'CAS', 'Purchase Department'),
(15, '23-80098-230', 'Mr. Mark Angelo Rocreo Tangalin', 'CAS', 'Computer Service Department'),
(16, '23-15585-651', 'Eng. Michael Jan Rocreo Tangalin', 'None', 'Computer Service Department'),
(17, '23-28433-466', 'Eng. Anthony Edward Stark', 'CICS', 'Computer Service Department');

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendance`
--

CREATE TABLE `employee_attendance` (
  `id` int(11) NOT NULL,
  `employeeID` varchar(255) NOT NULL,
  `employeeName` varchar(255) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `TimeIn` varchar(255) DEFAULT NULL,
  `BreakIn` varchar(255) DEFAULT NULL,
  `BreakOut` varchar(255) DEFAULT NULL,
  `TimeOut` varchar(255) DEFAULT NULL,
  `TotalHours` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_attendance`
--

INSERT INTO `employee_attendance` (`id`, `employeeID`, `employeeName`, `Date`, `TimeIn`, `BreakIn`, `BreakOut`, `TimeOut`, `TotalHours`) VALUES
(15, '23-32954-118', 'Prof. Billie Joe Armstrong', '2023-04-24', '09:16:31 PM', '03:22:24 PM', '03:22:39 PM', '09:33:12 AM', '0 hr 4 mins'),
(25, '23-80098-230', 'Mr. Mark Angelo Rocreo Tangalin', '2023-04-25', '08:11:41 AM', '06:15:37 PM', '06:16:42 PM', '08:28:12 AM', '0 hr 10 mins'),
(29, '23-32954-118', 'Prof. Billie Joe Armstrong', '2023-04-25', '09:02:10 AM', '03:22:24 PM', '03:22:39 PM', '07:17:28 PM', '10 hr 13 mins'),
(30, '23-19858-968', 'Dr. Stephen Anthony Strange', '2023-04-25', '05:20:21 PM', '06:47:34 PM', '07:02:26 PM', '07:05:23 PM', '1 hr 35 mins'),
(31, '23-89298-581', 'Dr. Dommy Mitchel Shelly', '2023-04-25', '07:35:36 PM', '09:39:02 AM', '10:46:29 AM', '07:35:51 PM', '0 hr 0 mins'),
(32, '23-32954-118', 'Prof. Billie Joe Armstrong', '2023-05-02', '11:27:28 AM', '03:22:24 PM', '03:22:39 PM', '03:22:53 PM', '3 hr 55 mins'),
(33, '23-89298-581', 'Dr. Dommy Mitchel Shelly', '2023-05-04', '09:11:30 AM', '09:39:02 AM', '10:46:29 AM', '10:46:40 AM', '0 hr 27 mins'),
(34, '23-15585-651', 'Eng. Michael Jan Rocreo Tangalin', '2023-05-08', '08:35:41 PM', '01:36:08 PM', '01:36:13 PM', '08:39:50 PM', '0 hr 3 mins'),
(35, '23-15585-651', 'Eng. Michael Jan Rocreo Tangalin', '2023-05-16', '01:35:18 PM', '01:36:08 PM', '01:36:13 PM', '01:36:27 PM', '0 hr 1 mins'),
(36, '23-19858-968', 'Dr. Stephen Anthony Strange', '2023-05-16', '06:46:27 PM', '06:47:34 PM', '06:52:55 PM', '06:52:31 PM', '0 hr 1 mins'),
(37, '23-89298-581', 'Dr. Dommy Mitchel Shelly', '2023-05-16', '06:49:41 PM', '06:49:51 PM', '06:53:37 PM', '06:53:51 PM', '0 hr 0 mins'),
(38, '23-80098-230', 'Mr. Mark Angelo Rocreo Tangalin', '2023-05-16', '07:06:57 PM', '10:14:29 PM', '10:14:49 PM', '10:15:02 PM', '3 hr 7 mins'),
(39, '23-28433-466', 'Eng. Anthony Edward Stark', '2023-05-17', '07:25:15 AM', '09:38:01 AM', NULL, NULL, NULL),
(40, '23-28433-466', 'Eng. Anthony Edward Stark', '2023-05-18', '06:40:45 PM', '08:51:31 PM', '08:51:35 PM', '08:51:39 PM', '2 hr 10 mins');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

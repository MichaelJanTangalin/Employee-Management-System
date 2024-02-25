-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2023 at 10:51 AM
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
-- Database: `integrativesystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `currentemployment`
--

CREATE TABLE `currentemployment` (
  `id` int(11) NOT NULL,
  `employeeID` varchar(255) NOT NULL,
  `jobCategory` varchar(100) NOT NULL,
  `employmentStatus` varchar(50) NOT NULL,
  `collegeDepartment` varchar(255) NOT NULL,
  `officeDepartment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currentemployment`
--

INSERT INTO `currentemployment` (`id`, `employeeID`, `jobCategory`, `employmentStatus`, `collegeDepartment`, `officeDepartment`) VALUES
(33, '23-19858-968', 'Both', 'Full Time', 'CEA', 'Marketing Department'),
(42, '23-80098-230', 'Both', 'Full Time', 'CAS', 'Computer Service Department'),
(43, '23-28433-466', 'Both', 'Full Time', 'CICS', 'Computer Service Department'),
(47, '23-32954-118', 'Both', 'Full Time', 'CAS', 'Purchase Department'),
(50, '23-15585-651', 'Non-Teaching Personnel', 'Full Time', 'None', 'Computer Service Department'),
(52, '23-89298-581', 'Non-Teaching Personnel', 'Unemployed', 'None', 'None'),
(54, '23-80721-446', 'Both', 'Part Time', 'COA', 'Marketing Department'),
(55, '23-61360-345', 'Both', 'Full Time', 'COA', 'Operations Department');

-- --------------------------------------------------------

--
-- Table structure for table `emergencycontacts`
--

CREATE TABLE `emergencycontacts` (
  `id` int(11) NOT NULL,
  `employeeID` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emergencycontacts`
--

INSERT INTO `emergencycontacts` (`id`, `employeeID`, `name`, `relationship`, `address`, `contact`) VALUES
(45, '23-19858-968', 'Wong', 'Apprentice', '10880 Malibu Point', 2147483647),
(54, '23-80098-230', 'Chona R. Tangalin', 'Mother', '1301 Riverside Street Commonwealth QC', 2147483647),
(55, '23-28433-466', 'Jarvis', 'Butler', '10880 Malibu Point', 2147483647),
(59, '23-32954-118', 'Tre Cool', 'Bandmate', '1301 Riverside Street Commonwealth QC', 2147483647),
(62, '23-15585-651', 'Chona R. Tangalin', 'Mother', '1301 Riverside Street Commonwealth QC', 2147483647),
(64, '23-89298-581', 'Howard Stark', 'Father', '10880 Malibu Point', 2147483647),
(66, '23-80721-446', 'Dr. Christine Palmer', 'Mother', 'Etsvac Street', 2147483647),
(67, '23-61360-345', 'Dr. Christine Palmer', 'Mother', 'Etsvac Street', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeID` varchar(255) NOT NULL,
  `Salutation` char(5) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(150) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `gender` char(7) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `age` int(100) NOT NULL,
  `dateHired` date NOT NULL,
  `endOfContract` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeID`, `Salutation`, `firstName`, `middleName`, `lastName`, `gender`, `dateOfBirth`, `age`, `dateHired`, `endOfContract`) VALUES
('23-15585-651', 'Eng', 'Michael Jan', 'Rocreo', 'Tangalin', 'Male', '2000-01-20', 23, '2023-03-23', '2027-11-25'),
('23-19858-968', 'Dr', 'Stephen', 'Anthony', 'Strange', 'Male', '2000-01-20', 23, '2023-03-30', '2026-10-20'),
('23-28433-466', 'Eng', 'Anthony', 'Edward', 'Stark', 'Male', '1970-03-29', 52, '2023-03-29', '2027-10-28'),
('23-32954-118', 'Prof', 'Billie', 'Joe', 'Armstrong', 'Male', '1972-02-17', 51, '2023-03-29', '2023-03-29'),
('23-61360-345', 'Eng', 'Mary', 'Birch', 'DaVinci', 'Female', '1862-02-02', 161, '2023-05-24', '2023-10-26'),
('23-80098-230', 'Mr', 'Mark Angelo', 'Rocreo', 'Tangalin', 'Male', '2001-01-20', 22, '2023-03-29', '2027-11-29'),
('23-80721-446', 'Eng', 'Johnny', 'Jani', 'Yespapa', 'Male', '1965-01-20', 58, '2023-05-16', '2023-07-26'),
('23-89298-581', 'Dr', 'Dommy', 'Mitchel', 'Shelly', 'Female', '1990-01-20', 33, '2023-04-04', '2027-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `employeeaddress`
--

CREATE TABLE `employeeaddress` (
  `id` int(11) NOT NULL,
  `employeeID` varchar(255) NOT NULL,
  `houseNum` varchar(10) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `zip` varchar(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNumber` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeeaddress`
--

INSERT INTO `employeeaddress` (`id`, `employeeID`, `houseNum`, `street`, `city`, `barangay`, `province`, `zip`, `email`, `phoneNumber`) VALUES
(45, '23-19858-968', '1301', 'Riverside Street', 'QC', 'Payatas', 'NCR', '1121', 'drStrange@gmail.com', '0995590836'),
(54, '23-80098-230', '13', 'Riverside Street', 'Jebel Ali', 'Abu dhabi', 'Dubai', '1121', 'marcangelotangalin@yahoo.com', '0995590836'),
(55, '23-28433-466', '10880', 'Malibu Point', 'New York City', 'California', 'U.S.A', '90265', 'iamIronMan@gmail.com', '0995590836'),
(59, '23-32954-118', '1301', 'Riverside Street', 'QC', 'Commonwealth', 'U.S.A', '90265', 'Greenday@gmail.com', '0995590836'),
(62, '23-15585-651', '1301', 'Riverside Street', 'QC', 'Commonwealth', 'NCR', '1121', 'michael.tangalin@neu.edu.ph', '0995590836'),
(64, '23-89298-581', '1301', 'Birmingham Street', 'QC', 'Bagbag', 'Davoa', '2212', 'peakyBlunder@gmail.com', '0995590853'),
(66, '23-80721-446', '1401', 'Malibu Point', 'Ghost City', 'Ghost Town', 'Leyte', '2212', 'Johnny@gmail.com', '0995590836'),
(67, '23-61360-345', '1401', '1401 Riverside Street Commonwealth QC', 'QC', 'Commonwealth', 'Leyte', '2212', 'MaryMe@gmail.com', '0995590836');

-- --------------------------------------------------------

--
-- Table structure for table `employeedependents`
--

CREATE TABLE `employeedependents` (
  `id` int(11) NOT NULL,
  `employeeID` varchar(255) NOT NULL,
  `dependentName` varchar(255) NOT NULL,
  `dependentdateOfBirth` date NOT NULL,
  `dependentAddress` varchar(255) NOT NULL,
  `dependentRelationship` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeedependents`
--

INSERT INTO `employeedependents` (`id`, `employeeID`, `dependentName`, `dependentdateOfBirth`, `dependentAddress`, `dependentRelationship`) VALUES
(45, '23-19858-968', 'The Ancient One', '2000-02-01', '10880 Malibu Point', 'Master'),
(54, '23-80098-230', 'Eduardo P. Tangalin', '1956-01-20', 'Hong Kong', 'Father'),
(55, '23-28433-466', 'Howard Stark', '1975-01-20', '10880 Malibu Point', 'Father'),
(59, '23-32954-118', 'James Hetfield', '2000-02-01', '10880 Malibu Point', 'Bandmate'),
(62, '23-15585-651', 'Eduardo P. Tangalin', '1962-09-20', 'Hong Kong', 'Father'),
(64, '23-89298-581', 'The Ancient One', '1965-02-01', '10880 Malibu Point', 'Master'),
(66, '23-80721-446', 'Tre Cool', '2023-05-16', 'Etsvac Street', 'Brother'),
(67, '23-61360-345', 'Billie Tre Cook Legstrong', '2000-02-01', 'Malibu Point', 'Master');

-- --------------------------------------------------------

--
-- Table structure for table `employeefamily`
--

CREATE TABLE `employeefamily` (
  `id` int(11) NOT NULL,
  `employeeID` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeefamily`
--

INSERT INTO `employeefamily` (`id`, `employeeID`, `name`, `relationship`) VALUES
(62, '23-19858-968', 'Dr. Christine Palmer', 'Ex-Wife'),
(77, '23-80098-230', 'Michael Jan R. Tangalin', 'Brother'),
(78, '23-80098-230', 'Chona R. Tangalin', 'Mother'),
(79, '23-80098-230', 'Eduardo Tangalin', 'Father'),
(80, '23-28433-466', 'Howard Stark', 'Father'),
(81, '23-28433-466', 'Maria Stark', 'Mother'),
(82, '23-28433-466', 'Pepper Potts', 'Wife'),
(93, '23-15585-651', 'Chona R. Tangalin', 'Mother'),
(94, '23-15585-651', 'Eduardo P. Tangalin', 'Father'),
(95, '23-15585-651', 'Mark Angelo Tangalin', 'Brother'),
(98, '23-89298-581', 'Zionn Riley Ghost', 'Mistress'),
(99, '23-89298-581', 'William TwoWeeks', 'Brother in Knee'),
(102, '23-80721-446', 'Billie Tre Cook Legstrong', 'Father'),
(103, '23-61360-345', 'Leonardo DaVinci', 'Father');

-- --------------------------------------------------------

--
-- Table structure for table `personalinformation`
--

CREATE TABLE `personalinformation` (
  `id` int(11) NOT NULL,
  `employeeID` varchar(255) NOT NULL,
  `bloodType` char(5) NOT NULL,
  `civilStatus` varchar(20) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `placeOfBirth` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `sssID` varchar(10) NOT NULL,
  `tinID` varchar(12) NOT NULL,
  `philHealthID` varchar(12) NOT NULL,
  `pagIbigID` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personalinformation`
--

INSERT INTO `personalinformation` (`id`, `employeeID`, `bloodType`, `civilStatus`, `religion`, `placeOfBirth`, `nationality`, `sssID`, `tinID`, `philHealthID`, `pagIbigID`) VALUES
(45, '23-19858-968', 'A++', 'Divorced', 'Hinduism', 'New York', 'American', '2512568412', '121215458645', '121215458645', '121215458645'),
(54, '23-80098-230', 'B+', 'Single', 'Ortodox', 'Dubai, U.A.E', 'Filipino', '1212154586', '121215458645', '121215458645', '2512568412'),
(55, '23-28433-466', 'B+', 'Single', 'Catholic', 'Manhattan', 'American', '2512568412', '121215458645', '121215458645', '121215458645'),
(59, '23-32954-118', 'B+', 'Divorced', 'INC', 'New York', 'American', '2512568412', '231231231231', '121215458645', '121215458645'),
(62, '23-15585-651', 'B+', 'Single', 'INC', 'Dubai, U.A.E', 'Filipino', '1212154586', '121215458645', '121215458645', '121215458645'),
(64, '23-89298-581', 'B+', 'Seperated', 'N/A', 'Birmingham, Cavity Siety', 'Ingles', '1212154586', '121215458645', '121215458645', '121215458645'),
(66, '23-80721-446', 'B+', 'Single', 'Pastafarian', 'Batangas', 'Bisaya', '2512568412', '5323121254', '2512568412', '2512568412'),
(67, '23-61360-345', 'B+', 'Single', 'INC', 'New York', 'Ingles', '5323121254', '5323121254', '2512568412', '2512568412');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `employeeID` varchar(255) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `position` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `employeeID`, `firstName`, `middleName`, `lastName`, `gender`, `position`, `email`, `password`) VALUES
(1, '23-47019-562', 'Thomas', 'Michael', 'Shelby', 'Male', 'Admin', 'peaky.shoppers@mikey.corp.ph', '$2y$10$OTw1jFM/iDOTd6q2Eg5GseVFQcv6Jv6LdFJNhMwndbgk2cjXdQ0hq'),
(2, '23-85484-652', 'Simon', 'Ghost', 'Riley', 'Male', 'Admin', 'GhostBuster@gmail.com', '$2y$10$dIq0dP3gUq3xt1a0Vskiq.iQX9/0bCACacwGkRWYYEvfbXtS6XFGu'),
(3, '23-19858-968', 'Stephen', 'Anthony', 'Strange', 'Male', 'Employee', 'drStrange@gmail.com', '$2y$10$dIq0dP3gUq3xt1a0Vskiq.iQX9/0bCACacwGkRWYYEvfbXtS6XFGu'),
(4, '23-80098-230', 'Mark Angelo', 'Rocreo', 'Tangalin', 'Male', 'Employee', 'marcangelotangalin@yahoo.com', '$2y$10$dIq0dP3gUq3xt1a0Vskiq.iQX9/0bCACacwGkRWYYEvfbXtS6XFGu'),
(5, '23-28433-466', 'Anthony', 'Edward', 'Stark', 'Male', 'Employee', 'iamIronMan@gmail.com', '$2y$10$dIq0dP3gUq3xt1a0Vskiq.iQX9/0bCACacwGkRWYYEvfbXtS6XFGu'),
(6, '23-32954-118', 'Billie', 'Joe', 'Armstrong', 'Male', 'Employee', 'Greenday@gmail.com', '$2y$10$dIq0dP3gUq3xt1a0Vskiq.iQX9/0bCACacwGkRWYYEvfbXtS6XFGu'),
(7, '23-15585-651', 'Michael Jan', 'Rocreo', 'Tangalin', 'Male', 'Employee', 'michael.tangalin@neu.edu.ph', '$2y$10$1Hx/R/1KJRO27dtis7kHsO/GZXlnMum37S.3cnEekecYhhUT0SD7e'),
(8, '23-89298-581', 'Dommy', 'Mitchel', 'Shelly', 'Female', 'Employee', 'peakyBlunder@gmail.com', '$2y$10$dIq0dP3gUq3xt1a0Vskiq.iQX9/0bCACacwGkRWYYEvfbXtS6XFGu'),
(10, '23-11612-962', 'Billie Tre', 'Cook', 'Legstrong', 'Male', 'Admin', 'Multo@gmail.com', '$2y$10$G1yI9Lsh/87xCVzZNDIeIe/5dWOssLBOGhTmK7M0pjycAQL8KlqhC'),
(11, '23-80721-446', 'Johnny', 'Jani', 'Yespapa', 'Male', 'Employee', 'Johnny@gmail.com', '$2y$10$cdYvrl3PC9FMPiXIBnamVO1p4pJMxTVZa42WflrQZ.atWEQu0tcJC'),
(12, '23-61360-345', 'Mary', 'Birch', 'DaVinci', 'Female', 'Employee', 'MaryMe@gmail.com', '$2y$10$gDsUAwWMWDLPF51.5AsjUOJmZkKVFBZ2SPTCFgzjU.vOZub0FHoQK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `currentemployment`
--
ALTER TABLE `currentemployment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `emergencycontacts`
--
ALTER TABLE `emergencycontacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeID`);

--
-- Indexes for table `employeeaddress`
--
ALTER TABLE `employeeaddress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `employeedependents`
--
ALTER TABLE `employeedependents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `employeefamily`
--
ALTER TABLE `employeefamily`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `personalinformation`
--
ALTER TABLE `personalinformation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `currentemployment`
--
ALTER TABLE `currentemployment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `emergencycontacts`
--
ALTER TABLE `emergencycontacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `employeeaddress`
--
ALTER TABLE `employeeaddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `employeedependents`
--
ALTER TABLE `employeedependents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `employeefamily`
--
ALTER TABLE `employeefamily`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `personalinformation`
--
ALTER TABLE `personalinformation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `currentemployment`
--
ALTER TABLE `currentemployment`
  ADD CONSTRAINT `currentemployment_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emergencycontacts`
--
ALTER TABLE `emergencycontacts`
  ADD CONSTRAINT `emergencycontacts_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employeeaddress`
--
ALTER TABLE `employeeaddress`
  ADD CONSTRAINT `employeeaddress_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employeedependents`
--
ALTER TABLE `employeedependents`
  ADD CONSTRAINT `employeedependents_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employeefamily`
--
ALTER TABLE `employeefamily`
  ADD CONSTRAINT `employeefamily_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `personalinformation`
--
ALTER TABLE `personalinformation`
  ADD CONSTRAINT `personalinformation_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

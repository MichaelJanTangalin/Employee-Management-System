-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2023 at 10:52 AM
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
-- Database: `integrativesystem_archive`
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
(65, '23-14946-668', 'Teaching Personnel', 'Probationary', 'CAS', 'Marketing Department');

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
(75, '23-14946-668', 'Billie Tre Cook Legstrong', 'Butler', '1401 Riverside Street Commonwealth QC', 2147483647);

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
('23-14946-668', 'Prof', 'Dumm', 'Bitki', 'Custard', 'Male', '2000-02-02', 23, '2023-05-16', '2023-10-26');

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
(71, '23-14946-668', '1401', 'Etsvac Street', 'Ghost City', 'Ghost Town', 'Leyte', '2212', 'dombirch@gmail.com', '0995590836');

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
(78, '23-14946-668', 'Tre Cool', '2023-05-16', 'Hong Kong', 'Bandmate');

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
(91, '23-14946-668', 'Dr. Christine Palmer', 'Ex-Wife'),
(92, '23-14946-668', 'Zionn Riley Ghost', 'Girlfriend');

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
(62, '23-14946-668', 'A++', 'Married', 'Pastafarian', 'Leyte', 'Bisaya', '2512568412', '2512568412', '2512568412', '2512568412');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `currentemployment`
--
ALTER TABLE `currentemployment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `emergencycontacts`
--
ALTER TABLE `emergencycontacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `employeeaddress`
--
ALTER TABLE `employeeaddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `employeedependents`
--
ALTER TABLE `employeedependents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `employeefamily`
--
ALTER TABLE `employeefamily`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `personalinformation`
--
ALTER TABLE `personalinformation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

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

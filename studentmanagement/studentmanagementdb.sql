-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 04:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentmanagementdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `ID` int(11) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `File` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `final results`
--

CREATE TABLE `final results` (
  `ID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `TotalScore` double NOT NULL,
  `Comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `ID` int(11) NOT NULL,
  `Amount` decimal(10,0) NOT NULL,
  `Purpose` varchar(100) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `StudentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `ID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `SubjectID` int(11) NOT NULL,
  `Total Marks` double NOT NULL,
  `Obtained Marks` double NOT NULL,
  `Average` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studentss`
--

CREATE TABLE `studentss` (
  `studentid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `SubjectCode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `ID` int(11) NOT NULL,
  `SubjectID` int(11) NOT NULL,
  `Score` double NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `studentid` int(60) NOT NULL,
  `Name` varchar(60) DEFAULT NULL,
  `Age` varchar(3) DEFAULT NULL,
  `Grade` enum('Baby','Reception','1','2','3','4','5','6','7','8','9') DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Phone` varchar(13) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ConfirmPassword` varchar(100) DEFAULT NULL,
  `DateEnrolled` timestamp NOT NULL DEFAULT current_timestamp(),
  `Role` enum('Admin','Student','User','') NOT NULL DEFAULT 'Student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `studentid`, `Name`, `Age`, `Grade`, `Address`, `Phone`, `Email`, `Password`, `ConfirmPassword`, `DateEnrolled`, `Role`) VALUES
(18121243, 0, 'qwerty', '3', '1', 'rtghjk', '123456789', 'ertyuio@gmail.com', '$2y$10$hsk5M2H4ViiELmbx2ruLAO.TawGhfxlkURTZkpr3VrpeVktaFrdVO', '$2y$10$uHkWsnIdYXlSvwst.2D4LOQwzRSz/q3nxDMHx4XAqGNdVJtN1XbWm', '2023-11-15 14:39:16', 'Student'),
(18121244, 0, 'qwerty', '3', '1', 'rtghjk', '123456789', 'ertyuio@gmail.com', '$2y$10$EWrCNrFll1qGcsKHXW0ZBOUAzQqAjt6jwKcPAWKTwtXJXb36kfHUe', '$2y$10$ETDWRWNdvJaG7Z/rWwfEWe/o.NZZWPKbOH5uvQfUAeS93V4DGonWS', '2023-11-15 14:42:34', 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `final results`
--
ALTER TABLE `final results`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `StudentID` (`StudentID`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `SubjectID` (`SubjectID`);

--
-- Indexes for table `studentss`
--
ALTER TABLE `studentss`
  ADD PRIMARY KEY (`studentid`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `SubjectID` (`SubjectID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final results`
--
ALTER TABLE `final results`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studentss`
--
ALTER TABLE `studentss`
  MODIFY `studentid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18121245;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 12:43 AM
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
-- Database: `classchat_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `auditing_logs_employee`
--

CREATE TABLE `auditing_logs_employee` (
  `audit_id` int(11) NOT NULL,
  `employee_id` varchar(9) NOT NULL,
  `device_information` varchar(255) NOT NULL,
  `time_logged_in` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auditing_logs_employee`
--

INSERT INTO `auditing_logs_employee` (`audit_id`, `employee_id`, `device_information`, `time_logged_in`) VALUES
(1, '211-00234', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2023-12-17 14:57:35'),
(2, '211-00234', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2023-12-17 15:30:31'),
(3, '211-00234', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2023-12-17 15:31:28'),
(4, '211-00234', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2023-12-17 15:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `auditing_logs_student`
--

CREATE TABLE `auditing_logs_student` (
  `audit_id` int(11) NOT NULL,
  `student_id` varchar(9) NOT NULL,
  `device_information` varchar(255) NOT NULL,
  `time_logged_in` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auditing_logs_student`
--

INSERT INTO `auditing_logs_student` (`audit_id`, `student_id`, `device_information`, `time_logged_in`) VALUES
(20, '211-00234', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2023-12-17 14:37:21'),
(21, '211-00234', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2023-12-17 14:38:38'),
(22, '211-00234', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2023-12-17 15:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `employee_table`
--

CREATE TABLE `employee_table` (
  `Employee_number` varchar(10) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `verification_code` int(6) NOT NULL,
  `account_verified_at` datetime DEFAULT current_timestamp(),
  `active_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_table`
--

INSERT INTO `employee_table` (`Employee_number`, `Name`, `Email`, `Password`, `verification_code`, `account_verified_at`, `active_status`) VALUES
('211-00234', 'Cyrel Cabodbod', 'cyrel.cabodbod@carsu.edu.ph', '$2y$10$ahVjAnJCmlgGYvFJAayuUuwXecpbwgRgy/nz89zCqMSsNo1rGd092', 438764, '2023-12-12 01:12:11', 'offline');

-- --------------------------------------------------------

--
-- Table structure for table `student_table`
--

CREATE TABLE `student_table` (
  `ID_number` varchar(9) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `verification_code` int(6) NOT NULL,
  `account_verified_at` datetime DEFAULT current_timestamp(),
  `active_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_table`
--

INSERT INTO `student_table` (`ID_number`, `Name`, `Email`, `Password`, `verification_code`, `account_verified_at`, `active_status`) VALUES
('211-00234', 'Cyrel Cabodbod', 'cyrel.cabodbod@carsu.edu.ph', '$2y$10$xFclf7th1Y7KOkO5UIYRGeY1OzseSeTLYabIW9OnsxPxKuHcMkkRy', 647821, '2023-12-13 23:59:26', 'offline');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auditing_logs_employee`
--
ALTER TABLE `auditing_logs_employee`
  ADD PRIMARY KEY (`audit_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `auditing_logs_student`
--
ALTER TABLE `auditing_logs_student`
  ADD PRIMARY KEY (`audit_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `employee_table`
--
ALTER TABLE `employee_table`
  ADD PRIMARY KEY (`Employee_number`);

--
-- Indexes for table `student_table`
--
ALTER TABLE `student_table`
  ADD PRIMARY KEY (`ID_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auditing_logs_employee`
--
ALTER TABLE `auditing_logs_employee`
  MODIFY `audit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `auditing_logs_student`
--
ALTER TABLE `auditing_logs_student`
  MODIFY `audit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auditing_logs_employee`
--
ALTER TABLE `auditing_logs_employee`
  ADD CONSTRAINT `auditing_logs_employee_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee_table` (`Employee_number`);

--
-- Constraints for table `auditing_logs_student`
--
ALTER TABLE `auditing_logs_student`
  ADD CONSTRAINT `auditing_logs_student_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_table` (`ID_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

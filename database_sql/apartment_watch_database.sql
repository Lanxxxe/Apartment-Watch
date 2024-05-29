-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2024 at 09:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apartment_watch_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `building_table`
--

CREATE TABLE `building_table` (
  `Building_ID` varchar(50) NOT NULL,
  `Owner_ID` int(11) NOT NULL,
  `Building_Name` varchar(50) NOT NULL,
  `Building_Street_Address` varchar(70) DEFAULT NULL,
  `Building_City_Address` varchar(70) DEFAULT NULL,
  `Building_Status` varchar(30) NOT NULL,
  `Total_Rooms` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `building_table`
--

INSERT INTO `building_table` (`Building_ID`, `Owner_ID`, `Building_Name`, `Building_Street_Address`, `Building_City_Address`, `Building_Status`, `Total_Rooms`) VALUES
('1003_Biksoy', 1003, 'Biksoy', 'Softball Street', 'Tanauan City', 'Active', 10),
('1003_SoySoy', 1003, 'SoySoy', 'Volleyball Street', 'Samar', 'Operating', 3);

-- --------------------------------------------------------

--
-- Table structure for table `owner_acc_table`
--

CREATE TABLE `owner_acc_table` (
  `Account_ID` int(11) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Owner_Username` varchar(100) NOT NULL,
  `Owner_Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owner_acc_table`
--

INSERT INTO `owner_acc_table` (`Account_ID`, `Last_Name`, `First_Name`, `Owner_Username`, `Owner_Password`) VALUES
(1003, 'Decio', 'Eloisa', 'ella123', '123'),
(1004, 'Egloso', 'Alyssa', 'alyssa123', '123'),
(1006, 'Ladrera', 'Beverlie Jane', 'beverlie123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `Payment_ID` int(11) NOT NULL,
  `Payment_Status` text DEFAULT NULL,
  `Monthly_Payment` int(11) DEFAULT NULL,
  `Monthly_Due_Date` text DEFAULT NULL,
  `tenant_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`Payment_ID`, `Payment_Status`, `Monthly_Payment`, `Monthly_Due_Date`, `tenant_id`) VALUES
(103, 'Paid', 5000, '29th', 10007),
(104, 'Paid', 5000, '29th', NULL),
(105, 'Paid', 5000, '29th', NULL),
(106, 'Paid', 5000, '29th', NULL),
(107, 'Paid', 5000, '29th', NULL),
(108, 'Not Paid', 5000, '29th', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms_table`
--

CREATE TABLE `rooms_table` (
  `Room_ID` varchar(50) NOT NULL,
  `Tenant_ID` int(11) DEFAULT NULL,
  `Apartment_ID` varchar(60) DEFAULT NULL,
  `Room_Type` text DEFAULT NULL,
  `Room_Status` text DEFAULT 'Vacant' COMMENT 'Automatically set to Vacant if Tenant_ID is empty',
  `Rent_Amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms_table`
--

INSERT INTO `rooms_table` (`Room_ID`, `Tenant_ID`, `Apartment_ID`, `Room_Type`, `Room_Status`, `Rent_Amount`) VALUES
('10_Biksoy', NULL, '1003_Biksoy', 'Studio', 'Vacant', 5000),
('1_Biksoy', NULL, '1003_Biksoy', 'Studio', 'Vacant', 5000),
('1_SoySoy', NULL, '1003_SoySoy', 'Studio', 'Vacant', 5000),
('2_Biksoy', NULL, '1003_Biksoy', 'Studio', 'Vacant', 5000),
('2_SoySoy', 10007, '1003_SoySoy', 'Studio', 'Rented', 5000),
('3_Biksoy', NULL, '1003_Biksoy', 'Studio', 'Vacant', 5000),
('3_SoySoy', NULL, '1003_SoySoy', 'Studio', 'Vacant', 5000),
('4_Biksoy', NULL, '1003_Biksoy', 'Studio', 'Vacant', 5000),
('5_Biksoy', NULL, '1003_Biksoy', 'Studio', 'Vacant', 5000),
('6_Biksoy', NULL, '1003_Biksoy', 'Studio', 'Vacant', 5000),
('7_Biksoy', NULL, '1003_Biksoy', 'Studio', 'Vacant', 5000),
('8_Biksoy', NULL, '1003_Biksoy', 'Studio', 'Vacant', 5000),
('9_Biksoy', NULL, '1003_Biksoy', 'Studio', 'Vacant', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `tenants_table`
--

CREATE TABLE `tenants_table` (
  `Tenant_ID` int(11) NOT NULL,
  `Assigned_Room` varchar(50) DEFAULT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Contact_Number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenants_table`
--

INSERT INTO `tenants_table` (`Tenant_ID`, `Assigned_Room`, `First_Name`, `Last_Name`, `Contact_Number`) VALUES
(10007, '2_SoySoy', 'Decio', 'Alyssa', 91237123);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `building_table`
--
ALTER TABLE `building_table`
  ADD PRIMARY KEY (`Building_ID`),
  ADD KEY `fk_owner_id` (`Owner_ID`);

--
-- Indexes for table `owner_acc_table`
--
ALTER TABLE `owner_acc_table`
  ADD PRIMARY KEY (`Account_ID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`Payment_ID`),
  ADD KEY `fk_tenant_id` (`tenant_id`);

--
-- Indexes for table `rooms_table`
--
ALTER TABLE `rooms_table`
  ADD PRIMARY KEY (`Room_ID`),
  ADD KEY `Tenant_ID` (`Tenant_ID`),
  ADD KEY `fk_apartment_id` (`Apartment_ID`);

--
-- Indexes for table `tenants_table`
--
ALTER TABLE `tenants_table`
  ADD PRIMARY KEY (`Tenant_ID`),
  ADD KEY `fk_room_id` (`Assigned_Room`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `owner_acc_table`
--
ALTER TABLE `owner_acc_table`
  MODIFY `Account_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `Payment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `tenants_table`
--
ALTER TABLE `tenants_table`
  MODIFY `Tenant_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10013;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `building_table`
--
ALTER TABLE `building_table`
  ADD CONSTRAINT `fk_owner_id` FOREIGN KEY (`Owner_ID`) REFERENCES `owner_acc_table` (`Account_ID`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `fk_tenant_id` FOREIGN KEY (`tenant_id`) REFERENCES `tenants_table` (`Tenant_ID`) ON DELETE SET NULL;

--
-- Constraints for table `rooms_table`
--
ALTER TABLE `rooms_table`
  ADD CONSTRAINT `fk_apartment_id` FOREIGN KEY (`Apartment_ID`) REFERENCES `building_table` (`Building_ID`) ON DELETE CASCADE;

--
-- Constraints for table `tenants_table`
--
ALTER TABLE `tenants_table`
  ADD CONSTRAINT `fk_room_id` FOREIGN KEY (`Assigned_Room`) REFERENCES `rooms_table` (`Room_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

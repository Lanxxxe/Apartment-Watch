-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2024 at 04:31 PM
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
('B001', 1, 'Sunrise Apartments', '123 Main St', 'Springfield', 'Active', 20),
('B002', 2, 'Moonlight Condos', '456 Elm St', 'Greenville', 'Active', 30),
('B003', 3, 'Starlight Villas', '789 Oak St', 'Rivertown', 'Under Construction', 15),
('B004', 4, 'Sunset Towers', '101 Pine St', 'Lakeside', 'Active', 25),
('B005', 5, 'Riverfront Residences', '202 Maple St', 'Riverside', 'Renovation', 10);

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
(1, 'Smith', 'John', 'johnsmith', 'password123'),
(2, 'Doe', 'Jane', 'janedoe', 'password456'),
(3, 'Brown', 'James', 'jamesbrown', 'password789'),
(4, 'White', 'Emily', 'emilywhite', 'password101'),
(5, 'Johnson', 'Michael', 'michaeljohnson', 'password202'),
(1000, 'decio', 'eloisa', 'eloisa', 'eloisa123'),
(1001, 'kkj', 'lakjh', 'sampleUsername', 'password'),
(1002, 'Egloso', 'Alyssa', 'alyssa23', 'password');

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
(1, 'Paid', 500, '2024-05-01', 1),
(2, 'Unpaid', 800, '2024-05-01', 2),
(3, 'Paid', 1000, '2024-05-01', 3),
(4, 'Unpaid', 600, '2024-05-01', 4),
(5, 'Paid', 750, '2024-05-01', 5);

-- --------------------------------------------------------

--
-- Table structure for table `rooms_table`
--

CREATE TABLE `rooms_table` (
  `Room_ID` varchar(50) NOT NULL,
  `Tenant_ID` int(11) DEFAULT NULL,
  `Apartment_ID` varchar(60) DEFAULT NULL,
  `Room_Type` text DEFAULT NULL,
  `Room_Status` text DEFAULT NULL,
  `Rent_Amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms_table`
--

INSERT INTO `rooms_table` (`Room_ID`, `Tenant_ID`, `Apartment_ID`, `Room_Type`, `Room_Status`, `Rent_Amount`) VALUES
('R101', 1, 'B001', 'Studio', 'Occupied', 500),
('R102', 2, 'B002', 'One Bedroom', 'Vacant', 800),
('R103', 3, 'B003', 'Two Bedroom', 'Occupied', 1000),
('R104', 4, 'B004', 'Studio', 'Vacant', 600),
('R105', 5, 'B005', 'One Bedroom', 'Occupied', 750);

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
(1, 'R101', 'Alice', 'Johnson', 2147483647),
(2, 'R102', 'Bob', 'Smith', 2147483647),
(3, 'R103', 'Charlie', 'Brown', 2147483647),
(4, 'R104', 'David', 'White', 2147483647),
(5, 'R105', 'Eve', 'Black', 2147483647);

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
  MODIFY `Account_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `Payment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tenants_table`
--
ALTER TABLE `tenants_table`
  MODIFY `Tenant_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000;

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

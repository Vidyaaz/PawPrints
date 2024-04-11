-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2023 at 08:33 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petadoption`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Cid` int(11) NOT NULL,
  `Customer_Name` varchar(50) NOT NULL,
  `custno` varchar(10) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Cid`, `Customer_Name`, `custno`, `Address`, `Username`) VALUES
(1, 'Elvicia', '9036848029', 'Mangalore', 'Elvicia'),
(2, 'Vidya', '9986558320', 'Adyar', 'Vidya'),
(3, 'Shruti', '9036848029', 'Adyar', 'Shruti'),
(4, 'tanuh', '9036848029', 'kadri', 'tanuh'),
(5, 'sinchana', '9036848029', 'kadri', 'sinchan'),
(6, 'Kareena', '9986558320', 'london', 'Kareena');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Dept_id` int(11) NOT NULL,
  `D_Name` varchar(50) NOT NULL,
  `Mgr_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Dept_id`, `D_Name`, `Mgr_Name`) VALUES
(1, 'Dog', 'Susan'),
(2, 'Cat', 'Harry');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Emp_id` int(11) NOT NULL,
  `Emp_name` varchar(50) NOT NULL,
  `Dob` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Contact` varchar(10) NOT NULL,
  `Dept_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Emp_id`, `Emp_name`, `Dob`, `Address`, `Contact`, `Dept_Id`) VALUES
(1, 'Patrick', '1983-01-08', 'Pb 212, Devprayag, Ravi Indl Compd Pakhadi,khopat, Thane (west), Mumbai', '9045678967', 1),
(2, 'Susan', '1990-08-23', 'P68, D2-block, Midc., Chinchwad, Pune', '9113456782', 1),
(3, 'Ramesh', '1975-04-12', ' 3-5-1089/12, Opp Ymca, Narayanaguda, Hyderabad\r\n', '9067348989', 1),
(4, 'Shruti', '1973-12-17', ' Bharucha Rd., Opp Azam Dairy Farm, Near Rly Stati, Dahisar, Mumbai', '9134896752', 2),
(5, 'Harry', '1984-06-21', '302, R B Road, Hyderabad\r\n', '9246459782', 2),
(6, 'Nihal', '1968-10-16', '153, O K Road, Opp Basavaraja Market, Avenue Road, Bangalore', '9961657989', 2);

-- --------------------------------------------------------

--
-- Table structure for table `manages`
--

CREATE TABLE `manages` (
  `Did` int(11) NOT NULL,
  `Pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `Cid` int(11) NOT NULL,
  `Total_Price` int(11) NOT NULL,
  `Pid` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL DEFAULT 'In Progresss',
  `Date_Purchased` date NOT NULL DEFAULT current_timestamp(),
  `Date_Delivered` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `Cid`, `Total_Price`, `Pid`, `Status`, `Date_Purchased`, `Date_Delivered`) VALUES
(1, 1, 2000, 101, 'Completed', '2023-01-24', '2023-01-24'),
(2, 2, 1500, 10, 'Completed', '2023-01-24', '2023-01-25'),
(3, 3, 2000, 1, 'Completed', '2023-01-25', '2023-01-25'),
(4, 1, 2500, 102, 'In Progresss', '2023-01-25', NULL);

--
-- Triggers `order_details`
--
DELIMITER $$
CREATE TRIGGER `Update_details` AFTER INSERT ON `order_details` FOR EACH ROW UPDATE pet 
SET Status = 'bought'
where pid=New.pid
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `pid` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `breed` varchar(50) NOT NULL,
  `vaccination` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `depid` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `Status` varchar(50) NOT NULL DEFAULT 'Available',
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`pid`, `p_name`, `breed`, `vaccination`, `price`, `gender`, `depid`, `image`, `Status`, `cid`) VALUES
(1, 'Google', 'Pug', 'Yes', '2000', 'Male', 1, 'https://drive.google.com/uc?export=view&id=1-FBPeBmwHQKp_AwC5aWwIODDh-EF7OMg', 'Available', 0),
(2, 'Bruno', 'German Shepherd', 'Yes', '1500', 'Male', 1, 'https://drive.google.com/uc?export=view&id=1xoN19rOz5MhYlIs76IguZI7Ql3DkrFXR', 'Available', 0),
(3, 'Bella', 'Indian Spitz', 'Yes', '3000', 'Female', 1, 'https://drive.google.com/uc?export=view&id=1G1G6_d6D7OmwDJjaNyGnW0bTHnn6cXGG ', 'Available', 0),
(4, 'Luna', 'Husky', 'Yes', '2500', 'Female', 1, 'https://drive.google.com/uc?export=view&id=1sY7bsO9tau-RJpBe7VKTW3AHf7yDlrn_', 'Available', 0),
(5, 'Charlie', 'Labrador', 'Yes', '1200', 'Male', 1, 'https://drive.google.com/uc?export=view&id=1E_t84OtkRZ6gMhoIcV9PG_gW569vkk2W\r\n', 'Available', 0),
(6, 'Stella', 'Golden Retreiver', 'Yes', '2000', 'Female', 1, 'https://drive.google.com/uc?export=view&id=1uYVDjrROMBHm--j8yGqoZIYtAG2va0lF', 'Available', 0),
(7, 'Duke', 'Shih Tzu', 'Yes', '2500', 'Male', 1, 'https://drive.google.com/uc?export=view&id=1k-R0i7LDCUvDXmvH4Mc4BIgyco3NcXsh', 'Available', 0),
(8, 'Hazel', 'Spaniel', 'Yes', '1900', 'Female', 1, 'https://drive.google.com/uc?export=view&id=1WolHuWDqP0e9oghuvMNhD8Opw1swZifh', 'Available', 0),
(9, 'Leo', 'Chow Chow', 'Yes', '3800', 'Male', 1, 'https://drive.google.com/uc?export=view&id=179ArxVqAcp1aXsiidJODGd4hiGc_5pHr', 'Available', 0),
(10, 'Lola', 'Pomeranian', 'Yes', '1500', 'Female', 1, 'https://drive.google.com/uc?export=view&id=1A_X20wAmluAeiXTTuDEc8nAIyaORVwak', 'Available', 0),
(11, 'Cooper', 'Beagle', 'Yes', '1000', 'Male', 1, 'https://drive.google.com/uc?export=view&id=1df1DuXgOan8A1tdCTN1DT7Ydta4t85dF               ', 'Available', 0),
(12, 'Lulu', 'Pug', 'Yes', '1700', 'Female', 1, 'https://drive.google.com/uc?export=view&id=1t06pwIDTxw9BxP2Di_ww5iqd_oHQun7K', 'Available', 0),
(13, 'Oscar', 'Labrador', 'Yes', '1700', 'Male', 1, 'https://drive.google.com/uc?export=view&id=1f_BAidSoZaD3zDzk3pLeUr8AmAF9BWmr', 'Available', 0),
(14, 'Ginger', 'German Shepherd', 'Yes', '2000', 'Female', 1, 'https://drive.google.com/uc?export=view&id=1ND4WJsGTk9c8nT6OSK6400N1qsFZmzDN', 'Available', 0),
(15, 'Marshall', 'Golden Retreiver', 'Yes', '1700', 'Male', 1, 'https://drive.google.com/uc?export=view&id=1EKpd26UVz9_mxY-QZzUP_O2lBxVw_B1B', 'Available', 0),
(16, 'Mickey', 'Indian Pariah', 'Yes', '1000', 'Male', 1, 'https://drive.google.com/uc?export=view&id=1XsJwqJMDW-gD5e8tqWVhZfERsyo5RLrp', 'Available', 0),
(101, 'Lucy', 'Persian', 'Yes', '2000', 'Female', 2, 'https://drive.google.com/uc?export=view&id=1qHYrxffYsDlrlCM_chSn9nPJjb5an5tO', 'Available', 0),
(102, 'Simba', 'Bengal Cat', 'Yes', '2500', 'Male', 2, 'https://drive.google.com/uc?export=view&id=1OX3j8K7ZojWqy-B1LSluh5lKmpHvYbGG', 'Available', 0),
(103, 'Zoey', 'Ragdoll', 'Yes', '3000', 'Female', 2, 'https://drive.google.com/uc?export=view&id=1xJEvvy9IobHTw1T3Vc2Mhr7M9kDwqdI7', 'Available', 0),
(104, 'Milo', 'Burmese', 'Yes', '2600', 'Male', 2, 'https://drive.google.com/uc?export=view&id=1MJZJum_GFFJebOKjwpy0KHNfJ4pGAncW', 'Available', 0),
(105, 'Emma', 'European Shorthair', 'Yes', '1900', 'Female', 2, 'https://drive.google.com/uc?export=view&id=1qpWzJURl2g4mxaPUvX1q517cqLr2-JnO', 'Available', 0),
(106, 'Max', 'Siberian', 'Yes', '2400', 'Male', 2, 'https://drive.google.com/uc?export=view&id=1Kf-UowRJfPTcXDI0nVcb2S6VvVpVHfxq', 'Available', 0),
(107, 'Angel', 'Persian', 'Yes', '2000', 'Female', 2, 'https://drive.google.com/uc?export=view&id=1mKQ4SvRC-UspWy9-2hG9-F-kT4gBeVVv', 'Available', 0),
(108, 'Loki', 'Burmese', 'Yes', '3200', 'Male', 2, 'https://drive.google.com/uc?export=view&id=1q94pxmiQ1aE1kj7_Br4jVRmaMLxXQ_Mv', 'Available', 0),
(109, 'Theo', 'Vancat', 'Yes', '3500', 'Male', 2, 'https://drive.google.com/uc?export=view&id=1z8DMzT4mJnI6kGLVBWf_1kae8AyeGgx3', 'Available', 0),
(110, 'Tessa', 'Scottish', 'Yes', '1800', 'Female', 2, 'https://drive.google.com/uc?export=view&id=11rd3pKPxOpV1OSJdQnV239ygWsjvALZh', 'Available', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `username`, `password`) VALUES
(1, 'Elvicia', '12345678'),
(2, 'Vidya', '123456'),
(3, 'Shruti', '12345678'),
(4, 'tanu', '123456'),
(5, 'tanuh', 'tanuh@123'),
(6, 'sinchan', '123456'),
(7, 'hello', '123456'),
(8, 'alika', '123456'),
(9, 'Kareena', 'Kareena');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Cid`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Dept_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Emp_id`),
  ADD KEY `foreign_key_dept` (`Dept_Id`);

--
-- Indexes for table `manages`
--
ALTER TABLE `manages`
  ADD KEY `did_foreignkey` (`Did`),
  ADD KEY `pidd_foreignkey` (`Pid`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `Cid_foreignkey` (`Cid`),
  ADD KEY `pid_foreignkey` (`Pid`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `foreign_key_pet` (`depid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `Dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `foreign_key_dept` FOREIGN KEY (`Dept_Id`) REFERENCES `department` (`Dept_id`);

--
-- Constraints for table `manages`
--
ALTER TABLE `manages`
  ADD CONSTRAINT `pidd_foreignkey` FOREIGN KEY (`Pid`) REFERENCES `pet` (`pid`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `pid_foreignkey` FOREIGN KEY (`Pid`) REFERENCES `pet` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

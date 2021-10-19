-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2018 at 04:04 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bnb_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `capabilities`
--

CREATE TABLE `capabilities` (
  `capabilityID` int(11) NOT NULL,
  `capability_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `certuser`
--

CREATE TABLE `certuser` (
  `userID` int(11) NOT NULL,
  `displayName` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certuser`
--

INSERT INTO `certuser` (`userID`, `displayName`, `userName`, `password`) VALUES
(1, 'Eliot Pardo', 'eliot390', '1234'),
(2, 'Giovanni Munoz', 'gio123', '4321'),
(3, 'Timothy Pieschala', 'TimP', 'qwerty'),
(4, 'Vincent Quach', 'vince123', 'asdf'),
(5, 'Prof. Su', 'ProfSu', '987');

-- --------------------------------------------------------

--
-- Table structure for table `cimtuser`
--

CREATE TABLE `cimtuser` (
  `cimtID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `phone` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cimtuser`
--

INSERT INTO `cimtuser` (`cimtID`, `userID`, `phone`) VALUES
(2, 2, '818-222-3333'),
(3, 3, '310-202-2020');

-- --------------------------------------------------------

--
-- Table structure for table `cost_unit`
--

CREATE TABLE `cost_unit` (
  `cost_ID` int(11) NOT NULL,
  `cost_unit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cost_unit`
--

INSERT INTO `cost_unit` (`cost_ID`, `cost_unit`) VALUES
(1, 'each'),
(2, 'hour'),
(3, 'day');

-- --------------------------------------------------------

--
-- Table structure for table `incident`
--

CREATE TABLE `incident` (
  `category` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incident`
--

INSERT INTO `incident` (`category`, `description`) VALUES
(1, 'Must Evacuate, Secure Lockdown'),
(2, 'May Evacuate, Secure Lockdown'),
(3, 'No Evacuation, Limited Lockdown'),
(4, 'No Evacuation, No Lockdown');

-- --------------------------------------------------------

--
-- Table structure for table `new_incident`
--

CREATE TABLE `new_incident` (
  `incidentID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `category` int(11) NOT NULL,
  `date_of` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_incident`
--

INSERT INTO `new_incident` (`incidentID`, `userID`, `category`, `date_of`, `description`) VALUES
(1, 1, 1, '12/08/2018', 'Thanos is coming');

-- --------------------------------------------------------

--
-- Table structure for table `primaryfunction`
--

CREATE TABLE `primaryfunction` (
  `functionnumber` int(11) NOT NULL,
  `functionname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `primaryfunction`
--

INSERT INTO `primaryfunction` (`functionnumber`, `functionname`) VALUES
(1, 'Transportation'),
(2, 'Communications'),
(3, 'Engineering'),
(4, 'Search and Rescue'),
(5, 'Education'),
(6, 'Energy'),
(7, 'Firefighting'),
(8, 'Human Services');

-- --------------------------------------------------------

--
-- Table structure for table `resourceprovider`
--

CREATE TABLE `resourceprovider` (
  `resourceProviderID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resourceprovider`
--

INSERT INTO `resourceprovider` (`resourceProviderID`, `userID`, `address`) VALUES
(4, 4, '123 Pasadena ave.');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `resourceID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `resource_name` varchar(255) DEFAULT NULL,
  `primary_func` int(11) DEFAULT NULL,
  `secondary_func` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `distance` float(10,1) DEFAULT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  `cost_unit` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`resourceID`, `userID`, `resource_name`, `primary_func`, `secondary_func`, `description`, `distance`, `cost`, `cost_unit`) VALUES
(1, 1, 'fire truck', 7, 4, 'a fire truck', 1.0, '500.00', 'hour'),
(2, 1, 'ambulance', 8, 1, 'ambulance for hire', 0.2, '100.00', 'hour'),
(3, 3, 'fire truck helicopter', 7, 1, 'a flying fire truck', 12.3, '288.00', 'hour'),
(4, 5, 'emergency rations', 8, NULL, 'prepacked food boxes', 3.1, '12.75', 'each'),
(5, 5, 'prepaid cell phones', 2, NULL, 'phones for emergency use', 10.1, '25.00', 'each'),
(6, 2, 'first aid kits', 4, 8, 'medical supplies', 12.3, '12.75', 'each'),
(7, 2, 'gas generator', 3, 6, 'power generator fueled by gas', 10.0, '320.23', 'each'),
(8, 4, 'Lyft Service', 1, NULL, 'transportation for hire', 4.4, '5.00', 'each'),
(9, 4, 'CPR training', 5, 8, 'cpr class for hire', 9.0, '25.25', 'hour'),
(10, 1, 'cell phone batteries', 6, 2, 'extra batteries for cell phones', 0.2, '9.99', 'each'),
(11, 1, 'cimt website', 3, NULL, 'a really hard final project', 0.1, '1.00', 'each');

-- --------------------------------------------------------

--
-- Table structure for table `secondaryfunction`
--

CREATE TABLE `secondaryfunction` (
  `functionnumber` int(11) NOT NULL,
  `functionname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `secondaryfunction`
--

INSERT INTO `secondaryfunction` (`functionnumber`, `functionname`) VALUES
(1, 'Transportation'),
(2, 'Communications'),
(3, 'Engineering'),
(4, 'Search and Rescue'),
(5, 'Education'),
(6, 'Energy'),
(7, 'Firefighting'),
(8, 'Human Services');

-- --------------------------------------------------------

--
-- Table structure for table `sysadmin`
--

CREATE TABLE `sysadmin` (
  `adminID` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sysadmin`
--

INSERT INTO `sysadmin` (`adminID`, `email`, `userID`) VALUES
(1, 'eliot390@gmail.com', 1),
(2, 'profsu@gmail.com', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `capabilities`
--
ALTER TABLE `capabilities`
  ADD PRIMARY KEY (`capabilityID`);

--
-- Indexes for table `certuser`
--
ALTER TABLE `certuser`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `cimtuser`
--
ALTER TABLE `cimtuser`
  ADD PRIMARY KEY (`cimtID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `cost_unit`
--
ALTER TABLE `cost_unit`
  ADD PRIMARY KEY (`cost_ID`);

--
-- Indexes for table `incident`
--
ALTER TABLE `incident`
  ADD PRIMARY KEY (`category`);

--
-- Indexes for table `new_incident`
--
ALTER TABLE `new_incident`
  ADD PRIMARY KEY (`incidentID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `primaryfunction`
--
ALTER TABLE `primaryfunction`
  ADD PRIMARY KEY (`functionnumber`);

--
-- Indexes for table `resourceprovider`
--
ALTER TABLE `resourceprovider`
  ADD PRIMARY KEY (`resourceProviderID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`resourceID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `primary_func` (`primary_func`),
  ADD KEY `secondary_func` (`secondary_func`);

--
-- Indexes for table `secondaryfunction`
--
ALTER TABLE `secondaryfunction`
  ADD PRIMARY KEY (`functionnumber`);

--
-- Indexes for table `sysadmin`
--
ALTER TABLE `sysadmin`
  ADD PRIMARY KEY (`adminID`),
  ADD KEY `userID` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `capabilities`
--
ALTER TABLE `capabilities`
  MODIFY `capabilityID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certuser`
--
ALTER TABLE `certuser`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cost_unit`
--
ALTER TABLE `cost_unit`
  MODIFY `cost_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `new_incident`
--
ALTER TABLE `new_incident`
  MODIFY `incidentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `resourceprovider`
--
ALTER TABLE `resourceprovider`
  MODIFY `resourceProviderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `resourceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `secondaryfunction`
--
ALTER TABLE `secondaryfunction`
  MODIFY `functionnumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sysadmin`
--
ALTER TABLE `sysadmin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cimtuser`
--
ALTER TABLE `cimtuser`
  ADD CONSTRAINT `cimtuser_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `certuser` (`userID`);

--
-- Constraints for table `new_incident`
--
ALTER TABLE `new_incident`
  ADD CONSTRAINT `new_incident_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `certuser` (`userID`),
  ADD CONSTRAINT `new_incident_ibfk_2` FOREIGN KEY (`category`) REFERENCES `incident` (`category`);

--
-- Constraints for table `resourceprovider`
--
ALTER TABLE `resourceprovider`
  ADD CONSTRAINT `resourceprovider_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `certuser` (`userID`);

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `resources_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `certuser` (`userID`),
  ADD CONSTRAINT `resources_ibfk_2` FOREIGN KEY (`primary_func`) REFERENCES `primaryfunction` (`functionnumber`),
  ADD CONSTRAINT `resources_ibfk_3` FOREIGN KEY (`secondary_func`) REFERENCES `secondaryfunction` (`functionnumber`);

--
-- Constraints for table `sysadmin`
--
ALTER TABLE `sysadmin`
  ADD CONSTRAINT `sysadmin_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `certuser` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

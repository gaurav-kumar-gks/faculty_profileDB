-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 10, 2021 at 07:54 PM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faculty_profile_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty_profile_publications`
--

CREATE TABLE `faculty_profile_publications` (
  `sno` int NOT NULL,
  `fname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `roll` varchar(10) NOT NULL,
  `dept` text NOT NULL,
  `prog` varchar(30) DEFAULT NULL,
  `ptype` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `title` text,
  `authors` text,
  `publication` text,
  `publisher` text,
  `pdate` date DEFAULT NULL,
  `location` text,
  `pages` text,
  `onlineLink` text,
  `duration` smallint DEFAULT NULL,
  `impactFactor` text,
  `bookTitle` text,
  `bookType` text,
  `editedVolume` text,
  `eduPackageType` text,
  `eduPackageLevel` text,
  `patentNo` text,
  `projectBudget` int DEFAULT NULL,
  `projectSponser` text,
  `projectRole` text,
  `projectStatus` text,
  `lastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email` text,
  `aemail` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `faculty_profile_publications`
--

INSERT INTO `faculty_profile_publications` (`sno`, `fname`, `roll`, `dept`, `prog`, `ptype`, `title`, `authors`, `publication`, `publisher`, `pdate`, `location`, `pages`, `onlineLink`, `duration`, `impactFactor`, `bookTitle`, `bookType`, `editedVolume`, `eduPackageType`, `eduPackageLevel`, `patentNo`, `projectBudget`, `projectSponser`, `projectRole`, `projectStatus`, `email`, `aemail`) VALUES
(27, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'j', 'journal title 1', 'bansal, george, floyd', 'ieee', 'ieee', '2021-04-13', NULL, '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(28, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'j', 'travelling salesman problem', 'kumar, singh, kashyap', 'xfee', 'xfee', '2020-02-01', NULL, '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(31, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'c', 'ai conf', 'george, chris', NULL, 'ai conf', '2017-05-04', NULL, NULL, '', 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(34, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'c', 'ml', 'chris, george', NULL, 'ml', '2019-05-04', NULL, NULL, '', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(35, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'tb', 'algorithms', 'cormen, stein', NULL, 'mit press', '2004-06-04', NULL, NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(36, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'tb', 'data structures', 'narsimha', NULL, 'tmh', '2016-08-04', NULL, NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(38, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'bc', 'floyd warshall', 'narsimha', NULL, 'tmh', '2019-05-04', NULL, NULL, '', NULL, NULL, 'algorithms', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(39, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'bc', 'stack', 'cormen, stein, levi', NULL, 'mit', '2016-09-08', NULL, NULL, '', NULL, NULL, 'data structures and algorithms', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(40, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'ev', 'turtle and hare ', 'rahul, rohit, virat', NULL, 'ieee', '2016-11-05', NULL, NULL, '', NULL, NULL, NULL, NULL, 'cycle finding algo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(41, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'ev', 'slow and fast pointer', 'bairstow, roy, morgan', NULL, 'tmh', '2019-05-08', NULL, NULL, '', NULL, NULL, NULL, NULL, 'cycle finding algo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(43, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'ep', 'design principles', 'hardik', NULL, NULL, '2021-02-02', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'video', 'b.tech', NULL, NULL, NULL, NULL, NULL, 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(44, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'ep', 'clean code', 'pandya', NULL, NULL, '2009-08-04', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'book', 'b.tech', NULL, NULL, NULL, NULL, NULL, 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(47, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'ep', 'oops', 'pandya', NULL, NULL, '2018-08-05', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'video', 'b.tech', NULL, NULL, NULL, NULL, NULL, 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(48, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'opub', 'dsa', 'cormen, levi', NULL, 'mit ', '2019-08-05', NULL, NULL, '', NULL, NULL, NULL, 'book', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(49, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'opub', 'clean code', 'ashwin, chahal', NULL, 'tmh', '2016-09-05', NULL, NULL, '', NULL, NULL, NULL, 'book', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_profile_research`
--

CREATE TABLE `faculty_profile_research` (
  `sno` int NOT NULL,
  `fname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `roll` varchar(10) NOT NULL,
  `dept` text NOT NULL,
  `prog` varchar(30) DEFAULT NULL,
  `email` text,
  `aemail` text,
  `rtype` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `other` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `rpi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `rcopi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `rlevel` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `remarks` text,
  `funds` int DEFAULT NULL,
  `projectStatus` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `juri` text,
  `ref` text,
  `lastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `faculty_profile_research`
--

INSERT INTO `faculty_profile_research` (`sno`, `fname`, `roll`, `dept`, `prog`, `email`, `aemail`, `rtype`, `title`, `other`, `rpi`, `rcopi`, `rlevel`, `remarks`, `funds`, `projectStatus`, `juri`, `ref`, `pdate`) VALUES
(3, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com', 'orp', 'test pro', 'test spon', 'test p1', 'test cop1', NULL, NULL, 2, NULL, NULL, NULL, NULL),
(4, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com', 'orp', 'test pro1', 'test spon2', 'test p12', 'test cop13', NULL, NULL, 3, NULL, NULL, NULL, NULL),
(5, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com', 'ocp', 'test pro', 'test agen', 'test p12', 'test cop1', NULL, NULL, 23, NULL, NULL, NULL, NULL),
(7, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com', 'dw', 'test title2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com', 'dw', 'test title3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com', 'tt', 'tech1', 'client1', NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL),
(13, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com', 'tt', 'tech3', 'client2', NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL),
(15, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com', 'cpr', 'test ', 'test2', NULL, NULL, NULL, NULL, NULL, 'filed', 'indian', '1234', NULL),
(16, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com', 'cpr', 'test ', 'auth1, auth2', NULL, NULL, NULL, NULL, NULL, 'submitted', 'foreign', '4567', NULL),
(18, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com', 'pat', 'test2', NULL, NULL, NULL, NULL, NULL, NULL, 'filed', NULL, '1234', NULL),
(19, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com', 'rarea', 'dl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `Name` varchar(300) DEFAULT NULL,
  `Roll No` varchar(10) NOT NULL,
  `dob` date DEFAULT NULL,
  `prog` varchar(30) DEFAULT NULL,
  `department` text,
  `date_of_join` date DEFAULT NULL,
  `yjoin` varchar(5) DEFAULT NULL,
  `gender` varchar(1000) DEFAULT NULL,
  `email` text,
  `aemail` text,
  `contact` varchar(12) DEFAULT NULL,
  `marked` int NOT NULL,
  `added_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`Name`, `Roll No`, `dob`, `prog`, `department`, `date_of_join`, `yjoin`, `gender`, `email`, `aemail`, `contact`, `marked`) VALUES
('Gaurav Kumar', '1701CS21', '1999-01-20', 'BTech', 'CS', '2017-07-01', '2017', 'Male', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com', '9123294226', 1),
('Mayank Agarwal', '308', '1987-05-26', 'Faculty', 'CS', '2018-07-10', '2018', 'Male', 'mayank265@iitp.ac.in', 'mayank265@gmail.com', '9678336348', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty_profile_publications`
--
ALTER TABLE `faculty_profile_publications`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `faculty_profile_research`
--
ALTER TABLE `faculty_profile_research`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`Roll No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty_profile_publications`
--
ALTER TABLE `faculty_profile_publications`
  MODIFY `sno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `faculty_profile_research`
--
ALTER TABLE `faculty_profile_research`
  MODIFY `sno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

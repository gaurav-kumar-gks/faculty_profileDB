-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 05, 2021 at 03:29 PM
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
(1, 'Test User', '1701CS00', 'CS', 'B.Tech.', 'j', 'test journal title', 'author1, author2, author3', 'testpublication1', 'testpublisher1', '2020-04-01', NULL, NULL, 'journalonlinelink1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'testuser@iitp.ac.in', NULL),
(2, 'Test User', '1701CS00', 'CS', 'B.Tech.', 'c', 'conferenceTitle1', 'author1, author2, author3', 'xyz', 'xyz', '2020-04-01', 'testLocation', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Test User', '1701CS00', 'CS', 'B.Tech.', 'pr', 'projectTitle', 'author1, author2', NULL, NULL, NULL, NULL, NULL, NULL, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100000, 'govt', 'co-pi', 'ongoing', 'test@iitp.ac.in', NULL),
(4, 'Test User', '1701CS00', 'CS', 'B.Tech.', 'bc', 'algorithms', 'authors', '', 'tmh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'testUser', '1701CS00', 'CS', 'B.Tech.', 'p', 'patent title', 'authors', NULL, 'ieee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1024', NULL, NULL, NULL, NULL, 'test@iitp.ac.in', NULL);

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
('TestUser1', '2001CS00', '2020-11-20', 'BTech', 'CS', '2017-07-01', '2016', 'Male', 'test.cs17@iitp.ac.in', 'test.mail@gmail.com', '1234455890', 1),
('TestUser2', '308', '2020-11-26', 'Faculty', 'CS', '2018-07-10', '2016', 'Male', 'test2@iitp.ac.in', 'test.test@gmail.com', '4567349800', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty_profile_publications`
--
ALTER TABLE `faculty_profile_publications`
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
  MODIFY `sno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2021 at 11:33 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

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
-- Table structure for table `faculty_profile_activities`
--

CREATE TABLE `faculty_profile_activities` (
  `sno` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `roll` varchar(10) NOT NULL,
  `dept` text NOT NULL,
  `activityId` varchar(10) DEFAULT NULL,
  `activity` text,
  `activityDate` date DEFAULT NULL,
  `lastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_profile_activities`
--

INSERT INTO `faculty_profile_activities` (`sno`, `name`, `roll`, `dept`, `activityId`, `activity`, `activityDate`, `lastUpdated`) VALUES
(7, 'TestUser2', '308', 'CS', 'DA', 'Department Activity', '2021-03-04', '2021-05-06 11:18:40'),
(8, 'TestUser2', '308', 'CS', 'SA', 'Department', '2021-02-11', '2021-04-10 20:41:30'),
(9, 'TestUser2', '308', 'CS', 'OAA', 'Annual Immovable Property Returns Online2', '2017-01-10', '2021-04-10 20:38:39'),
(10, 'TestUser2', '308', 'CS', 'IA', 'Guest house food booking', '2021-01-06', '2021-04-10 20:37:03'),
(11, 'TestUser2', '308', 'CS', 'IA', 'PIC Automation', '2021-03-14', '2021-04-10 20:37:03'),
(12, 'TestUser2', '308', 'CS', 'PA', 'Professional Activity 1', '2021-03-30', '2021-04-10 20:40:25'),
(14, 'TestUser2', '308', 'CS', 'OAA', 'Annual Immovable Property Returns Online1', '2017-02-10', '2021-04-10 20:38:43'),
(15, 'TestUser2', '308', 'CS', 'AOI', 'Annual Immovable Property Returns Online2', '2021-04-06', '2021-04-10 20:31:59'),
(17, 'TestUser2', '308', 'CS', 'OAA', 'Annual Immovable Property Returns Online', '2021-03-10', '2021-04-10 20:38:43'),
(18, 'TestUser2', '308', 'CS', 'DA', 'Time Table Co-ordinator', '2021-03-13', '2021-05-06 11:18:40'),
(19, 'TestUser2', '308', 'CS', 'SA', 'Hello Sachin', '2021-03-10', '2021-04-10 20:41:30'),
(20, 'TestUser2', '308', 'CS', 'AOI', 'Annual Immovable Property Returns Online1', '2021-01-14', '2021-04-10 20:31:59'),
(21, 'TestUser2', '308', 'CS', 'PA', 'Professional Activity first', '2021-03-08', '2021-04-10 20:40:25'),
(22, 'Sriparna Saha', '9999', 'CS', 'OAA', '`IITP- Prithvi AI Research Collaboration\", by Prithvi AI (ongoing, 2021-2022)(PI)', '2020-03-20', '2021-05-13 08:52:15'),
(23, 'Sriparna Saha', '9999', 'CS', 'OAA', 'Sentiment, Emotion, Sarcasm and Hate Speech Detection\" by CDOT, New Delhi (ap- prox. 33 lakhs) (completed: 2019-2020)', '2020-01-14', '2021-05-13 08:53:33'),
(24, 'Sriparna Saha', '9999', 'CS', 'SA', 'Branch Councilor, IEEE student branch', '2020-08-14', '2021-05-13 09:33:16'),
(25, 'Sriparna Saha', '9999', 'CS', 'SA', 'Department Academic Program Committee Secretary', '2017-08-13', '2021-05-13 09:33:47'),
(26, 'Sriparna Saha', '9999', 'CS', 'IA', 'Associate Hostel warden of IIT Patna Girlsâ€™ Hostel', '2018-09-30', '2021-05-13 09:34:21'),
(27, 'Sriparna Saha', '9999', 'CS', 'IA', 'Center Supervisor of Indian Statistical Institute Selection Test', '2013-07-26', '2021-05-13 09:35:10'),
(28, 'Sriparna Saha', '9999', 'CS', 'IA', 'Guest house in-charge of IIT Patna', '2017-06-21', '2021-05-13 09:35:48'),
(29, 'Asif Iqbal', '1234', 'CS', 'IA', 'Associate Dean, R&D ', '2010-12-01', '2021-05-13 11:17:22'),
(30, 'Asif Iqbal', '1234', 'CS', 'IA', 'Institute PhD Coordinator', '2016-01-01', '2021-05-13 11:17:44'),
(31, 'Asif Iqbal', '1234', 'CS', 'IA', 'Coordinator (HoD), Department of Computer Science and Engineering', '2014-05-01', '2021-05-13 11:18:28');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_profile_activities_scw`
--

CREATE TABLE `faculty_profile_activities_scw` (
  `sno` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `roll` varchar(10) NOT NULL,
  `dept` text NOT NULL,
  `title` text,
  `place` text,
  `responsibility` text,
  `noOfParticipants` int(11) DEFAULT NULL,
  `activityDate` date DEFAULT NULL,
  `lastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_profile_activities_scw`
--

INSERT INTO `faculty_profile_activities_scw` (`sno`, `name`, `roll`, `dept`, `title`, `place`, `responsibility`, `noOfParticipants`, `activityDate`, `lastUpdated`) VALUES
(1, 'TestUser2', '308', 'CS', '3th International Conference on Data Science and Engineering (ICDSE 2017)', 'USA', 'Advisor', 55, '2017-10-10', '2021-04-09 20:52:35'),
(2, 'TestUser2', '308', 'CS', '4th International Conference on Data Science and Engineering (ICDSE 2018)', 'Italy', 'Faculty', 71, '2020-10-15', '2021-04-10 20:43:19'),
(3, 'TestUser2', '308', 'CS', '5th International Conference on Data Science and Engineering (ICDSE 2019)', 'IIT Patna', 'Co Convener', 80, '2021-02-14', '2021-04-10 20:43:19'),
(4, 'Sriparna Saha', '9999', 'CS', 'Unsupervised Data Mining: From Batch to Stream Mining Algorithms', 'IIT Patna', 'Organizer', 100, '2018-09-01', '2021-05-13 10:53:27'),
(5, 'Sriparna Saha', '9999', 'CS', 'Cognitive Science for Computational Linguists', 'IIT Patna', 'Organizer', 58, '2016-08-14', '2021-05-13 10:54:19');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_profile_activities_stc`
--

CREATE TABLE `faculty_profile_activities_stc` (
  `sno` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `roll` varchar(10) NOT NULL,
  `dept` text NOT NULL,
  `title` text,
  `duration` int(11) DEFAULT NULL,
  `noOfParticipants` int(11) DEFAULT NULL,
  `courseBudget` int(11) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `activityDate` date DEFAULT NULL,
  `lastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_profile_activities_stc`
--

INSERT INTO `faculty_profile_activities_stc` (`sno`, `name`, `roll`, `dept`, `title`, `duration`, `noOfParticipants`, `courseBudget`, `type`, `role`, `activityDate`, `lastUpdated`) VALUES
(1, 'TestUser2', '308', 'CS', '5th International Conference on Data Science and Engineering (ICDSE 2019)', 10, 120, 50000, 'QIP', 'Faculty', '2021-03-08', '2021-04-10 20:44:45'),
(2, 'TestUser2', '308', 'CS', 'Diploma in a Capital Market', 60, 50, 50000, 'Buisness', 'Faculty', '2020-09-23', '2021-04-10 20:44:45');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_profile_activities_va`
--

CREATE TABLE `faculty_profile_activities_va` (
  `sno` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `roll` varchar(10) NOT NULL,
  `dept` text NOT NULL,
  `placeOfVisit` text,
  `purpose` text,
  `duration` int(11) DEFAULT NULL,
  `activityDate` date DEFAULT NULL,
  `aastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_profile_activities_va`
--

INSERT INTO `faculty_profile_activities_va` (`sno`, `name`, `roll`, `dept`, `placeOfVisit`, `purpose`, `duration`, `activityDate`, `aastUpdated`) VALUES
(10, 'TestUser2', '308', 'CS', 'Patna', 'Nothing Imp', 5, '2021-02-23', '2021-04-10 20:45:49'),
(11, 'TestUser2', '308', 'CS', 'Italy', 'Conference Paper presentation', 3, '2019-06-01', '2021-04-10 20:45:49'),
(12, 'TestUser2', '308', 'CS', 'Bihta', 'sachin2', 6, '2021-02-18', '2021-04-10 20:45:45'),
(13, 'TestUser2', '308', 'CS', 'Bihta', 'visit', 5, '1950-08-05', '2021-04-10 20:45:42'),
(14, 'TestUser2', '308', 'CS', 'Haryana', 'Visit', 10, '1998-12-01', '2021-04-10 14:46:22'),
(15, 'Sriparna Saha', '9999', 'CS', 'University of Trento, Italy', ' Post Doctoral Research Fellow, Image Processing and Modeling, Interdisciplinary Center for Scientific Computing (IWR)', 5, '2013-03-22', '2021-05-13 09:57:38'),
(16, 'Sriparna Saha', '9999', 'CS', 'University of Trento, Italy', 'Postdoctoral research fellow in Department of Information Engineering and Computer Science', 90, '2020-09-22', '2021-05-13 09:58:18'),
(17, 'Asif Iqbal', '1234', 'CS', ' Human Language Technology Team of University of Caen Basse-Normandie, F-14032 Caen Cedex FRANCE', ' Post Doctoral Research Fellow, Image Processing and Modeling, Interdisciplinary Center for Scientific Computing (IWR)', 120, '2021-01-15', '2021-05-13 11:30:28'),
(18, 'Asif Iqbal', '1234', 'CS', 'University of Heidelberg, Germany', 'Post Doctoral Research Fellow', 60, '2020-06-25', '2021-05-13 11:25:09');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_profile_honours_a`
--

CREATE TABLE `faculty_profile_honours_a` (
  `sno` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `roll` varchar(10) NOT NULL,
  `dept` text NOT NULL,
  `nameOfAward` text,
  `year` int(11) DEFAULT NULL,
  `activityDate` date DEFAULT NULL,
  `lastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_profile_honours_a`
--

INSERT INTO `faculty_profile_honours_a` (`sno`, `name`, `roll`, `dept`, `nameOfAward`, `year`, `activityDate`, `lastUpdated`) VALUES
(1, 'TestUser2', '308', 'CS', 'India Science Award2', 2017, '2021-02-26', '2021-04-16 18:36:55'),
(2, 'TestUser2', '308', 'CS', 'India Science Award', 2018, '2021-02-05', '2021-04-16 18:36:55'),
(3, 'Gaurav Kumar', '1701CS21', 'CS', 'India Science Award', 2018, '2020-12-15', '2021-04-17 19:18:26'),
(4, 'Gaurav Kumar', '1701CS21', 'CS', 'India Science Award3', 2019, '2021-02-19', '2021-04-17 19:18:54'),
(5, 'Sriparna Saha', '9999', 'CS', 'Selected in the editorial board of IEEE Internet Computing magazine', 2020, '2020-10-22', '2021-05-13 08:42:41'),
(6, 'Sriparna Saha', '9999', 'CS', 'Granted Erasmus+ mobility grant to visit Dublin City University', 2019, '2019-01-18', '2021-05-13 08:43:13'),
(7, 'Sriparna Saha', '9999', 'CS', 'SERB WOMEN IN EXCELLENCE AWARD', 2018, '2021-05-27', '2021-05-13 08:43:35'),
(8, 'Sriparna Saha', '9999', 'CS', 'Best paper award in long paper category at Clinical Natural Language Processing Workshop (CLINICAL NLP) of COLING', 2016, '2021-05-18', '2021-05-13 08:44:00'),
(9, 'Asif Iqbal', '1234', 'CS', 'Young Faculty Research Fellowship', 2017, '2017-10-05', '2021-05-13 11:09:40'),
(10, 'Asif Iqbal', '1234', 'CS', 'Best Innovative Project Award', 2020, '2020-08-06', '2021-05-13 11:10:25');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_profile_honours_f`
--

CREATE TABLE `faculty_profile_honours_f` (
  `sno` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `roll` varchar(10) NOT NULL,
  `dept` text NOT NULL,
  `fellowshipTitle` text,
  `year` int(11) DEFAULT NULL,
  `activityDate` date DEFAULT NULL,
  `lastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_profile_honours_f`
--

INSERT INTO `faculty_profile_honours_f` (`sno`, `name`, `roll`, `dept`, `fellowshipTitle`, `year`, `activityDate`, `lastUpdated`) VALUES
(1, 'TestUser2', '308', 'CS', 'IEI Young Engineer Award', 2017, '2017-12-10', '2021-04-10 16:15:17'),
(2, 'TestUser2', '308', 'CS', 'NASI Scopus Young Scientists', 2021, '2021-02-10', '2021-05-09 11:04:30'),
(3, 'TestUser2', '308', 'CS', 'Early Career Research Award', 2021, '2021-03-18', '2021-05-09 11:04:30');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_profile_honours_fpb`
--

CREATE TABLE `faculty_profile_honours_fpb` (
  `sno` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `roll` varchar(10) NOT NULL,
  `dept` text NOT NULL,
  `nameOfTheBody` text,
  `yearAwarded` int(11) DEFAULT NULL,
  `activityDate` date DEFAULT NULL,
  `lastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_profile_honours_fpb`
--

INSERT INTO `faculty_profile_honours_fpb` (`sno`, `name`, `roll`, `dept`, `nameOfTheBody`, `yearAwarded`, `activityDate`, `lastUpdated`) VALUES
(3, 'TestUser2', '308', 'CS', 'Fellowship Professional Body', 2018, '2018-05-11', '2021-04-10 20:49:03'),
(4, 'TestUser2', '308', 'CS', 'New ', 2019, '2021-03-03', '2021-04-10 20:49:03');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_profile_honours_il`
--

CREATE TABLE `faculty_profile_honours_il` (
  `sno` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `roll` varchar(10) NOT NULL,
  `dept` text NOT NULL,
  `placeOfVisit` text,
  `lectureTitle` text,
  `duration` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `activityDate` date DEFAULT NULL,
  `lastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_profile_honours_il`
--

INSERT INTO `faculty_profile_honours_il` (`sno`, `name`, `roll`, `dept`, `placeOfVisit`, `lectureTitle`, `duration`, `year`, `activityDate`, `lastUpdated`) VALUES
(1, 'TestUser2', '308', 'CS', 'WBUT, WB', 'FDP on Cyber Forensics', 1, 2020, '2021-03-21', '2021-04-17 18:48:29'),
(2, 'TestUser2', '308', 'CS', 'IIT Kanpur', 'Nano Technology', 5, 2019, '2019-11-22', '2021-04-10 20:50:08'),
(3, 'Gaurav Kumar', '1701CS21', 'CS', 'IIT Kanpur', 'Nano Technology2', 10, 2017, '2021-02-17', '2021-04-17 18:50:59'),
(4, 'Gaurav Kumar', '1701CS21', 'CS', 'WBUT, WB', 'Nano Technology', 25, 2017, '2019-11-14', '2021-04-17 18:51:31'),
(5, 'Sriparna Saha', '9999', 'CS', 'Kyoto University, Japan', 'Multi-view Clustering Techniques', 1, 2018, '2018-07-04', '2021-05-13 09:41:38'),
(6, 'Sriparna Saha', '9999', 'CS', 'ABV-IIITM Gwalior', 'Machine Learning and Applications', 5, 2018, '2018-02-26', '2021-05-13 09:42:47'),
(7, 'Asif Iqbal', '1234', 'CS', 'College of Textile Technology, Berhampore Murshidabad', 'Tutorial on Sentiment Analysis, Faculty Development Program', 1, 2017, '2017-10-13', '2021-05-13 11:20:25'),
(8, 'Asif Iqbal', '1234', 'CS', 'Patna University', 'Tutorial on Â“Opinion Mining in Social Media Contents', 1, 2020, '2020-07-13', '2021-05-13 11:21:10'),
(9, 'Asif Iqbal', '1234', 'CS', 'Winter School, South Asian University, Delhi', 'Named Entity Recognition and Coreference ResolutionÂ” in Data and Text Analytics', 5, 2014, '2014-01-01', '2021-05-13 11:21:57');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_profile_honours_mebj`
--

CREATE TABLE `faculty_profile_honours_mebj` (
  `sno` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `roll` varchar(10) NOT NULL,
  `dept` text NOT NULL,
  `nameOfJournel` text,
  `nameOfPublisher` text,
  `positionHeld` text,
  `year` int(11) DEFAULT NULL,
  `activityDate` date DEFAULT NULL,
  `lastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_profile_honours_mebj`
--

INSERT INTO `faculty_profile_honours_mebj` (`sno`, `name`, `roll`, `dept`, `nameOfJournel`, `nameOfPublisher`, `positionHeld`, `year`, `activityDate`, `lastUpdated`) VALUES
(1, 'TestUser2', '308', 'CS', 'Journal of Educational Computing Research', 'Carmichael K', 'Chief Editor', 2020, '2020-12-22', '2021-04-10 20:51:28'),
(2, 'TestUser2', '308', 'CS', 'Journal of Educational Computing Research2', 'Mayank Aggarwal', 'Assistant Professor', 2019, '2019-08-06', '2021-04-10 20:51:28');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_profile_honours_mpb`
--

CREATE TABLE `faculty_profile_honours_mpb` (
  `sno` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `roll` varchar(10) NOT NULL,
  `dept` text NOT NULL,
  `nameOfTheBody` text,
  `membershipStatus` text,
  `yearAwarded` int(11) DEFAULT NULL,
  `activityDate` date DEFAULT NULL,
  `lastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_profile_honours_mpb`
--

INSERT INTO `faculty_profile_honours_mpb` (`sno`, `name`, `roll`, `dept`, `nameOfTheBody`, `membershipStatus`, `yearAwarded`, `activityDate`, `lastUpdated`) VALUES
(1, 'TestUser2', '308', 'CS', 'Fellowship Professional Body', 'Senior Member', 2018, '2018-07-05', '2021-04-10 20:52:28'),
(2, 'TestUser2', '308', 'CS', 'Name of the Body', 'Assosciate Member', 2019, '2021-02-24', '2021-04-10 20:52:28'),
(3, 'Sriparna Saha', '9999', 'CS', 'Institute of Electrical and Electronics Engineers (IEEE),', 'Senior Member', 2020, '2020-07-16', '2021-05-13 08:46:07'),
(4, 'Sriparna Saha', '9999', 'CS', 'Indian Unit for Pattern Recognition and Artificial Intelligence (IUPRAI)', 'Life membership (no. L-177) ', 2019, '2019-06-13', '2021-05-13 08:46:42'),
(5, 'Sriparna Saha', '9999', 'CS', 'The Association of Computer, Electronics and Electrical Engineers (ACEEE), Membership id: 7000077', 'Member', 2019, '2019-11-25', '2021-05-13 08:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_profile_publications`
--

CREATE TABLE `faculty_profile_publications` (
  `sno` int(11) NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `roll` varchar(10) NOT NULL,
  `dept` text NOT NULL,
  `prog` varchar(30) DEFAULT NULL,
  `ptype` varchar(5) NOT NULL,
  `title` text,
  `authors` text,
  `publication` text,
  `publisher` text,
  `pdate` date DEFAULT NULL,
  `location` text,
  `pages` text,
  `onlineLink` text,
  `duration` smallint(6) DEFAULT NULL,
  `impactFactor` text,
  `bookTitle` text,
  `bookType` text,
  `editedVolume` text,
  `eduPackageType` text,
  `eduPackageLevel` text,
  `patentNo` text,
  `projectBudget` int(11) DEFAULT NULL,
  `projectSponser` text,
  `projectRole` text,
  `projectStatus` text,
  `lastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email` text,
  `aemail` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty_profile_publications`
--

INSERT INTO `faculty_profile_publications` (`sno`, `fname`, `roll`, `dept`, `prog`, `ptype`, `title`, `authors`, `publication`, `publisher`, `pdate`, `location`, `pages`, `onlineLink`, `duration`, `impactFactor`, `bookTitle`, `bookType`, `editedVolume`, `eduPackageType`, `eduPackageLevel`, `patentNo`, `projectBudget`, `projectSponser`, `projectRole`, `projectStatus`, `lastUpdated`, `email`, `aemail`) VALUES
(1, 'Test User', '1701CS00', 'CS', 'B.Tech.', 'j', 'test journal title', 'author1, author2, author3', 'testpublication1', 'testpublisher1', '2020-04-01', NULL, NULL, 'journalonlinelink1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-07 20:28:06', 'testuser@iitp.ac.in', NULL),
(2, 'Test User', '1701CS00', 'CS', 'B.Tech.', 'c', 'conferenceTitle1', 'author1, author2, author3', 'xyz', 'xyz', '2020-04-01', 'testLocation', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-07 20:28:06', NULL, NULL),
(3, 'Test User', '1701CS00', 'CS', 'B.Tech.', 'pr', 'projectTitle', 'author1, author2', NULL, NULL, NULL, NULL, NULL, NULL, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100000, 'govt', 'co-pi', 'ongoing', '2021-02-07 20:28:06', 'test@iitp.ac.in', NULL),
(4, 'Test User', '1701CS00', 'CS', 'B.Tech.', 'bc', 'algorithms', 'authors', '', 'tmh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-07 20:28:06', NULL, NULL),
(5, 'testUser', '1701CS00', 'CS', 'B.Tech.', 'p', 'patent title', 'authors', NULL, 'ieee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1024', NULL, NULL, NULL, NULL, '2021-02-07 20:28:06', 'test@iitp.ac.in', NULL),
(27, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'j', 'travelling salesman problem', 'kumar, singh, kashyap', 'xfee', 'xfee', '2020-02-01', NULL, '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-10 20:54:46', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(28, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'j', 'journal title 3', 'bansal, george, floyd', 'ieee', 'ieee', '2021-04-13', NULL, '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-09 03:24:15', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(31, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'c', 'ml', 'chris, george', NULL, 'ml', '2019-05-04', NULL, NULL, '', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-10 21:07:00', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(34, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'c', 'Deep Learning', 'Sachin Pandey', NULL, 'AIEEE', '2021-03-17', NULL, NULL, '', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-10 15:58:33', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(35, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'tb', 'algorithms', 'cormen, stein', NULL, 'mit press', '2015-06-04', NULL, NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-10 16:08:37', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(36, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'tb', 'data structures', 'narsimha', NULL, 'tmh', '2016-08-04', NULL, NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-10 21:14:40', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(38, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'bc', 'floyd warshall', 'narsimha', NULL, 'tmh', '2019-05-04', NULL, NULL, '', NULL, NULL, 'algorithms', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-10 21:18:25', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(39, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'bc', 'stack', 'cormen, stein, levi', NULL, 'mit', '2016-09-08', NULL, NULL, '', NULL, NULL, 'data structures and algorithms', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-10 21:18:25', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(40, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'ev', 'slow and fast pointer', 'bairstow, roy, morgan', NULL, 'tmh', '2019-05-08', NULL, NULL, '', NULL, NULL, NULL, NULL, 'cycle finding algo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-10 21:20:59', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(41, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'ev', 'Title of Paper', 'Sachin Pandey', NULL, 'Sachin', '2021-04-15', NULL, NULL, '', NULL, NULL, NULL, NULL, 'Title of Edited Volume', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-10 21:22:57', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(43, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'ep', 'clean code', 'pandya', NULL, NULL, '2009-08-04', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'book', 'b.tech', NULL, NULL, NULL, NULL, NULL, '2021-04-10 21:28:04', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(44, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'ep', 'oops', 'pandya', NULL, NULL, '2018-08-05', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'video', 'b.tech', NULL, NULL, NULL, NULL, NULL, '2021-04-10 21:28:07', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(47, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'ep', 'Educational Package title', 'Authors', NULL, NULL, '2021-04-14', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', 'Educational Package Level', NULL, NULL, NULL, NULL, NULL, '2021-04-10 21:28:10', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(48, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'opub', 'dsa', 'cormen, levi', NULL, 'mit ', '2019-08-05', NULL, NULL, '', NULL, NULL, NULL, 'book', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-10 21:31:21', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(49, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'opub', 'clean code', 'ashwin, chahal', NULL, 'tmh', '2016-09-05', NULL, NULL, '', NULL, NULL, NULL, 'book', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-10 21:31:20', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(51, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'c', 'ml', 'george, chris', NULL, 'ai conf', '2017-05-04', NULL, NULL, '', 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-10 15:59:02', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(52, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'ev', 'turtle and hare ', 'rahul, rohit, virat', NULL, 'ieee', '2016-11-05', NULL, NULL, '', NULL, NULL, NULL, NULL, 'cycle finding algo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-10 21:22:57', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(53, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'ep', 'design principles', 'hardik', NULL, NULL, '2021-02-02', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'video', 'b.tech', NULL, NULL, NULL, NULL, NULL, '2021-04-10 21:28:10', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(54, 'TestUser2', '308', 'CS', 'Faculty', 'tb', 'data structures', 'narsimha2', NULL, 'tmh1', '2016-08-04', NULL, NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-10 09:51:22', 'test2@iitp.ac.in', 'test.test@gmail.com'),
(64, 'Sourav Dandapat', '9990', 'CS', 'Faculty', 'j', 'Understanding the Impact of Geographical Distance on Online Discussions', 'Rimjhim, Nikhil Cheke, Joydeep Chandra, Sourav Dandapat', 'IEEE Transactions on Computational Social Systems', 'IEEE', '2020-05-28', NULL, '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-20 08:50:46', 'skd@iitp.ac.in', ''),
(65, 'Sourav Dandapat', '9990', 'CS', 'Faculty', 'j', 'Mirroring Hierarchical Attention in Adversary for Crisis Task Identification: COVID-19, Hurricane Irma', 'Shalini Priya, Manish Bhanu, Sourav Kumar Dandapat and Joydeep Chandra', ' ISCRAM', ' ISCRAM', '2021-04-01', NULL, '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-20 08:52:20', 'skd@iitp.ac.in', ''),
(66, 'Sourav Dandapat', '9990', 'CS', 'Faculty', 'j', 'Smart association control in wireless mobile environment using max-flow', 'Sourav Kumar Dandapat, Bivas Mitra, Romit Roy Choudhury, Niloy Ganguly', 'IEEE Transactions on Network and Service Management', 'IEEE', '2012-12-02', NULL, '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-20 08:56:21', 'skd@iitp.ac.in', ''),
(67, 'Mayank Agarwal', '308', 'CS', 'Faculty', 'c', 'ai conference', 'Mayank Aggarwal', NULL, '3rd IEEE International Conference on Industrial and Information Systems', '2020-12-18', NULL, NULL, 'ieee.ac.in', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-10 16:01:10', 'mayank265@iitp.ac.in', 'mayank265@gmail.com'),
(68, 'Mayank Agarwal', '308', 'CS', 'Faculty', 'tb', 'Discrete Mathematics', 'JJ Thomson', NULL, 'mit press', '2015-06-04', NULL, NULL, 'mit.org', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-10 16:11:33', 'mayank265@iitp.ac.in', 'mayank265@gmail.com'),
(69, 'Mayank Agarwal', '308', 'CS', 'Faculty', 'bc', 'stack', 'cormen, stein, levi', NULL, 'mit', '2016-09-08', NULL, NULL, '', NULL, NULL, 'data structures and algorithms', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-10 16:14:17', 'mayank265@iitp.ac.in', 'mayank265@gmail.com'),
(70, 'Mayank Agarwal', '308', 'CS', 'Faculty', 'bc', 'Neural Networks in Deep Learning', 'Mayank Aggarwal and Joydeep Chandra', NULL, 'Stanford', '2021-02-11', NULL, NULL, '', NULL, NULL, 'Deep Neural Networks', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-10 16:16:31', 'mayank265@iitp.ac.in', 'mayank265@gmail.com'),
(71, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'j', 'travelling salesman problem 3', 'Sachin Pandey', 'Hello World', 'Sachin', '2021-03-31', NULL, '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-11 05:44:22', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com'),
(79, 'Sriparna Saha', '9999', 'CS', 'Assosciate Professor', 'j', 'A Generalized Framework for Anaphora Resolution in Indian Languages', 'U. Sikdar, A. Ekbal and S. Saha', 'Knowledge based Systems', 'Elsevier', '2020-12-11', NULL, '', '', NULL, '3.325', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-13 09:17:02', 'sriparnas@iitp.ac.in', ''),
(80, 'Asif Iqbal', '1234', 'CS', 'Associate Professor', 'j', 'A Generalized Framework for Anaphora Resolution in Indian Languages', 'U. Sikdar, A. Ekbal and S. Saha', 'Knowledge based Systems', 'Elsevier', '2020-12-11', NULL, '', '', NULL, '3.325', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-13 10:10:07', 'asifi@iitp.ac.in', ''),
(81, 'Sriparna Saha', '9999', 'CS', 'Assosciate Professor', 'j', 'Joint model for feature selection and parameter optimization coupled with classifier ensemble in chemical mention recognition', 'Asif Ekbal and Sriparna Saha', 'Knowledge based Systems', 'Elsevier', '2015-02-03', NULL, '', '', NULL, '3.058', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-13 09:19:28', 'sriparnas@iitp.ac.in', ''),
(82, 'Asif Iqbal', '1234', 'CS', 'Associate Professor', 'j', 'Joint model for feature selection and parameter optimization coupled with classifier ensemble in chemical mention recognition', 'Asif Ekbal and Sriparna Saha', 'Knowledge based Systems', 'Elsevier', '2015-02-03', NULL, '', '', NULL, '3.058', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-13 10:10:07', 'asifi@iitp.ac.in', ''),
(83, 'Sriparna Saha', '9999', 'CS', 'Assosciate Professor', 'j', 'Differential Evolution based Feature Selection Technique for Anaphora Resolution', 'U. Sikdar, A. Ekbal, S. Saha, O. Uryupina andMassimo Poeiso', 'Soft Computing', 'Springer', '2017-10-13', NULL, '', '', NULL, '1.304', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-13 09:21:54', 'sriparnas@iitp.ac.in', ''),
(84, 'Asif Iqbal', '1234', 'CS', 'Associate Professor', 'j', 'Differential Evolution based Feature Selection Technique for Anaphora Resolution', 'U. Sikdar, A. Ekbal, S. Saha, O. Uryupina andMassimo Poeiso', 'Soft Computing', 'Springer', '2017-10-13', NULL, '', '', NULL, '1.304', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-13 10:10:07', 'asifi@iitp.ac.in', ''),
(85, 'Asif Iqbal', '1234', 'CS', 'Associate Professor', 'j', 'Assembling translations from multi-engine machine translation outputs', 'Debajyoty Banik, Asif Ekbal, Pushpak Bhattacharyya, Siddhartha Bhattacharyya', 'Appl. Soft Comput', 'Elsevier', '2019-02-21', NULL, '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-14 03:23:10', 'asifi@iitp.ac.in', ''),
(86, 'Asif Iqbal', '1234', 'CS', 'Associate Professor', 'j', 'Machine Learning Based Optimized Pruning Approach for Decoding in Statistical Machine Translation', 'Debajyoty Banik, Asif Ekbal, Pushpak Bhattacharyya', 'IEEE Access', 'Springer', '2019-02-13', NULL, '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-14 03:23:09', 'asifi@iitp.ac.in', ''),
(88, 'Sriparna Saha', '9999', 'CS', 'Assosciate Professor', 'j', 'A Multimodal Author Profiling System for Tweets', 'C. Suman, A. Naman, S. Saha, P. Bhattacharyya', 'IEEE Transactions on Computational Social Systems', 'Elsevier', '2021-02-14', NULL, '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-13 09:28:51', 'sriparnas@iitp.ac.in', ''),
(89, 'Sriparna Saha', '9999', 'CS', 'Assosciate Professor', 'j', 'AdaSwarm: Augmenting gradient-based optimizers in Deep Learning with Swarm Intelligence', 'R. Mahapatra, S. Saha, Carlos A. Coello Coello, A. Bhattacharya, Soma S. Dhavala, S. Saha', 'IEEE Transactions on Emerging Topics in Computational Intelligence', 'Springer', '2021-02-16', NULL, '', '', NULL, '4.62', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-13 09:29:38', 'sriparnas@iitp.ac.in', ''),
(90, 'Sriparna Saha', '9999', 'CS', 'Assosciate Professor', 'j', 'Expert Habitat: A Colonization Conjecture for Exoplanetary Habitability via penalized multi-objective optimization based candidate validation', 'L. Khaidem, S. Saha, S. Kar, A. Mathur, S. Saha', 'European Physical Journal Special Topics', 'Springer', '2021-01-08', NULL, '', '', NULL, '1.688', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-13 09:30:33', 'sriparnas@iitp.ac.in', ''),
(91, 'Sriparna Saha', '9999', 'CS', 'Assosciate Professor', 'c', 'Multimodal Graph-based Transformer Framework for Biomedical Relation Extraction', 'S. Pingali, S. Yadav, P. Dutta, and S. Saha', NULL, 'ACL Findings 2021', '2020-04-02', NULL, NULL, '', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-13 09:59:59', 'sriparnas@iitp.ac.in', ''),
(92, 'Sriparna Saha', '9999', 'CS', 'Assosciate Professor', 'c', 'Are You Really Complaining? A Multi-task Framework for Complaint Identification, Emotion and Sentiment Classification', ' A. Singh, S. Saha', NULL, 'ICDAR 2021', '2020-07-13', NULL, NULL, '', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-13 10:18:00', 'sriparnas@iitp.ac.in', ''),
(93, 'Sriparna Saha', '9999', 'CS', 'Assosciate Professor', 'tb', 'Unsupervised Classification: Similarity Measures, Classical and Metaheuristic Approaches, and Applications', 'S. Bandyopadhyay and S. Saha', NULL, 'mit press', '2012-10-03', NULL, NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-13 10:21:00', 'sriparnas@iitp.ac.in', ''),
(94, 'Sriparna Saha', '9999', 'CS', 'Assosciate Professor', 'bc', 'Similarity Measures, Classical and Metaheuristic Approaches, and Applications', 'S. Bandyopadhyay and S. Saha', NULL, 'mit press', '2012-08-05', NULL, NULL, '', NULL, NULL, 'Unsupervised Classification', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-13 10:26:23', 'sriparnas@iitp.ac.in', ''),
(95, 'Asif Iqbal', '1234', 'CS', 'Associate Professor', 'c', 'Multilingual Unsupervised NMT using Shared Encoder and Language-Specific Decoders', 'Sukanta Sen, Kamal Kumar Gupta, Asif Ekbal and Pushpak Bhattacharyya', NULL, ' Association for Computational Linguistics (ACL)', '2020-08-13', NULL, NULL, '', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-13 11:26:32', 'asifi@iitp.ac.in', ''),
(96, 'Asif Iqbal', '1234', 'CS', 'Associate Professor', 'c', 'Ordinal and Attribute Aware Response Generation in a Multimodal Dialogue System', 'Hardik Chauhan, Mauzama Firdaus, Asif Ekbal and Pushpak Bhattacharyya', NULL, ' Association for Computational Linguistics (ACL)', '2019-08-08', NULL, NULL, '', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-13 11:27:22', 'asifi@iitp.ac.in', ''),
(97, 'Asif Iqbal', '1234', 'CS', 'Associate Professor', 'c', 'Are You Really Complaining? A Multi-task Framework for Complaint Identification, Emotion and Sentiment Classification', ' A. Singh, S. Saha', NULL, 'ICDAR 2021', '2020-07-13', NULL, NULL, '', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-13 11:28:04', 'asifi@iitp.ac.in', ''),
(98, 'Asif Iqbal', '1234', 'CS', 'Associate Professor', 'c', 'Multimodal Graph-based Transformer Framework for Biomedical Relation Extraction', 'S. Pingali, S. Yadav, P. Dutta, and S. Saha', NULL, 'ACL Findings 2021', '2020-04-02', NULL, NULL, '', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-13 11:28:26', 'asifi@iitp.ac.in', ''),
(99, 'Asif Iqbal', '1234', 'CS', 'Associate Professor', 'tb', 'Emerging Applications of Natural Language Processing: Concepts and New Research', 'Sivaji Bandyopadhyay, Sudip Kumar Naskar, Asif Ekbal', NULL, 'IGI Global', '2013-12-13', NULL, NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-13 11:32:21', 'asifi@iitp.ac.in', ''),
(100, 'Asif Iqbal', '1234', 'CS', 'Associate Professor', 'bc', 'Named Entity Recognition and Transliteration in Bengali', 'A. Ekbal, S. Naskar and S. Bandyopadhyay ', NULL, ' Sekine, Satoshi and Elisabete Ranchhod ', '2009-03-02', NULL, NULL, '', NULL, NULL, 'Benjamins Current Topics', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-13 11:34:03', 'asifi@iitp.ac.in', ''),
(101, 'Asif Iqbal', '1234', 'CS', 'Associate Professor', 'bc', 'Evolutionary Approach for Classifier Ensemble: An Application to Bio-molecular Event Extraction.', 'A. Ekbal, S. Saha and S. Girdhar', NULL, ' Sekine, Satoshi and Elisabete Ranchhod ', '2013-07-13', NULL, NULL, '', NULL, NULL, 'Advances in Intelligent Systems and Computing', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-13 11:35:44', 'asifi@iitp.ac.in', '');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_profile_research`
--

CREATE TABLE `faculty_profile_research` (
  `sno` int(11) NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `roll` varchar(10) NOT NULL,
  `dept` text NOT NULL,
  `prog` varchar(30) DEFAULT NULL,
  `email` text,
  `aemail` text,
  `rtype` varchar(5) NOT NULL,
  `title` text NOT NULL,
  `other` text,
  `rpi` text,
  `rcopi` text,
  `rlevel` text,
  `remarks` text,
  `funds` int(11) DEFAULT NULL,
  `projectStatus` text,
  `juri` text,
  `ref` text,
  `lastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_profile_research`
--

INSERT INTO `faculty_profile_research` (`sno`, `fname`, `roll`, `dept`, `prog`, `email`, `aemail`, `rtype`, `title`, `other`, `rpi`, `rcopi`, `rlevel`, `remarks`, `funds`, `projectStatus`, `juri`, `ref`, `lastUpdated`, `pdate`) VALUES
(8, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com', 'dw', 'mcu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-06 12:40:22', '2021-02-16'),
(13, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com', 'tt', 'ast', 'wte', NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2021-05-06 12:49:58', '2012-02-04'),
(15, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com', 'cpr', 'scheduling algo', 'virat, rohit', NULL, NULL, NULL, NULL, NULL, 'granted', 'internation', '23n9KL', '2021-05-09 11:01:15', '2020-04-24'),
(18, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com', 'rarea', 'ml', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-06 12:42:32', '2021-03-31'),
(19, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com', 'g', 'faculty profile', 'xyz', NULL, '', 'B.Tech.', 'ongoing', NULL, NULL, NULL, NULL, '2021-05-09 11:00:51', '2020-07-04'),
(25, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com', 'dw', 'dc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-06 12:40:25', '2021-04-01'),
(26, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com', 'orp', 'ml', 'Tata', 'Mayank Aggarwal', '', NULL, NULL, 50, NULL, NULL, NULL, '2021-05-06 12:34:45', '2021-03-10'),
(27, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com', 'ocp', 'erricson', 'tcs', 'corey', 'karan', NULL, NULL, 3, NULL, NULL, NULL, '2021-05-06 12:37:38', '2020-02-08'),
(30, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com', 'g', 'Plotting graph using Kibana ', 'Sachin Pandey', NULL, 'Mayank Aggarwal', 'B.Tech.', '', NULL, NULL, NULL, NULL, '2021-05-09 11:00:51', '2021-03-16'),
(37, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com', 'pat', 'ml paper', NULL, NULL, NULL, NULL, NULL, NULL, 'granted', NULL, '345jac9', '2021-05-06 12:45:28', '2020-04-20'),
(38, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com', 'rarea', 'Advanced Machine Learning', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-06 12:20:30', '2021-05-20'),
(41, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com', 'orp', 'ml', 'ieee', 'karan', 'kumar', NULL, NULL, 2, NULL, NULL, NULL, '2021-05-06 12:34:45', '2020-06-04'),
(42, 'Sourav Dandapat', '9990', 'CS', 'Faculty', 'skd@iitp.ac.in', '', 'orp', 'Travelling Salesman Problem', 'TCS', 'Sourav Dandapat', 'Test2', NULL, NULL, 10, NULL, NULL, NULL, '2021-05-10 14:08:31', '2020-12-31'),
(43, 'TestUser2', '308', 'CS', 'Faculty', 'test2@iitp.ac.in', 'test.test@gmail.com', 'orp', 'Travelling Salesman Problem', 'TCS', 'Sourav Dandapat', 'Test2', NULL, NULL, 10, NULL, NULL, NULL, '2021-05-10 14:09:39', '2020-12-31'),
(47, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com', 'ocp', 'Plotting graph using kibana', 'Erricson', 'Mayank Aggarwal', 'TestUser2', NULL, NULL, 20, NULL, NULL, NULL, '2021-05-10 14:20:17', '2021-03-11'),
(48, 'Mayank Agarwal', '308', 'CS', 'Faculty', 'mayank265@iitp.ac.in', 'mayank265@gmail.com', 'ocp', 'Plotting graph using kibana', 'Erricson', 'Mayank Aggarwal', 'TestUser2', NULL, NULL, 20, NULL, NULL, NULL, '2021-05-10 14:21:08', '2021-03-11'),
(49, 'TestUser2', '308', 'CS', 'Faculty', 'test2@iitp.ac.in', 'test.test@gmail.com', 'cpr', 'scheduling algo', 'virat, rohit', NULL, NULL, NULL, NULL, NULL, 'granted', 'internation', '23n9KL', '2021-05-10 14:27:04', '2020-04-24'),
(50, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com', 'cpr', 'test ', 'auth1, auth2', NULL, NULL, NULL, NULL, NULL, 'submitted', 'foreign', '4567', '2021-05-10 14:36:55', '2020-12-04'),
(51, 'Gaurav Kumar', '1701CS21', 'CS', 'BTech', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com', 'tt', 'aws', 'Amazon', NULL, NULL, NULL, NULL, 25, NULL, NULL, NULL, '2021-05-10 14:42:19', '2021-05-20'),
(52, 'TestUser2', '308', 'CS', 'Faculty', 'test2@iitp.ac.in', 'test.test@gmail.com', 'tt', 'aws', 'Amazon', NULL, NULL, NULL, NULL, 25, NULL, NULL, NULL, '2021-05-10 14:46:03', '2021-02-18'),
(53, 'Sriparna Saha', '9999', 'CS', 'Assosciate Professor', 'sriparnas@iitp.ac.in', '', 'rarea', 'Machine Learning, Text Mining, Pattern Recognition, Multiobjective Optimization, Bio-Text Mining, Bioinformatics', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-13 08:50:57', '2020-10-15'),
(54, 'Asif Iqbal', '1234', 'CS', 'Associate Professor', 'asifi@iitp.ac.in', '', 'rarea', 'Natural Language Processing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-13 11:04:55', '2020-06-13'),
(55, 'Asif Iqbal', '1234', 'CS', 'Associate Professor', 'asifi@iitp.ac.in', '', 'rarea', 'Data Mining and Machine Learning Applications', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-13 11:04:55', '2021-01-07'),
(56, 'Sriparna Saha', '9999', 'CS', 'Assosciate Professor', 'sriparnas@iitp.ac.in', '', 'orp', 'Autonomous Goal-Oriented and Knowledge-Driven Neural Conversational Agents', 'Accenture Solutions Pvt Ltd', 'Sriparna Saha', '', NULL, NULL, 21, NULL, NULL, NULL, '2021-05-13 10:48:42', '2020-06-19'),
(57, 'Sriparna Saha', '9999', 'CS', 'Assosciate Professor', 'sriparnas@iitp.ac.in', '', 'orp', 'Sentiment, Emotion, Sarcasm and Hate Speech Detection', ' CDOT, New Delhi', '', 'Sriparna Saha', NULL, NULL, 33, NULL, NULL, NULL, '2021-05-13 10:49:49', '2020-05-21'),
(58, 'Sriparna Saha', '9999', 'CS', 'Assosciate Professor', 'sriparnas@iitp.ac.in', '', 'orp', 'Multi-modal Summarization', 'LG Soft, Bangalore', 'Sriparna Saha', '', NULL, NULL, 16, NULL, NULL, NULL, '2021-05-13 10:51:15', '2020-07-17'),
(59, 'Asif Iqbal', '1234', 'CS', 'Associate Professor', 'asifi@iitp.ac.in', '', 'orp', 'Research on Sentiment Analysis and Image Recognition, Skymap, Singapore', 'Mahindra Ecole, Hyderabad; Jadavpur University, Kolkata; IIIT Hyderabad; and Wipro', 'Asif Iqbal', 'Prof. Pushpak Bhattacharyya and Dr. Sriparna Saha', NULL, NULL, 51, NULL, NULL, NULL, '2021-05-13 11:13:11', '2020-08-20'),
(60, 'Sriparna Saha', '9999', 'CS', 'Assosciate Professor', 'sriparnas@iitp.ac.in', '', 'orp', 'Research on Sentiment Analysis and Image Recognition, Skymap, Singapore', 'Mahindra Ecole, Hyderabad; Jadavpur University, Kolkata; IIIT Hyderabad; and Wipro', 'Asif Iqbal', 'Prof. Pushpak Bhattacharyya and Dr. Sriparna Saha', NULL, NULL, 51, NULL, NULL, NULL, '2021-05-13 11:14:15', '2020-08-20'),
(61, 'Asif Iqbal', '1234', 'CS', 'Associate Professor', 'asifi@iitp.ac.in', '', 'orp', 'Speech based Patient Assisted System', ' Imprint India ', 'Prof. Pushpak Bhattacharyya', 'Asif Iqbal', NULL, NULL, 273, NULL, NULL, NULL, '2021-05-13 11:16:50', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_profile_teaching`
--

CREATE TABLE `faculty_profile_teaching` (
  `sno` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `roll` varchar(10) NOT NULL,
  `dept` text NOT NULL,
  `subCode` text,
  `ltp` text,
  `numOfStudents` int(11) DEFAULT NULL,
  `additionalInformation` text,
  `semester` int(11) DEFAULT NULL,
  `activityDate` date DEFAULT NULL,
  `lastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_profile_teaching`
--

INSERT INTO `faculty_profile_teaching` (`sno`, `name`, `roll`, `dept`, `subCode`, `ltp`, `numOfStudents`, `additionalInformation`, `semester`, `activityDate`, `lastUpdated`) VALUES
(2, 'TestUser2', '308', 'CS', 'CS102', '3-0-6', 240, '', 2, '2021-03-14', '2021-04-09 20:33:03'),
(3, 'TestUser2', '308', 'CS', 'CS399', '0-0-3', 61, '', 4, '2019-08-01', '2021-05-06 11:20:13'),
(4, 'TestUser2', '308', 'CS', 'CS384', '2-0-2-6', 54, '', 2, '2020-08-01', '2021-05-06 11:20:13'),
(5, 'Sriparna Saha', '9999', 'CS', 'CS431', '3-0-0', 50, 'Theory for B.Tech, M.Tech and PhD students', 6, '2020-12-10', '2021-05-13 08:50:43'),
(6, 'Sriparna Saha', '9999', 'CS', 'CS551', '3-2-0', 60, 'Theory for M.Tech', 3, '2020-06-12', '2021-05-13 10:44:00'),
(7, 'Asif Iqbal', '1234', 'CS', 'CS354', '3-0-0', 55, 'Compilers', 6, '2020-05-14', '2021-05-13 11:22:43'),
(8, 'Asif Iqbal', '1234', 'CS', 'CS302', '3-0-0', 61, 'Database Systems and Data mining', 5, '2020-07-16', '2021-05-13 11:23:18');

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
  `marked` int(11) NOT NULL,
  `added_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`Name`, `Roll No`, `dob`, `prog`, `department`, `date_of_join`, `yjoin`, `gender`, `email`, `aemail`, `contact`, `marked`, `added_updated`) VALUES
('TestUser1', '2001CS00', '2020-11-20', 'BTech', 'CS', '2017-07-01', '2016', 'Male', 'test.cs17@iitp.ac.in', 'test.mail@gmail.com', '1234455890', 1, '2021-02-07 20:11:10'),
('TestUser2', '308', '2020-11-26', 'Faculty', 'CS', '2018-07-10', '2016', 'Male', 'test2@iitp.ac.in', 'test.test@gmail.com', '4567349800', 1, '2021-02-07 20:11:10'),
('Gaurav Kumar', '1701CS21', '1999-01-20', 'BTech', 'CS', '2017-07-01', '2017', 'Male', 'gaurav.cs17@iitp.ac.in', 'gaurav.karum@gmail.com', '9123294226', 1, '2021-04-10 17:38:41'),
('Mayank Agarwal', '308', '1987-05-26', 'Faculty', 'CS', '2018-07-10', '2018', 'Male', 'mayank265@iitp.ac.in', 'mayank265@gmail.com', '9678336348', 1, '2021-04-10 17:38:41'),
('Sriparna Saha', '301', '1985-01-01', 'admin', 'CS', '2008-01-01', '2008', 'Female', 'sriparna@iitp.ac.in', 'sriparna@gmail.com', '9876546612', 1, NULL),
('Sourav Dandapat', '9990', '1980-03-10', 'Faculty', 'CS', '2008-04-24', '', 'Male', 'skd@iitp.ac.in', '', '', 1, '2021-04-20 08:19:07'),
('Joydeep Chandra', '9999', '1980-03-10', 'Faculty', 'CS', '2008-04-24', '', 'Male', 'jc@iitp.ac.in', '', '', 1, '2021-04-20 08:19:21'),
('Sriparna Saha', '9999', '1980-03-10', 'Assosciate Professor', 'CS', '2008-04-24', '', 'Male', 'sriparnas@iitp.ac.in', '', '', 1, '2021-04-20 08:19:21'),
('Asif Iqbal', '1234', '1980-03-10', 'Associate Professor', 'CS', '2008-04-24', '', 'Male', 'asifi@iitp.ac.in', '', '', 1, '2021-04-20 08:19:07'),
('Deepu P', '0001', '1980-03-10', 'Assistant Professor', 'ME', '2008-04-24', '', 'Male', 'deepu@iitp.ac.in', '', '', 1, '2021-04-20 08:19:07'),
('Shovan Bhaumik', '0002', '1980-03-10', 'Assosciate Professor', 'EE', '2008-04-24', '', 'Male', 'shovan@iitp.ac.in', '', '', 1, '2021-04-20 08:19:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty_profile_activities`
--
ALTER TABLE `faculty_profile_activities`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `faculty_profile_activities_scw`
--
ALTER TABLE `faculty_profile_activities_scw`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `faculty_profile_activities_stc`
--
ALTER TABLE `faculty_profile_activities_stc`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `faculty_profile_activities_va`
--
ALTER TABLE `faculty_profile_activities_va`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `faculty_profile_honours_a`
--
ALTER TABLE `faculty_profile_honours_a`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `faculty_profile_honours_f`
--
ALTER TABLE `faculty_profile_honours_f`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `faculty_profile_honours_fpb`
--
ALTER TABLE `faculty_profile_honours_fpb`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `faculty_profile_honours_il`
--
ALTER TABLE `faculty_profile_honours_il`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `faculty_profile_honours_mebj`
--
ALTER TABLE `faculty_profile_honours_mebj`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `faculty_profile_honours_mpb`
--
ALTER TABLE `faculty_profile_honours_mpb`
  ADD PRIMARY KEY (`sno`);

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
-- Indexes for table `faculty_profile_teaching`
--
ALTER TABLE `faculty_profile_teaching`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty_profile_activities`
--
ALTER TABLE `faculty_profile_activities`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `faculty_profile_activities_scw`
--
ALTER TABLE `faculty_profile_activities_scw`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faculty_profile_activities_stc`
--
ALTER TABLE `faculty_profile_activities_stc`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculty_profile_activities_va`
--
ALTER TABLE `faculty_profile_activities_va`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `faculty_profile_honours_a`
--
ALTER TABLE `faculty_profile_honours_a`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `faculty_profile_honours_f`
--
ALTER TABLE `faculty_profile_honours_f`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faculty_profile_honours_fpb`
--
ALTER TABLE `faculty_profile_honours_fpb`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faculty_profile_honours_il`
--
ALTER TABLE `faculty_profile_honours_il`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `faculty_profile_honours_mebj`
--
ALTER TABLE `faculty_profile_honours_mebj`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculty_profile_honours_mpb`
--
ALTER TABLE `faculty_profile_honours_mpb`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faculty_profile_publications`
--
ALTER TABLE `faculty_profile_publications`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `faculty_profile_research`
--
ALTER TABLE `faculty_profile_research`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `faculty_profile_teaching`
--
ALTER TABLE `faculty_profile_teaching`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

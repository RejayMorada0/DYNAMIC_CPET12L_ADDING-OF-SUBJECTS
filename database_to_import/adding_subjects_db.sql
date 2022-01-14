-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2022 at 12:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adding_subjects_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_access`
--

CREATE TABLE `admin_access` (
  `email` varchar(100) NOT NULL,
  `passw` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_access`
--

INSERT INTO `admin_access` (`email`, `passw`) VALUES
('admin@gmail.com', 'admin12345');

-- --------------------------------------------------------

--
-- Table structure for table `admin_request`
--

CREATE TABLE `admin_request` (
  `req_id` bigint(8) NOT NULL,
  `stud_id` varchar(100) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `req_sub` varchar(100) NOT NULL,
  `stud_stats` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `all_subjects`
--

CREATE TABLE `all_subjects` (
  `sub_code` varchar(100) NOT NULL,
  `sub_name` varchar(200) NOT NULL,
  `yr_and_sem` varchar(100) NOT NULL,
  `offer_stats` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all_subjects`
--

INSERT INTO `all_subjects` (`sub_code`, `sub_name`, `yr_and_sem`, `offer_stats`) VALUES
('BET1-C', 'Orientation to BET, Seminars and Field Trips', 'FIRST YEAR - FIRST SEMESTER', 'Offer'),
('CAD-C', 'Computer Aided Drafting', 'SECOND YEAR - FIRST SEMESTER', 'Not Offer'),
('CHEMGEN-C', 'General Chemistry (Lec)', 'FIRST YEAR - FIRST SEMESTER', 'Offer'),
('CHEMGENL-C', 'General Chemistry (Lab)', 'FIRST YEAR - FIRST SEMESTER', 'Not Offer'),
('CHET-C', 'Chemistry for Engineering Technologists', 'SECOND YEAR - SECOND SEMESTER', 'Not Offer'),
('CHETL-C', 'Chemistry for Engineering Technologists(Lab)', 'SECOND YEAR - SECOND SEMESTER', 'Not Offer'),
('CPET 1L-C', 'Program Logic and Formulation (Lab)', 'FIRST YEAR - FIRST SEMESTER', 'Offer'),
('CPET2L-C', 'Object Oriented Programming 2(Lab)', 'SECOND YEAR - SECOND SEMESTER', 'Not Offer'),
('CPET3-C', 'Logic Circuits and Switching Theory Lec.', 'THIRD YEAR - SECOND SEMESTER', 'Not Offer'),
('CPET3L-C', 'Logic Circuits and Switching Theory Lab.', 'FOURTH YEAR - FIRST SEMESTER', 'Not Offer'),
('CPET4-C', 'Data and Digital Communcations', 'FOURTH YEAR - SECOND SEMESTER', 'Not Offer'),
('CPET5L-C', 'Data Structures and Algorithms Lab.', 'FOURTH YEAR - FIRST SEMESTER', 'Not Offer'),
('CPET6L-C', 'Introduction to Hardware Description Language', 'FOURTH YEAR - SECOND SEMESTER', 'Not Offer'),
('EST1-C', 'Electronics 1(Lec)', 'SECOND YEAR - SECOND SEMESTER', 'Not Offer'),
('EST1L-C', 'Electronics 1 Lab', 'THIRD YEAR - FIRST SEMESTER', 'Not Offer'),
('ET1-C', 'Electrical Circuits (Lec)', 'FIRST YEAR - SECOND SEMESTER', 'Offer'),
('ET1L-C', 'Electrical Circuits (Lab)', 'FIRST YEAR - SECOND SEMESTER', 'Not Offer'),
('GEC1-C', 'Understanding the Self', 'FIRST YEAR - SECOND SEMESTER', 'Not Offer'),
('GEC2-C', 'Readings in Philippine History', 'THIRD YEAR - SECOND SEMESTER', 'Not Offer'),
('GEC4-C', 'Mathematics in the Modern World 1', 'FIRST YEAR - SECOND SEMESTER', 'Not Offer'),
('GEC5-C', 'Purposive Communication', 'THIRD YEAR - FIRST SEMESTER', 'Not Offer'),
('GEC7-C', 'Science, Technology, and Society', 'THIRD YEAR - SECOND SEMESTER', 'Not Offer'),
('GEC8-C', 'Ethics', 'FOURTH YEAR - FIRST SEMESTER', 'Not Offer'),
('GEM14-C', 'Life and Works of Rizal', 'FOURTH YEAR - SECOND SEMESTER', 'Not Offer'),
('MATHA05-C', 'Pre-Calculus', 'SECOND YEAR - FIRST SEMESTER', 'Not Offer'),
('MATHA13-C', 'Differential Calculus', 'THIRD YEAR - FIRST SEMESTER', 'Not Offer'),
('MATHA23-C', 'Integral Calculus', 'FOURTH YEAR - FIRST SEMESTER', 'Not Offer'),
('NSTP1-C', 'National Service Training Program 1', 'SECOND YEAR - FIRST SEMESTER', 'Not Offer'),
('NSTP2-C', 'National Service Training Program 2', 'THIRD YEAR - SECOND SEMESTER', 'Not Offer'),
('PE1-C', 'Physical Fitness', 'SECOND YEAR - FIRST SEMESTER', 'Not Offer'),
('PE2-C', 'Rhythmic Activities', 'THIRD YEAR - FIRST SEMESTER', 'Not Offer'),
('PE3-C', 'Individual and Dual Sports', 'FOURTH YEAR - SECOND SEMESTER', 'Not Offer');

-- --------------------------------------------------------

--
-- Table structure for table `pic_access`
--

CREATE TABLE `pic_access` (
  `email` varchar(100) NOT NULL,
  `passw` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pic_access`
--

INSERT INTO `pic_access` (`email`, `passw`) VALUES
('pic@gmail.com', 'pic12345');

-- --------------------------------------------------------

--
-- Table structure for table `student_accounts`
--

CREATE TABLE `student_accounts` (
  `stud_id` varchar(100) NOT NULL,
  `fn` varchar(100) NOT NULL,
  `ln` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `passw` varchar(100) NOT NULL,
  `stud_stats` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_request`
--

CREATE TABLE `student_request` (
  `trans_id` bigint(8) NOT NULL,
  `stud_id` varchar(100) NOT NULL,
  `sub_code` varchar(100) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `yr_and_sem` varchar(100) NOT NULL,
  `grades` float NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_access`
--
ALTER TABLE `admin_access`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `admin_request`
--
ALTER TABLE `admin_request`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `all_subjects`
--
ALTER TABLE `all_subjects`
  ADD PRIMARY KEY (`sub_code`);

--
-- Indexes for table `pic_access`
--
ALTER TABLE `pic_access`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `student_accounts`
--
ALTER TABLE `student_accounts`
  ADD PRIMARY KEY (`stud_id`),
  ADD KEY `stud_id` (`stud_id`),
  ADD KEY `fn` (`fn`),
  ADD KEY `ln` (`ln`),
  ADD KEY `email` (`email`),
  ADD KEY `passw` (`passw`);

--
-- Indexes for table `student_request`
--
ALTER TABLE `student_request`
  ADD PRIMARY KEY (`trans_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_request`
--
ALTER TABLE `student_request`
  MODIFY `trans_id` bigint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1302;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

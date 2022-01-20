-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2022 at 10:52 AM
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

--
-- Dumping data for table `student_accounts`
--

INSERT INTO `student_accounts` (`stud_id`, `fn`, `ln`, `section`, `email`, `passw`, `stud_stats`) VALUES
('TUPC-19-0001', 'Rejay', 'Morada', 'BET-COET-S-1A', 'rejaymorada0@gmail.com', 'rejaymorada0', 'Processing'),
('TUPC-19-0002', 'Lalisa', 'Manoban', 'BET-COET-S-1A', 'lalisamanoban@gmail.com', 'rejaymorada0', 'Processing');

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
-- Dumping data for table `student_request`
--

INSERT INTO `student_request` (`trans_id`, `stud_id`, `sub_code`, `sub_name`, `yr_and_sem`, `grades`, `remarks`) VALUES
(1686, 'TUPC-19-0001', 'BET1-C', 'Orientation to BET, Seminars and Field Trips', 'FIRST YEAR - FIRST SEMESTER', 1.5, 'Passed'),
(1687, 'TUPC-19-0001', 'CHEMGEN-C', 'General Chemistry (Lec)', 'FIRST YEAR - FIRST SEMESTER', 1.25, ''),
(1688, 'TUPC-19-0001', 'CPET 1L-C', 'Program Logic and Formulation (Lab)', 'FIRST YEAR - FIRST SEMESTER', 1, ''),
(1689, 'TUPC-19-0001', 'CHEMGENL-C', 'General Chemistry (Lab)', 'FIRST YEAR - FIRST SEMESTER', 1.25, ''),
(1690, 'TUPC-19-0001', 'ET1-C', 'Electrical Circuits (Lec)', 'FIRST YEAR - SECOND SEMESTER', 5, 'To Offer'),
(1691, 'TUPC-19-0001', 'ET1L-C', 'Electrical Circuits (Lab)', 'FIRST YEAR - SECOND SEMESTER', 0, ''),
(1692, 'TUPC-19-0001', 'GEC1-C', 'Understanding the Self', 'FIRST YEAR - SECOND SEMESTER', 0, ''),
(1693, 'TUPC-19-0001', 'GEC4-C', 'Mathematics in the Modern World 1', 'FIRST YEAR - SECOND SEMESTER', 0, ''),
(1694, 'TUPC-19-0001', 'GEC8-C', 'Ethics', 'FOURTH YEAR - FIRST SEMESTER', 0, ''),
(1695, 'TUPC-19-0001', 'CPET3L-C', 'Logic Circuits and Switching Theory Lab.', 'FOURTH YEAR - FIRST SEMESTER', 0, ''),
(1696, 'TUPC-19-0001', 'CPET5L-C', 'Data Structures and Algorithms Lab.', 'FOURTH YEAR - FIRST SEMESTER', 0, ''),
(1697, 'TUPC-19-0001', 'MATHA23-C', 'Integral Calculus', 'FOURTH YEAR - FIRST SEMESTER', 0, ''),
(1698, 'TUPC-19-0001', 'PE3-C', 'Individual and Dual Sports', 'FOURTH YEAR - SECOND SEMESTER', 0, ''),
(1699, 'TUPC-19-0001', 'CPET4-C', 'Data and Digital Communcations', 'FOURTH YEAR - SECOND SEMESTER', 0, ''),
(1700, 'TUPC-19-0001', 'GEM14-C', 'Life and Works of Rizal', 'FOURTH YEAR - SECOND SEMESTER', 0, ''),
(1701, 'TUPC-19-0001', 'CPET6L-C', 'Introduction to Hardware Description Language', 'FOURTH YEAR - SECOND SEMESTER', 0, ''),
(1702, 'TUPC-19-0001', 'CAD-C', 'Computer Aided Drafting', 'SECOND YEAR - FIRST SEMESTER', 0, ''),
(1703, 'TUPC-19-0001', 'PE1-C', 'Physical Fitness', 'SECOND YEAR - FIRST SEMESTER', 0, ''),
(1704, 'TUPC-19-0001', 'NSTP1-C', 'National Service Training Program 1', 'SECOND YEAR - FIRST SEMESTER', 0, ''),
(1705, 'TUPC-19-0001', 'MATHA05-C', 'Pre-Calculus', 'SECOND YEAR - FIRST SEMESTER', 0, ''),
(1706, 'TUPC-19-0001', 'CHET-C', 'Chemistry for Engineering Technologists', 'SECOND YEAR - SECOND SEMESTER', 0, ''),
(1707, 'TUPC-19-0001', 'EST1-C', 'Electronics 1(Lec)', 'SECOND YEAR - SECOND SEMESTER', 0, ''),
(1708, 'TUPC-19-0001', 'CHETL-C', 'Chemistry for Engineering Technologists(Lab)', 'SECOND YEAR - SECOND SEMESTER', 0, ''),
(1709, 'TUPC-19-0001', 'CPET2L-C', 'Object Oriented Programming 2(Lab)', 'SECOND YEAR - SECOND SEMESTER', 0, ''),
(1710, 'TUPC-19-0001', 'PE2-C', 'Rhythmic Activities', 'THIRD YEAR - FIRST SEMESTER', 0, ''),
(1711, 'TUPC-19-0001', 'GEC5-C', 'Purposive Communication', 'THIRD YEAR - FIRST SEMESTER', 0, ''),
(1712, 'TUPC-19-0001', 'EST1L-C', 'Electronics 1 Lab', 'THIRD YEAR - FIRST SEMESTER', 0, ''),
(1713, 'TUPC-19-0001', 'MATHA13-C', 'Differential Calculus', 'THIRD YEAR - FIRST SEMESTER', 0, ''),
(1714, 'TUPC-19-0001', 'GEC2-C', 'Readings in Philippine History', 'THIRD YEAR - SECOND SEMESTER', 0, ''),
(1715, 'TUPC-19-0001', 'GEC7-C', 'Science, Technology, and Society', 'THIRD YEAR - SECOND SEMESTER', 0, ''),
(1716, 'TUPC-19-0001', 'CPET3-C', 'Logic Circuits and Switching Theory Lec.', 'THIRD YEAR - SECOND SEMESTER', 0, ''),
(1717, 'TUPC-19-0001', 'NSTP2-C', 'National Service Training Program 2', 'THIRD YEAR - SECOND SEMESTER', 0, ''),
(1718, 'TUPC-19-0002', 'BET1-C', 'Orientation to BET, Seminars and Field Trips', 'FIRST YEAR - FIRST SEMESTER', 5, ''),
(1719, 'TUPC-19-0002', 'CHEMGEN-C', 'General Chemistry (Lec)', 'FIRST YEAR - FIRST SEMESTER', 0, ''),
(1720, 'TUPC-19-0002', 'CPET 1L-C', 'Program Logic and Formulation (Lab)', 'FIRST YEAR - FIRST SEMESTER', 0, ''),
(1721, 'TUPC-19-0002', 'CHEMGENL-C', 'General Chemistry (Lab)', 'FIRST YEAR - FIRST SEMESTER', 0, ''),
(1722, 'TUPC-19-0002', 'ET1-C', 'Electrical Circuits (Lec)', 'FIRST YEAR - SECOND SEMESTER', 0, ''),
(1723, 'TUPC-19-0002', 'ET1L-C', 'Electrical Circuits (Lab)', 'FIRST YEAR - SECOND SEMESTER', 0, ''),
(1724, 'TUPC-19-0002', 'GEC1-C', 'Understanding the Self', 'FIRST YEAR - SECOND SEMESTER', 0, ''),
(1725, 'TUPC-19-0002', 'GEC4-C', 'Mathematics in the Modern World 1', 'FIRST YEAR - SECOND SEMESTER', 0, ''),
(1726, 'TUPC-19-0002', 'GEC8-C', 'Ethics', 'FOURTH YEAR - FIRST SEMESTER', 0, ''),
(1727, 'TUPC-19-0002', 'CPET3L-C', 'Logic Circuits and Switching Theory Lab.', 'FOURTH YEAR - FIRST SEMESTER', 0, ''),
(1728, 'TUPC-19-0002', 'CPET5L-C', 'Data Structures and Algorithms Lab.', 'FOURTH YEAR - FIRST SEMESTER', 0, ''),
(1729, 'TUPC-19-0002', 'MATHA23-C', 'Integral Calculus', 'FOURTH YEAR - FIRST SEMESTER', 0, ''),
(1730, 'TUPC-19-0002', 'PE3-C', 'Individual and Dual Sports', 'FOURTH YEAR - SECOND SEMESTER', 0, ''),
(1731, 'TUPC-19-0002', 'CPET4-C', 'Data and Digital Communcations', 'FOURTH YEAR - SECOND SEMESTER', 0, ''),
(1732, 'TUPC-19-0002', 'GEM14-C', 'Life and Works of Rizal', 'FOURTH YEAR - SECOND SEMESTER', 0, ''),
(1733, 'TUPC-19-0002', 'CPET6L-C', 'Introduction to Hardware Description Language', 'FOURTH YEAR - SECOND SEMESTER', 0, ''),
(1734, 'TUPC-19-0002', 'CAD-C', 'Computer Aided Drafting', 'SECOND YEAR - FIRST SEMESTER', 0, ''),
(1735, 'TUPC-19-0002', 'PE1-C', 'Physical Fitness', 'SECOND YEAR - FIRST SEMESTER', 0, ''),
(1736, 'TUPC-19-0002', 'NSTP1-C', 'National Service Training Program 1', 'SECOND YEAR - FIRST SEMESTER', 0, ''),
(1737, 'TUPC-19-0002', 'MATHA05-C', 'Pre-Calculus', 'SECOND YEAR - FIRST SEMESTER', 0, ''),
(1738, 'TUPC-19-0002', 'CHET-C', 'Chemistry for Engineering Technologists', 'SECOND YEAR - SECOND SEMESTER', 0, ''),
(1739, 'TUPC-19-0002', 'EST1-C', 'Electronics 1(Lec)', 'SECOND YEAR - SECOND SEMESTER', 0, ''),
(1740, 'TUPC-19-0002', 'CHETL-C', 'Chemistry for Engineering Technologists(Lab)', 'SECOND YEAR - SECOND SEMESTER', 0, ''),
(1741, 'TUPC-19-0002', 'CPET2L-C', 'Object Oriented Programming 2(Lab)', 'SECOND YEAR - SECOND SEMESTER', 0, ''),
(1742, 'TUPC-19-0002', 'PE2-C', 'Rhythmic Activities', 'THIRD YEAR - FIRST SEMESTER', 0, ''),
(1743, 'TUPC-19-0002', 'GEC5-C', 'Purposive Communication', 'THIRD YEAR - FIRST SEMESTER', 0, ''),
(1744, 'TUPC-19-0002', 'EST1L-C', 'Electronics 1 Lab', 'THIRD YEAR - FIRST SEMESTER', 0, ''),
(1745, 'TUPC-19-0002', 'MATHA13-C', 'Differential Calculus', 'THIRD YEAR - FIRST SEMESTER', 0, ''),
(1746, 'TUPC-19-0002', 'GEC2-C', 'Readings in Philippine History', 'THIRD YEAR - SECOND SEMESTER', 0, ''),
(1747, 'TUPC-19-0002', 'GEC7-C', 'Science, Technology, and Society', 'THIRD YEAR - SECOND SEMESTER', 0, ''),
(1748, 'TUPC-19-0002', 'CPET3-C', 'Logic Circuits and Switching Theory Lec.', 'THIRD YEAR - SECOND SEMESTER', 0, ''),
(1749, 'TUPC-19-0002', 'NSTP2-C', 'National Service Training Program 2', 'THIRD YEAR - SECOND SEMESTER', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_access`
--
ALTER TABLE `admin_access`
  ADD PRIMARY KEY (`email`);

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
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `stud_id` (`stud_id`),
  ADD KEY `fn` (`fn`),
  ADD KEY `ln` (`ln`),
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
  MODIFY `trans_id` bigint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1750;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

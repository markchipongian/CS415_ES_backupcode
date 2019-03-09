-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 09, 2019 at 11:53 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enrollment`
--

-- --------------------------------------------------------

--
-- Table structure for table `comp_course`
--

DROP TABLE IF EXISTS `comp_course`;
CREATE TABLE IF NOT EXISTS `comp_course` (
  `STUDENT_ID` varchar(9) NOT NULL DEFAULT '0',
  `COURSE_CODE` varchar(5) NOT NULL DEFAULT '0',
  `GRADE` varchar(2) NOT NULL,
  PRIMARY KEY (`STUDENT_ID`,`COURSE_CODE`),
  KEY `FK_CCCC` (`COURSE_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comp_course`
--

INSERT INTO `comp_course` (`STUDENT_ID`, `COURSE_CODE`, `GRADE`) VALUES
('S111', 'CS111', 'A'),
('S111', 'CS112', 'A'),
('S111', 'CS211', 'A'),
('S111', 'MA111', 'A+'),
('S111', 'MA112', 'B+'),
('S111', 'MA161', 'A'),
('S111', 'ST131', 'A'),
('S111', 'UU100', 'A+'),
('S111', 'UU114', 'A+');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `COURSE_CODE` varchar(5) NOT NULL DEFAULT '0',
  `COURSE_NAME` varchar(255) NOT NULL,
  `SEMESTER` varchar(1) NOT NULL,
  `FEE` varchar(100) NOT NULL,
  `COURSE_DESC` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`COURSE_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`COURSE_CODE`, `COURSE_NAME`, `SEMESTER`, `FEE`, `COURSE_DESC`) VALUES
('CS111', 'Intro to Computing Science', '1', '$50', ''),
('CS112', 'Data Structures and Algorithms', '2', '$50', ''),
('CS211', 'Computer Organization', '1', '$50', ''),
('CS214', 'Design & Analysis of Algorithms', '2', '$50', ''),
('CS240', 'Software Engineering', '1', '$50', ''),
('CS241', 'Software Design and Implementation', '2', '$50', ''),
('CS310', 'Computer Networks', '1', '$50', ''),
('CS311', 'Operating Systems', '1', '$50', ''),
('CS324', 'Distributed Computing', '2', '$50', ''),
('CS341', 'Distributed Computing', '2', '$50', ''),
('IS222', 'Database Management Systems', '1', '$50', ''),
('IS224', 'Advanced Database Systems', '2', '$50', ''),
('IS314', 'Computing Project', '2', '$50', ''),
('IS333', 'Project Management', '1', '$50', ''),
('MA111', 'Calculus 1 & Linear ALgebra 1', '1', '$50', ''),
('MA112', 'Calculus 2', '2', '$50', ''),
('MA161', 'Discrete Mathematics I', '2', '$50', ''),
('ST131', 'Introduction to Satistics', '1', '$50', ''),
('UU100', 'Communications and informations literacy', '1', '$50', ''),
('UU114', 'English for Acedemic Purposes', '2', '$50', ''),
('UU200', 'Ethics and Governance', '1', '$50', ''),
('UU204', 'Pacific Worlds', '2', '$50', '');

-- --------------------------------------------------------

--
-- Table structure for table `prerequisities`
--

DROP TABLE IF EXISTS `prerequisities`;
CREATE TABLE IF NOT EXISTS `prerequisities` (
  `COURSE_CODE` varchar(5) NOT NULL DEFAULT '0',
  `COURSE_CODE_COMP` varchar(5) NOT NULL DEFAULT '0',
  `COURSE_CODE_ALT` varchar(5) DEFAULT '0',
  PRIMARY KEY (`COURSE_CODE`,`COURSE_CODE_COMP`),
  KEY `FK_PRCCC` (`COURSE_CODE_COMP`),
  KEY `FK_PRCCA` (`COURSE_CODE_ALT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prerequisities`
--

INSERT INTO `prerequisities` (`COURSE_CODE`, `COURSE_CODE_COMP`, `COURSE_CODE_ALT`) VALUES
('CS211', 'CS112', NULL),
('CS240', 'CS112', NULL),
('CS341', 'CS241', NULL),
('IS314', 'IS333', 'IS224'),
('MA112', 'MA111', 'MA161');

-- --------------------------------------------------------

--
-- Table structure for table `prog_courses`
--

DROP TABLE IF EXISTS `prog_courses`;
CREATE TABLE IF NOT EXISTS `prog_courses` (
  `PROG_NAME` varchar(255) NOT NULL DEFAULT '0',
  `PROG_YEAR` varchar(4) NOT NULL,
  `COURSE_1` varchar(5) DEFAULT NULL,
  `COURSE_2` varchar(5) DEFAULT NULL,
  `COURSE_3` varchar(5) DEFAULT NULL,
  `COURSE_4` varchar(5) DEFAULT NULL,
  `COURSE_5` varchar(5) DEFAULT NULL,
  `COURSE_6` varchar(5) DEFAULT NULL,
  `COURSE_7` varchar(5) DEFAULT NULL,
  `COURSE_8` varchar(5) DEFAULT NULL,
  `COURSE_9` varchar(5) DEFAULT NULL,
  `COURSE_10` varchar(5) DEFAULT NULL,
  `COURSE_11` varchar(5) DEFAULT NULL,
  `COURSE_12` varchar(5) DEFAULT NULL,
  `COURSE_13` varchar(5) DEFAULT NULL,
  `COURSE_14` varchar(5) DEFAULT NULL,
  `COURSE_15` varchar(5) DEFAULT NULL,
  `COURSE_16` varchar(5) DEFAULT NULL,
  `COURSE_17` varchar(5) DEFAULT NULL,
  `COURSE_18` varchar(5) DEFAULT NULL,
  `COURSE_19` varchar(5) DEFAULT NULL,
  `COURSE_20` varchar(5) DEFAULT NULL,
  `COURSE_21` varchar(5) DEFAULT NULL,
  `COURSE_22` varchar(5) DEFAULT NULL,
  `COURSE_23` varchar(5) DEFAULT NULL,
  `COURSE_24` varchar(5) DEFAULT NULL,
  `COURSE_25` varchar(5) DEFAULT NULL,
  `COURSE_26` varchar(5) DEFAULT NULL,
  `COURSE_27` varchar(5) DEFAULT NULL,
  `COURSE_28` varchar(5) DEFAULT NULL,
  `COURSE_29` varchar(5) DEFAULT NULL,
  `COURSE_30` varchar(5) DEFAULT NULL,
  `COURSE_31` varchar(5) DEFAULT NULL,
  `COURSE_32` varchar(5) DEFAULT NULL,
  `COURSE_33` varchar(5) DEFAULT NULL,
  `COURSE_34` varchar(5) DEFAULT NULL,
  `COURSE_35` varchar(5) DEFAULT NULL,
  `COURSE_36` varchar(5) DEFAULT NULL,
  `COURSE_37` varchar(5) DEFAULT NULL,
  `COURSE_38` varchar(5) DEFAULT NULL,
  `COURSE_39` varchar(5) DEFAULT NULL,
  `COURSE_40` varchar(5) DEFAULT NULL,
  `COURSE_41` varchar(5) DEFAULT NULL,
  `COURSE_42` varchar(5) DEFAULT NULL,
  `COURSE_43` varchar(5) DEFAULT NULL,
  `COURSE_44` varchar(5) DEFAULT NULL,
  `COURSE_45` varchar(5) DEFAULT NULL,
  `COURSE_46` varchar(5) DEFAULT NULL,
  `COURSE_47` varchar(5) DEFAULT NULL,
  `COURSE_48` varchar(5) DEFAULT NULL,
  `COURSE_49` varchar(5) DEFAULT NULL,
  `COURSE_50` varchar(5) DEFAULT NULL,
  `COURSE_51` varchar(5) DEFAULT NULL,
  `COURSE_52` varchar(5) DEFAULT NULL,
  `COURSE_53` varchar(5) DEFAULT NULL,
  `COURSE_54` varchar(5) DEFAULT NULL,
  `COURSE_55` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`PROG_NAME`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `STUDENT_ID` varchar(9) NOT NULL DEFAULT '0',
  `COURSE_CODE` varchar(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`STUDENT_ID`,`COURSE_CODE`),
  KEY `FK_RCC` (`COURSE_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `STAFF_ID` varchar(20) NOT NULL DEFAULT '0',
  `ST_Password` varchar(255) NOT NULL DEFAULT '0',
  `ACCESS_LEVEL` varchar(30) NOT NULL DEFAULT '0',
  PRIMARY KEY (`STAFF_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`STAFF_ID`, `ST_Password`, `ACCESS_LEVEL`) VALUES
('H111', '$2y$10$.s5JxFw9UK877x/Bf9w9F.G5vYNHbZLS18ubCEdJcWXngmIjMZViC', 'Manager'),
('H112', '$2y$10$w3i98fdnl0Z1E83x9NREJO1IsmwZ.mVzV.sHHt7LUexF7IsV3CP0e', 'Academic');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `STUDENT_ID` varchar(9) NOT NULL DEFAULT '0',
  `GENDER` varchar(5) NOT NULL,
  `First_Name` varchar(40) NOT NULL,
  `Other_Name` varchar(100) DEFAULT NULL,
  `Last_Name` varchar(40) NOT NULL,
  `S_Password` varchar(255) NOT NULL,
  `Email` varchar(40) NOT NULL DEFAULT '0',
  `Phone_Number` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`STUDENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`STUDENT_ID`, `GENDER`, `First_Name`, `Other_Name`, `Last_Name`, `S_Password`, `Email`, `Phone_Number`) VALUES
('S111', 'Male', 'Patrick', NULL, 'Chip', '$2y$10$cY6IDD6rZKKXAwb6LZcWI.xJE9fhXf6O9S3c5cg61r0gCS9FZk/xS', 'Chip', '+679 9790321');

-- --------------------------------------------------------

--
-- Table structure for table `student_prog`
--

DROP TABLE IF EXISTS `student_prog`;
CREATE TABLE IF NOT EXISTS `student_prog` (
  `STUDENT_ID` varchar(9) NOT NULL DEFAULT '0',
  `PROG_NAME` varchar(255) NOT NULL DEFAULT '0',
  `PROG_YEAR` varchar(4) NOT NULL,
  `COURSE_1` varchar(5) DEFAULT NULL,
  `COURSE_1_ALT` varchar(5) DEFAULT NULL,
  `COURSE_2` varchar(5) DEFAULT NULL,
  `COURSE_2_ALT` varchar(5) DEFAULT NULL,
  `COURSE_3` varchar(5) DEFAULT NULL,
  `COURSE_3_ALT` varchar(5) DEFAULT NULL,
  `COURSE_4` varchar(5) DEFAULT NULL,
  `COURSE_4_ALT` varchar(5) DEFAULT NULL,
  `COURSE_5` varchar(5) DEFAULT NULL,
  `COURSE_5_ALT` varchar(5) DEFAULT NULL,
  `COURSE_6` varchar(5) DEFAULT NULL,
  `COURSE_6_ALT` varchar(5) DEFAULT NULL,
  `COURSE_7` varchar(5) DEFAULT NULL,
  `COURSE_7_ALT` varchar(5) DEFAULT NULL,
  `COURSE_8` varchar(5) DEFAULT NULL,
  `COURSE_8_ALT` varchar(5) DEFAULT NULL,
  `COURSE_9` varchar(5) DEFAULT NULL,
  `COURSE_9_ALT` varchar(5) DEFAULT NULL,
  `COURSE_10` varchar(5) DEFAULT NULL,
  `COURSE_10_ALT` varchar(5) DEFAULT NULL,
  `COURSE_11` varchar(5) DEFAULT NULL,
  `COURSE_11_ALT` varchar(5) DEFAULT NULL,
  `COURSE_12` varchar(5) DEFAULT NULL,
  `COURSE_12_ALT` varchar(5) DEFAULT NULL,
  `COURSE_13` varchar(5) DEFAULT NULL,
  `COURSE_13_ALT` varchar(5) DEFAULT NULL,
  `COURSE_14` varchar(5) DEFAULT NULL,
  `COURSE_14_ALT` varchar(5) DEFAULT NULL,
  `COURSE_15` varchar(5) DEFAULT NULL,
  `COURSE_15_ALT` varchar(5) DEFAULT NULL,
  `COURSE_16` varchar(5) DEFAULT NULL,
  `COURSE_16_ALT` varchar(5) DEFAULT NULL,
  `COURSE_17` varchar(5) DEFAULT NULL,
  `COURSE_17_ALT` varchar(5) DEFAULT NULL,
  `COURSE_18` varchar(5) DEFAULT NULL,
  `COURSE_18_ALT` varchar(5) DEFAULT NULL,
  `COURSE_19` varchar(5) DEFAULT NULL,
  `COURSE_19_ALT` varchar(5) DEFAULT NULL,
  `COURSE_20` varchar(5) DEFAULT NULL,
  `COURSE_20_ALT` varchar(5) DEFAULT NULL,
  `COURSE_21` varchar(5) DEFAULT NULL,
  `COURSE_21_ALT` varchar(5) DEFAULT NULL,
  `COURSE_22` varchar(5) DEFAULT NULL,
  `COURSE_22_ALT` varchar(5) DEFAULT NULL,
  `COURSE_23` varchar(5) DEFAULT NULL,
  `COURSE_23_ALT` varchar(5) DEFAULT NULL,
  `COURSE_24` varchar(5) DEFAULT NULL,
  `COURSE_24_ALT` varchar(5) DEFAULT NULL,
  `COURSE_25` varchar(5) DEFAULT NULL,
  `COURSE_25_ALT` varchar(5) DEFAULT NULL,
  `COURSE_26` varchar(5) DEFAULT NULL,
  `COURSE_26_ALT` varchar(5) DEFAULT NULL,
  `COURSE_27` varchar(5) DEFAULT NULL,
  `COURSE_27_ALT` varchar(5) DEFAULT NULL,
  `COURSE_28` varchar(5) DEFAULT NULL,
  `COURSE_28_ALT` varchar(5) DEFAULT NULL,
  `COURSE_29` varchar(5) DEFAULT NULL,
  `COURSE_29_ALT` varchar(5) DEFAULT NULL,
  `COURSE_30` varchar(5) DEFAULT NULL,
  `COURSE_30_ALT` varchar(5) DEFAULT NULL,
  `COURSE_31` varchar(5) DEFAULT NULL,
  `COURSE_31_ALT` varchar(5) DEFAULT NULL,
  `COURSE_32` varchar(5) DEFAULT NULL,
  `COURSE_32_ALT` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`STUDENT_ID`,`PROG_NAME`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_prog`
--

INSERT INTO `student_prog` (`STUDENT_ID`, `PROG_NAME`, `PROG_YEAR`, `COURSE_1`, `COURSE_1_ALT`, `COURSE_2`, `COURSE_2_ALT`, `COURSE_3`, `COURSE_3_ALT`, `COURSE_4`, `COURSE_4_ALT`, `COURSE_5`, `COURSE_5_ALT`, `COURSE_6`, `COURSE_6_ALT`, `COURSE_7`, `COURSE_7_ALT`, `COURSE_8`, `COURSE_8_ALT`, `COURSE_9`, `COURSE_9_ALT`, `COURSE_10`, `COURSE_10_ALT`, `COURSE_11`, `COURSE_11_ALT`, `COURSE_12`, `COURSE_12_ALT`, `COURSE_13`, `COURSE_13_ALT`, `COURSE_14`, `COURSE_14_ALT`, `COURSE_15`, `COURSE_15_ALT`, `COURSE_16`, `COURSE_16_ALT`, `COURSE_17`, `COURSE_17_ALT`, `COURSE_18`, `COURSE_18_ALT`, `COURSE_19`, `COURSE_19_ALT`, `COURSE_20`, `COURSE_20_ALT`, `COURSE_21`, `COURSE_21_ALT`, `COURSE_22`, `COURSE_22_ALT`, `COURSE_23`, `COURSE_23_ALT`, `COURSE_24`, `COURSE_24_ALT`, `COURSE_25`, `COURSE_25_ALT`, `COURSE_26`, `COURSE_26_ALT`, `COURSE_27`, `COURSE_27_ALT`, `COURSE_28`, `COURSE_28_ALT`, `COURSE_29`, `COURSE_29_ALT`, `COURSE_30`, `COURSE_30_ALT`, `COURSE_31`, `COURSE_31_ALT`, `COURSE_32`, `COURSE_32_ALT`) VALUES
('S111', 'Bachelor of Software Engineering ', '2016', 'CS111', NULL, 'MA111', NULL, 'ST131', NULL, 'UU100', NULL, 'UU114', NULL, 'MA161', NULL, 'MA112', NULL, 'CS112', NULL, 'CS211', NULL, 'CS240', NULL, 'UU200', NULL, 'IS222', NULL, 'IS221', 'IS224', 'UU204', NULL, 'CS214', NULL, 'CS241', NULL, 'CS311', NULL, 'CS324', NULL, 'CS310', NULL, 'IS333', NULL, 'CS341', NULL, 'IS314', NULL, 'CS400', NULL, 'CS415', NULL, 'CS424', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comp_course`
--
ALTER TABLE `comp_course`
  ADD CONSTRAINT `FK_CCCC` FOREIGN KEY (`COURSE_CODE`) REFERENCES `courses` (`COURSE_CODE`),
  ADD CONSTRAINT `FK_CCSI` FOREIGN KEY (`STUDENT_ID`) REFERENCES `student` (`STUDENT_ID`);

--
-- Constraints for table `prerequisities`
--
ALTER TABLE `prerequisities`
  ADD CONSTRAINT `FK_PRCC` FOREIGN KEY (`COURSE_CODE`) REFERENCES `courses` (`COURSE_CODE`),
  ADD CONSTRAINT `FK_PRCCA` FOREIGN KEY (`COURSE_CODE_ALT`) REFERENCES `courses` (`COURSE_CODE`),
  ADD CONSTRAINT `FK_PRCCC` FOREIGN KEY (`COURSE_CODE_COMP`) REFERENCES `courses` (`COURSE_CODE`);

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `FK_RCC` FOREIGN KEY (`COURSE_CODE`) REFERENCES `courses` (`COURSE_CODE`);

--
-- Constraints for table `student_prog`
--
ALTER TABLE `student_prog`
  ADD CONSTRAINT `FK_SPSI` FOREIGN KEY (`STUDENT_ID`) REFERENCES `student` (`STUDENT_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

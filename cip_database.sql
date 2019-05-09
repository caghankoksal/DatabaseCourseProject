-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2018 at 03:08 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cip_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `advises_project`
--

CREATE TABLE `advises_project` (
  `stu_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `day` varchar(15) DEFAULT NULL,
  `term_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `advisor`
--

CREATE TABLE `advisor` (
  `stu_id` int(11) NOT NULL,
  `adv_from` int(11) NOT NULL,
  `adv_to` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advisor`
--

INSERT INTO `advisor` (`stu_id`, `adv_from`, `adv_to`) VALUES
(20111, 2016, NULL),
(20112, 2016, NULL),
(20214, 2015, 2016),
(20422, 2017, NULL),
(20989, 2015, 2020);

-- --------------------------------------------------------

--
-- Table structure for table `cooperate_in`
--

CREATE TABLE `cooperate_in` (
  `org_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `has`
--

CREATE TABLE `has` (
  `grade` int(11) DEFAULT NULL,
  `project_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `manages`
--

CREATE TABLE `manages` (
  `stu_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manages`
--

INSERT INTO `manages` (`stu_id`, `project_id`) VALUES
(18676, 20170205),
(18947, 20170207),
(18947, 20170210),
(18947, 20170211),
(20112, 20170201),
(20112, 20170203),
(20112, 20170212),
(20214, 20170202),
(20214, 20170206),
(20214, 20170208),
(20214, 20170209),
(20588, 20170204),
(20588, 20170213),
(20878, 20170207),
(20878, 20170214),
(20878, 20170215),
(20878, 20170216);

-- --------------------------------------------------------

--
-- Table structure for table `office_staffs`
--

CREATE TABLE `office_staffs` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `office_staffs`
--

INSERT INTO `office_staffs` (`staff_id`, `staff_name`) VALUES
(1, 'ferdi Ayaz'),
(2, 'Asli Acar'),
(3, 'Nese Aktug'),
(4, 'Nazli Akcig');

-- --------------------------------------------------------

--
-- Table structure for table `ofiscan_login`
--

CREATE TABLE `ofiscan_login` (
  `ofiscan_id` int(11) NOT NULL,
  `userName` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `passwordS` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `ofiscan_login`
--

INSERT INTO `ofiscan_login` (`ofiscan_id`, `userName`, `passwordS`) VALUES
(55, 'ck', 'ck'),
(1, 'ferdiayaz', 'besiktas'),
(2, 'asliacar', 'canlar'),
(3, 'neseaktug', 'nese'),
(4, 'nazliakcig', 'cilgin'),
(5, 'bc', 'bc'),
(7, 'berko', 'zaa'),
(6, 'det', 'det');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `contact_pname` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `adress` varchar(200) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `org_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oversees_project`
--

CREATE TABLE `oversees_project` (
  `staff_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `day` varchar(15) DEFAULT NULL,
  `term_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `term_id` int(11) DEFAULT NULL,
  `day` varchar(15) DEFAULT NULL,
  `p_name` varchar(200) NOT NULL,
  `capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `term_id`, `day`, `p_name`, `capacity`) VALUES
(566565, 0, '', '', 0),
(20170201, 201702, 'Thursday', 'English With Kids', 17),
(20170202, 201702, 'Thursday', 'KASEV Elderly Home', 16),
(20170203, 201702, 'Monday', 'Science With Kids', 14),
(20170204, 201702, 'Tuesday', 'Self Esteem for Teens', 12),
(20170205, 201702, 'Tuesday', 'Animal Rights', 23),
(20170206, 201702, 'Friday', 'Animal Rights', 21),
(20170207, 201702, 'Wednesday', 'Human Rights', 17),
(20170208, 201702, 'Thursday', 'Game Design For Children', 9),
(20170209, 201702, 'Wednesday', 'Turkish for Syrian Children', 13),
(20170210, 201702, 'Wednesday', 'Theatre With Kids', 15),
(20170211, 201702, 'Thursday', 'Kids at School', 16),
(20170212, 201702, 'Thursday', 'Science for Children', 11),
(20170213, 201702, 'Friday', 'Science for Children', 13),
(20170214, 201702, 'Wednesday', 'Kids At School', 18),
(20170215, 201702, 'Tuesday', 'Cultural Heritage', 12),
(20170216, 201702, 'Thursday', 'Coding With Children', 14);

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `stu_id` int(11) NOT NULL,
  `sup_from` int(11) DEFAULT NULL,
  `sup_to` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`stu_id`, `sup_from`, `sup_to`) VALUES
(18676, 2012, NULL),
(18947, 2012, NULL),
(20097, 2016, 0),
(20112, 2013, 2017),
(20214, 2013, 2015),
(20588, 2015, NULL),
(20878, 2014, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `su_students`
--

CREATE TABLE `su_students` (
  `stu_id` int(11) NOT NULL,
  `stu_name` varchar(50) DEFAULT NULL,
  `stu_entry_year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `su_students`
--

INSERT INTO `su_students` (`stu_id`, `stu_name`, `stu_entry_year`) VALUES
(0, '$dataList[$x]', 0),
(2843, 'Caner Kan', 2011),
(11111, 'Zaa', 2001),
(18676, 'Kadir Can Eksi', 2012),
(18947, 'Hacer Bilen', 2010),
(20097, 'Kevser Agar', 2014),
(20111, 'Irem Efe', 2014),
(20112, 'Ipek Efe', 2014),
(20214, 'Baris Batuhan ', 2016),
(20267, 'Zeynep Birinci', 2014),
(20413, 'Berk Ozturk', 2015),
(20422, 'Banu Cetinkaya', 2015),
(20494, 'Özlem Kart', 2014),
(20588, 'Caghan Koksal', 2015),
(20777, 'Bugra Sulek', 2017),
(20779, 'Mert IncÄ±', 2016),
(20878, 'Cansu Sezer', 2016),
(20989, 'Deren Ege Turan', 2015),
(24081, 'ayse', 2015),
(24365, 'Yeey', 2015),
(26701, 'Tugce Yilmaz', 2014);

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `stu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advises_project`
--
ALTER TABLE `advises_project`
  ADD PRIMARY KEY (`stu_id`,`project_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `advisor`
--
ALTER TABLE `advisor`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `cooperate_in`
--
ALTER TABLE `cooperate_in`
  ADD PRIMARY KEY (`org_id`,`project_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `has`
--
ALTER TABLE `has`
  ADD PRIMARY KEY (`stu_id`,`project_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `manages`
--
ALTER TABLE `manages`
  ADD PRIMARY KEY (`stu_id`,`project_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `office_staffs`
--
ALTER TABLE `office_staffs`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`org_id`);

--
-- Indexes for table `oversees_project`
--
ALTER TABLE `oversees_project`
  ADD PRIMARY KEY (`staff_id`,`project_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `su_students`
--
ALTER TABLE `su_students`
  ADD PRIMARY KEY (`stu_id`),
  ADD UNIQUE KEY `stu_id` (`stu_id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`stu_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advises_project`
--
ALTER TABLE `advises_project`
  ADD CONSTRAINT `advises_project_ibfk_1` FOREIGN KEY (`stu_id`) REFERENCES `advisor` (`stu_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `advises_project_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE;

--
-- Constraints for table `advisor`
--
ALTER TABLE `advisor`
  ADD CONSTRAINT `advisor_ibfk_1` FOREIGN KEY (`stu_id`) REFERENCES `su_students` (`stu_id`) ON DELETE CASCADE;

--
-- Constraints for table `cooperate_in`
--
ALTER TABLE `cooperate_in`
  ADD CONSTRAINT `cooperate_in_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE;

--
-- Constraints for table `has`
--
ALTER TABLE `has`
  ADD CONSTRAINT `has_ibfk_1` FOREIGN KEY (`stu_id`) REFERENCES `su_students` (`stu_id`),
  ADD CONSTRAINT `has_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`);

--
-- Constraints for table `manages`
--
ALTER TABLE `manages`
  ADD CONSTRAINT `manages_ibfk_1` FOREIGN KEY (`stu_id`) REFERENCES `supervisors` (`stu_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `manages_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE;

--
-- Constraints for table `oversees_project`
--
ALTER TABLE `oversees_project`
  ADD CONSTRAINT `oversees_project_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `office_staffs` (`staff_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `oversees_project_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE NO ACTION;

--
-- Constraints for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD CONSTRAINT `supervisors_ibfk_1` FOREIGN KEY (`stu_id`) REFERENCES `su_students` (`stu_id`) ON DELETE CASCADE;

--
-- Constraints for table `team_members`
--
ALTER TABLE `team_members`
  ADD CONSTRAINT `team_members_ibfk_1` FOREIGN KEY (`stu_id`) REFERENCES `su_students` (`stu_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

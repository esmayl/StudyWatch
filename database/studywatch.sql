-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2018 at 07:29 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studywatch`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendency`
--

CREATE TABLE `attendency` (
  `ID` int(11) NOT NULL,
  `student_id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `class_id` int(10) NOT NULL,
  `attendance` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendency`
--

INSERT INTO `attendency` (`ID`, `student_id`, `subject_id`, `class_id`, `attendance`) VALUES
(35, 1, 1, 1, 'Aanwezig'),
(36, 1, 1, 2, 'Aanwezig'),
(37, 1, 1, 3, 'Aanwezig'),
(38, 1, 1, 4, 'Afwezig'),
(39, 1, 2, 1, 'Aanwezig'),
(40, 1, 2, 2, 'Aanwezig'),
(41, 1, 2, 3, 'Aanwezig'),
(42, 1, 2, 4, 'Afwezig'),
(43, 1, 3, 1, 'Aanwezig'),
(44, 1, 3, 2, 'Aanwezig'),
(45, 1, 3, 3, 'Aanwezig'),
(46, 1, 3, 4, 'Afwezig'),
(47, 1, 4, 1, 'Aanwezig'),
(48, 1, 4, 2, 'Aanwezig'),
(49, 1, 4, 3, 'Aanwezig'),
(50, 1, 4, 4, 'Afwezig'),
(51, 1, 5, 1, 'Aanwezig'),
(52, 1, 5, 2, 'Aanwezig'),
(53, 1, 5, 3, 'Aanwezig'),
(54, 1, 5, 4, 'Afwezig'),
(55, 1, 6, 1, 'Aanwezig'),
(56, 1, 6, 2, 'Aanwezig'),
(57, 1, 6, 3, 'Aanwezig'),
(58, 1, 6, 4, 'Afwezig'),
(59, 2, 1, 1, 'Afwezig'),
(60, 2, 1, 2, 'Aanwezig'),
(61, 2, 1, 3, 'Aanwezig'),
(62, 2, 1, 4, 'Afwezig'),
(63, 2, 2, 1, 'Afwezig'),
(64, 2, 2, 2, 'Afwezig'),
(65, 2, 2, 3, 'Aanwezig'),
(66, 2, 2, 4, 'Afwezig'),
(67, 2, 3, 1, 'Aanwezig'),
(68, 2, 3, 2, 'Afwezig'),
(69, 2, 3, 3, 'Aanwezig'),
(70, 2, 3, 4, 'Afwezig'),
(71, 2, 4, 1, 'Afwezig'),
(72, 2, 4, 2, 'Aanwezig'),
(73, 2, 4, 3, 'Aanwezig'),
(74, 2, 4, 4, 'Afwezig'),
(75, 2, 5, 1, 'Afwezig'),
(76, 2, 5, 2, 'Afwezig'),
(77, 2, 5, 3, 'Afwezig'),
(78, 2, 5, 4, 'Afwezig'),
(79, 2, 6, 1, 'Aanwezig'),
(80, 2, 6, 2, 'Afwezig'),
(81, 2, 6, 3, 'Aanwezig'),
(82, 2, 6, 4, 'Afwezig'),
(83, 3, 1, 1, 'Afwezig'),
(84, 3, 1, 2, 'Afwezig'),
(85, 3, 1, 3, 'Aanwezig'),
(86, 3, 1, 4, 'Afwezig'),
(87, 3, 2, 1, 'Afwezig'),
(88, 3, 2, 2, 'Afwezig'),
(89, 3, 2, 3, 'Aanwezig'),
(90, 3, 2, 4, 'Afwezig'),
(91, 3, 3, 1, 'Afwezig'),
(92, 3, 3, 2, 'Afwezig'),
(93, 3, 3, 3, 'Aanwezig'),
(94, 3, 3, 4, 'Afwezig'),
(95, 3, 4, 1, 'Afwezig'),
(96, 3, 4, 2, 'Aanwezig'),
(97, 3, 4, 3, 'Aanwezig'),
(98, 3, 4, 4, 'Afwezig'),
(99, 3, 5, 1, 'Afwezig'),
(100, 3, 5, 2, 'Afwezig'),
(101, 3, 5, 3, 'Afwezig'),
(102, 3, 5, 4, 'Afwezig'),
(103, 3, 6, 1, 'Aanwezig'),
(104, 3, 6, 2, 'Afwezig'),
(105, 3, 6, 3, 'Afwezig'),
(106, 3, 6, 4, 'Afwezig');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `classesPast` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `subject_id`, `classesPast`) VALUES
(1, 2, 4),
(2, 1, 4),
(3, 4, 4),
(4, 3, 4),
(5, 6, 4),
(6, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `password`) VALUES
(1, 'Coen Modderman', 's1114579@student.windesheim.nl', '$2y$10$GLcVIq.GFkCKxjXZ2ulGNe7a7guwbyEFiwi296BMb6zPPMjWNEF3q'),
(2, 'Darrel Mungra', 's1101781@student.windesheim.nl', '$2y$10$UukyRpNOwi68zXLQnyN5GOyok0AXjmkHII0k/Hs2j0RAhBi0Oa4j.'),
(3, 'Esmayl Mourad', 's1121415@student.windesheim.nl', '$2y$10$8oyZmckXvSoZQUkZlRzhlODWio.xu1BanfqxK8t1X9OLNRoZ/boMy');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `teacher_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `teacher_id`) VALUES
(1, 'Implementeren & Testen', 2),
(2, 'Digitale Wereld', 1),
(3, 'Multimedia & Design', 1),
(4, 'Interaction Design', 2),
(5, 'Schriftelijke Communicatie', 3),
(6, 'Organisatie & Management', 3);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_sb` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `password`, `is_sb`) VALUES
(1, 'Menno Koetsier', 'menno.koetsier@windesheimflevoland.nl', '$2y$10$8oyZmckXvSoZQUkZlRzhlODWio.xu1BanfqxK8t1X9OLNRoZ/boMy', 0),
(2, 'Hans Bastiaan', 'h.bastiaan@windesheimflevoland.nl', 'koekje123', 0),
(3, 'Tjerk Van Westing', 't.van.westing@windesheimflevoland.nl', '$2y$10$8oyZmckXvSoZQUkZlRzhlODWio.xu1BanfqxK8t1X9OLNRoZ/boMy', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

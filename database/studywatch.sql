-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 01 jun 2018 om 15:51
-- Serverversie: 10.1.26-MariaDB
-- PHP-versie: 7.1.8

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
-- Tabelstructuur voor tabel `attendency`
--

CREATE TABLE `attendency` (
  `student_id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `class_id` int(10) NOT NULL,
  `attendance` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `password`) VALUES
(1, 'Coen Modderman', 's1114579@student.windesheim.nl', 'koekje123'),
(2, 'Darrel Mungra', 's1101781@student.windesheim.nl', 'beshuit123');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `subject`
--

CREATE TABLE `subject` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `teacher_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_sb` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `password`, `is_sb`) VALUES
(1, 'Menno Koetsier', 'menno.koetsier@windesheimflevoland.nl', 'koekje123', 0),
(2, 'Hans Bastiaan', 'h.bastiaan@windesheimflevoland.nl', 'koekje123', 0),
(3, 'Tjerk Van Westing', 't.van.westing@windesheimflevoland.nl', 'koekje123', 1);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `attendency`
--
ALTER TABLE `attendency`
  ADD KEY `class_id` (`class_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexen voor tabel `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexen voor tabel `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexen voor tabel `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `attendency`
--
ALTER TABLE `attendency`
  ADD CONSTRAINT `attendency_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `attendency_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `attendency_ibfk_3` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`);

--
-- Beperkingen voor tabel `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`);

--
-- Beperkingen voor tabel `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

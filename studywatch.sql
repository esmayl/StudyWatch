-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 01 jun 2018 om 13:31
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
-- Tabelstructuur voor tabel `studenten`
--

CREATE TABLE `studenten` (
  `Naam` varchar(50) NOT NULL,
  `A. Implementeren & Testen` int(11) NOT NULL,
  `A. Digitale Wereld` int(11) NOT NULL,
  `A. Multimedia & Design` int(11) NOT NULL,
  `A. Interaction Design` int(11) NOT NULL,
  `A. Schriftelijke Communicatie` int(11) NOT NULL,
  `A. Organisatie & Management` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `studenten`
--

INSERT INTO `studenten` (`Naam`, `A. Implementeren & Testen`, `A. Digitale Wereld`, `A. Multimedia & Design`, `A. Interaction Design`, `A. Schriftelijke Communicatie`, `A. Organisatie & Management`) VALUES
('Esmayl Mourad', 1, 0, 0, 0, 1, 0),
('Demy Danielsson', 6, 6, 6, 3, 6, 6),
('Darrel Mungra', 3, 3, 3, 2, 3, 3),
('Mark Mulder', 3, 3, 3, 2, 3, 3),
('Coen Modderman', 6, 6, 6, 3, 6, 6),
('Michel Bulten', 0, 0, 0, 0, 0, 0),
('', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vakken`
--

CREATE TABLE `vakken` (
  `vak` varchar(50) NOT NULL,
  `lessen` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `vakken`
--

INSERT INTO `vakken` (`vak`, `lessen`) VALUES
('Implementeren & Testen', 6),
('Digitale Wereld', 6),
('Multimedia & Design', 6),
('Interaction Design', 3),
('Schriftelijke communicatie', 6),
('Organisatie & Management', 6);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 20 sep 2023 om 13:42
-- Serverversie: 10.4.28-MariaDB
-- PHP-versie: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cursusphp`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `chatberichten`
--

CREATE TABLE `chatberichten` (
  `id` int(11) NOT NULL,
  `nickname` varchar(4) NOT NULL,
  `boodschap` varchar(200) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `chatberichten`
--

INSERT INTO `chatberichten` (`id`, `nickname`, `boodschap`, `datum`) VALUES
(1, 'p114', 'hello', '2023-09-15'),
(2, 'TheK', 'Heeey', '2023-09-15'),
(3, 'p114', 'how are you', '2023-09-15'),
(4, 'TheK', 'Great!', '2023-09-15');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `films`
--

CREATE TABLE `films` (
  `id` int(10) UNSIGNED NOT NULL,
  `titel` varchar(150) NOT NULL,
  `duurtijd` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `films`
--

INSERT INTO `films` (`id`, `titel`, `duurtijd`) VALUES
(1, 'Shawshank Redemption, The', 142),
(2, 'Godfather, The', 168),
(3, 'Green Mile, The', 188),
(4, 'Pulp Fiction', 154),
(5, 'Once Upon a Time in the West', 165),
(6, 'Lord of the Rings: The Return of the King, The', 201),
(7, 'Se7en', 127),
(8, 'Schindler\'s List', 195),
(9, 'Forrest Gump', 142),
(10, 'Shutter Island', 147),
(18, 'AhmadsMan', 124),
(24, 'Yes man!', 134);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gastenboek`
--

CREATE TABLE `gastenboek` (
  `id` int(10) UNSIGNED NOT NULL,
  `auteur` varchar(45) NOT NULL,
  `boodschap` varchar(250) NOT NULL,
  `datum` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `gastenboek`
--

INSERT INTO `gastenboek` (`id`, `auteur`, `boodschap`, `datum`) VALUES
(2, 'Bezoeker', 'Even testen of het gastenboek werkt...', '2010-05-11 09:22:44'),
(3, 'Admin', 'Het werkt inderdaad.', '2010-05-11 09:24:13'),
(4, 'Ahmad', 'GG!', '2023-09-15 11:11:30');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `naam` varchar(50) NOT NULL,
  `prijs` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `modules`
--

INSERT INTO `modules` (`id`, `naam`, `prijs`) VALUES
(1, 'Programmatielogica', 75),
(2, 'Computers en netwerken', 130),
(4, 'SQL', 99.9),
(5, 'Objectgeoriënteerde principes', 85),
(6, 'Javascript / DOM', 140),
(7, 'JQuery', 120),
(8, 'UML', 90),
(9, 'PHP', 140),
(11, 'XHTML/CSS', 120);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `personen`
--

CREATE TABLE `personen` (
  `id` int(10) UNSIGNED NOT NULL,
  `familienaam` varchar(50) NOT NULL,
  `voornaam` varchar(30) NOT NULL,
  `geboortedatum` date NOT NULL,
  `geslacht` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `personen`
--

INSERT INTO `personen` (`id`, `familienaam`, `voornaam`, `geboortedatum`, `geslacht`) VALUES
(1, 'Peeters', 'Bram', '1976-01-19', 'M'),
(2, 'Van Dessel', 'Rudy', '1969-10-05', 'M'),
(3, 'Vereecken', 'Marie', '1981-05-23', 'V'),
(4, 'Maes', 'Eveline', '1983-08-16', 'V'),
(5, 'Vangeel', 'Joke', '1976-05-22', 'V'),
(6, 'Van Heule', 'Pieter', '1968-03-02', 'M'),
(7, 'Naessens', 'Katleen', '1984-05-12', 'V'),
(8, 'Sleeuwaert', 'Koen', '1957-02-25', 'M');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `punten`
--

CREATE TABLE `punten` (
  `punten` int(11) NOT NULL,
  `moduleID` int(10) UNSIGNED NOT NULL,
  `persoonID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `punten`
--

INSERT INTO `punten` (`punten`, `moduleID`, `persoonID`) VALUES
(78, 1, 1),
(70, 1, 5),
(20, 2, 1),
(80, 4, 1),
(76, 4, 2),
(57, 4, 3),
(72, 4, 5),
(82, 5, 2),
(22, 5, 7),
(54, 6, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vieropeenrij_spelbord`
--

CREATE TABLE `vieropeenrij_spelbord` (
  `rijnummer` smallint(5) UNSIGNED NOT NULL,
  `kolomnummer` smallint(5) UNSIGNED NOT NULL,
  `status` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `vieropeenrij_spelbord`
--

INSERT INTO `vieropeenrij_spelbord` (`rijnummer`, `kolomnummer`, `status`) VALUES
(1, 1, 0),
(1, 2, 0),
(1, 3, 0),
(1, 4, 0),
(1, 5, 0),
(1, 6, 0),
(1, 7, 0),
(2, 1, 0),
(2, 2, 0),
(2, 3, 0),
(2, 4, 0),
(2, 5, 0),
(2, 6, 0),
(2, 7, 0),
(3, 1, 0),
(3, 2, 0),
(3, 3, 0),
(3, 4, 0),
(3, 5, 0),
(3, 6, 0),
(3, 7, 0),
(4, 1, 0),
(4, 2, 0),
(4, 3, 0),
(4, 4, 0),
(4, 5, 0),
(4, 6, 0),
(4, 7, 0),
(5, 1, 0),
(5, 2, 0),
(5, 3, 0),
(5, 4, 0),
(5, 5, 0),
(5, 6, 0),
(5, 7, 0),
(6, 1, 0),
(6, 2, 0),
(6, 3, 0),
(6, 4, 0),
(6, 5, 0),
(6, 6, 0),
(6, 7, 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `chatberichten`
--
ALTER TABLE `chatberichten`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `gastenboek`
--
ALTER TABLE `gastenboek`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `personen`
--
ALTER TABLE `personen`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `punten`
--
ALTER TABLE `punten`
  ADD UNIQUE KEY `moduleID` (`moduleID`,`persoonID`),
  ADD KEY `persoonID` (`persoonID`);

--
-- Indexen voor tabel `vieropeenrij_spelbord`
--
ALTER TABLE `vieropeenrij_spelbord`
  ADD PRIMARY KEY (`rijnummer`,`kolomnummer`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `chatberichten`
--
ALTER TABLE `chatberichten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `films`
--
ALTER TABLE `films`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT voor een tabel `gastenboek`
--
ALTER TABLE `gastenboek`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `personen`
--
ALTER TABLE `personen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `punten`
--
ALTER TABLE `punten`
  ADD CONSTRAINT `punten_ibfk_1` FOREIGN KEY (`moduleID`) REFERENCES `modules` (`id`),
  ADD CONSTRAINT `punten_ibfk_2` FOREIGN KEY (`persoonID`) REFERENCES `personen` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

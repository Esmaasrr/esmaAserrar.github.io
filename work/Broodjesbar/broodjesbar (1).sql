-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 20 nov 2022 om 20:17
-- Serverversie: 10.4.24-MariaDB
-- PHP-versie: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `broodjesbar`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestellingen`
--

CREATE TABLE `bestellingen` (
  `bestelID` int(11) NOT NULL,
  `broodjeID` int(11) NOT NULL,
  `klantID` int(11) NOT NULL,
  `afhalingsmoment` datetime NOT NULL,
  `statusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `bestellingen`
--

INSERT INTO `bestellingen` (`bestelID`, `broodjeID`, `klantID`, `afhalingsmoment`, `statusID`) VALUES
(37, 1, 62, '2022-11-20 19:40:00', 2),
(38, 4, 63, '2022-11-20 20:40:00', 2),
(39, 4, 64, '2022-11-20 20:40:00', 2),
(40, 4, 65, '2022-11-20 20:40:00', 1),
(41, 4, 66, '2022-11-20 20:40:00', 1),
(42, 4, 67, '2022-11-20 20:40:00', 1),
(43, 10, 68, '2022-11-20 20:40:00', 2),
(44, 10, 69, '2022-11-20 20:40:00', 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `broodjes`
--

CREATE TABLE `broodjes` (
  `ID` int(11) NOT NULL,
  `Naam` varchar(50) NOT NULL,
  `Omschrijving` varchar(500) NOT NULL,
  `Prijs` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `broodjes`
--

INSERT INTO `broodjes` (`ID`, `Naam`, `Omschrijving`, `Prijs`) VALUES
(1, 'Kaas', 'Broodje met jonge kaas', '1.90'),
(2, 'Ham', 'Broodje met natuurham', '1.90'),
(3, 'Kaas en ham', 'Broodje met kaas en ham', '2.10'),
(4, 'Fitness kip', 'kip natuur, yoghurtdressing, perzik, tuinkers, tomaat en komkommer', '3.50'),
(5, 'Broodje Sombrero', 'kip natuur, andalousesaus, rode paprika, maïs, sla, komkommer, tomaat, ei en ui ', '3.70'),
(6, 'Broodje americain-tartaar', 'americain, tartaarsaus, ui, komkommer, ei en tuinkers ', '3.50'),
(7, 'Broodje Indian kip', 'kip natuur, ananas, tuinkers, komkommer en curry dressing', '4.00'),
(8, 'Grieks broodje', 'feta, tuinkers, komkommer, tomaat en olijventapenade', '3.90'),
(9, 'Tonijntino', 'tonijn pikant, ui, augurk, martinosaus en (tabasco)', '2.60'),
(10, 'Wrap exotisch', 'kip natuur, cocktailsaus, sla, tomaat, komkommer, ei en ananas', '3.70'),
(11, 'Wrap kip/spek', 'Kip natuur, spek, BBQ saus, sla, tomaat en komkommer', '4.00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE `klanten` (
  `klantID` int(11) NOT NULL,
  `voornaam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `achternaam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `klanten`
--

INSERT INTO `klanten` (`klantID`, `voornaam`, `achternaam`, `email`) VALUES
(1, 'Esm', '', 'esmaaserrar@gmail.com'),
(2, 'Esma', 'aserr', 'esma@gmail.com'),
(3, '', '', ''),
(4, 'sd', 'aserr', 'dde'),
(5, '', '', ''),
(6, '', '', ''),
(7, '', '', ''),
(8, '', '', ''),
(9, 'Lien', 'aserr', 'esmaaserrar@gmail.com'),
(10, 'Afnan', 'Aserrar', 'email@gmail;com'),
(11, 'Afnan', 'Aserrar', 'email@gmail;com'),
(12, 'Esma', 'aserr', 'esma@gmail.com'),
(13, 'Esma', 'aserr', 'esma@gmail.com'),
(14, 'Esma', 'aserr', 'esma@gmail.com'),
(15, 'es', 'Ea', 'e'),
(16, 'es', 'Ea', 'e'),
(17, 'es', 'Ea', 'e'),
(18, 'Esma', 'Aserrar', 'esmaaserrar@gmail.com'),
(19, 'es', 'aserr', 'esma@gmail.com'),
(20, 'es', 'aserr', 'esma@gmail.com'),
(21, 'es', 'aserr', 'esma@gmail.com'),
(22, 'es', 'Ea', 'esma@gmail.com'),
(23, 'es', 'Ea', 'esma@gmail.com'),
(24, 'es', 'Ea', 'esma@gmail.com'),
(25, 'es', 'Ea', 'esma@gmail.com'),
(26, 'es', 'Ea', 'esma@gmail.com'),
(27, 'es', 'Ea', 'esma@gmail.com'),
(28, 'es', 'Ea', 'esma@gmail.com'),
(29, 'es', 'Ea', 'esma@gmail.com'),
(30, 'es', 'Ea', 'esma@gmail.com'),
(31, 'es', 'Ea', 'esma@gmail.com'),
(32, 'es', 'Ea', 'esma@gmail.com'),
(33, 'es', 'Ea', 'esma@gmail.com'),
(34, 'es', 'Ea', 'esma@gmail.com'),
(35, 'es', 'Ea', 'esma@gmail.com'),
(36, 'es', 'Ea', 'esma@gmail.com'),
(37, 'es', 'Ea', 'esma@gmail.com'),
(38, 'es', 'Ea', 'esma@gmail.com'),
(39, 'es', 'Ea', 'esma@gmail.com'),
(40, 'es', 'Ea', 'esma@gmail.com'),
(41, 'es', 'Ea', 'esma@gmail.com'),
(42, 'Lien', 'Aserrar', 'dde'),
(43, 'es', 'aserr', 'esma@gmail.com'),
(44, 'es', 'aserr', 'esma@gmail.com'),
(45, 'es', 'aserr', 'esma@gmail.com'),
(46, 'Esma', 'Ea', 's'),
(47, 'Esma', 'Ea', 's'),
(48, 'Esma', 'Ea', 's'),
(49, 'Esma', 'aserr', 'esmaaserrar@gmail.com'),
(50, 'Esma', 'Ea', 's'),
(51, 'Esma', 'Ea', 's'),
(52, 'Esma', 'Aserrar', 'esmaaserrar@gmail.com'),
(53, 'es', 'aserr', 'esmaaserrar@gmail.com'),
(54, 'es', 'aserr', 'esmaaserrar@gmail.com'),
(55, 'es', 'aserr', 'esmaaserrar@gmail.com'),
(56, 'es', 'aserr', 'esmaaserrar@gmail.com'),
(57, 'es', 'aserr', 'esmaaserrar@gmail.com'),
(58, 'es', 'aserr', 'esmaaserrar@gmail.com'),
(59, 'es', 'aserr', 'esmaaserrar@gmail.com'),
(60, 'es', 'aserr', 'esmaaserrar@gmail.com'),
(61, 'es', 'aserr', 'esmaaserrar@gmail.com'),
(62, 'Esma', 'Aserrar', 'esmaaserrar@gmail.com'),
(63, 'Esma', 'Aserrar', 'esmaaserrar@gmail.com'),
(64, 'Esma', 'Aserrar', 'esmaaserrar@gmail.com'),
(65, 'Esma', 'Aserrar', 'esmaaserrar@gmail.com'),
(66, 'Esma', 'Aserrar', 'esmaaserrar@gmail.com'),
(67, 'Esma', 'Aserrar', 'esmaaserrar@gmail.com'),
(68, 'Esma', 'Aserrar', 'esmaaserrar@gmail.com'),
(69, 'Esma', 'Aserrar', 'esmaaserrar@gmail.com');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `statussen`
--

CREATE TABLE `statussen` (
  `statusID` int(11) NOT NULL,
  `Status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `statussen`
--

INSERT INTO `statussen` (`statusID`, `Status`) VALUES
(1, 'Besteld'),
(2, 'Gemaakt'),
(3, 'Afgehaald');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD PRIMARY KEY (`bestelID`),
  ADD KEY `broodjeID` (`broodjeID`),
  ADD KEY `klantID` (`klantID`),
  ADD KEY `statusID` (`statusID`);

--
-- Indexen voor tabel `broodjes`
--
ALTER TABLE `broodjes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`klantID`);

--
-- Indexen voor tabel `statussen`
--
ALTER TABLE `statussen`
  ADD PRIMARY KEY (`statusID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  MODIFY `bestelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT voor een tabel `broodjes`
--
ALTER TABLE `broodjes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `klanten`
--
ALTER TABLE `klanten`
  MODIFY `klantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT voor een tabel `statussen`
--
ALTER TABLE `statussen`
  MODIFY `statusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD CONSTRAINT `bestellingen_ibfk_1` FOREIGN KEY (`broodjeID`) REFERENCES `broodjes` (`ID`),
  ADD CONSTRAINT `bestellingen_ibfk_2` FOREIGN KEY (`statusID`) REFERENCES `statussen` (`statusID`),
  ADD CONSTRAINT `bestellingen_ibfk_3` FOREIGN KEY (`klantID`) REFERENCES `klanten` (`klantID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

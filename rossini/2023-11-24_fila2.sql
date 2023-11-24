-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Nov 23, 2023 alle 20:39
-- Versione del server: 10.1.38-MariaDB
-- Versione PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2023-11-24_fila2`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `artista`
--

CREATE TABLE `artista` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `genere` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `artista`
--

INSERT INTO `artista` (`id`, `nome`, `genere`) VALUES
(1, 'Adele', 'Pop'),
(2, 'Ed Sheeran', 'Pop'),
(3, 'Beyoncé', 'R&B'),
(4, 'Kendrick Lamar', 'Hip Hop'),
(5, 'Taylor Swift', 'Country'),
(6, 'Drake', 'Hip Hop'),
(7, 'Lady Gaga', 'Pop'),
(8, 'Bruno Mars', 'R&B'),
(9, 'Billie Eilish', 'Pop'),
(10, 'Frank Sinatra', 'Pop');

-- --------------------------------------------------------

--
-- Struttura della tabella `citta`
--

CREATE TABLE `citta` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `citta`
--

INSERT INTO `citta` (`id`, `nome`) VALUES
(1, 'Paris'),
(2, 'New York'),
(3, 'Tokyo'),
(4, 'London'),
(5, 'Rome'),
(6, 'Sydney'),
(7, 'Rio de Janeiro'),
(8, 'Istanbul'),
(9, 'Cairo'),
(10, 'Mumbai');

-- --------------------------------------------------------

--
-- Struttura della tabella `concerto`
--

CREATE TABLE `concerto` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `dataOra` datetime DEFAULT NULL,
  `fkCitta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `concerto`
--

INSERT INTO `concerto` (`id`, `nome`, `dataOra`, `fkCitta`) VALUES
(1, 'Summer Festival', '2023-07-15 18:30:00', 1),
(2, 'City Lights Concert', '2023-08-02 20:00:00', 2),
(3, 'Tokyo Jazz Night', '2023-09-10 19:45:00', 3),
(4, 'London Symphony Orchestra', '2023-10-05 19:00:00', 4),
(5, 'Roman Holiday Concert', '2023-11-20 18:15:00', 5),
(6, 'Opera House Gala', '2023-12-08 21:30:00', 6),
(7, 'Samba in Rio', '2023-07-25 19:00:00', 7),
(8, 'Bosphorus Symphony Night', '2023-08-15 20:45:00', 8),
(9, 'Pyramids Sound Experience', '2023-09-28 18:30:00', 9),
(10, 'Bollywood Beats', '2023-10-15 21:00:00', 10),
(11, 'Eiffel Tower Serenade', '2023-11-30 19:15:00', 1),
(12, 'Central Park Jazz Jam', '2023-12-18 20:30:00', 2),
(13, 'Cherry Blossom Symphony', '2024-01-22 18:45:00', 3),
(14, 'British Invasion Revival', '2024-02-10 21:15:00', 4),
(15, 'Colosseum Classics', '2024-03-05 19:30:00', 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `partecipa`
--

CREATE TABLE `partecipa` (
  `fkArtista` int(11) NOT NULL,
  `fkConcerto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `partecipa`
--

INSERT INTO `partecipa` (`fkArtista`, `fkConcerto`) VALUES
(1, 1),
(1, 3),
(1, 5),
(1, 7),
(1, 10),
(1, 13),
(2, 1),
(2, 3),
(2, 4),
(2, 6),
(2, 9),
(2, 12),
(3, 2),
(3, 3),
(3, 5),
(3, 8),
(3, 11),
(3, 14),
(4, 2),
(4, 4),
(4, 7),
(4, 10),
(4, 15),
(5, 2),
(5, 6),
(5, 9),
(5, 13),
(6, 5),
(6, 8),
(6, 11),
(7, 4),
(7, 7),
(7, 10),
(7, 14),
(8, 5),
(8, 12),
(9, 5),
(9, 8),
(9, 11),
(10, 4),
(10, 6),
(10, 9),
(10, 15);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `artista`
--
ALTER TABLE `artista`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `citta`
--
ALTER TABLE `citta`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `concerto`
--
ALTER TABLE `concerto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkCitta` (`fkCitta`);

--
-- Indici per le tabelle `partecipa`
--
ALTER TABLE `partecipa`
  ADD PRIMARY KEY (`fkArtista`,`fkConcerto`),
  ADD KEY `fkConcerto` (`fkConcerto`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `artista`
--
ALTER TABLE `artista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `citta`
--
ALTER TABLE `citta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `concerto`
--
ALTER TABLE `concerto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `concerto`
--
ALTER TABLE `concerto`
  ADD CONSTRAINT `concerto_ibfk_1` FOREIGN KEY (`fkCitta`) REFERENCES `citta` (`id`);

--
-- Limiti per la tabella `partecipa`
--
ALTER TABLE `partecipa`
  ADD CONSTRAINT `partecipa_ibfk_1` FOREIGN KEY (`fkArtista`) REFERENCES `artista` (`id`),
  ADD CONSTRAINT `partecipa_ibfk_2` FOREIGN KEY (`fkConcerto`) REFERENCES `concerto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

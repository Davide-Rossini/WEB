-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 24, 2024 alle 12:41
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `impiccato`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `parole`
--

CREATE TABLE `parole` (
  `id` int(11) NOT NULL,
  `parola` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `parole`
--

INSERT INTO `parole` (`id`, `parola`) VALUES
(1, 'gatto'),
(2, 'cane'),
(3, 'elefante'),
(4, 'tigre'),
(5, 'leone');

-- --------------------------------------------------------

--
-- Struttura della tabella `punteggi`
--

CREATE TABLE `punteggi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `punteggio` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `punteggi`
--

INSERT INTO `punteggi` (`id`, `user_id`, `punteggio`) VALUES
(1, 1, 9),
(2, 2, 3),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `username`, `password`) VALUES
(1, 'daver', '$2y$10$qYm7CvbExRBi85PlRUCCzOuwMs3u.IDXHHfJ9Gq7ynDQUTh7WSZbu'),
(2, 'tyri', '$2y$10$8aqxIx3zB1ujmtAIdbGwIu5nAqi7cbdXjSsMtngQ1gh.QgKncEVGW'),
(3, 'tifer', '$2y$10$NjaHvewZpIk6zh/Jx0O69uaUkk410H3S/2AWmEHRCXurXEbQS9ftW');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `parole`
--
ALTER TABLE `parole`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `punteggi`
--
ALTER TABLE `punteggi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `parole`
--
ALTER TABLE `parole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `punteggi`
--
ALTER TABLE `punteggi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `punteggi`
--
ALTER TABLE `punteggi`
  ADD CONSTRAINT `punteggi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `utenti` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

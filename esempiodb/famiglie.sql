-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 21, 2022 alle 15:54
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
-- Database: `famiglie`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `figli`
--

CREATE TABLE `figli` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `cognome` varchar(30) DEFAULT NULL,
  `eta` int(11) DEFAULT NULL,
  `fkMamma` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `figli`
--

INSERT INTO `figli` (`id`, `nome`, `cognome`, `eta`, `fkMamma`) VALUES
(1, 'Mario', 'Tonni', 2, 3),
(2, 'Andrea', 'Tonni', 4, 3),
(3, 'Marcello', 'Martini', 1, 4),
(4, 'Antonio', 'Rosati', 5, 1),
(5, 'Luca', 'Santini', 4, 2),
(6, 'Paolo', 'Santini', 6, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `mamme`
--

CREATE TABLE `mamme` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `cognome` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `mamme`
--

INSERT INTO `mamme` (`id`, `nome`, `cognome`) VALUES
(1, 'Luisa', 'Bianchi'),
(2, 'Marisa', 'Rossi'),
(3, 'Anna', 'Verdi'),
(4, 'Lorenza', 'Neri');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `figli`
--
ALTER TABLE `figli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkMamma` (`fkMamma`);

--
-- Indici per le tabelle `mamme`
--
ALTER TABLE `mamme`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `figli`
--
ALTER TABLE `figli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `mamme`
--
ALTER TABLE `mamme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `figli`
--
ALTER TABLE `figli`
  ADD CONSTRAINT `figli_ibfk_1` FOREIGN KEY (`fkMamma`) REFERENCES `mamme` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

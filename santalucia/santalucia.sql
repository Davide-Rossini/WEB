-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 14, 2023 alle 13:41
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
-- Database: `santalucia`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `bambini`
--

CREATE TABLE `bambini` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `bambini`
--

INSERT INTO `bambini` (`id`, `nome`) VALUES
(1, 'adfs');

-- --------------------------------------------------------

--
-- Struttura della tabella `giocattoli`
--

CREATE TABLE `giocattoli` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `fkBambino` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `giocattoli`
--

INSERT INTO `giocattoli` (`id`, `nome`, `fkBambino`) VALUES
(1, 'afs', 1),
(2, 'asf', 1),
(3, 'dsf', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `bambini`
--
ALTER TABLE `bambini`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `giocattoli`
--
ALTER TABLE `giocattoli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkBambino` (`fkBambino`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `bambini`
--
ALTER TABLE `bambini`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `giocattoli`
--
ALTER TABLE `giocattoli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `giocattoli`
--
ALTER TABLE `giocattoli`
  ADD CONSTRAINT `giocattoli_ibfk_1` FOREIGN KEY (`fkBambino`) REFERENCES `bambini` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

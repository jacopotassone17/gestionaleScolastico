-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 06, 2025 alle 14:17
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registro_elettronico`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `classe`
--

CREATE TABLE `classe` (
  `id_classe` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `id_studente` int(11) DEFAULT NULL,
  `id_professore` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `classe`
--

INSERT INTO `classe` (`id_classe`, `nome`, `id_studente`, `id_professore`) VALUES
(1, '1A', 1, 1),
(2, '2B', 2, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `notifiche`
--

CREATE TABLE `notifiche` (
  `id_notifica` int(11) NOT NULL,
  `nota` varchar(100) DEFAULT NULL,
  `circolare` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `notifiche`
--

INSERT INTO `notifiche` (`id_notifica`, `nota`, `circolare`) VALUES
(1, 'Compiti consegnati', 'Avviso riunione'),
(2, 'Assenza giustificata', 'Avviso gita');

-- --------------------------------------------------------

--
-- Struttura della tabella `professore`
--

CREATE TABLE `professore` (
  `id_professore` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `cognome` varchar(45) DEFAULT NULL,
  `materia` varchar(45) DEFAULT NULL,
  `seconda_materia` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `professore`
--

INSERT INTO `professore` (`id_professore`, `id_user`, `nome`, `cognome`, `materia`, `seconda_materia`, `email`, `password`) VALUES
(1, 1, 'Giovanni', 'Verdi', 'Matematica', 'Fisica', 'prof1@example.com', 'pass123'),
(2, 1, 'Anna', 'Neri', 'Inglese', 'Francese', 'prof2@example.com', 'pass789');

-- --------------------------------------------------------

--
-- Struttura della tabella `studente`
--

CREATE TABLE `studente` (
  `id_studente` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `cognome` varchar(45) DEFAULT NULL,
  `classe` varchar(45) DEFAULT NULL,
  `id_notifica` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `studente`
--

INSERT INTO `studente` (`id_studente`, `nome`, `cognome`, `classe`, `id_notifica`, `id_user`) VALUES
(1, 'Mario', 'Rossi', '1A', 1, 2),
(2, 'Luigi', 'Bianchi', '2B', 2, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id_user` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `professore` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`id_user`, `email`, `password`, `professore`) VALUES
(1, 'prof1@example.com', 'pass123', 1),
(2, 'stud1@example.com', 'pass456', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `voto`
--

CREATE TABLE `voto` (
  `id_voto` int(11) NOT NULL,
  `id_studente` int(11) DEFAULT NULL,
  `materia` varchar(45) DEFAULT NULL,
  `peso` float DEFAULT NULL,
  `id_professore` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `voto`
--

INSERT INTO `voto` (`id_voto`, `id_studente`, `materia`, `peso`, `id_professore`) VALUES
(1, 1, 'Matematica', 8.5, 1),
(2, 2, 'Inglese', 7, 2);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id_classe`),
  ADD KEY `id_studente` (`id_studente`),
  ADD KEY `id_professore` (`id_professore`);

--
-- Indici per le tabelle `notifiche`
--
ALTER TABLE `notifiche`
  ADD PRIMARY KEY (`id_notifica`);

--
-- Indici per le tabelle `professore`
--
ALTER TABLE `professore`
  ADD PRIMARY KEY (`id_professore`),
  ADD KEY `id_user` (`id_user`);

--
-- Indici per le tabelle `studente`
--
ALTER TABLE `studente`
  ADD PRIMARY KEY (`id_studente`),
  ADD KEY `id_notifica` (`id_notifica`),
  ADD KEY `id_user` (`id_user`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id_user`);

--
-- Indici per le tabelle `voto`
--
ALTER TABLE `voto`
  ADD PRIMARY KEY (`id_voto`),
  ADD KEY `id_studente` (`id_studente`),
  ADD KEY `id_professore` (`id_professore`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `classe_ibfk_1` FOREIGN KEY (`id_studente`) REFERENCES `studente` (`id_studente`),
  ADD CONSTRAINT `classe_ibfk_2` FOREIGN KEY (`id_professore`) REFERENCES `professore` (`id_professore`);

--
-- Limiti per la tabella `professore`
--
ALTER TABLE `professore`
  ADD CONSTRAINT `professore_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utente` (`id_user`);

--
-- Limiti per la tabella `studente`
--
ALTER TABLE `studente`
  ADD CONSTRAINT `studente_ibfk_1` FOREIGN KEY (`id_notifica`) REFERENCES `notifiche` (`id_notifica`),
  ADD CONSTRAINT `studente_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `utente` (`id_user`);

--
-- Limiti per la tabella `voto`
--
ALTER TABLE `voto`
  ADD CONSTRAINT `voto_ibfk_1` FOREIGN KEY (`id_studente`) REFERENCES `studente` (`id_studente`),
  ADD CONSTRAINT `voto_ibfk_2` FOREIGN KEY (`id_professore`) REFERENCES `professore` (`id_professore`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

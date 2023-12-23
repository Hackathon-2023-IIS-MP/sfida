-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Creato il: Dic 23, 2023 alle 01:37
-- Versione del server: 5.7.44
-- Versione PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackathon`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `appassionare`
--

CREATE TABLE `appassionare` (
  `utente_email` varchar(50) NOT NULL,
  `disciplina_id` bigint(20) NOT NULL,
  `descrizione` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `aziende`
--

CREATE TABLE `aziende` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descrizione` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL,
  `numero_telefono` varchar(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `citta`
--

CREATE TABLE `citta` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `provincia_sigla` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `discipline`
--

CREATE TABLE `discipline` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `insegnare`
--

CREATE TABLE `insegnare` (
  `utente_email` varchar(50) NOT NULL,
  `istituto_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `istituti`
--

CREATE TABLE `istituti` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `lavorare`
--

CREATE TABLE `lavorare` (
  `azienda_id` bigint(20) NOT NULL,
  `utente_email` varchar(50) NOT NULL,
  `dirigente` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `messaggiare`
--

CREATE TABLE `messaggiare` (
  `id` bigint(20) NOT NULL,
  `progetto_id` bigint(20) NOT NULL,
  `utente_email` varchar(50) NOT NULL,
  `messaggio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `partecipare`
--

CREATE TABLE `partecipare` (
  `utente_email` varchar(50) NOT NULL,
  `progetto_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `progetti`
--

CREATE TABLE `progetti` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descrizione` text NOT NULL,
  `immagine_principale` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `proporre`
--

CREATE TABLE `proporre` (
  `utente_email` varchar(50) NOT NULL,
  `progetto_id` bigint(20) NOT NULL,
  `azienda_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `province`
--

CREATE TABLE `province` (
  `nome` varchar(50) NOT NULL,
  `sigla` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `riguardare`
--

CREATE TABLE `riguardare` (
  `disciplina_id` bigint(20) NOT NULL,
  `progetto_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `trattare`
--

CREATE TABLE `trattare` (
  `istituto_id` bigint(20) NOT NULL,
  `disciplina_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `email` varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  `numero_telefono` varchar(17) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `genere` char(1) NOT NULL,
  `data_nas` date NOT NULL,
  `citta_residenza` bigint(20) NOT NULL,
  `istituto_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `appassionare`
--
ALTER TABLE `appassionare`
  ADD PRIMARY KEY (`utente_email`,`disciplina_id`),
  ADD KEY `disciplina_id` (`disciplina_id`);

--
-- Indici per le tabelle `aziende`
--
ALTER TABLE `aziende`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `citta`
--
ALTER TABLE `citta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paese_id` (`provincia_sigla`);

--
-- Indici per le tabelle `discipline`
--
ALTER TABLE `discipline`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `insegnare`
--
ALTER TABLE `insegnare`
  ADD PRIMARY KEY (`utente_email`,`istituto_id`),
  ADD KEY `istituto_id_3` (`istituto_id`);

--
-- Indici per le tabelle `istituti`
--
ALTER TABLE `istituti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `lavorare`
--
ALTER TABLE `lavorare`
  ADD PRIMARY KEY (`azienda_id`,`utente_email`),
  ADD KEY `utente_email_2` (`utente_email`);

--
-- Indici per le tabelle `messaggiare`
--
ALTER TABLE `messaggiare`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utente_email_6` (`utente_email`),
  ADD KEY `progetto_id_2` (`progetto_id`);

--
-- Indici per le tabelle `partecipare`
--
ALTER TABLE `partecipare`
  ADD PRIMARY KEY (`utente_email`,`progetto_id`),
  ADD KEY `progetto_id_4` (`progetto_id`);

--
-- Indici per le tabelle `progetti`
--
ALTER TABLE `progetti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `proporre`
--
ALTER TABLE `proporre`
  ADD PRIMARY KEY (`utente_email`,`progetto_id`),
  ADD KEY `azienda_id_2` (`azienda_id`),
  ADD KEY `progetto_id` (`progetto_id`);

--
-- Indici per le tabelle `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`sigla`);

--
-- Indici per le tabelle `riguardare`
--
ALTER TABLE `riguardare`
  ADD PRIMARY KEY (`disciplina_id`,`progetto_id`),
  ADD KEY `progetto_id_3` (`progetto_id`);

--
-- Indici per le tabelle `trattare`
--
ALTER TABLE `trattare`
  ADD PRIMARY KEY (`istituto_id`,`disciplina_id`),
  ADD KEY `discipline_id_3` (`disciplina_id`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `citta_residenza` (`citta_residenza`),
  ADD KEY `istituto_id` (`istituto_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `aziende`
--
ALTER TABLE `aziende`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `citta`
--
ALTER TABLE `citta`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `discipline`
--
ALTER TABLE `discipline`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `istituti`
--
ALTER TABLE `istituti`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `messaggiare`
--
ALTER TABLE `messaggiare`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `progetti`
--
ALTER TABLE `progetti`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `appassionare`
--
ALTER TABLE `appassionare`
  ADD CONSTRAINT `disciplina_id` FOREIGN KEY (`disciplina_id`) REFERENCES `discipline` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utente_email` FOREIGN KEY (`utente_email`) REFERENCES `utenti` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `insegnare`
--
ALTER TABLE `insegnare`
  ADD CONSTRAINT `istituto_id_3` FOREIGN KEY (`istituto_id`) REFERENCES `istituti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utente_email_5` FOREIGN KEY (`utente_email`) REFERENCES `utenti` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `lavorare`
--
ALTER TABLE `lavorare`
  ADD CONSTRAINT `azienda_id` FOREIGN KEY (`azienda_id`) REFERENCES `aziende` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utente_email_2` FOREIGN KEY (`utente_email`) REFERENCES `utenti` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `messaggiare`
--
ALTER TABLE `messaggiare`
  ADD CONSTRAINT `progetto_id_2` FOREIGN KEY (`progetto_id`) REFERENCES `progetti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utente_email_6` FOREIGN KEY (`utente_email`) REFERENCES `utenti` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `partecipare`
--
ALTER TABLE `partecipare`
  ADD CONSTRAINT `progetto_id_4` FOREIGN KEY (`progetto_id`) REFERENCES `progetti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utente_email_3` FOREIGN KEY (`utente_email`) REFERENCES `utenti` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `proporre`
--
ALTER TABLE `proporre`
  ADD CONSTRAINT `azienda_id_2` FOREIGN KEY (`azienda_id`) REFERENCES `aziende` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `progetto_id` FOREIGN KEY (`progetto_id`) REFERENCES `progetti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utente_email_4` FOREIGN KEY (`utente_email`) REFERENCES `utenti` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `riguardare`
--
ALTER TABLE `riguardare`
  ADD CONSTRAINT `disciplina_id_2` FOREIGN KEY (`disciplina_id`) REFERENCES `discipline` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `progetto_id_3` FOREIGN KEY (`progetto_id`) REFERENCES `progetti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `trattare`
--
ALTER TABLE `trattare`
  ADD CONSTRAINT `discipline_id_3` FOREIGN KEY (`disciplina_id`) REFERENCES `discipline` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `istituto_id_2` FOREIGN KEY (`istituto_id`) REFERENCES `istituti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `utenti`
--
ALTER TABLE `utenti`
  ADD CONSTRAINT `citta_residenza` FOREIGN KEY (`citta_residenza`) REFERENCES `citta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `istituto_id` FOREIGN KEY (`istituto_id`) REFERENCES `istituti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2024 at 06:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capolavorofante`
--

-- --------------------------------------------------------

--
-- Table structure for table `partita`
--

CREATE TABLE `partita` (
  `idPartita` int(11) NOT NULL,
  `SquadraCasa` varchar(100) NOT NULL,
  `SquadraOspite` varchar(100) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `partita`
--

INSERT INTO `partita` (`idPartita`, `SquadraCasa`, `SquadraOspite`, `data`) VALUES
(38, 'Hellas Verona FC', 'Internazionale', '2024-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `posto`
--

CREATE TABLE `posto` (
  `idPosto` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `fila` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prenotazioni`
--

CREATE TABLE `prenotazioni` (
  `idPrenotazione` int(100) NOT NULL,
  `dataPrenotazione` date NOT NULL,
  `cf` varchar(100) NOT NULL,
  `idPartita` int(11) NOT NULL,
  `IdPosto` int(11) NOT NULL,
  `IdSettore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settore`
--

CREATE TABLE `settore` (
  `idSettore` int(11) NOT NULL,
  `nomeSettore` varchar(100) NOT NULL,
  `costo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settore`
--

INSERT INTO `settore` (`idSettore`, `nomeSettore`, `costo`) VALUES
(1, 'TribunaSuperioreOvest-settoreS', 20),
(2, 'TribunaSuperioreOvest-settoreX', 20),
(3, 'TribunaSuperioreOvest-settoreY', 20),
(4, 'TribunaSuperioreOvest-settoreJ', 20),
(5, 'TribunaSuperioreOvest-settoreT', 20),
(6, 'TribunaSuperioreOvest-settoreU', 20),
(7, 'settoreOspiti', 19),
(8, 'PoltroneOvest-settore4', 25),
(9, 'PoltroneOvest-settore2', 25),
(10, 'PoltroneOvest-settore1', 25),
(11, 'PoltroneOvest-settore3', 25),
(12, 'PoltroneOvest-settore5', 25),
(13, 'PoltronissimeOvest-settoreR', 40),
(14, 'PoltronissimeOvest-settoreS', 40),
(15, 'PoltronissimeOvest-settoreT', 40),
(16, 'PoltronissimeOvest-settoreU', 40),
(17, 'CurvaEstSuperiore-settoreN', 15),
(18, 'CurvaEstSuperiore-settoreM', 15),
(19, 'CurvaEstSuperiore-settoreL', 15),
(20, 'CurvaEstInferiore-settore0', 30),
(21, 'CurvaEstInferiore-settore6', 30),
(22, 'CurvaEstInferiore-settore8', 30),
(23, 'PoltronissimeCurvaEst-settoreN', 60),
(24, 'PoltronissimeCurvaEst-settoreM', 60),
(25, 'PoltronissimeCurvaEst-settoreL', 60),
(26, 'TribunaSuperioreEst-settoreI', 20),
(27, 'TribunaSuperioreEst-settoreH', 20),
(28, 'TribunaSuperioreEst-settoreG', 20),
(29, 'TribunaSuperioreEst-settoreK', 20),
(30, 'TribunaSuperioreEst-settoreF', 20),
(31, 'TribunaSuperioreEst-settoreE', 20),
(32, 'TribunaSuperioreEst-settoreD', 20),
(33, 'PoltroneEst-settore9', 35),
(34, 'PoltroneEst-settore7', 35),
(35, 'PoltroneEst-settore0', 35),
(36, 'PoltroneEst-settore6', 35),
(37, 'PoltroneEst-settore8', 35),
(38, 'PoltronissimeEst-settoreI', 60),
(39, 'PoltronissimeEst-settoreG', 60),
(40, 'PoltronissimeEst-settoreF', 60),
(42, 'PoltronissimeEst-settoreD', 60),
(43, 'LoungeEst-settoreH', 120),
(44, 'LoungeEst-settoreF', 120),
(45, 'CurvaSudSuperiore-settoreC', 20),
(46, 'CurvaSudSuperiore-settoreB', 20),
(47, 'CurvaSudSuperiore-settoreA', 20),
(48, 'CurvaSudSuperiore-settore0', 20),
(49, 'CurvaSudSuperiore-settoreP', 20),
(50, 'CurvaSudSuperiore-settoreQ', 20),
(51, 'CurvaSudInferiore-settore4', 25),
(52, 'CurvaSudInferiore-settore2', 25),
(53, 'CurvaSudInferiore-settore1', 25),
(54, 'CurvaSudInferiore-settore3', 25),
(55, 'CurvaSudInferiore-settore5', 25),
(56, 'CurvaSudInferiore-settoreC', 25),
(57, 'CurvaSudInferiore-settoreB', 25),
(58, 'CurvaSudInferiore-settoreA', 25),
(59, 'CurvaSudInferiore-settore0', 25),
(60, 'CurvaSudInferiore-settoreP', 25),
(61, 'CurvaSudInferiore-settoreQ', 25),
(62, 'parterreNord', 10),
(63, 'parterreSud', 10),
(64, 'parterreEst', 10),
(65, 'TribunaSuperioreOvest-settoreR', 20);

-- --------------------------------------------------------

--
-- Table structure for table `utente`
--

CREATE TABLE `utente` (
  `cf` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cognome` varchar(100) NOT NULL,
  `numeroTelefono` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utente`
--

INSERT INTO `utente` (`cf`, `nome`, `cognome`, `numeroTelefono`, `email`, `password`) VALUES
('fnttms', 'tommaso', 'fante', 1234, 'tm@gmail.com', '6a962563e235e1789e663e356ac8d9e4'),
('tf05', 't', 'f', 0, 'tf@gmail.com', '114d6a415b3d04db792ca7c0da0c7a55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `partita`
--
ALTER TABLE `partita`
  ADD PRIMARY KEY (`idPartita`);

--
-- Indexes for table `posto`
--
ALTER TABLE `posto`
  ADD PRIMARY KEY (`idPosto`);

--
-- Indexes for table `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD PRIMARY KEY (`idPrenotazione`),
  ADD KEY `cf` (`cf`),
  ADD KEY `idPartita` (`idPartita`),
  ADD KEY `IdPosto` (`IdPosto`),
  ADD KEY `IdSettore` (`IdSettore`);

--
-- Indexes for table `settore`
--
ALTER TABLE `settore`
  ADD PRIMARY KEY (`idSettore`);

--
-- Indexes for table `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`cf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `partita`
--
ALTER TABLE `partita`
  MODIFY `idPartita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `posto`
--
ALTER TABLE `posto`
  MODIFY `idPosto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prenotazioni`
--
ALTER TABLE `prenotazioni`
  MODIFY `idPrenotazione` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settore`
--
ALTER TABLE `settore`
  MODIFY `idSettore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD CONSTRAINT `prenotazioni_ibfk_1` FOREIGN KEY (`idPartita`) REFERENCES `partita` (`idPartita`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prenotazioni_ibfk_2` FOREIGN KEY (`cf`) REFERENCES `utente` (`cf`),
  ADD CONSTRAINT `prenotazioni_ibfk_3` FOREIGN KEY (`IdPosto`) REFERENCES `posto` (`idPosto`),
  ADD CONSTRAINT `prenotazioni_ibfk_4` FOREIGN KEY (`IdSettore`) REFERENCES `settore` (`idSettore`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

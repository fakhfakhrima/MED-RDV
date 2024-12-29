-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 22 avr. 2024 à 23:28
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `edoc`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `aemail` varchar(255) NOT NULL,
  `apassword` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`aemail`, `apassword`) VALUES
('admin@edoc.com', '123');

-- --------------------------------------------------------

--
-- Structure de la table `appointment`
--

CREATE TABLE `appointment` (
  `appoid` int(11) NOT NULL,
  `pid` int(10) DEFAULT NULL,
  `docid` int(11) NOT NULL,
  `apponum` int(3) DEFAULT NULL,
  `scheduleid` int(10) DEFAULT NULL,
  `appodate` date DEFAULT NULL,
  `appotime` time NOT NULL,
  `appotitle` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `appointment`
--

INSERT INTO `appointment` (`appoid`, `pid`, `docid`, `apponum`, `scheduleid`, `appodate`, `appotime`, `appotitle`) VALUES
(1, 1, 1, 1, 1, '2022-06-03', '08:30:00', 'psychology	'),
(2, 2, 1, 2, 9, '2024-04-02', '10:30:00', 'psychology	'),
(3, 3, 1, NULL, NULL, '2024-04-06', '11:00:00', 'psycho'),
(4, 5, 2, NULL, NULL, '2024-04-22', '07:00:00', 'microbe'),
(5, 5, 0, 1, 10, '2024-04-21', '00:00:00', ''),
(6, 1, 0, 1, 11, '2024-04-22', '00:00:00', '');

-- --------------------------------------------------------

--
-- Structure de la table `doctor`
--

CREATE TABLE `doctor` (
  `docid` int(11) NOT NULL,
  `docemail` varchar(255) DEFAULT NULL,
  `docname` varchar(255) DEFAULT NULL,
  `docpassword` varchar(255) DEFAULT NULL,
  `docnic` varchar(15) DEFAULT NULL,
  `doctel` varchar(15) DEFAULT NULL,
  `specialties` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `doctor`
--

INSERT INTO `doctor` (`docid`, `docemail`, `docname`, `docpassword`, `docnic`, `doctel`, `specialties`) VALUES
(1, 'doctor@edoc.com', 'Test Doctor', '123', '000000000', '0110000000', 1),
(2, 'azizslama95@gmail.com', 'Mohamed aziz Slama', 'aziz', '12335599', '25289716', 1),
(3, 'hamdi@edoc.com', 'hamdi', 'hamdi', '1111111111', '22555888', 9);

-- --------------------------------------------------------

--
-- Structure de la table `file`
--

CREATE TABLE `file` (
  `fid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `dateV` date NOT NULL,
  `observation` varchar(255) NOT NULL,
  `infoPA` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `file`
--

INSERT INTO `file` (`fid`, `pid`, `dateV`, `observation`, `infoPA`) VALUES
(1, 2, '2024-04-16', 'psyaak', '4444'),
(2, 3, '2024-04-15', 'accident', 'test'),
(3, 1, '2024-04-16', 'psy', 'appappa'),
(5, 3, '2024-04-19', 'tec', 'dzzeh'),
(6, 6, '2024-04-23', 'trouble degestif', 'agée de 50 ans');

-- --------------------------------------------------------

--
-- Structure de la table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `job`
--

INSERT INTO `job` (`id`, `name`, `email`, `phone`, `date`, `message`) VALUES
(1, 'nesrine', 'nesrine@gmail.com', '90456789', '2024-04-10', 'am new secretary'),
(2, 'rima', 'rima@gmail.com', '2024-04-22', '0000-00-00', 'am looking for a job'),
(3, 'aziz', 'aziz@gmail.com', '2024-04-22', '0000-00-00', 'new ');

-- --------------------------------------------------------

--
-- Structure de la table `ordonance`
--

CREATE TABLE `ordonance` (
  `oid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `medecament` varchar(255) NOT NULL,
  `odate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ordonance`
--

INSERT INTO `ordonance` (`oid`, `pid`, `medecament`, `odate`) VALUES
(1, 1, 'EFFERALGAN,zaa', '2024-04-20'),
(2, 2, 'EFFERALGAN', '2024-02-13'),
(4, 2, 'EFFERALGAN,ff', '2024-04-18'),
(5, 5, 'EFFERALGAN,aaz', '2024-04-22');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `pid` int(11) NOT NULL,
  `pemail` varchar(255) DEFAULT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `ppassword` varchar(255) DEFAULT NULL,
  `paddress` varchar(255) DEFAULT NULL,
  `pnic` varchar(15) DEFAULT NULL,
  `pdob` date DEFAULT NULL,
  `ptel` varchar(15) DEFAULT NULL,
  `region` varchar(255) NOT NULL,
  `cnss` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`pid`, `pemail`, `pname`, `ppassword`, `paddress`, `pnic`, `pdob`, `ptel`, `region`, `cnss`) VALUES
(1, 'patient@edoc.com', 'Test Patient', '123', 'Sri Lanka', '0000000000', '2000-01-01', '0120000000', 'tunis', '5226'),
(2, 'ahmed@gmail.com', 'ahmed amri', '123', 'Sri Lanka', '0110000000', '2022-06-03', '0700000000', '', '3397'),
(3, 'aziz@gmail.com', 'aziz', '123', 'sbikha ', '1197552', '2000-06-03', '56897413', 'kairouan', '2036'),
(4, 'yasmine@gmail.com', 'yasmine', '123', 'kairouan', '55690014', '2000-06-02', '23654789', 'tunis', '3265'),
(5, 'omar@edoc.com', 'omar cherif', 'omar123', 'ghabet', '12998877', '1998-09-22', '22555147', 'kairouan', '1222'),
(6, 'samira@edoc.com', 'samira', 'samira', 'mater', '12336699', '1978-03-22', '22510220', 'makther', '5555'),
(7, 'aziz@edoc.com', 'aziz slama', '123', 'kairouan', '40050620', '2000-03-22', '0712345678', '', ''),
(8, 'bilel@gmail.com', 'bilel', '123', 'kairouan', '1235596', '2003-06-06', '5789632', 'tunis', '4567'),
(9, 'hola@edoc.com', 'hola', 'hola', 'tunis', '12558899', '1988-12-22', '21337414', 'sbikha', '2222'),
(10, 'hatem@edoc.com', 'hatem', 'hatem', 'sbikha ', '12554477', '1955-03-22', '21111333', 'kairouan', '8888'),
(11, 'amir@gmail.com', 'amir', 'amir', 'sfax', '45678923', '2005-01-20', '25741236', 'sfax', '4444');

-- --------------------------------------------------------

--
-- Structure de la table `schedule`
--

CREATE TABLE `schedule` (
  `scheduleid` int(11) NOT NULL,
  `docid` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `scheduledate` date DEFAULT NULL,
  `scheduletime` time DEFAULT NULL,
  `nop` int(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `schedule`
--

INSERT INTO `schedule` (`scheduleid`, `docid`, `title`, `scheduledate`, `scheduletime`, `nop`) VALUES
(3, '1', '12', '2022-06-10', '20:33:00', 1),
(4, '1', '1', '2022-06-10', '12:32:00', 1),
(5, '1', '1', '2022-06-10', '20:35:00', 1),
(6, '1', '12', '2022-06-10', '20:35:00', 1),
(7, '1', '1', '2022-06-24', '20:36:00', 1),
(8, '1', '12', '2022-06-10', '13:33:00', 1),
(9, '1', 'psychology', '2024-04-02', '08:30:00', 3),
(10, '2', 'cardiology', '2024-04-22', '07:00:00', 5),
(11, '3', 'Clinical neurophysio', '2024-04-22', '09:00:00', 4);

-- --------------------------------------------------------

--
-- Structure de la table `secretary`
--

CREATE TABLE `secretary` (
  `sid` int(11) NOT NULL,
  `semail` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `sname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `spassword` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `snic` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `stel` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `secretary`
--

INSERT INTO `secretary` (`sid`, `semail`, `sname`, `spassword`, `snic`, `stel`) VALUES
(1, 'Rima_Fakhfakh@edoc.com', 'Rima Fakhfakh', '123', '5689741200', '23569743'),
(2, 'testsec@edoc.com', 'test sec', '123', '55990665', '54789632'),
(3, 'anis.kh@gmail.com', 'anis khemira', 'anis', '12335599', '22559988');

-- --------------------------------------------------------

--
-- Structure de la table `specialties`
--

CREATE TABLE `specialties` (
  `id` int(2) NOT NULL,
  `sname` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `specialties`
--

INSERT INTO `specialties` (`id`, `sname`) VALUES
(1, 'Accident and emergency medicine'),
(2, 'Allergology'),
(3, 'Anaesthetics'),
(4, 'Biological hematology'),
(5, 'Cardiology'),
(6, 'Child psychiatry'),
(7, 'Clinical biology'),
(8, 'Clinical chemistry'),
(9, 'Clinical neurophysiology'),
(10, 'Clinical radiology'),
(11, 'Dental, oral and maxillo-facial surgery'),
(12, 'Dermato-venerology'),
(13, 'Dermatology'),
(14, 'Endocrinology'),
(15, 'Gastro-enterologic surgery'),
(16, 'Gastroenterology'),
(17, 'General hematology'),
(18, 'General Practice'),
(19, 'General surgery'),
(20, 'Geriatrics'),
(21, 'Immunology'),
(22, 'Infectious diseases'),
(23, 'Internal medicine'),
(24, 'Laboratory medicine'),
(25, 'Maxillo-facial surgery'),
(26, 'Microbiology'),
(27, 'Nephrology'),
(28, 'Neuro-psychiatry'),
(29, 'Neurology'),
(30, 'Neurosurgery'),
(31, 'Nuclear medicine'),
(32, 'Obstetrics and gynecology'),
(33, 'Occupational medicine'),
(34, 'Ophthalmology'),
(35, 'Orthopaedics'),
(36, 'Otorhinolaryngology'),
(37, 'Paediatric surgery'),
(38, 'Paediatrics'),
(39, 'Pathology'),
(40, 'Pharmacology'),
(41, 'Physical medicine and rehabilitation'),
(42, 'Plastic surgery'),
(43, 'Podiatric Medicine'),
(44, 'Podiatric Surgery'),
(45, 'Psychiatry'),
(46, 'Public health and Preventive Medicine'),
(47, 'Radiology'),
(48, 'Radiotherapy'),
(49, 'Respiratory medicine'),
(50, 'Rheumatology'),
(51, 'Stomatology'),
(52, 'Thoracic surgery'),
(53, 'Tropical medicine'),
(54, 'Urology'),
(55, 'Vascular surgery'),
(56, 'Venereology');

-- --------------------------------------------------------

--
-- Structure de la table `webuser`
--

CREATE TABLE `webuser` (
  `email` varchar(255) NOT NULL,
  `usertype` char(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `webuser`
--

INSERT INTO `webuser` (`email`, `usertype`) VALUES
('admin@edoc.com', 'a'),
('doctor@edoc.com', 'd'),
('patient@edoc.com', 'p'),
('emhashenudara@gmail.com', 'p'),
('Rima_Fakhfakh@edoc.com', 's'),
('testsec@edoc.com', 's'),
('azizslama95@gmail.com', 'd'),
('anis.kh@gmail.com', 's'),
('omar@edoc.com', 'p'),
('aziz@edoc.com', 'p'),
('hola@edoc.com', 'p'),
('amir@gmail.com', 'p'),
('hamdi@edoc.com', 'd');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aemail`);

--
-- Index pour la table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appoid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `scheduleid` (`scheduleid`);

--
-- Index pour la table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`docid`),
  ADD KEY `specialties` (`specialties`);

--
-- Index pour la table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`fid`);

--
-- Index pour la table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ordonance`
--
ALTER TABLE `ordonance`
  ADD PRIMARY KEY (`oid`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pid`);

--
-- Index pour la table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`scheduleid`),
  ADD KEY `docid` (`docid`);

--
-- Index pour la table `secretary`
--
ALTER TABLE `secretary`
  ADD PRIMARY KEY (`sid`);

--
-- Index pour la table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `webuser`
--
ALTER TABLE `webuser`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `docid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `file`
--
ALTER TABLE `file`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `ordonance`
--
ALTER TABLE `ordonance`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `scheduleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `secretary`
--
ALTER TABLE `secretary`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 03 juin 2023 à 19:27
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae23db`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `login` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`login`, `mdp`) VALUES
('root', 'root');

-- --------------------------------------------------------

--
-- Structure de la table `batiment`
--

CREATE TABLE `batiment` (
  `ID-bat` varchar(30) NOT NULL,
  `nom` varchar(10) NOT NULL,
  `login` varchar(20) NOT NULL,
  `mdp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `batiment`
--

INSERT INTO `batiment` (`ID-bat`, `nom`, `login`, `mdp`) VALUES
('A', 'Administra', 'loginA', 'loginA'),
('E', 'RT', 'loginE', 'loginE');

-- --------------------------------------------------------

--
-- Structure de la table `capteurs`
--

CREATE TABLE `capteurs` (
  `ID-cap` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `ID-bat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `capteurs`
--

INSERT INTO `capteurs` (`ID-cap`, `nom`, `ID-bat`) VALUES
('AM107-2', 'Cap-B110', 'E'),
('AM107-27', 'Cap-E004', 'E'),
('AM107-3', 'Cap-B111', 'E'),
('AM107-31', 'Cap-E101', 'E'),
('AM107-40', 'Cap-E207', 'E');

-- --------------------------------------------------------

--
-- Structure de la table `mesures`
--

CREATE TABLE `mesures` (
  `ID-mes` int(10) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `heure` time NOT NULL DEFAULT current_timestamp(),
  `ID-cap` varchar(20) NOT NULL,
  `Salle` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `valeur` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `mesures`
--

INSERT INTO `mesures` (`ID-mes`, `date`, `heure`, `ID-cap`, `Salle`, `type`, `valeur`) VALUES
(61, '2023-06-03', '00:00:00', 'AM107-3', '\"B111\"', 'Temperatur', 24.1),
(62, '2023-06-03', '00:00:00', 'AM107-3', '\"B111\"', 'Humidite', 54.5),
(63, '2023-06-03', '00:00:00', 'AM107-2', '\"B110\"', 'Temperatur', 24.6),
(64, '2023-06-03', '00:00:00', 'AM107-2', '\"B110\"', 'Humidite', 52),
(65, '2023-06-03', '00:00:00', 'AM107-27', '\"E004\"', 'Temperatur', 23.8),
(66, '2023-06-03', '00:00:00', 'AM107-27', '\"E004\"', 'Humidite', 56.5),
(67, '2023-06-03', '00:00:00', 'AM107-31', '\"E101\"', 'Temperatur', 24.9),
(68, '2023-06-03', '00:00:00', 'AM107-31', '\"E101\"', 'Humidite', 44),
(69, '2023-06-03', '00:00:00', 'AM107-40', '\"E206\"', 'Temperatur', 25.4),
(70, '2023-06-03', '00:00:00', 'AM107-40', '\"E206\"', 'Humidite', 48);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `batiment`
--
ALTER TABLE `batiment`
  ADD PRIMARY KEY (`ID-bat`);

--
-- Index pour la table `capteurs`
--
ALTER TABLE `capteurs`
  ADD PRIMARY KEY (`ID-cap`),
  ADD KEY `ID-bat` (`ID-bat`);

--
-- Index pour la table `mesures`
--
ALTER TABLE `mesures`
  ADD PRIMARY KEY (`ID-mes`),
  ADD KEY `ID-cap` (`ID-cap`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `mesures`
--
ALTER TABLE `mesures`
  MODIFY `ID-mes` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `capteurs`
--
ALTER TABLE `capteurs`
  ADD CONSTRAINT `capteurs_ibfk_1` FOREIGN KEY (`ID-bat`) REFERENCES `batiment` (`ID-bat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `mesures`
--
ALTER TABLE `mesures`
  ADD CONSTRAINT `mesures_ibfk_1` FOREIGN KEY (`ID-cap`) REFERENCES `capteurs` (`ID-cap`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

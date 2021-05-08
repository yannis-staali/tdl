-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 08 mai 2021 à 20:30
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tdl`
--

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date_ajout` date NOT NULL,
  `date_fini` datetime DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `task`
--

INSERT INTO `task` (`id`, `nom`, `date_ajout`, `date_fini`, `status`) VALUES
(1, 'Finir projet', '2021-05-03', '2021-05-08 16:11:23', 1),
(8, 'cinema', '2021-05-03', '2021-05-08 08:02:24', 1),
(9, 'marcher', '2021-05-04', '2021-05-08 18:10:41', 0),
(11, 'ordi', '2021-05-08', '2021-05-08 17:59:30', 0),
(12, 'footing', '2021-05-08', '2021-05-08 17:20:29', 1),
(13, 'test', '2021-05-08', '2021-05-08 17:59:27', 0),
(15, 'yaya', '2021-05-08', '2021-05-08 17:55:25', 1),
(16, 'tennis', '2021-05-08', '2021-05-08 17:20:22', 1),
(17, 'pokemon', '2021-05-08', '2021-05-08 17:20:19', 1),
(18, 'velo', '2021-05-08', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`) VALUES
(1, 'toto', 'toto'),
(2, 'baba', 'baba');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

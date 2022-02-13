-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 13 fév. 2022 à 14:35
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_bamba`
--

-- --------------------------------------------------------

--
-- Structure de la table `conges`
--

CREATE TABLE `conges` (
  `id` int(11) NOT NULL,
  `employes` int(11) NOT NULL,
  `duree` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `conges`
--

INSERT INTO `conges` (`id`, `employes`, `duree`) VALUES
(2, 56, 34),
(0, 77, 24),
(0, 77, 24);

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

CREATE TABLE `employes` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date_naissance` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `employes`
--

INSERT INTO `employes` (`id`, `prenom`, `nom`, `date_naissance`, `telephone`, `adresse`, `email`) VALUES
(1, 'Papa 12', 'thiam 12', '2022-02-13', 432432, 'Oukama', 'papa@gmail.comn'),
(3, 'Bamba', 'SAMB', '1999-09-19', 778103928, 'Colobane', 'sambkhadim325@gmail.com'),
(4, 'inconnu', 'inconnu', '2022-01-31', 23424224, 'inconnu', 'inconnu@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `pointages`
--

CREATE TABLE `pointages` (
  `id` int(11) NOT NULL,
  `employes` varchar(112) NOT NULL,
  `date` varchar(266) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pointages`
--

INSERT INTO `pointages` (`id`, `employes`, `date`) VALUES
(2, 'test', '2022-02-13'),
(3, 'Bamba', '2022-02-10');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'test', '$2y$10$nf5S8K9hgMCtkWtuwYQoGukUBdFfwrdsIf6JrKXDxV4qxwNmqqrhi', '2022-02-12 23:05:34'),
(2, 'papa', '$2y$10$gVxAR6PxgKqF07ovpXvJoeG1VDCfzTQ4f2LASFHA0KUw40shHWfdu', '2022-02-12 23:06:35'),
(12, 'ref', 'fdsfsd', '2022-02-13 02:02:25'),
(76, '76', '76', '2022-02-13 02:03:13'),
(77, 'Bamba', '$2y$10$EdUEGae/9eK7rUPgkQGwMOWAHqmHRtU3JGaNoBk8aaqErApFJgmnC', '2022-02-13 11:14:04');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pointages`
--
ALTER TABLE `pointages`
  ADD PRIMARY KEY (`id`,`employes`,`date`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `pointages`
--
ALTER TABLE `pointages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

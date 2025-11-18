-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 12 nov. 2025 à 16:39
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `teetim_gr2`
--
DROP DATABASE teetim_gr2;
CREATE DATABASE IF NOT EXISTS `teetim_gr2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `teetim_gr2`;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` tinyint(4) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'Teeshirts'),
(2, 'Casquettes'),
(3, 'Hoodies');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` smallint(6) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `ventes` smallint(6) NOT NULL DEFAULT 0,
  `dac` date NOT NULL,
  `prix` decimal(5,2) NOT NULL,
  `thm_id` tinyint(4) NOT NULL,
  `cat_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `ventes`, `dac`, `prix`, `thm_id`, `cat_id`) VALUES
(1, 'Camarade basque', 20, '2024-04-17', 20.50, 1, 1),
(2, 'Monstre douillet', 123, '2023-08-12', 25.95, 1, 1),
(3, 'Un dunk dans l\'univers', 21, '2024-01-02', 22.75, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE `theme` (
  `id` tinyint(4) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `theme`
--

INSERT INTO `theme` (`id`, `nom`) VALUES
(1, 'Animaux'),
(2, 'Sport'),
(3, 'Nature'),
(4, 'Inusité'),
(5, 'Jeux vidéo'),
(6, 'Techno'),
(7, 'Plein air');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thm_id` (`thm_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Index pour la table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`thm_id`) REFERENCES `theme` (`id`),
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `categorie` (`id`);
COMMIT;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 18 nov. 2025 à 17:00
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `teetim_gr2`
--
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
(2, 'Casquettes'),
(3, 'Hoodies'),
(1, 'Teeshirts');

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
(191, 'Cute comme un poisson tropical', 34, '2020-04-25', 25.95, 1, 1),
(192, 'Monstre douillet', 123, '2023-08-12', 25.95, 1, 1),
(193, 'Camarade basque', 20, '2023-02-27', 20.50, 1, 1),
(194, 'Chaton moteur', 12, '2024-10-01', 27.50, 1, 1),
(195, 'Panda philosophe', 87, '2023-05-15', 24.95, 1, 1),
(196, 'Loup lunaire', 156, '2022-11-30', 26.50, 1, 1),
(197, 'Renard rêveur', 45, '2024-03-08', 23.95, 1, 1),
(198, 'Ours polaire poétique', 198, '2021-12-15', 27.95, 1, 1),
(199, 'Éléphant élégant', 67, '2023-07-22', 25.50, 1, 1),
(200, 'Hibou sage', 234, '2022-09-10', 24.95, 1, 1),
(201, 'Koala câlin', 89, '2024-01-18', 22.95, 1, 1),
(202, 'Pingouin danseur', 112, '2023-04-05', 23.50, 1, 1),
(203, 'Tigre tranquille', 178, '2022-06-14', 28.95, 1, 1),
(204, 'Tortue temporelle', 34, '2024-05-20', 21.95, 1, 1),
(205, 'Papillon magique', 145, '2023-09-12', 19.95, 1, 1),
(206, 'Dauphin joyeux', 267, '2022-03-25', 25.95, 1, 1),
(207, 'Colibri cosmique', 56, '2024-07-08', 24.50, 1, 1),
(208, 'Flamant rose flottant', 93, '2023-11-19', 23.95, 1, 1),
(209, 'Caméléon coloré', 201, '2022-08-30', 26.95, 1, 1),
(210, 'Castor constructeur', 41, '2024-02-14', 22.50, 1, 1),
(211, 'Écureuil énergique', 118, '2023-06-07', 20.95, 1, 1),
(212, 'Lapin lunaire', 189, '2022-10-22', 24.95, 1, 1),
(213, 'Perroquet pirate', 72, '2024-04-11', 25.50, 1, 1),
(214, 'Hippopotame heureux', 134, '2023-01-28', 26.50, 1, 1),
(215, 'Girafe galactique', 167, '2022-05-16', 27.95, 1, 1),
(216, 'Zèbre zen', 58, '2024-08-03', 23.50, 1, 1),
(217, 'Phoque souriant', 102, '2023-10-09', 22.95, 1, 1),
(218, 'Loutre ludique', 223, '2022-12-04', 24.50, 1, 1),
(219, 'Serpent serein', 38, '2024-06-25', 21.50, 1, 1),
(220, 'Grenouille groove', 145, '2023-03-17', 20.50, 1, 1),
(221, 'Fauteuil illégal', 6, '2024-06-20', 20.50, 2, 1),
(222, 'Toaster philosophique', 78, '2023-08-14', 22.95, 2, 1),
(223, 'Chaussette spatiale', 156, '2022-11-07', 19.95, 2, 1),
(224, 'Parapluie paradoxal', 43, '2024-02-29', 23.50, 2, 1),
(225, 'Cuillère cosmique', 91, '2023-05-22', 21.95, 2, 1),
(226, 'Lampe lyrique', 187, '2022-09-18', 24.95, 2, 1),
(227, 'Brosse à dents temporelle', 29, '2024-07-12', 18.95, 2, 1),
(228, 'Fourchette féerique', 134, '2023-12-05', 20.50, 2, 1),
(229, 'Réveil rêveur', 245, '2022-04-28', 22.50, 2, 1),
(230, 'Crayon créatif 2', 67, '2024-10-15', 19.50, 2, 1),
(231, 'Clavier quantique', 103, '2023-07-30', 25.95, 2, 1),
(232, 'Bouteille bavarde', 178, '2022-06-11', 21.50, 2, 1),
(233, 'Tasse télépathique', 52, '2024-03-19', 23.95, 2, 1),
(234, 'Assiette astrale', 89, '2023-11-26', 24.50, 2, 1),
(235, 'Oreiller onirique', 212, '2022-08-09', 26.95, 2, 1),
(236, 'Téléphone transdimensionnel', 41, '2024-05-07', 27.50, 2, 1),
(237, 'Montre mystique', 126, '2023-02-13', 28.95, 2, 1),
(238, 'Lunettes lumineuses', 198, '2022-10-31', 22.95, 2, 1),
(239, 'Sac surnaturel', 73, '2024-09-04', 25.50, 2, 1),
(240, 'Ciseaux célestes', 117, '2023-04-20', 20.95, 2, 1),
(241, 'Un dunk dans l\'univers', 21, '2024-01-02', 22.75, 3, 1),
(242, 'Football fantastique', 189, '2023-06-18', 24.95, 3, 1),
(243, 'Tennis temporel', 143, '2022-09-25', 23.50, 3, 1),
(244, 'Surf stellaire', 67, '2024-04-16', 26.95, 3, 1),
(245, 'Skate sidéral', 98, '2023-10-29', 25.50, 3, 1),
(246, 'Vélo véloce', 234, '2022-07-14', 22.95, 3, 1),
(247, 'Yoga yogique', 156, '2024-08-22', 21.50, 3, 1),
(248, 'Boxe brillante', 112, '2023-03-06', 27.95, 3, 1),
(249, 'Golf galactique', 187, '2022-12-19', 24.50, 3, 1),
(250, 'Natation nébuleuse', 89, '2024-05-28', 23.95, 3, 1),
(251, 'Escalade cosmique', 134, '2023-09-11', 28.50, 3, 1),
(252, 'Course céleste', 267, '2022-05-03', 22.50, 3, 1),
(253, 'Hockey héroïque', 45, '2024-11-07', 26.50, 3, 1),
(254, 'Volley-ball volant', 178, '2023-01-24', 23.50, 3, 1),
(255, 'Baseball brillant', 201, '2022-08-17', 25.95, 3, 1),
(256, 'Rugby rugissant', 92, '2024-02-09', 27.50, 3, 1),
(257, 'Ping-pong planétaire', 156, '2023-07-15', 19.95, 3, 1),
(258, 'Badminton astral', 123, '2022-11-28', 21.95, 3, 1),
(259, 'Karaté cosmique', 78, '2024-06-13', 26.95, 3, 1),
(260, 'Athlétisme atmosphérique', 145, '2023-12-01', 24.95, 3, 1),
(261, 'bleu comme une orange', 325, '2023-12-25', 25.95, 4, 1),
(262, 'Ét vogue le navire', 293, '2020-12-21', 15.50, 4, 1),
(263, 'Forêt enchantée', 198, '2023-05-09', 26.50, 4, 1),
(264, 'Montagne majestueuse', 234, '2022-10-14', 27.95, 4, 1),
(265, 'Rivière rêveuse', 87, '2024-03-27', 23.50, 4, 1),
(266, 'Désert doré', 156, '2023-08-19', 24.95, 4, 1),
(267, 'Cascade cristalline', 267, '2022-06-05', 25.50, 4, 1),
(268, 'Aurore boréale', 112, '2024-09-11', 28.95, 4, 1),
(269, 'Fleur cosmique', 178, '2023-02-23', 22.95, 4, 1),
(270, 'Arbre ancestral', 289, '2022-09-08', 26.95, 4, 1),
(271, 'Oasis onirique', 94, '2024-01-16', 24.50, 4, 1),
(272, 'Volcan vibrant', 134, '2023-11-04', 27.50, 4, 1),
(273, 'Mer mystique', 312, '2022-04-21', 25.95, 4, 1),
(274, 'Champ de lavande', 67, '2024-07-29', 23.95, 4, 1),
(275, 'Canyon céleste', 189, '2023-04-12', 26.50, 4, 1),
(276, 'Prairie printanière', 245, '2022-12-07', 22.50, 4, 1),
(277, 'Glacier glacé', 78, '2024-05-18', 28.50, 4, 1),
(278, 'Jungle joyeuse', 167, '2023-09-26', 24.95, 4, 1),
(279, 'Plage paradisiaque', 298, '2022-07-13', 25.50, 4, 1),
(280, 'Vallée verdoyante', 123, '2024-10-05', 23.50, 4, 1),
(281, 'Pixel parfait', 187, '2023-06-14', 24.95, 5, 1),
(282, 'Boss final', 256, '2022-11-22', 26.50, 5, 1),
(283, 'Power-up puissant', 134, '2024-02-08', 23.95, 5, 1),
(284, 'Manette magique', 189, '2023-08-30', 25.50, 5, 1),
(285, 'Level up!', 312, '2022-05-17', 22.95, 5, 1),
(286, 'Combo cosmique', 98, '2024-09-24', 27.50, 5, 1),
(287, 'Rage quit', 223, '2023-01-11', 21.95, 5, 1),
(288, 'Respawn rapide', 178, '2022-09-29', 24.50, 5, 1),
(289, 'GG bien joué', 156, '2024-04-06', 23.50, 5, 1),
(290, 'Achievement débloqué', 201, '2023-10-18', 25.95, 5, 1),
(291, 'Speedrun stellaire', 267, '2022-03-25', 26.95, 5, 1),
(292, 'Easter egg', 89, '2024-07-14', 22.50, 5, 1),
(293, 'Bug ou feature?', 145, '2023-05-02', 24.95, 5, 1),
(294, 'Noob friendly', 198, '2022-12-20', 20.95, 5, 1),
(295, 'Pro gamer', 67, '2024-11-08', 28.50, 5, 1),
(296, 'Loot légendaire', 234, '2023-03-16', 27.95, 5, 1),
(297, 'Glitch glorieux', 167, '2022-08-04', 23.95, 5, 1),
(298, 'NPC philosophe', 112, '2024-01-22', 25.50, 5, 1),
(299, 'Quest épique', 189, '2023-11-09', 26.50, 5, 1),
(300, 'Save point sacré', 245, '2022-06-27', 24.50, 5, 1),
(301, 'Guitare galactique', 178, '2023-07-21', 25.95, 6, 1),
(302, 'Piano planétaire', 234, '2022-10-09', 27.50, 6, 1),
(303, 'Batterie brillante', 98, '2024-03-15', 24.95, 6, 1),
(304, 'Violon vibrant', 156, '2023-09-03', 26.50, 6, 1),
(305, 'Saxophone sidéral', 289, '2022-04-18', 28.95, 6, 1),
(306, 'Trompette temporelle', 67, '2024-08-26', 23.50, 6, 1),
(307, 'Flûte féerique', 201, '2023-02-12', 22.95, 6, 1),
(308, 'Harpe harmonique', 167, '2022-11-30', 27.95, 6, 1),
(309, 'Basse cosmique', 134, '2024-05-09', 25.50, 6, 1),
(310, 'Synthé stellaire', 189, '2023-12-17', 26.95, 6, 1),
(311, 'DJ dimensionnel', 312, '2022-07-05', 24.50, 6, 1),
(312, 'Microphone magique', 78, '2024-10-23', 21.95, 6, 1),
(313, 'Casque céleste', 223, '2023-04-08', 28.50, 6, 1),
(314, 'Vinyle vintage', 267, '2022-09-16', 23.95, 6, 1),
(315, 'Note nébuleuse', 145, '2024-01-31', 22.50, 6, 1),
(316, 'Rythme radieux', 178, '2023-10-27', 25.95, 6, 1),
(317, 'Mélodie mystique', 298, '2022-05-14', 26.50, 6, 1),
(318, 'Accord astral', 89, '2024-06-02', 24.95, 6, 1),
(319, 'Tempo transcendant', 156, '2023-08-10', 27.50, 6, 1),
(320, 'Symphonie spatiale', 234, '2022-12-28', 29.95, 6, 1),
(321, 'Concert cosmique', 112, '2024-09-17', 25.50, 6, 1),
(322, 'Festival féerique', 198, '2023-03-26', 23.95, 6, 1),
(323, 'Rock stellaire', 245, '2022-08-13', 26.95, 6, 1),
(324, 'Jazz joyeux', 134, '2024-04-21', 24.50, 6, 1),
(325, 'Blues brillant', 167, '2023-11-29', 22.95, 6, 1),
(326, 'Atome aventurier', 189, '2023-05-16', 24.95, 7, 1),
(327, 'Molécule magique', 223, '2022-10-24', 25.50, 7, 1),
(328, 'Neurone nébuleux', 98, '2024-02-03', 26.95, 7, 1),
(329, 'Cellule céleste', 156, '2023-09-19', 23.95, 7, 1),
(330, 'ADN dimensionnel', 267, '2022-04-07', 27.50, 7, 1),
(331, 'Électron énergique', 78, '2024-07-15', 22.50, 7, 1),
(332, 'Proton puissant', 201, '2023-01-23', 24.50, 7, 1),
(333, 'Neutron nébulaire', 178, '2022-11-11', 25.95, 7, 1),
(334, 'Photon fantastique', 123, '2024-05-30', 26.50, 7, 1),
(335, 'Quark quantique', 189, '2023-12-08', 28.95, 7, 1),
(336, 'Microscope mystique', 234, '2022-06-16', 23.50, 7, 1),
(337, 'Télescope temporel', 67, '2024-10-04', 27.95, 7, 1),
(338, 'Éprouvette étoilée', 145, '2023-03-13', 21.95, 7, 1),
(339, 'Laboratoire lunaire', 198, '2022-09-21', 26.95, 7, 1),
(340, 'Équation éblouissante', 112, '2024-01-09', 24.95, 7, 1),
(341, 'Formule féerique', 167, '2023-10-17', 25.50, 7, 1),
(342, 'Théorème transcendant', 289, '2022-05-25', 28.50, 7, 1),
(343, 'Expérience extraordinaire', 89, '2024-08-13', 23.95, 7, 1),
(344, 'Chimie céleste', 178, '2023-02-01', 26.50, 7, 1),
(345, 'Physique fantastique', 245, '2022-12-09', 27.50, 7, 1),
(346, 'Biologie brillante', 98, '2024-06-27', 24.50, 7, 1),
(347, 'Astronomie astrale', 156, '2023-11-14', 29.95, 7, 1),
(348, 'Géologie galactique', 201, '2022-07-22', 25.95, 7, 1),
(349, 'Écologie cosmique', 134, '2024-03-30', 23.50, 7, 1),
(350, 'Mathématiques mystiques', 189, '2023-08-07', 26.95, 7, 1),
(351, 'Pinceau planétaire', 167, '2023-06-25', 24.95, 8, 1),
(352, 'Palette paradisiaque', 223, '2022-10-03', 26.50, 8, 1),
(353, 'Toile temporelle', 98, '2024-02-19', 25.95, 8, 1),
(354, 'Sculpture sidérale', 145, '2023-09-27', 27.50, 8, 1),
(355, 'Couleur cosmique', 289, '2022-04-15', 23.95, 8, 1),
(356, 'Dessin dimensionnel', 67, '2024-07-23', 22.50, 8, 1),
(357, 'Crayon créatif', 201, '2023-01-31', 20.95, 8, 1),
(358, 'Aquarelle astrale', 178, '2022-11-19', 25.50, 8, 1),
(359, 'Pastel planétaire', 112, '2024-05-07', 24.50, 8, 1),
(360, 'Spray stellaire', 156, '2023-12-16', 26.95, 8, 1),
(361, 'Graffiti galactique', 234, '2022-06-24', 28.50, 8, 1),
(362, 'Mosaïque mystique', 89, '2024-10-12', 27.95, 8, 1),
(363, 'Collage cosmique', 167, '2023-03-21', 23.50, 8, 1),
(364, 'Photographie féerique', 198, '2022-09-29', 29.95, 8, 1),
(365, 'Illustration illuminée', 123, '2024-01-17', 24.95, 8, 1),
(366, 'Calligraphie céleste', 145, '2023-10-25', 25.50, 8, 1),
(367, 'Origami onirique', 267, '2022-05-02', 21.95, 8, 1),
(368, 'Poterie planétaire', 78, '2024-08-20', 26.50, 8, 1),
(369, 'Vitrail vibrant', 189, '2023-02-09', 28.95, 8, 1),
(370, 'Tapisserie temporelle', 212, '2022-12-17', 27.50, 8, 1),
(371, 'Fresque fantastique', 98, '2024-06-05', 25.95, 8, 1),
(372, 'Portrait paradoxal', 134, '2023-11-22', 24.50, 8, 1),
(373, 'Paysage planétaire', 223, '2022-07-30', 26.95, 8, 1),
(374, 'Nature morte nébuleuse', 112, '2024-04-08', 23.95, 8, 1),
(375, 'Abstrait astral', 178, '2023-08-16', 27.95, 8, 1),
(376, 'Surréalisme stellaire', 289, '2022-03-24', 29.95, 8, 1),
(377, 'Impressionnisme intergalactique', 89, '2024-09-01', 28.50, 8, 1),
(378, 'Cubisme cosmique', 156, '2023-05-10', 26.50, 8, 1),
(379, 'Pop art planétaire', 234, '2022-10-18', 25.50, 8, 1),
(380, 'Minimalisme mystique', 123, '2024-02-25', 24.95, 8, 1);

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
(8, 'Art'),
(2, 'Inusité'),
(5, 'Jeux vidéo'),
(6, 'Musique'),
(4, 'Nature'),
(7, 'Science'),
(3, 'Sport');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`,`cat_id`),
  ADD KEY `thm_id` (`thm_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Index pour la table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=381;

--
-- AUTO_INCREMENT pour la table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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

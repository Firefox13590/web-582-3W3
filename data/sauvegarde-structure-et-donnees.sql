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
-- Base de données : `teetim`
--
CREATE DATABASE IF NOT EXISTS `teetim` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `teetim`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` tinyint(4) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='les catégories de produits';

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(2, 'Casquettes'),
(3, 'Hoodies'),
(1, 'Teeshirts');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` smallint(6) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `ventes` smallint(6) NOT NULL DEFAULT 0,
  `dac` date NOT NULL,
  `prix` decimal(5,2) NOT NULL,
  `themeId` tinyint(4) NOT NULL,
  `categorieId` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='les produits';

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `ventes`, `dac`, `prix`, `themeId`, `categorieId`) VALUES
(1, 'Cute comme un poisson tropical', 34, '2020-04-25', 25.95, 1, 1),
(2, 'Monstre douillet', 123, '2023-08-12', 25.95, 1, 1),
(3, 'Camarade basque', 20, '2023-02-27', 20.50, 1, 1),
(4, 'Chaton moteur', 12, '2024-10-01', 27.50, 1, 1),
(5, 'Renardcoptère', 56, '2023-05-04', 17.95, 1, 1),
(6, 'L\'outre d\'outremer', 260, '2023-10-11', 15.95, 1, 1),
(7, 'Galactique Forêt', 363, '2021-05-22', 24.68, 1, 1),
(8, 'Lunaire Forêt', 279, '2024-11-07', 29.58, 1, 1),
(9, 'Cosmique Dragon', 359, '2021-05-07', 15.28, 1, 1),
(10, 'Classique Héros', 311, '2024-01-08', 19.74, 1, 1),
(11, 'Lunaire Océan', 176, '2020-11-30', 30.97, 1, 1),
(12, 'Radieux Robot', 350, '2024-05-26', 21.03, 1, 1),
(13, 'Galactique Héros', 55, '2022-01-08', 16.89, 1, 1),
(14, 'Galactique Rêve', 397, '2021-05-05', 31.17, 1, 1),
(15, 'Cosmique Soleil', 388, '2024-01-27', 23.61, 1, 1),
(16, 'Classique Chanson', 490, '2020-11-09', 25.71, 1, 1),
(17, 'Classique Masque', 450, '2022-10-12', 23.81, 1, 1),
(18, 'Épique Chat', 277, '2024-05-26', 31.43, 1, 1),
(19, 'Lunaire Rêve', 169, '2022-09-02', 26.04, 1, 1),
(20, 'Épique Robot', 282, '2025-07-29', 32.83, 1, 1),
(21, 'Mystique Soleil', 257, '2025-02-18', 25.87, 1, 1),
(22, 'Galactique Robot', 30, '2024-04-25', 28.49, 1, 1),
(23, 'Funky Chat', 482, '2022-06-16', 26.44, 1, 1),
(24, 'Mystique Dragon', 425, '2024-12-18', 33.96, 1, 1),
(25, 'Mystique Héros', 101, '2025-04-06', 18.08, 1, 1),
(26, 'Radieux Robot Méchant', 291, '2023-05-14', 26.89, 1, 1),
(27, 'Mystique Dragon Aqueux', 156, '2024-08-31', 16.78, 1, 1),
(28, 'Funky Rêve', 371, '2021-07-21', 30.21, 1, 1),
(29, 'Mystique Robot', 139, '2022-02-27', 20.46, 1, 1),
(30, 'Radieux Dragon', 390, '2020-09-06', 27.17, 1, 1),
(31, 'Lunaire Masque', 323, '2025-01-28', 30.94, 1, 1),
(32, 'Mystique Mélodie', 136, '2023-05-25', 17.10, 1, 1),
(33, 'Galactique Masque', 469, '2020-08-08', 29.22, 1, 1),
(34, 'Funky Héros', 34, '2020-12-06', 21.89, 1, 1),
(35, 'Pixelisé Océan', 211, '2025-01-23', 29.32, 1, 1),
(36, 'Fauteuil illégal', 6, '2024-06-20', 20.50, 2, 1),
(37, 'Cerveau volant', 154, '2023-08-08', 24.50, 2, 1),
(38, 'Beau bébébot', 2, '2024-09-05', 26.50, 2, 1),
(39, 'Grille-pain couac-couac', 0, '2024-10-01', 20.00, 2, 1),
(40, 'Mystique Robot Sale', 63, '2024-03-19', 27.82, 2, 1),
(41, 'Galactique Chanson (Inusité)', 129, '2020-06-26', 31.89, 2, 1),
(42, 'Classique Robot (Inusité)', 301, '2020-05-15', 16.10, 2, 1),
(43, 'Cosmique Rêve', 377, '2023-01-16', 18.89, 2, 1),
(44, 'La Piste du Rire', 420, '2020-12-31', 31.94, 2, 1),
(45, 'Galactique Robot 2', 411, '2025-01-14', 33.92, 2, 1),
(46, 'Pixelisé Dragon', 474, '2023-01-27', 19.01, 2, 1),
(47, 'Uniforme, Queue de Requin, Ciseaux', 49, '2020-08-02', 22.08, 2, 1),
(48, 'Métros de votre esprit', 72, '2020-12-18', 33.91, 2, 1),
(49, 'Cosmique Chanson (Inusité)', 232, '2025-03-03', 24.21, 2, 1),
(50, 'Maison de l\'oie', 196, '2021-09-29', 19.46, 2, 1),
(51, 'Queue de la fée', 361, '2021-09-06', 32.00, 2, 1),
(52, 'Singe Génial', 163, '2021-05-06', 25.11, 2, 1),
(53, 'Pixelisé Forêt (Inusité)', 203, '2021-04-01', 23.43, 2, 1),
(54, 'Radieux Rêve', 151, '2021-08-22', 32.61, 2, 1),
(55, 'Gants de Squelette', 55, '2025-02-24', 25.47, 2, 1),
(56, 'Un Très Gros Trou Juste Devant', 476, '2021-10-23', 23.25, 2, 1),
(57, 'Épique Dragon (Inusité)', 51, '2020-07-03', 27.20, 2, 1),
(58, 'Funky Forêt (Inusité)', 217, '2023-04-01', 25.84, 2, 1),
(59, 'Lunaire Soleil', 285, '2021-09-14', 18.86, 2, 1),
(60, 'Joli Derby', 393, '2021-07-01', 31.22, 2, 1),
(61, 'Mystique Dragon 7', 499, '2022-12-16', 22.15, 2, 1),
(62, 'Radieux Dragon 1', 148, '2024-02-23', 23.96, 2, 1),
(63, 'Héro Radieux', 336, '2020-10-23', 25.92, 2, 1),
(64, 'Pixelisé Robot (Inusité)', 360, '2022-11-18', 27.09, 2, 1),
(65, 'Vintage Héros (Inusité)', 214, '2022-06-25', 22.19, 2, 1),
(66, 'Un dunk dans l\'univers', 21, '2024-01-02', 22.75, 3, 1),
(67, 'Basket courbe', 158, '2023-09-04', 19.75, 3, 1),
(68, 'pizza, vino e calcio', 40, '2024-07-18', 19.75, 3, 1),
(69, 'Course de Billes d\'acier', 23, '2024-09-24', 23.25, 3, 1),
(70, 'Compétition de Bâton Sauteur', 428, '2025-03-26', 20.75, 3, 1),
(71, 'Coup de Poing!!', 75, '2023-01-20', 17.33, 3, 1),
(72, 'Radieux Dragon 12', 386, '2024-10-06', 34.48, 3, 1),
(73, 'Galactique Masque 536', 365, '2021-04-15', 18.35, 3, 1),
(74, 'Funky Forêt 1234567890', 194, '2023-09-06', 27.74, 3, 1),
(75, 'Lunaire Masque 12', 57, '2022-07-12', 19.02, 3, 1),
(76, 'Cosmique Héros (Sport)', 438, '2021-07-08', 18.09, 3, 1),
(77, 'Vintage Chanson (Sport)', 69, '2025-01-25', 24.23, 3, 1),
(78, 'Vintage Soleil (Sport)', 2, '2025-08-29', 29.24, 3, 1),
(79, 'Mystique Chat (Sport)', 454, '2024-03-21', 23.48, 3, 1),
(80, 'Cosmique Océan (Sport)', 54, '2025-03-08', 32.65, 3, 1),
(81, 'Radieux Soleil (Sport)', 462, '2021-11-04', 21.87, 3, 1),
(82, 'Mystique Forêt (Sport)', 87, '2024-01-30', 20.43, 3, 1),
(83, 'Lunaire Chanson (Sport)', 492, '2025-07-20', 24.07, 3, 1),
(84, 'Galactique Forêt asdasd', 348, '2023-04-25', 30.95, 3, 1),
(85, 'Lunaire Chanson 09', 17, '2022-12-25', 26.92, 3, 1),
(86, 'Classique Forêt (Sport)', 153, '2022-06-14', 32.42, 3, 1),
(87, 'Cosmique Robot (Sport)', 449, '2023-05-02', 31.29, 3, 1),
(88, 'Funky Rêve (Sport)', 243, '2020-06-11', 29.36, 3, 1),
(89, 'Pixelisé Soleil (Sport)', 85, '2024-01-02', 34.71, 3, 1),
(90, 'Vintage Masque (Sport)', 53, '2023-01-08', 27.32, 3, 1),
(91, 'Cosmique Dragon (Sport)', 400, '2023-06-20', 22.78, 3, 1),
(92, 'Classique Héros (Sport)', 327, '2021-08-21', 21.85, 3, 1),
(93, 'Pixelisé Masque (Sport)', 319, '2021-06-14', 22.37, 3, 1),
(94, 'Bleu comme une orange', 325, '2023-12-25', 25.95, 4, 1),
(95, 'Et vogue le navire', 293, '2020-12-21', 15.50, 4, 1),
(96, 'Par une nuit d\'été sur Mars', 48, '2024-01-30', 22.00, 4, 1),
(97, 'Le déjeuner pointilliste', 55, '2024-02-21', 21.00, 4, 1),
(98, 'Portrait au tournesol', 24, '2024-03-26', 29.99, 4, 1),
(99, 'Reflexion dans le lac', 12, '2024-07-10', 21.50, 4, 1),
(100, 'Levé de soleil en automne', 5, '2024-08-28', 22.95, 4, 1),
(101, 'Belle Nature', 161, '2021-03-31', 32.12, 4, 1),
(102, 'Funky Héros (Nature)', 368, '2024-05-11', 33.97, 4, 1),
(103, 'Chanson de Soie', 291, '2023-03-18', 24.51, 4, 1),
(104, 'Galactique Chat (Nature)', 342, '2023-09-16', 30.15, 4, 1),
(105, 'Classique Rêve (Nature)', 181, '2020-05-25', 32.63, 4, 1),
(106, 'Mystique Robot 2', 341, '2025-01-22', 22.43, 4, 1),
(107, 'Classique Rêve (Nature 2)', 0, '2022-10-11', 16.12, 4, 1),
(108, 'Galactique Dragon (Nature)', 197, '2023-02-27', 24.18, 4, 1),
(109, 'Classique Soleil (Nature)', 114, '2024-10-13', 26.35, 4, 1),
(110, 'Funky Rêve (Nature)', 165, '2023-09-11', 21.90, 4, 1),
(111, 'Funky Soleil (Nature)', 9, '2022-09-22', 31.49, 4, 1),
(112, 'Mystique Héros (Nature)', 334, '2022-08-19', 18.48, 4, 1),
(113, 'Galactique Forêt djasnbidani', 208, '2021-05-24', 24.58, 4, 1),
(114, 'Crapaudilique', 211, '2020-09-22', 18.62, 4, 1),
(115, 'Floraison de Cendres et Joyeux Printemps', 470, '2024-09-11', 18.85, 4, 1),
(116, 'Radieux Soleil (Nature)', 379, '2024-12-20', 15.34, 4, 1),
(117, 'Classique Chat (Nature)', 21, '2021-09-25', 27.93, 4, 1),
(118, 'Lunaire Rêve (Nature)', 464, '2025-10-15', 26.65, 4, 1),
(119, 'Classique Masque (Nature)', 78, '2024-01-14', 19.58, 4, 1),
(120, 'Funky Chanson (Nature)', 8, '2025-06-05', 25.42, 4, 1),
(121, 'Funky Rêve (Nature 2)', 243, '2021-11-26', 31.44, 4, 1),
(122, 'Galactique Océan (Nature)', 211, '2025-07-21', 27.27, 4, 1),
(123, 'Cosmique Masque (Nature)', 192, '2025-03-30', 20.11, 4, 1),
(124, 'Mystique Héros (Nature 2)', 139, '2022-06-13', 30.87, 4, 1),
(125, 'Vintage Dragon (Nature)', 75, '2020-05-30', 30.13, 4, 1),
(126, 'Funky Masque (Nature)', 11, '2023-05-26', 18.86, 4, 1),
(127, 'Pixelisé Soleil (Nature)', 205, '2025-05-31', 16.17, 4, 1),
(128, 'Galactique Chat (Nature 2)', 93, '2025-10-21', 27.90, 4, 1),
(129, 'Funky Robot (Nature)', 313, '2020-11-04', 29.52, 4, 1),
(130, 'Classique Soleil (Nature 2)', 300, '2023-01-05', 33.83, 4, 1),
(131, 'Épique Dragon (Nature)', 304, '2022-05-23', 29.65, 4, 1),
(132, 'Épique Héros (Nature)', 485, '2020-05-27', 17.14, 4, 1),
(133, 'Le Magicien des Ténèbres', 489, '2020-10-21', 18.62, 5, 1),
(134, 'Le Dragon Blanc aux Yeux bleus', 284, '2021-02-27', 19.36, 5, 1),
(135, 'Le Dragon Noir aux Yeux Rouges', 27, '2025-09-11', 33.46, 5, 1),
(136, 'Monstres de Poche', 200, '2023-05-20', 19.87, 5, 1),
(137, 'Monde de Copains', 52, '2021-09-10', 34.92, 5, 1),
(138, 'Cosmique Robot (JV)', 226, '2024-03-14', 22.74, 5, 1),
(139, 'Classique Océan (JV)', 27, '2022-07-04', 18.20, 5, 1),
(140, 'Classique Soleil (JV)', 23, '2024-04-18', 28.59, 5, 1),
(141, 'Oeil Doré', 168, '2023-11-16', 26.90, 5, 1),
(142, 'Engrenage Métallique Solide', 371, '2023-02-23', 26.90, 5, 1),
(143, 'Funky Forêt 0', 168, '2021-04-19', 25.01, 5, 1),
(144, 'Pixelisé Robot (JV)', 449, '2020-08-21', 16.59, 5, 1),
(145, 'Cinq Nuits chez Fréd', 303, '2021-05-31', 34.84, 5, 1),
(146, 'Cosmique Masque (JV)', 286, '2024-08-21', 19.54, 5, 1),
(147, 'Guerres de Lit', 84, '2022-05-05', 26.63, 5, 1),
(148, 'Équipe RWBY', 228, '2025-08-28', 18.35, 5, 1),
(149, 'Lunaire Héros (JV)', 304, '2020-10-12', 22.03, 5, 1),
(150, 'Galactique Chat (JV)', 442, '2024-04-25', 33.82, 5, 1),
(151, 'Vintage Dragon (JV)', 402, '2024-08-10', 31.22, 5, 1),
(152, 'Mystique Masque (JV)', 344, '2024-09-23', 19.77, 5, 1),
(153, 'Mystique Masque (JV 2)', 184, '2020-08-17', 20.63, 5, 1),
(154, 'Vintage Océan (JV)', 396, '2021-06-23', 23.62, 5, 1),
(155, 'Mystique Robot 3', 338, '2022-08-28', 18.55, 5, 1),
(156, 'Lunaire Héros (JV 2)', 443, '2020-11-28', 15.11, 5, 1),
(157, 'Radieux Chanson (JV)', 320, '2020-06-26', 27.31, 5, 1),
(158, 'Funky Rêve (JV)', 106, '2025-04-07', 27.68, 5, 1),
(159, 'Jeu de la Crevette', 290, '2020-12-13', 18.86, 5, 1),
(160, 'Galactique Chanson (JV)', 24, '2024-05-16', 30.73, 5, 1),
(161, 'Pixelisé Forêt (Musique)', 354, '2021-10-28', 29.62, 6, 1),
(162, 'Mystique Soleil (Musique)', 271, '2020-08-14', 34.84, 6, 1),
(163, 'Pixelisé Rêve', 193, '2020-05-20', 20.50, 6, 1),
(164, 'DJ Homme Musical', 376, '2023-01-02', 17.40, 6, 1),
(165, 'Épique Rêve (Musique)', 415, '2022-02-15', 27.30, 6, 1),
(166, 'Épique Chat (Musique)', 253, '2025-07-06', 34.60, 6, 1),
(167, 'Épique Robot (Musique)', 445, '2023-12-15', 17.43, 6, 1),
(168, 'Épique Soleil (Musique)', 392, '2025-02-27', 29.76, 6, 1),
(169, 'Funky Océan', 241, '2023-07-29', 21.36, 6, 1),
(170, 'Radieux Masque (Musique)', 45, '2025-02-23', 26.13, 6, 1),
(171, 'Cosmique Soleil (Musique)', 342, '2025-05-09', 18.25, 6, 1),
(172, 'Galactique Dragon (Musique)', 51, '2020-12-17', 25.26, 6, 1),
(173, 'Cosmique Forêt (Musique)', 157, '2020-12-10', 26.75, 6, 1),
(174, 'Mystique Chat (Musique)', 89, '2023-10-06', 31.65, 6, 1),
(175, 'Vintage Chat', 216, '2021-10-05', 26.65, 6, 1),
(176, 'Lunaire Masque 13213', 196, '2024-12-10', 29.89, 6, 1),
(177, 'Mystique Rêve (Musique)', 344, '2022-06-07', 31.36, 6, 1),
(178, 'Lunaire Océan (Musique)', 323, '2021-05-31', 22.66, 6, 1),
(179, 'Classique Héros (Musique)', 75, '2021-04-09', 23.74, 6, 1),
(180, 'Épique Masque (Musique)', 497, '2024-05-09', 25.17, 6, 1),
(181, 'Lunaire Masque 5314', 26, '2025-08-16', 25.81, 6, 1),
(182, 'Cosmique Forêt (Musique 2)', 441, '2022-02-10', 15.64, 6, 1),
(183, 'Mystique Océan (Musique)', 405, '2020-11-09', 33.28, 6, 1),
(184, 'Funky Robot (Musique)', 221, '2022-04-28', 30.12, 6, 1),
(185, 'Funky Robot (Musique 2)', 138, '2021-04-27', 19.57, 6, 1),
(186, 'Vintage Océan (Musique)', 243, '2023-08-23', 28.53, 6, 1),
(187, 'Mystique Robot 4', 83, '2020-11-25', 19.43, 6, 1),
(188, 'Classique Chanson (Culture)', 472, '2021-02-14', 21.04, 7, 1),
(189, 'Vintage Chanson (Culture)', 289, '2020-11-01', 32.70, 7, 1),
(190, 'Galactique Chat (Culture)', 340, '2025-04-27', 33.75, 7, 1),
(191, 'Épique Soleil (Culture)', 316, '2024-12-16', 24.96, 7, 1),
(192, 'Vintage Dragon (Culture)', 474, '2020-12-12', 26.06, 7, 1),
(193, 'Lunaire Forêt (Culture)', 78, '2024-01-08', 32.65, 7, 1),
(194, 'Cosmique Océan (Culture)', 271, '2024-03-08', 31.18, 7, 1),
(195, 'Classique Dragon', 120, '2024-04-09', 29.63, 7, 1),
(196, 'Vintage Rêve (Culture)', 102, '2020-07-31', 24.01, 7, 1),
(197, 'Funky Robot (Culture)', 262, '2022-10-01', 33.04, 7, 1),
(198, 'Radieux Robot (Culture)', 343, '2021-04-01', 19.04, 7, 1),
(199, 'Pixelisé Forêt (Culture)', 306, '2023-06-30', 19.31, 7, 1),
(200, 'Galactique Océan (Culture)', 38, '2023-10-01', 22.87, 7, 1),
(201, 'Radieux Chanson (Culture)', 347, '2021-07-12', 22.57, 7, 1),
(202, 'Funky Soleil (Culture)', 392, '2021-09-07', 18.38, 7, 1),
(203, 'Radieux Chat (Culture)', 133, '2021-03-20', 22.65, 7, 1),
(204, 'Radieux Héros (Culture)', 426, '2025-06-02', 22.34, 7, 1),
(205, 'Radieux Héros (Culture 2)', 251, '2021-08-10', 34.30, 7, 1),
(206, 'Pixelisé Robot (Culture)', 484, '2024-06-05', 21.95, 7, 1),
(207, 'Cosmique Chat (Culture)', 83, '2023-01-03', 21.08, 7, 1),
(208, 'Mystique Chat (Culture)', 360, '2020-11-18', 34.45, 7, 1),
(209, 'Cosmique Chat (Culture 2)', 118, '2024-10-02', 28.80, 7, 1),
(210, 'Mystique Robot 1', 118, '2024-08-22', 32.87, 7, 1),
(211, 'Mystique Océan (Culture)', 341, '2025-02-05', 16.81, 7, 1),
(212, 'Pixelisé Océan (Culture)', 88, '2025-07-13', 34.06, 7, 1),
(213, 'Vintage Rêve (Culture 2)', 461, '2024-02-10', 17.94, 7, 1),
(214, 'Lunaire Masque 0000', 128, '2023-06-13', 28.22, 7, 1),
(215, 'Cosmique Dragon (Culture)', 167, '2025-06-18', 31.39, 7, 1),
(216, 'Vintage Rêve (Culture 3)', 1, '2020-07-10', 29.00, 7, 1),
(217, 'Épique Masque (Culture)', 334, '2022-02-03', 24.89, 7, 1),
(218, 'Lunaire Robot', 157, '2025-10-09', 28.46, 7, 1),
(219, 'Vintage Chanson (Culture 2)', 485, '2020-08-01', 16.92, 7, 1),
(220, 'Pixelisé Robot (Culture 2)', 387, '2020-05-24', 17.00, 7, 1);

-- --------------------------------------------------------

--
-- Structure de la table `themes`
--

CREATE TABLE `themes` (
  `id` tinyint(4) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='les thèmes de produits';

--
-- Déchargement des données de la table `themes`
--

INSERT INTO `themes` (`id`, `nom`) VALUES
(1, 'Animaux'),
(7, 'Culture Pop'),
(2, 'Inusité'),
(5, 'Jeux vidéo'),
(6, 'Musique'),
(4, 'Nature'),
(3, 'Sport');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`,`categorieId`),
  ADD KEY `themeId` (`themeId`),
  ADD KEY `categorieId` (`categorieId`);

--
-- Index pour la table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2421;

--
-- AUTO_INCREMENT pour la table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`themeId`) REFERENCES `themes` (`id`),
  ADD CONSTRAINT `produits_ibfk_2` FOREIGN KEY (`categorieId`) REFERENCES `categories` (`id`);
COMMIT;

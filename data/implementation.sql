-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ----------------
-- Base de données 'teetim_gr2'
-- ----------------
-- 1) Créer la BD avec encodage de caractères et règles d'interclassement
CREATE DATABASE IF NOT EXISTS teetim_gr2 
  CHARACTER SET utf8mb4 
  COLLATE utf8mb4_general_ci;

-- 2) Sélectionner la BD à utiliser pour le reste du programme (script).
USE teetim_gr2;

-- ---
-- Table 'categorie'
-- 
-- ---

DROP TABLE IF EXISTS `categorie`;
		
CREATE TABLE `categorie` (
  `id` TINYINT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'produit'
-- 
-- ---

DROP TABLE IF EXISTS `produit`;
		
CREATE TABLE `produit` (
  `id` SMALLINT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(200) NOT NULL,
  `ventes` SMALLINT NOT NULL DEFAULT 0,
  `dac` DATE NOT NULL,
  `prix` DECIMAL(5,2) NOT NULL,
  `thm_id` TINYINT NOT NULL,
  `cat_id` TINYINT NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'theme'
-- 
-- ---

DROP TABLE IF EXISTS `theme`;
		
CREATE TABLE `theme` (
  `id` TINYINT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `produit` ADD FOREIGN KEY (thm_id) REFERENCES `theme` (`id`);
ALTER TABLE `produit` ADD FOREIGN KEY (cat_id) REFERENCES `categorie` (`id`);

-- ---
-- Table Properties
-- ---

-- ALTER TABLE `categorie` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `produit` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `theme` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `categorie` (`id`,`nom`) VALUES
-- ('','');
-- INSERT INTO `produit` (`id`,`nom`,`ventes`,`dac`,`prix`,`thm_id`,`cat_id`) VALUES
-- ('','','','','','','');
-- INSERT INTO `theme` (`id`,`nom`) VALUES
-- ('','');
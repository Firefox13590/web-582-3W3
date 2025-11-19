-- 1) Créer la DB avec encodage de caractères et règles d'interclassement
CREATE DATABASE IF NOT EXISTS teetim
  CHARACTER SET 'utf8mb4'
  COLLATE 'utf8mb4_general_ci';

-- 2) Sélectionner la DB
USE teetim;

-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'categories'
-- les catégories de produits
-- ---

DROP TABLE IF EXISTS `categories`;
		
CREATE TABLE `categories` (
  `id` TINYINT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`nom`)
) COMMENT 'les catégories de produits';

-- ---
-- Table 'produits'
-- les produits
-- ---

DROP TABLE IF EXISTS `produits`;
		
CREATE TABLE `produits` (
  `id` SMALLINT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(200) NOT NULL,
  `ventes` SMALLINT NOT NULL DEFAULT 0,
  `dac` DATE NOT NULL,
  `prix` DECIMAL(5,2) NOT NULL,
  `themeId` TINYINT NOT NULL,
  `categorieId` TINYINT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`nom`, `categorieId`)
) COMMENT 'les produits';

-- ---
-- Table 'themes'
-- les thèmes de produits
-- ---

DROP TABLE IF EXISTS `themes`;
		
CREATE TABLE `themes` (
  `id` TINYINT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`nom`)
) COMMENT 'les thèmes de produits';

-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `produits` ADD FOREIGN KEY (themeId) REFERENCES `themes` (`id`);
ALTER TABLE `produits` ADD FOREIGN KEY (categorieId) REFERENCES `categories` (`id`);

-- ---
-- Table Properties
-- ---

-- ALTER TABLE `categories` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `produits` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `themes` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `categories` (`id`,`nom`) VALUES
-- ('','');
-- INSERT INTO `produits` (`id`,`nom`,`ventes`,`dac`,`prix`,`themeId`,`categorieId`) VALUES
-- ('','','','','','','');
-- INSERT INTO `themes` (`id`,`nom`) VALUES
-- ('','');
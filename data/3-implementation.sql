
CREATE DATABASE IF NOT EXISTS teetim
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_general_ci;

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
  `fichierImage` CHAR(11) NOT NULL DEFAULT 'ts0000.webp',
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
-- Table 'panier'
-- 
-- ---

DROP TABLE IF EXISTS `panier`;
		
CREATE TABLE `panier` (
  `id` MEDIUMINT NOT NULL AUTO_INCREMENT,
  `codeSerie` CHAR(29) NOT NULL,
  `dateModif` TIMESTAMP NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'panierArticles'
-- 
-- ---

DROP TABLE IF EXISTS `panierArticles`;
		
CREATE TABLE `panierArticles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `produitId` SMALLINT NOT NULL,
  `qty` TINYINT NOT NULL DEFAULT 1,
  `panierId` MEDIUMINT NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `produits` ADD FOREIGN KEY (themeId) REFERENCES `themes` (`id`);
ALTER TABLE `produits` ADD FOREIGN KEY (categorieId) REFERENCES `categories` (`id`);
ALTER TABLE `panierArticles` ADD FOREIGN KEY (produitId) REFERENCES `produits` (`id`);
ALTER TABLE `panierArticles` ADD FOREIGN KEY (panierId) REFERENCES `panier` (`id`);

-- ---
-- Table Properties
-- ---

-- ALTER TABLE `categories` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `produits` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `themes` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `panier` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `panierArticles` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `categories` (`id`,`nom`) VALUES
-- ('','');
-- INSERT INTO `produits` (`id`,`nom`,`ventes`,`dac`,`prix`,`fichierImage`,`themeId`,`categorieId`) VALUES
-- ('','','','','','','','');
-- INSERT INTO `themes` (`id`,`nom`) VALUES
-- ('','');
-- INSERT INTO `panier` (`id`,`codeSerie`,`dateModif`) VALUES
-- ('','','');
-- INSERT INTO `panierArticles` (`id`,`produitId`,`qty`,`panierId`) VALUES
-- ('','','','');


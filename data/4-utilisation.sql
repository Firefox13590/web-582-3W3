-- Exemples commandes CRUD (Create, Read, Update, Delete)
-- INSERT, SELECT, UPDATE, DELETE

-- voir: https://dev.mysql.com/doc/refman/5.7/en/
--      chapitres:
--      11- Types de données SQL
--      12- Opérateurs et fonctions SQL
--      13- Commandes SQL

-- A) INSERT
-- ex1: spécifier colonnes
INSERT INTO themes (id, nom) VALUES (NULL, 'Gastronomie');
-- ex2: pas sécifier colonnes
INSERT INTO themes VALUES (NULL, 'Histoire');
-- ex3: insertion plusieurs lignes
INSERT INTO themes (nom) VALUES
    ('Géographie'),
    ('Arts'),
    ('Nourriture');





-- B) SELECT
-- ex1: toutes les colonnes, toutes les lignes
SELECT * FROM themes;
-- ou
SELECT id, nom FROM themes;
-- ou
SELECT nom, id FROM themes;
-- ex2: sélection avec condition
-- clause WHERE: filtrer les lignes selon une condition
SELECT * FROM produits WHERE id = 69;
SELECT * FROM produits WHERE prix > 30;
-- nom, prix et ventes des produits avec theme 'Musique'
SELECT nom, prix, ventes FROM produits WHERE themeId = 6;
-- nom, prix arroundis des produits
SELECT nom, ROUND(prix) AS prixArrondi FROM produits;
-- nb produits par theme (id theme)
SELECT themeId, COUNT(id) FROM produits GROUP BY themeId;
-- nb produits par theme (nom theme)
SELECT themes.nom AS nomTheme, COUNT(produits.id) AS nbProduits
FROM produits 
INNER JOIN themes ON produits.themeId = themes.id
GROUP BY themes.nom;
-- nom theme, nb produits, prix min, prix moyen et prix max par theme
SELECT themes.nom AS nomTheme, COUNT(produits.id) AS nbProduits, MIN(produits.prix) AS prixMin, ROUND(AVG(produits.prix), 2) AS prixMoyen, MAX(produits.prix) AS prixMax
FROM produits 
INNER JOIN themes ON produits.themeId = themes.id
GROUP BY themes.nom;





-- C) UPDATE
-- ex1: mise à jour d'une ligne
UPDATE produits SET prix = 25.99 WHERE id = 42;
-- ex2: maj plusieurs lignes
UPDATE produits SET prix = prix * 1.2 WHERE prix < 20;





-- D) DELETE
-- ex1: supprimer produit dont prix inferieur a 20
DELETE FROM produits WHERE prix < 20;
-- ex2: supprimer les produits ajoutes au catalogue il y a plus de 1 an
DELETE FROM produits WHERE dac < DATE_SUB(CURDATE(), INTERVAL 1 YEAR);






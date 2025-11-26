-- Examples de toutes les commandes CRUD
-- c-a-d : INSERT/SELECT/UPDATE/DELETE

-- Voir : https://dev.mysql.com/doc/refman/5.7/en/
-- Chapitres : 
--      11) Types de données SQL
--      12) Opérateurs et fonctions SQL
--  --> 13) Commandes SQL <--

-- -----------------------------------------------------------------------------
-- A) Commande INSERT
-- Sert à créer des nouvelles données.
-- -----------------------------------------------------------------------------
-- Exemple 1 : on spécifie les colonnes
INSERT INTO theme  (id, theme) VALUES (NULL, 'Gastronomie');
-- Exemple 2 : on ne spécifie pas les colonnes
INSERT INTO theme VALUES (NULL, 'Cinéma');
-- Exemple 3 : insertion de plusieurs lignes (avec choix de colonnes)
INSERT INTO theme (theme) VALUES
    ('Littérature'),
    ('Musique'),
    ('Sport');

-- -----------------------------------------------------------------------------
-- B) Commande SELECT
-- Sert à lire les données (et aussi à obtenir de l'information à partir de 
-- ces données)
-- -----------------------------------------------------------------------------
-- Exemple 1 : sélection de toutes les colonnes et de toutes les lignes
SELECT * FROM theme;
-- OU
SELECT id, nom FROM theme;
-- OU
SELECT nom, id FROM theme;
-- Exemples 2 : sélection avec condition
-- Clause WHERE : pour filtrer les lignes selon une condition
SELECT * FROM theme WHERE id = 3;
SELECT * FROM produit WHERE prix < 20;
-- Les noms et id de thème et prix des produits du thème 'Musique'
SELECT nom, prix, thm_id FROM produit WHERE thm_id = 6;
-- Les noms et prix arrondis des produits
-- Remarquez l'utilisation d'un alias pour changer le nom de la colonne.
SELECT nom, ROUND(prix) AS prix_arrondi FROM produit;

-- PAS OBLIGATOIRE
-- id du thème et le nombre de produits par thème
SELECT thm_id, COUNT(id) FROM produit GROUP BY thm_id;
-- Nom du thème et nombre de produits par nom de thème
-- PAS APPRIS EN CLASSE : il faut faire une requête qui JOINT
-- deux tables ensemble pour retourner les colonnes demandées.

-- Nom du thème, nombre de produits par thème, prix moyen par thème, prix min 
-- par thème, et prix max par thème
SELECT 
    thm_id, 
    COUNT(id) AS nombre_produits,
    ROUND(AVG(prix), 2) AS prix_moyen,
    MIN(prix) AS prix_min
        FROM produit 
            GROUP BY thm_id
        ORDER BY prix_moyen DESC;

-- -----------------------------------------------------------------------------
-- C) Commande UPDATE
-- Sert à modifier les données
-- -----------------------------------------------------------------------------
-- Exemple 1 : mise à jour d'une seule ligne
UPDATE theme SET nom = 'Sport et plein air' WHERE id = 3;
-- Exemple 2 : mise à jour de plusieurs lignes
UPDATE produit SET prix = prix * 1.2 WHERE prix < 20;

-- -----------------------------------------------------------------------------
-- D) Commande DELETE
-- Sert à supprimer des enregistrements de données
-- -----------------------------------------------------------------------------
-- Supprimer le produit dont le prix est en bas de 20$
DELETE FROM produit WHERE prix<20;
-- Supprimer tous les produits ajoutés au catalogue il y a plus de 1 an.
DELETE FROM produit WHERE dac < DATE_SUB(CURDATE(), INTERVAL 1 YEAR);

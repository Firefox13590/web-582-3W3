-- Données de la table 'theme'
-- Vider la table en réinitialisant les valeurs des identifiants
TRUNCATE TABLE theme;
-- Ajouter les enregistrements des thèmes.
INSERT INTO theme (nom) VALUES 
    ('Animaux'), 
    ('Sport'),
    ('Nature'),
    ('Inusité'),
    ('Jeux vidéo'),
    ('Techno'),
    ('Plein air')
;

-- Données de la table 'produits'
INSERT INTO produit VALUES 
    (0, 'Monstre douillet', 123, '2023-08-12', 25.95, 1, 1),
    (0, 'Un dunk dans l''univers', 21, '2024-01-02', 22.75, 2, 1)
;


-- modifier images de 20 produits
UPDATE produits SET fichierImage = 'ts0001.webp' WHERE id = 1;

DECLARE @estDizaine CHAR;
DECLARE @counter INT
SET @counter = 0
WHILE @counter <= 20
    BEGIN
        SELECT CAST(i as CHAR)
        SET @counter += 1
    END;


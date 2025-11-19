-- Données de la table 'themes'

-- Vider la table en réinitialisant les vlaleurs des id
TRUNCATE TABLE themes;
-- Ajouter les enregistrements des thèmes
INSERT INTO themes (nom) VALUES 
    ('Animaux'),
    ('Sport'),
    ('Inusité'),
    ('Nature'),
    ('Jeux vidéo'),
    ('Musique'),
    ('Culture')
;

-- Données de la table 'produits'
INSERT INTO produits (nom, ventes, dac, prix, themeId, categorieId) VALUES
    ('Monstre douillet', 123, '2023-08-12', 25.95, 1, 1),
    ('Un dunk dans l''univers', 21, '2024-01-02', 22.75, 2, 1)
;



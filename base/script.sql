-- Active: 1738255279221@@127.0.0.1@3306@gestion_the
CREATE DATABASE IF NOT EXISTS gestion_the;
USE gestion_the;


CREATE TABLE utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL  -- Stocker en format hashé
);

CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL  -- Stocker en format hashé
);

INSERT INTO admins (nom, email, mot_de_passe) VALUES('admin1', 'admin1@gmail.com', 'admin');
INSERT INTO utilisateur (nom, email, mot_de_passe) VALUES('Chris', 'chris@gmail.com', '1234');

-- Table des variétés de thé
CREATE TABLE variete_the (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    occupation_m2 FLOAT NOT NULL,
    rendement_pied_kg FLOAT NOT NULL
);

-- Table des parcelles
CREATE TABLE parcelle (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero VARCHAR(50) NOT NULL UNIQUE,
    surface_hectare FLOAT NOT NULL,
    variete_id INT NOT NULL,
    FOREIGN KEY (variete_id) REFERENCES variete_the(id) ON DELETE CASCADE
);

-- Table des cueilleurs
CREATE TABLE cueilleur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    genre ENUM('Homme', 'Femme') NOT NULL,
    date_naissance DATE NOT NULL
);

-- Table des catégories de dépenses
CREATE TABLE categorie_depense (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL UNIQUE
);

-- Table des dépenses
CREATE TABLE depense (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    categorie_id INT NOT NULL,
    montant DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (categorie_id) REFERENCES categorie_depense(id) ON DELETE CASCADE
);

-- Table des configurations (salaires et bonus/malus)
CREATE TABLE configuration (
    id INT AUTO_INCREMENT PRIMARY KEY,
    salaire_kg DECIMAL(10,2) NOT NULL,
    poids_min_journalier FLOAT NOT NULL,
    bonus_percent FLOAT NOT NULL,
    malus_percent FLOAT NOT NULL
);

-- Table des cueillettes
CREATE TABLE cueillette (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    cueilleur_id INT NOT NULL,
    parcelle_id INT NOT NULL,
    poids_kg FLOAT NOT NULL,
    FOREIGN KEY (cueilleur_id) REFERENCES cueilleur(id) ON DELETE CASCADE,
    FOREIGN KEY (parcelle_id) REFERENCES parcelle(id) ON DELETE CASCADE
);

-- Table des ventes
CREATE TABLE vente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    variete_id INT NOT NULL,
    poids_kg FLOAT NOT NULL,
    prix_vente_kg DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (variete_id) REFERENCES variete_the(id) ON DELETE CASCADE
);

-- Vue pour les résultats globaux
CREATE VIEW v_resultats AS
SELECT
    SUM(c.poids_kg) AS poids_total_cueillette,
    SUM(p.surface_hectare * v.rendement_pied_kg - c.poids_kg) AS poids_restant,
    SUM(d.montant) / SUM(c.poids_kg) AS cout_reviens_kg
FROM
    parcelle p
    JOIN variete_the v ON p.variete_id = v.id
    LEFT JOIN cueillette c ON p.id = c.parcelle_id
    LEFT JOIN depense d ON d.date BETWEEN '2023-01-01' AND '2023-12-31'  -- Remplacer par les dates de début et de fin souhaitées
WHERE
    c.date BETWEEN '2023-01-01' AND '2023-12-31'  -- Remplacer par les dates de début et de fin souhaitées;

-- Insertion de données de test
INSERT INTO variete_the (nom, occupation_m2, rendement_pied_kg) VALUES 
('Thé Vert', 1.8, 3.0),
('Thé Noir', 2.0, 2.5),
('Thé Blanc', 1.5, 2.0);

INSERT INTO parcelle (numero, surface_hectare, variete_id) VALUES 
('P001', 2.5, 1),
('P002', 3.0, 2),
('P003', 1.8, 3);

INSERT INTO cueilleur (nom, genre, date_naissance) VALUES 
('Jean Dupont', 'Homme', '1985-06-15'),
('Marie Curie', 'Femme', '1990-03-22'),
('Paul Martin', 'Homme', '1995-11-05');

INSERT INTO categorie_depense (nom) VALUES 
('Engrais'), ('Carburant'), ('Logistique');

INSERT INTO depense (date, categorie_id, montant) VALUES 
('2024-01-15', 1, 200.00),
('2024-01-16', 2, 150.00);

INSERT INTO configuration (salaire_kg, poids_min_journalier, bonus_percent, malus_percent) VALUES 
(0.50, 20.0, 10.0, 5.0);

INSERT INTO cueillette (date, cueilleur_id, parcelle_id, poids_kg) VALUES 
('2024-01-20', 1, 1, 25.0),
('2024-01-20', 2, 2, 30.0);

INSERT INTO vente (date, variete_id, poids_kg, prix_vente_kg) VALUES 
('2024-01-25', 1, 50.0, 5.00),
('2024-01-26', 2, 40.0, 4.50);


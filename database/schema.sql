CREATE DATABASE IF NOT EXISTS my_series_companion;
USE my_series_companion;

CREATE TABLE IF NOT EXISTS serie (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    resume TEXT,
    vignette VARCHAR(255),
    date_sortie DATE NOT NULL
);

CREATE TABLE IF NOT EXISTS saison (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    resume TEXT,
    vignette VARCHAR(255),
    date_sortie DATE NOT NULL,
    serie_id INT NOT NULL,
    FOREIGN KEY (serie_id) REFERENCES serie(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS episode (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    resume TEXT,
    vignette VARCHAR(255),
    date_sortie DATE NOT NULL,
    duree INT,
    saison_id INT NOT NULL,
    FOREIGN KEY (saison_id) REFERENCES saison(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS personne (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    nom VARCHAR(255),
    prenom VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS regarder (
    personne_id INT NOT NULL,
    episode_id INT NOT NULL,
    PRIMARY KEY (personne_id, episode_id),
    FOREIGN KEY (personne_id) REFERENCES personne(id) ON DELETE CASCADE,
    FOREIGN KEY (episode_id) REFERENCES episode(id) ON DELETE CASCADE
);

-- Quelques séries de test
INSERT INTO serie (nom, resume, vignette, date_sortie) VALUES
('Breaking Bad', 'Un professeur de chimie devient fabricant de drogue.', NULL, '2008-01-20'),
('Stranger Things', 'Des enfants affrontent des phénomènes surnaturels.', NULL, '2016-07-15');

USE garage_paraut;

CREATE TABLE
    users (
        ID_utilisateur INT AUTO_INCREMENT PRIMARY KEY,
        nom_utilisateur VARCHAR(100) NOT NULL,
        prenom_utilisateur VARCHAR(100),
        role ENUM('user', 'admin') NOT NULL,
        adresse_email VARCHAR(255) NOT NULL,
        mot_de_passe VARCHAR(60) NOT NULL
    );

CREATE TABLE
    infos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        jour_semaine VARCHAR(255) NOT NULL,
        heure_ouverture TIME NOT NULL,
        heure_fermeture TIME NOT NULL

);

CREATE TABLE
    testimonial (
        id_temoignage INT AUTO_INCREMENT PRIMARY KEY,
        pseudo_client VARCHAR(100) NOT NULL,
        temoignage TEXT NOT NULL,
        date_temoignage DATE NOT NULL,
    );

CREATE TABLE
    car (
        id_voiture INT AUTO_INCREMENT PRIMARY KEY,
        marque VARCHAR(50) NOT NULL,
        modele VARCHAR(50) NOT NULL,
        annee INT NOT NULL,
        prix DECIMAL(10, 2) NOT NULL,
        detail TEXT,
        photo VARCHAR(255)
    );
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
        date_temoignage DATE NOT NULL
    );

CREATE TABLE
    marque (
        id_marque INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50),
        description TEXT DEFAULT NULL
    );

CREATE TABLE
    car (
        id_voiture INT AUTO_INCREMENT PRIMARY KEY,
        id_marque INT,
        modele VARCHAR(50) NOT NULL,
        annee INT NOT NULL,
        prix DECIMAL(10, 2) NOT NULL,
        photo VARCHAR(255),
        FOREIGN KEY (id_marque) REFERENCES marque(id_marque)
    );

CREATE TABLE
    category(
        id_category INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(50) NOT NULL,
        description TEXT DEFAULT NULL
    )

CREATE TABLE
    service(
        id_service INT AUTO_INCREMENT PRIMARY KEY,
        category_id INT(50) NOT NULL,
        name VARCHAR(50) NOT NULL
    )

CREATE TABLE horaires (
    id_horaire INT AUTO_INCREMENT PRIMARY KEY,
    heure_debut TIME ,
    heure_fin TIME,
    id_jour INT NOT 
)

CREATE TABLE jours(
    id_jour INT AUTO_INCREMENT PRIMARY KEY,
    day_name VARCHAR(255) NOT NULL

)

CREATE TABLE contact (
    id_contact INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    adresse_mail VARCHAR(255) NOT NULL,
    telephone VARCHAR(50) NOT NULL
)
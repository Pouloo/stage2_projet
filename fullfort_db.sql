-- Creation Tables
CREATE TABLE User
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    username TEXT UNIQUE NOT NULL,
    login TEXT UNIQUE NOT NULL,
    mdp TEXT UNIQUE NOT NULL,
    is_admin BIT,
    id_compte INT,
    id_admin INT
);
CREATE TABLE Compte
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom TEXT NOT NULL,
    prenom TEXT NOT NULL,
    telephone TEXT(15) UNIQUE NOT NULL,
    mail TEXT(60) UNIQUE NOT NULL,
    id_user INT
);

CREATE TABLE Article
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom TEXT NOT NULL,
    description TEXT NOT NULL,
    quantite INT NOT NULL,
    prix DECIMAL(10, 2) NOT NULL,
    id_categorie INT
);

CREATE TABLE Paiement
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    prix DECIMAL(10, 2) NOT NULL,
    prix_tva DECIMAL(10, 2) NOT NULL,
    moyen_paiement TEXT NOT NULL,
    id_compte INT,
    id_panier INT
);

CREATE TABLE Panier
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre_articles INT NOT NULL,
    id_user INT,
    id_article INT
);

CREATE TABLE Reduction
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    points_fidelite INT,
    taux_reduction FLOAT(1, 0),
    id_compte INT
);

CREATE TABLE Categorie
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre TEXT UNIQUE
);

CREATE TABLE Commande
(
    id_user INT,
    id_article INT
);

ALTER TABLE User ADD FOREIGN KEY (id_admin) REFERENCES User(id);
ALTER TABLE User ADD FOREIGN KEY (id_compte) REFERENCES Compte(id);
ALTER TABLE Compte ADD FOREIGN KEY (id_user) REFERENCES User(id);
ALTER TABLE Article ADD FOREIGN KEY (id_categorie) REFERENCES Categorie(id);
ALTER TABLE Paiement ADD FOREIGN KEY (id_compte) REFERENCES Compte(id);
ALTER TABLE Paiement ADD FOREIGN KEY (id_panier) REFERENCES Panier(id);
ALTER TABLE Panier ADD FOREIGN KEY (id_user) REFERENCES User(id);
ALTER TABLE Panier ADD FOREIGN KEY (id_article) REFERENCES Article(id);
ALTER TABLE Commande ADD FOREIGN KEY (id_user) REFERENCES User(id);
ALTER TABLE Reduction ADD FOREIGN KEY (id_compte) REFERENCES Compte(id);
ALTER TABLE Commande ADD FOREIGN KEY (id_user) REFERENCES User(id);
ALTER TABLE Commande ADD FOREIGN KEY (id_article) REFERENCES Article(id);

-- Insertion Données
-- (...)
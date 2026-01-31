-- Creation Tables
CREATE TABLE User
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username TEXT UNIQUE NOT NULL,
    login TEXT UNIQUE NOT NULL,
    mdp TEXT UNIQUE NOT NULL,
    is_admin BIT NOT NULL,
    id_admin INT FOREIGN KEY REFERENCES User(id),
    id_compte INT FOREIGN KEY REFERENCES Compte(id)
);

CREATE TABLE Compte
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom TEXT NOT NULL,
    prenom TEXT NOT NULL,
    telephone TEXT(15) UNIQUE NOT NULL,
    mail TEXT(60) UNIQUE NOT NULL,
    id_user INT FOREIGN KEY REFERENCES User(id)
);

CREATE TABLE Article
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom TEXT NOT NULL,
    description TEXT NOT NULL,
    quantite INT NOT NULL,
    prix DECIMAL(10, 2) NOT NULL,
    id_categorie INT FOREIGN KEY REFERENCES Categorie(id)
);

CREATE TABLE Paiement
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    prix DECIMAL(10, 2) NOT NULL,
    prix_tva DECIMAL(10, 2) NOT NULL,
    moyen_paiement TEXT NOT NULL,
    id_compte INT FOREIGN KEY REFERENCES Compte(id),
    id_panier INT FOREIGN KEY REFERENCES Panier(id)
);

CREATE TABLE Panier
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre_articles INT NOT NULL,
    id_user INT FOREIGN KEY REFERENCES User(id),
    id_article INT FOREIGN KEY REFERENCES Article(id)
);

CREATE TABLE Reduction
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    points_fidelite INT,
    taux_reduction INT(0, 1),
    id_compte INT FOREIGN KEY REFERENCES Compte(id)
);

CREATE TABLE Categorie
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titre TEXT UNIQUE
);

CREATE TABLE Commande
(
    id_user INT FOREIGN KEY REFERENCES User(id),
    id_article INT FOREIGN KEY REFERENCES Article(id)
);

-- Insertion Tables
-- INSERT INTO User(...) VALUES
-- (1, 'patrick.adhemar@example.com', 'pass123', 'PatrickA'),
-- (2, 'jean.francois@example.com', 'pass456', 'JeanF'),
-- (3, 'alex.kuzbidon@example.com', 'pass789', 'AlexK'),
-- (4, 'anasthasie.locale@example.com', 'pass012', 'AnasthasieL'),
-- (5, 'armand.teutmaronne@example.com', 'pass345', 'ArmandT'),
-- (6, 'debbie@example.com', 'pass678', 'Debbie');

-- SET FOREIGN_KEY_CHECKS = 1; -- Réactive la vérification des clés étrangères--
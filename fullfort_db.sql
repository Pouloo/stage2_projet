-- Creation Tables
CREATE TABLE User (
    id_utilisateur INT AUTO_INCREMENT,
    email VARCHAR(255) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    nom_utilisateur VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_utilisateur)
) ENGINE=InnoDB;

CREATE TABLE Paiement (
    id_paiement INT AUTO_INCREMENT,
    systeme_paiement VARCHAR(100) NOT NULL,
    PRIMARY KEY (id_paiement)
) ENGINE=InnoDB;

-- Table Livraison
CREATE TABLE Livraison (
    id_livraison INT AUTO_INCREMENT,
    description_donnee TEXT,
    type_donnee VARCHAR(100),
    date_enregistrement DATETIME NOT NULL,
    PRIMARY KEY (id_livraison)
) ENGINE=InnoDB;

-- Table Menu
CREATE TABLE Menu (
    id_menu INT AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    prix_menu DECIMAL(10, 2) NOT NULL,
    PRIMARY KEY (id_menu)
) ENGINE=InnoDB;

-- Table Commande
CREATE TABLE Commande (
    id_commande INT AUTO_INCREMENT,
    nom_reference VARCHAR(255),
    e_mail VARCHAR(255),
    message TEXT,
    id_paiement INT NOT NULL, 
    PRIMARY KEY (id_commande),
    CONSTRAINT fk_commande_paiement
        FOREIGN KEY (id_paiement)
        REFERENCES Paiement(id_paiement)
        ON DELETE RESTRICT
) ENGINE=InnoDB;

-- Table Faire (Relation User - Commande)
CREATE TABLE Faire (
    id_utilisateur INT NOT NULL,
    id_commande INT NOT NULL UNIQUE,
    PRIMARY KEY (id_utilisateur, id_commande),
    FOREIGN KEY (id_utilisateur) REFERENCES User(id_utilisateur) ON DELETE CASCADE,
    FOREIGN KEY (id_commande) REFERENCES Commande(id_commande) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Table Composer (Relation Commande - Menu)
CREATE TABLE Composer (
    id_commande INT NOT NULL,
    id_menu INT NOT NULL,
    quantite INT NOT NULL DEFAULT 1,
    PRIMARY KEY (id_commande, id_menu),
    FOREIGN KEY (id_commande) REFERENCES Commande(id_commande) ON DELETE CASCADE,
    FOREIGN KEY (id_menu) REFERENCES Menu(id_menu) ON DELETE CASCADE
) ENGINE=InnoDB; 

-- Table Livrer (Relation Commande - Livraison)
CREATE TABLE Livrer (
    id_commande INT NOT NULL,
    id_livraison INT NOT NULL,
    PRIMARY KEY (id_commande, id_livraison),
    FOREIGN KEY (id_commande) REFERENCES Commande(id_commande) ON DELETE CASCADE,
    FOREIGN KEY (id_livraison) REFERENCES Livraison(id_livraison) ON DELETE CASCADE
) ENGINE=InnoDB; 


-- Insertion Tables
INSERT INTO User (id_utilisateur, email, mot_de_passe, nom_utilisateur) VALUES
(1, 'patrick.adhemar@example.com', 'pass123', 'PatrickA'),
(2, 'jean.francois@example.com', 'pass456', 'JeanF'),
(3, 'alex.kuzbidon@example.com', 'pass789', 'AlexK'),
(4, 'anasthasie.locale@example.com', 'pass012', 'AnasthasieL'),
(5, 'armand.teutmaronne@example.com', 'pass345', 'ArmandT'),
(6, 'debbie@example.com', 'pass678', 'Debbie');

-- Insertion de données dans la table Paiement 
INSERT INTO Paiement (id_paiement, systeme_paiement) VALUES
(1, 'Carte Bancaire'),
(2, 'PayPal'),
(3, 'Espèces à la livraison');

-- Insertion de données dans la table Livraison
INSERT INTO Livraison (id_livraison, description_donnee, type_donnee, date_enregistrement) VALUES
(1, 'Livraison Standard', 'Domicile', NOW()),
(2, 'Livraison Express', 'Bureau', NOW()),
(3, 'Click & Collect', 'Sur place', NOW());

-- Insertion de données dans la table Menu
INSERT INTO Menu (id_menu, nom, prix_menu) VALUES
(1, 'Menu du Jour', 12.50),
(2, 'Menu Végétarien', 14.90),
(3, 'Menu Enfant', 8.90),
(4, 'Menu Premium', 21.00);

-- Insertion de données dans la table Commande
INSERT INTO Commande (id_commande, nom_reference, e_mail, message, id_paiement) VALUES
(101, 'Ref-2025-001', 'patrick.adhemar@example.com', 'Livraison urgente', 1),
(102, 'Ref-2025-002', 'alex.kuzbidon@example.com', NULL, 3),
(103, 'Ref-2025-003', 'jean.francois@example.com', 'Réunion déjeuner', 2);

-- Insertion de données dans la table Faire (User - Commande)
INSERT INTO Faire (id_utilisateur, id_commande) VALUES
(1, 101),
(3, 102),
(2, 103);

-- Insertion de données dans la table Composer (Commande - Menu)
INSERT INTO Composer (id_commande, id_menu, quantite) VALUES
(101, 1, 1),
(101, 4, 1),
(102, 2, 2),
(103, 1, 3),
(103, 3, 1);

-- Insertion de données dans la table Livrer (Commande - Livraison)
INSERT INTO Livrer (id_commande, id_livraison) VALUES
(101, 2),
(102, 3),
(103, 1); 

-- SET FOREIGN_KEY_CHECKS = 1; -- Réactive la vérification des clés étrangères--
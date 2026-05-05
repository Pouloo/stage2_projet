-- Creation Tables
CREATE TABLE utilisateurs
(
    id BIGINT(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    mdp VARCHAR(255),
    type_utilisateur VARCHAR(255) DEFAULT 'user'
);

CREATE TABLE produits
(
    id BIGINT(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    description LONGTEXT,
    quantite INT(11),
    prix INT(11),
    categorie VARCHAR(255),
    image VARCHAR(255)
);

CREATE TABLE categories
(
    id BIGINT(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255)
);

CREATE TABLE produits_panier
(
    id BIGINT(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    id_utilisateur BIGINT(20) UNSIGNED,
    id_produit BIGINT(20) UNSIGNED
);

CREATE TABLE produits_commande
(
    id BIGINT(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    adresse_client VARCHAR(255),
    telephone_client VARCHAR(255),
    statut_commande VARCHAR(255) DEFAULT 'en cours',
    id_utilisateur BIGINT(20) UNSIGNED,
    id_produit BIGINT(20) UNSIGNED
);

ALTER TABLE produits_panier ADD FOREIGN KEY(id_utilisateur) REFERENCES utilisateurs(id) ON DELETE CASCADE;
ALTER TABLE produits_panier ADD FOREIGN KEY(id_produit) REFERENCES produits(id) ON DELETE CASCADE;
ALTER TABLE produits_commande ADD FOREIGN KEY(id_utilisateur) REFERENCES utilisateurs(id) ON DELETE CASCADE;
ALTER TABLE produits_commande ADD FOREIGN KEY(id_produit) REFERENCES produits(id) ON DELETE CASCADE;

-- Insertion Données
INSERT INTO utilisateurs(nom, email, mdp) VALUES('user1', 'user1@outlook.fr', 'usermdp');
INSERT INTO utilisateurs(nom, email, mdp, type_utilisateur) VALUES('admin1', 'admin1@outlook.fr', 'adminmdp', 'admin');

INSERT INTO produits(nom, description, quantite, prix, categorie, image) VALUES('Pomme', 'Variété: Patte de loup', 10, 1, 'Fruits', 'pomme.png');
INSERT INTO produits(nom, description, quantite, prix, categorie, image) VALUES('Poire', 'Variété: Williams', 8, 2, 'Fruits', 'poire.png');
INSERT INTO produits(nom, description, quantite, prix, categorie, image) VALUES('Salade', 'Variété: Sucrine', 20, 3, 'Legumes','salade.png');

INSERT INTO categories(nom) VALUES('Fruits'); 
INSERT INTO categories(nom) VALUES('Legumes'); 

INSERT INTO produits_panier(id_utilisateur, id_produit) VALUES(1, 1);
INSERT INTO produits_panier(id_utilisateur, id_produit) VALUES(2, 2);

INSERT INTO produits_commande(adresse_client, telephone_client, id_utilisateur, id_produit) VALUES('6 Rue Dupont', '06 26 46 85 12', 1, 1);
INSERT INTO produits_commande(adresse_client, telephone_client, statut_commande, id_utilisateur, id_produit) VALUES('6 Rue Dupont', '06 26 46 85 12', 'Livrée', 1, 1);
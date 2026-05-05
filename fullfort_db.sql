-- Creation Tables
CREATE TABLE utilisateurs
(
    id BIGINT(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    mdp VARCHAR(255),
    type_user VARCHAR(255) DEFAULT 'user'
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
    id_utilisateur BIGINT(20),
    id_produit BIGINT(20)
);

CREATE TABLE produits_commande
(
    id BIGINT(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    adresse_client VARCHAR(255),
    telephone_client VARCHAR(255),
    statut_commande VARCHAR(255) DEFAULT 'en cours',
    id_utilisateur BIGINT(20),
    id_produit BIGINT(20)
);

ALTER TABLE produits_panier ADD FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id) ON DELETE CASCADE;
ALTER TABLE produits_panier ADD FOREIGN KEY (id_produit) REFERENCES produits(id) ON DELETE CASCADE;
ALTER TABLE produits_commande ADD FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id) ON DELETE CASCADE;
ALTER TABLE produits_commande ADD FOREIGN KEY (id_produit) REFERENCES produits(id) ON DELETE CASCADE;

-- Insertion Données
-- (...)
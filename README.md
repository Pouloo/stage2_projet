# Documentation Technique

> [!NOTE]
> Ce projet est réalisé dans le cadre de mes études scolaires de BTS SIO, en spécialité SLAM. Sa realisation relève de mon stage en entreprise de deuxième année.

## Introduction

Ce projet est un site web d'e-commerce dynamique simple en CRUD sur la framework *Laravel*. Il a pour objectif d'avoir un design flexible, et de pouvoir accommoder les 4 opérations de base (CRUD) sur tout produit de type fast food que l'administrateur souhaite mettre en vente. En l'occurence, l'itération du site actuel se spécialise dans la vente de "Crousties".

## Caractéristiques Techniques

- Architecture: MVC (Modèle Vue Contoleur)

- Framework: *Laravel*

- SGBD: MySQL

- Langages Utilisés: SQL, PHP, HTML/CSS

- Paradigmes Mobilisés: POO, Imperative

## Utilisation

### Prérequis

Ce projet a été testé, développé et déployé en s'aidant de plusieurs logiciels libres. Assurez vous que les logiciels suivants sont installés préalablement:

- [XAMPP](https://www.apachefriends.org/fr/index.html): Stack logiciel contenant les utilitaires:

    - [Apache](https://httpd.apache.org/): Serveur HTTP pour développement Web

    - [MySQL](https://www.mysql.com): System de Gestion de Base de Données

        - [PhpMyAdmin](https://www.phpmyadmin.net/): Interface graphique pour MySQL

    - [PHP](https://www.php.net/): Langage de programmation interprété backend

### Mise en Place

Pour utiliser le projet en local, vous pouvez suivre les étapes suivantes:

1. Effectuez un `git clone` du repertoire distant vers un repertoire local

2. Placez vous dans le repertoire du projet (\\fullfort_crousty\\) depuis un terminal en ligne de commande (*Bash* / *Powershell*)

3. Effectuez les commandes suivantes de Composer (Gestionnaire de packets PHP) et de npm (Gestionnaire de packets JavaScript) respectivement: `composer install`, `npm install`: Elles permettent de s'assurer que touts les paquets et leurs dépendences définits dans `composer.json`/`composer.lock` sont présentes.

> [!WARNING]
> Il est connu de la communauté PHP que le Pare-Feu de l'antivirus *Avast* bloque le fonctionnement de composer. Il est probable que vous deviez désactiver temporairement certains de ses modules avant chaque utilisation de composer.

4. Lancez XAMP, démarrez  le serveur Apache et MySQL

5. Sur terminal, lancez la commande `php artisan migrate` pour créer/mettre à jour la base de donnée sur MySQL

> [!TIP]
> Ce projet utilisant une connexion classique MySQL, la base de donnée est externe au projet. Si on venait à utiliser une base *SQLitel*, elle serait à même les fichiers du projet dans le repertoire \\database\\

6. Sur terminal, entrez la commande `php artisan serve` pour lancer le serveur interne *Laravel*.

6. Connectez vous à l'adresse http://localhost:8000/ pour consulter le site, et/ou http://localhost/phpmyadmin pour consulter la base de donnée `fullfort_db`

### Fonctionnalités

Ce projet étant un site d'e-commerce dynamique, il permet à des utilisateurs (table MySQL `user`) d'intéragir avec des données (table `produits`) afin d'effectuer plusieures actions:

#### Coté Utilisateur:

Un `user` de type 'utilisateur' peut:

- Consulter les produits disponibles sur le site

- Créer un compte et s'y connecter

- Mettre un produit dans le panier

- Effectuer la commande des produits du panier

    - Effectuer un paiement durant la commande

- Consulter les produits commandés à partir d'un dashboard dédié

#### Coté Administrateur:

Un `user` de type 'admin' peut:

- Consulter les produits disponibles sur le site (à des fins de débogage)

- Se connecter à son compte administratif

- Accéder au panel administratif:

    - Ajouter, Modifier, Supprimer les catégories de produits

    - Ajouter, Modifier, Supprimer les produits et leurs caractéristiques (prix, quantité, nom, description, miniature)

    - Gerer les commandes en modifiant leur statut

> [!NOTE]
> Le statut administrateur est définit préalablement dans PhpMyAdmin en modifiant la propriété `type` de la table `user`


## Contribution

> [!NOTE]
> Vous êtes libres de contribuer à ce projet si vous le souhaitez, si vous aimeriez contribuer à ce projet, veuillez suivre les guidelines suivantes

1. Effectuez un `git fork` de ce répertoire
2. Créez une nouvelle branche (`git branch`) pour votre contenu
3. Faites vos changements et commitez (`git commit`) les
4. Effectuez un `git push` vers votre Fork
5. Soumettez un pull request

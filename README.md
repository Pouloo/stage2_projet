# Documentation Technique

> [!IMPORTANT]
> Ce projet est réalisé dans le cadres de mes études scolaires de BTS SIO, en spécialité SLAM. Sa realisation relève de mon stage de deuxième année du diplome en entreprise.

## Introduction

Ce projet est un site web d'e-commerce dynamique simple en CRUD sur la framework *Laravel*. Il a pour objectif d'avoir un design flexible, et de pouvoir accommoder les 4 opérations de base (CRUD) sur tout produit que l'administrateur du souhaite souhaite mettre en vente.

## Charactéristiques Techniques

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

1. Effectuer un `git clone` du repertoire distant vers un repertoire local

2. Placez vous dans le repertoire depuis un terminal en ligne de commande (*Bash* / *Powershell*)

3. Effectuez les commandes de mise à jour de Composer (Gestionnaire de packets PHP) suivantes: `npm install`, `composer update` afin de vérifier que 

4.

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



## Contribution

> [!NOTE]
> Vous êtes libres de contribuer à ce projet si vous le souhaitez,
> si vous aimeriez contribuer à ce projet, veuillez suivre les guidelines suivantes

1. Effectuez un `git fork` de ce répertoire
2. Créez une nouvelle branche (`git branch`) pour votre contenu
3. Faites vos changements et commitez (`git commit`) les
4. Effectuez un `git push` vers votre Fork
5. Soumettez un pull request

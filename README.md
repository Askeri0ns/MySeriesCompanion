# My Series Companion

## Contexte

Projet de BTS SIO 2ème année d'application web permettant de garder en mémoire les séries qu'un utilisateur a regardées, avec le suivi de leurs saisons et épisodes.
Dans cette version, il n'y a pas de système d'inscription ni de connexion : on considère qu'une seule personne utilise le site.

## Fonctionnalités

- **Ajout d'une série** : nom (obligatoire), résumé (facultatif), vignette (facultatif), date de sortie (obligatoire) — redirection automatique vers le détail de la série après ajout.
- **Liste des séries** : affichage de toutes les séries avec leurs informations et un lien vers le détail.
- **Détail d'une série** : informations de la série + liste de ses saisons + formulaire d'ajout de saison (nom, résumé, vignette, date de sortie).
- **Détail d'une saison** : informations de la saison + liste de ses épisodes (ou message si aucun épisode) + formulaire d'ajout d'épisode (nom, résumé, vignette, date de sortie, durée en minutes).

## Stack technique

- **Backend** : PHP (architecture MVC "maison", sans framework)
- **Base de données** : MySQL / MariaDB
- **Frontend** : HTML / Framework CSS (Tailwind + DaisyUI)
- **Serveur local** : XAMPP / WAMP ou serveur intégré PHP

## Installation

1. Cloner le dépôt dans le dossier de votre serveur local (ex: `htdocs/`).
2. Créer une base de données et l'importer depuis `database/schema.sql`.
3. Copier `config/config.example.php` vers `config/config.php` et renseigner les accès à la base de données.
4. Lancer le serveur (Apache/PHP) et ouvrir `public/index.php` dans le navigateur.

## Modèle de données

Le modèle de données (MCD) définit 5 entités : `SERIE`, `SAISON`, `EPISODE`, `PERSONNE`, `REGARDER` (association entre `PERSONNE` et `EPISODE`).

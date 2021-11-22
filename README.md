<p align="center"><a href="https://www.3gimmobilier.com/" target="_blank"><img src="https://www.3gimmobilier.com/system/images/commun/rejoignez_nous.gif" width="400"></a></p>



## Projet de site d'annonces immobilières

L'objectif, est d'obtenir un site avec comme fonctionnalités =
- L'affichage des annonces
- La modification des annonces
- La création d'une annonce
- La suppression d'une annonce

## Fonctionnement

Il est possible sans se connecter de visualiser les annonces ainsi que de les trier. 
En revanche pour éditer, supprimer une annonce, ou encore voir la liste des agents et leurs annonces il faudra se connecter.

## Annonces immobilières

Chaque annonce doit comporter =
- Une référence 
- Le prix 
- La surface habitable
- Le nombre de pièces
- Le nom de l'agent 
- Le prénom de l'agent

## Base de données

La table ANNONCE comportera les éléments suivants =
- ref_annonce (varchar)
- prix_annonce (float)
- surface_habitable (float)
- nombre_de_piece (int)

La table AGENT comportera les éléments suivants = 
- nom_agent (varchar)
- prenom_agent (varchar)
  

## Modelisation de la base de donnée

![Screenshot](/Documentation/mocodo.png)

## Technologies 

- PHP
- Laravel 8
- HTML
- CSS
- Bootstrap 5.1
- JavaScript

### Comment procéder ?

Pour démarrer ce projet il faut =
- Cloner ce projet
- Lancer la commande ` composer install`
- Créer un fichier `.env` et saisir vos informations de base de donnée (pour `DB_USERNAME` `DB_PASSWORD`), se créér une table dans son adminer et saisir le nom de cette table à la ligne `DB_DATABASE` du fichier `.env`
- Verifier que dans le fichier `.env` , le `APP_ENV` est en local
- Lancer la commande `php artisan migrate`
- Importer le fichier sql dans votre adminer
- Lancer la commande `php artisan key:generate`
- Ouvrir votre serveur local


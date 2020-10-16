# PROJET e-coM

## :sparkles: Objectifs du module

Le projet e-coM est un module e-commerce pouvant se greffer sur tout site vitrine (non CMS) dépourvu de cette fonctionnalité

## :rocket: Features

* Admin Back office
* Fiche produit (catégories, prix)
* Gestion d'un compte utilisateur
* Gestion d'un panier utilisateur
* Modalités de paiement
* Modalités d'envoi 
* Gestion des promotions


## :high_brightness:  User Guide

- Assurez-vous d'avoir installé composer (https://getcomposer.org)

```bash
git clone git@github.com:didiou/e-coM.git
cd e-coM
composer validate
composer install
composer update
symfony server:start
```
Création de la base de données

- (Modifiez d'abord le fichier .env ou .env.local pour accéder à votre BDD)

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

- Si vous souhaitez utiliser des données fictives

```bash
php bin/console doctrine:fixtures:load
```

- Ouvrez votre navigateur à l'adresse http://localhost:8000


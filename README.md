# Projet Bien-être

Le site est un annuaire où des prestataires peuvent s’inscrire gratuitement et mettre en avant leurs services dans le domaine du bien-être.

## ✍️ Auteur

- [@AnthonyLadon](https://www.github.com/anthonyladon)


## 🚀 Pour installer le projet

- Prérequis:
    - php 7.2.5 ou >
    - composer (https://getcomposer.org/download/)
    - Un gestionnaire de base de données (MySQL, Postgresql..)


- Puis lancez les commandes suivantes:
```bash
$ git clone https://github.com/AnthonyLadon/projet_etudes_site_Bien-etre.git

se positionner dans le repertoire du projet:
$ cd Bien-etre/

installer les dépendances:
$ composer install
```

- Configurer l'accès à la DB dans le fichier ".env" situé à la racine du projet. Modifiez 'nom_DB' et 'mot_de_passe' (ainsi que l'adresse du localhost si besoin)
```
DATABASE_URL="mysql://nom_DB:mot_de_passe@127.0.0.1:8889/bienetre?serverVersion=8&charset=utf8mb4"
```

- Configurer le mailer dans le fichier ".env" (Pour ce projet j'ai utillisé Mailtrap -> https://mailtrap.io)


Lancez la commande pour créer la base de données "Bienetre"
```bash
$  php bin/console doctrine:database:create
```

Lancez les migrations (création des tables + realtions dans la DB)
```bash
$  php bin/console d:m:m
```

Lancer les fixutes (insertion de toutes les localités, communes et code postaux de Belgique dans la DB)
```bash
php bin/console doctrine:fixtures:load
```

- Demandez une clé API sur le site: https://opencagedata.com (gratuit).
- Dans le répertoire src/Controller/PartenaireController, ligne 69:
```bash
$geocoder = new Geocoder('Entrez votre clé API ici');
```

- Démarrer le serveur Symfony
```bash
$  symfony server:start
```


## 👀 About Me
After several weeks passed reading the documentation, I think I fell in love with symfony.. 😅

## 🧑‍🔧 Tech Stack

**Client:** javascript, twig, scss

**Server:** php, symfony

**API:** OpenCage Geocoding

# Projet Bien-être

Présentation du projet

## Auteur

- [@AnthonyLadon](https://www.github.com/anthonyladon)


## Pour tester localement de projet

- Cloner le projet

```bash
  git clone https://github.com/AnthonyLadon/projet_etudes_site_Bien-etre.git
```

- Aller dans le repertoire du projet

```bash
  cd bienetre
```

- Installer les dépendences

```bash
  composer install
```

- Créez une base de données "bienetre"

- Configurer l'accès à la DB dans le fichier ".env" situé à la racine du projet

```bash
DATABASE_URL="mysql://"DB":"PASSWORD"@127.0.0.1:3306/app?serverVersion=8&charset=utf8mb4"
```

- Configurer le mailer dans le fichier ".env"

```bash
MAILER_DSN=smtp://84f6144b7e5ad3:c44d6cc99974d1@sandbox.smtp.mailtrap.io:2525?encryption=tls&auth_mode=login
```

- Démarrer le serveur

```bash
  symfony server:start
```


## Pour ajouter les localité en base de données

```php
import Component from 'my-project'

function App() {
  return <Component />
}
```


## 🚀 About Me
I think I'm now a symfony junior developer 😅 (no kiding)


## Tech Stack

**Client:** javascript, twig, sass

**Server:** php, symfony


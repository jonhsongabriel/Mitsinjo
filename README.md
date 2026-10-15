# Les Amis de l'École Mitsinjo

Application Symfony du site de l'association Les Amis de l'École Mitsinjo.

## Prérequis

- PHP 8.2 ou supérieur avec les extensions PDO SQLite, ctype et iconv
- Composer 2

## Installation locale

```bash
composer install
php bin/console doctrine:migrations:migrate --no-interaction
php -S 0.0.0.0:8000 -t public
```

Ouvrir ensuite `http://localhost:8000`. La base SQLite est créée dans `var/data.db`.
Pour utiliser une autre base, définir `DATABASE_URL` dans `.env.local`.

## Pages

- `/` : accueil
- `/a-propos` : présentation de l'association
- `/realisations` : actions de l'association
- `/contact` : formulaire de contact

Les messages sont validés par Symfony puis enregistrés dans `contact_messages`.
Les changements de structure de la base doivent être ajoutés dans `migrations/`.

## Déploiement

Configurer le serveur web pour utiliser `public/` comme racine documentaire. Définir
`APP_ENV=prod`, un `APP_SECRET` aléatoire et `DATABASE_URL` dans l'environnement
de déploiement, puis exécuter `composer install --no-dev --optimize-autoloader` et
`php bin/console doctrine:migrations:migrate --no-interaction`.
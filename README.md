# ArticleBack

Ce projet est une API développée avec Laravel permettant la gestion des articles et des catégories.

## Prérequis

Avant d'installer et d'exécuter ce projet, assurez-vous d'avoir les éléments suivants installés sur votre machine :

-   [PHP](https://www.php.net/) (version 8.1 ou supérieure recommandée)
-   [Composer](https://getcomposer.org/)
-   [MySQL](https://www.mysql.com/) ou un autre SGBD compatible
-   [Laravel](https://laravel.com/) (facultatif, installé via Composer)

## Installation

1. Clonez le dépôt :
    ```sh
    git clone https://github.com/Merite15/ArticleBack
    ```
2. Accédez au dossier du projet :
    ```sh
    cd article-back
    ```
3. Installez les dépendances :
    ```sh
    composer install
    ```

## Configuration

1. Copiez le fichier d'environnement exemple :
    ```sh
    cp .env.example .env
    ```
2. Configurez les variables d'environnement dans le fichier `.env` :

    ```env
    APP_NAME=ArticleBack
    APP_ENV=local
    APP_KEY=
    APP_DEBUG=true
    APP_URL=http://localhost:8000

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=article_db
    DB_USERNAME=root
    DB_PASSWORD=
    ```

3. Générez la clé d'application :
    ```sh
    php artisan key:generate
    ```
4. Exécutez les migrations pour créer la structure de la base de données :
    ```sh
    php artisan migrate --seed
    ```

## Démarrage du serveur

Lancez le serveur de développement Laravel avec la commande :

```sh
php artisan serve
```

L'API sera accessible à l'adresse `http://localhost:8000/`.

## Structure des dossiers

```
article-back/
├── app/
│   ├── Http/Controllers/    # Contrôleurs de l'API
│   ├── Models/              # Modèles Eloquent
│   ├── Services/            # Services métier
├── database/
│   ├── migrations/          # Fichiers de migration
│   ├── seeders/             # Données de test
├── routes/
│   ├── api.php              # Routes de l'API
├── config/                  # Fichiers de configuration
├── .env                     # Variables d'environnement
├── artisan                   # Interface CLI Laravel
├── composer.json             # Dépendances PHP
└── public/                   # Point d'entrée du projet
```

## Routes API

L'API expose les routes suivantes :

-   `GET /api/articles` : Liste des articles avec possibilité de filtres
-   `GET /api/articles/{id}` : Détails d'un article
-   `GET /api/categories` : Liste des catégories

## Réponses aux questions techniques

### Combien de temps avez-vous passé sur le test de codage ?

J'ai passé environ 2 heures à travailler sur ce test.

### Que rajouteriez-vous à votre solution si vous aviez plus de temps ?

Si j'avais plus de temps, j'ajouterais :

-   Une gestion avancée des permissions avec Spatie Permissions
-   Un système de cache pour améliorer la performance
-   Des tests unitaires et d'intégration avec Pest
-   Une documentation Swagger/OpenAPI pour l'API

### Si vous n'avez pas passé beaucoup de temps sur le test, expliquez ce que vous ajouteriez.

Je prioriserais l'amélioration de la sécurité et l'optimisation des requêtes SQL.

### Comment traqueriez-vous un problème de performance en production ? Avez-vous déjà eu à le faire ?

Pour identifier un problème de performance en production, j'utiliserais :

-   Laravel Telescope pour le monitoring des requêtes
-   Les logs Laravel avec Log Viewer

### Quels design patterns et principes d'ingénierie logicielle avez-vous utilisés dans votre solution ?

-   **Single Responsibility Principle (SRP)** : Chaque classe a une seule responsabilité

## Contributeurs

Si vous souhaitez contribuer, veuillez créer une branche, apporter vos modifications et soumettre une pull request.

## Licence

Ce projet est sous licence MIT. Vous êtes libre de l'utiliser et de le modifier selon vos besoins.

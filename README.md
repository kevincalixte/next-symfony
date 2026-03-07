# Next.js + Symfony Dashboard SPA

Ce projet est un exemple d'application web moderne :
- **Frontend** : Next.js (React) pour l'interface utilisateur (SPA)
- **Backend** : Symfony (API) pour la gestion des données

## Prérequis
- Node.js (recommandé : v18+)
- npm ou yarn
- PHP (recommandé : v8.1+)
- Composer
- Une base de données (ex : MySQL)

## Installation

### 1. Installer le backend Symfony
```sh
cd symfony-api
composer install
cp .env .env.local # puis configure la connexion à la BDD
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load # (optionnel, pour des exemples)
```

### 2. Installer le frontend Next.js
```sh
cd ../next-symfony
npm install
```

## Lancer les serveurs
- Symfony :
```sh
cd symfony-api
symfony server:start
```
- Next.js :
```sh
cd ../next-symfony
npm run dev
```

## Utilité
Ce projet permet de séparer clairement l'API (Symfony) et le frontend (Next.js), idéal pour développer des dashboards modernes, évolutifs et maintenables.

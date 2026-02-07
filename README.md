# Backend Laravel – API REST

Ce projet est un backend développé avec **Laravel**, exposant une **API REST** destinée à :
- soumettre des incidents,
- consulter les incidents propres à un utilisateur,
- coordonner l’ensemble des signalements côté administration.

---

## Technologies utilisées
- Laravel
- PHP
- MySQL
- API REST
- Composer

---

## Prérequis
Avant de lancer le projet, assurez-vous d’avoir installé :
- PHP >= 8.x
- Composer
- MySQL
- Git

---

## Installation du projet

### 1. Cloner le repository
```bash
git clone https://github.com/josueumba/signalement-incidents-api-backend.git
cd signalement-incidents-api-backend
```

### 2. Installer les dépendances PHP
```bash
composer install
```

### 3. Configuration de l’environnement

Copiez le fichier .env.example :
```bash
cp .env.example .env
```
Puis configurez vos paramètres de base de données dans le fichier .env.

### 4. Générer la clé de l’application
```bash
php artisan key:generate
```

### 5. Lancer les migrations
```bash
php artisan migrate
```

### 6. Démarrer le serveur
```bash
php artisan serve
```

L’API sera accessible à l’adresse : http://localhost:8000

## Fonctionnalités

- Authentification des utilisateurs
- Soumission des incidents communautaires
- Consultation des incidents par utilisateur
- Gestion et suivi des signalements côté administration
- Création des catégories et statuts par l'administration


## Sécurité

Le fichier .env n’est pas inclus dans le repository pour des raisons de sécurité.
Veuillez utiliser le fichier .env.example comme modèle de configuration.

## Endpoints (exemples)
```http
GET    /api/auth/users
POST   /api/auth/login
POST   /api/auth/register
```

## Structure du projet

app/ : logique métier
routes/api.php : définition des routes API
app/Http/Controllers/ : contrôleurs
database/migrations/ : structure de la base de données

## Frontend
Ce backend est conçu pour être consommé par une application Web.


## Auteur

Josué Umba
Développeur Backend / Fullstack Junior
Laravel • Symfony • React • Flutter

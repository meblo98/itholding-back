# Projet E-Commerce avec Authentification Laravel Sanctum

## Description
Ce projet est une API backend pour une plateforme e-commerce intégrée à un système de livraison. Il est développé avec Laravel et utilise Sanctum pour l'authentification des utilisateurs.

## Prérequis
Avant d'installer le projet, assurez-vous d'avoir les éléments suivants installés sur votre machine :

- PHP >= 8.0
- Composer
- MySQL ou une autre base de données compatible
- Laravel >= 10
- Node.js et npm (pour la gestion des dépendances front-end, si nécessaire)

## Installation

1. **Cloner le projet**
   ```sh
   git clone https://github.com/meblo98/itholding-back.git
   cd votre-repo
   ```

2. **Installer les dépendances**
   ```sh
   composer install
   ```

3. **Créer et configurer le fichier .env**
   ```sh
   cp .env.example .env
   ```
   Modifier le fichier `.env` pour configurer la connexion à la base de données.

4. **Générer la clé d'application**
   ```sh
   php artisan key:generate
   ```

5. **Exécuter les migrations et seeders**
   ```sh
   php artisan migrate --seed
   ```

6. **Lancer le serveur local**
   ```sh
   php artisan serve
   ```

## Fonctionnalités Principales

### Authentification (Laravel Sanctum)
- Inscription (`POST /api/register`)
- Connexion (`POST /api/login`)
- Déconnexion (`POST /api/logout`)
- Récupération des informations de l'utilisateur (`GET /api/user`)

### Gestion des utilisateurs
- Création de comptes avec les rôles : Utilisateur, Livreur, Fournisseur, Admin
- Validation des données avec messages en français
- Sécurisation des mots de passe avec Hashing

### Gestion des commandes et livraison
- Intégration d'un suivi des commandes
- Notifications par email ou SMS (à intégrer dans les prochaines versions)

## Structure du Projet

- `routes/api.php` : Définit les routes API pour l'authentification et la gestion des utilisateurs
- `app/Http/Controllers/AuthController.php` : Gère l'authentification des utilisateurs
- `app/Models/User.php` : Modèle utilisateur avec Sanctum intégré
- `database/migrations/` : Contient les migrations pour la base de données

## Contribuer
Si vous souhaitez contribuer à ce projet, veuillez suivre ces étapes :

1. Forker le dépôt
2. Créer une branche (`git checkout -b feature-xyz`)
3. Commiter vos modifications (`git commit -m "Ajout de XYZ"`)
4. Pousser la branche (`git push origin feature-xyz`)
5. Ouvrir une Pull Request

## Licence
Ce projet est sous licence MIT. Vous êtes libre de l'utiliser et de le modifier selon vos besoins.

---

🚀 Bon développement !


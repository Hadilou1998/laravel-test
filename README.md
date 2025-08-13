# Test technique - Projet Laravel

## Objectif
L'objectif de ce projet est d'évaluer votre capacité d'apprentissage et d'adaptation à **Laravel**, **Livewire**, **Filament** et **TailwindCSS**.  
Vous devrez mettre en place une petite application de gestion de **réservations immobilières** en utilisant ces technologies.

---

## 1. Prérequis et Installation

### 1.1 Outils nécessaires
- **PHP** (version 8.1 minimum)
- **Composer**
- **MySQL**
- **Node.js** & **NPM**
- **Git**

### 1.2 Installation du projet Laravel
1. Créez un nouveau projet Laravel :
   ```bash
   composer create-project laravel/laravel laravel-test

2. Accédez au dossier du projet :
   ```bash
   cd laravel-test

3. Configurez l'environnement (.env) en renseignant les informations de votre base de données.
   
4. Générez la clé de votre application :    
   ```bash
   php artisan key:generate

# 2. Authentification avec Laravel Breeze
1. Installez Laravel Breeze :
   ```bash
   composer require laravel/breeze --dev

2. Installez les fichiers Blade avec l'authentification :
   ```bash
   php artisan breeze:install blade

3. Compilez les assets :
   ```bash
   npm install && npm run dev

4. Executez les migrations :
   ```bash
   php artisan migrate

# 3. Structure du projet

## 3.1 Modèle et Base de données
Créer les tables suivantes :
- properties (id, name, address, price, type, description, created_at, updated_at) : contient les informations sur les propriétés
- bookings (id, user_id, property_id, start_date, end_date, created_at, updated_at) : contient les réservations

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
- properties (id, name, description, price_per_night, created_at, updated_at) : contient les informations sur les propriétés
- bookings (id, user_id, property_id, start_date, end_date, created_at, updated_at) : contient les réservations
Exemple de migration pour properties :
```php
Schema::create('properties', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->text('description');
    $table->decimal('price_per_night', 8, 2);
    $table->timestamps();
});
```
Exemple de migration pour bookings :
```php
Schema::create('bookings', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->foreignId('property_id')->constrained()->onDelete('cascade');
    $table->date('start_date');
    $table->date('end_date');
    $table->timestamps();
});
```

# 4. Interface Utilisateur avec Blade et TailwindCSS
1. Créez un layout principal dans resources/views/layouts/app.blade.php :
2. Utilisez des composants Blade pour les boutons et les cartes de propriété :
3. Ajoutez TailwindCSS et définissez des couleurs personnalisées dans tailwind.config.js :
```js
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      colors: {
        primary: '#007bff',
        secondary: '#6c757d',
      },
    },
  },
  plugins: [],
}
```

# 5. Livewire: Composants Dynamiques
1. Installez Livewire :
   ```bash
   composer require livewire/livewire

2. Créez un composant Livewire pour la gestion des réservations :
   ```bash
   php artisan make:livewire BookingManager

3. Ajoutez des événements et actions Livewire (wire:model, wire:click, dispatch).

# 6. Filament: Interface d'Administration
1. Installez Filament :
   ```bash
   composer require filament/filament

2. Créez un panneau d'administration :
   ```bash
   php artisan make:filament-user

3. Ajoutez des tables et formulaires pour les propriétés et réservations dans Filament.
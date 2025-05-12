# 🏠 Projet Laravel - Gestion de Réservations Immobilières

Ce projet est une application de gestion de réservations immobilières développée avec **Laravel**, **Livewire**, **Filament** et **TailwindCSS**. Elle permet aux utilisateurs de consulter et réserver des biens immobiliers, avec une interface d’administration dédiée pour les administrateurs.

## ✅ Fonctionnalités Réalisées

### 🔐 Authentification

- Mise en place de l'authentification avec **Laravel Breeze**.
- Ajout d’un champ `is_admin` dans la table `users` pour distinguer les utilisateurs standards des administrateurs.
- Les **utilisateurs administrateurs** ont accès à un panneau d’administration via **Filament**.
- Les **utilisateurs classiques** accèdent uniquement à l’interface publique (frontend).

### 🧱 Gestion des Données

- Création des modèles et migrations pour :
  - `properties` : propriétés immobilières
  - `bookings` : réservations liées aux utilisateurs et propriétés

### 🖼️ Propriétés avec Photos

- Chaque propriété peut être associée à une **image**.
- Intégration de l’upload et affichage des images dans l'interface utilisateur.

### 📅 Réservations Dynamiques avec Livewire

- Utilisation de **Livewire** pour la gestion interactive des réservations.
- Intégration de **Flatpickr** avec **jQuery** pour sélectionner les dates de réservation.
- Fonctionnalités ajoutées :
  - Impossible de réserver une propriété pour une **période déjà réservée**.
  - Impossible de réserver une **date passée**.

### 👤 Comportement Utilisateur

- Un **utilisateur non connecté** peut :
  - Voir la page d’accueil avec la liste des propriétés
  - Consulter les détails d’une propriété
  - Il **ne peut pas effectuer de réservation**
- Un **utilisateur connecté** peut :
  - Réserver un bien disponible via le composant Livewire

### 🛠️ Interface d'Administration avec Filament

- Accès réservé uniquement aux utilisateurs avec `is_admin = 1`
- Gestion via panneau Filament :
  - Utilisateurs
  - Propriétés
  - Réservations

## ⚙️ Technologies Utilisées

- **Laravel 10+**
- **Laravel Breeze** (Authentification)
- **Livewire** (Composants dynamiques)
- **Filament** (Interface d’administration)
- **TailwindCSS** (Design UI)
- **Flatpickr + jQuery** (Sélection de dates)
- **MySQL** (Base de données)
- **Blade** (Moteur de templates Laravel)

## 📸 Captures d’Écran

Les captures sont disponibles dans le dossier `/screenshots` 


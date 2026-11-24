# 🏺 PoterieApp

**PoterieApp** est une plateforme e-commerce dédiée à la vente de décorations artisanales en poterie et à la réservation d'ateliers de poterie. Elle vise à promouvoir l'artisanat local en proposant une expérience utilisateur simple, moderne et intuitive.

## 📌 Présentation du projet

Le projet consiste à développer une application web permettant aux passionnés de poterie et de décoration artisanale de découvrir et d'acheter des créations en poterie, mais également de réserver des activités et des ateliers de poterie en fonction des disponibilités.

La plateforme dispose de deux espaces principaux :
- **Espace client :** pour consulter les produits, effectuer des achats, réserver des ateliers et gérer son compte.
- **Espace administrateur :** pour gérer les produits, les catégories, les stocks, les activités, les réservations, les commandes et les clients.

## 🎯 Objectifs

- Promouvoir l'artisanat local et les créations en poterie.
- Faciliter la vente de décorations artisanales en ligne.
- Permettre la réservation d'ateliers de poterie.
- Simplifier la gestion des produits, des stocks et des commandes.
- Offrir une expérience fluide aux clients et aux administrateurs.

## ✨ Fonctionnalités principales

### 👤 Espace client

- Consultation des produits et des différentes collections.
- Recherche et filtrage des produits par catégorie et prix.
- Consultation des détails des produits.
- Ajout de produits au panier et gestion des quantités.
- Consultation des ateliers de poterie disponibles.
- Réservation d'activités selon les créneaux disponibles.
- Gestion du compte et des informations personnelles.
- Consultation de l'historique des commandes et des réservations.
- Consultation des articles et actualités autour de la poterie.

### ⚙️ Espace administrateur

- Gestion des produits : ajout, modification et suppression.
- Gestion des catégories et des stocks.
- Suivi des disponibilités des produits.
- Gestion des ateliers, des formateurs et des créneaux horaires.
- Gestion des réservations et des places disponibles.
- Suivi et gestion des commandes.
- Gestion des clients et de leurs demandes.
- Suivi des paiements et des livraisons.
- Consultation des statistiques et des rapports d'activité.

## 🛠️ Technologies utilisées

- **Backend :** Laravel / PHP
- **Frontend :** HTML, CSS, JavaScript
- **Base de données :** MySQL

## 🚀 Installation et configuration

### 1. Cloner le projet

```bash
git clone https://github.com/VOTRE-USERNAME/PoterieApp.git
```

### 2. Accéder au dossier

```bash
cd PoterieApp
```

### 3. Installer les dépendances PHP

```bash
composer install
```

### 4. Installer les dépendances JavaScript

```bash
npm install
```

### 5. Configurer le fichier d'environnement

```bash
cp .env.example .env
```

Configurer ensuite les informations de connexion à la base de données dans le fichier `.env` :

```env
DB_DATABASE=poterie_db
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Générer la clé de l'application

```bash
php artisan key:generate
```

### 7. Exécuter les migrations

```bash
php artisan migrate
```

### 8. Lancer l'application

Dans un premier terminal :

```bash
php artisan serve
```

Dans un deuxième terminal :

```bash
npm run dev
```

L'application sera accessible à l'adresse :

```text
http://127.0.0.1:8000
```

## 📁 Structure du projet

Le projet suit l'architecture MVC de Laravel :

- `app/` : logique métier et modèles.
- `routes/` : définition des routes.
- `resources/` : vues et ressources frontend.
- `database/` : migrations et configuration des données.
- `public/` : fichiers accessibles publiquement.
- `config/` : fichiers de configuration.

## 👩‍💻 Auteur

Développé dans le cadre d'un projet de développement web.

---

**PoterieApp – L'art de la poterie à portée de clic.** 🏺

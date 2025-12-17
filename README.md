# 🚗 AutoRent - Plateforme de Location de Voitures Premium

<div align="center">

![AutoRent Logo](https://img.shields.io/badge/AutoRent-Premium%20Car%20Rental-4f46e5?style=for-the-badge&logo=car&logoColor=white)

**Une solution moderne et élégante pour la location de véhicules**

[![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=flat-square&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?style=flat-square&logo=php&logoColor=white)](https://php.net)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind-3.x-38B2AC?style=flat-square&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=flat-square&logo=mysql&logoColor=white)](https://mysql.com)

</div>

---
<img width="1893" height="987" alt="auto1" src="https://github.com/user-attachments/assets/e363cd0f-0357-4e88-8cbb-e498dd75faaa" />
<img width="1888" height="986" alt="auto2" src="https://github.com/user-attachments/assets/922a6c9e-3ba2-4b09-aef4-06f083f83bf2" />
<img width="1885" height="973" alt="auto3" src="https://github.com/user-attachments/assets/be45e7aa-33d0-4654-ad2e-5bc388d84fe7" />
<img width="1881" height="946" alt="auto4" src="https://github.com/user-attachments/assets/b8aae265-c1fd-4a0d-b8fd-8ea069b4fa3a" />
<img width="1882" height="966" alt="auto5" src="https://github.com/user-attachments/assets/964e1618-20df-4f2a-a737-c3a2f3d66ce0" />
<img width="1888" height="992" alt="auto6" src="https://github.com/user-attachments/assets/be32580f-6d5f-4789-a9ac-d0e894f00a84" />
<img width="1871" height="995" alt="auto7" src="https://github.com/user-attachments/assets/0d7ab2fd-6729-41c6-93e3-964d59093531" />
## ✨ Aperçu

AutoRent est une application web complète de gestion de location de voitures construite avec Laravel. Elle offre une interface utilisateur moderne et intuitive pour les clients, ainsi qu'un panneau d'administration puissant pour gérer l'ensemble des opérations.

### 🎯 Fonctionnalités Principales

#### 👥 Espace Client
- 🔍 **Recherche Avancée** - Filtrez par marque, type de carburant, nombre de places et prix
- 🚙 **Catalogue de Véhicules** - Parcourez une flotte diversifiée avec images et détails complets
- 📅 **Réservation en Ligne** - Système de booking intuitif avec calcul automatique du prix
- 👤 **Gestion de Compte** - Authentification sécurisée et profil utilisateur
- 💬 **Formulaire de Contact** - Communication directe avec l'équipe

#### 🛠️ Panneau d'Administration
- 📊 **Dashboard Interactif** - Statistiques en temps réel avec graphiques (Chart.js)
  - Total des voitures, réservations, clients et revenus
  - Graphiques des réservations mensuelles
  - Top des voitures les plus louées
- 🚗 **Gestion des Véhicules** - CRUD complet pour les voitures
- 📝 **Gestion des Réservations** - Suivi et mise à jour du statut des bookings
- 👥 **Gestion des Clients** - Administration des utilisateurs
- 📧 **Messages de Contact** - Consultation et suppression des messages
- 📈 **Statistiques Avancées** - Revenus mensuels, distribution des statuts, top clients
- ⚙️ **Profil Admin** - Mise à jour des informations administrateur

---

## 🎨 Design & Interface

### Design System

Le projet utilise un design system moderne avec :
- **Couleur Principale** : Indigo (#4f46e5)
- **Typographie** : Police Outfit de Google Fonts
- **Framework CSS** : Tailwind CSS + CSS personnalisé
- **Animations** : Transitions fluides et effets hover premium

### Pages Principales

1. **Page d'Accueil** - Hero animé avec dégradés, véhicules populaires, services
2. **Catalogue Voitures** - Grille responsive avec filtres latéraux
3. **Détails Voiture** - Fiche produit complète avec options de réservation
4. **Réservation** - Formulaire moderne en 2 colonnes avec calcul temps réel
5. **Confirmation** - Page de succès avec animation et récapitulatif
6. **Admin Dashboard** - Interface premium avec cartes et graphiques

---

## 🛠️ Technologies Utilisées

### Backend
- **Framework** : Laravel 10.x
- **Langage** : PHP 8.1+
- **Base de Données** : MySQL 8.0
- **ORM** : Eloquent
- **Authentification** : Laravel Auth

### Frontend
- **Template Engine** : Blade
- **CSS Framework** : Tailwind CSS 3.x
- **JavaScript** : Vanilla JS
- **Bibliothèques** :
  - Chart.js (graphiques)
  - Font Awesome (icônes)

### Architecture
- **Pattern** : MVC (Model-View-Controller)
- **Middleware** : Auth, Admin
- **Validation** : Form Requests
- **Seeders** : Données de démonstration

---

## 📦 Installation

### Prérequis

- PHP >= 8.1
- Composer
- MySQL >= 8.0
- Node.js & NPM (optionnel)

### Étapes d'Installation

1. **Cloner le Repository**
```bash
git clone https://github.com/votre-username/autorent.git
cd autorent
```

2. **Installer les Dépendances**
```bash
composer install
```

3. **Configuration de l'Environnement**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configurer la Base de Données**

Éditez le fichier `.env` :
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=autorent
DB_USERNAME=root
DB_PASSWORD=
```

5. **Créer la Base de Données**
```bash
# Créez une base de données nommée 'autorent' dans MySQL
mysql -u root -p -e "CREATE DATABASE autorent"
```

6. **Exécuter les Migrations**
```bash
php artisan migrate
```

7. **Peupler la Base de Données (optionnel)**
```bash
php artisan db:seed
# ou pour l'admin uniquement
php artisan db:seed --class=AdminSeeder
```

8. **Lancer le Serveur de Développement**
```bash
php artisan serve
```

L'application sera accessible sur `http://127.0.0.1:8000`

---

## 👤 Comptes de Démonstration

### Compte Administrateur
- **Email** : `adnenhajlaoui2@gmail.com`
- **Mot de passe** : `adnen12345`

### Créer un Compte Client
Inscrivez-vous via `/register` ou utilisez un compte de test si vous avez exécuté les seeders.

---

## 📁 Structure du Projet

```
autorent/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AdminController.php      # Gestion admin
│   │   │   ├── AuthController.php       # Authentification
│   │   │   ├── BookingController.php    # Réservations
│   │   │   ├── CarController.php        # Voitures
│   │   │   └── ContactController.php    # Messages
│   │   └── Middleware/
│   │       └── IsAdmin.php              # Middleware admin
│   └── Models/
│       ├── Car.php
│       ├── Booking.php
│       ├── User.php
│       └── ContactMessage.php
├── database/
│   ├── migrations/                      # Schémas de tables
│   └── seeders/
│       └── AdminSeeder.php              # Seed admin
├── public/
│   └── css/
│       ├── main.css                     # Design system
│       ├── admin.css                    # Styles admin
│       └── booking.css                  # Styles réservation
├── resources/
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php            # Layout principal
│       │   └── admin.blade.php          # Layout admin
│       ├── admin/                       # Vues admin
│       ├── auth/                        # Login/Register
│       ├── bookings/                    # Réservations
│       ├── cars/                        # Voitures
│       └── pages/                       # Pages statiques
└── routes/
    └── web.php                          # Routes de l'application
```

---

## 🔐 Sécurité

- ✅ Protection CSRF sur tous les formulaires
- ✅ Hashage des mots de passe avec Bcrypt
- ✅ Middleware d'authentification
- ✅ Middleware de vérification admin
- ✅ Validation des données côté serveur
- ✅ Protection contre les injections SQL (Eloquent ORM)

---

## 🚀 Fonctionnalités à Venir

- [ ] Système de paiement en ligne (Stripe/PayPal)
- [ ] Notifications par email
- [ ] API REST pour applications mobiles
- [ ] Système de notation et avis
- [ ] Gestion des assurances
- [ ] Export des rapports en PDF
- [ ] Calendrier de disponibilité
- [ ] Multi-langues (i18n)

---

## 📸 Captures d'Écran

### Page d'Accueil
![Home Page](https://via.placeholder.com/800x400/4f46e5/ffffff?text=Page+d%27Accueil)

### Panneau d'Administration
![Admin Dashboard](https://via.placeholder.com/800x400/1e293b/ffffff?text=Admin+Dashboard)

### Réservation
![Booking](https://via.placeholder.com/800x400/4f46e5/ffffff?text=Formulaire+de+R%C3%A9servation)

---

## 🤝 Contribution

Les contributions sont les bienvenues ! Pour contribuer :

1. Forkez le projet
2. Créez une branche pour votre fonctionnalité (`git checkout -b feature/AmazingFeature`)
3. Committez vos changements (`git commit -m 'Add some AmazingFeature'`)
4. Poussez vers la branche (`git push origin feature/AmazingFeature`)
5. Ouvrez une Pull Request

---

## 📝 License

Ce projet est sous licence MIT. Voir le fichier `LICENSE` pour plus de détails.

---

## 👨‍💻 Auteur

**Votre Nom**
- GitHub: [@votre-username](https://github.com/votre-username)
- Email: votre.email@example.com

---

## 🙏 Remerciements

- [Laravel](https://laravel.com) pour le framework PHP exceptionnel
- [Tailwind CSS](https://tailwindcss.com) pour le framework CSS utilitaire
- [Chart.js](https://www.chartjs.org) pour les graphiques interactifs
- [Unsplash](https://unsplash.com) pour les images de qualité

---






<div align="center">

**⭐ Si ce projet vous a aidé, n'hésitez pas à lui donner une étoile !**

Made with ❤️ and Laravel

</div>

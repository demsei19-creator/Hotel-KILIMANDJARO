# Plan d'Implémentation : Hôtel Kilimandjaro - Phase 2 (Panneau d'Administration Filament)

> **Pour les agents :** COMPÉTENCE REQUISE SOUS-JACENTE : Utilisez l'exécution pas à pas pour implémenter ce plan tâche par tâche. Les étapes utilisent la syntaxe de case à cocher (`- [ ]`) pour le suivi.

**Objectif :** Installer le panneau d'administration Filament V3 et générer les interfaces de gestion CRUD pour les Chambres et Réservations.

**Architecture :** Filament s'installe directement dans notre monolithe Laravel et nous permet de construire des interfaces d'administration robustes très rapidement via des classes `Resource`.

**Pile Technique (Tech Stack) :** Laravel 11, Filament V3, Livewire.

**Spécification (Spec) :** `docs/superpowers/specs/2026-09-25-hotel-kilimandjaro-design.md`

## Contraintes Globales

- Utiliser Filament V3.
- Les interfaces d'administration (labels, colonnes) doivent être traduites en français.

---

### Tâche 1 : Installation de Filament

**Fichiers :**
- Créer : Configuration et service provider Filament.

**Interfaces :**
- Produit : Panneau d'administration accessible sur `/admin`.

- [ ] **Étape 1 : Installer le package Filament**

```bash
composer require filament/filament:"^3.2" -W
```

- [ ] **Étape 2 : Initialiser le panel Admin**

```bash
php artisan filament:install --panels
```

- [ ] **Étape 3 : Créer un utilisateur Admin de test**

```bash
php artisan make:filament-user --name="Admin" --email="admin@hotel.com" --password="password"
```

- [ ] **Étape 4 : Commit**

```bash
git add .
git commit -m "feat: installation de filament php"
```

### Tâche 2 : Interface de Gestion des Types de Chambres (RoomType)

**Fichiers :**
- Créer : `app/Filament/Resources/RoomTypeResource.php`

- [ ] **Étape 1 : Générer la ressource**

```bash
php artisan make:filament-resource RoomType --generate
```

- [ ] **Étape 2 : Configurer les colonnes en français**

Ouvrir `app/Filament/Resources/RoomTypeResource.php` et ajuster les labels (Nom, Capacité, Prix de base).

- [ ] **Étape 3 : Commit**

```bash
git add app/Filament/
git commit -m "feat: ajout gestion des types de chambres dans l'admin"
```

### Tâche 3 : Interface de Gestion des Chambres (Room)

**Fichiers :**
- Créer : `app/Filament/Resources/RoomResource.php`

- [ ] **Étape 1 : Générer la ressource**

```bash
php artisan make:filament-resource Room --generate
```

- [ ] **Étape 2 : Configurer les champs et colonnes**

Ajuster `RoomResource.php` pour afficher le type de chambre, le numéro, et le statut (Actif/Inactif).

- [ ] **Étape 3 : Commit**

```bash
git add app/Filament/
git commit -m "feat: ajout gestion des chambres dans l'admin"
```

### Tâche 4 : Interface de Suivi des Réservations

**Fichiers :**
- Créer : `app/Filament/Resources/ReservationResource.php`

- [ ] **Étape 1 : Générer la ressource**

```bash
php artisan make:filament-resource Reservation --generate
```

- [ ] **Étape 2 : Configurer l'affichage**

Dans `ReservationResource.php`, afficher le nom du client, les dates, le statut avec des badges de couleur (ex: vert pour confirmé, jaune pour attente).

- [ ] **Étape 3 : Commit**

```bash
git add app/Filament/
git commit -m "feat: ajout gestion des reservations dans l'admin"
```

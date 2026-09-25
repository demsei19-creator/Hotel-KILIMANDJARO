# Plan d'Implémentation : Hôtel Kilimandjaro - Phase 4 (Paiement, Restaurant, Rôles)

> **Pour les agents :** COMPÉTENCE REQUISE SOUS-JACENTE : Utilisez l'exécution pas à pas pour implémenter ce plan tâche par tâche.

**Objectif :** Finaliser l'application en intégrant la passerelle de paiement (CinetPay), le module de restauration, et le système d'autorisations du back-office.

**Spécification (Spec) :** `docs/superpowers/specs/2026-09-25-hotel-kilimandjaro-design.md`

---

### Tâche 1 : Intégration du Paiement (CinetPay)

**Objectif :** Rendre les réservations de chambres payables en ligne via Mobile Money/Cartes.

- [ ] **Étape 1 : Configuration**
      Ajouter les variables d'environnement `CINETPAY_SITE_ID`, `CINETPAY_API_KEY`, et l'URL de l'API dans `.env` et `config/services.php`.
- [ ] **Étape 2 : Service de Paiement**
      Créer `app/Services/CinetPayService.php` contenant la logique d'appel à l'API d'initialisation de paiement.
- [ ] **Étape 3 : Redirection**
      Modifier `BookingController@book` pour générer un lien de paiement via le service au lieu d'une simple page de succès, et rediriger le client vers l'URL CinetPay.
- [ ] **Étape 4 : Webhook & Notification**
      Créer `CinetPayWebhookController` avec une route POST accessible publiquement (exclue de la vérification CSRF). Ce contrôleur validera le paiement et changera le statut de la réservation en `confirmed`.
- [ ] **Étape 5 : Commit**

### Tâche 2 : Module de Restauration

**Objectif :** Gérer et afficher le menu du restaurant, et permettre les demandes de réservation de table.

- [ ] **Étape 1 : Base de données**
      Créer les modèles et migrations pour : `MenuCategory` (nom), `MenuItem` (nom, description, prix, menu_category_id), et `TableReservation` (customer_name, email, phone, reservation_date, time, guests, status).
- [ ] **Étape 2 : Administration (Filament)**
      Générer et configurer les ressources Filament (`MenuCategoryResource`, `MenuItemResource`, `TableReservationResource`) avec des interfaces en français.
- [ ] **Étape 3 : Site Vitrine (Frontend)**
      Créer la page `/restaurant` avec l'affichage dynamique de la carte du menu organisé par catégorie, et un formulaire de demande de réservation de table intégré. Utiliser le design system CSS existant (cartes, boutons).
- [ ] **Étape 4 : Commit**

### Tâche 3 : Gestion des Rôles et Permissions

**Objectif :** Restreindre l'accès aux différentes parties de l'administration selon la fonction du personnel.

- [ ] **Étape 1 : Installation**
      Installer le package `spatie/laravel-permission` et le plugin Filament associé (ex: `althinect/filament-spatie-roles-permissions`). Publier les migrations.
- [ ] **Étape 2 : Configuration des Rôles de base**
      Créer un seeder (`RolesAndPermissionsSeeder`) pour générer les rôles : `Direction` (accès total), `Réception` (chambres et réservations), `Restaurant` (menus et tables).
- [ ] **Étape 3 : Application des restrictions**
      Mettre à jour le modèle `User` (trait `HasRoles`) et modifier les ressources Filament existantes (ajout des méthodes `canViewAny()`, etc. si non gérées par le plugin) pour restreindre l'affichage dans la sidebar selon les permissions.
- [ ] **Étape 4 : Commit**

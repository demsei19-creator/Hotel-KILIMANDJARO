# Spécification Architecturale : Plateforme Hôtel KILIMANDJARO

## 1. Contexte et Objectifs
Le projet est une plateforme web vitrine et un moteur de réservation en temps réel pour l'hôtel et restaurant Kilimandjaro à Abidjan.
- **Objectifs :** Présentation visuelle premium, réservation de chambres avec paiement en ligne automatisé (V1), réservation de table (système de demande simple pour la V1), espace d'administration autonome.
- **Approche :** Monolithe, priorité au mobile (Mobile-first).

## 2. Architecture Technique
- **Framework Core :** Laravel 11.
- **Base de données :** PostgreSQL (optimisation pour la gestion robuste de la concurrence et des verrous de lignes).
- **Frontend Public :** Moteur de templating Blade + Alpine.js + Tailwind CSS.
- **Backend / Administration :** Filament V3.
- **Gestion des Rôles :** Spatie Laravel Permission.
- **Paiement :** Intégration de l'API CinetPay (Mobile Money : Orange, Wave, MTN, Moov).
- **Temps Réel / Notifications :** Laravel Reverb (WebSockets).

## 3. Modèle de Données (Aperçu)
- `RoomType` : Catégories de chambres (ex: Suite, Standard) avec capacités, tarifs et photos.
- `Room` : Chambres physiques numérotées, liées à un type (ex: 101, 102).
- `Reservation` : Séjours (client, dates, chambre attribuée, montant, statut).
- `RestaurantCategory` & `MenuItem` : Carte dynamique du restaurant.
- `TableReservation` : Demandes de réservation de table (date, heure, couverts).

## 4. Logique de Réservation (Anti Double-Booking)
1. **Sélection :** Le client choisit ses dates et le type de chambre. Le système recherche une `Room` physique disponible.
2. **Lock Pessimiste :** Utilisation de transactions SQL (`lockForUpdate()`) pour empêcher toute autre session de réserver cette même chambre à la même seconde.
3. **Paiement CinetPay :** La réservation passe au statut *en attente de paiement*. Le client est redirigé vers la passerelle de paiement. 
4. **Webhook & Confirmation :** CinetPay notifie l'application en arrière-plan. La réservation est confirmée, la facture est envoyée, et la réception est notifiée en temps réel. En cas de non-paiement après 15 minutes, la chambre est déverrouillée.

## 5. Rôles et Permissions (Back-office)
- **Direction (Admin) :** Accès total. Statistiques de revenus, configuration des tarifs, gestion du personnel, édition des textes/images de la vitrine.
- **Réception :** Accès limité aux réservations de chambres. Vue planning/calendrier, notifications instantanées des nouveaux clients.
- **Restaurant :** Accès limité au module de restauration. Mise à jour des plats, des disponibilités et gestion des demandes de tables.

# Plan d'Implémentation : Hôtel Kilimandjaro - Phase 3 (Site Web / Vitrine)

> **Pour les agents :** COMPÉTENCE REQUISE SOUS-JACENTE : Utilisez l'exécution pas à pas pour implémenter ce plan tâche par tâche. Les étapes utilisent la syntaxe de case à cocher (`- [ ]`) pour le suivi.

**Objectif :** Développer la vitrine publique de l'hôtel (Front-end) permettant aux clients de voir les chambres et de réserver.

**Architecture :** Vues Blade classiques avec composants.

**Spécification (Spec) :** `docs/superpowers/specs/2026-09-25-hotel-kilimandjaro-design.md`

## Contraintes Globales

- **Design Premium ("Effet Wahou") :** Interface moderne, dynamique, palettes de couleurs élégantes, mode sombre ou contrasté, glassmorphism, et micro-animations.
- **Technologie CSS :** **CSS Vanilla exclusif** (Pas de TailwindCSS). Un système de design sur-mesure dans un fichier `style.css`.
- **SEO & Sémantique :** Balisage HTML5 sémantique, balises title et meta appropriées, hiérarchie des titres (un seul H1).

---

### Tâche 1 : Structure de base et Design System

**Fichiers :**
- Créer : `resources/views/components/layouts/app.blade.php`
- Créer : `public/css/style.css`
- Modifier : `routes/web.php`

- [ ] **Étape 1 : Layout principal**
      Créer le layout de base Blade avec le header (Navigation), le footer, et l'inclusion des polices (ex: Google Fonts *Outfit* ou *Inter*).
- [ ] **Étape 2 : Design System CSS**
      Initialiser `style.css` avec les variables (couleurs premium, ombres, transitions), le reset, et les classes utilitaires de base (boutons animés, cartes glassmorphism).
- [ ] **Étape 3 : Commit**
      `git commit -m "feat: initialisation du design system et layout front-end"`

### Tâche 2 : Page d'Accueil (Home)

**Fichiers :**
- Créer : `app/Http/Controllers/HomeController.php`
- Créer : `resources/views/home.blade.php`

- [ ] **Étape 1 : Section Hero**
      Créer une bannière spectaculaire d'accueil avec une typographie moderne et un bouton Call-To-Action.
- [ ] **Étape 2 : Contrôleur et Route**
      Créer le contrôleur pour charger les types de chambres phares et les envoyer à la vue.
- [ ] **Étape 3 : Section Aperçu des Chambres**
      Créer une section affichant les catégories de chambres avec des effets de survol immersifs.
- [ ] **Étape 4 : Commit**
      `git commit -m "feat: integration de la page d'accueil premium"`

### Tâche 3 : Catalogue des Chambres

**Fichiers :**
- Créer : `app/Http/Controllers/RoomCatalogController.php`
- Créer : `resources/views/rooms/index.blade.php`

- [ ] **Étape 1 : Route et Contrôleur**
      Créer la route `/chambres` qui liste toutes les `RoomType` disponibles.
- [ ] **Étape 2 : Vue Grille de Chambres**
      Mettre en place une grille responsive (CSS Grid) élégante pour présenter chaque type de chambre, son prix, sa capacité, et un bouton "Réserver".
- [ ] **Étape 3 : Commit**
      `git commit -m "feat: page catalogue des types de chambres"`

### Tâche 4 : Tunnel de Réservation

**Fichiers :**
- Créer : `app/Http/Controllers/BookingController.php`
- Créer : `resources/views/rooms/show.blade.php` (formulaire)
- Créer : `resources/views/rooms/success.blade.php`

- [ ] **Étape 1 : Formulaire de réservation**
      Créer la page de détails d'une chambre (`/chambres/{id}`) contenant le formulaire : Dates de séjour (Check-in, Check-out), Nom, Email. Formulaire au design épuré et accessible.
- [ ] **Étape 2 : Traitement de la réservation**
      Créer la méthode POST pour soumettre le formulaire. Utiliser le `BookingService` créé en Phase 1 pour enregistrer la réservation ou retourner une erreur si aucune chambre n'est disponible.
- [ ] **Étape 3 : Page de confirmation**
      Créer une vue de succès après réservation avec le récapitulatif.
- [ ] **Étape 4 : Commit**
      `git commit -m "feat: implementation du tunnel de reservation client"`

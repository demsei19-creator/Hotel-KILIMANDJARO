# Plan d'Implémentation : Hôtel Kilimandjaro - Phase 1 (Modèle & Réservation)

> **Pour les agents :** COMPÉTENCE REQUISE SOUS-JACENTE : Utilisez l'exécution pas à pas pour implémenter ce plan tâche par tâche. Les étapes utilisent la syntaxe de case à cocher (`- [ ]`) pour le suivi.

**Objectif :** Initialiser le projet Laravel, configurer PostgreSQL, créer les modèles de base pour les chambres et implémenter le service de réservation avec le *lock pessimiste* SQL.

**Architecture :** Le cahier des charges couvrant de nombreux sous-systèmes (Admin, Vitrine, Réservations, Restaurant), ce projet est divisé en plusieurs phases. Cette Phase 1 se concentre exclusivement sur l'initialisation du monolithe Laravel 11 et la mise en place du cœur métier robuste (le moteur de réservation en backend).

**Pile Technique (Tech Stack) :** PHP 8.2+, Laravel 11, PostgreSQL, Pest (pour les tests).

**Spécification (Spec) :** `docs/superpowers/specs/2026-09-25-hotel-kilimandjaro-design.md`

## Contraintes Globales

- Base de données PostgreSQL requise en local.
- Les noms de variables/méthodes doivent être en anglais, les commentaires peuvent être en français.
- Chaque ajout de logique métier doit être validé par un test unitaire/fonctionnel.

---

### Tâche 1 : Initialisation du Projet et Base de Données

**Fichiers :**
- Créer : `.env` (via copie de `.env.example` lors de l'installation)
- Modifier : `.env`

**Interfaces :**
- Consomme : N/A
- Produit : Projet Laravel fonctionnel, connecté à PostgreSQL.

- [ ] **Étape 1 : Créer le projet Laravel**

```bash
composer create-project laravel/laravel .
```

- [ ] **Étape 2 : Configurer la base de données**

Modifier le fichier `.env` pour utiliser PostgreSQL (ajustez selon votre instance locale) :
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=kilimandjaro
DB_USERNAME=postgres
DB_PASSWORD=postgres
```

- [ ] **Étape 3 : Commit**

```bash
git add .
git commit -m "chore: initialisation projet laravel et config postgresql"
```

### Tâche 2 : Modèles et Migrations (Chambres)

**Fichiers :**
- Créer : `app/Models/RoomType.php`, `database/migrations/xxxx_create_room_types_table.php`
- Créer : `app/Models/Room.php`, `database/migrations/xxxx_create_rooms_table.php`

**Interfaces :**
- Consomme : Base de données configurée.
- Produit : Tables `room_types` et `rooms`.

- [ ] **Étape 1 : Générer les modèles et migrations**

```bash
php artisan make:model RoomType -m
php artisan make:model Room -m
```

- [ ] **Étape 2 : Écrire les migrations**

Dans la migration de `room_types` :
```php
public function up(): void
{
    Schema::create('room_types', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->integer('capacity');
        $table->decimal('base_price', 10, 2);
        $table->timestamps();
    });
}
```

Dans la migration de `rooms` :
```php
public function up(): void
{
    Schema::create('rooms', function (Blueprint $table) {
        $table->id();
        $table->foreignId('room_type_id')->constrained()->cascadeOnDelete();
        $table->string('number')->unique();
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
}
```

- [ ] **Étape 3 : Configurer les Modèles**

Dans `app/Models/RoomType.php` :
```php
protected $fillable = ['name', 'capacity', 'base_price'];

public function rooms()
{
    return $this->hasMany(Room::class);
}
```

Dans `app/Models/Room.php` :
```php
protected $fillable = ['room_type_id', 'number', 'is_active'];

public function roomType()
{
    return $this->belongsTo(RoomType::class);
}
```

- [ ] **Étape 4 : Exécuter la migration**

```bash
php artisan migrate
```

- [ ] **Étape 5 : Commit**

```bash
git add database/migrations/ app/Models/
git commit -m "feat: creation des modeles RoomType et Room"
```

### Tâche 3 : Modèle de Réservation et Logique de Verrouillage

**Fichiers :**
- Créer : `app/Models/Reservation.php`, `database/migrations/xxxx_create_reservations_table.php`
- Créer : `app/Services/BookingService.php`
- Créer : `tests/Feature/BookingServiceTest.php`

**Interfaces :**
- Consomme : `Room`, `RoomType`.
- Produit : Service de réservation sécurisé contre le double-booking.

- [ ] **Étape 1 : Générer la réservation et le test**

```bash
php artisan make:model Reservation -m
php artisan make:test BookingServiceTest
```

- [ ] **Étape 2 : Écrire la migration de réservation**

Ouvrir la migration `reservations` générée et écrire :
```php
public function up(): void
{
    Schema::create('reservations', function (Blueprint $table) {
        $table->id();
        $table->foreignId('room_id')->constrained()->cascadeOnDelete();
        $table->string('customer_name');
        $table->string('customer_email');
        $table->date('check_in');
        $table->date('check_out');
        $table->decimal('total_amount', 10, 2);
        $table->string('status')->default('pending'); // pending, confirmed, cancelled
        $table->timestamps();
    });
}
```
Puis exécuter `php artisan migrate`.

- [ ] **Étape 3 : Écrire le test qui échoue**

Dans `tests/Feature/BookingServiceTest.php` :
```php
<?php

namespace Tests\Feature;

use App\Models\Room;
use App\Models\RoomType;
use App\Services\BookingService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_book_available_room()
    {
        $type = RoomType::create(['name' => 'Suite', 'capacity' => 2, 'base_price' => 100]);
        $room = Room::create(['room_type_id' => $type->id, 'number' => '101']);

        $service = new BookingService();
        $reservation = $service->bookRoom(
            $type->id, 
            'John Doe', 
            'john@example.com', 
            '2026-10-01', 
            '2026-10-05'
        );

        $this->assertNotNull($reservation);
        $this->assertEquals('101', $reservation->room->number);
        $this->assertEquals('pending', $reservation->status);
    }
}
```

- [ ] **Étape 4 : Exécuter le test (Échec attendu)**

```bash
php artisan test --filter BookingServiceTest
```
Attendu : ÉCHEC (Classe BookingService introuvable).

- [ ] **Étape 5 : Créer l'implémentation minimale avec lock pessimiste**

Créer le fichier `app/Services/BookingService.php` :
```php
<?php

namespace App\Services;

use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
use Exception;

class BookingService
{
    public function bookRoom(int $roomTypeId, string $name, string $email, string $checkIn, string $checkOut)
    {
        return DB::transaction(function () use ($roomTypeId, $name, $email, $checkIn, $checkOut) {
            // Cherche une chambre qui n'a aucune réservation chevauchant les dates
            // lockForUpdate() empêche une autre session de la réserver simultanément
            $availableRoom = Room::where('room_type_id', $roomTypeId)
                ->where('is_active', true)
                ->whereDoesntHave('reservations', function ($query) use ($checkIn, $checkOut) {
                    $query->where(function ($q) use ($checkIn, $checkOut) {
                        $q->where('check_in', '<', $checkOut)
                          ->where('check_out', '>', $checkIn)
                          ->whereIn('status', ['pending', 'confirmed']);
                    });
                })
                ->lockForUpdate()
                ->first();

            if (!$availableRoom) {
                throw new Exception("Aucune chambre disponible pour ces dates.");
            }

            $days = (strtotime($checkOut) - strtotime($checkIn)) / (60 * 60 * 24);
            $totalAmount = $availableRoom->roomType->base_price * $days;

            return Reservation::create([
                'room_id' => $availableRoom->id,
                'customer_name' => $name,
                'customer_email' => $email,
                'check_in' => $checkIn,
                'check_out' => $checkOut,
                'total_amount' => $totalAmount,
                'status' => 'pending'
            ]);
        });
    }
}
```
Et configurer les *fillables* dans `app/Models/Reservation.php` :
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['room_id', 'customer_name', 'customer_email', 'check_in', 'check_out', 'total_amount', 'status'];

    public function room() 
    { 
        return $this->belongsTo(Room::class); 
    }
}
```

- [ ] **Étape 6 : Exécuter le test (Succès attendu)**

```bash
php artisan test --filter BookingServiceTest
```
Attendu : PASS

- [ ] **Étape 7 : Commit**

```bash
git add app/Models/ database/migrations/ tests/Feature/ app/Services/
git commit -m "feat: service de reservation securise avec lock pessimiste"
```

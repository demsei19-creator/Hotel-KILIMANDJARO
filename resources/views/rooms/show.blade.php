<x-layouts.app>
    @section('title', 'Réserver ' . $roomType->name . ' | Hôtel Kilimandjaro')

    <div class="container mt-xl mb-lg" style="padding-top: 100px;">
        <div class="booking-container">
            <div class="booking-details animate-fade-in">
                <h1 class="section-title">{{ $roomType->name }}</h1>
                <p class="room-capacity mb-lg">👤 Jusqu'à {{ $roomType->capacity }} personnes</p>
                <p>Une chambre luxueuse offrant un confort absolu pour votre séjour, pensée pour que vous puissiez vous ressourcer en toute tranquillité.</p>
                
                <div class="booking-price mt-lg">
                    <span>Prix de base :</span>
                    <strong>{{ number_format($roomType->base_price, 0, ',', ' ') }} €</strong> / nuit
                </div>
            </div>

            <div class="booking-form-wrapper animate-fade-in" style="animation-delay: 0.2s">
                <form action="{{ route('rooms.book', $roomType->id) }}" method="POST" class="booking-form">
                    @csrf
                    <h3>Réserver cette chambre</h3>

                    @if(session('error'))
                        <div class="alert alert-error">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="name">Nom complet</label>
                        <input type="text" id="name" name="name" required class="form-control" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Adresse Email</label>
                        <input type="email" id="email" name="email" required class="form-control" value="{{ old('email') }}">
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="check_in">Date d'arrivée</label>
                            <input type="date" id="check_in" name="check_in" required class="form-control" value="{{ old('check_in') }}">
                        </div>
                        <div class="form-group">
                            <label for="check_out">Date de départ</label>
                            <input type="date" id="check_out" name="check_out" required class="form-control" value="{{ old('check_out') }}">
                        </div>
                    </div>

                    <button type="submit" class="btn-primary" style="width: 100%; margin-top: 1rem;">Confirmer la réservation</button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>

<x-layouts.app>
    @section('title', 'Nos Chambres | Hôtel Kilimandjaro')

    <div class="container mt-xl mb-lg" style="padding-top: 100px;">
        <h1 class="section-title text-center animate-fade-in">Nos Chambres & Suites</h1>
        <p class="section-subtitle text-center animate-fade-in" style="animation-delay: 0.2s">Trouvez le cocon parfait pour votre séjour</p>

        <div class="rooms-grid mt-lg">
            @foreach($roomTypes as $type)
                <div class="room-card animate-fade-in" style="animation-delay: {{ $loop->index * 0.1 + 0.3 }}s">
                    <div class="room-card-image">
                        <div class="placeholder-img">🛌</div>
                    </div>
                    <div class="room-card-content">
                        <h3>{{ $type->name }}</h3>
                        <p class="room-capacity">👤 Capacité : {{ $type->capacity }} personnes</p>
                        <p class="room-price"><strong>{{ number_format($type->base_price, 0, ',', ' ') }} €</strong> / nuit</p>
                        <a href="{{ url('/chambres/' . $type->id) }}" class="btn-primary" style="width: 100%; text-align: center;">Réserver</a>
                    </div>
                </div>
            @endforeach
            @if($roomTypes->isEmpty())
                <p class="text-center" style="grid-column: 1 / -1; padding: 2rem;">Aucun type de chambre disponible pour le moment.</p>
            @endif
        </div>
    </div>
</x-layouts.app>

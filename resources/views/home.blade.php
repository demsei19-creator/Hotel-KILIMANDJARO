<x-layouts.app>
    @section('title', 'Accueil | Hôtel Kilimandjaro')

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content container animate-fade-in">
            <h1 class="hero-title">L'évasion à son apogée</h1>
            <p class="hero-subtitle">Découvrez le luxe, le calme et la volupté au cœur de la nature.</p>
            <a href="{{ url('/chambres') }}" class="btn-primary hero-btn">Découvrir nos chambres</a>
        </div>
    </section>

    <!-- Featured Rooms Section -->
    <section class="featured-rooms container mt-xl mb-lg">
        <h2 class="section-title text-center">Séjours de Prestige</h2>
        <p class="section-subtitle text-center">Un aperçu de nos hébergements les plus convoités</p>

        <div class="rooms-grid">
            @foreach($featuredRoomTypes as $type)
                <div class="room-card animate-fade-in" style="animation-delay: {{ $loop->index * 0.2 }}s">
                    <div class="room-card-image">
                        <!-- Placeholder div since we don't have images in DB yet -->
                        <div class="placeholder-img">🏔️</div>
                    </div>
                    <div class="room-card-content">
                        <h3>{{ $type->name }}</h3>
                        <p class="room-capacity">👤 Jusqu'à {{ $type->capacity }} personnes</p>
                        <p class="room-price">À partir de <strong>{{ number_format($type->base_price, 0, ',', ' ') }} €</strong> / nuit</p>
                        <a href="{{ url('/chambres') }}" class="btn-outline">En savoir plus</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

</x-layouts.app>

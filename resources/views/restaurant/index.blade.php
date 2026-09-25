<x-layouts.app>
    <section class="hero-section" style="min-height: 40vh; display:flex; align-items:center; justify-content:center; text-align:center;">
        <div class="hero-content">
            <span class="badge">Notre Table</span>
            <h1 class="hero-title">Le Restaurant</h1>
            <p class="hero-subtitle">Découvrez une expérience culinaire unique, mêlant saveurs locales et gastronomie internationale.</p>
        </div>
    </section>

    <section class="rooms-section">
        <div class="container">
            <div style="display: grid; grid-template-columns: 1fr; gap: 4rem;">
                
                @media (min-width: 768px) {
                    <style>
                        .resto-grid {
                            display: grid;
                            grid-template-columns: 2fr 1fr;
                            gap: 4rem;
                        }
                    </style>
                }
                
                <div class="resto-grid" style="display: grid; gap: 4rem; @media (min-width: 768px) { grid-template-columns: 2fr 1fr; }">
                    
                    <!-- Menu -->
                    <div class="menu-list">
                        <h2 class="section-title">La Carte</h2>
                        
                        @forelse($categories as $category)
                            <div class="menu-category" style="margin-bottom: 3rem;">
                                <h3 style="font-size: 1.5rem; color: var(--primary); border-bottom: 2px solid var(--primary-light); padding-bottom: 0.5rem; margin-bottom: 1.5rem;">{{ $category->name }}</h3>
                                <div style="display: grid; gap: 1.5rem;">
                                    @forelse($category->items as $item)
                                        <div class="menu-item" style="display: flex; justify-content: space-between; align-items: baseline; border-bottom: 1px dashed rgba(255,255,255,0.1); padding-bottom: 0.5rem;">
                                            <div>
                                                <h4 style="font-weight: 600; margin: 0; font-size: 1.1rem;">{{ $item->name }}</h4>
                                                @if($item->description)
                                                    <p style="font-size: 0.9rem; color: var(--text-muted); margin: 0.4rem 0 0 0;">{{ $item->description }}</p>
                                                @endif
                                            </div>
                                            <div style="font-weight: 700; color: var(--accent); white-space: nowrap; margin-left: 1rem;">
                                                {{ number_format($item->price, 0, ',', ' ') }} FCFA
                                            </div>
                                        </div>
                                    @empty
                                        <p style="color: var(--text-muted);">Bientôt disponible.</p>
                                    @endforelse
                                </div>
                            </div>
                        @empty
                            <p style="color: var(--text-muted);">La carte est en cours d'élaboration.</p>
                        @endforelse
                    </div>

                    <!-- Booking Form -->
                    <div class="booking-sidebar">
                        <div class="booking-card glass-panel" style="position: sticky; top: 2rem;">
                            <h3 style="margin-bottom: 1.5rem; font-size: 1.25rem;">Réserver une table</h3>
                            
                            @if(session('success'))
                                <div style="background: rgba(46, 213, 115, 0.1); color: #2ed573; border: 1px solid rgba(46, 213, 115, 0.3); padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('restaurant.book') }}" method="POST" class="booking-form">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">Nom complet</label>
                                    <input type="text" name="customer_name" class="form-input" required value="{{ old('customer_name') }}" placeholder="Jean Dupont">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="customer_email" class="form-input" required value="{{ old('customer_email') }}" placeholder="jean@example.com">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Téléphone</label>
                                    <input type="text" name="customer_phone" class="form-input" value="{{ old('customer_phone') }}" placeholder="+225 0102030405">
                                </div>
                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                                    <div class="form-group">
                                        <label class="form-label">Date</label>
                                        <input type="date" name="reservation_date" class="form-input" required value="{{ old('reservation_date') }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Heure</label>
                                        <input type="time" name="reservation_time" class="form-input" required value="{{ old('reservation_time') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nombre de couverts</label>
                                    <input type="number" name="guests" class="form-input" min="1" max="20" required value="{{ old('guests', 2) }}">
                                </div>
                                
                                <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 1rem;">
                                    Demander une table
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</x-layouts.app>

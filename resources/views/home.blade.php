<x-layouts.app>
    @section('title', 'Accueil | Hôtel Kilimandjaro')

    <!-- Hero Section -->
    <section style="height: 100vh; position: relative; display: flex; align-items: center; justify-content: center; overflow: hidden;">
        <!-- Background Image with Parallax feel -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -2;">
            <img src="https://images.unsplash.com/photo-1542314831-c6a4d1421044?q=80&w=2000&auto=format&fit=crop" alt="Kilimandjaro Hotel" style="width: 100%; height: 100%; object-fit: cover; filter: brightness(0.3) grayscale(20%);">
        </div>
        
        <!-- Subtle noise overlay for texture -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: url('data:image/svg+xml,%3Csvg viewBox=%220 0 200 200%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cfilter id=%22noiseFilter%22%3E%3CfeTurbulence type=%22fractalNoise%22 baseFrequency=%220.65%22 numOctaves=%223%22 stitchTiles=%22stitch%22/%3E%3C/filter%3E%3Crect width=%22100%25%22 height=%22100%25%22 filter=%22url(%23noiseFilter)%22 opacity=%220.08%22/%3E%3C/svg%3E'); z-index: -1; mix-blend-mode: overlay;"></div>

        <div class="container" style="text-align: center; position: relative; z-index: 10;">
            <div class="reveal-up" style="animation-delay: 0.2s;">
                <span style="display: block; font-family: var(--font-body); text-transform: uppercase; letter-spacing: 0.3em; color: var(--accent-gold); margin-bottom: 2rem; font-size: 0.75rem;">
                    Privilège absolu
                </span>
                <h1 class="title-xl">
                    L'Élégance
                    <span class="title-gold">Redéfinie.</span>
                </h1>
                <p class="subtitle" style="margin: 2rem auto; font-size: 1.2rem;">
                    Une enclave de luxe au cœur d'Abidjan. Vivez l'expérience Kilimandjaro, où l'exclusivité rencontre l'hospitalité légendaire africaine.
                </p>
                <div style="margin-top: 4rem; display: flex; gap: 2rem; justify-content: center;">
                    <a href="{{ url('/chambres') }}" class="btn btn-primary">Réserver un Séjour</a>
                    <a href="{{ url('/restaurant') }}" class="btn btn-outline">La Carte Gastronomique</a>
                </div>
            </div>
        </div>
        
        <!-- Scroll indicator -->
        <div class="reveal-up" style="position: absolute; bottom: 3rem; left: 50%; transform: translateX(-50%); animation-delay: 1s; display: flex; flex-direction: column; align-items: center; gap: 1rem;">
            <span style="font-size: 0.6rem; text-transform: uppercase; letter-spacing: 0.2em; color: var(--text-secondary);">Découvrir</span>
            <div style="width: 1px; height: 40px; background: linear-gradient(to bottom, var(--accent-gold), transparent);"></div>
        </div>
    </section>

    <!-- The VIP Philosophy Section -->
    <section style="padding: 12rem 0; background-color: var(--bg-dark);">
        <div class="container">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 8rem; align-items: center;">
                <div class="reveal-up" style="position: relative;">
                    <!-- Golden geometric frame -->
                    <div style="position: absolute; top: -3rem; left: -3rem; width: 60%; height: 60%; border: 1px solid var(--accent-gold-dim); z-index: 0;"></div>
                    <img src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?q=80&w=1000&auto=format&fit=crop" alt="Luxe Interior" style="width: 100%; aspect-ratio: 3/4; object-fit: cover; position: relative; z-index: 1; filter: grayscale(10%) contrast(1.1);">
                </div>
                
                <div class="reveal-up" style="animation-delay: 0.3s;">
                    <span style="display: block; font-family: var(--font-body); text-transform: uppercase; letter-spacing: 0.2em; color: var(--text-secondary); margin-bottom: 1.5rem; font-size: 0.75rem;">
                        Le Cercle
                    </span>
                    <h2 class="section-title" style="margin-bottom: 2rem; line-height: 1.1;">L'Art de <br>Recevoir.</h2>
                    <p style="color: var(--text-secondary); margin-bottom: 1.5rem; font-size: 1.15rem; font-weight: 300;">
                        Chaque détail de notre établissement a été pensé pour une clientèle exigeante. Des suites panoramiques aux saveurs pointues de notre chef, nous ne laissons absolument rien au hasard.
                    </p>
                    <p style="color: var(--text-secondary); margin-bottom: 3rem; font-size: 1.15rem; font-weight: 300;">
                        Devenez membre d'un cercle très fermé où votre confort, votre discrétion et votre satisfaction sont nos seules préoccupations.
                    </p>
                    <a href="{{ url('/chambres') }}" style="color: var(--text-primary); text-transform: uppercase; letter-spacing: 0.15em; text-decoration: none; border-bottom: 1px solid var(--accent-gold); padding-bottom: 0.5rem; font-size: 0.8rem; display: inline-block; transition: color 0.3s ease;">
                        Découvrir nos suites exclusives
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Minimalist Room Teaser -->
    <section style="padding: 8rem 0; background-color: var(--bg-surface);">
        <div class="container">
            <div style="text-align: center; margin-bottom: 6rem;" class="reveal-up">
                <h2 class="section-title" style="margin-bottom: 1rem;">Sanctuaires Privés</h2>
                <p class="subtitle" style="margin: 0 auto;">Un refuge absolu surplombant la ville.</p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem;">
                @foreach($featuredRoomTypes as $index => $type)
                <div class="reveal-up" style="animation-delay: {{ 0.2 * $index }}s;">
                    <a href="{{ url('/chambres') }}" style="text-decoration: none; display: block;">
                        <div style="overflow: hidden; aspect-ratio: 3/4; margin-bottom: 1.5rem; position: relative;">
                            <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(10,10,10,0.8), transparent); z-index: 1;"></div>
                            <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?q=80&w=800&auto=format&fit=crop" alt="{{ $type->name }}" style="width: 100%; height: 100%; object-fit: cover; filter: grayscale(40%); transition: transform 1s ease;">
                            <div style="position: absolute; bottom: 1.5rem; left: 1.5rem; z-index: 2;">
                                <h3 style="font-size: 1.5rem; color: #fff; margin-bottom: 0.25rem; font-family: var(--font-display);">{{ $type->name }}</h3>
                                <p style="color: var(--accent-gold); font-family: var(--font-body); font-size: 0.9rem; letter-spacing: 0.1em;">À partir de {{ number_format($type->base_price, 0, ',', ' ') }} FCFA / nuit</p>
                                <p style="color: var(--text-secondary); font-size: 0.75rem; margin-top: 0.5rem; text-transform: uppercase;">Jusqu'à {{ $type->capacity }} pers.</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            
            <div style="text-align: center; margin-top: 4rem;" class="reveal-up">
                <a href="{{ url('/chambres') }}" class="btn btn-outline">Toutes nos suites</a>
            </div>
        </div>
    </section>
</x-layouts.app>

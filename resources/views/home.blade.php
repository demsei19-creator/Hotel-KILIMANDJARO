<x-layouts.app>
    <x-slot:title>Hôtel Kilimandjaro | L'art de vivre</x-slot>

    <!-- HERO SECTION (Cinematic, full height) -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden bg-luxury-black">
        <!-- Background Image with parallax/slow zoom effect -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/hero.jpg') }}" 
                 alt="Vue de l'Hôtel Kilimandjaro" 
                 class="w-full h-full object-cover animate-slow-zoom brightness-75">
            <!-- Gradient overlay for better text readability -->
            <div class="absolute inset-0 bg-gradient-to-t from-luxury-black via-luxury-black/40 to-transparent"></div>
        </div>
        
        <!-- Overlay Grain (Texture) -->
        <div class="absolute inset-0 z-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0IiBoZWlnaHQ9IjQiPgo8cmVjdCB3aWR0aD0iNCIgaGVpZ2h0PSI0IiBmaWxsPSIjZmZmIiBmaWxsLW9wYWNpdHk9IjAuMDUiLz4KPC9zdmc+')] opacity-30 mix-blend-overlay pointer-events-none"></div>

        <div class="relative z-10 text-center px-4 animate-fade-in-up">
            <p class="font-sans text-luxury-gold tracking-[0.3em] uppercase text-xs md:text-sm mb-6">Terre d'Éburnie, Côte d'Ivoire</p>
            <h1 class="font-serif text-5xl md:text-8xl text-white mb-8 leading-tight">
                Le Sommet <br> <span class="italic text-luxury-gold-dark font-light">de l'Élégance</span>
            </h1>
            <a href="{{ url('/chambres') }}" class="inline-block border border-white/30 text-white hover:bg-white hover:text-luxury-black px-10 py-4 font-sans tracking-[0.2em] uppercase text-sm transition-all duration-500 backdrop-blur-sm">
                Vivre l'Akwaba
            </a>
        </div>
        
        <!-- Scroll indicator -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-10 flex flex-col items-center gap-4 opacity-70">
            <span class="font-sans text-[10px] tracking-widest text-white uppercase rotate-90 origin-left translate-x-2">Défilez</span>
            <div class="w-[1px] h-16 bg-white/30 overflow-hidden relative">
                <div class="absolute top-0 left-0 w-full h-1/2 bg-white animate-[slide-down_2s_ease-in-out_infinite]"></div>
            </div>
        </div>
    </section>

    <!-- SECTION 2: Philosophy (Editorial Layout) -->
    <section class="py-32 px-6 md:px-12 bg-luxury-white overflow-hidden">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-16 items-center">
                <!-- Text block -->
                <div class="md:col-span-5 md:col-start-2" 
                     x-data="{ shown: false }" x-intersect.once="shown = true">
                    <h2 class="font-serif text-4xl md:text-6xl mb-8 leading-tight text-luxury-black transition-all duration-1000 ease-out"
                        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
                        L'art du détail,<br>
                        <span class="text-luxury-gray">redéfini.</span>
                    </h2>
                    <p class="font-sans text-luxury-gray leading-relaxed mb-8 text-sm md:text-base max-w-md transition-all duration-1000 delay-300 ease-out"
                       :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
                        Chaque espace est pensé comme une toile vierge où la lumière naturelle sculpte les matières nobles. Loin de l'agitation, plongez dans un sanctuaire conçu pour apaiser l'esprit et éveiller les sens.
                    </p>
                    <div class="transition-all duration-1000 delay-500 ease-out"
                         :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
                        <a href="{{ url('/restaurant') }}" class="group inline-flex items-center gap-4 font-sans text-xs tracking-widest uppercase text-luxury-black font-semibold">
                            <span>Découvrir notre Maquis de Luxe</span>
                            <div class="h-[1px] w-12 bg-luxury-black transition-all duration-500 group-hover:w-24"></div>
                        </a>
                    </div>
                </div>
                
                <!-- Image block (Asymmetrical) -->
                <div class="md:col-span-4 md:col-start-8 relative"
                     x-data="{ shown: false }" x-intersect.once="shown = true">
                    <div class="aspect-[3/4] overflow-hidden transition-all duration-1000 delay-200 ease-out"
                         :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-95'">
                        <img src="{{ asset('images/philosophy.jpg') }}" 
                             alt="Détail architectural" loading="lazy"
                             class="w-full h-full object-cover hover:scale-105 transition-transform duration-[2s]">
                    </div>
                    <!-- Overlapping element for depth -->
                    <div class="absolute -bottom-10 -left-16 w-32 h-32 bg-luxury-black flex items-center justify-center p-6 shadow-2xl hidden md:flex transition-all duration-1000 delay-700 ease-out"
                         :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                        <span class="font-serif text-luxury-gold text-4xl">K</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 3: The Rooms (Minimalist Showcase) -->
    <section class="py-32 bg-luxury-black text-white overflow-hidden">
        <div class="container mx-auto px-6 md:px-12">
            <div class="flex flex-col md:flex-row justify-between items-end mb-20 gap-8"
                 x-data="{ shown: false }" x-intersect.once="shown = true">
                <div class="transition-all duration-1000 ease-out"
                     :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
                    <span class="font-sans text-luxury-gold tracking-[0.2em] uppercase text-xs mb-4 block">Séjour</span>
                    <h2 class="font-serif text-4xl md:text-6xl">Vos quartiers <br>privés</h2>
                </div>
                <div class="transition-all duration-1000 delay-300 ease-out"
                     :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                    <a href="{{ url('/chambres') }}" class="font-sans text-xs tracking-widest uppercase border-b border-luxury-gray hover:border-white pb-1 transition-colors">
                        Voir toutes les suites
                    </a>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-24">
                <!-- Room 1 -->
                <a href="#" class="group block cursor-pointer"
                   x-data="{ shown: false }" x-intersect.once="shown = true">
                    <div class="aspect-[4/3] overflow-hidden mb-6 transition-all duration-1000 ease-out"
                         :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
                        <img src="{{ asset('images/room1.jpg') }}" 
                             alt="Suite Signature" loading="lazy"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-[2s]">
                    </div>
                    <div class="flex justify-between items-baseline transition-all duration-1000 delay-200 ease-out"
                         :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'">
                        <h3 class="font-serif text-3xl mb-2">Suite Signature</h3>
                        <span class="font-sans text-sm text-luxury-gray">À partir de 150 000 FCFA</span>
                    </div>
                    <p class="font-sans text-luxury-gray text-sm max-w-sm transition-all duration-1000 delay-400 ease-out"
                       :class="shown ? 'opacity-100' : 'opacity-0'">65m² d'élégance pure, vue panoramique sur la belle lagune Ébrié.</p>
                </a>
                
                <!-- Room 2 (Offset to break grid) -->
                <a href="#" class="group block cursor-pointer md:mt-32"
                   x-data="{ shown: false }" x-intersect.once="shown = true">
                    <div class="aspect-[4/3] overflow-hidden mb-6 transition-all duration-1000 delay-300 ease-out"
                         :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
                        <img src="{{ asset('images/room2.jpg') }}" 
                             alt="Chambre Supérieure" loading="lazy"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-[2s]">
                    </div>
                    <div class="flex justify-between items-baseline transition-all duration-1000 delay-500 ease-out"
                         :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'">
                        <h3 class="font-serif text-3xl mb-2">Chambre Supérieure</h3>
                        <span class="font-sans text-sm text-luxury-gray">À partir de 95 000 FCFA</span>
                    </div>
                    <p class="font-sans text-luxury-gray text-sm max-w-sm transition-all duration-1000 delay-700 ease-out"
                       :class="shown ? 'opacity-100' : 'opacity-0'">Confort intimiste et hospitalité chaleureuse pour un enjaillement absolu.</p>
                </a>
            </div>
        </div>
    </section>

    <!-- Custom inline style for specific animations -->
    <style>
        @keyframes slide-down {
            0% { transform: translateY(-100%); }
            100% { transform: translateY(200%); }
        }
    </style>
</x-layouts.app>

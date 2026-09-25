<x-layouts.app>
    <x-slot:title>Réserver {{ $roomType->name }} | Hôtel Kilimandjaro</x-slot>

    <!-- Page Container -->
    <div class="bg-luxury-white min-h-screen pt-32 pb-24">
        <div class="container mx-auto px-6 md:px-12">
            
            <div class="flex flex-col lg:flex-row gap-16 lg:gap-24 relative items-start">
                
                <!-- Left Side: Visuals & Details (Sticky on Desktop) -->
                <div class="w-full lg:w-5/12 lg:sticky top-32">
                    
                    <a href="{{ url('/chambres') }}" class="inline-flex items-center gap-4 font-sans text-xs tracking-widest uppercase text-luxury-gray hover:text-luxury-black mb-12 transition-colors">
                        <div class="h-[1px] w-8 bg-luxury-gray"></div>
                        Retour
                    </a>

                    <div class="aspect-[4/5] overflow-hidden mb-10 shadow-2xl relative" x-data="{ shown: false }" x-intersect.once="shown = true">
                        <!-- Image -->
                        <img src="{{ asset('images/room' . ($roomType->id % 2 == 0 ? '2' : '1') . '.jpg') }}" 
                             alt="{{ $roomType->name }}" 
                             class="w-full h-full object-cover transition-transform duration-[2s] ease-out group-hover:scale-105"
                             :class="shown ? 'scale-100 opacity-100' : 'scale-110 opacity-0'">
                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-luxury-black/80 via-luxury-black/20 to-transparent transition-opacity duration-1000 delay-300"
                             :class="shown ? 'opacity-100' : 'opacity-0'"></div>
                        <div class="absolute bottom-6 left-6 text-white transition-all duration-1000 delay-500"
                             :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                            <span class="font-sans text-luxury-gold tracking-widest text-xs uppercase block mb-2">Signature</span>
                            <h1 class="font-serif text-4xl">{{ $roomType->name }}</h1>
                        </div>
                    </div>

                    <div class="flex flex-col gap-8">
                        <p class="font-sans text-luxury-gray leading-relaxed text-sm md:text-base">
                            {{ $roomType->description ?? 'Plongez dans un confort absolu. L\'harmonie des tons neutres et des textures nobles crée une atmosphère de sérénité totale.' }}
                        </p>
                        
                        <div class="grid grid-cols-2 gap-4 border-t border-b border-luxury-gray-light py-6 font-sans text-xs tracking-widest uppercase text-luxury-black">
                            <div class="flex flex-col gap-1">
                                <span class="text-luxury-gray">Capacité</span>
                                <span>{{ $roomType->capacity }} Personnes</span>
                            </div>
                            <div class="flex flex-col gap-1">
                                <span class="text-luxury-gray">Vue</span>
                                <span>Lagune & Jardins</span>
                            </div>
                            <div class="flex flex-col gap-1 mt-4">
                                <span class="text-luxury-gray">Superficie</span>
                                <span>65 m²</span>
                            </div>
                            <div class="flex flex-col gap-1 mt-4">
                                <span class="text-luxury-gray">Service</span>
                                <span>Majordome 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Detailed Info & Booking Button -->
                <div class="w-full lg:w-7/12 lg:pt-12" x-data="{ shown: false }" x-intersect.once="shown = true">
                    
                    <div class="mb-12 transition-all duration-1000 delay-300"
                         :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-8'">
                        <h2 class="font-serif text-3xl md:text-5xl text-luxury-black mb-6">À propos de cette <br><span class="italic text-luxury-gold-dark">Chambre</span></h2>
                        <div class="w-16 h-[1px] bg-luxury-gold mb-8"></div>
                        
                        <div class="prose prose-luxury max-w-none font-sans text-luxury-gray text-sm md:text-base leading-relaxed mb-10">
                            <p class="mb-6">
                                Évadez-vous dans un cocon d'élégance où chaque détail a été pensé pour votre confort. 
                                La chambre {{ $roomType->name }} offre un espace généreux baigné de lumière naturelle, 
                                mettant en valeur un design contemporain subtilement teinté d'influences locales.
                            </p>
                            <p>
                                Profitez d'une literie haut de gamme, d'un coin salon intimiste et d'une salle de bain luxueuse 
                                dotée d'une douche à l'italienne et de produits d'accueil exclusifs. 
                                Votre séjour dans notre établissement promet d'être inoubliable.
                            </p>
                        </div>
                        
                        <div class="bg-luxury-black text-white p-8 mb-10">
                            <h3 class="font-sans text-xs tracking-widest uppercase mb-4 text-luxury-gold">Commodités incluses</h3>
                            <ul class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8 font-sans text-sm">
                                <li class="flex items-center gap-3">
                                    <div class="w-1.5 h-1.5 bg-luxury-gold rounded-full"></div>
                                    Petit-déjeuner continental
                                </li>
                                <li class="flex items-center gap-3">
                                    <div class="w-1.5 h-1.5 bg-luxury-gold rounded-full"></div>
                                    Accès au Spa & Piscine
                                </li>
                                <li class="flex items-center gap-3">
                                    <div class="w-1.5 h-1.5 bg-luxury-gold rounded-full"></div>
                                    Wi-Fi Haut Débit
                                </li>
                                <li class="flex items-center gap-3">
                                    <div class="w-1.5 h-1.5 bg-luxury-gold rounded-full"></div>
                                    Climatisation individuelle
                                </li>
                                <li class="flex items-center gap-3">
                                    <div class="w-1.5 h-1.5 bg-luxury-gold rounded-full"></div>
                                    Coffre-fort électronique
                                </li>
                                <li class="flex items-center gap-3">
                                    <div class="w-1.5 h-1.5 bg-luxury-gold rounded-full"></div>
                                    Minibar offert
                                </li>
                            </ul>
                        </div>
                        
                        <div class="font-serif text-2xl text-luxury-black mb-8">
                            À partir de {{ number_format($roomType->base_price, 0, ',', ' ') }} <span class="font-sans text-xs tracking-widest uppercase text-luxury-gray">FCFA / nuit</span>
                        </div>
                        
                        <a href="{{ route('rooms.reservation', $roomType->id) }}" class="group relative inline-flex items-center justify-center bg-luxury-black text-luxury-white px-12 py-5 overflow-hidden w-full md:w-auto">
                            <span class="absolute inset-0 w-full h-full -mt-1 rounded-lg opacity-30 bg-gradient-to-b from-transparent via-transparent to-black"></span>
                            <span class="relative font-sans tracking-[0.2em] uppercase text-xs z-10">Réserver cette chambre</span>
                            <div class="absolute inset-0 h-full w-0 bg-luxury-gold transition-all duration-500 ease-out group-hover:w-full z-[1]"></div>
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-layouts.app>

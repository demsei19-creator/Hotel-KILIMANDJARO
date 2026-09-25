<x-layouts.app>
    <x-slot:title>Réservation {{ $roomType->name }} | Hôtel Kilimandjaro</x-slot>

    <!-- Hero Section -->
    <section class="relative h-[40vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 w-full h-full">
            <img src="{{ asset('images/room' . ($roomType->id % 2 == 0 ? '2' : '1') . '.jpg') }}" 
                 alt="{{ $roomType->name }}" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-luxury-black/90 via-luxury-black/40 to-transparent"></div>
        </div>
        
        <div class="relative z-10 text-center text-white px-4 pt-10" x-data="{ shown: false }" x-intersect.once="shown = true">
            <h1 class="font-serif text-4xl md:text-5xl mb-4 transition-all duration-1000 ease-out"
                :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">Réserver {{ $roomType->name }}</h1>
            <p class="font-sans text-sm md:text-base text-luxury-gray-light max-w-2xl mx-auto transition-all duration-1000 delay-300 ease-out"
               :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                Votre expérience mémorable commence ici
            </p>
        </div>
    </section>

    <!-- Page Container -->
    <div class="bg-luxury-white pb-24 pt-16">
        <div class="container mx-auto px-6 md:px-12">
            
            <div class="max-w-4xl mx-auto bg-white p-10 md:p-16 shadow-2xl border border-gray-100" x-data="{ shown: false }" x-intersect.once="shown = true">
                
                <a href="{{ route('rooms.show', $roomType->id) }}" class="inline-flex items-center gap-4 font-sans text-xs tracking-widest uppercase text-luxury-gray hover:text-luxury-black mb-12 transition-colors">
                    <div class="h-[1px] w-8 bg-luxury-gray"></div>
                    Retour à la chambre
                </a>

                <div class="mb-12 transition-all duration-1000 delay-300 text-center"
                     :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-8'">
                    <h2 class="font-serif text-3xl md:text-4xl text-luxury-black mb-4">Confirmer votre Réservation</h2>
                    <div class="w-16 h-[1px] bg-luxury-gold mx-auto mb-6"></div>
                    <div class="font-serif text-2xl text-luxury-gray">
                        Tarif : {{ number_format($roomType->base_price, 0, ',', ' ') }} <span class="font-sans text-xs tracking-widest uppercase">FCFA / nuit</span>
                    </div>
                </div>

                @if(session('error'))
                    <div class="bg-red-50 border border-red-200 text-red-600 px-6 py-4 font-sans text-sm mb-10 text-center">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Booking Form -->
                <form action="{{ route('rooms.book', $roomType->id) }}" method="POST" class="flex flex-col gap-10 transition-all duration-1000 delay-500"
                      :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        <!-- Input: Name -->
                        <div class="relative group">
                            <input type="text" id="name" name="name" required value="{{ old('name') }}"
                                   class="w-full bg-transparent border-0 border-b border-luxury-gray-light py-3 px-0 text-luxury-black font-sans text-sm focus:ring-0 focus:border-luxury-gold transition-colors peer placeholder-transparent" placeholder="Nom complet">
                            <label for="name" class="absolute left-0 top-3 text-luxury-gray font-sans text-xs tracking-widest uppercase transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:top-3 peer-placeholder-shown:normal-case peer-focus:-top-4 peer-focus:text-xs peer-focus:text-luxury-gold peer-focus:uppercase peer-focus:tracking-widest peer-valid:-top-4 peer-valid:text-xs peer-valid:uppercase peer-valid:tracking-widest">Nom Complet</label>
                        </div>

                        <!-- Input: Email -->
                        <div class="relative group">
                            <input type="email" id="email" name="email" required value="{{ old('email') }}"
                                   class="w-full bg-transparent border-0 border-b border-luxury-gray-light py-3 px-0 text-luxury-black font-sans text-sm focus:ring-0 focus:border-luxury-gold transition-colors peer placeholder-transparent" placeholder="Adresse Email">
                            <label for="email" class="absolute left-0 top-3 text-luxury-gray font-sans text-xs tracking-widest uppercase transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:top-3 peer-placeholder-shown:normal-case peer-focus:-top-4 peer-focus:text-xs peer-focus:text-luxury-gold peer-focus:uppercase peer-focus:tracking-widest peer-valid:-top-4 peer-valid:text-xs peer-valid:uppercase peer-valid:tracking-widest">Adresse Email</label>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-4">
                        <!-- Input: Check-in -->
                        <div class="relative group flex flex-col">
                            <label for="check_in" class="text-luxury-gray font-sans text-xs tracking-widest uppercase mb-2">Arrivée</label>
                            <input type="date" id="check_in" name="check_in" required value="{{ old('check_in') }}"
                                   class="w-full bg-transparent border-0 border-b border-luxury-gray-light py-3 px-0 text-luxury-black font-sans text-sm focus:ring-0 focus:border-luxury-gold transition-colors">
                        </div>

                        <!-- Input: Check-out -->
                        <div class="relative group flex flex-col">
                            <label for="check_out" class="text-luxury-gray font-sans text-xs tracking-widest uppercase mb-2">Départ</label>
                            <input type="date" id="check_out" name="check_out" required value="{{ old('check_out') }}"
                                   class="w-full bg-transparent border-0 border-b border-luxury-gray-light py-3 px-0 text-luxury-black font-sans text-sm focus:ring-0 focus:border-luxury-gold transition-colors">
                        </div>
                    </div>
                    
                    <div class="mt-8 flex flex-col items-center text-center gap-6">
                        <p class="font-sans text-xs text-luxury-gray max-w-md leading-relaxed">
                            En procédant, vous serez redirigé vers notre interface sécurisée CinetPay pour valider votre séjour (Mobile Money ou Carte Bancaire).
                        </p>
                        
                        <button type="submit" class="group relative inline-flex items-center justify-center bg-luxury-black text-luxury-white px-12 py-5 overflow-hidden w-full md:w-auto">
                            <span class="absolute inset-0 w-full h-full -mt-1 rounded-lg opacity-30 bg-gradient-to-b from-transparent via-transparent to-black"></span>
                            <span class="relative font-sans tracking-[0.2em] uppercase text-xs z-10">Valider & Payer</span>
                            <!-- Hover effect background -->
                            <div class="absolute inset-0 h-full w-0 bg-luxury-gold transition-all duration-500 ease-out group-hover:w-full z-[1]"></div>
                        </button>
                    </div>
                </form>

            </div>
            
        </div>
    </div>
</x-layouts.app>

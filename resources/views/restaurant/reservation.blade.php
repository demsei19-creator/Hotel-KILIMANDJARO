<x-layouts.app>
    <!-- Hero Section -->
    <section class="relative h-[40vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 w-full h-full">
            <img src="https://images.unsplash.com/photo-1550966871-3ed3cdb5ed0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" 
                 alt="Le Restaurant Kilimandjaro" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-luxury-black/90 via-luxury-black/40 to-transparent"></div>
        </div>
        
        <div class="relative z-10 text-center text-white px-4 pt-10" x-data="{ shown: false }" x-intersect.once="shown = true">
            <h1 class="font-serif text-4xl md:text-5xl mb-4 transition-all duration-1000 ease-out"
                :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">Réserver une Table</h1>
            <p class="font-sans text-sm md:text-base text-luxury-gray-light max-w-2xl mx-auto transition-all duration-1000 delay-300 ease-out"
               :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                Votre expérience gastronomique au Kilimandjaro
            </p>
        </div>
    </section>

    <!-- Reservation Form Section -->
    <section id="reservation" class="py-24 bg-white relative overflow-hidden">
        <div class="container mx-auto px-6 md:px-12 relative z-10">
            <div class="max-w-4xl mx-auto">
                
                @if(session('success'))
                    <div class="mb-12 p-8 bg-luxury-black text-white text-center font-sans tracking-wide">
                        <span class="text-luxury-gold block mb-2"><svg class="w-8 h-8 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"></path></svg></span>
                        {{ session('success') }}
                    </div>
                @endif

                <div class="bg-white p-10 md:p-16 shadow-2xl border border-gray-100" x-data="{ shown: false }" x-intersect.once="shown = true">
                    <div class="text-center mb-12 transition-all duration-1000 ease-out" :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                        <h2 class="font-serif text-4xl mb-4 text-luxury-black">Réserver une Table</h2>
                        <div class="w-16 h-[1px] bg-luxury-gold mx-auto mb-6"></div>
                        <p class="font-sans text-luxury-gray text-sm">Le restaurant est ouvert tous les jours de 12h00 à 14h30 et de 19h00 à 22h30.</p>
                    </div>

                    <form action="{{ url('/restaurant/book') }}" method="POST" class="space-y-8 transition-all duration-1000 delay-300 ease-out" :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Name -->
                            <div class="space-y-2">
                                <label for="customer_name" class="font-sans text-xs tracking-widest uppercase text-luxury-gray block">Nom complet *</label>
                                <input type="text" name="customer_name" id="customer_name" required
                                       class="w-full bg-transparent border-b border-gray-300 py-3 text-luxury-black font-sans focus:outline-none focus:border-luxury-gold transition-colors @error('customer_name') border-red-500 @enderror"
                                       value="{{ old('customer_name') }}">
                                @error('customer_name')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="space-y-2">
                                <label for="customer_email" class="font-sans text-xs tracking-widest uppercase text-luxury-gray block">Email *</label>
                                <input type="email" name="customer_email" id="customer_email" required
                                       class="w-full bg-transparent border-b border-gray-300 py-3 text-luxury-black font-sans focus:outline-none focus:border-luxury-gold transition-colors @error('customer_email') border-red-500 @enderror"
                                       value="{{ old('customer_email') }}">
                                @error('customer_email')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Phone -->
                            <div class="space-y-2">
                                <label for="customer_phone" class="font-sans text-xs tracking-widest uppercase text-luxury-gray block">Téléphone</label>
                                <input type="tel" name="customer_phone" id="customer_phone"
                                       class="w-full bg-transparent border-b border-gray-300 py-3 text-luxury-black font-sans focus:outline-none focus:border-luxury-gold transition-colors @error('customer_phone') border-red-500 @enderror"
                                       value="{{ old('customer_phone') }}">
                                @error('customer_phone')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Guests -->
                            <div class="space-y-2">
                                <label for="guests" class="font-sans text-xs tracking-widest uppercase text-luxury-gray block">Nombre de convives *</label>
                                <select name="guests" id="guests" required
                                        class="w-full bg-transparent border-b border-gray-300 py-3 text-luxury-black font-sans focus:outline-none focus:border-luxury-gold transition-colors appearance-none @error('guests') border-red-500 @enderror">
                                    <option value="" disabled selected>Sélectionner...</option>
                                    @for($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i }}" {{ old('guests') == $i ? 'selected' : '' }}>{{ $i }} {{ $i == 1 ? 'personne' : 'personnes' }}</option>
                                    @endfor
                                    <option value="11" {{ old('guests') == '11' ? 'selected' : '' }}>Plus de 10 (Nous contacter)</option>
                                </select>
                                @error('guests')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Date -->
                            <div class="space-y-2">
                                <label for="reservation_date" class="font-sans text-xs tracking-widest uppercase text-luxury-gray block">Date *</label>
                                <input type="date" name="reservation_date" id="reservation_date" required
                                       min="{{ date('Y-m-d') }}"
                                       class="w-full bg-transparent border-b border-gray-300 py-3 text-luxury-black font-sans focus:outline-none focus:border-luxury-gold transition-colors @error('reservation_date') border-red-500 @enderror"
                                       value="{{ old('reservation_date') }}">
                                @error('reservation_date')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Time -->
                            <div class="space-y-2">
                                <label for="reservation_time" class="font-sans text-xs tracking-widest uppercase text-luxury-gray block">Heure *</label>
                                <input type="time" name="reservation_time" id="reservation_time" required
                                       class="w-full bg-transparent border-b border-gray-300 py-3 text-luxury-black font-sans focus:outline-none focus:border-luxury-gold transition-colors @error('reservation_time') border-red-500 @enderror"
                                       value="{{ old('reservation_time') }}">
                                @error('reservation_time')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="pt-8 text-center">
                            <button type="submit" class="bg-luxury-black text-white px-12 py-4 font-sans text-sm tracking-widest uppercase hover:bg-luxury-gold transition-colors duration-500 w-full md:w-auto">
                                Confirmer la Réservation
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>

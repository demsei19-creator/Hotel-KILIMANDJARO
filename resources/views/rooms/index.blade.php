<x-layouts.app>
    <x-slot:title>Nos Suites & Chambres | Hôtel Kilimandjaro</x-slot>

    <!-- Header Section -->
    <section class="pt-40 pb-20 px-6 md:px-12 bg-luxury-white text-center">
        <div class="container mx-auto max-w-4xl animate-fade-in-up">
            <span class="font-sans text-luxury-gold-dark font-medium tracking-[0.3em] uppercase text-xs mb-6 block">Hébergement</span>
            <h1 class="font-serif text-5xl md:text-7xl text-luxury-black mb-8">Refuges d'exception</h1>
            <p class="font-sans text-luxury-gray text-sm md:text-base leading-relaxed max-w-2xl mx-auto">
                Découvrez nos cocons conçus pour l'évasion. Chaque détail, des matières brutes aux lumières douces, a été pensé pour vous offrir un doux enjaillement au cœur de Babi.
            </p>
        </div>
    </section>

    <!-- Rooms List Section -->
    <section class="pb-32 bg-luxury-white">
        <div class="container mx-auto px-6 md:px-12">
            
            @if($roomTypes->isEmpty())
                <div class="text-center py-24 border border-luxury-gray-light">
                    <p class="font-serif text-2xl text-luxury-gray">Nos chambres sont en cours de préparation.</p>
                </div>
            @else
                <div class="flex flex-col gap-24 md:gap-40 mt-12">
                    @foreach($roomTypes as $type)
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-12 items-center group overflow-hidden"
                             x-data="{ shown: false }" x-intersect.once="shown = true">
                            
                            <!-- Image Block -->
                            <div class="md:col-span-7 {{ $loop->even ? 'md:order-2' : '' }} relative transition-all duration-1000 ease-out"
                                 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
                                <a href="{{ url('/chambres/' . $type->id) }}" class="block overflow-hidden aspect-[4/3] md:aspect-[16/10]">
                                    <!-- Using local images for demo -->
                                    <img src="{{ asset('images/room' . ($loop->index % 2 == 0 ? '1' : '2') . '.jpg') }}" 
                                         alt="{{ $type->name }}" loading="lazy"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-[2s] ease-out">
                                </a>
                                <!-- Decorative element -->
                                <div class="absolute -bottom-6 {{ $loop->even ? '-right-6' : '-left-6' }} w-24 h-24 bg-luxury-black hidden md:flex items-center justify-center shadow-xl transition-all duration-1000 delay-500 ease-out"
                                     :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                                    <span class="font-serif text-luxury-gold text-2xl">0{{ $loop->iteration }}</span>
                                </div>
                            </div>
                            
                            <!-- Content Block -->
                            <div class="md:col-span-4 {{ $loop->even ? 'md:order-1 md:col-start-2' : 'md:col-start-9' }}">
                                <h2 class="font-serif text-4xl md:text-5xl text-luxury-black mb-4 transition-all duration-1000 delay-200 ease-out"
                                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">{{ $type->name }}</h2>
                                
                                <div class="flex items-center gap-4 mb-6 font-sans text-xs tracking-widest text-luxury-gray uppercase transition-all duration-1000 delay-300 ease-out"
                                     :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                                    <span>Jusqu'à {{ $type->capacity }} pers.</span>
                                    <span class="w-1 h-1 bg-luxury-gold rounded-full"></span>
                                    <span>Vue Lagune Ébrié</span>
                                </div>
                                <p class="font-sans text-luxury-gray text-sm leading-relaxed mb-10 transition-all duration-1000 delay-400 ease-out"
                                   :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                                    {{ $type->description ?? 'Un espace généreux aux lignes pures, où chaque matériau a été sélectionné pour son authenticité. L\'expérience ultime de l\'hospitalité ivoirienne.' }}
                                </p>
                                
                                <div class="flex flex-col gap-6 transition-all duration-1000 delay-500 ease-out"
                                     :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                                    <div class="font-serif text-3xl text-luxury-black">
                                        {{ number_format($type->base_price, 0, ',', ' ') }} <span class="font-sans text-sm text-luxury-gray tracking-widest uppercase">FCFA / nuit</span>
                                    </div>
                                    
                                    <a href="{{ url('/chambres/' . $type->id) }}" class="inline-block border border-luxury-black text-luxury-black hover:bg-luxury-black hover:text-luxury-white active:scale-[0.98] active:opacity-90 px-8 py-4 font-sans tracking-[0.2em] uppercase text-xs text-center transition-all duration-300">
                                        Découvrir la suite
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                    @endforeach
                </div>
            @endif
            
        </div>
    </section>
</x-layouts.app>

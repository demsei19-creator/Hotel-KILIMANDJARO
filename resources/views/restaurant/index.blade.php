<x-layouts.app>
    <!-- Hero Section -->
    <section class="relative h-[70vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 w-full h-full">
            <img src="https://images.unsplash.com/photo-1550966871-3ed3cdb5ed0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" 
                 alt="Le Restaurant Kilimandjaro" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-luxury-black/90 via-luxury-black/40 to-transparent"></div>
        </div>
        
        <div class="relative z-10 text-center text-white px-4 pt-20" x-data="{ shown: false }" x-intersect.once="shown = true">
            <span class="font-sans text-luxury-gold tracking-[0.3em] uppercase text-sm mb-6 block transition-all duration-1000 ease-out"
                  :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">Le Maquis de Luxe</span>
            <h1 class="font-serif text-5xl md:text-7xl mb-6 transition-all duration-1000 delay-300 ease-out"
                :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">L'Éveil des Sens</h1>
            <p class="font-sans text-lg md:text-xl text-luxury-gray-light max-w-2xl mx-auto transition-all duration-1000 delay-500 ease-out"
               :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                Une expérience gastronomique où le doux enjaillement ivoirien rencontre l'excellence internationale.
            </p>
        </div>
    </section>

    <!-- Menu Showcase Section -->
    <section class="py-32 bg-luxury-white">
        <div class="container mx-auto px-6 md:px-12 max-w-6xl">
            <div class="text-center mb-20" x-data="{ shown: false }" x-intersect.once="shown = true">
                <span class="font-sans text-luxury-gold tracking-[0.3em] uppercase text-xs mb-4 block transition-all duration-1000 ease-out" :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">Notre Carte</span>
                <h2 class="font-serif text-4xl md:text-5xl text-luxury-black transition-all duration-1000 delay-300 ease-out" :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">L'Essence des Saveurs</h2>
                <div class="w-16 h-[1px] bg-luxury-gold mx-auto mt-8 transition-all duration-1000 delay-500 ease-out" :class="shown ? 'w-16' : 'w-0'"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-20 gap-y-16">
                <!-- Entrées -->
                <div x-data="{ shown: false }" x-intersect.once="shown = true" class="transition-all duration-1000 ease-out" :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                    <h3 class="font-serif text-3xl text-luxury-black border-b border-gray-200 pb-4 mb-8">Entrées</h3>
                    <ul class="space-y-6 font-sans text-sm text-luxury-gray">
                        <li class="flex justify-between items-baseline"><span class="tracking-wide">Salades composées (avocat-crevettes, César)</span></li>
                        <li class="flex justify-between items-baseline"><span class="tracking-wide">Alloco en accompagnement ou entrée</span></li>
                        <li class="flex justify-between items-baseline"><span class="tracking-wide">Soupe & velouté du chef</span></li>
                        <li class="flex justify-between items-baseline"><span class="tracking-wide">Attiéké aux poissons fumés ou grillés</span></li>
                    </ul>
                </div>

                <!-- Plats Ivoiriens -->
                <div x-data="{ shown: false }" x-intersect.once="shown = true" class="transition-all duration-1000 delay-200 ease-out" :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                    <h3 class="font-serif text-3xl text-luxury-black border-b border-gray-200 pb-4 mb-8">Plats Principaux Ivoiriens</h3>
                    <ul class="space-y-6 font-sans text-sm text-luxury-gray">
                        <li class="flex justify-between items-baseline"><span class="tracking-wide">Attiéké (poisson, poulet, viande grillée)</span></li>
                        <li class="flex justify-between items-baseline"><span class="tracking-wide">Kedjenou (poulet ou pintade mijoté)</span></li>
                        <li class="flex justify-between items-baseline"><span class="tracking-wide">L'Authentique Garba</span></li>
                        <li class="flex justify-between items-baseline"><span class="tracking-wide">Sauce graine, gombo, ou feuilles de manioc</span></li>
                        <li class="flex justify-between items-baseline"><span class="tracking-wide">Braisés (Poulet, Bar, Capitaine, Thiof)</span></li>
                        <li class="flex justify-between items-baseline"><span class="tracking-wide">Foutou banane/igname sauce claire</span></li>
                    </ul>
                </div>

                <!-- Plats Internationaux -->
                <div x-data="{ shown: false }" x-intersect.once="shown = true" class="transition-all duration-1000 ease-out" :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                    <h3 class="font-serif text-3xl text-luxury-black border-b border-gray-200 pb-4 mb-8">Classiques Internationaux</h3>
                    <ul class="space-y-6 font-sans text-sm text-luxury-gray">
                        <li class="flex justify-between items-baseline"><span class="tracking-wide">Grillades façon brasserie (bœuf, agneau)</span></li>
                        <li class="flex justify-between items-baseline"><span class="tracking-wide">Pâtes artisanales & Pizzas au feu de bois</span></li>
                        <li class="flex justify-between items-baseline"><span class="tracking-wide">Poissons nobles à l'occidentale</span></li>
                        <li class="flex justify-between items-baseline"><span class="tracking-wide">Créations végétariennes de saison</span></li>
                    </ul>
                </div>

                <!-- Desserts & Boissons -->
                <div class="space-y-16">
                    <div x-data="{ shown: false }" x-intersect.once="shown = true" class="transition-all duration-1000 delay-200 ease-out" :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                        <h3 class="font-serif text-3xl text-luxury-black border-b border-gray-200 pb-4 mb-8">Desserts</h3>
                        <ul class="space-y-6 font-sans text-sm text-luxury-gray">
                            <li class="flex justify-between items-baseline"><span class="tracking-wide">Salade de fruits tropicaux (mangue, ananas...)</span></li>
                            <li class="flex justify-between items-baseline"><span class="tracking-wide">Pâtisseries classiques (tarte, fondant)</span></li>
                        </ul>
                    </div>
                    
                    <div x-data="{ shown: false }" x-intersect.once="shown = true" class="transition-all duration-1000 delay-200 ease-out" :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                        <h3 class="font-serif text-3xl text-luxury-black border-b border-gray-200 pb-4 mb-8">Rafraîchissements</h3>
                        <ul class="space-y-6 font-sans text-sm text-luxury-gray">
                            <li class="flex justify-between items-baseline"><span class="tracking-wide">Jus locaux (bissap, gnamankoudji, djin-djin, fruits frais)</span></li>
                            <li class="flex justify-between items-baseline"><span class="tracking-wide">Bières locales (Ivoire, Bock "Drogba"), Vins & Cocktails</span></li>
                            <li class="flex justify-between items-baseline"><span class="tracking-wide">Eaux minérales, sodas, cafés & thés</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Petit-déjeuner Highlight -->
            <div class="mt-20 p-12 bg-white border border-gray-100 shadow-xl text-center" x-data="{ shown: false }" x-intersect.once="shown = true" class="transition-all duration-1000 ease-out" :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
                <h3 class="font-serif text-3xl text-luxury-black mb-6">Le Petit-Déjeuner</h3>
                <p class="font-sans text-luxury-gray max-w-2xl mx-auto mb-8 leading-relaxed">
                    Commencez votre journée en douceur avec notre sélection matinale variée, servie dans un cadre baigné de lumière.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left max-w-3xl mx-auto">
                    <div>
                        <h4 class="font-sans text-luxury-black tracking-widest uppercase text-xs mb-4">Le Continental</h4>
                        <p class="font-sans text-sm text-luxury-gray">Assortiment de viennoiseries fraîches, œufs préparés à votre convenance, fruits de saison, café de spécialité et thés raffinés.</p>
                    </div>
                    <div>
                        <h4 class="font-sans text-luxury-black tracking-widest uppercase text-xs mb-4">Les Saveurs Locales</h4>
                        <p class="font-sans text-sm text-luxury-gray">Découvrez nos spécialités matinales : bouillie de mil onctueuse, beignets chauds et thé revigorant au gingembre.</p>
                    </div>
                </div>
            </div>
            
            <!-- Reservation Jump button -->
            <div class="text-center mt-20" x-data="{ shown: false }" x-intersect.once="shown = true" :class="shown ? 'opacity-100' : 'opacity-0'" class="transition-opacity duration-1000 delay-500">
                <a href="{{ route('restaurant.reservation') }}" class="inline-block border border-luxury-black text-luxury-black hover:bg-luxury-black hover:text-white px-10 py-4 font-sans tracking-[0.2em] uppercase text-xs transition-colors duration-500">
                    Réserver votre table
                </a>
            </div>
        </div>
    </section>
</x-layouts.app>



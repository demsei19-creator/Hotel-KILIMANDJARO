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
                :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">L'&Eacute;veil des Sens</h1>
            <p class="font-sans text-lg md:text-xl text-luxury-gray-light max-w-2xl mx-auto transition-all duration-1000 delay-500 ease-out"
               :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                Une exp&eacute;rience gastronomique o&ugrave; le doux enjaillement ivoirien rencontre l'excellence internationale.
            </p>
        </div>
    </section>

    <!-- Menu Showcase Section -->
    <section class="py-32 bg-[#F9F8F6] relative">
        <div class="absolute inset-0 z-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0IiBoZWlnaHQ9IjQiPgo8cmVjdCB3aWR0aD0iNCIgaGVpZ2h0PSI0IiBmaWxsPSIjMDAwIiBmaWxsLW9wYWNpdHk9IjAuMDIiLz4KPC9zdmc+')] opacity-50 pointer-events-none"></div>

        <div class="container mx-auto px-6 md:px-12 max-w-5xl relative z-10">
            <div class="text-center mb-24" x-data="{ shown: false }" x-intersect.once="shown = true">
                <span class="font-sans text-luxury-gold tracking-[0.3em] uppercase text-xs mb-4 block transition-all duration-1000 ease-out" :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">Notre Carte</span>
                <h2 class="font-serif text-5xl md:text-6xl text-luxury-black transition-all duration-1000 delay-300 ease-out" :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">L'Essence des Saveurs</h2>
                <div class="flex justify-center items-center gap-4 mt-8 transition-all duration-1000 delay-500 ease-out" :class="shown ? 'opacity-100' : 'opacity-0'">
                    <div class="w-12 h-[1px] bg-luxury-gold/50"></div>
                    <span class="text-luxury-gold text-xl">&#10023;</span>
                    <div class="w-12 h-[1px] bg-luxury-gold/50"></div>
                </div>
            </div>

            <!-- The Menu (Printed Style) -->
            <div class="bg-white p-8 md:p-16 shadow-2xl border border-luxury-gold/20 relative mx-auto max-w-4xl">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-20 gap-y-16">
                    
                    <!-- Entrees -->
                    <div x-data="{ shown: false }" x-intersect.once="shown = true" class="text-center transition-all duration-1000 ease-out" :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                        <h3 class="font-serif text-2xl text-luxury-black mb-8 inline-block border-b border-luxury-gold/30 pb-2">Entr&eacute;es</h3>
                        <ul class="space-y-8 font-sans text-sm text-luxury-gray">
                            <li class="group">
                                <span class="block text-base text-luxury-black mb-1 group-hover:text-luxury-gold transition-colors">Salades compos&eacute;es</span>
                                <span class="block text-xs font-light italic">Avocat-crevettes, C&eacute;sar</span>
                            </li>
                            <li class="group">
                                <span class="block text-base text-luxury-black mb-1 group-hover:text-luxury-gold transition-colors">Alloco en accompagnement</span>
                                <span class="block text-xs font-light italic">Bananes plantains frites dor&eacute;es</span>
                            </li>
                            <li class="group">
                                <span class="block text-base text-luxury-black mb-1 group-hover:text-luxury-gold transition-colors">Soupe &amp; velout&eacute; du chef</span>
                                <span class="block text-xs font-light italic">Selon l'inspiration du march&eacute;</span>
                            </li>
                            <li class="group">
                                <span class="block text-base text-luxury-black mb-1 group-hover:text-luxury-gold transition-colors">Atti&eacute;k&eacute; aux poissons</span>
                                <span class="block text-xs font-light italic">Fum&eacute;s ou grill&eacute;s aux &eacute;pices douces</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Plats Ivoiriens -->
                    <div x-data="{ shown: false }" x-intersect.once="shown = true" class="text-center transition-all duration-1000 delay-200 ease-out" :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                        <h3 class="font-serif text-2xl text-luxury-black mb-8 inline-block border-b border-luxury-gold/30 pb-2">H&eacute;ritage Ivoirien</h3>
                        <ul class="space-y-8 font-sans text-sm text-luxury-gray">
                            <li class="group">
                                <span class="block text-base text-luxury-black mb-1 group-hover:text-luxury-gold transition-colors">L'Authentique Garba</span>
                                <span class="block text-xs font-light italic">Thon frit, atti&eacute;k&eacute; frais, piments doux</span>
                            </li>
                            <li class="group">
                                <span class="block text-base text-luxury-black mb-1 group-hover:text-luxury-gold transition-colors">Kedjenou de volaille</span>
                                <span class="block text-xs font-light italic">Poulet ou pintade mijot&eacute; &agrave; l'&eacute;touff&eacute;e</span>
                            </li>
                            <li class="group">
                                <span class="block text-base text-luxury-black mb-1 group-hover:text-luxury-gold transition-colors">Sauces Traditionnelles</span>
                                <span class="block text-xs font-light italic">Graine, gombo, ou feuilles de manioc</span>
                            </li>
                            <li class="group">
                                <span class="block text-base text-luxury-black mb-1 group-hover:text-luxury-gold transition-colors">Brais&eacute;s Signature</span>
                                <span class="block text-xs font-light italic">Poulet, Bar, Capitaine ou Thiof</span>
                            </li>
                            <li class="group">
                                <span class="block text-base text-luxury-black mb-1 group-hover:text-luxury-gold transition-colors">Foutou Sauce Claire</span>
                                <span class="block text-xs font-light italic">Banane ou igname pil&eacute;, bouillon parfum&eacute;</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Plats Internationaux -->
                    <div x-data="{ shown: false }" x-intersect.once="shown = true" class="text-center transition-all duration-1000 ease-out" :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                        <h3 class="font-serif text-2xl text-luxury-black mb-8 inline-block border-b border-luxury-gold/30 pb-2">Classiques Internationaux</h3>
                        <ul class="space-y-8 font-sans text-sm text-luxury-gray">
                            <li class="group">
                                <span class="block text-base text-luxury-black mb-1 group-hover:text-luxury-gold transition-colors">Grillades Brasserie</span>
                                <span class="block text-xs font-light italic">Pi&egrave;ces de b&oelig;uf s&eacute;lectionn&eacute;es, agneau</span>
                            </li>
                            <li class="group">
                                <span class="block text-base text-luxury-black mb-1 group-hover:text-luxury-gold transition-colors">P&acirc;tes Artisanales</span>
                                <span class="block text-xs font-light italic">Recettes italiennes authentiques</span>
                            </li>
                            <li class="group">
                                <span class="block text-base text-luxury-black mb-1 group-hover:text-luxury-gold transition-colors">Poissons Nobles</span>
                                <span class="block text-xs font-light italic">Pr&eacute;paration &agrave; l'occidentale, l&eacute;gumes glac&eacute;s</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Desserts & Boissons -->
                    <div class="space-y-16">
                        <div x-data="{ shown: false }" x-intersect.once="shown = true" class="text-center transition-all duration-1000 delay-200 ease-out" :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                            <h3 class="font-serif text-2xl text-luxury-black mb-8 inline-block border-b border-luxury-gold/30 pb-2">Douceurs</h3>
                            <ul class="space-y-8 font-sans text-sm text-luxury-gray">
                                <li class="group">
                                    <span class="block text-base text-luxury-black mb-1 group-hover:text-luxury-gold transition-colors">Salade de fruits tropicaux</span>
                                    <span class="block text-xs font-light italic">Mangue, ananas, papaye fra&icirc;che</span>
                                </li>
                                <li class="group">
                                    <span class="block text-base text-luxury-black mb-1 group-hover:text-luxury-gold transition-colors">P&acirc;tisseries Classiques</span>
                                    <span class="block text-xs font-light italic">Tarte fine, fondant au chocolat</span>
                                </li>
                            </ul>
                        </div>
                        
                        <div x-data="{ shown: false }" x-intersect.once="shown = true" class="text-center transition-all duration-1000 delay-200 ease-out" :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                            <h3 class="font-serif text-2xl text-luxury-black mb-8 inline-block border-b border-luxury-gold/30 pb-2">Cave &amp; Nectars</h3>
                            <ul class="space-y-8 font-sans text-sm text-luxury-gray">
                                <li class="group">
                                    <span class="block text-base text-luxury-black mb-1 group-hover:text-luxury-gold transition-colors">Jus Locaux Naturels</span>
                                    <span class="block text-xs font-light italic">Bissap, gnamankoudji, djin-djin</span>
                                </li>
                                <li class="group">
                                    <span class="block text-base text-luxury-black mb-1 group-hover:text-luxury-gold transition-colors">S&eacute;lection du Bar</span>
                                    <span class="block text-xs font-light italic">Bi&egrave;res locales (Ivoire, Bock), Vins fins</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Petit-dejeuner Highlight -->
            <div class="mt-32 p-12 bg-luxury-black text-center relative overflow-hidden group" x-data="{ shown: false }" x-intersect.once="shown = true" class="transition-all duration-1000 ease-out" :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
                <div class="absolute inset-0 opacity-10 bg-[url('https://images.unsplash.com/photo-1504754524776-8f4f37790ca0?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center group-hover:scale-105 transition-transform duration-[3s]"></div>
                
                <div class="relative z-10">
                    <span class="font-sans text-luxury-gold tracking-[0.3em] uppercase text-xs mb-4 block">Le Matin</span>
                    <h3 class="font-serif text-3xl md:text-4xl text-white mb-6">L'&Eacute;veil Ivoirien</h3>
                    <p class="font-sans text-luxury-gray-light max-w-2xl mx-auto mb-12 leading-relaxed font-light">
                        Commencez votre journ&eacute;e en douceur avec notre s&eacute;lection matinale vari&eacute;e, servie dans un cadre baign&eacute; de lumi&egrave;re naturelle.
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 text-center md:text-left max-w-4xl mx-auto border-t border-luxury-gold/20 pt-12">
                        <div>
                            <h4 class="font-sans text-white tracking-widest uppercase text-sm mb-4">Le Continental</h4>
                            <p class="font-sans text-sm text-luxury-gray-light font-light leading-relaxed">Assortiment de viennoiseries fra&icirc;ches, &oelig;ufs pr&eacute;par&eacute;s &agrave; votre convenance, fruits de saison, caf&eacute; de sp&eacute;cialit&eacute; et th&eacute;s raffin&eacute;s.</p>
                        </div>
                        <div>
                            <h4 class="font-sans text-white tracking-widest uppercase text-sm mb-4">Les Saveurs Locales</h4>
                            <p class="font-sans text-sm text-luxury-gray-light font-light leading-relaxed">D&eacute;couvrez nos sp&eacute;cialit&eacute;s matinales : bouillie de mil onctueuse, beignets chauds et th&eacute; revigorant au gingembre.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Reservation Jump button -->
            <div class="text-center mt-20" x-data="{ shown: false }" x-intersect.once="shown = true" :class="shown ? 'opacity-100' : 'opacity-0'" class="transition-opacity duration-1000 delay-500">
                <a href="{{ route('restaurant.reservation') }}" class="inline-block border border-luxury-black text-luxury-black hover:bg-luxury-black hover:text-white px-10 py-4 font-sans tracking-[0.2em] uppercase text-xs transition-colors duration-500">
                    R&eacute;server votre table
                </a>
            </div>
        </div>
    </section>
</x-layouts.app>

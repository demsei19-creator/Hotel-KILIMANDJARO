<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Hôtel Kilimandjaro | Abidjan' }}</title>
    
    <!-- Google Fonts: Outfit (Sans) & Cormorant Garamond (Serif) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS / Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-luxury-white text-luxury-black antialiased selection:bg-luxury-gold selection:text-white flex flex-col min-h-screen">
    
    <!-- Navigation (Solid Luxury Header) -->
    <header x-data="{ mobileMenuOpen: false }" 
            class="fixed top-0 w-full z-50 bg-white border-b border-gray-200 py-5 text-luxury-black">
        
        <div class="container mx-auto px-6 md:px-12 flex justify-between items-center">
            
            <!-- Logo -->
            <a href="{{ url('/') }}" class="font-serif text-2xl md:text-[28px] tracking-[0.35em] uppercase text-luxury-black">
                Kilimandjaro
            </a>

            <!-- Desktop Nav -->
            <nav class="hidden md:flex items-center gap-10 font-sans text-[11px] font-medium uppercase tracking-[0.2em] text-luxury-black">
                <a href="{{ url('/') }}" class="relative group transition-colors duration-300 hover:text-luxury-gold">
                    Accueil
                    <span class="absolute -bottom-1 left-1/2 w-0 h-[1px] bg-luxury-gold group-hover:w-full group-hover:left-0 transition-all duration-500 ease-out"></span>
                </a>
                <a href="{{ url('/chambres') }}" class="relative group transition-colors duration-300 hover:text-luxury-gold">
                    Chambres
                    <span class="absolute -bottom-1 left-1/2 w-0 h-[1px] bg-luxury-gold group-hover:w-full group-hover:left-0 transition-all duration-500 ease-out"></span>
                </a>
                <a href="{{ url('/restaurant') }}" class="relative group transition-colors duration-300 hover:text-luxury-gold">
                    Restaurant
                    <span class="absolute -bottom-1 left-1/2 w-0 h-[1px] bg-luxury-gold group-hover:w-full group-hover:left-0 transition-all duration-500 ease-out"></span>
                </a>
                <a href="#contact" class="relative group transition-colors duration-300 hover:text-luxury-gold">
                    Contact
                    <span class="absolute -bottom-1 left-1/2 w-0 h-[1px] bg-luxury-gold group-hover:w-full group-hover:left-0 transition-all duration-500 ease-out"></span>
                </a>
                
                <a href="{{ url('/chambres') }}" 
                   class="ml-4 border border-luxury-black text-luxury-black hover:bg-luxury-black hover:text-white active:scale-[0.98] active:opacity-90 px-8 py-3.5 transition-all duration-300">
                    Réserver
                </a>
            </nav>
            
            <!-- Mobile Menu Toggle -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden focus:outline-none text-luxury-black transition-colors duration-300">
                <svg x-show="!mobileMenuOpen" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="square" stroke-linejoin="miter" stroke-width="1" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                <svg x-show="mobileMenuOpen" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display:none;"><path stroke-linecap="square" stroke-linejoin="miter" stroke-width="1" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        
        <!-- Mobile Nav -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-500"
             x-transition:enter-start="opacity-0 -translate-y-full"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-full"
             class="absolute top-0 left-0 w-full h-screen bg-luxury-black text-white flex flex-col justify-center items-center md:hidden z-40" style="display:none;">
            
            <button @click="mobileMenuOpen = false" class="absolute top-10 right-8 text-white focus:outline-none">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="square" stroke-linejoin="miter" stroke-width="1" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            
            <div class="flex flex-col items-center w-full px-8">
                <div class="flex flex-col items-center gap-8 font-serif text-4xl w-full">
                    <a href="{{ url('/') }}" class="hover:text-luxury-gold transition-colors duration-300">Accueil</a>
                    <a href="{{ url('/chambres') }}" class="hover:text-luxury-gold transition-colors duration-300">Chambres</a>
                    <a href="{{ url('/restaurant') }}" class="hover:text-luxury-gold transition-colors duration-300">Restaurant</a>
                    <a href="#contact" class="hover:text-luxury-gold transition-colors duration-300">Contact</a>
                </div>
                
                <div class="mt-12 w-full max-w-xs flex flex-col items-center">
                    <div class="w-24 h-[1px] bg-white/20 mb-10"></div>
                    <a href="{{ url('/chambres') }}" class="w-full text-center border border-luxury-gold text-luxury-gold hover:bg-luxury-gold hover:text-white active:scale-[0.98] active:opacity-90 py-4 text-xs font-sans tracking-[0.2em] uppercase transition-all duration-300">
                        Réserver
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- Majestic Footer -->
    <footer id="contact" class="bg-luxury-black text-luxury-white pt-32 pb-12 mt-auto border-t border-white/10 relative overflow-hidden">
        <!-- Subtle background logo watermark -->
        <div class="absolute -bottom-20 -right-20 text-[20rem] font-serif text-white opacity-[0.02] pointer-events-none select-none">K</div>
        
        <div class="container mx-auto px-6 md:px-12 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-16 md:gap-8 mb-24">
                
                <!-- Brand & Newsletter -->
                <div class="md:col-span-5">
                    <h2 class="font-serif text-4xl uppercase tracking-[0.2em] text-white mb-8">Kilimandjaro</h2>
                    <p class="font-sans text-sm leading-relaxed text-luxury-gray max-w-sm mb-12">
                        Une retraite urbaine d'exception au cœur de Babi. L'art de vivre réinventé à travers un minimalisme raffiné et un service sans compromis.
                    </p>
                    
                    <form class="flex border-b border-luxury-gray/50 pb-2 max-w-sm group">
                        <label for="newsletter-email" class="sr-only">Votre email pour nos exclusivités</label>
                        <input id="newsletter-email" type="email" placeholder="Votre email pour nos exclusivités" class="bg-transparent border-none outline-none text-sm w-full text-white placeholder-luxury-gray/50 font-sans tracking-wide">
                        <button type="submit" class="text-luxury-gold text-xs uppercase tracking-widest group-hover:text-white transition-colors duration-300">S'inscrire</button>
                    </form>
                </div>
                
                <!-- Navigation -->
                <div class="md:col-span-3 md:col-start-7 flex flex-col gap-6 font-sans text-xs tracking-widest uppercase text-luxury-gray">
                    <h3 class="font-serif text-luxury-gold mb-2 normal-case text-xl tracking-normal">Découvrir</h3>
                    <a href="{{ url('/chambres') }}" class="hover:text-white transition-colors duration-300 flex items-center gap-4 group">
                        <div class="w-0 h-[1px] bg-luxury-gold transition-all duration-300 group-hover:w-4"></div>
                        Nos Suites
                    </a>
                    <a href="{{ url('/restaurant') }}" class="hover:text-white transition-colors duration-300 flex items-center gap-4 group">
                        <div class="w-0 h-[1px] bg-luxury-gold transition-all duration-300 group-hover:w-4"></div>
                        Le Maquis de Luxe
                    </a>
                    <a href="#" class="hover:text-white transition-colors duration-300 flex items-center gap-4 group">
                        <div class="w-0 h-[1px] bg-luxury-gold transition-all duration-300 group-hover:w-4"></div>
                        Le Spa & Bien-être
                    </a>
                </div>
                
                <!-- Contact & Legal -->
                <div class="md:col-span-3 flex flex-col gap-6 font-sans text-xs tracking-widest uppercase text-luxury-gray">
                    <h3 class="font-serif text-luxury-gold mb-2 normal-case text-xl tracking-normal">Contact</h3>
                    <p class="hover:text-white transition-colors duration-300 cursor-pointer">Boulevard de France, Cocody<br>Abidjan, Côte d'Ivoire</p>
                    <p class="hover:text-white transition-colors duration-300 cursor-pointer">+225 00 00 00 00 00</p>
                    <p class="hover:text-white transition-colors duration-300 cursor-pointer">concierge@kilimandjaro.ci</p>
                </div>
            </div>
            
            <!-- Bottom Footer -->
            <div class="border-t border-white/10 pt-10 flex flex-col md:flex-row justify-between items-center gap-6 font-sans text-[10px] tracking-[0.2em] uppercase text-luxury-gray">
                <div class="flex gap-8">
                    <a href="#" class="hover:text-white transition-colors">Mentions légales</a>
                    <a href="#" class="hover:text-white transition-colors">Confidentialité</a>
                </div>
                <p>&copy; {{ date('Y') }} Kilimandjaro. Design par <span class="text-luxury-gold">BIGI DEV</span></p>
            </div>
        </div>
    </footer>
</body>
</html>

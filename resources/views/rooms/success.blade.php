<x-layouts.app>
    <x-slot:title>Réservation enregistrée | Hôtel Kilimandjaro</x-slot>

    <section class="min-h-screen flex items-center justify-center bg-luxury-white py-32 px-6">
        <div class="max-w-2xl w-full mx-auto text-center animate-fade-in-up">
            
            <!-- Icon -->
            <div class="mb-10 flex justify-center">
                <div class="w-24 h-24 rounded-full border-2 border-luxury-gold flex items-center justify-center text-luxury-gold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                        <path stroke-linecap="square" stroke-linejoin="miter" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            </div>

            <!-- Header -->
            <span class="font-sans text-luxury-gold-dark font-medium tracking-[0.3em] uppercase text-xs mb-4 block">Félicitations</span>
            <h1 class="font-serif text-4xl md:text-5xl text-luxury-black mb-6">Réservation Enregistrée</h1>
            
            <p class="font-sans text-luxury-gray text-base leading-relaxed mb-12">
                Merci <strong>{{ $reservation->customer_name }}</strong>. Votre demande de séjour a été reçue avec succès
                @if($reservation->status === 'confirmed')
                    et est maintenant <strong class="text-green-700">confirmée et payée</strong>.
                @else
                    et est actuellement <strong>en attente de validation du paiement</strong>.
                @endif
            </p>

            <!-- Details Card -->
            <div class="bg-white border border-gray-100 shadow-xl p-8 md:p-12 text-left mb-12">
                <h2 class="font-serif text-2xl text-luxury-black border-b border-gray-100 pb-4 mb-6">Détails de votre séjour</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 font-sans text-sm">
                    <div>
                        <p class="text-luxury-gray uppercase tracking-widest text-[10px] mb-1">Chambre</p>
                        <p class="text-luxury-black font-medium">{{ $reservation->room->roomType->name ?? 'Suite' }} <span class="text-luxury-gray text-xs">(N° {{ $reservation->room->number }})</span></p>
                    </div>
                    <div>
                        <p class="text-luxury-gray uppercase tracking-widest text-[10px] mb-1">Montant Total</p>
                        <p class="text-luxury-gold font-medium">{{ number_format($reservation->total_amount, 0, ',', ' ') }} FCFA</p>
                    </div>
                    <div>
                        <p class="text-luxury-gray uppercase tracking-widest text-[10px] mb-1">Arrivée</p>
                        <p class="text-luxury-black font-medium">{{ \Carbon\Carbon::parse($reservation->check_in)->format('d/m/Y') }}</p>
                    </div>
                    <div>
                        <p class="text-luxury-gray uppercase tracking-widest text-[10px] mb-1">Départ</p>
                        <p class="text-luxury-black font-medium">{{ \Carbon\Carbon::parse($reservation->check_out)->format('d/m/Y') }}</p>
                    </div>
                </div>
            </div>

            <p class="font-sans text-luxury-gray text-sm mb-12 max-w-lg mx-auto">
                Un email contenant toutes ces informations vient de vous être envoyé sur <strong>{{ $reservation->customer_email }}</strong>.
            </p>

            <a href="{{ url('/') }}" class="inline-block border border-luxury-black text-luxury-black hover:bg-luxury-black hover:text-white px-10 py-4 font-sans tracking-[0.2em] uppercase text-xs transition-colors duration-500">
                Retour à l'accueil
            </a>
        </div>
    </section>
</x-layouts.app>

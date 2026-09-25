<x-mail::message>
# Akwaba à l'Hôtel Kilimandjaro !

Bonjour **{{ $reservation->customer_name }}**,

Nous avons le plaisir de vous confirmer la bonne réception de votre demande de réservation. Nous sommes impatients de vous offrir une expérience d'exception et un doux enjaillement sur les bords de la lagune Ébrié.

**Détails de votre séjour :**
- **Suite / Chambre :** {{ $reservation->roomType->name }}
- **Date d'arrivée :** {{ \Carbon\Carbon::parse($reservation->check_in_date)->translatedFormat('d F Y') }}
- **Date de départ :** {{ \Carbon\Carbon::parse($reservation->check_out_date)->translatedFormat('d F Y') }}
- **Nombre de personnes :** {{ $reservation->number_of_guests }}
- **Montant total estimé :** {{ number_format($reservation->total_price, 0, ',', ' ') }} FCFA

<x-mail::panel>
Votre réservation est actuellement **{{ $reservation->status === 'pending' ? 'en attente de paiement' : 'confirmée' }}**.
</x-mail::panel>

@if($reservation->status === 'pending')
<x-mail::button :url="url('/paiement?ref=' . $reservation->id)">
Procéder au paiement
</x-mail::button>
@endif

Pour toute question ou demande spéciale (navette aéroport, décoration spéciale, etc.), n'hésitez pas à nous répondre directement à ce mail.

À très bientôt,<br>
La Direction de {{ config('app.name') }}
</x-mail::message>

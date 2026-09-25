<x-mail::message>
# Votre table est réservée !

Bonjour **{{ $reservation->customer_name }}**,

Nous avons le plaisir de vous confirmer votre réservation au **Maquis de Luxe** de l'Hôtel Kilimandjaro. Préparez-vous pour une expérience gastronomique où le doux enjaillement ivoirien rencontre l'excellence internationale.

**Détails de votre réservation :**
- **Date :** {{ \Carbon\Carbon::parse($reservation->reservation_date)->translatedFormat('d F Y') }}
- **Heure :** {{ \Carbon\Carbon::parse($reservation->reservation_time)->format('H:i') }}
- **Nombre de couverts :** {{ $reservation->number_of_guests }}

@if($reservation->special_requests)
**Vos demandes spéciales :**
{{ $reservation->special_requests }}
@endif

<x-mail::panel>
Nous gardons votre table pendant 30 minutes après l'heure prévue. En cas de retard, merci de nous prévenir.
</x-mail::panel>

Si vous souhaitez modifier ou annuler votre réservation, n'hésitez pas à nous contacter directement.

À très bientôt pour un délicieux moment,<br>
L'Équipe du Maquis de Luxe - {{ config('app.name') }}
</x-mail::message>

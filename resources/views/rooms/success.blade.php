<x-layouts.app>
    @section('title', 'Réservation confirmée | Hôtel Kilimandjaro')

    <div class="container mt-xl mb-lg" style="padding-top: 100px; max-width: 600px; text-align: center;">
        <div class="booking-form-wrapper animate-fade-in">
            <h1 style="color: #22c55e; font-size: 3rem; margin-bottom: 1rem;">✅</h1>
            <h2 class="section-title" style="font-size: 2rem;">Réservation Enregistrée !</h2>
            <p>Merci <strong>{{ $reservation->customer_name }}</strong> pour votre réservation.</p>
            
            <div class="mt-lg mb-lg" style="text-align: left; background: var(--color-bg); padding: 1rem; border-radius: var(--radius-md);">
                <p><strong>Chambre :</strong> {{ $reservation->room->roomType->name }} (N° {{ $reservation->room->number }})</p>
                <p><strong>Arrivée :</strong> {{ \Carbon\Carbon::parse($reservation->check_in)->format('d/m/Y') }}</p>
                <p><strong>Départ :</strong> {{ \Carbon\Carbon::parse($reservation->check_out)->format('d/m/Y') }}</p>
                <p><strong>Montant total :</strong> {{ number_format($reservation->total_amount, 0, ',', ' ') }} FCFA</p>
            </div>
            
            <p style="color: var(--color-text-muted);">Votre réservation est actuellement <strong>En attente</strong>. Un email de confirmation vous sera envoyé prochainement sur {{ $reservation->customer_email }}.</p>
            
            <a href="{{ url('/') }}" class="btn-primary mt-lg">Retour à l'accueil</a>
        </div>
    </div>
</x-layouts.app>

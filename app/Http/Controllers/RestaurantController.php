<?php

namespace App\Http\Controllers;

use App\Models\TableReservation;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RestaurantController extends Controller
{
    public function index()
    {
        return view('restaurant.index');
    }

    public function reservation()
    {
        return view('restaurant.reservation');
    }

    public function book(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'nullable|string|max:20',
            'reservation_date' => 'required|date|after_or_equal:today',
            'reservation_time' => 'required|date_format:H:i',
            'guests' => 'required|integer|min:1|max:20',
        ]);

        $reservation = TableReservation::create([
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'customer_phone' => $validated['customer_phone'] ?? null,
            'reservation_date' => $validated['reservation_date'],
            'reservation_time' => $validated['reservation_time'],
            'guests' => $validated['guests'],
            'status' => 'pending',
        ]);

        $receptionUsers = \App\Models\User::role(['reception', 'restaurant', 'admin'])->get();

        \Filament\Notifications\Notification::make()
            ->title('Nouvelle réservation de table')
            ->body("{$reservation->customer_name} pour {$reservation->guests} convives le {$reservation->reservation_date} à {$reservation->reservation_time}")
            ->success()
            ->sendToDatabase($receptionUsers);

        try {
            \Illuminate\Support\Facades\Mail::to($reservation->customer_email)->send(new \App\Mail\TableReservationMail($reservation));
        } catch (\Exception $e) {
            // Log error or ignore if SMTP not configured
            \Illuminate\Support\Facades\Log::error('Erreur envoi email restaurant: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Votre table a été réservée avec succès. Nous vous attendons avec impatience.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use App\Services\BookingService;
use Illuminate\Http\Request;
use App\Models\Reservation;

class BookingController extends Controller
{
    public function show(RoomType $roomType)
    {
        return view('rooms.show', compact('roomType'));
    }

    public function book(Request $request, RoomType $roomType, BookingService $bookingService, \App\Services\CinetPayService $cinetPayService)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
        ]);

        try {
            $reservation = $bookingService->bookRoom(
                $roomType->id,
                $request->name,
                $request->email,
                $request->check_in,
                $request->check_out
            );

            $paymentUrl = $cinetPayService->generatePaymentLink(
                $reservation->id,
                $reservation->total_amount,
                'XOF', // or EUR, using XOF for CinetPay default example
                'Réservation: ' . $roomType->name,
                $request->name,
                $request->email
            );

            return redirect()->away($paymentUrl);
        } catch (\Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function success(Request $request, $id)
    {
        $reservation = Reservation::with('room.roomType')->findOrFail($id);

        if ($request->has('mock_payment')) {
            $reservation->update(['status' => 'confirmed']);
        }

        return view('rooms.success', compact('reservation'));
    }
}

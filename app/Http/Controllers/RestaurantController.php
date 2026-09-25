<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuCategory;
use App\Models\TableReservation;

class RestaurantController extends Controller
{
    public function index()
    {
        $categories = MenuCategory::with('items')->get();
        return view('restaurant.index', compact('categories'));
    }

    public function book(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'nullable|string|max:20',
            'reservation_date' => 'required|date|after_or_equal:today',
            'reservation_time' => 'required',
            'guests' => 'required|integer|min:1|max:20',
        ]);

        TableReservation::create($validated);

        return back()->with('success', 'Votre demande de réservation a bien été envoyée !');
    }
}

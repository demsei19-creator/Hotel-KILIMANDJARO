<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredRoomTypes = RoomType::take(3)->get();
        return view('home', compact('featuredRoomTypes'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomCatalogController extends Controller
{
    public function index()
    {
        $roomTypes = RoomType::all();
        return view('rooms.index', compact('roomTypes'));
    }
}

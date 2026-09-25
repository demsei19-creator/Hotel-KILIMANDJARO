<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomCatalogController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/chambres', [RoomCatalogController::class, 'index'])->name('rooms.index');

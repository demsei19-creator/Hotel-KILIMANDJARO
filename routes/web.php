<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomCatalogController;
use App\Http\Controllers\BookingController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/chambres', [RoomCatalogController::class, 'index'])->name('rooms.index');

Route::get('/chambres/{roomType}', [BookingController::class, 'show'])->name('rooms.show');
Route::post('/chambres/{roomType}/book', [BookingController::class, 'book'])->name('rooms.book');
Route::get('/reservation/{id}/success', [BookingController::class, 'success'])->name('rooms.success');

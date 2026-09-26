<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomCatalogController;
use App\Http\Controllers\BookingController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/chambres', [RoomCatalogController::class, 'index'])->name('rooms.index');

Route::get('/chambres/{roomType}', [BookingController::class, 'show'])->name('rooms.show');
Route::get('/chambres/{roomType}/reservation', [BookingController::class, 'reservation'])->name('rooms.reservation');
Route::post('/chambres/{roomType}/book', [BookingController::class, 'book'])->name('rooms.book');
Route::get('/reservation/{id}/success', [BookingController::class, 'success'])->name('rooms.success');

Route::get('/restaurant', [\App\Http\Controllers\RestaurantController::class, 'index'])->name('restaurant.index');
Route::get('/restaurant/reservation', [\App\Http\Controllers\RestaurantController::class, 'reservation'])->name('restaurant.reservation');
Route::post('/restaurant/book', [\App\Http\Controllers\RestaurantController::class, 'book'])->name('restaurant.book');

Route::post('/webhook/cinetpay', [\App\Http\Controllers\CinetPayWebhookController::class, 'handle'])
    ->name('webhook.cinetpay')
    ->withoutMiddleware(\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class);

Route::get('/cloud-logs', function () {
    $logFile = storage_path('logs/laravel.log');
    if (!file_exists($logFile)) return 'No logs';
    $logs = file($logFile);
    return '<pre style="white-space: pre-wrap; word-wrap: break-word;">' . implode("", array_slice($logs, -100)) . '</pre>';
});

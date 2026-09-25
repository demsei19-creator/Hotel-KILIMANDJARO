<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Http;

class CinetPayWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $siteId = config('services.cinetpay.site_id');
        $apiKey = config('services.cinetpay.api_key');

        // L'identifiant de la transaction renvoyé par CinetPay
        if ($request->has('cpm_trans_id')) {
            $transactionId = $request->cpm_trans_id;

            // Mode Mock
            if (empty($siteId) || $siteId === 'mock') {
                $reservation = Reservation::find($transactionId);
                if ($reservation && $reservation->status !== 'confirmed') {
                    $reservation->update(['status' => 'confirmed']);
                }
                return response()->json(['status' => 'mock_success']);
            }

            // Vérification de sécurité avec CinetPay
            $response = Http::post('https://api-checkout.cinetpay.com/v2/payment/check', [
                'apikey' => $apiKey,
                'site_id' => $siteId,
                'transaction_id' => $transactionId,
            ]);

            if ($response->successful() && $response->json('code') === '00') {
                $reservation = Reservation::find($transactionId);
                if ($reservation && $reservation->status !== 'confirmed') {
                    $reservation->update(['status' => 'confirmed']);
                }
            }
        }

        return response()->json(['status' => 'received']);
    }
}

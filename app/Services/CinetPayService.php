<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Exception;

class CinetPayService
{
    public function generatePaymentLink($transactionId, $amount, $currency, $description, $customerName, $customerEmail)
    {
        $siteId = config('services.cinetpay.site_id');
        $apiKey = config('services.cinetpay.api_key');

        // Mode Mock pour le développement local sans clés
        if (empty($siteId) || $siteId === 'mock' || empty($apiKey) || $apiKey === 'mock') {
            return route('rooms.success', ['id' => $transactionId]) . '?mock_payment=success';
        }

        $response = Http::post('https://api-checkout.cinetpay.com/v2/payment', [
            'apikey' => $apiKey,
            'site_id' => $siteId,
            'transaction_id' => (string) $transactionId,
            'amount' => $amount,
            'currency' => $currency,
            'description' => $description,
            'customer_name' => $customerName,
            'customer_surname' => '',
            'customer_email' => $customerEmail,
            'notify_url' => route('webhook.cinetpay'),
            'return_url' => route('rooms.success', ['id' => $transactionId]),
            'channels' => 'ALL',
            'metadata' => 'reservation',
        ]);

        if ($response->successful() && $response->json('code') === '201') {
            return $response->json('data.payment_url');
        }

        throw new Exception('Erreur lors de l\'initialisation du paiement CinetPay: ' . $response->json('description', 'Erreur inconnue'));
    }
}

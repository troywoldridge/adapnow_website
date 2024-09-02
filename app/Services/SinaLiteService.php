<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SinaLiteService
{
    protected $apiUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->apiUrl = config('services.sinalite.api_url');
        $this->apiKey = config('services.sinalite.api_key');
    }

    public function getProducts()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
        ])->get($this->apiUrl . '/products');

        if ($response->successful()) {
            return $response->json();
        }

        return [];
    }

    // Add more methods as needed for other API calls
}

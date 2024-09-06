<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Services\SinaliteService;
use Exception;
use Log;

class ProductStockTableSeeder extends Seeder
{
    public function run()
    {
        try {
            // Retrieve the access token
            $accessToken = $this->getAccessToken();

            // Correct API request to fetch product stock
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken // Ensure correct Bearer token
            ])->get('https://api.sinaliteuppy.com/product'); // Correct endpoint for products

            if ($response->failed()) {
                throw new Exception("API request failed: " . $response->body());
            }

            $stockData = $response->json();

            // Process and seed stock data into the database
            foreach ($stockData as $stockItem) {
                // Your logic to store $stockItem data into the database
            }

            Log::info("Product stocks have been successfully seeded.");

        } catch (Exception $e) {
            Log::error("Failed to seed product stocks: " . $e->getMessage());
            throw new Exception("Failed to seed product stocks: " . $e->getMessage());
        }
    }

    // Method to fetch the access token from the Sinalite API
    private function getAccessToken()
    {
        // Make the API request to get the access token
        $response = Http::post('https://api.sinaliteuppy.com/auth/token', [
            'client_id' => 'JarBGsyG2zC4vRFTjLEi4TDbQrXUVEzr',
            'client_secret' => 'L292AtithgbZWAuo4UZcQXdG0s7I-TJphyaWCJKA95YpURyZGH1Qh3Ri-YauVdkJ',
            'audience' => 'https://apiconnect.sinalite.com',
            'grant_type' => 'client_credentials'
        ]);

        if ($response->failed()) {
            throw new Exception("Failed to retrieve access token: " . $response->body());
        }

        $data = $response->json();
        return $data['access_token'];
    }
}

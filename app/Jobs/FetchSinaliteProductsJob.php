<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class FetchSinaliteProductsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // Fetch access token dynamically
    private function getAccessToken()
    {
        $response = Http::post('https://api.sinaliteuppy.com/auth/token', [
            'client_id' => 'QF9NlMmXMum7WS8msa9FLytyBlNtAsju',
            'client_secret' => '3fBrlEaxEADtXFf7pfLXvPKqp3nBx-AkAxr3L02hfvgMkZxfOD2G8Xo9xce4CcPj',
            'audience' => 'https://apiconnect.sinalite.com',
            'grant_type' => 'client_credentials'
        ]);

        if ($response->successful()) {
            return $response->json()['access_token'];
        }

        \Log::error('Failed to fetch access token from Sinalite API');
        return null;
    }

    // Job handler
    public function handle()
    {
        $apiToken = $this->getAccessToken();

        if (!$apiToken) {
            \Log::error('Unable to fetch Sinalite API token, skipping product sync.');
            return;
        }

        $response = Http::withToken($apiToken)->get('https://liveapi.sinalite.com/product');

        if ($response->successful()) {
            $products = $response->json();

            foreach ($products as $product) {
                DB::table('products')->updateOrInsert(
                    ['sku' => $product['sku']], // Use SKU or unique identifier to avoid duplicate products
                    [
                        'name' => $product['name'],
                        'description' => $product['description'] ?? null, // Optional description
                        'price' => $product['price'] ?? 0.0,  // Ensure price is defaulted
                        'category_id' => $this->getCategoryId($product['category']), // Assuming you map category to an ID
                    ]
                );
            }

            \Log::info('Products from Sinalite API successfully synced.');
        } else {
            \Log::error('Failed to fetch products from Sinalite API: ' . $response->body());
        }
    }

    // Helper method to map category name to category_id in your database
    private function getCategoryId($categoryName)
    {
        // Example: fetch category_id from categories table based on the category name
        return DB::table('categories')->where('name', $categoryName)->value('id') ?? null;
    }
}

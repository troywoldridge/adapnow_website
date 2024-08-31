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

    public function handle()
    {
        // Replace this with your Sinalite API token and endpoint
        $apiToken = 'your_sinalite_api_token';
        $response = Http::withToken($apiToken)->get('https://api.sinalite.com/v1/products');

        if ($response->successful()) {
            $products = $response->json();

            foreach ($products as $product) {
                DB::table('products')->updateOrInsert(
                    ['slug' => $product['slug']],
                    [
                        'name' => $product['name'],
                        'description' => $product['description'],
                        'price' => $product['price'],
                        'category_id' => $product['category_id'],
                    ]
                );
            }
        } else {
            \Log::error('Failed to fetch data from Sinalite API: ' . $response->body());
        }
    }
}


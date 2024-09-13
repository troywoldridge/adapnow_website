<?php 

namespace App\Jobs;

use App\Models\Product;
use App\Services\SinaliteService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class FetchSinaliteProductsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $sinaliteService;

    /**
     * Create a new job instance.
     */
    public function __construct(SinaliteService $sinaliteService)
    {
        $this->sinaliteService = $sinaliteService;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        try {
            // Fetch products from SinaLite API
            $products = $this->sinaliteService->getProducts();

            // Sync products with the database
            foreach ($products as $productData) {
                Product::updateOrCreate(
                    ['sku' => $productData['sku']], // Unique identifier for product
                    [
                        'name' => $productData['name'],
                        'description' => $productData['description'] ?? null,
                        'price' => $productData['price'] ?? 0,
                        'category' => $productData['category'], 
                        // Add other necessary fields here...
                    ]
                );
            }

            Log::info('Successfully synced products with the database.');
        } catch (\Exception $e) {
            Log::error('Failed to sync products: ' . $e->getMessage());
        }
    }
}

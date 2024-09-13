<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class VerifyProductSlugs extends Command
{
    // Command name
    protected $signature = 'verify:product-slugs';

    // Command description
    protected $description = 'Verify that all product slugs are valid and accessible';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Starting slug verification process...');

        // Fetch all slugs from the database
        $products = DB::table('products')->select('slug')->get();

        // Prepare to store results in a text file (updated path)
        $logFile = storage_path('logs/slug_verification_report.txt');
        $handle = fopen($logFile, 'w');
        if (!$handle) {
            Log::error('Unable to open the file for writing the slug report.');
            $this->error('Unable to open the file for writing.');
            return;
        }

        foreach ($products as $product) {
            $productSlug = $product->slug;
            $url = 'http://127.0.0.1:8000/product/' . $productSlug;

            try {
                // Check if the product page exists by sending a GET request
                $response = Http::get($url);

                if ($response->successful()) {
                    fwrite($handle, "Success: Product with slug '$productSlug' is accessible at $url\n");
                } else {
                    fwrite($handle, "Error: Product with slug '$productSlug' could not be accessed at $url. Status code: {$response->status()}\n");
                }
            } catch (\Exception $e) {
                fwrite($handle, "Error: Failed to fetch product '$productSlug'. Exception: " . $e->getMessage() . "\n");
            }
        }

        fclose($handle);
        $this->info('Slug verification complete. Report written to ' . $logFile);
    }
}

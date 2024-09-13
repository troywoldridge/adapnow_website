<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;  // Ensure DB is imported
use Illuminate\Support\Facades\Log;
use App\Services\SinaliteService;

class ProductStockTableSeeder extends Seeder
{
    protected $sinaliteService;

    public function __construct(SinaliteService $sinaliteService)
    {
        $this->sinaliteService = $sinaliteService;
    }

    public function run()
    {
        try {
            // Fetch product stocks from Sinalite API
            $stocks = $this->sinaliteService->getStocks();

            // Log the raw response for debugging
            Log::info("API Response for Stocks: ", $stocks);

            // If no stocks are fetched, log it and exit
            if (empty($stocks)) {
                Log::warning('No stocks retrieved from Sinalite API.');
                return;
            }

            // Insert the stock data into the database
            foreach ($stocks as $stock) {
                // Ensure stock data is valid before insertion
                if (!empty($stock['id']) && !empty($stock['name'])) {
                    DB::table('product_stocks')->insert([
                        'id' => $stock['id'],
                        'name' => $stock['name'],
                        'description' => $stock['description'] ?? null,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                } else {
                    Log::warning('Skipped stock due to invalid data: ' . json_encode($stock));
                }
            }

            Log::info('Product stocks have been successfully seeded.');
        } catch (\Exception $e) {
            // Log any exceptions that occur during the process
            Log::error('Error seeding product stocks: ' . $e->getMessage());
            $this->command->error('Failed to seed product stocks. Check logs for details.');
        }
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use League\Csv\Writer;
use App\Services\SinaliteService;
use Illuminate\Support\Facades\Storage;

class ExportSinaliteProductsToCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:sinalite-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch products from Sinalite API and save them to a CSV file';

    /**
     * The SinaliteService instance.
     */
    protected $sinaliteService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(SinaliteService $sinaliteService)
    {
        parent::__construct();
        $this->sinaliteService = $sinaliteService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Fetch the products from the Sinalite API
        $this->info("Fetching products from Sinalite API...");
        $products = $this->sinaliteService->getProducts();

        // Define the CSV file path
        $csvPath = storage_path('exports/sinalite_products.csv');

        // Create a CSV writer instance
        $csv = Writer::createFromPath($csvPath, 'w+');
        
        // Insert headers into the CSV file
        $csv->insertOne([
            'name', 'slug', 'description', 'category_slug', 'price', 'sku', 'created_at', 'updated_at'
        ]);

        // Loop through the products and insert them into the CSV
        foreach ($products as $product) {
            $csv->insertOne([
                $product['name'],
                $product['slug'],
                $product['description'],
                $product['category_slug'] ?? 'uncategorized',
                $product['price'] ?? 0.00,
                $product['sku'],
                now(),  // created_at
                now(),  // updated_at
            ]);
        }

        $this->info("Products successfully exported to $csvPath.");

        return 0;
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use League\Csv\Writer;
use SplTempFileObject;

class ExportProductsToCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export products to CSV';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Fetch all products from the database
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.name', 'products.slug', 'products.description', 'categories.slug as category_slug', 'products.price', 'products.created_at', 'products.updated_at')
            ->get();

        // Create a CSV writer
        $csv = Writer::createFromFileObject(new SplTempFileObject());

        // Insert the header row
        $csv->insertOne(['name', 'slug', 'description', 'category_slug', 'price', 'created_at', 'updated_at']);

        // Insert product rows
        foreach ($products as $product) {
            $csv->insertOne([
                $product->name,
                $product->slug,
                $product->description,
                $product->category_slug,
                $product->price,
                $product->created_at,
                $product->updated_at,
            ]);
        }

        // Define the file path to save the CSV
        $filePath = storage_path('exports/products.csv');

        // Make sure the directory exists
        if (!is_dir(storage_path('exports'))) {
            mkdir(storage_path('exports'), 0755, true);
        }

        // Save the CSV file to the specified path
        file_put_contents($filePath, $csv->toString());

        $this->info("CSV export complete. File saved to: $filePath");

        return 0;
    }
}

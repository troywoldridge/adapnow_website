<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Services\SinaliteService;

class ProductColorTableSeeder extends Seeder
{
    protected $sinaliteService;

    public function __construct(SinaliteService $sinaliteService)
    {
        $this->sinaliteService = $sinaliteService;
    }

    public function run()
    {
        // Fetch products from the database
        $products = DB::table('products')->get();

        foreach ($products as $product) {
            // Fetch product colors from Sinalite API
            $colors = $this->sinaliteService->getColors($product->id, 'en_ca'); // Adjust storeCode as necessary

            foreach ($colors as $color) {
                DB::table('product_colors')->insert([
                    'product_id' => $product->id,
                    'color' => $color['name'],
                ]);
            }
        }
    }
}

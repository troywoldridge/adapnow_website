<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Services\SinaliteService;

class ProductSizeTableSeeder extends Seeder
{
    protected $sinaliteService;

    public function __construct(SinaliteService $sinaliteService)
    {
        $this->sinaliteService = $sinaliteService;
    }

    public function run()
    {
        $products = \App\Models\Product::all();

        foreach ($products as $product) {
            $sizes = $this->sinaliteService->getSizes($product->id, 'en_ca'); // Adjust storeCode as necessary

            foreach ($sizes as $size) {
                DB::table('product_sizes')->insert([
                    'product_id' => $product->id,
                    'size' => $size['name'],
                ]);
            }
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
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
        $stocks = $this->sinaliteService->getStocks();

        foreach ($stocks as $stock) {
            DB::table('product_stock')->updateOrInsert(
                ['name' => $stock['name']],
                ['description' => $stock['description'] ?? null]
            );
        }
    }
}

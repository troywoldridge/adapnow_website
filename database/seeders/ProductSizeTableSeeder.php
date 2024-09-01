<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
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
        $sizes = $this->sinaliteService->getSizes();

        foreach ($sizes as $size) {
            DB::table('product_size')->updateOrInsert(
                ['name' => $size['name']],
                ['description' => $size['description'] ?? null]
            );
        }
    }
}

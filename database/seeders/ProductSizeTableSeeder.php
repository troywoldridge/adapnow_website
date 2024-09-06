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
        $sizes = $this->sinaliteService->getSizes();

        foreach ($sizes as $size) {
            DB::table('product_sizes')->updateOrInsert(
                ['name' => $size['name']],
                ['description' => $size['description'] ?? null]
            );
        }
    }
}

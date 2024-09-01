<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Services\SinaliteService;

class ProductCompatibilityTableSeeder extends Seeder
{
    protected $sinaliteService;

    public function __construct(SinaliteService $sinaliteService)
    {
        $this->sinaliteService = $sinaliteService;
    }

    public function run()
    {
        $compatibilities = $this->sinaliteService->getCompatibilities();

        foreach ($compatibilities as $compatibility) {
            DB::table('product_compatibility')->updateOrInsert(
                ['name' => $compatibility['name']],
                ['description' => $compatibility['description'] ?? null]
            );
        }
    }
}

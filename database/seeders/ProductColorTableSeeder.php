<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
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
        $colors = $this->sinaliteService->getColors();

        foreach ($colors as $color) {
            DB::table('product_colors')->updateOrInsert(
                ['name' => $color['name']],
                ['description' => $color['description'] ?? null]
            );
        }
    }
}

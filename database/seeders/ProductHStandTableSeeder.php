<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Services\SinaliteService;

class ProductHStandTableSeeder extends Seeder
{
    protected $sinaliteService;

    public function __construct(SinaliteService $sinaliteService)
    {
        $this->sinaliteService = $sinaliteService;
    }

    public function run()
    {
        $hstands = $this->sinaliteService->getHStands();

        foreach ($hstands as $hstand) {
            DB::table('product_hstand')->updateOrInsert(
                ['name' => $hstand['name']],
                ['description' => $hstand['description'] ?? null]
            );
        }
    }
}

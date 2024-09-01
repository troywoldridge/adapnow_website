<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Services\SinaliteService;

class ProductSetTableSeeder extends Seeder
{
    protected $sinaliteService;

    public function __construct(SinaliteService $sinaliteService)
    {
        $this->sinaliteService = $sinaliteService;
    }

    public function run()
    {
        $sets = $this->sinaliteService->getSets();

        foreach ($sets as $set) {
            DB::table('product_set')->updateOrInsert(
                ['name' => $set['name']],
                ['description' => $set['description'] ?? null]
            );
        }
    }
}

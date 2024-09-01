<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Services\SinaliteService;

class ProductCoatingTableSeeder extends Seeder
{
    protected $sinaliteService;

    public function __construct(SinaliteService $sinaliteService)
    {
        $this->sinaliteService = $sinaliteService;
    }

    public function run()
    {
        $coatings = $this->sinaliteService->getCoatings();

        foreach ($coatings as $coating) {
            DB::table('product_coating')->updateOrInsert(
                ['name' => $coating['name']],
                ['description' => $coating['description'] ?? null]
            );
        }
    }
}

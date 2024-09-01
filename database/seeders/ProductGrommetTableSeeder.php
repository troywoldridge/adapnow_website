<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Services\SinaliteService;

class ProductGrommetTableSeeder extends Seeder
{
    protected $sinaliteService;

    public function __construct(SinaliteService $sinaliteService)
    {
        $this->sinaliteService = $sinaliteService;
    }

    public function run()
    {
        $grommets = $this->sinaliteService->getGrommets();

        foreach ($grommets as $grommet) {
            DB::table('product_grommet')->updateOrInsert(
                ['name' => $grommet['name']],
                ['description' => $grommet['description'] ?? null]
            );
        }
    }
}

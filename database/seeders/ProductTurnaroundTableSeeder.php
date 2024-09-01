<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Services\SinaliteService;

class ProductTurnaroundTableSeeder extends Seeder
{
    protected $sinaliteService;

    public function __construct(SinaliteService $sinaliteService)
    {
        $this->sinaliteService = $sinaliteService;
    }

    public function run()
    {
        $turnarounds = $this->sinaliteService->getTurnarounds();

        foreach ($turnarounds as $turnaround) {
            DB::table('product_turnaround')->updateOrInsert(
                ['name' => $turnaround['name']],
                ['description' => $turnaround['description'] ?? null]
            );
        }
    }
}

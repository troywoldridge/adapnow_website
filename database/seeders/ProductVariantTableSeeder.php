<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Services\SinaliteService;

class ProductVariantTableSeeder extends Seeder
{
    protected $sinaliteService;

    public function __construct(SinaliteService $sinaliteService)
    {
        $this->sinaliteService = $sinaliteService;
    }

    public function run()
    {
        $variants = $this->sinaliteService->getVariants();

        foreach ($variants as $variant) {
            DB::table('product_variant')->updateOrInsert(
                ['key' => $variant['key']],
                ['price' => $variant['price']]
            );
        }
    }
}

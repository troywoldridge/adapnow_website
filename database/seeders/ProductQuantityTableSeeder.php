<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductQuantityTableSeeder extends Seeder
{
    public function run()
    {
        $quantities = [
            ['value' => 25],
            ['value' => 50],
            ['value' => 75],
            ['value' => 100],
            ['value' => 250],
            ['value' => 500],
            ['value' => 750],
            ['value' => 1000],
            ['value' => 1500],
            ['value' => 2000],
            ['value' => 2500],
            ['value' => 5000],
        ];

        DB::table('quantities')->insert($quantities);
    }
}

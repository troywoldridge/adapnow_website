<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SetsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('sets')->insert([
            ['name' => 'Single Set', 'quantity' => 1],
            ['name' => 'Multiple Sets', 'quantity' => 2],
        ]);
    }
}

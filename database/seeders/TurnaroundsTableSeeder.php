<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TurnaroundsTableSeeder extends Seeder
{
    public function run()
    {
        $turnarounds = [
            ['name' => 'Next Day'],
            ['name' => '2-3 Business Days'],
            ['name' => '5-7 Business Days'],
        ];

        DB::table('turnarounds')->insert($turnarounds);
    }
}

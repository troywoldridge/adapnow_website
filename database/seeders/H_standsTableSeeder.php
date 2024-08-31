<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class H_standsTableSeeder extends Seeder
{
    public function run()
    {
        $hstands = [
            ['name' => 'No H-Stand'],
            ['name' => 'Standard H-Stand'],
        ];

        DB::table('h_stands')->insert($hstands);
    }
}

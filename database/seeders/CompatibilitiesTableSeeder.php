<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompatibilitiesTableSeeder extends Seeder
{
    public function run()
    {
        $compatibilities = [
            ['name' => 'Windows'],
            ['name' => 'Mac'],
            ['name' => 'Linux'],
            // Add more compatibility options as needed
        ];

        DB::table('compatibilities')->insert($compatibilities);
    }
}

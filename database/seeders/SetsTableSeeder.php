<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SetsTableSeeder extends Seeder
{
    public function run()
    {
        $sets = [
            ['name' => 'Single Set'],
            ['name' => 'Multiple Sets'],
        ];

        DB::table('sets')->insert($sets);
    }
}

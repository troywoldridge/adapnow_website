<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Services\SinaliteService; 
use Exception;

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

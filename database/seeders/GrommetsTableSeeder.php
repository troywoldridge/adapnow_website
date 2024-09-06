<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Services\SinaliteService;
use Exception;

class GrommetsTableSeeder extends Seeder
{
    public function run()
    {
        $grommets = [
            ['name' => 'No Grommet'],
            ['name' => 'Top Grommet'],
            ['name' => 'Corner Grommets'],
            ['name' => 'Every 2 Feet'],
            // Add more grommet options as needed
        ];

        DB::table('grommets')->insert($grommets);
    }
}

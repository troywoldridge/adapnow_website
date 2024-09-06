<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Services\SinaliteService;
use Exception;
class CoatingsTableSeeder extends Seeder
{
    public function run()
    {
        $coatings = [
            ['name' => 'None'],
            ['name' => 'Gloss UV'],
            ['name' => 'Matte Finish'],
            ['name' => 'Soft Touch'],
        ];

        DB::table('coatings')->insert($coatings);
    }
}

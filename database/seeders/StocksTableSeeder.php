<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StocksTableSeeder extends Seeder
{
    public function run()
    {
        $stocks = [
            ['name' => '14pt Gloss'],
            ['name' => '16pt Matte'],
            ['name' => '18pt Uncoated'],
            ['name' => '20pt Soft Touch'],
        ];

        DB::table('stocks')->insert($stocks);
    }
}

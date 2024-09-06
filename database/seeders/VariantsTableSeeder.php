<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VariantsTableSeeder extends Seeder
{
    public function run()
    {
        $variants = [
            ['key' => 'size', 'value' => 'Small'],
            ['key' => 'size', 'value' => 'Medium'],
            ['key' => 'size', 'value' => 'Large'],
            ['key' => 'color', 'value' => 'Red'],
            ['key' => 'color', 'value' => 'Blue'],
            ['key' => 'material', 'value' => 'Cotton'],
            ['key' => 'material', 'value' => 'Polyester'],
        ];

        DB::table('variants')->insert($variants);
    }
}

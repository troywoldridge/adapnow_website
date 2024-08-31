<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->insert([
            ['name' => 'Small'],
            ['name' => 'Medium'],
            ['name' => 'Large'],
            ['name' => 'X-Large'],
	    ['name' => '2XL'],
	    ['name' => '3XL'],
	    ['name' => '4XL'],
	    ['name' => '5xl']
            // Add more sizes as needed
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Add the ProductsTableSeeder to the list of seeders
        $this->call([
            ProductsTableSeeder::class,
            // Add other seeders here as needed
        ]);
    }
}

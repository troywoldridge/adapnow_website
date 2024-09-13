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
        // Run all seeders in a single call for better readability and maintenance
        $this->call([
            CategoriesTableSeeder::class,
            ProductsTableSeeder::class,
            CoatingsTableSeeder::class,
            GrommetsTableSeeder::class,
            QuantitiesTableSeeder::class,
            SetsTableSeeder::class,
            ProductStockTableSeeder::class,
            // Add additional seeders as needed below:
            // VariantsTableSeeder::class,
            // ProductCoatingTableSeeder::class,
            // ProductTurnaroundTableSeeder::class,
            // ProductVariantTableSeeder::class,
            // ProductSetTableSeeder::class,
            // ProductGrommetTableSeeder::class,
            // HStandsTableSeeder::class,
            // SizesTableSeeder::class,
            // ProductSizeTableSeeder::class,
            // ProductCompatibilityTableSeeder::class,
            // ProductHStandTableSeeder::class,
        ]);
    }
}

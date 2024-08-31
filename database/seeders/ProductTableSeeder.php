<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Categories
        $categories = [
            'Apparel' => [
                'Men\'s Clothing' => [
                    'Men\'s T-Shirt' => 12.99,
                    'Men\'s Long Sleeve Shirt' => 18.99,
                    'Men\'s Hoodie' => 39.99,
                    'Men\'s Sweatshirt' => 34.99,
                    'Men\'s Tank Top' => 14.99,
                    'Men\'s Polo' => 24.99,
                ],
                'Women\'s Clothing' => [
                    'Women\'s T-Shirt' => 19.99,
                    'Women\'s Long Sleeve Shirt' => 29.99,
                    'Women\'s Hoodie' => 39.99,
                    'Women\'s Sweatshirt' => 34.99,
                    'Women\'s Tank Top' => 14.99,
                    'Women\'s Polo' => 24.99,
                ],
                'Youth & Kids Clothing' => [
                    'Youth T-Shirt' => 14.99,
                    'Youth Hoodie' => 29.99,
                    'Youth Sweatshirt' => 24.99,
                    'Youth Tank Top' => 9.99,
                ],
                'Headwear' => [
                    'ATC C130' => 10.99,
                    'Yupoong 6606' => 12.99,
                    'Yupoong 6245CM' => 14.99,
                    'Yupoong 6089' => 14.99,
                    'Yupoong 6006' => 14.99,
                    'Flexfit 6277' => 16.99,
                ],
            ],
            'Business Cards Standard' => [
                'Value Cards' => 9.99,
                'Matte Business Cards' => 12.99,
                'UV (High Gloss) Business Cards' => 14.99,
                'Lamination Business Cards' => 16.99,
                'AQ Business Cards' => 11.99,
                'Writable Business Cards' => 8.99,
            ],
            'Specialty Business Cards' => [
                'Metalic Foil (Raised)' => 10.99,
                'Kraft Paper' => 10.99,
                'Durable' => 10.99,
                'Spot UV (Raised)' => 10.99,
                'Pearl Paper' => 12.99,
                'Die Cut' => 12.99,
                'Soft Touch (Suede)' => 14.99,
                '32pt Painted Edge' => 16.99,
                'Ultra Smooth' => 14.99,
            ],
            'Printed Products' => [
                'Postcards' => 15.99,
                'Flyers' => 19.99,
                'Brochures' => 25.99,
                'Bookmarks' => 9.99,
                'Presentation Folders' => 30.99,
                'Booklets' => 45.99,
                'Invitations / Announcements' => 22.99,
                'Number Tickets' => 14.99,
                'Wall Calendars' => 28.99,
                'Variable Printing' => 32.99,
                'Posters' => 16.99,
                'Door Hangers' => 18.99,
                'Digital Sheets' => 12.99,
                'Folded Business Cards' => 14.99,
                'Tent Cards' => 20.99,
                'Plastics' => 34.99,
                'Tear Cards' => 11.99,
                'Clings' => 15.99,
                'Magnets' => 29.99,
                'Greeting Cards' => 8.99,
            ],
            'Large Format' => [
                'Coroplast Signs & Yard Signs' => 22.99,
                'Floor Graphics' => 26.99,
                'Foam Board' => 18.99,
                'Aluminum Signs' => 28.99,
                'Banners' => 31.99,
                'Pull Up Banners' => 35.99,
                'Car Magnets' => 19.99,
                'Table Covers' => 39.99,
                'Adhesive Vinyl' => 24.99,
                'Window Graphics' => 30.99,
                'Large Format Posters' => 27.99,
                'Styrene Signs' => 23.99,
                'Display Board / POP' => 33.99,
                'Canvas' => 42.99,
                'Sintra / PVC' => 25.99,
                'X-Frame Banners' => 29.99,
                'A-Frame Signs' => 34.99,
                'Wall Decals' => 26.99,
                'A-Frame Stands' => 26.99,
                'H Stands for Signs' => 13.99,
            ],
            'Stationery' => [
                'Letterhead' => 49.46,
                'Envelopes' => 38.99,
                'Notepads' => 97.99,
                'NCR Forms' => 70.99,
                'Supply Boxes' => 5.99,
            ],
            'Promotional' => [
                'Mugs' => 5.99,
                'Bottles' => 10.99,
                'Puzzles' => 14.99,
                'Canvas' => 19.99,
                'Tumblers' => 19.95,
                'Mason Jars' => 12.99,
                'Keychains' => 4.99,
                'Coasters' => 8.99,
                'Mouse Pads' => 10.99,
                'Photo Panels' => 19.99,
            ],
            'Labels & Packaging' => [
                'Labels' => 60.99,
                'Product Boxes' => 10.99,
                'Corrugated Boxes' => 10.99,
                'Cut to Shape Decals' => 59.99,
            ],
        ];

        foreach ($categories as $parentCategory => $subcategories) {
            $parentCategoryId = DB::table('categories')->insertGetId([
                'name' => $parentCategory,
                'description' => "$parentCategory category",
                'parent_id' => null,
            ]);

            foreach ($subcategories as $subcategory => $products) {
                $subcategoryId = DB::table('categories')->insertGetId([
                    'name' => $subcategory,
                    'description' => "$subcategory subcategory",
                    'parent_id' => $parentCategoryId,
                ]);

                foreach ($products as $product => $price) {
                    DB::table('products')->insert([
                        'name' => $product,
                        'slug' => strtolower(str_replace(' ', '-', $product)),
                        'description' => "$product description",
                        'price' => $price,
                        'category_id' => $subcategoryId,
                    ]);
                }
            }
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Services\SinaliteService;

class ProductsTableSeeder extends Seeder
{
    protected $sinaliteService;

    public function __construct(SinaliteService $sinaliteService)
    {
        $this->sinaliteService = $sinaliteService;
    }

    public function run()
    {
        // Delete existing data in the products table
        DB::table('products')->delete();

        // Fetch products from Sinalite API
        $products = $this->sinaliteService->getProducts();

        // Define category mappings
        $categories = [
            'Business Cards' => 1,
            'Postcards' => 2,
            'Flyers' => 3,
            'Brochures' => 4,
            'Bookmarks' => 5,
            'Presentation Folders' => 6,
            'Booklets' => 7,
            'Magnets' => 8,
            'Greeting Cards' => 9,
            'Invitations / Announcements' => 10,
            'Numbered Tickets' => 11,
            'Wall Calendars' => 12,
            'Variable Printing' => 13,
            'Posters' => 14,
            'Door Hangers' => 15,
            'Digital Sheets' => 16,
            'Folded Business Cards' => 17,
            'Tent Cards' => 18,
            'Plastics' => 19,
            'Tear Cards' => 20,
            'Clings' => 21,
            'Coroplast Signs & Yard Signs' => 22,
            'Floor Graphics' => 23,
            'Foam Board' => 24,
            'Aluminum Signs' => 25,
            'Banners' => 26,
            'Pull Up Banners' => 27,
            'Car Magnets' => 28,
            'Table Covers' => 29,
            'Adhesive Vinyl' => 30,
            'Window Graphics' => 31,
            'Large Format Posters' => 32,
            'Styrene Signs' => 33,
            'Display Board / POP' => 34,
            'Canvas' => 35,
            'Sintra / PVC' => 36,
            'X-Frame Banners' => 37,
            'A-Frame Signs' => 38,
            'Wall Decals' => 39,
            'A Frame Stands' => 40,
            'H Stand for Signs' => 41,
            'Letterhead' => 42,
            'Envelopes' => 43,
            'Notepads' => 44,
            'NCR Forms' => 45,
            'Supply Boxes' => 46,
            'Mugs' => 47,
            'Bottles' => 48,
            'Puzzles' => 49,
            'Canvas' => 50,
            'Tumblers' => 51,
            'Mason Jars' => 52,
            'Keychains' => 53,
            'Mouse Pads' => 54,
            'Photo Panels' => 55,
            'Labels' => 56,
            'Product Boxes' => 57,
            'Corrugated Boxes' => 58,
            'Cut Shape Decals' => 59,
            'Men\'s Clothing' => 60,
            'Women\'s Clothing' => 61,
            'Kids & Youth Clothing' => 62,
            'Headwear' => 63,
            'Accessories' => 64,
        ];

        $insertData = [];

        foreach ($products as $product) {
            if (isset($categories[$product['category']])) {
                $insertData[] = [
                    'name' => $product['name'],
                    'slug' => $product['sku'], // Ensure these are unique
                    'description' => $product['category'],
                    'price' => 0,
                    'category_id' => $categories[$product['category']],
                ];
            }
        }

        // Insert the products into the database
        DB::table('products')->insert($insertData);
    }
}

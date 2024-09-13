<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        // Clear the categories table before seeding
        DB::table('categories')->truncate();

        // Top-level categories
        $businessCardsId = DB::table('categories')->insertGetId([
            'name' => 'Business Cards',
            'slug' => Str::slug('Business Cards'),
            'parent_id' => null
        ]);

        $printProductsId = DB::table('categories')->insertGetId([
            'name' => 'Print Products',
            'slug' => Str::slug('Print Products'),
            'parent_id' => null
        ]);

        $largeFormatId = DB::table('categories')->insertGetId([
            'name' => 'Large Format',
            'slug' => Str::slug('Large Format'),
            'parent_id' => null
        ]);

        $stationaryId = DB::table('categories')->insertGetId([
            'name' => 'Stationary',
            'slug' => Str::slug('Stationary'),
            'parent_id' => null
        ]);

        $promotionalId = DB::table('categories')->insertGetId([
            'name' => 'Promotional',
            'slug' => Str::slug('Promotional'),
            'parent_id' => null
        ]);

        $labelsPackagingId = DB::table('categories')->insertGetId([
            'name' => 'Labels & Packaging',
            'slug' => Str::slug('Labels & Packaging'),
            'parent_id' => null
        ]);

        $apparelId = DB::table('categories')->insertGetId([
            'name' => 'Apparel',
            'slug' => Str::slug('Apparel'),
            'parent_id' => null
        ]);

        // Subcategories under Business Cards
        $this->insertSubcategories($businessCardsId, [
            'Business Cards 14pt (Profit Maximizer)',
            'Business Cards 14pt + AQ',
            'Business Cards 14pt + UV (High Gloss)',
            'Business Cards 14pt + Matte Finish',
            'Business Cards 18pt Matte / Silk Lamination',
            'Business Cards 18pt Gloss Lamination'
        ]);

        // Subcategories under Print Products
        $this->insertSubcategories($printProductsId, [
            'Postcards 14PT + AQ',
            'Postcards 14PT + UV',
            'Flyers 100lb Gloss Text',
            'Flyers 100lb + UV (High Gloss)',
            'Postcards 18PT Matte / Silk Lamination',
            'Greeting Cards 14pt + AQ',
            'Greeting Cards 14pt Writable + AQ (C1S)',
            'Greeting Cards 13pt Enviro Uncoated',
            'Booklets 80lb Gloss Text (8.5 x 5.5)',
            'Presentation Folders 14PT + AQ',
            'Magnets 14PT'
        ]);

        // Subcategories under Large Format
        $this->insertSubcategories($largeFormatId, [
            'Premium Pull Up Banners 13oz Matte Vinyl',
            '20pt Styrene',
            'Canvas Roll',
            'Removable Wall Decals 7 Mil',
            'Cut to Shape Removable Decals',
            'Social Distancing Floor Stickers',
            'X-Frame Banners 13oz Matte Vinyl',
            'A-Frame Signs 4mm Coroplast'
        ]);

        // Subcategories under Stationary
        $this->insertSubcategories($stationaryId, [
            'Letterheads 60LB Uncoated',
            'Envelopes 60LB Uncoated',
            'Notepads 60LB Uncoated (25 pages)'
        ]);

        // Subcategories under Promotional
        $this->insertSubcategories($promotionalId, [
            'Mugs',
            'Bottles'
        ]);

        // Subcategories under Labels & Packaging
        $this->insertSubcategories($labelsPackagingId, [
            'Labels'
        ]);

        // Subcategories under Apparel
        $this->insertSubcategories($apparelId, [
            'Men\'s Clothing',
            'Women\'s Clothing',
            'Kids & Youth Clothing',
            'Headwear',
            'Accessories'
        ]);
    }

    /**
     * Helper function to insert subcategories
     *
     * @param int $parentId
     * @param array $subcategories
     */
    private function insertSubcategories($parentId, array $subcategories)
    {
        foreach ($subcategories as $subcategory) {
            DB::table('categories')->insert([
                'name' => $subcategory,
                'slug' => Str::slug($subcategory),
                'parent_id' => $parentId
            ]);
        }
    }
}

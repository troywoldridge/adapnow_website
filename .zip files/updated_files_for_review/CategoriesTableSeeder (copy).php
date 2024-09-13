
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        // Top-level categories
        $businessCardsId = DB::table('categories')->insertGetId([
            'name' => 'Business Cards',
            'slug' => Str::slug('Business Cards')  // Slug generation
        ]);
        $printProductsId = DB::table('categories')->insertGetId([
            'name' => 'Print Products',
            'slug' => Str::slug('Print Products')
        ]);
        $largeFormatId = DB::table('categories')->insertGetId([
            'name' => 'Large Format',
            'slug' => Str::slug('Large Format')
        ]);
        $stationaryId = DB::table('categories')->insertGetId([
            'name' => 'Stationary',
            'slug' => Str::slug('Stationary')
        ]);
        $promotionalId = DB::table('categories')->insertGetId([
            'name' => 'Promotional',
            'slug' => Str::slug('Promotional')
        ]);
        $labelsPackagingId = DB::table('categories')->insertGetId([
            'name' => 'Labels & Packaging',
            'slug' => Str::slug('Labels & Packaging')
        ]);
        $apparelId = DB::table('categories')->insertGetId([
            'name' => 'Apparel',
            'slug' => Str::slug('Apparel')
        ]);

        // Subcategories under Business Cards
        $standardId = DB::table('categories')->insertGetId([
            'name' => 'Standard',
            'slug' => Str::slug('Standard'),
            'parent_id' => $businessCardsId
        ]);
        $specialtyId = DB::table('categories')->insertGetId([
            'name' => 'Specialty',
            'slug' => Str::slug('Specialty'),
            'parent_id' => $businessCardsId
        ]);

        // Subcategories under Print Products
        $postcardsId = DB::table('categories')->insertGetId([
            'name' => 'Postcards',
            'slug' => Str::slug('Postcards'),
            'parent_id' => $printProductsId
        ]);
        $flyersId = DB::table('categories')->insertGetId([
            'name' => 'Flyers',
            'slug' => Str::slug('Flyers'),
            'parent_id' => $printProductsId
        ]);

        // Additional subcategories under Print Products
        $brochuresId = DB::table('categories')->insertGetId([
            'name' => 'Brochures',
            'slug' => Str::slug('Brochures'),
            'parent_id' => $printProductsId
        ]);
        $bookmarksId = DB::table('categories')->insertGetId([
            'name' => 'Bookmarks',
            'slug' => Str::slug('Bookmarks'),
            'parent_id' => $printProductsId
        ]);
        $presentationFoldersId = DB::table('categories')->insertGetId([
            'name' => 'Presentation Folders',
            'slug' => Str::slug('Presentation Folders'),
            'parent_id' => $printProductsId
        ]);
        $bookletsId = DB::table('categories')->insertGetId([
            'name' => 'Booklets',
            'slug' => Str::slug('Booklets'),
            'parent_id' => $printProductsId
        ]);
        $magnetsId = DB::table('categories')->insertGetId([
            'name' => 'Magnets',
            'slug' => Str::slug('Magnets'),
            'parent_id' => $printProductsId
        ]);
        $greetingCardsId = DB::table('categories')->insertGetId([
            'name' => 'Greeting Cards',
            'slug' => Str::slug('Greeting Cards'),
            'parent_id' => $printProductsId
        ]);
        $invitationsId = DB::table('categories')->insertGetId([
            'name' => 'Invitations / Announcements',
            'slug' => Str::slug('Invitations / Announcements'),
            'parent_id' => $printProductsId
        ]);

        // Log for each category created
        $this->command->info('Categories seeded successfully');
    }
}

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
        $businessCardsId = DB::table('categories')([
            'name' => 'Business Cards',
            'slug' => $this->createUniqueSlug('Business Cards')
        ]);
        $printProductsId = DB::table('categories')([
            'name' => 'Print Products',
            'slug' => $this->createUniqueSlug('Print Products')
        ]);
        $largeFormatId = DB::table('categories')([
            'name' => 'Large Format',
            'slug' => $this->createUniqueSlug('Large Format')
        ]);
        $stationaryId = DB::table('categories')([
            'name' => 'Stationary',
            'slug' => $this->createUniqueSlug('Stationary')
        ]);
        $promotionalId = DB::table('categories')([
            'name' => 'Promotional',
            'slug' => $this->createUniqueSlug('Promotional')
        ]);
        $labelsPackagingId = DB::table('categories')([
            'name' => 'Labels & Packaging',
            'slug' => $this->createUniqueSlug('Labels & Packaging')
        ]);
        $apparelId = DB::table('categories')([
            'name' => 'Apparel',
            'slug' => $this->createUniqueSlug('Apparel')
        ]);

            $standardId = DB::table('categories')->insertGetId([
              'name' => 'Standard',
            'slug' => $this->createUniqueSlug('Standard'),
             'parent_id' => $businessCardsId
]);

   
        $specialtyId = DB::table('categories')->insertGetId([
            'name' => 'Specialty',
            'slug' => $this->createUniqueSlug('Specialty'),
            'parent_id' => $businessCardsId
        ]);
            
        // Subcategories under Print Products
        $postcardsId = DB::table('categories')->insertGetId([
            'name' => 'Postcards',
            'slug' => $this->createUniqueSlug('Postcards'),
            'parent_id' => $printProductsId
        ]);
        $flyersId = DB::table('categories')->insertGetId([
            'name' => 'Flyers',
            'slug' => $this->createUniqueSlug('Flyers'),
            'parent_id' => $printProductsId
        ]);
        $brochuresId = DB::table('categories')->insertGetId([
            'name' => 'Brochures',
            'slug' => $this->createUniqueSlug('Brochures'),
            'parent_id' => $printProductsId
        ]);
        $bookmarksId = DB::table('categories')->insertGetId([
            'name' => 'Bookmarks',
            'slug' => $this->createUniqueSlug('Bookmarks'),
            'parent_id' => $printProductsId
        ]);
        $presentationFoldersId = DB::table('categories')->insertGetId([
            'name' => 'Presentation Folders',
            'slug' => $this->createUniqueSlug('Presentation Folders'),
            'parent_id' => $printProductsId
        ]);
        $bookletsId = DB::table('categories')->insertGetId([
            'name' => 'Booklets',
            'slug' => $this->createUniqueSlug('Booklets'),
            'parent_id' => $printProductsId
        ]);
        $magnetsId = DB::table('categories')->insertGetId([
            'name' => 'Magnets',
            'slug' => $this->createUniqueSlug('Magnets'),
            'parent_id' => $printProductsId
        ]);
        $greetingCardsId = DB::table('categories')->insertGetId([
            'name' => 'Greeting Cards',
            'slug' => $this->createUniqueSlug('Greeting Cards'),
            'parent_id' => $printProductsId
        ]);
        $invitationsId = DB::table('categories')->insertGetId([
            'name' => 'Invitations / Announcements',
            'slug' => $this->createUniqueSlug('Invitations / Announcements'),
            'parent_id' => $printProductsId
        ]);
        $numberedTicketsId = DB::table('categories')->insertGetId([
            'name' => 'Numbered Tickets',
            'slug' => $this->createUniqueSlug('Numbered Tickets'),
            'parent_id' => $printProductsId
        ]);
        $wallCalendarsId = DB::table('categories')->insertGetId([
            'name' => 'Wall Calendars',
            'slug' => $this->createUniqueSlug('Wall Calendars'),
            'parent_id' => $printProductsId
        ]);
        $variablePrintingId = DB::table('categories')->insertGetId([
            'name' => 'Variable Printing',
            'slug' => $this->createUniqueSlug('Variable Printing'),
            'parent_id' => $printProductsId
        ]);
        $postersId = DB::table('categories')->insertGetId([
            'name' => 'Posters',
            'slug' => $this->createUniqueSlug('Posters'),
            'parent_id' => $printProductsId
        ]);
        $doorHangersId = DB::table('categories')->insertGetId([
            'name' => 'Door Hangers',
            'slug' => $this->createUniqueSlug('Door Hangers'),
            'parent_id' => $printProductsId
        ]);
        $digitalSheetsId = DB::table('categories')->insertGetId([
            'name' => 'Digital Sheets',
            'slug' => $this->createUniqueSlug('Digital Sheets'),
            'parent_id' => $printProductsId
        ]);
        $foldedBusinessCardsId = DB::table('categories')->insertGetId([
            'name' => 'Folded Business Cards',
            'slug' => $this->createUniqueSlug('Folded Business Cards'),
            'parent_id' => $printProductsId
        ]);
        $tentCardsId = DB::table('categories')->insertGetId([
            'name' => 'Tent Cards',
            'slug' => $this->createUniqueSlug('Tent Cards'),
            'parent_id' => $printProductsId
        ]);
        $plasticsId = DB::table('categories')->insertGetId([
            'name' => 'Plastics',
            'slug' => $this->createUniqueSlug('Plastics'),
            'parent_id' => $printProductsId
        ]);
        $tearCardsId = DB::table('categories')->insertGetId([
            'name' => 'Tear Cards',
            'slug' => $this->createUniqueSlug('Tear Cards'),
            'parent_id' => $printProductsId
        ]);
        $clingsId = DB::table('categories')->insertGetId([
            'name' => 'Clings',
            'slug' => $this->createUniqueSlug('Clings'),
            'parent_id' => $printProductsId
        ]);
            
        // Subcategories under Large Format
        $coroplastSignsId = DB::table('categories')->insertGetId([
            'name' => 'Coroplast Signs & Yard Signs',
            'slug' => $this->createUniqueSlug('Coroplast Signs & Yard Signs'),
            'parent_id' => $largeFormatId
        ]);
        $floorGraphicsId = DB::table('categories')->insertGetId([
            'name' => 'Floor Graphics',
            'slug' => $this->createUniqueSlug('Floor Graphics'),
            'parent_id' => $largeFormatId
        ]);
        $foamBoardId = DB::table('categories')->insertGetId([
            'name' => 'Foam Board',
            'slug' => $this->createUniqueSlug('Foam Board'),
            'parent_id' => $largeFormatId
        ]);
        $aluminumSignsId = DB::table('categories')->insertGetId([
            'name' => 'Aluminum Signs',
            'slug' => $this->createUniqueSlug('Aluminum Signs'),
            'parent_id' => $largeFormatId
        ]);
        $bannersId = DB::table('categories')->insertGetId([
            'name' => 'Banners',
            'slug' => $this->createUniqueSlug('Banners'),
            'parent_id' => $largeFormatId
        ]);
        $pullUpBannersId = DB::table('categories')->insertGetId([
            'name' => 'Pull Up Banners',
            'slug' => $this->createUniqueSlug('Pull Up Banners'),
            'parent_id' => $largeFormatId
        ]);
        $carMagnetsId = DB::table('categories')->insertGetId([
            'name' => 'Car Magnets',
            'slug' => $this->createUniqueSlug('Car Magnets'),
            'parent_id' => $largeFormatId
        ]);
        $tableCoversId = DB::table('categories')->insertGetId([
            'name' => 'Table Covers',
            'slug' => $this->createUniqueSlug('Table Covers'),
            'parent_id' => $largeFormatId
        ]);
        $adhesiveVinylId = DB::table('categories')->insertGetId([
            'name' => 'Adhesive Vinyl',
            'slug' => $this->createUniqueSlug('Adhesive Vinyl'),
            'parent_id' => $largeFormatId
        ]);
        $windowGraphicsId = DB::table('categories')->insertGetId([
            'name' => 'Window Graphics',
            'slug' => $this->createUniqueSlug('Window Graphics'),
            'parent_id' => $largeFormatId
        ]);
        $largeFormatPostersId = DB::table('categories')->insertGetId([
            'name' => 'Large Format Posters',
            'slug' => $this->createUniqueSlug('Large Format Posters'),
            'parent_id' => $largeFormatId
        ]);
        $styreneSignsId = DB::table('categories')->insertGetId([
            'name' => 'Styrene Signs',
            'slug' => $this->createUniqueSlug('Styrene Signs'),
            'parent_id' => $largeFormatId
        ]);
        $displayBoardId = DB::table('categories')->insertGetId([
            'name' => 'Display Board / POP',
            'slug' => $this->createUniqueSlug('Display Board / POP'),
            'parent_id' => $largeFormatId
        ]);
        $canvasId = DB::table('categories')->insertGetId([
            'name' => 'Canvas',
            'slug' => $this->createUniqueSlug('Canvas'),
            'parent_id' => $largeFormatId
        ]);
        $sintraId = DB::table('categories')->insertGetId([
            'name' => 'Sintra / PVC',
            'slug' => $this->createUniqueSlug('Sintra / PVC'),
            'parent_id' => $largeFormatId
        ]);
        $xFrameBannersId = DB::table('categories')->insertGetId([
            'name' => 'X-Frame Banners',
            'slug' => $this->createUniqueSlug('X-Frame Banners'),
            'parent_id' => $largeFormatId
        ]);
        $aFrameSignsId = DB::table('categories')->insertGetId([
            'name' => 'A-Frame Signs',
            'slug' => $this->createUniqueSlug('A-Frame Signs'),
            'parent_id' => $largeFormatId
        ]);
        $wallDecalsId = DB::table('categories')->insertGetId([
            'name' => 'Wall Decals',
            'slug' => $this->createUniqueSlug('Wall Decals'),
            'parent_id' => $largeFormatId
        ]);
        $aFrameStandsId = DB::table('categories')->insertGetId([
            'name' => 'A Frame Stands',
            'slug' => $this->createUniqueSlug('A Frame Stands'),
            'parent_id' => $largeFormatId
        ]);
        $hStandsId = DB::table('categories')->insertGetId([
            'name' => 'H Stand for Signs',
            'slug' => $this->createUniqueSlug('H Stand for Signs'),
            'parent_id' => $largeFormatId
        ]);
            
        // Subcategories under Stationary
        $letterheadId = DB::table('categories')->insertGetId([
            'name' => 'Letterhead',
            'slug' => $this->createUniqueSlug('Letterhead'),
            'parent_id' => $stationaryId
        ]);
        $envelopesId = DB::table('categories')->insertGetId([
            'name' => 'Envelopes',
            'slug' => $this->createUniqueSlug('Envelopes'),
            'parent_id' => $stationaryId
        ]);
        $notepadsId = DB::table('categories')->insertGetId([
            'name' => 'Notepads',
            'slug' => $this->createUniqueSlug('Notepads'),
            'parent_id' => $stationaryId
        ]);
        $ncrFormsId = DB::table('categories')->insertGetId([
            'name' => 'NCR Forms',
            'slug' => $this->createUniqueSlug('NCR Forms'),
            'parent_id' => $stationaryId
        ]);
        $supplyBoxesId = DB::table('categories')->insertGetId([
            'name' => 'Supply Boxes',
            'slug' => $this->createUniqueSlug('Supply Boxes'),
            'parent_id' => $stationaryId
        ]);
            
        // Subcategories under Promotional
        $mugsId = DB::table('categories')->insertGetId([
            'name' => 'Mugs',
            'slug' => $this->createUniqueSlug('Mugs'),
            'parent_id' => $promotionalId
        ]);
        $bottlesId = DB::table('categories')->insertGetId([
            'name' => 'Bottles',
            'slug' => $this->createUniqueSlug('Bottles'),
            'parent_id' => $promotionalId
        ]);
        $puzzlesId = DB::table('categories')->insertGetId([
            'name' => 'Puzzles',
            'slug' => $this->createUniqueSlug('Puzzles'),
            'parent_id' => $promotionalId
        ]);
        $canvasPromoId = DB::table('categories')->insertGetId([
            'name' => 'Canvas',
            'slug' => $this->createUniqueSlug('Canvas'),
            'parent_id' => $promotionalId
        ]);
        $tumblersId = DB::table('categories')->insertGetId([
            'name' => 'Tumblers',
            'slug' => $this->createUniqueSlug('Tumblers'),
            'parent_id' => $promotionalId
        ]);
        $masonJarsId = DB::table('categories')->insertGetId([
            'name' => 'Mason Jars',
            'slug' => $this->createUniqueSlug('Mason Jars'),
            'parent_id' => $promotionalId
        ]);
        $keychainsId = DB::table('categories')->insertGetId([
            'name' => 'Keychains',
            'slug' => $this->createUniqueSlug('Keychains'),
            'parent_id' => $promotionalId
        ]);
        $mousePadsId = DB::table('categories')->insertGetId([
            'name' => 'Mouse Pads',
            'slug' => $this->createUniqueSlug('Mouse Pads'),
            'parent_id' => $promotionalId
        ]);
        $photoPanelsId = DB::table('categories')->insertGetId([
            'name' => 'Photo Panels',
            'slug' => $this->createUniqueSlug('Photo Panels'),
            'parent_id' => $promotionalId
        ]);
           
        // Subcategories under Labels & Packaging
        $labelsId = DB::table('categories')->insertGetId([
            'name' => 'Labels',
            'slug' => $this->createUniqueSlug('Labels'),
            'parent_id' => $labelsPackagingId
        ]);
        $productBoxesId = DB::table('categories')->insertGetId([
            'name' => 'Product Boxes',
            'slug' => $this->createUniqueSlug('Product Boxes'),
            'parent_id' => $labelsPackagingId
        ]);
        $corrugatedBoxesId = DB::table('categories')->insertGetId([
            'name' => 'Corrugated Boxes',
            'slug' => $this->createUniqueSlug('Corrugated Boxes'),
            'parent_id' => $labelsPackagingId
        ]);
        $cutShapeDecalsId = DB::table('categories')->insertGetId([
            'name' => 'Cut Shape Decals',
            'slug' => $this->createUniqueSlug('Cut Shape Decals'),
            'parent_id' => $labelsPackagingId
        ]);
            
        // Subcategories under Apparel
        $mensClothingId = DB::table('categories')->insertGetId([
            'name' => 'Men\'s Clothing',
            'slug' => $this->createUniqueSlug('Mens Clothing'),
            'parent_id' => $apparelId
        ]);
        $womensClothingId = DB::table('categories')->insertGetId([
            'name' => 'Women\'s Clothing',
            'slug' => $this->createUniqueSlug('Womens Clothing'),
            'parent_id' => $apparelId
        ]);
        $kidsYouthClothingId = DB::table('categories')->insertGetId([
            'name' => 'Kids & Youth Clothing',
            'slug' => $this->createUniqueSlug('Kids Youth Clothing'),
            'parent_id' => $apparelId
        ]);
        $headwearId = DB::table('categories')->insertGetId([
            'name' => 'Headwear',
            'slug' => $this->createUniqueSlug('Headwear'),
            'parent_id' => $apparelId
        ]);
        $accessoriesId = DB::table('categories')->insertGetId([
            'name' => 'Accessories',
            'slug' => $this->createUniqueSlug('Accessories'),
            'parent_id' => $apparelId
        ]);
    
        // Sub-subcategories under Men's Clothing
        $tShirtsMensId = DB::table('categories')->insertGetId([
            'name' => 'T-Shirts',
            'slug' => $this->createUniqueSlug('T-Shirts Mens'),
            'parent_id' => $mensClothingId
        ]);
        $tankTopsMensId = DB::table('categories')->insertGetId([
            'name' => 'Tank Tops',
            'slug' => $this->createUniqueSlug('Tank Tops Mens'),
            'parent_id' => $mensClothingId
        ]);
        $longSleeveShirtsMensId = DB::table('categories')->insertGetId([
            'name' => 'Long Sleeve Shirts',
            'slug' => $this->createUniqueSlug('Long Sleeve Shirts Mens'),
            'parent_id' => $mensClothingId
        ]);
        $hoodiesMensId = DB::table('categories')->insertGetId([
            'name' => 'Hoodies',
            'slug' => $this->createUniqueSlug('Hoodies Mens'),
            'parent_id' => $mensClothingId
        ]);
        $embroideredPolosMensId = DB::table('categories')->insertGetId([
            'name' => 'Embroidered Polos',
            'slug' => $this->createUniqueSlug('Embroidered Polos Mens'),
            'parent_id' => $mensClothingId
        ]);
        
        // Sub-subcategories under Women's Clothing
        $tShirtsWomensId = DB::table('categories')->insertGetId([
            'name' => 'T-Shirts',
            'slug' => $this->createUniqueSlug('T-Shirts Womens'),
            'parent_id' => $womensClothingId
        ]);
        $tankTopsWomensId = DB::table('categories')->insertGetId([
            'name' => 'Tank Tops',
            'slug' => $this->createUniqueSlug('Tank Tops Womens'),
            'parent_id' => $womensClothingId
        ]);
        $longSleeveShirtsWomensId = DB::table('categories')->insertGetId([
            'name' => 'Long Sleeve Shirts',
            'slug' => $this->createUniqueSlug('Long Sleeve Shirts Womens'),
            'parent_id' => $womensClothingId
        ]);
        $embroideredPolosWomensId = DB::table('categories')->insertGetId([
            'name' => 'Embroidered Polos',
            'slug' => $this->createUniqueSlug('Embroidered Polos Womens'),
            'parent_id' => $womensClothingId
        ]);
            
        // Sub-subcategories under Kids & Youth Clothing
        $tShirtsKidsYouthId = DB::table('categories')->insertGetId([
            'name' => 'T-Shirts',
            'slug' => $this->createUniqueSlug('T-Shirts Kids'),
            'parent_id' => $kidsYouthClothingId
        ]);
        $sweatshirtsKidsYouthId = DB::table('categories')->insertGetId([
            'name' => 'Sweatshirts',
            'slug' => $this->createUniqueSlug('Sweatshirts Kids'),
            'parent_id' => $kidsYouthClothingId
        ]);
        $longSleeveShirtsKidsYouthId = DB::table('categories')->insertGetId([
            'name' => 'Long Sleeve Shirts',
            'slug' => $this->createUniqueSlug('Long Sleeve Shirts Kids'),
            'parent_id' => $kidsYouthClothingId
        ]);
        $hoodiesKidsYouthId = DB::table('categories')->insertGetId([
            'name' => 'Hoodies',
            'slug' => $this->createUniqueSlug('Hoodies Kids'),
            'parent_id' => $kidsYouthClothingId
        ]);

        // Sub-subcategories under Headwear
        $embroideredHatsId = DB::table('categories')->insertGetId([
            'name' => 'Embroidered Hats',
            'slug' => $this->createUniqueSlug('Embroidered Hats'),
            'parent_id' => $headwearId
        ]);
        $embroideredBeaniesId = DB::table('categories')->insertGetId([
            'name' => 'Embroidered Beanies',
            'slug' => $this->createUniqueSlug('Embroidered Beanies'),
            'parent_id' => $headwearId
        ]);

        // Sub-subcategories under Accessories
        $toteBagsId = DB::table('categories')->insertGetId([
            'name' => 'Tote Bags',
            'slug' => $this->createUniqueSlug('Tote Bags'),
            'parent_id' => $accessoriesId
        ]);
    }

    /**
     * Generate a unique slug for categories.
     *
     * @param string $name
     * @param int|null $parentId
     * @return string
     */
    private function createUniqueSlug($name, $parentId = null)
    {
        $slug = Str::slug($name);
        $count = DB::table('categories')
            ->when($parentId, function ($query) use ($parentId) {
                $query->where('parent_id', $parentId);
            })
            ->where('slug', 'like', $slug . '%')
            ->count();

        return $count > 0 ? "{$slug}-{$count}" : $slug;
    }
}

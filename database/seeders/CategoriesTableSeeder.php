<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        // Top-level categories
        $businessCardsId = DB::table('categories')->insertGetId(['name' => 'Business Cards']);
        $printProductsId = DB::table('categories')->insertGetId(['name' => 'Print Products']);
        $largeFormatId = DB::table('categories')->insertGetId(['name' => 'Large Format']);
        $stationaryId = DB::table('categories')->insertGetId(['name' => 'Stationary']);
        $promotionalId = DB::table('categories')->insertGetId(['name' => 'Promotional']);
        $labelsPackagingId = DB::table('categories')->insertGetId(['name' => 'Labels & Packaging']);
        $apparelId = DB::table('categories')->insertGetId(['name' => 'Apparel']);

        // Subcategories under Business Cards
        $standardId = DB::table('categories')->insertGetId(['name' => 'Standard', 'parent_id' => $businessCardsId]);
        $specialtyId = DB::table('categories')->insertGetId(['name' => 'Specialty', 'parent_id' => $businessCardsId]);

        // Subcategories under Print Products
        $postcardsId = DB::table('categories')->insertGetId(['name' => 'Postcards', 'parent_id' => $printProductsId]);
        $flyersId = DB::table('categories')->insertGetId(['name' => 'Flyers', 'parent_id' => $printProductsId]);
        $brochuresId = DB::table('categories')->insertGetId(['name' => 'Brochures', 'parent_id' => $printProductsId]);
        $bookmarksId = DB::table('categories')->insertGetId(['name' => 'Bookmarks', 'parent_id' => $printProductsId]);
        $presentationFoldersId = DB::table('categories')->insertGetId(['name' => 'Presentation Folders', 'parent_id' => $printProductsId]);
        $bookletsId = DB::table('categories')->insertGetId(['name' => 'Booklets', 'parent_id' => $printProductsId]);
        $magnetsId = DB::table('categories')->insertGetId(['name' => 'Magnets', 'parent_id' => $printProductsId]);
        $greetingCardsId = DB::table('categories')->insertGetId(['name' => 'Greeting Cards', 'parent_id' => $printProductsId]);
        $invitationsId = DB::table('categories')->insertGetId(['name' => 'Invitations / Announcements', 'parent_id' => $printProductsId]);
        $numberedTicketsId = DB::table('categories')->insertGetId(['name' => 'Numbered Tickets', 'parent_id' => $printProductsId]);
        $wallCalendarsId = DB::table('categories')->insertGetId(['name' => 'Wall Calendars', 'parent_id' => $printProductsId]);
        $variablePrintingId = DB::table('categories')->insertGetId(['name' => 'Variable Printing', 'parent_id' => $printProductsId]);
        $postersId = DB::table('categories')->insertGetId(['name' => 'Posters', 'parent_id' => $printProductsId]);
        $doorHangersId = DB::table('categories')->insertGetId(['name' => 'Door Hangers', 'parent_id' => $printProductsId]);
        $digitalSheetsId = DB::table('categories')->insertGetId(['name' => 'Digital Sheets', 'parent_id' => $printProductsId]);
        $foldedBusinessCardsId = DB::table('categories')->insertGetId(['name' => 'Folded Business Cards', 'parent_id' => $printProductsId]);
        $tentCardsId = DB::table('categories')->insertGetId(['name' => 'Tent Cards', 'parent_id' => $printProductsId]);
        $plasticsId = DB::table('categories')->insertGetId(['name' => 'Plastics', 'parent_id' => $printProductsId]);
        $tearCardsId = DB::table('categories')->insertGetId(['name' => 'Tear Cards', 'parent_id' => $printProductsId]);
        $clingsId = DB::table('categories')->insertGetId(['name' => 'Clings', 'parent_id' => $printProductsId]);

        // Subcategories under Large Format
        $coroplastSignsId = DB::table('categories')->insertGetId(['name' => 'Coroplast Signs & Yard Signs', 'parent_id' => $largeFormatId]);
        $floorGraphicsId = DB::table('categories')->insertGetId(['name' => 'Floor Graphics', 'parent_id' => $largeFormatId]);
        $foamBoardId = DB::table('categories')->insertGetId(['name' => 'Foam Board', 'parent_id' => $largeFormatId]);
        $aluminumSignsId = DB::table('categories')->insertGetId(['name' => 'Aluminum Signs', 'parent_id' => $largeFormatId]);
        $bannersId = DB::table('categories')->insertGetId(['name' => 'Banners', 'parent_id' => $largeFormatId]);
        $pullUpBannersId = DB::table('categories')->insertGetId(['name' => 'Pull Up Banners', 'parent_id' => $largeFormatId]);
        $carMagnetsId = DB::table('categories')->insertGetId(['name' => 'Car Magnets', 'parent_id' => $largeFormatId]);
        $tableCoversId = DB::table('categories')->insertGetId(['name' => 'Table Covers', 'parent_id' => $largeFormatId]);
        $adhesiveVinylId = DB::table('categories')->insertGetId(['name' => 'Adhesive Vinyl', 'parent_id' => $largeFormatId]);
        $windowGraphicsId = DB::table('categories')->insertGetId(['name' => 'Window Graphics', 'parent_id' => $largeFormatId]);
        $largeFormatPostersId = DB::table('categories')->insertGetId(['name' => 'Large Format Posters', 'parent_id' => $largeFormatId]);
        $styreneSignsId = DB::table('categories')->insertGetId(['name' => 'Styrene Signs', 'parent_id' => $largeFormatId]);
        $displayBoardId = DB::table('categories')->insertGetId(['name' => 'Display Board / POP', 'parent_id' => $largeFormatId]);
        $canvasId = DB::table('categories')->insertGetId(['name' => 'Canvas', 'parent_id' => $largeFormatId]);
        $sintraId = DB::table('categories')->insertGetId(['name' => 'Sintra / PVC', 'parent_id' => $largeFormatId]);
        $xFrameBannersId = DB::table('categories')->insertGetId(['name' => 'X-Frame Banners', 'parent_id' => $largeFormatId]);
        $aFrameSignsId = DB::table('categories')->insertGetId(['name' => 'A-Frame Signs', 'parent_id' => $largeFormatId]);
        $wallDecalsId = DB::table('categories')->insertGetId(['name' => 'Wall Decals', 'parent_id' => $largeFormatId]);
        $aFrameStandsId = DB::table('categories')->insertGetId(['name' => 'A Frame Stands', 'parent_id' => $largeFormatId]);
        $hStandsId = DB::table('categories')->insertGetId(['name' => 'H Stand for Signs', 'parent_id' => $largeFormatId]);

        // Subcategories under Stationary
        $letterheadId = DB::table('categories')->insertGetId(['name' => 'Letterhead', 'parent_id' => $stationaryId]);
        $envelopesId = DB::table('categories')->insertGetId(['name' => 'Envelopes', 'parent_id' => $stationaryId]);
        $notepadsId = DB::table('categories')->insertGetId(['name' => 'Notepads', 'parent_id' => $stationaryId]);
        $ncrFormsId = DB::table('categories')->insertGetId(['name' => 'NCR Forms', 'parent_id' => $stationaryId]);
        $supplyBoxesId = DB::table('categories')->insertGetId(['name' => 'Supply Boxes', 'parent_id' => $stationaryId]);

        // Subcategories under Promotional
        $mugsId = DB::table('categories')->insertGetId(['name' => 'Mugs', 'parent_id' => $promotionalId]);
        $bottlesId = DB::table('categories')->insertGetId(['name' => 'Bottles', 'parent_id' => $promotionalId]);
        $puzzlesId = DB::table('categories')->insertGetId(['name' => 'Puzzles', 'parent_id' => $promotionalId]);
        $canvasPromoId = DB::table('categories')->insertGetId(['name' => 'Canvas', 'parent_id' => $promotionalId]);
        $tumblersId = DB::table('categories')->insertGetId(['name' => 'Tumblers', 'parent_id' => $promotionalId]);
        $masonJarsId = DB::table('categories')->insertGetId(['name' => 'Mason Jars', 'parent_id' => $promotionalId]);
        $keychainsId = DB::table('categories')->insertGetId(['name' => 'Keychains', 'parent_id' => $promotionalId]);
        $mousePadsId = DB::table('categories')->insertGetId(['name' => 'Mouse Pads', 'parent_id' => $promotionalId]);
        $photoPanelsId = DB::table('categories')->insertGetId(['name' => 'Photo Panels', 'parent_id' => $promotionalId]);

        // Subcategories under Labels & Packaging
        $labelsId = DB::table('categories')->insertGetId(['name' => 'Labels', 'parent_id' => $labelsPackagingId]);
        $productBoxesId = DB::table('categories')->insertGetId(['name' => 'Product Boxes', 'parent_id' => $labelsPackagingId]);
        $corrugatedBoxesId = DB::table('categories')->insertGetId(['name' => 'Corrugated Boxes', 'parent_id' => $labelsPackagingId]);
        $cutShapeDecalsId = DB::table('categories')->insertGetId(['name' => 'Cut Shape Decals', 'parent_id' => $labelsPackagingId]);

        // Subcategories under Apparel
        $mensClothingId = DB::table('categories')->insertGetId(['name' => 'Men\'s Clothing', 'parent_id' => $apparelId]);
        $womensClothingId = DB::table('categories')->insertGetId(['name' => 'Women\'s Clothing', 'parent_id' => $apparelId]);
        $kidsYouthClothingId = DB::table('categories')->insertGetId(['name' => 'Kids & Youth Clothing', 'parent_id' => $apparelId]);
        $headwearId = DB::table('categories')->insertGetId(['name' => 'Headwear', 'parent_id' => $apparelId]);
        $accessoriesId = DB::table('categories')->insertGetId(['name' => 'Accessories', 'parent_id' => $apparelId]);

        // Sub-subcategories under Men's Clothing
        $tShirtsMensId = DB::table('categories')->insertGetId(['name' => 'T-Shirts', 'parent_id' => $mensClothingId]);
        $sweatshirtsMensId = DB::table('categories')->insertGetId(['name' => 'Sweatshirts', 'parent_id' => $mensClothingId]);
        $tankTopsMensId = DB::table('categories')->insertGetId(['name' => 'Tank Tops', 'parent_id' => $mensClothingId]);
        $longSleeveShirtsMensId = DB::table('categories')->insertGetId(['name' => 'Long Sleeve Shirts', 'parent_id' => $mensClothingId]);
        $hoodiesMensId = DB::table('categories')->insertGetId(['name' => 'Hoodies', 'parent_id' => $mensClothingId]);
        $embroideredPolosMensId = DB::table('categories')->insertGetId(['name' => 'Embroidered Polos', 'parent_id' => $mensClothingId]);

        // Sub-subcategories under Women's Clothing
        $tShirtsWomensId = DB::table('categories')->insertGetId(['name' => 'T-Shirts', 'parent_id' => $womensClothingId]);
        $tankTopsWomensId = DB::table('categories')->insertGetId(['name' => 'Tank Tops', 'parent_id' => $womensClothingId]);
        $longSleeveShirtsWomensId = DB::table('categories')->insertGetId(['name' => 'Long Sleeve Shirts', 'parent_id' => $womensClothingId]);
        $embroideredPolosWomensId = DB::table('categories')->insertGetId(['name' => 'Embroidered Polos', 'parent_id' => $womensClothingId]);

        // Sub-subcategories under Kids & Youth Clothing
        $tShirtsKidsYouthId = DB::table('categories')->insertGetId(['name' => 'T-Shirts', 'parent_id' => $kidsYouthClothingId]);
        $sweatshirtsKidsYouthId = DB::table('categories')->insertGetId(['name' => 'Sweatshirts', 'parent_id' => $kidsYouthClothingId]);
        $longSleeveShirtsKidsYouthId = DB::table('categories')->insertGetId(['name' => 'Long Sleeve Shirts', 'parent_id' => $kidsYouthClothingId]);
        $hoodiesKidsYouthId = DB::table('categories')->insertGetId(['name' => 'Hoodies', 'parent_id' => $kidsYouthClothingId]);

        // Sub-subcategories under Headwear
        $embroideredHatsId = DB::table('categories')->insertGetId(['name' => 'Embroidered Hats', 'parent_id' => $headwearId]);
        $embroideredBeaniesId = DB::table('categories')->insertGetId(['name' => 'Embroidered Beanies', 'parent_id' => $headwearId]);

        // Sub-subcategories under Accessories
        $toteBagsId = DB::table('categories')->insertGetId(['name' => 'Tote Bags', 'parent_id' => $accessoriesId]);
    }
}

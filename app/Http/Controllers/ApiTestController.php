<?php

namespace App\Http\Controllers;

use App\Services\SinaliteService;
use Illuminate\Support\Facades\Log;

class ApiTestController extends Controller
{
    public function testSinaliteConnection()
    {
        // Create an instance of the SinaliteService
        $sinaliteService = new SinaliteService();

        // Call the testApiConnection() method to fetch products
        $products = $sinaliteService->testApiConnection();

        // Log the fetched products for verification
        if ($products) {
            Log::info('Successfully fetched products: ' . json_encode($products));
            return response()->json($products);
        } else {
            Log::error('Failed to fetch products.');
            return response()->json(['error' => 'Failed to fetch products'], 500);
        }
    }
}

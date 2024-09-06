<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

class SetsTableSeeder extends Seeder
{
    public function run()
    {
        try {
            // Step 1: Generate the token by calling the Sinalite token endpoint
            $tokenResponse = Http::post('https://api.sinaliteuppy.com/auth/token', [
                'client_id' => 'JarBGsyG2zC4vRFTjLEi4TDbQrXUVEzr', // Your client ID
                'client_secret' => 'L292AtithgbZWAuo4UZcQXdG0s7I-TJphyaWCJKA95YpURyZGH1Qh3Ri-YauVdkJ', // Your client secret
                'audience' => 'https://liveapi.sinalite.com',
                'grant_type' => 'client_credentials',
            ]);

            if ($tokenResponse->failed()) {
                Log::error('Error fetching token: ' . $tokenResponse->body());
                return;
            }

            // Step 2: Extract the access token
            $token = $tokenResponse->json()['access_token'] ?? null;
            if (!$token) {
                throw new Exception('Access token is missing.');
            }

            // Step 3: Use the access token to authenticate the API request for the sets data
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->get('https://liveapi.sinalite.com/product/sets');

            if ($response->failed()) {
                Log::error('Error fetching sets data: ' . $response->body());
                return;
            }

            // Step 4: Decode the response and prepare the data for seeding
            $setsData = $response->json();
            $insertData = [];

            foreach ($setsData as $set) {
                $insertData[] = [
                    'set_name' => $set['name'] ?? 'Unnamed Set',
                    'set_description' => $set['description'] ?? 'No description',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            // Step 5: Insert the data into the sets table
            if (!empty($insertData)) {
                DB::table('sets')->insert($insertData);
                Log::info('Sets data successfully seeded.');
            }
        } catch (Exception $e) {
            Log::error("Error seeding sets data: " . $e->getMessage());
        }
    }
}

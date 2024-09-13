<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Cache; // For token caching
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SinaliteService
{
    protected $accessToken;
    protected $baseUrl;

    public function __construct()
    {
        // Select the appropriate environment (sandbox or live)
        $this->baseUrl = config('app.env') === 'production' 
            ? 'https://liveapi.sinalite.com' 
            : 'https://api.sinaliteuppy.com';

        // Fetch access token from cache or generate a new one
        $this->accessToken = $this->getCachedToken();
    }

    /**
     * Get cached token or generate a new one if expired.
     * 
     * @return string
     */
    protected function getCachedToken()
    {
        return Cache::remember('sinalite_token', 3600, function () {
            return $this->generateToken();
        });
    }

    /**
     * Generate access token for authentication.
     * 
     * @throws Exception
     * @return string
     */
    public function generateToken()
    {
        try {
            $response = Http::post($this->baseUrl . '/auth/token', [
                'client_id' => 'JarBGsyG2zC4vRFTjLEi4TDbQrXUVEzr',
                'client_secret' => 'L292AtithgbZWAuo4UZcQXdG0s7I-TJphyaWCJKA95YpURyZGH1Qh3Ri-YauVdkJ',
                'audience' => 'https://apiconnect.sinalite.com',
                'grant_type' => 'client_credentials'
            ]);

            $responseData = $response->json();

            // Log the full response for inspection
            Log::info("Token API Response: " . json_encode($responseData));

            if (!isset($responseData['access_token'])) {
                throw new Exception("Missing access token. Full response: " . json_encode($responseData));
            }

            $tokenType = $responseData['token_type'] ?? 'Bearer';
            $token = $tokenType . ' ' . $responseData['access_token'];

            return $token;
        } catch (Exception $e) {
            Log::error("Error generating token: " . $e->getMessage());
            throw new Exception("Error generating token: " . $e->getMessage());
        }
    }

    /**
     * Make a generic request to the Sinalite API.
     *
     * @param string $method HTTP Method (GET, POST)
     * @param string $url API endpoint URL
     * @param array $data Payload for POST requests
     * @return array API response
     * @throws Exception
     */
    protected function makeRequest($method, $url, $data = [])
    {
        $attempts = 0;
        $maxAttempts = 3; // Number of retry attempts

        while ($attempts < $maxAttempts) {
            try {
                $response = Http::withHeaders([
                    'Authorization' => $this->accessToken,
                    'Content-Type' => 'application/json',
                ])->{$method}($url, $data);

                if ($response->failed()) {
                    // If the token is invalid or expired, refresh and retry
                    if ($response->status() === 401) {
                        $this->accessToken = $this->generateToken();
                        Cache::put('sinalite_token', $this->accessToken, 3600);
                        continue; // Retry with the new token
                    }

                    throw new Exception("API request failed: " . $response->body());
                }

                return $response->json();
            } catch (Exception $e) {
                $attempts++;
                Log::warning("Attempt $attempts: Failed to retrieve data: " . $e->getMessage());

                if ($attempts >= $maxAttempts) {
                    Log::error("Failed to retrieve data after $attempts attempts: " . $e->getMessage());
                    throw new Exception("Failed to retrieve data after multiple attempts: " . $e->getMessage());
                }

                sleep(2); // Wait for 2 seconds before retrying
            }
        }
    }

    /**
     * Get the list of products with pagination.
     * Automatically handles pagination if the API supports it.
     *
     * @throws Exception
     * @return array
     */
    public function getProducts()
    {
        $url = $this->baseUrl . '/product'; // Update this URL if needed
        $products = [];
        $page = 1;

        try {
            do {
                // Fetch paginated data
                $response = $this->makeRequest('get', $url, ['page' => $page]);

                if (isset($response['data']) && is_array($response['data'])) {
                    $products = array_merge($products, $response['data']);
                }

                $page++; // Move to the next page
                $hasNextPage = isset($response['pagination']['next_page']); // Assuming API provides this

            } while ($hasNextPage); // Loop until no more pages

            Log::info('Fetched all products with pagination.');
        } catch (\Exception $e) {
            Log::error('Failed to load paginated products: ' . $e->getMessage());
        }

        return $products;
    }

    /**
     * Get specific product data by ID.
     *
     * @param int $productId
     * @param string $storeCode
     * @return array
     */
    public function getProductById($productId, $storeCode = 'en_us')
    {
        $url = $this->baseUrl . "/product/{$productId}/{$storeCode}";
        return $this->makeRequest('get', $url);
    }

    /**
     * Get product stock data.
     *
     * @throws Exception
     * @return array
     */
    public function getStocks()
    {
        $url = $this->baseUrl . '/v1/stocks';  // Update this if incorrect
        return $this->makeRequest('get', $url);
    }

    /**
     * Get pricing for a product variant.
     *
     * @param int $productId
     * @param array $options
     * @param string $storeCode
     * @return array
     */
    public function getPricing($productId, $options, $storeCode = 'en_us')
    {
        $url = $this->baseUrl . "/price/{$productId}/{$storeCode}";
        return $this->makeRequest('post', $url, ['productOptions' => $options]);
    }

    /**
     * Test the connection to SinaLite API and fetch products.
     * @return array|null
     */
    public function testApiConnection()
    {
        try {
            $response = $this->getProducts(); // Reuse the existing method
            return $response; // Return the fetched products
        } catch (\Exception $e) {
            Log::error('Failed to connect to SinaLite API: ' . $e->getMessage());
            return null;
        }
    }
}

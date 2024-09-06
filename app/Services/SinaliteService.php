<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SinaliteService
{
    protected $accessToken;
    
    // Base URLs for Sandbox and Production
    protected $sandboxBaseUrl = 'https://api.sinaliteuppy.com';
    protected $liveBaseUrl = 'https://liveapi.sinalite.com';

    public function __construct()
    {
        // Automatically generate a token when the service is initialized
        $this->accessToken = $this->generateToken();
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
            $response = Http::post($this->sandboxBaseUrl . '/auth/token', [
                'client_id' => 'JarBGsyG2zC4vRFTjLEi4TDbQrXUVEzr',
                'client_secret' => 'L292AtithgbZWAuo4UZcQXdG0s7I-TJphyaWCJKA95YpURyZGH1Qh3Ri-YauVdkJ',
                'audience' => 'https://apiconnect.sinalite.com',
                'grant_type' => 'client_credentials'
            ]);

            $responseData = $response->json();

            // Log the full response for inspection
            Log::info("Token API Response: " . json_encode($responseData));

            // Handle missing access token or token type
            if (!isset($responseData['access_token'])) {
                throw new Exception("Missing access token. Full response: " . json_encode($responseData));
            }

            // Use 'Bearer' as token type if it is not present in the response
            $tokenType = isset($responseData['token_type']) ? $responseData['token_type'] : 'Bearer';
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
        try {
            $response = Http::withHeaders([
                'Authorization' => $this->accessToken,
                'Content-Type' => 'application/json',
            ])->{$method}($url, $data);

            if ($response->failed()) {
                throw new Exception("API request failed: " . $response->body());
            }

            return $response->json();
        } catch (Exception $e) {
            Log::error("Failed to retrieve data: " . $e->getMessage());
            throw new Exception("Failed to retrieve data: " . $e->getMessage());
        }
    }

    /**
     * Get the list of products.
     *
     * @throws Exception
     * @return array
     */
    public function getProducts()
    {
        $url = $this->sandboxBaseUrl . '/product';
        return $this->makeRequest('get', $url);
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
        $url = $this->sandboxBaseUrl . "/product/{$productId}/{$storeCode}";
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
        $url = $this->sandboxBaseUrl . '/v1/stocks';  // Update this if incorrect
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
        $url = $this->sandboxBaseUrl . "/price/{$productId}/{$storeCode}";
        return $this->makeRequest('post', $url, ['productOptions' => $options]);
    }

    // Additional methods for placing orders, getting shipping estimates, etc., can be added here.
}

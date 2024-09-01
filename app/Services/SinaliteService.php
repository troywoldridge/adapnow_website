<?php

namespace App\Services;

use GuzzleHttp\Client;
use Exception;

class SinaliteService
{
    protected $client;
    protected $token;

    public function __construct()
    {
        $this->client = new Client();
        $this->authenticate();
    }

    protected function authenticate()
    {
        try {
            $response = $this->client->post('https://api.sinaliteuppy.com/auth/token', [
                'json' => [
                    'client_id' => 'JarBGsyG2zC4vRFTjLEi4TDbQrXUVEzr',
                    'client_secret' => 'L292AtithgbZWAuo4UZcQXdG0s7I-TJphyaWCJKA95YpURyZGH1Qh3Ri-YauVdkJ',
                    'audience' => 'https://apiconnect.sinalite.com',
                    'grant_type' => 'client_credentials',
                ],
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
            ]);

            $responseBody = json_decode($response->getBody(), true);

            if (!isset($responseBody['access_token'])) {
                throw new Exception("Authentication failed: access_token not found in response. Response: " . print_r($responseBody, true));
            }

            $tokenType = isset($responseBody['token_type']) ? $responseBody['token_type'] : 'Bearer';
            $this->token = $tokenType . ' ' . $responseBody['access_token'];
        } catch (Exception $e) {
            throw new Exception("Authentication failed: " . $e->getMessage());
        }
    }

    protected function makeRequest($method, $url, $options = [])
    {
        try {
            $response = $this->client->request($method, $url, array_merge([
                'headers' => [
                    'Authorization' => $this->token,
                ],
            ], $options));

            return json_decode($response->getBody(), true);
        } catch (Exception $e) {
            throw new Exception("Request failed: " . $e->getMessage());
        }
    }

    public function getProducts()
    {
        return $this->makeRequest('GET', 'https://api.sinaliteuppy.com/product');
    }

    public function getProductById($id)
    {
        return $this->makeRequest('GET', "https://api.sinaliteuppy.com/product/{$id}/9");
    }

    public function getProductDetails($id, $storeCode)
    {
        return $this->makeRequest('GET', "https://api.sinaliteuppy.com/product/{$id}/{$storeCode}");
    }

    public function getProductPricing($id, $options)
    {
        return $this->makeRequest('POST', "https://api.sinaliteuppy.com/price/{$id}/9", [
            'json' => [
                'productOptions' => $options,
            ],
        ]);
    }

    public function getSets()
    {
        return $this->makeRequest('GET', 'https://liveapi.sinalite.com/sets');
    }

    public function getVariants($id, $offset = 0)
    {
        return $this->makeRequest('GET', "https://api.sinaliteuppy.com/variants/{$id}/{$offset}");
    }

    public function getPriceByKey($id, $key)
    {
        return $this->makeRequest('GET', "https://api.sinaliteuppy.com/pricebykey/{$id}/{$key}");
    }

    public function placeOrder(array $orderData)
    {
        return $this->makeRequest('POST', 'https://liveapi.sinalite.com/order/new', [
            'json' => $orderData,
        ]);
    }

    public function getShippingEstimate(array $orderData)
    {
        return $this->makeRequest('POST', 'https://liveapi.sinalite.com/order/shippingEstimate', [
            'json' => $orderData,
        ]);
    }

    public function getOrders($offset = 0)
    {
        return $this->makeRequest('GET', "https://liveapi.sinalite.com/order/list/{$offset}");
    }

    public function getOrderById($id)
    {
        return $this->makeRequest('GET', "https://liveapi.sinalite.com/order/{$id}");
    }
}

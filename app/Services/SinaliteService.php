<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class SinaliteService
{
    protected $client;
    protected $accessToken;

    public function __construct()
    {
        $this->client = new Client();
        $this->authenticate();
    }

    protected function authenticate()
    {
        try {
            $data = [
                'client_id' => 'JarBGsyG2zC4vRFTjLEi4TDbQrXUVEzr',
                'client_secret' => 'L292AtithgbZWAuo4UZcQXdG0s7I-TJphyaWCJKA95YpURyZGH1Qh3Ri-YauVdkJ',
                'audience' => 'https://apiconnect.sinalite.com',
                'grant_type' => 'client_credentials',
            ];

            $response = $this->makeRequest('POST', 'https://api.sinaliteuppy.com/auth/token', $data);
            $responseBody = json_decode($response->getBody(), true);

            if (isset($responseBody['access_token'])) {
                $tokenType = $responseBody['token_type'] ?? 'Bearer';
                $this->accessToken = $tokenType . ' ' . $responseBody['access_token'];
            } else {
                throw new \Exception("Authentication failed. Response: " . json_encode($responseBody));
            }
        } catch (RequestException $e) {
            throw new \Exception("HTTP request failed: " . $e->getMessage());
        }
    }

    public function getSizes($productId, $storeCode)
    {
        $response = $this->makeRequest('GET', "https://liveapi.sinalite.com/product/$productId/$storeCode");
        $responseBody = json_decode($response->getBody(), true);
        return $responseBody[0] ?? [];
    }

    protected function makeRequest($method, $url, $data = [])
    {
        try {
            $options = [
                'headers' => [
                    'Authorization' => $this->accessToken,
                    'Accept' => 'application/json',
                ],
            ];

            if (!empty($data)) {
                $options['json'] = $data;
            }

            return $this->client->request($method, $url, $options);
        } catch (RequestException $e) {
            throw new \Exception("HTTP request failed: " . $e->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\SinaliteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class ShippingController extends BaseController
{
    protected $sinaliteService;

    public function __construct(SinaliteService $sinaliteService)
    {
        $this->sinaliteService = $sinaliteService;
    }

    // Handle the API call to get shipping estimate
    public function getShippingEstimate(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'productId' => 'required|integer',
            'Stock' => 'required|string',
            'Size' => 'required|string',
            'Qty' => 'required|integer',
            'Coating' => 'required|string',
            'RoundCorners' => 'required|string',
            'Turnaround' => 'required|string',
            'ShipState' => 'required|string',
            'ShipZip' => 'required|string',
            'ShipCountry' => 'required|string',
        ]);

        try {
            $shippingRequest = [
                'productId' => $validated['productId'],
                'options' => [
                    'Stock' => $validated['Stock'],
                    'Size' => $validated['Size'],
                    'Qty' => $validated['Qty'],
                    'Coating' => $validated['Coating'],
                    'RoundCorners' => $validated['RoundCorners'],
                    'Turnaround' => $validated['Turnaround'],
                ],
                'shippingInfo' => [
                    'ShipState' => $validated['ShipState'],
                    'ShipZip' => $validated['ShipZip'],
                    'ShipCountry' => $validated['ShipCountry'],
                ],
            ];

            $response = $this->sinaliteService->getShippingEstimate($shippingRequest);

            return response()->json($response);

        } catch (\Exception $e) {
            Log::error('Failed to get shipping estimate: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to get shipping estimate.'], 500);
        }
    }
}


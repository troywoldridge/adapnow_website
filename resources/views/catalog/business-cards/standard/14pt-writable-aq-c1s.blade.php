@extends('layouts.main')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">14pt Writable + AQ (C1S)</h1>
    
    <!-- Description Section -->
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('images/business_cards/14pt-writable-aq.png') }}" alt="14pt + AQ Writable Business Cards" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2>Description</h2>
            <p>Business cards are widely used as a networking tool and a way to make a good first impression. These business cards combine a semi-gloss coated side with an uncoated, writable side.</p>
            <ul>
                <li>14pt Writable On one Side</li>
                <li>AQ Coating One Side Only</li>
                <li>Full Color, Single or Double-sided Print</li>
                <li>Quantities range from 250, 5000</li>
                <li>Cut to size and box. Rounded corners are optional (1/4" radius).</li>
            </ul>
        </div>
    </div>

    <!-- Specifications -->
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Specifications</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Feature</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Paper Type</td>
                        <td>14pt 90 Bright C1S Stock</td>
                    </tr>
                    <tr>
                        <td>Size</td>
                        <td>3.5" x 2" (firm size)</td>
                    </tr>
                    <tr>
                        <td>Finishes</td>
                        <td>AQ Coating (1 side only)</td>
                    </tr>
                    <tr>
                        <td>Shipping Time</td>
                        <td>3-4 Business Days</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pricing Section -->
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Pricing</h2>
            <p></p>
            <a href="#" class="btn btn-primary">Order Now</a>
        </div>
    </div>

    <!-- Back Button -->
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <a href="{{ route('showProduct', ['category' => 'business-cards', 'productSlug' => '14pt-writable-aq-c1s']) }}" class="btn btn-primary">Order Now</a>
        </div>
    </div>
</div>
@endsection

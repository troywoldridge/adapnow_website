@extends('layouts.main')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Quick Ship Business Cards</h1>
    
    <!-- Description Section -->
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('images/business_cards/properties-image-two.png') }}" alt="Quick Ship Business Cards" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2>Description</h2>
            <p>Get business cards fast! Have them in your client’s hands 3 days after ordering.</p>
            <ul>
                <li>Printing Completed By Next Business Day</li>
                <li>Express 2 Day Shipping Across America</li>
                <li>Price is All Inclusive</li>
                <li>Choice of 14pt or 16pt, with UV (High Gloss) Coating</li>
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
                        <td>14pt or 16pt</td>
                    </tr>
                    <tr>
                        <td>Size</td>
                        <td>3.5" x 2"</td>
                    </tr>
                    <tr>
                        <td>Finishes</td>
                        <td>UV High Gloss</td>
                    </tr>
                    <tr>
                        <td>Shipping Time</td>
                        <td>Next Business Day</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pricing Section -->
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Pricing</h2>
            <p>Our Quick Ship Business Cards start at just $19.99 for a pack of 100.</p>
            <a href="#" class="btn btn-primary">Order Now</a>
        </div>
    </div>

    <!-- Back Button -->
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <a href="{{ route('showProduct', ['category' => 'business-cards', 'productSlug' => 'quick-ship-business-cards']) }}" class="btn btn-primary">Order Now</a>
        </div>
    </div>
</div>
@endsection

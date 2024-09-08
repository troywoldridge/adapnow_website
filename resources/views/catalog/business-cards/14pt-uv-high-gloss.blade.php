@extends('layouts.main')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">14pt High Gloss</h1>
    
    <!-- Description Section -->
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('images/business_cards/bc_shine.png')}}" alt="14pt + UV Business Cards" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2>Description</h2>
            <p>Business cards are widely used as a networking tool and a way to make a good first impression. Our 14pt Business cards with UV coating have a very glossy and shiny look.</p>
            <ul>
                <li>14pt + UV High Gloss Finish</li> <!-- Removed "Matte Finish]" -->
                <li>High Gloss + UV Coating</li>
                <li>Quantities Range From 25 to 25,000</li>
                <li>Cut to size and boxed</li>
                <li>Rounded corners are optional (1/4" radius)</li> <!-- Fixed typo: "optonal" to "optional" -->
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
                        <td>95 Bright 14pt C2S Stock</td>
                    </tr>
                    <tr>
                        <td>Size</td>
                        <td>3.5" x 2"</td>
                    </tr>
                    <tr>
                        <td>Finishes</td>
                        <td>High Gloss UV Coating</td>
                    </tr>
                    <tr>
                        <td>Shipping Time</td>
                        <td>Next Business Day, 2-3 Business Days</td> <!-- Fixed typo: "Buisness" to "Business" -->
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pricing Section -->
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Pricing</h2>
            <p>Our 14pt High Gloss Business Cards start at just $19.99 for a pack of 100.</p> <!-- Updated to be specific to "14pt High Gloss" -->
            <a href="#" class="btn btn-primary">Order Now</a>
        </div>
    </div>

    <!-- Back Button -->
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <a href="{{ route('showProduct', ['category' => 'business-cards', 'productSlug' => '14pt-uv-high-gloss']) }}" class="btn btn-primary">Order Now</a>
        </div>
    </div>
</div>
@endsection

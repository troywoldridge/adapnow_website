@extends('layouts.main')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">16pt Matte Finish</h1>
    
    <!-- Description Section -->
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('images/business-cards/16pt_matte-business-cards.png')}}" alt="16pt Matte Finish Business Cards" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2>Description</h2>
            <p>Help your clients print the networking tool they need. Our 16pt matte finish business cards are a good option for those seeking thicker stock.</p>
            <ul>
                <li>16pt Matte Finish</li> <!-- Removed stray ']' -->
                <li>Matte Finish</li> <!-- Fixed spacing: 'MatteFinish' to 'Matte Finish' -->
                <li>Quantities Range From 100 to 25,000</li>
                <li>Cut to size and boxed</li>
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
                        <td>95 Bright 16pt C2S Stock</td>
                    </tr>
                    <tr>
                        <td>Size</td>
                        <td>3.5" x 2"</td>
                    </tr>
                    <tr>
                        <td>Finishes</td>
                        <td>Matte Finish</td>
                    </tr>
                    <tr>
                        <td>Shipping Time</td>
                        <td>Next Business Day, 2-3 Business Days</td> <!-- Fixed typo: 'Buisness' to 'Business' -->
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pricing Section -->
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Pricing</h2>
            <p>Our 16pt Matte Finish Business Cards start at just $19.99 for a pack of 100.</p> <!-- Updated the text to reflect "16pt Matte Finish" -->
            <a href="{{ route('showProduct', ['category' => 'business-cards', 'productSlug' => '16pt-matte-finish']) }}" class="btn btn-primary">Order Now</a>
        </div>
    </div>

    <!-- Back Button -->
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <a href="{{ route('business-cards.index') }}" class="btn btn-secondary">Back to Business Cards</a>
        </div>
    </div>
</div>
@endsection

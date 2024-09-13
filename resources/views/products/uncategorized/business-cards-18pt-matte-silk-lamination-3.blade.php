@extends('layouts.main')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Business cards 18pt Matte / Silk Lamination</h1>
    
    <!-- Description Section -->
    <div class="row">
        <div class="col-md-6">
            <img src="/images/uncategorized/business-cards-18pt-matte-silk-lamination-3.png" alt="Business cards 18pt Matte / Silk Lamination" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2>Description</h2>
            <p>Business cards 18pt with Matte / Silk Lamination</p>
            <ul>
                <li>Feature 1</li>
                <li>Feature 2</li>
                <li>Feature 3</li>
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
                        <td>Paper type information not available</td>
                    </tr>
                    <tr>
                        <td>Size</td>
                        <td>Size information not available</td>
                    </tr>
                    <tr>
                        <td>Finishes</td>
                        <td>Finish information not available</td>
                    </tr>
                    <tr>
                        <td>Shipping Time</td>
                        <td>Shipping time information not available</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pricing Section -->
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Pricing</h2>
            <p>Price: 0.00</p>
            <a href="{{ route('product.show', ['category' => 'uncategorized', 'productSlug' => 'business-cards-18pt-matte-silk-lamination-3']) }}" class="btn btn-primary">Order Now</a>
        </div>
    </div>

    <!-- Back Button -->
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <a href="{{ route('catalog.index') }}" class="btn btn-secondary">Back to Catalog</a>
        </div>
    </div>
</div>
@endsection
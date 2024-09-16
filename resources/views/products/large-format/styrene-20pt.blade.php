@extends('layouts.main')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Styrene 20pt</h1>
    
    <!-- Description Section -->
    <div class="row">
        <div class="col-md-6">
            <img src="/public/images/large-format/styrene-20pt.png" alt="Styrene 20pt" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2>Description</h2>
            <p>A light weight but durable pvc sheet</p>
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
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td>Size</td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td>Finishes</td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td>Shipping Time</td>
                        <td>N/A</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pricing Section -->
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Pricing</h2>
            <a href="{{ route('product.show', ['category_slug' => 'large-format', 'product_slug' => 'styrene-20pt']) }}" class="btn btn-primary">Order Now</a> 
        </div>
    </div>

    <!-- Back Button -->
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <a href="{{ route('category.show', ['category_slug' => 'large-format']) }}" class="btn btn-secondary">Back to large-format</a>
        </div>
    </div>
</div>
@endsection

<!-- URL for this product: http://127.0.0.1:8000/product/large-format/styrene-20pt -->
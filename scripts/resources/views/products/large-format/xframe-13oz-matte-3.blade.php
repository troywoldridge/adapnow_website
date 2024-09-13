
@extends('layouts.main')

@section('content')
<div class="container">
    <h1 class="my-4">X-Frame Banners 13oz Matte Vinyl</h1>
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('/public/images/defaults/fallback.png') }}" alt="X-Frame Banners 13oz Matte Vinyl" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2>Description</h2>
            <p>X-Frame Banners 13oz Matte Vinyl</p>
            <ul>
                <li>Key Feature 1</li>
                <li>Key Feature 2</li>
                <li>More details as needed</li>
            </ul>
        </div>
    </div>

    <!-- Specifications Section -->
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Specifications</h2>
            <table class="table">
                <tbody>
                    <tr>
                        <td>Material</td>
                        <td>Product Material</td>
                    </tr>
                    <tr>
                        <td>Size</td>
                        <td>Product Size</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pricing Section -->
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Pricing</h2>
            <a href="{{ route('showProduct', ['category' => 'large-format', 'productSlug' => 'xframe-13oz-matte-3']) }}" class="btn btn-primary">Order Now</a>
        </div>
    </div>

    <!-- Back Button -->
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <a href="{{ route('large-format.index') }}" class="btn btn-secondary">Back to Large Format</a>
        </div>
    </div>
</div>
@endsection

<!-- URL for this product: http://127.0.0.1:8000/product/large-format/xframe-13oz-matte-3 -->

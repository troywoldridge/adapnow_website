@extends('layouts.main')

@section('content')
<div class="container my-5">
    @if (isset($error))
        <div class="alert alert-danger text-center">{{ $error }}</div>
    @else
        <div class="row">
            @if ($products && count($products) > 0)
                @foreach ($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <!-- Product Image with Fallback -->
                            <img src="{{ $product['image'] ?? asset('images/default-image.jpg') }}" class="card-img-top" alt="{{ $product['name'] }}">

                            <div class="card-body text-center">
                                <!-- Product Title -->
                                <h5 class="card-title">{{ $product['name'] }}</h5>
                                
                                <!-- Product Description with Fallback -->
                                <p class="card-text">{{ $product['description'] ?? 'No description available' }}</p>
                                
                                <!-- Product Price with Fallback -->
                                <h6>Price: {{ $product['price'] ? '$' . number_format($product['price'], 2) : 'N/A' }}</h6>
                                
                                <!-- Add to Cart Button -->
                                <a href="{{ route('cart.add', ['product' => $product['id']]) }}" class="btn btn-success">
                                    Add to Cart
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <!-- Message if No Products Available -->
                <div class="col-12 text-center">
                    <p>No products available at this time.</p>
                </div>
            @endif
        </div>
    @endif
</div>
@endsection

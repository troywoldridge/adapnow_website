@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <!-- Category Title -->
    <h1 class="text-center">{{ $category->name }}</h1>
    <p class="text-center">{{ $category->description ?? 'Explore products in this category' }}</p>

    <!-- Product List -->
    <div class="row mt-5">
        @if($products->isEmpty())
            <div class="col-md-12">
                <p class="text-center">No products available in this category yet.</p>
            </div>
        @else
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <!-- Product Image -->
                        <img src="{{ asset('images/' . $product->image_path) }}" class="card-img-top" alt="{{ $product->name }}">

                        <!-- Product Details -->
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->short_description ?? 'Great product at an amazing price!' }}</p>

                            <!-- Product Price -->
                            <p class="text-muted">Price: ${{ number_format($product->price, 2) }}</p>

                            <!-- Link to Product Page -->
                            <a href="{{ route('showProduct', ['category' => $category->slug, 'productSlug' => $product->slug]) }}" class="btn btn-primary">View Product</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection

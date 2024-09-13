@extends('layouts.main')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-5">Our Product Catalog</h1>

    <!-- Alert Messages -->
    @if (session('message'))
        <div class="alert alert-info text-center">{{ session('message') }}</div>
    @endif

    @if (isset($error))
        <div class="alert alert-danger text-center">{{ $error }}</div>
    @endif

    <!-- Categories Section -->
    <div class="row mb-5">
        <!-- Business Cards Dropdown -->
        <div class="col-md-4">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle btn-block" type="button" id="businessCardsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Business Cards
                </button>
                <div class="dropdown-menu" aria-labelledby="businessCardsDropdown">
                    <a class="dropdown-item" href="{{ route('category.show', 'business-cards') }}">All Business Cards</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'business-cards', 'product' => 1]) }}">14pt Business Cards</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'business-cards', 'product' => 2]) }}">16pt Business Cards</a>
                </div>
            </div>
        </div>

        <!-- Print Products -->
        <div class="col-md-4">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle btn-block" type="button" id="printproducts" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Flyers
                </button>
                <div class="dropdown-menu" aria-labelledby="flyerDropdown">
                    <a class="dropdown-item" href="{{ route('category.show', 'flyers') }}">All Flyers</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'flyers', 'product' => 3]) }}">A5 Flyers</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'flyers', 'product' => 4]) }}">A4 Flyers</a>
                </div>
            </div>
        </div>

        <!-- Large Format Dropdown -->
        <div class="col-md-4">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle btn-block" type="button" id="largeFormatDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Large Format
                </button>
                <div class="dropdown-menu" aria-labelledby="largeFormatDropdown">
                    <a class="dropdown-item" href="{{ route('category.show', 'large-format') }}">All Large Format</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'large-format', 'product' => 5]) }}">Roll-up Banners</a>
                    <a class="dropdown-item" href="{{ route('product.show', ['category' => 'large-format', 'product' => 6]) }}">Foam Board Signs</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Section -->
    <div class="row">
        @if (isset($products) && !empty($products))
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $product['image'] ?? 'default-image.jpg' }}" class="card-img-top" alt="{{ $product['name'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product['name'] }}</h5>
                            <p class="card-text">{{ $product['description'] ?? 'No description available' }}</p>
                            <h6>Price: ${{ $product['price'] ?? 'N/A' }}</h6>
                            <a href="{{ route('product.show', ['category' => $product['category'], 'product' => $product['id']]) }}" class="btn btn-primary">View Product</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12 text-center">
                <p>No products available at the moment.</p>
            </div>
        @endif
    </div>
</div>
@endsection

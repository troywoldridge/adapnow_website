@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <!-- Hero Section -->
    <div class="hero-section text-center">
        <div class="hero-banner position-relative">
            <img src="{{ asset('images/hero-banner.jpg') }}" class="img-fluid" alt="Welcome to American Design and Printing">
            <div class="overlay"></div> <!-- Gradient overlay -->
            <div class="hero-text">
                <h1 class="display-4">Your One-Stop Shop for Printing Solutions</h1>
                <p class="lead">High-quality products, fast turnaround times, and competitive pricing!</p>
                <a href="{{ route('catalog.index') }}" class="btn btn-primary btn-lg mt-3 shadow-lg">Shop Now</a>
            </div>
        </div>
    </div>

    <!-- Categories Section -->
    <div class="categories-section mt-5">
        <h2 class="text-center">Explore Our Categories</h2>
        <div class="row text-center mt-4">
            <!-- Category: Apparel -->
            <div class="col-md-4 mb-4">
                <div class="card category-card shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-tshirt fa-3x mb-3"></i>
                        <h5 class="card-title">Apparel</h5>
                        <p class="card-text">Browse our collection of custom apparel for men, women, and kids.</p>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle btn-block" type="button" id="apparelDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                Browse Apparel
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="apparelDropdown">
                                <li><a class="dropdown-item" href="{{ route('category.show', 'mens-clothing') }}">Men's Clothing</a></li>
                                <li><a class="dropdown-item" href="{{ route('category.show', 'womens-clothing') }}">Women's Clothing</a></li>
                                <li><a class="dropdown-item" href="{{ route('category.show', 'kids-youth-clothing') }}">Kids & Youth</a></li>
                                <li><a class="dropdown-item" href="{{ route('category.show', 'headwear') }}">Headwear</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Category: Business Cards -->
            <div class="col-md-4 mb-4">
                <div class="card category-card shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-id-card fa-3x mb-3"></i>
                        <h5 class="card-title">Business Cards</h5>
                        <p class="card-text">High-quality business cards to make a lasting impression.</p>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle btn-block" type="button" id="businessCardsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                Browse Business Cards
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="businessCardsDropdown">
                                <li><a class="dropdown-item" href="{{ route('category.show', '14pt-matt') }}">14pt Matt Business Cards</a></li>
                                <li><a class="dropdown-item" href="{{ route('category.show', 'value-business-cards') }}">Value Business Cards</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Category: Large Format -->
            <div class="col-md-4 mb-4">
                <div class="card category-card shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-print fa-3x mb-3"></i>
                        <h5 class="card-title">Large Format</h5>
                        <p class="card-text">Large format prints for banners, signs, and more.</p>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle btn-block" type="button" id="largeFormatDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                Browse Large Format
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="largeFormatDropdown">
                                <li><a class="dropdown-item" href="{{ route('category.show', 'banners') }}">Banners</a></li>
                                <li><a class="dropdown-item" href="{{ route('category.show', 'pull-up-banners') }}">Pull Up Banners</a></li>
                                <li><a class="dropdown-item" href="{{ route('category.show', 'car-magnets') }}">Car Magnets</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Products Section -->
    <div class="featured-products-section mt-5">
        <h2 class="text-center">Featured Products</h2>
        <div class="row mt-4">
            @foreach ($featuredProducts as $product)
                <div class="col-md-3 mb-4">
                    <div class="card product-card shadow-sm h-100">
                        <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text text-muted">${{ number_format($product->price, 2) }}</p>
                            <a href="{{ route('product.show', ['category' => $product->category_slug, 'product' => $product->id]) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
